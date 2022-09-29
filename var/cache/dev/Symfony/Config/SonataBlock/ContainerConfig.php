<?php

namespace Symfony\Config\SonataBlock;

use Symfony\Component\Config\Loader\ParamConfigurator;
use Symfony\Component\Config\Definition\Exception\InvalidConfigurationException;

/**
 * This class is automatically generated to help in creating a config.
 */
class ContainerConfig 
{
    private $types;
    private $templates;
    private $_usedProperties = [];

    /**
     * @param ParamConfigurator|list<mixed|ParamConfigurator> $value
     * @return $this
     */
    public function types($value): self
    {
        $this->_usedProperties['types'] = true;
        $this->types = $value;

        return $this;
    }

    /**
     * @param ParamConfigurator|list<mixed|ParamConfigurator> $value
     * @return $this
     */
    public function templates($value): self
    {
        $this->_usedProperties['templates'] = true;
        $this->templates = $value;

        return $this;
    }

    public function __construct(array $value = [])
    {
        if (array_key_exists('types', $value)) {
            $this->_usedProperties['types'] = true;
            $this->types = $value['types'];
            unset($value['types']);
        }

        if (array_key_exists('templates', $value)) {
            $this->_usedProperties['templates'] = true;
            $this->templates = $value['templates'];
            unset($value['templates']);
        }

        if ([] !== $value) {
            throw new InvalidConfigurationException(sprintf('The following keys are not supported by "%s": ', __CLASS__).implode(', ', array_keys($value)));
        }
    }

    public function toArray(): array
    {
        $output = [];
        if (isset($this->_usedProperties['types'])) {
            $output['types'] = $this->types;
        }
        if (isset($this->_usedProperties['templates'])) {
            $output['templates'] = $this->templates;
        }

        return $output;
    }

}
