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
use BitBag\OpenMarketplace\Component\Product\Entity\Product;
use BitBag\OpenMarketplace\Component\Vendor\Entity\Vendor;
use BitBag\OpenMarketplace\Component\Vendor\Entity\VendorInterface;
use Doctrine\ORM\QueryBuilder;
use Sylius\Component\Core\Model\Channel;

final class ProductRepositoryTest extends JsonApiTestCase
{
    public function setUp(): void
    {
        parent::setUp();
        $this->entityManager = $this->getContainer()->get('doctrine.orm.entity_manager');
        $this->repository = $this->entityManager->getRepository(Product::class);
        $this->taxonProvider = $this->getContainer()->get('bitbag.open_marketplace.component.vendor.context.taxon');
    }

    public function test_it_finds_vendor_products(): void
    {
        $this->loadFixturesFromFile('ProductRepositoryTest/test_it_finds_vendor_products.yaml');
        /** @var VendorInterface $vendorOliver */
        $vendorOliver = $this->entityManager->getRepository(Vendor::class)->findOneBySlug('oliver-queen-company');
        $channel = $this->entityManager->getRepository(Channel::class)->findAll()[0];
        $localeCode = $channel->getDefaultLocale()->getCode();
        $taxon = $this->taxonProvider->getForVendorPage(null, $localeCode);
        /** @var QueryBuilder $vendorProductsQuery */
        $vendorProductsQuery = $this->repository->createVendorShopListQueryBuilder($vendorOliver, $channel, $taxon, 'en_US', [], true);

        $this->assertCount(2, $vendorProductsQuery->getQuery()->getResult());
    }
}
