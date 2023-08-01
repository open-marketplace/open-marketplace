<?php

/*
 * This file has been created by developers from BitBag.
 * Feel free to contact us once you face any issues or want to start
 * You can find more information about us on https://bitbag.io and write us
 * an email on hello@bitbag.io.
 */

declare(strict_types=1);

namespace Tests\BitBag\OpenMarketplace\Behat\Context\Setup;

use Behat\Behat\Context\Context;
use BitBag\OpenMarketplace\Component\Vendor\Entity\VendorInterface;
use BitBag\OpenMarketplace\Component\Vendor\Entity\VendorShippingMethod;
use BitBag\OpenMarketplace\Component\Vendor\Entity\VendorShippingMethodInterface;
use BitBag\OpenMarketplace\Component\Vendor\Repository\VendorRepository;
use BitBag\OpenMarketplace\Entity\ShopUserInterface;
use BitBag\OpenMarketplace\Repository\ProductRepository;
use Doctrine\ORM\EntityManagerInterface;
use Sylius\Behat\Service\SharedStorageInterface;
use Sylius\Bundle\CoreBundle\Doctrine\ORM\ProductVariantRepository;
use Sylius\Bundle\CoreBundle\Fixture\Factory\ExampleFactoryInterface;
use Sylius\Bundle\CoreBundle\Fixture\Factory\ProductExampleFactory;
use Sylius\Bundle\CoreBundle\Fixture\Factory\ShopUserExampleFactory;
use Sylius\Bundle\CoreBundle\Fixture\Factory\TaxonExampleFactory;
use Sylius\Component\Core\Formatter\StringInflector;
use Sylius\Component\Core\Model\ChannelInterface;
use Sylius\Component\Core\Model\ChannelPricingInterface;
use Sylius\Component\Core\Model\ProductTaxon;
use Sylius\Component\Core\Model\ProductVariantInterface;
use Sylius\Component\Product\Factory\ProductFactoryInterface;
use Sylius\Component\Product\Generator\SlugGeneratorInterface;
use Sylius\Component\Product\Model\ProductInterface;
use Sylius\Component\Product\Resolver\ProductVariantResolverInterface;
use Sylius\Component\Resource\Factory\FactoryInterface;
use Sylius\Component\Resource\Repository\RepositoryInterface;
use Sylius\Component\Shipping\Model\ShippingCategoryInterface;
use Sylius\Component\Taxonomy\Model\TaxonInterface;
use Sylius\Component\User\Repository\UserRepositoryInterface;
use Webmozart\Assert\Assert;

class ProductContext implements Context
{
    private VendorRepository $vendorRepository;

    private ProductVariantRepository $productVariantRepository;

    private ProductRepository $productRepository;

    private ShopUserExampleFactory $userExampleFactory;

    private EntityManagerInterface $manager;

    private ProductExampleFactory $productExampleFactory;

    private TaxonExampleFactory $taxonFactory;

    private SharedStorageInterface $sharedStorage;

    private RepositoryInterface $shippingMethodRepository;

    private SlugGeneratorInterface $slugGenerator;

    private ProductVariantResolverInterface $defaultVariantResolver;

    private ProductFactoryInterface $productFactory;

    private FactoryInterface $channelPricingFactory;

    private ExampleFactoryInterface $vendorExampleFactory;

    private UserRepositoryInterface $userRepository;

    public function __construct(
        ShopUserExampleFactory $userExampleFactory,
        VendorRepository $vendorRepository,
        ProductVariantRepository $productVariantRepository,
        ProductRepository $productRepository,
        EntityManagerInterface $manager,
        ProductExampleFactory $productExampleFactory,
        TaxonExampleFactory $taxonFactory,
        SharedStorageInterface $sharedStorage,
        RepositoryInterface $shippingMethodRepository,
        SlugGeneratorInterface $slugGenerator,
        ProductVariantResolverInterface $defaultVariantResolver,
        ProductFactoryInterface $productFactory,
        FactoryInterface $channelPricingFactory,
        ExampleFactoryInterface $vendorExampleFactory,
        UserRepositoryInterface $userRepository,
        ) {
        $this->vendorRepository = $vendorRepository;
        $this->productVariantRepository = $productVariantRepository;
        $this->productRepository = $productRepository;
        $this->userExampleFactory = $userExampleFactory;
        $this->manager = $manager;
        $this->productExampleFactory = $productExampleFactory;
        $this->taxonFactory = $taxonFactory;
        $this->sharedStorage = $sharedStorage;
        $this->shippingMethodRepository = $shippingMethodRepository;
        $this->slugGenerator = $slugGenerator;
        $this->defaultVariantResolver = $defaultVariantResolver;
        $this->productFactory = $productFactory;
        $this->channelPricingFactory = $channelPricingFactory;
        $this->vendorExampleFactory = $vendorExampleFactory;
        $this->userRepository = $userRepository;
    }

    /**
     * @Given store has :productsCount products from same Vendor
     */
    public function storeHasProductsFromSameVendor($productsCount): void
    {
        $this->createTaxon();
        $vendor = $this->createDefaultVendor(null);
        for ($i = 1; $i <= $productsCount; ++$i) {
            $products[$i] = $this->createDefaultProduct();
            $products[$i]->setVendor($vendor);
            $this->vendorRepository->add($vendor);
            $this->productRepository->add($products[$i]);
            $this->sharedStorage->set('vendor', $vendor);
            $this->sharedStorage->set('products', $products);
        }
    }

    /**
     * @Given store has :productsCount products from vendor :username
     */
    public function storeHasProductsFromVendorNamed($productsCount, $username): void
    {
        $this->createTaxon();
        /** @var ShopUserInterface $user */
        $user = $this->userRepository->findOneBy(['username' => $username]);
        $vendor = $user->getVendor();
        for ($i = 1; $i <= $productsCount; ++$i) {
            $products[$i] = $this->createDefaultProduct();
            $products[$i]->setVendor($vendor);
            $this->vendorRepository->add($vendor);
            $this->productRepository->add($products[$i]);

            $this->sharedStorage->set('products', $products);
        }
    }

    /**
     * @Given store has :productsCount products created by admin
     */
    public function storeHasProductsFromAdmin($productsCount): void
    {
        $this->createTaxon();
        for ($i = 1; $i <= $productsCount; ++$i) {
            $products[$i] = $this->createDefaultProduct();
            $this->productRepository->add($products[$i]);

            $this->sharedStorage->set('products', $products);
        }
    }

    /**
     * @Given store has :productsCount products from different Vendors
     * @Given store has :productsCount products from different Vendors with default commission settings
     */
    public function storeHasProductsFromDifferentVendors($productsCount)
    {
        $this->createTaxon();
        for ($i = 1; $i <= $productsCount; ++$i) {
            $vendors[$i] = $this->createDefaultVendor($i);
            $products[$i] = $this->createDefaultProduct();
            $products[$i]->setVendor($vendors[$i]);
            $this->vendorRepository->add($vendors[$i]);
            $this->productRepository->add($products[$i]);

            $this->sharedStorage->set('products', $products);
        }
    }

    /**
     * @Given store has :productsCount products from different Vendors with random commission settings
     */
    public function storeHasProductsFromDifferentVendorsWithRandomCommissions($productsCount)
    {
        $this->createTaxon();
        $commissionTypes = [VendorInterface::NET_COMMISSION, VendorInterface::GROSS_COMMISSION];
        for ($i = 1; $i <= $productsCount; ++$i) {
            $vendor = $this->createDefaultVendor($i);
            $vendor->setCommission(rand(1, 10));
            $vendor->setCommissionType($commissionTypes[array_rand($commissionTypes)]);
            $vendors[$i] = $vendor;
            $products[$i] = $this->createDefaultProduct();
            $products[$i]->setVendor($vendors[$i]);
            $this->vendorRepository->add($vendors[$i]);
            $this->productRepository->add($products[$i]);

            $this->sharedStorage->set('products', $products);
        }
    }

    /**
     * @Given store has :vendorsCount vendors with different product each
     */
    public function storeHasVendorsWithDifferentProductEach(int $vendorsCount)
    {
        $name = 'product-';
        $basePrice = 100;
        for ($i = 1; $i <= $vendorsCount; ++$i) {
            $vendors[$i] = $this->createDefaultVendor($i);
            $products[$i] = $this->createProduct(sprintf('%s%d', $name, $i), $vendors[$i], $basePrice * $i);
            $this->vendorRepository->add($vendors[$i]);
            $this->productRepository->add($products[$i]);

            $this->sharedStorage->set('products', $products);
        }
    }

    private function createProduct(
        string $productName,
        VendorInterface $vendor,
        int $price = 100,
        string $date = 'now',
        ChannelInterface $channel = null
    ): \Sylius\Component\Core\Model\ProductInterface {
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

    private function createChannelPricingForChannel(int $price, ChannelInterface $channel = null)
    {
        /** @var ChannelPricingInterface $channelPricing */
        $channelPricing = $this->channelPricingFactory->createNew();
        $channelPricing->setPrice($price);
        $channelPricing->setChannelCode($channel->getCode());

        return $channelPricing;
    }

    /**
     * @Then product on hand count should be :count
     */
    public function productOnHoldCountShouldBe(int $count)
    {
        $product = $this->sharedStorage->get('product');

        $variant = $this->productVariantRepository->findOneBy(['product' => $product]);
        $this->manager->refresh($variant);
        Assert::same($count, $variant->getOnHand());
    }

    /**
     * @Given There is a product with variant code :variant_code owned by logged in vendor
     */
    public function thereIsProductWithVariantCodeOwnedByLoggedInVendor($variant_code)
    {
        $vendor = $this->sharedStorage->get('vendor');

        $this->createTaxon();
        $product = $this->createDefaultProduct();
        $product->setVendor($vendor);
        $product->getVariants()[0]->setCode($variant_code);
        $this->productRepository->add($product);
        $this->sharedStorage->set('product', $product);
    }

    /**
     * @Given one of it belongs to :shippingCategory shipping category
     */
    public function oneOfItBelongsToShippingCategory(ShippingCategoryInterface $shippingCategory)
    {
        $products = $this->sharedStorage->get('products');
        $products[1]->getVariants()->first()->setShippingCategory($shippingCategory);

        $this->manager->flush();
    }

    /**
     * @Given one of it not belongs to :shippingCategory shipping category
     */
    public function oneOfItNotBelongsToShippingCategory(ShippingCategoryInterface $shippingCategory)
    {
        $products = $this->sharedStorage->get('products');
        $products[1]->getVariants()->first()->setShippingCategory(null);

        $this->manager->flush();
    }

    /**
     * @Given vendor uses this shipping method
     */
    public function vendorUsesThisShippingMethod()
    {
        /** @var VendorInterface $vendor */
        $vendor = $this->sharedStorage->get('vendor');
        /** @var VendorShippingMethodInterface $shippingMethod */
        $shippingMethod = $this->shippingMethodRepository->findOneBy(['code' => 'ENVELOPE-US']);
        $vendorShippingMethod = new VendorShippingMethod();
        $vendorShippingMethod->setVendor($vendor);
        $vendorShippingMethod->setShippingMethod($shippingMethod);
        $vendorShippingMethod->setChannelCode($this->sharedStorage->get('channel')->getCode());
        $vendor->addShippingMethod($vendorShippingMethod);
        $this->manager->persist($vendorShippingMethod);
        $this->manager->persist($vendor);
        $this->manager->flush();
    }

    /**
     * @Given product belongs to :taxonSlug taxon
     */
    public function onlyOneProductBelongsToTaxon($taxonSlug)
    {
        $channel = $this->sharedStorage->get('channel');
        $menuTaxon = $channel->getMenuTaxon();
        /** @var TaxonInterface $taxon */
        $taxon = $this->taxonFactory->create();
        $taxon->setCode('code');
        $taxon->setSlug($taxonSlug);
        $taxon->setEnabled(true);

        $taxon->setParent($menuTaxon);

        $products = $this->sharedStorage->get('products');

        $products[1]->setMainTaxon($taxon);

        $productTaxon = new ProductTaxon();
        $productTaxon->setProduct($products[1]);
        $productTaxon->setTaxon($taxon);

        $this->manager->persist($productTaxon);
        $this->manager->persist($products[1]);
        $this->manager->persist($taxon);
        $this->manager->flush();
    }

    /**
     * @Given product has name :name
     */
    public function productHasName($name)
    {
        $products = $this->sharedStorage->get('products');

        $products[1]->setName($name);

        $this->manager->persist($products[1]);

        $this->manager->flush();
    }

    private function createDefaultVendor(?int $iteration): VendorInterface
    {
        if (1 === $iteration) {
            $iteration = null;
        }
        $userFactory = $this->userExampleFactory;
        $user = $userFactory->create();

        $options = [
            'company_name' => 'company',
            'phone_number' => '333',
            'tax_identifier' => '111',
            'slug' => 'SLUG' . "$iteration",
            'description' => 'description',
        ];

        /** @var VendorInterface $vendor */
        $vendor = $this->vendorExampleFactory->create($options);
        $vendor->setShopUser($user);

        $this->manager->persist($user);

        return $vendor;
    }

    private function createDefaultProduct(): ProductInterface
    {
        $factory = $this->productExampleFactory;
        $product = $factory->create();

        return $product;
    }

    private function createTaxon()
    {
        $taxon = $this->taxonFactory->create();
        $channel = $this->sharedStorage->get('channel');
        $channel->setMenuTaxon($taxon);
        $this->manager->persist($channel);
        $this->manager->persist($taxon);
        $this->manager->flush();
    }
}
