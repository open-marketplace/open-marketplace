<?php

namespace Symfony\Config\SyliusApi;

require_once __DIR__.\DIRECTORY_SEPARATOR.'FilterEagerLoadingExtension'.\DIRECTORY_SEPARATOR.'RestrictedResourcesConfig.php';

use Symfony\Component\Config\Definition\Exception\InvalidConfigurationException;

/**
 * This class is automatically generated to help in creating a config.
 */
class FilterEagerLoadingExtensionConfig 
{
    private $restrictedResources;
    private $_usedProperties = [];

    public function restrictedResources(string $name, array $value = []): \Symfony\Config\SyliusApi\FilterEagerLoadingExtension\RestrictedResourcesConfig
    {
        if (!isset($this->restrictedResources[$name])) {
            $this->_usedProperties['restrictedResources'] = true;
            $this->restrictedResources[$name] = new \Symfony\Config\SyliusApi\FilterEagerLoadingExtension\RestrictedResourcesConfig($value);
        } elseif (1 < \func_num_args()) {
            throw new InvalidConfigurationException('The node created by "restrictedResources()" has already been initialized. You cannot pass values the second time you call restrictedResources().');
        }

        return $this->restrictedResources[$name];
    }

    public function __construct(array $value = [])
    {
        if (array_key_exists('restricted_resources', $value)) {
            $this->_usedProperties['restrictedResources'] = true;
            $this->restrictedResources = array_map(function ($v) { return new \Symfony\Config\SyliusApi\FilterEagerLoadingExtension\RestrictedResourcesConfig($v); }, $value['restricted_resources']);
            unset($value['restricted_resources']);
        }

        if ([] !== $value) {
            throw new InvalidConfigurationException(sprintf('The following keys are not supported by "%s": ', __CLASS__).implode(', ', array_keys($value)));
        }
    }

    public function toArray(): array
    {
        $output = [];
        if (isset($this->_usedProperties['restrictedResources'])) {
            $output['restricted_resources'] = array_map(function ($v) { return $v->toArray(); }, $this->restrictedResources);
        }

        return $output;
    }

}
