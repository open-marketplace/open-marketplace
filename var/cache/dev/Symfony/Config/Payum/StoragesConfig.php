<?php

namespace Symfony\Config\Payum;

require_once __DIR__.\DIRECTORY_SEPARATOR.'StoragesConfig'.\DIRECTORY_SEPARATOR.'ExtensionConfig.php';
require_once __DIR__.\DIRECTORY_SEPARATOR.'StoragesConfig'.\DIRECTORY_SEPARATOR.'FilesystemConfig.php';
require_once __DIR__.\DIRECTORY_SEPARATOR.'StoragesConfig'.\DIRECTORY_SEPARATOR.'DoctrineConfig.php';
require_once __DIR__.\DIRECTORY_SEPARATOR.'StoragesConfig'.\DIRECTORY_SEPARATOR.'CustomConfig.php';
require_once __DIR__.\DIRECTORY_SEPARATOR.'StoragesConfig'.\DIRECTORY_SEPARATOR.'Propel1Config.php';
require_once __DIR__.\DIRECTORY_SEPARATOR.'StoragesConfig'.\DIRECTORY_SEPARATOR.'Propel2Config.php';

use Symfony\Component\Config\Definition\Exception\InvalidConfigurationException;

/**
 * This class is automatically generated to help in creating a config.
 */
class StoragesConfig 
{
    private $extension;
    private $filesystem;
    private $doctrine;
    private $custom;
    private $propel1;
    private $propel2;
    private $_usedProperties = [];

    public function extension(array $value = []): \Symfony\Config\Payum\StoragesConfig\ExtensionConfig
    {
        if (null === $this->extension) {
            $this->_usedProperties['extension'] = true;
            $this->extension = new \Symfony\Config\Payum\StoragesConfig\ExtensionConfig($value);
        } elseif (0 < \func_num_args()) {
            throw new InvalidConfigurationException('The node created by "extension()" has already been initialized. You cannot pass values the second time you call extension().');
        }

        return $this->extension;
    }

    public function filesystem(array $value = []): \Symfony\Config\Payum\StoragesConfig\FilesystemConfig
    {
        if (null === $this->filesystem) {
            $this->_usedProperties['filesystem'] = true;
            $this->filesystem = new \Symfony\Config\Payum\StoragesConfig\FilesystemConfig($value);
        } elseif (0 < \func_num_args()) {
            throw new InvalidConfigurationException('The node created by "filesystem()" has already been initialized. You cannot pass values the second time you call filesystem().');
        }

        return $this->filesystem;
    }

    /**
     * @return \Symfony\Config\Payum\StoragesConfig\DoctrineConfig|$this
     */
    public function doctrine($value = [])
    {
        if (!\is_array($value)) {
            $this->_usedProperties['doctrine'] = true;
            $this->doctrine = $value;

            return $this;
        }

        if (!$this->doctrine instanceof \Symfony\Config\Payum\StoragesConfig\DoctrineConfig) {
            $this->_usedProperties['doctrine'] = true;
            $this->doctrine = new \Symfony\Config\Payum\StoragesConfig\DoctrineConfig($value);
        } elseif (0 < \func_num_args()) {
            throw new InvalidConfigurationException('The node created by "doctrine()" has already been initialized. You cannot pass values the second time you call doctrine().');
        }

        return $this->doctrine;
    }

    /**
     * @return \Symfony\Config\Payum\StoragesConfig\CustomConfig|$this
     */
    public function custom($value = [])
    {
        if (!\is_array($value)) {
            $this->_usedProperties['custom'] = true;
            $this->custom = $value;

            return $this;
        }

        if (!$this->custom instanceof \Symfony\Config\Payum\StoragesConfig\CustomConfig) {
            $this->_usedProperties['custom'] = true;
            $this->custom = new \Symfony\Config\Payum\StoragesConfig\CustomConfig($value);
        } elseif (0 < \func_num_args()) {
            throw new InvalidConfigurationException('The node created by "custom()" has already been initialized. You cannot pass values the second time you call custom().');
        }

        return $this->custom;
    }

    public function propel1(array $value = []): \Symfony\Config\Payum\StoragesConfig\Propel1Config
    {
        if (null === $this->propel1) {
            $this->_usedProperties['propel1'] = true;
            $this->propel1 = new \Symfony\Config\Payum\StoragesConfig\Propel1Config($value);
        } elseif (0 < \func_num_args()) {
            throw new InvalidConfigurationException('The node created by "propel1()" has already been initialized. You cannot pass values the second time you call propel1().');
        }

        return $this->propel1;
    }

    public function propel2(array $value = []): \Symfony\Config\Payum\StoragesConfig\Propel2Config
    {
        if (null === $this->propel2) {
            $this->_usedProperties['propel2'] = true;
            $this->propel2 = new \Symfony\Config\Payum\StoragesConfig\Propel2Config($value);
        } elseif (0 < \func_num_args()) {
            throw new InvalidConfigurationException('The node created by "propel2()" has already been initialized. You cannot pass values the second time you call propel2().');
        }

        return $this->propel2;
    }

    public function __construct(array $value = [])
    {
        if (array_key_exists('extension', $value)) {
            $this->_usedProperties['extension'] = true;
            $this->extension = new \Symfony\Config\Payum\StoragesConfig\ExtensionConfig($value['extension']);
            unset($value['extension']);
        }

        if (array_key_exists('filesystem', $value)) {
            $this->_usedProperties['filesystem'] = true;
            $this->filesystem = new \Symfony\Config\Payum\StoragesConfig\FilesystemConfig($value['filesystem']);
            unset($value['filesystem']);
        }

        if (array_key_exists('doctrine', $value)) {
            $this->_usedProperties['doctrine'] = true;
            $this->doctrine = \is_array($value['doctrine']) ? new \Symfony\Config\Payum\StoragesConfig\DoctrineConfig($value['doctrine']) : $value['doctrine'];
            unset($value['doctrine']);
        }

        if (array_key_exists('custom', $value)) {
            $this->_usedProperties['custom'] = true;
            $this->custom = \is_array($value['custom']) ? new \Symfony\Config\Payum\StoragesConfig\CustomConfig($value['custom']) : $value['custom'];
            unset($value['custom']);
        }

        if (array_key_exists('propel1', $value)) {
            $this->_usedProperties['propel1'] = true;
            $this->propel1 = new \Symfony\Config\Payum\StoragesConfig\Propel1Config($value['propel1']);
            unset($value['propel1']);
        }

        if (array_key_exists('propel2', $value)) {
            $this->_usedProperties['propel2'] = true;
            $this->propel2 = new \Symfony\Config\Payum\StoragesConfig\Propel2Config($value['propel2']);
            unset($value['propel2']);
        }

        if ([] !== $value) {
            throw new InvalidConfigurationException(sprintf('The following keys are not supported by "%s": ', __CLASS__).implode(', ', array_keys($value)));
        }
    }

    public function toArray(): array
    {
        $output = [];
        if (isset($this->_usedProperties['extension'])) {
            $output['extension'] = $this->extension->toArray();
        }
        if (isset($this->_usedProperties['filesystem'])) {
            $output['filesystem'] = $this->filesystem->toArray();
        }
        if (isset($this->_usedProperties['doctrine'])) {
            $output['doctrine'] = $this->doctrine instanceof \Symfony\Config\Payum\StoragesConfig\DoctrineConfig ? $this->doctrine->toArray() : $this->doctrine;
        }
        if (isset($this->_usedProperties['custom'])) {
            $output['custom'] = $this->custom instanceof \Symfony\Config\Payum\StoragesConfig\CustomConfig ? $this->custom->toArray() : $this->custom;
        }
        if (isset($this->_usedProperties['propel1'])) {
            $output['propel1'] = $this->propel1->toArray();
        }
        if (isset($this->_usedProperties['propel2'])) {
            $output['propel2'] = $this->propel2->toArray();
        }

        return $output;
    }

}
