<?php

namespace Symfony\Config\LiipImagine\LoadersConfig;

use Symfony\Component\Config\Loader\ParamConfigurator;
use Symfony\Component\Config\Definition\Exception\InvalidConfigurationException;

/**
 * This class is automatically generated to help in creating a config.
 */
class StreamConfig 
{
    private $wrapper;
    private $context;
    private $_usedProperties = [];

    /**
     * @default null
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function wrapper($value): self
    {
        $this->_usedProperties['wrapper'] = true;
        $this->wrapper = $value;

        return $this;
    }

    /**
     * @default null
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function context($value): self
    {
        $this->_usedProperties['context'] = true;
        $this->context = $value;

        return $this;
    }

    public function __construct(array $value = [])
    {
        if (array_key_exists('wrapper', $value)) {
            $this->_usedProperties['wrapper'] = true;
            $this->wrapper = $value['wrapper'];
            unset($value['wrapper']);
        }

        if (array_key_exists('context', $value)) {
            $this->_usedProperties['context'] = true;
            $this->context = $value['context'];
            unset($value['context']);
        }

        if ([] !== $value) {
            throw new InvalidConfigurationException(sprintf('The following keys are not supported by "%s": ', __CLASS__).implode(', ', array_keys($value)));
        }
    }

    public function toArray(): array
    {
        $output = [];
        if (isset($this->_usedProperties['wrapper'])) {
            $output['wrapper'] = $this->wrapper;
        }
        if (isset($this->_usedProperties['context'])) {
            $output['context'] = $this->context;
        }

        return $output;
    }

}
