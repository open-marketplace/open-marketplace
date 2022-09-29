<?php

namespace Symfony\Config\SyliusPayum;

use Symfony\Component\Config\Loader\ParamConfigurator;
use Symfony\Component\Config\Definition\Exception\InvalidConfigurationException;

/**
 * This class is automatically generated to help in creating a config.
 */
class TemplateConfig 
{
    private $layout;
    private $obtainCreditCard;
    private $_usedProperties = [];

    /**
     * @default '@SyliusPayum/layout.html.twig'
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function layout($value): self
    {
        $this->_usedProperties['layout'] = true;
        $this->layout = $value;

        return $this;
    }

    /**
     * @default '@SyliusPayum/Action/obtainCreditCard.html.twig'
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function obtainCreditCard($value): self
    {
        $this->_usedProperties['obtainCreditCard'] = true;
        $this->obtainCreditCard = $value;

        return $this;
    }

    public function __construct(array $value = [])
    {
        if (array_key_exists('layout', $value)) {
            $this->_usedProperties['layout'] = true;
            $this->layout = $value['layout'];
            unset($value['layout']);
        }

        if (array_key_exists('obtain_credit_card', $value)) {
            $this->_usedProperties['obtainCreditCard'] = true;
            $this->obtainCreditCard = $value['obtain_credit_card'];
            unset($value['obtain_credit_card']);
        }

        if ([] !== $value) {
            throw new InvalidConfigurationException(sprintf('The following keys are not supported by "%s": ', __CLASS__).implode(', ', array_keys($value)));
        }
    }

    public function toArray(): array
    {
        $output = [];
        if (isset($this->_usedProperties['layout'])) {
            $output['layout'] = $this->layout;
        }
        if (isset($this->_usedProperties['obtainCreditCard'])) {
            $output['obtain_credit_card'] = $this->obtainCreditCard;
        }

        return $output;
    }

}
