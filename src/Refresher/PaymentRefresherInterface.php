<?php

declare(strict_types=1);

namespace BitBag\SyliusMultiVendorMarketplacePlugin\Refresher;

use BitBag\SyliusMultiVendorMarketplacePlugin\Entity\OrderInterface;

interface PaymentRefresherInterface
{
    public function refreshPayment(OrderInterface $secondaryOrder): void;
}
