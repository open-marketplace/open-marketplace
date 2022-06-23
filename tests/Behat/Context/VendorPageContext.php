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
use BitBag\SyliusMultiVendorMarketplacePlugin\Entity\Vendor;
use BitBag\SyliusMultiVendorMarketplacePlugin\Entity\VendorAddress;
use BitBag\SyliusMultiVendorMarketplacePlugin\Entity\VendorInterface;
use BitBag\SyliusMultiVendorMarketplacePlugin\Repository\VendorRepositoryInterface;
use Doctrine\ORM\EntityManagerInterface;
use Sylius\Behat\Service\SharedStorageInterface;
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
use Tests\BitBag\SyliusMultiVendorMarketplacePlugin\Behat\Page\VendorPagePageInterface;
use Webmozart\Assert\Assert;

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
        VendorPagePageInterface $vendorPagePage
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
    }

    /**
     * @Given there is a vendor
     */
    public function thereIsAVendor()
    {
        $shopUser = $this->sharedStorage->get('user');

        $country = $this->countryRepository->findOneBy(['code' => 'US']);

        $vendorAddress = new VendorAddress();
        $vendorAddress->setCity('test');
        $vendorAddress->setCountry($country);
        $vendorAddress->setPostalCode('test');
        $vendorAddress->setStreet('test');

        $vendor = new Vendor();
        $vendor->setSlug('test-company');
        $vendor->setDescription('test-company');
        $vendor->setCompanyName('test company');
        $vendor->setShopUser($shopUser);
        $vendor->setPhoneNumber('123123123');
        $vendor->setTaxIdentifier('123123123');
        $vendor->setVendorAddress($vendorAddress);

        $this->entityManager->persist($vendorAddress);
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
        for ($i = 1; $i <= $number; ++$i) {
            $date = strtotime("+$i day", strtotime('2007-02-28'));
            $this->saveProduct($this->createProduct("product-$i", $vendor, $i * 100, date('Y-m-d', $date)));
        }
    }

    /**
     * @Then the first product should have name :name
     */
    public function theFirstProductShouldHaveName($name): void
    {
        Assert::same($this->vendorPagePage->getFirstProductNameFromList(), $name);
    }

    /**
     * @Then the last product should have name :name
     */
    public function theLastProductShouldHaveName($name): void
    {
        Assert::same($this->vendorPagePage->getLastProductNameFromList(), $name);
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
        ChannelInterface $channel = null
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
