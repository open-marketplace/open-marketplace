<?php

namespace Symfony\Config\SyliusAdmin;

use Symfony\Component\Config\Loader\ParamConfigurator;
use Symfony\Component\Config\Definition\Exception\InvalidConfigurationException;

/**
 * This class is automatically generated to help in creating a config.
 */
class NotificationsConfig 
{
    private $enabled;
    private $frequency;
    private $_usedProperties = [];

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

    /**
     * @default 60
     * @param ParamConfigurator|int $value
     * @return $this
     */
    public function frequency($value): self
    {
        $this->_usedProperties['frequency'] = true;
        $this->frequency = $value;

        return $this;
    }

    public function __construct(array $value = [])
    {
        if (array_key_exists('enabled', $value)) {
            $this->_usedProperties['enabled'] = true;
            $this->enabled = $value['enabled'];
            unset($value['enabled']);
        }

        if (array_key_exists('frequency', $value)) {
            $this->_usedProperties['frequency'] = true;
            $this->frequency = $value['frequency'];
            unset($value['frequency']);
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
        if (isset($this->_usedProperties['frequency'])) {
            $output['frequency'] = $this->frequency;
        }

        return $output;
    }

}
