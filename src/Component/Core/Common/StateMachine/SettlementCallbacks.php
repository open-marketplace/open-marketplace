<?php

/*
 * This file has been created by developers from BitBag.
 * Feel free to contact us once you face any issues or want to start
 * You can find more information about us on https://bitbag.io and write us
 * an email on hello@bitbag.io.
 */

declare(strict_types=1);

namespace BitBag\OpenMarketplace\Component\Core\Common\StateMachine;

use BitBag\OpenMarketplace\Component\Settlement\Contracts\SettlementTransitions;
use BitBag\OpenMarketplace\Component\Settlement\Entity\SettlementInterface;
use Doctrine\ORM\EntityManagerInterface;

final class SettlementCallbacks implements SettlementCallbacksInterface
{
    public function __construct(
        private SettlementStateMachineTransitionInterface $settlementStateMachineTransition,
        private EntityManagerInterface $entityManager,
    ) {
    }

    public function payout(SettlementInterface $settlement): void
    {
        $this->settlementStateMachineTransition->applyIfCan(
            $settlement,
            SettlementTransitions::SETTLE,
        );

        $this->entityManager->flush();
    }
}
