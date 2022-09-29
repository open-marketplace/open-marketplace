<?php

namespace Symfony\Config\ApiPlatform;

require_once __DIR__.\DIRECTORY_SEPARATOR.'Swagger'.\DIRECTORY_SEPARATOR.'ApiKeysConfig.php';

use Symfony\Component\Config\Loader\ParamConfigurator;
use Symfony\Component\Config\Definition\Exception\InvalidConfigurationException;

/**
 * This class is automatically generated to help in creating a config.
 */
class SwaggerConfig 
{
    private $versions;
    private $apiKeys;
    private $_usedProperties = [];

    /**
     * @param ParamConfigurator|list<mixed|ParamConfigurator> $value
     * @return $this
     */
    public function versions($value): self
    {
        $this->_usedProperties['versions'] = true;
        $this->versions = $value;

        return $this;
    }

    public function apiKeys(array $value = []): \Symfony\Config\ApiPlatform\Swagger\ApiKeysConfig
    {
        $this->_usedProperties['apiKeys'] = true;

        return $this->apiKeys[] = new \Symfony\Config\ApiPlatform\Swagger\ApiKeysConfig($value);
    }

    public function __construct(array $value = [])
    {
        if (array_key_exists('versions', $value)) {
            $this->_usedProperties['versions'] = true;
            $this->versions = $value['versions'];
            unset($value['versions']);
        }

        if (array_key_exists('api_keys', $value)) {
            $this->_usedProperties['apiKeys'] = true;
            $this->apiKeys = array_map(function ($v) { return new \Symfony\Config\ApiPlatform\Swagger\ApiKeysConfig($v); }, $value['api_keys']);
            unset($value['api_keys']);
        }

        if ([] !== $value) {
            throw new InvalidConfigurationException(sprintf('The following keys are not supported by "%s": ', __CLASS__).implode(', ', array_keys($value)));
        }
    }

    public function toArray(): array
    {
        $output = [];
        if (isset($this->_usedProperties['versions'])) {
            $output['versions'] = $this->versions;
        }
        if (isset($this->_usedProperties['apiKeys'])) {
            $output['api_keys'] = array_map(function ($v) { return $v->toArray(); }, $this->apiKeys);
        }

        return $output;
    }

}
