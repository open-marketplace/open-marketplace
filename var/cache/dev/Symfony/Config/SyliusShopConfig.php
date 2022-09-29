<?php

namespace Symfony\Config;

require_once __DIR__.\DIRECTORY_SEPARATOR.'SyliusShop'.\DIRECTORY_SEPARATOR.'CheckoutResolverConfig.php';
require_once __DIR__.\DIRECTORY_SEPARATOR.'SyliusShop'.\DIRECTORY_SEPARATOR.'ProductGridConfig.php';

use Symfony\Component\Config\Loader\ParamConfigurator;
use Symfony\Component\Config\Definition\Exception\InvalidConfigurationException;

/**
 * This class is automatically generated to help in creating a config.
 */
class SyliusShopConfig implements \Symfony\Component\Config\Builder\ConfigBuilderInterface
{
    private $localeSwitcher;
    private $firewallContextName;
    private $checkoutResolver;
    private $productGrid;
    private $_usedProperties = [];

    /**
     * @default 'url'
     * @param ParamConfigurator|'storage'|'url' $value
     * @return $this
     */
    public function localeSwitcher($value): self
    {
        $this->_usedProperties['localeSwitcher'] = true;
        $this->localeSwitcher = $value;

        return $this;
    }

    /**
     * @default 'shop'
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function firewallContextName($value): self
    {
        $this->_usedProperties['firewallContextName'] = true;
        $this->firewallContextName = $value;

        return $this;
    }

    public function checkoutResolver(array $value = []): \Symfony\Config\SyliusShop\CheckoutResolverConfig
    {
        if (null === $this->checkoutResolver) {
            $this->_usedProperties['checkoutResolver'] = true;
            $this->checkoutResolver = new \Symfony\Config\SyliusShop\CheckoutResolverConfig($value);
        } elseif (0 < \func_num_args()) {
            throw new InvalidConfigurationException('The node created by "checkoutResolver()" has already been initialized. You cannot pass values the second time you call checkoutResolver().');
        }

        return $this->checkoutResolver;
    }

    public function productGrid(array $value = []): \Symfony\Config\SyliusShop\ProductGridConfig
    {
        if (null === $this->productGrid) {
            $this->_usedProperties['productGrid'] = true;
            $this->productGrid = new \Symfony\Config\SyliusShop\ProductGridConfig($value);
        } elseif (0 < \func_num_args()) {
            throw new InvalidConfigurationException('The node created by "productGrid()" has already been initialized. You cannot pass values the second time you call productGrid().');
        }

        return $this->productGrid;
    }

    public function getExtensionAlias(): string
    {
        return 'sylius_shop';
    }

    public function __construct(array $value = [])
    {
        if (array_key_exists('locale_switcher', $value)) {
            $this->_usedProperties['localeSwitcher'] = true;
            $this->localeSwitcher = $value['locale_switcher'];
            unset($value['locale_switcher']);
        }

        if (array_key_exists('firewall_context_name', $value)) {
            $this->_usedProperties['firewallContextName'] = true;
            $this->firewallContextName = $value['firewall_context_name'];
            unset($value['firewall_context_name']);
        }

        if (array_key_exists('checkout_resolver', $value)) {
            $this->_usedProperties['checkoutResolver'] = true;
            $this->checkoutResolver = new \Symfony\Config\SyliusShop\CheckoutResolverConfig($value['checkout_resolver']);
            unset($value['checkout_resolver']);
        }

        if (array_key_exists('product_grid', $value)) {
            $this->_usedProperties['productGrid'] = true;
            $this->productGrid = new \Symfony\Config\SyliusShop\ProductGridConfig($value['product_grid']);
            unset($value['product_grid']);
        }

        if ([] !== $value) {
            throw new InvalidConfigurationException(sprintf('The following keys are not supported by "%s": ', __CLASS__).implode(', ', array_keys($value)));
        }
    }

    public function toArray(): array
    {
        $output = [];
        if (isset($this->_usedProperties['localeSwitcher'])) {
            $output['locale_switcher'] = $this->localeSwitcher;
        }
        if (isset($this->_usedProperties['firewallContextName'])) {
            $output['firewall_context_name'] = $this->firewallContextName;
        }
        if (isset($this->_usedProperties['checkoutResolver'])) {
            $output['checkout_resolver'] = $this->checkoutResolver->toArray();
        }
        if (isset($this->_usedProperties['productGrid'])) {
            $output['product_grid'] = $this->productGrid->toArray();
        }

        return $output;
    }

}
