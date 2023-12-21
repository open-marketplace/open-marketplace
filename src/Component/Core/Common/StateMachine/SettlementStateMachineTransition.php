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
use SM\Factory\FactoryInterface;

final class SettlementStateMachineTransition implements SettlementStateMachineTransitionInterface
{
    public function __construct(
        private FactoryInterface $productDraftStateMachineFactory,
        private EntityManagerInterface $entityManager,
    ) {
    }

    public function applyIfCan(
        SettlementInterface $settlement,
        string $transition,
        bool $flush = false
    ): void {
        $stateMachine = $this->productDraftStateMachineFactory->get(
            $settlement,
            SettlementTransitions::GRAPH
        );

        if (!$stateMachine->can($transition)) {
            return;
        }

        $stateMachine->apply($transition);

        if (false === $flush) {
            return;
        }

        $this->entityManager->persist($settlement);
        $this->entityManager->flush();
    }
}
