<?php

/*
 * This file was created by developers working at BitBag
 * Do you need more information about us and what we do? Visit our https://bitbag.io website!
 * We are hiring developers from all over the world. Join us and start your new, exciting adventure and become part of us: https://bitbag.io/career
*/

declare(strict_types=1);

namespace Test\BitBag\OpenMarketplace\Functional\Api;

use BitBag\OpenMarketplace\Component\Order\Entity\Order;
use Sylius\Tests\Api\Utils\ShopUserLoginTrait;
use Symfony\Component\HttpFoundation\Response;
use Tests\BitBag\OpenMarketplace\Functional\FunctionalTestCase;

final class OrderTest extends FunctionalTestCase
{
    use ShopUserLoginTrait;

    public function setUp(): void
    {
        $this->entityManager = static::getContainer()->get('doctrine.orm.entity_manager');
        $this->orderRepository = $this->entityManager->getRepository(Order::class);

        $this->loadFixturesFromFile('Api/OrderTest/order.yml');
    }

    public function test_it_get_orders_by_vendor(): void
    {
        $header = $this->getHeaderForLoginShopUser('bruce.wayne@example.com');

        $this->client->request('GET', '/api/v2/shop/account/vendor/orders', [], [], $header);

        $response = $this->client->getResponse();
        $this->assertResponse($response, 'Api/OrderTest/test_it_get_orders_by_vendor', Response::HTTP_OK);
    }

    public function test_it_get_orders_by_vendor_filter_payment_state(): void
    {
        $header = $this->getHeaderForLoginShopUser('bruce.wayne@example.com');

        $this->client->request('GET', '/api/v2/shop/account/vendor/orders', ['paymentState' => 'paid'], [], $header);

        $response = $this->client->getResponse();
        $this->assertResponse($response, 'Api/OrderTest/test_it_get_orders_by_vendor_filter_payment_state', Response::HTTP_OK);
    }

    public function test_denies_access_get_orders_by_user_without_vendor_context(): void
    {
        $header = $this->getHeaderForLoginShopUser('john.smith@example.com');

        $this->client->request('GET', '/api/v2/shop/account/vendor/orders', [], [], $header);

        $response = $this->client->getResponse();
        $this->assertResponse($response, 'Api/access_denied_response', Response::HTTP_FORBIDDEN);
    }

    public function test_it_get_order_by_vendor(): void
    {
        $header = $this->getHeaderForLoginShopUser('bruce.wayne@example.com');

        $this->client->request('GET', '/api/v2/shop/account/vendor/orders/bruce_order_made_by_john_1', [], [], $header);

        $response = $this->client->getResponse();
        $this->assertResponse($response, 'Api/OrderTest/test_it_get_order_by_vendor', Response::HTTP_OK);
    }

    public function test_forbidden_get_order_by_different_vendor(): void
    {
        $header = $this->getHeaderForLoginShopUser('john.smith@example.com');

        $this->client->request('GET', '/api/v2/shop/account/vendor/orders/bruce_order_made_by_john_1', [], [], $header);

        $response = $this->client->getResponse();
        $this->assertResponse($response, 'Api/access_denied_response', Response::HTTP_FORBIDDEN);
    }

    public function test_denies_access_get_order_by_user_without_vendor_context(): void
    {
        $header = $this->getHeaderForLoginShopUser('john.smith@example.com');

        $this->client->request('GET', '/api/v2/shop/account/vendor/orders/bruce_order_made_by_john_1', [], [], $header);

        $response = $this->client->getResponse();
        $this->assertResponse($response, 'Api/access_denied_response', Response::HTTP_FORBIDDEN);
    }

    public function test_it_cancel_order_by_vendor(): void
    {
        $header = $this->getHeaderForLoginShopUser('bruce.wayne@example.com');

        $this->client->request('PATCH', '/api/v2/shop/account/vendor/orders/bruce_order_made_by_john_2/cancel', [], [], $header);

        $response = $this->client->getResponse();
        $this->assertResponse($response, 'Api/OrderTest/test_it_cancel_order_by_vendor', Response::HTTP_OK);
    }

    public function test_it_cancel_not_paid_order_by_vendor(): void
    {
        $header = $this->getHeaderForLoginShopUser('john.smith@example.com');

        $this->client->request('PATCH', '/api/v2/shop/account/vendor/orders/bruce_order_made_by_john_1/cancel', [], [], $header);

        $response = $this->client->getResponse();
        $this->assertResponse($response, 'Api/access_denied_response', Response::HTTP_FORBIDDEN);
    }

    public function test_it_cancel_order_by_different_vendor(): void
    {
        $header = $this->getHeaderForLoginShopUser('john.smith@example.com');

        $this->client->request('PATCH', '/api/v2/shop/account/vendor/orders/bruce_order_made_by_john_2/cancel', [], [], $header);

        $response = $this->client->getResponse();
        $this->assertResponse($response, 'Api/access_denied_response', Response::HTTP_FORBIDDEN);
    }

    public function test_it_cancel_order_by_user_without_vendor_context(): void
    {
        $header = $this->getHeaderForLoginShopUser('john.smith@example.com');

        $this->client->request('PATCH', '/api/v2/shop/account/vendor/orders/bruce_order_made_by_john_2/cancel', [], [], $header);

        $response = $this->client->getResponse();
        $this->assertResponse($response, 'Api/access_denied_response', Response::HTTP_FORBIDDEN);
    }

    public function test_get_shop_orders_by_user(): void
    {
        $header = $this->getHeaderForLoginShopUser('john.smith@example.com');

        $this->client->request('GET', '/api/v2/shop/orders', [], [], $header);

        $response = $this->client->getResponse();
        $this->assertResponse($response, 'Api/OrderTest/test_get_shop_orders_by_shop_user', Response::HTTP_OK);
    }

    public function test_get_shop_orders_by_vendor(): void
    {
        $header = $this->getHeaderForLoginShopUser('peter.weyland@example.com');

        $this->client->request('GET', '/api/v2/shop/orders', [], [], $header);

        $response = $this->client->getResponse();
        $this->assertResponse($response, 'Api/OrderTest/test_get_shop_orders_by_vendor', Response::HTTP_OK);
    }
}
