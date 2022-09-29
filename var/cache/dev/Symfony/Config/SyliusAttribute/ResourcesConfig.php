<?php

namespace Symfony\Config\SyliusAttribute;

require_once __DIR__.\DIRECTORY_SEPARATOR.'ResourcesConfig'.\DIRECTORY_SEPARATOR.'AttributeConfig.php';
require_once __DIR__.\DIRECTORY_SEPARATOR.'ResourcesConfig'.\DIRECTORY_SEPARATOR.'AttributeValueConfig.php';

use Symfony\Component\Config\Loader\ParamConfigurator;
use Symfony\Component\Config\Definition\Exception\InvalidConfigurationException;

/**
 * This class is automatically generated to help in creating a config.
 */
class ResourcesConfig 
{
    private $subject;
    private $attribute;
    private $attributeValue;
    private $_usedProperties = [];

    /**
     * @default null
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function subject($value): self
    {
        $this->_usedProperties['subject'] = true;
        $this->subject = $value;

        return $this;
    }

    public function attribute(array $value = []): \Symfony\Config\SyliusAttribute\ResourcesConfig\AttributeConfig
    {
        if (null === $this->attribute) {
            $this->_usedProperties['attribute'] = true;
            $this->attribute = new \Symfony\Config\SyliusAttribute\ResourcesConfig\AttributeConfig($value);
        } elseif (0 < \func_num_args()) {
            throw new InvalidConfigurationException('The node created by "attribute()" has already been initialized. You cannot pass values the second time you call attribute().');
        }

        return $this->attribute;
    }

    public function attributeValue(array $value = []): \Symfony\Config\SyliusAttribute\ResourcesConfig\AttributeValueConfig
    {
        if (null === $this->attributeValue) {
            $this->_usedProperties['attributeValue'] = true;
            $this->attributeValue = new \Symfony\Config\SyliusAttribute\ResourcesConfig\AttributeValueConfig($value);
        } elseif (0 < \func_num_args()) {
            throw new InvalidConfigurationException('The node created by "attributeValue()" has already been initialized. You cannot pass values the second time you call attributeValue().');
        }

        return $this->attributeValue;
    }

    public function __construct(array $value = [])
    {
        if (array_key_exists('subject', $value)) {
            $this->_usedProperties['subject'] = true;
            $this->subject = $value['subject'];
            unset($value['subject']);
        }

        if (array_key_exists('attribute', $value)) {
            $this->_usedProperties['attribute'] = true;
            $this->attribute = new \Symfony\Config\SyliusAttribute\ResourcesConfig\AttributeConfig($value['attribute']);
            unset($value['attribute']);
        }

        if (array_key_exists('attribute_value', $value)) {
            $this->_usedProperties['attributeValue'] = true;
            $this->attributeValue = new \Symfony\Config\SyliusAttribute\ResourcesConfig\AttributeValueConfig($value['attribute_value']);
            unset($value['attribute_value']);
        }

        if ([] !== $value) {
            throw new InvalidConfigurationException(sprintf('The following keys are not supported by "%s": ', __CLASS__).implode(', ', array_keys($value)));
        }
    }

    public function toArray(): array
    {
        $output = [];
        if (isset($this->_usedProperties['subject'])) {
            $output['subject'] = $this->subject;
        }
        if (isset($this->_usedProperties['attribute'])) {
            $output['attribute'] = $this->attribute->toArray();
        }
        if (isset($this->_usedProperties['attributeValue'])) {
            $output['attribute_value'] = $this->attributeValue->toArray();
        }

        return $output;
    }

}
