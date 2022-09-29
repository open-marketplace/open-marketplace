<?php

namespace Symfony\Config\LiipImagine\LoadersConfig\Filesystem;

use Symfony\Component\Config\Loader\ParamConfigurator;
use Symfony\Component\Config\Definition\Exception\InvalidConfigurationException;

/**
 * This class is automatically generated to help in creating a config.
 */
class BundleResourcesConfig 
{
    private $enabled;
    private $accessControlType;
    private $accessControlList;
    private $_usedProperties = [];

    /**
     * @default false
     * @param ParamConfigurator|bool $value
     * @return $this
     */
    public function enabled($value): self
    {
        $this->_usedProperties['enabled'] = true;
        $this->enabled = $value;

        return $this;
    }

    /**
     * Sets the access control method applied to bundle names in "access_control_list" into a blacklist or whitelist.
     * @default 'blacklist'
     * @param ParamConfigurator|'blacklist'|'whitelist' $value
     * @return $this
     */
    public function accessControlType($value): self
    {
        $this->_usedProperties['accessControlType'] = true;
        $this->accessControlType = $value;

        return $this;
    }

    /**
     * @param ParamConfigurator|list<mixed|ParamConfigurator> $value
     * @return $this
     */
    public function accessControlList($value): self
    {
        $this->_usedProperties['accessControlList'] = true;
        $this->accessControlList = $value;

        return $this;
    }

    public function __construct(array $value = [])
    {
        if (array_key_exists('enabled', $value)) {
            $this->_usedProperties['enabled'] = true;
            $this->enabled = $value['enabled'];
            unset($value['enabled']);
        }

        if (array_key_exists('access_control_type', $value)) {
            $this->_usedProperties['accessControlType'] = true;
            $this->accessControlType = $value['access_control_type'];
            unset($value['access_control_type']);
        }

        if (array_key_exists('access_control_list', $value)) {
            $this->_usedProperties['accessControlList'] = true;
            $this->accessControlList = $value['access_control_list'];
            unset($value['access_control_list']);
        }

        if ([] !== $value) {
            throw new InvalidConfigurationException(sprintf('The following keys are not supported by "%s": ', __CLASS__).implode(', ', array_keys($value)));
        }
    }

    public function toArray(): array
    {
        $output = [];
        if (isset($this->_usedProperties['enabled'])) {
            $output['enabled'] = $this->enabled;
        }
        if (isset($this->_usedProperties['accessControlType'])) {
            $output['access_control_type'] = $this->accessControlType;
        }
        if (isset($this->_usedProperties['accessControlList'])) {
            $output['access_control_list'] = $this->accessControlList;
        }

        return $output;
    }

}
