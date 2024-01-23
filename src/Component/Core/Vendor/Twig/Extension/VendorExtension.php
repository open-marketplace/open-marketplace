<?php

/*
 * This file has been created by developers from BitBag.
 * Feel free to contact us once you face any issues or want to start
 * You can find more information about us on https://bitbag.io and write us
 * an email on hello@bitbag.io.
 */

declare(strict_types=1);

namespace BitBag\OpenMarketplace\Component\Core\Vendor\Twig\Extension;

use BitBag\OpenMarketplace\Component\Vendor\Contracts\VendorSettlementFrequency;
use BitBag\OpenMarketplace\Component\Vendor\Entity\ProfileUpdate\ProfileUpdate;
use BitBag\OpenMarketplace\Component\Vendor\VendorContextInterface;
use Doctrine\Persistence\ObjectManager;
use Sylius\Component\Channel\Context\CompositeChannelContext;
use Sylius\Component\Channel\Repository\ChannelRepositoryInterface;
use Sylius\Component\Core\Model\ChannelInterface;
use Sylius\Component\Locale\Context\CompositeLocaleContext;
use Sylius\Component\Taxonomy\Model\TaxonInterface;
use Twig\Extension\AbstractExtension;
use Twig\TwigFunction;

class VendorExtension extends AbstractExtension
{
    private VendorContextInterface $vendorProvider;

    private ObjectManager $manager;

    private CompositeLocaleContext $localeContext;

    private ChannelRepositoryInterface $channelRepository;

    private CompositeChannelContext $channelContext;

    public function __construct(
        VendorContextInterface $vendorProvider,
        ObjectManager $manager,
        CompositeLocaleContext $localeContext,
        ChannelRepositoryInterface $channelRepository,
        CompositeChannelContext $channelContext
    ) {
        $this->vendorProvider = $vendorProvider;
        $this->manager = $manager;
        $this->localeContext = $localeContext;
        $this->channelRepository = $channelRepository;
        $this->channelContext = $channelContext;
    }

    public function getFunctions(): array
    {
        return [
            new TwigFunction('is_pending_vendor_profile_update', [$this, 'isPendingVendorProfileUpdate']),
            new TwigFunction('has_vendor_virtual_wallet_strategy', [$this, 'hasVirtualWalletStrategy']),
            new TwigFunction('current_locale', [$this, 'currentLocale']),
            new TwigFunction('get_channel', [$this, 'getChannel']),
            new TwigFunction('get_channel_main_taxon', [$this, 'getChannelMainTaxon']),
        ];
    }

    public function isPendingVendorProfileUpdate(): bool
    {
        $vendor = $this->vendorProvider->getVendor();
        $pendingUpdate = $this->manager->getRepository(ProfileUpdate::class)
            ->findOneBy(['vendor' => $vendor]);

        if (null === $pendingUpdate) {
            return true;
        }

        return false;
    }

    public function hasVirtualWalletStrategy(): bool
    {
        $vendor = $this->vendorProvider->getVendor();

        return !in_array($vendor->getSettlementFrequency(), VendorSettlementFrequency::CYCLICAL_SETTLEMENT_FREQUENCIES, true);
    }

    public function currentLocale(): string
    {
        return $this->localeContext->getLocaleCode();
    }

    public function getChannel(string $channelCode): ChannelInterface
    {
        /** @var ChannelInterface $channel */
        $channel = $this->channelRepository->findOneByCode($channelCode);

        return $channel;
    }

    public function getChannelMainTaxon(): ?TaxonInterface
    {
        /** @var ChannelInterface $channel */
        $channel = $this->channelContext->getChannel();

        return $channel->getMenuTaxon();
    }
}
