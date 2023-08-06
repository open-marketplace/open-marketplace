<?php

/*
 * This file has been created by developers from BitBag.
 * Feel free to contact us once you face any issues or want to start
 * You can find more information about us on https://bitbag.io and write us
 * an email on hello@bitbag.io.
 */

declare(strict_types=1);

namespace BitBag\OpenMarketplace\Component\Core\Api\Doctrine\ORM\Subscriber;

use BitBag\OpenMarketplace\Component\Core\Api\UuidAwareInterface;
use Doctrine\Bundle\DoctrineBundle\EventSubscriber\EventSubscriberInterface;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\Event\LifecycleEventArgs;
use Doctrine\ORM\Id\AbstractIdGenerator;

final class UuidSubscriber implements EventSubscriberInterface
{
    private AbstractIdGenerator $uuidGenerator;

    public function __construct(AbstractIdGenerator $uuidGenerator)
    {
        $this->uuidGenerator = $uuidGenerator;
    }

    public function getSubscribedEvents()
    {
        return [
            'prePersist',
            'preUpdate',
        ];
    }

    public function prePersist(LifecycleEventArgs $event): void
    {
        $this->updateUuid($event);
    }

    public function preUpdate(LifecycleEventArgs $event): void
    {
        $this->updateUuid($event);
    }

    public function updateUuid(LifecycleEventArgs $event): void
    {
        /** @var object $object */
        $object = $event->getObject();

        if (!$object instanceof UuidAwareInterface) {
            return;
        }

        if (null === $object->getUuid()) {
            /** @var EntityManager $em */
            $em = $event->getObjectManager();
            $uuid = $this->uuidGenerator->generate($em, $object);
            $object->setUuid($uuid);
        }
    }
}
