<?php

namespace Symfony\Config\SyliusCurrency;

require_once __DIR__.\DIRECTORY_SEPARATOR.'Resources'.\DIRECTORY_SEPARATOR.'CurrencyConfig.php';
require_once __DIR__.\DIRECTORY_SEPARATOR.'Resources'.\DIRECTORY_SEPARATOR.'ExchangeRateConfig.php';

use Symfony\Component\Config\Definition\Exception\InvalidConfigurationException;

/**
 * This class is automatically generated to help in creating a config.
 */
class ResourcesConfig 
{
    private $currency;
    private $exchangeRate;
    private $_usedProperties = [];

    public function currency(array $value = []): \Symfony\Config\SyliusCurrency\Resources\CurrencyConfig
    {
        if (null === $this->currency) {
            $this->_usedProperties['currency'] = true;
            $this->currency = new \Symfony\Config\SyliusCurrency\Resources\CurrencyConfig($value);
        } elseif (0 < \func_num_args()) {
            throw new InvalidConfigurationException('The node created by "currency()" has already been initialized. You cannot pass values the second time you call currency().');
        }

        return $this->currency;
    }

    public function exchangeRate(array $value = []): \Symfony\Config\SyliusCurrency\Resources\ExchangeRateConfig
    {
        if (null === $this->exchangeRate) {
            $this->_usedProperties['exchangeRate'] = true;
            $this->exchangeRate = new \Symfony\Config\SyliusCurrency\Resources\ExchangeRateConfig($value);
        } elseif (0 < \func_num_args()) {
            throw new InvalidConfigurationException('The node created by "exchangeRate()" has already been initialized. You cannot pass values the second time you call exchangeRate().');
        }

        return $this->exchangeRate;
    }

    public function __construct(array $value = [])
    {
        if (array_key_exists('currency', $value)) {
            $this->_usedProperties['currency'] = true;
            $this->currency = new \Symfony\Config\SyliusCurrency\Resources\CurrencyConfig($value['currency']);
            unset($value['currency']);
        }

        if (array_key_exists('exchange_rate', $value)) {
            $this->_usedProperties['exchangeRate'] = true;
            $this->exchangeRate = new \Symfony\Config\SyliusCurrency\Resources\ExchangeRateConfig($value['exchange_rate']);
            unset($value['exchange_rate']);
        }

        if ([] !== $value) {
            throw new InvalidConfigurationException(sprintf('The following keys are not supported by "%s": ', __CLASS__).implode(', ', array_keys($value)));
        }
    }

    public function toArray(): array
    {
        $output = [];
        if (isset($this->_usedProperties['currency'])) {
            $output['currency'] = $this->currency->toArray();
        }
        if (isset($this->_usedProperties['exchangeRate'])) {
            $output['exchange_rate'] = $this->exchangeRate->toArray();
        }

        return $output;
    }

}
