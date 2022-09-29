<?php

declare(strict_types=1);

namespace spec\BitBag\SyliusMultiVendorMarketplacePlugin\Resolver;

use BitBag\SyliusMultiVendorMarketplacePlugin\Entity\OrderInterface;
use BitBag\SyliusMultiVendorMarketplacePlugin\Entity\ShipmentInterface;
use BitBag\SyliusMultiVendorMarketplacePlugin\Entity\VendorInterface;
use BitBag\SyliusMultiVendorMarketplacePlugin\Entity\VendorShippingMethodInterface;
use BitBag\SyliusMultiVendorMarketplacePlugin\Repository\VendorShippingMethodRepositoryInterface;
use BitBag\SyliusMultiVendorMarketplacePlugin\Resolver\VendorShippingMethodsResolver;
use BitBag\SyliusMultiVendorMarketplacePlugin\Resolver\VendorShippingMethodsResolverInterface;
use PhpSpec\ObjectBehavior;
use Sylius\Component\Core\Model\ChannelInterface;
use Sylius\Component\Core\Model\ShippingMethodInterface;
use Sylius\Component\Shipping\Exception\UnresolvedDefaultShippingMethodException;
use Sylius\Component\Shipping\Resolver\ShippingMethodsResolverInterface;

class VendorShippingMethodsResolverSpec extends ObjectBehavior
{
    public function let(
        VendorShippingMethodRepositoryInterface $vendorShippingMethodRepository,
        ShippingMethodsResolverInterface $shippingMethodsResolver
    ): void {
        $this->beConstructedWith($vendorShippingMethodRepository, $shippingMethodsResolver);
    }

    public function it_is_initializable(): void
    {
        $this->shouldHaveType(VendorShippingMethodsResolver::class);
        $this->shouldImplement(VendorShippingMethodsResolverInterface::class);
    }

    public function it_returns_default_shipping_method_for_vendor(
        VendorInterface $vendor,
        ChannelInterface $channel,
        VendorShippingMethodInterface $vendorShippingMethod,
        VendorShippingMethodRepositoryInterface $vendorShippingMethodRepository
    ): void {
        $vendorShippingMethodRepository->findEnabledForChannel($vendor, $channel)->willReturn([$vendorShippingMethod]);

        $this->getDefaultShippingMethod($vendor, $channel)->shouldReturn($vendorShippingMethod);
    }

    public function it_does_not_return_default_shipping_method_for_vendor(
        VendorInterface $vendor,
        ChannelInterface $channel,
        VendorShippingMethodRepositoryInterface $vendorShippingMethodRepository
    ): void {
        $vendorShippingMethodRepository->findEnabledForChannel($vendor, $channel)->willReturn([]);

        $this
            ->shouldThrow(UnresolvedDefaultShippingMethodException::class)
            ->duringGetDefaultShippingMethod($vendor, $channel)
        ;
    }

    public function it_returns_default_shipping_methods_for_shipment_without_vendor(
        ShipmentInterface $subject,
        ShippingMethodsResolverInterface $shippingMethodsResolver
    ): void {
        $subject->hasVendor()->willReturn(false);

        $shippingMethodsResolver->getSupportedMethods($subject)->shouldBeCalled();

        $this->getSupportedMethods($subject);
    }

    public function it_returns_default_shipping_methods_for_shipment_with_vendor(
        ShipmentInterface $subject,
        ShippingMethodsResolverInterface $shippingMethodsResolver,
        VendorShippingMethodRepositoryInterface $vendorShippingMethodRepository,
        VendorInterface $vendor,
        OrderInterface $order,
        ChannelInterface $channel,
        VendorShippingMethodInterface $vendorShippingMethod1,
        VendorShippingMethodInterface $vendorShippingMethod2,
        ShippingMethodInterface $shippingMethod1,
        ShippingMethodInterface $shippingMethod2
    ): void {
        $subject->hasVendor()->willReturn(true);
        $subject->getVendor()->willReturn($vendor);
        $subject->getOrder()->willReturn($order);
        $order->getChannel()->willReturn($channel);
        $vendorShippingMethod1->getShippingMethod()->willReturn($shippingMethod1);
        $vendorShippingMethod2->getShippingMethod()->willReturn($shippingMethod2);

        $shippingMethodsResolver->getSupportedMethods($subject)->shouldNotBeCalled();
        $vendorShippingMethodRepository
            ->findEnabledForChannel($vendor, $channel)
            ->willReturn([$vendorShippingMethod1, $vendorShippingMethod2])
        ;

        $this->getSupportedMethods($subject)->shouldReturn([$shippingMethod1, $shippingMethod2]);
    }
}
