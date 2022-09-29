<?php

namespace Symfony\Config\SyliusAddressing;

require_once __DIR__.\DIRECTORY_SEPARATOR.'Resources'.\DIRECTORY_SEPARATOR.'AddressConfig.php';
require_once __DIR__.\DIRECTORY_SEPARATOR.'Resources'.\DIRECTORY_SEPARATOR.'AddressLogEntryConfig.php';
require_once __DIR__.\DIRECTORY_SEPARATOR.'Resources'.\DIRECTORY_SEPARATOR.'CountryConfig.php';
require_once __DIR__.\DIRECTORY_SEPARATOR.'Resources'.\DIRECTORY_SEPARATOR.'ProvinceConfig.php';
require_once __DIR__.\DIRECTORY_SEPARATOR.'Resources'.\DIRECTORY_SEPARATOR.'ZoneConfig.php';
require_once __DIR__.\DIRECTORY_SEPARATOR.'Resources'.\DIRECTORY_SEPARATOR.'ZoneMemberConfig.php';

use Symfony\Component\Config\Definition\Exception\InvalidConfigurationException;

/**
 * This class is automatically generated to help in creating a config.
 */
class ResourcesConfig 
{
    private $address;
    private $addressLogEntry;
    private $country;
    private $province;
    private $zone;
    private $zoneMember;
    private $_usedProperties = [];

    public function address(array $value = []): \Symfony\Config\SyliusAddressing\Resources\AddressConfig
    {
        if (null === $this->address) {
            $this->_usedProperties['address'] = true;
            $this->address = new \Symfony\Config\SyliusAddressing\Resources\AddressConfig($value);
        } elseif (0 < \func_num_args()) {
            throw new InvalidConfigurationException('The node created by "address()" has already been initialized. You cannot pass values the second time you call address().');
        }

        return $this->address;
    }

    public function addressLogEntry(array $value = []): \Symfony\Config\SyliusAddressing\Resources\AddressLogEntryConfig
    {
        if (null === $this->addressLogEntry) {
            $this->_usedProperties['addressLogEntry'] = true;
            $this->addressLogEntry = new \Symfony\Config\SyliusAddressing\Resources\AddressLogEntryConfig($value);
        } elseif (0 < \func_num_args()) {
            throw new InvalidConfigurationException('The node created by "addressLogEntry()" has already been initialized. You cannot pass values the second time you call addressLogEntry().');
        }

        return $this->addressLogEntry;
    }

    public function country(array $value = []): \Symfony\Config\SyliusAddressing\Resources\CountryConfig
    {
        if (null === $this->country) {
            $this->_usedProperties['country'] = true;
            $this->country = new \Symfony\Config\SyliusAddressing\Resources\CountryConfig($value);
        } elseif (0 < \func_num_args()) {
            throw new InvalidConfigurationException('The node created by "country()" has already been initialized. You cannot pass values the second time you call country().');
        }

        return $this->country;
    }

    public function province(array $value = []): \Symfony\Config\SyliusAddressing\Resources\ProvinceConfig
    {
        if (null === $this->province) {
            $this->_usedProperties['province'] = true;
            $this->province = new \Symfony\Config\SyliusAddressing\Resources\ProvinceConfig($value);
        } elseif (0 < \func_num_args()) {
            throw new InvalidConfigurationException('The node created by "province()" has already been initialized. You cannot pass values the second time you call province().');
        }

        return $this->province;
    }

    public function zone(array $value = []): \Symfony\Config\SyliusAddressing\Resources\ZoneConfig
    {
        if (null === $this->zone) {
            $this->_usedProperties['zone'] = true;
            $this->zone = new \Symfony\Config\SyliusAddressing\Resources\ZoneConfig($value);
        } elseif (0 < \func_num_args()) {
            throw new InvalidConfigurationException('The node created by "zone()" has already been initialized. You cannot pass values the second time you call zone().');
        }

        return $this->zone;
    }

    public function zoneMember(array $value = []): \Symfony\Config\SyliusAddressing\Resources\ZoneMemberConfig
    {
        if (null === $this->zoneMember) {
            $this->_usedProperties['zoneMember'] = true;
            $this->zoneMember = new \Symfony\Config\SyliusAddressing\Resources\ZoneMemberConfig($value);
        } elseif (0 < \func_num_args()) {
            throw new InvalidConfigurationException('The node created by "zoneMember()" has already been initialized. You cannot pass values the second time you call zoneMember().');
        }

        return $this->zoneMember;
    }

    public function __construct(array $value = [])
    {
        if (array_key_exists('address', $value)) {
            $this->_usedProperties['address'] = true;
            $this->address = new \Symfony\Config\SyliusAddressing\Resources\AddressConfig($value['address']);
            unset($value['address']);
        }

        if (array_key_exists('address_log_entry', $value)) {
            $this->_usedProperties['addressLogEntry'] = true;
            $this->addressLogEntry = new \Symfony\Config\SyliusAddressing\Resources\AddressLogEntryConfig($value['address_log_entry']);
            unset($value['address_log_entry']);
        }

        if (array_key_exists('country', $value)) {
            $this->_usedProperties['country'] = true;
            $this->country = new \Symfony\Config\SyliusAddressing\Resources\CountryConfig($value['country']);
            unset($value['country']);
        }

        if (array_key_exists('province', $value)) {
            $this->_usedProperties['province'] = true;
            $this->province = new \Symfony\Config\SyliusAddressing\Resources\ProvinceConfig($value['province']);
            unset($value['province']);
        }

        if (array_key_exists('zone', $value)) {
            $this->_usedProperties['zone'] = true;
            $this->zone = new \Symfony\Config\SyliusAddressing\Resources\ZoneConfig($value['zone']);
            unset($value['zone']);
        }

        if (array_key_exists('zone_member', $value)) {
            $this->_usedProperties['zoneMember'] = true;
            $this->zoneMember = new \Symfony\Config\SyliusAddressing\Resources\ZoneMemberConfig($value['zone_member']);
            unset($value['zone_member']);
        }

        if ([] !== $value) {
            throw new InvalidConfigurationException(sprintf('The following keys are not supported by "%s": ', __CLASS__).implode(', ', array_keys($value)));
        }
    }

    public function toArray(): array
    {
        $output = [];
        if (isset($this->_usedProperties['address'])) {
            $output['address'] = $this->address->toArray();
        }
        if (isset($this->_usedProperties['addressLogEntry'])) {
            $output['address_log_entry'] = $this->addressLogEntry->toArray();
        }
        if (isset($this->_usedProperties['country'])) {
            $output['country'] = $this->country->toArray();
        }
        if (isset($this->_usedProperties['province'])) {
            $output['province'] = $this->province->toArray();
        }
        if (isset($this->_usedProperties['zone'])) {
            $output['zone'] = $this->zone->toArray();
        }
        if (isset($this->_usedProperties['zoneMember'])) {
            $output['zone_member'] = $this->zoneMember->toArray();
        }

        return $output;
    }

}
