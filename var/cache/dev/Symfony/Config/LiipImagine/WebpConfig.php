<?php

namespace Symfony\Config\LiipImagine;

require_once __DIR__.\DIRECTORY_SEPARATOR.'Webp'.\DIRECTORY_SEPARATOR.'PostProcessorsConfig.php';

use Symfony\Component\Config\Loader\ParamConfigurator;
use Symfony\Component\Config\Definition\Exception\InvalidConfigurationException;

/**
 * This class is automatically generated to help in creating a config.
 */
class WebpConfig 
{
    private $generate;
    private $quality;
    private $cache;
    private $dataLoader;
    private $postProcessors;
    private $_usedProperties = [];

    /**
     * @default false
     * @param ParamConfigurator|bool $value
     * @return $this
     */
    public function generate($value): self
    {
        $this->_usedProperties['generate'] = true;
        $this->generate = $value;

        return $this;
    }

    /**
     * @default 100
     * @param ParamConfigurator|int $value
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

    public function postProcessors(string $name, array $value = []): \Symfony\Config\LiipImagine\Webp\PostProcessorsConfig
    {
        if (!isset($this->postProcessors[$name])) {
            $this->_usedProperties['postProcessors'] = true;
            $this->postProcessors[$name] = new \Symfony\Config\LiipImagine\Webp\PostProcessorsConfig($value);
        } elseif (1 < \func_num_args()) {
            throw new InvalidConfigurationException('The node created by "postProcessors()" has already been initialized. You cannot pass values the second time you call postProcessors().');
        }

        return $this->postProcessors[$name];
    }

    public function __construct(array $value = [])
    {
        if (array_key_exists('generate', $value)) {
            $this->_usedProperties['generate'] = true;
            $this->generate = $value['generate'];
            unset($value['generate']);
        }

        if (array_key_exists('quality', $value)) {
            $this->_usedProperties['quality'] = true;
            $this->quality = $value['quality'];
            unset($value['quality']);
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

        if (array_key_exists('post_processors', $value)) {
            $this->_usedProperties['postProcessors'] = true;
            $this->postProcessors = array_map(function ($v) { return new \Symfony\Config\LiipImagine\Webp\PostProcessorsConfig($v); }, $value['post_processors']);
            unset($value['post_processors']);
        }

        if ([] !== $value) {
            throw new InvalidConfigurationException(sprintf('The following keys are not supported by "%s": ', __CLASS__).implode(', ', array_keys($value)));
        }
    }

    public function toArray(): array
    {
        $output = [];
        if (isset($this->_usedProperties['generate'])) {
            $output['generate'] = $this->generate;
        }
        if (isset($this->_usedProperties['quality'])) {
            $output['quality'] = $this->quality;
        }
        if (isset($this->_usedProperties['cache'])) {
            $output['cache'] = $this->cache;
        }
        if (isset($this->_usedProperties['dataLoader'])) {
            $output['data_loader'] = $this->dataLoader;
        }
        if (isset($this->_usedProperties['postProcessors'])) {
            $output['post_processors'] = array_map(function ($v) { return $v->toArray(); }, $this->postProcessors);
        }

        return $output;
    }

}
