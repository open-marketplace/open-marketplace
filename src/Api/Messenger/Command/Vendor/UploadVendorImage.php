<?php

/*
 * This file has been created by developers from BitBag.
 * Feel free to contact us once you face any issues or want to start
 * You can find more information about us on https://bitbag.io and write us
 * an email on hello@bitbag.io.
 */

declare(strict_types=1);

namespace BitBag\OpenMarketplace\Api\Messenger\Command\Vendor;

use BitBag\OpenMarketplace\Component\Vendor\Entity\VendorInterface;
use Symfony\Component\HttpFoundation\File\UploadedFile;

final class UploadVendorImage implements UploadVendorImageInterface
{
    private ?UploadedFile $file = null;

    private ?VendorInterface $owner = null;

    public function getFile(): ?UploadedFile
    {
        return $this->file;
    }

    public function setFile(?UploadedFile $file): void
    {
        $this->file = $file;
    }

    public function getOwner(): ?VendorInterface
    {
        return $this->owner;
    }

    public function setOwner(VendorInterface $owner): void
    {
        $this->owner = $owner;
    }
}
