<?php

namespace Symfony\Config;

require_once __DIR__.\DIRECTORY_SEPARATOR.'SyliusPayum'.\DIRECTORY_SEPARATOR.'TemplateConfig.php';
require_once __DIR__.\DIRECTORY_SEPARATOR.'SyliusPayum'.\DIRECTORY_SEPARATOR.'ResourcesConfig.php';

use Symfony\Component\Config\Loader\ParamConfigurator;
use Symfony\Component\Config\Definition\Exception\InvalidConfigurationException;

/**
 * This class is automatically generated to help in creating a config.
 */
class SyliusPayumConfig implements \Symfony\Component\Config\Builder\ConfigBuilderInterface
{
    private $driver;
    private $template;
    private $resources;
    private $_usedProperties = [];

    /**
     * @default 'doctrine/orm'
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function driver($value): self
    {
        $this->_usedProperties['driver'] = true;
        $this->driver = $value;

        return $this;
    }

    public function template(array $value = []): \Symfony\Config\SyliusPayum\TemplateConfig
    {
        if (null === $this->template) {
            $this->_usedProperties['template'] = true;
            $this->template = new \Symfony\Config\SyliusPayum\TemplateConfig($value);
        } elseif (0 < \func_num_args()) {
            throw new InvalidConfigurationException('The node created by "template()" has already been initialized. You cannot pass values the second time you call template().');
        }

        return $this->template;
    }

    public function resources(array $value = []): \Symfony\Config\SyliusPayum\ResourcesConfig
    {
        if (null === $this->resources) {
            $this->_usedProperties['resources'] = true;
            $this->resources = new \Symfony\Config\SyliusPayum\ResourcesConfig($value);
        } elseif (0 < \func_num_args()) {
            throw new InvalidConfigurationException('The node created by "resources()" has already been initialized. You cannot pass values the second time you call resources().');
        }

        return $this->resources;
    }

    public function getExtensionAlias(): string
    {
        return 'sylius_payum';
    }

    public function __construct(array $value = [])
    {
        if (array_key_exists('driver', $value)) {
            $this->_usedProperties['driver'] = true;
            $this->driver = $value['driver'];
            unset($value['driver']);
        }

        if (array_key_exists('template', $value)) {
            $this->_usedProperties['template'] = true;
            $this->template = new \Symfony\Config\SyliusPayum\TemplateConfig($value['template']);
            unset($value['template']);
        }

        if (array_key_exists('resources', $value)) {
            $this->_usedProperties['resources'] = true;
            $this->resources = new \Symfony\Config\SyliusPayum\ResourcesConfig($value['resources']);
            unset($value['resources']);
        }

        if ([] !== $value) {
            throw new InvalidConfigurationException(sprintf('The following keys are not supported by "%s": ', __CLASS__).implode(', ', array_keys($value)));
        }
    }

    public function toArray(): array
    {
        $output = [];
        if (isset($this->_usedProperties['driver'])) {
            $output['driver'] = $this->driver;
        }
        if (isset($this->_usedProperties['template'])) {
            $output['template'] = $this->template->toArray();
        }
        if (isset($this->_usedProperties['resources'])) {
            $output['resources'] = $this->resources->toArray();
        }

        return $output;
    }

}
