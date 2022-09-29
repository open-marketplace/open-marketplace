<?php

namespace Symfony\Config;

require_once __DIR__.\DIRECTORY_SEPARATOR.'KnpGaufrette'.\DIRECTORY_SEPARATOR.'AdapterConfig.php';
require_once __DIR__.\DIRECTORY_SEPARATOR.'KnpGaufrette'.\DIRECTORY_SEPARATOR.'FilesystemConfig.php';
require_once __DIR__.\DIRECTORY_SEPARATOR.'KnpGaufrette'.\DIRECTORY_SEPARATOR.'StreamWrapperConfig.php';
require_once __DIR__.\DIRECTORY_SEPARATOR.'KnpGaufrette'.\DIRECTORY_SEPARATOR.'FactoriesConfig.php';

use Symfony\Component\Config\Definition\Exception\InvalidConfigurationException;

/**
 * This class is automatically generated to help in creating a config.
 */
class KnpGaufretteConfig implements \Symfony\Component\Config\Builder\ConfigBuilderInterface
{
    private $adapters;
    private $filesystems;
    private $streamWrapper;
    private $factories;
    private $_usedProperties = [];

    public function adapter(string $name, array $value = []): \Symfony\Config\KnpGaufrette\AdapterConfig
    {
        if (!isset($this->adapters[$name])) {
            $this->_usedProperties['adapters'] = true;
            $this->adapters[$name] = new \Symfony\Config\KnpGaufrette\AdapterConfig($value);
        } elseif (1 < \func_num_args()) {
            throw new InvalidConfigurationException('The node created by "adapter()" has already been initialized. You cannot pass values the second time you call adapter().');
        }

        return $this->adapters[$name];
    }

    public function filesystem(string $name, array $value = []): \Symfony\Config\KnpGaufrette\FilesystemConfig
    {
        if (!isset($this->filesystems[$name])) {
            $this->_usedProperties['filesystems'] = true;
            $this->filesystems[$name] = new \Symfony\Config\KnpGaufrette\FilesystemConfig($value);
        } elseif (1 < \func_num_args()) {
            throw new InvalidConfigurationException('The node created by "filesystem()" has already been initialized. You cannot pass values the second time you call filesystem().');
        }

        return $this->filesystems[$name];
    }

    public function streamWrapper(array $value = []): \Symfony\Config\KnpGaufrette\StreamWrapperConfig
    {
        if (null === $this->streamWrapper) {
            $this->_usedProperties['streamWrapper'] = true;
            $this->streamWrapper = new \Symfony\Config\KnpGaufrette\StreamWrapperConfig($value);
        } elseif (0 < \func_num_args()) {
            throw new InvalidConfigurationException('The node created by "streamWrapper()" has already been initialized. You cannot pass values the second time you call streamWrapper().');
        }

        return $this->streamWrapper;
    }

    public function factories(array $value = []): \Symfony\Config\KnpGaufrette\FactoriesConfig
    {
        if (null === $this->factories) {
            $this->_usedProperties['factories'] = true;
            $this->factories = new \Symfony\Config\KnpGaufrette\FactoriesConfig($value);
        } elseif (0 < \func_num_args()) {
            throw new InvalidConfigurationException('The node created by "factories()" has already been initialized. You cannot pass values the second time you call factories().');
        }

        return $this->factories;
    }

    public function getExtensionAlias(): string
    {
        return 'knp_gaufrette';
    }

    public function __construct(array $value = [])
    {
        if (array_key_exists('adapters', $value)) {
            $this->_usedProperties['adapters'] = true;
            $this->adapters = array_map(function ($v) { return new \Symfony\Config\KnpGaufrette\AdapterConfig($v); }, $value['adapters']);
            unset($value['adapters']);
        }

        if (array_key_exists('filesystems', $value)) {
            $this->_usedProperties['filesystems'] = true;
            $this->filesystems = array_map(function ($v) { return new \Symfony\Config\KnpGaufrette\FilesystemConfig($v); }, $value['filesystems']);
            unset($value['filesystems']);
        }

        if (array_key_exists('stream_wrapper', $value)) {
            $this->_usedProperties['streamWrapper'] = true;
            $this->streamWrapper = new \Symfony\Config\KnpGaufrette\StreamWrapperConfig($value['stream_wrapper']);
            unset($value['stream_wrapper']);
        }

        if (array_key_exists('factories', $value)) {
            $this->_usedProperties['factories'] = true;
            $this->factories = new \Symfony\Config\KnpGaufrette\FactoriesConfig($value['factories']);
            unset($value['factories']);
        }

        if ([] !== $value) {
            throw new InvalidConfigurationException(sprintf('The following keys are not supported by "%s": ', __CLASS__).implode(', ', array_keys($value)));
        }
    }

    public function toArray(): array
    {
        $output = [];
        if (isset($this->_usedProperties['adapters'])) {
            $output['adapters'] = array_map(function ($v) { return $v->toArray(); }, $this->adapters);
        }
        if (isset($this->_usedProperties['filesystems'])) {
            $output['filesystems'] = array_map(function ($v) { return $v->toArray(); }, $this->filesystems);
        }
        if (isset($this->_usedProperties['streamWrapper'])) {
            $output['stream_wrapper'] = $this->streamWrapper->toArray();
        }
        if (isset($this->_usedProperties['factories'])) {
            $output['factories'] = $this->factories->toArray();
        }

        return $output;
    }

}
