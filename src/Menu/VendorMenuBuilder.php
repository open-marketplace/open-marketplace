<?php

/*
 * This file has been created by developers from BitBag.
 * Feel free to contact us once you face any issues or want to start
 * You can find more information about us on https://bitbag.io and write us
 * an email on hello@bitbag.io.
 */

declare(strict_types=1);

namespace BitBag\SyliusMultiVendorMarketplacePlugin\Menu;

use BitBag\SyliusMultiVendorMarketplacePlugin\Entity\ShopUserInterface;
use Knp\Menu\FactoryInterface;
use Knp\Menu\ItemInterface;
use Sylius\Bundle\UiBundle\Menu\Event\MenuBuilderEvent;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;
use Symfony\Component\Security\Core\Security;

final class VendorMenuBuilder
{
    public const EVENT_NAME = 'bitbag_mvm_plugin.menu.shop.vendor';

    private FactoryInterface $factory;

    private EventDispatcherInterface $eventDispatcher;

    private Security $security;

    public function __construct(
        FactoryInterface $factory,
        EventDispatcherInterface $eventDispatcher,
        Security $security
    ) {
        $this->factory = $factory;
        $this->eventDispatcher = $eventDispatcher;
        $this->security = $security;
    }

    public function createMenu(array $options): ItemInterface
    {
        /** @var ShopUserInterface $user */
        $user = $this->security->getUser();
        $menu = $this->factory->createItem('root');
        $menu->setLabel('bitbag_mvm_plugin.menu.shop.account.vendor.header');

        $vendor = $user->getVendor();

        if (null === $vendor || !$vendor->isVerified()) {
            $menu
                ->addChild('new', ['route' => 'vendor_register_form'])
                ->setLabel('bitbag_mvm_plugin.ui.become_a_vendor')
                ->setLabelAttribute('icon', 'star');
        } else {
            $menu
                ->addChild('Attributes', ['route' => 'bitbag_mvm_vendor_draft_attribute_index'])
                ->setLabel('bitbag_mvm_plugin.ui.draft_attributes')
                ->setLabelAttribute('icon', 'clipboard');

            $menu
                ->addChild('Product List', ['route' => 'bitbag_mvm_plugin_vendor_product_listing_index'])
                ->setLabel('bitbag_mvm_plugin.ui.product_list')
                ->setLabelAttribute('icon', 'inbox');

            $menu
                ->addChild('Inventory', ['route' => 'vendor_product_variant_index'])
                ->setLabel('bitbag_mvm_plugin.ui.inventory')
                ->setLabelAttribute('icon', 'clipboard');

            $menu
                ->addChild('Order List', ['route' => 'bitbag_mvm_plugin_order_listing'])
                ->setLabel('bitbag_mvm_plugin.ui.order_list')
                ->setLabelAttribute('icon', 'suitcase');

            $menu
                ->addChild('Clients', ['route' => 'bitbag_mvm_plugin_customer_index'])
                ->setLabel('bitbag_mvm_plugin.ui.clients')
                ->setLabelAttribute('icon', 'users');

            $menu
                ->addChild('Shipping', ['route' => 'vendor_shipping_methods'])
                ->setLabel('bitbag_mvm_plugin.ui.shipping_methods')
                ->setLabelAttribute('icon', 'shipping');

            $menu
                ->addChild('conversations', ['route' => 'bitbag_mvm_plugin_vendor_conversation_index'])
                ->setLabel('bitbag_mvm_plugin.ui.menu.conversations')
                ->setLabelAttribute('icon', 'envelope open');
            $menu
                ->addChild('newes', ['route' => 'vendor_profile'])
                ->setLabel('bitbag_mvm_plugin.ui.vendor_profile')
                ->setLabelAttribute('icon', 'pencil');
        }

        $this->eventDispatcher->dispatch(new MenuBuilderEvent($this->factory, $menu), self::EVENT_NAME);

        return $menu;
    }
}
