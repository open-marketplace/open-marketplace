<?php

/*
 * This file has been created by developers from BitBag.
 * Feel free to contact us once you face any issues or want to start
 * You can find more information about us on https://bitbag.io and write us
 * an email on hello@bitbag.io.
 */

declare(strict_types=1);


namespace BitBag\OpenMarketplace\Entity;

use Sylius\Component\Resource\Model\ResourceInterface;

interface VendorSettlementInterface extends ResourceInterface
{
    public function getId(): ?int;

    public function getCommission(): ?int;

    public function setCommission(?int $commission): void;

    public function getCommissionType(): ?string;

    public function setCommissionType(?string $commissionType): void;

    public function getVendor(): ?VendorInterface;

    public function setVendor(?VendorInterface $vendor): void;

}
