<?php

declare(strict_types=1);

namespace BitBag\SyliusMultiVendorMarketplacePlugin\Twig;

use BitBag\SyliusMultiVendorMarketplacePlugin\Entity\VendorProfileUpdate;
use BitBag\SyliusMultiVendorMarketplacePlugin\Provider\VendorProviderInterface;
use Doctrine\Persistence\ObjectManager;
use Sylius\Component\Locale\Context\CompositeLocaleContext;
use Twig\Extension\AbstractExtension;
use Twig\TwigFunction;

class VendorExtension extends AbstractExtension
{
    private VendorProviderInterface $vendorProvider;

    private ObjectManager $manager;

    private CompositeLocaleContext $localeContext;

    public function __construct(
        VendorProviderInterface $vendorProvider,
        ObjectManager $manager,
        CompositeLocaleContext $localeContext
    ) {
        $this->vendorProvider = $vendorProvider;
        $this->manager = $manager;
        $this->localeContext = $localeContext;
    }

    public function getFunctions(): array
    {
        return [
            new TwigFunction('is_pending_vendor_profile_update', [$this, 'is_pending_vendor_profile_update']),
            new TwigFunction('current_locale', [$this, 'current_locale']),
        ];
    }

    public function is_pending_vendor_profile_update(): bool
    {
        $vendor = $this->vendorProvider->provideCurrentVendor();
        $pendingUpdate = $this->manager->getRepository(VendorProfileUpdate::class)
            ->findOneBy(['vendor' => $vendor]);

        if (null === $pendingUpdate) {
            return true;
        }

        return false;
    }

    public function current_locale(): string
    {
        return $this->localeContext->getLocaleCode();
    }
}
