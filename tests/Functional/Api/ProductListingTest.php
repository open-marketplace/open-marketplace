<?php

/*
 * This file has been created by developers from BitBag.
 * Feel free to contact us once you face any issues or want to start
 * You can find more information about us on https://bitbag.io and write us
 * an email on hello@bitbag.io.
 */

declare(strict_types=1);

namespace Tests\BitBag\OpenMarketplace\Functional\Api;

use BitBag\OpenMarketplace\Entity\ProductListing\DraftAttribute;
use BitBag\OpenMarketplace\Entity\ProductListing\ProductListing;
use Sylius\Component\Core\Model\Taxon;
use Sylius\Tests\Api\Utils\ShopUserLoginTrait;
use Symfony\Component\HttpFoundation\Response;
use Tests\BitBag\OpenMarketplace\Functional\FunctionalTestCase;

final class ProductListingTest extends FunctionalTestCase
{
    use ShopUserLoginTrait;

    public function setUp(): void
    {
        $this->entityManager = static::getContainer()->get('doctrine.orm.entity_manager');
        $this->productListingRepository = $this->entityManager->getRepository(ProductListing::class);
        $this->taxonRepository = $this->entityManager->getRepository(Taxon::class);
        $this->draftAttributeRepository = $this->entityManager->getRepository(DraftAttribute::class);

        $this->loadFixturesFromFile('Api/ProductListingTest/product_listings.yml');
    }

//    public function test_it_get_only_product_listings_for_current_vendor(): void
//    {
//        $header = $this->getHeaderForLoginShopUser('bruce.wayne@example.com');
//
//        $this->client->request('GET', '/api/v2/shop/account/product-listings', [], [], $header);
//        $response = $this->client->getResponse();
//        $this->assertResponse($response, 'Api/ProductListingTest/test_it_get_only_product_listings_for_current_vendor_response', Response::HTTP_OK);
//    }
//
//    public function test_it_prevents_to_get_different_vendor_product_listing(): void
//    {
//        $header = $this->getHeaderForLoginShopUser('bruce.wayne@example.com');
//
//        /** @var ProductListing $productListing */
//        $productListing = $this->productListingRepository->findOneBy([
//            'code' => 'product_listing_peter_1',
//        ]);
//
//        $this->client->request('GET', '/api/v2/shop/account/product-listings/' . $productListing->getId(), [], [], $header);
//        $response = $this->client->getResponse();
//        $this->assertResponse($response, 'Api/not_found_response', Response::HTTP_NOT_FOUND);
//    }
//
//    public function test_it_prevents_to_get_product_listing_by_user_without_vendor_context(): void
//    {
//        $header = $this->getHeaderForLoginShopUser('john.smith@example.com');
//
//        /** @var ProductListing $productListing */
//        $productListing = $this->productListingRepository->findOneBy([
//            'code' => 'product_listing_peter_1',
//        ]);
//
//        $this->client->request('GET', '/api/v2/shop/account/product-listings/' . $productListing->getId(), [], [], $header);
//        $response = $this->client->getResponse();
//        $this->assertResponse($response, 'Api/not_found_response', Response::HTTP_NOT_FOUND);
//    }
//
//    public function test_it_get_product_listing_by_owner_vendor(): void
//    {
//        $header = $this->getHeaderForLoginShopUser('bruce.wayne@example.com');
//
//        /** @var ProductListing $productListing */
//        $productListing = $this->productListingRepository->findOneBy([
//            'code' => 'product_listing_bruce_1',
//        ]);
//
//        $this->client->request('GET', '/api/v2/shop/account/product-listings/' . $productListing->getId(), [], [], $header);
//        $response = $this->client->getResponse();
//        $this->assertResponse($response, 'Api/ProductListingTest/test_it_get_product_listing_by_owner_vendor_response', Response::HTTP_OK);
//    }
//
//    public function test_it_prevents_creating_product_listing_by_user_without_vendor_context(): void
//    {
//        $header = $this->getHeaderForLoginShopUser('john.smith@example.com');
//
//        $this->client->request('POST', '/api/v2/shop/account/product-listings', [], [], $header, json_encode([
//            'code' => 'test',
//            'images' => [],
//            'translations' => [],
//            'productListingPrice' => [],
//            'attributes' => [],
//            'productDraftTaxons' => [],
//        ]));
//
//        $response = $this->client->getResponse();
//        $this->assertResponse($response, 'Api/access_denied_response', Response::HTTP_FORBIDDEN);
//    }

    public function test_creating_product_listing_by_vendor(): void
    {
        $header = $this->getHeaderForLoginShopUser('bruce.wayne@example.com');

        /** @var Taxon $mainTaxon */
        $mainTaxon = $this->taxonRepository->findOneBy(['code' => 'CATEGORY']);
        $additionalTaxon = $this->taxonRepository->findOneBy(['code' => 'MUG']);

        /** @var DraftAttribute $mainTaxon */
        $draftAttribute = $this->draftAttributeRepository->findOneBy([
            'code' => 'attribute_bruce_1',
        ]);

        $this->client->request('POST', '/api/v2/shop/account/product-listings', [], [], $header, json_encode([
            'code' => 'test',
//            'images' => [],
            'translations' => [
                'en_US' => [
                    'locale' => 'en_US',
                    'name' => 'Test',
                    'description' => 'Test description',
                    'metaKeywords' => 'Test metaKeywords',
                    'metaDescription' => 'Test metaDescription',
                    'shortDescription' => 'Test shortDescription',
                ],
            ],
//            'productListingPrice' => [
//                [
//                    'channelCode' => 'CODE',
//                    'price' => 100,
//                    'originalPrice' => 110,
//                    'minimumPrice' => 80,
//                ]
//            ],
//            'attributes' => [
//                '/api/v2/shop/account/draft-attributes/' . $draftAttribute,
//            ],
//            'mainTaxon' => '/api/v2/shop/product-taxons/' . $mainTaxon->getId(),
//            'productDraftTaxons' => [
//                '/api/v2/shop/product-taxons/' . $additionalTaxon->getId(),
//            ],
        ]));

        $response = $this->client->getResponse();
        $this->assertResponse($response, 'Api/ProductListingTest/test_creating_product_listing_by_vendor_response', Response::HTTP_CREATED);
    }
}