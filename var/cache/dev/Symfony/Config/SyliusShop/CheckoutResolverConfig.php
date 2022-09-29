<?php

namespace Symfony\Config\SyliusShop;

require_once __DIR__.\DIRECTORY_SEPARATOR.'CheckoutResolver'.\DIRECTORY_SEPARATOR.'RouteMapConfig.php';

use Symfony\Component\Config\Loader\ParamConfigurator;
use Symfony\Component\Config\Definition\Exception\InvalidConfigurationException;

/**
 * This class is automatically generated to help in creating a config.
 */
class CheckoutResolverConfig 
{
    private $enabled;
    private $pattern;
    private $routeMap;
    private $_usedProperties = [];

    /**
     * @default true
     * @param ParamConfigurator|bool $value
     * @return $this
     */
    public function enabled($value): self
    {
        $this->_usedProperties['enabled'] = true;
        $this->enabled = $value;

        return $this;
    }

    /**
     * @default '/checkout/.+'
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function pattern($value): self
    {
        $this->_usedProperties['pattern'] = true;
        $this->pattern = $value;

        return $this;
    }

    public function routeMap(string $name, array $value = []): \Symfony\Config\SyliusShop\CheckoutResolver\RouteMapConfig
    {
        if (!isset($this->routeMap[$name])) {
            $this->_usedProperties['routeMap'] = true;
            $this->routeMap[$name] = new \Symfony\Config\SyliusShop\CheckoutResolver\RouteMapConfig($value);
        } elseif (1 < \func_num_args()) {
            throw new InvalidConfigurationException('The node created by "routeMap()" has already been initialized. You cannot pass values the second time you call routeMap().');
        }

        return $this->routeMap[$name];
    }

    public function __construct(array $value = [])
    {
        if (array_key_exists('enabled', $value)) {
            $this->_usedProperties['enabled'] = true;
            $this->enabled = $value['enabled'];
            unset($value['enabled']);
        }

        if (array_key_exists('pattern', $value)) {
            $this->_usedProperties['pattern'] = true;
            $this->pattern = $value['pattern'];
            unset($value['pattern']);
        }

        if (array_key_exists('route_map', $value)) {
            $this->_usedProperties['routeMap'] = true;
            $this->routeMap = array_map(function ($v) { return new \Symfony\Config\SyliusShop\CheckoutResolver\RouteMapConfig($v); }, $value['route_map']);
            unset($value['route_map']);
        }

        if ([] !== $value) {
            throw new InvalidConfigurationException(sprintf('The following keys are not supported by "%s": ', __CLASS__).implode(', ', array_keys($value)));
        }
    }

    public function toArray(): array
    {
        $output = [];
        if (isset($this->_usedProperties['enabled'])) {
            $output['enabled'] = $this->enabled;
        }
        if (isset($this->_usedProperties['pattern'])) {
            $output['pattern'] = $this->pattern;
        }
        if (isset($this->_usedProperties['routeMap'])) {
            $output['route_map'] = array_map(function ($v) { return $v->toArray(); }, $this->routeMap);
        }

        return $output;
    }

}
