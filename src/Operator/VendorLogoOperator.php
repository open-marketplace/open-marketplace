<?php

/*
 * This file has been created by developers from BitBag.
 * Feel free to contact us once you face any issues or want to start
 * You can find more information about us on https://bitbag.io and write us
 * an email on hello@bitbag.io.
 */

declare(strict_types=1);

namespace BitBag\SyliusMultiVendorMarketplacePlugin\Operator;

use BitBag\SyliusMultiVendorMarketplacePlugin\Entity\VendorImage;
use BitBag\SyliusMultiVendorMarketplacePlugin\Entity\VendorInterface;
use BitBag\SyliusMultiVendorMarketplacePlugin\Entity\VendorProfileUpdateInterface;
use Doctrine\ORM\EntityManagerInterface;

final class VendorLogoOperator implements VendorLogoOperatorInterface
{
    private EntityManagerInterface $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    public function replaceVendorImage(VendorProfileUpdateInterface $vendorData, VendorInterface $vendor): void
    {
        $imageUpdate = $vendorData->getImage();

        if ($imageUpdate) {
            $imageEntity = new VendorImage();
            if($vendor->getImage()) {
                $imageEntity = $vendor->getImage();
            }
            $imageEntity->setPath($imageUpdate->getPath());
            $imageEntity->setOwner($vendor);
            $vendor->setImage($imageEntity);

            $imageUpdate->setPath(null);

            $this->entityManager->persist($imageUpdate);
        }
    }
}
