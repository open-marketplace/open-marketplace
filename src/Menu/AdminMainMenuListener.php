<?php

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
            ->setLabel('bitbag_sylius_mvm_plugin.ui.marketplace')
        ;

        $newSubmenu
            ->addChild('vendors', [
                'route' => 'app_admin_vendor_index',
            ])
            ->setLabel('bitbag_sylius_mvm_plugin.ui.vendors')
            ->setLabelAttribute('icon', 'users')
        ;
    }
}
