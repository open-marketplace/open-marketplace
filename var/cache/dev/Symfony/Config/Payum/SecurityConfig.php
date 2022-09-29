<?php

namespace Symfony\Config\Payum;

require_once __DIR__.\DIRECTORY_SEPARATOR.'Security'.\DIRECTORY_SEPARATOR.'TokenStorageConfig.php';

use Symfony\Component\Config\Definition\Exception\InvalidConfigurationException;

/**
 * This class is automatically generated to help in creating a config.
 */
class SecurityConfig 
{
    private $tokenStorage;
    private $_usedProperties = [];

    public function tokenStorage(string $key, array $value = []): \Symfony\Config\Payum\Security\TokenStorageConfig
    {
        if (!isset($this->tokenStorage[$key])) {
            $this->_usedProperties['tokenStorage'] = true;
            $this->tokenStorage[$key] = new \Symfony\Config\Payum\Security\TokenStorageConfig($value);
        } elseif (1 < \func_num_args()) {
            throw new InvalidConfigurationException('The node created by "tokenStorage()" has already been initialized. You cannot pass values the second time you call tokenStorage().');
        }

        return $this->tokenStorage[$key];
    }

    public function __construct(array $value = [])
    {
        if (array_key_exists('token_storage', $value)) {
            $this->_usedProperties['tokenStorage'] = true;
            $this->tokenStorage = array_map(function ($v) { return new \Symfony\Config\Payum\Security\TokenStorageConfig($v); }, $value['token_storage']);
            unset($value['token_storage']);
        }

        if ([] !== $value) {
            throw new InvalidConfigurationException(sprintf('The following keys are not supported by "%s": ', __CLASS__).implode(', ', array_keys($value)));
        }
    }

    public function toArray(): array
    {
        $output = [];
        if (isset($this->_usedProperties['tokenStorage'])) {
            $output['token_storage'] = array_map(function ($v) { return $v->toArray(); }, $this->tokenStorage);
        }

        return $output;
    }

}
