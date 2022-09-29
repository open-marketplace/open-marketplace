<?php

namespace Symfony\Config\LexikJwtAuthentication;

require_once __DIR__.\DIRECTORY_SEPARATOR.'TokenExtractors'.\DIRECTORY_SEPARATOR.'AuthorizationHeaderConfig.php';
require_once __DIR__.\DIRECTORY_SEPARATOR.'TokenExtractors'.\DIRECTORY_SEPARATOR.'CookieConfig.php';
require_once __DIR__.\DIRECTORY_SEPARATOR.'TokenExtractors'.\DIRECTORY_SEPARATOR.'QueryParameterConfig.php';
require_once __DIR__.\DIRECTORY_SEPARATOR.'TokenExtractors'.\DIRECTORY_SEPARATOR.'SplitCookieConfig.php';

use Symfony\Component\Config\Definition\Exception\InvalidConfigurationException;

/**
 * This class is automatically generated to help in creating a config.
 */
class TokenExtractorsConfig 
{
    private $authorizationHeader;
    private $cookie;
    private $queryParameter;
    private $splitCookie;
    private $_usedProperties = [];

    public function authorizationHeader(array $value = []): \Symfony\Config\LexikJwtAuthentication\TokenExtractors\AuthorizationHeaderConfig
    {
        if (null === $this->authorizationHeader) {
            $this->_usedProperties['authorizationHeader'] = true;
            $this->authorizationHeader = new \Symfony\Config\LexikJwtAuthentication\TokenExtractors\AuthorizationHeaderConfig($value);
        } elseif (0 < \func_num_args()) {
            throw new InvalidConfigurationException('The node created by "authorizationHeader()" has already been initialized. You cannot pass values the second time you call authorizationHeader().');
        }

        return $this->authorizationHeader;
    }

    /**
     * @return \Symfony\Config\LexikJwtAuthentication\TokenExtractors\CookieConfig|$this
     */
    public function cookie($value = [])
    {
        if (!\is_array($value)) {
            $this->_usedProperties['cookie'] = true;
            $this->cookie = $value;

            return $this;
        }

        if (!$this->cookie instanceof \Symfony\Config\LexikJwtAuthentication\TokenExtractors\CookieConfig) {
            $this->_usedProperties['cookie'] = true;
            $this->cookie = new \Symfony\Config\LexikJwtAuthentication\TokenExtractors\CookieConfig($value);
        } elseif (0 < \func_num_args()) {
            throw new InvalidConfigurationException('The node created by "cookie()" has already been initialized. You cannot pass values the second time you call cookie().');
        }

        return $this->cookie;
    }

    /**
     * @return \Symfony\Config\LexikJwtAuthentication\TokenExtractors\QueryParameterConfig|$this
     */
    public function queryParameter($value = [])
    {
        if (!\is_array($value)) {
            $this->_usedProperties['queryParameter'] = true;
            $this->queryParameter = $value;

            return $this;
        }

        if (!$this->queryParameter instanceof \Symfony\Config\LexikJwtAuthentication\TokenExtractors\QueryParameterConfig) {
            $this->_usedProperties['queryParameter'] = true;
            $this->queryParameter = new \Symfony\Config\LexikJwtAuthentication\TokenExtractors\QueryParameterConfig($value);
        } elseif (0 < \func_num_args()) {
            throw new InvalidConfigurationException('The node created by "queryParameter()" has already been initialized. You cannot pass values the second time you call queryParameter().');
        }

        return $this->queryParameter;
    }

    /**
     * @return \Symfony\Config\LexikJwtAuthentication\TokenExtractors\SplitCookieConfig|$this
     */
    public function splitCookie($value = [])
    {
        if (!\is_array($value)) {
            $this->_usedProperties['splitCookie'] = true;
            $this->splitCookie = $value;

            return $this;
        }

        if (!$this->splitCookie instanceof \Symfony\Config\LexikJwtAuthentication\TokenExtractors\SplitCookieConfig) {
            $this->_usedProperties['splitCookie'] = true;
            $this->splitCookie = new \Symfony\Config\LexikJwtAuthentication\TokenExtractors\SplitCookieConfig($value);
        } elseif (0 < \func_num_args()) {
            throw new InvalidConfigurationException('The node created by "splitCookie()" has already been initialized. You cannot pass values the second time you call splitCookie().');
        }

        return $this->splitCookie;
    }

    public function __construct(array $value = [])
    {
        if (array_key_exists('authorization_header', $value)) {
            $this->_usedProperties['authorizationHeader'] = true;
            $this->authorizationHeader = new \Symfony\Config\LexikJwtAuthentication\TokenExtractors\AuthorizationHeaderConfig($value['authorization_header']);
            unset($value['authorization_header']);
        }

        if (array_key_exists('cookie', $value)) {
            $this->_usedProperties['cookie'] = true;
            $this->cookie = \is_array($value['cookie']) ? new \Symfony\Config\LexikJwtAuthentication\TokenExtractors\CookieConfig($value['cookie']) : $value['cookie'];
            unset($value['cookie']);
        }

        if (array_key_exists('query_parameter', $value)) {
            $this->_usedProperties['queryParameter'] = true;
            $this->queryParameter = \is_array($value['query_parameter']) ? new \Symfony\Config\LexikJwtAuthentication\TokenExtractors\QueryParameterConfig($value['query_parameter']) : $value['query_parameter'];
            unset($value['query_parameter']);
        }

        if (array_key_exists('split_cookie', $value)) {
            $this->_usedProperties['splitCookie'] = true;
            $this->splitCookie = \is_array($value['split_cookie']) ? new \Symfony\Config\LexikJwtAuthentication\TokenExtractors\SplitCookieConfig($value['split_cookie']) : $value['split_cookie'];
            unset($value['split_cookie']);
        }

        if ([] !== $value) {
            throw new InvalidConfigurationException(sprintf('The following keys are not supported by "%s": ', __CLASS__).implode(', ', array_keys($value)));
        }
    }

    public function toArray(): array
    {
        $output = [];
        if (isset($this->_usedProperties['authorizationHeader'])) {
            $output['authorization_header'] = $this->authorizationHeader->toArray();
        }
        if (isset($this->_usedProperties['cookie'])) {
            $output['cookie'] = $this->cookie instanceof \Symfony\Config\LexikJwtAuthentication\TokenExtractors\CookieConfig ? $this->cookie->toArray() : $this->cookie;
        }
        if (isset($this->_usedProperties['queryParameter'])) {
            $output['query_parameter'] = $this->queryParameter instanceof \Symfony\Config\LexikJwtAuthentication\TokenExtractors\QueryParameterConfig ? $this->queryParameter->toArray() : $this->queryParameter;
        }
        if (isset($this->_usedProperties['splitCookie'])) {
            $output['split_cookie'] = $this->splitCookie instanceof \Symfony\Config\LexikJwtAuthentication\TokenExtractors\SplitCookieConfig ? $this->splitCookie->toArray() : $this->splitCookie;
        }

        return $output;
    }

}
