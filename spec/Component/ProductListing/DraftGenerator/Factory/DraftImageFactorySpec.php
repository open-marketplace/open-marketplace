<?php

/*
 * This file has been created by developers from BitBag.
 * Feel free to contact us once you face any issues or want to start
 * You can find more information about us on https://bitbag.io and write us
 * an email on hello@bitbag.io.
 */

declare(strict_types=1);

namespace spec\BitBag\OpenMarketplace\Component\ProductListing\DraftGenerator\Factory;

use BitBag\OpenMarketplace\Component\ProductListing\DraftGenerator\Factory\DraftImageFactory;
use BitBag\OpenMarketplace\Component\ProductListing\Entity\DraftImageInterface;
use PhpSpec\ObjectBehavior;

final class DraftImageFactorySpec extends ObjectBehavior
{
    public function it_is_initializable(): void
    {
        $this->shouldHaveType(DraftImageFactory::class);
    }

    public function it_creates_valid_image(): void
    {
        $image = $this->createNew();
        $image->shouldBeAnInstanceOf(DraftImageInterface::class);
    }
}
