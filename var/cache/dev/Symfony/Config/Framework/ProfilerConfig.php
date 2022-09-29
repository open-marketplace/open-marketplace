<?php

namespace Symfony\Config\Framework;

use Symfony\Component\Config\Loader\ParamConfigurator;
use Symfony\Component\Config\Definition\Exception\InvalidConfigurationException;

/**
 * This class is automatically generated to help in creating a config.
 */
class ProfilerConfig 
{
    private $enabled;
    private $collect;
    private $collectParameter;
    private $onlyExceptions;
    private $onlyMainRequests;
    private $onlyMasterRequests;
    private $dsn;
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
     * @default true
     * @param ParamConfigurator|bool $value
     * @return $this
     */
    public function collect($value): self
    {
        $this->_usedProperties['collect'] = true;
        $this->collect = $value;

        return $this;
    }

    /**
     * The name of the parameter to use to enable or disable collection on a per request basis
     * @default null
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function collectParameter($value): self
    {
        $this->_usedProperties['collectParameter'] = true;
        $this->collectParameter = $value;

        return $this;
    }

    /**
     * @default false
     * @param ParamConfigurator|bool $value
     * @return $this
     */
    public function onlyExceptions($value): self
    {
        $this->_usedProperties['onlyExceptions'] = true;
        $this->onlyExceptions = $value;

        return $this;
    }

    /**
     * @default false
     * @param ParamConfigurator|bool $value
     * @return $this
     */
    public function onlyMainRequests($value): self
    {
        $this->_usedProperties['onlyMainRequests'] = true;
        $this->onlyMainRequests = $value;

        return $this;
    }

    /**
     * @default false
     * @param ParamConfigurator|bool $value
     * @deprecated Option "only_master_requests" at "profiler" is deprecated, use "only_main_requests" instead.
     * @return $this
     */
    public function onlyMasterRequests($value): self
    {
        $this->_usedProperties['onlyMasterRequests'] = true;
        $this->onlyMasterRequests = $value;

        return $this;
    }

    /**
     * @default 'file:%kernel.cache_dir%/profiler'
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function dsn($value): self
    {
        $this->_usedProperties['dsn'] = true;
        $this->dsn = $value;

        return $this;
    }

    public function __construct(array $value = [])
    {
        if (array_key_exists('enabled', $value)) {
            $this->_usedProperties['enabled'] = true;
            $this->enabled = $value['enabled'];
            unset($value['enabled']);
        }

        if (array_key_exists('collect', $value)) {
            $this->_usedProperties['collect'] = true;
            $this->collect = $value['collect'];
            unset($value['collect']);
        }

        if (array_key_exists('collect_parameter', $value)) {
            $this->_usedProperties['collectParameter'] = true;
            $this->collectParameter = $value['collect_parameter'];
            unset($value['collect_parameter']);
        }

        if (array_key_exists('only_exceptions', $value)) {
            $this->_usedProperties['onlyExceptions'] = true;
            $this->onlyExceptions = $value['only_exceptions'];
            unset($value['only_exceptions']);
        }

        if (array_key_exists('only_main_requests', $value)) {
            $this->_usedProperties['onlyMainRequests'] = true;
            $this->onlyMainRequests = $value['only_main_requests'];
            unset($value['only_main_requests']);
        }

        if (array_key_exists('only_master_requests', $value)) {
            $this->_usedProperties['onlyMasterRequests'] = true;
            $this->onlyMasterRequests = $value['only_master_requests'];
            unset($value['only_master_requests']);
        }

        if (array_key_exists('dsn', $value)) {
            $this->_usedProperties['dsn'] = true;
            $this->dsn = $value['dsn'];
            unset($value['dsn']);
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
        if (isset($this->_usedProperties['collect'])) {
            $output['collect'] = $this->collect;
        }
        if (isset($this->_usedProperties['collectParameter'])) {
            $output['collect_parameter'] = $this->collectParameter;
        }
        if (isset($this->_usedProperties['onlyExceptions'])) {
            $output['only_exceptions'] = $this->onlyExceptions;
        }
        if (isset($this->_usedProperties['onlyMainRequests'])) {
            $output['only_main_requests'] = $this->onlyMainRequests;
        }
        if (isset($this->_usedProperties['onlyMasterRequests'])) {
            $output['only_master_requests'] = $this->onlyMasterRequests;
        }
        if (isset($this->_usedProperties['dsn'])) {
            $output['dsn'] = $this->dsn;
        }

        return $output;
    }

}
