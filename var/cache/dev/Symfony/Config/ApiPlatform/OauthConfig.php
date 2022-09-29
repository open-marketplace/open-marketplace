<?php

namespace Symfony\Config\ApiPlatform;

use Symfony\Component\Config\Loader\ParamConfigurator;
use Symfony\Component\Config\Definition\Exception\InvalidConfigurationException;

/**
 * This class is automatically generated to help in creating a config.
 */
class OauthConfig 
{
    private $enabled;
    private $clientId;
    private $clientSecret;
    private $type;
    private $flow;
    private $tokenUrl;
    private $authorizationUrl;
    private $refreshUrl;
    private $scopes;
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
     * The oauth client id.
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function clientId($value): self
    {
        $this->_usedProperties['clientId'] = true;
        $this->clientId = $value;

        return $this;
    }

    /**
     * The oauth client secret.
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function clientSecret($value): self
    {
        $this->_usedProperties['clientSecret'] = true;
        $this->clientSecret = $value;

        return $this;
    }

    /**
     * The oauth type.
     * @default 'oauth2'
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function type($value): self
    {
        $this->_usedProperties['type'] = true;
        $this->type = $value;

        return $this;
    }

    /**
     * The oauth flow grant type.
     * @default 'application'
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function flow($value): self
    {
        $this->_usedProperties['flow'] = true;
        $this->flow = $value;

        return $this;
    }

    /**
     * The oauth token url.
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function tokenUrl($value): self
    {
        $this->_usedProperties['tokenUrl'] = true;
        $this->tokenUrl = $value;

        return $this;
    }

    /**
     * The oauth authentication url.
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function authorizationUrl($value): self
    {
        $this->_usedProperties['authorizationUrl'] = true;
        $this->authorizationUrl = $value;

        return $this;
    }

    /**
     * The oauth refresh url.
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function refreshUrl($value): self
    {
        $this->_usedProperties['refreshUrl'] = true;
        $this->refreshUrl = $value;

        return $this;
    }

    /**
     * @param ParamConfigurator|list<mixed|ParamConfigurator> $value
     * @return $this
     */
    public function scopes($value): self
    {
        $this->_usedProperties['scopes'] = true;
        $this->scopes = $value;

        return $this;
    }

    public function __construct(array $value = [])
    {
        if (array_key_exists('enabled', $value)) {
            $this->_usedProperties['enabled'] = true;
            $this->enabled = $value['enabled'];
            unset($value['enabled']);
        }

        if (array_key_exists('clientId', $value)) {
            $this->_usedProperties['clientId'] = true;
            $this->clientId = $value['clientId'];
            unset($value['clientId']);
        }

        if (array_key_exists('clientSecret', $value)) {
            $this->_usedProperties['clientSecret'] = true;
            $this->clientSecret = $value['clientSecret'];
            unset($value['clientSecret']);
        }

        if (array_key_exists('type', $value)) {
            $this->_usedProperties['type'] = true;
            $this->type = $value['type'];
            unset($value['type']);
        }

        if (array_key_exists('flow', $value)) {
            $this->_usedProperties['flow'] = true;
            $this->flow = $value['flow'];
            unset($value['flow']);
        }

        if (array_key_exists('tokenUrl', $value)) {
            $this->_usedProperties['tokenUrl'] = true;
            $this->tokenUrl = $value['tokenUrl'];
            unset($value['tokenUrl']);
        }

        if (array_key_exists('authorizationUrl', $value)) {
            $this->_usedProperties['authorizationUrl'] = true;
            $this->authorizationUrl = $value['authorizationUrl'];
            unset($value['authorizationUrl']);
        }

        if (array_key_exists('refreshUrl', $value)) {
            $this->_usedProperties['refreshUrl'] = true;
            $this->refreshUrl = $value['refreshUrl'];
            unset($value['refreshUrl']);
        }

        if (array_key_exists('scopes', $value)) {
            $this->_usedProperties['scopes'] = true;
            $this->scopes = $value['scopes'];
            unset($value['scopes']);
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
        if (isset($this->_usedProperties['clientId'])) {
            $output['clientId'] = $this->clientId;
        }
        if (isset($this->_usedProperties['clientSecret'])) {
            $output['clientSecret'] = $this->clientSecret;
        }
        if (isset($this->_usedProperties['type'])) {
            $output['type'] = $this->type;
        }
        if (isset($this->_usedProperties['flow'])) {
            $output['flow'] = $this->flow;
        }
        if (isset($this->_usedProperties['tokenUrl'])) {
            $output['tokenUrl'] = $this->tokenUrl;
        }
        if (isset($this->_usedProperties['authorizationUrl'])) {
            $output['authorizationUrl'] = $this->authorizationUrl;
        }
        if (isset($this->_usedProperties['refreshUrl'])) {
            $output['refreshUrl'] = $this->refreshUrl;
        }
        if (isset($this->_usedProperties['scopes'])) {
            $output['scopes'] = $this->scopes;
        }

        return $output;
    }

}
