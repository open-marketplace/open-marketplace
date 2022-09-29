<?php

namespace Symfony\Config;

use Symfony\Component\Config\Loader\ParamConfigurator;
use Symfony\Component\Config\Definition\Exception\InvalidConfigurationException;

/**
 * This class is automatically generated to help in creating a config.
 */
class SyliusLabsDoctrineMigrationsExtraConfig implements \Symfony\Component\Config\Builder\ConfigBuilderInterface
{
    private $migrations;
    private $_usedProperties = [];

    /**
     * @param ParamConfigurator|array $value
     * @return $this
     */
    public function migrations(string $subject, $value): self
    {
        $this->_usedProperties['migrations'] = true;
        $this->migrations[$subject] = $value;

        return $this;
    }

    public function getExtensionAlias(): string
    {
        return 'sylius_labs_doctrine_migrations_extra';
    }

    public function __construct(array $value = [])
    {
        if (array_key_exists('migrations', $value)) {
            $this->_usedProperties['migrations'] = true;
            $this->migrations = $value['migrations'];
            unset($value['migrations']);
        }

        if ([] !== $value) {
            throw new InvalidConfigurationException(sprintf('The following keys are not supported by "%s": ', __CLASS__).implode(', ', array_keys($value)));
        }
    }

    public function toArray(): array
    {
        $output = [];
        if (isset($this->_usedProperties['migrations'])) {
            $output['migrations'] = $this->migrations;
        }

        return $output;
    }

}
