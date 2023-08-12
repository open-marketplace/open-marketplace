<?php

/*
 * This file has been created by developers from BitBag.
 * Feel free to contact us once you face any issues or want to start
 * You can find more information about us on https://bitbag.io and write us
 * an email on hello@bitbag.io.
 */

declare(strict_types=1);

namespace spec\BitBag\OpenMarketplace\Component\Core\Api\Messenger\CommandHandler\Vendor;

use BitBag\OpenMarketplace\Component\Core\Api\Messenger\Command\Vendor\UpdateProductListingInterface;
use BitBag\OpenMarketplace\Component\Core\Api\Messenger\CommandHandler\Vendor\UpdateProductListingHandler;
use BitBag\OpenMarketplace\Component\ProductListing\Entity\Draft;
use BitBag\OpenMarketplace\Component\ProductListing\Entity\ListingInterface;
use BitBag\OpenMarketplace\Component\ProductListing\ListingPersisterInterface;
use BitBag\OpenMarketplace\Component\ProductListing\Repository\ListingRepositoryInterface;
use BitBag\OpenMarketplace\Component\Vendor\Entity\VendorInterface;
use Doctrine\Common\Collections\ArrayCollection;
use PhpSpec\ObjectBehavior;
use Sylius\Component\Core\Model\ImageInterface;

final class UpdateProductListingHandlerSpec extends ObjectBehavior
{
    public function let(
        ListingPersisterInterface $listingPersister,
        ListingRepositoryInterface $productListingRepository
    ): void {
        $this->beConstructedWith(
            $listingPersister,
            $productListingRepository
        );
    }

    public function it_is_initializable(): void
    {
        $this->shouldHaveType(UpdateProductListingHandler::class);
    }

    public function it_updates_product_listing(
        UpdateProductListingInterface $updateProductListing,
        Draft $productDraft,
        Draft $previousProductDraft,
        VendorInterface $vendor,
        ListingInterface $modelProductListing,
        ListingInterface $productListing,
        ListingRepositoryInterface $productListingRepository,
        ImageInterface $image
    ): void {
        $modelProductListing->getId()->willReturn(10);

        $updateProductListing->getProductDraft()->willReturn($productDraft);
        $updateProductListing->getVendor()->willReturn($vendor);
        $updateProductListing->getProductListing()->willReturn($modelProductListing);
        $productListingRepository->find(10)->willReturn($productListing);

        $previousProductDraft->getVersionNumber()->willReturn(1);
        $productListing->getLatestDraft()->willReturn($previousProductDraft);

        $previousProductDraft->getCode()->willReturn('code');
        $productDraft->setCode('code')->shouldBeCalled();
        $productDraft->setProductListing($productListing)->shouldBeCalled();

        $images = new ArrayCollection([$image->getWrappedObject()]);
        $productDraft->getImages()->willReturn($images);

        $this($updateProductListing)->shouldReturn($productListing);
    }
}
