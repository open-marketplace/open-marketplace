<?php

namespace Symfony\Config\LexikJwtAuthentication;

use Symfony\Component\Config\Loader\ParamConfigurator;
use Symfony\Component\Config\Definition\Exception\InvalidConfigurationException;

/**
 * This class is automatically generated to help in creating a config.
 */
class EncoderConfig 
{
    private $service;
    private $signatureAlgorithm;
    private $cryptoEngine;
    private $_usedProperties = [];

    /**
     * @default 'lexik_jwt_authentication.encoder.lcobucci'
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function service($value): self
    {
        $this->_usedProperties['service'] = true;
        $this->service = $value;

        return $this;
    }

    /**
     * @default 'RS256'
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function signatureAlgorithm($value): self
    {
        $this->_usedProperties['signatureAlgorithm'] = true;
        $this->signatureAlgorithm = $value;

        return $this;
    }

    /**
     * @default 'openssl'
     * @param ParamConfigurator|'openssl'|'phpseclib' $value
     * @deprecated The "encoder.crypto_engine" configuration key is deprecated since version 2.5, built-in encoders support OpenSSL only
     * @return $this
     */
    public function cryptoEngine($value): self
    {
        $this->_usedProperties['cryptoEngine'] = true;
        $this->cryptoEngine = $value;

        return $this;
    }

    public function __construct(array $value = [])
    {
        if (array_key_exists('service', $value)) {
            $this->_usedProperties['service'] = true;
            $this->service = $value['service'];
            unset($value['service']);
        }

        if (array_key_exists('signature_algorithm', $value)) {
            $this->_usedProperties['signatureAlgorithm'] = true;
            $this->signatureAlgorithm = $value['signature_algorithm'];
            unset($value['signature_algorithm']);
        }

        if (array_key_exists('crypto_engine', $value)) {
            $this->_usedProperties['cryptoEngine'] = true;
            $this->cryptoEngine = $value['crypto_engine'];
            unset($value['crypto_engine']);
        }

        if ([] !== $value) {
            throw new InvalidConfigurationException(sprintf('The following keys are not supported by "%s": ', __CLASS__).implode(', ', array_keys($value)));
        }
    }

    public function toArray(): array
    {
        $output = [];
        if (isset($this->_usedProperties['service'])) {
            $output['service'] = $this->service;
        }
        if (isset($this->_usedProperties['signatureAlgorithm'])) {
            $output['signature_algorithm'] = $this->signatureAlgorithm;
        }
        if (isset($this->_usedProperties['cryptoEngine'])) {
            $output['crypto_engine'] = $this->cryptoEngine;
        }

        return $output;
    }

}
