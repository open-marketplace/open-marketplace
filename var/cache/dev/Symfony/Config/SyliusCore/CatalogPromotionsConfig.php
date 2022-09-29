<?php

namespace Symfony\Config\SyliusCore;

use Symfony\Component\Config\Loader\ParamConfigurator;
use Symfony\Component\Config\Definition\Exception\InvalidConfigurationException;

/**
 * This class is automatically generated to help in creating a config.
 */
class CatalogPromotionsConfig 
{
    private $batchSize;
    private $_usedProperties = [];

    /**
     * @default 100
     * @param ParamConfigurator|int $value
     * @return $this
     */
    public function batchSize($value): self
    {
        $this->_usedProperties['batchSize'] = true;
        $this->batchSize = $value;

        return $this;
    }

    public function __construct(array $value = [])
    {
        if (array_key_exists('batch_size', $value)) {
            $this->_usedProperties['batchSize'] = true;
            $this->batchSize = $value['batch_size'];
            unset($value['batch_size']);
        }

        if ([] !== $value) {
            throw new InvalidConfigurationException(sprintf('The following keys are not supported by "%s": ', __CLASS__).implode(', ', array_keys($value)));
        }
    }

    public function toArray(): array
    {
        $output = [];
        if (isset($this->_usedProperties['batchSize'])) {
            $output['batch_size'] = $this->batchSize;
        }

        return $output;
    }

}
