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
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\HttpFoundation\Response;
use Tests\BitBag\OpenMarketplace\Functional\FunctionalTestCase;

final class VendorImageTest extends FunctionalTestCase
{
    use ShopUserLoginTrait;

    public function setUp(): void
    {
        $this->entityManager = static::getContainer()->get('doctrine.orm.entity_manager');
        $this->vendorRepository = $this->entityManager->getRepository(Vendor::class);

        $this->loadFixturesFromFile('Api/VendorProfileTest/vendor_profile_basic.yml');

    }

    public function test_vendor_image_upload_successfully()
    {
        $fileName = 'avatar.png';

        $file = new UploadedFile(
            $this->getFilePath($fileName),
            $fileName,
            'image/png',
        );

        $header = $this->getHeaderForLoginShopUser('bruce.wayne@example.com');
        /** @var VendorInterface $vendor */
        $vendor = $this->vendorRepository->findOneBy(['slug' => 'Wayne-Enterprises-Inc']);

        $this->client->request('PUT', '/api/v2/shop/account/vendor_images', [], ['file' => $file], $header, json_encode([
            'owner' => '/api/v2/shop/account/vendors/' . $vendor->getId(),
        ]));
        $response = $this->client->getResponse();
        $this->assertResponse($response, 'Api/VendorImageTest/test_vendor_image_upload_successfully', Response::HTTP_CREATED);
    }

    private function getHeaderForLoginShopUser(string $email): array
    {
        $loginData = $this->logInShopUser($email);
        $authorizationHeader = self::getContainer()->getParameter('sylius.api.authorization_header');
        $header['HTTP_' . $authorizationHeader] = 'Bearer ' . $loginData;

        return array_merge($header, self::CONTENT_TYPE_HEADER);
    }
}