<?php

declare(strict_types=1);

namespace BitBag\OpenMarketplace\Twig;

use BitBag\OpenMarketplace\Entity\VendorProfileUpdate;
use BitBag\OpenMarketplace\Provider\VendorProviderInterface;
use Doctrine\Persistence\ObjectManager;
use Sylius\Component\Channel\Repository\ChannelRepositoryInterface;
use Sylius\Component\Core\Model\ChannelInterface;
use Sylius\Component\Locale\Context\CompositeLocaleContext;
use Twig\Extension\AbstractExtension;
use Twig\TwigFunction;

class VendorExtension extends AbstractExtension
{
    private VendorProviderInterface $vendorProvider;

    private ObjectManager $manager;

    private CompositeLocaleContext $localeContext;

    private ChannelRepositoryInterface $channelRepository;

    public function __construct(
        VendorProviderInterface $vendorProvider,
        ObjectManager $manager,
        CompositeLocaleContext $localeContext,
        ChannelRepositoryInterface $channelRepository
    ) {
        $this->vendorProvider = $vendorProvider;
        $this->manager = $manager;
        $this->localeContext = $localeContext;
        $this->channelRepository = $channelRepository;
    }

    public function getFunctions(): array
    {
        return [
            new TwigFunction('is_pending_vendor_profile_update', [$this, 'isPendingVendorProfileUpdate']),
            new TwigFunction('current_locale', [$this, 'currentLocale']),
            new TwigFunction('get_channel', [$this, 'getChannel']),
        ];
    }

    public function isPendingVendorProfileUpdate(): bool
    {
        $vendor = $this->vendorProvider->provideCurrentVendor();
        $pendingUpdate = $this->manager->getRepository(VendorProfileUpdate::class)
            ->findOneBy(['vendor' => $vendor]);

        if (null === $pendingUpdate) {
            return true;
        }

        return false;
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
}
