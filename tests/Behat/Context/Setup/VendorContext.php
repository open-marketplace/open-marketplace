<?php

/*
 * This file has been created by developers from BitBag.
 * Feel free to contact us once you face any issues or want to start
 * You can find more information about us on https://bitbag.io and write us
 * an email on hello@bitbag.io.
 */

declare(strict_types=1);

namespace Tests\BitBag\SyliusMultiVendorMarketplacePlugin\Behat\Context\Setup;

use Behat\Behat\Context\Context;
use BitBag\SyliusMultiVendorMarketplacePlugin\Entity\ShopUserInterface;
use BitBag\SyliusMultiVendorMarketplacePlugin\Entity\Vendor;
use Doctrine\ORM\EntityManagerInterface;
use Sylius\Behat\Service\SharedStorageInterface;
use Sylius\Bundle\CoreBundle\Fixture\Factory\ShopUserExampleFactory;
use Sylius\Component\Resource\Factory\FactoryInterface;

final class VendorContext implements Context
{
    private ShopUserExampleFactory $shopUserExampleFactory;

    private FactoryInterface $vendorFactory;

    private EntityManagerInterface $entityManager;

    private SharedStorageInterface $sharedStorage;

    public function __construct(
        ShopUserExampleFactory $shopUserExampleFactory,
        FactoryInterface $vendorFactory,
        EntityManagerInterface $entityManager,
        SharedStorageInterface $sharedStorage
    ) {
        $this->shopUserExampleFactory = $shopUserExampleFactory;
        $this->vendorFactory = $vendorFactory;
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

        /** @var Vendor $vendor */
        $vendor = $this->vendorFactory->createNew();
        $vendor->setCompanyName('vendor');
        $vendor->setShopUser($user);
        $vendor->setSlug('vendor-slug');
        $vendor->setDescription('description');
        $vendor->setPhoneNumber('987654321');
        $vendor->setTaxIdentifier('123456789');
        $this->entityManager->persist($vendor);

        $this->entityManager->flush();

        $this->sharedStorage->set('vendor', $vendor);
    }
}
