<?php

/*
 * This file has been created by developers from BitBag.
 * Feel free to contact us once you face any issues or want to start
 * You can find more information about us on https://bitbag.io and write us
 * an email on hello@bitbag.io.
 */

declare(strict_types=1);

namespace BitBag\OpenMarketplace\Api\Messenger\Command\Vendor;

use Sylius\Bundle\ApiBundle\Command\CommandAwareDataTransformerInterface;
use Symfony\Component\HttpFoundation\File\UploadedFile;

interface VendorImageFileAwareInterface extends CommandAwareDataTransformerInterface
{
    public function getFile(): ?UploadedFile;

    public function setFile(?UploadedFile $file): void;
}
