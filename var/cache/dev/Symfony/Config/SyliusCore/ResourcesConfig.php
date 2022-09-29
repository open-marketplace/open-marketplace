<?php

namespace Symfony\Config\SyliusCore;

require_once __DIR__.\DIRECTORY_SEPARATOR.'Resources'.\DIRECTORY_SEPARATOR.'ProductImageConfig.php';
require_once __DIR__.\DIRECTORY_SEPARATOR.'Resources'.\DIRECTORY_SEPARATOR.'AvatarImageConfig.php';
require_once __DIR__.\DIRECTORY_SEPARATOR.'Resources'.\DIRECTORY_SEPARATOR.'TaxonImageConfig.php';
require_once __DIR__.\DIRECTORY_SEPARATOR.'Resources'.\DIRECTORY_SEPARATOR.'ProductTaxonConfig.php';
require_once __DIR__.\DIRECTORY_SEPARATOR.'Resources'.\DIRECTORY_SEPARATOR.'ChannelPricingConfig.php';
require_once __DIR__.\DIRECTORY_SEPARATOR.'Resources'.\DIRECTORY_SEPARATOR.'ShopBillingDataConfig.php';

use Symfony\Component\Config\Definition\Exception\InvalidConfigurationException;

/**
 * This class is automatically generated to help in creating a config.
 */
class ResourcesConfig 
{
    private $productImage;
    private $avatarImage;
    private $taxonImage;
    private $productTaxon;
    private $channelPricing;
    private $shopBillingData;
    private $_usedProperties = [];

    public function productImage(array $value = []): \Symfony\Config\SyliusCore\Resources\ProductImageConfig
    {
        if (null === $this->productImage) {
            $this->_usedProperties['productImage'] = true;
            $this->productImage = new \Symfony\Config\SyliusCore\Resources\ProductImageConfig($value);
        } elseif (0 < \func_num_args()) {
            throw new InvalidConfigurationException('The node created by "productImage()" has already been initialized. You cannot pass values the second time you call productImage().');
        }

        return $this->productImage;
    }

    public function avatarImage(array $value = []): \Symfony\Config\SyliusCore\Resources\AvatarImageConfig
    {
        if (null === $this->avatarImage) {
            $this->_usedProperties['avatarImage'] = true;
            $this->avatarImage = new \Symfony\Config\SyliusCore\Resources\AvatarImageConfig($value);
        } elseif (0 < \func_num_args()) {
            throw new InvalidConfigurationException('The node created by "avatarImage()" has already been initialized. You cannot pass values the second time you call avatarImage().');
        }

        return $this->avatarImage;
    }

    public function taxonImage(array $value = []): \Symfony\Config\SyliusCore\Resources\TaxonImageConfig
    {
        if (null === $this->taxonImage) {
            $this->_usedProperties['taxonImage'] = true;
            $this->taxonImage = new \Symfony\Config\SyliusCore\Resources\TaxonImageConfig($value);
        } elseif (0 < \func_num_args()) {
            throw new InvalidConfigurationException('The node created by "taxonImage()" has already been initialized. You cannot pass values the second time you call taxonImage().');
        }

        return $this->taxonImage;
    }

    public function productTaxon(array $value = []): \Symfony\Config\SyliusCore\Resources\ProductTaxonConfig
    {
        if (null === $this->productTaxon) {
            $this->_usedProperties['productTaxon'] = true;
            $this->productTaxon = new \Symfony\Config\SyliusCore\Resources\ProductTaxonConfig($value);
        } elseif (0 < \func_num_args()) {
            throw new InvalidConfigurationException('The node created by "productTaxon()" has already been initialized. You cannot pass values the second time you call productTaxon().');
        }

        return $this->productTaxon;
    }

    public function channelPricing(array $value = []): \Symfony\Config\SyliusCore\Resources\ChannelPricingConfig
    {
        if (null === $this->channelPricing) {
            $this->_usedProperties['channelPricing'] = true;
            $this->channelPricing = new \Symfony\Config\SyliusCore\Resources\ChannelPricingConfig($value);
        } elseif (0 < \func_num_args()) {
            throw new InvalidConfigurationException('The node created by "channelPricing()" has already been initialized. You cannot pass values the second time you call channelPricing().');
        }

        return $this->channelPricing;
    }

    public function shopBillingData(array $value = []): \Symfony\Config\SyliusCore\Resources\ShopBillingDataConfig
    {
        if (null === $this->shopBillingData) {
            $this->_usedProperties['shopBillingData'] = true;
            $this->shopBillingData = new \Symfony\Config\SyliusCore\Resources\ShopBillingDataConfig($value);
        } elseif (0 < \func_num_args()) {
            throw new InvalidConfigurationException('The node created by "shopBillingData()" has already been initialized. You cannot pass values the second time you call shopBillingData().');
        }

        return $this->shopBillingData;
    }

    public function __construct(array $value = [])
    {
        if (array_key_exists('product_image', $value)) {
            $this->_usedProperties['productImage'] = true;
            $this->productImage = new \Symfony\Config\SyliusCore\Resources\ProductImageConfig($value['product_image']);
            unset($value['product_image']);
        }

        if (array_key_exists('avatar_image', $value)) {
            $this->_usedProperties['avatarImage'] = true;
            $this->avatarImage = new \Symfony\Config\SyliusCore\Resources\AvatarImageConfig($value['avatar_image']);
            unset($value['avatar_image']);
        }

        if (array_key_exists('taxon_image', $value)) {
            $this->_usedProperties['taxonImage'] = true;
            $this->taxonImage = new \Symfony\Config\SyliusCore\Resources\TaxonImageConfig($value['taxon_image']);
            unset($value['taxon_image']);
        }

        if (array_key_exists('product_taxon', $value)) {
            $this->_usedProperties['productTaxon'] = true;
            $this->productTaxon = new \Symfony\Config\SyliusCore\Resources\ProductTaxonConfig($value['product_taxon']);
            unset($value['product_taxon']);
        }

        if (array_key_exists('channel_pricing', $value)) {
            $this->_usedProperties['channelPricing'] = true;
            $this->channelPricing = new \Symfony\Config\SyliusCore\Resources\ChannelPricingConfig($value['channel_pricing']);
            unset($value['channel_pricing']);
        }

        if (array_key_exists('shop_billing_data', $value)) {
            $this->_usedProperties['shopBillingData'] = true;
            $this->shopBillingData = new \Symfony\Config\SyliusCore\Resources\ShopBillingDataConfig($value['shop_billing_data']);
            unset($value['shop_billing_data']);
        }

        if ([] !== $value) {
            throw new InvalidConfigurationException(sprintf('The following keys are not supported by "%s": ', __CLASS__).implode(', ', array_keys($value)));
        }
    }

    public function toArray(): array
    {
        $output = [];
        if (isset($this->_usedProperties['productImage'])) {
            $output['product_image'] = $this->productImage->toArray();
        }
        if (isset($this->_usedProperties['avatarImage'])) {
            $output['avatar_image'] = $this->avatarImage->toArray();
        }
        if (isset($this->_usedProperties['taxonImage'])) {
            $output['taxon_image'] = $this->taxonImage->toArray();
        }
        if (isset($this->_usedProperties['productTaxon'])) {
            $output['product_taxon'] = $this->productTaxon->toArray();
        }
        if (isset($this->_usedProperties['channelPricing'])) {
            $output['channel_pricing'] = $this->channelPricing->toArray();
        }
        if (isset($this->_usedProperties['shopBillingData'])) {
            $output['shop_billing_data'] = $this->shopBillingData->toArray();
        }

        return $output;
    }

}
