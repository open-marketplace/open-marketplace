<?php

declare(strict_types=1);

namespace BitBag\SyliusMultiVendorMarketplacePlugin\Entity;

use Sylius\Component\Resource\Model\ResourceInterface;

interface VendorInterface extends ResourceInterface
{
    public function getId(): int;

    public function setId(int $id): void;

    public function getCompanyName(): ?string;

    public function setCompanyName(?string $companyName): void;

    public function getTaxIdentifier(): ?string;

    public function setTaxIdentifier(?string $taxIdentifier): void;

    public function getPhoneNumber(): ?string;

    public function setPhoneNumber(?string $phoneNumber): void;

    public function getVendorAddress(): ?VendorAddress;

    public function setVendorAddress(?VendorAddress $vendorAddress): void;
}
