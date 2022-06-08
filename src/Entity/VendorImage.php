<?php

declare(strict_types=1);

namespace BitBag\SyliusMultiVendorMarketplacePlugin\Entity;

class VendorImage implements VendorImageInterface
{
    protected ?int $id;

    protected ?\SplFileInfo $file;

    protected ?string $path;

    protected ?Vendor $owner;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getFile(): ?\SplFileInfo
    {
        return $this->file;
    }

    public function setFile(?\SplFileInfo $file): void
    {
        $this->file = $file;
    }

    public function hasFile(): bool
    {
        return null !== $this->file;
    }

    public function getPath(): ?string
    {
        return $this->path;
    }

    public function setPath(?string $path): void
    {
        $this->path = $path;
    }

    public function getOwner(): ?Vendor
    {
        return $this->owner;
    }

    public function setOwner(Vendor $owner): void
    {
        $this->owner = $owner;
    }
}
