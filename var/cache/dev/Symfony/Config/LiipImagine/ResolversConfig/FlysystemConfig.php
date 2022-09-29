<?php

namespace Symfony\Config\LiipImagine\ResolversConfig;

use Symfony\Component\Config\Loader\ParamConfigurator;
use Symfony\Component\Config\Definition\Exception\InvalidConfigurationException;

/**
 * This class is automatically generated to help in creating a config.
 */
class FlysystemConfig 
{
    private $filesystemService;
    private $cachePrefix;
    private $rootUrl;
    private $visibility;
    private $_usedProperties = [];

    /**
     * @default null
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function filesystemService($value): self
    {
        $this->_usedProperties['filesystemService'] = true;
        $this->filesystemService = $value;

        return $this;
    }

    /**
     * @default null
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function cachePrefix($value): self
    {
        $this->_usedProperties['cachePrefix'] = true;
        $this->cachePrefix = $value;

        return $this;
    }

    /**
     * @default null
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function rootUrl($value): self
    {
        $this->_usedProperties['rootUrl'] = true;
        $this->rootUrl = $value;

        return $this;
    }

    /**
     * @default 'public'
     * @param ParamConfigurator|'public'|'private'|'noPredefinedVisibility' $value
     * @return $this
     */
    public function visibility($value): self
    {
        $this->_usedProperties['visibility'] = true;
        $this->visibility = $value;

        return $this;
    }

    public function __construct(array $value = [])
    {
        if (array_key_exists('filesystem_service', $value)) {
            $this->_usedProperties['filesystemService'] = true;
            $this->filesystemService = $value['filesystem_service'];
            unset($value['filesystem_service']);
        }

        if (array_key_exists('cache_prefix', $value)) {
            $this->_usedProperties['cachePrefix'] = true;
            $this->cachePrefix = $value['cache_prefix'];
            unset($value['cache_prefix']);
        }

        if (array_key_exists('root_url', $value)) {
            $this->_usedProperties['rootUrl'] = true;
            $this->rootUrl = $value['root_url'];
            unset($value['root_url']);
        }

        if (array_key_exists('visibility', $value)) {
            $this->_usedProperties['visibility'] = true;
            $this->visibility = $value['visibility'];
            unset($value['visibility']);
        }

        if ([] !== $value) {
            throw new InvalidConfigurationException(sprintf('The following keys are not supported by "%s": ', __CLASS__).implode(', ', array_keys($value)));
        }
    }

    public function toArray(): array
    {
        $output = [];
        if (isset($this->_usedProperties['filesystemService'])) {
            $output['filesystem_service'] = $this->filesystemService;
        }
        if (isset($this->_usedProperties['cachePrefix'])) {
            $output['cache_prefix'] = $this->cachePrefix;
        }
        if (isset($this->_usedProperties['rootUrl'])) {
            $output['root_url'] = $this->rootUrl;
        }
        if (isset($this->_usedProperties['visibility'])) {
            $output['visibility'] = $this->visibility;
        }

        return $output;
    }

}
