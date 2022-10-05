<?php

/*
 * This file has been created by developers from BitBag.
 * Feel free to contact us once you face any issues or want to start
 * You can find more information about us on https://bitbag.io and write us
 * an email on hello@bitbag.io.
 */

declare(strict_types=1);

namespace BitBag\OpenMarketplace\Entity;

class VendorProfileUpdateImage implements VendorImageInterface
{
    protected ?int $id;

    protected ?\SplFileInfo $file = null;

    protected ?string $path = null;

    protected ?object $owner;

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

    public function getOwner(): ?object
    {
        return $this->owner;
    }

    public function setOwner($owner): void
    {
        $this->owner = $owner;
    }

    public function getType(): ?string
    {
        return 'image';
    }

    public function setType(?string $type): void
    {
    }
}
