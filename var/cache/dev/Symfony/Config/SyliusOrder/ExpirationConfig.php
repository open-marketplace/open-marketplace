<?php

namespace Symfony\Config\SyliusOrder;

use Symfony\Component\Config\Loader\ParamConfigurator;
use Symfony\Component\Config\Definition\Exception\InvalidConfigurationException;

/**
 * This class is automatically generated to help in creating a config.
 */
class ExpirationConfig 
{
    private $cart;
    private $order;
    private $_usedProperties = [];

    /**
     * @default '2 days'
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function cart($value): self
    {
        $this->_usedProperties['cart'] = true;
        $this->cart = $value;

        return $this;
    }

    /**
     * @default '5 days'
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function order($value): self
    {
        $this->_usedProperties['order'] = true;
        $this->order = $value;

        return $this;
    }

    public function __construct(array $value = [])
    {
        if (array_key_exists('cart', $value)) {
            $this->_usedProperties['cart'] = true;
            $this->cart = $value['cart'];
            unset($value['cart']);
        }

        if (array_key_exists('order', $value)) {
            $this->_usedProperties['order'] = true;
            $this->order = $value['order'];
            unset($value['order']);
        }

        if ([] !== $value) {
            throw new InvalidConfigurationException(sprintf('The following keys are not supported by "%s": ', __CLASS__).implode(', ', array_keys($value)));
        }
    }

    public function toArray(): array
    {
        $output = [];
        if (isset($this->_usedProperties['cart'])) {
            $output['cart'] = $this->cart;
        }
        if (isset($this->_usedProperties['order'])) {
            $output['order'] = $this->order;
        }

        return $output;
    }

}
