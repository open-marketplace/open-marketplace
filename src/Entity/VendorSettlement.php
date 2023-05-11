<?php

/*
 * This file has been created by developers from BitBag.
 * Feel free to contact us once you face any issues or want to start
 * You can find more information about us on https://bitbag.io and write us
 * an email on hello@bitbag.io.
 */

declare(strict_types=1);


namespace BitBag\OpenMarketplace\Entity;

class VendorSettlement implements VendorSettlementInterface
{
    protected ?int $id;

    protected ?int $commission = null;

    protected ?string $commissionType;

    protected ?VendorInterface $vendor;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCommission(): ?int
    {
        return $this->commission;
    }

    public function setCommission(?int $commission): void
    {
        $this->commission = $commission;
    }

    public function getCommissionType(): ?string
    {
        return $this->commissionType;
    }

    public function setCommissionType(?string $commissionType): void
    {
        $this->commissionType = $commissionType;
    }

    public function getVendor(): ?VendorInterface
    {
        return $this->vendor;
    }

    public function setVendor(?VendorInterface $vendor): void
    {
        $this->vendor = $vendor;
    }
}
