<?php

namespace Symfony\Config\LexikJwtAuthentication;

use Symfony\Component\Config\Loader\ParamConfigurator;
use Symfony\Component\Config\Definition\Exception\InvalidConfigurationException;

/**
 * This class is automatically generated to help in creating a config.
 */
class SetCookiesConfig 
{
    private $lifetime;
    private $samesite;
    private $path;
    private $domain;
    private $secure;
    private $httpOnly;
    private $split;
    private $_usedProperties = [];

    /**
     * The cookie lifetime. If null, the "token_ttl" option value will be used
     * @default null
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function lifetime($value): self
    {
        $this->_usedProperties['lifetime'] = true;
        $this->lifetime = $value;

        return $this;
    }

    /**
     * @default 'lax'
     * @param ParamConfigurator|'none'|'lax'|'strict' $value
     * @return $this
     */
    public function samesite($value): self
    {
        $this->_usedProperties['samesite'] = true;
        $this->samesite = $value;

        return $this;
    }

    /**
     * @default '/'
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function path($value): self
    {
        $this->_usedProperties['path'] = true;
        $this->path = $value;

        return $this;
    }

    /**
     * @default null
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function domain($value): self
    {
        $this->_usedProperties['domain'] = true;
        $this->domain = $value;

        return $this;
    }

    /**
     * @default true
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function secure($value): self
    {
        $this->_usedProperties['secure'] = true;
        $this->secure = $value;

        return $this;
    }

    /**
     * @default true
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function httpOnly($value): self
    {
        $this->_usedProperties['httpOnly'] = true;
        $this->httpOnly = $value;

        return $this;
    }

    /**
     * @param ParamConfigurator|list<mixed|ParamConfigurator> $value
     * @return $this
     */
    public function split($value): self
    {
        $this->_usedProperties['split'] = true;
        $this->split = $value;

        return $this;
    }

    public function __construct(array $value = [])
    {
        if (array_key_exists('lifetime', $value)) {
            $this->_usedProperties['lifetime'] = true;
            $this->lifetime = $value['lifetime'];
            unset($value['lifetime']);
        }

        if (array_key_exists('samesite', $value)) {
            $this->_usedProperties['samesite'] = true;
            $this->samesite = $value['samesite'];
            unset($value['samesite']);
        }

        if (array_key_exists('path', $value)) {
            $this->_usedProperties['path'] = true;
            $this->path = $value['path'];
            unset($value['path']);
        }

        if (array_key_exists('domain', $value)) {
            $this->_usedProperties['domain'] = true;
            $this->domain = $value['domain'];
            unset($value['domain']);
        }

        if (array_key_exists('secure', $value)) {
            $this->_usedProperties['secure'] = true;
            $this->secure = $value['secure'];
            unset($value['secure']);
        }

        if (array_key_exists('httpOnly', $value)) {
            $this->_usedProperties['httpOnly'] = true;
            $this->httpOnly = $value['httpOnly'];
            unset($value['httpOnly']);
        }

        if (array_key_exists('split', $value)) {
            $this->_usedProperties['split'] = true;
            $this->split = $value['split'];
            unset($value['split']);
        }

        if ([] !== $value) {
            throw new InvalidConfigurationException(sprintf('The following keys are not supported by "%s": ', __CLASS__).implode(', ', array_keys($value)));
        }
    }

    public function toArray(): array
    {
        $output = [];
        if (isset($this->_usedProperties['lifetime'])) {
            $output['lifetime'] = $this->lifetime;
        }
        if (isset($this->_usedProperties['samesite'])) {
            $output['samesite'] = $this->samesite;
        }
        if (isset($this->_usedProperties['path'])) {
            $output['path'] = $this->path;
        }
        if (isset($this->_usedProperties['domain'])) {
            $output['domain'] = $this->domain;
        }
        if (isset($this->_usedProperties['secure'])) {
            $output['secure'] = $this->secure;
        }
        if (isset($this->_usedProperties['httpOnly'])) {
            $output['httpOnly'] = $this->httpOnly;
        }
        if (isset($this->_usedProperties['split'])) {
            $output['split'] = $this->split;
        }

        return $output;
    }

}
