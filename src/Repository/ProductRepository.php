<?php

/*
 * This file has been created by developers from BitBag.
 * Feel free to contact us once you face any issues or want to start
 * You can find more information about us on https://bitbag.io and write us
 * an email on hello@bitbag.io.
 */

declare(strict_types=1);

namespace BitBag\OpenMarketplace\Repository;

use BitBag\OpenMarketplace\Entity\VendorInterface;
use Doctrine\ORM\QueryBuilder;
use Sylius\Bundle\CoreBundle\Doctrine\ORM\ProductRepository as BaseProductRepository;
use Sylius\Component\Core\Model\ChannelInterface;
use Sylius\Component\Core\Model\ProductInterface;
use Sylius\Component\Core\Model\TaxonInterface;

final class ProductRepository extends BaseProductRepository implements ProductRepositoryInterface
{
    public function save(ProductInterface $product): void
    {
        $this->_em->persist($product);
        $this->_em->flush();
    }

    public function createVendorShopListQueryBuilder(
        VendorInterface $vendor,
        ChannelInterface $channel,
        TaxonInterface $taxon,
        string $locale,
        array $sorting = [],
        bool $includeAllDescendants = false,
        ): QueryBuilder {
        $qb = $this->createShopListQueryBuilder(
            $channel,
            $taxon,
            $locale,
            $sorting,
            $includeAllDescendants,
        );

        $vendorId = $vendor->getId();

        return $qb
            ->andWhere('o.vendor = :vendor')
            ->setParameter('vendor', $vendorId)
            ;
    }
}
