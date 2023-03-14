<?php

/*
 * This file was created by developers working at BitBag
 * Do you need more information about us and what we do? Visit our https://bitbag.io website!
 * We are hiring developers from all over the world. Join us and start your new, exciting adventure and become part of us: https://bitbag.io/career
*/

declare(strict_types=1);

namespace Tests\BitBag\OpenMarketplace\Functional\Api;

use BitBag\OpenMarketplace\Entity\ProductListing\ProductDraft;
use Sylius\Tests\Api\Utils\ShopUserLoginTrait;
use Symfony\Component\HttpFoundation\Response;
use Tests\BitBag\OpenMarketplace\Functional\FunctionalTestCase;

final class ProductDraftTest extends FunctionalTestCase
{
    use ShopUserLoginTrait;

    public function setUp(): void
    {
        $this->entityManager = static::getContainer()->get('doctrine.orm.entity_manager');
        $this->productDraftRepository = $this->entityManager->getRepository(ProductDraft::class);

        $this->loadFixturesFromFile('Api/ProductDraftTest/product_draft.yml');
    }

    public function test_it_get_by_current_vendor(): void
    {
        $header = $this->getHeaderForLoginShopUser('bruce.wayne@example.com');

        /** @var ProductDraft $productDraft */
        $productDraft = $this->productDraftRepository->findOneBy(['code' => 'product_draft_bruce_1']);

        $this->client->request('GET', '/api/v2/shop/account/vendor/product-drafts/' . $productDraft->getUuid()->toString(), [], [], $header);
        $response = $this->client->getResponse();
        $this->assertResponse($response, 'Api/ProductDraftTest/test_it_get_by_current_vendor', Response::HTTP_OK);
    }

    public function test_it_get_by_different_vendor(): void
    {
        $header = $this->getHeaderForLoginShopUser('peter.weyland@example.com');

        /** @var ProductDraft $productDraft */
        $productDraft = $this->productDraftRepository->findOneBy(['code' => 'product_draft_bruce_1']);

        $this->client->request('GET', '/api/v2/shop/account/vendor/product-drafts/' . $productDraft->getUuid()->toString(), [], [], $header);
        $response = $this->client->getResponse();
        $this->assertResponse($response, 'Api/not_found_response', Response::HTTP_NOT_FOUND);
    }

    public function test_it_get_by_user_without_vendor_context(): void
    {
        $header = $this->getHeaderForLoginShopUser('john.smith@example.com');

        /** @var ProductDraft $productDraft */
        $productDraft = $this->productDraftRepository->findOneBy(['code' => 'product_draft_bruce_1']);

        $this->client->request('GET', '/api/v2/shop/account/vendor/product-drafts/' . $productDraft->getUuid()->toString(), [], [], $header);
        $response = $this->client->getResponse();
        $this->assertResponse($response, 'Api/access_denied_response', Response::HTTP_FORBIDDEN);
    }
}
