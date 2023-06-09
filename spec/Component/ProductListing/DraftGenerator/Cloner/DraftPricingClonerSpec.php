<?php

/*
 * This file has been created by developers from BitBag.
 * Feel free to contact us once you face any issues or want to start
 * You can find more information about us on https://bitbag.io and write us
 * an email on hello@bitbag.io.
 */

declare(strict_types=1);

namespace spec\BitBag\OpenMarketplace\Component\ProductListing\DraftGenerator\Cloner;

use BitBag\OpenMarketplace\Component\ProductListing\DraftGenerator\Cloner\DraftPricingCloner;
use BitBag\OpenMarketplace\Component\ProductListing\DraftGenerator\Cloner\DraftPricingClonerInterface;
use BitBag\OpenMarketplace\Component\ProductListing\DraftGenerator\Factory\DraftPricingFactoryInterface;
use BitBag\OpenMarketplace\Component\ProductListing\Entity\DraftInterface;
use BitBag\OpenMarketplace\Component\ProductListing\Entity\ListingPriceInterface;
use Doctrine\Common\Collections\ArrayCollection;
use PhpSpec\ObjectBehavior;

final class DraftPricingClonerSpec extends ObjectBehavior
{
    public function let(DraftPricingFactoryInterface $priceFactory): void
    {
        $this->beConstructedWith($priceFactory);
    }

    public function it_is_initializable(): void
    {
        $this->shouldHaveType(DraftPricingCloner::class);
    }

    public function it_implements_interface(): void
    {
        $this->shouldImplement(DraftPricingClonerInterface::class);
    }

    public function it_clones_product_listing_prices(
        DraftPricingFactoryInterface $priceFactory,
        DraftInterface $newProductDraft,
        DraftInterface $productDraft,
        ListingPriceInterface $price,
        ListingPriceInterface $newPrice,
    ): void {
        $productDraft->getProductListingPrices()
            ->willReturn(new ArrayCollection([$price->getWrappedObject()]));

        $price->getProductDraft()
            ->willReturn($productDraft);

        $price->getChannelCode()
            ->willReturn('en_US');

        $priceFactory->createForChannelCode(
            'en_US', $productDraft
        )->willReturn($newPrice);

        $price->getPrice()
            ->willReturn(1000);

        $price->getMinimumPrice()
            ->willReturn(1000);

        $price->getOriginalPrice()
            ->willReturn(1000);

        $newPrice->setPrice(1000)
            ->shouldBeCalled();

        $newPrice->setMinimumPrice(1000)
            ->shouldBeCalled();

        $newPrice->setOriginalPrice(1000)
            ->shouldBeCalled();

        $newPrice->getChannelCode()
            ->willReturn('en_US');

        $newProductDraft->addProductListingPriceWithKey($newPrice, 'en_US');

        $this->clone($productDraft, $newProductDraft);
    }
}
