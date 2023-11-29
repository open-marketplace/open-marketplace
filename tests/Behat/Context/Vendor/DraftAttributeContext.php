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
use function PHPUnit\Framework\assertTrue;

final class DraftAttributeContext extends RawMinkContext
{
    /**
     * @When I fill form with :code and name with :name and submit
     */
    public function iFillCodeWithAndNameWith(string $code, string $name): void
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
     * @Then I should see attribute with :code and :name type :type
     */
    public function iShouldSeeAttributeWithAnd(
        string $code,
        string $name,
        string $type
    ): void {
        $page = $this->getSession()->getPage();
        $gridTable = $page->find('css', '.ui.sortable.stackable.very.basic.celled.table');
        $rows = $gridTable->findAll('css', '.item');
        $rowWithValueExist = false;
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
}
