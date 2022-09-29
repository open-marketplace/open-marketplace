<?php

/*
 * This file was created by developers working at BitBag
 * Do you need more information about us and what we do? Visit our https://bitbag.io website!
 * We are hiring developers from all over the world. Join us and start your new, exciting adventure and become part of us: https://bitbag.io/career
*/

declare(strict_types=1);

namespace BitBag\SyliusMultiVendorMarketplacePlugin\Model\Order;

use BitBag\SyliusMultiVendorMarketplacePlugin\Entity\OrderInterface;
use BitBag\SyliusMultiVendorMarketplacePlugin\Entity\OrderItemInterface;
use BitBag\SyliusMultiVendorMarketplacePlugin\Entity\ProductInterface;
use BitBag\SyliusMultiVendorMarketplacePlugin\Entity\ShipmentInterface;
use BitBag\SyliusMultiVendorMarketplacePlugin\Entity\VendorInterface;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;

trait OrderTrait
{
    /** @var Collection<int, OrderItemInterface> */
    protected $items;

    protected ?VendorInterface $vendor = null;

    protected ?OrderInterface $primaryOrder;

    /** @var Collection<int, OrderInterface> */
    protected Collection $secondaryOrders;

    public function __construct()
    {
        parent::__construct();
        $this->secondaryOrders = new ArrayCollection();
    }

    public function getVendor(): ?VendorInterface
    {
        return $this->vendor;
    }

    public function setVendor(?VendorInterface $vendor): void
    {
        $this->vendor = $vendor;
    }

    public function getPrimaryOrder(): ?OrderInterface
    {
        return $this->primaryOrder;
    }

    public function setPrimaryOrder(?OrderInterface $primaryOrder): void
    {
        $this->primaryOrder = $primaryOrder;
    }

    public function addSecondaryOrder(OrderInterface $secondaryOrder): void
    {
        $this->secondaryOrders->add($secondaryOrder);
    }

    /** @return Collection<int, OrderInterface> */
    public function getSecondaryOrders(): Collection
    {
        return $this->secondaryOrders;
    }

    public function hasVendorItems(): bool
    {
        foreach ($this->getItems() as $item) {
            if (null === $item->getVariant() || null === $item->getVariant()?->getProduct()) {
                continue;
            }

            $product = $item->getVariant()?->getProduct();
            if ($product->hasVendor()) {
                return true;
            }
        }

        return false;
    }

    public function hasVendorShipment(VendorInterface $vendor): bool
    {
        /** @var ShipmentInterface $shipment */
        foreach ($this->getShipments() as $shipment) {
            if ($shipment->hasVendor() && $shipment->getVendor() === $vendor) {
                return true;
            }
        }

        return false;
    }

    public function hasShipmentWithoutVendor(): bool
    {
        /** @var ShipmentInterface $shipment */
        foreach ($this->getShipments() as $shipment) {
            if (false === $shipment->hasVendor()) {
                return true;
            }
        }

        return false;
    }

    public function getVendorsFromOrderItems(): array
    {
        $vendors = [];

        foreach ($this->getItems() as $item) {
            /** @var ProductInterface $product */
            $product = $item->getVariant()?->getProduct();
            $vendor = $product->getVendor();

            if (null !== $vendor && false === in_array($vendor, $vendors)) {
                $vendors[] = $vendor;
            }
        }

        return $vendors;
    }

    public function getShipmentByVendor(?VendorInterface $vendor): ?ShipmentInterface
    {
        /** @var ShipmentInterface $shipment */
        foreach ($this->getShipments() as $shipment) {
            if ($shipment->hasVendor() && $shipment->getVendor() === $vendor) {
                return $shipment;
            }
        }

        return null;
    }

    public function getShipmentWithoutVendor(): ?ShipmentInterface
    {
        /** @var ShipmentInterface $shipment */
        foreach ($this->getShipments() as $shipment) {
            if (false === $shipment->hasVendor()) {
                return $shipment;
            }
        }

        return null;
    }
}
