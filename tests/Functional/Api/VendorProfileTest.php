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
use BitBag\OpenMarketplace\Entity\VendorBackgroundImage;
use BitBag\OpenMarketplace\Entity\VendorImage;
use BitBag\OpenMarketplace\Entity\VendorInterface;
use Sylius\Component\Core\Model\Customer;
use Sylius\Tests\Api\Utils\ShopUserLoginTrait;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\HttpFoundation\Response;
use Tests\BitBag\OpenMarketplace\Functional\FunctionalTestCase;

final class VendorProfileTest extends FunctionalTestCase
{
    use ShopUserLoginTrait;

    public function setUp(): void
    {
        $this->entityManager = static::getContainer()->get('doctrine.orm.entity_manager');
        $this->vendorRepository = $this->entityManager->getRepository(Vendor::class);
        $this->customerRepository = $this->entityManager->getRepository(Customer::class);
        $this->vendorImageRepository = $this->entityManager->getRepository(VendorImage::class);
        $this->vendorBackgroundImageRepository = $this->entityManager->getRepository(VendorBackgroundImage::class);
        $this->loadFixturesFromFile('Api/VendorProfileTest/vendor_profile.yml');
    }

    public function test_customer_has_vendor_data()
    {
        $header = $this->getHeaderForLoginShopUser('bruce.wayne@example.com');

        $customer = $this->customerRepository->findOneBy(['email' => 'bruce.wayne@example.com']);

        $this->client->request('GET', '/api/v2/shop/customers/' . $customer->getId(), [], [], $header);
        $response = $this->client->getResponse();
        $data = json_decode($response->getContent(), true);

        $this->assertArrayHasKey('user', $data);
        $this->assertEquals('Wayne-Enterprises-Inc', $data['user']['vendor']['slug']);
    }

    public function test_it_get_shop_vendor_data_for_shop_user()
    {
        /** @var VendorInterface $vendor */
        $vendor = $this->vendorRepository->findOneBy(['slug' => 'Wayne-Enterprises-Inc']);

        $this->client->request('GET', '/api/v2/shop/vendors/' . $vendor->getUuid()->toString(), [], [], self::CONTENT_TYPE_HEADER);
        $response = $this->client->getResponse();
        $this->assertResponse($response, 'Api/VendorProfileTest/test_it_get_shop_vendor_data_for_shop_user', Response::HTTP_OK);
    }

    public function test_it_gets_vendor_data_for_shop_user_in_his_vendor_context()
    {
        $header = $this->getHeaderForLoginShopUser('bruce.wayne@example.com');

        /** @var VendorInterface $vendor */
        $vendor = $this->vendorRepository->findOneBy(['slug' => 'Wayne-Enterprises-Inc']);

        $this->client->request('GET', '/api/v2/shop/account/vendor/' . (string) $vendor->getUuid()->toString(), [], [], $header);
        $response = $this->client->getResponse();
        $this->assertResponse($response, 'Api/VendorProfileTest/test_it_gets_vendor_data_for_shop_user_in_his_vendor_context', Response::HTTP_OK);
    }

    public function test_it_denies_access_on_get_vendor_data_when_shop_user_is_not_in_vendor_context()
    {
        $header = $this->getHeaderForLoginShopUser('john.smith@example.com');

        /** @var VendorInterface $vendor */
        $vendor = $this->vendorRepository->findOneBy(['slug' => 'Wayne-Enterprises-Inc']);

        $this->client->request('GET', '/api/v2/shop/account/vendor/' . $vendor->getUuid()->toString(), [], [], $header);
        $response = $this->client->getResponse();
        $this->assertResponse($response, 'Api/access_denied_response', Response::HTTP_FORBIDDEN);
    }

    public function test_it_get_vendor_not_found_when_shop_user_has_different_vendor_context()
    {
        $header = $this->getHeaderForLoginShopUser('peter.weyland@example.com');

        /** @var VendorInterface $vendor */
        $vendor = $this->vendorRepository->findOneBy(['slug' => 'Wayne-Enterprises-Inc']);

        $this->client->request('GET', '/api/v2/shop/account/vendor/' . $vendor->getUuid()->toString(), [], [], $header);
        $response = $this->client->getResponse();
        $this->assertResponse($response, 'Api/not_found_response', Response::HTTP_NOT_FOUND);
    }

    public function test_it_successful_update_vendor_data_for_shop_user_in_his_vendor_context()
    {
        $header = $this->getHeaderForLoginShopUser('bruce.wayne@example.com');

        /** @var VendorInterface $vendor */
        $vendor = $this->vendorRepository->findOneBy(['slug' => 'Wayne-Enterprises-Inc']);

        $this->client->request('PUT', '/api/v2/shop/account/vendor/' . $vendor->getUuid()->toString(), [], [], $header, json_encode([
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
        ], \JSON_THROW_ON_ERROR));
        $response = $this->client->getResponse();

        $this->assertEquals('Wayne-Enterprises', $vendor->getSlug());
        $this->assertResponse($response, 'Api/VendorProfileTest/test_it_successful_update_vendor_data_for_shop_user_in_his_vendor_context', Response::HTTP_OK);
    }

    public function test_it_denies_access_on_update_vendor_when_shop_user_is_not_in_vendor_context()
    {
        $header = $this->getHeaderForLoginShopUser('john.smith@example.com');

        /** @var VendorInterface $vendor */
        $vendor = $this->vendorRepository->findOneBy(['slug' => 'Wayne-Enterprises-Inc']);

        $this->client->request('PUT', '/api/v2/shop/account/vendor/' . $vendor->getUuid()->toString(), [], [], $header);
        $response = $this->client->getResponse();
        $this->assertResponse($response, 'Api/access_denied_response', Response::HTTP_FORBIDDEN);
    }

    public function test_it_update_vendor_not_found_when_shop_user_has_different_vendor_context()
    {
        $header = $this->getHeaderForLoginShopUser('peter.weyland@example.com');

        /** @var VendorInterface $vendor */
        $vendor = $this->vendorRepository->findOneBy(['slug' => 'Wayne-Enterprises-Inc']);

        $this->client->request('PUT', '/api/v2/shop/account/vendor/' . $vendor->getUuid()->toString(), [], [], $header);
        $response = $this->client->getResponse();
        $this->assertResponse($response, 'Api/not_found_response', Response::HTTP_NOT_FOUND);
    }

    public function test_not_blank_validation_rules()
    {
        $header = $this->getHeaderForLoginShopUser('bruce.wayne@example.com');

        /** @var VendorInterface $vendor */
        $vendor = $this->vendorRepository->findOneBy(['slug' => 'Wayne-Enterprises-Inc']);

        $this->client->request('PUT', '/api/v2/shop/account/vendor/' . $vendor->getUuid()->toString(), [], [], $header, json_encode([
            'companyName' => '',
            'taxIdentifier' => '',
            'phoneNumber' => '',
            'description' => '',
            'vendorAddress' => [
                'city' => '',
                'street' => '',
                'postalCode' => '',
            ],
        ]));
        $response = $this->client->getResponse();
        $this->assertResponse($response, 'Api/VendorProfileTest/test_not_blank_validation_rules', Response::HTTP_UNPROCESSABLE_ENTITY);
    }

    public function test_wrong_iri_for_country_error()
    {
        $header = $this->getHeaderForLoginShopUser('bruce.wayne@example.com');

        /** @var VendorInterface $vendor */
        $vendor = $this->vendorRepository->findOneBy(['slug' => 'Wayne-Enterprises-Inc']);

        $this->client->request('PUT', '/api/v2/shop/account/vendor/' . $vendor->getUuid()->toString(), [], [], $header, json_encode([
            'vendorAddress' => [
                'country' => 'PL',
            ],
        ]));

        $response = $this->client->getResponse();
        $this->assertResponse($response, 'Api/internal_server_error', Response::HTTP_INTERNAL_SERVER_ERROR);
    }

    public function test_not_existed_country()
    {
        $header = $this->getHeaderForLoginShopUser('bruce.wayne@example.com');

        /** @var VendorInterface $vendor */
        $vendor = $this->vendorRepository->findOneBy(['slug' => 'Wayne-Enterprises-Inc']);

        $this->client->request('PUT', '/api/v2/shop/account/vendor/' . $vendor->getUuid()->toString(), [], [], $header, json_encode([
            'vendorAddress' => [
                'country' => '/api/v2/shop/countries/RO',
            ],
        ]));
        $response = $this->client->getResponse();
        $this->assertResponse($response, 'Api/internal_server_error', Response::HTTP_INTERNAL_SERVER_ERROR);
    }

    public function test_vendor_image_upload_successfully()
    {
        $header = $this->getHeaderForLoginShopUser('bruce.wayne@example.com');

        $this->client->request('POST', '/api/v2/shop/account/vendor/vendor-images', [], [
            'file' => $this->getUploadedFile(),
        ], $header, json_encode([]));

        $response = $this->client->getResponse();
        $this->assertResponse($response, 'Api/VendorProfileTest/test_vendor_image_upload_successfully', Response::HTTP_CREATED);
    }

    public function test_it_denies_access_on_image_upload_from_user_without_vendor_context()
    {
        $header = $this->getHeaderForLoginShopUser('john.smith@example.com');

        $this->client->request('POST', '/api/v2/shop/account/vendor/vendor-images', [], [
            'file' => $this->getUploadedFile(),
        ], $header, json_encode([]));

        $response = $this->client->getResponse();
        $this->assertResponse($response, 'Api/access_denied_response', Response::HTTP_FORBIDDEN);
    }

    public function test_not_blank_vendor_image_file_validation_rule()
    {
        $header = $this->getHeaderForLoginShopUser('bruce.wayne@example.com');

        $this->client->request('POST', '/api/v2/shop/account/vendor/vendor-images', [], [], $header, json_encode([]));

        $response = $this->client->getResponse();
        $this->assertResponse($response, 'Api/VendorProfileTest/test_not_blank_vendor_image_file_validation_rule', Response::HTTP_UNPROCESSABLE_ENTITY);
    }

    public function test_it_denies_access_on_delete_vendor_image_by_different_vendor()
    {
        $header = $this->getHeaderForLoginShopUser('bruce.wayne@example.com');

        /** @var VendorInterface $vendor */
        $vendor = $this->vendorRepository->findOneBy(['slug' => 'Weyland-Corp']);
        /** @var VendorImage $vendorImage */
        $vendorImage = $this->vendorImageRepository->findOneBy(['owner' => $vendor]);

        $this->client->request('DELETE', '/api/v2/shop/account/vendor/vendor-images/' . $vendorImage->getUuid()->toString(), [], [], $header);
        $response = $this->client->getResponse();

        $this->assertResponse($response, 'Api/access_denied_response', Response::HTTP_FORBIDDEN);
    }

    public function test_it_denies_access_on_delete_vendor_image_by_user_without_vendor_context()
    {
        $header = $this->getHeaderForLoginShopUser('john.smith@example.com');

        /** @var VendorInterface $vendor */
        $vendor = $this->vendorRepository->findOneBy(['slug' => 'Weyland-Corp']);
        /** @var VendorImage $vendorImage */
        $vendorImage = $this->vendorImageRepository->findOneBy(['owner' => $vendor]);

        $this->client->request('DELETE', '/api/v2/shop/account/vendor/vendor-images/' . $vendorImage->getUuid()->toString(), [], [], $header);
        $response = $this->client->getResponse();

        $this->assertResponse($response, 'Api/access_denied_response', Response::HTTP_FORBIDDEN);
    }

    public function test_it_deletes_vendor_image_by_right_owner()
    {
        $header = $this->getHeaderForLoginShopUser('peter.weyland@example.com');

        /** @var VendorInterface $vendor */
        $vendor = $this->vendorRepository->findOneBy(['slug' => 'Weyland-Corp']);
        /** @var VendorImage $vendorImage */
        $vendorImage = $this->vendorImageRepository->findOneBy(['owner' => $vendor]);

        $this->client->request('DELETE', '/api/v2/shop/account/vendor/vendor-images/' . $vendorImage->getUuid()->toString(), [], [], $header);
        $response = $this->client->getResponse();

        $this->assertResponseCode($response, Response::HTTP_NO_CONTENT);
        $this->assertEmpty($response->getContent());
    }

    public function test_it_denies_access_on_delete_vendor_background_image_by_user_without_vendor_context()
    {
        $header = $this->getHeaderForLoginShopUser('john.smith@example.com');

        /** @var VendorInterface $vendor */
        $vendor = $this->vendorRepository->findOneBy(['slug' => 'Weyland-Corp']);
        /** @var VendorBackgroundImage $vendorImage */
        $vendorImage = $this->vendorBackgroundImageRepository->findOneBy(['owner' => $vendor]);

        $this->client->request('DELETE', '/api/v2/shop/account/vendor/vendor-background-images/' . $vendorImage->getUuid()->toString(), [], [], $header);
        $response = $this->client->getResponse();

        $this->assertResponse($response, 'Api/access_denied_response', Response::HTTP_FORBIDDEN);
    }

    public function test_it_deletes_vendor_background_image_by_right_owner()
    {
        $header = $this->getHeaderForLoginShopUser('peter.weyland@example.com');

        /** @var VendorInterface $vendor */
        $vendor = $this->vendorRepository->findOneBy(['slug' => 'Weyland-Corp']);
        /** @var VendorBackgroundImage $vendorImage */
        $vendorImage = $this->vendorBackgroundImageRepository->findOneBy(['owner' => $vendor]);

        $this->client->request('DELETE', '/api/v2/shop/account/vendor/vendor-background-images/' . $vendorImage->getUuid()->toString(), [], [], $header);
        $response = $this->client->getResponse();

        $this->assertResponseCode($response, Response::HTTP_NO_CONTENT);
        $this->assertEmpty($response->getContent());
    }

    public function test_it_denies_access_on_background_image_upload_from_user_without_vendor_context()
    {
        $header = $this->getHeaderForLoginShopUser('john.smith@example.com');

        $this->client->request('POST', '/api/v2/shop/account/vendor/vendor-background-images', [], [
            'file' => $this->getUploadedFile(),
        ], $header, json_encode([]));

        $response = $this->client->getResponse();
        $this->assertResponse($response, 'Api/access_denied_response', Response::HTTP_FORBIDDEN);
    }

    private function getUploadedFile(): UploadedFile
    {
        $fileName = 'avatar.png';

        $file = new UploadedFile(
            $this->getFilePath($fileName),
            $fileName,
            'image/png',
        );

        return $file;
    }
}
