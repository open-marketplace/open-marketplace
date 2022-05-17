<?php

declare(strict_types=1);

namespace BitBag\SyliusMultiVendorMarketplacePlugin\Menu;

use Sylius\Bundle\UiBundle\Menu\Event\MenuBuilderEvent;

final class VendorMenuListener
{
    public function addVendorMenuItems(MenuBuilderEvent $event): void
    {
        $menu = $event->getMenu();

        $menu
            ->getChild("configuration")
            ->addChild('vendor', ['route' => 'app_admin_vendor_user_index'])
            ->setLabel('app.menu.admin.main.configuration.vendor')
            ->setLabelAttribute('icon', 'shopping bag')
        ;
    }
}
