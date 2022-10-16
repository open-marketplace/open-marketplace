<?php

/*
 * This file has been created by developers from BitBag.
 * Feel free to contact us once you face any issues or want to start
 * You can find more information about us on https://bitbag.io and write us
 * an email on hello@bitbag.io.
 */

declare(strict_types=1);

namespace BitBag\OpenMarketplace\Menu;

use BitBag\OpenMarketplace\Entity\ShopUserInterface;
use BitBag\OpenMarketplace\Provider\VendorProviderInterface;
use Knp\Menu\FactoryInterface;
use Knp\Menu\ItemInterface;
use Sylius\Bundle\UiBundle\Menu\Event\MenuBuilderEvent;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;
use Symfony\Component\Security\Core\Security;

final class VendorMenuBuilder
{
    public const EVENT_NAME = 'open_marketplace.menu.shop.vendor';

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
        $menu->setLabel('open_marketplace.menu.shop.account.vendor.header');

        $vendor = $user->getVendor();

        if ($vendor->isEnabled() === false) {
            $menu
                ->addChild('Conversations', ['route' => 'open_marketplace_vendor_conversation_index'])
                ->setLabel('open_marketplace.ui.menu.conversations')
                ->setLabelAttribute('icon', 'envelope open');

            return $menu;
        }

        if (null === $vendor || !$vendor->isVerified()) {
            $menu
                ->addChild('new', ['route' => 'vendor_register_form'])
                ->setLabel('open_marketplace.ui.become_a_vendor')
                ->setLabelAttribute('icon', 'star');
        } else {
            $menu
                ->addChild('Product List', ['route' => 'open_marketplace_vendor_product_listing_index'])
                ->setLabel('open_marketplace.ui.product_list')
                ->setLabelAttribute('icon', 'inbox');

            $menu
                ->addChild('Inventory', ['route' => 'vendor_product_variant_index'])
                ->setLabel('open_marketplace.ui.inventory')
                ->setLabelAttribute('icon', 'clipboard');

            $menu
                ->addChild('Attributes', ['route' => 'bitbag_open_marketplace_vendor_draft_attribute_index'])
                ->setLabel('open_marketplace.ui.draft_attributes')
                ->setLabelAttribute('icon', 'tag');

            $menu
                ->addChild('Order List', ['route' => 'open_marketplace_order_listing'])
                ->setLabel('open_marketplace.ui.order_list')
                ->setLabelAttribute('icon', 'suitcase');

            $menu
                ->addChild('Clients', ['route' => 'open_marketplace_customer_index'])
                ->setLabel('open_marketplace.ui.clients')
                ->setLabelAttribute('icon', 'users');

            $menu
                ->addChild('Shipping', ['route' => 'vendor_shipping_methods'])
                ->setLabel('open_marketplace.ui.shipping_methods')
                ->setLabelAttribute('icon', 'shipping');

            $menu
                ->addChild('Profile', ['route' => 'vendor_profile'])
                ->setLabel('open_marketplace.ui.vendor_profile')
                ->setLabelAttribute('icon', 'pencil');
            $menu
                ->addChild('Conversations', ['route' => 'open_marketplace_vendor_conversation_index'])
                ->setLabel('open_marketplace.ui.menu.conversations')
                ->setLabelAttribute('icon', 'envelope open');
        }

        $this->eventDispatcher->dispatch(new MenuBuilderEvent($this->factory, $menu), self::EVENT_NAME);

        return $menu;
    }
}
