<?php

namespace Symfony\Config\LiipImagine\LoadersConfig;

use Symfony\Component\Config\Loader\ParamConfigurator;
use Symfony\Component\Config\Definition\Exception\InvalidConfigurationException;

/**
 * This class is automatically generated to help in creating a config.
 */
class ChainConfig 
{
    private $loaders;
    private $_usedProperties = [];

    /**
     * @param ParamConfigurator|list<mixed|ParamConfigurator> $value
     * @return $this
     */
    public function loaders($value): self
    {
        $this->_usedProperties['loaders'] = true;
        $this->loaders = $value;

        return $this;
    }

    public function __construct(array $value = [])
    {
        if (array_key_exists('loaders', $value)) {
            $this->_usedProperties['loaders'] = true;
            $this->loaders = $value['loaders'];
            unset($value['loaders']);
        }

        if ([] !== $value) {
            throw new InvalidConfigurationException(sprintf('The following keys are not supported by "%s": ', __CLASS__).implode(', ', array_keys($value)));
        }
    }

    public function toArray(): array
    {
        $output = [];
        if (isset($this->_usedProperties['loaders'])) {
            $output['loaders'] = $this->loaders;
        }

        return $output;
    }

}
