<?php

namespace Symfony\Config\Payum\DynamicGateways\ConfigStorageConfig;

use Symfony\Component\Config\Loader\ParamConfigurator;
use Symfony\Component\Config\Definition\Exception\InvalidConfigurationException;

/**
 * This class is automatically generated to help in creating a config.
 */
class FilesystemConfig 
{
    private $storageDir;
    private $idProperty;
    private $_usedProperties = [];

    /**
     * @default null
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function storageDir($value): self
    {
        $this->_usedProperties['storageDir'] = true;
        $this->storageDir = $value;

        return $this;
    }

    /**
     * @default null
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function idProperty($value): self
    {
        $this->_usedProperties['idProperty'] = true;
        $this->idProperty = $value;

        return $this;
    }

    public function __construct(array $value = [])
    {
        if (array_key_exists('storage_dir', $value)) {
            $this->_usedProperties['storageDir'] = true;
            $this->storageDir = $value['storage_dir'];
            unset($value['storage_dir']);
        }

        if (array_key_exists('id_property', $value)) {
            $this->_usedProperties['idProperty'] = true;
            $this->idProperty = $value['id_property'];
            unset($value['id_property']);
        }

        if ([] !== $value) {
            throw new InvalidConfigurationException(sprintf('The following keys are not supported by "%s": ', __CLASS__).implode(', ', array_keys($value)));
        }
    }

    public function toArray(): array
    {
        $output = [];
        if (isset($this->_usedProperties['storageDir'])) {
            $output['storage_dir'] = $this->storageDir;
        }
        if (isset($this->_usedProperties['idProperty'])) {
            $output['id_property'] = $this->idProperty;
        }

        return $output;
    }

}
