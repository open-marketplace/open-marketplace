<?php

namespace Symfony\Config\SyliusUi\EventConfig;

require_once __DIR__.\DIRECTORY_SEPARATOR.'BlockConfig'.\DIRECTORY_SEPARATOR.'ContextConfig.php';

use Symfony\Component\Config\Loader\ParamConfigurator;
use Symfony\Component\Config\Definition\Exception\InvalidConfigurationException;

/**
 * This class is automatically generated to help in creating a config.
 */
class BlockConfig 
{
    private $enabled;
    private $context;
    private $template;
    private $priority;
    private $_usedProperties = [];

    /**
     * @default null
     * @param ParamConfigurator|bool $value
     * @return $this
     */
    public function enabled($value): self
    {
        $this->_usedProperties['enabled'] = true;
        $this->enabled = $value;

        return $this;
    }

    public function context(array $value = []): \Symfony\Config\SyliusUi\EventConfig\BlockConfig\ContextConfig
    {
        if (null === $this->context) {
            $this->_usedProperties['context'] = true;
            $this->context = new \Symfony\Config\SyliusUi\EventConfig\BlockConfig\ContextConfig($value);
        } elseif (0 < \func_num_args()) {
            throw new InvalidConfigurationException('The node created by "context()" has already been initialized. You cannot pass values the second time you call context().');
        }

        return $this->context;
    }

    /**
     * @default null
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function template($value): self
    {
        $this->_usedProperties['template'] = true;
        $this->template = $value;

        return $this;
    }

    /**
     * @default null
     * @param ParamConfigurator|int $value
     * @return $this
     */
    public function priority($value): self
    {
        $this->_usedProperties['priority'] = true;
        $this->priority = $value;

        return $this;
    }

    public function __construct(array $value = [])
    {
        if (array_key_exists('enabled', $value)) {
            $this->_usedProperties['enabled'] = true;
            $this->enabled = $value['enabled'];
            unset($value['enabled']);
        }

        if (array_key_exists('context', $value)) {
            $this->_usedProperties['context'] = true;
            $this->context = new \Symfony\Config\SyliusUi\EventConfig\BlockConfig\ContextConfig($value['context']);
            unset($value['context']);
        }

        if (array_key_exists('template', $value)) {
            $this->_usedProperties['template'] = true;
            $this->template = $value['template'];
            unset($value['template']);
        }

        if (array_key_exists('priority', $value)) {
            $this->_usedProperties['priority'] = true;
            $this->priority = $value['priority'];
            unset($value['priority']);
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
        if (isset($this->_usedProperties['context'])) {
            $output['context'] = $this->context->toArray();
        }
        if (isset($this->_usedProperties['template'])) {
            $output['template'] = $this->template;
        }
        if (isset($this->_usedProperties['priority'])) {
            $output['priority'] = $this->priority;
        }

        return $output;
    }

}
