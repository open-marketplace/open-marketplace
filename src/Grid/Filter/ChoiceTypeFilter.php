<?php

/*
 * This file has been created by developers from BitBag.
 * Feel free to contact us once you face any issues or want to start
 * You can find more information about us on https://bitbag.io and write us
 * an email on hello@bitbag.io.
 */

declare(strict_types=1);

namespace BitBag\SyliusMultiVendorMarketplacePlugin\Grid\Filter;

use Sylius\Component\Grid\Data\DataSourceInterface;
use Sylius\Component\Grid\Filtering\FilterInterface;

class ChoiceTypeFilter implements FilterInterface
{
    public function apply(DataSourceInterface $dataSource, string $name, $data, array $options): void
    {
        if (empty($data)) {
            return;
        }

        $field = $options['field'] ?? $name;

        if (is_array($data)) {
            $dataSource->restrict($dataSource->getExpressionBuilder()->in($field, $data));

            return;
        }

        $dataSource->restrict($dataSource->getExpressionBuilder()->equals($field, $data));
    }

//    public function getType(): string
//    {
//        return 'tournament_statisticss';
//    }


}
