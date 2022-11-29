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

        $this->loadFixturesFromFile( 'Api/DraftAttributeTest/draft_attribute.yml');
    }

    public function test_it_gets_only_draft_attributes_for_current_vendor(): void
    {
        $header = $this->getHeaderForLoginShopUser('bruce.wayne@example.com');

        $this->client->request('GET', '/api/v2/shop/account/draft-attributes', [], [], $header);
        $response = $this->client->getResponse();
        $this->assertResponse($response, 'Api/DraftAttributeTest/test_it_gets_only_draft_attributes_for_current_vendor_response', Response::HTTP_OK);
    }

    public function test_it_prevents_to_get_different_vendor_draft_attribute(): void
    {
        $header = $this->getHeaderForLoginShopUser('bruce.wayne@example.com');

        $draftAttribute = $this->draftAttributeRepository->findOneBy([
            'code' => 'attribute_peter_1'
        ]);

        $this->client->request('GET', '/api/v2/shop/account/draft-attributes/' . $draftAttribute->getId(), [], [], $header);
        $response = $this->client->getResponse();
        $this->assertResponse($response, 'Api/not_found_response', Response::HTTP_NOT_FOUND);
    }
}