<?php

/*
 * This file has been created by developers from BitBag.
 * Feel free to contact us once you face any issues or want to start
 * You can find more information about us on https://bitbag.io and write us
 * an email on hello@bitbag.io.
 */

declare(strict_types=1);

namespace BitBag\SyliusMultiVendorMarketplacePlugin\MenuBuilder;

use Knp\Menu\FactoryInterface;
use Knp\Menu\ItemInterface;
use SM\Factory\FactoryInterface as StateMachineFactoryInterface;
use Sylius\Bundle\AdminBundle\Event\OrderShowMenuBuilderEvent;
use Sylius\Component\Core\OrderPaymentStates;
use Sylius\Component\Order\OrderTransitions;
use Sylius\Component\Payment\PaymentTransitions;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;
use Symfony\Component\Security\Csrf\CsrfTokenManagerInterface;

final class OrderMenuBuilder
{
    public const EVENT_NAME = 'sylius.menu.vendor.order.show';

    private FactoryInterface $factory;

    private EventDispatcherInterface $eventDispatcher;

    private StateMachineFactoryInterface $stateMachineFactory;

    private CsrfTokenManagerInterface $csrfTokenManager;

    public function __construct(
        FactoryInterface $factory,
        EventDispatcherInterface $eventDispatcher,
        StateMachineFactoryInterface $stateMachineFactory,
        CsrfTokenManagerInterface $csrfTokenManager
    ) {
        $this->factory = $factory;
        $this->eventDispatcher = $eventDispatcher;
        $this->stateMachineFactory = $stateMachineFactory;
        $this->csrfTokenManager = $csrfTokenManager;
    }

    public function createMenu(array $options): ItemInterface
    {
        $menu = $this->factory->createItem('root');

        if (!isset($options['order'])) {
            return $menu;
        }

        $order = $options['order'];

        $stateMachine = $this->stateMachineFactory->get($order, OrderTransitions::GRAPH);
        if ($stateMachine->can(OrderTransitions::TRANSITION_CANCEL)
            && OrderPaymentStates::STATE_PAID == $order->getPaymentState()
        ) {
            $menu
                ->addChild('cancel', [
                    'route' => 'bitbag_mvm_plugin_vendor_order_cancel',
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

        $this->eventDispatcher->dispatch(
            new OrderShowMenuBuilderEvent($this->factory, $menu, $order, $stateMachine),
            self::EVENT_NAME
        );

        return $menu;
    }
}
