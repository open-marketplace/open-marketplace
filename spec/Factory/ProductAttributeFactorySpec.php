<?php

/*
 * This file has been created by developers from BitBag.
 * Feel free to contact us once you face any issues or want to start
 * You can find more information about us on https://bitbag.io and write us
 * an email on hello@bitbag.io.
 */

declare(strict_types=1);

namespace spec\BitBag\OpenMarketplace\Factory;

use BitBag\OpenMarketplace\Component\ProductListing\Entity\DraftAttributeInterface;
use BitBag\OpenMarketplace\Component\Vendor\Entity\VendorInterface;
use BitBag\OpenMarketplace\Factory\ProductAttributeFactoryInterface;
use PhpSpec\ObjectBehavior;
use Sylius\Component\Product\Model\ProductAttributeInterface;

final class ProductAttributeFactorySpec extends ObjectBehavior
{
    public function it_is_initializable()
    {
        $this->shouldHaveType(ProductAttributeFactoryInterface::class);
    }

    public function it_returns_valid_object(
        DraftAttributeInterface $draftAttribute,
        ProductAttributeInterface $productAttribute,
        VendorInterface $vendor
    ): void {
        $draftAttribute->getVendor()->willReturn($vendor);
        $vendor->getId()->willReturn(1);
        $draftAttribute->isTranslatable()->willReturn(true);
        $draftAttribute->getStorageType()->willReturn('text');
        $draftAttribute->getConfiguration()->willReturn(['min' => 2, 'max' => 4]);
        $draftAttribute->getCode()->willReturn('code');
        $draftAttribute->getType()->willReturn('text');
        $draftAttribute->getPosition()->willReturn(2);

        $productAttribute = $this->createClone($draftAttribute);

        $productAttribute->isTranslatable()->shouldBe(true);
        $productAttribute->getStorageType()->shouldBe('text');
        $productAttribute->getCode()->shouldBe('code-1');
    }
}
