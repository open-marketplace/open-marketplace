<?php

/*
 * This file has been created by developers from BitBag.
 * Feel free to contact us once you face any issues or want to start
 * You can find more information about us on https://bitbag.io and write us
 * an email on hello@bitbag.io.
 */

declare(strict_types=1);

namespace BitBag\OpenMarketplace\Api\Messenger\CommandHandler\Vendor;

use BitBag\OpenMarketplace\Api\Messenger\Command\Vendor\RegisterVendor;
use BitBag\OpenMarketplace\Api\Provider\VendorProviderInterface;
use BitBag\OpenMarketplace\Entity\VendorInterface;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\Messenger\Handler\MessageHandlerInterface;

final class RegisterVendorHandler implements MessageHandlerInterface
{
    public function __construct(
        private VendorProviderInterface $vendorProvider,
        private ObjectManager $manager
    ) {
    }

    public function __invoke(RegisterVendor $command): VendorInterface
    {
        if (!$command->shopUser) {
            throw new \DomainException('Shop user should be set');
        }

        if (!$command->slug) {
            throw new \DomainException('Slug should be set');
        }

        $vendor = $this->vendorProvider->provide($command->shopUser);

        $vendor->setCompanyName($command->companyName);
        $vendor->setTaxIdentifier($command->taxIdentifier);
        $vendor->setPhoneNumber($command->phoneNumber);
        $vendor->setDescription($command->description);
        $vendor->setVendorAddress($command->vendorAddress);
        $vendor->setSlug($command->slug);

        $this->manager->persist($vendor);

        return $vendor;
    }
}
