<?php

namespace Symfony\Config\Security\FirewallConfig;

use Symfony\Component\Config\Loader\ParamConfigurator;
use Symfony\Component\Config\Definition\Exception\InvalidConfigurationException;

/**
 * This class is automatically generated to help in creating a config.
 */
class JwtConfig 
{
    private $provider;
    private $authenticator;
    private $_usedProperties = [];

    /**
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
     * @default 'lexik_jwt_authentication.security.jwt_authenticator'
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function authenticator($value): self
    {
        $this->_usedProperties['authenticator'] = true;
        $this->authenticator = $value;

        return $this;
    }

    public function __construct(array $value = [])
    {
        if (array_key_exists('provider', $value)) {
            $this->_usedProperties['provider'] = true;
            $this->provider = $value['provider'];
            unset($value['provider']);
        }

        if (array_key_exists('authenticator', $value)) {
            $this->_usedProperties['authenticator'] = true;
            $this->authenticator = $value['authenticator'];
            unset($value['authenticator']);
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
        if (isset($this->_usedProperties['authenticator'])) {
            $output['authenticator'] = $this->authenticator;
        }

        return $output;
    }

}
