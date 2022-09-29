<?php

namespace Symfony\Config\SyliusTheme;

require_once __DIR__.\DIRECTORY_SEPARATOR.'Sources'.\DIRECTORY_SEPARATOR.'FilesystemConfig.php';
require_once __DIR__.\DIRECTORY_SEPARATOR.'Sources'.\DIRECTORY_SEPARATOR.'TestConfig.php';

use Symfony\Component\Config\Definition\Exception\InvalidConfigurationException;

/**
 * This class is automatically generated to help in creating a config.
 */
class SourcesConfig 
{
    private $filesystem;
    private $test;
    private $_usedProperties = [];

    /**
     * @return \Symfony\Config\SyliusTheme\Sources\FilesystemConfig|$this
     */
    public function filesystem($value = [])
    {
        if (!\is_array($value)) {
            $this->_usedProperties['filesystem'] = true;
            $this->filesystem = $value;

            return $this;
        }

        if (!$this->filesystem instanceof \Symfony\Config\SyliusTheme\Sources\FilesystemConfig) {
            $this->_usedProperties['filesystem'] = true;
            $this->filesystem = new \Symfony\Config\SyliusTheme\Sources\FilesystemConfig($value);
        } elseif (0 < \func_num_args()) {
            throw new InvalidConfigurationException('The node created by "filesystem()" has already been initialized. You cannot pass values the second time you call filesystem().');
        }

        return $this->filesystem;
    }

    /**
     * @return \Symfony\Config\SyliusTheme\Sources\TestConfig|$this
     */
    public function test($value = [])
    {
        if (!\is_array($value)) {
            $this->_usedProperties['test'] = true;
            $this->test = $value;

            return $this;
        }

        if (!$this->test instanceof \Symfony\Config\SyliusTheme\Sources\TestConfig) {
            $this->_usedProperties['test'] = true;
            $this->test = new \Symfony\Config\SyliusTheme\Sources\TestConfig($value);
        } elseif (0 < \func_num_args()) {
            throw new InvalidConfigurationException('The node created by "test()" has already been initialized. You cannot pass values the second time you call test().');
        }

        return $this->test;
    }

    public function __construct(array $value = [])
    {
        if (array_key_exists('filesystem', $value)) {
            $this->_usedProperties['filesystem'] = true;
            $this->filesystem = \is_array($value['filesystem']) ? new \Symfony\Config\SyliusTheme\Sources\FilesystemConfig($value['filesystem']) : $value['filesystem'];
            unset($value['filesystem']);
        }

        if (array_key_exists('test', $value)) {
            $this->_usedProperties['test'] = true;
            $this->test = \is_array($value['test']) ? new \Symfony\Config\SyliusTheme\Sources\TestConfig($value['test']) : $value['test'];
            unset($value['test']);
        }

        if ([] !== $value) {
            throw new InvalidConfigurationException(sprintf('The following keys are not supported by "%s": ', __CLASS__).implode(', ', array_keys($value)));
        }
    }

    public function toArray(): array
    {
        $output = [];
        if (isset($this->_usedProperties['filesystem'])) {
            $output['filesystem'] = $this->filesystem instanceof \Symfony\Config\SyliusTheme\Sources\FilesystemConfig ? $this->filesystem->toArray() : $this->filesystem;
        }
        if (isset($this->_usedProperties['test'])) {
            $output['test'] = $this->test instanceof \Symfony\Config\SyliusTheme\Sources\TestConfig ? $this->test->toArray() : $this->test;
        }

        return $output;
    }

}
