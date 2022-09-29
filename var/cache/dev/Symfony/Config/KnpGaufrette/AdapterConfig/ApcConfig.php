<?php

namespace Symfony\Config\KnpGaufrette\AdapterConfig;

use Symfony\Component\Config\Loader\ParamConfigurator;
use Symfony\Component\Config\Definition\Exception\InvalidConfigurationException;

/**
 * This class is automatically generated to help in creating a config.
 */
class ApcConfig 
{
    private $prefix;
    private $ttl;
    private $_usedProperties = [];

    /**
     * @default null
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function prefix($value): self
    {
        $this->_usedProperties['prefix'] = true;
        $this->prefix = $value;

        return $this;
    }

    /**
     * @default 0
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function ttl($value): self
    {
        $this->_usedProperties['ttl'] = true;
        $this->ttl = $value;

        return $this;
    }

    public function __construct(array $value = [])
    {
        if (array_key_exists('prefix', $value)) {
            $this->_usedProperties['prefix'] = true;
            $this->prefix = $value['prefix'];
            unset($value['prefix']);
        }

        if (array_key_exists('ttl', $value)) {
            $this->_usedProperties['ttl'] = true;
            $this->ttl = $value['ttl'];
            unset($value['ttl']);
        }

        if ([] !== $value) {
            throw new InvalidConfigurationException(sprintf('The following keys are not supported by "%s": ', __CLASS__).implode(', ', array_keys($value)));
        }
    }

    public function toArray(): array
    {
        $output = [];
        if (isset($this->_usedProperties['prefix'])) {
            $output['prefix'] = $this->prefix;
        }
        if (isset($this->_usedProperties['ttl'])) {
            $output['ttl'] = $this->ttl;
        }

        return $output;
    }

}
