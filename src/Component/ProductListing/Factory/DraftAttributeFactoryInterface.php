<?php

/*
 * This file has been created by developers from BitBag.
 * Feel free to contact us once you face any issues or want to start
 * You can find more information about us on https://bitbag.io and write us
 * an email on hello@bitbag.io.
 */

declare(strict_types=1);

namespace BitBag\OpenMarketplace\Component\ProductListing\Factory;

use BitBag\OpenMarketplace\Component\ProductListing\Entity\DraftAttributeInterface;
use BitBag\OpenMarketplace\Entity\VendorInterface;
use Sylius\Component\Resource\Factory\FactoryInterface;

interface DraftAttributeFactoryInterface extends FactoryInterface
{
    public function createTyped(
        string $type,
        VendorInterface $vendor
    ): DraftAttributeInterface;
}
