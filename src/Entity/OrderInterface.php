<?php

/*
 * This file has been created by developers from BitBag.
 * Feel free to contact us once you face any issues or want to start
 * You can find more information about us on https://bitbag.io and write us
 * an email on hello@bitbag.io.
 */

declare(strict_types=1);

namespace BitBag\SyliusMultiVendorMarketplacePlugin\Entity;

use Doctrine\Common\Collections\Collection;
use Sylius\Component\Core\Model\OrderInterface as BaseOrderInterface;

interface OrderInterface extends BaseOrderInterface
{
    public function getVendor(): ?VendorInterface;

    public function setVendor(?VendorInterface $vendor): void;

    public function getPrimaryOrder(): ?self;

    public function setPrimaryOrder(?self $primaryOrder): void;

    public function addSecondaryOrder(self $secondaryOrder): void;

    /** @return Collection<int, OrderInterface> */
    public function getSecondaryOrders(): Collection;

    public function hasVendorItems(): bool;

    public function hasVendorShipment(VendorInterface $vendor): bool;

    public function hasShipmentWithoutVendor(): bool;

    public function getVendorsFromOrderItems(): array;

    public function getShipmentByVendor(?VendorInterface $vendor): ?ShipmentInterface;

    public function getShipmentWithoutVendor(): ?ShipmentInterface;
}
