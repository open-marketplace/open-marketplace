<?php

namespace Symfony\Config\Security;

use Symfony\Component\Config\Loader\ParamConfigurator;
use Symfony\Component\Config\Definition\Exception\InvalidConfigurationException;

/**
 * This class is automatically generated to help in creating a config.
 */
class AccessControlConfig 
{
    private $requiresChannel;
    private $path;
    private $host;
    private $port;
    private $ips;
    private $methods;
    private $allowIf;
    private $roles;
    private $_usedProperties = [];

    /**
     * @default null
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function requiresChannel($value): self
    {
        $this->_usedProperties['requiresChannel'] = true;
        $this->requiresChannel = $value;

        return $this;
    }

    /**
     * use the urldecoded format
     * @example ^/path to resource/
     * @default null
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function path($value): self
    {
        $this->_usedProperties['path'] = true;
        $this->path = $value;

        return $this;
    }

    /**
     * @default null
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function host($value): self
    {
        $this->_usedProperties['host'] = true;
        $this->host = $value;

        return $this;
    }

    /**
     * @default null
     * @param ParamConfigurator|int $value
     * @return $this
     */
    public function port($value): self
    {
        $this->_usedProperties['port'] = true;
        $this->port = $value;

        return $this;
    }

    /**
     * @param ParamConfigurator|list<mixed|ParamConfigurator> $value
     * @return $this
     */
    public function ips($value): self
    {
        $this->_usedProperties['ips'] = true;
        $this->ips = $value;

        return $this;
    }

    /**
     * @param ParamConfigurator|list<mixed|ParamConfigurator> $value
     * @return $this
     */
    public function methods($value): self
    {
        $this->_usedProperties['methods'] = true;
        $this->methods = $value;

        return $this;
    }

    /**
     * @default null
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function allowIf($value): self
    {
        $this->_usedProperties['allowIf'] = true;
        $this->allowIf = $value;

        return $this;
    }

    /**
     * @param ParamConfigurator|list<mixed|ParamConfigurator> $value
     * @return $this
     */
    public function roles($value): self
    {
        $this->_usedProperties['roles'] = true;
        $this->roles = $value;

        return $this;
    }

    public function __construct(array $value = [])
    {
        if (array_key_exists('requires_channel', $value)) {
            $this->_usedProperties['requiresChannel'] = true;
            $this->requiresChannel = $value['requires_channel'];
            unset($value['requires_channel']);
        }

        if (array_key_exists('path', $value)) {
            $this->_usedProperties['path'] = true;
            $this->path = $value['path'];
            unset($value['path']);
        }

        if (array_key_exists('host', $value)) {
            $this->_usedProperties['host'] = true;
            $this->host = $value['host'];
            unset($value['host']);
        }

        if (array_key_exists('port', $value)) {
            $this->_usedProperties['port'] = true;
            $this->port = $value['port'];
            unset($value['port']);
        }

        if (array_key_exists('ips', $value)) {
            $this->_usedProperties['ips'] = true;
            $this->ips = $value['ips'];
            unset($value['ips']);
        }

        if (array_key_exists('methods', $value)) {
            $this->_usedProperties['methods'] = true;
            $this->methods = $value['methods'];
            unset($value['methods']);
        }

        if (array_key_exists('allow_if', $value)) {
            $this->_usedProperties['allowIf'] = true;
            $this->allowIf = $value['allow_if'];
            unset($value['allow_if']);
        }

        if (array_key_exists('roles', $value)) {
            $this->_usedProperties['roles'] = true;
            $this->roles = $value['roles'];
            unset($value['roles']);
        }

        if ([] !== $value) {
            throw new InvalidConfigurationException(sprintf('The following keys are not supported by "%s": ', __CLASS__).implode(', ', array_keys($value)));
        }
    }

    public function toArray(): array
    {
        $output = [];
        if (isset($this->_usedProperties['requiresChannel'])) {
            $output['requires_channel'] = $this->requiresChannel;
        }
        if (isset($this->_usedProperties['path'])) {
            $output['path'] = $this->path;
        }
        if (isset($this->_usedProperties['host'])) {
            $output['host'] = $this->host;
        }
        if (isset($this->_usedProperties['port'])) {
            $output['port'] = $this->port;
        }
        if (isset($this->_usedProperties['ips'])) {
            $output['ips'] = $this->ips;
        }
        if (isset($this->_usedProperties['methods'])) {
            $output['methods'] = $this->methods;
        }
        if (isset($this->_usedProperties['allowIf'])) {
            $output['allow_if'] = $this->allowIf;
        }
        if (isset($this->_usedProperties['roles'])) {
            $output['roles'] = $this->roles;
        }

        return $output;
    }

}
