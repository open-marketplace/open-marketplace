<?php

namespace Symfony\Config\KnpGaufrette;

use Symfony\Component\Config\Loader\ParamConfigurator;
use Symfony\Component\Config\Definition\Exception\InvalidConfigurationException;

/**
 * This class is automatically generated to help in creating a config.
 */
class StreamWrapperConfig 
{
    private $protocol;
    private $filesystems;
    private $_usedProperties = [];

    /**
     * @default 'gaufrette'
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function protocol($value): self
    {
        $this->_usedProperties['protocol'] = true;
        $this->protocol = $value;

        return $this;
    }

    /**
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function filesystems(string $key, $value): self
    {
        $this->_usedProperties['filesystems'] = true;
        $this->filesystems[$key] = $value;

        return $this;
    }

    public function __construct(array $value = [])
    {
        if (array_key_exists('protocol', $value)) {
            $this->_usedProperties['protocol'] = true;
            $this->protocol = $value['protocol'];
            unset($value['protocol']);
        }

        if (array_key_exists('filesystems', $value)) {
            $this->_usedProperties['filesystems'] = true;
            $this->filesystems = $value['filesystems'];
            unset($value['filesystems']);
        }

        if ([] !== $value) {
            throw new InvalidConfigurationException(sprintf('The following keys are not supported by "%s": ', __CLASS__).implode(', ', array_keys($value)));
        }
    }

    public function toArray(): array
    {
        $output = [];
        if (isset($this->_usedProperties['protocol'])) {
            $output['protocol'] = $this->protocol;
        }
        if (isset($this->_usedProperties['filesystems'])) {
            $output['filesystems'] = $this->filesystems;
        }

        return $output;
    }

}
