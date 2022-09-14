<?php

/*
 * This file has been created by developers from BitBag.
 * Feel free to contact us once you face any issues or want to start
 * You can find more information about us on https://bitbag.io and write us
 * an email on hello@bitbag.io.
 */

declare(strict_types=1);

namespace spec\BitBag\SyliusMultiVendorMarketplacePlugin\Factory;

use BitBag\SyliusMultiVendorMarketplacePlugin\Entity\ProductListing\DraftAttributeInterface;
use BitBag\SyliusMultiVendorMarketplacePlugin\Factory\ProductAttributeFactoryInterface;
use PhpSpec\ObjectBehavior;
use Sylius\Component\Product\Model\ProductAttribute;
use Sylius\Component\Product\Model\ProductAttributeInterface;

final class ProductAttributeFactorySpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType(ProductAttributeFactoryInterface::class);
    }

    public function it_returns_valid_object(
        DraftAttributeInterface $draftAttribute,
        ProductAttributeInterface $productAttribute,
    ): void  {

        $draftAttribute->isTranslatable()->willReturn(true);
        $draftAttribute->getStorageType()->willReturn('text');
        $draftAttribute->getConfiguration()->willReturn(['min'=>2,'max'=>4]);
        $draftAttribute->getCode()->willReturn('code');
        $draftAttribute->getType()->willReturn('text');
        $draftAttribute->getPosition()->willReturn(2);

        $productAttribute = $this->createClone($draftAttribute);

        $productAttribute->isTranslatable()->shouldBe(true);
        $productAttribute->getStorageType()->shouldBe('text');
        $productAttribute->getCode()->shouldBe('code');
    }
}
