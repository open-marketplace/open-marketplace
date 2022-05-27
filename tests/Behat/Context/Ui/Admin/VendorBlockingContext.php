<?php

declare(strict_types=1);

namespace Tests\BitBag\SyliusMultiVendorMarketplacePlugin\Behat\Context\Ui\Admin;

use Behat\Behat\Context\Context;
use Behat\Mink\Element\DocumentElement;
use Behat\MinkExtension\Context\RawMinkContext;
use BitBag\SyliusMultiVendorMarketplacePlugin\Entity\Vendor;
use Doctrine\Common\DataFixtures\Purger\ORMPurger;
use Doctrine\ORM\EntityManagerInterface;
use Exception;
use Sylius\Bundle\CoreBundle\Fixture\Factory\AdminUserExampleFactory;

final class VendorBlockingContext extends RawMinkContext implements Context
{
    private AdminUserExampleFactory $adminUserExample;
    private EntityManagerInterface $entityManager;

    public function __construct(
        AdminUserExampleFactory $adminUserExample,
        EntityManagerInterface $entityManager
    ){

        $this->adminUserExample = $adminUserExample;
        $this->entityManager = $entityManager;
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
     * @Given There is an unblocked vendor
     */
    public function thereIsAnUnblockedVendor()
    {
        $vendor = new Vendor();
        $vendor->setCompanyName('vendor');
        $vendor->setTaxIdentifier('vendorTax');
        $vendor->setPhoneNumber('vendorPhone');
        $vendor->setBlocked('unblocked');
        $this->entityManager->persist($vendor);
        $this->entityManager->flush();
    }

    /**
     * @Given There is a blocked vendor
     */
    public function thereIsABlockedVendor()
    {
        $vendor = new Vendor();
        $vendor->setCompanyName('vendor');
        $vendor->setTaxIdentifier('vendorTax');
        $vendor->setPhoneNumber('vendorPhone');
        $vendor->setBlocked('blocked');
        $this->entityManager->persist($vendor);
        $this->entityManager->flush();
    }

    /**
     * @When I click :buttonText
     */
    public function iClick($buttonText)
    {
        $this->getPage()->pressButton($buttonText);
    }

    /**
     * @When I choose :element
     */
//    public function iChoose($element)
//    {
//        if ($buttonText == 'yes'){
//        $button = $this->getPage()->find('css', $element);
//        } else {
//            $button = $this->getPage()->find('css', '.button .red');
//        }
//        $button->click();
//    }

    public function iChoose($element)
    {
        $page = $this->getSession()->getPage();
        $findName = $page->find("css", $element);
        if (!$findName) {
            throw new Exception($element . " could not be found");
        } else {
            $findName->click();
        }
    }

    /**
     * @return DocumentElement
     */
    private function getPage()
    {
        return $this->getSession()->getPage();
    }

}
