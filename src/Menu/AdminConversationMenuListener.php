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

final class AdminConversationMenuListener
{
    public function addConversationMenuItems(MenuBuilderEvent $event): void
    {
        $menu = $event->getMenu();

        $menu
            ->getChild('customers')
            ->addChild('conversations', ['route' => 'mvm_admin_conversation_index'])
            ->setLabel('mvm.ui.menu.conversations')
            ->setLabelAttribute('icon', 'inbox')
        ;
    }
}
