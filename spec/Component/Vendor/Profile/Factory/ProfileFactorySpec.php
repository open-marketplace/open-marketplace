<?php

/*
 * This file has been created by developers from BitBag.
 * Feel free to contact us once you face any issues or want to start
 * You can find more information about us on https://bitbag.io and write us
 * an email on hello@bitbag.io.
 */

declare(strict_types=1);

namespace spec\BitBag\OpenMarketplace\Component\Vendor\Profile\Factory;

use BitBag\OpenMarketplace\Component\Vendor\Entity\AddressInterface;
use BitBag\OpenMarketplace\Component\Vendor\Entity\ProfileInterface;
use BitBag\OpenMarketplace\Component\Vendor\Entity\Vendor;
use BitBag\OpenMarketplace\Component\Vendor\Profile\Factory\ProfileFactory;
use PhpSpec\ObjectBehavior;
use Sylius\Component\Resource\Factory\FactoryInterface;

final class ProfileFactorySpec extends ObjectBehavior
{
    public function let(
        FactoryInterface $vendorFactory
    ): void {
        $this->beConstructedWith(
            $vendorFactory
        );
    }

    public function it_is_initializable(): void
    {
        $this->shouldHaveType(ProfileFactory::class);
    }

    public function it_returns_vendor(FactoryInterface $vendorFactory): void
    {
        $vendorFactory->createNew()->willReturn(new Vendor());
        $this->createNew()->shouldHaveType(ProfileInterface::class);
    }

    public function it_returns_valid_address(AddressInterface $vendorAddress, FactoryInterface $vendorFactory): void
    {
        $vendorFactory->createNew()->willReturn(new Vendor());
        $vendor = $this->createVendor('some street', 'City', 'iban', '22-111', 'description', $vendorAddress);
        $vendor->shouldHaveType(ProfileInterface::class);
        $vendor->getVendorAddress()->shouldBeEqualTo($vendorAddress);
    }
}
