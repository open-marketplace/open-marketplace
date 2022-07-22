<?php

/*
 * This file has been created by developers from BitBag.
 * Feel free to contact us once you face any issues or want to start
 * You can find more information about us on https://bitbag.io and write us
 * an email on hello@bitbag.io.
 */

declare(strict_types=1);

namespace Tests\BitBag\SyliusMultiVendorMarketplacePlugin\Behat\Context\Setup;

use Behat\Behat\Context\Context;
use BitBag\SyliusMultiVendorMarketplacePlugin\Entity\Vendor;
use BitBag\SyliusMultiVendorMarketplacePlugin\Repository\ProductRepository;
use BitBag\SyliusMultiVendorMarketplacePlugin\Repository\VendorRepository;
use Doctrine\ORM\EntityManagerInterface;
use Sylius\Behat\Service\SharedStorageInterface;
use Sylius\Bundle\CoreBundle\Doctrine\ORM\ProductVariantRepository;
use Sylius\Bundle\CoreBundle\Fixture\Factory\ProductExampleFactory;
use Sylius\Bundle\CoreBundle\Fixture\Factory\ShopUserExampleFactory;
use Sylius\Bundle\CoreBundle\Fixture\Factory\TaxonExampleFactory;
use Sylius\Component\Product\Model\ProductInterface;
use Sylius\Component\Core\Model\ProductVariant;
use Sylius\Component\Product\Factory\ProductFactory;
use Tests\BitBag\SyliusMultiVendorMarketplacePlugin\Behat\Page\ShowProductPage;

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
     * @Given store has :productsCoun products from same Vendor
     */
    public function storeHasProductsFromSameVendor($productsCount)
    {
    $this->createTaxon();
    $vendor = $this->createDefaultVendor();
    for ($i = 1; $i <= $productsCount; $i++) {

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
        for ($i = 1; $i <= $productsCount; $i++) {
            $vendors[$i] = $this->createDefaultVendor();
            $products[$i] = $this->createDefaultProduct();
            $products[$i]->setVendor($vendors[$i]);
            $this->vendorRepository->add($vendors[$i]);
            $this->productRepository->add($products[$i]);

            $this->sharedStorage->set('products', $products);
        }
    }

    private function createDefaultVendor(): Vendor
    {
        $userFactory = $this->userExampleFactory;
        $user = $userFactory->create();
        $vendor = new Vendor();
        $vendor->setShopUser($user);
        $vendor->setCompanyName("company");
        $vendor->setTaxIdentifier("111");
        $vendor->setPhoneNumber("333");
        $vendor->setSlug("SLUG");
        $vendor->setDescription("description");
        $this->manager->persist($user);

        return $vendor;
    }

    private function createDefaultProduct()//: ProductInterface
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
