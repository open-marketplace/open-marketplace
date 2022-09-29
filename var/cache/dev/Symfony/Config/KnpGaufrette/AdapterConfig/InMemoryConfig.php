<?php

namespace Symfony\Config\KnpGaufrette\AdapterConfig;

require_once __DIR__.\DIRECTORY_SEPARATOR.'InMemory'.\DIRECTORY_SEPARATOR.'FilesConfig.php';

use Symfony\Component\Config\Definition\Exception\InvalidConfigurationException;

/**
 * This class is automatically generated to help in creating a config.
 */
class InMemoryConfig 
{
    private $files;
    private $_usedProperties = [];

    public function files(string $filename, array $value = []): \Symfony\Config\KnpGaufrette\AdapterConfig\InMemory\FilesConfig
    {
        if (!isset($this->files[$filename])) {
            $this->_usedProperties['files'] = true;
            $this->files[$filename] = new \Symfony\Config\KnpGaufrette\AdapterConfig\InMemory\FilesConfig($value);
        } elseif (1 < \func_num_args()) {
            throw new InvalidConfigurationException('The node created by "files()" has already been initialized. You cannot pass values the second time you call files().');
        }

        return $this->files[$filename];
    }

    public function __construct(array $value = [])
    {
        if (array_key_exists('files', $value)) {
            $this->_usedProperties['files'] = true;
            $this->files = array_map(function ($v) { return new \Symfony\Config\KnpGaufrette\AdapterConfig\InMemory\FilesConfig($v); }, $value['files']);
            unset($value['files']);
        }

        if ([] !== $value) {
            throw new InvalidConfigurationException(sprintf('The following keys are not supported by "%s": ', __CLASS__).implode(', ', array_keys($value)));
        }
    }

    public function toArray(): array
    {
        $output = [];
        if (isset($this->_usedProperties['files'])) {
            $output['files'] = array_map(function ($v) { return $v->toArray(); }, $this->files);
        }

        return $output;
    }

}
