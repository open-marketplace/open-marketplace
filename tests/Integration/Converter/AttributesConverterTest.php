<?php

declare(strict_types=1);

namespace Tests\BitBag\OpenMarketplace\Integration\Converter;

use ApiTestCase\JsonApiTestCase;
use BitBag\OpenMarketplace\Entity\Product;
use BitBag\OpenMarketplace\Entity\ProductListing\ProductDraft;

class AttributesConverterTest extends JsonApiTestCase
{
    public function setUp(): void
    {
        parent::setUp();

        $this->entityManager = $this->getEntityManager();
        $this->attributesConverter = $this->getContainer()->get('open_marketplace.attributes_converter');
    }

    public function test_it_removes_attributes_from_product(): void
    {
        $this->loadFixturesFromFile('AttributesConverterTest/test_it_removes_attributes_from_product.yml');
        $draft = $this->entityManager->getRepository(ProductDraft::class)->findAll()[0];
        $product = $draft->getProductListing()->getProduct();

        $this->assertCount( 1, $product->getAttributes());

        $this->attributesConverter->convert($draft, $product);
        $this->entityManager->flush();

        $freshProduct = $this->entityManager->getRepository(Product::class)->findAll()[0];
        $this->entityManager->refresh($freshProduct);

        $this->assertCount( 0, $freshProduct->getAttributes());
    }
}
