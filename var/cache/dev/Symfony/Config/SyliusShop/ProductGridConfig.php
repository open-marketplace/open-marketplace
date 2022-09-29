<?php

namespace Symfony\Config\SyliusShop;

use Symfony\Component\Config\Loader\ParamConfigurator;
use Symfony\Component\Config\Definition\Exception\InvalidConfigurationException;

/**
 * This class is automatically generated to help in creating a config.
 */
class ProductGridConfig 
{
    private $includeAllDescendants;
    private $_usedProperties = [];

    /**
     * @default false
     * @param ParamConfigurator|bool $value
     * @return $this
     */
    public function includeAllDescendants($value): self
    {
        $this->_usedProperties['includeAllDescendants'] = true;
        $this->includeAllDescendants = $value;

        return $this;
    }

    public function __construct(array $value = [])
    {
        if (array_key_exists('include_all_descendants', $value)) {
            $this->_usedProperties['includeAllDescendants'] = true;
            $this->includeAllDescendants = $value['include_all_descendants'];
            unset($value['include_all_descendants']);
        }

        if ([] !== $value) {
            throw new InvalidConfigurationException(sprintf('The following keys are not supported by "%s": ', __CLASS__).implode(', ', array_keys($value)));
        }
    }

    public function toArray(): array
    {
        $output = [];
        if (isset($this->_usedProperties['includeAllDescendants'])) {
            $output['include_all_descendants'] = $this->includeAllDescendants;
        }

        return $output;
    }

}
