<?php

/*
 * This file has been created by developers from BitBag.
 * Feel free to contact us once you face any issues or want to start
 * You can find more information about us on https://bitbag.io and write us
 * an email on hello@bitbag.io.
 */

declare(strict_types=1);

namespace BitBag\SyliusMultiVendorMarketplacePlugin\Entity;

use Sylius\Component\Core\Model\OrderItem as BaseOrderItem;

class OrderItem extends BaseOrderItem implements OrderItemInterface
{
    public function getProductOwner(): VendorInterface
    {
        /** @var ProductInterface $product */
        $product = $this->getProduct();
        /** @var VendorInterface $vendor */
        $vendor = $product->getVendor();
        return $vendor;
    }
}
