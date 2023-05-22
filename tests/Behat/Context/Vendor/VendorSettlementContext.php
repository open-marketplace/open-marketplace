<?php

/*
 * This file has been created by developers from BitBag.
 * Feel free to contact us once you face any issues or want to start
 * You can find more information about us on https://bitbag.io and write us
 * an email on hello@bitbag.io.
 */

declare(strict_types=1);

namespace Tests\BitBag\OpenMarketplace\Behat\Context\Vendor;

use Behat\Behat\Context\Context;
use Behat\MinkExtension\Context\MinkContext;
use BitBag\OpenMarketplace\Entity\OrderInterface;
use BitBag\OpenMarketplace\Entity\VendorSettlementInterface;
use Doctrine\ORM\EntityManagerInterface;
use Sylius\Behat\Service\SharedStorageInterface;
use Sylius\Component\Core\Repository\OrderRepositoryInterface;
use Webmozart\Assert\Assert;

final class VendorSettlementContext extends MinkContext implements Context
{
    private OrderRepositoryInterface $orderRepository;

    private EntityManagerInterface $entityManager;

    private SharedStorageInterface $sharedStorage;

    public function __construct(
        OrderRepositoryInterface $orderRepository,
        EntityManagerInterface $entityManager,
        SharedStorageInterface $sharedStorage
    ) {
        $this->orderRepository = $orderRepository;
        $this->entityManager = $entityManager;
        $this->sharedStorage = $sharedStorage;
    }

    /**
     * @Then commission should be calculated for each secondary order
     */
    public function commissionShouldBeCalculatedForEachSecondaryOrder()
    {
        $orders = $this->orderRepository->findBy(['mode' => OrderInterface::SECONDARY_ORDER_MODE]);

        /** @var OrderInterface $order */
        foreach ($orders as $order) {
            $vendor = $order->getVendor();
            $settlement = $vendor->getVendorSettlement();
            $validCommissionTotal =
                match ($settlement->getCommissionType()) {
                    VendorSettlementInterface::NET_COMMISSION => $this->calculateNetCommision($order, $settlement->getCommission()),
                    VendorSettlementInterface::GROSS_COMMISSION => $this->calculateGrossCommision($order, $settlement->getCommission()),
                    default => throw new \InvalidArgumentException('Invalid Commission Type')
                };

            Assert::eq($order->getCommissionTotal(), $validCommissionTotal);
        }
    }

    /**
     * @Then commissions should not be calculated for primary orders
     */
    public function commissionShouldNotBeCalculatedForPrimaryOrders()
    {
        $orders = $this->orderRepository->findBy(['mode' => OrderInterface::PRIMARY_ORDER_MODE]);

        /** @var OrderInterface $order */
        foreach ($orders as $order) {
            Assert::eq(0, $order->getCommissionTotal());
        }
    }

    /**
     * @Then /^I should see valid commission information's$/
     */
    public function iShouldSeeCommissionInformations()
    {
        $text = $this->getSession()->getPage()->getText();

        Assert::true(str_contains($text, 'Commission (Included in price)'));
        Assert::true(str_contains($text, 'Commission:'));

        $urlArray = explode('/', $this->getSession()->getCurrentUrl());
        $orderId = (int) end($urlArray);
        /** @var OrderInterface $order */
        $order = $this->orderRepository->find($orderId);
        $decimalCommission = number_format($order->getCommissionTotal() / 100, 2, '.', ',');

        $this->commissionDisplayedShouldBeEqual($decimalCommission);
    }

    /**
     * @Then /^I should see no commission$/
     */
    public function iShouldSeeNoCommission()
    {
        $text = $this->getSession()->getPage()->getText();

        Assert::true(str_contains($text, 'Commission (Included in price)'));
        Assert::true(str_contains($text, 'Commission:'));
        $this->commissionDisplayedShouldBeEqual('0.00');
    }

    /**
     * @Then I should get commission value validation error
     */
    public function iShouldGetValidationError()
    {
        $page = $this->getSession()->getPage();
        $this->getSession()->reload();

        $label = $page->find('css', '.ui.red.label.sylius-validation-error');
        Assert::eq($label->getText(), 'Commission value must be positive or zero');
    }

    private function commissionDisplayedShouldBeEqual(string $value)
    {
        $text = $this->getSession()->getPage()->getText();
        $pattern = '/Commission: \$([\d.,]+)/';
        preg_match($pattern, $text, $matches);
        Assert::eq($matches[1], $value);
    }

    private function calculateNetCommision(OrderInterface $order, int $commission): int
    {
        $floatTotal = $order->getItemsTotal() / 100;

        $floatCommission = round(($floatTotal * ($commission / 100)), 2);
        $intCommission = $floatCommission * 100;

        return (int) $intCommission;
    }

    private function calculateGrossCommision(OrderInterface $order, int $commission): int
    {
        $commission = $order->getVendor()->getVendorSettlement()->getCommission();

        $floatTotal = $order->getTotal() / 100;

        $floatCommission = round(($floatTotal * ($commission / 100)), 2);
        $intCommission = $floatCommission * 100;

        return (int) $intCommission;
    }
}
