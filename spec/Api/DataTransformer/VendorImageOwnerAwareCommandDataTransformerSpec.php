<?php

/*
 * This file has been created by developers from BitBag.
 * Feel free to contact us once you face any issues or want to start
 * You can find more information about us on https://bitbag.io and write us
 * an email on hello@bitbag.io.
 */

declare(strict_types=1);

namespace spec\BitBag\OpenMarketplace\Api\DataTransformer;

use BitBag\OpenMarketplace\Api\DataTransformer\VendorImageOwnerAwareCommandDataTransformer;
use BitBag\OpenMarketplace\Api\Messenger\Command\Vendor\VendorImageOwnerAwareInterface;
use PhpSpec\ObjectBehavior;
use Sylius\Bundle\ApiBundle\Context\UserContextInterface;

final class VendorImageOwnerAwareCommandDataTransformerSpec extends ObjectBehavior
{
    public function let(
        UserContextInterface $userContext
    ): void {
        $this->beConstructedWith($userContext);
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(VendorImageOwnerAwareCommandDataTransformer::class);
    }

    public function is_supports_shop_user_aware_interface(
        VendorImageOwnerAwareInterface $ownerAware
    ): void {
        $this->supportsTransformation($ownerAware)->shouldReturn(true);
    }
}
