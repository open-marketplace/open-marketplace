<?php

namespace Symfony\Config\ApiPlatform;

use Symfony\Component\Config\Loader\ParamConfigurator;
use Symfony\Component\Config\Definition\Exception\InvalidConfigurationException;

/**
 * This class is automatically generated to help in creating a config.
 */
class ErrorFormatsConfig 
{
    private $mimeTypes;
    private $_usedProperties = [];

    /**
     * @param ParamConfigurator|list<mixed|ParamConfigurator> $value
     * @return $this
     */
    public function mimeTypes($value): self
    {
        $this->_usedProperties['mimeTypes'] = true;
        $this->mimeTypes = $value;

        return $this;
    }

    public function __construct(array $value = [])
    {
        if (array_key_exists('mime_types', $value)) {
            $this->_usedProperties['mimeTypes'] = true;
            $this->mimeTypes = $value['mime_types'];
            unset($value['mime_types']);
        }

        if ([] !== $value) {
            throw new InvalidConfigurationException(sprintf('The following keys are not supported by "%s": ', __CLASS__).implode(', ', array_keys($value)));
        }
    }

    public function toArray(): array
    {
        $output = [];
        if (isset($this->_usedProperties['mimeTypes'])) {
            $output['mime_types'] = $this->mimeTypes;
        }

        return $output;
    }

}
