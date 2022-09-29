<?php

namespace Symfony\Config\KnpGaufrette\AdapterConfig\DoctrineDbal;

use Symfony\Component\Config\Loader\ParamConfigurator;
use Symfony\Component\Config\Definition\Exception\InvalidConfigurationException;

/**
 * This class is automatically generated to help in creating a config.
 */
class ColumnsConfig 
{
    private $key;
    private $content;
    private $mtime;
    private $checksum;
    private $_usedProperties = [];

    /**
     * @default null
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function key($value): self
    {
        $this->_usedProperties['key'] = true;
        $this->key = $value;

        return $this;
    }

    /**
     * @default null
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function content($value): self
    {
        $this->_usedProperties['content'] = true;
        $this->content = $value;

        return $this;
    }

    /**
     * @default null
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function mtime($value): self
    {
        $this->_usedProperties['mtime'] = true;
        $this->mtime = $value;

        return $this;
    }

    /**
     * @default null
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function checksum($value): self
    {
        $this->_usedProperties['checksum'] = true;
        $this->checksum = $value;

        return $this;
    }

    public function __construct(array $value = [])
    {
        if (array_key_exists('key', $value)) {
            $this->_usedProperties['key'] = true;
            $this->key = $value['key'];
            unset($value['key']);
        }

        if (array_key_exists('content', $value)) {
            $this->_usedProperties['content'] = true;
            $this->content = $value['content'];
            unset($value['content']);
        }

        if (array_key_exists('mtime', $value)) {
            $this->_usedProperties['mtime'] = true;
            $this->mtime = $value['mtime'];
            unset($value['mtime']);
        }

        if (array_key_exists('checksum', $value)) {
            $this->_usedProperties['checksum'] = true;
            $this->checksum = $value['checksum'];
            unset($value['checksum']);
        }

        if ([] !== $value) {
            throw new InvalidConfigurationException(sprintf('The following keys are not supported by "%s": ', __CLASS__).implode(', ', array_keys($value)));
        }
    }

    public function toArray(): array
    {
        $output = [];
        if (isset($this->_usedProperties['key'])) {
            $output['key'] = $this->key;
        }
        if (isset($this->_usedProperties['content'])) {
            $output['content'] = $this->content;
        }
        if (isset($this->_usedProperties['mtime'])) {
            $output['mtime'] = $this->mtime;
        }
        if (isset($this->_usedProperties['checksum'])) {
            $output['checksum'] = $this->checksum;
        }

        return $output;
    }

}
