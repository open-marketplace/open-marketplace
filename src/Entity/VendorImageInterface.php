<?php

declare(strict_types=1);

namespace BitBag\SyliusMultiVendorMarketplacePlugin\Entity;

interface VendorImageInterface
{
    public function getId(): ?int;

    public function getPath(): ?string;

    public function setPath(?string $path): void;

    public function getVendor(): ?VendorInterface;

    public function setVendor(VendorInterface $vendor): void;
}
