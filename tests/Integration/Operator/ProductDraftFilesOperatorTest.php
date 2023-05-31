<?php

/*
 * This file has been created by developers from BitBag.
 * Feel free to contact us once you face any issues or want to start
 * You can find more information about us on https://bitbag.io and write us
 * an email on hello@bitbag.io.
 */

declare(strict_types=1);

namespace Tests\BitBag\OpenMarketplace\Integration\Operator;

use ApiTestCase\JsonApiTestCase;
use BitBag\OpenMarketplace\Component\ProductListing\Entity\Draft;
use BitBag\OpenMarketplace\Component\ProductListing\Entity\DraftImage;
use BitBag\OpenMarketplace\Component\ProductListing\Entity\Listing;
use BitBag\OpenMarketplace\Entity\Product;
use BitBag\OpenMarketplace\Operator\ProductDraftFilesOperator;
use Gaufrette\Filesystem;

final class ProductDraftFilesOperatorTest extends JsonApiTestCase
{
    public function setUp(): void
    {
        parent::setUp();

        $this->productFromDraftFactory = $this->getContainer()->get('open_marketplace.factory.product_from_draft_factory');

        $fileSystemMap = $this->getContainer()->get('knp_gaufrette.filesystem_map');

        $fileAdapter = $fileSystemMap->get('sylius_image')->getAdapter();

        $this->fileSystem = new Filesystem($fileAdapter);

        $productImageFactory = $this->getContainer()->get('open_marketplace.factory.product_image');

        $this->productDraftFilesOperator = new ProductDraftFilesOperator($this->fileSystem, $productImageFactory);
    }

    public function test_it_copies_draft_image_to_product(): void
    {
        $this->loadFixturesFromFile('ProductDraftFilesOperatorTest/test_it_copies_draft_images_to_product.yml');

        $manager = $this->getEntityManager();

        $this->create_draft_fixture_with_file();

        $draftFixture = $manager->getRepository(Draft::class)->findOneBy(['code' => 'FIXTURE']);
        $cratedProduct = $this->productFromDraftFactory->createSimpleProduct($draftFixture);

        $this->productDraftFilesOperator->copyFilesToProduct($draftFixture, $cratedProduct);

        $expectedFilePathKey = 'AA/test-new.png';

        $manager->persist($cratedProduct);
        $manager->flush();

        $product = $manager->getRepository(Product::class)->findOneBy(['code' => 'FIXTURE' . '-' . $draftFixture->getProductListing()->getVendor()->getId()]);

        self::assertCount(1, $product->getImages());
        self::assertEquals($expectedFilePathKey, $product->getImages()[0]->getPath());
    }

    private function create_draft_fixture_with_file(): void
    {
        $manager = $this->getEntityManager();

        $listing = $this->getEntityManager()->getRepository(Listing::class)->findAll()[0];

        $image1 = new DraftImage();

        $draftFixture = new Draft();
        $draftFixture->setCode('FIXTURE');
        $draftFixture->setProductListing($listing);
        $draftFixture->addImage($image1);
        $draftFixture->setIsVerified(false);

        $fileInfo = new \SplFileInfo(__DIR__ . '/test.png');
        $fileObject = $fileInfo->openFile('r');
        $file = $fileObject->fread(filesize(__DIR__ . '/test.png'));

        $originalFilePathName = 'AA/test.png';

        if ($this->fileSystem->has('AA/test.png')) {
            $this->fileSystem->delete('AA/test.png');
        }

        if ($this->fileSystem->has('AA/test1.png')) {
            $this->fileSystem->delete('AA/test1.png');
        }

        $this->fileSystem->write('AA/test.png', $file);

        $image1->setPath('AA/test.png');
        $image1->setOwner($draftFixture);

        $manager->persist($draftFixture);
        $manager->flush();
    }
}
