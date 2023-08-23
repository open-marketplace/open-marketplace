<?php

/*
 * This file has been created by developers from BitBag.
 * Feel free to contact us once you face any issues or want to start
 * You can find more information about us on https://bitbag.io and write us
 * an email on hello@bitbag.io.
 */

declare(strict_types=1);

namespace spec\BitBag\OpenMarketplace\Component\Core\Common\Resolver;

use BitBag\OpenMarketplace\Component\Core\Common\Resolver\CurrentUserResolver;
use BitBag\OpenMarketplace\Component\Core\Common\Resolver\CurrentUserResolverInterface;
use PhpSpec\ObjectBehavior;
use Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorageInterface;
use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;
use Symfony\Component\Security\Core\User\UserInterface;

final class CurrentUserResolverSpec extends ObjectBehavior
{
    public function let(
        TokenStorageInterface $tokenStorage
    ): void {
        $this->beConstructedWith($tokenStorage);
    }

    public function it_is_initializable(): void
    {
        $this->shouldHaveType(CurrentUserResolver::class);
        $this->shouldImplement(CurrentUserResolverInterface::class);
    }

    public function it_returns_current_user(
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

    public function it_returns_null_when_didnt_find_current_user(
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
