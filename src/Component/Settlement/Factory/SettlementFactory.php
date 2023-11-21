<?php

/*
 * This file has been created by developers from BitBag.
 * Feel free to contact us once you face any issues or want to start
 * You can find more information about us on https://bitbag.io and write us
 * an email on hello@bitbag.io.
 */

declare(strict_types=1);

namespace BitBag\OpenMarketplace\Component\Settlement\Factory;

use BitBag\OpenMarketplace\Component\Settlement\DTO\SettlementDTO;
use BitBag\OpenMarketplace\Component\Settlement\Entity\Settlement;
use BitBag\OpenMarketplace\Component\Settlement\Entity\SettlementInterface;
use BitBag\OpenMarketplace\Component\Vendor\Entity\VendorInterface;

final class SettlementFactory implements SettlementFactoryInterface
{
    public function createNew(): SettlementInterface
    {
        return new Settlement();
    }

    public function createNewFromDTOAndVendor(SettlementDTO $settlementDTO, VendorInterface $vendor): SettlementInterface
    {
        $settlement = $this->createNew();
        $settlement->setVendor($vendor);
        $settlement->setStartDate($settlementDTO->getStartDate());
        $settlement->setEndDate($settlementDTO->getEndDate());
        $settlement->setTotalAmount($settlementDTO->getTotalAmount());
        $settlement->setTotalCommissionAmount($settlementDTO->getTotalCommissionAmount());
        $settlement->setCurrencyCode($settlementDTO->getCurrencyCode());

        return $settlement;
    }
}
