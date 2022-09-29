<?php

namespace Symfony\Config\KnpGaufrette\AdapterConfig\GoogleCloudStorage;

use Symfony\Component\Config\Loader\ParamConfigurator;
use Symfony\Component\Config\Definition\Exception\InvalidConfigurationException;

/**
 * This class is automatically generated to help in creating a config.
 */
class OptionsConfig 
{
    private $directory;
    private $acl;
    private $_usedProperties = [];

    /**
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function directory($value): self
    {
        $this->_usedProperties['directory'] = true;
        $this->directory = $value;

        return $this;
    }

    /**
     * @default 'private'
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function acl($value): self
    {
        $this->_usedProperties['acl'] = true;
        $this->acl = $value;

        return $this;
    }

    public function __construct(array $value = [])
    {
        if (array_key_exists('directory', $value)) {
            $this->_usedProperties['directory'] = true;
            $this->directory = $value['directory'];
            unset($value['directory']);
        }

        if (array_key_exists('acl', $value)) {
            $this->_usedProperties['acl'] = true;
            $this->acl = $value['acl'];
            unset($value['acl']);
        }

        if ([] !== $value) {
            throw new InvalidConfigurationException(sprintf('The following keys are not supported by "%s": ', __CLASS__).implode(', ', array_keys($value)));
        }
    }

    public function toArray(): array
    {
        $output = [];
        if (isset($this->_usedProperties['directory'])) {
            $output['directory'] = $this->directory;
        }
        if (isset($this->_usedProperties['acl'])) {
            $output['acl'] = $this->acl;
        }

        return $output;
    }

}
