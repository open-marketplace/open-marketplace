<?php

namespace Symfony\Config\SyliusUser\ResourcesConfig\User\Verification;

use Symfony\Component\Config\Loader\ParamConfigurator;
use Symfony\Component\Config\Definition\Exception\InvalidConfigurationException;

/**
 * This class is automatically generated to help in creating a config.
 */
class TokenConfig 
{
    private $length;
    private $fieldName;
    private $_usedProperties = [];

    /**
     * @default 16
     * @param ParamConfigurator|int $value
     * @return $this
     */
    public function length($value): self
    {
        $this->_usedProperties['length'] = true;
        $this->length = $value;

        return $this;
    }

    /**
     * @default 'emailVerificationToken'
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function fieldName($value): self
    {
        $this->_usedProperties['fieldName'] = true;
        $this->fieldName = $value;

        return $this;
    }

    public function __construct(array $value = [])
    {
        if (array_key_exists('length', $value)) {
            $this->_usedProperties['length'] = true;
            $this->length = $value['length'];
            unset($value['length']);
        }

        if (array_key_exists('field_name', $value)) {
            $this->_usedProperties['fieldName'] = true;
            $this->fieldName = $value['field_name'];
            unset($value['field_name']);
        }

        if ([] !== $value) {
            throw new InvalidConfigurationException(sprintf('The following keys are not supported by "%s": ', __CLASS__).implode(', ', array_keys($value)));
        }
    }

    public function toArray(): array
    {
        $output = [];
        if (isset($this->_usedProperties['length'])) {
            $output['length'] = $this->length;
        }
        if (isset($this->_usedProperties['fieldName'])) {
            $output['field_name'] = $this->fieldName;
        }

        return $output;
    }

}
