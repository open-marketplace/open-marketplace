<?php

/*
 * This file has been created by developers from BitBag.
 * Feel free to contact us once you face any issues or want to start
 * You can find more information about us on https://bitbag.io and write us
 * an email on hello@bitbag.io.
 */

declare(strict_types=1);

namespace BitBag\OpenMarketplace\Component\Vendor\Profile;

use BitBag\OpenMarketplace\Component\Vendor\Entity\BackgroundImageInterface;
use BitBag\OpenMarketplace\Component\Vendor\Entity\ProfileUpdate\ProfileUpdateInterface;
use BitBag\OpenMarketplace\Component\Vendor\Entity\VendorInterface;
use BitBag\OpenMarketplace\Component\Vendor\Profile\Factory\BackgroundImageFactoryInterface;
use Doctrine\ORM\EntityManagerInterface;

final class BackgroundImageOperator implements BackgroundImageOperatorInterface
{
    public function __construct(
        private EntityManagerInterface $entityManager,
        private BackgroundImageFactoryInterface $vendorBackgroundImageFactory
    ) {
    }

    public function replaceVendorImage(ProfileUpdateInterface $vendorData, VendorInterface $vendor): void
    {
        $backgroundImageUpdate = $vendorData->getBackgroundImage();

        if (!$backgroundImageUpdate) {
            return;
        }

        /** @var BackgroundImageInterface $backgroundImageEntity */
        $backgroundImageEntity = $vendor->getBackgroundImage();
        if (!$vendor->getBackgroundImage()) {
            $backgroundImageEntity = $this->vendorBackgroundImageFactory->createNew();
        }

        $backgroundImageEntity->setPath($backgroundImageUpdate->getPath());
        $backgroundImageEntity->setOwner($vendor);
        $vendor->setBackgroundImage($backgroundImageEntity);

        $backgroundImageUpdate->setPath(null);

        $this->entityManager->persist($backgroundImageUpdate);
    }
}
