<?php

/*
 * This file has been created by developers from BitBag.
 * Feel free to contact us once you face any issues or want to start
 * You can find more information about us on https://bitbag.io and write us
 * an email on hello@bitbag.io.
 */

declare(strict_types=1);

namespace spec\BitBag\OpenMarketplace\Api\Messenger\CommandHandler\Vendor;

use BitBag\OpenMarketplace\Api\Messenger\Command\Vendor\UpdateProductListingInterface;
use BitBag\OpenMarketplace\Api\Messenger\CommandHandler\Vendor\UpdateProductListingHandler;
use BitBag\OpenMarketplace\Component\ProductListing\ProductListingAdministrationToolInterface;
use BitBag\OpenMarketplace\Entity\ProductListing\ProductDraft;
use BitBag\OpenMarketplace\Entity\ProductListing\ProductListingInterface;
use BitBag\OpenMarketplace\Entity\VendorInterface;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Persistence\ObjectManager;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use Sylius\Component\Core\Model\ImageInterface;
use Sylius\Component\Core\Uploader\ImageUploaderInterface;

final class UpdateProductListingHandlerSpec extends ObjectBehavior
{
    public function let(
        ObjectManager $manager,
        ImageUploaderInterface $imageUploader
    ): void {
        $this->beConstructedWith($manager, $imageUploader);
    }

    public function it_is_initializable(): void
    {
        $this->shouldHaveType(UpdateProductListingHandler::class);
    }

    public function it_updates_product_listing(
        UpdateProductListingInterface $updateProductListing,
        ProductDraft $productDraft,
        ProductDraft $previousProductDraft,
        VendorInterface $vendor,
        ProductListingAdministrationToolInterface $productListingFromDraftFactory,
        ProductListingInterface $productListing,
        ImageInterface $image,
        ImageUploaderInterface $imageUploader,
        ObjectManager $manager
    ): void {
        $updateProductListing->getProductDraft()->willReturn($productDraft);
        $updateProductListing->getVendor()->willReturn($vendor);
        $updateProductListing->getProductListing()->willReturn($productListing);

        $previousProductDraft->getVersionNumber()->willReturn(1);
        $productListing->getLatestDraft()->willReturn($previousProductDraft);

        $productDraft->setVersionNumber(1)->shouldBeCalled();
        $productDraft->incrementVersion()->shouldBeCalled();
        $previousProductDraft->getCode()->willReturn('code');
        $productDraft->setCode('code')->shouldBeCalled();

        $images = new ArrayCollection([$image->getWrappedObject()]);
        $productDraft->getImages()->willReturn($images);

        $image->setOwner($productDraft)->shouldBeCalled();
        $imageUploader->upload(Argument::any())->shouldBeCalled();

        $productListing->insertDraft($productDraft)->shouldBeCalled();
        $manager->persist($productListing)->shouldBeCalled();

        $this($updateProductListing)->shouldReturn($productListing);
    }
}
