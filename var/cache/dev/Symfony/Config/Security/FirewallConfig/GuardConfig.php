<?php

namespace Symfony\Config\Security\FirewallConfig;

use Symfony\Component\Config\Loader\ParamConfigurator;
use Symfony\Component\Config\Definition\Exception\InvalidConfigurationException;

/**
 * This class is automatically generated to help in creating a config.
 */
class GuardConfig 
{
    private $provider;
    private $entryPoint;
    private $authenticators;
    private $_usedProperties = [];

    /**
     * A key from the "providers" section of your security config, in case your user provider is different than the firewall
     * @default null
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function provider($value): self
    {
        $this->_usedProperties['provider'] = true;
        $this->provider = $value;

        return $this;
    }

    /**
     * A service id (of one of your authenticators) whose start() method should be called when an anonymous user hits a page that requires authentication
     * @default null
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function entryPoint($value): self
    {
        $this->_usedProperties['entryPoint'] = true;
        $this->entryPoint = $value;

        return $this;
    }

    /**
     * @param ParamConfigurator|list<mixed|ParamConfigurator> $value
     * @return $this
     */
    public function authenticators($value): self
    {
        $this->_usedProperties['authenticators'] = true;
        $this->authenticators = $value;

        return $this;
    }

    public function __construct(array $value = [])
    {
        if (array_key_exists('provider', $value)) {
            $this->_usedProperties['provider'] = true;
            $this->provider = $value['provider'];
            unset($value['provider']);
        }

        if (array_key_exists('entry_point', $value)) {
            $this->_usedProperties['entryPoint'] = true;
            $this->entryPoint = $value['entry_point'];
            unset($value['entry_point']);
        }

        if (array_key_exists('authenticators', $value)) {
            $this->_usedProperties['authenticators'] = true;
            $this->authenticators = $value['authenticators'];
            unset($value['authenticators']);
        }

        if ([] !== $value) {
            throw new InvalidConfigurationException(sprintf('The following keys are not supported by "%s": ', __CLASS__).implode(', ', array_keys($value)));
        }
    }

    public function toArray(): array
    {
        $output = [];
        if (isset($this->_usedProperties['provider'])) {
            $output['provider'] = $this->provider;
        }
        if (isset($this->_usedProperties['entryPoint'])) {
            $output['entry_point'] = $this->entryPoint;
        }
        if (isset($this->_usedProperties['authenticators'])) {
            $output['authenticators'] = $this->authenticators;
        }

        return $output;
    }

}
