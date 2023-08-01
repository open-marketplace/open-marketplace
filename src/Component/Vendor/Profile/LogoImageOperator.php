<?php

/*
 * This file has been created by developers from BitBag.
 * Feel free to contact us once you face any issues or want to start
 * You can find more information about us on https://bitbag.io and write us
 * an email on hello@bitbag.io.
 */

declare(strict_types=1);

namespace BitBag\OpenMarketplace\Component\Vendor\Profile;

use BitBag\OpenMarketplace\Component\Vendor\Entity\LogoImageInterface;
use BitBag\OpenMarketplace\Component\Vendor\Entity\ProfileUpdate\ProfileUpdateInterface;
use BitBag\OpenMarketplace\Component\Vendor\Entity\VendorInterface;
use BitBag\OpenMarketplace\Factory\VendorImageFactoryInterface;
use Doctrine\ORM\EntityManagerInterface;

final class LogoImageOperator implements LogoImageOperatorInterface
{
    public function __construct(
        private EntityManagerInterface $entityManager,
        private VendorImageFactoryInterface $vendorImageFactory
    ) {

    }

    public function replaceVendorImage(ProfileUpdateInterface $vendorData, VendorInterface $vendor): void
    {
        $imageUpdate = $vendorData->getImage();

        if ($imageUpdate) {
            /** @var LogoImageInterface $imageEntity */
            $imageEntity = $vendor->getImage();
            if (!$vendor->getImage()) {
                $imageEntity = $this->vendorImageFactory->createNew();
            }

            $imageEntity->setPath($imageUpdate->getPath());
            $imageEntity->setOwner($vendor);
            $vendor->setImage($imageEntity);

            $imageUpdate->setPath(null);

            $this->entityManager->persist($imageUpdate);
        }
    }
}
