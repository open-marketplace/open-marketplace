<?php

/*
 * This file has been created by developers from BitBag.
 * Feel free to contact us once you face any issues or want to start
 * You can find more information about us on https://bitbag.io and write us
 * an email on hello@bitbag.io.
 */

declare(strict_types=1);

namespace spec\BitBag\OpenMarketplace\Api\Doctrine\ORM\Subscriber;

use BitBag\OpenMarketplace\Api\Doctrine\ORM\Subscriber\UuidSubscriber;
use BitBag\OpenMarketplace\Api\UuidAwareInterface;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\Event\LifecycleEventArgs;
use PhpSpec\ObjectBehavior;
use Ramsey\Uuid\Doctrine\UuidGenerator;
use Ramsey\Uuid\UuidInterface;
use stdClass;

final class UuidSubscriberSpec extends ObjectBehavior
{
    public function let(
        UuidGenerator $uuidGenerator
    ): void {
        $this->beConstructedWith($uuidGenerator);
    }

    public function it_is_initializable(): void
    {
        $this->shouldHaveType(UuidSubscriber::class);
    }

    public function it_updates_uuid_on_pre_persist_doctrine_event(
        UuidGenerator $uuidGenerator,
        LifecycleEventArgs $event,
        EntityManager $objectManager,
        UuidAwareInterface $uuidAware,
        UuidInterface $uuid
    ): void {
        $uuidAware->getUuid()->willReturn(null);
        $event->getObject()->willReturn($uuidAware);
        $event->getObjectManager()->willReturn($objectManager);

        $uuidGenerator->generate($objectManager, $uuidAware)->shouldBeCalled()->willReturn($uuid);
        $uuidAware->setUuid($uuid)->shouldBeCalled();

        $this->prePersist($event);
    }

    public function it_updates_uuid_on_pre_update_doctrine_event(
        UuidGenerator $uuidGenerator,
        LifecycleEventArgs $event,
        EntityManager $objectManager,
        UuidAwareInterface $uuidAware,
        UuidInterface $uuid
    ): void {
        $uuidAware->getUuid()->willReturn(null);
        $event->getObject()->willReturn($uuidAware);
        $event->getObjectManager()->willReturn($objectManager);

        $uuidGenerator->generate($objectManager, $uuidAware)->shouldBeCalled()->willReturn($uuid);
        $uuidAware->setUuid($uuid)->shouldBeCalled();

        $this->preUpdate($event);
    }

    public function it_does_nothing_if_uuid_already_set_on_pre_update_doctrine_event(
        UuidGenerator $uuidGenerator,
        LifecycleEventArgs $event,
        EntityManager $objectManager,
        UuidAwareInterface $uuidAware,
        UuidInterface $uuid
    ): void {
        $uuidAware->getUuid()->willReturn($uuid);
        $event->getObject()->willReturn($uuidAware);
        $event->getObjectManager()->willReturn($objectManager);

        $uuidGenerator->generate($objectManager, $uuidAware)->shouldNotBeCalled();
        $uuidAware->setUuid($uuid)->shouldNotBeCalled();

        $this->preUpdate($event);
    }

    public function it_does_nothing_if_object_is_not_uuid_aware_on_pre_persist_doctrine_event(
        UuidGenerator $uuidGenerator,
        LifecycleEventArgs $event,
        EntityManager $objectManager,
        stdClass $object,
        ): void {
        $event->getObject()->willReturn($object);
        $event->getObjectManager()->willReturn($objectManager);

        $uuidGenerator->generate($objectManager, $object)->shouldNotBeCalled();

        $this->prePersist($event);
    }

    public function it_does_nothing_if_object_is_not_uuid_aware_on_pre_update_doctrine_event(
        UuidGenerator $uuidGenerator,
        LifecycleEventArgs $event,
        EntityManager $objectManager,
        stdClass $object,
        ): void {
        $event->getObject()->willReturn($object);
        $event->getObjectManager()->willReturn($objectManager);

        $uuidGenerator->generate($objectManager, $object)->shouldNotBeCalled();

        $this->preUpdate($event);
    }
}
