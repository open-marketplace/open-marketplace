<?php

/*
 * This file has been created by developers from BitBag.
 * Feel free to contact us once you face any issues or want to start
 * You can find more information about us on https://bitbag.io and write us
 * an email on hello@bitbag.io.
 */

declare(strict_types=1);

namespace spec\BitBag\OpenMarketplace\Api\EventSubscriber;

use BitBag\OpenMarketplace\Api\EventSubscriber\VendorSlugEventSubscriber;
use PhpSpec\ObjectBehavior;

class VendorSlugEventSubscriberSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType(VendorSlugEventSubscriber::class);
    }
}
