<?php

namespace Symfony\Config\LiipImagine\ResolversConfig;

use Symfony\Component\Config\Loader\ParamConfigurator;
use Symfony\Component\Config\Definition\Exception\InvalidConfigurationException;

/**
 * This class is automatically generated to help in creating a config.
 */
class WebPathConfig 
{
    private $webRoot;
    private $cachePrefix;
    private $_usedProperties = [];

    /**
     * @default '%kernel.project_dir%/public'
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function webRoot($value): self
    {
        $this->_usedProperties['webRoot'] = true;
        $this->webRoot = $value;

        return $this;
    }

    /**
     * @default 'media/cache'
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function cachePrefix($value): self
    {
        $this->_usedProperties['cachePrefix'] = true;
        $this->cachePrefix = $value;

        return $this;
    }

    public function __construct(array $value = [])
    {
        if (array_key_exists('web_root', $value)) {
            $this->_usedProperties['webRoot'] = true;
            $this->webRoot = $value['web_root'];
            unset($value['web_root']);
        }

        if (array_key_exists('cache_prefix', $value)) {
            $this->_usedProperties['cachePrefix'] = true;
            $this->cachePrefix = $value['cache_prefix'];
            unset($value['cache_prefix']);
        }

        if ([] !== $value) {
            throw new InvalidConfigurationException(sprintf('The following keys are not supported by "%s": ', __CLASS__).implode(', ', array_keys($value)));
        }
    }

    public function toArray(): array
    {
        $output = [];
        if (isset($this->_usedProperties['webRoot'])) {
            $output['web_root'] = $this->webRoot;
        }
        if (isset($this->_usedProperties['cachePrefix'])) {
            $output['cache_prefix'] = $this->cachePrefix;
        }

        return $output;
    }

}
