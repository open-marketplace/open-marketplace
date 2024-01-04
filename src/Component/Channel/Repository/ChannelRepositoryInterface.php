<?php

/*
 * This file has been created by developers from BitBag.
 * Feel free to contact us once you face any issues or want to start
 * You can find more information about us on https://bitbag.io and write us
 * an email on hello@bitbag.io.
 */

declare(strict_types=1);

namespace BitBag\OpenMarketplace\Component\Channel\Repository;

use Sylius\Component\Channel\Repository\ChannelRepositoryInterface as BaseChannelRepositoryInterface;
use Sylius\Component\Core\Model\ChannelInterface;

interface ChannelRepositoryInterface extends BaseChannelRepositoryInterface
{
    public function findAllEnabled(): array;

    public function findOneEnabledByCode(string $code): ?ChannelInterface;
}
