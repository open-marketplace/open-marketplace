<?php

namespace Symfony\Config;

require_once __DIR__.\DIRECTORY_SEPARATOR.'SyliusTheme'.\DIRECTORY_SEPARATOR.'SourcesConfig.php';
require_once __DIR__.\DIRECTORY_SEPARATOR.'SyliusTheme'.\DIRECTORY_SEPARATOR.'AssetsConfig.php';
require_once __DIR__.\DIRECTORY_SEPARATOR.'SyliusTheme'.\DIRECTORY_SEPARATOR.'TemplatingConfig.php';
require_once __DIR__.\DIRECTORY_SEPARATOR.'SyliusTheme'.\DIRECTORY_SEPARATOR.'TranslationsConfig.php';

use Symfony\Component\Config\Definition\Exception\InvalidConfigurationException;
use Symfony\Component\Config\Loader\ParamConfigurator;

/**
 * This class is automatically generated to help in creating a config.
 */
class SyliusThemeConfig implements \Symfony\Component\Config\Builder\ConfigBuilderInterface
{
    private $sources;
    private $assets;
    private $templating;
    private $translations;
    private $context;
    private $legacyMode;
    private $_usedProperties = [];

    public function sources(array $value = []): \Symfony\Config\SyliusTheme\SourcesConfig
    {
        if (null === $this->sources) {
            $this->_usedProperties['sources'] = true;
            $this->sources = new \Symfony\Config\SyliusTheme\SourcesConfig($value);
        } elseif (0 < \func_num_args()) {
            throw new InvalidConfigurationException('The node created by "sources()" has already been initialized. You cannot pass values the second time you call sources().');
        }

        return $this->sources;
    }

    public function assets(array $value = []): \Symfony\Config\SyliusTheme\AssetsConfig
    {
        if (null === $this->assets) {
            $this->_usedProperties['assets'] = true;
            $this->assets = new \Symfony\Config\SyliusTheme\AssetsConfig($value);
        } elseif (0 < \func_num_args()) {
            throw new InvalidConfigurationException('The node created by "assets()" has already been initialized. You cannot pass values the second time you call assets().');
        }

        return $this->assets;
    }

    public function templating(array $value = []): \Symfony\Config\SyliusTheme\TemplatingConfig
    {
        if (null === $this->templating) {
            $this->_usedProperties['templating'] = true;
            $this->templating = new \Symfony\Config\SyliusTheme\TemplatingConfig($value);
        } elseif (0 < \func_num_args()) {
            throw new InvalidConfigurationException('The node created by "templating()" has already been initialized. You cannot pass values the second time you call templating().');
        }

        return $this->templating;
    }

    public function translations(array $value = []): \Symfony\Config\SyliusTheme\TranslationsConfig
    {
        if (null === $this->translations) {
            $this->_usedProperties['translations'] = true;
            $this->translations = new \Symfony\Config\SyliusTheme\TranslationsConfig($value);
        } elseif (0 < \func_num_args()) {
            throw new InvalidConfigurationException('The node created by "translations()" has already been initialized. You cannot pass values the second time you call translations().');
        }

        return $this->translations;
    }

    /**
     * @default 'sylius.theme.context.settable'
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function context($value): self
    {
        $this->_usedProperties['context'] = true;
        $this->context = $value;

        return $this;
    }

    /**
     * @default false
     * @param ParamConfigurator|bool $value
     * @deprecated "legacy_mode" at path "sylius_theme" is deprecated since Sylius/ThemeBundle 2.0 and will be removed in 3.0.
     * @return $this
     */
    public function legacyMode($value): self
    {
        $this->_usedProperties['legacyMode'] = true;
        $this->legacyMode = $value;

        return $this;
    }

    public function getExtensionAlias(): string
    {
        return 'sylius_theme';
    }

    public function __construct(array $value = [])
    {
        if (array_key_exists('sources', $value)) {
            $this->_usedProperties['sources'] = true;
            $this->sources = new \Symfony\Config\SyliusTheme\SourcesConfig($value['sources']);
            unset($value['sources']);
        }

        if (array_key_exists('assets', $value)) {
            $this->_usedProperties['assets'] = true;
            $this->assets = new \Symfony\Config\SyliusTheme\AssetsConfig($value['assets']);
            unset($value['assets']);
        }

        if (array_key_exists('templating', $value)) {
            $this->_usedProperties['templating'] = true;
            $this->templating = new \Symfony\Config\SyliusTheme\TemplatingConfig($value['templating']);
            unset($value['templating']);
        }

        if (array_key_exists('translations', $value)) {
            $this->_usedProperties['translations'] = true;
            $this->translations = new \Symfony\Config\SyliusTheme\TranslationsConfig($value['translations']);
            unset($value['translations']);
        }

        if (array_key_exists('context', $value)) {
            $this->_usedProperties['context'] = true;
            $this->context = $value['context'];
            unset($value['context']);
        }

        if (array_key_exists('legacy_mode', $value)) {
            $this->_usedProperties['legacyMode'] = true;
            $this->legacyMode = $value['legacy_mode'];
            unset($value['legacy_mode']);
        }

        if ([] !== $value) {
            throw new InvalidConfigurationException(sprintf('The following keys are not supported by "%s": ', __CLASS__).implode(', ', array_keys($value)));
        }
    }

    public function toArray(): array
    {
        $output = [];
        if (isset($this->_usedProperties['sources'])) {
            $output['sources'] = $this->sources->toArray();
        }
        if (isset($this->_usedProperties['assets'])) {
            $output['assets'] = $this->assets->toArray();
        }
        if (isset($this->_usedProperties['templating'])) {
            $output['templating'] = $this->templating->toArray();
        }
        if (isset($this->_usedProperties['translations'])) {
            $output['translations'] = $this->translations->toArray();
        }
        if (isset($this->_usedProperties['context'])) {
            $output['context'] = $this->context;
        }
        if (isset($this->_usedProperties['legacyMode'])) {
            $output['legacy_mode'] = $this->legacyMode;
        }

        return $output;
    }

}
