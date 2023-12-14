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
use BitBag\OpenMarketplace\Component\Settlement\PeriodStrategy\AbstractSettlementPeriodResolverStrategy;
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
        private iterable $settlementPeriodResolvers,
    ) {
        $this->optionsResolver = new OptionsResolver();
        $this->configureOptions($this->optionsResolver);
    }

    public function create(array $options = [])
    {
        $options = $this->optionsResolver->resolve($options);

        $shopUser = $this->shopUserRepository->findOneBy(['username' => $options['vendor']]);
        Assert::isInstanceOf($shopUser, ShopUserInterface::class);

        $vendor = $shopUser->getVendor();
        Assert::isInstanceOf($vendor, VendorInterface::class);

        $channel = $this->channelRepository->findOneBy(['code' => $options['channel']]);
        Assert::isInstanceOf($channel, ChannelInterface::class);

        [$from, $to] = $this->getSettlementDateRangeFromVendor($vendor);

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
            ->setDefault('status', SettlementInterface::STATUS_NEW)
            ->setAllowedValues('status', SettlementInterface::AVAILABLE_STATUSES)
            ->setDefault('totalAmount', 0)
            ->setAllowedTypes('totalAmount', ['int'])
            ->setDefault('totalCommissionAmount', 0)
            ->setAllowedTypes('totalCommissionAmount', ['int'])
            ->setDefault('channel', LazyOption::randomOne($this->channelRepository))
            ->setDefault('startDate', new \DateTime())
            ->setDefault('endDate', new \DateTime())
        ;
    }

    private function getSettlementDateRangeFromVendor(VendorInterface $vendor): array
    {
        /** @var AbstractSettlementPeriodResolverStrategy $settlementPeriodResolver */
        foreach ($this->settlementPeriodResolvers as $settlementPeriodResolver) {
            if ($settlementPeriodResolver->supports($vendor)) {
                return $settlementPeriodResolver->resolve();
            }
        }

        throw new \InvalidArgumentException(sprintf('Could not find period resolver for vendor with settlement frequency "%s"', $vendor->getSettlementFrequency()));
    }
}
