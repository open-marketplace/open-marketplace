<?php

/*
 * This file has been created by developers from BitBag.
 * Feel free to contact us once you face any issues or want to start
 * You can find more information about us on https://bitbag.io and write us
 * an email on hello@bitbag.io.
 */

declare(strict_types=1);

namespace BitBag\SyliusMultiVendorMarketplacePlugin\Controller\Action\Conversation;

use BitBag\SyliusMultiVendorMarketplacePlugin\Controller\AbstractController;
use BitBag\SyliusMultiVendorMarketplacePlugin\Entity\Conversation\ConversationInterface;
use BitBag\SyliusMultiVendorMarketplacePlugin\Entity\Conversation\MessageInterface;
use BitBag\SyliusMultiVendorMarketplacePlugin\Facade\Message\AddMessageFacadeInterface;
use BitBag\SyliusMultiVendorMarketplacePlugin\Form\Type\Conversation\ConversationType;
use BitBag\SyliusMultiVendorMarketplacePlugin\Repository\Conversation\ConversationRepositoryInterface;
use Symfony\Component\Form\FormFactoryInterface;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\Flash\FlashBagInterface;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;
use Twig\Environment;

final class CreateNewConversationAction extends AbstractController
{
//    private FormFactoryInterface $formFactory;

    private Environment $templatingEngine;

    private UrlGeneratorInterface $urlGenerator;

    private FlashBagInterface $flashBag;

    private AddMessageFacadeInterface $addMessageFacade;

    private ConversationRepositoryInterface $conversationRepository;

    public function __construct(
        FormFactoryInterface $formFactory,
        Environment $templatingEngine,
        UrlGeneratorInterface $urlGenerator,
        FlashBagInterface $flashBag,
        AddMessageFacadeInterface $addMessageFacade,
        ConversationRepositoryInterface $conversationRepository
    ) {
        $this->formFactory = $formFactory;
        $this->templatingEngine = $templatingEngine;
        $this->urlGenerator = $urlGenerator;
        $this->flashBag = $flashBag;
        $this->addMessageFacade = $addMessageFacade;
        $this->conversationRepository = $conversationRepository;
    }

    public function __invoke(Request $request): Response
    {
        if (!$this->isAssetsUser())
        {
            return $this->redirectUserNotAccess();
        }

        $template = $request->attributes->get('_sylius')['template'];

        $form = $this->formFactory->create(ConversationType::class);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $redirect = $request->attributes->get('_sylius')['redirect'];

            /** @var ConversationInterface $conversation */
            $conversation = $form->getData();

            $this->conversationRepository->add($conversation);

            $this->addConversationWithMessages($conversation);

            return new RedirectResponse($this->urlGenerator->generate($redirect, [
                'id' => $conversation->getId(),
            ]));
        }

        foreach ($form->getErrors() as $error) {
            $this->flashBag->add('error', $error->getMessageTemplate());
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
