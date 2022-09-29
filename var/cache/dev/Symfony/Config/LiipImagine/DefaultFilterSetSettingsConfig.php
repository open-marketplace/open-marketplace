<?php

namespace Symfony\Config\LiipImagine;

require_once __DIR__.\DIRECTORY_SEPARATOR.'DefaultFilterSetSettings'.\DIRECTORY_SEPARATOR.'FiltersConfig.php';
require_once __DIR__.\DIRECTORY_SEPARATOR.'DefaultFilterSetSettings'.\DIRECTORY_SEPARATOR.'PostProcessorsConfig.php';

use Symfony\Component\Config\Loader\ParamConfigurator;
use Symfony\Component\Config\Definition\Exception\InvalidConfigurationException;

/**
 * This class is automatically generated to help in creating a config.
 */
class DefaultFilterSetSettingsConfig 
{
    private $quality;
    private $jpegQuality;
    private $pngCompressionLevel;
    private $pngCompressionFilter;
    private $format;
    private $animated;
    private $cache;
    private $dataLoader;
    private $defaultImage;
    private $filters;
    private $postProcessors;
    private $_usedProperties = [];

    /**
     * @default 100
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function quality($value): self
    {
        $this->_usedProperties['quality'] = true;
        $this->quality = $value;

        return $this;
    }

    /**
     * @default null
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function jpegQuality($value): self
    {
        $this->_usedProperties['jpegQuality'] = true;
        $this->jpegQuality = $value;

        return $this;
    }

    /**
     * @default null
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function pngCompressionLevel($value): self
    {
        $this->_usedProperties['pngCompressionLevel'] = true;
        $this->pngCompressionLevel = $value;

        return $this;
    }

    /**
     * @default null
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function pngCompressionFilter($value): self
    {
        $this->_usedProperties['pngCompressionFilter'] = true;
        $this->pngCompressionFilter = $value;

        return $this;
    }

    /**
     * @default null
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function format($value): self
    {
        $this->_usedProperties['format'] = true;
        $this->format = $value;

        return $this;
    }

    /**
     * @default false
     * @param ParamConfigurator|bool $value
     * @return $this
     */
    public function animated($value): self
    {
        $this->_usedProperties['animated'] = true;
        $this->animated = $value;

        return $this;
    }

    /**
     * @default null
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function cache($value): self
    {
        $this->_usedProperties['cache'] = true;
        $this->cache = $value;

        return $this;
    }

    /**
     * @default null
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function dataLoader($value): self
    {
        $this->_usedProperties['dataLoader'] = true;
        $this->dataLoader = $value;

        return $this;
    }

    /**
     * @default null
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function defaultImage($value): self
    {
        $this->_usedProperties['defaultImage'] = true;
        $this->defaultImage = $value;

        return $this;
    }

    public function filters(string $name, array $value = []): \Symfony\Config\LiipImagine\DefaultFilterSetSettings\FiltersConfig
    {
        if (!isset($this->filters[$name])) {
            $this->_usedProperties['filters'] = true;
            $this->filters[$name] = new \Symfony\Config\LiipImagine\DefaultFilterSetSettings\FiltersConfig($value);
        } elseif (1 < \func_num_args()) {
            throw new InvalidConfigurationException('The node created by "filters()" has already been initialized. You cannot pass values the second time you call filters().');
        }

        return $this->filters[$name];
    }

    public function postProcessors(string $name, array $value = []): \Symfony\Config\LiipImagine\DefaultFilterSetSettings\PostProcessorsConfig
    {
        if (!isset($this->postProcessors[$name])) {
            $this->_usedProperties['postProcessors'] = true;
            $this->postProcessors[$name] = new \Symfony\Config\LiipImagine\DefaultFilterSetSettings\PostProcessorsConfig($value);
        } elseif (1 < \func_num_args()) {
            throw new InvalidConfigurationException('The node created by "postProcessors()" has already been initialized. You cannot pass values the second time you call postProcessors().');
        }

        return $this->postProcessors[$name];
    }

    public function __construct(array $value = [])
    {
        if (array_key_exists('quality', $value)) {
            $this->_usedProperties['quality'] = true;
            $this->quality = $value['quality'];
            unset($value['quality']);
        }

        if (array_key_exists('jpeg_quality', $value)) {
            $this->_usedProperties['jpegQuality'] = true;
            $this->jpegQuality = $value['jpeg_quality'];
            unset($value['jpeg_quality']);
        }

        if (array_key_exists('png_compression_level', $value)) {
            $this->_usedProperties['pngCompressionLevel'] = true;
            $this->pngCompressionLevel = $value['png_compression_level'];
            unset($value['png_compression_level']);
        }

        if (array_key_exists('png_compression_filter', $value)) {
            $this->_usedProperties['pngCompressionFilter'] = true;
            $this->pngCompressionFilter = $value['png_compression_filter'];
            unset($value['png_compression_filter']);
        }

        if (array_key_exists('format', $value)) {
            $this->_usedProperties['format'] = true;
            $this->format = $value['format'];
            unset($value['format']);
        }

        if (array_key_exists('animated', $value)) {
            $this->_usedProperties['animated'] = true;
            $this->animated = $value['animated'];
            unset($value['animated']);
        }

        if (array_key_exists('cache', $value)) {
            $this->_usedProperties['cache'] = true;
            $this->cache = $value['cache'];
            unset($value['cache']);
        }

        if (array_key_exists('data_loader', $value)) {
            $this->_usedProperties['dataLoader'] = true;
            $this->dataLoader = $value['data_loader'];
            unset($value['data_loader']);
        }

        if (array_key_exists('default_image', $value)) {
            $this->_usedProperties['defaultImage'] = true;
            $this->defaultImage = $value['default_image'];
            unset($value['default_image']);
        }

        if (array_key_exists('filters', $value)) {
            $this->_usedProperties['filters'] = true;
            $this->filters = array_map(function ($v) { return new \Symfony\Config\LiipImagine\DefaultFilterSetSettings\FiltersConfig($v); }, $value['filters']);
            unset($value['filters']);
        }

        if (array_key_exists('post_processors', $value)) {
            $this->_usedProperties['postProcessors'] = true;
            $this->postProcessors = array_map(function ($v) { return new \Symfony\Config\LiipImagine\DefaultFilterSetSettings\PostProcessorsConfig($v); }, $value['post_processors']);
            unset($value['post_processors']);
        }

        if ([] !== $value) {
            throw new InvalidConfigurationException(sprintf('The following keys are not supported by "%s": ', __CLASS__).implode(', ', array_keys($value)));
        }
    }

    public function toArray(): array
    {
        $output = [];
        if (isset($this->_usedProperties['quality'])) {
            $output['quality'] = $this->quality;
        }
        if (isset($this->_usedProperties['jpegQuality'])) {
            $output['jpeg_quality'] = $this->jpegQuality;
        }
        if (isset($this->_usedProperties['pngCompressionLevel'])) {
            $output['png_compression_level'] = $this->pngCompressionLevel;
        }
        if (isset($this->_usedProperties['pngCompressionFilter'])) {
            $output['png_compression_filter'] = $this->pngCompressionFilter;
        }
        if (isset($this->_usedProperties['format'])) {
            $output['format'] = $this->format;
        }
        if (isset($this->_usedProperties['animated'])) {
            $output['animated'] = $this->animated;
        }
        if (isset($this->_usedProperties['cache'])) {
            $output['cache'] = $this->cache;
        }
        if (isset($this->_usedProperties['dataLoader'])) {
            $output['data_loader'] = $this->dataLoader;
        }
        if (isset($this->_usedProperties['defaultImage'])) {
            $output['default_image'] = $this->defaultImage;
        }
        if (isset($this->_usedProperties['filters'])) {
            $output['filters'] = array_map(function ($v) { return $v->toArray(); }, $this->filters);
        }
        if (isset($this->_usedProperties['postProcessors'])) {
            $output['post_processors'] = array_map(function ($v) { return $v->toArray(); }, $this->postProcessors);
        }

        return $output;
    }

}
