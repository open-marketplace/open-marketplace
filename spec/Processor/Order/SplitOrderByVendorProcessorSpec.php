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
use BitBag\SyliusMultiVendorMarketplacePlugin\Entity\OrderInterface;
use BitBag\SyliusMultiVendorMarketplacePlugin\Entity\ProductInterface;
use BitBag\SyliusMultiVendorMarketplacePlugin\Entity\VendorInterface;
use BitBag\SyliusMultiVendorMarketplacePlugin\Processor\Order\SplitOrderByVendorProcessor;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\EntityManager;
use PhpSpec\ObjectBehavior;
use Sylius\Component\Core\Model\OrderItemInterface;
use Sylius\Component\Core\Model\ProductVariantInterface;

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

    public function it_always_create_one_secondary_order(
        EntityManager $entityManager,
        OrderClonerInterface $orderCloner,
        OrderItemClonerInterface $orderItemCloner,
        OrderInterface $order,
        OrderItemInterface $orderItem,
        \Sylius\Component\Core\Model\ProductInterface $product,
        ProductVariantInterface $productVariant,
        VendorInterface $vendor
    ):void {

        $orderItemCollection = new ArrayCollection([$orderItem->getWrappedObject()]);
        $order->getItems()->willReturn($orderItemCollection);
        $orderItem->getVariant()->willReturn($productVariant);
        $productVariant->getProduct()->willReturn($product);
        $product->getVendor()->willReturn($vendor);
        $this->process($order);

//        dump(count($this->getSecondaryOrders()));
    }
}
