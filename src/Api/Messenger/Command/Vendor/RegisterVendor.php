<?php

/*
 * This file has been created by developers from BitBag.
 * Feel free to contact us once you face any issues or want to start
 * You can find more information about us on https://bitbag.io and write us
 * an email on hello@bitbag.io.
 */

declare(strict_types=1);

namespace BitBag\OpenMarketplace\Api\Messenger\Command\Vendor;

use BitBag\OpenMarketplace\Api\Messenger\Command\ShopUserAwareInterface;
use BitBag\OpenMarketplace\Api\Messenger\Command\VendorSlugAwareInterface;
use BitBag\OpenMarketplace\Entity\ShopUserInterface;
use BitBag\OpenMarketplace\Entity\VendorAddress;

class RegisterVendor implements ShopUserAwareInterface, VendorSlugAwareInterface
{
    /**
     * @psalm-immutable
     *
     * @var string
     */
    public $companyName;

    /**
     * @psalm-immutable
     *
     * @var string
     */
    public $taxIdentifier;

    /**
     * @psalm-immutable
     *
     * @var string
     */
    public $phoneNumber;

    /**
     * @psalm-immutable
     *
     * @var string
     */
    public $description;

    /**
     * @psalm-immutable
     *
     * @var VendorAddress
     */
    public $vendorAddress;

    /** @var string|null */
    public $slug;

    /** @var ShopUserInterface|null */
    public $shopUser;

    public function __construct(
        string $companyName,
        string $taxIdentifier,
        string $phoneNumber,
        string $description,
        VendorAddress $vendorAddress
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
