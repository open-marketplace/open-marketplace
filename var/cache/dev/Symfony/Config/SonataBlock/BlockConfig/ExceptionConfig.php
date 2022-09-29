<?php

namespace Symfony\Config\SonataBlock\BlockConfig;

use Symfony\Component\Config\Loader\ParamConfigurator;
use Symfony\Component\Config\Definition\Exception\InvalidConfigurationException;

/**
 * This class is automatically generated to help in creating a config.
 */
class ExceptionConfig 
{
    private $filter;
    private $renderer;
    private $_usedProperties = [];

    /**
     * @default null
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function filter($value): self
    {
        $this->_usedProperties['filter'] = true;
        $this->filter = $value;

        return $this;
    }

    /**
     * @default null
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function renderer($value): self
    {
        $this->_usedProperties['renderer'] = true;
        $this->renderer = $value;

        return $this;
    }

    public function __construct(array $value = [])
    {
        if (array_key_exists('filter', $value)) {
            $this->_usedProperties['filter'] = true;
            $this->filter = $value['filter'];
            unset($value['filter']);
        }

        if (array_key_exists('renderer', $value)) {
            $this->_usedProperties['renderer'] = true;
            $this->renderer = $value['renderer'];
            unset($value['renderer']);
        }

        if ([] !== $value) {
            throw new InvalidConfigurationException(sprintf('The following keys are not supported by "%s": ', __CLASS__).implode(', ', array_keys($value)));
        }
    }

    public function toArray(): array
    {
        $output = [];
        if (isset($this->_usedProperties['filter'])) {
            $output['filter'] = $this->filter;
        }
        if (isset($this->_usedProperties['renderer'])) {
            $output['renderer'] = $this->renderer;
        }

        return $output;
    }

}
