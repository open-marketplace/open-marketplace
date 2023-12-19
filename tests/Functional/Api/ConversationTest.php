<?php

/*
 * This file was created by developers working at BitBag
 * Do you need more information about us and what we do? Visit our https://bitbag.io website!
 * We are hiring developers from all over the world. Join us and start your new, exciting adventure and become part of us: https://bitbag.io/career
*/

declare(strict_types=1);

namespace Tests\BitBag\OpenMarketplace\Functional\Api;

use BitBag\OpenMarketplace\Component\Order\Entity\Order;
use Sylius\Tests\Api\Utils\ShopUserLoginTrait;
use Symfony\Component\HttpFoundation\Response;
use Tests\BitBag\OpenMarketplace\Functional\FunctionalTestCase;

final class ConversationTest extends FunctionalTestCase
{
    use ShopUserLoginTrait;

    private array $fixturesData;

    public function setUp(): void
    {
        $this->entityManager = static::getContainer()->get('doctrine.orm.entity_manager');
        $this->orderRepository = $this->entityManager->getRepository(Order::class);

        $this->fixturesData = $this->loadFixturesFromFile('Api/ConversationTest/conversation.yml');
    }

    public function test_vendor_can_start_conversation(): void
    {
        $header = $this->getHeaderForLoginShopUser('peter.weyland@example.com');
        $category = $this->fixturesData['peter_category'];

        $this->client->request('POST', '/api/v2/shop/account/vendor/conversations', [], [], $header, json_encode([
            'category' => '/api/v2/shop/account/vendor/categories/' . $category->getId(),
            'messages' => [
                [
                    'content' => 'hello',
                ],
            ],
        ]));

        $response = $this->client->getResponse();
        $this->assertEquals('hello', json_decode($response->getContent(), true)['messages'][0]['content']);
    }

    public function test_vendor_can_reply_to_conversation(): void
    {
        $header = $this->getHeaderForLoginShopUser('peter.weyland@example.com');
        $category = $this->fixturesData['peter_category'];

        $this->client->request('GET', '/api/v2/shop/account/vendor/conversations', [], [], $header, json_encode([
            'category' => '/api/v2/shop/account/vendor/categories/' . $category->getId(),
        ]));

        $response = $this->client->getResponse();
        $conversationIRI = json_decode($response->getContent(), true)['hydra:member'][0]['@id'];

        $this->client->request('PUT', $conversationIRI, [], [], $header, json_encode([
            'messages' => [
                [
                    'content' => 'hello',
                ],
            ],
        ]));

        $response = $this->client->getResponse();
        $this->assertEquals('hello', json_decode($response->getContent(), true)['messages'][1]['content']);
    }

    public function test_vendor_cannot_reply_to_others_conversation(): void
    {
        $header = $this->getHeaderForLoginShopUser('bruce.wayne@example.com');

        $this->client->request('GET', '/api/v2/shop/account/vendor/conversations', [], [], $header);

        $response = $this->client->getResponse();
        $conversationIRI = json_decode($response->getContent(), true)['hydra:member'][0]['@id'];

        $header = $this->getHeaderForLoginShopUser('peter.weyland@example.com');
        $this->client->request('PUT', $conversationIRI, [], [], $header, json_encode([
            'messages' => [
                [
                    'content' => 'hello',
                ],
            ],
        ]));
        $response = $this->client->getResponse();
        $this->assertResponseCode($response, 403);
    }

    public function test_vendor_can_list_his_conversation(): void
    {
        $header = $this->getHeaderForLoginShopUser('peter.weyland@example.com');

        $this->client->request('GET', '/api/v2/shop/account/vendor/conversations', [], [], $header);

        $response = $this->client->getResponse();
        $responseData = json_decode($response->getContent(), true);
        $this->assertEquals($this->count($responseData['hydra:member']), 1);
        $this->assertEquals($responseData['hydra:member'][0]['messages'][0]['content'], 'Own by Peter');
    }

    public function test_vendor_can_archive_his_conversation(): void
    {
        $header = $this->getHeaderForLoginShopUser('bruce.wayne@example.com');

        $this->client->request('GET', '/api/v2/shop/account/vendor/conversations', [], [], $header);

        $response = $this->client->getResponse();
        $responseData = json_decode($response->getContent(), true);
        $archiveIRI = $responseData['hydra:member'][1]['@id'];

        $this->client->request('PATCH', $archiveIRI . '/archive', [], [], $header);
        $response = $this->client->getResponse();
        $responseData = json_decode($response->getContent(), true);

        $this->assertEquals($responseData['status'], 'closed');
    }

    public function test_validate_not_blank_category(): void
    {
        $header = $this->getHeaderForLoginShopUser('bruce.wayne@example.com');

        $this->client->request('POST', '/api/v2/shop/account/vendor/conversations', [], [], $header, json_encode([
            'messages' => [
                [
                    'content' => 'hello',
                ],
            ],
        ]));

        $response = $this->client->getResponse();
        $this->assertResponse($response, 'Api/VendorConversation/test_validate_not_blank_category_response', Response::HTTP_UNPROCESSABLE_ENTITY);
    }
}
