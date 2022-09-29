<?php

namespace Symfony\Config\SyliusMailer;

require_once __DIR__.\DIRECTORY_SEPARATOR.'EmailsConfig'.\DIRECTORY_SEPARATOR.'SenderConfig.php';

use Symfony\Component\Config\Loader\ParamConfigurator;
use Symfony\Component\Config\Definition\Exception\InvalidConfigurationException;

/**
 * This class is automatically generated to help in creating a config.
 */
class EmailsConfig 
{
    private $subject;
    private $template;
    private $enabled;
    private $sender;
    private $_usedProperties = [];

    /**
     * @default null
     * @param ParamConfigurator|mixed $value
     * @deprecated The "subject" option is deprecated since SyliusMailerBundle 1.5
     * @return $this
     */
    public function subject($value): self
    {
        $this->_usedProperties['subject'] = true;
        $this->subject = $value;

        return $this;
    }

    /**
     * @default null
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function template($value): self
    {
        $this->_usedProperties['template'] = true;
        $this->template = $value;

        return $this;
    }

    /**
     * @default true
     * @param ParamConfigurator|bool $value
     * @return $this
     */
    public function enabled($value): self
    {
        $this->_usedProperties['enabled'] = true;
        $this->enabled = $value;

        return $this;
    }

    public function sender(array $value = []): \Symfony\Config\SyliusMailer\EmailsConfig\SenderConfig
    {
        if (null === $this->sender) {
            $this->_usedProperties['sender'] = true;
            $this->sender = new \Symfony\Config\SyliusMailer\EmailsConfig\SenderConfig($value);
        } elseif (0 < \func_num_args()) {
            throw new InvalidConfigurationException('The node created by "sender()" has already been initialized. You cannot pass values the second time you call sender().');
        }

        return $this->sender;
    }

    public function __construct(array $value = [])
    {
        if (array_key_exists('subject', $value)) {
            $this->_usedProperties['subject'] = true;
            $this->subject = $value['subject'];
            unset($value['subject']);
        }

        if (array_key_exists('template', $value)) {
            $this->_usedProperties['template'] = true;
            $this->template = $value['template'];
            unset($value['template']);
        }

        if (array_key_exists('enabled', $value)) {
            $this->_usedProperties['enabled'] = true;
            $this->enabled = $value['enabled'];
            unset($value['enabled']);
        }

        if (array_key_exists('sender', $value)) {
            $this->_usedProperties['sender'] = true;
            $this->sender = new \Symfony\Config\SyliusMailer\EmailsConfig\SenderConfig($value['sender']);
            unset($value['sender']);
        }

        if ([] !== $value) {
            throw new InvalidConfigurationException(sprintf('The following keys are not supported by "%s": ', __CLASS__).implode(', ', array_keys($value)));
        }
    }

    public function toArray(): array
    {
        $output = [];
        if (isset($this->_usedProperties['subject'])) {
            $output['subject'] = $this->subject;
        }
        if (isset($this->_usedProperties['template'])) {
            $output['template'] = $this->template;
        }
        if (isset($this->_usedProperties['enabled'])) {
            $output['enabled'] = $this->enabled;
        }
        if (isset($this->_usedProperties['sender'])) {
            $output['sender'] = $this->sender->toArray();
        }

        return $output;
    }

}
