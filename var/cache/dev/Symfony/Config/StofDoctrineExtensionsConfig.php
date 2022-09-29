<?php

namespace Symfony\Config;

require_once __DIR__.\DIRECTORY_SEPARATOR.'StofDoctrineExtensions'.\DIRECTORY_SEPARATOR.'OrmConfig.php';
require_once __DIR__.\DIRECTORY_SEPARATOR.'StofDoctrineExtensions'.\DIRECTORY_SEPARATOR.'MongodbConfig.php';
require_once __DIR__.\DIRECTORY_SEPARATOR.'StofDoctrineExtensions'.\DIRECTORY_SEPARATOR.'ClassConfig.php';
require_once __DIR__.\DIRECTORY_SEPARATOR.'StofDoctrineExtensions'.\DIRECTORY_SEPARATOR.'UploadableConfig.php';

use Symfony\Component\Config\Definition\Exception\InvalidConfigurationException;
use Symfony\Component\Config\Loader\ParamConfigurator;

/**
 * This class is automatically generated to help in creating a config.
 */
class StofDoctrineExtensionsConfig implements \Symfony\Component\Config\Builder\ConfigBuilderInterface
{
    private $orm;
    private $mongodb;
    private $class;
    private $uploadable;
    private $defaultLocale;
    private $translationFallback;
    private $persistDefaultTranslation;
    private $skipTranslationOnLoad;
    private $_usedProperties = [];

    public function orm(string $id, array $value = []): \Symfony\Config\StofDoctrineExtensions\OrmConfig
    {
        if (!isset($this->orm[$id])) {
            $this->_usedProperties['orm'] = true;
            $this->orm[$id] = new \Symfony\Config\StofDoctrineExtensions\OrmConfig($value);
        } elseif (1 < \func_num_args()) {
            throw new InvalidConfigurationException('The node created by "orm()" has already been initialized. You cannot pass values the second time you call orm().');
        }

        return $this->orm[$id];
    }

    public function mongodb(string $id, array $value = []): \Symfony\Config\StofDoctrineExtensions\MongodbConfig
    {
        if (!isset($this->mongodb[$id])) {
            $this->_usedProperties['mongodb'] = true;
            $this->mongodb[$id] = new \Symfony\Config\StofDoctrineExtensions\MongodbConfig($value);
        } elseif (1 < \func_num_args()) {
            throw new InvalidConfigurationException('The node created by "mongodb()" has already been initialized. You cannot pass values the second time you call mongodb().');
        }

        return $this->mongodb[$id];
    }

    public function class(array $value = []): \Symfony\Config\StofDoctrineExtensions\ClassConfig
    {
        if (null === $this->class) {
            $this->_usedProperties['class'] = true;
            $this->class = new \Symfony\Config\StofDoctrineExtensions\ClassConfig($value);
        } elseif (0 < \func_num_args()) {
            throw new InvalidConfigurationException('The node created by "class()" has already been initialized. You cannot pass values the second time you call class().');
        }

        return $this->class;
    }

    public function uploadable(array $value = []): \Symfony\Config\StofDoctrineExtensions\UploadableConfig
    {
        if (null === $this->uploadable) {
            $this->_usedProperties['uploadable'] = true;
            $this->uploadable = new \Symfony\Config\StofDoctrineExtensions\UploadableConfig($value);
        } elseif (0 < \func_num_args()) {
            throw new InvalidConfigurationException('The node created by "uploadable()" has already been initialized. You cannot pass values the second time you call uploadable().');
        }

        return $this->uploadable;
    }

    /**
     * @default 'en'
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function defaultLocale($value): self
    {
        $this->_usedProperties['defaultLocale'] = true;
        $this->defaultLocale = $value;

        return $this;
    }

    /**
     * @default false
     * @param ParamConfigurator|bool $value
     * @return $this
     */
    public function translationFallback($value): self
    {
        $this->_usedProperties['translationFallback'] = true;
        $this->translationFallback = $value;

        return $this;
    }

    /**
     * @default false
     * @param ParamConfigurator|bool $value
     * @return $this
     */
    public function persistDefaultTranslation($value): self
    {
        $this->_usedProperties['persistDefaultTranslation'] = true;
        $this->persistDefaultTranslation = $value;

        return $this;
    }

    /**
     * @default false
     * @param ParamConfigurator|bool $value
     * @return $this
     */
    public function skipTranslationOnLoad($value): self
    {
        $this->_usedProperties['skipTranslationOnLoad'] = true;
        $this->skipTranslationOnLoad = $value;

        return $this;
    }

    public function getExtensionAlias(): string
    {
        return 'stof_doctrine_extensions';
    }

    public function __construct(array $value = [])
    {
        if (array_key_exists('orm', $value)) {
            $this->_usedProperties['orm'] = true;
            $this->orm = array_map(function ($v) { return new \Symfony\Config\StofDoctrineExtensions\OrmConfig($v); }, $value['orm']);
            unset($value['orm']);
        }

        if (array_key_exists('mongodb', $value)) {
            $this->_usedProperties['mongodb'] = true;
            $this->mongodb = array_map(function ($v) { return new \Symfony\Config\StofDoctrineExtensions\MongodbConfig($v); }, $value['mongodb']);
            unset($value['mongodb']);
        }

        if (array_key_exists('class', $value)) {
            $this->_usedProperties['class'] = true;
            $this->class = new \Symfony\Config\StofDoctrineExtensions\ClassConfig($value['class']);
            unset($value['class']);
        }

        if (array_key_exists('uploadable', $value)) {
            $this->_usedProperties['uploadable'] = true;
            $this->uploadable = new \Symfony\Config\StofDoctrineExtensions\UploadableConfig($value['uploadable']);
            unset($value['uploadable']);
        }

        if (array_key_exists('default_locale', $value)) {
            $this->_usedProperties['defaultLocale'] = true;
            $this->defaultLocale = $value['default_locale'];
            unset($value['default_locale']);
        }

        if (array_key_exists('translation_fallback', $value)) {
            $this->_usedProperties['translationFallback'] = true;
            $this->translationFallback = $value['translation_fallback'];
            unset($value['translation_fallback']);
        }

        if (array_key_exists('persist_default_translation', $value)) {
            $this->_usedProperties['persistDefaultTranslation'] = true;
            $this->persistDefaultTranslation = $value['persist_default_translation'];
            unset($value['persist_default_translation']);
        }

        if (array_key_exists('skip_translation_on_load', $value)) {
            $this->_usedProperties['skipTranslationOnLoad'] = true;
            $this->skipTranslationOnLoad = $value['skip_translation_on_load'];
            unset($value['skip_translation_on_load']);
        }

        if ([] !== $value) {
            throw new InvalidConfigurationException(sprintf('The following keys are not supported by "%s": ', __CLASS__).implode(', ', array_keys($value)));
        }
    }

    public function toArray(): array
    {
        $output = [];
        if (isset($this->_usedProperties['orm'])) {
            $output['orm'] = array_map(function ($v) { return $v->toArray(); }, $this->orm);
        }
        if (isset($this->_usedProperties['mongodb'])) {
            $output['mongodb'] = array_map(function ($v) { return $v->toArray(); }, $this->mongodb);
        }
        if (isset($this->_usedProperties['class'])) {
            $output['class'] = $this->class->toArray();
        }
        if (isset($this->_usedProperties['uploadable'])) {
            $output['uploadable'] = $this->uploadable->toArray();
        }
        if (isset($this->_usedProperties['defaultLocale'])) {
            $output['default_locale'] = $this->defaultLocale;
        }
        if (isset($this->_usedProperties['translationFallback'])) {
            $output['translation_fallback'] = $this->translationFallback;
        }
        if (isset($this->_usedProperties['persistDefaultTranslation'])) {
            $output['persist_default_translation'] = $this->persistDefaultTranslation;
        }
        if (isset($this->_usedProperties['skipTranslationOnLoad'])) {
            $output['skip_translation_on_load'] = $this->skipTranslationOnLoad;
        }

        return $output;
    }

}
