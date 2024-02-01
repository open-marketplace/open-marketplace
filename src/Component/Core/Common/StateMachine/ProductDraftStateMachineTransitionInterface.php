<?php

/*
 * This file has been created by developers from BitBag.
 * Feel free to contact us once you face any issues or want to start
 * You can find more information about us on https://bitbag.io and write us
 * an email on hello@bitbag.io.
 */

declare(strict_types=1);

namespace BitBag\OpenMarketplace\Component\Core\Common\StateMachine;

use BitBag\OpenMarketplace\Component\ProductListing\Entity\DraftInterface;

interface ProductDraftStateMachineTransitionInterface
{
    public function can(DraftInterface $productDraft, string $transition): bool;

    public function apply(DraftInterface $productDraft, string $transition): void;

    public function applyIfCan(DraftInterface $productDraft, string $transition): void;
}
