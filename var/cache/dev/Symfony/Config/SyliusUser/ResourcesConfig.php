<?php

namespace Symfony\Config\SyliusUser;

require_once __DIR__.\DIRECTORY_SEPARATOR.'ResourcesConfig'.\DIRECTORY_SEPARATOR.'UserConfig.php';

use Symfony\Component\Config\Definition\Exception\InvalidConfigurationException;

/**
 * This class is automatically generated to help in creating a config.
 */
class ResourcesConfig 
{
    private $user;
    private $_usedProperties = [];

    public function user(array $value = []): \Symfony\Config\SyliusUser\ResourcesConfig\UserConfig
    {
        if (null === $this->user) {
            $this->_usedProperties['user'] = true;
            $this->user = new \Symfony\Config\SyliusUser\ResourcesConfig\UserConfig($value);
        } elseif (0 < \func_num_args()) {
            throw new InvalidConfigurationException('The node created by "user()" has already been initialized. You cannot pass values the second time you call user().');
        }

        return $this->user;
    }

    public function __construct(array $value = [])
    {
        if (array_key_exists('user', $value)) {
            $this->_usedProperties['user'] = true;
            $this->user = new \Symfony\Config\SyliusUser\ResourcesConfig\UserConfig($value['user']);
            unset($value['user']);
        }

        if ([] !== $value) {
            throw new InvalidConfigurationException(sprintf('The following keys are not supported by "%s": ', __CLASS__).implode(', ', array_keys($value)));
        }
    }

    public function toArray(): array
    {
        $output = [];
        if (isset($this->_usedProperties['user'])) {
            $output['user'] = $this->user->toArray();
        }

        return $output;
    }

}
