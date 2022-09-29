<?php

namespace Symfony\Config\SyliusProduct;

require_once __DIR__.\DIRECTORY_SEPARATOR.'Resources'.\DIRECTORY_SEPARATOR.'ProductConfig.php';
require_once __DIR__.\DIRECTORY_SEPARATOR.'Resources'.\DIRECTORY_SEPARATOR.'ProductVariantConfig.php';
require_once __DIR__.\DIRECTORY_SEPARATOR.'Resources'.\DIRECTORY_SEPARATOR.'ProductOptionConfig.php';
require_once __DIR__.\DIRECTORY_SEPARATOR.'Resources'.\DIRECTORY_SEPARATOR.'ProductOptionValueConfig.php';
require_once __DIR__.\DIRECTORY_SEPARATOR.'Resources'.\DIRECTORY_SEPARATOR.'ProductAssociationConfig.php';
require_once __DIR__.\DIRECTORY_SEPARATOR.'Resources'.\DIRECTORY_SEPARATOR.'ProductAssociationTypeConfig.php';

use Symfony\Component\Config\Definition\Exception\InvalidConfigurationException;

/**
 * This class is automatically generated to help in creating a config.
 */
class ResourcesConfig 
{
    private $product;
    private $productVariant;
    private $productOption;
    private $productOptionValue;
    private $productAssociation;
    private $productAssociationType;
    private $_usedProperties = [];

    public function product(array $value = []): \Symfony\Config\SyliusProduct\Resources\ProductConfig
    {
        if (null === $this->product) {
            $this->_usedProperties['product'] = true;
            $this->product = new \Symfony\Config\SyliusProduct\Resources\ProductConfig($value);
        } elseif (0 < \func_num_args()) {
            throw new InvalidConfigurationException('The node created by "product()" has already been initialized. You cannot pass values the second time you call product().');
        }

        return $this->product;
    }

    public function productVariant(array $value = []): \Symfony\Config\SyliusProduct\Resources\ProductVariantConfig
    {
        if (null === $this->productVariant) {
            $this->_usedProperties['productVariant'] = true;
            $this->productVariant = new \Symfony\Config\SyliusProduct\Resources\ProductVariantConfig($value);
        } elseif (0 < \func_num_args()) {
            throw new InvalidConfigurationException('The node created by "productVariant()" has already been initialized. You cannot pass values the second time you call productVariant().');
        }

        return $this->productVariant;
    }

    public function productOption(array $value = []): \Symfony\Config\SyliusProduct\Resources\ProductOptionConfig
    {
        if (null === $this->productOption) {
            $this->_usedProperties['productOption'] = true;
            $this->productOption = new \Symfony\Config\SyliusProduct\Resources\ProductOptionConfig($value);
        } elseif (0 < \func_num_args()) {
            throw new InvalidConfigurationException('The node created by "productOption()" has already been initialized. You cannot pass values the second time you call productOption().');
        }

        return $this->productOption;
    }

    public function productOptionValue(array $value = []): \Symfony\Config\SyliusProduct\Resources\ProductOptionValueConfig
    {
        if (null === $this->productOptionValue) {
            $this->_usedProperties['productOptionValue'] = true;
            $this->productOptionValue = new \Symfony\Config\SyliusProduct\Resources\ProductOptionValueConfig($value);
        } elseif (0 < \func_num_args()) {
            throw new InvalidConfigurationException('The node created by "productOptionValue()" has already been initialized. You cannot pass values the second time you call productOptionValue().');
        }

        return $this->productOptionValue;
    }

    public function productAssociation(array $value = []): \Symfony\Config\SyliusProduct\Resources\ProductAssociationConfig
    {
        if (null === $this->productAssociation) {
            $this->_usedProperties['productAssociation'] = true;
            $this->productAssociation = new \Symfony\Config\SyliusProduct\Resources\ProductAssociationConfig($value);
        } elseif (0 < \func_num_args()) {
            throw new InvalidConfigurationException('The node created by "productAssociation()" has already been initialized. You cannot pass values the second time you call productAssociation().');
        }

        return $this->productAssociation;
    }

    public function productAssociationType(array $value = []): \Symfony\Config\SyliusProduct\Resources\ProductAssociationTypeConfig
    {
        if (null === $this->productAssociationType) {
            $this->_usedProperties['productAssociationType'] = true;
            $this->productAssociationType = new \Symfony\Config\SyliusProduct\Resources\ProductAssociationTypeConfig($value);
        } elseif (0 < \func_num_args()) {
            throw new InvalidConfigurationException('The node created by "productAssociationType()" has already been initialized. You cannot pass values the second time you call productAssociationType().');
        }

        return $this->productAssociationType;
    }

    public function __construct(array $value = [])
    {
        if (array_key_exists('product', $value)) {
            $this->_usedProperties['product'] = true;
            $this->product = new \Symfony\Config\SyliusProduct\Resources\ProductConfig($value['product']);
            unset($value['product']);
        }

        if (array_key_exists('product_variant', $value)) {
            $this->_usedProperties['productVariant'] = true;
            $this->productVariant = new \Symfony\Config\SyliusProduct\Resources\ProductVariantConfig($value['product_variant']);
            unset($value['product_variant']);
        }

        if (array_key_exists('product_option', $value)) {
            $this->_usedProperties['productOption'] = true;
            $this->productOption = new \Symfony\Config\SyliusProduct\Resources\ProductOptionConfig($value['product_option']);
            unset($value['product_option']);
        }

        if (array_key_exists('product_option_value', $value)) {
            $this->_usedProperties['productOptionValue'] = true;
            $this->productOptionValue = new \Symfony\Config\SyliusProduct\Resources\ProductOptionValueConfig($value['product_option_value']);
            unset($value['product_option_value']);
        }

        if (array_key_exists('product_association', $value)) {
            $this->_usedProperties['productAssociation'] = true;
            $this->productAssociation = new \Symfony\Config\SyliusProduct\Resources\ProductAssociationConfig($value['product_association']);
            unset($value['product_association']);
        }

        if (array_key_exists('product_association_type', $value)) {
            $this->_usedProperties['productAssociationType'] = true;
            $this->productAssociationType = new \Symfony\Config\SyliusProduct\Resources\ProductAssociationTypeConfig($value['product_association_type']);
            unset($value['product_association_type']);
        }

        if ([] !== $value) {
            throw new InvalidConfigurationException(sprintf('The following keys are not supported by "%s": ', __CLASS__).implode(', ', array_keys($value)));
        }
    }

    public function toArray(): array
    {
        $output = [];
        if (isset($this->_usedProperties['product'])) {
            $output['product'] = $this->product->toArray();
        }
        if (isset($this->_usedProperties['productVariant'])) {
            $output['product_variant'] = $this->productVariant->toArray();
        }
        if (isset($this->_usedProperties['productOption'])) {
            $output['product_option'] = $this->productOption->toArray();
        }
        if (isset($this->_usedProperties['productOptionValue'])) {
            $output['product_option_value'] = $this->productOptionValue->toArray();
        }
        if (isset($this->_usedProperties['productAssociation'])) {
            $output['product_association'] = $this->productAssociation->toArray();
        }
        if (isset($this->_usedProperties['productAssociationType'])) {
            $output['product_association_type'] = $this->productAssociationType->toArray();
        }

        return $output;
    }

}
