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
use BitBag\OpenMarketplace\Component\Messaging\Entity\MessageInterface;
use BitBag\OpenMarketplace\Component\Messaging\Factory\CategoryFactoryInterface;
use BitBag\OpenMarketplace\Component\Messaging\Factory\ConversationFactoryInterface;
use BitBag\OpenMarketplace\Component\Messaging\Factory\MessageFactoryInterface;
use BitBag\OpenMarketplace\Component\ProductListing\DraftConverter;
use BitBag\OpenMarketplace\Component\ProductListing\Entity\Draft;
use BitBag\OpenMarketplace\Component\ProductListing\Entity\DraftInterface;
use BitBag\OpenMarketplace\Component\ProductListing\Entity\DraftTranslation;
use BitBag\OpenMarketplace\Component\ProductListing\Entity\DraftTranslationInterface;
use BitBag\OpenMarketplace\Component\ProductListing\Entity\Listing;
use BitBag\OpenMarketplace\Component\ProductListing\Entity\ListingPrice;
use BitBag\OpenMarketplace\Component\ProductListing\Entity\ListingPriceInterface;
use BitBag\OpenMarketplace\Component\Vendor\Entity\VendorInterface;
use Doctrine\ORM\EntityManagerInterface;
use Sylius\Behat\Service\SharedStorageInterface;
use Sylius\Bundle\ApiBundle\Context\UserContextInterface;
use Sylius\Component\Core\Model\AdminUserInterface;
use Sylius\Component\Core\Model\ShopUserInterface;
use Sylius\Component\Resource\Factory\FactoryInterface;
use Sylius\Component\Taxation\Model\TaxCategory;
use Sylius\Component\Taxation\Model\TaxCategoryInterface;
use Symfony\Component\Routing\Generator\UrlGenerator;
use Symfony\Component\Routing\RouterInterface;
use Webmozart\Assert\Assert;

final class ProductListingContext extends RawMinkContext implements Context
{
    public function __construct(
        private EntityManagerInterface $entityManager,
        private SharedStorageInterface $sharedStorage,
        private DraftConverter $acceptanceOperator,
        private FactoryInterface $taxCategoryExampleFactory,
        private ConversationFactoryInterface $conversationFactory,
        private MessageFactoryInterface $messageFactory,
        private CategoryFactoryInterface $categoryFactory,
        private UserContextInterface $userContext,
        private RouterInterface $router,
        ) {
    }

    /**
     * @Given I am on a dashboard page
     */
    public function iAmOnADashboardPage(): void
    {
        $this->visitPath('/en_US/account/dashboard');
    }

    /**
     * @Given I am on a conversations page
     */
    public function iAmOnConversationsPage(): void
    {
        $this->visitPath('/en_US/account/vendor/conversations');
    }

    /**
     * @Given I am on an admin dashboard page
     */
    public function iAmOnAnAdminDashboardPage(): void
    {
        $this->visitPath('/admin');
    }

    /**
     * @Given There is a verified product listing created by vendor
     */
    public function thereIsAVerifiedProductListingCreatedByVendor(): void
    {
        $vendor = $this->sharedStorage->get('vendor');
        $productListing = $this->createProductListing(
            $vendor,
            DraftInterface::STATUS_VERIFIED
        );

        $this->entityManager->persist($productListing);
        $this->entityManager->flush();
    }

    /**
     * @Given There is a rejected product listing created by vendor
     */
    public function thereIsARejectedProductListingCreatedByVendor(): void
    {
        $vendor = $this->sharedStorage->get('vendor');
        $productListing = $this->createProductListing(
            $vendor,
            DraftInterface::STATUS_REJECTED
        );

        $this->entityManager->persist($productListing);
//        $this->entityManager->flush();

        /** @var DraftInterface $draft */
        $draft = $productListing->getLatestDraft();

        $draftViewURL = $this->router->generate(
            'open_marketplace_vendor_product_listings_show',
            [
                'id' => $draft->getId(),
                '_locale' => 'en_US',
            ],
            UrlGenerator::ABSOLUTE_URL
        );

        $category = $this->categoryFactory->createNewWithName(
            'Product listing rejection'
        );

        $this->entityManager->persist($category);

        $conversation = $this->conversationFactory->createNew();
        $conversation->setShopUser($productListing->getVendor()->getShopUser());
        $conversation->setRejectedListingURL($draftViewURL);
        $conversation->setCategory($category);

        $message = $this->createMessage(
            'Listing with selected tax category was rejected',
        );

        $conversation->addMessage($message);

        $this->entityManager->persist($conversation);
        $this->entityManager->flush();
    }

    /**
     * @Given There is an under verification product listing created by vendor
     */
    public function thereIsAUnderVerificationProductListingCreatedByVendor(): void
    {
        $vendor = $this->sharedStorage->get('vendor');
        $productListing = $this->createProductListing(
            $vendor,
            DraftInterface::STATUS_UNDER_VERIFICATION
        );

        $this->entityManager->persist($productListing);
        $this->entityManager->flush();
    }

    private function createProductListing(
        VendorInterface $vendor,
        string $draftStatus,
    ): Listing {
        $productListing = new Listing();
        $productListing->setCode('code');
        $productListing->setVendor($vendor);

        $productDraft = $this->createProductDraft($draftStatus);
        $productDraft->setProductListing($productListing);
        $productListing->insertDraft($productDraft);

        $productTranslation = $this->createProductTranslation($productDraft);
        $this->entityManager->persist($productTranslation);

        $productPricing = $this->createProductPricing($productDraft);
        $this->entityManager->persist($productPricing);

        return $productListing;
    }

    /**
     * @Given This product draft has Tax category named :taxCategoryName
     */
    public function thisProductDraftHasStatusAccepted(string $taxCategoryName): void
    {
        /** @var DraftInterface $productDraft */
        $productDraft = $this->entityManager->getRepository(Draft::class)
            ->findOneBy(['code' => 'code']);

        /** @var TaxCategory $taxCategory */
        $taxCategory = $this->entityManager->getRepository(TaxCategory::class)
            ->findOneBy(['name' => $taxCategoryName]);

        $productDraft->setTaxCategory($taxCategory);
        $this->entityManager->persist($productDraft);
        $this->entityManager->flush();
    }

    /**
     * @Given This product listing has status accepted
     */
    public function thisProductListingHasStatusAccepted(): void
    {
        /** @var DraftInterface $draft */
        $draft = $this->entityManager->getRepository(Draft::class)->findOneBy(['code' => 'code']);
        $newProduct = $this->acceptanceOperator->convertToSimpleProduct($draft);
        $draft->setStatus('verified');
        $this->entityManager->persist($newProduct);
        $this->entityManager->flush();
    }

    /**
     * @Then I click button with id :id
     */
    public function iClickButton($id): void
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
     * @Then I fill in conversation message content with :message
     */
    public function iFillInConversationMessageContentWithMessage($message): void
    {
        $this->getSession()
            ->getPage()
            ->fillField('mvm_conversation[messages][__name__][content]', $message);
    }

    /**
     * @Then I fill in Tax category with :taxCategory
     */
    public function iFillInTaxCategoryWithTaxCategory($taxCategory): void
    {
        $this->getSession()
            ->getPage()
            ->fillField('sylius_product[taxCategory]', $taxCategory);
    }

    /**
     * @Given there is tax category :categoryName with code :code
     */
    public function thereIsTaxCategoryWithCode(
        string $categoryName,
        string $code,
    ): void {
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
    public function iShouldSeeTaxCategoryForProductListing($taxCategory): void
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

    private function createProductDraft($status): DraftInterface
    {
        $productDraft = new Draft();
        $productDraft->setCode('code');
        $productDraft->setStatus($status);
        $productDraft->setPublishedAt(new \DateTime());
        $productDraft->setVersionNumber(0);

        return $productDraft;
    }

    private function createProductTranslation($productDraft): DraftTranslationInterface
    {
        $productTranslation = new DraftTranslation();
        $productTranslation->setLocale('en_US');
        $productTranslation->setSlug('product-listing-slug');
        $productTranslation->setName('ProductListingName');
        $productTranslation->setDescription('product-listing-');
        $productTranslation->setProductDraft($productDraft);

        return $productTranslation;
    }

    private function createProductPricing($productDraft): ListingPriceInterface
    {
        $productPricing = new ListingPrice();
        $productPricing->setProductDraft($productDraft);
        $productPricing->setPrice(1000);
        $productPricing->setOriginalPrice(1000);
        $productPricing->setMinimumPrice(1000);
        $productPricing->setChannelCode('en_US');

        return $productPricing;
    }

    private function createMessage(
        string $content,
    ): MessageInterface {
        /** @var MessageInterface $message */
        $message = $this->messageFactory->createNew();

        $user = $this->userContext->getUser();

        if ($user instanceof AdminUserInterface) {
            $message->setAdminUser($user);
        }

        if ($user instanceof ShopUserInterface) {
            $message->setShopUser($user);
            $message->setAuthor($user);
        }

        $message->setContent($content);

        return $message;
    }
}
