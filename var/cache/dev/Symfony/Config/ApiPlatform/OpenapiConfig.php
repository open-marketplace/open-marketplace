<?php

namespace Symfony\Config\ApiPlatform;

require_once __DIR__.\DIRECTORY_SEPARATOR.'Openapi'.\DIRECTORY_SEPARATOR.'ContactConfig.php';
require_once __DIR__.\DIRECTORY_SEPARATOR.'Openapi'.\DIRECTORY_SEPARATOR.'LicenseConfig.php';

use Symfony\Component\Config\Definition\Exception\InvalidConfigurationException;
use Symfony\Component\Config\Loader\ParamConfigurator;

/**
 * This class is automatically generated to help in creating a config.
 */
class OpenapiConfig 
{
    private $contact;
    private $backwardCompatibilityLayer;
    private $termsOfService;
    private $license;
    private $_usedProperties = [];

    public function contact(array $value = []): \Symfony\Config\ApiPlatform\Openapi\ContactConfig
    {
        if (null === $this->contact) {
            $this->_usedProperties['contact'] = true;
            $this->contact = new \Symfony\Config\ApiPlatform\Openapi\ContactConfig($value);
        } elseif (0 < \func_num_args()) {
            throw new InvalidConfigurationException('The node created by "contact()" has already been initialized. You cannot pass values the second time you call contact().');
        }

        return $this->contact;
    }

    /**
     * Enable this to decorate the "api_platform.swagger.normalizer.documentation" instead of decorating the OpenAPI factory.
     * @default true
     * @param ParamConfigurator|bool $value
     * @return $this
     */
    public function backwardCompatibilityLayer($value): self
    {
        $this->_usedProperties['backwardCompatibilityLayer'] = true;
        $this->backwardCompatibilityLayer = $value;

        return $this;
    }

    /**
     * A URL to the Terms of Service for the API. MUST be in the format of a URL.
     * @default null
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function termsOfService($value): self
    {
        $this->_usedProperties['termsOfService'] = true;
        $this->termsOfService = $value;

        return $this;
    }

    public function license(array $value = []): \Symfony\Config\ApiPlatform\Openapi\LicenseConfig
    {
        if (null === $this->license) {
            $this->_usedProperties['license'] = true;
            $this->license = new \Symfony\Config\ApiPlatform\Openapi\LicenseConfig($value);
        } elseif (0 < \func_num_args()) {
            throw new InvalidConfigurationException('The node created by "license()" has already been initialized. You cannot pass values the second time you call license().');
        }

        return $this->license;
    }

    public function __construct(array $value = [])
    {
        if (array_key_exists('contact', $value)) {
            $this->_usedProperties['contact'] = true;
            $this->contact = new \Symfony\Config\ApiPlatform\Openapi\ContactConfig($value['contact']);
            unset($value['contact']);
        }

        if (array_key_exists('backward_compatibility_layer', $value)) {
            $this->_usedProperties['backwardCompatibilityLayer'] = true;
            $this->backwardCompatibilityLayer = $value['backward_compatibility_layer'];
            unset($value['backward_compatibility_layer']);
        }

        if (array_key_exists('termsOfService', $value)) {
            $this->_usedProperties['termsOfService'] = true;
            $this->termsOfService = $value['termsOfService'];
            unset($value['termsOfService']);
        }

        if (array_key_exists('license', $value)) {
            $this->_usedProperties['license'] = true;
            $this->license = new \Symfony\Config\ApiPlatform\Openapi\LicenseConfig($value['license']);
            unset($value['license']);
        }

        if ([] !== $value) {
            throw new InvalidConfigurationException(sprintf('The following keys are not supported by "%s": ', __CLASS__).implode(', ', array_keys($value)));
        }
    }

    public function toArray(): array
    {
        $output = [];
        if (isset($this->_usedProperties['contact'])) {
            $output['contact'] = $this->contact->toArray();
        }
        if (isset($this->_usedProperties['backwardCompatibilityLayer'])) {
            $output['backward_compatibility_layer'] = $this->backwardCompatibilityLayer;
        }
        if (isset($this->_usedProperties['termsOfService'])) {
            $output['termsOfService'] = $this->termsOfService;
        }
        if (isset($this->_usedProperties['license'])) {
            $output['license'] = $this->license->toArray();
        }

        return $output;
    }

}
