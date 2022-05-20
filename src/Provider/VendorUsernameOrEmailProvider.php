<?php

declare(strict_types=1);

namespace BitBag\SyliusMultiVendorMarketplacePlugin\Provider;

use Sylius\Bundle\UserBundle\Provider\AbstractUserProvider;
use Symfony\Component\Security\Core\User\UserInterface;

final class VendorUsernameOrEmailProvider extends AbstractUserProvider
{
    protected function findUser(string $usernameOrEmail): ?UserInterface
    {
        if (filter_var($usernameOrEmail, \FILTER_VALIDATE_EMAIL)) {
            return $this->userRepository->findOneByEmail($usernameOrEmail);
        }

        return $this->userRepository->findOneBy(['usernameCanonical' => $usernameOrEmail]);
    }
}
