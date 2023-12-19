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
use Sylius\Behat\Service\SharedStorageInterface;
use Sylius\Bundle\PayumBundle\Model\GatewayConfig;
use Sylius\Component\Core\Factory\PaymentMethodFactoryInterface;
use Sylius\Component\Core\Model\PaymentMethodInterface;
use Sylius\Component\Core\Repository\PaymentMethodRepositoryInterface;

final class PaymentMethodContext implements Context
{
    public function __construct(
        private PaymentMethodRepositoryInterface $paymentMethodRepository,
        private PaymentMethodFactoryInterface $paymentMethodFactory,
        private SharedStorageInterface $sharedStorage
    ) {
    }

    /**
     * @Given store has payment method :arg1 with code :arg2
     */
    public function storeHasPaymentMethodWithCode(string $paymentMethodName, string $paymentMethodCode): void
    {
        /** @var PaymentMethodInterface $paymentMethod */
        $paymentMethod = $this->paymentMethodFactory->createNew();
        $paymentMethod->setName($paymentMethodName);
        $paymentMethod->setCode($paymentMethodCode);

        $gateway = new GatewayConfig();
        $gateway->setGatewayName('offline');
        $gateway->setFactoryName('offline');
        $gateway->setConfig([]);

        $paymentMethod->addChannel($this->sharedStorage->get('channel'));
        $paymentMethod->setGatewayConfig($gateway);

        $this->paymentMethodRepository->add($paymentMethod);
    }
}
