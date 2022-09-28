<?php

/*
 * This file has been created by developers from BitBag.
 * Feel free to contact us once you face any issues or want to start
 * You can find more information about us on https://bitbag.io and write us
 * an email on hello@bitbag.io.
 */

declare(strict_types=1);

namespace BitBag\SyliusMultiVendorMarketplacePlugin\Resolver;

use BitBag\SyliusMultiVendorMarketplacePlugin\Entity\ShipmentInterface;
use BitBag\SyliusMultiVendorMarketplacePlugin\Entity\VendorInterface;
use BitBag\SyliusMultiVendorMarketplacePlugin\Entity\VendorShippingMethodInterface;
use Sylius\Component\Core\Model\ChannelInterface;
use Sylius\Component\Shipping\Exception\UnresolvedDefaultShippingMethodException;

interface VendorShippingMethodsResolverInterface
{
    /**
     * @throws UnresolvedDefaultShippingMethodException
     */
    public function getDefaultShippingMethod(VendorInterface $vendor, ?ChannelInterface $channel): VendorShippingMethodInterface;

    public function getSupportedMethods(ShipmentInterface $subject): array;
}
