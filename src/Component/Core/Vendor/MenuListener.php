<?php

/*
 * This file has been created by developers from BitBag.
 * Feel free to contact us once you face any issues or want to start
 * You can find more information about us on https://bitbag.io and write us
 * an email on hello@bitbag.io.
 */

declare(strict_types=1);

namespace BitBag\OpenMarketplace\Component\Core\Vendor;

use BitBag\OpenMarketplace\Component\Core\Vendor\Security\Voter\OrderOperationVoter;
use BitBag\OpenMarketplace\Component\Vendor\Contracts\VendorSettlementFrequency;
use BitBag\OpenMarketplace\Component\Vendor\Entity\ShopUserInterface;
use Knp\Menu\FactoryInterface;
use Knp\Menu\ItemInterface;
use SM\Factory\FactoryInterface as StateMachineFactoryInterface;
use Sylius\Bundle\AdminBundle\Event\CustomerShowMenuBuilderEvent;
use Sylius\Bundle\AdminBundle\Event\OrderShowMenuBuilderEvent;
use Sylius\Bundle\UiBundle\Menu\Event\MenuBuilderEvent;
use Sylius\Component\Order\OrderTransitions;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;
use Symfony\Component\Security\Core\Security;
use Symfony\Component\Security\Csrf\CsrfTokenManagerInterface;

final class MenuListener
{
    public function __construct(
        private FactoryInterface $factory,
        private EventDispatcherInterface $eventDispatcher,
        private Security $security,
        private StateMachineFactoryInterface $stateMachineFactory,
        private CsrfTokenManagerInterface $csrfTokenManager
    ) {
    }

    public function createVendorSidebar(array $options): ItemInterface
    {
        /** @var ShopUserInterface $user */
        $user = $this->security->getUser();
        $menu = $this->factory->createItem('root');
        $menu->setLabel('open_marketplace.menu.shop.account.vendor.header');

        $vendor = $user->getVendor();

        if (null !== $vendor && false === $vendor->isEnabled()) {
            $menu
                ->addChild('conversations', ['route' => 'open_marketplace_vendor_messaging_conversation_index'])
                ->setLabel('open_marketplace.ui.menu.conversations')
                ->setLabelAttribute('icon', 'envelope open');

            return $menu;
        }

        if (null === $vendor || !$vendor->isVerified()) {
            $menu
                ->addChild('new', ['route' => 'open_marketplace_vendor_register_form'])
                ->setLabel('open_marketplace.ui.become_a_vendor')
                ->setLabelAttribute('icon', 'star');
        } else {
            $menu
                ->addChild('product_list', ['route' => 'open_marketplace_vendor_product_listings_index'])
                ->setLabel('open_marketplace.ui.product_list')
                ->setLabelAttribute('icon', 'list');

            $menu
                ->addChild('attributes', ['route' => 'open_marketplace_vendor_attributes_index'])
                ->setLabel('open_marketplace.ui.draft_attributes')
                ->setLabelAttribute('icon', 'tag');

            $menu
                ->addChild('inventory', ['route' => 'open_marketplace_vendor_inventory_index'])
                ->setLabel('open_marketplace.ui.inventory')
                ->setLabelAttribute('icon', 'clipboard');

            $menu
                ->addChild('product_reviews', ['route' => 'open_marketplace_vendor_product_review_index'])
                ->setLabel('open_marketplace.ui.menu.product_reviews')
                ->setLabelAttribute('icon', 'star');

            $menu
                ->addChild('order_list', ['route' => 'open_marketplace_vendor_orders_listing'])
                ->setLabel('open_marketplace.ui.order_list')
                ->setLabelAttribute('icon', 'suitcase');

            $menu
                ->addChild('clients', ['route' => 'open_marketplace_vendor_customers_index'])
                ->setLabel('open_marketplace.ui.clients')
                ->setLabelAttribute('icon', 'users');

            $menu
                ->addChild('profile', ['route' => 'open_marketplace_vendor_profile_details'])
                ->setLabel('open_marketplace.ui.vendor_profile')
                ->setLabelAttribute('icon', 'user');
            $menu
                ->addChild('conversations', ['route' => 'open_marketplace_vendor_messaging_conversation_index'])
                ->setLabel('open_marketplace.ui.menu.conversations')
                ->setLabelAttribute('icon', 'envelope open');

            $menu
                ->addChild('settlements', ['route' => 'open_marketplace_vendor_settlements_index'])
                ->setLabel('open_marketplace.ui.settlements')
                ->setLabelAttribute('icon', 'money');

            $menu
                ->addChild('shipping', ['route' => 'open_marketplace_vendor_shipping_methods_form'])
                ->setLabel('open_marketplace.ui.shipping_methods')
                ->setLabelAttribute('icon', 'shipping');
        }

        $eventName = 'open_marketplace.menu.shop.vendor';
        $this->eventDispatcher->dispatch(
            new MenuBuilderEvent($this->factory, $menu),
            $eventName
        );

        return $menu;
    }

    public function addOrderCancelButton(array $options): ItemInterface
    {
        $menu = $this->factory->createItem('root');

        if (!isset($options['order'])) {
            return $menu;
        }

        $order = $options['order'];

        $stateMachine = $this->stateMachineFactory->get($order, OrderTransitions::GRAPH);
        if ($this->security->isGranted(OrderOperationVoter::CANCEL, $order)) {
            $menu
                ->addChild('cancel', [
                    'route' => 'open_marketplace_vendor_orders_cancel',
                    'routeParameters' => [
                        'id' => $order->getId(),
                        '_csrf_token' => $this->csrfTokenManager->getToken((string) $order->getId())->getValue(),
                    ],
                ])
                ->setAttribute('type', 'transition')
                ->setAttribute('confirmation', true)
                ->setLabel('sylius.ui.cancel')
                ->setLabelAttribute('icon', 'ban')
                ->setLabelAttribute('color', 'yellow')
            ;
        }

        $eventName = 'sylius.menu.vendor.order.show';
        $this->eventDispatcher->dispatch(
            new OrderShowMenuBuilderEvent($this->factory, $menu, $order, $stateMachine),
            $eventName
        );

        return $menu;
    }

    public function addShowCustomerOrdersButton(array $options): ItemInterface
    {
        $menu = $this->factory->createItem('root');

        if (!isset($options['customer'])) {
            return $menu;
        }

        $customer = $options['customer'];
        $menu
            ->addChild('order_index', [
                'route' => 'open_marketplace_vendor_customers_order_index',
                'routeParameters' => ['id' => $customer->getId()],
            ])
            ->setAttribute('type', 'show')
            ->setLabel('sylius.ui.show_orders')
        ;

        $eventName = 'sylius.menu.vendor.customer.show';
        $this->eventDispatcher->dispatch(
            new CustomerShowMenuBuilderEvent($this->factory, $menu, $customer),
            $eventName,
        );

        return $menu;
    }
}
