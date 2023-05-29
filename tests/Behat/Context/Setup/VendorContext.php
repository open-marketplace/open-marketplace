<?php

/*
 * This file has been created by developers from BitBag.
 * Feel free to contact us once you face any issues or want to start
 * You can find more information about us on https://bitbag.io and write us
 * an email on hello@bitbag.io.
 */

declare(strict_types=1);

namespace Tests\BitBag\OpenMarketplace\Behat\Context\Setup;

use Behat\Behat\Context\Context;
use BitBag\OpenMarketplace\Entity\ShopUserInterface;
use BitBag\OpenMarketplace\Entity\Vendor;
use Doctrine\ORM\EntityManagerInterface;
use Sylius\Behat\Service\SharedStorageInterface;
use Sylius\Bundle\CoreBundle\Fixture\Factory\ExampleFactoryInterface;
use Sylius\Bundle\CoreBundle\Fixture\Factory\ShopUserExampleFactory;

final class VendorContext implements Context
{
    private ShopUserExampleFactory $shopUserExampleFactory;

    private ExampleFactoryInterface $vendorExampleFactory;

    private EntityManagerInterface $entityManager;

    private SharedStorageInterface $sharedStorage;

    public function __construct(
        ShopUserExampleFactory $shopUserExampleFactory,
        ExampleFactoryInterface $vendorExampleFactory,
        EntityManagerInterface $entityManager,
        SharedStorageInterface $sharedStorage
    ) {
        $this->shopUserExampleFactory = $shopUserExampleFactory;
        $this->vendorExampleFactory = $vendorExampleFactory;
        $this->entityManager = $entityManager;
        $this->sharedStorage = $sharedStorage;
    }

    /**
     * @Given there is an vendor user :username with password :password
     */
    public function thereIsAnVendorUserWithPassword(string $username, string $password)
    {
        /** @var ShopUserInterface $user */
        $user = $this->shopUserExampleFactory->create();
        $user->setUsername($username);
        $user->setPlainPassword($password);
        $user->setEmail($username . '@email.com');
        $this->entityManager->persist($user);

        $options = [
            'company_name' => 'vendor',
            'phone_number' => '987654321',
            'tax_identifier' => '123456789',
            'slug' => 'vendor-slug',
            'description' => 'description',
        ];

        /** @var Vendor $vendor */
        $vendor = $this->vendorExampleFactory->create($options);

        $vendor->setShopUser($user);
        $this->entityManager->persist($vendor);

        $this->entityManager->flush();

        $this->sharedStorage->set('vendor', $vendor);
    }
}
