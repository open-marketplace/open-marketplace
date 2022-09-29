<?php

namespace Symfony\Config;

require_once __DIR__.\DIRECTORY_SEPARATOR.'KnpMenu'.\DIRECTORY_SEPARATOR.'ProvidersConfig.php';
require_once __DIR__.\DIRECTORY_SEPARATOR.'KnpMenu'.\DIRECTORY_SEPARATOR.'TwigConfig.php';

use Symfony\Component\Config\Definition\Exception\InvalidConfigurationException;
use Symfony\Component\Config\Loader\ParamConfigurator;

/**
 * This class is automatically generated to help in creating a config.
 */
class KnpMenuConfig implements \Symfony\Component\Config\Builder\ConfigBuilderInterface
{
    private $providers;
    private $twig;
    private $templating;
    private $defaultRenderer;
    private $_usedProperties = [];

    public function providers(array $value = []): \Symfony\Config\KnpMenu\ProvidersConfig
    {
        if (null === $this->providers) {
            $this->_usedProperties['providers'] = true;
            $this->providers = new \Symfony\Config\KnpMenu\ProvidersConfig($value);
        } elseif (0 < \func_num_args()) {
            throw new InvalidConfigurationException('The node created by "providers()" has already been initialized. You cannot pass values the second time you call providers().');
        }

        return $this->providers;
    }

    public function twig(array $value = []): \Symfony\Config\KnpMenu\TwigConfig
    {
        if (null === $this->twig) {
            $this->_usedProperties['twig'] = true;
            $this->twig = new \Symfony\Config\KnpMenu\TwigConfig($value);
        } elseif (0 < \func_num_args()) {
            throw new InvalidConfigurationException('The node created by "twig()" has already been initialized. You cannot pass values the second time you call twig().');
        }

        return $this->twig;
    }

    /**
     * @default false
     * @param ParamConfigurator|bool $value
     * @return $this
     */
    public function templating($value): self
    {
        $this->_usedProperties['templating'] = true;
        $this->templating = $value;

        return $this;
    }

    /**
     * @default 'twig'
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function defaultRenderer($value): self
    {
        $this->_usedProperties['defaultRenderer'] = true;
        $this->defaultRenderer = $value;

        return $this;
    }

    public function getExtensionAlias(): string
    {
        return 'knp_menu';
    }

    public function __construct(array $value = [])
    {
        if (array_key_exists('providers', $value)) {
            $this->_usedProperties['providers'] = true;
            $this->providers = new \Symfony\Config\KnpMenu\ProvidersConfig($value['providers']);
            unset($value['providers']);
        }

        if (array_key_exists('twig', $value)) {
            $this->_usedProperties['twig'] = true;
            $this->twig = new \Symfony\Config\KnpMenu\TwigConfig($value['twig']);
            unset($value['twig']);
        }

        if (array_key_exists('templating', $value)) {
            $this->_usedProperties['templating'] = true;
            $this->templating = $value['templating'];
            unset($value['templating']);
        }

        if (array_key_exists('default_renderer', $value)) {
            $this->_usedProperties['defaultRenderer'] = true;
            $this->defaultRenderer = $value['default_renderer'];
            unset($value['default_renderer']);
        }

        if ([] !== $value) {
            throw new InvalidConfigurationException(sprintf('The following keys are not supported by "%s": ', __CLASS__).implode(', ', array_keys($value)));
        }
    }

    public function toArray(): array
    {
        $output = [];
        if (isset($this->_usedProperties['providers'])) {
            $output['providers'] = $this->providers->toArray();
        }
        if (isset($this->_usedProperties['twig'])) {
            $output['twig'] = $this->twig->toArray();
        }
        if (isset($this->_usedProperties['templating'])) {
            $output['templating'] = $this->templating;
        }
        if (isset($this->_usedProperties['defaultRenderer'])) {
            $output['default_renderer'] = $this->defaultRenderer;
        }

        return $output;
    }

}
