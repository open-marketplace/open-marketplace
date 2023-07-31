<?php

/*
 * This file has been created by developers from BitBag.
 * Feel free to contact us once you face any issues or want to start
 * You can find more information about us on https://bitbag.io and write us
 * an email on hello@bitbag.io.
 */

declare(strict_types=1);

namespace Tests\BitBag\OpenMarketplace\Behat\Context;

use Behat\Behat\Context\Context;
use Behat\Mink\Element\DocumentElement;
use Behat\MinkExtension\Context\MinkContext;
use BitBag\OpenMarketplace\Component\Vendor\Entity\VendorInterface;
use BitBag\OpenMarketplace\Repository\VendorRepositoryInterface;
use Doctrine\ORM\EntityManagerInterface;
use Sylius\Behat\Service\SharedStorageInterface;
use Sylius\Bundle\CoreBundle\Fixture\Factory\ExampleFactoryInterface;
use Sylius\Component\Core\Formatter\StringInflector;
use Sylius\Component\Core\Model\ChannelInterface;
use Sylius\Component\Core\Model\ChannelPricingInterface;
use Sylius\Component\Core\Model\ProductInterface;
use Sylius\Component\Core\Model\ProductVariantInterface;
use Sylius\Component\Core\Repository\ProductRepositoryInterface;
use Sylius\Component\Product\Factory\ProductFactoryInterface;
use Sylius\Component\Product\Generator\SlugGeneratorInterface;
use Sylius\Component\Product\Resolver\ProductVariantResolverInterface;
use Sylius\Component\Resource\Factory\FactoryInterface;
use Sylius\Component\Resource\Repository\RepositoryInterface;
use Tests\BitBag\OpenMarketplace\Behat\Page\VendorPagePageInterface;
use Webmozart\Assert\Assert;
use function PHPUnit\Framework\assertTrue;

class VendorPageContext extends MinkContext implements Context
{
    private EntityManagerInterface $entityManager;

    private RepositoryInterface $countryRepository;

    private VendorRepositoryInterface $vendorRepository;

    private ProductFactoryInterface $productFactory;

    private SlugGeneratorInterface $slugGenerator;

    private ProductVariantResolverInterface $defaultVariantResolver;

    private SharedStorageInterface $sharedStorage;

    private ProductRepositoryInterface $productRepository;

    private FactoryInterface $channelPricingFactory;

    private VendorPagePageInterface $vendorPagePage;

    private ExampleFactoryInterface $vendorExampleFactory;

    public function __construct(
        EntityManagerInterface $entityManager,
        RepositoryInterface $countryRepository,
        VendorRepositoryInterface $vendorRepository,
        ProductFactoryInterface $productFactory,
        SlugGeneratorInterface $slugGenerator,
        ProductVariantResolverInterface $defaultVariantResolver,
        SharedStorageInterface $sharedStorage,
        ProductRepositoryInterface $productRepository,
        FactoryInterface $channelPricingFactory,
        VendorPagePageInterface $vendorPagePage,
        ExampleFactoryInterface $vendorExampleFactory,
        ) {
        $this->entityManager = $entityManager;
        $this->countryRepository = $countryRepository;
        $this->vendorRepository = $vendorRepository;
        $this->productFactory = $productFactory;
        $this->slugGenerator = $slugGenerator;
        $this->defaultVariantResolver = $defaultVariantResolver;
        $this->sharedStorage = $sharedStorage;
        $this->productRepository = $productRepository;
        $this->channelPricingFactory = $channelPricingFactory;
        $this->vendorPagePage = $vendorPagePage;
        $this->vendorExampleFactory = $vendorExampleFactory;
    }

    /**
     * @Given there is a :vendorStatus vendor
     */
    public function thereIsAVendor(string $verifiedStatus)
    {
        $shopUser = $this->sharedStorage->get('user');

        $country = $this->countryRepository->findOneBy(['code' => 'US']);

        $options = [
            'company_name' => 'test company',
            'phone_number' => '123123123',
            'tax_identifier' => '123123123',
            'street' => 'test',
            'city' => 'test',
            'postcode' => 'test',
            'slug' => 'test-company',
            'description' => 'test-company',
            'country' => $country,
            'status' => $verifiedStatus,
        ];

        $vendor = $this->vendorExampleFactory->create($options);

        $vendor->setShopUser($shopUser);

        $this->entityManager->persist($vendor);
        $this->entityManager->flush();
    }

    /**
     * @Given the vendor has :number products
     */
    public function theVendorHasMoreThanOnePageOfProducts(int $number)
    {
        $vendor = $this->vendorRepository->findOneBy(['slug' => 'test-company']);
        for ($i = 1; $i <= $number; ++$i) {
            $this->saveProduct($this->createProduct("product-$i", $vendor));
        }
    }

    /**
     * @Given the vendor has :number products with different dates and prices
     */
    public function theVendorHasMoreThanOnePageOfProductsWithDifferentDatesAndPrices(int $number)
    {
        $vendor = $this->vendorRepository->findOneBy(['slug' => 'test-company']);
        if (null === $vendor) {
            $vendor = $this->vendorRepository->findOneBy(['slug' => 'vendor-slug']);
        }
        for ($i = 1; $i <= $number; ++$i) {
            $date = strtotime("+$i day", strtotime('2007-02-28'));
            $this->saveProduct($this->createProduct("product-$i", $vendor, $i * 100, date('Y-m-d', $date)));
        }
    }

    /**
     * @Then the first product should have name :name
     */
    public function theFirstProductShouldHaveName(string $name): void
    {
        Assert::same($this->vendorPagePage->getFirstProductNameFromList(), $name);
    }

    /**
     * @Then the last product should have name :name
     */
    public function theLastProductShouldHaveName(string $name): void
    {
        Assert::same($this->vendorPagePage->getLastProductNameFromList(), $name);
    }

    /**
     * @Then I should see :count products in the list
     */
    public function iShouldSeeProductsInTheList(int $count)
    {
        $this->vendorPagePage->open(['vendor_slug' => 'SLUG']);
        $productsCount = $this->vendorPagePage->countProduct();
        Assert::same($productsCount, $count);
    }

    /**
     * @Then I should see :count products on page :pageNumber
     */
    public function iShouldSeeProductsOnPage(int $count, string $pageNumber)
    {
        $this->vendorPagePage->open(
            [
                'vendor_slug' => 'SLUG',
                'limit' => 2,
                'page' => $pageNumber,
            ]
        );
        $productsCount = $this->vendorPagePage->countProduct();

        Assert::same($count, $productsCount, );
    }

    /**
     * @Given sorting is set to :sortField :value
     */
    public function sortingIsSetTo($sortField, $value)
    {
        $sortType = [
            'ascending' => 'asc',
            'descending' => 'desc',
        ];

        $this->sharedStorage->set(
            'sorting',
            [
                'field' => $sortField,
                'value' => $sortType[$value],
            ]
        );
    }

    /**
     * @Then i should see products sorted by :field
     */
    public function iShouldSeeProductsSorted()
    {
        $shopSorting = $this->sharedStorage->get('sorting');

        $this->vendorPagePage->open(
            [
                'vendor_slug' => 'SLUG',
                'sorting' => [
                        $shopSorting['field'] => $shopSorting['value'],
                    ],
            ]
        );

        assertTrue($this->vendorPagePage->productsSorted($shopSorting));
    }

    /**
     * @Then I should see :count products on :slug taxon page
     */
    public function iShouldSeeProductsOnTaxonPage($count, $slug)
    {
        $this->visit("/en_US/vendors/SLUG/taxons/$slug");

        $page = $this->getSession()->getPage();
        $productCards = $page->findAll('css', '.ui.fluid.card');

        Assert::count($productCards, $count);
    }

    /**
     * @Then I should see :count products when search for :name
     */
    public function iShouldSeeProductsWhenSearchFor($count, $name)
    {
        $this->vendorPagePage->open(
            [
                'vendor_slug' => 'SLUG',
                'criteria' => [
                    'search' => $name,
                    ],
            ]
        );

        $page = $this->getSession()->getPage();

        $productCards = $page->findAll('css', '.ui.fluid.card');

        Assert::count($productCards, $count);
    }

    private function getPage(): DocumentElement
    {
        return $this->getSession()->getPage();
    }

    private function createProduct(
        string $productName,
        VendorInterface $vendor,
        int $price = 100,
        string $date = 'now',
        ?ChannelInterface $channel = null
    ): ProductInterface {
        if (null === $channel && $this->sharedStorage->has('channel')) {
            $channel = $this->sharedStorage->get('channel');
        }

        $date = new \DateTime($date);

        /** @var ProductInterface $product */
        $product = $this->productFactory->createWithVariant();

        $product->setCode(StringInflector::nameToUppercaseCode($productName));
        $product->setName($productName);
        $product->setSlug($this->slugGenerator->generate($productName));
        $product->setVendor($vendor);
        $product->setCreatedAt($date);

        if (null !== $channel) {
            $product->addChannel($channel);

            foreach ($channel->getLocales() as $locale) {
                $product->setFallbackLocale($locale->getCode());
                $product->setCurrentLocale($locale->getCode());

                $product->setName($productName);
                $product->setSlug($this->slugGenerator->generate($productName));
            }
        }

        /** @var ProductVariantInterface $productVariant */
        $productVariant = $this->defaultVariantResolver->getVariant($product);

        if (null !== $channel) {
            $productVariant->addChannelPricing($this->createChannelPricingForChannel($price, $channel));
        }

        $productVariant->setCode($product->getCode());
        $productVariant->setName($product->getName());
        $productVariant->setCreatedAt($date);
        $productVariant->setUpdatedAt($date);

        return $product;
    }

    private function saveProduct(ProductInterface $product)
    {
        $this->productRepository->add($product);
        $this->sharedStorage->set('product', $product);
    }

    private function createChannelPricingForChannel(int $price, ChannelInterface $channel = null)
    {
        /** @var ChannelPricingInterface $channelPricing */
        $channelPricing = $this->channelPricingFactory->createNew();
        $channelPricing->setPrice($price);
        $channelPricing->setChannelCode($channel->getCode());

        return $channelPricing;
    }
}
