<?php

/*
 * This file was created by developers working at BitBag
 * Do you need more information about us and what we do? Visit our https://bitbag.io website!
 * We are hiring developers from all over the world. Join us and start your new, exciting adventure and become part of us: https://bitbag.io/career
*/

declare(strict_types=1);

namespace BitBag\OpenMarketplace\Factory;

use BitBag\OpenMarketplace\Api\SectionResolver\ShopVendorApiSection;
use Sylius\Component\Resource\Factory\FactoryInterface;

interface ShopVendorApiSectionFactoryInterface extends FactoryInterface
{
    public function createNew(): ShopVendorApiSection;
}
