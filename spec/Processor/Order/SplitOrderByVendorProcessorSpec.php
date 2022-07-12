<?php

/*
 * This file has been created by developers from BitBag.
 * Feel free to contact us once you face any issues or want to start
 * You can find more information about us on https://bitbag.io and write us
 * an email on hello@bitbag.io.
 */

declare(strict_types=1);

namespace spec\BitBag\SyliusMultiVendorMarketplacePlugin\Processor\Order;

use BitBag\SyliusMultiVendorMarketplacePlugin\Cloner\OrderClonerInterface;
use BitBag\SyliusMultiVendorMarketplacePlugin\Cloner\OrderItemClonerInterface;
use BitBag\SyliusMultiVendorMarketplacePlugin\Processor\Order\SplitOrderByVendorProcessor;
use Doctrine\ORM\EntityManager;
use PhpSpec\ObjectBehavior;

final class SplitOrderByVendorProcessorSpec extends ObjectBehavior
{
    public function let(
        EntityManager $entityManager,
        OrderClonerInterface $orderCloner,
        OrderItemClonerInterface $orderItemCloner
    ): void {
        $this->beConstructedWith($entityManager, $orderCloner, $orderItemCloner);
    }

    public function it_is_initializable(): void
    {
        $this->shouldHaveType(SplitOrderByVendorProcessor::class);
    }
}
