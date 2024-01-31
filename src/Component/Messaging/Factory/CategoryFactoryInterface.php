<?php

/*
 * This file has been created by developers from BitBag.
 * Feel free to contact us once you face any issues or want to start
 * You can find more information about us on https://bitbag.io and write us
 * an email on hello@bitbag.io.
 */

declare(strict_types=1);

namespace BitBag\OpenMarketplace\Component\Messaging\Factory;

use BitBag\OpenMarketplace\Component\Messaging\Entity\CategoryInterface;
use Sylius\Component\Resource\Factory\FactoryInterface;

interface CategoryFactoryInterface extends FactoryInterface
{
    public function createNew(): CategoryInterface;

    public function createNewWithName(string $categoryName): CategoryInterface;
}
