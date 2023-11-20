<?php

/*
 * This file has been created by developers from BitBag.
 * Feel free to contact us once you face any issues or want to start
 * You can find more information about us on https://bitbag.io and write us
 * an email on hello@bitbag.io.
 */

declare(strict_types=1);

namespace BitBag\OpenMarketplace\Component\Core\Common\Fixture;

use BitBag\OpenMarketplace\Component\Order\Repository\OrderRepositoryInterface;
use BitBag\OpenMarketplace\Component\Settlement\Factory\SettlementFactoryInterface;
use BitBag\OpenMarketplace\Component\Vendor\Entity\VendorInterface;
use BitBag\OpenMarketplace\Component\Vendor\Repository\VendorRepositoryInterface;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;
use Faker\Generator;
use Sylius\Bundle\FixturesBundle\Fixture\AbstractFixture;

final class SettlementFixture extends AbstractFixture
{
    private Generator $faker;

    public function __construct(
        private ObjectManager $settlementManager,
        private VendorRepositoryInterface $vendorRepository,
        private OrderRepositoryInterface $orderRepository,
        private SettlementFactoryInterface $settlementFactory
    ) {
        $this->faker = Factory::create();
    }

    public function load(array $options): void
    {
        $vendors = $this->vendorRepository->findAll();

        /** @var VendorInterface $vendor */
        foreach ($vendors as $vendor) {
            $orders = $this->orderRepository->findAllForSettlementByVendor($vendor);
            if (empty($orders)) {
                continue;
            }
            $orderChunks = array_chunk($orders, 20);
            foreach ($orderChunks as $orderChunk) {
                $settlement = $this->settlementFactory->createNewForVendorAndOrders($vendor, $orderChunk);
                $this->settlementManager->persist($settlement);
            }
        }
        $this->settlementManager->flush();
    }

    public function getName(): string
    {
        return 'settlement';
    }
}
