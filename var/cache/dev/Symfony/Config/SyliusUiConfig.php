<?php

namespace Symfony\Config;

require_once __DIR__.\DIRECTORY_SEPARATOR.'SyliusUi'.\DIRECTORY_SEPARATOR.'EventConfig.php';

use Symfony\Component\Config\Definition\Exception\InvalidConfigurationException;

/**
 * This class is automatically generated to help in creating a config.
 */
class SyliusUiConfig implements \Symfony\Component\Config\Builder\ConfigBuilderInterface
{
    private $events;
    private $_usedProperties = [];

    public function event(string $event_name, array $value = []): \Symfony\Config\SyliusUi\EventConfig
    {
        if (!isset($this->events[$event_name])) {
            $this->_usedProperties['events'] = true;
            $this->events[$event_name] = new \Symfony\Config\SyliusUi\EventConfig($value);
        } elseif (1 < \func_num_args()) {
            throw new InvalidConfigurationException('The node created by "event()" has already been initialized. You cannot pass values the second time you call event().');
        }

        return $this->events[$event_name];
    }

    public function getExtensionAlias(): string
    {
        return 'sylius_ui';
    }

    public function __construct(array $value = [])
    {
        if (array_key_exists('events', $value)) {
            $this->_usedProperties['events'] = true;
            $this->events = array_map(function ($v) { return new \Symfony\Config\SyliusUi\EventConfig($v); }, $value['events']);
            unset($value['events']);
        }

        if ([] !== $value) {
            throw new InvalidConfigurationException(sprintf('The following keys are not supported by "%s": ', __CLASS__).implode(', ', array_keys($value)));
        }
    }

    public function toArray(): array
    {
        $output = [];
        if (isset($this->_usedProperties['events'])) {
            $output['events'] = array_map(function ($v) { return $v->toArray(); }, $this->events);
        }

        return $output;
    }

}
