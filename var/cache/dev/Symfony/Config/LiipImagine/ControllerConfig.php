<?php

namespace Symfony\Config\LiipImagine;

use Symfony\Component\Config\Loader\ParamConfigurator;
use Symfony\Component\Config\Definition\Exception\InvalidConfigurationException;

/**
 * This class is automatically generated to help in creating a config.
 */
class ControllerConfig 
{
    private $filterAction;
    private $filterRuntimeAction;
    private $redirectResponseCode;
    private $_usedProperties = [];

    /**
     * @default 'Liip\\ImagineBundle\\Controller\\ImagineController::filterAction'
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function filterAction($value): self
    {
        $this->_usedProperties['filterAction'] = true;
        $this->filterAction = $value;

        return $this;
    }

    /**
     * @default 'Liip\\ImagineBundle\\Controller\\ImagineController::filterRuntimeAction'
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function filterRuntimeAction($value): self
    {
        $this->_usedProperties['filterRuntimeAction'] = true;
        $this->filterRuntimeAction = $value;

        return $this;
    }

    /**
     * @default 302
     * @param ParamConfigurator|int $value
     * @return $this
     */
    public function redirectResponseCode($value): self
    {
        $this->_usedProperties['redirectResponseCode'] = true;
        $this->redirectResponseCode = $value;

        return $this;
    }

    public function __construct(array $value = [])
    {
        if (array_key_exists('filter_action', $value)) {
            $this->_usedProperties['filterAction'] = true;
            $this->filterAction = $value['filter_action'];
            unset($value['filter_action']);
        }

        if (array_key_exists('filter_runtime_action', $value)) {
            $this->_usedProperties['filterRuntimeAction'] = true;
            $this->filterRuntimeAction = $value['filter_runtime_action'];
            unset($value['filter_runtime_action']);
        }

        if (array_key_exists('redirect_response_code', $value)) {
            $this->_usedProperties['redirectResponseCode'] = true;
            $this->redirectResponseCode = $value['redirect_response_code'];
            unset($value['redirect_response_code']);
        }

        if ([] !== $value) {
            throw new InvalidConfigurationException(sprintf('The following keys are not supported by "%s": ', __CLASS__).implode(', ', array_keys($value)));
        }
    }

    public function toArray(): array
    {
        $output = [];
        if (isset($this->_usedProperties['filterAction'])) {
            $output['filter_action'] = $this->filterAction;
        }
        if (isset($this->_usedProperties['filterRuntimeAction'])) {
            $output['filter_runtime_action'] = $this->filterRuntimeAction;
        }
        if (isset($this->_usedProperties['redirectResponseCode'])) {
            $output['redirect_response_code'] = $this->redirectResponseCode;
        }

        return $output;
    }

}
