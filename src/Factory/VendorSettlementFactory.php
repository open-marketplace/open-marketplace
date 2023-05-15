<?php

/*
 * This file has been created by developers from BitBag.
 * Feel free to contact us once you face any issues or want to start
 * You can find more information about us on https://bitbag.io and write us
 * an email on hello@bitbag.io.
 */

declare(strict_types=1);

namespace BitBag\OpenMarketplace\Factory;

use BitBag\OpenMarketplace\Entity\Vendor;
use BitBag\OpenMarketplace\Entity\VendorInterface;
use BitBag\OpenMarketplace\Entity\VendorSettlement;
use BitBag\OpenMarketplace\Entity\VendorSettlementInterface;
use Sylius\Component\Resource\Factory\FactoryInterface;

final class VendorSettlementFactory implements VendorSettlementFactoryInterface
{
    /** @return VendorSettlementInterface */
    public function createNew(): VendorSettlementInterface
    {
        return new VendorSettlement();
    }

    public function create(int $commission, string $commissionType): VendorSettlementInterface
    {
        $settlement = $this->createNew();
        $settlement->setCommission($commission);
        $settlement->setCommissionType($commissionType);
        return $settlement;
    }
}
