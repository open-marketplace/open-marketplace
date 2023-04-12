<?php

/*
 * This file was created by developers working at BitBag
 * Do you need more information about us and what we do? Visit our https://bitbag.io website!
 * We are hiring developers from all over the world. Join us and start your new, exciting adventure and become part of us: https://bitbag.io/career
*/

declare(strict_types=1);

namespace BitBag\OpenMarketplace\Api\DataPerister;

use ApiPlatform\Core\DataPersister\DataPersisterInterface;
use BitBag\OpenMarketplace\Entity\Conversation\ConversationInterface;
use BitBag\OpenMarketplace\Entity\Conversation\MessageInterface;
use Doctrine\ORM\EntityManager;
use Symfony\Component\Security\Core\Security;

class ConversationPersister implements DataPersisterInterface
{
    private EntityManager $manager;
    private Security $security;

    public function __construct(EntityManager $manager, Security $security)
    {
        $this->manager = $manager;
        $this->security = $security;
    }

    public function supports(mixed $data): bool
    {
        return $data instanceof ConversationInterface;
    }

    public function persist($data)
    {
        $data->setShopUser($this->security->getUser());

        $this->manager->persist($data);
        $this->manager->flush();
    }

    public function remove($data)
    {
        $this->manager->remove($data);
        $this->manager->flush();
    }
}
