<?php

namespace Symfony\Config\SyliusLocale;

require_once __DIR__.\DIRECTORY_SEPARATOR.'Resources'.\DIRECTORY_SEPARATOR.'LocaleConfig.php';

use Symfony\Component\Config\Definition\Exception\InvalidConfigurationException;

/**
 * This class is automatically generated to help in creating a config.
 */
class ResourcesConfig 
{
    private $locale;
    private $_usedProperties = [];

    public function locale(array $value = []): \Symfony\Config\SyliusLocale\Resources\LocaleConfig
    {
        if (null === $this->locale) {
            $this->_usedProperties['locale'] = true;
            $this->locale = new \Symfony\Config\SyliusLocale\Resources\LocaleConfig($value);
        } elseif (0 < \func_num_args()) {
            throw new InvalidConfigurationException('The node created by "locale()" has already been initialized. You cannot pass values the second time you call locale().');
        }

        return $this->locale;
    }

    public function __construct(array $value = [])
    {
        if (array_key_exists('locale', $value)) {
            $this->_usedProperties['locale'] = true;
            $this->locale = new \Symfony\Config\SyliusLocale\Resources\LocaleConfig($value['locale']);
            unset($value['locale']);
        }

        if ([] !== $value) {
            throw new InvalidConfigurationException(sprintf('The following keys are not supported by "%s": ', __CLASS__).implode(', ', array_keys($value)));
        }
    }

    public function toArray(): array
    {
        $output = [];
        if (isset($this->_usedProperties['locale'])) {
            $output['locale'] = $this->locale->toArray();
        }

        return $output;
    }

}
