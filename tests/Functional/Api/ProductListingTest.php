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
use Symfony\Component\HttpFoundation\File\UploadedFile;
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

    public function test_it_gets_only_product_listings_for_current_vendor(): void
    {
        $header = $this->getHeaderForLoginShopUser('bruce.wayne@example.com');

        $this->client->request('GET', '/api/v2/shop/account/vendor/product-listings', [], [], $header);
        $response = $this->client->getResponse();
        $this->assertResponse($response, 'Api/ProductListingTest/test_it_gets_only_product_listings_for_current_vendor_response', Response::HTTP_OK);
    }

    public function test_it_gets_only_product_listings_for_current_vendor_filter_by_verification_status(): void
    {
        $header = $this->getHeaderForLoginShopUser('bruce.wayne@example.com');

        $this->client->request('GET', '/api/v2/shop/account/vendor/product-listings', ['verificationStatus' => 'verified'], [], $header);
        $response = $this->client->getResponse();
        $this->assertResponse($response, 'Api/ProductListingTest/test_it_gets_only_product_listings_for_current_vendor_filter_by_verification_status', Response::HTTP_OK);
    }

    public function test_it_gets_only_product_listings_for_current_vendor_filter_by_code(): void
    {
        $header = $this->getHeaderForLoginShopUser('bruce.wayne@example.com');

        $this->client->request('GET', '/api/v2/shop/account/vendor/product-listings', ['code' => 'bruce_1'], [], $header);
        $response = $this->client->getResponse();
        $this->assertResponse($response, 'Api/ProductListingTest/test_it_gets_only_product_listings_for_current_vendor_filter_by_code', Response::HTTP_OK);
    }

    public function test_it_prevents_to_get_different_vendor_product_listing(): void
    {
        $header = $this->getHeaderForLoginShopUser('bruce.wayne@example.com');

        /** @var ProductListing $productListing */
        $productListing = $this->productListingRepository->findOneBy([
            'code' => 'product_listing_peter_1',
        ]);

        $this->client->request('GET', '/api/v2/shop/account/vendor/product-listings/' . $productListing->getUuid(), [], [], $header);
        $response = $this->client->getResponse();
        $this->assertResponse($response, 'Api/access_denied_response', Response::HTTP_FORBIDDEN);
    }

    public function test_it_prevents_to_get_product_listing_by_user_without_vendor_context(): void
    {
        $header = $this->getHeaderForLoginShopUser('john.smith@example.com');

        /** @var ProductListing $productListing */
        $productListing = $this->productListingRepository->findOneBy([
            'code' => 'product_listing_peter_1',
        ]);

        $this->client->request('GET', '/api/v2/shop/account/vendor/product-listings/' . $productListing->getUuid(), [], [], $header);
        $response = $this->client->getResponse();
        $this->assertResponse($response, 'Api/access_denied_response', Response::HTTP_FORBIDDEN);
    }

    public function test_it_gets_product_listing_by_owner_vendor(): void
    {
        $header = $this->getHeaderForLoginShopUser('bruce.wayne@example.com');

        /** @var ProductListing $productListing */
        $productListing = $this->productListingRepository->findOneBy([
            'code' => 'product_listing_bruce_1',
        ]);

        $this->client->request('GET', '/api/v2/shop/account/vendor/product-listings/' . $productListing->getUuid(), [], [], $header);
        $response = $this->client->getResponse();
        $this->assertResponse($response, 'Api/ProductListingTest/test_it_gets_product_listing_by_owner_vendor_response', Response::HTTP_OK);
    }

    public function test_it_prevents_creating_product_listing_by_user_without_vendor_context(): void
    {
        $header = $this->getHeaderForLoginShopUser('john.smith@example.com');

        $this->client->request('POST', '/api/v2/shop/account/vendor/product-listings', [], [], $header, json_encode([
            'productDraft' => [
                'code' => 'test',
                'images' => [],
                'translations' => [],
                'productListingPrices' => [],
                'attributes' => [],
                'productDraftTaxons' => [],
            ],
        ]));

        $response = $this->client->getResponse();
        $this->assertResponse($response, 'Api/access_denied_response', Response::HTTP_FORBIDDEN);
    }

    public function test_creating_product_listing_by_vendor(): void
    {
        $header = $this->getHeaderForLoginShopUser('bruce.wayne@example.com');

        /** @var Taxon $mainTaxon */
        $mainTaxon = $this->taxonRepository->findOneBy(['code' => 'CATEGORY']);
        /** @var Taxon $additionalTaxon */
        $additionalTaxon = $this->taxonRepository->findOneBy(['code' => 'MUG']);

        /** @var DraftAttribute $draftAttribute */
        $draftAttribute = $this->draftAttributeRepository->findOneBy([
            'code' => 'attribute_bruce_1',
        ]);

        $this->client->request('POST', '/api/v2/shop/account/vendor/product-listings', [], [
            'images' => [
                $this->getUploadedProductImageFile(),
            ],
        ], $header, json_encode([
            'productDraft' => [
                'code' => 'test',
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
                'productListingPrices' => [
                    [
                        'channelCode' => 'CODE',
                        'price' => 100,
                        'originalPrice' => 110,
                        'minimumPrice' => 80,
                    ],
                ],
                'attributes' => [
                    [
                        'attribute' => '/api/v2/shop/account/vendor/product-draft/attributes/' . $draftAttribute->getUuid(),
                        'value' => 'example text value',
                    ],
                ],
                'mainTaxon' => '/api/v2/shop/taxons/' . $mainTaxon->getCode(),
                'productDraftTaxons' => [
                    [
                        'taxon' => '/api/v2/shop/taxons/' . $additionalTaxon->getCode(),
                        'position' => 2,
                    ],
                ],
            ],
        ]));

        $response = $this->client->getResponse();
        $this->assertResponse($response, 'Api/ProductListingTest/test_creating_product_listing_by_vendor_response', Response::HTTP_CREATED);
    }

    public function test_validates_not_blank_product_draft_when_creating_product_listing(): void
    {
        $header = $this->getHeaderForLoginShopUser('bruce.wayne@example.com');

        $this->client->request('POST', '/api/v2/shop/account/vendor/product-listings', [], [], $header, json_encode([]));

        $response = $this->client->getResponse();
        $this->assertResponse($response, 'Api/ProductListingTest/test_it_validates_not_blank_product_draft_response', Response::HTTP_UNPROCESSABLE_ENTITY);
    }

    public function test_it_prevents_updating_product_listing_by_user_without_vendor_context(): void
    {
        $header = $this->getHeaderForLoginShopUser('john.smith@example.com');

        /** @var ProductListing $productListing */
        $productListing = $this->productListingRepository->findOneBy([
            'code' => 'product_listing_bruce_1',
        ]);

        $this->client->request('PUT', '/api/v2/shop/account/vendor/product-listings/' . $productListing->getUuid(), [], [], $header, json_encode([
            'productDraft' => [
                'images' => [],
                'translations' => [],
                'productListingPrices' => [],
                'attributes' => [],
                'productDraftTaxons' => [],
            ],
        ]));

        $response = $this->client->getResponse();
        $this->assertResponse($response, 'Api/access_denied_response', Response::HTTP_FORBIDDEN);
    }

    public function test_it_prevents_updating_product_listing_by_other_vendor(): void
    {
        $header = $this->getHeaderForLoginShopUser('bruce.wayne@example.com');

        /** @var ProductListing $productListing */
        $productListing = $this->productListingRepository->findOneBy([
            'code' => 'product_listing_peter_1',
        ]);

        $this->client->request('PUT', '/api/v2/shop/account/vendor/product-listings/' . $productListing->getUuid(), [], [], $header, json_encode([
            'productDraft' => [
                'images' => [],
                'translations' => [],
                'productListingPrices' => [],
                'attributes' => [],
                'productDraftTaxons' => [],
            ],
        ]));

        $response = $this->client->getResponse();
        $this->assertResponse($response, 'Api/access_denied_response', Response::HTTP_FORBIDDEN);
    }

    public function test_update_product_listing_by_vendor(): void
    {
        $header = $this->getHeaderForLoginShopUser('bruce.wayne@example.com');

        /** @var ProductListing $productListing */
        $productListing = $this->productListingRepository->findOneBy([
            'code' => 'product_listing_bruce_1',
        ]);

        /** @var Taxon $replacementMainTaxon */
        $replacementMainTaxon = $this->taxonRepository->findOneBy(['code' => 'SECOND_CATEGORY']);

        /** @var Taxon $replacementAdditionalTaxon */
        $replacementAdditionalTaxon = $this->taxonRepository->findOneBy(['code' => 'HAT']);

        /** @var DraftAttribute $draftAttribute */
        $draftAttribute = $this->draftAttributeRepository->findOneBy([
            'code' => 'attribute_bruce_1',
        ]);

        $this->client->request('PUT', '/api/v2/shop/account/vendor/product-listings/' . $productListing->getUuid(), [], [
            'images' => [

            ],
        ], $header, json_encode([
            'productDraft' => [
                'translations' => [
                    'en_US' => [
                        'locale' => 'en_US',
                        'name' => 'Changed name',
                        'slug' => 'Changed slug',
                        'description' => 'Changed description',
                        'metaKeywords' => 'Test metaKeywords',
                        'metaDescription' => 'Test metaDescription',
                        'shortDescription' => 'Test shortDescription',
                    ],
                ],
                'productListingPrices' => [
                    [
                        'channelCode' => 'CODE',
                        'price' => 120,
                        'originalPrice' => 110,
                        'minimumPrice' => 115,
                    ],
                ],
                'attributes' => [
                    [
                        'attribute' => '/api/v2/shop/account/vendor/product-draft/attributes/' . $draftAttribute->getUuid(),
                        'value' => 'changed value',
                    ],
                ],
                'mainTaxon' => '/api/v2/shop/taxons/' . $replacementMainTaxon->getCode(),
                'productDraftTaxons' => [
                    [
                        'taxon' => '/api/v2/shop/taxons/' . $replacementAdditionalTaxon->getCode(),
                        'position' => 2,
                    ],
                ],
            ],
        ]));

        $response = $this->client->getResponse();
        $this->assertResponse($response, 'Api/ProductListingTest/test_update_product_listing_by_vendor_response', Response::HTTP_OK);
    }

    public function test_validates_not_blank_product_draft_when_updating_product_listing(): void
    {
        $header = $this->getHeaderForLoginShopUser('bruce.wayne@example.com');

        /** @var ProductListing $productListing */
        $productListing = $this->productListingRepository->findOneBy([
            'code' => 'product_listing_bruce_1',
        ]);

        $this->client->request('PUT', '/api/v2/shop/account/vendor/product-listings/' . $productListing->getUuid(), [], [], $header, json_encode([]));

        $response = $this->client->getResponse();
        $this->assertResponse($response, 'Api/ProductListingTest/test_it_validates_not_blank_product_draft_response', Response::HTTP_UNPROCESSABLE_ENTITY);
    }

    public function test_it_prevents_send_to_verification_by_user_without_vendor_context(): void
    {
        $header = $this->getHeaderForLoginShopUser('john.smith@example.com');

        /** @var ProductListing $productListing */
        $productListing = $this->productListingRepository->findOneBy([
            'code' => 'product_listing_bruce_1',
        ]);

        $this->client->request('PUT', sprintf('/api/v2/shop/account/vendor/product-listings/%s/send-to-verification', $productListing->getUuid()), [], [], $header);

        $response = $this->client->getResponse();
        $this->assertResponse($response, 'Api/access_denied_response', Response::HTTP_FORBIDDEN);
    }

    public function test_it_prevents_send_to_verification_by_different_vendor(): void
    {
        $header = $this->getHeaderForLoginShopUser('peter.weyland@example.com');

        /** @var ProductListing $productListing */
        $productListing = $this->productListingRepository->findOneBy([
            'code' => 'product_listing_bruce_1',
        ]);

        $this->client->request('PUT', sprintf('/api/v2/shop/account/vendor/product-listings/%s/send-to-verification', $productListing->getUuid()), [], [], $header);

        $response = $this->client->getResponse();
        $this->assertResponse($response, 'Api/access_denied_response', Response::HTTP_FORBIDDEN);
    }

    public function test_it_send_to_verification_by_owner_vendor(): void
    {
        $header = $this->getHeaderForLoginShopUser('bruce.wayne@example.com');

        /** @var ProductListing $productListing */
        $productListing = $this->productListingRepository->findOneBy([
            'code' => 'product_listing_bruce_1',
        ]);

        $this->client->request('PUT', sprintf('/api/v2/shop/account/vendor/product-listings/%s/send-to-verification', $productListing->getUuid()), [], [], $header);

        $response = $this->client->getResponse();
        $this->assertResponse($response, 'Api/ProductListingTest/test_it_send_to_verification_by_owner_vendor', Response::HTTP_OK);
    }

    public function test_it_prevents_delete_by_user_without_vendor_context(): void
    {
        $header = $this->getHeaderForLoginShopUser('john.smith@example.com');

        /** @var ProductListing $productListing */
        $productListing = $this->productListingRepository->findOneBy([
            'code' => 'product_listing_bruce_1',
        ]);

        $this->client->request('DELETE', '/api/v2/shop/account/vendor/product-listings/' . $productListing->getUuid(), [], [], $header);

        $response = $this->client->getResponse();
        $this->assertResponse($response, 'Api/access_denied_response', Response::HTTP_FORBIDDEN);
    }

    public function test_it_prevents_delete_by_different_vendor(): void
    {
        $header = $this->getHeaderForLoginShopUser('peter.weyland@example.com');

        /** @var ProductListing $productListing */
        $productListing = $this->productListingRepository->findOneBy([
            'code' => 'product_listing_bruce_1',
        ]);

        $this->client->request('DELETE', '/api/v2/shop/account/vendor/product-listings/' . $productListing->getUuid(), [], [], $header);

        $response = $this->client->getResponse();
        $this->assertResponse($response, 'Api/access_denied_response', Response::HTTP_FORBIDDEN);
    }

    public function test_it_delete_by_owner_vendor(): void
    {
        $header = $this->getHeaderForLoginShopUser('bruce.wayne@example.com');

        /** @var ProductListing $productListing */
        $productListing = $this->productListingRepository->findOneBy([
            'code' => 'product_listing_bruce_1',
        ]);

        $this->client->request('DELETE', '/api/v2/shop/account/vendor/product-listings/' . $productListing->getUuid(), [], [], $header);

        $response = $this->client->getResponse();
        $this->assertResponseCode($response, Response::HTTP_NO_CONTENT);
        $this->assertEquals('', $response->getContent());
    }

    private function getUploadedProductImageFile(): UploadedFile
    {
        $fileName = 'product1.png';

        $file = new UploadedFile(
            $this->getFilePath($fileName),
            $fileName,
            'image/png',
        );

        return $file;
    }
}
