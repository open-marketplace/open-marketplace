<?php

namespace Symfony\Config;

require_once __DIR__.\DIRECTORY_SEPARATOR.'SyliusUser'.\DIRECTORY_SEPARATOR.'ResourcesConfig.php';

use Symfony\Component\Config\Loader\ParamConfigurator;
use Symfony\Component\Config\Definition\Exception\InvalidConfigurationException;

/**
 * This class is automatically generated to help in creating a config.
 */
class SyliusUserConfig implements \Symfony\Component\Config\Builder\ConfigBuilderInterface
{
    private $driver;
    private $encoder;
    private $resources;
    private $_usedProperties = [];

    /**
     * @default 'doctrine/orm'
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function driver($value): self
    {
        $this->_usedProperties['driver'] = true;
        $this->driver = $value;

        return $this;
    }

    /**
     * @default null
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function encoder($value): self
    {
        $this->_usedProperties['encoder'] = true;
        $this->encoder = $value;

        return $this;
    }

    public function resources(string $name, array $value = []): \Symfony\Config\SyliusUser\ResourcesConfig
    {
        if (!isset($this->resources[$name])) {
            $this->_usedProperties['resources'] = true;
            $this->resources[$name] = new \Symfony\Config\SyliusUser\ResourcesConfig($value);
        } elseif (1 < \func_num_args()) {
            throw new InvalidConfigurationException('The node created by "resources()" has already been initialized. You cannot pass values the second time you call resources().');
        }

        return $this->resources[$name];
    }

    public function getExtensionAlias(): string
    {
        return 'sylius_user';
    }

    public function __construct(array $value = [])
    {
        if (array_key_exists('driver', $value)) {
            $this->_usedProperties['driver'] = true;
            $this->driver = $value['driver'];
            unset($value['driver']);
        }

        if (array_key_exists('encoder', $value)) {
            $this->_usedProperties['encoder'] = true;
            $this->encoder = $value['encoder'];
            unset($value['encoder']);
        }

        if (array_key_exists('resources', $value)) {
            $this->_usedProperties['resources'] = true;
            $this->resources = array_map(function ($v) { return new \Symfony\Config\SyliusUser\ResourcesConfig($v); }, $value['resources']);
            unset($value['resources']);
        }

        if ([] !== $value) {
            throw new InvalidConfigurationException(sprintf('The following keys are not supported by "%s": ', __CLASS__).implode(', ', array_keys($value)));
        }
    }

    public function toArray(): array
    {
        $output = [];
        if (isset($this->_usedProperties['driver'])) {
            $output['driver'] = $this->driver;
        }
        if (isset($this->_usedProperties['encoder'])) {
            $output['encoder'] = $this->encoder;
        }
        if (isset($this->_usedProperties['resources'])) {
            $output['resources'] = array_map(function ($v) { return $v->toArray(); }, $this->resources);
        }

        return $output;
    }

}
