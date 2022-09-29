<?php

namespace Symfony\Config\SyliusTaxonomy;

require_once __DIR__.\DIRECTORY_SEPARATOR.'Resources'.\DIRECTORY_SEPARATOR.'TaxonConfig.php';

use Symfony\Component\Config\Definition\Exception\InvalidConfigurationException;

/**
 * This class is automatically generated to help in creating a config.
 */
class ResourcesConfig 
{
    private $taxon;
    private $_usedProperties = [];

    public function taxon(array $value = []): \Symfony\Config\SyliusTaxonomy\Resources\TaxonConfig
    {
        if (null === $this->taxon) {
            $this->_usedProperties['taxon'] = true;
            $this->taxon = new \Symfony\Config\SyliusTaxonomy\Resources\TaxonConfig($value);
        } elseif (0 < \func_num_args()) {
            throw new InvalidConfigurationException('The node created by "taxon()" has already been initialized. You cannot pass values the second time you call taxon().');
        }

        return $this->taxon;
    }

    public function __construct(array $value = [])
    {
        if (array_key_exists('taxon', $value)) {
            $this->_usedProperties['taxon'] = true;
            $this->taxon = new \Symfony\Config\SyliusTaxonomy\Resources\TaxonConfig($value['taxon']);
            unset($value['taxon']);
        }

        if ([] !== $value) {
            throw new InvalidConfigurationException(sprintf('The following keys are not supported by "%s": ', __CLASS__).implode(', ', array_keys($value)));
        }
    }

    public function toArray(): array
    {
        $output = [];
        if (isset($this->_usedProperties['taxon'])) {
            $output['taxon'] = $this->taxon->toArray();
        }

        return $output;
    }

}
