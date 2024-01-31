<?php

/*
 * This file has been created by developers from BitBag.
 * Feel free to contact us once you face any issues or want to start
 * You can find more information about us on https://bitbag.io and write us
 * an email on hello@bitbag.io.
 */

declare(strict_types=1);

namespace BitBag\OpenMarketplace\Component\Core\Admin\Twig\Extension;

use BitBag\OpenMarketplace\Component\Order\Repository\OrderRepositoryInterface;
use BitBag\OpenMarketplace\Component\Settlement\Entity\SettlementInterface;
use Twig\Extension\AbstractExtension;
use Twig\TwigFunction;

final class SettlementOrderCountExtension extends AbstractExtension
{
    public function __construct(
        private OrderRepositoryInterface $orderRepository,
    ) {
    }

    public function getFunctions(): array
    {
        return [
            new TwigFunction('count_orders_for_settlement', [$this, 'countOrdersForSettlement']),
        ];
    }

    public function countOrdersForSettlement(SettlementInterface $settlement): int
    {
        return $this->orderRepository->countOrderForSettlement($settlement);
    }
}
