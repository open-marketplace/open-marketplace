<?php

/*
 * This file has been created by developers from BitBag.
 * Feel free to contact us once you face any issues or want to start
 * You can find more information about us on https://bitbag.io and write us
 * an email on hello@bitbag.io.
 */

declare(strict_types=1);

namespace BitBag\OpenMarketplace\Component\ProductListing\Repository;

use BitBag\OpenMarketplace\Component\ProductListing\Entity\DraftTranslationInterface;

interface DraftTranslationRepositoryInterface
{
    public function save(DraftTranslationInterface $productTranslation): void;

    public function saveCollection(array $productTranslations): void;
}
