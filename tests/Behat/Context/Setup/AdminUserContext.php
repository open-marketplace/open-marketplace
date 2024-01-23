<?php

declare(strict_types=1);

/*
 * This file has been created by developers from BitBag.
 * Feel free to contact us once you face any issues or want to start
 * You can find more information about us on https://bitbag.io and write us
 * an email on hello@bitbag.io.
 */

namespace Tests\BitBag\OpenMarketplace\Behat\Context\Setup;

use Behat\Behat\Context\Context;
use Doctrine\ORM\EntityManagerInterface;
use Sylius\Bundle\CoreBundle\Fixture\Factory\AdminUserExampleFactory;

final class AdminUserContext implements Context
{
    public function __construct(
        private EntityManagerInterface $entityManager,
        private AdminUserExampleFactory $adminUserExample,
    ) {
    }

    /**
     * @Given There is an admin user :username with password :password
     */
    public function thereIsAnAdminUserWithPassword($username, $password): void
    {
        $admin = $this->adminUserExample->create();
        $admin->setUsername($username);
        $admin->setPlainPassword($password);
        $this->entityManager->persist($admin);
        $this->entityManager->flush();
    }
}
