<?php

namespace Tests\BitBag\SyliusMultiVendorMarketplacePlugin\Behat\Context\Admin;

use Behat\Behat\Context\Context;
use Behat\Mink\Element\DocumentElement;
use Behat\MinkExtension\Context\RawMinkContext;
use BitBag\SyliusMultiVendorMarketplacePlugin\Fixture\Factory\ShopUserExampleFactory;
use BitBag\SyliusMultiVendorMarketplacePlugin\Fixture\Factory\VendorExampleFactory;
use Doctrine\Common\DataFixtures\Purger\ORMPurger;
use Doctrine\ORM\EntityManagerInterface;
use Sylius\Bundle\CoreBundle\Fixture\Factory\AdminUserExampleFactory;

class StarConversationContext extends RawMinkContext implements Context
{

    private EntityManagerInterface $entityManager;
    private AdminUserExampleFactory $adminUserExampleFactory;
    private ShopUserExampleFactory $shopUserExampleFactory;
    private VendorExampleFactory $vendorExampleFactory;

    public function __construct(
        EntityManagerInterface  $entityManager,
        AdminUserExampleFactory $adminUserExampleFactory,
        ShopUserExampleFactory  $shopUserExampleFactory,
        VendorExampleFactory    $vendorExampleFactory
    )
    {
        $this->entityManager = $entityManager;
        $this->adminUserExampleFactory = $adminUserExampleFactory;
        $this->shopUserExampleFactory = $shopUserExampleFactory;
        $this->vendorExampleFactory = $vendorExampleFactory;
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
     * @Given there is an admin userName :userName with password :password
     */
    public function thereIsAnAdminUserNameWithPassword($username, $password)
    {
        $user = $this->adminUserExampleFactory->create();
        $user->setUsername($username);
        $user->setPlainPassword($password);
        $user->setEmail('admin@email.com');

        $this->entityManager->persist($user);
        $this->entityManager->flush();
    }

    /**
     * @Given there is an vendor userName :arg1 with password :arg2
     */
    public function thereIsAnVendorUsernameWithPassword2($arg1, $arg2)
    {
        $user = $this->shopUserExampleFactory->create();
        $user->setUsername($arg1);
        $user->setPlainPassword($arg2);
        $user->setEmail('vendor@email.com');

        $vendor = $this->vendorExampleFactory->create();
        $vendor->setCustomer($user->getCustomer());

        $this->entityManager->persist($vendor);
        $this->entityManager->persist($user);
        $this->entityManager->flush();
    }


    /**
     * @When I press in menu :arg1
     */
    public function iPressInMenu($arg1)
    {
        $this->getPage()->pressButton(" 
    $arg1
");

    }

    /**
     * @Then I select :arg1 variant
     */
    public function iSelectVariant($arg1)
    {
        throw new PendingException();
    }


    /**
     * @return DocumentElement
     */
    private function getPage()
    {
        return $this->getSession()->getPage();
    }

}