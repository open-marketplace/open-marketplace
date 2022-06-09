<?php

/*
 * This file has been created by developers from BitBag.
 * Feel free to contact us once you face any issues or want to start
 * You can find more information about us on https://bitbag.io and write us
 * an email on hello@bitbag.io.
 */

declare(strict_types=1);

namespace BitBag\SyliusMultiVendorMarketplacePlugin\Repository\Conversation;

use BitBag\SyliusMultiVendorMarketplacePlugin\Entity\VendorInterface;
use Doctrine\ORM\QueryBuilder;
use Sylius\Bundle\ResourceBundle\Doctrine\ORM\EntityRepository;
use Symfony\Component\Security\Core\User\UserInterface;

final class ConversationRepository extends EntityRepository implements ConversationRepositoryInterface
{
    public function findAllWithStatusAndUser(string $status, ?UserInterface $user): ?array
    {
        $query = $this->createQueryBuilder('c');

        $this->determineUserForQuery($query, $user);

        $query->andWhere('c.status = :status')
            ->setParameter('status', $status);

        return $query->getQuery()->getResult();
    }

    private function determineUserForQuery(QueryBuilder $query, UserInterface $user): void
    {
        $expr = $query->expr();

        if ($user instanceof VendorInterface) {
            $query->andWhere($expr->eq('c.vendorUser', $user->getId()));

            return;
        }

        $query->andWhere($expr->eq('c.shopUser', $user->getId()));
    }
}
