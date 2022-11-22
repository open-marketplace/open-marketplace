<?php

declare(strict_types=1);

namespace spec\BitBag\OpenMarketplace\Api\Messenger\Command\Vendor;

use BitBag\OpenMarketplace\Api\Messenger\Command\ShopUserAwareInterface;
use BitBag\OpenMarketplace\Api\Messenger\Command\Vendor\RegisterVendor;
use BitBag\OpenMarketplace\Api\Messenger\Command\VendorSlugAwareInterface;
use BitBag\OpenMarketplace\Entity\ShopUserInterface;
use BitBag\OpenMarketplace\Entity\VendorAddress;
use PhpSpec\ObjectBehavior;

class RegisterVendorSpec extends ObjectBehavior
{
    public function let(
        VendorAddress $vendorAddress
    ): void {
        $this->beConstructedWith('companyName', 'taxIdentifier', 'phoneNumber', 'description', $vendorAddress);
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(RegisterVendor::class);
        $this->shouldImplement(ShopUserAwareInterface::class);
        $this->shouldImplement(VendorSlugAwareInterface::class);
    }

    public function it_has_company_name(): void
    {
        $this->companyName->shouldReturn('companyName');
        $this->getCompanyName()->shouldReturn('companyName');
    }

    public function it_has_tax_identifier(): void
    {
        $this->taxIdentifier->shouldReturn('taxIdentifier');
    }

    public function it_has_phone_number(): void
    {
        $this->phoneNumber->shouldReturn('phoneNumber');
    }

    public function it_has_description(): void
    {
        $this->description->shouldReturn('description');
    }

    public function it_has_vendor_address(VendorAddress $vendorAddress): void
    {
        $this->vendorAddress->shouldReturn($vendorAddress);
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
