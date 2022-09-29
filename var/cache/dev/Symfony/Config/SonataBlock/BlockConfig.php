<?php

namespace Symfony\Config\SonataBlock;

require_once __DIR__.\DIRECTORY_SEPARATOR.'BlockConfig'.\DIRECTORY_SEPARATOR.'TemplateConfig.php';
require_once __DIR__.\DIRECTORY_SEPARATOR.'BlockConfig'.\DIRECTORY_SEPARATOR.'ExceptionConfig.php';

use Symfony\Component\Config\Loader\ParamConfigurator;
use Symfony\Component\Config\Definition\Exception\InvalidConfigurationException;

/**
 * This class is automatically generated to help in creating a config.
 */
class BlockConfig 
{
    private $contexts;
    private $templates;
    private $cache;
    private $settings;
    private $exception;
    private $_usedProperties = [];

    /**
     * @param ParamConfigurator|list<mixed|ParamConfigurator> $value
     * @return $this
     */
    public function contexts($value): self
    {
        $this->_usedProperties['contexts'] = true;
        $this->contexts = $value;

        return $this;
    }

    public function template(array $value = []): \Symfony\Config\SonataBlock\BlockConfig\TemplateConfig
    {
        $this->_usedProperties['templates'] = true;

        return $this->templates[] = new \Symfony\Config\SonataBlock\BlockConfig\TemplateConfig($value);
    }

    /**
     * @default 'sonata.cache.noop'
     * @param ParamConfigurator|mixed $value
     * @deprecated The "cache" option for configuring blocks is deprecated since sonata-project/block-bundle 4.11 and will be removed in 5.0.
     * @return $this
     */
    public function cache($value): self
    {
        $this->_usedProperties['cache'] = true;
        $this->cache = $value;

        return $this;
    }

    /**
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function setting(string $id, $value): self
    {
        $this->_usedProperties['settings'] = true;
        $this->settings[$id] = $value;

        return $this;
    }

    public function exception(array $value = []): \Symfony\Config\SonataBlock\BlockConfig\ExceptionConfig
    {
        if (null === $this->exception) {
            $this->_usedProperties['exception'] = true;
            $this->exception = new \Symfony\Config\SonataBlock\BlockConfig\ExceptionConfig($value);
        } elseif (0 < \func_num_args()) {
            throw new InvalidConfigurationException('The node created by "exception()" has already been initialized. You cannot pass values the second time you call exception().');
        }

        return $this->exception;
    }

    public function __construct(array $value = [])
    {
        if (array_key_exists('contexts', $value)) {
            $this->_usedProperties['contexts'] = true;
            $this->contexts = $value['contexts'];
            unset($value['contexts']);
        }

        if (array_key_exists('templates', $value)) {
            $this->_usedProperties['templates'] = true;
            $this->templates = array_map(function ($v) { return new \Symfony\Config\SonataBlock\BlockConfig\TemplateConfig($v); }, $value['templates']);
            unset($value['templates']);
        }

        if (array_key_exists('cache', $value)) {
            $this->_usedProperties['cache'] = true;
            $this->cache = $value['cache'];
            unset($value['cache']);
        }

        if (array_key_exists('settings', $value)) {
            $this->_usedProperties['settings'] = true;
            $this->settings = $value['settings'];
            unset($value['settings']);
        }

        if (array_key_exists('exception', $value)) {
            $this->_usedProperties['exception'] = true;
            $this->exception = new \Symfony\Config\SonataBlock\BlockConfig\ExceptionConfig($value['exception']);
            unset($value['exception']);
        }

        if ([] !== $value) {
            throw new InvalidConfigurationException(sprintf('The following keys are not supported by "%s": ', __CLASS__).implode(', ', array_keys($value)));
        }
    }

    public function toArray(): array
    {
        $output = [];
        if (isset($this->_usedProperties['contexts'])) {
            $output['contexts'] = $this->contexts;
        }
        if (isset($this->_usedProperties['templates'])) {
            $output['templates'] = array_map(function ($v) { return $v->toArray(); }, $this->templates);
        }
        if (isset($this->_usedProperties['cache'])) {
            $output['cache'] = $this->cache;
        }
        if (isset($this->_usedProperties['settings'])) {
            $output['settings'] = $this->settings;
        }
        if (isset($this->_usedProperties['exception'])) {
            $output['exception'] = $this->exception->toArray();
        }

        return $output;
    }

}
