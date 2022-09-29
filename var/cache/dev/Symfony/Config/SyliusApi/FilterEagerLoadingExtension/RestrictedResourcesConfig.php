<?php

namespace Symfony\Config\SyliusApi\FilterEagerLoadingExtension;

require_once __DIR__.\DIRECTORY_SEPARATOR.'RestrictedResourcesConfig'.\DIRECTORY_SEPARATOR.'OperationsConfig.php';

use Symfony\Component\Config\Definition\Exception\InvalidConfigurationException;

/**
 * This class is automatically generated to help in creating a config.
 */
class RestrictedResourcesConfig 
{
    private $operations;
    private $_usedProperties = [];

    public function operations(string $name, array $value = []): \Symfony\Config\SyliusApi\FilterEagerLoadingExtension\RestrictedResourcesConfig\OperationsConfig
    {
        if (!isset($this->operations[$name])) {
            $this->_usedProperties['operations'] = true;
            $this->operations[$name] = new \Symfony\Config\SyliusApi\FilterEagerLoadingExtension\RestrictedResourcesConfig\OperationsConfig($value);
        } elseif (1 < \func_num_args()) {
            throw new InvalidConfigurationException('The node created by "operations()" has already been initialized. You cannot pass values the second time you call operations().');
        }

        return $this->operations[$name];
    }

    public function __construct(array $value = [])
    {
        if (array_key_exists('operations', $value)) {
            $this->_usedProperties['operations'] = true;
            $this->operations = array_map(function ($v) { return new \Symfony\Config\SyliusApi\FilterEagerLoadingExtension\RestrictedResourcesConfig\OperationsConfig($v); }, $value['operations']);
            unset($value['operations']);
        }

        if ([] !== $value) {
            throw new InvalidConfigurationException(sprintf('The following keys are not supported by "%s": ', __CLASS__).implode(', ', array_keys($value)));
        }
    }

    public function toArray(): array
    {
        $output = [];
        if (isset($this->_usedProperties['operations'])) {
            $output['operations'] = array_map(function ($v) { return $v->toArray(); }, $this->operations);
        }

        return $output;
    }

}
