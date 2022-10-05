<?php

/*
 * This file has been created by developers from BitBag.
 * Feel free to contact us once you face any issues or want to start
 * You can find more information about us on https://bitbag.io and write us
 * an email on hello@bitbag.io.
 */

declare(strict_types=1);

namespace BitBag\OpenMarketplace\Factory;

use BitBag\OpenMarketplace\Entity\OrderInterface;
use BitBag\OpenMarketplace\Entity\ShipmentInterface;
use BitBag\OpenMarketplace\Entity\VendorInterface;
use BitBag\OpenMarketplace\Resolver\VendorShippingMethodsResolverInterface;
use Sylius\Component\Shipping\Exception\UnresolvedDefaultShippingMethodException;
use Sylius\Component\Shipping\Resolver\DefaultShippingMethodResolverInterface;

final class ShipmentFactory implements ShipmentFactoryInterface
{
    private string $shipmentFQN;

    private VendorShippingMethodsResolverInterface $defaultVendorShippingMethodResolver;

    private DefaultShippingMethodResolverInterface $defaultShippingMethodResolver;

    public function __construct(
        string $orderFQN,
        VendorShippingMethodsResolverInterface $defaultVendorShippingMethodResolver,
        DefaultShippingMethodResolverInterface $defaultShippingMethodResolver
    ) {
        $this->shipmentFQN = $orderFQN;
        $this->defaultVendorShippingMethodResolver = $defaultVendorShippingMethodResolver;
        $this->defaultShippingMethodResolver = $defaultShippingMethodResolver;
    }

    public function createNew(): ShipmentInterface
    {
        return new $this->shipmentFQN();
    }

    public function createNewWithOrder(OrderInterface $order): ShipmentInterface
    {
        $shipment = $this->createNew();
        $shipment->setOrder($order);

        return $shipment;
    }

    public function tryCreateNewWithOrderVendorAndDefaultShipment(
        OrderInterface $order,
        ?VendorInterface $vendor,
    ): ?ShipmentInterface {
        $shipment = $this->createNewWithOrder($order);

        try {
            if (null !== $vendor) {
                $shipment->setVendor($vendor);

                $defaultVendorShippingMethod = $this
                    ->defaultVendorShippingMethodResolver
                    ->getDefaultShippingMethod($vendor, $order->getChannel());
                $defaultShippingMethod = $defaultVendorShippingMethod->getShippingMethod();
            } else {
                $defaultShippingMethod = $this->defaultShippingMethodResolver->getDefaultShippingMethod($shipment);
            }

            $shipment->setMethod($defaultShippingMethod);

            return $shipment;
        } catch (UnresolvedDefaultShippingMethodException) {
            return null;
        }
    }
}
