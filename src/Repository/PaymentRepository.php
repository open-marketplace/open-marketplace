<?php

/*
 * This file has been created by developers from BitBag.
 * Feel free to contact us once you face any issues or want to start
 * You can find more information about us on https://bitbag.io and write us
 * an email on hello@bitbag.io.
 */

declare(strict_types=1);

namespace BitBag\OpenMarketplace\Repository;

use BitBag\OpenMarketplace\Entity\OrderInterface;
use Doctrine\ORM\QueryBuilder;
use Sylius\Bundle\CoreBundle\Doctrine\ORM\PaymentRepository as BasePaymentRepository;

class PaymentRepository extends BasePaymentRepository
{
    public function findPaymentsOfSecondaryOrders(): QueryBuilder
    {
        $queryBuilder = $this->createListQueryBuilder();
        $alias = $queryBuilder->getRootAliases()[0];

        return $queryBuilder
            ->join(sprintf('%s.order', $alias), 'orderAlias')
            ->andWhere('orderAlias.mode != :primaryMode')
            ->setParameter('primaryMode', OrderInterface::PRIMARY_ORDER_MODE)
            ;
    }
}
