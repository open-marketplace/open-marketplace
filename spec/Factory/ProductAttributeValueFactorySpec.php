<?php

/*
 * This file has been created by developers from BitBag.
 * Feel free to contact us once you face any issues or want to start
 * You can find more information about us on https://bitbag.io and write us
 * an email on hello@bitbag.io.
 */

declare(strict_types=1);

namespace spec\BitBag\OpenMarketplace\Factory;

use BitBag\OpenMarketplace\Factory\ProductAttributeValueFactoryInterface;
use PhpSpec\ObjectBehavior;
use Sylius\Component\Product\Model\ProductAttributeValueInterface;

final class ProductAttributeValueFactorySpec extends ObjectBehavior
{
    public function it_is_initializable(): void
    {
        $this->shouldHaveType(ProductAttributeValueFactoryInterface::class);
    }

    public function it_returns_valid_object(): void
    {
        $this->create()->shouldBeAnInstanceOf(ProductAttributeValueInterface::class);
    }
}
