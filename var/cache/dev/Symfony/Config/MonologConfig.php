<?php

namespace Symfony\Config;

require_once __DIR__.\DIRECTORY_SEPARATOR.'Monolog'.\DIRECTORY_SEPARATOR.'HandlerConfig.php';

use Symfony\Component\Config\Loader\ParamConfigurator;
use Symfony\Component\Config\Definition\Exception\InvalidConfigurationException;

/**
 * This class is automatically generated to help in creating a config.
 */
class MonologConfig implements \Symfony\Component\Config\Builder\ConfigBuilderInterface
{
    private $useMicroseconds;
    private $channels;
    private $handlers;
    private $_usedProperties = [];

    /**
     * @default true
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function useMicroseconds($value): self
    {
        $this->_usedProperties['useMicroseconds'] = true;
        $this->useMicroseconds = $value;

        return $this;
    }

    /**
     * @param ParamConfigurator|list<mixed|ParamConfigurator> $value
     * @return $this
     */
    public function channels($value): self
    {
        $this->_usedProperties['channels'] = true;
        $this->channels = $value;

        return $this;
    }

    /**
     * @return \Symfony\Config\Monolog\HandlerConfig|$this
     */
    public function handler(string $name, $value = [])
    {
        if (!\is_array($value)) {
            $this->_usedProperties['handlers'] = true;
            $this->handlers[$name] = $value;

            return $this;
        }

        if (!isset($this->handlers[$name]) || !$this->handlers[$name] instanceof \Symfony\Config\Monolog\HandlerConfig) {
            $this->_usedProperties['handlers'] = true;
            $this->handlers[$name] = new \Symfony\Config\Monolog\HandlerConfig($value);
        } elseif (1 < \func_num_args()) {
            throw new InvalidConfigurationException('The node created by "handler()" has already been initialized. You cannot pass values the second time you call handler().');
        }

        return $this->handlers[$name];
    }

    public function getExtensionAlias(): string
    {
        return 'monolog';
    }

    public function __construct(array $value = [])
    {
        if (array_key_exists('use_microseconds', $value)) {
            $this->_usedProperties['useMicroseconds'] = true;
            $this->useMicroseconds = $value['use_microseconds'];
            unset($value['use_microseconds']);
        }

        if (array_key_exists('channels', $value)) {
            $this->_usedProperties['channels'] = true;
            $this->channels = $value['channels'];
            unset($value['channels']);
        }

        if (array_key_exists('handlers', $value)) {
            $this->_usedProperties['handlers'] = true;
            $this->handlers = array_map(function ($v) { return \is_array($v) ? new \Symfony\Config\Monolog\HandlerConfig($v) : $v; }, $value['handlers']);
            unset($value['handlers']);
        }

        if ([] !== $value) {
            throw new InvalidConfigurationException(sprintf('The following keys are not supported by "%s": ', __CLASS__).implode(', ', array_keys($value)));
        }
    }

    public function toArray(): array
    {
        $output = [];
        if (isset($this->_usedProperties['useMicroseconds'])) {
            $output['use_microseconds'] = $this->useMicroseconds;
        }
        if (isset($this->_usedProperties['channels'])) {
            $output['channels'] = $this->channels;
        }
        if (isset($this->_usedProperties['handlers'])) {
            $output['handlers'] = array_map(function ($v) { return $v instanceof \Symfony\Config\Monolog\HandlerConfig ? $v->toArray() : $v; }, $this->handlers);
        }

        return $output;
    }

}
