<?php

/*
 * This file has been created by developers from BitBag.
 * Feel free to contact us once you face any issues or want to start
 * You can find more information about us on https://bitbag.io and write us
 * an email on hello@bitbag.io.
 */

declare(strict_types=1);

namespace spec\BitBag\OpenMarketplace\Component\ProductListing;

use BitBag\OpenMarketplace\Component\ProductListing\DraftGenerator\Cloner\DraftClonerInterface;
use BitBag\OpenMarketplace\Component\ProductListing\DraftGenerator\DraftGeneratorInterface;
use BitBag\OpenMarketplace\Component\ProductListing\Entity\DraftImageInterface;
use BitBag\OpenMarketplace\Component\ProductListing\Entity\DraftInterface;
use BitBag\OpenMarketplace\Component\ProductListing\Entity\ListingInterface;
use BitBag\OpenMarketplace\Component\ProductListing\ListingPersister;
use BitBag\OpenMarketplace\Component\ProductListing\ListingPersisterInterface;
use BitBag\OpenMarketplace\Component\ProductListing\Repository\DraftImageRepositoryInterface;
use BitBag\OpenMarketplace\Component\Vendor\Entity\VendorInterface;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\EntityManagerInterface;
use Gaufrette\Filesystem;
use PhpSpec\ObjectBehavior;
use Sylius\Component\Core\Model\ImageInterface;
use Sylius\Component\Core\Uploader\ImageUploaderInterface;
use Sylius\Component\Resource\Factory\FactoryInterface;

class ListingPersisterSpec extends ObjectBehavior
{
    public function let(
        FactoryInterface $productListingFactory,
        DraftClonerInterface $draftCloner,
        DraftGeneratorInterface $draftGenerator,
        ImageUploaderInterface $imageUploader,
        Filesystem $filesystem,
        DraftImageRepositoryInterface $draftImageRepository,
        EntityManagerInterface $entityManager,
        DraftInterface $productDraft,
        ImageInterface $image
    ) {
        $this->beConstructedWith(
            $productListingFactory,
            $draftCloner,
            $draftGenerator,
            $imageUploader,
            $filesystem,
            $draftImageRepository,
            $entityManager
        );

        $productDraft->getImages()->willReturn(new ArrayCollection([$image->getWrappedObject()]));
    }

    public function it_is_initializable(): void
    {
        $this->shouldHaveType(ListingPersister::class);
        $this->shouldImplement(ListingPersisterInterface::class);
    }

    public function it_creates_new_product_listing(
        DraftInterface $productDraft,
        VendorInterface $vendor,
        ListingInterface $productListing,
        FactoryInterface $productListingFactory
    ): void {
        $productListingFactory->createNew()->willReturn($productListing);
        $productDraft->getCode()->willReturn('ABC123');

        $this->createNewProductListing($productDraft, $vendor);

        $productListing->setCode('ABC123')->shouldHaveBeenCalled();
        $productListing->insertDraft($productDraft)->shouldHaveBeenCalled();
        $productListing->setVendor($vendor)->shouldHaveBeenCalled();
        $productDraft->setProductListing($productListing)->shouldHaveBeenCalled();
        $productDraft->ownRelations()->shouldHaveBeenCalled();
    }

    public function it_resolve_latest_draft(
        ListingInterface $productListing,
        DraftGeneratorInterface $draftGenerator,
        DraftInterface $productDraft
    ): void {
        $draftGenerator->generateNextDraft($productListing)->willReturn($productDraft);
        $this->resolveLatestDraft($productListing);
    }

    public function it_update_latest_draft_with(
        ListingInterface $productListing,
        DraftInterface $productDraft,
        DraftGeneratorInterface $draftGenerator
    ): void {
        $draftGenerator->generateNextDraft($productListing)->willReturn($productDraft);
        $this->resolveLatestDraft($productListing);
        $this->uploadImages($productDraft);
    }

    public function it_upload_images(
        DraftInterface $productDraft,
        ImageUploaderInterface $imageUploader,
        ImageInterface $image
    ): void {
        $this->uploadImages($productDraft);
        $imageUploader->upload($image)->shouldBeCalledOnce();
    }

    public function it_vendor_can_delete_images_with_correct_path(
        DraftInterface $productDraft,
        DraftImageRepositoryInterface $draftImageRepository,
        DraftImageInterface $draftImage,
        EntityManagerInterface $entityManager,
        Filesystem $filesystem
    ): void {
        $path = '/path/to/your/file.jpg';
        $draftImage->getPath()->willReturn($path);
        $filesystem->has($path)->willReturn(true);
        $draftImageRepository->findVendorDraftImages($productDraft)->willReturn([$draftImage->getWrappedObject()]);

        $this->deleteImages($productDraft);

        $entityManager->remove($draftImage)->shouldBeCalledOnce();
        $filesystem->has($path)->shouldHaveBeenCalled();
        $filesystem->delete($path)->shouldBeCalled();
    }

    public function it_vendor_can_not_delete_images_that_not_exist(
        DraftInterface $productDraft,
        DraftImageRepositoryInterface $draftImageRepository,
        DraftImageInterface $draftImage,
        EntityManagerInterface $entityManager,
        Filesystem $filesystem
    ): void {
        $path = '/path/to/your/file.jpg';
        $draftImage->getPath()->willReturn(null);
        $draftImageRepository->findVendorDraftImages($productDraft)->willReturn([]);

        $this->deleteImages($productDraft);

        $entityManager->remove($draftImage)->shouldNotBeCalled();
        $filesystem->has($path)->shouldNotBeCalled();
        $filesystem->delete($path)->shouldNotBeCalled();
    }

    public function it_vendor_can_not_delete_images_with_incorrect_path(
        DraftInterface $productDraft,
        DraftImageRepositoryInterface $draftImageRepository,
        DraftImageInterface $draftImage,
        EntityManagerInterface $entityManager,
        Filesystem $filesystem
    ): void {
        $incorrectPath = 'path/to/wrong/file.jpg';
        $path = '/path/to/your/file.jpg';
        $draftImage->getPath()->willReturn($path);
        $filesystem->has($incorrectPath)->willReturn(false);
        $draftImageRepository->findVendorDraftImages($productDraft)->willReturn([$draftImage->getWrappedObject()]);

        $this->deleteImages($productDraft);

        $entityManager->remove($draftImage)->shouldBeCalledOnce();
        $filesystem->has($path)->shouldHaveBeenCalled();
        $filesystem->delete($path)->shouldNotBeCalled();
    }
}
