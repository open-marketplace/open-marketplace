<?php

/*
 * This file has been created by developers from BitBag.
 * Feel free to contact us once you face any issues or want to start
 * You can find more information about us on https://bitbag.io and write us
 * an email on hello@bitbag.io.
 */

declare(strict_types=1);

namespace Tests\BitBag\OpenMarketplace\Behat\Page\Shop\Vendor;

use Sylius\Behat\Page\Admin\Crud\IndexPage;

final class ProductListingIndexPage extends IndexPage implements ProductListingIndexPageInterface
{
    public function confirmAction(): void
    {
        $this->getElement('confirmation_button')->click();
    }

    public function openActionDropdown(): void
    {
        $this->getElement('action_dropdown')->click();
    }

    protected function getDefinedElements(): array
    {
        return array_merge(parent::getDefinedElements(), [
            'action_dropdown' => '.ui.labeled.icon.floating.dropdown.link.button',
        ]);
    }
}
