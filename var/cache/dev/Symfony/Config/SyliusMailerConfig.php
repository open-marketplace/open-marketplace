<?php

namespace Symfony\Config;

require_once __DIR__.\DIRECTORY_SEPARATOR.'SyliusMailer'.\DIRECTORY_SEPARATOR.'SenderConfig.php';
require_once __DIR__.\DIRECTORY_SEPARATOR.'SyliusMailer'.\DIRECTORY_SEPARATOR.'EmailsConfig.php';

use Symfony\Component\Config\Loader\ParamConfigurator;
use Symfony\Component\Config\Definition\Exception\InvalidConfigurationException;

/**
 * This class is automatically generated to help in creating a config.
 */
class SyliusMailerConfig implements \Symfony\Component\Config\Builder\ConfigBuilderInterface
{
    private $senderAdapter;
    private $rendererAdapter;
    private $sender;
    private $emails;
    private $templates;
    private $_usedProperties = [];

    /**
     * @default null
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function senderAdapter($value): self
    {
        $this->_usedProperties['senderAdapter'] = true;
        $this->senderAdapter = $value;

        return $this;
    }

    /**
     * @default null
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function rendererAdapter($value): self
    {
        $this->_usedProperties['rendererAdapter'] = true;
        $this->rendererAdapter = $value;

        return $this;
    }

    public function sender(array $value = []): \Symfony\Config\SyliusMailer\SenderConfig
    {
        if (null === $this->sender) {
            $this->_usedProperties['sender'] = true;
            $this->sender = new \Symfony\Config\SyliusMailer\SenderConfig($value);
        } elseif (0 < \func_num_args()) {
            throw new InvalidConfigurationException('The node created by "sender()" has already been initialized. You cannot pass values the second time you call sender().');
        }

        return $this->sender;
    }

    public function emails(string $code, array $value = []): \Symfony\Config\SyliusMailer\EmailsConfig
    {
        if (!isset($this->emails[$code])) {
            $this->_usedProperties['emails'] = true;
            $this->emails[$code] = new \Symfony\Config\SyliusMailer\EmailsConfig($value);
        } elseif (1 < \func_num_args()) {
            throw new InvalidConfigurationException('The node created by "emails()" has already been initialized. You cannot pass values the second time you call emails().');
        }

        return $this->emails[$code];
    }

    /**
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function templates(string $name, $value): self
    {
        $this->_usedProperties['templates'] = true;
        $this->templates[$name] = $value;

        return $this;
    }

    public function getExtensionAlias(): string
    {
        return 'sylius_mailer';
    }

    public function __construct(array $value = [])
    {
        if (array_key_exists('sender_adapter', $value)) {
            $this->_usedProperties['senderAdapter'] = true;
            $this->senderAdapter = $value['sender_adapter'];
            unset($value['sender_adapter']);
        }

        if (array_key_exists('renderer_adapter', $value)) {
            $this->_usedProperties['rendererAdapter'] = true;
            $this->rendererAdapter = $value['renderer_adapter'];
            unset($value['renderer_adapter']);
        }

        if (array_key_exists('sender', $value)) {
            $this->_usedProperties['sender'] = true;
            $this->sender = new \Symfony\Config\SyliusMailer\SenderConfig($value['sender']);
            unset($value['sender']);
        }

        if (array_key_exists('emails', $value)) {
            $this->_usedProperties['emails'] = true;
            $this->emails = array_map(function ($v) { return new \Symfony\Config\SyliusMailer\EmailsConfig($v); }, $value['emails']);
            unset($value['emails']);
        }

        if (array_key_exists('templates', $value)) {
            $this->_usedProperties['templates'] = true;
            $this->templates = $value['templates'];
            unset($value['templates']);
        }

        if ([] !== $value) {
            throw new InvalidConfigurationException(sprintf('The following keys are not supported by "%s": ', __CLASS__).implode(', ', array_keys($value)));
        }
    }

    public function toArray(): array
    {
        $output = [];
        if (isset($this->_usedProperties['senderAdapter'])) {
            $output['sender_adapter'] = $this->senderAdapter;
        }
        if (isset($this->_usedProperties['rendererAdapter'])) {
            $output['renderer_adapter'] = $this->rendererAdapter;
        }
        if (isset($this->_usedProperties['sender'])) {
            $output['sender'] = $this->sender->toArray();
        }
        if (isset($this->_usedProperties['emails'])) {
            $output['emails'] = array_map(function ($v) { return $v->toArray(); }, $this->emails);
        }
        if (isset($this->_usedProperties['templates'])) {
            $output['templates'] = $this->templates;
        }

        return $output;
    }

}
