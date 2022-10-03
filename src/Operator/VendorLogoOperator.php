<?php

/*
 * This file has been created by developers from BitBag.
 * Feel free to contact us once you face any issues or want to start
 * You can find more information about us on https://bitbag.io and write us
 * an email on hello@bitbag.io.
 */

declare(strict_types=1);

namespace BitBag\OpenMarketplace\Operator;

use BitBag\OpenMarketplace\Entity\VendorImageInterface;
use BitBag\OpenMarketplace\Entity\VendorInterface;
use BitBag\OpenMarketplace\Entity\VendorProfileUpdateInterface;
use BitBag\OpenMarketplace\Factory\VendorImageFactoryInterface;
use Doctrine\ORM\EntityManagerInterface;

final class VendorLogoOperator implements VendorLogoOperatorInterface
{
    private EntityManagerInterface $entityManager;

    private VendorImageFactoryInterface $vendorImageFactory;

    public function __construct(EntityManagerInterface $entityManager, VendorImageFactoryInterface $vendorImageFactory)
    {
        $this->entityManager = $entityManager;
        $this->vendorImageFactory = $vendorImageFactory;
    }

    public function replaceVendorImage(VendorProfileUpdateInterface $vendorData, VendorInterface $vendor): void
    {
        $imageUpdate = $vendorData->getImage();

        if ($imageUpdate) {
            /** @var VendorImageInterface $imageEntity */
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
