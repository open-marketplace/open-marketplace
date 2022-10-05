<?php

/*
 * This file has been created by developers from BitBag.
 * Feel free to contact us once you face any issues or want to start
 * You can find more information about us on https://bitbag.io and write us
 * an email on hello@bitbag.io.
 */

declare(strict_types=1);

namespace spec\BitBag\OpenMarketplace\Factory;

use BitBag\OpenMarketplace\Entity\ProductListing\ProductDraftImageInterface;
use BitBag\OpenMarketplace\Factory\ProductDraftImageFactory;
use PhpSpec\ObjectBehavior;

final class ProductDraftImageFactorySpec extends ObjectBehavior
{
    public function it_is_initializable(): void
    {
        $this->shouldHaveType(ProductDraftImageFactory::class);
    }

    public function it_creates_valid_image(): void
    {
        $image = $this->createNew();
        $image->shouldBeAnInstanceOf(ProductDraftImageInterface::class);
    }
}
