<?php

namespace Symfony\Config\KnpGaufrette\AdapterConfig;

use Symfony\Component\Config\Loader\ParamConfigurator;
use Symfony\Component\Config\Definition\Exception\InvalidConfigurationException;

/**
 * This class is automatically generated to help in creating a config.
 */
class AzureBlobStorageConfig 
{
    private $blobProxyFactoryId;
    private $containerName;
    private $createContainer;
    private $detectContentType;
    private $multiContainerMode;
    private $_usedProperties = [];

    /**
     * @default null
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function blobProxyFactoryId($value): self
    {
        $this->_usedProperties['blobProxyFactoryId'] = true;
        $this->blobProxyFactoryId = $value;

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

    /**
     * @default false
     * @param ParamConfigurator|bool $value
     * @return $this
     */
    public function multiContainerMode($value): self
    {
        $this->_usedProperties['multiContainerMode'] = true;
        $this->multiContainerMode = $value;

        return $this;
    }

    public function __construct(array $value = [])
    {
        if (array_key_exists('blob_proxy_factory_id', $value)) {
            $this->_usedProperties['blobProxyFactoryId'] = true;
            $this->blobProxyFactoryId = $value['blob_proxy_factory_id'];
            unset($value['blob_proxy_factory_id']);
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

        if (array_key_exists('multi_container_mode', $value)) {
            $this->_usedProperties['multiContainerMode'] = true;
            $this->multiContainerMode = $value['multi_container_mode'];
            unset($value['multi_container_mode']);
        }

        if ([] !== $value) {
            throw new InvalidConfigurationException(sprintf('The following keys are not supported by "%s": ', __CLASS__).implode(', ', array_keys($value)));
        }
    }

    public function toArray(): array
    {
        $output = [];
        if (isset($this->_usedProperties['blobProxyFactoryId'])) {
            $output['blob_proxy_factory_id'] = $this->blobProxyFactoryId;
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
        if (isset($this->_usedProperties['multiContainerMode'])) {
            $output['multi_container_mode'] = $this->multiContainerMode;
        }

        return $output;
    }

}
