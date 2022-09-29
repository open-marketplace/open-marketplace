<?php

namespace Symfony\Config\KnpGaufrette\AdapterConfig\InMemory;

use Symfony\Component\Config\Loader\ParamConfigurator;
use Symfony\Component\Config\Definition\Exception\InvalidConfigurationException;

/**
 * This class is automatically generated to help in creating a config.
 */
class FilesConfig 
{
    private $content;
    private $checksum;
    private $mtime;
    private $_usedProperties = [];

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
    public function checksum($value): self
    {
        $this->_usedProperties['checksum'] = true;
        $this->checksum = $value;

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

    public function __construct(array $value = [])
    {
        if (array_key_exists('content', $value)) {
            $this->_usedProperties['content'] = true;
            $this->content = $value['content'];
            unset($value['content']);
        }

        if (array_key_exists('checksum', $value)) {
            $this->_usedProperties['checksum'] = true;
            $this->checksum = $value['checksum'];
            unset($value['checksum']);
        }

        if (array_key_exists('mtime', $value)) {
            $this->_usedProperties['mtime'] = true;
            $this->mtime = $value['mtime'];
            unset($value['mtime']);
        }

        if ([] !== $value) {
            throw new InvalidConfigurationException(sprintf('The following keys are not supported by "%s": ', __CLASS__).implode(', ', array_keys($value)));
        }
    }

    public function toArray(): array
    {
        $output = [];
        if (isset($this->_usedProperties['content'])) {
            $output['content'] = $this->content;
        }
        if (isset($this->_usedProperties['checksum'])) {
            $output['checksum'] = $this->checksum;
        }
        if (isset($this->_usedProperties['mtime'])) {
            $output['mtime'] = $this->mtime;
        }

        return $output;
    }

}
