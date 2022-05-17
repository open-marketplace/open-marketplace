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

final class VendorConversationMenuListener
{
    public function addConversationMenuItems(MenuBuilderEvent $event): void
    {
        $menu = $event->getMenu();

        $menu
            ->addChild('dashboard', ['route' => 'app_vendor_dashboard'])
            ->setLabel('mvm.ui.menu.dashboard')
            ->setLabelAttribute('icon', 'home');

        $menu
            ->addChild('conversations', ['route' => 'mvm_vendor_conversation_index'])
            ->setLabel('mvm.ui.menu.conversations')
            ->setLabelAttribute('icon', 'inbox')
        ;
    }
}
