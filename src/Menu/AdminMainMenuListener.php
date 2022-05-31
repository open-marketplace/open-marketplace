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

final class AdminMainMenuListener
{
    public function addMarketplaceSubMenu(MenuBuilderEvent $event): void
    {
        $menu = $event->getMenu();

        $newSubmenu = $menu
            ->addChild('marketplace')
            ->setLabel('bitbag.mvm.ui.marketplace')
        ;

        $newSubmenu
            ->addChild('vendors', [
                'route' => 'app_admin_vendor_index',
            ])
            ->setLabel('bitbag.mvm.ui.vendors')
            ->setLabelAttribute('icon', 'users')
        ;
    }
}
