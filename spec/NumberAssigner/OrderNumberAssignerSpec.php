<?php

/*
 * This file has been created by developers from BitBag.
 * Feel free to contact us once you face any issues or want to start
 * You can find more information about us on https://bitbag.io and write us
 * an email on hello@bitbag.io.
 */

declare(strict_types=1);

namespace spec\BitBag\OpenMarketplace\NumberAssigner;

use BitBag\OpenMarketplace\Entity\OrderInterface;
use BitBag\OpenMarketplace\NumberAssigner\OrderNumberAssigner;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use Sylius\Bundle\OrderBundle\NumberAssigner\OrderNumberAssignerInterface;

final class OrderNumberAssignerSpec extends ObjectBehavior
{
    public function let(
        OrderNumberAssignerInterface $orderNumberAssigner
    ): void {
        $this->beConstructedWith(
            $orderNumberAssigner
        );
    }

    public function it_is_initializable(): void
    {
        $this->shouldHaveType(OrderNumberAssigner::class);
    }

    public function it_implements_interface(): void
    {
        $this->shouldImplement(\BitBag\OpenMarketplace\NumberAssigner\OrderNumberAssignerInterface::class);
    }

    public function it_does_not_increment_sequence_on_primary_order(
        OrderInterface $order,
        OrderNumberAssignerInterface $decoratedOrderNumberAssigner
    ) {
        $order->isPrimary()->willReturn(true);
        $order->getNumber()->willReturn(null);

        $this->assignNumber($order);

        $order->setNumber(Argument::any())->shouldNotBeCalled();
        $decoratedOrderNumberAssigner->assignNumber($order)->shouldNotBeCalled();
    }
}
