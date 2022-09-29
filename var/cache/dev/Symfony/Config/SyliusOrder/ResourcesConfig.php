<?php

namespace Symfony\Config\SyliusOrder;

require_once __DIR__.\DIRECTORY_SEPARATOR.'Resources'.\DIRECTORY_SEPARATOR.'OrderConfig.php';
require_once __DIR__.\DIRECTORY_SEPARATOR.'Resources'.\DIRECTORY_SEPARATOR.'OrderItemConfig.php';
require_once __DIR__.\DIRECTORY_SEPARATOR.'Resources'.\DIRECTORY_SEPARATOR.'OrderItemUnitConfig.php';
require_once __DIR__.\DIRECTORY_SEPARATOR.'Resources'.\DIRECTORY_SEPARATOR.'AdjustmentConfig.php';
require_once __DIR__.\DIRECTORY_SEPARATOR.'Resources'.\DIRECTORY_SEPARATOR.'OrderSequenceConfig.php';

use Symfony\Component\Config\Definition\Exception\InvalidConfigurationException;

/**
 * This class is automatically generated to help in creating a config.
 */
class ResourcesConfig 
{
    private $order;
    private $orderItem;
    private $orderItemUnit;
    private $adjustment;
    private $orderSequence;
    private $_usedProperties = [];

    public function order(array $value = []): \Symfony\Config\SyliusOrder\Resources\OrderConfig
    {
        if (null === $this->order) {
            $this->_usedProperties['order'] = true;
            $this->order = new \Symfony\Config\SyliusOrder\Resources\OrderConfig($value);
        } elseif (0 < \func_num_args()) {
            throw new InvalidConfigurationException('The node created by "order()" has already been initialized. You cannot pass values the second time you call order().');
        }

        return $this->order;
    }

    public function orderItem(array $value = []): \Symfony\Config\SyliusOrder\Resources\OrderItemConfig
    {
        if (null === $this->orderItem) {
            $this->_usedProperties['orderItem'] = true;
            $this->orderItem = new \Symfony\Config\SyliusOrder\Resources\OrderItemConfig($value);
        } elseif (0 < \func_num_args()) {
            throw new InvalidConfigurationException('The node created by "orderItem()" has already been initialized. You cannot pass values the second time you call orderItem().');
        }

        return $this->orderItem;
    }

    public function orderItemUnit(array $value = []): \Symfony\Config\SyliusOrder\Resources\OrderItemUnitConfig
    {
        if (null === $this->orderItemUnit) {
            $this->_usedProperties['orderItemUnit'] = true;
            $this->orderItemUnit = new \Symfony\Config\SyliusOrder\Resources\OrderItemUnitConfig($value);
        } elseif (0 < \func_num_args()) {
            throw new InvalidConfigurationException('The node created by "orderItemUnit()" has already been initialized. You cannot pass values the second time you call orderItemUnit().');
        }

        return $this->orderItemUnit;
    }

    public function adjustment(array $value = []): \Symfony\Config\SyliusOrder\Resources\AdjustmentConfig
    {
        if (null === $this->adjustment) {
            $this->_usedProperties['adjustment'] = true;
            $this->adjustment = new \Symfony\Config\SyliusOrder\Resources\AdjustmentConfig($value);
        } elseif (0 < \func_num_args()) {
            throw new InvalidConfigurationException('The node created by "adjustment()" has already been initialized. You cannot pass values the second time you call adjustment().');
        }

        return $this->adjustment;
    }

    public function orderSequence(array $value = []): \Symfony\Config\SyliusOrder\Resources\OrderSequenceConfig
    {
        if (null === $this->orderSequence) {
            $this->_usedProperties['orderSequence'] = true;
            $this->orderSequence = new \Symfony\Config\SyliusOrder\Resources\OrderSequenceConfig($value);
        } elseif (0 < \func_num_args()) {
            throw new InvalidConfigurationException('The node created by "orderSequence()" has already been initialized. You cannot pass values the second time you call orderSequence().');
        }

        return $this->orderSequence;
    }

    public function __construct(array $value = [])
    {
        if (array_key_exists('order', $value)) {
            $this->_usedProperties['order'] = true;
            $this->order = new \Symfony\Config\SyliusOrder\Resources\OrderConfig($value['order']);
            unset($value['order']);
        }

        if (array_key_exists('order_item', $value)) {
            $this->_usedProperties['orderItem'] = true;
            $this->orderItem = new \Symfony\Config\SyliusOrder\Resources\OrderItemConfig($value['order_item']);
            unset($value['order_item']);
        }

        if (array_key_exists('order_item_unit', $value)) {
            $this->_usedProperties['orderItemUnit'] = true;
            $this->orderItemUnit = new \Symfony\Config\SyliusOrder\Resources\OrderItemUnitConfig($value['order_item_unit']);
            unset($value['order_item_unit']);
        }

        if (array_key_exists('adjustment', $value)) {
            $this->_usedProperties['adjustment'] = true;
            $this->adjustment = new \Symfony\Config\SyliusOrder\Resources\AdjustmentConfig($value['adjustment']);
            unset($value['adjustment']);
        }

        if (array_key_exists('order_sequence', $value)) {
            $this->_usedProperties['orderSequence'] = true;
            $this->orderSequence = new \Symfony\Config\SyliusOrder\Resources\OrderSequenceConfig($value['order_sequence']);
            unset($value['order_sequence']);
        }

        if ([] !== $value) {
            throw new InvalidConfigurationException(sprintf('The following keys are not supported by "%s": ', __CLASS__).implode(', ', array_keys($value)));
        }
    }

    public function toArray(): array
    {
        $output = [];
        if (isset($this->_usedProperties['order'])) {
            $output['order'] = $this->order->toArray();
        }
        if (isset($this->_usedProperties['orderItem'])) {
            $output['order_item'] = $this->orderItem->toArray();
        }
        if (isset($this->_usedProperties['orderItemUnit'])) {
            $output['order_item_unit'] = $this->orderItemUnit->toArray();
        }
        if (isset($this->_usedProperties['adjustment'])) {
            $output['adjustment'] = $this->adjustment->toArray();
        }
        if (isset($this->_usedProperties['orderSequence'])) {
            $output['order_sequence'] = $this->orderSequence->toArray();
        }

        return $output;
    }

}
