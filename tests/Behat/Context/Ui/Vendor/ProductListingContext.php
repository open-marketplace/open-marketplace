<?php

/*
 * This file has been created by developers from BitBag.
 * Feel free to contact us once you face any issues or want to start
 * You can find more information about us on https://bitbag.io and write us
 * an email on hello@bitbag.io.
 */

declare(strict_types=1);

namespace Tests\BitBag\OpenMarketplace\Behat\Context\Ui\Vendor;

use Behat\Behat\Context\Context;
use Behat\Mink\Element\DocumentElement;
use Behat\MinkExtension\Context\RawMinkContext;
use BitBag\OpenMarketplace\Entity\ProductListing\ProductDraft;
use BitBag\OpenMarketplace\Entity\ProductListing\ProductDraftInterface;
use BitBag\OpenMarketplace\Entity\ProductListing\ProductListing;
use BitBag\OpenMarketplace\Entity\ProductListing\ProductListingPrice;
use BitBag\OpenMarketplace\Entity\ProductListing\ProductTranslation;
use BitBag\OpenMarketplace\Entity\ShopUserInterface;
use BitBag\OpenMarketplace\Entity\Vendor;
use Doctrine\Common\DataFixtures\Purger\ORMPurger;
use Doctrine\ORM\EntityManagerInterface;
use Sylius\Behat\Service\SharedStorageInterface;
use Sylius\Bundle\CoreBundle\Fixture\Factory\ShopUserExampleFactory;
use Sylius\Component\Resource\Factory\FactoryInterface;
use Webmozart\Assert\Assert;

final class ProductListingContext extends RawMinkContext implements Context
{
    private EntityManagerInterface $entityManager;

    private ShopUserExampleFactory $shopUserExampleFactory;

    private FactoryInterface $vendorFactory;

    private SharedStorageInterface $sharedStorage;

    public function __construct(
        EntityManagerInterface $entityManager,
        ShopUserExampleFactory $shopUserExampleFactory,
        FactoryInterface $vendorFactory,
        SharedStorageInterface $sharedStorage
    ) {
        $this->entityManager = $entityManager;
        $this->shopUserExampleFactory = $shopUserExampleFactory;
        $this->vendorFactory = $vendorFactory;
        $this->sharedStorage = $sharedStorage;
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
    public function thereIsAnVendorUserWithPassword(
        $verified,
        $username,
        $password
    ) {
        /** @var ShopUserInterface $user */
        $user = $this->shopUserExampleFactory->create();
        $user->setUsername($username);
        $user->setPlainPassword($password);
        $user->setEmail('vendor@email.com');
        $user->setVerifiedAt(new \DateTime());
        $user->addRole('ROLE_USER');
        $user->addRole('ROLE_VENDOR');
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

        $this->sharedStorage->set('vendor', $vendor);
        $this->entityManager->flush();
    }

    /**
     * @Given This product listing visibility is hidden
     */
    public function thisProductListingVisibilityIsHidden()
    {
        $productListing = $this->sharedStorage->get('product_listing' . '0');
        $productListing->setHidden(true);
        $this->entityManager->persist($productListing);
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
     * @return DocumentElement
     */
    private function getPage()
    {
        return $this->getSession()->getPage();
    }

    /**
     * @Given there is :arg2 product listing created by vendor
     */
    public function thereIsProductListingCreatedByVendor($count)
    {
        $vendor = $this->sharedStorage->get('vendor');

        for ($i = 0; $i < $count; ++$i) {
            $productListing = new ProductListing();
            $productListing->setCode('code' . $i);
            $productListing->setVendor($vendor);

            $productDraft = new ProductDraft();
            $productDraft->setCode('code' . $i);
            $productDraft->setStatus(ProductDraftInterface::STATUS_UNDER_VERIFICATION);
            $productDraft->setPublishedAt(new \DateTime());
            $productDraft->setVersionNumber(0);
            $productDraft->setProductListing($productListing);

            $productTranslation = new ProductTranslation();
            $productTranslation->setLocale('en_US');
            $productTranslation->setSlug('product-listing-' . $i);
            $productTranslation->setName('product-listing-' . $i);
            $productTranslation->setDescription('product-listing-' . $i);
            $productTranslation->setProductDraft($productDraft);

            $productPricing = new ProductListingPrice();
            $productPricing->setProductDraft($productDraft);
            $productPricing->setPrice(1000);
            $productPricing->setOriginalPrice(1000);
            $productPricing->setMinimumPrice(1000);
            $productPricing->setChannelCode('en_US');

            $this->entityManager->persist($productListing);
            $this->entityManager->persist($productDraft);
            $this->entityManager->persist($productTranslation);
            $this->entityManager->persist($productPricing);

            $this->sharedStorage->set('product_listing' . $i, $productListing);
        }

        $this->entityManager->flush();
    }

    /**
     * @Given Product listing status is :arg1
     */
    public function productListingStatusIs($arg1)
    {
        $draft = $this->entityManager->getRepository(ProductDraft::class)->findOneBy(['code' => 'code0']);
        $draft->setStatus(ProductDraftInterface::STATUS_CREATED);
        $this->entityManager->persist($draft);
        $this->entityManager->flush();
    }

    /**
     * @Then I should see dropdown with hide option
     */
    public function iShouldSeeDropdownWithHideOption()
    {
        $page = $this->getPage();
        $dropdown = $page->find('css', '.ui.labeled.icon.floating.dropdown.link.button');
        Assert::notNull($dropdown);
    }

    /**
     * @Given I choose main taxon :taxon
     */
    public function iChooseMainTaxon($taxon)
    {
        $page = $this->getPage();
        $page->findById('sylius_product_mainTaxon')->setValue($taxon);
    }


    /**
     * @Then I should get validation error
     */
    public function iShouldGetValidationError()
    {
        $page = $this->getSession()->getPage();
        $this->getSession()->reload();

        $label = $page->find('css', '.ui.red.label.sylius-validation-error');
        Assert::eq($label->getText(), 'You must define price for every channel.');
    }

}
