<?php

/*
 * This file has been created by developers from BitBag.
 * Feel free to contact us once you face any issues or want to start
 * You can find more information about us on https://bitbag.io and write us
 * an email on hello@bitbag.io.
 */

declare(strict_types=1);

namespace BitBag\OpenMarketplace\Component\Core\Common\Fixture\Factory;

use BitBag\OpenMarketplace\Component\Channel\Repository\ChannelRepositoryInterface;
use BitBag\OpenMarketplace\Component\Settlement\Entity\SettlementInterface;
use BitBag\OpenMarketplace\Component\Settlement\Factory\SettlementFactoryInterface;
use BitBag\OpenMarketplace\Component\Settlement\PeriodStrategy\SettlementPeriodResolverInterface;
use BitBag\OpenMarketplace\Component\Vendor\Entity\ShopUserInterface;
use BitBag\OpenMarketplace\Component\Vendor\Entity\VendorInterface;
use Sylius\Bundle\CoreBundle\Fixture\Factory\AbstractExampleFactory;
use Sylius\Bundle\CoreBundle\Fixture\OptionsResolver\LazyOption;
use Sylius\Component\Core\Model\ChannelInterface;
use Sylius\Component\Resource\Repository\RepositoryInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Webmozart\Assert\Assert;

final class SettlementExampleFactory extends AbstractExampleFactory
{
    private OptionsResolver $optionsResolver;

    public function __construct(
        private RepositoryInterface $shopUserRepository,
        private ChannelRepositoryInterface $channelRepository,
        private SettlementFactoryInterface $settlementFactory,
        private SettlementPeriodResolverInterface $settlementPeriodResolver,
        ) {
        $this->optionsResolver = new OptionsResolver();
        $this->configureOptions($this->optionsResolver);
    }

    public function create(array $options = []): SettlementInterface
    {
        $options = $this->optionsResolver->resolve($options);
        $vendor = $this->getVendor($options);
        $channel = $this->getChannel($options);
        [$from, $to] = $this->getPeriod($options, $vendor);

        $settlement = $this->settlementFactory->createNewForVendorAndChannel(
            $vendor,
            $channel,
            $options['totalAmount'],
            $options['totalCommissionAmount'],
            $from,
            $to
        );

        $settlement->setStatus($options['status']);

        return $settlement;
    }

    protected function configureOptions(OptionsResolver $resolver): void
    {
        $resolver
            ->setDefault('vendor', LazyOption::randomOne($this->shopUserRepository))
            ->setAllowedTypes('vendor', ['string', VendorInterface::class])
            ->setDefault('status', SettlementInterface::STATUS_NEW)
            ->setAllowedValues('status', SettlementInterface::AVAILABLE_STATUSES)
            ->setDefault('totalAmount', random_int(100, 10000))
            ->setAllowedTypes('totalAmount', ['int'])
            ->setDefault('totalCommissionAmount', random_int(10, 100))
            ->setAllowedTypes('totalCommissionAmount', ['int'])
            ->setDefault('channel', LazyOption::randomOne($this->channelRepository))
            ->setDefault('startDate', null)
            ->setDefault('endDate', null)
        ;
    }

    private function getVendor(array $options): VendorInterface
    {
        $vendor = $options['vendor'];
        if ($vendor instanceof VendorInterface) {
            return $vendor;
        }

        $shopUser = $this->shopUserRepository->findOneBy(['username' => $vendor]);
        Assert::isInstanceOf($shopUser, ShopUserInterface::class);

        $vendor = $shopUser->getVendor();
        Assert::isInstanceOf($vendor, VendorInterface::class);

        return $vendor;
    }

    private function getChannel(array $options): ChannelInterface
    {
        $channel = $options['channel'];

        if ($channel instanceof ChannelInterface) {
            return $channel;
        }

        $channel = $this->channelRepository->findOneBy(['code' => $options['channel']]);
        Assert::isInstanceOf($channel, ChannelInterface::class);

        return $channel;
    }

    private function getPeriod(array $options, VendorInterface $vendor): array
    {
        $from = $options['startDate'];
        $to = $options['endDate'];

        if (null !== $from && null !== $to) {
            return [$from, $to];
        }

        return $this->settlementPeriodResolver->getSettlementDateRangeForVendor($vendor);
    }
}
