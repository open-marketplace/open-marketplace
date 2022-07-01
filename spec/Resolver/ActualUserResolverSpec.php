<?php

/*
 * This file has been created by developers from BitBag.
 * Feel free to contact us once you face any issues or want to start
 * You can find more information about us on https://bitbag.io and write us
 * an email on hello@bitbag.io.
 */

declare(strict_types=1);

namespace spec\BitBag\SyliusMultiVendorMarketplacePlugin\Resolver;

use BitBag\SyliusMultiVendorMarketplacePlugin\Resolver\CurrentUserResolver;
use BitBag\SyliusMultiVendorMarketplacePlugin\Resolver\CurrentUserResolverInterface;
use PhpSpec\ObjectBehavior;
use Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorageInterface;
use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;
use Symfony\Component\Security\Core\User\UserInterface;

final class ActualUserResolverSpec extends ObjectBehavior
{
    function let(
        TokenStorageInterface $tokenStorage
    ): void {
        $this->beConstructedWith($tokenStorage);
    }

    function it_is_initializable(): void
    {
        $this->shouldHaveType(CurrentUserResolver::class);
        $this->shouldImplement(CurrentUserResolverInterface::class);
    }

    function it_returns_current_user(
        TokenStorageInterface $tokenStorage,
        UserInterface $user,
        TokenInterface $token
    ): void {
        $tokenStorage->getToken()
            ->willReturn($token);

        $token->getUser()
            ->willReturn($user);

        $this->resolve()
            ->shouldReturn($user);
    }

    function it_returns_null_if_not_find_actual_user(
        TokenStorageInterface $tokenStorage,
        TokenInterface $token
    ): void {
        $tokenStorage->getToken()
            ->willReturn($token);

        $token->getUser()
            ->willReturn(null);

        $this->resolve()
            ->shouldReturn(null);
    }
}
