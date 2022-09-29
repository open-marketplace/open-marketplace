<?php

namespace Symfony\Config\ApiPlatform;

require_once __DIR__.\DIRECTORY_SEPARATOR.'HttpCache'.\DIRECTORY_SEPARATOR.'InvalidationConfig.php';

use Symfony\Component\Config\Loader\ParamConfigurator;
use Symfony\Component\Config\Definition\Exception\InvalidConfigurationException;

/**
 * This class is automatically generated to help in creating a config.
 */
class HttpCacheConfig 
{
    private $etag;
    private $maxAge;
    private $sharedMaxAge;
    private $vary;
    private $public;
    private $invalidation;
    private $_usedProperties = [];

    /**
     * Automatically generate etags for API responses.
     * @default true
     * @param ParamConfigurator|bool $value
     * @deprecated The use of the `http_cache.etag` has been deprecated in 2.6 and will be removed in 3.0. Use `defaults.cache_headers.etag` instead.
     * @return $this
     */
    public function etag($value): self
    {
        $this->_usedProperties['etag'] = true;
        $this->etag = $value;

        return $this;
    }

    /**
     * Default value for the response max age.
     * @default null
     * @param ParamConfigurator|int $value
     * @deprecated The use of the `http_cache.max_age` has been deprecated in 2.6 and will be removed in 3.0. Use `defaults.cache_headers.max_age` instead.
     * @return $this
     */
    public function maxAge($value): self
    {
        $this->_usedProperties['maxAge'] = true;
        $this->maxAge = $value;

        return $this;
    }

    /**
     * Default value for the response shared (proxy) max age.
     * @default null
     * @param ParamConfigurator|int $value
     * @deprecated The use of the `http_cache.shared_max_age` has been deprecated in 2.6 and will be removed in 3.0. Use `defaults.cache_headers.shared_max_age` instead.
     * @return $this
     */
    public function sharedMaxAge($value): self
    {
        $this->_usedProperties['sharedMaxAge'] = true;
        $this->sharedMaxAge = $value;

        return $this;
    }

    /**
     * @param ParamConfigurator|list<mixed|ParamConfigurator> $value
     * @return $this
     */
    public function vary($value): self
    {
        $this->_usedProperties['vary'] = true;
        $this->vary = $value;

        return $this;
    }

    /**
     * To make all responses public by default.
     * @default null
     * @param ParamConfigurator|bool $value
     * @return $this
     */
    public function public($value): self
    {
        $this->_usedProperties['public'] = true;
        $this->public = $value;

        return $this;
    }

    /**
     * @return \Symfony\Config\ApiPlatform\HttpCache\InvalidationConfig|$this
     */
    public function invalidation($value = [])
    {
        if (!\is_array($value)) {
            $this->_usedProperties['invalidation'] = true;
            $this->invalidation = $value;

            return $this;
        }

        if (!$this->invalidation instanceof \Symfony\Config\ApiPlatform\HttpCache\InvalidationConfig) {
            $this->_usedProperties['invalidation'] = true;
            $this->invalidation = new \Symfony\Config\ApiPlatform\HttpCache\InvalidationConfig($value);
        } elseif (0 < \func_num_args()) {
            throw new InvalidConfigurationException('The node created by "invalidation()" has already been initialized. You cannot pass values the second time you call invalidation().');
        }

        return $this->invalidation;
    }

    public function __construct(array $value = [])
    {
        if (array_key_exists('etag', $value)) {
            $this->_usedProperties['etag'] = true;
            $this->etag = $value['etag'];
            unset($value['etag']);
        }

        if (array_key_exists('max_age', $value)) {
            $this->_usedProperties['maxAge'] = true;
            $this->maxAge = $value['max_age'];
            unset($value['max_age']);
        }

        if (array_key_exists('shared_max_age', $value)) {
            $this->_usedProperties['sharedMaxAge'] = true;
            $this->sharedMaxAge = $value['shared_max_age'];
            unset($value['shared_max_age']);
        }

        if (array_key_exists('vary', $value)) {
            $this->_usedProperties['vary'] = true;
            $this->vary = $value['vary'];
            unset($value['vary']);
        }

        if (array_key_exists('public', $value)) {
            $this->_usedProperties['public'] = true;
            $this->public = $value['public'];
            unset($value['public']);
        }

        if (array_key_exists('invalidation', $value)) {
            $this->_usedProperties['invalidation'] = true;
            $this->invalidation = \is_array($value['invalidation']) ? new \Symfony\Config\ApiPlatform\HttpCache\InvalidationConfig($value['invalidation']) : $value['invalidation'];
            unset($value['invalidation']);
        }

        if ([] !== $value) {
            throw new InvalidConfigurationException(sprintf('The following keys are not supported by "%s": ', __CLASS__).implode(', ', array_keys($value)));
        }
    }

    public function toArray(): array
    {
        $output = [];
        if (isset($this->_usedProperties['etag'])) {
            $output['etag'] = $this->etag;
        }
        if (isset($this->_usedProperties['maxAge'])) {
            $output['max_age'] = $this->maxAge;
        }
        if (isset($this->_usedProperties['sharedMaxAge'])) {
            $output['shared_max_age'] = $this->sharedMaxAge;
        }
        if (isset($this->_usedProperties['vary'])) {
            $output['vary'] = $this->vary;
        }
        if (isset($this->_usedProperties['public'])) {
            $output['public'] = $this->public;
        }
        if (isset($this->_usedProperties['invalidation'])) {
            $output['invalidation'] = $this->invalidation instanceof \Symfony\Config\ApiPlatform\HttpCache\InvalidationConfig ? $this->invalidation->toArray() : $this->invalidation;
        }

        return $output;
    }

}
