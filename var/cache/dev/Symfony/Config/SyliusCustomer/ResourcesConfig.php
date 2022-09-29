<?php

namespace Symfony\Config\SyliusCustomer;

require_once __DIR__.\DIRECTORY_SEPARATOR.'Resources'.\DIRECTORY_SEPARATOR.'CustomerConfig.php';
require_once __DIR__.\DIRECTORY_SEPARATOR.'Resources'.\DIRECTORY_SEPARATOR.'CustomerGroupConfig.php';

use Symfony\Component\Config\Definition\Exception\InvalidConfigurationException;

/**
 * This class is automatically generated to help in creating a config.
 */
class ResourcesConfig 
{
    private $customer;
    private $customerGroup;
    private $_usedProperties = [];

    public function customer(array $value = []): \Symfony\Config\SyliusCustomer\Resources\CustomerConfig
    {
        if (null === $this->customer) {
            $this->_usedProperties['customer'] = true;
            $this->customer = new \Symfony\Config\SyliusCustomer\Resources\CustomerConfig($value);
        } elseif (0 < \func_num_args()) {
            throw new InvalidConfigurationException('The node created by "customer()" has already been initialized. You cannot pass values the second time you call customer().');
        }

        return $this->customer;
    }

    public function customerGroup(array $value = []): \Symfony\Config\SyliusCustomer\Resources\CustomerGroupConfig
    {
        if (null === $this->customerGroup) {
            $this->_usedProperties['customerGroup'] = true;
            $this->customerGroup = new \Symfony\Config\SyliusCustomer\Resources\CustomerGroupConfig($value);
        } elseif (0 < \func_num_args()) {
            throw new InvalidConfigurationException('The node created by "customerGroup()" has already been initialized. You cannot pass values the second time you call customerGroup().');
        }

        return $this->customerGroup;
    }

    public function __construct(array $value = [])
    {
        if (array_key_exists('customer', $value)) {
            $this->_usedProperties['customer'] = true;
            $this->customer = new \Symfony\Config\SyliusCustomer\Resources\CustomerConfig($value['customer']);
            unset($value['customer']);
        }

        if (array_key_exists('customer_group', $value)) {
            $this->_usedProperties['customerGroup'] = true;
            $this->customerGroup = new \Symfony\Config\SyliusCustomer\Resources\CustomerGroupConfig($value['customer_group']);
            unset($value['customer_group']);
        }

        if ([] !== $value) {
            throw new InvalidConfigurationException(sprintf('The following keys are not supported by "%s": ', __CLASS__).implode(', ', array_keys($value)));
        }
    }

    public function toArray(): array
    {
        $output = [];
        if (isset($this->_usedProperties['customer'])) {
            $output['customer'] = $this->customer->toArray();
        }
        if (isset($this->_usedProperties['customerGroup'])) {
            $output['customer_group'] = $this->customerGroup->toArray();
        }

        return $output;
    }

}
