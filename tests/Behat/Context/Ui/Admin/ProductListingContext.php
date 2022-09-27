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
use BitBag\SyliusMultiVendorMarketplacePlugin\Entity\ProductListing\DraftAttribute;
use BitBag\SyliusMultiVendorMarketplacePlugin\Entity\ProductListing\DraftAttributeTranslation;
use BitBag\SyliusMultiVendorMarketplacePlugin\Entity\ProductListing\DraftAttributeValue;
use BitBag\SyliusMultiVendorMarketplacePlugin\Entity\ProductListing\ProductDraft;
use BitBag\SyliusMultiVendorMarketplacePlugin\Entity\ProductListing\ProductDraftImage;
use BitBag\SyliusMultiVendorMarketplacePlugin\Entity\ProductListing\ProductDraftInterface;
use BitBag\SyliusMultiVendorMarketplacePlugin\Entity\ProductListing\ProductListing;
use BitBag\SyliusMultiVendorMarketplacePlugin\Entity\ProductListing\ProductListingInterface;
use BitBag\SyliusMultiVendorMarketplacePlugin\Entity\ProductListing\ProductListingPrice;
use BitBag\SyliusMultiVendorMarketplacePlugin\Entity\ProductListing\ProductListingPriceInterface;
use BitBag\SyliusMultiVendorMarketplacePlugin\Entity\ProductListing\ProductTranslation;
use BitBag\SyliusMultiVendorMarketplacePlugin\Entity\ProductListing\ProductTranslationInterface;
use BitBag\SyliusMultiVendorMarketplacePlugin\Entity\Vendor;
use BitBag\SyliusMultiVendorMarketplacePlugin\Entity\VendorAddress;
use BitBag\SyliusMultiVendorMarketplacePlugin\Entity\VendorInterface;
use BitBag\SyliusMultiVendorMarketplacePlugin\Factory\DraftAttributeFactoryInterface;
use Doctrine\ORM\EntityManagerInterface;
use Sylius\Behat\Service\SharedStorageInterface;
use Sylius\Bundle\CoreBundle\Fixture\Factory\AdminUserExampleFactory;
use Sylius\Bundle\CoreBundle\Fixture\Factory\ShopUserExampleFactory;
use Sylius\Component\Addressing\Model\Country;
use Sylius\Component\User\Repository\UserRepositoryInterface;
use Webmozart\Assert\Assert;

final class ProductListingContext extends RawMinkContext implements Context
{
    private EntityManagerInterface $entityManager;

    private AdminUserExampleFactory $adminUserExampleFactory;

    private ShopUserExampleFactory $shopUserExampleFactory;

    private SharedStorageInterface $sharedStorage;

    private UserRepositoryInterface $userRepository;

    private DraftAttributeFactoryInterface $draftAttributeFactory;

    public function __construct(
        EntityManagerInterface $entityManager,
        AdminUserExampleFactory $adminUserExampleFactory,
        ShopUserExampleFactory $shopUserExampleFactory,
        SharedStorageInterface $sharedStorage,
        UserRepositoryInterface $userRepository,
        DraftAttributeFactoryInterface $draftAttributeFactory
    ) {
        $this->entityManager = $entityManager;
        $this->adminUserExampleFactory = $adminUserExampleFactory;
        $this->shopUserExampleFactory = $shopUserExampleFactory;
        $this->sharedStorage = $sharedStorage;
        $this->userRepository = $userRepository;
        $this->draftAttributeFactory = $draftAttributeFactory;
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
     * @Given there is a vendor user :vendor_user_email registered in country :country_code
     */
    public function thereIsAVendorUserRegisteredInCountry($vendor_user_email, $country_code): void
    {
        $user = $this->shopUserExampleFactory->create(['email' => $vendor_user_email, 'password' => 'password', 'enabled' => true]);

        $this->sharedStorage->set('user', $user);

        $this->userRepository->add($user);

        $country = $this->entityManager->getRepository(Country::class)->findOneBy(['code' => $country_code]);
        $vendor = new Vendor();
        $vendor->setCompanyName('sdasdsa');
        $vendor->setShopUser($user);
        $vendor->setPhoneNumber('333333333');
        $vendor->setTaxIdentifier('543455');
        $vendor->setVendorAddress(new VendorAddress());
        $vendor->getVendorAddress()->setCountry($country);
        $vendor->getVendorAddress()->setCity('Warsaw');
        $vendor->getVendorAddress()->setPostalCode('00-111');
        $vendor->getVendorAddress()->setStreet('Tajna 13');
        $vendor->setSlug('vendor-slug');
        $vendor->setDescription('description');
        $this->entityManager->persist($vendor);
        $this->entityManager->flush();
        $this->sharedStorage->set('vendor', $vendor);
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
     * @Given there is/are :count product listing(s)
     */
    public function thereAreProductListings($count)
    {
        $vendor = $this->sharedStorage->get('vendor');

        for ($i = 0; $i < $count; ++$i) {
            $productListing = $this->createProductListing($vendor, 'code' . $i);
            $productDraft = $this->createProductListingDraft($productListing, 'code' . $i);
            $productTranslation = $this->createProductListingTranslation(
                $productDraft,
                'product-listing-' . $i,
                'product-listing-' . $i,
                'product-listing-' . $i
            );
            $productPricing = $this->createProductListingPricing($productDraft);

            $this->entityManager->persist($productListing);
            $this->entityManager->persist($productDraft);
            $this->entityManager->persist($productTranslation);
            $this->entityManager->persist($productPricing);
        }
        $this->entityManager->flush();
    }

    /**
     * @Given there is a product listing with code :code and name :name and status :status
     */
    public function thereIsAProductListingWithCodeAndNameAndStatus(
        string $code,
        string $name,
        string $status
    ) {
        $vendor = $this->sharedStorage->get('vendor');

        $productListing = $this->createProductListing($vendor, $code);
        $productDraft = $this->createProductListingDraft($productListing, $code, $status);
        $productTranslation = $this->createProductListingTranslation($productDraft, $name);
        $productPricing = $this->createProductListingPricing($productDraft);

        $this->entityManager->persist($productListing);
        $this->entityManager->persist($productDraft);
        $this->entityManager->persist($productTranslation);
        $this->entityManager->persist($productPricing);
        $this->entityManager->flush();
    }

    /**
     * @Then I should see :count product listing(s)
     */
    public function iShouldSeeProductListings($count)
    {
        $rows = $this->getPage()->findAll('css', 'table > tbody > tr');
        Assert::notEmpty($rows, 'Could not find any rows');
        Assert::eq($count, count($rows), 'Rows numbers are not equal');
    }

    /**
     * @Then I should see url :url
     */
    public function iShouldSeeUrl($url)
    {
        $currentUrl = $this->getSession()->getCurrentUrl();
        $matches = preg_match($url, $currentUrl);
        Assert::eq(1, $matches);
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
     * @Then I should be redirected to :url
     */
    public function iShouldBeRedirectedTo($url)
    {
        Assert::eq($url, $this->getSession()->getCurrentUrl());
    }

    /**
     * @return DocumentElement
     */
    private function getPage()
    {
        return $this->getSession()->getPage();
    }

    private function createProductListing(VendorInterface $vendor, string $code): ProductListingInterface
    {
        $productListing = new ProductListing();
        $productListing->setCode($code);
        $productListing->setVendor($vendor);

        return $productListing;
    }

    private function createProductListingDraft(
        ProductListingInterface $productListing,
        string $code = 'code',
        string $status = 'under_verification',
        int $versionNumber = 0,
        string $publishedAt = 'now'
    ): ProductDraftInterface {
        $productDraft = new ProductDraft();
        $productDraft->setCode($code);
        $productDraft->setStatus($status);
        $productDraft->setPublishedAt(new \DateTime($publishedAt));
        $productDraft->setVersionNumber($versionNumber);
        $productDraft->setProductListing($productListing);

        return $productDraft;
    }

    private function createProductListingTranslation(
        ProductDraftInterface $productDraft,
        string $name = 'product-listing-name',
        string $description = 'product-listing-description',
        string $slug = 'product-listing-slug',
        string $locale = 'en_US'
    ): ProductTranslationInterface {
        $productTranslation = new ProductTranslation();
        $productTranslation->setLocale($locale);
        $productTranslation->setSlug($slug);
        $productTranslation->setName($name);
        $productTranslation->setDescription($description);
        $productTranslation->setProductDraft($productDraft);

        return $productTranslation;
    }

    private function createProductListingPricing(
        ProductDraftInterface $productDraft,
        int $price = 1000,
        int $originalPrice = 1000,
        int $minimumPrice = 1000,
        string $channelCode = 'en_US'
    ): ProductListingPriceInterface {
        $productPricing = new ProductListingPrice();
        $productPricing->setProductDraft($productDraft);
        $productPricing->setPrice($price);
        $productPricing->setOriginalPrice($originalPrice);
        $productPricing->setMinimumPrice($minimumPrice);
        $productPricing->setChannelCode($channelCode);

        return $productPricing;
    }

    /**
     * @Given This product listing visibility is removed
     */
    public function thisProductListingVisibilityIsHidden()
    {
        $productListing = $this->sharedStorage->get('product_listing' . '0');
        $productListing->setHidden(true);
        $this->entityManager->persist($productListing);
        $this->entityManager->flush();
    }

    /**
     * @Given There is attribute with code :code
     */
    public function thereIsAttributeWithCode($code)
    {
        $vendor = $this->sharedStorage->get('vendor');

        /** @var DraftAttribute $attribute */
        $attribute = $this->draftAttributeFactory->createNew();
        $attribute->setType('text');
        $attribute->setStorageType('text');
        $attribute->setCode($code);
        $attribute->setVendor($vendor);

        $translation = new DraftAttributeTranslation();
        $translation->setLocale('en_US');
        $translation->setTranslatable($attribute);
        $translation->setName('attribute');

        $attribute->addTranslation($translation);
        $this->sharedStorage->set('attribute', $attribute);

        $this->entityManager->persist($attribute);
    }

    /**
     * @Given there is a product listing with code :code and name :name and status :status with attribute and image
     */
    public function thereIsAProductListingWithCodeAndNameAndStatusWithAttributeAndImage(
        $code,
        $name,
        $status
    ) {
        $vendor = $this->sharedStorage->get('vendor');

        $attribute = $this->sharedStorage->get('attribute');

        $attributeValue = new DraftAttributeValue();
        $attributeValue->setAttribute($attribute);
        $attributeValue->setLocaleCode('en_US');
        $attributeValue->setValue('attribute_testing_value');

        $productListing = $this->createProductListing($vendor, $code);
        /** @var ProductDraftInterface $productDraft */
        $productDraft = $this->createProductListingDraft($productListing, $code, $status);
        $productDraft->addAttribute($attributeValue);
        $productTranslation = $this->createProductListingTranslation($productDraft, $name);
        $productPricing = $this->createProductListingPricing($productDraft);

        $draftImage = new ProductDraftImage();
        $draftImage->setOwner($productDraft);
        $draftImage->setPath('path/to/file');

        $productDraft->addImage($draftImage);

        $this->entityManager->persist($productListing);
        $this->entityManager->persist($productDraft);
        $this->entityManager->persist($productTranslation);
        $this->entityManager->persist($productPricing);
        $this->entityManager->persist($attributeValue);
        $this->entityManager->persist($draftImage);

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
     * @Then I should see image
     */
    public function iShouldSeeImage()
    {
        $page = $this->getSession()->getPage();

        $mediaContainer = $page->find('css', '#media');
        $image = $mediaContainer->find('css', 'img');
        $imagePath = $image->getAttribute('src');

        Assert::contains($imagePath, 'path/to/file', 'no image found');
    }
}
