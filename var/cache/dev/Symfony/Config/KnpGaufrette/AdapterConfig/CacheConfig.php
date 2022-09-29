<?php

namespace Symfony\Config\KnpGaufrette\AdapterConfig;

use Symfony\Component\Config\Loader\ParamConfigurator;
use Symfony\Component\Config\Definition\Exception\InvalidConfigurationException;

/**
 * This class is automatically generated to help in creating a config.
 */
class CacheConfig 
{
    private $source;
    private $cache;
    private $ttl;
    private $serialize;
    private $_usedProperties = [];

    /**
     * @default null
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function source($value): self
    {
        $this->_usedProperties['source'] = true;
        $this->source = $value;

        return $this;
    }

    /**
     * @default null
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function cache($value): self
    {
        $this->_usedProperties['cache'] = true;
        $this->cache = $value;

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

    /**
     * @default null
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function serialize($value): self
    {
        $this->_usedProperties['serialize'] = true;
        $this->serialize = $value;

        return $this;
    }

    public function __construct(array $value = [])
    {
        if (array_key_exists('source', $value)) {
            $this->_usedProperties['source'] = true;
            $this->source = $value['source'];
            unset($value['source']);
        }

        if (array_key_exists('cache', $value)) {
            $this->_usedProperties['cache'] = true;
            $this->cache = $value['cache'];
            unset($value['cache']);
        }

        if (array_key_exists('ttl', $value)) {
            $this->_usedProperties['ttl'] = true;
            $this->ttl = $value['ttl'];
            unset($value['ttl']);
        }

        if (array_key_exists('serialize', $value)) {
            $this->_usedProperties['serialize'] = true;
            $this->serialize = $value['serialize'];
            unset($value['serialize']);
        }

        if ([] !== $value) {
            throw new InvalidConfigurationException(sprintf('The following keys are not supported by "%s": ', __CLASS__).implode(', ', array_keys($value)));
        }
    }

    public function toArray(): array
    {
        $output = [];
        if (isset($this->_usedProperties['source'])) {
            $output['source'] = $this->source;
        }
        if (isset($this->_usedProperties['cache'])) {
            $output['cache'] = $this->cache;
        }
        if (isset($this->_usedProperties['ttl'])) {
            $output['ttl'] = $this->ttl;
        }
        if (isset($this->_usedProperties['serialize'])) {
            $output['serialize'] = $this->serialize;
        }

        return $output;
    }

}
