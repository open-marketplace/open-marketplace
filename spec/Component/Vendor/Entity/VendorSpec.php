<?php

/*
 * This file has been created by developers from BitBag.
 * Feel free to contact us once you face any issues or want to start
 * You can find more information about us on https://bitbag.io and write us
 * an email on hello@bitbag.io.
 */

declare(strict_types=1);

namespace spec\BitBag\OpenMarketplace\Component\Vendor\Entity;

use BitBag\OpenMarketplace\Component\Vendor\Entity\Vendor;
use BitBag\OpenMarketplace\Component\Vendor\Entity\VendorInterface;
use BitBag\OpenMarketplace\Component\Vendor\Entity\VendorShippingMethodInterface;
use PhpSpec\ObjectBehavior;

final class VendorSpec extends ObjectBehavior
{
    public function it_is_initializable(): void
    {
        $this->shouldHaveType(Vendor::class);
    }

    public function it_should_implement_interface(): void
    {
        $this->shouldImplement(VendorInterface::class);
    }

    public function it_has_shipping_method(VendorShippingMethodInterface $shippingMethod): void
    {
        $this->addShippingMethod($shippingMethod);

        $this->hasShippingMethod($shippingMethod)->shouldReturn(true);
    }

    public function it_doesnt_have_shipping_method(VendorShippingMethodInterface $shippingMethod): void
    {
        $this->hasShippingMethod($shippingMethod)->shouldReturn(false);
    }

    public function it_adds_shipping_method(VendorShippingMethodInterface $shippingMethod): void
    {
        $this->addShippingMethod($shippingMethod);

        $this->getShippingMethods()->contains($shippingMethod)->shouldBe(true);
    }

    public function it_removes_shipping_method(VendorShippingMethodInterface $shippingMethod): void
    {
        $this->addShippingMethod($shippingMethod);
        $this->removeShippingMethod($shippingMethod);

        $this->getShippingMethods()->contains($shippingMethod)->shouldBe(false);
    }
}
