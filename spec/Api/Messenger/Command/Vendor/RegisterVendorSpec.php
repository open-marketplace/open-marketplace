<?php

/*
 * This file has been created by developers from BitBag.
 * Feel free to contact us once you face any issues or want to start
 * You can find more information about us on https://bitbag.io and write us
 * an email on hello@bitbag.io.
 */

declare(strict_types=1);

namespace spec\BitBag\OpenMarketplace\Api\Messenger\Command\Vendor;

use BitBag\OpenMarketplace\Api\Messenger\Command\ShopUserAwareInterface;
use BitBag\OpenMarketplace\Api\Messenger\Command\Vendor\RegisterVendor;
use BitBag\OpenMarketplace\Api\Messenger\Command\VendorSlugAwareInterface;
use BitBag\OpenMarketplace\Component\Vendor\Entity\Address;
use BitBag\OpenMarketplace\Component\Vendor\Entity\ShopUserInterface;
use PhpSpec\ObjectBehavior;

final class RegisterVendorSpec extends ObjectBehavior
{
    public function let(
        Address $vendorAddress
    ): void {
        $this->beConstructedWith('companyName', 'taxIdentifier', 'phoneNumber', 'description', $vendorAddress);
    }

    public function it_is_initializable(): void
    {
        $this->shouldHaveType(RegisterVendor::class);
        $this->shouldImplement(ShopUserAwareInterface::class);
        $this->shouldImplement(VendorSlugAwareInterface::class);
    }

    public function it_has_company_name(): void
    {
        $this->getCompanyName()->shouldReturn('companyName');
    }

    public function it_has_tax_identifier(): void
    {
        $this->getTaxIdentifier()->shouldReturn('taxIdentifier');
    }

    public function it_has_phone_number(): void
    {
        $this->getPhoneNumber()->shouldReturn('phoneNumber');
    }

    public function it_has_description(): void
    {
        $this->getDescription()->shouldReturn('description');
    }

    public function it_has_vendor_address(Address $vendorAddress): void
    {
        $this->getVendorAddress()->shouldReturn($vendorAddress);
    }

    public function it_has_slug(): void
    {
        $this->setSlug('slug');
        $this->getSlug()->shouldReturn('slug');
    }

    public function it_has_shop_user(ShopUserInterface $shopUser): void
    {
        $this->setShopUser($shopUser);
        $this->getShopUser()->shouldReturn($shopUser);
    }
}
