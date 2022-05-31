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
use BitBag\SyliusMultiVendorMarketplacePlugin\Entity\ProductListing\ProductListing;
use BitBag\SyliusMultiVendorMarketplacePlugin\Entity\ProductListing\ProductListingInterface;
use Doctrine\Common\DataFixtures\Purger\ORMPurger;
use Doctrine\ORM\EntityManagerInterface;
use Sylius\Bundle\CoreBundle\Fixture\Factory\AdminUserExampleFactory;
use Sylius\Bundle\CoreBundle\Fixture\Factory\ShopUserExampleFactory;
use function PHPUnit\Framework\assertEquals;
use function PHPUnit\Framework\assertNotEmpty;
use function PHPUnit\Framework\assertNotNull;

final class ProductListingContext extends RawMinkContext implements Context
{
    private EntityManagerInterface $entityManager;
    private ShopUserExampleFactory $shopUserExampleFactory;


    public function __construct(
        EntityManagerInterface $entityManager,
        ShopUserExampleFactory $shopUserExampleFactory
    ) {
        $this->entityManager = $entityManager;
        $this->shopUserExampleFactory = $shopUserExampleFactory;
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
    public function thereIsAnAdminUserWithPassword($username, $password)
    {
        $user = $this->shopUserExampleFactory->create();
        $user->setUsername($username);
        $user->setPlainPassword($password);
        $user->setEmail('vendor@email.com');
        $this->entityManager->persist($user);
        $this->entityManager->flush();
    }

    /**
     * @Given I am logged in as an vendor
     */
    public function iAmLoggedInAsAnAdmin()
    {
        $this->visitPath('/en_US/login');
        var_dump($this->getPage()->getText());
        $this->getPage()->fillField('Username', 'vendor@email.com');
        $this->getPage()->fillField('Password', 'vendor');
        $this->getPage()->pressButton('Login');
        assertNotNull($this->getPage()->findLink('Logout'));
    }

    /**
     * @Given there is/are :count product listing(s)
     */
    public function thereAreProductListings($count)
    {
        for ($i = 0; $i < $count; ++$i) {
            $productListing = new ProductListing();
            $productListing->setCode('product listing ' . $i);
            $productListing->setStatus(ProductListingInterface::STATUS_UNDER_VERIFICATION);
            $productListing->setCode('code' . $i);
            $productListing->setVersionNumber(0);
            $productListing->setLocale('en_US');
            $productListing->setSlug('product-listing-' . $i);
            $this->entityManager->persist($productListing);
        }
        $this->entityManager->flush();
    }

    /**
     * @Given I should see product's listing status :status
     */
    public function iShouldSeeProductsListingStatus($status)
    {
        $productListingStatus = $this->getPage()->find('css', sprintf('table > tbody > tr > td:contains("%s")', $status));
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
