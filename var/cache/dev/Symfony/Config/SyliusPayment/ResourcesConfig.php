<?php

namespace Symfony\Config\SyliusPayment;

require_once __DIR__.\DIRECTORY_SEPARATOR.'Resources'.\DIRECTORY_SEPARATOR.'PaymentMethodConfig.php';
require_once __DIR__.\DIRECTORY_SEPARATOR.'Resources'.\DIRECTORY_SEPARATOR.'PaymentConfig.php';

use Symfony\Component\Config\Definition\Exception\InvalidConfigurationException;

/**
 * This class is automatically generated to help in creating a config.
 */
class ResourcesConfig 
{
    private $paymentMethod;
    private $payment;
    private $_usedProperties = [];

    public function paymentMethod(array $value = []): \Symfony\Config\SyliusPayment\Resources\PaymentMethodConfig
    {
        if (null === $this->paymentMethod) {
            $this->_usedProperties['paymentMethod'] = true;
            $this->paymentMethod = new \Symfony\Config\SyliusPayment\Resources\PaymentMethodConfig($value);
        } elseif (0 < \func_num_args()) {
            throw new InvalidConfigurationException('The node created by "paymentMethod()" has already been initialized. You cannot pass values the second time you call paymentMethod().');
        }

        return $this->paymentMethod;
    }

    public function payment(array $value = []): \Symfony\Config\SyliusPayment\Resources\PaymentConfig
    {
        if (null === $this->payment) {
            $this->_usedProperties['payment'] = true;
            $this->payment = new \Symfony\Config\SyliusPayment\Resources\PaymentConfig($value);
        } elseif (0 < \func_num_args()) {
            throw new InvalidConfigurationException('The node created by "payment()" has already been initialized. You cannot pass values the second time you call payment().');
        }

        return $this->payment;
    }

    public function __construct(array $value = [])
    {
        if (array_key_exists('payment_method', $value)) {
            $this->_usedProperties['paymentMethod'] = true;
            $this->paymentMethod = new \Symfony\Config\SyliusPayment\Resources\PaymentMethodConfig($value['payment_method']);
            unset($value['payment_method']);
        }

        if (array_key_exists('payment', $value)) {
            $this->_usedProperties['payment'] = true;
            $this->payment = new \Symfony\Config\SyliusPayment\Resources\PaymentConfig($value['payment']);
            unset($value['payment']);
        }

        if ([] !== $value) {
            throw new InvalidConfigurationException(sprintf('The following keys are not supported by "%s": ', __CLASS__).implode(', ', array_keys($value)));
        }
    }

    public function toArray(): array
    {
        $output = [];
        if (isset($this->_usedProperties['paymentMethod'])) {
            $output['payment_method'] = $this->paymentMethod->toArray();
        }
        if (isset($this->_usedProperties['payment'])) {
            $output['payment'] = $this->payment->toArray();
        }

        return $output;
    }

}
