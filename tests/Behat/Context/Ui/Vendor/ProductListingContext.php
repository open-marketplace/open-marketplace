<?php

/*
 * This file has been created by developers from BitBag.
 * Feel free to contact us once you face any issues or want to start
 * You can find more information about us on https://bitbag.io and write us
 * an email on hello@bitbag.io.
 */

declare(strict_types=1);

namespace Tests\BitBag\OpenMarketplace\Behat\Context\Ui\Vendor;

use Behat\Mink\Element\DocumentElement;
use Behat\MinkExtension\Context\RawMinkContext;
use BitBag\OpenMarketplace\Component\ProductListing\Entity\Draft;
use BitBag\OpenMarketplace\Component\ProductListing\Entity\DraftInterface;
use BitBag\OpenMarketplace\Component\ProductListing\Entity\DraftTranslation;
use BitBag\OpenMarketplace\Component\ProductListing\Entity\Listing;
use BitBag\OpenMarketplace\Component\ProductListing\Entity\ListingPrice;
use BitBag\OpenMarketplace\Component\Vendor\Entity\ShopUserInterface;
use BitBag\OpenMarketplace\Component\Vendor\Entity\Vendor;
use Doctrine\Common\DataFixtures\Purger\ORMPurger;
use Doctrine\ORM\EntityManagerInterface;
use Sylius\Behat\Service\SharedStorageInterface;
use Sylius\Bundle\CoreBundle\Fixture\Factory\AdminUserExampleFactory;
use Sylius\Bundle\CoreBundle\Fixture\Factory\ShopUserExampleFactory;
use Sylius\Component\Channel\Model\Channel;
use Sylius\Component\Resource\Factory\FactoryInterface;
use Tests\BitBag\OpenMarketplace\Behat\Page\Vendor\ProductListingInterface;
use Webmozart\Assert\Assert;

final class ProductListingContext extends RawMinkContext
{
    private EntityManagerInterface $entityManager;

    private ProductListingInterface $productListingPage;

    private ShopUserExampleFactory $shopUserExampleFactory;

    private FactoryInterface $vendorFactory;

    private SharedStorageInterface $sharedStorage;

    private AdminUserExampleFactory $adminUserExampleFactory;

    private FactoryInterface $localeFactory;

    public function __construct(
        EntityManagerInterface $entityManager,
        ShopUserExampleFactory $shopUserExampleFactory,
        FactoryInterface $vendorFactory,
        SharedStorageInterface $sharedStorage,
        AdminUserExampleFactory $adminUserExampleFactory,
        FactoryInterface $localeFactory,
        ProductListingInterface $productListingPage
    ) {
        $this->entityManager = $entityManager;
        $this->shopUserExampleFactory = $shopUserExampleFactory;
        $this->vendorFactory = $vendorFactory;
        $this->sharedStorage = $sharedStorage;
        $this->adminUserExampleFactory = $adminUserExampleFactory;
        $this->localeFactory = $localeFactory;
        $this->productListingPage = $productListingPage;
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
     * @Given the product listing is removed
     */
    public function thereProductListingIsRemoved()
    {
        $productListing = $this->sharedStorage->get('product_listing');
        $productListing->setRemoved(true);
        $this->entityManager->persist($productListing);
        $this->entityManager->flush();
    }

    /**
     * @When I am on edit page product listing :url
     */
    public function iAmOnProductListingPageWithIUrl($url)
    {
        $productListing = $this->sharedStorage->get('product_listing');
        $this->productListingPage->tryToOpen(['id' => $productListing->getId()]);
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
            $productListing = new Listing();
            $productListing->setCode('code' . $i);
            $productListing->setVendor($vendor);

            $productDraft = new Draft();
            $productDraft->setCode('code' . $i);
            $productDraft->setStatus(DraftInterface::STATUS_UNDER_VERIFICATION);
            $productDraft->setPublishedAt(new \DateTime());
            $productDraft->setVersionNumber(0);
            $productDraft->setProductListing($productListing);

            $productTranslation = new DraftTranslation();
            $productTranslation->setLocale('en_US');
            $productTranslation->setSlug('product-listing-' . $i);
            $productTranslation->setName('product-listing-' . $i);
            $productTranslation->setDescription('product-listing-' . $i);
            $productTranslation->setProductDraft($productDraft);

            $productPricing = new ListingPrice();
            $productPricing->setProductDraft($productDraft);
            $productPricing->setPrice(1000);
            $productPricing->setOriginalPrice(1000);
            $productPricing->setMinimumPrice(1000);
            $productPricing->setChannelCode('en_US');

            $this->entityManager->persist($productListing);
            $this->entityManager->persist($productDraft);
            $this->entityManager->persist($productTranslation);
            $this->entityManager->persist($productPricing);

            $this->sharedStorage->set('product_listing', $productListing);
        }

        $this->entityManager->flush();
    }

    /**
     * @Given there is :count product listing created by vendor with status :status
     */
    public function thereIsProductListingCreatedByVendorWithStatus2($count, $status)
    {
        $vendor = $this->sharedStorage->get('vendor');

        for ($i = 0; $i < $count; ++$i) {
            $productListing = new Listing();
            $productListing->setCode('code' . $i);
            $productListing->setVendor($vendor);
            $productListing->setVerificationStatus($status);

            $productDraft = new Draft();
            $productDraft->setCode('code' . $i);
            $productDraft->setStatus($status);
            $productDraft->setPublishedAt(new \DateTime());
            $productDraft->setVersionNumber(0);
            $productDraft->setProductListing($productListing);

            $productTranslation = new DraftTranslation();
            $productTranslation->setLocale('en_US');
            $productTranslation->setSlug('product-listing-' . $i);
            $productTranslation->setName('product-listing-' . $i);
            $productTranslation->setDescription('product-listing-' . $i);
            $productTranslation->setProductDraft($productDraft);

            $productPricing = new ListingPrice();
            $productPricing->setProductDraft($productDraft);
            $productPricing->setPrice(1000);
            $productPricing->setOriginalPrice(1000);
            $productPricing->setMinimumPrice(1000);
            $productPricing->setChannelCode('en_US');

            $this->entityManager->persist($productListing);
            $this->entityManager->persist($productDraft);
            $this->entityManager->persist($productTranslation);
            $this->entityManager->persist($productPricing);

            $this->sharedStorage->set('product_listing', $productListing);
        }

        $this->entityManager->flush();
    }

    /**
     * @Given Product listing status is :arg1
     */
    public function productListingStatusIs($arg1)
    {
        $draft = $this->entityManager->getRepository(Draft::class)->findOneBy(['code' => 'code0']);
        $draft->setStatus(DraftInterface::STATUS_CREATED);
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
     * @When I fill form with non unique code
     */
    public function iFillFormWithNonUniqueCode(): void
    {
        $page = $this->getPage();

        $page->fillField('Code', 'code0');
        $page->fillField('Price', '10');
        $page->fillField('Original price', '20');
        $page->fillField('Minimum price', '30');
        $page->fillField('Name', 'test');
        $page->fillField('Slug', 'product');
        $page->fillField('Description', 'product description');
    }

    /**
     * @Then I should see non unique code error message
     */
    public function iShouldSeeNonUniqueCodeMessage()
    {
        $text = $this->getPage()->getText();
        $isErrorMessagePresent = false !== stripos($text, 'Product Listing with given code already exists');
        Assert::true($isErrorMessagePresent);
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

        $admin->setPlainPassword($password);
        $this->sharedStorage->set('admin', $admin);
    }

    /**
     * @Given I am logged in as an admin
     */
    public function iAmLoggedInAsAnAdmin()
    {
        $admin = $this->sharedStorage->get('admin');

        $this->visitPath('/admin/login');
        $this->getPage()->fillField('Username', $admin->getUsername());
        $this->getPage()->fillField('Password', $admin->getPlainPassword());
        $this->getPage()->pressButton('Login');
        ($this->getPage()->findLink('Logout'));
    }

    /**
     * @When I click :label on confirmation modal
     */
    public function iClickOnConfirmationModal(string $label): void
    {
        $confirmationModal = $this->getPage()->findById($label);
        $confirmationModal->click();
    }

    /**
     * @Given the channel uses another locale :locales
     */
    public function theChannelUsesAnotherLocale(string $locales): void
    {
        /** @var Channel $channel */
        $channel = $this->sharedStorage->get('channel');

        $locale = $this->localeFactory->createNew();
        $locale->setCode($locales);
        $channel->addLocale($locale);

        $this->entityManager->persist($locale);
        $this->entityManager->persist($channel);
        $this->entityManager->flush();
    }

    /**
     * @When I fill form with default data
     */
    public function iFillFormWithDefaultData(): void
    {
        $page = $this->getPage();

        $page->fillField('Code', 'code');
        $page->fillField('Price', '10');
        $page->fillField('Original price', '20');
        $page->fillField('Minimum price', '30');
        $page->fillField('Name', 'test');
        $page->fillField('Slug', 'product');
        $page->fillField('Description', 'product description');
    }
}
