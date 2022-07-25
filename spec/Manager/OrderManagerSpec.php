<?php

/*
 * This file has been created by developers from BitBag.
 * Feel free to contact us once you face any issues or want to start
 * You can find more information about us on https://bitbag.io and write us
 * an email on hello@bitbag.io.
 */

declare(strict_types=1);

namespace spec\BitBag\SyliusMultiVendorMarketplacePlugin\Manager;

use BitBag\SyliusMultiVendorMarketplacePlugin\Cloner\OrderClonerInterface;
use BitBag\SyliusMultiVendorMarketplacePlugin\Cloner\OrderItemClonerInterface;
use BitBag\SyliusMultiVendorMarketplacePlugin\Factory\OrderFactoryInterface;
use BitBag\SyliusMultiVendorMarketplacePlugin\Factory\OrderItemFactoryInterface;
use BitBag\SyliusMultiVendorMarketplacePlugin\Manager\OrderManager;
use Doctrine\ORM\EntityManager;
use PhpSpec\ObjectBehavior;

final class OrderManagerSpec extends ObjectBehavior
{
    public function let(
        OrderFactoryInterface $factory,
        OrderClonerInterface $cloner,
        EntityManager $entityManager,
        OrderItemClonerInterface $orderItemCloner,
        OrderItemFactoryInterface $itemFactory
    ): void {
        $this->beConstructedWith( $factory, $cloner, $entityManager, $orderItemCloner, $itemFactory   );
    }

    function it_is_initializable(): void
    {
        $this->shouldHaveType(OrderManager::class);
    }


}
