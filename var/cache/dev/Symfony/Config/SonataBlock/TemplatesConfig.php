<?php

namespace Symfony\Config\SonataBlock;

use Symfony\Component\Config\Loader\ParamConfigurator;
use Symfony\Component\Config\Definition\Exception\InvalidConfigurationException;

/**
 * This class is automatically generated to help in creating a config.
 */
class TemplatesConfig 
{
    private $blockBase;
    private $blockContainer;
    private $_usedProperties = [];

    /**
     * @default null
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function blockBase($value): self
    {
        $this->_usedProperties['blockBase'] = true;
        $this->blockBase = $value;

        return $this;
    }

    /**
     * @default null
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function blockContainer($value): self
    {
        $this->_usedProperties['blockContainer'] = true;
        $this->blockContainer = $value;

        return $this;
    }

    public function __construct(array $value = [])
    {
        if (array_key_exists('block_base', $value)) {
            $this->_usedProperties['blockBase'] = true;
            $this->blockBase = $value['block_base'];
            unset($value['block_base']);
        }

        if (array_key_exists('block_container', $value)) {
            $this->_usedProperties['blockContainer'] = true;
            $this->blockContainer = $value['block_container'];
            unset($value['block_container']);
        }

        if ([] !== $value) {
            throw new InvalidConfigurationException(sprintf('The following keys are not supported by "%s": ', __CLASS__).implode(', ', array_keys($value)));
        }
    }

    public function toArray(): array
    {
        $output = [];
        if (isset($this->_usedProperties['blockBase'])) {
            $output['block_base'] = $this->blockBase;
        }
        if (isset($this->_usedProperties['blockContainer'])) {
            $output['block_container'] = $this->blockContainer;
        }

        return $output;
    }

}
