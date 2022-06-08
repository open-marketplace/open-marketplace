<?php

/*
 * This file is part of the Sylius package.
 *
 * (c) Paweł Jędrzejewski
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace BitBag\SyliusMultiVendorMarketplacePlugin\EventListener;


use BitBag\SyliusMultiVendorMarketplacePlugin\Entity\VendorInterface;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\Event\OnFlushEventArgs;
use Doctrine\ORM\Mapping\ClassMetadata;
use Doctrine\ORM\UnitOfWork;
use Sylius\Component\User\Model\User;

final class DefaultVendorUsernameORMListener
{
    public function onFlush(OnFlushEventArgs $onFlushEventArgs)
    {
        $entityManager = $onFlushEventArgs->getEntityManager();
        $unitOfWork = $entityManager->getUnitOfWork();

        $this->processEntities($unitOfWork->getScheduledEntityInsertions(), $entityManager, $unitOfWork);
        $this->processEntities($unitOfWork->getScheduledEntityUpdates(), $entityManager, $unitOfWork);
    }

    private function processEntities(array $entities, EntityManagerInterface $entityManager, UnitOfWork $unitOfWork): void
    {
        foreach ($entities as $vendor) {

            $user = (method_exists($vendor , "getCustomer")) ? $vendor->getCustomer() ? $vendor->getCustomer()->getUser(): $vendor : $vendor;

            if (!$user instanceof VendorInterface) {
                continue;
            }

            if ($user->getEmail() === $user->getUsername() && $user->getEmailCanonical() === $user->getUsernameCanonical()) {
                continue;
            }

            $user->setUsername($user->getEmail());
            $user->setUsernameCanonical($user->getEmailCanonical());

            /** @var ClassMetadata $userMetadata */
            $userMetadata = $entityManager->getClassMetadata(get_class($user));
            $unitOfWork->recomputeSingleEntityChangeSet($userMetadata, $user);
        }
    }
}
