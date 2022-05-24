<?php

/*
 * This file has been created by developers from BitBag.
 * Feel free to contact us once you face any issues or want to start
 * You can find more information about us on https://bitbag.io and write us
 * an email on hello@bitbag.io.
 */

declare(strict_types=1);

namespace Tests\BitBag\SyliusMultiVendorMarketplacePlugin\Behat\Page;


use FriendsOfBehat\PageObjectExtension\Page\SymfonyPage;
use FriendsOfBehat\PageObjectExtension\Page\SymfonyPageInterface;

class CustomerDashboardPage extends SymfonyPage implements SymfonyPageInterface
{
    public function getRouteName(): string
    {
        return 'sylius_shop_account_dashboard';
    }
    
    public function itemWithValueExistsInsideSidebar($value): bool
    {
        $sidebar = $this->getDocument()->find('css', '.grid .four .menu');
        $links = $sidebar->findAll('css', '.item');
        foreach ($links as $link){
            if($value == $link->getText())
            return true;
        }
        return false;
    }
}
