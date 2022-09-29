<?php

namespace Symfony\Config\KnpGaufrette\AdapterConfig;

use Symfony\Component\Config\Loader\ParamConfigurator;
use Symfony\Component\Config\Definition\Exception\InvalidConfigurationException;

/**
 * This class is automatically generated to help in creating a config.
 */
class FtpConfig 
{
    private $directory;
    private $host;
    private $port;
    private $username;
    private $password;
    private $timeout;
    private $passive;
    private $create;
    private $ssl;
    private $utf8;
    private $mode;
    private $_usedProperties = [];

    /**
     * @default null
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function directory($value): self
    {
        $this->_usedProperties['directory'] = true;
        $this->directory = $value;

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
     * @default 21
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function port($value): self
    {
        $this->_usedProperties['port'] = true;
        $this->port = $value;

        return $this;
    }

    /**
     * @default null
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function username($value): self
    {
        $this->_usedProperties['username'] = true;
        $this->username = $value;

        return $this;
    }

    /**
     * @default null
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function password($value): self
    {
        $this->_usedProperties['password'] = true;
        $this->password = $value;

        return $this;
    }

    /**
     * @default 90
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function timeout($value): self
    {
        $this->_usedProperties['timeout'] = true;
        $this->timeout = $value;

        return $this;
    }

    /**
     * @default false
     * @param ParamConfigurator|bool $value
     * @return $this
     */
    public function passive($value): self
    {
        $this->_usedProperties['passive'] = true;
        $this->passive = $value;

        return $this;
    }

    /**
     * @default false
     * @param ParamConfigurator|bool $value
     * @return $this
     */
    public function create($value): self
    {
        $this->_usedProperties['create'] = true;
        $this->create = $value;

        return $this;
    }

    /**
     * @default false
     * @param ParamConfigurator|bool $value
     * @return $this
     */
    public function ssl($value): self
    {
        $this->_usedProperties['ssl'] = true;
        $this->ssl = $value;

        return $this;
    }

    /**
     * @default false
     * @param ParamConfigurator|bool $value
     * @return $this
     */
    public function utf8($value): self
    {
        $this->_usedProperties['utf8'] = true;
        $this->utf8 = $value;

        return $this;
    }

    /**
     * @default 1
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function mode($value): self
    {
        $this->_usedProperties['mode'] = true;
        $this->mode = $value;

        return $this;
    }

    public function __construct(array $value = [])
    {
        if (array_key_exists('directory', $value)) {
            $this->_usedProperties['directory'] = true;
            $this->directory = $value['directory'];
            unset($value['directory']);
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

        if (array_key_exists('username', $value)) {
            $this->_usedProperties['username'] = true;
            $this->username = $value['username'];
            unset($value['username']);
        }

        if (array_key_exists('password', $value)) {
            $this->_usedProperties['password'] = true;
            $this->password = $value['password'];
            unset($value['password']);
        }

        if (array_key_exists('timeout', $value)) {
            $this->_usedProperties['timeout'] = true;
            $this->timeout = $value['timeout'];
            unset($value['timeout']);
        }

        if (array_key_exists('passive', $value)) {
            $this->_usedProperties['passive'] = true;
            $this->passive = $value['passive'];
            unset($value['passive']);
        }

        if (array_key_exists('create', $value)) {
            $this->_usedProperties['create'] = true;
            $this->create = $value['create'];
            unset($value['create']);
        }

        if (array_key_exists('ssl', $value)) {
            $this->_usedProperties['ssl'] = true;
            $this->ssl = $value['ssl'];
            unset($value['ssl']);
        }

        if (array_key_exists('utf8', $value)) {
            $this->_usedProperties['utf8'] = true;
            $this->utf8 = $value['utf8'];
            unset($value['utf8']);
        }

        if (array_key_exists('mode', $value)) {
            $this->_usedProperties['mode'] = true;
            $this->mode = $value['mode'];
            unset($value['mode']);
        }

        if ([] !== $value) {
            throw new InvalidConfigurationException(sprintf('The following keys are not supported by "%s": ', __CLASS__).implode(', ', array_keys($value)));
        }
    }

    public function toArray(): array
    {
        $output = [];
        if (isset($this->_usedProperties['directory'])) {
            $output['directory'] = $this->directory;
        }
        if (isset($this->_usedProperties['host'])) {
            $output['host'] = $this->host;
        }
        if (isset($this->_usedProperties['port'])) {
            $output['port'] = $this->port;
        }
        if (isset($this->_usedProperties['username'])) {
            $output['username'] = $this->username;
        }
        if (isset($this->_usedProperties['password'])) {
            $output['password'] = $this->password;
        }
        if (isset($this->_usedProperties['timeout'])) {
            $output['timeout'] = $this->timeout;
        }
        if (isset($this->_usedProperties['passive'])) {
            $output['passive'] = $this->passive;
        }
        if (isset($this->_usedProperties['create'])) {
            $output['create'] = $this->create;
        }
        if (isset($this->_usedProperties['ssl'])) {
            $output['ssl'] = $this->ssl;
        }
        if (isset($this->_usedProperties['utf8'])) {
            $output['utf8'] = $this->utf8;
        }
        if (isset($this->_usedProperties['mode'])) {
            $output['mode'] = $this->mode;
        }

        return $output;
    }

}
