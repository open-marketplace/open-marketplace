<?php

/*
 * This file has been created by developers from BitBag.
 * Feel free to contact us once you face any issues or want to start
 * You can find more information about us on https://bitbag.io and write us
 * an email on hello@bitbag.io.
 */

declare(strict_types=1);

namespace Tests\BitBag\SyliusMultiVendorMarketplacePlugin\Integration\Operator;

use ApiTestCase\JsonApiTestCase;
use BitBag\SyliusMultiVendorMarketplacePlugin\Entity\Product;
use BitBag\SyliusMultiVendorMarketplacePlugin\Entity\ProductListing\ProductDraft;
use BitBag\SyliusMultiVendorMarketplacePlugin\Entity\ProductListing\ProductDraftImage;
use BitBag\SyliusMultiVendorMarketplacePlugin\Entity\ProductListing\ProductListing;
use BitBag\SyliusMultiVendorMarketplacePlugin\Operator\ProductDraftFilesOperator;
use Gaufrette\Filesystem;

class ProductDraftFilesOperatorTest extends JsonApiTestCase
{
    public function setUp(): void
    {
        parent::setUp();

        $this->productFromDraftFactory = $this->getContainer()->get('bitbag_mvm_plugin.factory.product_from_draft_factory');
        $this->uploader = $this->getContainer()->get('sylius.image_uploader');

        $fileSystemMap = $this->getContainer()->get('knp_gaufrette.filesystem_map');
        $fileAdapter = $fileSystemMap->get('sylius_image')->getAdapter();

        $fileSystem = new Filesystem($fileAdapter);
        $productImageFactory = $this->getContainer()->get('bitbag_mvm_plugin.factory.product_image');

        $this->productDraftFilesOperator = new ProductDraftFilesOperator($fileSystem, $productImageFactory);
    }

    public function test_it_copies_draft_image_to_product(): void
    {
        $this->loadFixturesFromFile('ProductDraftFilesOperatorTest/test_it_copies_draft_images_to_product.yml');

        $manager = $this->getEntityManager();
        $file = new \SplFileInfo('test.png');

        $image1 = new ProductDraftImage();
        $image1->setFile($file);
//        $image1->setPath("/test/test.txt");
        $this->uploader->upload($image1);
//        $image2 = new ProductDraftImage();
//        $image2->setPath("test/path");

        $listing = $this->getEntityManager()->getRepository(ProductListing::class)->findAll()[0];

        $draftFixture = new ProductDraft();
        $draftFixture->setCode("FIXTURE");
        $draftFixture->setProductListing($listing);
        $draftFixture->addImage($image1);
//        $draftFixture->addImage($image2);
        $draftFixture->setIsVerified(false);
        dd($draftFixture);
        $draft = $manager->getRepository(ProductDraft::class)->findOneBy(['code'=>'test_draft']);
        $cratedProduct =  $this->productFromDraftFactory->createSimpleProduct($draftFixture);

        $this->productDraftFilesOperator->copyFilesToProduct($draftFixture, $cratedProduct);

        $manager->persist($cratedProduct);
        $manager->flush();

//        $file = $cratedProduct->getImages()[0]->getPath();

//        self::assertEquals('path/toFile/test.png',$file);
        $product = $manager->getRepository(Product::class)->findAll();
//        dd($product[0]->getImages()[0]);
    }

    private function create_draft_fixture_with_file()
    {
        $image1 = new ProductDraftImage();
        $image1->setPath("%KERNEL_DIR/FILE/test.png");

        $image2 = new ProductDraftImage();
        $image2->setPath("test/path");

        $listing = $this->getEntityManager()->getRepository(ProductListing::class)->findAll()[0];

        $draftFixture = new ProductDraft();
        $draftFixture->setCode("FIXTURE");
        $draftFixture->setProductListing($listing);
        $draftFixture->addImage($image1);
        $draftFixture->addImage($image2);
        $draftFixture->setIsVerified(false);
    }
}
