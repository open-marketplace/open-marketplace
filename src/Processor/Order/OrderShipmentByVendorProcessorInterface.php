<?php

declare(strict_types=1);

namespace BitBag\SyliusMultiVendorMarketplacePlugin\Processor\Order;

use Sylius\Component\Order\Model\OrderInterface as BaseOrderInterface;

interface OrderShipmentByVendorProcessorInterface
{
    public function process(BaseOrderInterface $order): void;
}
