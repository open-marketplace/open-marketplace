<?php

/*
 * This file has been created by developers from BitBag.
 * Feel free to contact us once you face any issues or want to start
 * You can find more information about us on https://bitbag.io and write us
 * an email on hello@bitbag.io.
 */

declare(strict_types=1);

namespace BitBag\OpenMarketplace\Api\Messenger\Command\Vendor;

use BitBag\OpenMarketplace\Entity\VendorAwareInterface;
use Doctrine\Common\Collections\Collection;
use Sylius\Component\Core\Model\TaxonInterface;

interface CreateProductListingInterface extends VendorAwareInterface
{
    public function getCode(): string;

    public function getImages(): array;

    public function getTranslations(): array;

    public function getProductListingPrice(): array;

    public function getAttributes(): array;

    public function getMainTaxon(): ?TaxonInterface;

    public function getProductDraftTaxons(): array;
}