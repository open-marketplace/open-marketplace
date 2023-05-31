<?php

/*
 * This file has been created by developers from BitBag.
 * Feel free to contact us once you face any issues or want to start
 * You can find more information about us on https://bitbag.io and write us
 * an email on hello@bitbag.io.
 */

declare(strict_types=1);

namespace BitBag\OpenMarketplace\Component\ProductListing\DraftCloner\Factory;

use BitBag\OpenMarketplace\Component\ProductListing\Entity\DraftInterface;
use BitBag\OpenMarketplace\Component\ProductListing\Entity\ListingPriceInterface;
use Sylius\Component\Resource\Factory\FactoryInterface;

final class DraftPricingFactory implements DraftPricingFactoryInterface
{
    public function __construct(
        private FactoryInterface $resourceFactory,
    ) {

    }

    public function createForChannelCode(
        string $channelCode,
        DraftInterface $draft
    ): ListingPriceInterface {
        $price = $this->resourceFactory->createNew();
        $price->setChannelCode($channelCode);
        $price->setProductDraft($draft);

        return $price;
    }
}
