<?php

declare(strict_types=1);

namespace BitBag\SyliusMultiVendorMarketplacePlugin\Repository;

use BitBag\SyliusMultiVendorMarketplacePlugin\Entity\VendorInterface;
use Pagerfanta\Pagerfanta;
use Sylius\Bundle\CoreBundle\Doctrine\ORM\ProductRepository as BaseProductRepository;
use Sylius\Component\Channel\Model\ChannelInterface;
use Symfony\Component\HttpFoundation\Request;

final class ProductRepository extends BaseProductRepository implements ProductRepositoryInterface
{
    /**
     * @return Pagerfanta<object>
     */
    public function findVendorProducts(
        VendorInterface $vendor,
        Request $request,
        ChannelInterface $channel
    ): Pagerfanta {
        $qb = $this->createListQueryBuilder($request->get('_locale'))
            ->andWhere('o.vendor = :vendor')
            ->setParameter('vendor', $vendor)
        ;

        if ($request->get('sorting')) {
            $key = key($request->get('sorting'));
            $sortingOption = 'asc' === $request->get('sorting')[$key] ? 'asc' : 'desc';

            switch ($key) {
                case 'createdAt':
                    $qb->orderBy('o.createdAt', $sortingOption)
                    ;

                    break;
                case 'name':
                    $qb->orderBy('translation.name', $sortingOption)
                    ;

                    break;
                case 'price':
                    $subQuery = $this->createQueryBuilder('m')
                        ->select('min(v.position)')
                        ->innerJoin('m.variants', 'v')
                        ->andWhere('m.id = :product_id')
                        ->andWhere('v.enabled = :enabled')
                    ;

                    $qb
                        ->addSelect('variant')
                        ->addSelect('channelPricing')
                        ->innerJoin('o.variants', 'variant')
                        ->innerJoin('variant.channelPricings', 'channelPricing')
                        ->andWhere('channelPricing.channelCode = :channelCode')
                        ->andWhere(
                            $qb->expr()->in(
                                'variant.position',
                                str_replace(':product_id', 'o.id', $subQuery->getDQL())
                            )
                        )
                        ->setParameter('channelCode', $channel->getCode())
                        ->setParameter('enabled', true)
                        ->orderBy('channelPricing.price', $sortingOption)
                    ;

                    break;
            }
        }

        $currentPage = $request->get('page', 1);
        $limit = $request->get('limit', $_ENV['DEFAULT_VENDOR_PRODUCTS_LIMIT']);

        $pager = $this->getPaginator($qb);
        $pager->setMaxPerPage($limit);
        $pager->setCurrentPage($currentPage);

        return $pager;
    }
}
