<?php

/*
 * This file has been created by developers from BitBag.
 * Feel free to contact us once you face any issues or want to start
 * You can find more information about us on https://bitbag.io and write us
 * an email on hello@bitbag.io.
 */

declare(strict_types=1);

namespace BitBag\OpenMarketplace\Component\Core\Api\Messenger\Command\Vendor;

use BitBag\OpenMarketplace\Component\Core\Api\Messenger\Command\Vendor\ProductDraftAwareInterface;
use BitBag\OpenMarketplace\Component\Core\Api\Messenger\Command\Vendor\ProductListingAwareInterface;
use BitBag\OpenMarketplace\Component\Vendor\VendorAwareInterface;

interface UpdateProductListingInterface extends ProductDraftAwareInterface, ProductListingAwareInterface, VendorAwareInterface
{
}
