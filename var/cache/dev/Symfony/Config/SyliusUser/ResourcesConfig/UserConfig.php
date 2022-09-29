<?php

namespace Symfony\Config\SyliusUser\ResourcesConfig;

require_once __DIR__.\DIRECTORY_SEPARATOR.'User'.\DIRECTORY_SEPARATOR.'ResettingConfig.php';
require_once __DIR__.\DIRECTORY_SEPARATOR.'User'.\DIRECTORY_SEPARATOR.'VerificationConfig.php';
require_once __DIR__.\DIRECTORY_SEPARATOR.'User'.\DIRECTORY_SEPARATOR.'ClassesConfig.php';

use Symfony\Component\Config\Loader\ParamConfigurator;
use Symfony\Component\Config\Definition\Exception\InvalidConfigurationException;

/**
 * This class is automatically generated to help in creating a config.
 */
class UserConfig 
{
    private $templates;
    private $encoder;
    private $options;
    private $resetting;
    private $verification;
    private $classes;
    private $_usedProperties = [];

    /**
     * @default 'SyliusUserBundle:User'
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function templates($value): self
    {
        $this->_usedProperties['templates'] = true;
        $this->templates = $value;

        return $this;
    }

    /**
     * @default null
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function encoder($value): self
    {
        $this->_usedProperties['encoder'] = true;
        $this->encoder = $value;

        return $this;
    }

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

    public function resetting(array $value = []): \Symfony\Config\SyliusUser\ResourcesConfig\User\ResettingConfig
    {
        if (null === $this->resetting) {
            $this->_usedProperties['resetting'] = true;
            $this->resetting = new \Symfony\Config\SyliusUser\ResourcesConfig\User\ResettingConfig($value);
        } elseif (0 < \func_num_args()) {
            throw new InvalidConfigurationException('The node created by "resetting()" has already been initialized. You cannot pass values the second time you call resetting().');
        }

        return $this->resetting;
    }

    public function verification(array $value = []): \Symfony\Config\SyliusUser\ResourcesConfig\User\VerificationConfig
    {
        if (null === $this->verification) {
            $this->_usedProperties['verification'] = true;
            $this->verification = new \Symfony\Config\SyliusUser\ResourcesConfig\User\VerificationConfig($value);
        } elseif (0 < \func_num_args()) {
            throw new InvalidConfigurationException('The node created by "verification()" has already been initialized. You cannot pass values the second time you call verification().');
        }

        return $this->verification;
    }

    public function classes(array $value = []): \Symfony\Config\SyliusUser\ResourcesConfig\User\ClassesConfig
    {
        if (null === $this->classes) {
            $this->_usedProperties['classes'] = true;
            $this->classes = new \Symfony\Config\SyliusUser\ResourcesConfig\User\ClassesConfig($value);
        } elseif (0 < \func_num_args()) {
            throw new InvalidConfigurationException('The node created by "classes()" has already been initialized. You cannot pass values the second time you call classes().');
        }

        return $this->classes;
    }

    public function __construct(array $value = [])
    {
        if (array_key_exists('templates', $value)) {
            $this->_usedProperties['templates'] = true;
            $this->templates = $value['templates'];
            unset($value['templates']);
        }

        if (array_key_exists('encoder', $value)) {
            $this->_usedProperties['encoder'] = true;
            $this->encoder = $value['encoder'];
            unset($value['encoder']);
        }

        if (array_key_exists('options', $value)) {
            $this->_usedProperties['options'] = true;
            $this->options = $value['options'];
            unset($value['options']);
        }

        if (array_key_exists('resetting', $value)) {
            $this->_usedProperties['resetting'] = true;
            $this->resetting = new \Symfony\Config\SyliusUser\ResourcesConfig\User\ResettingConfig($value['resetting']);
            unset($value['resetting']);
        }

        if (array_key_exists('verification', $value)) {
            $this->_usedProperties['verification'] = true;
            $this->verification = new \Symfony\Config\SyliusUser\ResourcesConfig\User\VerificationConfig($value['verification']);
            unset($value['verification']);
        }

        if (array_key_exists('classes', $value)) {
            $this->_usedProperties['classes'] = true;
            $this->classes = new \Symfony\Config\SyliusUser\ResourcesConfig\User\ClassesConfig($value['classes']);
            unset($value['classes']);
        }

        if ([] !== $value) {
            throw new InvalidConfigurationException(sprintf('The following keys are not supported by "%s": ', __CLASS__).implode(', ', array_keys($value)));
        }
    }

    public function toArray(): array
    {
        $output = [];
        if (isset($this->_usedProperties['templates'])) {
            $output['templates'] = $this->templates;
        }
        if (isset($this->_usedProperties['encoder'])) {
            $output['encoder'] = $this->encoder;
        }
        if (isset($this->_usedProperties['options'])) {
            $output['options'] = $this->options;
        }
        if (isset($this->_usedProperties['resetting'])) {
            $output['resetting'] = $this->resetting->toArray();
        }
        if (isset($this->_usedProperties['verification'])) {
            $output['verification'] = $this->verification->toArray();
        }
        if (isset($this->_usedProperties['classes'])) {
            $output['classes'] = $this->classes->toArray();
        }

        return $output;
    }

}
