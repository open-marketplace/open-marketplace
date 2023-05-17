<?php

/*
 * This file has been created by developers from BitBag.
 * Feel free to contact us once you face any issues or want to start
 * You can find more information about us on https://bitbag.io and write us
 * an email on hello@bitbag.io.
 */

declare(strict_types=1);

namespace Tests\BitBag\OpenMarketplace\Integration\Repository;

use BitBag\OpenMarketplace\Entity\Vendor;
use BitBag\OpenMarketplace\Entity\VendorBackgroundImage;
use BitBag\OpenMarketplace\Entity\VendorInterface;
use Tests\BitBag\OpenMarketplace\Integration\IntegrationTestCase;

final class BackgroundImageCascadesTest extends IntegrationTestCase
{
    public function setUp(): void
    {
        parent::setUp();
//        $this->dataFixturesPath = __DIR__ . '/DataFixtures/ORM';
        $this->entityManager = $this->getContainer()->get('doctrine.orm.entity_manager');
        $this->vendorRepository = $this->entityManager->getRepository(Vendor::class);

        $this->backgroundImageRepository = $this->entityManager->getRepository(VendorBackgroundImage::class);
    }

    public function test_it_removes_background_image_only(): void
    {
        $this->loadFixturesFromFile('BackgroundImageCascadesTest/cascade_tests.yml');

        /** @var VendorInterface $vendor */
        $vendor = $this->vendorRepository->findOneBy(['slug' => 'Weyland-Corp']);
        /** @var VendorBackgroundImage $vendorImage */
        $vendorImage = $this->backgroundImageRepository->findOneBy(['owner' => $vendor]);
        $this->backgroundImageRepository->remove($vendorImage);

        self::assertSame($vendor->getSlug(), 'Weyland-Corp');
    }
}
