<?php

declare(strict_types=1);

namespace Tests\BitBag\OpenMarketplace\Behat\Context\Setup;

use Behat\Behat\Context\Context;
use Sylius\Behat\Service\SharedStorageInterface;
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

        $paymentMethod->addChannel($this->sharedStorage->get('channel'));

        $this->paymentMethodRepository->add($paymentMethod);
    }
}
