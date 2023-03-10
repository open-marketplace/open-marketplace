<?php

/*
 * This file was created by developers working at BitBag
 * Do you need more information about us and what we do? Visit our https://bitbag.io website!
 * We are hiring developers from all over the world. Join us and start your new, exciting adventure and become part of us: https://bitbag.io/career
*/

declare(strict_types=1);

namespace BitBag\OpenMarketplace\Api\Provider;

use BitBag\OpenMarketplace\Api\Context\VendorContextInterface;
use Sylius\Bundle\ApiBundle\Provider\PathPrefixes;
use Sylius\Bundle\ApiBundle\Provider\PathPrefixProviderInterface;

final class PathPrefixProvider implements PathPrefixProviderInterface
{
    public const VENDOR_PREFIX = 'vendor';

    private PathPrefixProviderInterface $basePathPrefixProvider;

    private VendorContextInterface $vendorContext;

    private string $shopVendorApiUriBeginning;

    public function __construct(
        PathPrefixProviderInterface $basePathPrefixProvider,
        VendorContextInterface $vendorContext,
        string $shopVendorApiUriBeginning,
        ) {
        $this->basePathPrefixProvider = $basePathPrefixProvider;
        $this->vendorContext = $vendorContext;
        $this->shopVendorApiUriBeginning = $shopVendorApiUriBeginning;
    }

    public function getPathPrefix(string $path): ?string
    {
        if (str_starts_with($path, $this->shopVendorApiUriBeginning)) {
            return self::VENDOR_PREFIX;
        }

        return $this->basePathPrefixProvider->getPathPrefix($path);
    }

    public function getCurrentPrefix(): ?string
    {
        if (null !== $this->vendorContext->getVendor()) {
            return sprintf('%s_%s', PathPrefixes::SHOP_PREFIX, self::VENDOR_PREFIX);
        }

        return $this->basePathPrefixProvider->getCurrentPrefix();
    }
}
