<?php

namespace Symfony\Config\LiipImagine\LoadersConfig;

require_once __DIR__.\DIRECTORY_SEPARATOR.'Filesystem'.\DIRECTORY_SEPARATOR.'BundleResourcesConfig.php';

use Symfony\Component\Config\Loader\ParamConfigurator;
use Symfony\Component\Config\Definition\Exception\InvalidConfigurationException;

/**
 * This class is automatically generated to help in creating a config.
 */
class FilesystemConfig 
{
    private $locator;
    private $dataRoot;
    private $allowUnresolvableDataRoots;
    private $bundleResources;
    private $_usedProperties = [];

    /**
     * Using the "filesystem_insecure" locator is not recommended due to a less secure resolver mechanism, but is provided for those using heavily symlinked projects.
     * @default 'filesystem'
     * @param ParamConfigurator|'filesystem'|'filesystem_insecure' $value
     * @return $this
     */
    public function locator($value): self
    {
        $this->_usedProperties['locator'] = true;
        $this->locator = $value;

        return $this;
    }

    /**
     * @param ParamConfigurator|list<mixed|ParamConfigurator> $value
     * @return $this
     */
    public function dataRoot($value): self
    {
        $this->_usedProperties['dataRoot'] = true;
        $this->dataRoot = $value;

        return $this;
    }

    /**
     * @default false
     * @param ParamConfigurator|bool $value
     * @return $this
     */
    public function allowUnresolvableDataRoots($value): self
    {
        $this->_usedProperties['allowUnresolvableDataRoots'] = true;
        $this->allowUnresolvableDataRoots = $value;

        return $this;
    }

    public function bundleResources(array $value = []): \Symfony\Config\LiipImagine\LoadersConfig\Filesystem\BundleResourcesConfig
    {
        if (null === $this->bundleResources) {
            $this->_usedProperties['bundleResources'] = true;
            $this->bundleResources = new \Symfony\Config\LiipImagine\LoadersConfig\Filesystem\BundleResourcesConfig($value);
        } elseif (0 < \func_num_args()) {
            throw new InvalidConfigurationException('The node created by "bundleResources()" has already been initialized. You cannot pass values the second time you call bundleResources().');
        }

        return $this->bundleResources;
    }

    public function __construct(array $value = [])
    {
        if (array_key_exists('locator', $value)) {
            $this->_usedProperties['locator'] = true;
            $this->locator = $value['locator'];
            unset($value['locator']);
        }

        if (array_key_exists('data_root', $value)) {
            $this->_usedProperties['dataRoot'] = true;
            $this->dataRoot = $value['data_root'];
            unset($value['data_root']);
        }

        if (array_key_exists('allow_unresolvable_data_roots', $value)) {
            $this->_usedProperties['allowUnresolvableDataRoots'] = true;
            $this->allowUnresolvableDataRoots = $value['allow_unresolvable_data_roots'];
            unset($value['allow_unresolvable_data_roots']);
        }

        if (array_key_exists('bundle_resources', $value)) {
            $this->_usedProperties['bundleResources'] = true;
            $this->bundleResources = new \Symfony\Config\LiipImagine\LoadersConfig\Filesystem\BundleResourcesConfig($value['bundle_resources']);
            unset($value['bundle_resources']);
        }

        if ([] !== $value) {
            throw new InvalidConfigurationException(sprintf('The following keys are not supported by "%s": ', __CLASS__).implode(', ', array_keys($value)));
        }
    }

    public function toArray(): array
    {
        $output = [];
        if (isset($this->_usedProperties['locator'])) {
            $output['locator'] = $this->locator;
        }
        if (isset($this->_usedProperties['dataRoot'])) {
            $output['data_root'] = $this->dataRoot;
        }
        if (isset($this->_usedProperties['allowUnresolvableDataRoots'])) {
            $output['allow_unresolvable_data_roots'] = $this->allowUnresolvableDataRoots;
        }
        if (isset($this->_usedProperties['bundleResources'])) {
            $output['bundle_resources'] = $this->bundleResources->toArray();
        }

        return $output;
    }

}
