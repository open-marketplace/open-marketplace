<?php

namespace Symfony\Config\Payum;

require_once __DIR__.\DIRECTORY_SEPARATOR.'DynamicGateways'.\DIRECTORY_SEPARATOR.'ConfigStorageConfig.php';
require_once __DIR__.\DIRECTORY_SEPARATOR.'DynamicGateways'.\DIRECTORY_SEPARATOR.'EncryptionConfig.php';

use Symfony\Component\Config\Loader\ParamConfigurator;
use Symfony\Component\Config\Definition\Exception\InvalidConfigurationException;

/**
 * This class is automatically generated to help in creating a config.
 */
class DynamicGatewaysConfig 
{
    private $sonataAdmin;
    private $configStorage;
    private $encryption;
    private $_usedProperties = [];

    /**
     * @default false
     * @param ParamConfigurator|bool $value
     * @return $this
     */
    public function sonataAdmin($value): self
    {
        $this->_usedProperties['sonataAdmin'] = true;
        $this->sonataAdmin = $value;

        return $this;
    }

    public function configStorage(string $key, array $value = []): \Symfony\Config\Payum\DynamicGateways\ConfigStorageConfig
    {
        if (!isset($this->configStorage[$key])) {
            $this->_usedProperties['configStorage'] = true;
            $this->configStorage[$key] = new \Symfony\Config\Payum\DynamicGateways\ConfigStorageConfig($value);
        } elseif (1 < \func_num_args()) {
            throw new InvalidConfigurationException('The node created by "configStorage()" has already been initialized. You cannot pass values the second time you call configStorage().');
        }

        return $this->configStorage[$key];
    }

    public function encryption(array $value = []): \Symfony\Config\Payum\DynamicGateways\EncryptionConfig
    {
        if (null === $this->encryption) {
            $this->_usedProperties['encryption'] = true;
            $this->encryption = new \Symfony\Config\Payum\DynamicGateways\EncryptionConfig($value);
        } elseif (0 < \func_num_args()) {
            throw new InvalidConfigurationException('The node created by "encryption()" has already been initialized. You cannot pass values the second time you call encryption().');
        }

        return $this->encryption;
    }

    public function __construct(array $value = [])
    {
        if (array_key_exists('sonata_admin', $value)) {
            $this->_usedProperties['sonataAdmin'] = true;
            $this->sonataAdmin = $value['sonata_admin'];
            unset($value['sonata_admin']);
        }

        if (array_key_exists('config_storage', $value)) {
            $this->_usedProperties['configStorage'] = true;
            $this->configStorage = array_map(function ($v) { return new \Symfony\Config\Payum\DynamicGateways\ConfigStorageConfig($v); }, $value['config_storage']);
            unset($value['config_storage']);
        }

        if (array_key_exists('encryption', $value)) {
            $this->_usedProperties['encryption'] = true;
            $this->encryption = new \Symfony\Config\Payum\DynamicGateways\EncryptionConfig($value['encryption']);
            unset($value['encryption']);
        }

        if ([] !== $value) {
            throw new InvalidConfigurationException(sprintf('The following keys are not supported by "%s": ', __CLASS__).implode(', ', array_keys($value)));
        }
    }

    public function toArray(): array
    {
        $output = [];
        if (isset($this->_usedProperties['sonataAdmin'])) {
            $output['sonata_admin'] = $this->sonataAdmin;
        }
        if (isset($this->_usedProperties['configStorage'])) {
            $output['config_storage'] = array_map(function ($v) { return $v->toArray(); }, $this->configStorage);
        }
        if (isset($this->_usedProperties['encryption'])) {
            $output['encryption'] = $this->encryption->toArray();
        }

        return $output;
    }

}
