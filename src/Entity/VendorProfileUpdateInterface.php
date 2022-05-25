<?php
/*
 * This file has been created by developers from BitBag.
 * Feel free to contact us once you face any issues or want to start
 * You can find more information about us on https://bitbag.io and write us
 * an email on hello@bitbag.io.
 */
declare(strict_types=1);

namespace BitBag\SyliusMultiVendorMarketplacePlugin\Entity;

interface VendorProfileUpdateInterface
{
    public function getId(): int;

    public function setId(int $id): void;

    public function getVendor(): ?Vendor;

    public function setVendor(?Vendor $vendor): void;

    public function getCompanyName(): ?string;

    public function setCompanyName(?string $companyName): void;

    public function getTaxIdentifier(): ?string;

    public function setTaxIdentifier(?string $taxIdentifier): void;

    public function getPhoneNumber(): ?string;

    public function setPhoneNumber(?string $phoneNumber): void;

    public function getVendorAddress(): ?VendorAddress;

    public function setVendorAddress(?VendorAddress $vendorAddress): void;
}
