<?php

namespace Symfony\Config\SyliusUser\ResourcesConfig\User;

require_once __DIR__.\DIRECTORY_SEPARATOR.'Resetting'.\DIRECTORY_SEPARATOR.'TokenConfig.php';
require_once __DIR__.\DIRECTORY_SEPARATOR.'Resetting'.\DIRECTORY_SEPARATOR.'PinConfig.php';

use Symfony\Component\Config\Definition\Exception\InvalidConfigurationException;

/**
 * This class is automatically generated to help in creating a config.
 */
class ResettingConfig 
{
    private $token;
    private $pin;
    private $_usedProperties = [];

    public function token(array $value = []): \Symfony\Config\SyliusUser\ResourcesConfig\User\Resetting\TokenConfig
    {
        if (null === $this->token) {
            $this->_usedProperties['token'] = true;
            $this->token = new \Symfony\Config\SyliusUser\ResourcesConfig\User\Resetting\TokenConfig($value);
        } elseif (0 < \func_num_args()) {
            throw new InvalidConfigurationException('The node created by "token()" has already been initialized. You cannot pass values the second time you call token().');
        }

        return $this->token;
    }

    public function pin(array $value = []): \Symfony\Config\SyliusUser\ResourcesConfig\User\Resetting\PinConfig
    {
        if (null === $this->pin) {
            $this->_usedProperties['pin'] = true;
            $this->pin = new \Symfony\Config\SyliusUser\ResourcesConfig\User\Resetting\PinConfig($value);
        } elseif (0 < \func_num_args()) {
            throw new InvalidConfigurationException('The node created by "pin()" has already been initialized. You cannot pass values the second time you call pin().');
        }

        return $this->pin;
    }

    public function __construct(array $value = [])
    {
        if (array_key_exists('token', $value)) {
            $this->_usedProperties['token'] = true;
            $this->token = new \Symfony\Config\SyliusUser\ResourcesConfig\User\Resetting\TokenConfig($value['token']);
            unset($value['token']);
        }

        if (array_key_exists('pin', $value)) {
            $this->_usedProperties['pin'] = true;
            $this->pin = new \Symfony\Config\SyliusUser\ResourcesConfig\User\Resetting\PinConfig($value['pin']);
            unset($value['pin']);
        }

        if ([] !== $value) {
            throw new InvalidConfigurationException(sprintf('The following keys are not supported by "%s": ', __CLASS__).implode(', ', array_keys($value)));
        }
    }

    public function toArray(): array
    {
        $output = [];
        if (isset($this->_usedProperties['token'])) {
            $output['token'] = $this->token->toArray();
        }
        if (isset($this->_usedProperties['pin'])) {
            $output['pin'] = $this->pin->toArray();
        }

        return $output;
    }

}
