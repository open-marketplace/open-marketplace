<?php

namespace Symfony\Config;

require_once __DIR__.\DIRECTORY_SEPARATOR.'SyliusFixtures'.\DIRECTORY_SEPARATOR.'SuitesConfig.php';

use Symfony\Component\Config\Definition\Exception\InvalidConfigurationException;

/**
 * This class is automatically generated to help in creating a config.
 */
class SyliusFixturesConfig implements \Symfony\Component\Config\Builder\ConfigBuilderInterface
{
    private $suites;
    private $_usedProperties = [];

    public function suites(string $name, array $value = []): \Symfony\Config\SyliusFixtures\SuitesConfig
    {
        if (!isset($this->suites[$name])) {
            $this->_usedProperties['suites'] = true;
            $this->suites[$name] = new \Symfony\Config\SyliusFixtures\SuitesConfig($value);
        } elseif (1 < \func_num_args()) {
            throw new InvalidConfigurationException('The node created by "suites()" has already been initialized. You cannot pass values the second time you call suites().');
        }

        return $this->suites[$name];
    }

    public function getExtensionAlias(): string
    {
        return 'sylius_fixtures';
    }

    public function __construct(array $value = [])
    {
        if (array_key_exists('suites', $value)) {
            $this->_usedProperties['suites'] = true;
            $this->suites = array_map(function ($v) { return new \Symfony\Config\SyliusFixtures\SuitesConfig($v); }, $value['suites']);
            unset($value['suites']);
        }

        if ([] !== $value) {
            throw new InvalidConfigurationException(sprintf('The following keys are not supported by "%s": ', __CLASS__).implode(', ', array_keys($value)));
        }
    }

    public function toArray(): array
    {
        $output = [];
        if (isset($this->_usedProperties['suites'])) {
            $output['suites'] = array_map(function ($v) { return $v->toArray(); }, $this->suites);
        }

        return $output;
    }

}
