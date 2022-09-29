<?php

namespace Symfony\Config\SyliusTheme\Sources;

use Symfony\Component\Config\Loader\ParamConfigurator;
use Symfony\Component\Config\Definition\Exception\InvalidConfigurationException;

/**
 * This class is automatically generated to help in creating a config.
 */
class FilesystemConfig 
{
    private $enabled;
    private $filename;
    private $scanDepth;
    private $directories;
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
     * @default 'composer.json'
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function filename($value): self
    {
        $this->_usedProperties['filename'] = true;
        $this->filename = $value;

        return $this;
    }

    /**
     * Restrict depth to scan for configuration file inside theme folder
     * @default 1
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function scanDepth($value): self
    {
        $this->_usedProperties['scanDepth'] = true;
        $this->scanDepth = $value;

        return $this;
    }

    /**
     * @param ParamConfigurator|list<mixed|ParamConfigurator> $value
     * @return $this
     */
    public function directories($value): self
    {
        $this->_usedProperties['directories'] = true;
        $this->directories = $value;

        return $this;
    }

    public function __construct(array $value = [])
    {
        if (array_key_exists('enabled', $value)) {
            $this->_usedProperties['enabled'] = true;
            $this->enabled = $value['enabled'];
            unset($value['enabled']);
        }

        if (array_key_exists('filename', $value)) {
            $this->_usedProperties['filename'] = true;
            $this->filename = $value['filename'];
            unset($value['filename']);
        }

        if (array_key_exists('scan_depth', $value)) {
            $this->_usedProperties['scanDepth'] = true;
            $this->scanDepth = $value['scan_depth'];
            unset($value['scan_depth']);
        }

        if (array_key_exists('directories', $value)) {
            $this->_usedProperties['directories'] = true;
            $this->directories = $value['directories'];
            unset($value['directories']);
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
        if (isset($this->_usedProperties['filename'])) {
            $output['filename'] = $this->filename;
        }
        if (isset($this->_usedProperties['scanDepth'])) {
            $output['scan_depth'] = $this->scanDepth;
        }
        if (isset($this->_usedProperties['directories'])) {
            $output['directories'] = $this->directories;
        }

        return $output;
    }

}
