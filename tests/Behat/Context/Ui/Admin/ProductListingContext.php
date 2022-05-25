<?php

/*
 * This file has been created by developers from BitBag.
 * Feel free to contact us once you face any issues or want to start
 * You can find more information about us on https://bitbag.io and write us
 * an email on hello@bitbag.io.
 */

declare(strict_types=1);

namespace Tests\BitBag\SyliusMultiVendorMarketplacePlugin\Behat\Context\Ui\Admin;

use Behat\Behat\Context\Context;
use Behat\Mink\Element\DocumentElement;
use Behat\MinkExtension\Context\RawMinkContext;
use BitBag\SyliusMultiVendorMarketplacePlugin\Entity\ProductListing;
use BitBag\SyliusMultiVendorMarketplacePlugin\Entity\ProductListingInterface;
use Doctrine\Common\DataFixtures\Purger\ORMPurger;
use Doctrine\ORM\EntityManagerInterface;
use function PHPUnit\Framework\assertEquals;
use function PHPUnit\Framework\assertNotEmpty;
use Sylius\Bundle\CoreBundle\Fixture\Factory\AdminUserExampleFactory;

final class ProductListingContext extends RawMinkContext implements Context
{
    private EntityManagerInterface $entityManager;

    private AdminUserExampleFactory $adminUserExampleFactory;

    public function __construct(
        EntityManagerInterface $entityManager,
        AdminUserExampleFactory $adminUserExampleFactory
    ) {
        $this->entityManager = $entityManager;
        $this->adminUserExampleFactory = $adminUserExampleFactory;
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
     * @Given there is an admin user :username with password :password
     */
    public function thereIsAnAdminUserWithPassword($username, $password)
    {
        $admin = $this->adminUserExampleFactory->create();
        $admin->setUsername($username);
        $admin->setPlainPassword($password);
        $admin->setEmail('admin@email.com');
        $this->entityManager->persist($admin);
        $this->entityManager->flush();
    }

    /**
     * @Given I am logged in as an admin
     */
    public function iAmLoggedInAsAnAdmin()
    {
        $this->visitPath('/admin/login');
        $this->getPage()->fillField('Username', 'admin');
        $this->getPage()->fillField('Password', 'admin');
        $this->getPage()->pressButton('Login');
    }

    /**
     * @Given there is/are :count product listing(s)
     */
    public function thereAreProductListings($count)
    {
        for ($i = 0; $i < $count; ++$i) {
            $productListing = new ProductListing();
            $productListing->setName('product listing ' . $i);
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
     * @Then I should see :count product listing(s)
     */
    public function iShouldSeeProductListings($count)
    {
        $rows = $this->getPage()->findAll('css', 'table > tbody > tr');
        assertNotEmpty($rows, 'Could not find any rows');
        assertEquals($count, count($rows), 'Rows numbers are not equal');
    }

    /**
     * @Then I should see url :url
     */
    public function iShouldSeeUrl($url)
    {
        $currentUrl = $this->getSession()->getCurrentUrl();
        $matches = preg_match($url, $currentUrl);
        assertEquals(1, $matches);
    }

    /**
     * @return DocumentElement
     */
    private function getPage()
    {
        return $this->getSession()->getPage();
    }
}
