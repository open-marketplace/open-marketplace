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

class AccountMenuListener
{
    public function addAccountMenuItems(MenuBuilderEvent $event): void
    {
        $menu = $event->getMenu();
        $menu
            ->addChild('new', ['route' => 'vendor_register_form'])
            ->setLabel('bitbag_sylius_multi_vendor_marketplace_plugin.ui.vendor_dashboard')
            ->setLabelAttribute('icon', 'star')
        ;
        $menu
            ->addChild('newes', ['route' => 'vendor_profile'])
            ->setLabel('bitbag_sylius_multi_vendor_marketplace_plugin.ui.vendor_profile')
            ->setLabelAttribute('icon', 'pencil')
        ;
    }
}
