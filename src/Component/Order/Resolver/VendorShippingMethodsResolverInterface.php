<?php

/*
 * This file has been created by developers from BitBag.
 * Feel free to contact us once you face any issues or want to start
 * You can find more information about us on https://bitbag.io and write us
 * an email on hello@bitbag.io.
 */

declare(strict_types=1);

namespace BitBag\OpenMarketplace\Component\Order\Resolver;

use BitBag\OpenMarketplace\Component\Vendor\Entity\VendorInterface;
use BitBag\OpenMarketplace\Component\Vendor\Entity\VendorShippingMethodInterface;
use Sylius\Component\Core\Model\ChannelInterface;
use Sylius\Component\Shipping\Exception\UnresolvedDefaultShippingMethodException;
use Sylius\Component\Shipping\Resolver\ShippingMethodsResolverInterface;

interface VendorShippingMethodsResolverInterface extends ShippingMethodsResolverInterface
{
    /**
     * @throws UnresolvedDefaultShippingMethodException
     */
    public function getDefaultShippingMethod(VendorInterface $vendor, ?ChannelInterface $channel): VendorShippingMethodInterface;
}
