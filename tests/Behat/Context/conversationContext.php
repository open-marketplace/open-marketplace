<?php

/*
 * This file has been created by developers from BitBag.
 * Feel free to contact us once you face any issues or want to start
 * You can find more information about us on https://bitbag.io and write us
 * an email on hello@bitbag.io.
 */

declare(strict_types=1);

namespace Tests\BitBag\SyliusMultiVendorMarketplacePlugin\Behat\Context;

use Behat\Behat\Context\Context;
use Behat\Mink\Element\DocumentElement;
use Behat\MinkExtension\Context\MinkContext;
use Doctrine\Common\DataFixtures\Purger\ORMPurger;
use Doctrine\ORM\EntityManagerInterface;
use Sylius\Bundle\CoreBundle\Fixture\Factory\ShopUserExampleFactory;

class conversationContext extends MinkContext implements Context
{
    private EntityManagerInterface $entityManager;
    private ShopUserExampleFactory $shopUserExampleFactory;

    public function __construct(EntityManagerInterface  $entityManager, ShopUserExampleFactory $shopUserExampleFactory)
    {
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