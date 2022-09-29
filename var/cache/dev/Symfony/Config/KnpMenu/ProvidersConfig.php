<?php

namespace Symfony\Config\KnpMenu;

use Symfony\Component\Config\Loader\ParamConfigurator;
use Symfony\Component\Config\Definition\Exception\InvalidConfigurationException;

/**
 * This class is automatically generated to help in creating a config.
 */
class ProvidersConfig 
{
    private $builderAlias;
    private $_usedProperties = [];

    /**
     * @default true
     * @param ParamConfigurator|bool $value
     * @return $this
     */
    public function builderAlias($value): self
    {
        $this->_usedProperties['builderAlias'] = true;
        $this->builderAlias = $value;

        return $this;
    }

    public function __construct(array $value = [])
    {
        if (array_key_exists('builder_alias', $value)) {
            $this->_usedProperties['builderAlias'] = true;
            $this->builderAlias = $value['builder_alias'];
            unset($value['builder_alias']);
        }

        if ([] !== $value) {
            throw new InvalidConfigurationException(sprintf('The following keys are not supported by "%s": ', __CLASS__).implode(', ', array_keys($value)));
        }
    }

    public function toArray(): array
    {
        $output = [];
        if (isset($this->_usedProperties['builderAlias'])) {
            $output['builder_alias'] = $this->builderAlias;
        }

        return $output;
    }

}
