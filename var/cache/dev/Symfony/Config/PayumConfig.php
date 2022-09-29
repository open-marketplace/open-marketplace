<?php

namespace Symfony\Config;

require_once __DIR__.\DIRECTORY_SEPARATOR.'Payum'.\DIRECTORY_SEPARATOR.'SecurityConfig.php';
require_once __DIR__.\DIRECTORY_SEPARATOR.'Payum'.\DIRECTORY_SEPARATOR.'DynamicGatewaysConfig.php';
require_once __DIR__.\DIRECTORY_SEPARATOR.'Payum'.\DIRECTORY_SEPARATOR.'StoragesConfig.php';

use Symfony\Component\Config\Definition\Exception\InvalidConfigurationException;
use Symfony\Component\Config\Loader\ParamConfigurator;

/**
 * This class is automatically generated to help in creating a config.
 */
class PayumConfig implements \Symfony\Component\Config\Builder\ConfigBuilderInterface
{
    private $security;
    private $dynamicGateways;
    private $gateways;
    private $storages;
    private $_usedProperties = [];

    public function security(array $value = []): \Symfony\Config\Payum\SecurityConfig
    {
        if (null === $this->security) {
            $this->_usedProperties['security'] = true;
            $this->security = new \Symfony\Config\Payum\SecurityConfig($value);
        } elseif (0 < \func_num_args()) {
            throw new InvalidConfigurationException('The node created by "security()" has already been initialized. You cannot pass values the second time you call security().');
        }

        return $this->security;
    }

    public function dynamicGateways(array $value = []): \Symfony\Config\Payum\DynamicGatewaysConfig
    {
        if (null === $this->dynamicGateways) {
            $this->_usedProperties['dynamicGateways'] = true;
            $this->dynamicGateways = new \Symfony\Config\Payum\DynamicGatewaysConfig($value);
        } elseif (0 < \func_num_args()) {
            throw new InvalidConfigurationException('The node created by "dynamicGateways()" has already been initialized. You cannot pass values the second time you call dynamicGateways().');
        }

        return $this->dynamicGateways;
    }

    /**
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function gateways(string $name, $value): self
    {
        $this->_usedProperties['gateways'] = true;
        $this->gateways[$name] = $value;

        return $this;
    }

    public function storages(string $key, array $value = []): \Symfony\Config\Payum\StoragesConfig
    {
        if (!isset($this->storages[$key])) {
            $this->_usedProperties['storages'] = true;
            $this->storages[$key] = new \Symfony\Config\Payum\StoragesConfig($value);
        } elseif (1 < \func_num_args()) {
            throw new InvalidConfigurationException('The node created by "storages()" has already been initialized. You cannot pass values the second time you call storages().');
        }

        return $this->storages[$key];
    }

    public function getExtensionAlias(): string
    {
        return 'payum';
    }

    public function __construct(array $value = [])
    {
        if (array_key_exists('security', $value)) {
            $this->_usedProperties['security'] = true;
            $this->security = new \Symfony\Config\Payum\SecurityConfig($value['security']);
            unset($value['security']);
        }

        if (array_key_exists('dynamic_gateways', $value)) {
            $this->_usedProperties['dynamicGateways'] = true;
            $this->dynamicGateways = new \Symfony\Config\Payum\DynamicGatewaysConfig($value['dynamic_gateways']);
            unset($value['dynamic_gateways']);
        }

        if (array_key_exists('gateways', $value)) {
            $this->_usedProperties['gateways'] = true;
            $this->gateways = $value['gateways'];
            unset($value['gateways']);
        }

        if (array_key_exists('storages', $value)) {
            $this->_usedProperties['storages'] = true;
            $this->storages = array_map(function ($v) { return new \Symfony\Config\Payum\StoragesConfig($v); }, $value['storages']);
            unset($value['storages']);
        }

        if ([] !== $value) {
            throw new InvalidConfigurationException(sprintf('The following keys are not supported by "%s": ', __CLASS__).implode(', ', array_keys($value)));
        }
    }

    public function toArray(): array
    {
        $output = [];
        if (isset($this->_usedProperties['security'])) {
            $output['security'] = $this->security->toArray();
        }
        if (isset($this->_usedProperties['dynamicGateways'])) {
            $output['dynamic_gateways'] = $this->dynamicGateways->toArray();
        }
        if (isset($this->_usedProperties['gateways'])) {
            $output['gateways'] = $this->gateways;
        }
        if (isset($this->_usedProperties['storages'])) {
            $output['storages'] = array_map(function ($v) { return $v->toArray(); }, $this->storages);
        }

        return $output;
    }

}
