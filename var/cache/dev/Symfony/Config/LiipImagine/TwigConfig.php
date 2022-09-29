<?php

namespace Symfony\Config\LiipImagine;

use Symfony\Component\Config\Loader\ParamConfigurator;
use Symfony\Component\Config\Definition\Exception\InvalidConfigurationException;

/**
 * This class is automatically generated to help in creating a config.
 */
class TwigConfig 
{
    private $mode;
    private $assetsVersion;
    private $_usedProperties = [];

    /**
     * Twig mode: none/lazy/legacy (default)
     * @default 'legacy'
     * @param ParamConfigurator|'none'|'lazy'|'legacy' $value
     * @return $this
     */
    public function mode($value): self
    {
        $this->_usedProperties['mode'] = true;
        $this->mode = $value;

        return $this;
    }

    /**
     * @default null
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function assetsVersion($value): self
    {
        $this->_usedProperties['assetsVersion'] = true;
        $this->assetsVersion = $value;

        return $this;
    }

    public function __construct(array $value = [])
    {
        if (array_key_exists('mode', $value)) {
            $this->_usedProperties['mode'] = true;
            $this->mode = $value['mode'];
            unset($value['mode']);
        }

        if (array_key_exists('assets_version', $value)) {
            $this->_usedProperties['assetsVersion'] = true;
            $this->assetsVersion = $value['assets_version'];
            unset($value['assets_version']);
        }

        if ([] !== $value) {
            throw new InvalidConfigurationException(sprintf('The following keys are not supported by "%s": ', __CLASS__).implode(', ', array_keys($value)));
        }
    }

    public function toArray(): array
    {
        $output = [];
        if (isset($this->_usedProperties['mode'])) {
            $output['mode'] = $this->mode;
        }
        if (isset($this->_usedProperties['assetsVersion'])) {
            $output['assets_version'] = $this->assetsVersion;
        }

        return $output;
    }

}
