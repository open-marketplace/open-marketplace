<?php

namespace Symfony\Config\Swiftmailer\MailerConfig;

use Symfony\Component\Config\Loader\ParamConfigurator;
use Symfony\Component\Config\Definition\Exception\InvalidConfigurationException;

/**
 * This class is automatically generated to help in creating a config.
 */
class AntifloodConfig 
{
    private $threshold;
    private $sleep;
    private $_usedProperties = [];

    /**
     * @default 99
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function threshold($value): self
    {
        $this->_usedProperties['threshold'] = true;
        $this->threshold = $value;

        return $this;
    }

    /**
     * @default 0
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function sleep($value): self
    {
        $this->_usedProperties['sleep'] = true;
        $this->sleep = $value;

        return $this;
    }

    public function __construct(array $value = [])
    {
        if (array_key_exists('threshold', $value)) {
            $this->_usedProperties['threshold'] = true;
            $this->threshold = $value['threshold'];
            unset($value['threshold']);
        }

        if (array_key_exists('sleep', $value)) {
            $this->_usedProperties['sleep'] = true;
            $this->sleep = $value['sleep'];
            unset($value['sleep']);
        }

        if ([] !== $value) {
            throw new InvalidConfigurationException(sprintf('The following keys are not supported by "%s": ', __CLASS__).implode(', ', array_keys($value)));
        }
    }

    public function toArray(): array
    {
        $output = [];
        if (isset($this->_usedProperties['threshold'])) {
            $output['threshold'] = $this->threshold;
        }
        if (isset($this->_usedProperties['sleep'])) {
            $output['sleep'] = $this->sleep;
        }

        return $output;
    }

}
