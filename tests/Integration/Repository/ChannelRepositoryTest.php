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

final class ChannelRepositoryTest extends JsonApiTestCase
{
    public function setUp(): void
    {
        parent::setUp();
        $this->entityManager = $this->getContainer()->get('doctrine.orm.entity_manager');
        $this->repository = $this->getContainer()->get('sylius.repository.channel');
    }

    public function test_it_finds_all_enabled_channels(): void
    {
        $this->loadFixturesFromFile('ChannelRepositoryTest/test_it_finds_all_enabled_channels.yaml');
        $result = $this->repository->findAllEnabled();

        self::assertCount(2, $result);
    }

    public function test_it_finds_enabled_channel_by_code(): void
    {
        $this->loadFixturesFromFile('ChannelRepositoryTest/test_it_finds_all_enabled_channels.yaml');
        $result = $this->repository->findOneEnabledByCode('US');

        self::assertNotNull($result);
    }
}
