<?php

namespace Symfony\Config\Payum\StoragesConfig;

use Symfony\Component\Config\Loader\ParamConfigurator;
use Symfony\Component\Config\Definition\Exception\InvalidConfigurationException;

/**
 * This class is automatically generated to help in creating a config.
 */
class ExtensionConfig 
{
    private $all;
    private $gateways;
    private $factories;
    private $_usedProperties = [];

    /**
     * @default true
     * @param ParamConfigurator|bool $value
     * @return $this
     */
    public function all($value): self
    {
        $this->_usedProperties['all'] = true;
        $this->all = $value;

        return $this;
    }

    /**
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function gateways(string $key, $value): self
    {
        $this->_usedProperties['gateways'] = true;
        $this->gateways[$key] = $value;

        return $this;
    }

    /**
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function factories(string $key, $value): self
    {
        $this->_usedProperties['factories'] = true;
        $this->factories[$key] = $value;

        return $this;
    }

    public function __construct(array $value = [])
    {
        if (array_key_exists('all', $value)) {
            $this->_usedProperties['all'] = true;
            $this->all = $value['all'];
            unset($value['all']);
        }

        if (array_key_exists('gateways', $value)) {
            $this->_usedProperties['gateways'] = true;
            $this->gateways = $value['gateways'];
            unset($value['gateways']);
        }

        if (array_key_exists('factories', $value)) {
            $this->_usedProperties['factories'] = true;
            $this->factories = $value['factories'];
            unset($value['factories']);
        }

        if ([] !== $value) {
            throw new InvalidConfigurationException(sprintf('The following keys are not supported by "%s": ', __CLASS__).implode(', ', array_keys($value)));
        }
    }

    public function toArray(): array
    {
        $output = [];
        if (isset($this->_usedProperties['all'])) {
            $output['all'] = $this->all;
        }
        if (isset($this->_usedProperties['gateways'])) {
            $output['gateways'] = $this->gateways;
        }
        if (isset($this->_usedProperties['factories'])) {
            $output['factories'] = $this->factories;
        }

        return $output;
    }

}
