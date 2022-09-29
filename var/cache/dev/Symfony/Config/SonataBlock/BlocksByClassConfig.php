<?php

namespace Symfony\Config\SonataBlock;

use Symfony\Component\Config\Loader\ParamConfigurator;
use Symfony\Component\Config\Definition\Exception\InvalidConfigurationException;

/**
 * This class is automatically generated to help in creating a config.
 */
class BlocksByClassConfig 
{
    private $cache;
    private $settings;
    private $_usedProperties = [];

    /**
     * @default 'sonata.cache.noop'
     * @param ParamConfigurator|mixed $value
     * @deprecated The "cache" option for configuring blocks_by_class is deprecated since sonata-project/block-bundle 4.11 and will be removed in 5.0.
     * @return $this
     */
    public function cache($value): self
    {
        $this->_usedProperties['cache'] = true;
        $this->cache = $value;

        return $this;
    }

    /**
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function setting(string $id, $value): self
    {
        $this->_usedProperties['settings'] = true;
        $this->settings[$id] = $value;

        return $this;
    }

    public function __construct(array $value = [])
    {
        if (array_key_exists('cache', $value)) {
            $this->_usedProperties['cache'] = true;
            $this->cache = $value['cache'];
            unset($value['cache']);
        }

        if (array_key_exists('settings', $value)) {
            $this->_usedProperties['settings'] = true;
            $this->settings = $value['settings'];
            unset($value['settings']);
        }

        if ([] !== $value) {
            throw new InvalidConfigurationException(sprintf('The following keys are not supported by "%s": ', __CLASS__).implode(', ', array_keys($value)));
        }
    }

    public function toArray(): array
    {
        $output = [];
        if (isset($this->_usedProperties['cache'])) {
            $output['cache'] = $this->cache;
        }
        if (isset($this->_usedProperties['settings'])) {
            $output['settings'] = $this->settings;
        }

        return $output;
    }

}
