<?php

namespace Symfony\Config\KnpGaufrette\AdapterConfig;

use Symfony\Component\Config\Loader\ParamConfigurator;
use Symfony\Component\Config\Definition\Exception\InvalidConfigurationException;

/**
 * This class is automatically generated to help in creating a config.
 */
class DropboxConfig 
{
    private $apiId;
    private $_usedProperties = [];

    /**
     * @default null
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function apiId($value): self
    {
        $this->_usedProperties['apiId'] = true;
        $this->apiId = $value;

        return $this;
    }

    public function __construct(array $value = [])
    {
        if (array_key_exists('api_id', $value)) {
            $this->_usedProperties['apiId'] = true;
            $this->apiId = $value['api_id'];
            unset($value['api_id']);
        }

        if ([] !== $value) {
            throw new InvalidConfigurationException(sprintf('The following keys are not supported by "%s": ', __CLASS__).implode(', ', array_keys($value)));
        }
    }

    public function toArray(): array
    {
        $output = [];
        if (isset($this->_usedProperties['apiId'])) {
            $output['api_id'] = $this->apiId;
        }

        return $output;
    }

}
