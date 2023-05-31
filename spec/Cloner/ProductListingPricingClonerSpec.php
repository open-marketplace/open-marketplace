<?php

/*
 * This file has been created by developers from BitBag.
 * Feel free to contact us once you face any issues or want to start
 * You can find more information about us on https://bitbag.io and write us
 * an email on hello@bitbag.io.
 */

declare(strict_types=1);

namespace spec\BitBag\OpenMarketplace\Cloner;

use BitBag\OpenMarketplace\Cloner\ProductListingPricingCloner;
use BitBag\OpenMarketplace\Cloner\ProductListingPricingClonerInterface;
use BitBag\OpenMarketplace\Component\ProductListing\Entity\DraftInterface;
use BitBag\OpenMarketplace\Component\ProductListing\Entity\ListingPriceInterface;
use Doctrine\Common\Collections\ArrayCollection;
use PhpSpec\ObjectBehavior;
use Sylius\Component\Resource\Factory\FactoryInterface;

final class ProductListingPricingClonerSpec extends ObjectBehavior
{
    public function let(FactoryInterface $priceFactory): void
    {
        $this->beConstructedWith($priceFactory);
    }

    public function it_is_initializable(): void
    {
        $this->shouldHaveType(ProductListingPricingCloner::class);
    }

    public function it_implements_interface(): void
    {
        $this->shouldImplement(ProductListingPricingClonerInterface::class);
    }

    public function it_clones_product_listing_prices(
        FactoryInterface $priceFactory,
        DraftInterface $newProductDraft,
        DraftInterface $productDraft,
        ListingPriceInterface $price,
        ListingPriceInterface $newPrice,
        ): void {
        $productDraft->getProductListingPrices()
            ->willReturn(new ArrayCollection([$price->getWrappedObject()]));

        $priceFactory->createNew()
            ->willReturn($newPrice);

        $price->getChannelCode()
            ->willReturn('en_US');

        $price->getPrice()
            ->willReturn(1000);

        $newPrice->getChannelCode()
            ->willReturn('en_US');

        $price->getMinimumPrice()
            ->willReturn(1000);

        $price->getOriginalPrice()
            ->willReturn(1000);

        $newPrice->setChannelCode('en_US')
            ->shouldBeCalled();

        $newPrice->setPrice(1000)
            ->shouldBeCalled();

        $newPrice->setMinimumPrice(1000)
            ->shouldBeCalled();

        $newPrice->setOriginalPrice(1000)
            ->shouldBeCalled();

        $newPrice->setProductDraft($newProductDraft)
            ->shouldBeCalled();

        $newProductDraft->addProductListingPriceWithKey($newPrice, 'en_US');

        $this->clonePrice($newProductDraft, $productDraft);
    }
}
