<?php

/*
 * This file has been created by developers from BitBag.
 * Feel free to contact us once you face any issues or want to start
 * You can find more information about us on https://bitbag.io and write us
 * an email on hello@bitbag.io.
 */

declare(strict_types=1);

namespace BitBag\OpenMarketplace\Api\Messenger\CommandHandler\Vendor;

use BitBag\OpenMarketplace\Api\Messenger\Command\Vendor\CreateProductListingInterface;
use BitBag\OpenMarketplace\Entity\ProductListing\ProductListingInterface;
use BitBag\OpenMarketplace\Factory\ProductListingFromDraftFactoryInterface;
use Doctrine\Persistence\ObjectManager;
use Sylius\Component\Core\Uploader\ImageUploaderInterface;
use Sylius\Component\Resource\Factory\FactoryInterface;

final class CreateProductListingHandler
{
    private FactoryInterface $productDraftFactory;

    private ProductListingFromDraftFactoryInterface $productListingFromDraftFactory;

    private ObjectManager $manager;

    private ImageUploaderInterface $imageUploader;

    public function __construct(
        FactoryInterface $productDraftFactory,
        ProductListingFromDraftFactoryInterface $productListingFromDraftFactory,
        ObjectManager $manager,
        ImageUploaderInterface $imageUploader
    ) {
        $this->productDraftFactory = $productDraftFactory;
        $this->productListingFromDraftFactory = $productListingFromDraftFactory;
        $this->manager = $manager;
        $this->imageUploader = $imageUploader;
    }

    public function __invoke(CreateProductListingInterface $command): ProductListingInterface
    {
        $productDraft = $this->productDraftFactory->createNew();

        $productDraft->setCode($command->getCode());

        foreach ($command->getImages() as $productImage) {
            $productDraft->addImage($productImage);
            $productImage->setOwner($productDraft);
            $this->imageUploader->upload($productImage);
        }

        foreach ($command->getTranslations() as $translation) {
            $productDraft->addTranslations($translation);
        }

        foreach ($command->getProductListingPrice() as $price) {
            $productDraft->addProductListingPrice($price);
        }

        foreach ($command->getProductListingPrice() as $price) {
            $productDraft->addProductListingPrice($price);
        }

        foreach ($command->getAttributes() as $attribute) {
            $productDraft->addAttribute($attribute);
            $attribute->setSubject($productDraft);
        }

        $productDraft->setMainTaxon($command->getMainTaxon());

        foreach ($command->getProductDraftTaxons() as $productDraftTaxon) {
            $productDraft->addProductDraftTaxon($productDraftTaxon);
        }

        $productListing = $this->productListingFromDraftFactory->createNew($productDraft, $command->getVendor());

        $this->manager->persist($productDraft);
        $this->manager->persist($productListing);
    }
}