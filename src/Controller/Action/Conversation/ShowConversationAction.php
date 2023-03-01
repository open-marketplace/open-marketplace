<?php

declare(strict_types=1);

namespace BitBag\OpenMarketplace\Controller\Action\Conversation;

use BitBag\OpenMarketplace\Entity\Conversation\Conversation;
use BitBag\OpenMarketplace\Form\Type\Conversation\MessageType;
use BitBag\OpenMarketplace\Repository\Conversation\ConversationRepositoryInterface;
use BitBag\OpenMarketplace\Security\Voter\ConversationOwningVoter;
use Symfony\Component\Form\FormFactoryInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Security\Core\Authorization\AuthorizationCheckerInterface;
use Symfony\Component\Security\Core\Exception\AccessDeniedException;
use Twig\Environment;

final class ShowConversationAction
{
    public function __construct(
        private Environment $templatingEngine,
        private FormFactoryInterface $formFactory,
        private ConversationRepositoryInterface $conversationRepository,
        private AuthorizationCheckerInterface $authorizationChecker
    ) {
    }

    public function __invoke(int $id, Request $request): Response
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
