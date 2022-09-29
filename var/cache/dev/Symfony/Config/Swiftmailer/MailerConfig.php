<?php

namespace Symfony\Config\Swiftmailer;

require_once __DIR__.\DIRECTORY_SEPARATOR.'MailerConfig'.\DIRECTORY_SEPARATOR.'StreamOptionsConfig.php';
require_once __DIR__.\DIRECTORY_SEPARATOR.'MailerConfig'.\DIRECTORY_SEPARATOR.'AntifloodConfig.php';
require_once __DIR__.\DIRECTORY_SEPARATOR.'MailerConfig'.\DIRECTORY_SEPARATOR.'SpoolConfig.php';

use Symfony\Component\Config\Loader\ParamConfigurator;
use Symfony\Component\Config\Definition\Exception\InvalidConfigurationException;

/**
 * This class is automatically generated to help in creating a config.
 */
class MailerConfig 
{
    private $url;
    private $transport;
    private $command;
    private $username;
    private $password;
    private $host;
    private $port;
    private $timeout;
    private $sourceIp;
    private $localDomain;
    private $streamOptions;
    private $encryption;
    private $authMode;
    private $senderAddress;
    private $deliveryAddresses;
    private $antiflood;
    private $logging;
    private $spool;
    private $deliveryWhitelist;
    private $disableDelivery;
    private $_usedProperties = [];

    /**
     * @default null
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function url($value): self
    {
        $this->_usedProperties['url'] = true;
        $this->url = $value;

        return $this;
    }

    /**
     * @default 'smtp'
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function transport($value): self
    {
        $this->_usedProperties['transport'] = true;
        $this->transport = $value;

        return $this;
    }

    /**
     * @default '/usr/sbin/sendmail -t -i'
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function command($value): self
    {
        $this->_usedProperties['command'] = true;
        $this->command = $value;

        return $this;
    }

    /**
     * @default null
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function username($value): self
    {
        $this->_usedProperties['username'] = true;
        $this->username = $value;

        return $this;
    }

    /**
     * @default null
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function password($value): self
    {
        $this->_usedProperties['password'] = true;
        $this->password = $value;

        return $this;
    }

    /**
     * @default 'localhost'
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function host($value): self
    {
        $this->_usedProperties['host'] = true;
        $this->host = $value;

        return $this;
    }

    /**
     * @default null
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function port($value): self
    {
        $this->_usedProperties['port'] = true;
        $this->port = $value;

        return $this;
    }

    /**
     * @default 30
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function timeout($value): self
    {
        $this->_usedProperties['timeout'] = true;
        $this->timeout = $value;

        return $this;
    }

    /**
     * @default null
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function sourceIp($value): self
    {
        $this->_usedProperties['sourceIp'] = true;
        $this->sourceIp = $value;

        return $this;
    }

    /**
     * @default null
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function localDomain($value): self
    {
        $this->_usedProperties['localDomain'] = true;
        $this->localDomain = $value;

        return $this;
    }

    /**
     * @return \Symfony\Config\Swiftmailer\MailerConfig\StreamOptionsConfig|$this
     */
    public function streamOptions($value = [])
    {
        if (!\is_array($value)) {
            $this->_usedProperties['streamOptions'] = true;
            $this->streamOptions = $value;

            return $this;
        }

        if (!$this->streamOptions instanceof \Symfony\Config\Swiftmailer\MailerConfig\StreamOptionsConfig) {
            $this->_usedProperties['streamOptions'] = true;
            $this->streamOptions = new \Symfony\Config\Swiftmailer\MailerConfig\StreamOptionsConfig($value);
        } elseif (0 < \func_num_args()) {
            throw new InvalidConfigurationException('The node created by "streamOptions()" has already been initialized. You cannot pass values the second time you call streamOptions().');
        }

        return $this->streamOptions;
    }

    /**
     * @default null
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function encryption($value): self
    {
        $this->_usedProperties['encryption'] = true;
        $this->encryption = $value;

        return $this;
    }

    /**
     * @default null
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function authMode($value): self
    {
        $this->_usedProperties['authMode'] = true;
        $this->authMode = $value;

        return $this;
    }

    /**
     * @default null
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function senderAddress($value): self
    {
        $this->_usedProperties['senderAddress'] = true;
        $this->senderAddress = $value;

        return $this;
    }

    /**
     * @param ParamConfigurator|list<mixed|ParamConfigurator> $value
     * @return $this
     */
    public function deliveryAddresses($value): self
    {
        $this->_usedProperties['deliveryAddresses'] = true;
        $this->deliveryAddresses = $value;

        return $this;
    }

    public function antiflood(array $value = []): \Symfony\Config\Swiftmailer\MailerConfig\AntifloodConfig
    {
        if (null === $this->antiflood) {
            $this->_usedProperties['antiflood'] = true;
            $this->antiflood = new \Symfony\Config\Swiftmailer\MailerConfig\AntifloodConfig($value);
        } elseif (0 < \func_num_args()) {
            throw new InvalidConfigurationException('The node created by "antiflood()" has already been initialized. You cannot pass values the second time you call antiflood().');
        }

        return $this->antiflood;
    }

    /**
     * @default true
     * @param ParamConfigurator|bool $value
     * @return $this
     */
    public function logging($value): self
    {
        $this->_usedProperties['logging'] = true;
        $this->logging = $value;

        return $this;
    }

    public function spool(array $value = []): \Symfony\Config\Swiftmailer\MailerConfig\SpoolConfig
    {
        if (null === $this->spool) {
            $this->_usedProperties['spool'] = true;
            $this->spool = new \Symfony\Config\Swiftmailer\MailerConfig\SpoolConfig($value);
        } elseif (0 < \func_num_args()) {
            throw new InvalidConfigurationException('The node created by "spool()" has already been initialized. You cannot pass values the second time you call spool().');
        }

        return $this->spool;
    }

    /**
     * @param ParamConfigurator|list<mixed|ParamConfigurator> $value
     * @return $this
     */
    public function deliveryWhitelist($value): self
    {
        $this->_usedProperties['deliveryWhitelist'] = true;
        $this->deliveryWhitelist = $value;

        return $this;
    }

    /**
     * @default null
     * @param ParamConfigurator|bool $value
     * @return $this
     */
    public function disableDelivery($value): self
    {
        $this->_usedProperties['disableDelivery'] = true;
        $this->disableDelivery = $value;

        return $this;
    }

    public function __construct(array $value = [])
    {
        if (array_key_exists('url', $value)) {
            $this->_usedProperties['url'] = true;
            $this->url = $value['url'];
            unset($value['url']);
        }

        if (array_key_exists('transport', $value)) {
            $this->_usedProperties['transport'] = true;
            $this->transport = $value['transport'];
            unset($value['transport']);
        }

        if (array_key_exists('command', $value)) {
            $this->_usedProperties['command'] = true;
            $this->command = $value['command'];
            unset($value['command']);
        }

        if (array_key_exists('username', $value)) {
            $this->_usedProperties['username'] = true;
            $this->username = $value['username'];
            unset($value['username']);
        }

        if (array_key_exists('password', $value)) {
            $this->_usedProperties['password'] = true;
            $this->password = $value['password'];
            unset($value['password']);
        }

        if (array_key_exists('host', $value)) {
            $this->_usedProperties['host'] = true;
            $this->host = $value['host'];
            unset($value['host']);
        }

        if (array_key_exists('port', $value)) {
            $this->_usedProperties['port'] = true;
            $this->port = $value['port'];
            unset($value['port']);
        }

        if (array_key_exists('timeout', $value)) {
            $this->_usedProperties['timeout'] = true;
            $this->timeout = $value['timeout'];
            unset($value['timeout']);
        }

        if (array_key_exists('source_ip', $value)) {
            $this->_usedProperties['sourceIp'] = true;
            $this->sourceIp = $value['source_ip'];
            unset($value['source_ip']);
        }

        if (array_key_exists('local_domain', $value)) {
            $this->_usedProperties['localDomain'] = true;
            $this->localDomain = $value['local_domain'];
            unset($value['local_domain']);
        }

        if (array_key_exists('stream_options', $value)) {
            $this->_usedProperties['streamOptions'] = true;
            $this->streamOptions = \is_array($value['stream_options']) ? new \Symfony\Config\Swiftmailer\MailerConfig\StreamOptionsConfig($value['stream_options']) : $value['stream_options'];
            unset($value['stream_options']);
        }

        if (array_key_exists('encryption', $value)) {
            $this->_usedProperties['encryption'] = true;
            $this->encryption = $value['encryption'];
            unset($value['encryption']);
        }

        if (array_key_exists('auth_mode', $value)) {
            $this->_usedProperties['authMode'] = true;
            $this->authMode = $value['auth_mode'];
            unset($value['auth_mode']);
        }

        if (array_key_exists('sender_address', $value)) {
            $this->_usedProperties['senderAddress'] = true;
            $this->senderAddress = $value['sender_address'];
            unset($value['sender_address']);
        }

        if (array_key_exists('delivery_addresses', $value)) {
            $this->_usedProperties['deliveryAddresses'] = true;
            $this->deliveryAddresses = $value['delivery_addresses'];
            unset($value['delivery_addresses']);
        }

        if (array_key_exists('antiflood', $value)) {
            $this->_usedProperties['antiflood'] = true;
            $this->antiflood = new \Symfony\Config\Swiftmailer\MailerConfig\AntifloodConfig($value['antiflood']);
            unset($value['antiflood']);
        }

        if (array_key_exists('logging', $value)) {
            $this->_usedProperties['logging'] = true;
            $this->logging = $value['logging'];
            unset($value['logging']);
        }

        if (array_key_exists('spool', $value)) {
            $this->_usedProperties['spool'] = true;
            $this->spool = new \Symfony\Config\Swiftmailer\MailerConfig\SpoolConfig($value['spool']);
            unset($value['spool']);
        }

        if (array_key_exists('delivery_whitelist', $value)) {
            $this->_usedProperties['deliveryWhitelist'] = true;
            $this->deliveryWhitelist = $value['delivery_whitelist'];
            unset($value['delivery_whitelist']);
        }

        if (array_key_exists('disable_delivery', $value)) {
            $this->_usedProperties['disableDelivery'] = true;
            $this->disableDelivery = $value['disable_delivery'];
            unset($value['disable_delivery']);
        }

        if ([] !== $value) {
            throw new InvalidConfigurationException(sprintf('The following keys are not supported by "%s": ', __CLASS__).implode(', ', array_keys($value)));
        }
    }

    public function toArray(): array
    {
        $output = [];
        if (isset($this->_usedProperties['url'])) {
            $output['url'] = $this->url;
        }
        if (isset($this->_usedProperties['transport'])) {
            $output['transport'] = $this->transport;
        }
        if (isset($this->_usedProperties['command'])) {
            $output['command'] = $this->command;
        }
        if (isset($this->_usedProperties['username'])) {
            $output['username'] = $this->username;
        }
        if (isset($this->_usedProperties['password'])) {
            $output['password'] = $this->password;
        }
        if (isset($this->_usedProperties['host'])) {
            $output['host'] = $this->host;
        }
        if (isset($this->_usedProperties['port'])) {
            $output['port'] = $this->port;
        }
        if (isset($this->_usedProperties['timeout'])) {
            $output['timeout'] = $this->timeout;
        }
        if (isset($this->_usedProperties['sourceIp'])) {
            $output['source_ip'] = $this->sourceIp;
        }
        if (isset($this->_usedProperties['localDomain'])) {
            $output['local_domain'] = $this->localDomain;
        }
        if (isset($this->_usedProperties['streamOptions'])) {
            $output['stream_options'] = $this->streamOptions instanceof \Symfony\Config\Swiftmailer\MailerConfig\StreamOptionsConfig ? $this->streamOptions->toArray() : $this->streamOptions;
        }
        if (isset($this->_usedProperties['encryption'])) {
            $output['encryption'] = $this->encryption;
        }
        if (isset($this->_usedProperties['authMode'])) {
            $output['auth_mode'] = $this->authMode;
        }
        if (isset($this->_usedProperties['senderAddress'])) {
            $output['sender_address'] = $this->senderAddress;
        }
        if (isset($this->_usedProperties['deliveryAddresses'])) {
            $output['delivery_addresses'] = $this->deliveryAddresses;
        }
        if (isset($this->_usedProperties['antiflood'])) {
            $output['antiflood'] = $this->antiflood->toArray();
        }
        if (isset($this->_usedProperties['logging'])) {
            $output['logging'] = $this->logging;
        }
        if (isset($this->_usedProperties['spool'])) {
            $output['spool'] = $this->spool->toArray();
        }
        if (isset($this->_usedProperties['deliveryWhitelist'])) {
            $output['delivery_whitelist'] = $this->deliveryWhitelist;
        }
        if (isset($this->_usedProperties['disableDelivery'])) {
            $output['disable_delivery'] = $this->disableDelivery;
        }

        return $output;
    }

}
