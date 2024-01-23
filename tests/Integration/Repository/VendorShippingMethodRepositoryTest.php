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
use BitBag\OpenMarketplace\Component\Vendor\Entity\Vendor;
use Sylius\Component\Core\Model\Channel;

final class VendorShippingMethodRepositoryTest extends JsonApiTestCase
{
    public function setUp(): void
    {
        parent::setUp();
        $this->entityManager = $this->getContainer()->get('doctrine.orm.entity_manager');
        $this->repository = $this->getContainer()->get('open_marketplace.repository.vendor_shipping_method');
    }

    public function test_it_finds_all_enabled_shipping_methods_for_vendor_and_channel(): void
    {
        $this->loadFixturesFromFile('VendorShippingMethodRepositoryTest/test_it_finds_all_enabled_shipping_methods_for_vendor_and_channel.yaml');

        $vendor = $this->entityManager->getRepository(Vendor::class)->findOneBy(['slug' => 'oliver-queen-company']);
        $channel = $this->entityManager->getRepository(Channel::class)->findOneBy(['code' => 'code']);
        $vendorShippingMethods = $this->repository->findEnabledForChannel($vendor, $channel);

        self::assertCount(1, $vendorShippingMethods);
    }
}
