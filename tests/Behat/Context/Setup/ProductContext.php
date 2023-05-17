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
use BitBag\OpenMarketplace\Entity\ShopUserInterface;
use BitBag\OpenMarketplace\Entity\Vendor;
use BitBag\OpenMarketplace\Entity\VendorInterface;
use BitBag\OpenMarketplace\Repository\ProductRepository;
use BitBag\OpenMarketplace\Repository\VendorRepository;
use Doctrine\ORM\EntityManagerInterface;
use Sylius\Behat\Service\SharedStorageInterface;
use Sylius\Bundle\CoreBundle\Doctrine\ORM\ProductVariantRepository;
use Sylius\Bundle\CoreBundle\Fixture\Factory\ExampleFactoryInterface;
use Sylius\Bundle\CoreBundle\Fixture\Factory\ProductExampleFactory;
use Sylius\Bundle\CoreBundle\Fixture\Factory\ShopUserExampleFactory;
use Sylius\Bundle\CoreBundle\Fixture\Factory\TaxonExampleFactory;
use Sylius\Component\Product\Model\ProductInterface;
use Sylius\Component\User\Repository\UserRepositoryInterface;

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
        $this->vendorExampleFactory = $vendorExampleFactory;
        $this->userRepository = $userRepository;
    }

    /**
     * @Given store has :productsCount products from same Vendor
     */
    public function storeHasProductsFromSameVendor($productsCount): void
    {
        $this->createTaxon();
        $vendor = $this->createDefaultVendor();
        for ($i = 1; $i <= $productsCount; ++$i) {
            $products[$i] = $this->createDefaultProduct();
            $products[$i]->setVendor($vendor);
            $this->vendorRepository->add($vendor);
            $this->productRepository->add($products[$i]);

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
            $vendors[$i] = $this->createDefaultVendor();
            $products[$i] = $this->createDefaultProduct();
            $products[$i]->setVendor($vendors[$i]);
            $this->vendorRepository->add($vendors[$i]);
            $this->productRepository->add($products[$i]);

            $this->sharedStorage->set('products', $products);
        }
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

    private function createDefaultVendor(): VendorInterface
    {
        $userFactory = $this->userExampleFactory;
        $user = $userFactory->create();

        $options = [
            'company_name' => 'company',
            'phone_number' => '333',
            'tax_identifier' => '111',
            'slug' => 'SLUG',
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
        $this->manager->persist($taxon);
        $this->manager->flush();
    }
}
