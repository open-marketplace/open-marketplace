<?php

declare(strict_types=1);

namespace BitBag\SyliusMultiVendorMarketplacePlugin\Twig;

use BitBag\SyliusMultiVendorMarketplacePlugin\Entity\VendorProfileUpdate;
use BitBag\SyliusMultiVendorMarketplacePlugin\Provider\VendorProviderInterface;
use Doctrine\Persistence\ObjectManager;
use Twig\Extension\AbstractExtension;
use Twig\TwigFunction;

final class VendorExtension extends AbstractExtension
{
    private VendorProviderInterface $vendorProvider;
    private ObjectManager $manager;


    public function __construct(VendorProviderInterface $vendorProvider, ObjectManager $manager)
    {
        $this->vendorProvider = $vendorProvider;
        $this->manager = $manager;
    }

    public function getFunctions(): array
    {
        return [
            new TwigFunction('is_update_pending', [$this, 'is_update_pending']),
        ];
    }

    public function is_update_pending(): bool
    {
        $vendor = $this->vendorProvider->provideCurrentVendor();
        $pendingUpdate = $this->manager->getRepository(VendorProfileUpdate::class)
            ->findOneBy(['vendor' => $vendor]);

        if (null === $pendingUpdate) {
            return true;
        }
        return false;
    }
}
