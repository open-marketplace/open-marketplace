<?php

/*
 * This file has been created by developers from BitBag.
 * Feel free to contact us once you face any issues or want to start
 * You can find more information about us on https://bitbag.io and write us
 * an email on hello@bitbag.io.
 */

declare(strict_types=1);

namespace Tests\BitBag\SyliusMultiVendorMarketplacePlugin\Behat\Page;

use Behat\Mink\Driver\Selenium2Driver;
use DMore\ChromeDriver\ChromeDriver;
use FriendsOfBehat\PageObjectExtension\Page\SymfonyPage;
use Sylius\Behat\Service\JQueryHelper;

class ShowProductPage extends SymfonyPage
{
    public function getRouteName(): string
    {
        return 'sylius_shop_product_show';
    }

    public function addToCart(): void
    {
        $addToCart = $this->getDocument()->find("css","button");
        $addToCart->click();
    }

    private function waitForCartSummary(): void
    {
        if ($this->getDriver() instanceof Selenium2Driver || $this->getDriver() instanceof ChromeDriver) {
            JQueryHelper::waitForAsynchronousActionsToFinish($this->getSession());
            $this->getDocument()->waitFor(3, function (): bool {
                return $this->summaryPage->isOpen();
            });
        }
    }
}
