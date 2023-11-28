<?php

/*
 * This file has been created by developers from BitBag.
 * Feel free to contact us once you face any issues or want to start
 * You can find more information about us on https://bitbag.io and write us
 * an email on hello@bitbag.io.
 */

declare(strict_types=1);

namespace spec\BitBag\OpenMarketplace\Component\Core\Settlement\Twig\Extension;

use BitBag\OpenMarketplace\Component\Core\Settlement\Twig\Extension\SettlementOrderCountExtension;
use BitBag\OpenMarketplace\Component\Order\Repository\OrderRepositoryInterface;
use BitBag\OpenMarketplace\Component\Settlement\Entity\SettlementInterface;
use PhpSpec\ObjectBehavior;
use Twig\Extension\AbstractExtension;
use Twig\TwigFunction;

final class SettlementOrderCountExtensionSpec extends ObjectBehavior
{
    public function let(OrderRepositoryInterface $orderRepository)
    {
        $this->beConstructedWith($orderRepository);
    }

    public function it_is_initializable(): void
    {
        $this->shouldHaveType(SettlementOrderCountExtension::class);
        $this->shouldHaveType(AbstractExtension::class);
    }

    public function it_returns_functions(): void
    {
        $functions = $this->getFunctions();
        $functions->shouldHaveCount(1);
        $functions[0]->shouldHaveType(TwigFunction::class);
        $functions[0]->getName()->shouldReturn('count_orders_for_settlement');
    }

    public function it_returns_count_order_for_settlement(
        OrderRepositoryInterface $orderRepository,
        SettlementInterface $settlement
    ): void {
        $orderRepository->countOrderForSettlement($settlement)->willReturn(5);
        $this->countOrdersForSettlement($settlement)->shouldReturn(5);
    }
}
