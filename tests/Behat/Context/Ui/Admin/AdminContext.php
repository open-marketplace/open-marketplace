<?php

/*
 * This file has been created by developers from BitBag.
 * Feel free to contact us once you face any issues or want to start
 * You can find more information about us on https://bitbag.io and write us
 * an email on hello@bitbag.io.
 */

declare(strict_types=1);

namespace Tests\BitBag\OpenMarketplace\Behat\Context\Ui\Admin;

use Behat\Mink\Element\DocumentElement;
use Behat\MinkExtension\Context\RawMinkContext;

final class AdminContext extends RawMinkContext
{
    /**
     * @Given I am logged in as an admin
     */
    public function iAmLoggedInAsAnAdmin(): void
    {
        $this->visitPath('/admin/login');
        $page = $this->getPage();
        $page->fillField('Username', 'admin');
        $page->fillField('Password', 'admin');
        $page->pressButton('Login');
    }

    private function getPage(): DocumentElement
    {
        return $this->getSession()->getPage();
    }
}
