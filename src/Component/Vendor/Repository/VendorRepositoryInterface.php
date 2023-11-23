<?php

/*
 * This file has been created by developers from BitBag.
 * Feel free to contact us once you face any issues or want to start
 * You can find more information about us on https://bitbag.io and write us
 * an email on hello@bitbag.io.
 */

declare(strict_types=1);

namespace BitBag\OpenMarketplace\Component\Vendor\Repository;

use BitBag\OpenMarketplace\Component\Vendor\Entity\VendorInterface;
use Sylius\Component\Resource\Repository\RepositoryInterface;

interface VendorRepositoryInterface extends RepositoryInterface
{
    public function findOneBySlug(string $slug): ?VendorInterface;

    /** @return iterable|VendorInterface[] */
    public function findAllByFrequency(string $frequency): iterable;
}
