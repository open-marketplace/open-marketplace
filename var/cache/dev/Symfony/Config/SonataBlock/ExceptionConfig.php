<?php

namespace Symfony\Config\SonataBlock;

require_once __DIR__.\DIRECTORY_SEPARATOR.'Exception'.\DIRECTORY_SEPARATOR.'DefaultConfig.php';

use Symfony\Component\Config\Definition\Exception\InvalidConfigurationException;
use Symfony\Component\Config\Loader\ParamConfigurator;

/**
 * This class is automatically generated to help in creating a config.
 */
class ExceptionConfig 
{
    private $default;
    private $filters;
    private $renderers;
    private $_usedProperties = [];

    public function default(array $value = []): \Symfony\Config\SonataBlock\Exception\DefaultConfig
    {
        if (null === $this->default) {
            $this->_usedProperties['default'] = true;
            $this->default = new \Symfony\Config\SonataBlock\Exception\DefaultConfig($value);
        } elseif (0 < \func_num_args()) {
            throw new InvalidConfigurationException('The node created by "default()" has already been initialized. You cannot pass values the second time you call default().');
        }

        return $this->default;
    }

    /**
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function filter(string $id, $value): self
    {
        $this->_usedProperties['filters'] = true;
        $this->filters[$id] = $value;

        return $this;
    }

    /**
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function renderer(string $id, $value): self
    {
        $this->_usedProperties['renderers'] = true;
        $this->renderers[$id] = $value;

        return $this;
    }

    public function __construct(array $value = [])
    {
        if (array_key_exists('default', $value)) {
            $this->_usedProperties['default'] = true;
            $this->default = new \Symfony\Config\SonataBlock\Exception\DefaultConfig($value['default']);
            unset($value['default']);
        }

        if (array_key_exists('filters', $value)) {
            $this->_usedProperties['filters'] = true;
            $this->filters = $value['filters'];
            unset($value['filters']);
        }

        if (array_key_exists('renderers', $value)) {
            $this->_usedProperties['renderers'] = true;
            $this->renderers = $value['renderers'];
            unset($value['renderers']);
        }

        if ([] !== $value) {
            throw new InvalidConfigurationException(sprintf('The following keys are not supported by "%s": ', __CLASS__).implode(', ', array_keys($value)));
        }
    }

    public function toArray(): array
    {
        $output = [];
        if (isset($this->_usedProperties['default'])) {
            $output['default'] = $this->default->toArray();
        }
        if (isset($this->_usedProperties['filters'])) {
            $output['filters'] = $this->filters;
        }
        if (isset($this->_usedProperties['renderers'])) {
            $output['renderers'] = $this->renderers;
        }

        return $output;
    }

}
