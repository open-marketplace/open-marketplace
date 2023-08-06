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
use BitBag\OpenMarketplace\Component\Vendor\Entity\ShopUserInterface;
use BitBag\OpenMarketplace\Component\Vendor\Entity\VendorInterface;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use Sylius\Bundle\ApiBundle\Context\UserContextInterface;
use Sylius\Component\User\Model\UserInterface;

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

    public function it_supports_shop_user_aware_interface(
        VendorImageOwnerAwareInterface $ownerAware
    ): void {
        $this->supportsTransformation($ownerAware)->shouldReturn(true);
    }

    public function it_does_nothing_when_owner_already_exist(
        VendorImageOwnerAwareInterface $ownerAware,
        UserContextInterface $userContext,
        VendorInterface $vendor,
        UserInterface $user,
        ): void {
        $ownerAware->getOwner()->willReturn($vendor);

        $ownerAware->setOwner(Argument::any())->shouldNotBeCalled();

        $this->transform($ownerAware, '');
    }

    public function it_does_nothing_when_there_is_no_shop_user_context(
        VendorImageOwnerAwareInterface $ownerAware,
        UserContextInterface $userContext,
        UserInterface $user
    ): void {
        $userContext->getUser()->willReturn($user);
        $ownerAware->getOwner()->willReturn(null);

        $ownerAware->setOwner(Argument::any())->shouldNotBeCalled();

        $this->transform($ownerAware, '');
    }

    public function it_sets_owner_when_there_is_shop_user_context(
        VendorImageOwnerAwareInterface $ownerAware,
        UserContextInterface $userContext,
        ShopUserInterface $user,
        VendorInterface $vendor
    ): void {
        $user->getVendor()->willReturn($vendor);
        $userContext->getUser()->willReturn($user);
        $ownerAware->getOwner()->willReturn(null);

        $ownerAware->setOwner($vendor)->shouldBeCalled();

        $this->transform($ownerAware, '');
    }
}
