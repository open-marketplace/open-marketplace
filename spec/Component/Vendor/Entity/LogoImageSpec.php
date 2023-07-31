<?php

/*
 * This file has been created by developers from BitBag.
 * Feel free to contact us once you face any issues or want to start
 * You can find more information about us on https://bitbag.io and write us
 * an email on hello@bitbag.io.
 */

declare(strict_types=1);

namespace spec\BitBag\OpenMarketplace\Component\Vendor\Entity;

use BitBag\OpenMarketplace\Component\Vendor\Entity\LogoImage;
use BitBag\OpenMarketplace\Component\Vendor\Entity\LogoImageInterface;
use BitBag\OpenMarketplace\Component\Vendor\Entity\VendorInterface;
use PhpSpec\ObjectBehavior;

final class LogoImageSpec extends ObjectBehavior
{
    public function it_is_initializable(): void
    {
        $this->shouldHaveType(LogoImage::class);
    }

    public function it_should_implement_interface(): void
    {
        $this->shouldImplement(LogoImageInterface::class);
    }

    public function it_gets_path(): void
    {
        $this->setPath('test');

        $this->getPath()->shouldReturn('test');
    }

    public function it_gets_vendor(VendorInterface $vendor): void
    {
        $this->setOwner($vendor);

        $this->getOwner()->shouldReturn($vendor);
    }
}
