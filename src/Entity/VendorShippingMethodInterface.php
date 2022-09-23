<?php

declare(strict_types=1);

namespace BitBag\SyliusMultiVendorMarketplacePlugin\Entity;

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
