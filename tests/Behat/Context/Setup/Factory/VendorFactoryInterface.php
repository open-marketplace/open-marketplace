<?php

declare(strict_types=1);

namespace Tests\BitBag\OpenMarketplace\Behat\Context\Setup\Factory;

use BitBag\OpenMarketplace\Entity\VendorInterface;
use DateTimeInterface;

interface VendorFactoryInterface
{
    public function createVendor(
        string $companyName,
        string $taxIdentifier,
        string $phoneNumber,
        string $slug,
        string $description,
        string $status,
        ?DateTimeInterface $editedAt = null
    ): VendorInterface;
}
