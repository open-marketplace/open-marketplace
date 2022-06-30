<?php

/*
 * This file has been created by developers from BitBag.
 * Feel free to contact us once you face any issues or want to start
 * You can find more information about us on https://bitbag.io and write us
 * an email on hello@bitbag.io.
 */

declare(strict_types=1);

namespace Tests\BitBag\SyliusMultiVendorMarketplacePlugin\Behat\Context\Ui\Vendor;

use Behat\Behat\Context\Context;
use Behat\Mink\Element\DocumentElement;
use Behat\MinkExtension\Context\RawMinkContext;
use BitBag\SyliusMultiVendorMarketplacePlugin\Entity\ShopUserInterface;
use BitBag\SyliusMultiVendorMarketplacePlugin\Entity\Vendor;
use Doctrine\Common\DataFixtures\Purger\ORMPurger;
use Doctrine\ORM\EntityManagerInterface;
use function PHPUnit\Framework\assertNotNull;
use Sylius\Bundle\CoreBundle\Fixture\Factory\ChannelExampleFactory;
use Sylius\Bundle\CoreBundle\Fixture\Factory\ShopUserExampleFactory;
use Sylius\Component\Resource\Factory\FactoryInterface;

final class ProductListingContext extends RawMinkContext implements Context
{
    private EntityManagerInterface $entityManager;

    private ShopUserExampleFactory $shopUserExampleFactory;

    private ChannelExampleFactory $channelExampleFactory;

    private FactoryInterface $vendorFactory;

    public function __construct(
        EntityManagerInterface $entityManager,
        ShopUserExampleFactory $shopUserExampleFactory,
        ChannelExampleFactory $channelExampleFactory,
        FactoryInterface $vendorFactory
    ) {
        $this->entityManager = $entityManager;
        $this->shopUserExampleFactory = $shopUserExampleFactory;
        $this->channelExampleFactory = $channelExampleFactory;
        $this->vendorFactory = $vendorFactory;
    }

    /**
     * @BeforeScenario
     */
    public function clearData()
    {
        $purger = new ORMPurger($this->entityManager);
        $purger->purge();
    }

    /**
     * @Given there is an vendor user :username with password :password
     */
    public function thereIsAnVendorUserWithPassword($username, $password)
    {
        /** @var ShopUserInterface $user */
        $user = $this->shopUserExampleFactory->create();
        $user->setUsername($username);
        $user->setPlainPassword($password);
        $user->setEmail('vendor@email.com');
        $this->entityManager->persist($user);

        /** @var Vendor $vendor */
        $vendor = $this->vendorFactory->createNew();
        $vendor->setCompanyName('vendor');
        $vendor->setShopUser($user);
        $vendor->setPhoneNumber('987654321');
        $vendor->setTaxIdentifier('123456789');
        $this->entityManager->persist($vendor);

        $this->entityManager->flush();
    }

    /**
     * @Given I should see product's listing status :status
     */
    public function iShouldSeeProductsListingStatus($status)
    {
        $productListingStatus = $this->getPage()->find('css', sprintf('#details > div > table > tbody > tr > td:contains("%s")', $status));
        assertNotNull($productListingStatus);
    }

    /**
     * @Given I click :button button
     */
    public function iClickButton($button)
    {
        $this->getPage()->pressButton($button);
    }

    /**
     * @return DocumentElement
     */
    private function getPage()
    {
        return $this->getSession()->getPage();
    }
}
