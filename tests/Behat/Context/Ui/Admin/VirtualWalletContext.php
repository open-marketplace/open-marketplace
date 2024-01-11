<?php

/*
 * This file has been created by developers from BitBag.
 * Feel free to contact us once you face any issues or want to start
 * You can find more information about us on https://bitbag.io and write us
 * an email on hello@bitbag.io.
 */

declare(strict_types=1);

namespace Tests\BitBag\OpenMarketplace\Behat\Context\Ui\Admin;

use Behat\MinkExtension\Context\RawMinkContext;
use Sylius\Behat\Service\SharedStorageInterface;
use Tests\BitBag\OpenMarketplace\Behat\Page\Admin\VirtualWalletPageInterface;
use Webmozart\Assert\Assert;

final class VirtualWalletContext extends RawMinkContext
{
    public function __construct(
        private VirtualWalletPageInterface $virtualWalletPage,
        private SharedStorageInterface $sharedStorage,
    ) {
    }

    /**
     * @When I visit the admin virtual wallets page
     */
    public function iVisitTheAdminVirtualWalletsPage(): void
    {
        $this->virtualWalletPage->open();
    }

    /**
     * @When I filter virtual wallets by vendor :vendor
     */
    public function iFilterVirtualWalletsByVendor(string $vendor): void
    {
        $this->virtualWalletPage->filterByVendor($vendor);
    }

    /**
     * @Then I filter virtual wallets by channel :channelName
     */
    public function iFilterVirtualWalletsByChannel(string $channelName): void
    {
        $this->virtualWalletPage->filterByChannel($channelName);
    }

    /**
     * @Then I should see virtual wallet for channel :channelName first
     */
    public function iShouldSeeVirtualWalletForChannelFirst(string $channelName): void
    {
        $sorting = $this->sharedStorage->get('sorting');

        $sortedVirtualWallets = $this->virtualWalletPage->getSortedVirtualWallets($sorting);
        $firstVirtualWallet = $sortedVirtualWallets[0];

        Assert::contains($firstVirtualWallet->getText(), $channelName);
    }

    /**
     * @Then I should see virtual wallet for vendor :vendorName first
     */
    public function iShouldSeeVirtualWalletForVendorFirst(string $vendorName): void
    {
        $sorting = $this->sharedStorage->get('sorting');

        $virtualWallets = $this->virtualWalletPage->getSortedVirtualWallets($sorting);
        $firstVirtualWallet = $virtualWallets[0];

        Assert::contains($firstVirtualWallet->getText(), $vendorName);
    }

    /**
     * @When I should see :count virtual wallets
     */
    public function iSeeVirtualWallets(string $count): void
    {
        $settlements = $this->virtualWalletPage->getVirtualWallets();

        Assert::eq(count($settlements), $count);
    }

    /**
     * @Then I should see :amount as balance for :channelName channel
     */
    public function iShouldSeeAsBalanceForChannel(string $amount, string $channelName): void
    {
        $this->virtualWalletPage->checkExistsVirtualWalletForAmountAndChannel($amount, $channelName);
    }
}
