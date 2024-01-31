<?php

/*
 * This file has been created by developers from BitBag.
 * Feel free to contact us once you face any issues or want to start
 * You can find more information about us on https://bitbag.io and write us
 * an email on hello@bitbag.io.
 */

declare(strict_types=1);

namespace BitBag\OpenMarketplace\Component\Core\Api\Messenger\CommandHandler\Vendor;

use BitBag\OpenMarketplace\Component\Core\Api\Messenger\Command\Vendor\RegisterVendorInterface;
use BitBag\OpenMarketplace\Component\Core\Api\Provider\VendorProviderInterface;
use BitBag\OpenMarketplace\Component\Vendor\Entity\ShopUserInterface;
use BitBag\OpenMarketplace\Component\Vendor\Entity\VendorInterface;
use Doctrine\Persistence\ObjectManager;

final class RegisterVendorHandler
{
    public function __construct(
        private VendorProviderInterface $vendorProvider,
        private ObjectManager $manager
    ) {
    }

    public function __invoke(RegisterVendorInterface $command): VendorInterface
    {
        if (!$command->getShopUser()) {
            throw new \DomainException('Shop user should be set');
        }

        if (!$command->getSlug()) {
            throw new \DomainException('Slug should be set');
        }

        /** @var ShopUserInterface $shopUser */
        $shopUser = $command->getShopUser();
        $vendor = $this->vendorProvider->provide($shopUser);

        $vendor->setCompanyName($command->getCompanyName());
        $vendor->setTaxIdentifier($command->getTaxIdentifier());
        $vendor->setBankAccountNumber($command->getBankAccountNumber());
        $vendor->setPhoneNumber($command->getPhoneNumber());
        $vendor->setDescription($command->getDescription());
        $vendor->setVendorAddress($command->getVendorAddress());
        $vendor->setSlug($command->getSlug());

        $this->manager->persist($vendor);

        return $vendor;
    }
}
