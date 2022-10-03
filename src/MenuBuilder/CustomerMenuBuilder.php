<?php

/*
 * This file has been created by developers from BitBag.
 * Feel free to contact us once you face any issues or want to start
 * You can find more information about us on https://bitbag.io and write us
 * an email on hello@bitbag.io.
 */

declare(strict_types=1);

namespace BitBag\OpenMarketplace\MenuBuilder;

use Knp\Menu\FactoryInterface;
use Knp\Menu\ItemInterface;
use Sylius\Bundle\AdminBundle\Event\CustomerShowMenuBuilderEvent;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;

final class CustomerMenuBuilder
{
    public const EVENT_NAME = 'sylius.menu.vendor.customer.show';

    private FactoryInterface $factory;

    private EventDispatcherInterface $eventDispatcher;

    public function __construct(FactoryInterface $factory, EventDispatcherInterface $eventDispatcher)
    {
        $this->factory = $factory;
        $this->eventDispatcher = $eventDispatcher;
    }

    public function createMenu(array $options): ItemInterface
    {
        $menu = $this->factory->createItem('root');

        if (!isset($options['customer'])) {
            return $menu;
        }

        $customer = $options['customer'];
        $menu
            ->addChild('order_index', [
                'route' => 'open_marketplace_vendor_customer_order_index',
                'routeParameters' => ['id' => $customer->getId()],
            ])
            ->setAttribute('type', 'show')
            ->setLabel('sylius.ui.show_orders')
        ;

        $this->eventDispatcher->dispatch(
            new CustomerShowMenuBuilderEvent($this->factory, $menu, $customer),
            self::EVENT_NAME,
        );

        return $menu;
    }
}
