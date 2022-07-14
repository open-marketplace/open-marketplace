<?php

declare(strict_types=1);

namespace spec\BitBag\SyliusMultiVendorMarketplacePlugin\Cloner;

use BitBag\SyliusMultiVendorMarketplacePlugin\Cloner\ProductListingPricingCloner;
use BitBag\SyliusMultiVendorMarketplacePlugin\Cloner\ProductListingPricingClonerInterface;
use BitBag\SyliusMultiVendorMarketplacePlugin\Entity\ProductListing\ProductDraftInterface;
use BitBag\SyliusMultiVendorMarketplacePlugin\Entity\ProductListing\ProductListingPriceInterface;
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
        ProductDraftInterface $newProductDraft,
        ProductDraftInterface $productDraft,
        ProductListingPriceInterface $price,
        ProductListingPriceInterface $newPrice,
        ): void {
        $productDraft->getProductListingPrice()
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
