<?php

/*
 * This file has been created by developers from BitBag.
 * Feel free to contact us once you face any issues or want to start
 * You can find more information about us on https://bitbag.io and write us
 * an email on hello@bitbag.io.
 */

declare(strict_types=1);

namespace BitBag\OpenMarketplace\Component\Core\Admin;

use Knp\Menu\Util\MenuManipulator;
use Sylius\Bundle\UiBundle\Menu\Event\MenuBuilderEvent;

final class MenuListener
{
    public function addMarketplaceSection(MenuBuilderEvent $menuBuilderEvent): void
    {
        $menu = $menuBuilderEvent->getMenu();

        $mvmRootMenuItem =
            $menu
                ->addChild('marketplace')
                ->setLabel('open_marketplace.ui.marketplace');

        $mvmRootMenuItem
            ->addChild('open_marketplace_product_listings', [
                'route' => 'open_marketplace_admin_product_listing_index',
            ])
            ->setLabel('open_marketplace.ui.product_listings')
            ->setLabelAttribute('icon', 'list');

        $mvmRootMenuItem
            ->addChild('vendors', [
                'route' => 'open_marketplace_admin_vendor_index',
            ])
            ->setLabel('open_marketplace.ui.vendors')
            ->setLabelAttribute('icon', 'users');

        $mvmRootMenuItem
            ->addChild('conversations', ['route' => 'open_marketplace_admin_messaging_conversation_index'])
            ->setLabel('open_marketplace.ui.menu.conversations')
            ->setLabelAttribute('icon', 'inbox');

        $mvmRootMenuItem
            ->addChild('conversations_category', ['route' => 'open_marketplace_admin_messaging_conversation_category_index'])
            ->setLabel('open_marketplace.ui.menu.conversation_categories')
            ->setLabelAttribute('icon', 'inbox');

        $manipulator = new MenuManipulator();
        $manipulator->moveChildToPosition($menu, $mvmRootMenuItem, 0);
    }
}
