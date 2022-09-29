<?php

namespace Symfony\Config\Payum\Security\TokenStorageConfig;

use Symfony\Component\Config\Loader\ParamConfigurator;
use Symfony\Component\Config\Definition\Exception\InvalidConfigurationException;

/**
 * This class is automatically generated to help in creating a config.
 */
class DoctrineConfig 
{
    private $driver;
    private $_usedProperties = [];

    /**
     * @default null
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function driver($value): self
    {
        $this->_usedProperties['driver'] = true;
        $this->driver = $value;

        return $this;
    }

    public function __construct(array $value = [])
    {
        if (array_key_exists('driver', $value)) {
            $this->_usedProperties['driver'] = true;
            $this->driver = $value['driver'];
            unset($value['driver']);
        }

        if ([] !== $value) {
            throw new InvalidConfigurationException(sprintf('The following keys are not supported by "%s": ', __CLASS__).implode(', ', array_keys($value)));
        }
    }

    public function toArray(): array
    {
        $output = [];
        if (isset($this->_usedProperties['driver'])) {
            $output['driver'] = $this->driver;
        }

        return $output;
    }

}
