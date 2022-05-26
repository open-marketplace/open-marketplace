<?php

declare(strict_types=1);

namespace BitBag\SyliusMultiVendorMarketplacePlugin\Grid\Filter;

use Sylius\Component\Grid\Data\DataSourceInterface;
use Sylius\Component\Grid\Filtering\FilterInterface;

final class ProductListingStatusFilter implements FilterInterface
{

    public function apply(DataSourceInterface $dataSource, string $name, $data, array $options): void
    {
        $dataSource->restrict($dataSource->getExpressionBuilder()->equals('status', $data['status']));
    }
}
