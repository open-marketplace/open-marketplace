<?php

namespace Symfony\Config;

require_once __DIR__.\DIRECTORY_SEPARATOR.'LiipImagine'.\DIRECTORY_SEPARATOR.'ResolversConfig.php';
require_once __DIR__.\DIRECTORY_SEPARATOR.'LiipImagine'.\DIRECTORY_SEPARATOR.'LoadersConfig.php';
require_once __DIR__.\DIRECTORY_SEPARATOR.'LiipImagine'.\DIRECTORY_SEPARATOR.'DefaultFilterSetSettingsConfig.php';
require_once __DIR__.\DIRECTORY_SEPARATOR.'LiipImagine'.\DIRECTORY_SEPARATOR.'ControllerConfig.php';
require_once __DIR__.\DIRECTORY_SEPARATOR.'LiipImagine'.\DIRECTORY_SEPARATOR.'FilterSetConfig.php';
require_once __DIR__.\DIRECTORY_SEPARATOR.'LiipImagine'.\DIRECTORY_SEPARATOR.'TwigConfig.php';
require_once __DIR__.\DIRECTORY_SEPARATOR.'LiipImagine'.\DIRECTORY_SEPARATOR.'MessengerConfig.php';
require_once __DIR__.\DIRECTORY_SEPARATOR.'LiipImagine'.\DIRECTORY_SEPARATOR.'WebpConfig.php';

use Symfony\Component\Config\Definition\Exception\InvalidConfigurationException;
use Symfony\Component\Config\Loader\ParamConfigurator;

/**
 * This class is automatically generated to help in creating a config.
 */
class LiipImagineConfig implements \Symfony\Component\Config\Builder\ConfigBuilderInterface
{
    private $resolvers;
    private $loaders;
    private $driver;
    private $cache;
    private $cacheBasePath;
    private $dataLoader;
    private $defaultImage;
    private $defaultFilterSetSettings;
    private $controller;
    private $filterSets;
    private $twig;
    private $enqueue;
    private $messenger;
    private $templating;
    private $webp;
    private $_usedProperties = [];

    public function resolvers(string $name, array $value = []): \Symfony\Config\LiipImagine\ResolversConfig
    {
        if (!isset($this->resolvers[$name])) {
            $this->_usedProperties['resolvers'] = true;
            $this->resolvers[$name] = new \Symfony\Config\LiipImagine\ResolversConfig($value);
        } elseif (1 < \func_num_args()) {
            throw new InvalidConfigurationException('The node created by "resolvers()" has already been initialized. You cannot pass values the second time you call resolvers().');
        }

        return $this->resolvers[$name];
    }

    public function loaders(string $name, array $value = []): \Symfony\Config\LiipImagine\LoadersConfig
    {
        if (!isset($this->loaders[$name])) {
            $this->_usedProperties['loaders'] = true;
            $this->loaders[$name] = new \Symfony\Config\LiipImagine\LoadersConfig($value);
        } elseif (1 < \func_num_args()) {
            throw new InvalidConfigurationException('The node created by "loaders()" has already been initialized. You cannot pass values the second time you call loaders().');
        }

        return $this->loaders[$name];
    }

    /**
     * @default 'gd'
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function driver($value): self
    {
        $this->_usedProperties['driver'] = true;
        $this->driver = $value;

        return $this;
    }

    /**
     * @default 'default'
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
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function cacheBasePath($value): self
    {
        $this->_usedProperties['cacheBasePath'] = true;
        $this->cacheBasePath = $value;

        return $this;
    }

    /**
     * @default 'default'
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

    public function defaultFilterSetSettings(array $value = []): \Symfony\Config\LiipImagine\DefaultFilterSetSettingsConfig
    {
        if (null === $this->defaultFilterSetSettings) {
            $this->_usedProperties['defaultFilterSetSettings'] = true;
            $this->defaultFilterSetSettings = new \Symfony\Config\LiipImagine\DefaultFilterSetSettingsConfig($value);
        } elseif (0 < \func_num_args()) {
            throw new InvalidConfigurationException('The node created by "defaultFilterSetSettings()" has already been initialized. You cannot pass values the second time you call defaultFilterSetSettings().');
        }

        return $this->defaultFilterSetSettings;
    }

    public function controller(array $value = []): \Symfony\Config\LiipImagine\ControllerConfig
    {
        if (null === $this->controller) {
            $this->_usedProperties['controller'] = true;
            $this->controller = new \Symfony\Config\LiipImagine\ControllerConfig($value);
        } elseif (0 < \func_num_args()) {
            throw new InvalidConfigurationException('The node created by "controller()" has already been initialized. You cannot pass values the second time you call controller().');
        }

        return $this->controller;
    }

    public function filterSet(string $name, array $value = []): \Symfony\Config\LiipImagine\FilterSetConfig
    {
        if (!isset($this->filterSets[$name])) {
            $this->_usedProperties['filterSets'] = true;
            $this->filterSets[$name] = new \Symfony\Config\LiipImagine\FilterSetConfig($value);
        } elseif (1 < \func_num_args()) {
            throw new InvalidConfigurationException('The node created by "filterSet()" has already been initialized. You cannot pass values the second time you call filterSet().');
        }

        return $this->filterSets[$name];
    }

    public function twig(array $value = []): \Symfony\Config\LiipImagine\TwigConfig
    {
        if (null === $this->twig) {
            $this->_usedProperties['twig'] = true;
            $this->twig = new \Symfony\Config\LiipImagine\TwigConfig($value);
        } elseif (0 < \func_num_args()) {
            throw new InvalidConfigurationException('The node created by "twig()" has already been initialized. You cannot pass values the second time you call twig().');
        }

        return $this->twig;
    }

    /**
     * Enables integration with enqueue if set true. Allows resolve image caches in background by sending messages to MQ.
     * @default false
     * @param ParamConfigurator|bool $value
     * @return $this
     */
    public function enqueue($value): self
    {
        $this->_usedProperties['enqueue'] = true;
        $this->enqueue = $value;

        return $this;
    }

    /**
     * @return \Symfony\Config\LiipImagine\MessengerConfig|$this
     */
    public function messenger($value = [])
    {
        if (!\is_array($value)) {
            $this->_usedProperties['messenger'] = true;
            $this->messenger = $value;

            return $this;
        }

        if (!$this->messenger instanceof \Symfony\Config\LiipImagine\MessengerConfig) {
            $this->_usedProperties['messenger'] = true;
            $this->messenger = new \Symfony\Config\LiipImagine\MessengerConfig($value);
        } elseif (0 < \func_num_args()) {
            throw new InvalidConfigurationException('The node created by "messenger()" has already been initialized. You cannot pass values the second time you call messenger().');
        }

        return $this->messenger;
    }

    /**
     * Enables integration with symfony/templating component
     * @default true
     * @param ParamConfigurator|bool $value
     * @return $this
     */
    public function templating($value): self
    {
        $this->_usedProperties['templating'] = true;
        $this->templating = $value;

        return $this;
    }

    public function webp(array $value = []): \Symfony\Config\LiipImagine\WebpConfig
    {
        if (null === $this->webp) {
            $this->_usedProperties['webp'] = true;
            $this->webp = new \Symfony\Config\LiipImagine\WebpConfig($value);
        } elseif (0 < \func_num_args()) {
            throw new InvalidConfigurationException('The node created by "webp()" has already been initialized. You cannot pass values the second time you call webp().');
        }

        return $this->webp;
    }

    public function getExtensionAlias(): string
    {
        return 'liip_imagine';
    }

    public function __construct(array $value = [])
    {
        if (array_key_exists('resolvers', $value)) {
            $this->_usedProperties['resolvers'] = true;
            $this->resolvers = array_map(function ($v) { return new \Symfony\Config\LiipImagine\ResolversConfig($v); }, $value['resolvers']);
            unset($value['resolvers']);
        }

        if (array_key_exists('loaders', $value)) {
            $this->_usedProperties['loaders'] = true;
            $this->loaders = array_map(function ($v) { return new \Symfony\Config\LiipImagine\LoadersConfig($v); }, $value['loaders']);
            unset($value['loaders']);
        }

        if (array_key_exists('driver', $value)) {
            $this->_usedProperties['driver'] = true;
            $this->driver = $value['driver'];
            unset($value['driver']);
        }

        if (array_key_exists('cache', $value)) {
            $this->_usedProperties['cache'] = true;
            $this->cache = $value['cache'];
            unset($value['cache']);
        }

        if (array_key_exists('cache_base_path', $value)) {
            $this->_usedProperties['cacheBasePath'] = true;
            $this->cacheBasePath = $value['cache_base_path'];
            unset($value['cache_base_path']);
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

        if (array_key_exists('default_filter_set_settings', $value)) {
            $this->_usedProperties['defaultFilterSetSettings'] = true;
            $this->defaultFilterSetSettings = new \Symfony\Config\LiipImagine\DefaultFilterSetSettingsConfig($value['default_filter_set_settings']);
            unset($value['default_filter_set_settings']);
        }

        if (array_key_exists('controller', $value)) {
            $this->_usedProperties['controller'] = true;
            $this->controller = new \Symfony\Config\LiipImagine\ControllerConfig($value['controller']);
            unset($value['controller']);
        }

        if (array_key_exists('filter_sets', $value)) {
            $this->_usedProperties['filterSets'] = true;
            $this->filterSets = array_map(function ($v) { return new \Symfony\Config\LiipImagine\FilterSetConfig($v); }, $value['filter_sets']);
            unset($value['filter_sets']);
        }

        if (array_key_exists('twig', $value)) {
            $this->_usedProperties['twig'] = true;
            $this->twig = new \Symfony\Config\LiipImagine\TwigConfig($value['twig']);
            unset($value['twig']);
        }

        if (array_key_exists('enqueue', $value)) {
            $this->_usedProperties['enqueue'] = true;
            $this->enqueue = $value['enqueue'];
            unset($value['enqueue']);
        }

        if (array_key_exists('messenger', $value)) {
            $this->_usedProperties['messenger'] = true;
            $this->messenger = \is_array($value['messenger']) ? new \Symfony\Config\LiipImagine\MessengerConfig($value['messenger']) : $value['messenger'];
            unset($value['messenger']);
        }

        if (array_key_exists('templating', $value)) {
            $this->_usedProperties['templating'] = true;
            $this->templating = $value['templating'];
            unset($value['templating']);
        }

        if (array_key_exists('webp', $value)) {
            $this->_usedProperties['webp'] = true;
            $this->webp = new \Symfony\Config\LiipImagine\WebpConfig($value['webp']);
            unset($value['webp']);
        }

        if ([] !== $value) {
            throw new InvalidConfigurationException(sprintf('The following keys are not supported by "%s": ', __CLASS__).implode(', ', array_keys($value)));
        }
    }

    public function toArray(): array
    {
        $output = [];
        if (isset($this->_usedProperties['resolvers'])) {
            $output['resolvers'] = array_map(function ($v) { return $v->toArray(); }, $this->resolvers);
        }
        if (isset($this->_usedProperties['loaders'])) {
            $output['loaders'] = array_map(function ($v) { return $v->toArray(); }, $this->loaders);
        }
        if (isset($this->_usedProperties['driver'])) {
            $output['driver'] = $this->driver;
        }
        if (isset($this->_usedProperties['cache'])) {
            $output['cache'] = $this->cache;
        }
        if (isset($this->_usedProperties['cacheBasePath'])) {
            $output['cache_base_path'] = $this->cacheBasePath;
        }
        if (isset($this->_usedProperties['dataLoader'])) {
            $output['data_loader'] = $this->dataLoader;
        }
        if (isset($this->_usedProperties['defaultImage'])) {
            $output['default_image'] = $this->defaultImage;
        }
        if (isset($this->_usedProperties['defaultFilterSetSettings'])) {
            $output['default_filter_set_settings'] = $this->defaultFilterSetSettings->toArray();
        }
        if (isset($this->_usedProperties['controller'])) {
            $output['controller'] = $this->controller->toArray();
        }
        if (isset($this->_usedProperties['filterSets'])) {
            $output['filter_sets'] = array_map(function ($v) { return $v->toArray(); }, $this->filterSets);
        }
        if (isset($this->_usedProperties['twig'])) {
            $output['twig'] = $this->twig->toArray();
        }
        if (isset($this->_usedProperties['enqueue'])) {
            $output['enqueue'] = $this->enqueue;
        }
        if (isset($this->_usedProperties['messenger'])) {
            $output['messenger'] = $this->messenger instanceof \Symfony\Config\LiipImagine\MessengerConfig ? $this->messenger->toArray() : $this->messenger;
        }
        if (isset($this->_usedProperties['templating'])) {
            $output['templating'] = $this->templating;
        }
        if (isset($this->_usedProperties['webp'])) {
            $output['webp'] = $this->webp->toArray();
        }

        return $output;
    }

}
