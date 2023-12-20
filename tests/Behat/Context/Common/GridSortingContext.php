<?php

declare(strict_types=1);

/*
 * This file has been created by developers from BitBag.
 * Feel free to contact us once you face any issues or want to start
 * You can find more information about us on https://bitbag.io and write us
 * an email on hello@bitbag.io.
 */

namespace Tests\BitBag\OpenMarketplace\Behat\Context\Common;

use Behat\Behat\Context\Context;
use Sylius\Behat\Service\SharedStorageInterface;

final class GridSortingContext implements Context
{
    private const SORT_TYPES = [
        'ascending' => 'asc',
        'descending' => 'desc',
    ];

    private const SORTING = 'sorting';

    public function __construct(
        private SharedStorageInterface $sharedStorage,
    ) {
    }

    /**
     * @Then I sort the list by :sortField in :value order
     */
    public function iSortTheListByInOrder($sortField, $value): void
    {
        $this->sharedStorage->set(
            self::SORTING,
            [
                self::SORTING => [
                    $sortField => self::SORT_TYPES[$value],
                ],
            ]
        );
    }
}
