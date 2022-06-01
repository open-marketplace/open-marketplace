<?php

declare(strict_types=1);

namespace BitBag\SyliusMultiVendorMarketplacePlugin\Entity;

final class VendorImage implements VendorImageInterface
{
    private ?int $id;

    private ?string $path;

    private ?VendorInterface $vendor;

    public function getId(): int
    {
        $this->getId();
    }

    public function getPath(): ?string
    {
        return $this->path;
    }

    public function setPath(?string $path): void
    {
        $this->path = $path;
    }

    public function getVendor(): VendorInterface
    {
        return $this->vendor;
    }

    public function setVendor(VendorInterface $vendor): void
    {
        $this->vendor = $vendor;
    }
}
