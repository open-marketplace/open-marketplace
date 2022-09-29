<?php

namespace Symfony\Config\SonataBlock;

use Symfony\Component\Config\Loader\ParamConfigurator;
use Symfony\Component\Config\Definition\Exception\InvalidConfigurationException;

/**
 * This class is automatically generated to help in creating a config.
 */
class HttpCacheConfig 
{
    private $handler;
    private $listener;
    private $_usedProperties = [];

    /**
     * @default 'sonata.block.cache.handler.default'
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function handler($value): self
    {
        $this->_usedProperties['handler'] = true;
        $this->handler = $value;

        return $this;
    }

    /**
     * @default true
     * @param ParamConfigurator|bool $value
     * @return $this
     */
    public function listener($value): self
    {
        $this->_usedProperties['listener'] = true;
        $this->listener = $value;

        return $this;
    }

    public function __construct(array $value = [])
    {
        if (array_key_exists('handler', $value)) {
            $this->_usedProperties['handler'] = true;
            $this->handler = $value['handler'];
            unset($value['handler']);
        }

        if (array_key_exists('listener', $value)) {
            $this->_usedProperties['listener'] = true;
            $this->listener = $value['listener'];
            unset($value['listener']);
        }

        if ([] !== $value) {
            throw new InvalidConfigurationException(sprintf('The following keys are not supported by "%s": ', __CLASS__).implode(', ', array_keys($value)));
        }
    }

    public function toArray(): array
    {
        $output = [];
        if (isset($this->_usedProperties['handler'])) {
            $output['handler'] = $this->handler;
        }
        if (isset($this->_usedProperties['listener'])) {
            $output['listener'] = $this->listener;
        }

        return $output;
    }

}
