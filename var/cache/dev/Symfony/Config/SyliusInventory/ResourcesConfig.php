<?php

namespace Symfony\Config\SyliusInventory;

require_once __DIR__.\DIRECTORY_SEPARATOR.'Resources'.\DIRECTORY_SEPARATOR.'InventoryUnitConfig.php';

use Symfony\Component\Config\Definition\Exception\InvalidConfigurationException;

/**
 * This class is automatically generated to help in creating a config.
 */
class ResourcesConfig 
{
    private $inventoryUnit;
    private $_usedProperties = [];

    public function inventoryUnit(array $value = []): \Symfony\Config\SyliusInventory\Resources\InventoryUnitConfig
    {
        if (null === $this->inventoryUnit) {
            $this->_usedProperties['inventoryUnit'] = true;
            $this->inventoryUnit = new \Symfony\Config\SyliusInventory\Resources\InventoryUnitConfig($value);
        } elseif (0 < \func_num_args()) {
            throw new InvalidConfigurationException('The node created by "inventoryUnit()" has already been initialized. You cannot pass values the second time you call inventoryUnit().');
        }

        return $this->inventoryUnit;
    }

    public function __construct(array $value = [])
    {
        if (array_key_exists('inventory_unit', $value)) {
            $this->_usedProperties['inventoryUnit'] = true;
            $this->inventoryUnit = new \Symfony\Config\SyliusInventory\Resources\InventoryUnitConfig($value['inventory_unit']);
            unset($value['inventory_unit']);
        }

        if ([] !== $value) {
            throw new InvalidConfigurationException(sprintf('The following keys are not supported by "%s": ', __CLASS__).implode(', ', array_keys($value)));
        }
    }

    public function toArray(): array
    {
        $output = [];
        if (isset($this->_usedProperties['inventoryUnit'])) {
            $output['inventory_unit'] = $this->inventoryUnit->toArray();
        }

        return $output;
    }

}
