<?php

namespace Symfony\Config\KnpGaufrette\AdapterConfig;

use Symfony\Component\Config\Loader\ParamConfigurator;
use Symfony\Component\Config\Definition\Exception\InvalidConfigurationException;

/**
 * This class is automatically generated to help in creating a config.
 */
class MogilefsConfig 
{
    private $domain;
    private $hosts;
    private $_usedProperties = [];

    /**
     * @default null
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function domain($value): self
    {
        $this->_usedProperties['domain'] = true;
        $this->domain = $value;

        return $this;
    }

    /**
     * @param ParamConfigurator|list<mixed|ParamConfigurator> $value
     * @return $this
     */
    public function hosts($value): self
    {
        $this->_usedProperties['hosts'] = true;
        $this->hosts = $value;

        return $this;
    }

    public function __construct(array $value = [])
    {
        if (array_key_exists('domain', $value)) {
            $this->_usedProperties['domain'] = true;
            $this->domain = $value['domain'];
            unset($value['domain']);
        }

        if (array_key_exists('hosts', $value)) {
            $this->_usedProperties['hosts'] = true;
            $this->hosts = $value['hosts'];
            unset($value['hosts']);
        }

        if ([] !== $value) {
            throw new InvalidConfigurationException(sprintf('The following keys are not supported by "%s": ', __CLASS__).implode(', ', array_keys($value)));
        }
    }

    public function toArray(): array
    {
        $output = [];
        if (isset($this->_usedProperties['domain'])) {
            $output['domain'] = $this->domain;
        }
        if (isset($this->_usedProperties['hosts'])) {
            $output['hosts'] = $this->hosts;
        }

        return $output;
    }

}
