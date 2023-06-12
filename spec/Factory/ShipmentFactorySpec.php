<?php

/*
 * This file has been created by developers from BitBag.
 * Feel free to contact us once you face any issues or want to start
 * You can find more information about us on https://bitbag.io and write us
 * an email on hello@bitbag.io.
 */

declare(strict_types=1);

namespace spec\BitBag\OpenMarketplace\Factory;

use BitBag\OpenMarketplace\Component\Order\Entity\OrderInterface;
use BitBag\OpenMarketplace\Entity\Shipment;
use BitBag\OpenMarketplace\Entity\VendorInterface;
use BitBag\OpenMarketplace\Entity\VendorShippingMethodInterface;
use BitBag\OpenMarketplace\Factory\ShipmentFactory;
use BitBag\OpenMarketplace\Factory\ShipmentFactoryInterface;
use BitBag\OpenMarketplace\Resolver\VendorShippingMethodsResolverInterface;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use Sylius\Component\Core\Model\ChannelInterface;
use Sylius\Component\Core\Model\ShippingMethodInterface;
use Sylius\Component\Shipping\Resolver\DefaultShippingMethodResolverInterface;

class ShipmentFactorySpec extends ObjectBehavior
{
    public function let(
        VendorShippingMethodsResolverInterface $defaultVendorShippingMethodResolver,
        DefaultShippingMethodResolverInterface $defaultShippingMethodResolver
    ): void {
        $this
            ->beConstructedWith(
                Shipment::class,
                $defaultVendorShippingMethodResolver,
                $defaultShippingMethodResolver
            )
        ;
    }

    public function it_is_initializable(): void
    {
        $this->shouldHaveType(ShipmentFactory::class);
        $this->shouldImplement(ShipmentFactoryInterface::class);
    }

    public function it_creates_object(): void
    {
        $this->createNew()->shouldBeAnInstanceOf(Shipment::class);
    }

    public function it_creates_object_with_order(OrderInterface $order): void
    {
        $shipment = $this->createNewWithOrder($order);
        $shipment->shouldBeAnInstanceOf(Shipment::class);
        $shipment->getOrder()->shouldBe($order);
    }

    public function it_tries_to_create_object_with_default_shipment_and_vendor(
        OrderInterface $order,
        ChannelInterface $channel,
        VendorInterface $vendor,
        VendorShippingMethodInterface $vendorShippingMethod,
        ShippingMethodInterface $shippingMethod,
        VendorShippingMethodsResolverInterface $defaultVendorShippingMethodResolver
    ): void {
        $order->getChannel()->willReturn($channel);

        $defaultVendorShippingMethodResolver
            ->getDefaultShippingMethod($vendor, $channel)
            ->willReturn($vendorShippingMethod)
        ;
        $vendorShippingMethod->getShippingMethod()->willReturn($shippingMethod);

        $shipment = $this->tryCreateNewWithOrderVendorAndDefaultShipment($order, $vendor);

        $shipment->getOrder()->shouldBe($order);
        $shipment->getVendor()->shouldBe($vendor);
        $shipment->getMethod()->shouldBe($shippingMethod);
    }

    public function it_tries_to_create_object_with_default_shipment_and_without_vendor(
        OrderInterface $order,
        ChannelInterface $channel,
        ShippingMethodInterface $shippingMethod,
        DefaultShippingMethodResolverInterface $defaultShippingMethodResolver
    ): void {
        $order->getChannel()->willReturn($channel);

        $defaultShippingMethodResolver
            ->getDefaultShippingMethod(Argument::type(Shipment::class))
            ->willReturn($shippingMethod)
        ;

        $shipment = $this->tryCreateNewWithOrderVendorAndDefaultShipment($order, null);

        $shipment->getOrder()->shouldBe($order);
        $shipment->getMethod()->shouldBe($shippingMethod);
    }
}
