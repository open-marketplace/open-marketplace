<?php

/*
 * This file has been created by developers from BitBag.
 * Feel free to contact us once you face any issues or want to start
 * You can find more information about us on https://bitbag.io and write us
 * an email on hello@bitbag.io.
 */

declare(strict_types=1);

namespace spec\BitBag\OpenMarketplace\Api\DataTransformer;

use BitBag\OpenMarketplace\Api\DataTransformer\ProductListingAwareCommandDataTransformer;
use BitBag\OpenMarketplace\Api\Messenger\Command\Vendor\ProductListingAwareInterface;
use BitBag\OpenMarketplace\Entity\ProductListing\ProductListingInterface;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use Symfony\Component\HttpFoundation\RequestStack;

final class ProductListingAwareCommandDataTransformerSpec extends ObjectBehavior
{
    public function let(
        RequestStack $requestStack
    ): void {
        $this->beConstructedWith($requestStack);
    }

    public function it_is_initializable(): void
    {
        $this->shouldHaveType(ProductListingAwareCommandDataTransformer::class);
    }

    public function it_supports_shop_user_aware_interface(
        ProductListingAwareInterface $productListingAware
    ): void {
        $this->supportsTransformation($productListingAware)->shouldReturn(true);
    }

    public function it_does_nothing_when_product_listing_is_already_assigned(
        ProductListingAwareInterface $productListingAware,
        ProductListingInterface $productListing
    ): void {
        $productListingAware->getProductListing()->willReturn($productListing);
        $this->supportsTransformation($productListingAware)->shouldReturn(true);

        $productListingAware->setProductListing(Argument::any())->shouldNotBeCalled();
        $this->transform($productListingAware, '');
    }

    public function it_sets_product_listing_when_there_is_one_in_context(
        ProductListingAwareInterface $productListingAware,
        ProductListingInterface $productListing
    ): void {
        $productListingAware->getProductListing()->willReturn(null);
        $this->supportsTransformation($productListingAware)->shouldReturn(true);

        $productListingAware->setProductListing($productListing)->shouldBeCalled();
        $this->transform($productListingAware, '', [
            'object_to_populate' => $productListing,
        ]);
    }
}
