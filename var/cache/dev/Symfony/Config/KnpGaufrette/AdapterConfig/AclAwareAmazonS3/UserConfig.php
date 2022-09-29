<?php

namespace Symfony\Config\KnpGaufrette\AdapterConfig\AclAwareAmazonS3;

use Symfony\Component\Config\Loader\ParamConfigurator;
use Symfony\Component\Config\Definition\Exception\InvalidConfigurationException;

/**
 * This class is automatically generated to help in creating a config.
 */
class UserConfig 
{
    private $group;
    private $id;
    private $permission;
    private $_usedProperties = [];

    /**
     * @default null
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function group($value): self
    {
        $this->_usedProperties['group'] = true;
        $this->group = $value;

        return $this;
    }

    /**
     * @default null
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function id($value): self
    {
        $this->_usedProperties['id'] = true;
        $this->id = $value;

        return $this;
    }

    /**
     * @default null
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function permission($value): self
    {
        $this->_usedProperties['permission'] = true;
        $this->permission = $value;

        return $this;
    }

    public function __construct(array $value = [])
    {
        if (array_key_exists('group', $value)) {
            $this->_usedProperties['group'] = true;
            $this->group = $value['group'];
            unset($value['group']);
        }

        if (array_key_exists('id', $value)) {
            $this->_usedProperties['id'] = true;
            $this->id = $value['id'];
            unset($value['id']);
        }

        if (array_key_exists('permission', $value)) {
            $this->_usedProperties['permission'] = true;
            $this->permission = $value['permission'];
            unset($value['permission']);
        }

        if ([] !== $value) {
            throw new InvalidConfigurationException(sprintf('The following keys are not supported by "%s": ', __CLASS__).implode(', ', array_keys($value)));
        }
    }

    public function toArray(): array
    {
        $output = [];
        if (isset($this->_usedProperties['group'])) {
            $output['group'] = $this->group;
        }
        if (isset($this->_usedProperties['id'])) {
            $output['id'] = $this->id;
        }
        if (isset($this->_usedProperties['permission'])) {
            $output['permission'] = $this->permission;
        }

        return $output;
    }

}
