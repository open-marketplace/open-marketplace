<?php

/*
 * This file has been created by developers from BitBag.
 * Feel free to contact us once you face any issues or want to start
 * You can find more information about us on https://bitbag.io and write us
 * an email on hello@bitbag.io.
 */

declare(strict_types=1);

namespace Tests\BitBag\OpenMarketplace\Integration\Cli;

use ApiTestCase\JsonApiTestCase;
use BitBag\OpenMarketplace\Component\Order\Entity\OrderInterface;
use BitBag\OpenMarketplace\Component\Settlement\Entity\SettlementInterface;
use BitBag\OpenMarketplace\Component\Settlement\PeriodStrategy\QuarterlySettlementPeriodResolver;
use Symfony\Bundle\FrameworkBundle\Console\Application;
use Symfony\Component\Console\Tester\CommandTester;

final class SettlementGenerateCommandTest extends JsonApiTestCase
{
    protected function setUp(): void
    {
        parent::setUp();
        $kernel = self::bootKernel();
        $application = new Application($kernel);
        $command = $application->find('bitbag:settlement:generate');
        $this->commandTester = new CommandTester($command);
        $this->settlementRepository = self::getContainer()->get('open_marketplace.repository.settlement');
        $this->vendorRepository = self::getContainer()->get('bitbag.open_marketplace.component.vendor.repository.vendor');
        $this->channelRepository = self::getContainer()->get('sylius.repository.channel');
        $this->orderRepository = self::getContainer()->get('sylius.repository.order');
    }

    public function test_it_throws_exception_if_period_resolver_for_settlement_frequency_does_not_exist(): void
    {
        $this->loadFixturesFromFile('SettlementGenerateCommandTest/test_it_throws_exception_if_period_resolver_for_settlement_frequency_does_not_exist.yaml');

        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessage('Could not find period resolver for vendor with settlement frequency "daily"');
        $this->commandTester->execute([]);
    }

    public function test_it_generates_settlements_for_all_vendors(): void
    {
        $this->loadFixturesFromFile('SettlementGenerateCommandTest/test_it_generates_settlements_for_all_vendors.yaml');
        $this->assertCount(0, $this->settlementRepository->findAll());
        $this->commandTester->execute([]);
        $this->commandTester->assertCommandIsSuccessful();
        $vendorWeyland = $this->vendorRepository->findOneBySlug('Weyland-Corp');
        $vendorWayne = $this->vendorRepository->findOneBySlug('Wayne-Enterprises-Inc');
        $vendorTommy = $this->vendorRepository->findOneBySlug('Tommy-Corp');
        $channelEu = $this->channelRepository->findOneBy(['code' => 'EU']);
        $channelUs = $this->channelRepository->findOneBy(['code' => 'US']);
        $settlementsVendorWeyland = $this->settlementRepository->findBy(['vendor' => $vendorWeyland]);
        $settlementsVendorWayne = $this->settlementRepository->findBy(['vendor' => $vendorWayne]);
        $settlementsVendorTommy = $this->settlementRepository->findBy(['vendor' => $vendorTommy]);
        [$weeklyStartDate, $weeklyEndDate] = $this->getStartAndEndDate('weekly');
        [$monthlyStartDate, $monthlyEndDate] = $this->getStartAndEndDate('monthly');
        [$quarterlyStartDate, $quarterlyEndDate] = $this->getStartAndEndDate('quarterly');

        $this->assertCount(2, $settlementsVendorWayne);
        $this->assertSettlementSame(
            [
                'totalAmount' => 540,
                'totalCommissionAmount' => 35,
                'startDate' => $monthlyStartDate,
                'endDate' => $monthlyEndDate,
                'channel' => $channelUs,
            ],
            $settlementsVendorWayne[0]
        );
        $this->assertSettlementSame(
            [
                'totalAmount' => 1002,
                'totalCommissionAmount' => 70,
                'startDate' => $monthlyStartDate,
                'endDate' => $monthlyEndDate,
                'channel' => $channelEu,
            ],
            $settlementsVendorWayne[1]
        );

        $this->assertCount(2, $settlementsVendorWeyland);
        $this->assertSettlementSame(
            [
                'totalAmount' => 0,
                'totalCommissionAmount' => 0,
                'startDate' => $weeklyStartDate,
                'endDate' => $weeklyEndDate,
                'channel' => $channelUs,
            ],
            $settlementsVendorWeyland[0]
        );
        $this->assertSettlementSame(
            [
                'totalAmount' => 700,
                'totalCommissionAmount' => 100,
                'startDate' => $weeklyStartDate,
                'endDate' => $weeklyEndDate,
                'channel' => $channelEu,
            ],
            $settlementsVendorWeyland[1]
        );

        $this->assertCount(2, $settlementsVendorTommy);
        $this->assertSettlementSame(
            [
                'totalAmount' => 400,
                'totalCommissionAmount' => 10,
                'startDate' => $quarterlyStartDate,
                'endDate' => $quarterlyEndDate,
                'channel' => $channelUs,
            ],
            $settlementsVendorTommy[0]
        );
        $this->assertSettlementSame(
            [
                'totalAmount' => 0,
                'totalCommissionAmount' => 0,
                'startDate' => $quarterlyStartDate,
                'endDate' => $quarterlyEndDate,
                'channel' => $channelEu,
            ],
            $settlementsVendorTommy[1]
        );
    }

    public function test_it_not_generates_settlements_for_if_settlement_already_exist(): void
    {
        $this->loadFixturesFromFile('SettlementGenerateCommandTest/test_it_not_generates_settlements_for_if_settlement_already_exist.yaml');
        $settlements = $this->settlementRepository->findAll();
        $vendorWeyland = $this->vendorRepository->findOneBySlug('Weyland-Corp');
        $vendorWayne = $this->vendorRepository->findOneBySlug('Wayne-Enterprises-Inc');
        $channelEu = $this->channelRepository->findOneBy(['code' => 'EU']);
        $channelUs = $this->channelRepository->findOneBy(['code' => 'US']);
        [$startDate, $endDate] = $this->getStartAndEndDate('weekly');
        $this->assertCount(1, $settlements);
        $this->assertSettlementSame(
            [
                'totalAmount' => 1002,
                'totalCommissionAmount' => 70,
                'startDate' => $startDate,
                'endDate' => $endDate,
                'channel' => $channelEu,
            ],
            $settlements[0]
        );

        $this->commandTester->execute([]);
        $this->commandTester->assertCommandIsSuccessful();
        $settlementsVendorWeyland = $this->settlementRepository->findBy(['vendor' => $vendorWeyland]);
        $settlementsVendorWayne = $this->settlementRepository->findBy(['vendor' => $vendorWayne]);
        $this->assertCount(2, $settlementsVendorWayne);
        $this->assertSame($settlements[0], $settlementsVendorWayne[0]);
        $this->assertSettlementSame(
            [
                'totalAmount' => 540,
                'totalCommissionAmount' => 35,
                'startDate' => $startDate,
                'endDate' => $endDate,
                'channel' => $channelUs,
            ],
            $settlementsVendorWayne[1]
        );

        $this->assertCount(2, $settlementsVendorWeyland);
        $this->assertSettlementSame(
            [
                'totalAmount' => 0,
                'totalCommissionAmount' => 0,
                'startDate' => $startDate,
                'endDate' => $endDate,
                'channel' => $channelUs,
            ],
            $settlementsVendorWeyland[0]
        );
        $this->assertSettlementSame(
            [
                'totalAmount' => 700,
                'totalCommissionAmount' => 100,
                'startDate' => $startDate,
                'endDate' => $endDate,
                'channel' => $channelEu,
            ],
            $settlementsVendorWeyland[1]
        );
    }

    public function test_it_generates_settlements_for_incomplete_period(): void
    {
        $this->loadFixturesFromFile('SettlementGenerateCommandTest/test_it_generates_settlements_for_incomplete_period.yaml');
        $settlements = $this->settlementRepository->findAll();
        $vendorWayne = $this->vendorRepository->findOneBySlug('Wayne-Enterprises-Inc');
        $channelUs = $this->channelRepository->findOneBy(['code' => 'US']);
        $channelEu = $this->channelRepository->findOneBy(['code' => 'EU']);

        [$startDate, $endDate] = $this->getStartAndEndDate('weekly');

        /** @var OrderInterface $lastWayneOrder */
        $lastWayneOrder = $this->orderRepository->findOneBy(['vendor' => $vendorWayne], ['paidAt' => 'DESC']);

        $to = \DateTime::createFromInterface($lastWayneOrder->getPaidAt())->modify('- 1 hour');
        $from = new \DateTime('last week monday');

        $settlement = $settlements[0];
        $settlement->setStartDate($from);
        $settlement->setEndDate($to);

        $this->assertSettlementSame(
            [
                'totalAmount' => 1002,
                'totalCommissionAmount' => 70,
                'startDate' => $from,
                'endDate' => $to,
                'channel' => $channelEu,
            ],
            $settlement
        );

        $this->getEntityManager()->flush();

        $this->commandTester->execute([]);
        $this->commandTester->assertCommandIsSuccessful();
        $settlementsVendorWayne = $this->settlementRepository->findBy(['vendor' => $vendorWayne]);
        $this->assertCount(3, $settlementsVendorWayne);
        $this->assertSame($settlements[0], $settlementsVendorWayne[0]);
        $this->assertSettlementSame(
            [
                'totalAmount' => 0,
                'totalCommissionAmount' => 0,
                'startDate' => $startDate,
                'endDate' => $endDate,
                'channel' => $channelUs,
            ],
            $settlementsVendorWayne[1]
        );

        $this->assertSettlementSame(
            [
                'totalAmount' => 540,
                'totalCommissionAmount' => 35,
                'startDate' => \DateTime::createFromInterface($settlement->getEndDate())->modify('+ 1 second'),
                'endDate' => $endDate,
                'channel' => $channelEu,
            ],
            $settlementsVendorWayne[2]
        );
    }

    private function getStartAndEndDate(string $frequency): array
    {
        return match ($frequency) {
            'weekly' => [
                new \DateTime('last week monday 00:00:00'),
                new \DateTime('last week sunday 23:59:59'),
            ],
            'monthly' => [
                new \DateTime('first day of last month 00:00:00'),
                new \DateTime('last day of last month 23:59:59'),
            ],
            'quarterly' => [
                (new \DateTime())->setTimestamp(QuarterlySettlementPeriodResolver::getLastQuarterStartDate()),
                (new \DateTime())->setTimestamp(QuarterlySettlementPeriodResolver::getLastQuarterEndDate()),
            ],
        };
    }

    private function assertSettlementSame(array $expected, SettlementInterface $actual): void
    {
        $this->assertSame($expected['totalAmount'], $actual->getTotalAmount());
        $this->assertSame($expected['totalCommissionAmount'], $actual->getTotalCommissionAmount());
        $this->assertSame($expected['startDate']->getTimestamp(), $actual->getStartDate()->getTimestamp());
        $this->assertSame($expected['endDate']->getTimestamp(), $actual->getEndDate()->getTimestamp());
        $this->assertSame($expected['channel'], $actual->getChannel());
    }
}
