<?php

/*
 * This file was created by developers working at BitBag
 * Do you need more information about us and what we do? Visit our https://bitbag.io website!
 * We are hiring developers from all over the world. Join us and start your new, exciting adventure and become part of us: https://bitbag.io/career
*/

declare(strict_types=1);

namespace Tests\BitBag\OpenMarketplace\Functional\Api;

use Sylius\Component\Core\Model\Customer;
use Sylius\Component\Core\Model\CustomerInterface;
use Sylius\Tests\Api\Utils\ShopUserLoginTrait;
use Symfony\Component\HttpFoundation\Response;
use Tests\BitBag\OpenMarketplace\Functional\FunctionalTestCase;

final class CustomerTest extends FunctionalTestCase
{
    use ShopUserLoginTrait;

    public function setUp(): void
    {
        $this->entityManager = static::getContainer()->get('doctrine.orm.entity_manager');
        $this->customerRepository = $this->entityManager->getRepository(Customer::class);

        $this->loadFixturesFromFile('Api/CustomerTest/customer.yml');
    }

    public function test_it_get_customers_by_vendor(): void
    {
        $header = $this->getHeaderForLoginShopUser('bruce.wayne@example.com');

        $this->client->request('GET', '/api/v2/shop/account/vendor/customers', [], [], $header);

        $response = $this->client->getResponse();
        $this->assertResponse($response, 'Api/CustomerTest/test_it_get_customers_by_vendor', Response::HTTP_OK);
    }

    public function test_it_get_customers_by_vendor_filter_email(): void
    {
        $header = $this->getHeaderForLoginShopUser('bruce.wayne@example.com');

        $this->client->request('GET', '/api/v2/shop/account/vendor/customers', ['email' => 'john'], [], $header);

        $response = $this->client->getResponse();
        $this->assertResponse($response, 'Api/CustomerTest/test_it_get_customers_by_vendor_filter_email', Response::HTTP_OK);
    }

    public function test_denies_access_get_orders_by_user_without_vendor_context(): void
    {
        $header = $this->getHeaderForLoginShopUser('john.smith@example.com');

        $this->client->request('GET', '/api/v2/shop/account/vendor/customers', [], [], $header);

        $response = $this->client->getResponse();
        $this->assertResponse($response, 'Api/access_denied_response', Response::HTTP_FORBIDDEN);
    }

    public function test_it_get_customer_by_vendor(): void
    {
        $header = $this->getHeaderForLoginShopUser('bruce.wayne@example.com');

        /** @var CustomerInterface $customer */
        $customer = $this->customerRepository->findOneBy(['email' => 'john.smith@example.com']);

        $this->client->request('GET', '/api/v2/shop/account/vendor/customers/' . $customer->getId(), [], [], $header);

        $response = $this->client->getResponse();
        $this->assertResponse($response, 'Api/CustomerTest/test_it_get_customer_by_vendor', Response::HTTP_OK);
    }

    public function test_not_found_get_customer_by_different_vendor(): void
    {
        $header = $this->getHeaderForLoginShopUser('peter.weyland@example.com');

        /** @var CustomerInterface $customer */
        $customer = $this->customerRepository->findOneBy(['email' => 'john.smith@example.com']);

        $this->client->request('GET', '/api/v2/shop/account/vendor/customers/' . $customer->getId(), [], [], $header);

        $response = $this->client->getResponse();
        $this->assertResponse($response, 'Api/not_found_response', Response::HTTP_NOT_FOUND);
    }

    public function test_denies_access_get_customer_by_user_without_vendor_context(): void
    {
        $header = $this->getHeaderForLoginShopUser('john.smith@example.com');

        /** @var CustomerInterface $customer */
        $customer = $this->customerRepository->findOneBy(['email' => 'john.smith@example.com']);

        $this->client->request('GET', '/api/v2/shop/account/vendor/customers/' . $customer->getId(), [], [], $header);

        $response = $this->client->getResponse();
        $this->assertResponse($response, 'Api/access_denied_response', Response::HTTP_FORBIDDEN);
    }

    public function test_get_shop_customer_by_user(): void
    {
        $header = $this->getHeaderForLoginShopUser('john.smith@example.com');

        /** @var CustomerInterface $customer */
        $customer = $this->customerRepository->findOneBy(['email' => 'john.smith@example.com']);

        $this->client->request('GET', '/api/v2/shop/customers/' . $customer->getId(), [], [], $header);

        $response = $this->client->getResponse();
        $this->assertResponse($response, 'Api/CustomerTest/test_get_shop_customer_by_user', Response::HTTP_OK);
    }

    public function test_get_shop_customer_by_vendor(): void
    {
        $header = $this->getHeaderForLoginShopUser('bruce.wayne@example.com');

        /** @var CustomerInterface $customer */
        $customer = $this->customerRepository->findOneBy(['email' => 'bruce.wayne@example.com']);

        $this->client->request('GET', '/api/v2/shop/customers/' . $customer->getId(), [], [], $header);

        $response = $this->client->getResponse();
        $this->assertResponse($response, 'Api/CustomerTest/test_get_shop_customer_by_vendor', Response::HTTP_OK);
    }

    public function test_get_shop_customer_by_different_user(): void
    {
        $header = $this->getHeaderForLoginShopUser('bruce.wayne@example.com');

        /** @var CustomerInterface $customer */
        $customer = $this->customerRepository->findOneBy(['email' => 'john.smith@example.com']);

        $this->client->request('GET', '/api/v2/shop/customers/' . $customer->getId(), [], [], $header);

        $response = $this->client->getResponse();
        $this->assertResponse($response, 'Api/not_found_response', Response::HTTP_NOT_FOUND);
    }
}
