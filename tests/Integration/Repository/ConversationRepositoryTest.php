<?php

/*
 * This file has been created by developers from BitBag.
 * Feel free to contact us once you face any issues or want to start
 * You can find more information about us on https://bitbag.io and write us
 * an email on hello@bitbag.io.
 */

declare(strict_types=1);

namespace Tests\BitBag\OpenMarketplace\Integration\Repository;

use ApiTestCase\JsonApiTestCase;
use BitBag\OpenMarketplace\Component\Messaging\Entity\Conversation;
use BitBag\OpenMarketplace\Component\Vendor\Entity\ShopUser;

final class ConversationRepositoryTest extends JsonApiTestCase
{
    public function setUp(): void
    {
        parent::setUp();
    }

    public function test_it_finds_all_conversations_with_status_and_user(): void
    {
        $conversationRepository = $this->getContainer()->get('open_marketplace.repository.conversation');
        $this->loadFixturesFromFile('ConversationRepositoryTest/test_it_finds_all_conversations_with_status_and_user.yml');

        $userOliver = $this->getEntityManager()->getRepository(ShopUser::class)->findOneBy(['username' => 'oliver@queen.com']);
        $userBruce = $this->getEntityManager()->getRepository(ShopUser::class)->findOneBy(['username' => 'oliver@queen.com']);
        $statuses = [Conversation::STATUS_OPEN, Conversation::STATUS_CLOSED];
        foreach ($statuses as $status) {
            $oliverConversations = $conversationRepository->findAllWithStatusAndUser($status, $userOliver);
            $bruceConversations = $conversationRepository->findAllWithStatusAndUser($status, $userBruce);

            $this->assertEquals(count($oliverConversations), 1);
            $this->assertEquals(count($bruceConversations), 1);
        }
    }
}
