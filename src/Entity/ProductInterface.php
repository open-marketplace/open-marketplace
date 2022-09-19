<?php

/*
 * This file has been created by developers from BitBag.
 * Feel free to contact us once you face any issues or want to start
 * You can find more information about us on https://bitbag.io and write us
 * an email on hello@bitbag.io.
 */

declare(strict_types=1);

namespace BitBag\SyliusMultiVendorMarketplacePlugin\Entity;

use BitBag\SyliusMultiVendorMarketplacePlugin\Entity\ProductListing\ProductDraftInterface;
use Sylius\Component\Core\Model\ProductInterface as BaseProductInterface;

interface ProductInterface extends BaseProductInterface
{
    public function getVendor(): ?VendorInterface;

    public function setVendor(?VendorInterface $vendor): void;

    public function resetImages(): void;

    public function setAttributesFrom(ProductDraftInterface $draft): void;

    public function isHidden(): bool;

    public function setHidden(bool $hidden): void;
}
