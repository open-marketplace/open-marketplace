<?php

/*
 * This file has been created by developers from BitBag.
 * Feel free to contact us once you face any issues or want to start
 * You can find more information about us on https://bitbag.io and write us
 * an email on hello@bitbag.io.
 */

declare(strict_types=1);

namespace spec\BitBag\OpenMarketplace\Component\Core\Api\Validator;

use BitBag\OpenMarketplace\Component\Core\Api\Validator\UniqueShopUserVendor;
use BitBag\OpenMarketplace\Component\Core\Api\Validator\UniqueShopUserVendorValidator;
use BitBag\OpenMarketplace\Component\Vendor\Entity\ShopUserInterface;
use BitBag\OpenMarketplace\Component\Vendor\Entity\VendorInterface;
use PhpSpec\ObjectBehavior;
use Sylius\Bundle\ApiBundle\Context\UserContextInterface;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Validator\Constraint;
use Symfony\Component\Validator\ConstraintValidatorInterface;
use Symfony\Component\Validator\Context\ExecutionContextInterface;

final class UniqueShopUserVendorValidatorSpec extends ObjectBehavior
{
    public function let(UserContextInterface $userContext): void
    {
        $this->beConstructedWith($userContext);
    }

    public function it_is_initializable(): void
    {
        $this->shouldHaveType(UniqueShopUserVendorValidator::class);
        $this->shouldImplement(ConstraintValidatorInterface::class);
    }

    public function it_throws_an_exception_on_wrong_constraint(
        Constraint $constraint
    ): void {
        $this
            ->shouldThrow(\InvalidArgumentException::class)
            ->during('validate', ['', $constraint])
        ;
    }

    public function it_throws_an_exception_current_user_is_not_shop_user(
        UserContextInterface $userContext,
        UserInterface $user
    ): void {
        $constraint = new UniqueShopUserVendor();

        $userContext->getUser()->willReturn($user);

        $this
            ->shouldThrow(\InvalidArgumentException::class)
            ->during('validate', ['', $constraint])
        ;
    }

    public function it_adds_violation_if_shop_user_has_vendor_context(
        UserContextInterface $userContext,
        ShopUserInterface $shopUser,
        VendorInterface $vendor,
        ExecutionContextInterface $executionContext
    ): void {
        $constraint = new UniqueShopUserVendor();

        $this->initialize($executionContext);

        $shopUser->getVendor()->willReturn($vendor);
        $userContext->getUser()->willReturn($shopUser);

        $executionContext
            ->addViolation(
                $constraint->message
            )
            ->shouldBeCalled()
        ;

        $this->validate('', $constraint);
    }

    public function it_does_nothing_if_shop_user_has_not_vendor_context(
        UserContextInterface $userContext,
        ShopUserInterface $shopUser,
        ExecutionContextInterface $executionContext
    ): void {
        $constraint = new UniqueShopUserVendor();

        $this->initialize($executionContext);

        $userContext->getUser()->willReturn($shopUser);

        $executionContext
            ->addViolation(
                $constraint->message
            )
            ->shouldNotBeCalled()
        ;

        $this->validate('', $constraint);
    }
}
