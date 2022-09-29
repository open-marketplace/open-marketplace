<?php

namespace Symfony\Config;

use Symfony\Component\Config\Loader\ParamConfigurator;
use Symfony\Component\Config\Definition\Exception\InvalidConfigurationException;

/**
 * This class is automatically generated to help in creating a config.
 */
class SyliusMoneyConfig implements \Symfony\Component\Config\Builder\ConfigBuilderInterface
{
    private $locale;
    private $currency;
    private $_usedProperties = [];

    /**
     * @default 'en'
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function locale($value): self
    {
        $this->_usedProperties['locale'] = true;
        $this->locale = $value;

        return $this;
    }

    /**
     * @default 'USD'
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function currency($value): self
    {
        $this->_usedProperties['currency'] = true;
        $this->currency = $value;

        return $this;
    }

    public function getExtensionAlias(): string
    {
        return 'sylius_money';
    }

    public function __construct(array $value = [])
    {
        if (array_key_exists('locale', $value)) {
            $this->_usedProperties['locale'] = true;
            $this->locale = $value['locale'];
            unset($value['locale']);
        }

        if (array_key_exists('currency', $value)) {
            $this->_usedProperties['currency'] = true;
            $this->currency = $value['currency'];
            unset($value['currency']);
        }

        if ([] !== $value) {
            throw new InvalidConfigurationException(sprintf('The following keys are not supported by "%s": ', __CLASS__).implode(', ', array_keys($value)));
        }
    }

    public function toArray(): array
    {
        $output = [];
        if (isset($this->_usedProperties['locale'])) {
            $output['locale'] = $this->locale;
        }
        if (isset($this->_usedProperties['currency'])) {
            $output['currency'] = $this->currency;
        }

        return $output;
    }

}
