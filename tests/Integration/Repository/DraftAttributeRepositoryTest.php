<?php

/*
 * This file has been created by developers from BitBag.
 * Feel free to contact us once you face any issues or want to start
 * You can find more information about us on https://bitbag.io and write us
 * an email on hello@bitbag.io.
 */

declare(strict_types=1);

namespace Tests\BitBag\SyliusMultiVendorMarketplacePlugin\Integration\Repository;

use ApiTestCase\JsonApiTestCase;
use BitBag\SyliusMultiVendorMarketplacePlugin\Entity\ProductListing\DraftAttribute;
use BitBag\SyliusMultiVendorMarketplacePlugin\Entity\Vendor;

class DraftAttributeRepositoryTest extends JsonApiTestCase
{
    public function setUp(): void
    {
        parent::setUp();
        $this->entityManager = $this->getContainer()->get('doctrine.orm.entity_manager');
        $this->repository = $this->entityManager->getRepository(DraftAttribute::class);
    }

    public function test_it_finds_all_draft_attributes_for_given_vendor(): void
    {
        $this->loadFixturesFromFile('DraftAttributeRepositoryTest/test_it_finds_all_draft_attributes_for_given_vendor.yml');

        $vendorOliver = $this->getEntityManager()->getRepository(Vendor::class)->findOneBy(['slug' => 'oliver-queen-company']);
        $vendorBruce = $this->getEntityManager()->getRepository(Vendor::class)->findOneBy(['slug' => 'bruce-wayne-company']);

        $oliversAttributes = $this->repository->findVendorDraftAttributes($vendorOliver);
        $brucesAttributes = $this->repository->findVendorDraftAttributes($vendorBruce);

        self::assertCount(2, $oliversAttributes);
        self::assertCount(1, $brucesAttributes);
    }
}
