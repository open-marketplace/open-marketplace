<?php

/*
 * This file has been created by developers from BitBag.
 * Feel free to contact us once you face any issues or want to start
 * You can find more information about us on https://bitbag.io and write us
 * an email on hello@bitbag.io.
 */

declare(strict_types=1);

namespace Tests\BitBag\OpenMarketplace\Behat\Context\Vendor;

use Behat\MinkExtension\Context\RawMinkContext;
use BitBag\OpenMarketplace\Component\ProductListing\Entity\DraftAttribute;
use BitBag\OpenMarketplace\Component\ProductListing\Entity\DraftAttributeTranslation;
use BitBag\OpenMarketplace\Repository\DraftAttributeRepositoryInterface;
use Sylius\Behat\Service\SharedStorageInterface;
use function PHPUnit\Framework\assertTrue;

final class DraftAttributeContext extends RawMinkContext
{
    private SharedStorageInterface $sharedStorage;

    private DraftAttributeRepositoryInterface $attributeRepository;

    public function __construct(
        SharedStorageInterface $sharedStorage,
        DraftAttributeRepositoryInterface $attributeRepository
    ) {
        $this->sharedStorage = $sharedStorage;
        $this->attributeRepository = $attributeRepository;
    }

    /**
     * @When I fill form with :code and name with :name and submit
     */
    public function iFillCodeWithAndNameWith($code, $name)
    {
        $page = $this->getSession()->getPage();
        $codeInput = $page->find('css', '#sylius_product_attribute_code');
        $codeInput->setValue($code);

        $nameInput = $page->find('css', '#sylius_product_attribute_translations_en_US_name');
        $nameInput->setValue($name);

        $submitButton = $page->find('css', '.ui.labeled.icon.primary.button');
        $submitButton->press();
    }

    /**
     * @Then I should see attribute with :arg1 and :arg2 type :type
     */
    public function iShouldSeeAttributeWithAnd(
        $code,
        $name,
        $type
    ) {
        $page = $this->getSession()->getPage();
        $gridTable = $page->find('css', '.ui.sortable.stackable.very.basic.celled.table');
        $rows = $gridTable->findAll('css', '.item');
        foreach ($rows as $row) {
            if (
                str_contains($row->getText(), $code) &&
                str_contains($row->getText(), $name) &&
                str_contains($row->getText(), $type)
            ) {
                $rowWithValueExist = true;
            }
        }

        assertTrue($rowWithValueExist);
    }

    /**
     * @Given I have Attribute type :type name :name code :code
     */
    public function iHaveAttributeTypeNameCode(
        $type,
        $name,
        $code
    ) {
        $vendor = $this->sharedStorage->get('vendor');
        $locale = $this->sharedStorage->get('locale');

        $draftAttributeTranslation = new DraftAttributeTranslation();
        $draftAttributeTranslation->setLocale($locale->getCode());
        $draftAttributeTranslation->setName($name);

        $attribute = new DraftAttribute();
        $draftAttributeTranslation->setTranslatable($attribute);

        $attribute->setTranslatable(false);
        $attribute->setCreatedAt(new \DateTime());
        $attribute->setVendor($vendor);
        $attribute->setCode($code);
        $attribute->setStorageType('text');
        $attribute->addTranslation($draftAttributeTranslation);

        $this->attributeRepository->add($attribute);
    }

    /**
     * @Given I fill product draft form
     */
    public function iFillProductDraftForm()
    {
        $page = $this->getSession()->getPage();

        $codeInput = $page->find('css', '#sylius_product_code');
        $codeInput->setValue('Testingcode');

        $nameInput = $page->find('css', '#sylius_product_translations_en_US_name');
        $nameInput->setValue('TestingName');

        $slugInput = $page->find('css', '#sylius_product_translations_en_US_slug');
        $slugInput->setValue('TestingSlug');

        $priceInput = $page->find('css', '#sylius_product_productListingPrice_WEB-US_price');
        $priceInput->setValue(1);

        $originalPriceInput = $page->find('css', '#sylius_product_productListingPrice_WEB-US_originalPrice');
        $originalPriceInput->setValue(1);

        $priceInput = $page->find('css', '#sylius_product_productListingPrice_WEB-US_price');
        $priceInput->setValue(1);
    }

    /**
     * @Given I pick attribute
     */
    public function iPickAttribute()
    {
        $page = $this->getSession()->getPage();

        $wrapper = $page->find('css', '.ui.fluid.action.input');
        $wrapper->press();

        $div = $page->find('css', '[data-value="name"]');
    }
}
