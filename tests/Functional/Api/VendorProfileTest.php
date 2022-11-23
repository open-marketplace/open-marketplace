<?php

/*
 * This file has been created by developers from BitBag.
 * Feel free to contact us once you face any issues or want to start
 * You can find more information about us on https://bitbag.io and write us
 * an email on hello@bitbag.io.
 */

declare(strict_types=1);

namespace Tests\BitBag\OpenMarketplace\Functional\Api;

use BitBag\OpenMarketplace\Entity\Vendor;
use BitBag\OpenMarketplace\Entity\VendorInterface;
use Sylius\Tests\Api\Utils\ShopUserLoginTrait;
use Symfony\Component\HttpFoundation\Response;
use Tests\BitBag\OpenMarketplace\Functional\FunctionalTestCase;

final class VendorProfileTest extends FunctionalTestCase
{
    use ShopUserLoginTrait;

    public function setUp(): void
    {
        $this->entityManager = static::getContainer()->get('doctrine.orm.entity_manager');
        $this->vendorRepository = $this->entityManager->getRepository(Vendor::class);

        $this->loadFixturesFromFile('Api/VendorProfileTest/vendor_profile_basic.yml');
    }

    public function test_it_get_vendor_data_for_shop_user_in_his_vendor_context()
    {
        $header = $this->getHeaderForLoginShopUser('bruce.wayne@example.com');

        $vendor = $this->vendorRepository->findOneBy(['slug' => 'Wayne-Enterprises-Inc']);

        $this->client->request('GET', '/api/v2/shop/account/vendors/' . $vendor->getId(), [], [], $header);
        $response = $this->client->getResponse();
        $this->assertResponse($response, 'Api/VendorProfileTest/test_it_get_vendor_data_for_shop_user_in_his_vendor_context', Response::HTTP_OK);
    }

    public function test_it_get_vendor_not_found_when_shop_user_is_not_in_vendor_context()
    {
        $header = $this->getHeaderForLoginShopUser('john.smith@example.com');

        $vendor = $this->vendorRepository->findOneBy(['slug' => 'Wayne-Enterprises-Inc']);

        $this->client->request('GET', '/api/v2/shop/account/vendors/' . $vendor->getId(), [], [], $header);
        $response = $this->client->getResponse();
        $this->assertResponse($response, 'Api/not_found_response', Response::HTTP_NOT_FOUND);
    }

    public function test_it_get_vendor_not_found_when_shop_user_has_different_vendor_context()
    {
        $header = $this->getHeaderForLoginShopUser('peter.weyland@example.com');

        $vendor = $this->vendorRepository->findOneBy(['slug' => 'Wayne-Enterprises-Inc']);

        $this->client->request('GET', '/api/v2/shop/account/vendors/' . $vendor->getId(), [], [], $header);
        $response = $this->client->getResponse();
        $this->assertResponse($response, 'Api/not_found_response', Response::HTTP_NOT_FOUND);
    }

    public function test_it_successful_update_vendor_data_for_shop_user_in_his_vendor_context()
    {
        $header = $this->getHeaderForLoginShopUser('bruce.wayne@example.com');

        /** @var VendorInterface $vendor */
        $vendor = $this->vendorRepository->findOneBy(['slug' => 'Wayne-Enterprises-Inc']);

        $this->client->request('PUT', '/api/v2/shop/account/vendors/' . $vendor->getId(), [], [], $header, json_encode([
            'companyName' => 'Wayne Enterprises',
            'taxIdentifier' => '345',
            'phoneNumber' => '123456789',
            'description' => 'Wayne Enterprises Desc',
            'vendorAddress' => [
                'country' => '/api/v2/shop/countries/PL',
                'city' => 'New York',
                'street' => 'Wall St. 1',
                'postalCode' => '12123',
            ],
        ]));
        $response = $this->client->getResponse();

        $this->assertEquals('Wayne-Enterprises', $vendor->getSlug());
        $this->assertResponse($response, 'Api/VendorProfileTest/test_it_successful_update_vendor_data_for_shop_user_in_his_vendor_context', Response::HTTP_OK);
    }

    public function test_it_update_vendor_not_found_when_shop_user_is_not_in_vendor_context()
    {
        $header = $this->getHeaderForLoginShopUser('john.smith@example.com');

        $vendor = $this->vendorRepository->findOneBy(['slug' => 'Wayne-Enterprises-Inc']);

        $this->client->request('PUT', '/api/v2/shop/account/vendors/' . $vendor->getId(), [], [], $header);
        $response = $this->client->getResponse();
        $this->assertResponse($response, 'Api/not_found_response', Response::HTTP_NOT_FOUND);
    }

    public function test_it_update_vendor_not_found_when_shop_user_has_different_vendor_context()
    {
        $header = $this->getHeaderForLoginShopUser('peter.weyland@example.com');

        $vendor = $this->vendorRepository->findOneBy(['slug' => 'Wayne-Enterprises-Inc']);

        $this->client->request('PUT', '/api/v2/shop/account/vendors/' . $vendor->getId(), [], [], $header);
        $response = $this->client->getResponse();
        $this->assertResponse($response, 'Api/not_found_response', Response::HTTP_NOT_FOUND);
    }

    private function getHeaderForLoginShopUser(string $email): array
    {
        $loginData = $this->logInShopUser($email);
        $authorizationHeader = self::getContainer()->getParameter('sylius.api.authorization_header');
        $header['HTTP_' . $authorizationHeader] = 'Bearer ' . $loginData;

        return array_merge($header, self::CONTENT_TYPE_HEADER);
    }
}