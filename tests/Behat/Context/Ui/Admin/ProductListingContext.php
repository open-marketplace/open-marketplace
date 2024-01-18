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
use BitBag\OpenMarketplace\Component\Core\Common\Fixture\Factory\VendorExampleFactory;
use BitBag\OpenMarketplace\Component\Messaging\Entity\Category;
use BitBag\OpenMarketplace\Component\Product\Entity\Product;
use BitBag\OpenMarketplace\Component\Product\Entity\ProductInterface;
use BitBag\OpenMarketplace\Component\Product\Factory\ProductAttributeFactoryInterface;
use BitBag\OpenMarketplace\Component\Product\Factory\ProductAttributeValueFactoryInterface;
use BitBag\OpenMarketplace\Component\ProductListing\DraftGenerator\Factory\DraftAttributeFactoryInterface;
use BitBag\OpenMarketplace\Component\ProductListing\Entity\Draft;
use BitBag\OpenMarketplace\Component\ProductListing\Entity\DraftAttribute;
use BitBag\OpenMarketplace\Component\ProductListing\Entity\DraftAttributeInterface;
use BitBag\OpenMarketplace\Component\ProductListing\Entity\DraftAttributeTranslation;
use BitBag\OpenMarketplace\Component\ProductListing\Entity\DraftAttributeValue;
use BitBag\OpenMarketplace\Component\ProductListing\Entity\DraftImage;
use BitBag\OpenMarketplace\Component\ProductListing\Entity\DraftInterface;
use BitBag\OpenMarketplace\Component\ProductListing\Entity\DraftTranslation;
use BitBag\OpenMarketplace\Component\ProductListing\Entity\DraftTranslationInterface;
use BitBag\OpenMarketplace\Component\ProductListing\Entity\Listing;
use BitBag\OpenMarketplace\Component\ProductListing\Entity\ListingInterface;
use BitBag\OpenMarketplace\Component\ProductListing\Entity\ListingPrice;
use BitBag\OpenMarketplace\Component\ProductListing\Entity\ListingPriceInterface;
use BitBag\OpenMarketplace\Component\Vendor\Entity\VendorInterface;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\EntityManagerInterface;
use Sylius\Behat\Service\SharedStorageInterface;
use Sylius\Bundle\CoreBundle\Fixture\Factory\AdminUserExampleFactory;
use Sylius\Bundle\CoreBundle\Fixture\Factory\ShopUserExampleFactory;
use Sylius\Component\Addressing\Model\Country;
use Sylius\Component\Addressing\Model\CountryInterface;
use Sylius\Component\Core\Model\ChannelInterface;
use Sylius\Component\Resource\Factory\FactoryInterface;
use Sylius\Component\User\Repository\UserRepositoryInterface;
use Webmozart\Assert\Assert;

final class ProductListingContext extends RawMinkContext implements Context
{
    public function __construct(
        private EntityManagerInterface $entityManager,
        private AdminUserExampleFactory $adminUserExampleFactory,
        private ShopUserExampleFactory $shopUserExampleFactory,
        private SharedStorageInterface $sharedStorage,
        private UserRepositoryInterface $userRepository,
        private DraftAttributeFactoryInterface $draftAttributeFactory,
        private VendorExampleFactory $vendorExampleFactory,
        private FactoryInterface $countryFactory,
        private ProductAttributeFactoryInterface $productAttributeFactory,
        private ProductAttributeValueFactoryInterface $productAttributeValueFactory
    ) {
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
     * @Given I am logged in as an user :email with password :password
     */
    public function iAmLoggedInAsUserWithPassword(string $email, string $password)
    {
        $this->visitPath('/en_US/login');
        $this->getPage()->fillField('Username', $email);
        $this->getPage()->fillField('Password', $password);
        $this->getPage()->pressButton('Login');
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

        if (null === $country) {
            /** @var CountryInterface $country */
            $country = $this->countryFactory->createNew();
            $country->setCode($country_code);
            $country->enable();
            $this->entityManager->persist($country);
        }

        $options = [
            'company_name' => 'Company Name',
            'phone_number' => '333333333',
            'tax_identifier' => '543455',
            'street' => 'Tajna 13',
            'city' => 'Warsaw',
            'postcode' => '00-111',
            'slug' => 'vendor-slug',
            'description' => 'description',
            'country' => $country,
        ];

        $vendor = $this->vendorExampleFactory->create($options);

        $vendor->getVendorAddress()->setCountry($country);
        $vendor->setShopUser($user);

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
            $productListing = new Listing();
            $productListing->setCode('code' . $i);
            $productListing->setVendor($vendor);

            $productDraft = new Draft();
            $productDraft->setCode('code' . $i);
            $productDraft->setVersionNumber(0);
            $productDraft->setProductListing($productListing);
            $productListing->sendToVerification($productDraft);

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
            $productPricing->setChannelCode('web_us');

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

            $productListing->setPublishedAt($productDraft->getPublishedAt());
            $productListing->setVerificationStatus($productDraft->getStatus());

            $this->entityManager->persist($productListing);
            $this->entityManager->persist($productDraft);
            $this->entityManager->persist($productTranslation);
            $this->entityManager->persist($productPricing);
        }
        $this->entityManager->flush();
    }

    /**
     * @Given there is product listing enabled for channel
     */
    public function thereIsProductListingForChannel()
    {
        $vendor = $this->sharedStorage->get('vendor');
        $channel = $this->getChannel();

        $productListing = $this->createProductListing($vendor, 'code');
        $productDraft = $this->createProductListingDraft($productListing, 'code');
        $productDraft->addChannel($channel);
        $productTranslation = $this->createProductListingTranslation(
            $productDraft,
            'product-listing-',
            'product-listing-',
            'product-listing-'
        );
        $productPricing = $this->createProductListingPricing($productDraft);

        $productListing->insertDraft($productDraft);
        $productListing->setPublishedAt($productDraft->getPublishedAt());
        $productListing->setVerificationStatus($productDraft->getStatus());

        $this->sharedStorage->set('product_listing', $productListing);

        $this->entityManager->persist($productListing);
        $this->entityManager->persist($productDraft);
        $this->entityManager->persist($productTranslation);
        $this->entityManager->persist($productPricing);

        $this->entityManager->flush();
    }

    /**
     * @Then there should be product with channel enabled
     */
    public function thereShouldBeProductWithChannel()
    {
        $setChannel = $this->getChannel();
        $products = $this->entityManager->getRepository(Product::class)->findAll();
        Assert::count($products, 1);
        /** @var ProductInterface $product */
        $product = $products[0];
        Assert::count($product->getChannels(), 1);
        $productChannels = $product->getChannels();
        /** @var ChannelInterface $productChannel */
        $productChannel = $productChannels[0];
        Assert::eq($setChannel, $productChannel);
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
     * @Given There is attribute with code :code
     */
    public function thereIsAttributeWithCode($code): void
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
    ): void {
        $vendor = $this->sharedStorage->get('vendor');

        $attribute = $this->sharedStorage->get('attribute');

        $attributeValue = new DraftAttributeValue();
        $attributeValue->setAttribute($attribute);
        $attributeValue->setLocaleCode('en_US');
        $attributeValue->setValue('attribute_testing_value');

        $productListing = $this->createProductListing($vendor, $code);
        /** @var DraftInterface $productDraft */
        $productDraft = $this->createProductListingDraft($productListing, $code, $status);
        $productDraft->addAttribute($attributeValue);
        $productTranslation = $this->createProductListingTranslation($productDraft, $name);

        $productPricing = $this->createProductListingPricing($productDraft);

        $draftImage = new DraftImage();
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
    public function iClick($buttonText): void
    {
        $this->getPage()->pressButton($buttonText);
    }

    /**
     * @Then I should see image
     */
    public function iShouldSeeImage(): void
    {
        $page = $this->getSession()->getPage();

        $mediaContainer = $page->find('css', '#media');
        $image = $mediaContainer->find('css', 'img');
        $imagePath = $image->getAttribute('src');

        Assert::contains($imagePath, 'path/to/file', 'no image found');
    }

    /**
     * @Given product listing has attribute :code with value :value
     */
    public function productListingHasAttributeWithValue(string $code, string $value): void
    {
        $productListing = $this->sharedStorage->get('product_listing');
        Assert::isInstanceOf($productListing, ListingInterface::class);

        $attribute = $this->sharedStorage->get(sprintf('draft_attribute_%s', $code));
        Assert::isInstanceOf($attribute, DraftAttributeInterface::class);

        $attributeValue = new DraftAttributeValue();

        $attributeValue->setAttribute($attribute);
        $attributeValue->setLocaleCode('en_US');
        $attributeValue->setValue($value);

        $latestDraft = $productListing->getLatestDraft();
        $latestDraft->addAttribute($attributeValue);

        $this->entityManager->persist($latestDraft);
        $this->entityManager->persist($productListing);
        $this->entityManager->persist($attributeValue);
        $this->entityManager->flush();
    }

    /**
     * @Given there is already published product with attribute :string with value :value
     */
    public function thereIsAlreadyPublishedProductWithAttributeWithValue(
        string $code,
        string $value
    ): void {
        $productListing = $this->sharedStorage->get('product_listing');
        Assert::isInstanceOf($productListing, ListingInterface::class);

        $attribute = $this->sharedStorage->get(sprintf('draft_attribute_%s', $code));
        Assert::isInstanceOf($attribute, DraftAttributeInterface::class);

        $product = $this->sharedStorage->get('product');
        Assert::isInstanceOf($product, ProductInterface::class);
        $productListing->setProduct($product);

        $productAttribute = $this->productAttributeFactory->createClone($attribute);

        $productAttributeValue = $this->productAttributeValueFactory->createWithProductAttributeAndValue(
            $productAttribute,
            $value
        );

        $product->addAttribute($productAttributeValue);

        $this->entityManager->persist($productListing);
        $this->entityManager->persist($productAttribute);
        $this->entityManager->persist($productAttributeValue);
        $this->entityManager->persist($product);

        $this->entityManager->flush();
    }

    /**
     * @When I should see :attribute with value :value
     */
    public function iShouldSeeWithValue(string $attribute, string $value)
    {
        $page = $this->getPage();

        $element = $page->find('css', 'div#attributes');
        $attribFound = $element->find('css', sprintf('table > tbody > tr > td:contains("%s")', $value));

        Assert::notNull($attribFound);
    }

    /**
     * @When I should not see :attribute with value :value
     */
    public function iShouldNotSeeWithValue(string $attribute, string $value): void
    {
        $page = $this->getPage();

        $element = $page->find('css', 'div#attributes');
        $foundAttribute = $element->find('css', sprintf('table > tbody > tr > td:contains("%s")', $value));

        Assert::null($foundAttribute);
    }

    /**
     * @return DocumentElement
     */
    private function getPage()
    {
        return $this->getSession()->getPage();
    }

    private function createProductListing(VendorInterface $vendor, string $code): ListingInterface
    {
        $productListing = new Listing();
        $productListing->setCode($code);
        $productListing->setVendor($vendor);

        return $productListing;
    }

    private function createProductListingDraft(
        ListingInterface $productListing,
        string $code = 'code',
        string $status = 'under_verification',
        int $versionNumber = 0,
        string $publishedAt = 'now'
    ): DraftInterface {
        $productDraft = new Draft();
        $productDraft->setCode($code);
        $productDraft->setStatus($status);
        $productDraft->setPublishedAt(new \DateTime($publishedAt));
        $productDraft->setVersionNumber($versionNumber);
        $productDraft->setProductListing($productListing);
        $channel = $this->getChannel();
        $productDraft->setChannels(new ArrayCollection([$channel]));

        return $productDraft;
    }

    private function createProductListingTranslation(
        DraftInterface $productDraft,
        string $name = 'product-listing-name',
        string $description = 'product-listing-description',
        string $slug = 'product-listing-slug',
        string $locale = 'en_US'
    ): DraftTranslationInterface {
        $productTranslation = new DraftTranslation();
        $productTranslation->setLocale($locale);
        $productTranslation->setSlug($slug);
        $productTranslation->setName($name);
        $productTranslation->setDescription($description);
        $productTranslation->setProductDraft($productDraft);

        return $productTranslation;
    }

    private function createProductListingPricing(
        DraftInterface $productDraft,
        int $price = 1000,
        int $originalPrice = 1000,
        int $minimumPrice = 1000,
        string $channelCode = 'web_us'
    ): ListingPriceInterface {
        $productPricing = new ListingPrice();
        $productPricing->setProductDraft($productDraft);
        $productPricing->setPrice($price);
        $productPricing->setOriginalPrice($originalPrice);
        $productPricing->setMinimumPrice($minimumPrice);
        $productPricing->setChannelCode($channelCode);

        return $productPricing;
    }

    private function getChannel(): ChannelInterface
    {
        return $this->entityManager->getRepository(ChannelInterface::class)
            ->findAll()[0];
    }

    /**
     * @Given there is conversation category :categoryName
     */
    public function thereIsConversationCategory($categoryName)
    {
        $category = new Category();
        $category->setName($categoryName);
        $this->entityManager->persist($category);
        $this->entityManager->flush();
    }
}
