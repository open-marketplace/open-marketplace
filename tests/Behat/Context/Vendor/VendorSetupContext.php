<?php

/*
 * This file has been created by developers from BitBag.
 * Feel free to contact us once you face any issues or want to start
 * You can find more information about us on https://bitbag.io and write us
 * an email on hello@bitbag.io.
 */

declare(strict_types=1);

namespace Tests\BitBag\OpenMarketplace\Behat\Context\Vendor;

use Behat\Behat\Context\Context;
use Doctrine\Persistence\ObjectManager;
use Sylius\Behat\Service\SharedStorageInterface;
use Sylius\Bundle\CoreBundle\Fixture\Factory\ExampleFactoryInterface;
use Sylius\Component\User\Repository\UserRepositoryInterface;

class VendorSetupContext implements Context
{
    private SharedStorageInterface $sharedStorage;

    private UserRepositoryInterface $userRepository;

    private ExampleFactoryInterface $userFactory;

    private ObjectManager $manager;

    public function __construct(
        SharedStorageInterface $sharedStorage,
        UserRepositoryInterface $userRepository,
        ExampleFactoryInterface $userFactory,
        ObjectManager $manager
    ) {
        $this->sharedStorage = $sharedStorage;
        $this->userRepository = $userRepository;
        $this->userFactory = $userFactory;
        $this->manager = $manager;
    }

    /**
     * @Given vendor company name is :companyName
     */
    public function vendorCompanyName($companyName): void
    {
        $vendor = $this->sharedStorage->get('vendor');
        $vendor->setCompanyName($companyName);
    }
}
