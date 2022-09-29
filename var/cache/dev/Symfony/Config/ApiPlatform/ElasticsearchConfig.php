<?php

namespace Symfony\Config\ApiPlatform;

require_once __DIR__.\DIRECTORY_SEPARATOR.'Elasticsearch'.\DIRECTORY_SEPARATOR.'MappingConfig.php';

use Symfony\Component\Config\Loader\ParamConfigurator;
use Symfony\Component\Config\Definition\Exception\InvalidConfigurationException;

/**
 * This class is automatically generated to help in creating a config.
 */
class ElasticsearchConfig 
{
    private $enabled;
    private $hosts;
    private $mapping;
    private $_usedProperties = [];

    /**
     * @default false
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
     * @param ParamConfigurator|list<mixed|ParamConfigurator> $value
     * @return $this
     */
    public function hosts($value): self
    {
        $this->_usedProperties['hosts'] = true;
        $this->hosts = $value;

        return $this;
    }

    public function mapping(string $resource_class, array $value = []): \Symfony\Config\ApiPlatform\Elasticsearch\MappingConfig
    {
        if (!isset($this->mapping[$resource_class])) {
            $this->_usedProperties['mapping'] = true;
            $this->mapping[$resource_class] = new \Symfony\Config\ApiPlatform\Elasticsearch\MappingConfig($value);
        } elseif (1 < \func_num_args()) {
            throw new InvalidConfigurationException('The node created by "mapping()" has already been initialized. You cannot pass values the second time you call mapping().');
        }

        return $this->mapping[$resource_class];
    }

    public function __construct(array $value = [])
    {
        if (array_key_exists('enabled', $value)) {
            $this->_usedProperties['enabled'] = true;
            $this->enabled = $value['enabled'];
            unset($value['enabled']);
        }

        if (array_key_exists('hosts', $value)) {
            $this->_usedProperties['hosts'] = true;
            $this->hosts = $value['hosts'];
            unset($value['hosts']);
        }

        if (array_key_exists('mapping', $value)) {
            $this->_usedProperties['mapping'] = true;
            $this->mapping = array_map(function ($v) { return new \Symfony\Config\ApiPlatform\Elasticsearch\MappingConfig($v); }, $value['mapping']);
            unset($value['mapping']);
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
        if (isset($this->_usedProperties['hosts'])) {
            $output['hosts'] = $this->hosts;
        }
        if (isset($this->_usedProperties['mapping'])) {
            $output['mapping'] = array_map(function ($v) { return $v->toArray(); }, $this->mapping);
        }

        return $output;
    }

}
