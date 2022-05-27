<?php

/*
 * This file has been created by developers from BitBag.
 * Feel free to contact us once you face any issues or want to start
 * You can find more information about us on https://bitbag.io and write us
 * an email on hello@bitbag.io.
 */

declare(strict_types=1);

namespace BitBag\SyliusMultiVendorMarketplacePlugin\Repository\ProductListing;

use BitBag\SyliusMultiVendorMarketplacePlugin\Entity\ProductListing\ProductTranslationInterface;
use Sylius\Bundle\ResourceBundle\Doctrine\ORM\EntityRepository;

class ProductTranslationRepository extends EntityRepository implements ProductTranslationRepositoryInterface
{
    public function save(ProductTranslationInterface $productTranslation): void
    {
        $this->_em->persist($productTranslation);
        $this->_em->flush();
    }

    public function saveMore(array $productTranslations): void
    {
        foreach ($productTranslations as $productTranslation) {
            $this->_em->persist($productTranslation);
        }

        $this->_em->flush();
    }
}
