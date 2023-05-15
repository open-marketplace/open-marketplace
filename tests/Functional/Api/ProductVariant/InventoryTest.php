<?php

/*
 * This file was created by developers working at BitBag
 * Do you need more information about us and what we do? Visit our https://bitbag.io website!
 * We are hiring developers from all over the world. Join us and start your new, exciting adventure and become part of us: https://bitbag.io/career
*/

declare(strict_types=1);

namespace Tests\BitBag\OpenMarketplace\Functional\Api\ProductVariant;

use BitBag\OpenMarketplace\Entity\Vendor;
use Sylius\Tests\Api\Utils\ShopUserLoginTrait;
use Symfony\Component\HttpFoundation\Response;
use Tests\BitBag\OpenMarketplace\Functional\FunctionalTestCase;

final class InventoryTest extends FunctionalTestCase
{
    use ShopUserLoginTrait;

    public function setUp(): void
    {
        $this->entityManager = static::getContainer()->get('doctrine.orm.entity_manager');
        $this->vendorRepository = $this->entityManager->getRepository(Vendor::class);

        $this->loadFixturesFromFile('Api/ProductVariant/InventoryTest/inventory.yml');
    }

    public function test_it_get_product_variants_by_vendor(): void
    {
        $header = $this->getHeaderForLoginShopUser('bruce.wayne@example.com');

        $this->client->request('GET', '/api/v2/shop/account/vendor/product-variants/inventory', [], [], $header);

        $response = $this->client->getResponse();
        $this->assertResponse($response, 'Api/ProductVariant/InventoryTest/test_it_get_product_variants_by_vendor', Response::HTTP_OK);
    }

    public function test_denies_access_get_product_variants_by_user_without_vendor_context(): void
    {
        $header = $this->getHeaderForLoginShopUser('john.smith@example.com');

        $this->client->request('GET', '/api/v2/shop/account/vendor/product-variants/inventory', [], [], $header);

        $response = $this->client->getResponse();
        $this->assertResponse($response, 'Api/access_denied_response', Response::HTTP_FORBIDDEN);
    }

    public function test_it_get_product_variant_by_vendor(): void
    {
        $header = $this->getHeaderForLoginShopUser('bruce.wayne@example.com');

        $this->client->request('GET', '/api/v2/shop/account/vendor/product-variants/bruce_1_2/inventory', [], [], $header);

        $response = $this->client->getResponse();
        $this->assertResponse($response, 'Api/ProductVariant/InventoryTest/test_it_get_product_variant_by_vendor', Response::HTTP_OK);
    }

    public function test_not_found_get_product_variant_by_different_vendor(): void
    {
        $header = $this->getHeaderForLoginShopUser('peter.weyland@example.com');

        $this->client->request('GET', '/api/v2/shop/account/vendor/product-variants/bruce_1_2/inventory', [], [], $header);

        $response = $this->client->getResponse();
        $this->assertResponse($response, 'Api/access_denied_response', Response::HTTP_FORBIDDEN);
    }

    public function test_denies_access_get_product_variant_by_user_without_vendor_context(): void
    {
        $header = $this->getHeaderForLoginShopUser('john.smith@example.com');

        $this->client->request('GET', '/api/v2/shop/account/vendor/product-variants/bruce_1_2/inventory', [], [], $header);

        $response = $this->client->getResponse();
        $this->assertResponse($response, 'Api/access_denied_response', Response::HTTP_FORBIDDEN);
    }

    public function test_it_update_product_variant_by_vendor(): void
    {
        $header = $this->getHeaderForLoginShopUser('bruce.wayne@example.com');

        $this->client->request('PUT', '/api/v2/shop/account/vendor/product-variants/bruce_2_1/inventory', [], [], $header, json_encode([
            'amount' => 5,
            'tracked' => true,
        ], \JSON_THROW_ON_ERROR));

        $response = $this->client->getResponse();
        $this->assertResponse($response, 'Api/ProductVariant/InventoryTest/test_it_update_product_variant_by_vendor', Response::HTTP_OK);
    }

    public function test_amount_validator_update_product_variant_by_vendor(): void
    {
        $header = $this->getHeaderForLoginShopUser('bruce.wayne@example.com');

        $this->client->request('PUT', '/api/v2/shop/account/vendor/product-variants/bruce_1_1/inventory', [], [], $header, json_encode([
            'amount' => 1,
        ], \JSON_THROW_ON_ERROR));

        $response = $this->client->getResponse();
        $this->assertResponse($response, 'Api/ProductVariant/InventoryTest/test_amount_validator_update_product_variant_by_vendor', Response::HTTP_UNPROCESSABLE_ENTITY);
    }

    public function test_not_found_update_product_variant_by_different_vendor(): void
    {
        $header = $this->getHeaderForLoginShopUser('peter.weyland@example.com');

        $this->client->request('PUT', '/api/v2/shop/account/vendor/product-variants/bruce_2_1/inventory', [], [], $header, json_encode([
            'amount' => 5,
            'tracked' => true,
        ], \JSON_THROW_ON_ERROR));

        $response = $this->client->getResponse();
        $this->assertResponse($response, 'Api/access_denied_response', Response::HTTP_FORBIDDEN);
    }

    public function test_denies_access_update_product_variant_by_user_without_vendor_context(): void
    {
        $header = $this->getHeaderForLoginShopUser('john.smith@example.com');

        $this->client->request('PUT', '/api/v2/shop/account/vendor/product-variants/bruce_2_1/inventory', [], [], $header, json_encode([
            'amount' => 5,
            'tracked' => true,
        ], \JSON_THROW_ON_ERROR));

        $response = $this->client->getResponse();
        $this->assertResponse($response, 'Api/access_denied_response', Response::HTTP_FORBIDDEN);
    }
}
