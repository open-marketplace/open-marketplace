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
            ->addChild('Product List', ['route' => 'bitbag_mvm_plugin_vendor_product_listing_index'])
            ->setLabel('bitbag_mvm_plugin.ui.product_list')
            ->setLabelAttribute('icon', 'inbox');

        $menu
            ->addChild('Order List', ['route' => 'bitbag_mvm_plugin_order_listing'])
            ->setLabel('bitbag_mvm_plugin.ui.order_list')
            ->setLabelAttribute('icon', 'suitcase');

        $menu
            ->addChild('Clients', ['route' => 'bitbag_mvm_plugin_customer_index'])
            ->setLabel('bitbag_mvm_plugin.ui.clients')
            ->setLabelAttribute('icon', 'users');

        $menu
            ->addChild('Inventory', ['route' => 'vendor_product_variant_index'])
            ->setLabel('bitbag_mvm_plugin.ui.inventory')
            ->setLabelAttribute('icon', 'users');
    }
}
