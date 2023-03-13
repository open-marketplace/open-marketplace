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
use BitBag\OpenMarketplace\Entity\Vendor;
use BitBag\OpenMarketplace\Repository\ProductRepository;
use BitBag\OpenMarketplace\Repository\VendorRepository;
use Doctrine\ORM\EntityManagerInterface;
use Sylius\Behat\Service\SharedStorageInterface;
use Sylius\Bundle\CoreBundle\Doctrine\ORM\ProductVariantRepository;
use Sylius\Bundle\CoreBundle\Fixture\Factory\ProductExampleFactory;
use Sylius\Bundle\CoreBundle\Fixture\Factory\ShopUserExampleFactory;
use Sylius\Bundle\CoreBundle\Fixture\Factory\TaxonExampleFactory;
use Sylius\Component\Product\Model\ProductInterface;
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

    public function __construct(
        ShopUserExampleFactory $userExampleFactory,
        VendorRepository $vendorRepository,
        ProductVariantRepository $productVariantRepository,
        ProductRepository $productRepository,
        EntityManagerInterface $manager,
        ProductExampleFactory $productExampleFactory,
        TaxonExampleFactory $taxonFactory,
        SharedStorageInterface $sharedStorage
    ) {
        $this->vendorRepository = $vendorRepository;
        $this->productVariantRepository = $productVariantRepository;
        $this->productRepository = $productRepository;
        $this->userExampleFactory = $userExampleFactory;
        $this->manager = $manager;
        $this->productExampleFactory = $productExampleFactory;
        $this->taxonFactory = $taxonFactory;
        $this->sharedStorage = $sharedStorage;
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
     * @Given store has :productsCount products from different Vendors
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
     * @Then product on hand count should be :count
     */
    public function productOnHoldCountShouldBe(int $count)
    {
        $product = $this->sharedStorage->get('product');

        $variant = $this->productVariantRepository->findOneBy(['product'=>$product]);
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

    private function createDefaultVendor(): Vendor
    {
        $userFactory = $this->userExampleFactory;
        $user = $userFactory->create();
        $vendor = new Vendor();
        $vendor->setShopUser($user);
        $vendor->setCompanyName('company');
        $vendor->setTaxIdentifier('111');
        $vendor->setPhoneNumber('333');
        $vendor->setSlug('SLUG');
        $vendor->setDescription('description');
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
