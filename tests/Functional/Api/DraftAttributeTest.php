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
use BitBag\OpenMarketplace\Entity\ProductListing\DraftAttributeInterface;
use BitBag\OpenMarketplace\Entity\ProductListing\DraftAttributeTranslation;
use BitBag\OpenMarketplace\Entity\ProductListing\DraftAttributeTranslationInterface;
use Sylius\Tests\Api\Utils\ShopUserLoginTrait;
use Symfony\Component\HttpFoundation\Response;
use Tests\BitBag\OpenMarketplace\Functional\FunctionalTestCase;

final class DraftAttributeTest extends FunctionalTestCase
{
    use ShopUserLoginTrait;

    public function setUp(): void
    {
        $this->entityManager = static::getContainer()->get('doctrine.orm.entity_manager');
        $this->draftAttributeRepository = $this->entityManager->getRepository(DraftAttribute::class);
        $this->draftAttributeTranslationRepository = $this->entityManager->getRepository(DraftAttributeTranslation::class);

        $this->loadFixturesFromFile('Api/DraftAttributeTest/draft_attribute.yml');
    }

    public function test_it_get_only_draft_attributes_for_current_vendor(): void
    {
        $header = $this->getHeaderForLoginShopUser('bruce.wayne@example.com');

        $this->client->request('GET', '/api/v2/shop/account/vendor/draft-attributes', [], [], $header);
        $response = $this->client->getResponse();
        $this->assertResponse($response, 'Api/DraftAttributeTest/test_it_get_only_draft_attributes_for_current_vendor_response', Response::HTTP_OK);
    }

    public function test_it_prevents_to_get_different_vendor_draft_attribute(): void
    {
        $header = $this->getHeaderForLoginShopUser('bruce.wayne@example.com');

        /** @var DraftAttributeInterface $draftAttribute */
        $draftAttribute = $this->draftAttributeRepository->findOneBy([
            'code' => 'attribute_peter_1',
        ]);

        $this->client->request('GET', '/api/v2/shop/account/vendor/draft-attributes/' . $draftAttribute->getUuid()->toString(), [], [], $header);
        $response = $this->client->getResponse();
        $this->assertResponse($response, 'Api/not_found_response', Response::HTTP_NOT_FOUND);
    }

    public function test_it_prevents_to_get_attribute_by_user_without_vendor_context(): void
    {
        $header = $this->getHeaderForLoginShopUser('john.smith@example.com');

        /** @var DraftAttributeInterface $draftAttribute */
        $draftAttribute = $this->draftAttributeRepository->findOneBy([
            'code' => 'attribute_peter_1',
        ]);

        $this->client->request('GET', '/api/v2/shop/account/vendor/draft-attributes/' . $draftAttribute->getUuid()->toString(), [], [], $header);
        $response = $this->client->getResponse();
        $this->assertResponse($response, 'Api/access_denied_response', Response::HTTP_FORBIDDEN);
    }

    public function test_it_get_attribute_by_owner_vendor(): void
    {
        $header = $this->getHeaderForLoginShopUser('bruce.wayne@example.com');

        /** @var DraftAttributeInterface $draftAttribute */
        $draftAttribute = $this->draftAttributeRepository->findOneBy([
            'code' => 'attribute_bruce_1',
        ]);

        $this->client->request('GET', '/api/v2/shop/account/vendor/draft-attributes/' . $draftAttribute->getUuid()->toString(), [], [], $header);
        $response = $this->client->getResponse();
        $this->assertResponse($response, 'Api/DraftAttributeTest/test_it_get_attribute_by_owner_vendor_response', Response::HTTP_OK);
    }

    public function test_it_prevents_creating_attribute_by_user_without_vendor_context(): void
    {
        $header = $this->getHeaderForLoginShopUser('john.smith@example.com');

        $this->client->request('POST', '/api/v2/shop/account/vendor/draft-attributes', [], [], $header, json_encode([
            'code' => 'test',
            'type' => 'text',
            'storageType' => 'text',
            'position' => 1,
            'configuration' => [],
            'translations' => [
                'en_US' => [
                    'locale' => 'en_US',
                    'name' => 'test',
                ],
            ],
        ]));

        $response = $this->client->getResponse();
        $this->assertResponse($response, 'Api/access_denied_response', Response::HTTP_FORBIDDEN);
    }

    public function test_creating_attribute_by_vendor(): void
    {
        $header = $this->getHeaderForLoginShopUser('bruce.wayne@example.com');

        $this->client->request('POST', '/api/v2/shop/account/vendor/draft-attributes', [], [], $header, json_encode([
            'code' => 'test',
            'type' => 'text',
            'storageType' => 'text',
            'position' => 1,
            'configuration' => [],
            'translations' => [
                'en_US' => [
                    'locale' => 'en_US',
                    'name' => 'test',
                ],
            ],
        ]));

        $response = $this->client->getResponse();
        $this->assertResponse($response, 'Api/DraftAttributeTest/test_creating_attribute_by_vendor_response', Response::HTTP_CREATED);
    }

    public function test_validate_not_blank_rules(): void
    {
        $header = $this->getHeaderForLoginShopUser('bruce.wayne@example.com');

        $this->client->request('POST', '/api/v2/shop/account/vendor/draft-attributes', [], [], $header, json_encode([
            'code' => '',
            'type' => '',
            'storageType' => '',
            'translations' => [
                'en_US' => [
                    'locale' => '',
                    'name' => '',
                ],
            ],
        ]));

        $response = $this->client->getResponse();
        $this->assertResponse($response, 'Api/DraftAttributeTest/test_validate_not_blank_rules_response', Response::HTTP_UNPROCESSABLE_ENTITY);
    }

    public function test_it_prevents_update_attribute_by_user_without_vendor_context(): void
    {
        $header = $this->getHeaderForLoginShopUser('john.smith@example.com');

        /** @var DraftAttributeInterface $draftAttribute */
        $draftAttribute = $this->draftAttributeRepository->findOneBy([
            'code' => 'attribute_bruce_1',
        ]);

        $this->client->request('PUT', '/api/v2/shop/account/vendor/draft-attributes/' . $draftAttribute->getUuid()->toString(), [], [], $header, json_encode([
            'configuration' => [
                'min' => 2,
            ],
        ]));

        $response = $this->client->getResponse();
        $this->assertResponse($response, 'Api/access_denied_response', Response::HTTP_FORBIDDEN);
    }

    public function test_it_prevents_update_attribute_by_different_vendor(): void
    {
        $header = $this->getHeaderForLoginShopUser('bruce.wayne@example.com');

        /** @var DraftAttributeInterface $draftAttribute */
        $draftAttribute = $this->draftAttributeRepository->findOneBy([
            'code' => 'attribute_peter_1',
        ]);

        $this->client->request('PUT', '/api/v2/shop/account/vendor/draft-attributes/' . $draftAttribute->getUuid()->toString(), [], [], $header, json_encode([
            'configuration' => [
                'min' => 2,
            ],
        ]));

        $response = $this->client->getResponse();
        $this->assertResponse($response, 'Api/not_found_response', Response::HTTP_NOT_FOUND);
    }

    public function test_it_update_attribute_by_vendor_owner(): void
    {
        $header = $this->getHeaderForLoginShopUser('bruce.wayne@example.com');

        /** @var DraftAttributeInterface $draftAttribute */
        $draftAttribute = $this->draftAttributeRepository->findOneBy([
            'code' => 'attribute_bruce_1',
        ]);

        $this->client->request('PUT', '/api/v2/shop/account/vendor/draft-attributes/' . $draftAttribute->getUuid()->toString(), [], [], $header, json_encode([
            'configuration' => [
                'min' => 2,
            ],
        ]));

        $response = $this->client->getResponse();
        $this->assertResponse($response, 'Api/DraftAttributeTest/test_it_update_attribute_by_vendor_owner_response', Response::HTTP_OK);
    }

    public function test_it_update_attribute_translation_by_vendor_owner(): void
    {
        $header = $this->getHeaderForLoginShopUser('bruce.wayne@example.com');

        /** @var DraftAttributeInterface $draftAttribute */
        $draftAttribute = $this->draftAttributeRepository->findOneBy([
            'code' => 'attribute_bruce_1',
        ]);

        /** @var DraftAttributeTranslationInterface $draftAttributeTranslation */
        $draftAttributeTranslation = $this->draftAttributeTranslationRepository->findOneBy([
            'translatable' => $draftAttribute,
            'locale' => 'en_US',
            'name' => 'attribute_bruce_1_us',
        ]);

        $this->client->request('PUT', '/api/v2/shop/account/vendor/draft-attribute-translations/' . $draftAttributeTranslation->getUuid()->toString(), [], [], $header, json_encode([
            'name' => 'changed translation name',
        ]));

        $response = $this->client->getResponse();
        $this->assertResponse($response, 'Api/DraftAttributeTest/test_it_update_attribute_translation_by_vendor_owner_response', Response::HTTP_OK);
    }

    public function test_it_prevent_update_attribute_translation_by_other_vendor(): void
    {
        $header = $this->getHeaderForLoginShopUser('peter.weyland@example.com');

        /** @var DraftAttributeInterface $draftAttribute */
        $draftAttribute = $this->draftAttributeRepository->findOneBy([
            'code' => 'attribute_bruce_1',
        ]);

        /** @var DraftAttributeTranslationInterface $draftAttributeTranslation */
        $draftAttributeTranslation = $this->draftAttributeTranslationRepository->findOneBy([
            'translatable' => $draftAttribute,
            'locale' => 'en_US',
            'name' => 'attribute_bruce_1_us',
        ]);

        $this->client->request('PUT', '/api/v2/shop/account/vendor/draft-attribute-translations/' . $draftAttributeTranslation->getUuid()->toString(), [], [], $header, json_encode([
            'name' => 'changed translation name',
        ]));

        $response = $this->client->getResponse();
        $this->assertResponse($response, 'Api/access_denied_response', Response::HTTP_FORBIDDEN);
    }

    public function test_it_prevents_delete_attribute_by_user_without_vendor_context(): void
    {
        $header = $this->getHeaderForLoginShopUser('john.smith@example.com');

        /** @var DraftAttributeInterface $draftAttribute */
        $draftAttribute = $this->draftAttributeRepository->findOneBy([
            'code' => 'attribute_peter_1',
        ]);

        $this->client->request('DELETE', '/api/v2/shop/account/vendor/draft-attributes/' . $draftAttribute->getUuid()->toString(), [], [], $header);

        $response = $this->client->getResponse();
        $this->assertResponse($response, 'Api/access_denied_response', Response::HTTP_FORBIDDEN);
    }

    public function test_it_prevents_delete_attribute_by_different_vendor(): void
    {
        $header = $this->getHeaderForLoginShopUser('bruce.wayne@example.com');

        /** @var DraftAttributeInterface $draftAttribute */
        $draftAttribute = $this->draftAttributeRepository->findOneBy([
            'code' => 'attribute_peter_1',
        ]);

        $this->client->request('DELETE', '/api/v2/shop/account/vendor/draft-attributes/' . $draftAttribute->getUuid()->toString(), [], [], $header);

        $response = $this->client->getResponse();
        $this->assertResponse($response, 'Api/not_found_response', Response::HTTP_NOT_FOUND);
    }

    public function test_it_delete_attribute_by_owner_vendor(): void
    {
        $header = $this->getHeaderForLoginShopUser('bruce.wayne@example.com');

        /** @var DraftAttributeInterface $draftAttribute */
        $draftAttribute = $this->draftAttributeRepository->findOneBy([
            'code' => 'attribute_bruce_1',
        ]);

        $this->client->request('DELETE', '/api/v2/shop/account/vendor/draft-attributes/' . $draftAttribute->getUuid()->toString(), [], [], $header);

        $response = $this->client->getResponse();
        $this->assertResponseCode($response, Response::HTTP_NO_CONTENT);
        $this->assertEquals('', $response->getContent());
    }
}
