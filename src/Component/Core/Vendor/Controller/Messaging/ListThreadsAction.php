<?php

/*
 * This file has been created by developers from BitBag.
 * Feel free to contact us once you face any issues or want to start
 * You can find more information about us on https://bitbag.io and write us
 * an email on hello@bitbag.io.
 */

declare(strict_types=1);

namespace BitBag\OpenMarketplace\Component\Core\Vendor\Controller\Messaging;

use BitBag\OpenMarketplace\Component\Core\Common\Resolver\CurrentUserResolverInterface;
use BitBag\OpenMarketplace\Component\Messaging\Entity\Conversation;
use BitBag\OpenMarketplace\Component\Messaging\Repository\ConversationRepositoryInterface;
use BitBag\OpenMarketplace\Component\Vendor\Entity\VendorInterface;
use BitBag\OpenMarketplace\Entity\ShopUserInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Twig\Environment;

final class ListThreadsAction
{
    public function __construct(
        private Environment $templatingEngine,
        private ConversationRepositoryInterface $conversationRepository,
        private CurrentUserResolverInterface $currentUserResolver,
    ) {
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
