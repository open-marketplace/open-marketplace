<?php

namespace Symfony\Config\SyliusFixtures;

require_once __DIR__.\DIRECTORY_SEPARATOR.'SuitesConfig'.\DIRECTORY_SEPARATOR.'FixturesConfig.php';
require_once __DIR__.\DIRECTORY_SEPARATOR.'SuitesConfig'.\DIRECTORY_SEPARATOR.'ListenersConfig.php';

use Symfony\Component\Config\Definition\Exception\InvalidConfigurationException;

/**
 * This class is automatically generated to help in creating a config.
 */
class SuitesConfig 
{
    private $fixtures;
    private $listeners;
    private $_usedProperties = [];

    public function fixtures(string $alias, array $value = []): \Symfony\Config\SyliusFixtures\SuitesConfig\FixturesConfig
    {
        if (!isset($this->fixtures[$alias])) {
            $this->_usedProperties['fixtures'] = true;
            $this->fixtures[$alias] = new \Symfony\Config\SyliusFixtures\SuitesConfig\FixturesConfig($value);
        } elseif (1 < \func_num_args()) {
            throw new InvalidConfigurationException('The node created by "fixtures()" has already been initialized. You cannot pass values the second time you call fixtures().');
        }

        return $this->fixtures[$alias];
    }

    public function listeners(string $name, array $value = []): \Symfony\Config\SyliusFixtures\SuitesConfig\ListenersConfig
    {
        if (!isset($this->listeners[$name])) {
            $this->_usedProperties['listeners'] = true;
            $this->listeners[$name] = new \Symfony\Config\SyliusFixtures\SuitesConfig\ListenersConfig($value);
        } elseif (1 < \func_num_args()) {
            throw new InvalidConfigurationException('The node created by "listeners()" has already been initialized. You cannot pass values the second time you call listeners().');
        }

        return $this->listeners[$name];
    }

    public function __construct(array $value = [])
    {
        if (array_key_exists('fixtures', $value)) {
            $this->_usedProperties['fixtures'] = true;
            $this->fixtures = array_map(function ($v) { return new \Symfony\Config\SyliusFixtures\SuitesConfig\FixturesConfig($v); }, $value['fixtures']);
            unset($value['fixtures']);
        }

        if (array_key_exists('listeners', $value)) {
            $this->_usedProperties['listeners'] = true;
            $this->listeners = array_map(function ($v) { return new \Symfony\Config\SyliusFixtures\SuitesConfig\ListenersConfig($v); }, $value['listeners']);
            unset($value['listeners']);
        }

        if ([] !== $value) {
            throw new InvalidConfigurationException(sprintf('The following keys are not supported by "%s": ', __CLASS__).implode(', ', array_keys($value)));
        }
    }

    public function toArray(): array
    {
        $output = [];
        if (isset($this->_usedProperties['fixtures'])) {
            $output['fixtures'] = array_map(function ($v) { return $v->toArray(); }, $this->fixtures);
        }
        if (isset($this->_usedProperties['listeners'])) {
            $output['listeners'] = array_map(function ($v) { return $v->toArray(); }, $this->listeners);
        }

        return $output;
    }

}
