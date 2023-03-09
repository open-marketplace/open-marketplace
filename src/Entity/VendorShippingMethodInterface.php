<?php

/*
 * This file has been created by developers from BitBag.
 * Feel free to contact us once you face any issues or want to start
 * You can find more information about us on https://bitbag.io and write us
 * an email on hello@bitbag.io.
 */

declare(strict_types=1);

namespace BitBag\OpenMarketplace\Entity;

use Sylius\Component\Core\Model\ShippingMethodInterface;
use Sylius\Component\Resource\Model\ResourceInterface;

interface VendorShippingMethodInterface extends ResourceInterface
{
    public function getVendor(): ?VendorInterface;

    public function setVendor(?VendorInterface $vendor): void;

    public function getShippingMethod(): ?ShippingMethodInterface;

    public function setShippingMethod(?ShippingMethodInterface $shippingMethod): void;

    public function getChannelCode(): ?string;

    public function setChannelCode(?string $channelCode): void;
}
