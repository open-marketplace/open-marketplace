<?php

namespace Symfony\Config\SyliusShop\CheckoutResolver;

use Symfony\Component\Config\Loader\ParamConfigurator;
use Symfony\Component\Config\Definition\Exception\InvalidConfigurationException;

/**
 * This class is automatically generated to help in creating a config.
 */
class RouteMapConfig 
{
    private $route;
    private $_usedProperties = [];

    /**
     * @default null
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function route($value): self
    {
        $this->_usedProperties['route'] = true;
        $this->route = $value;

        return $this;
    }

    public function __construct(array $value = [])
    {
        if (array_key_exists('route', $value)) {
            $this->_usedProperties['route'] = true;
            $this->route = $value['route'];
            unset($value['route']);
        }

        if ([] !== $value) {
            throw new InvalidConfigurationException(sprintf('The following keys are not supported by "%s": ', __CLASS__).implode(', ', array_keys($value)));
        }
    }

    public function toArray(): array
    {
        $output = [];
        if (isset($this->_usedProperties['route'])) {
            $output['route'] = $this->route;
        }

        return $output;
    }

}
