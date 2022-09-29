<?php

namespace Symfony\Config\KnpGaufrette\AdapterConfig;

use Symfony\Component\Config\Loader\ParamConfigurator;
use Symfony\Component\Config\Definition\Exception\InvalidConfigurationException;

/**
 * This class is automatically generated to help in creating a config.
 */
class GridfsConfig 
{
    private $mongogridfsId;
    private $_usedProperties = [];

    /**
     * @default null
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function mongogridfsId($value): self
    {
        $this->_usedProperties['mongogridfsId'] = true;
        $this->mongogridfsId = $value;

        return $this;
    }

    public function __construct(array $value = [])
    {
        if (array_key_exists('mongogridfs_id', $value)) {
            $this->_usedProperties['mongogridfsId'] = true;
            $this->mongogridfsId = $value['mongogridfs_id'];
            unset($value['mongogridfs_id']);
        }

        if ([] !== $value) {
            throw new InvalidConfigurationException(sprintf('The following keys are not supported by "%s": ', __CLASS__).implode(', ', array_keys($value)));
        }
    }

    public function toArray(): array
    {
        $output = [];
        if (isset($this->_usedProperties['mongogridfsId'])) {
            $output['mongogridfs_id'] = $this->mongogridfsId;
        }

        return $output;
    }

}
