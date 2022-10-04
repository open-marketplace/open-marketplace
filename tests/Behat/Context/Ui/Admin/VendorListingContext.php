<?php

/*
 * This file has been created by developers from BitBag.
 * Feel free to contact us once you face any issues or want to start
 * You can find more information about us on https://bitbag.io and write us
 * an email on hello@bitbag.io.
 */

declare(strict_types=1);

namespace Tests\BitBag\OpenMarketplace\Behat\Context\Ui\Admin;

use Behat\Behat\Context\Context;
use Behat\Mink\Element\DocumentElement;
use Behat\MinkExtension\Context\RawMinkContext;
use BitBag\OpenMarketplace\Entity\Vendor;
use Doctrine\ORM\EntityManagerInterface;
use Sylius\Bundle\CoreBundle\Fixture\Factory\AdminUserExampleFactory;
use Webmozart\Assert\Assert;

final class VendorListingContext extends RawMinkContext implements Context
{
    private EntityManagerInterface $entityManager;

    private AdminUserExampleFactory $adminUserExample;

    public function __construct(
        EntityManagerInterface $entityManager,
        AdminUserExampleFactory $adminUserExample
    ) {
        $this->entityManager = $entityManager;
        $this->adminUserExample = $adminUserExample;
    }

    /**
     * @Given There is an admin user :username with password :password
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
     * @Given There are :count vendors listed
     */
    public function thereAreVendors($count)
    {
        for ($i = 0; $i < $count; ++$i) {
            $vendor = new Vendor();
            $vendor->setCompanyName('vendor ' . $i);
            $vendor->setTaxIdentifier('vendorTax' . $i);
            $vendor->setPhoneNumber('vendorPhone' . $i);
            $vendor->setSlug('vendor-' . $i);
            $vendor->setDescription('description');
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
        Assert::notEmpty($rows, 'Could not find any rows');
        Assert::eq($count, count($rows), 'Rows numbers are not equal');
    }

    /**
     * @return DocumentElement
     */
    private function getPage()
    {
        return $this->getSession()->getPage();
    }
}
