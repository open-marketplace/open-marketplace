<?php

/*
 * This file has been created by developers from BitBag.
 * Feel free to contact us once you face any issues or want to start
 * You can find more information about us on https://bitbag.io and write us
 * an email on hello@bitbag.io.
 */

declare(strict_types=1);

namespace BitBag\OpenMarketplace\Component\Product\Factory;

use BitBag\OpenMarketplace\Component\ProductListing\Entity\DraftAttributeInterface;
use Sylius\Component\Product\Model\ProductAttributeInterface;

interface ProductAttributeFactoryInterface
{
    public function createClone(DraftAttributeInterface $draftAttribute): ProductAttributeInterface;
}
