<?php

namespace Symfony\Config\KnpGaufrette\AdapterConfig;

use Symfony\Component\Config\Loader\ParamConfigurator;
use Symfony\Component\Config\Definition\Exception\InvalidConfigurationException;

/**
 * This class is automatically generated to help in creating a config.
 */
class OpencloudConfig 
{
    private $objectStoreId;
    private $containerName;
    private $createContainer;
    private $detectContentType;
    private $_usedProperties = [];

    /**
     * @default null
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function objectStoreId($value): self
    {
        $this->_usedProperties['objectStoreId'] = true;
        $this->objectStoreId = $value;

        return $this;
    }

    /**
     * @default null
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function containerName($value): self
    {
        $this->_usedProperties['containerName'] = true;
        $this->containerName = $value;

        return $this;
    }

    /**
     * @default false
     * @param ParamConfigurator|bool $value
     * @return $this
     */
    public function createContainer($value): self
    {
        $this->_usedProperties['createContainer'] = true;
        $this->createContainer = $value;

        return $this;
    }

    /**
     * @default true
     * @param ParamConfigurator|bool $value
     * @return $this
     */
    public function detectContentType($value): self
    {
        $this->_usedProperties['detectContentType'] = true;
        $this->detectContentType = $value;

        return $this;
    }

    public function __construct(array $value = [])
    {
        if (array_key_exists('object_store_id', $value)) {
            $this->_usedProperties['objectStoreId'] = true;
            $this->objectStoreId = $value['object_store_id'];
            unset($value['object_store_id']);
        }

        if (array_key_exists('container_name', $value)) {
            $this->_usedProperties['containerName'] = true;
            $this->containerName = $value['container_name'];
            unset($value['container_name']);
        }

        if (array_key_exists('create_container', $value)) {
            $this->_usedProperties['createContainer'] = true;
            $this->createContainer = $value['create_container'];
            unset($value['create_container']);
        }

        if (array_key_exists('detect_content_type', $value)) {
            $this->_usedProperties['detectContentType'] = true;
            $this->detectContentType = $value['detect_content_type'];
            unset($value['detect_content_type']);
        }

        if ([] !== $value) {
            throw new InvalidConfigurationException(sprintf('The following keys are not supported by "%s": ', __CLASS__).implode(', ', array_keys($value)));
        }
    }

    public function toArray(): array
    {
        $output = [];
        if (isset($this->_usedProperties['objectStoreId'])) {
            $output['object_store_id'] = $this->objectStoreId;
        }
        if (isset($this->_usedProperties['containerName'])) {
            $output['container_name'] = $this->containerName;
        }
        if (isset($this->_usedProperties['createContainer'])) {
            $output['create_container'] = $this->createContainer;
        }
        if (isset($this->_usedProperties['detectContentType'])) {
            $output['detect_content_type'] = $this->detectContentType;
        }

        return $output;
    }

}
