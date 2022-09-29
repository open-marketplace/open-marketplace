<?php

namespace Symfony\Config\SyliusAddressing\Resources\AddressLogEntry;

use Symfony\Component\Config\Loader\ParamConfigurator;
use Symfony\Component\Config\Definition\Exception\InvalidConfigurationException;

/**
 * This class is automatically generated to help in creating a config.
 */
class ClassesConfig 
{
    private $model;
    private $controller;
    private $repository;
    private $factory;
    private $_usedProperties = [];

    /**
     * @default 'Sylius\\Component\\Addressing\\Model\\AddressLogEntry'
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function model($value): self
    {
        $this->_usedProperties['model'] = true;
        $this->model = $value;

        return $this;
    }

    /**
     * @default 'Sylius\\Bundle\\ResourceBundle\\Controller\\ResourceController'
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function controller($value): self
    {
        $this->_usedProperties['controller'] = true;
        $this->controller = $value;

        return $this;
    }

    /**
     * @default 'Sylius\\Bundle\\ResourceBundle\\Doctrine\\ORM\\ResourceLogEntryRepository'
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function repository($value): self
    {
        $this->_usedProperties['repository'] = true;
        $this->repository = $value;

        return $this;
    }

    /**
     * @default 'Sylius\\Component\\Resource\\Factory\\Factory'
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function factory($value): self
    {
        $this->_usedProperties['factory'] = true;
        $this->factory = $value;

        return $this;
    }

    public function __construct(array $value = [])
    {
        if (array_key_exists('model', $value)) {
            $this->_usedProperties['model'] = true;
            $this->model = $value['model'];
            unset($value['model']);
        }

        if (array_key_exists('controller', $value)) {
            $this->_usedProperties['controller'] = true;
            $this->controller = $value['controller'];
            unset($value['controller']);
        }

        if (array_key_exists('repository', $value)) {
            $this->_usedProperties['repository'] = true;
            $this->repository = $value['repository'];
            unset($value['repository']);
        }

        if (array_key_exists('factory', $value)) {
            $this->_usedProperties['factory'] = true;
            $this->factory = $value['factory'];
            unset($value['factory']);
        }

        if ([] !== $value) {
            throw new InvalidConfigurationException(sprintf('The following keys are not supported by "%s": ', __CLASS__).implode(', ', array_keys($value)));
        }
    }

    public function toArray(): array
    {
        $output = [];
        if (isset($this->_usedProperties['model'])) {
            $output['model'] = $this->model;
        }
        if (isset($this->_usedProperties['controller'])) {
            $output['controller'] = $this->controller;
        }
        if (isset($this->_usedProperties['repository'])) {
            $output['repository'] = $this->repository;
        }
        if (isset($this->_usedProperties['factory'])) {
            $output['factory'] = $this->factory;
        }

        return $output;
    }

}
