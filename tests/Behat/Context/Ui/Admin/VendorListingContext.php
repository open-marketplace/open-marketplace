<?php

declare(strict_types=1);

namespace Tests\BitBag\SyliusMultiVendorMarketplacePlugin\Behat\Context\Ui\Admin;

use Behat\Behat\Context\Context;
use Behat\Mink\Element\DocumentElement;
use Behat\MinkExtension\Context\RawMinkContext;
use BitBag\SyliusMultiVendorMarketplacePlugin\Entity\Vendor;
use Doctrine\Common\DataFixtures\Purger\ORMPurger;
use Doctrine\ORM\EntityManagerInterface;
use Sylius\Bundle\CoreBundle\Fixture\Factory\AdminUserExampleFactory;
use function PHPUnit\Framework\assertEquals;
use function PHPUnit\Framework\assertNotEmpty;

final class VendorListingContext extends RawMinkContext implements Context
{
    private EntityManagerInterface $entityManager;
    private AdminUserExampleFactory $adminUserExample;

    public function __construct(
        EntityManagerInterface $entityManager,
        AdminUserExampleFactory $adminUserExample
    )
    {
        $this->entityManager = $entityManager;
        $this->adminUserExample = $adminUserExample;
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
        $admin = $this->adminUserExample->create();
        $admin->setUsername($username);
        $admin->setPlainPassword($password);
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
     * @Given There are :count vendors
     */
    public function thereAreVendors($count)
    {
        for ($i=0; $i<$count; $i++) {
            $vendor = new Vendor();
            $vendor->setCompanyName('vendor ' . $i);
            $vendor->setTaxIdentifier('vendorTax' . $i);
            $vendor->setPhoneNumber('vendorPhone' . $i);
            $this->entityManager->persist($vendor);
        }
        $this->entityManager->flush();
    }

    /**
     * @Then I should see :count vendor rows
     */
    public function iShouldSeeVendorRows($count)
    {
        $rows = $this->getPage()->findAll('css', 'table > tbody > tr');
        assertNotEmpty($rows, 'Could not find any rows');
        assertEquals($count, count($rows), 'Rows numbers are not equal');
    }

    /**
     * @return DocumentElement
     */
    private function getPage()
    {
        return $this->getSession()->getPage();
    }
}
