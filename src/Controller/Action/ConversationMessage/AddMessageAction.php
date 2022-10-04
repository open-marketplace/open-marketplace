<?php

/*
 * This file has been created by developers from BitBag.
 * Feel free to contact us once you face any issues or want to start
 * You can find more information about us on https://bitbag.io and write us
 * an email on hello@bitbag.io.
 */

declare(strict_types=1);

namespace BitBag\OpenMarketplace\Controller\Action\ConversationMessage;

use BitBag\OpenMarketplace\Entity\Conversation\Message;
use BitBag\OpenMarketplace\Facade\Message\AddMessageFacadeInterface;
use BitBag\OpenMarketplace\Form\Type\Conversation\MessageType;
use Symfony\Component\Form\FormFactoryInterface;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\Flash\FlashBagInterface;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;

final class AddMessageAction
{
    private FormFactoryInterface $formFactory;

    private FlashBagInterface $flashBag;

    private AddMessageFacadeInterface $addMessageFacade;

    private UrlGeneratorInterface $urlGenerator;

    public function __construct(
        FormFactoryInterface $formFactory,
        FlashBagInterface $flashBag,
        AddMessageFacadeInterface $addMessageFacade,
        UrlGeneratorInterface $urlGenerator
    ) {
        $this->formFactory = $formFactory;
        $this->flashBag = $flashBag;
        $this->addMessageFacade = $addMessageFacade;
        $this->urlGenerator = $urlGenerator;
    }

    public function __invoke(int $id, Request $request): Response
    {
        $form = $this->formFactory->create(MessageType::class);
        $redirect = $request->attributes->get('_sylius')['redirect'];

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            /** @var Message $message */
            $message = $form->getData();
            $file = $form->get('file')->getData();

            $this->addMessageFacade
                ->createWithConversation($id, $message, $file);
        }

        return new RedirectResponse($this->urlGenerator->generate($redirect, [
            'id' => $id,
        ]));
    }
}
