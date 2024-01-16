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
use Behat\Mink\Element\DocumentElement;
use Behat\MinkExtension\Context\RawMinkContext;
use BitBag\OpenMarketplace\Component\ProductListing\DraftConverter;
use BitBag\OpenMarketplace\Component\ProductListing\Entity\Draft;
use BitBag\OpenMarketplace\Component\ProductListing\Entity\DraftInterface;
use BitBag\OpenMarketplace\Component\ProductListing\Entity\DraftTranslation;
use BitBag\OpenMarketplace\Component\ProductListing\Entity\Listing;
use BitBag\OpenMarketplace\Component\ProductListing\Entity\ListingPrice;
use Doctrine\ORM\EntityManagerInterface;
use Sylius\Behat\Service\SharedStorageInterface;
use Sylius\Bundle\CoreBundle\Fixture\Factory\ShopUserExampleFactory;
use Sylius\Component\Resource\Factory\FactoryInterface;
use Sylius\Component\Taxation\Model\TaxCategoryInterface;
use Webmozart\Assert\Assert;

final class ProductListingContext extends RawMinkContext implements Context
{
    public function __construct(
        private ShopUserExampleFactory $shopUserExampleFactory,
        private FactoryInterface $vendorFactory,
        private EntityManagerInterface $entityManager,
        private SharedStorageInterface $sharedStorage,
        private DraftConverter $acceptanceOperator,
        private FactoryInterface $taxCategoryExampleFactory,
        ) {
    }

    /**
     * @Given There is a product listing accepted by administrator created by vendor
     */
    public function thereIsAProductListingAcceptedByAdministratorCreatedByVendor()
    {
        $vendor = $this->sharedStorage->get('vendor');

        $productListing = new Listing();
        $productListing->setCode('code');
        $productListing->setVendor($vendor);

        $productDraft = new Draft();
        $productDraft->setCode('code');
        $productDraft->setStatus(DraftInterface::STATUS_UNDER_VERIFICATION);
        $productDraft->setPublishedAt(new \DateTime());
        $productDraft->setVersionNumber(0);
        $productDraft->setProductListing($productListing);
        $productListing->insertDraft($productDraft);

        $productTranslation = new DraftTranslation();
        $productTranslation->setLocale('en_US');
        $productTranslation->setSlug('product-listing-slug');
        $productTranslation->setName('ProductListingName');
        $productTranslation->setDescription('product-listing-');
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

        $this->entityManager->flush();
    }

    /**
     * @Given This product listing has status accepted
     */
    public function thisProductListingHasStatusAccepted()
    {
        $draft = $this->entityManager->getRepository(Draft::class)->findOneBy(['code' => 'code']);
        $newProduct = $this->acceptanceOperator->convertToSimpleProduct($draft);
        $draft->setStatus('verified');
        $this->entityManager->persist($newProduct);
        $this->entityManager->flush();
        $listing = $this->entityManager->getRepository(Listing::class)->findOneBy(['code' => 'code']);
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

    /**
     * @Given there is tax category :categoryName with code :code
     */
    public function thereIsTaxCategoryWithCode(
        $categoryName,
        $code,
    ) {
        /** @var TaxCategoryInterface $taxCategory */
        $taxCategory = $this->taxCategoryExampleFactory->createNew();
        $taxCategory->setName($categoryName);
        $taxCategory->setCode($code);

        $this->entityManager->persist($taxCategory);
        $this->entityManager->flush();
    }

    /**
     * @Given I should see taxCategory :taxCategory for product listing
     */
    public function iShouldSeeTaxCategoryForProductListing($taxCategory)
    {
        $productListingTaxCategory = $this->getPage()
            ->find(
                'css',
                sprintf(
                    'table > tbody > tr > td:contains("%s")',
                    $taxCategory,
                ),
            );
        Assert::notNull($productListingTaxCategory);
    }

    /**
     * @return DocumentElement
     */
    private function getPage()
    {
        return $this->getSession()->getPage();
    }
}
