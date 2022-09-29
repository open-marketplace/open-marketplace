<?php

namespace Symfony\Config;

require_once __DIR__.\DIRECTORY_SEPARATOR.'Security'.\DIRECTORY_SEPARATOR.'AccessDecisionManagerConfig.php';
require_once __DIR__.\DIRECTORY_SEPARATOR.'Security'.\DIRECTORY_SEPARATOR.'EncoderConfig.php';
require_once __DIR__.\DIRECTORY_SEPARATOR.'Security'.\DIRECTORY_SEPARATOR.'PasswordHasherConfig.php';
require_once __DIR__.\DIRECTORY_SEPARATOR.'Security'.\DIRECTORY_SEPARATOR.'ProviderConfig.php';
require_once __DIR__.\DIRECTORY_SEPARATOR.'Security'.\DIRECTORY_SEPARATOR.'FirewallConfig.php';
require_once __DIR__.\DIRECTORY_SEPARATOR.'Security'.\DIRECTORY_SEPARATOR.'AccessControlConfig.php';

use Symfony\Component\Config\Loader\ParamConfigurator;
use Symfony\Component\Config\Definition\Exception\InvalidConfigurationException;

/**
 * This class is automatically generated to help in creating a config.
 */
class SecurityConfig implements \Symfony\Component\Config\Builder\ConfigBuilderInterface
{
    private $accessDeniedUrl;
    private $sessionFixationStrategy;
    private $hideUserNotFound;
    private $alwaysAuthenticateBeforeGranting;
    private $eraseCredentials;
    private $enableAuthenticatorManager;
    private $accessDecisionManager;
    private $encoders;
    private $passwordHashers;
    private $providers;
    private $firewalls;
    private $accessControl;
    private $roleHierarchy;
    private $_usedProperties = [];

    /**
     * @example /foo/error403
     * @default null
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function accessDeniedUrl($value): self
    {
        $this->_usedProperties['accessDeniedUrl'] = true;
        $this->accessDeniedUrl = $value;

        return $this;
    }

    /**
     * @default 'migrate'
     * @param ParamConfigurator|'none'|'migrate'|'invalidate' $value
     * @return $this
     */
    public function sessionFixationStrategy($value): self
    {
        $this->_usedProperties['sessionFixationStrategy'] = true;
        $this->sessionFixationStrategy = $value;

        return $this;
    }

    /**
     * @default true
     * @param ParamConfigurator|bool $value
     * @return $this
     */
    public function hideUserNotFound($value): self
    {
        $this->_usedProperties['hideUserNotFound'] = true;
        $this->hideUserNotFound = $value;

        return $this;
    }

    /**
     * @default false
     * @param ParamConfigurator|bool $value
     * @deprecated The child node "always_authenticate_before_granting" at path "security" is deprecated.
     * @return $this
     */
    public function alwaysAuthenticateBeforeGranting($value): self
    {
        $this->_usedProperties['alwaysAuthenticateBeforeGranting'] = true;
        $this->alwaysAuthenticateBeforeGranting = $value;

        return $this;
    }

    /**
     * @default true
     * @param ParamConfigurator|bool $value
     * @return $this
     */
    public function eraseCredentials($value): self
    {
        $this->_usedProperties['eraseCredentials'] = true;
        $this->eraseCredentials = $value;

        return $this;
    }

    /**
     * Enables the new Symfony Security system based on Authenticators, all used authenticators must support this before enabling this.
     * @default false
     * @param ParamConfigurator|bool $value
     * @return $this
     */
    public function enableAuthenticatorManager($value): self
    {
        $this->_usedProperties['enableAuthenticatorManager'] = true;
        $this->enableAuthenticatorManager = $value;

        return $this;
    }

    public function accessDecisionManager(array $value = []): \Symfony\Config\Security\AccessDecisionManagerConfig
    {
        if (null === $this->accessDecisionManager) {
            $this->_usedProperties['accessDecisionManager'] = true;
            $this->accessDecisionManager = new \Symfony\Config\Security\AccessDecisionManagerConfig($value);
        } elseif (0 < \func_num_args()) {
            throw new InvalidConfigurationException('The node created by "accessDecisionManager()" has already been initialized. You cannot pass values the second time you call accessDecisionManager().');
        }

        return $this->accessDecisionManager;
    }

    /**
     * @return \Symfony\Config\Security\EncoderConfig|$this
     */
    public function encoder(string $class, $value = [])
    {
        if (!\is_array($value)) {
            $this->_usedProperties['encoders'] = true;
            $this->encoders[$class] = $value;

            return $this;
        }

        if (!isset($this->encoders[$class]) || !$this->encoders[$class] instanceof \Symfony\Config\Security\EncoderConfig) {
            $this->_usedProperties['encoders'] = true;
            $this->encoders[$class] = new \Symfony\Config\Security\EncoderConfig($value);
        } elseif (1 < \func_num_args()) {
            throw new InvalidConfigurationException('The node created by "encoder()" has already been initialized. You cannot pass values the second time you call encoder().');
        }

        return $this->encoders[$class];
    }

    /**
     * @return \Symfony\Config\Security\PasswordHasherConfig|$this
     */
    public function passwordHasher(string $class, $value = [])
    {
        if (!\is_array($value)) {
            $this->_usedProperties['passwordHashers'] = true;
            $this->passwordHashers[$class] = $value;

            return $this;
        }

        if (!isset($this->passwordHashers[$class]) || !$this->passwordHashers[$class] instanceof \Symfony\Config\Security\PasswordHasherConfig) {
            $this->_usedProperties['passwordHashers'] = true;
            $this->passwordHashers[$class] = new \Symfony\Config\Security\PasswordHasherConfig($value);
        } elseif (1 < \func_num_args()) {
            throw new InvalidConfigurationException('The node created by "passwordHasher()" has already been initialized. You cannot pass values the second time you call passwordHasher().');
        }

        return $this->passwordHashers[$class];
    }

    public function provider(string $name, array $value = []): \Symfony\Config\Security\ProviderConfig
    {
        if (!isset($this->providers[$name])) {
            $this->_usedProperties['providers'] = true;
            $this->providers[$name] = new \Symfony\Config\Security\ProviderConfig($value);
        } elseif (1 < \func_num_args()) {
            throw new InvalidConfigurationException('The node created by "provider()" has already been initialized. You cannot pass values the second time you call provider().');
        }

        return $this->providers[$name];
    }

    public function firewall(string $name, array $value = []): \Symfony\Config\Security\FirewallConfig
    {
        if (!isset($this->firewalls[$name])) {
            $this->_usedProperties['firewalls'] = true;
            $this->firewalls[$name] = new \Symfony\Config\Security\FirewallConfig($value);
        } elseif (1 < \func_num_args()) {
            throw new InvalidConfigurationException('The node created by "firewall()" has already been initialized. You cannot pass values the second time you call firewall().');
        }

        return $this->firewalls[$name];
    }

    public function accessControl(array $value = []): \Symfony\Config\Security\AccessControlConfig
    {
        $this->_usedProperties['accessControl'] = true;

        return $this->accessControl[] = new \Symfony\Config\Security\AccessControlConfig($value);
    }

    /**
     * @param ParamConfigurator|array $value
     * @return $this
     */
    public function roleHierarchy(string $id, $value): self
    {
        $this->_usedProperties['roleHierarchy'] = true;
        $this->roleHierarchy[$id] = $value;

        return $this;
    }

    public function getExtensionAlias(): string
    {
        return 'security';
    }

    public function __construct(array $value = [])
    {
        if (array_key_exists('access_denied_url', $value)) {
            $this->_usedProperties['accessDeniedUrl'] = true;
            $this->accessDeniedUrl = $value['access_denied_url'];
            unset($value['access_denied_url']);
        }

        if (array_key_exists('session_fixation_strategy', $value)) {
            $this->_usedProperties['sessionFixationStrategy'] = true;
            $this->sessionFixationStrategy = $value['session_fixation_strategy'];
            unset($value['session_fixation_strategy']);
        }

        if (array_key_exists('hide_user_not_found', $value)) {
            $this->_usedProperties['hideUserNotFound'] = true;
            $this->hideUserNotFound = $value['hide_user_not_found'];
            unset($value['hide_user_not_found']);
        }

        if (array_key_exists('always_authenticate_before_granting', $value)) {
            $this->_usedProperties['alwaysAuthenticateBeforeGranting'] = true;
            $this->alwaysAuthenticateBeforeGranting = $value['always_authenticate_before_granting'];
            unset($value['always_authenticate_before_granting']);
        }

        if (array_key_exists('erase_credentials', $value)) {
            $this->_usedProperties['eraseCredentials'] = true;
            $this->eraseCredentials = $value['erase_credentials'];
            unset($value['erase_credentials']);
        }

        if (array_key_exists('enable_authenticator_manager', $value)) {
            $this->_usedProperties['enableAuthenticatorManager'] = true;
            $this->enableAuthenticatorManager = $value['enable_authenticator_manager'];
            unset($value['enable_authenticator_manager']);
        }

        if (array_key_exists('access_decision_manager', $value)) {
            $this->_usedProperties['accessDecisionManager'] = true;
            $this->accessDecisionManager = new \Symfony\Config\Security\AccessDecisionManagerConfig($value['access_decision_manager']);
            unset($value['access_decision_manager']);
        }

        if (array_key_exists('encoders', $value)) {
            $this->_usedProperties['encoders'] = true;
            $this->encoders = array_map(function ($v) { return \is_array($v) ? new \Symfony\Config\Security\EncoderConfig($v) : $v; }, $value['encoders']);
            unset($value['encoders']);
        }

        if (array_key_exists('password_hashers', $value)) {
            $this->_usedProperties['passwordHashers'] = true;
            $this->passwordHashers = array_map(function ($v) { return \is_array($v) ? new \Symfony\Config\Security\PasswordHasherConfig($v) : $v; }, $value['password_hashers']);
            unset($value['password_hashers']);
        }

        if (array_key_exists('providers', $value)) {
            $this->_usedProperties['providers'] = true;
            $this->providers = array_map(function ($v) { return new \Symfony\Config\Security\ProviderConfig($v); }, $value['providers']);
            unset($value['providers']);
        }

        if (array_key_exists('firewalls', $value)) {
            $this->_usedProperties['firewalls'] = true;
            $this->firewalls = array_map(function ($v) { return new \Symfony\Config\Security\FirewallConfig($v); }, $value['firewalls']);
            unset($value['firewalls']);
        }

        if (array_key_exists('access_control', $value)) {
            $this->_usedProperties['accessControl'] = true;
            $this->accessControl = array_map(function ($v) { return new \Symfony\Config\Security\AccessControlConfig($v); }, $value['access_control']);
            unset($value['access_control']);
        }

        if (array_key_exists('role_hierarchy', $value)) {
            $this->_usedProperties['roleHierarchy'] = true;
            $this->roleHierarchy = $value['role_hierarchy'];
            unset($value['role_hierarchy']);
        }

        if ([] !== $value) {
            throw new InvalidConfigurationException(sprintf('The following keys are not supported by "%s": ', __CLASS__).implode(', ', array_keys($value)));
        }
    }

    public function toArray(): array
    {
        $output = [];
        if (isset($this->_usedProperties['accessDeniedUrl'])) {
            $output['access_denied_url'] = $this->accessDeniedUrl;
        }
        if (isset($this->_usedProperties['sessionFixationStrategy'])) {
            $output['session_fixation_strategy'] = $this->sessionFixationStrategy;
        }
        if (isset($this->_usedProperties['hideUserNotFound'])) {
            $output['hide_user_not_found'] = $this->hideUserNotFound;
        }
        if (isset($this->_usedProperties['alwaysAuthenticateBeforeGranting'])) {
            $output['always_authenticate_before_granting'] = $this->alwaysAuthenticateBeforeGranting;
        }
        if (isset($this->_usedProperties['eraseCredentials'])) {
            $output['erase_credentials'] = $this->eraseCredentials;
        }
        if (isset($this->_usedProperties['enableAuthenticatorManager'])) {
            $output['enable_authenticator_manager'] = $this->enableAuthenticatorManager;
        }
        if (isset($this->_usedProperties['accessDecisionManager'])) {
            $output['access_decision_manager'] = $this->accessDecisionManager->toArray();
        }
        if (isset($this->_usedProperties['encoders'])) {
            $output['encoders'] = array_map(function ($v) { return $v instanceof \Symfony\Config\Security\EncoderConfig ? $v->toArray() : $v; }, $this->encoders);
        }
        if (isset($this->_usedProperties['passwordHashers'])) {
            $output['password_hashers'] = array_map(function ($v) { return $v instanceof \Symfony\Config\Security\PasswordHasherConfig ? $v->toArray() : $v; }, $this->passwordHashers);
        }
        if (isset($this->_usedProperties['providers'])) {
            $output['providers'] = array_map(function ($v) { return $v->toArray(); }, $this->providers);
        }
        if (isset($this->_usedProperties['firewalls'])) {
            $output['firewalls'] = array_map(function ($v) { return $v->toArray(); }, $this->firewalls);
        }
        if (isset($this->_usedProperties['accessControl'])) {
            $output['access_control'] = array_map(function ($v) { return $v->toArray(); }, $this->accessControl);
        }
        if (isset($this->_usedProperties['roleHierarchy'])) {
            $output['role_hierarchy'] = $this->roleHierarchy;
        }

        return $output;
    }

}
