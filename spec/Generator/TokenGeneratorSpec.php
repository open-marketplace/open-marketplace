<?php

/*
 * This file has been created by developers from BitBag.
 * Feel free to contact us once you face any issues or want to start
 * You can find more information about us on https://bitbag.io and write us
 * an email on hello@bitbag.io.
 */

declare(strict_types=1);

namespace spec\BitBag\SyliusMultiVendorMarketplacePlugin\Generator;

use BitBag\SyliusMultiVendorMarketplacePlugin\Generator\TokenGenerator;
use PhpSpec\ObjectBehavior;

class TokenGeneratorSpec extends ObjectBehavior
{
    public function it_is_initializable(): void
    {
        $this->shouldHaveType(TokenGenerator::class);
    }

    public function it_generates_random_tokens(): void
    {
        $token1 = $this->generate();
        $token2 = $this->generate();
        $token1->shouldBeString();
        $token2->shouldBeString();
        $token1->shouldNotBeEqualTo($token2);
    }
}
