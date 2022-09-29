<?php

namespace Symfony\Config\SyliusPromotion\Resources\PromotionSubject;

use Symfony\Component\Config\Loader\ParamConfigurator;
use Symfony\Component\Config\Definition\Exception\InvalidConfigurationException;

/**
 * This class is automatically generated to help in creating a config.
 */
class ClassesConfig 
{
    private $model;
    private $_usedProperties = [];

    /**
     * @default null
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function model($value): self
    {
        $this->_usedProperties['model'] = true;
        $this->model = $value;

        return $this;
    }

    public function __construct(array $value = [])
    {
        if (array_key_exists('model', $value)) {
            $this->_usedProperties['model'] = true;
            $this->model = $value['model'];
            unset($value['model']);
        }

        if ([] !== $value) {
            throw new InvalidConfigurationException(sprintf('The following keys are not supported by "%s": ', __CLASS__).implode(', ', array_keys($value)));
        }
    }

    public function toArray(): array
    {
        $output = [];
        if (isset($this->_usedProperties['model'])) {
            $output['model'] = $this->model;
        }

        return $output;
    }

}
