<?php

/*
 * This file has been created by developers from BitBag.
 * Feel free to contact us once you face any issues or want to start
 * You can find more information about us on https://bitbag.io and write us
 * an email on hello@bitbag.io.
 */

declare(strict_types=1);

namespace Tests\BitBag\OpenMarketplace\Functional\Api;

use Sylius\Tests\Api\Utils\ShopUserLoginTrait;
use Symfony\Component\HttpFoundation\Response;
use Tests\BitBag\OpenMarketplace\Functional\FunctionalTestCase;

final class VendorRegistrationTest extends FunctionalTestCase
{
    use ShopUserLoginTrait;

    public function test_vendor_success_registration()
    {
        $this->loadFixturesFromFile('Api/VendorRegistrationTest/test_vendor_basic_registration.yml');

        $loginData = $this->logInShopUser('test@example.com');
        $authorizationHeader = self::$container->getParameter('sylius.api.authorization_header');
        $header['HTTP_' . $authorizationHeader] = 'Bearer ' . $loginData;
        $header = array_merge($header, self::CONTENT_TYPE_HEADER);

        $this->client->request('POST', '/api/v2/shop/account/vendors', [], [], $header, json_encode([
            'companyName' => 'Wayland Corp',
            'taxIdentifier' => '345',
            'phoneNumber' => '123456789',
            'description' => 'Wayland Corp Desc',
            'vendorAddress' => [
                'country' => '/api/v2/shop/countries/PL',
                'city' => 'Warszawa',
                'street' => 'Jasna 1',
                'postalCode' => '12-123',
            ],
        ]));
        $response = $this->client->getResponse();
        $this->assertResponse($response, 'Api/VendorRegistrationTest/success_registration_response', Response::HTTP_CREATED);
    }

    public function test_vendor_unauthorized_registration()
    {
        $this->loadFixturesFromFile('Api/VendorRegistrationTest/test_vendor_basic_registration.yml');

        $this->client->request('POST', '/api/v2/shop/account/vendors', [], [], self::CONTENT_TYPE_HEADER, json_encode([]));
        $response = $this->client->getResponse();
        $this->assertResponse($response, 'Api/VendorRegistrationTest/unauthorized_registration_response', Response::HTTP_UNAUTHORIZED);
    }

    public function test_existed_vendor_registration()
    {
        $this->loadFixturesFromFiles(['Api/VendorRegistrationTest/test_vendor_basic_registration.yml', 'Api/VendorRegistrationTest/test_existed_vendor_registration.yml']);

        $loginData = $this->logInShopUser('test@example.com');
        $authorizationHeader = self::$container->getParameter('sylius.api.authorization_header');
        $header['HTTP_' . $authorizationHeader] = 'Bearer ' . $loginData;
        $header = array_merge($header, self::CONTENT_TYPE_HEADER);

        $this->client->request('POST', '/api/v2/shop/account/vendors', [], [], $header, json_encode([
            'companyName' => 'Wayland Corp',
            'taxIdentifier' => '345',
            'phoneNumber' => '123456789',
            'description' => 'Wayland Corp Desc',
            'vendorAddress' => [
                'country' => '/api/v2/shop/countries/PL',
                'city' => 'Warszawa',
                'street' => 'Jasna 1',
                'postalCode' => '12-123',
            ],
        ]));
        $response = $this->client->getResponse();
        $this->assertResponse($response, 'Api/VendorRegistrationTest/existed_vendor_response', Response::HTTP_UNPROCESSABLE_ENTITY);
    }

    public function test_not_blank_validation_rules()
    {
        $this->loadFixturesFromFile('Api/VendorRegistrationTest/test_vendor_basic_registration.yml');

        $loginData = $this->logInShopUser('test@example.com');
        $authorizationHeader = self::$container->getParameter('sylius.api.authorization_header');
        $header['HTTP_' . $authorizationHeader] = 'Bearer ' . $loginData;
        $header = array_merge($header, self::CONTENT_TYPE_HEADER);

        $this->client->request('POST', '/api/v2/shop/account/vendors', [], [], $header, json_encode([]));
        $response = $this->client->getResponse();
        $this->assertResponse($response, 'Api/VendorRegistrationTest/not_blank_validation_errors_response', Response::HTTP_BAD_REQUEST);
    }

    public function test_not_blank_address_fields_validation_rules()
    {
        $this->loadFixturesFromFile('Api/VendorRegistrationTest/test_vendor_basic_registration.yml');

        $loginData = $this->logInShopUser('test@example.com');
        $authorizationHeader = self::$container->getParameter('sylius.api.authorization_header');
        $header['HTTP_' . $authorizationHeader] = 'Bearer ' . $loginData;
        $header = array_merge($header, self::CONTENT_TYPE_HEADER);

        $this->client->request('POST', '/api/v2/shop/account/vendors', [], [], $header, json_encode([
            'companyName' => 'Wayland Corp',
            'taxIdentifier' => '345',
            'phoneNumber' => '123456789',
            'description' => 'Wayland Corp Desc',
            'vendorAddress' => [
            ],
        ]));
        $response = $this->client->getResponse();
        $this->assertResponse($response, 'Api/VendorRegistrationTest/not_blank_address_fields_validation_errors_response', Response::HTTP_UNPROCESSABLE_ENTITY);
    }

    public function test_wrong_iri_for_country_error()
    {
        $this->loadFixturesFromFile('Api/VendorRegistrationTest/test_vendor_basic_registration.yml');

        $loginData = $this->logInShopUser('test@example.com');
        $authorizationHeader = self::$container->getParameter('sylius.api.authorization_header');
        $header['HTTP_' . $authorizationHeader] = 'Bearer ' . $loginData;
        $header = array_merge($header, self::CONTENT_TYPE_HEADER);

        $this->client->request('POST', '/api/v2/shop/account/vendors', [], [], $header, json_encode([
            'companyName' => 'Wayland Corp',
            'taxIdentifier' => '345',
            'phoneNumber' => '123456789',
            'description' => 'Wayland Corp Desc',
            'vendorAddress' => [
                'country' => 'PL',
                'city' => 'Warszawa',
                'street' => 'Jasna 1',
                'postalCode' => '12-123',
            ],
        ]));
        $response = $this->client->getResponse();
        $this->assertResponse($response, 'Api/invalid_iri_response', Response::HTTP_INTERNAL_SERVER_ERROR);
    }

    public function test_not_existed_country()
    {
        $this->loadFixturesFromFile('Api/VendorRegistrationTest/test_vendor_basic_registration.yml');

        $loginData = $this->logInShopUser('test@example.com');
        $authorizationHeader = self::$container->getParameter('sylius.api.authorization_header');
        $header['HTTP_' . $authorizationHeader] = 'Bearer ' . $loginData;
        $header = array_merge($header, self::CONTENT_TYPE_HEADER);

        $this->client->request('POST', '/api/v2/shop/account/vendors', [], [], $header, json_encode([
            'companyName' => 'Wayland Corp',
            'taxIdentifier' => '345',
            'phoneNumber' => '123456789',
            'description' => 'Wayland Corp Desc',
            'vendorAddress' => [
                'country' => '/api/v2/shop/countries/RO',
                'city' => 'Warszawa',
                'street' => 'Jasna 1',
                'postalCode' => '12-123',
            ],
        ]));
        $response = $this->client->getResponse();
        $this->assertResponse($response, 'Api/VendorRegistrationTest/not_existed_country_field_error_response', Response::HTTP_INTERNAL_SERVER_ERROR);
    }

    public function test_min_length_validation_rules()
    {
        $this->loadFixturesFromFile('Api/VendorRegistrationTest/test_vendor_basic_registration.yml');

        $loginData = $this->logInShopUser('test@example.com');
        $authorizationHeader = self::$container->getParameter('sylius.api.authorization_header');
        $header['HTTP_' . $authorizationHeader] = 'Bearer ' . $loginData;
        $header = array_merge($header, self::CONTENT_TYPE_HEADER);

        $this->client->request('POST', '/api/v2/shop/account/vendors', [], [], $header, json_encode([
            'companyName' => 'Wa',
            'taxIdentifier' => '34',
            'phoneNumber' => '12',
            'description' => 'Wa',
            'vendorAddress' => [
                'country' => '/api/v2/shop/countries/PL',
                'city' => 'Wa',
                'street' => 'Ja',
                'postalCode' => '12',
            ],
        ]));
        $response = $this->client->getResponse();
        $this->assertResponse($response, 'Api/VendorRegistrationTest/min_length_validation_errors_response', Response::HTTP_UNPROCESSABLE_ENTITY);
    }

    public function test_max_length_validation_rules()
    {
        $this->loadFixturesFromFile('Api/VendorRegistrationTest/test_vendor_basic_registration.yml');

        $loginData = $this->logInShopUser('test@example.com');
        $authorizationHeader = self::getContainer()->getParameter('sylius.api.authorization_header');
        $header['HTTP_' . $authorizationHeader] = 'Bearer ' . $loginData;
        $header = array_merge($header, self::CONTENT_TYPE_HEADER);

        $string256Length = str_repeat('a', 256);
        $string2049Length = str_repeat('a', 2049);

        $this->client->request('POST', '/api/v2/shop/account/vendors', [], [], $header, json_encode([
            'companyName' => $string256Length,
            'taxIdentifier' => $string256Length,
            'phoneNumber' => $string256Length,
            'description' => $string2049Length,
            'vendorAddress' => [
                'country' => '/api/v2/shop/countries/PL',
                'city' => $string256Length,
                'street' => $string256Length,
                'postalCode' => $string256Length,
            ],
        ]));
        $response = $this->client->getResponse();
        $this->assertResponse($response, 'Api/VendorRegistrationTest/max_length_validation_errors_response', Response::HTTP_UNPROCESSABLE_ENTITY);
    }
}
