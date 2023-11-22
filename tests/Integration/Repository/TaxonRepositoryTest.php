<?php

/*
 * This file has been created by developers from BitBag.
 * Feel free to contact us once you face any issues or want to start
 * You can find more information about us on https://bitbag.io and write us
 * an email on hello@bitbag.io.
 */

declare(strict_types=1);

namespace Tests\BitBag\OpenMarketplace\Integration\Repository;

use ApiTestCase\JsonApiTestCase;

final class TaxonRepositoryTest extends JsonApiTestCase
{
    public function setUp(): void
    {
        parent::setUp();
        $this->entityManager = $this->getContainer()->get('doctrine.orm.entity_manager');
        $this->repository = $this->getContainer()->get('sylius.repository.taxon');
    }

    public function test_it_finds_vendor_products(): void
    {
        $this->loadFixturesFromFile('TaxonRepositoryTest/test_it_finds_vendor_taxons.yml');

        $taxon = $this->repository->findForVendorPage('slug', 'en_US');

        $this->assertSame('slug', $taxon->getSlug());
    }

    public function test_it_finds_null_wuth_incorrect_slug(): void
    {
        $this->loadFixturesFromFile('TaxonRepositoryTest/test_it_finds_vendor_taxons.yml');

        $taxon = $this->repository->findForVendorPage('badSlug', 'en_US');

        $this->assertNull($taxon);
    }
}
