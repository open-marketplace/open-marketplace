<?php

namespace Symfony\Config\Security\ProviderConfig;

use Symfony\Component\Config\Loader\ParamConfigurator;
use Symfony\Component\Config\Definition\Exception\InvalidConfigurationException;

/**
 * This class is automatically generated to help in creating a config.
 */
class LexikJwtConfig 
{
    private $class;
    private $_usedProperties = [];

    /**
     * @default 'Lexik\\Bundle\\JWTAuthenticationBundle\\Security\\User\\JWTUser'
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function class($value): self
    {
        $this->_usedProperties['class'] = true;
        $this->class = $value;

        return $this;
    }

    public function __construct(array $value = [])
    {
        if (array_key_exists('class', $value)) {
            $this->_usedProperties['class'] = true;
            $this->class = $value['class'];
            unset($value['class']);
        }

        if ([] !== $value) {
            throw new InvalidConfigurationException(sprintf('The following keys are not supported by "%s": ', __CLASS__).implode(', ', array_keys($value)));
        }
    }

    public function toArray(): array
    {
        $output = [];
        if (isset($this->_usedProperties['class'])) {
            $output['class'] = $this->class;
        }

        return $output;
    }

}
