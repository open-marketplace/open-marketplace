<?php

namespace Symfony\Config;

require_once __DIR__.\DIRECTORY_SEPARATOR.'SyliusCore'.\DIRECTORY_SEPARATOR.'CatalogPromotionsConfig.php';
require_once __DIR__.\DIRECTORY_SEPARATOR.'SyliusCore'.\DIRECTORY_SEPARATOR.'ResourcesConfig.php';

use Symfony\Component\Config\Loader\ParamConfigurator;
use Symfony\Component\Config\Definition\Exception\InvalidConfigurationException;

/**
 * This class is automatically generated to help in creating a config.
 */
class SyliusCoreConfig implements \Symfony\Component\Config\Builder\ConfigBuilderInterface
{
    private $driver;
    private $prependDoctrineMigrations;
    private $shippingAddressBasedTaxation;
    private $processShipmentsBeforeRecalculatingPrices;
    private $catalogPromotions;
    private $resources;
    private $_usedProperties = [];

    /**
     * @default 'doctrine/orm'
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function driver($value): self
    {
        $this->_usedProperties['driver'] = true;
        $this->driver = $value;

        return $this;
    }

    /**
     * @default true
     * @param ParamConfigurator|bool $value
     * @return $this
     */
    public function prependDoctrineMigrations($value): self
    {
        $this->_usedProperties['prependDoctrineMigrations'] = true;
        $this->prependDoctrineMigrations = $value;

        return $this;
    }

    /**
     * @default false
     * @param ParamConfigurator|bool $value
     * @return $this
     */
    public function shippingAddressBasedTaxation($value): self
    {
        $this->_usedProperties['shippingAddressBasedTaxation'] = true;
        $this->shippingAddressBasedTaxation = $value;

        return $this;
    }

    /**
     * @default false
     * @param ParamConfigurator|bool $value
     * @deprecated The "sylius_core.process_shipments_before_recalculating_prices" parameter is deprecated and will be removed in 2.0.
     * @return $this
     */
    public function processShipmentsBeforeRecalculatingPrices($value): self
    {
        $this->_usedProperties['processShipmentsBeforeRecalculatingPrices'] = true;
        $this->processShipmentsBeforeRecalculatingPrices = $value;

        return $this;
    }

    public function catalogPromotions(array $value = []): \Symfony\Config\SyliusCore\CatalogPromotionsConfig
    {
        if (null === $this->catalogPromotions) {
            $this->_usedProperties['catalogPromotions'] = true;
            $this->catalogPromotions = new \Symfony\Config\SyliusCore\CatalogPromotionsConfig($value);
        } elseif (0 < \func_num_args()) {
            throw new InvalidConfigurationException('The node created by "catalogPromotions()" has already been initialized. You cannot pass values the second time you call catalogPromotions().');
        }

        return $this->catalogPromotions;
    }

    public function resources(array $value = []): \Symfony\Config\SyliusCore\ResourcesConfig
    {
        if (null === $this->resources) {
            $this->_usedProperties['resources'] = true;
            $this->resources = new \Symfony\Config\SyliusCore\ResourcesConfig($value);
        } elseif (0 < \func_num_args()) {
            throw new InvalidConfigurationException('The node created by "resources()" has already been initialized. You cannot pass values the second time you call resources().');
        }

        return $this->resources;
    }

    public function getExtensionAlias(): string
    {
        return 'sylius_core';
    }

    public function __construct(array $value = [])
    {
        if (array_key_exists('driver', $value)) {
            $this->_usedProperties['driver'] = true;
            $this->driver = $value['driver'];
            unset($value['driver']);
        }

        if (array_key_exists('prepend_doctrine_migrations', $value)) {
            $this->_usedProperties['prependDoctrineMigrations'] = true;
            $this->prependDoctrineMigrations = $value['prepend_doctrine_migrations'];
            unset($value['prepend_doctrine_migrations']);
        }

        if (array_key_exists('shipping_address_based_taxation', $value)) {
            $this->_usedProperties['shippingAddressBasedTaxation'] = true;
            $this->shippingAddressBasedTaxation = $value['shipping_address_based_taxation'];
            unset($value['shipping_address_based_taxation']);
        }

        if (array_key_exists('process_shipments_before_recalculating_prices', $value)) {
            $this->_usedProperties['processShipmentsBeforeRecalculatingPrices'] = true;
            $this->processShipmentsBeforeRecalculatingPrices = $value['process_shipments_before_recalculating_prices'];
            unset($value['process_shipments_before_recalculating_prices']);
        }

        if (array_key_exists('catalog_promotions', $value)) {
            $this->_usedProperties['catalogPromotions'] = true;
            $this->catalogPromotions = new \Symfony\Config\SyliusCore\CatalogPromotionsConfig($value['catalog_promotions']);
            unset($value['catalog_promotions']);
        }

        if (array_key_exists('resources', $value)) {
            $this->_usedProperties['resources'] = true;
            $this->resources = new \Symfony\Config\SyliusCore\ResourcesConfig($value['resources']);
            unset($value['resources']);
        }

        if ([] !== $value) {
            throw new InvalidConfigurationException(sprintf('The following keys are not supported by "%s": ', __CLASS__).implode(', ', array_keys($value)));
        }
    }

    public function toArray(): array
    {
        $output = [];
        if (isset($this->_usedProperties['driver'])) {
            $output['driver'] = $this->driver;
        }
        if (isset($this->_usedProperties['prependDoctrineMigrations'])) {
            $output['prepend_doctrine_migrations'] = $this->prependDoctrineMigrations;
        }
        if (isset($this->_usedProperties['shippingAddressBasedTaxation'])) {
            $output['shipping_address_based_taxation'] = $this->shippingAddressBasedTaxation;
        }
        if (isset($this->_usedProperties['processShipmentsBeforeRecalculatingPrices'])) {
            $output['process_shipments_before_recalculating_prices'] = $this->processShipmentsBeforeRecalculatingPrices;
        }
        if (isset($this->_usedProperties['catalogPromotions'])) {
            $output['catalog_promotions'] = $this->catalogPromotions->toArray();
        }
        if (isset($this->_usedProperties['resources'])) {
            $output['resources'] = $this->resources->toArray();
        }

        return $output;
    }

}
