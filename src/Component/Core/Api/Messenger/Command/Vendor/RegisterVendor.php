<?php

/*
 * This file has been created by developers from BitBag.
 * Feel free to contact us once you face any issues or want to start
 * You can find more information about us on https://bitbag.io and write us
 * an email on hello@bitbag.io.
 */

declare(strict_types=1);

namespace BitBag\OpenMarketplace\Component\Core\Api\Messenger\Command\Vendor;

use BitBag\OpenMarketplace\Component\Core\Api\Messenger\Command\Vendor\RegisterVendorInterface;
use BitBag\OpenMarketplace\Component\Vendor\Entity\Address;
use BitBag\OpenMarketplace\Component\Vendor\Entity\ShopUserInterface;

final class RegisterVendor implements RegisterVendorInterface
{
    private string $companyName;

    private string $taxIdentifier;

    private string $phoneNumber;

    private string $description;

    private Address $vendorAddress;

    private ?string $slug = null;

    private ?ShopUserInterface $shopUser = null;

    public function __construct(
        string $companyName,
        string $taxIdentifier,
        string $phoneNumber,
        string $description,
        Address $vendorAddress
    ) {
        $this->companyName = $companyName;
        $this->taxIdentifier = $taxIdentifier;
        $this->phoneNumber = $phoneNumber;
        $this->description = $description;
        $this->vendorAddress = $vendorAddress;
    }

    public function getCompanyName(): string
    {
        return $this->companyName;
    }

    public function getTaxIdentifier(): string
    {
        return $this->taxIdentifier;
    }

    public function getPhoneNumber(): string
    {
        return $this->phoneNumber;
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    public function getVendorAddress(): Address
    {
        return $this->vendorAddress;
    }

    public function getSlug(): ?string
    {
        return $this->slug;
    }

    public function setSlug(?string $slug): void
    {
        $this->slug = $slug;
    }

    public function getShopUser(): ?ShopUserInterface
    {
        return $this->shopUser;
    }

    public function setShopUser(?ShopUserInterface $shopUser): void
    {
        $this->shopUser = $shopUser;
    }
}
