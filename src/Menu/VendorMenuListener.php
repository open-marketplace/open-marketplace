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

final class VendorMenuListener
{
    public function addProductListMenuItems(MenuBuilderEvent $event): void
    {
        $menu = $event->getMenu();

        $menu
            ->addChild('Product List', ['route' => 'bitbag_sylius_multi_vendor_marketplace_plugin_vendor_product_listing_index'])
            ->setLabel('mvm.ui.menu.product_list')
            ->setLabelAttribute('icon', 'inbox');
    }
}
