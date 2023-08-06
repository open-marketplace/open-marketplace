<?php

/*
 * This file was created by developers working at BitBag
 * Do you need more information about us and what we do? Visit our https://bitbag.io website!
 * We are hiring developers from all over the world. Join us and start your new, exciting adventure and become part of us: https://bitbag.io/career
*/

declare(strict_types=1);

namespace BitBag\OpenMarketplace\Api\SectionResolver;

use BitBag\OpenMarketplace\Api\Factory\ShopVendorApiSectionFactoryInterface;
use Sylius\Bundle\CoreBundle\SectionResolver\SectionCannotBeResolvedException;
use Sylius\Bundle\CoreBundle\SectionResolver\SectionInterface;
use Sylius\Bundle\CoreBundle\SectionResolver\UriBasedSectionResolverInterface;

final class ShopVendorApiUriBasedSectionResolver implements UriBasedSectionResolverInterface
{
    private string $shopVendorApiUriBeginning;

    private ShopVendorApiSectionFactoryInterface $shopVendorApiSectionFactory;

    public function __construct(
        string $shopVendorApiUriBeginning,
        ShopVendorApiSectionFactoryInterface $shopVendorApiSectionFactory,
    ) {
        $this->shopVendorApiUriBeginning = $shopVendorApiUriBeginning;
        $this->shopVendorApiSectionFactory = $shopVendorApiSectionFactory;
    }

    public function getSection(string $uri): SectionInterface
    {
        if (!str_starts_with($uri, $this->shopVendorApiUriBeginning)) {
            throw new SectionCannotBeResolvedException();
        }

        return $this->shopVendorApiSectionFactory->createNew();
    }
}
