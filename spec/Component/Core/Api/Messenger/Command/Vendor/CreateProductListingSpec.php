<?php

/*
 * This file has been created by developers from BitBag.
 * Feel free to contact us once you face any issues or want to start
 * You can find more information about us on https://bitbag.io and write us
 * an email on hello@bitbag.io.
 */

declare(strict_types=1);

namespace spec\BitBag\OpenMarketplace\Component\Core\Api\Messenger\Command\Vendor;

use BitBag\OpenMarketplace\Component\Core\Api\Messenger\Command\Vendor\CreateProductListing;
use BitBag\OpenMarketplace\Component\ProductListing\Entity\Draft;
use BitBag\OpenMarketplace\Component\Vendor\Entity\VendorInterface;
use PhpSpec\ObjectBehavior;

final class CreateProductListingSpec extends ObjectBehavior
{
    public function it_is_initializable(): void
    {
        $this->shouldHaveType(CreateProductListing::class);
    }

    public function it_has_product_draft(
        Draft $productDraft
    ): void {
        $this->setProductDraft($productDraft);
        $this->getProductDraft()->shouldReturn($productDraft);
    }

    public function it_has_vendor(
        VendorInterface $vendor
    ): void {
        $this->setVendor($vendor);
        $this->getVendor()->shouldReturn($vendor);
    }
}
