<?php

/*
 * This file has been created by developers from BitBag.
 * Feel free to contact us once you face any issues or want to start
 * You can find more information about us on https://bitbag.io and write us
 * an email on hello@bitbag.io.
 */

declare(strict_types=1);

namespace BitBag\OpenMarketplace\Operator;

use BitBag\OpenMarketplace\Entity\VendorBackgroundImageInterface;
use BitBag\OpenMarketplace\Entity\VendorInterface;
use BitBag\OpenMarketplace\Entity\VendorProfileUpdateInterface;
use BitBag\OpenMarketplace\Factory\VendorBackgroundImageFactoryInterface;
use Doctrine\ORM\EntityManagerInterface;

final class VendorBackgroundImageOperator implements VendorBackgroundImageOperatorInterface
{
    private EntityManagerInterface $entityManager;

    private VendorBackgroundImageFactoryInterface $vendorBackgroundImageFactory;

    public function __construct(
        EntityManagerInterface $entityManager,
        VendorBackgroundImageFactoryInterface $vendorBackgroundImageFactory
    ) {
        $this->entityManager = $entityManager;
        $this->vendorBackgroundImageFactory = $vendorBackgroundImageFactory;
    }

    public function replaceVendorImage(VendorProfileUpdateInterface $vendorData, VendorInterface $vendor): void
    {
        $backgroundImageUpdate = $vendorData->getBackgroundImage();

        if (!$backgroundImageUpdate) {
            return;
        }

        /** @var VendorBackgroundImageInterface $backgroundImageEntity */
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
