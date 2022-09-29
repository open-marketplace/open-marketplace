<?php

namespace Symfony\Config\KnpGaufrette\AdapterConfig;

require_once __DIR__.\DIRECTORY_SEPARATOR.'DoctrineDbal'.\DIRECTORY_SEPARATOR.'ColumnsConfig.php';

use Symfony\Component\Config\Loader\ParamConfigurator;
use Symfony\Component\Config\Definition\Exception\InvalidConfigurationException;

/**
 * This class is automatically generated to help in creating a config.
 */
class DoctrineDbalConfig 
{
    private $connectionName;
    private $table;
    private $columns;
    private $_usedProperties = [];

    /**
     * @default null
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function connectionName($value): self
    {
        $this->_usedProperties['connectionName'] = true;
        $this->connectionName = $value;

        return $this;
    }

    /**
     * @default null
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function table($value): self
    {
        $this->_usedProperties['table'] = true;
        $this->table = $value;

        return $this;
    }

    public function columns(array $value = []): \Symfony\Config\KnpGaufrette\AdapterConfig\DoctrineDbal\ColumnsConfig
    {
        if (null === $this->columns) {
            $this->_usedProperties['columns'] = true;
            $this->columns = new \Symfony\Config\KnpGaufrette\AdapterConfig\DoctrineDbal\ColumnsConfig($value);
        } elseif (0 < \func_num_args()) {
            throw new InvalidConfigurationException('The node created by "columns()" has already been initialized. You cannot pass values the second time you call columns().');
        }

        return $this->columns;
    }

    public function __construct(array $value = [])
    {
        if (array_key_exists('connection_name', $value)) {
            $this->_usedProperties['connectionName'] = true;
            $this->connectionName = $value['connection_name'];
            unset($value['connection_name']);
        }

        if (array_key_exists('table', $value)) {
            $this->_usedProperties['table'] = true;
            $this->table = $value['table'];
            unset($value['table']);
        }

        if (array_key_exists('columns', $value)) {
            $this->_usedProperties['columns'] = true;
            $this->columns = new \Symfony\Config\KnpGaufrette\AdapterConfig\DoctrineDbal\ColumnsConfig($value['columns']);
            unset($value['columns']);
        }

        if ([] !== $value) {
            throw new InvalidConfigurationException(sprintf('The following keys are not supported by "%s": ', __CLASS__).implode(', ', array_keys($value)));
        }
    }

    public function toArray(): array
    {
        $output = [];
        if (isset($this->_usedProperties['connectionName'])) {
            $output['connection_name'] = $this->connectionName;
        }
        if (isset($this->_usedProperties['table'])) {
            $output['table'] = $this->table;
        }
        if (isset($this->_usedProperties['columns'])) {
            $output['columns'] = $this->columns->toArray();
        }

        return $output;
    }

}
