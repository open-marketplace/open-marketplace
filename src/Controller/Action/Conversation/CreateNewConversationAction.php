<?php

/*
 * This file has been created by developers from BitBag.
 * Feel free to contact us once you face any issues or want to start
 * You can find more information about us on https://bitbag.io and write us
 * an email on hello@bitbag.io.
 */

declare(strict_types=1);

namespace BitBag\SyliusMultiVendorMarketplacePlugin\Controller\Action\Conversation;

use BitBag\SyliusMultiVendorMarketplacePlugin\Entity\Conversation\ConversationInterface;
use BitBag\SyliusMultiVendorMarketplacePlugin\Entity\Conversation\MessageInterface;
use BitBag\SyliusMultiVendorMarketplacePlugin\Facade\Message\AddMessageFacadeInterface;
use BitBag\SyliusMultiVendorMarketplacePlugin\Factory\VendorFactory;
use BitBag\SyliusMultiVendorMarketplacePlugin\Form\Type\Conversation\ConversationType;
use BitBag\SyliusMultiVendorMarketplacePlugin\Form\VendorType;
use BitBag\SyliusMultiVendorMarketplacePlugin\Repository\Conversation\ConversationRepositoryInterface;
use BitBag\SyliusMultiVendorMarketplacePlugin\Service\VendorProfileUpdateService;
use BitBag\SyliusMultiVendorMarketplacePlugin\Service\VendorProvider;
use Symfony\Bundle\FrameworkBundle\Routing\Router;
use Symfony\Component\Form\FormFactory;
use Symfony\Component\Form\FormFactoryInterface;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\RequestStack;
use Symfony\Component\HttpFoundation\Response;
use Twig\Environment;

final class CreateNewConversationAction
{
    private RequestStack $request;

    private Environment $templatingEngine;

    private FormFactoryInterface $formFactory;

    private Router $router;

    private AddMessageFacadeInterface $addMessageFacade;

    private ConversationRepositoryInterface $conversationRepository;

    public function __construct(
        RequestStack $request,
        AddMessageFacadeInterface $addMessageFacade,
        Environment $templatingEngine,
        FormFactoryInterface $formFactory,
        Router $router,
        ConversationRepositoryInterface $conversationRepository
    ) {
        $this->request = $request;
        $this->templatingEngine = $templatingEngine;
        $this->formFactory = $formFactory;
        $this->router = $router;
        $this->conversationRepository = $conversationRepository;
        $this->addMessageFacade = $addMessageFacade;
    }

    public function __invoke(Request $request): Response
    {
        $template = $request->attributes->get('_sylius')['template'];

        $form = $this->formFactory->create(ConversationType::class);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $redirect = $request->attributes->get('_sylius')['redirect'];

            /** @var ConversationInterface $conversation */
            $conversation = $form->getData();

            $this->conversationRepository->add($conversation);

            $this->addConversationWithMessages($conversation);

            return new RedirectResponse($this->router->generate($redirect, [
                'id' => $conversation->getId(),
            ]));
        }
        return new Response(
            $this->templatingEngine->render(
                $template, [
                    'form' => $form->createView(),
                ]
            )
        );
    }
    private function addConversationWithMessages(ConversationInterface $conversation): void
    {
        if(null !== $conversation->getMessages())
            /** @var MessageInterface $message */
            foreach ($conversation->getMessages()->toArray() as $message) {
                $this->addMessageFacade->createWithConversation(
                    $conversation->getId(),
                    $message,
                    $message->getFile(),
                );
            }
    }
}