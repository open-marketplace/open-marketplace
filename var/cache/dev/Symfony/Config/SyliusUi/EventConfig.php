<?php

namespace Symfony\Config\SyliusUi;

require_once __DIR__.\DIRECTORY_SEPARATOR.'EventConfig'.\DIRECTORY_SEPARATOR.'BlockConfig.php';

use Symfony\Component\Config\Definition\Exception\InvalidConfigurationException;

/**
 * This class is automatically generated to help in creating a config.
 */
class EventConfig 
{
    private $blocks;
    private $_usedProperties = [];

    /**
     * @return \Symfony\Config\SyliusUi\EventConfig\BlockConfig|$this
     */
    public function block(string $block_name, $value = [])
    {
        if (!\is_array($value)) {
            $this->_usedProperties['blocks'] = true;
            $this->blocks[$block_name] = $value;

            return $this;
        }

        if (!isset($this->blocks[$block_name]) || !$this->blocks[$block_name] instanceof \Symfony\Config\SyliusUi\EventConfig\BlockConfig) {
            $this->_usedProperties['blocks'] = true;
            $this->blocks[$block_name] = new \Symfony\Config\SyliusUi\EventConfig\BlockConfig($value);
        } elseif (1 < \func_num_args()) {
            throw new InvalidConfigurationException('The node created by "block()" has already been initialized. You cannot pass values the second time you call block().');
        }

        return $this->blocks[$block_name];
    }

    public function __construct(array $value = [])
    {
        if (array_key_exists('blocks', $value)) {
            $this->_usedProperties['blocks'] = true;
            $this->blocks = array_map(function ($v) { return \is_array($v) ? new \Symfony\Config\SyliusUi\EventConfig\BlockConfig($v) : $v; }, $value['blocks']);
            unset($value['blocks']);
        }

        if ([] !== $value) {
            throw new InvalidConfigurationException(sprintf('The following keys are not supported by "%s": ', __CLASS__).implode(', ', array_keys($value)));
        }
    }

    public function toArray(): array
    {
        $output = [];
        if (isset($this->_usedProperties['blocks'])) {
            $output['blocks'] = array_map(function ($v) { return $v instanceof \Symfony\Config\SyliusUi\EventConfig\BlockConfig ? $v->toArray() : $v; }, $this->blocks);
        }

        return $output;
    }

}
