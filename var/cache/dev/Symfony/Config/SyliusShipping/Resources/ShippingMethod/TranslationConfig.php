<?php

namespace Symfony\Config\SyliusShipping\Resources\ShippingMethod;

require_once __DIR__.\DIRECTORY_SEPARATOR.'Translation'.\DIRECTORY_SEPARATOR.'ClassesConfig.php';

use Symfony\Component\Config\Loader\ParamConfigurator;
use Symfony\Component\Config\Definition\Exception\InvalidConfigurationException;

/**
 * This class is automatically generated to help in creating a config.
 */
class TranslationConfig 
{
    private $options;
    private $classes;
    private $_usedProperties = [];

    /**
     * @default null
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function options($value): self
    {
        $this->_usedProperties['options'] = true;
        $this->options = $value;

        return $this;
    }

    public function classes(array $value = []): \Symfony\Config\SyliusShipping\Resources\ShippingMethod\Translation\ClassesConfig
    {
        if (null === $this->classes) {
            $this->_usedProperties['classes'] = true;
            $this->classes = new \Symfony\Config\SyliusShipping\Resources\ShippingMethod\Translation\ClassesConfig($value);
        } elseif (0 < \func_num_args()) {
            throw new InvalidConfigurationException('The node created by "classes()" has already been initialized. You cannot pass values the second time you call classes().');
        }

        return $this->classes;
    }

    public function __construct(array $value = [])
    {
        if (array_key_exists('options', $value)) {
            $this->_usedProperties['options'] = true;
            $this->options = $value['options'];
            unset($value['options']);
        }

        if (array_key_exists('classes', $value)) {
            $this->_usedProperties['classes'] = true;
            $this->classes = new \Symfony\Config\SyliusShipping\Resources\ShippingMethod\Translation\ClassesConfig($value['classes']);
            unset($value['classes']);
        }

        if ([] !== $value) {
            throw new InvalidConfigurationException(sprintf('The following keys are not supported by "%s": ', __CLASS__).implode(', ', array_keys($value)));
        }
    }

    public function toArray(): array
    {
        $output = [];
        if (isset($this->_usedProperties['options'])) {
            $output['options'] = $this->options;
        }
        if (isset($this->_usedProperties['classes'])) {
            $output['classes'] = $this->classes->toArray();
        }

        return $output;
    }

}
