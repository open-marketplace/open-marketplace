<?php

/*
 * This file has been created by developers from BitBag.
 * Feel free to contact us once you face any issues or want to start
 * You can find more information about us on https://bitbag.io and write us
 * an email on hello@bitbag.io.
 */

declare(strict_types=1);

namespace BitBag\OpenMarketplace\Controller\Conversation;

use BitBag\OpenMarketplace\Entity\Conversation\Conversation;
use BitBag\OpenMarketplace\Form\Type\Conversation\MessageType;
use BitBag\OpenMarketplace\Repository\Conversation\ConversationRepositoryInterface;
use BitBag\OpenMarketplace\Resolver\CurrentUserResolverInterface;
use BitBag\OpenMarketplace\Security\Voter\ConversationOwningVoter;
use Symfony\Component\Form\FormFactoryInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Security\Core\Authorization\AuthorizationCheckerInterface;
use Symfony\Component\Security\Core\Exception\AccessDeniedException;
use Twig\Environment;

final class ConversationController
{
    private Environment $templatingEngine;

    private FormFactoryInterface $formFactory;

    private ConversationRepositoryInterface $conversationRepository;

    private CurrentUserResolverInterface $currentUserResolver;

    private AuthorizationCheckerInterface $authorizationChecker;

    public function __construct(
        Environment $templatingEngine,
        FormFactoryInterface $formFactory,
        ConversationRepositoryInterface $conversationRepository,
        CurrentUserResolverInterface $currentUserResolver,
        AuthorizationCheckerInterface $authorizationChecker
    ) {
        $this->templatingEngine = $templatingEngine;
        $this->formFactory = $formFactory;
        $this->conversationRepository = $conversationRepository;
        $this->currentUserResolver = $currentUserResolver;
        $this->authorizationChecker = $authorizationChecker;
    }

    public function index(Request $request): Response
    {
        $template = $request->attributes->get('_sylius')['template'];

        $currentUser = $this->currentUserResolver->resolve();

        $status = Conversation::STATUS_OPEN;

        if ($request->query->get('closed')) {
            $status = Conversation::STATUS_CLOSED;
        }

        $conversations = $this->conversationRepository->findAllWithStatusAndUser($status, $currentUser);

        return new Response(
            $this->templatingEngine->render(
                $template,
                [
                    'conversations' => $conversations,
                    'account_disabled' => false === $currentUser->getVendor()->isEnabled(),
                ]
            )
        );
    }

    public function show(int $id, Request $request): Response
    {
        $template = $request->attributes->get('_sylius')['template'];

        $form = $this->formFactory->create(MessageType::class);

        /** @var Conversation $conversation */
        $conversation = $this->conversationRepository->find($id);

        if (!$this->authorizationChecker->isGranted(ConversationOwningVoter::UPDATE, $conversation)) {
            throw new AccessDeniedException();
        }

        return new Response(
            $this->templatingEngine->render(
                $template,
                [
                    'form' => $form->createView(),
                    'conversation' => $conversation,
                ]
            )
        );
    }
}
