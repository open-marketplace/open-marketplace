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

final class InventoryContext extends RawMinkContext
{
    /**
     * @Given I submit inventory form
     */
    public function iSubmitInventoryForm(): void
    {
        $page = $this->getSession()->getPage();
        $element = $page->find('css', '#sylius_save_changes_button');
        $element->press();
    }

    /**
     * @Given I set product as tracked
     */
    public function iSetTracked(): void
    {
        $page = $this->getSession()->getPage();
        $element = $page->find('css', '#sylius_product_variant_tracked');
        $element->setValue(true);
    }

    /**
     * @Given I set product as untracked
     */
    public function iSetUntracked(): void
    {
        $page = $this->getSession()->getPage();
        $element = $page->find('css', '#sylius_product_variant_tracked');
        $element->setValue(false);
    }
}
