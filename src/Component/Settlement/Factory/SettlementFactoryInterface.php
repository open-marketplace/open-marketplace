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
use BitBag\OpenMarketplace\Component\Settlement\Entity\SettlementInterface;
use BitBag\OpenMarketplace\Component\Vendor\Entity\VendorInterface;
use Sylius\Component\Core\Model\ChannelInterface;
use Sylius\Component\Resource\Factory\FactoryInterface;

interface SettlementFactoryInterface extends FactoryInterface
{
    public function createNewFromDTOAndVendor(SettlementDTO $settlementDTO, VendorInterface $vendor): SettlementInterface;

    public function createNewForVendorAndChannel(
        VendorInterface $vendor,
        ChannelInterface $channel,
        int $total,
        int $commissionTotal,
        \DateTimeInterface $nextSettlementStartDate,
        \DateTimeInterface $nextSettlementEndDate
    ): SettlementInterface;
}
