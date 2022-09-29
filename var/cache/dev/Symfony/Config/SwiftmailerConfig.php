<?php

namespace Symfony\Config;

require_once __DIR__.\DIRECTORY_SEPARATOR.'Swiftmailer'.\DIRECTORY_SEPARATOR.'MailerConfig.php';

use Symfony\Component\Config\Loader\ParamConfigurator;
use Symfony\Component\Config\Definition\Exception\InvalidConfigurationException;

/**
 * This class is automatically generated to help in creating a config.
 */
class SwiftmailerConfig implements \Symfony\Component\Config\Builder\ConfigBuilderInterface
{
    private $defaultMailer;
    private $mailers;
    private $_usedProperties = [];

    /**
     * @default null
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function defaultMailer($value): self
    {
        $this->_usedProperties['defaultMailer'] = true;
        $this->defaultMailer = $value;

        return $this;
    }

    public function mailer(string $name, array $value = []): \Symfony\Config\Swiftmailer\MailerConfig
    {
        if (!isset($this->mailers[$name])) {
            $this->_usedProperties['mailers'] = true;
            $this->mailers[$name] = new \Symfony\Config\Swiftmailer\MailerConfig($value);
        } elseif (1 < \func_num_args()) {
            throw new InvalidConfigurationException('The node created by "mailer()" has already been initialized. You cannot pass values the second time you call mailer().');
        }

        return $this->mailers[$name];
    }

    public function getExtensionAlias(): string
    {
        return 'swiftmailer';
    }

    public function __construct(array $value = [])
    {
        if (array_key_exists('default_mailer', $value)) {
            $this->_usedProperties['defaultMailer'] = true;
            $this->defaultMailer = $value['default_mailer'];
            unset($value['default_mailer']);
        }

        if (array_key_exists('mailers', $value)) {
            $this->_usedProperties['mailers'] = true;
            $this->mailers = array_map(function ($v) { return new \Symfony\Config\Swiftmailer\MailerConfig($v); }, $value['mailers']);
            unset($value['mailers']);
        }

        if ([] !== $value) {
            throw new InvalidConfigurationException(sprintf('The following keys are not supported by "%s": ', __CLASS__).implode(', ', array_keys($value)));
        }
    }

    public function toArray(): array
    {
        $output = [];
        if (isset($this->_usedProperties['defaultMailer'])) {
            $output['default_mailer'] = $this->defaultMailer;
        }
        if (isset($this->_usedProperties['mailers'])) {
            $output['mailers'] = array_map(function ($v) { return $v->toArray(); }, $this->mailers);
        }

        return $output;
    }

}
