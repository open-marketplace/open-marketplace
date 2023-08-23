<?php

/*
 * This file has been created by developers from BitBag.
 * Feel free to contact us once you face any issues or want to start
 * You can find more information about us on https://bitbag.io and write us
 * an email on hello@bitbag.io.
 */

declare(strict_types=1);

namespace BitBag\OpenMarketplace\Component\Core\Common\Controller\Messaging;

use BitBag\OpenMarketplace\Component\Core\Common\Form\Type\Messaging\MessageType;
use BitBag\OpenMarketplace\Component\Messaging\Entity\Message;
use BitBag\OpenMarketplace\Component\Messaging\MessagePersisterInterface;
use Symfony\Component\Form\FormFactoryInterface;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\Flash\FlashBag;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;

final class CreateMessageAction
{
    public function __construct(
        private FormFactoryInterface $formFactory,
        private MessagePersisterInterface $messagePersister,
        private UrlGeneratorInterface $urlGenerator,
        private FlashBag $flashBag
    ) {
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

            $this->messagePersister
                ->createWithConversation($id, $message, $file);
        } else {
            $this->flashBag->add('error', (string) $form->get('file')->getErrors());
        }

        return new RedirectResponse($this->urlGenerator->generate($redirect, [
            'id' => $id,
        ]));
    }
}
