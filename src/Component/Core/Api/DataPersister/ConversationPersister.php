<?php

/*
 * This file was created by developers working at BitBag
 * Do you need more information about us and what we do? Visit our https://bitbag.io website!
 * We are hiring developers from all over the world. Join us and start your new, exciting adventure and become part of us: https://bitbag.io/career
*/

declare(strict_types=1);

namespace BitBag\OpenMarketplace\Component\Core\Api\DataPersister;

use ApiPlatform\Core\DataPersister\DataPersisterInterface;
use BitBag\OpenMarketplace\Component\Messaging\Entity\ConversationInterface;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Security\Core\Security;

final class ConversationPersister implements DataPersisterInterface
{
    public function __construct(
        private EntityManagerInterface $manager,
        private Security $security
    ) {
    }

    public function supports(mixed $data): bool
    {
        return $data instanceof ConversationInterface;
    }

    public function persist(mixed $data): void
    {
        $data->setShopUser($this->security->getUser());

        $this->manager->persist($data);
        $this->manager->flush();
    }

    public function remove(mixed $data): void
    {
        $this->manager->remove($data);
        $this->manager->flush();
    }
}
