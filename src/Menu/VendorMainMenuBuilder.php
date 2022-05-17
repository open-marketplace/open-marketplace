<?php

declare(strict_types=1);

namespace BitBag\SyliusMultiVendorMarketplacePlugin\Menu;

use Knp\Menu\FactoryInterface;
use Knp\Menu\ItemInterface;
use Sylius\Bundle\UiBundle\Menu\Event\MenuBuilderEvent;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;

final class VendorMainMenuBuilder
{
    public const EVENT_NAME = 'app.menu.vendor.main';

    private FactoryInterface $factory;

    private EventDispatcherInterface $eventDispatcher;

    public function __construct(FactoryInterface $factory, EventDispatcherInterface $eventDispatcher)
    {
        $this->factory = $factory;
        $this->eventDispatcher = $eventDispatcher;
    }

    public function createMenu(array $options): ItemInterface
    {
        $menu = $this->factory->createItem('app.ui.vendor.account.header');

        $this->eventDispatcher->dispatch(new MenuBuilderEvent($this->factory, $menu), self::EVENT_NAME);

        return $menu;
    }
}
