<?php

namespace Symfony\Config\LiipImagine;

require_once __DIR__.\DIRECTORY_SEPARATOR.'LoadersConfig'.\DIRECTORY_SEPARATOR.'StreamConfig.php';
require_once __DIR__.\DIRECTORY_SEPARATOR.'LoadersConfig'.\DIRECTORY_SEPARATOR.'FilesystemConfig.php';
require_once __DIR__.\DIRECTORY_SEPARATOR.'LoadersConfig'.\DIRECTORY_SEPARATOR.'FlysystemConfig.php';
require_once __DIR__.\DIRECTORY_SEPARATOR.'LoadersConfig'.\DIRECTORY_SEPARATOR.'ChainConfig.php';

use Symfony\Component\Config\Definition\Exception\InvalidConfigurationException;

/**
 * This class is automatically generated to help in creating a config.
 */
class LoadersConfig 
{
    private $stream;
    private $filesystem;
    private $flysystem;
    private $chain;
    private $_usedProperties = [];

    public function stream(array $value = []): \Symfony\Config\LiipImagine\LoadersConfig\StreamConfig
    {
        if (null === $this->stream) {
            $this->_usedProperties['stream'] = true;
            $this->stream = new \Symfony\Config\LiipImagine\LoadersConfig\StreamConfig($value);
        } elseif (0 < \func_num_args()) {
            throw new InvalidConfigurationException('The node created by "stream()" has already been initialized. You cannot pass values the second time you call stream().');
        }

        return $this->stream;
    }

    public function filesystem(array $value = []): \Symfony\Config\LiipImagine\LoadersConfig\FilesystemConfig
    {
        if (null === $this->filesystem) {
            $this->_usedProperties['filesystem'] = true;
            $this->filesystem = new \Symfony\Config\LiipImagine\LoadersConfig\FilesystemConfig($value);
        } elseif (0 < \func_num_args()) {
            throw new InvalidConfigurationException('The node created by "filesystem()" has already been initialized. You cannot pass values the second time you call filesystem().');
        }

        return $this->filesystem;
    }

    public function flysystem(array $value = []): \Symfony\Config\LiipImagine\LoadersConfig\FlysystemConfig
    {
        if (null === $this->flysystem) {
            $this->_usedProperties['flysystem'] = true;
            $this->flysystem = new \Symfony\Config\LiipImagine\LoadersConfig\FlysystemConfig($value);
        } elseif (0 < \func_num_args()) {
            throw new InvalidConfigurationException('The node created by "flysystem()" has already been initialized. You cannot pass values the second time you call flysystem().');
        }

        return $this->flysystem;
    }

    public function chain(array $value = []): \Symfony\Config\LiipImagine\LoadersConfig\ChainConfig
    {
        if (null === $this->chain) {
            $this->_usedProperties['chain'] = true;
            $this->chain = new \Symfony\Config\LiipImagine\LoadersConfig\ChainConfig($value);
        } elseif (0 < \func_num_args()) {
            throw new InvalidConfigurationException('The node created by "chain()" has already been initialized. You cannot pass values the second time you call chain().');
        }

        return $this->chain;
    }

    public function __construct(array $value = [])
    {
        if (array_key_exists('stream', $value)) {
            $this->_usedProperties['stream'] = true;
            $this->stream = new \Symfony\Config\LiipImagine\LoadersConfig\StreamConfig($value['stream']);
            unset($value['stream']);
        }

        if (array_key_exists('filesystem', $value)) {
            $this->_usedProperties['filesystem'] = true;
            $this->filesystem = new \Symfony\Config\LiipImagine\LoadersConfig\FilesystemConfig($value['filesystem']);
            unset($value['filesystem']);
        }

        if (array_key_exists('flysystem', $value)) {
            $this->_usedProperties['flysystem'] = true;
            $this->flysystem = new \Symfony\Config\LiipImagine\LoadersConfig\FlysystemConfig($value['flysystem']);
            unset($value['flysystem']);
        }

        if (array_key_exists('chain', $value)) {
            $this->_usedProperties['chain'] = true;
            $this->chain = new \Symfony\Config\LiipImagine\LoadersConfig\ChainConfig($value['chain']);
            unset($value['chain']);
        }

        if ([] !== $value) {
            throw new InvalidConfigurationException(sprintf('The following keys are not supported by "%s": ', __CLASS__).implode(', ', array_keys($value)));
        }
    }

    public function toArray(): array
    {
        $output = [];
        if (isset($this->_usedProperties['stream'])) {
            $output['stream'] = $this->stream->toArray();
        }
        if (isset($this->_usedProperties['filesystem'])) {
            $output['filesystem'] = $this->filesystem->toArray();
        }
        if (isset($this->_usedProperties['flysystem'])) {
            $output['flysystem'] = $this->flysystem->toArray();
        }
        if (isset($this->_usedProperties['chain'])) {
            $output['chain'] = $this->chain->toArray();
        }

        return $output;
    }

}
