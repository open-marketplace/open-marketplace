<?php

namespace Symfony\Config\KnpGaufrette\AdapterConfig;

require_once __DIR__.\DIRECTORY_SEPARATOR.'GoogleCloudStorage'.\DIRECTORY_SEPARATOR.'OptionsConfig.php';

use Symfony\Component\Config\Loader\ParamConfigurator;
use Symfony\Component\Config\Definition\Exception\InvalidConfigurationException;

/**
 * This class is automatically generated to help in creating a config.
 */
class GoogleCloudStorageConfig 
{
    private $serviceId;
    private $bucketName;
    private $detectContentType;
    private $options;
    private $_usedProperties = [];

    /**
     * @default null
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function serviceId($value): self
    {
        $this->_usedProperties['serviceId'] = true;
        $this->serviceId = $value;

        return $this;
    }

    /**
     * @default null
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function bucketName($value): self
    {
        $this->_usedProperties['bucketName'] = true;
        $this->bucketName = $value;

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

    public function options(array $value = []): \Symfony\Config\KnpGaufrette\AdapterConfig\GoogleCloudStorage\OptionsConfig
    {
        if (null === $this->options) {
            $this->_usedProperties['options'] = true;
            $this->options = new \Symfony\Config\KnpGaufrette\AdapterConfig\GoogleCloudStorage\OptionsConfig($value);
        } elseif (0 < \func_num_args()) {
            throw new InvalidConfigurationException('The node created by "options()" has already been initialized. You cannot pass values the second time you call options().');
        }

        return $this->options;
    }

    public function __construct(array $value = [])
    {
        if (array_key_exists('service_id', $value)) {
            $this->_usedProperties['serviceId'] = true;
            $this->serviceId = $value['service_id'];
            unset($value['service_id']);
        }

        if (array_key_exists('bucket_name', $value)) {
            $this->_usedProperties['bucketName'] = true;
            $this->bucketName = $value['bucket_name'];
            unset($value['bucket_name']);
        }

        if (array_key_exists('detect_content_type', $value)) {
            $this->_usedProperties['detectContentType'] = true;
            $this->detectContentType = $value['detect_content_type'];
            unset($value['detect_content_type']);
        }

        if (array_key_exists('options', $value)) {
            $this->_usedProperties['options'] = true;
            $this->options = new \Symfony\Config\KnpGaufrette\AdapterConfig\GoogleCloudStorage\OptionsConfig($value['options']);
            unset($value['options']);
        }

        if ([] !== $value) {
            throw new InvalidConfigurationException(sprintf('The following keys are not supported by "%s": ', __CLASS__).implode(', ', array_keys($value)));
        }
    }

    public function toArray(): array
    {
        $output = [];
        if (isset($this->_usedProperties['serviceId'])) {
            $output['service_id'] = $this->serviceId;
        }
        if (isset($this->_usedProperties['bucketName'])) {
            $output['bucket_name'] = $this->bucketName;
        }
        if (isset($this->_usedProperties['detectContentType'])) {
            $output['detect_content_type'] = $this->detectContentType;
        }
        if (isset($this->_usedProperties['options'])) {
            $output['options'] = $this->options->toArray();
        }

        return $output;
    }

}
