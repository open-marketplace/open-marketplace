<?php

namespace Symfony\Config\ApiPlatform\HttpCache;

use Symfony\Component\Config\Loader\ParamConfigurator;
use Symfony\Component\Config\Definition\Exception\InvalidConfigurationException;

/**
 * This class is automatically generated to help in creating a config.
 */
class InvalidationConfig 
{
    private $enabled;
    private $varnishUrls;
    private $maxHeaderLength;
    private $requestOptions;
    private $_usedProperties = [];

    /**
     * @default false
     * @param ParamConfigurator|bool $value
     * @return $this
     */
    public function enabled($value): self
    {
        $this->_usedProperties['enabled'] = true;
        $this->enabled = $value;

        return $this;
    }

    /**
     * @param ParamConfigurator|list<mixed|ParamConfigurator> $value
     * @return $this
     */
    public function varnishUrls($value): self
    {
        $this->_usedProperties['varnishUrls'] = true;
        $this->varnishUrls = $value;

        return $this;
    }

    /**
     * Max header length supported by the server
     * @default 7500
     * @param ParamConfigurator|int $value
     * @return $this
     */
    public function maxHeaderLength($value): self
    {
        $this->_usedProperties['maxHeaderLength'] = true;
        $this->maxHeaderLength = $value;

        return $this;
    }

    /**
     * To pass options to the client charged with the request.
     * @default array (
    )
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function requestOptions($value = array (
    )): self
    {
        $this->_usedProperties['requestOptions'] = true;
        $this->requestOptions = $value;

        return $this;
    }

    public function __construct(array $value = [])
    {
        if (array_key_exists('enabled', $value)) {
            $this->_usedProperties['enabled'] = true;
            $this->enabled = $value['enabled'];
            unset($value['enabled']);
        }

        if (array_key_exists('varnish_urls', $value)) {
            $this->_usedProperties['varnishUrls'] = true;
            $this->varnishUrls = $value['varnish_urls'];
            unset($value['varnish_urls']);
        }

        if (array_key_exists('max_header_length', $value)) {
            $this->_usedProperties['maxHeaderLength'] = true;
            $this->maxHeaderLength = $value['max_header_length'];
            unset($value['max_header_length']);
        }

        if (array_key_exists('request_options', $value)) {
            $this->_usedProperties['requestOptions'] = true;
            $this->requestOptions = $value['request_options'];
            unset($value['request_options']);
        }

        if ([] !== $value) {
            throw new InvalidConfigurationException(sprintf('The following keys are not supported by "%s": ', __CLASS__).implode(', ', array_keys($value)));
        }
    }

    public function toArray(): array
    {
        $output = [];
        if (isset($this->_usedProperties['enabled'])) {
            $output['enabled'] = $this->enabled;
        }
        if (isset($this->_usedProperties['varnishUrls'])) {
            $output['varnish_urls'] = $this->varnishUrls;
        }
        if (isset($this->_usedProperties['maxHeaderLength'])) {
            $output['max_header_length'] = $this->maxHeaderLength;
        }
        if (isset($this->_usedProperties['requestOptions'])) {
            $output['request_options'] = $this->requestOptions;
        }

        return $output;
    }

}
