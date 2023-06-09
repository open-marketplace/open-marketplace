<?php

/*
 * This file has been created by developers from BitBag.
 * Feel free to contact us once you face any issues or want to start
 * You can find more information about us on https://bitbag.io and write us
 * an email on hello@bitbag.io.
 */

declare(strict_types=1);

namespace BitBag\OpenMarketplace\Controller\Action\Conversation;

use BitBag\OpenMarketplace\Component\Messaging\Entity\Conversation;
use BitBag\OpenMarketplace\Entity\ShopUserInterface;
use BitBag\OpenMarketplace\Entity\VendorInterface;
use BitBag\OpenMarketplace\Repository\Conversation\ConversationRepositoryInterface;
use BitBag\OpenMarketplace\Resolver\CurrentUserResolverInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Twig\Environment;

final class ListConversationsAction
{
    private Environment $templatingEngine;

    private ConversationRepositoryInterface $conversationRepository;

    private CurrentUserResolverInterface $currentUserResolver;

    public function __construct(
        Environment $templatingEngine,
        ConversationRepositoryInterface $conversationRepository,
        CurrentUserResolverInterface $currentUserResolver,
        ) {
        $this->templatingEngine = $templatingEngine;
        $this->conversationRepository = $conversationRepository;
        $this->currentUserResolver = $currentUserResolver;
    }

    public function __invoke(Request $request): Response
    {
        $template = $request->attributes->get('_sylius')['template'];

        /** @var ShopUserInterface $currentUser */
        $currentUser = $this->currentUserResolver->resolve();

        $status = Conversation::STATUS_OPEN;

        if ($request->query->get('closed')) {
            $status = Conversation::STATUS_CLOSED;
        }

        $conversations = $this->conversationRepository->findAllWithStatusAndUser($status, $currentUser);

        /** @var VendorInterface $vendor */
        $vendor = $currentUser->getVendor();

        return new Response(
            $this->templatingEngine->render(
                $template,
                [
                    'conversations' => $conversations,
                    'account_disabled' => false === $vendor->isEnabled(),
                ]
            )
        );
    }
}
