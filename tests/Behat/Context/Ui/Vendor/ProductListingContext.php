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
use Sylius\Bundle\CoreBundle\Fixture\Factory\ShopUserExampleFactory;

use Sylius\Component\Resource\Factory\FactoryInterface;
use Webmozart\Assert\Assert;


final class ProductListingContext extends RawMinkContext implements Context
{
    private EntityManagerInterface $entityManager;

    private ShopUserExampleFactory $shopUserExampleFactory;

    private FactoryInterface $vendorFactory;

    public function __construct(
        EntityManagerInterface $entityManager,
        ShopUserExampleFactory $shopUserExampleFactory,
        FactoryInterface $vendorFactory
    ) {
        $this->entityManager = $entityManager;
        $this->shopUserExampleFactory = $shopUserExampleFactory;
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
     * @Given there is an :verified vendor user :username with password :password
     */
    public function thereIsAnVendorUserWithPassword($verified ,$username, $password)
    {
        /** @var ShopUserInterface $user */
        $user = $this->shopUserExampleFactory->create();
        $user->setUsername($username);
        $user->setPlainPassword($password);
        $user->setEmail('vendor@email.com');
        $this->entityManager->persist($user);

        /** @var Vendor $vendor */
        $vendor = $this->vendorFactory->createNew();
        $vendor->setStatus($verified);
        $vendor->setCompanyName('vendor');
        $vendor->setShopUser($user);
        $vendor->setSlug('vendor-slug');
        $vendor->setDescription('description');
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
        $productListingStatus = $this->getPage()->find('css', sprintf('table > tbody > tr > td:contains("%s")', $status));
        Assert::notNull($productListingStatus);
    }

    /**
     * @Given I click :button button
     */
    public function iClickButton($button)
    {
        $this->getPage()->pressButton($button);
    }

    /**
     * @Given I choose main taxon :taxon
     */
    public function iChooseMainTaxon($taxon)
    {
        $page =  $this->getPage();
        $page->findById('sylius_product_mainTaxon')->setValue($taxon);
    }

    /**
     * @return DocumentElement
     */
    private function getPage()
    {
        return $this->getSession()->getPage();
    }
}
