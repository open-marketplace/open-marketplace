<?php

/*
 * This file has been created by developers from BitBag.
 * Feel free to contact us once you face any issues or want to start
 * You can find more information about us on https://bitbag.io and write us
 * an email on hello@bitbag.io.
 */

declare(strict_types=1);

namespace BitBag\SyliusMultiVendorMarketplacePlugin\Menu;

use Sylius\Bundle\UiBundle\Menu\Event\MenuBuilderEvent;
use Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorageInterface;

final class VendorConversationMenuListener
{
    private TokenStorageInterface $tokenStorage;

    public function __construct(TokenStorageInterface $tokenStorage)
    {
        $this->tokenStorage = $tokenStorage;
    }

    public function addConversationMenuItems(MenuBuilderEvent $event): void
    {
        if ($this->tokenStorage->getToken()->getUser()->getCustomer()->getVendor()) {
            $menu = $event->getMenu();

            $menu
                ->addChild('conversations', ['route' => 'mvm_vendor_conversation_index']);
            $menu
                ->setLabel('mvm.ui.menu.conversations');
            $menu
                ->setLabelAttribute('icon', 'inbox');;
        }
    }
}
