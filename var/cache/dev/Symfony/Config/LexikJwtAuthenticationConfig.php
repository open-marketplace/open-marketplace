<?php

namespace Symfony\Config;

require_once __DIR__.\DIRECTORY_SEPARATOR.'LexikJwtAuthentication'.\DIRECTORY_SEPARATOR.'EncoderConfig.php';
require_once __DIR__.\DIRECTORY_SEPARATOR.'LexikJwtAuthentication'.\DIRECTORY_SEPARATOR.'TokenExtractorsConfig.php';
require_once __DIR__.\DIRECTORY_SEPARATOR.'LexikJwtAuthentication'.\DIRECTORY_SEPARATOR.'SetCookiesConfig.php';

use Symfony\Component\Config\Loader\ParamConfigurator;
use Symfony\Component\Config\Definition\Exception\InvalidConfigurationException;

/**
 * This class is automatically generated to help in creating a config.
 */
class LexikJwtAuthenticationConfig implements \Symfony\Component\Config\Builder\ConfigBuilderInterface
{
    private $privateKeyPath;
    private $publicKeyPath;
    private $publicKey;
    private $additionalPublicKeys;
    private $secretKey;
    private $passPhrase;
    private $tokenTtl;
    private $allowNoExpiration;
    private $clockSkew;
    private $encoder;
    private $userIdentityField;
    private $userIdClaim;
    private $tokenExtractors;
    private $removeTokenFromBodyWhenCookiesUsed;
    private $setCookies;
    private $_usedProperties = [];

    /**
     * @default null
     * @param ParamConfigurator|mixed $value
     * @deprecated The "lexik_jwt_authentication.private_key_path" configuration key is deprecated since version 2.5. Use "lexik_jwt_authentication.secret_key" instead.
     * @return $this
     */
    public function privateKeyPath($value): self
    {
        $this->_usedProperties['privateKeyPath'] = true;
        $this->privateKeyPath = $value;

        return $this;
    }

    /**
     * @default null
     * @param ParamConfigurator|mixed $value
     * @deprecated The "lexik_jwt_authentication.public_key_path" configuration key is deprecated since version 2.5. Use "lexik_jwt_authentication.public_key" instead.
     * @return $this
     */
    public function publicKeyPath($value): self
    {
        $this->_usedProperties['publicKeyPath'] = true;
        $this->publicKeyPath = $value;

        return $this;
    }

    /**
     * The key used to sign tokens (useless for HMAC). If not set, the key will be automatically computed from the secret key.
     * @default null
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function publicKey($value): self
    {
        $this->_usedProperties['publicKey'] = true;
        $this->publicKey = $value;

        return $this;
    }

    /**
     * @param ParamConfigurator|list<mixed|ParamConfigurator> $value
     * @return $this
     */
    public function additionalPublicKeys($value): self
    {
        $this->_usedProperties['additionalPublicKeys'] = true;
        $this->additionalPublicKeys = $value;

        return $this;
    }

    /**
     * The key used to sign tokens. It can be a raw secret (for HMAC), a raw RSA/ECDSA key or the path to a file itself being plaintext or PEM.
     * @default null
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function secretKey($value): self
    {
        $this->_usedProperties['secretKey'] = true;
        $this->secretKey = $value;

        return $this;
    }

    /**
     * The key passphrase (useless for HMAC)
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function passPhrase($value): self
    {
        $this->_usedProperties['passPhrase'] = true;
        $this->passPhrase = $value;

        return $this;
    }

    /**
     * @default 3600
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function tokenTtl($value): self
    {
        $this->_usedProperties['tokenTtl'] = true;
        $this->tokenTtl = $value;

        return $this;
    }

    /**
     * Allow tokens without "exp" claim (i.e. indefinitely valid, no lifetime) to be considered valid. Caution: usage of this should be rare.
     * @default false
     * @param ParamConfigurator|bool $value
     * @return $this
     */
    public function allowNoExpiration($value): self
    {
        $this->_usedProperties['allowNoExpiration'] = true;
        $this->allowNoExpiration = $value;

        return $this;
    }

    /**
     * @default 0
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function clockSkew($value): self
    {
        $this->_usedProperties['clockSkew'] = true;
        $this->clockSkew = $value;

        return $this;
    }

    public function encoder(array $value = []): \Symfony\Config\LexikJwtAuthentication\EncoderConfig
    {
        if (null === $this->encoder) {
            $this->_usedProperties['encoder'] = true;
            $this->encoder = new \Symfony\Config\LexikJwtAuthentication\EncoderConfig($value);
        } elseif (0 < \func_num_args()) {
            throw new InvalidConfigurationException('The node created by "encoder()" has already been initialized. You cannot pass values the second time you call encoder().');
        }

        return $this->encoder;
    }

    /**
     * @default 'username'
     * @param ParamConfigurator|mixed $value
     * @deprecated The "lexik_jwt_authentication.user_identity_field" configuration key is deprecated since version 2.15, implement "Symfony\Component\Security\Core\User\UserInterface::getUserIdentifier()" instead.
     * @return $this
     */
    public function userIdentityField($value): self
    {
        $this->_usedProperties['userIdentityField'] = true;
        $this->userIdentityField = $value;

        return $this;
    }

    /**
     * If null, the user ID claim will have the same name as the one defined by the option "user_identity_field"
     * @default null
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function userIdClaim($value): self
    {
        $this->_usedProperties['userIdClaim'] = true;
        $this->userIdClaim = $value;

        return $this;
    }

    public function tokenExtractors(array $value = []): \Symfony\Config\LexikJwtAuthentication\TokenExtractorsConfig
    {
        if (null === $this->tokenExtractors) {
            $this->_usedProperties['tokenExtractors'] = true;
            $this->tokenExtractors = new \Symfony\Config\LexikJwtAuthentication\TokenExtractorsConfig($value);
        } elseif (0 < \func_num_args()) {
            throw new InvalidConfigurationException('The node created by "tokenExtractors()" has already been initialized. You cannot pass values the second time you call tokenExtractors().');
        }

        return $this->tokenExtractors;
    }

    /**
     * @default true
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function removeTokenFromBodyWhenCookiesUsed($value): self
    {
        $this->_usedProperties['removeTokenFromBodyWhenCookiesUsed'] = true;
        $this->removeTokenFromBodyWhenCookiesUsed = $value;

        return $this;
    }

    public function setCookies(string $name, array $value = []): \Symfony\Config\LexikJwtAuthentication\SetCookiesConfig
    {
        if (!isset($this->setCookies[$name])) {
            $this->_usedProperties['setCookies'] = true;
            $this->setCookies[$name] = new \Symfony\Config\LexikJwtAuthentication\SetCookiesConfig($value);
        } elseif (1 < \func_num_args()) {
            throw new InvalidConfigurationException('The node created by "setCookies()" has already been initialized. You cannot pass values the second time you call setCookies().');
        }

        return $this->setCookies[$name];
    }

    public function getExtensionAlias(): string
    {
        return 'lexik_jwt_authentication';
    }

    public function __construct(array $value = [])
    {
        if (array_key_exists('private_key_path', $value)) {
            $this->_usedProperties['privateKeyPath'] = true;
            $this->privateKeyPath = $value['private_key_path'];
            unset($value['private_key_path']);
        }

        if (array_key_exists('public_key_path', $value)) {
            $this->_usedProperties['publicKeyPath'] = true;
            $this->publicKeyPath = $value['public_key_path'];
            unset($value['public_key_path']);
        }

        if (array_key_exists('public_key', $value)) {
            $this->_usedProperties['publicKey'] = true;
            $this->publicKey = $value['public_key'];
            unset($value['public_key']);
        }

        if (array_key_exists('additional_public_keys', $value)) {
            $this->_usedProperties['additionalPublicKeys'] = true;
            $this->additionalPublicKeys = $value['additional_public_keys'];
            unset($value['additional_public_keys']);
        }

        if (array_key_exists('secret_key', $value)) {
            $this->_usedProperties['secretKey'] = true;
            $this->secretKey = $value['secret_key'];
            unset($value['secret_key']);
        }

        if (array_key_exists('pass_phrase', $value)) {
            $this->_usedProperties['passPhrase'] = true;
            $this->passPhrase = $value['pass_phrase'];
            unset($value['pass_phrase']);
        }

        if (array_key_exists('token_ttl', $value)) {
            $this->_usedProperties['tokenTtl'] = true;
            $this->tokenTtl = $value['token_ttl'];
            unset($value['token_ttl']);
        }

        if (array_key_exists('allow_no_expiration', $value)) {
            $this->_usedProperties['allowNoExpiration'] = true;
            $this->allowNoExpiration = $value['allow_no_expiration'];
            unset($value['allow_no_expiration']);
        }

        if (array_key_exists('clock_skew', $value)) {
            $this->_usedProperties['clockSkew'] = true;
            $this->clockSkew = $value['clock_skew'];
            unset($value['clock_skew']);
        }

        if (array_key_exists('encoder', $value)) {
            $this->_usedProperties['encoder'] = true;
            $this->encoder = new \Symfony\Config\LexikJwtAuthentication\EncoderConfig($value['encoder']);
            unset($value['encoder']);
        }

        if (array_key_exists('user_identity_field', $value)) {
            $this->_usedProperties['userIdentityField'] = true;
            $this->userIdentityField = $value['user_identity_field'];
            unset($value['user_identity_field']);
        }

        if (array_key_exists('user_id_claim', $value)) {
            $this->_usedProperties['userIdClaim'] = true;
            $this->userIdClaim = $value['user_id_claim'];
            unset($value['user_id_claim']);
        }

        if (array_key_exists('token_extractors', $value)) {
            $this->_usedProperties['tokenExtractors'] = true;
            $this->tokenExtractors = new \Symfony\Config\LexikJwtAuthentication\TokenExtractorsConfig($value['token_extractors']);
            unset($value['token_extractors']);
        }

        if (array_key_exists('remove_token_from_body_when_cookies_used', $value)) {
            $this->_usedProperties['removeTokenFromBodyWhenCookiesUsed'] = true;
            $this->removeTokenFromBodyWhenCookiesUsed = $value['remove_token_from_body_when_cookies_used'];
            unset($value['remove_token_from_body_when_cookies_used']);
        }

        if (array_key_exists('set_cookies', $value)) {
            $this->_usedProperties['setCookies'] = true;
            $this->setCookies = array_map(function ($v) { return new \Symfony\Config\LexikJwtAuthentication\SetCookiesConfig($v); }, $value['set_cookies']);
            unset($value['set_cookies']);
        }

        if ([] !== $value) {
            throw new InvalidConfigurationException(sprintf('The following keys are not supported by "%s": ', __CLASS__).implode(', ', array_keys($value)));
        }
    }

    public function toArray(): array
    {
        $output = [];
        if (isset($this->_usedProperties['privateKeyPath'])) {
            $output['private_key_path'] = $this->privateKeyPath;
        }
        if (isset($this->_usedProperties['publicKeyPath'])) {
            $output['public_key_path'] = $this->publicKeyPath;
        }
        if (isset($this->_usedProperties['publicKey'])) {
            $output['public_key'] = $this->publicKey;
        }
        if (isset($this->_usedProperties['additionalPublicKeys'])) {
            $output['additional_public_keys'] = $this->additionalPublicKeys;
        }
        if (isset($this->_usedProperties['secretKey'])) {
            $output['secret_key'] = $this->secretKey;
        }
        if (isset($this->_usedProperties['passPhrase'])) {
            $output['pass_phrase'] = $this->passPhrase;
        }
        if (isset($this->_usedProperties['tokenTtl'])) {
            $output['token_ttl'] = $this->tokenTtl;
        }
        if (isset($this->_usedProperties['allowNoExpiration'])) {
            $output['allow_no_expiration'] = $this->allowNoExpiration;
        }
        if (isset($this->_usedProperties['clockSkew'])) {
            $output['clock_skew'] = $this->clockSkew;
        }
        if (isset($this->_usedProperties['encoder'])) {
            $output['encoder'] = $this->encoder->toArray();
        }
        if (isset($this->_usedProperties['userIdentityField'])) {
            $output['user_identity_field'] = $this->userIdentityField;
        }
        if (isset($this->_usedProperties['userIdClaim'])) {
            $output['user_id_claim'] = $this->userIdClaim;
        }
        if (isset($this->_usedProperties['tokenExtractors'])) {
            $output['token_extractors'] = $this->tokenExtractors->toArray();
        }
        if (isset($this->_usedProperties['removeTokenFromBodyWhenCookiesUsed'])) {
            $output['remove_token_from_body_when_cookies_used'] = $this->removeTokenFromBodyWhenCookiesUsed;
        }
        if (isset($this->_usedProperties['setCookies'])) {
            $output['set_cookies'] = array_map(function ($v) { return $v->toArray(); }, $this->setCookies);
        }

        return $output;
    }

}
