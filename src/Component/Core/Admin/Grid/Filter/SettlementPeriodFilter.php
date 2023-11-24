<?php

/*
 * This file has been created by developers from BitBag.
 * Feel free to contact us once you face any issues or want to start
 * You can find more information about us on https://bitbag.io and write us
 * an email on hello@bitbag.io.
 */

declare(strict_types=1);

namespace BitBag\OpenMarketplace\Component\Core\Admin\Grid\Filter;

use Sylius\Component\Grid\Data\DataSourceInterface;
use Sylius\Component\Grid\Filtering\FilterInterface;

final class SettlementPeriodFilter implements FilterInterface
{
    public function apply(
        DataSourceInterface $dataSource,
        string $name,
        $data,
        array $options
    ): void {
        if ($data[$name]) {
            [$startDate, $endDate] = explode(' - ', $data[$name]);

            $startDate = $this->formatDateForQuery($startDate);
            $endDate = $this->formatDateForQuery($endDate);

            $dataSource->restrict(
                $dataSource->getExpressionBuilder()->andX(
                    $dataSource->getExpressionBuilder()->equals(
                        'startDate',
                        new \DateTime(
                            sprintf('%s 00:00:00', $startDate)
                        )
                    ),
                    $dataSource->getExpressionBuilder()->equals(
                        'endDate',
                        new \DateTime(
                            sprintf('%s 23:59:59', $endDate)
                        )
                    ),
                )
            );
        }
    }

    public function formatDateForQuery(string $startDate): string
    {
        return implode('-', array_reverse(explode('/', $startDate)));
    }
}
