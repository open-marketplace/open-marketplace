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
use Behat\MinkExtension\Context\RawMinkContext;
use BitBag\SyliusMultiVendorMarketplacePlugin\AcceptanceOperator\ProductDraftAcceptanceOperator;
use BitBag\SyliusMultiVendorMarketplacePlugin\Entity\ProductListing\ProductDraft;
use BitBag\SyliusMultiVendorMarketplacePlugin\Entity\ProductListing\ProductDraftInterface;
use BitBag\SyliusMultiVendorMarketplacePlugin\Entity\ProductListing\ProductListing;
use BitBag\SyliusMultiVendorMarketplacePlugin\Entity\ProductListing\ProductListingPrice;
use BitBag\SyliusMultiVendorMarketplacePlugin\Entity\ProductListing\ProductTranslation;
use Doctrine\ORM\EntityManagerInterface;
use ECSPrefix20211002\Webmozart\Assert\Assert;
use Sylius\Behat\Service\SharedStorageInterface;
use Sylius\Bundle\CoreBundle\Fixture\Factory\ShopUserExampleFactory;
use Sylius\Component\Resource\Factory\FactoryInterface;

final class ProductListingContext extends RawMinkContext implements Context
{
    private ShopUserExampleFactory $shopUserExampleFactory;

    private FactoryInterface $vendorFactory;

    private EntityManagerInterface $entityManager;

    private SharedStorageInterface $sharedStorage;

    private ProductDraftAcceptanceOperator $acceptanceOperator;

    public function __construct(
        ShopUserExampleFactory $shopUserExampleFactory,
        FactoryInterface $vendorFactory,
        EntityManagerInterface $entityManager,
        SharedStorageInterface $sharedStorage,
        ProductDraftAcceptanceOperator $acceptanceOperator
    ) {
        $this->shopUserExampleFactory = $shopUserExampleFactory;
        $this->vendorFactory = $vendorFactory;
        $this->entityManager = $entityManager;
        $this->sharedStorage = $sharedStorage;
        $this->acceptanceOperator = $acceptanceOperator;
    }

    /**
     * @Given There is a product listing accepted by administrator created by vendor
     */
    public function thereIsAProductListingAcceptedByAdministratorCreatedByVendor()
    {
        $vendor = $this->sharedStorage->get('vendor');

        $productListing = new ProductListing();
        $productListing->setCode('code');
        $productListing->setVendor($vendor);

        $productDraft = new ProductDraft();
        $productDraft->setCode('code');
        $productDraft->setStatus(ProductDraftInterface::STATUS_UNDER_VERIFICATION);
        $productDraft->setPublishedAt(new \DateTime());
        $productDraft->setVersionNumber(0);
        $productDraft->setProductListing($productListing);

        $productTranslation = new ProductTranslation();
        $productTranslation->setLocale('en_US');
        $productTranslation->setSlug('product-listing-slug');
        $productTranslation->setName('product-listing-');
        $productTranslation->setDescription('product-listing-');
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

        $this->entityManager->flush();
    }

    /**
     * @Given This product listing has status accepted
     */
    public function thisProductListingHasStatusAccepted()
    {
        $draft = $this->entityManager->getRepository(ProductDraft::class)->findOneBy(['code' => 'code']);
        $newProduct = $this->acceptanceOperator->acceptProductDraft($draft);
        $draft->setStatus('verified');
        $this->entityManager->persist($newProduct);
        $this->entityManager->flush();
        $listing = $this->entityManager->getRepository(ProductListing::class)->findOneBy(['code' => 'code']);
    }

    /**
     * @Then I click button with id :id
     */
    public function iClickButton($id)
    {
        $page = $this->getSession()->getPage();
        $button = $page->find('css', '#' . $id);
        $button->press();
    }

    /**
     * @Then I should be notified no page exits
     */
    public function iShouldBeNotifiedNoPageExits()
    {
        $status = $this->getSession()->getStatusCode();
        Assert::eq($status, 404);
    }
}
