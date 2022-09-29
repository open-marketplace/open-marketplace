<?php

namespace Symfony\Config\ApiPlatform;

use Symfony\Component\Config\Loader\ParamConfigurator;
use Symfony\Component\Config\Definition\Exception\InvalidConfigurationException;

/**
 * This class is automatically generated to help in creating a config.
 */
class EagerLoadingConfig 
{
    private $enabled;
    private $fetchPartial;
    private $maxJoins;
    private $forceEager;
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
     * Fetch only partial data according to serialization groups. If enabled, Doctrine ORM entities will not work as expected if any of the other fields are used.
     * @default false
     * @param ParamConfigurator|bool $value
     * @return $this
     */
    public function fetchPartial($value): self
    {
        $this->_usedProperties['fetchPartial'] = true;
        $this->fetchPartial = $value;

        return $this;
    }

    /**
     * Max number of joined relations before EagerLoading throws a RuntimeException
     * @default 30
     * @param ParamConfigurator|int $value
     * @return $this
     */
    public function maxJoins($value): self
    {
        $this->_usedProperties['maxJoins'] = true;
        $this->maxJoins = $value;

        return $this;
    }

    /**
     * Force join on every relation. If disabled, it will only join relations having the EAGER fetch mode.
     * @default true
     * @param ParamConfigurator|bool $value
     * @return $this
     */
    public function forceEager($value): self
    {
        $this->_usedProperties['forceEager'] = true;
        $this->forceEager = $value;

        return $this;
    }

    public function __construct(array $value = [])
    {
        if (array_key_exists('enabled', $value)) {
            $this->_usedProperties['enabled'] = true;
            $this->enabled = $value['enabled'];
            unset($value['enabled']);
        }

        if (array_key_exists('fetch_partial', $value)) {
            $this->_usedProperties['fetchPartial'] = true;
            $this->fetchPartial = $value['fetch_partial'];
            unset($value['fetch_partial']);
        }

        if (array_key_exists('max_joins', $value)) {
            $this->_usedProperties['maxJoins'] = true;
            $this->maxJoins = $value['max_joins'];
            unset($value['max_joins']);
        }

        if (array_key_exists('force_eager', $value)) {
            $this->_usedProperties['forceEager'] = true;
            $this->forceEager = $value['force_eager'];
            unset($value['force_eager']);
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
        if (isset($this->_usedProperties['fetchPartial'])) {
            $output['fetch_partial'] = $this->fetchPartial;
        }
        if (isset($this->_usedProperties['maxJoins'])) {
            $output['max_joins'] = $this->maxJoins;
        }
        if (isset($this->_usedProperties['forceEager'])) {
            $output['force_eager'] = $this->forceEager;
        }

        return $output;
    }

}
