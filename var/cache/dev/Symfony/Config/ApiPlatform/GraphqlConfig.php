<?php

namespace Symfony\Config\ApiPlatform;

require_once __DIR__.\DIRECTORY_SEPARATOR.'Graphql'.\DIRECTORY_SEPARATOR.'GraphiqlConfig.php';
require_once __DIR__.\DIRECTORY_SEPARATOR.'Graphql'.\DIRECTORY_SEPARATOR.'GraphqlPlaygroundConfig.php';
require_once __DIR__.\DIRECTORY_SEPARATOR.'Graphql'.\DIRECTORY_SEPARATOR.'CollectionConfig.php';

use Symfony\Component\Config\Loader\ParamConfigurator;
use Symfony\Component\Config\Definition\Exception\InvalidConfigurationException;

/**
 * This class is automatically generated to help in creating a config.
 */
class GraphqlConfig 
{
    private $enabled;
    private $defaultIde;
    private $graphiql;
    private $graphqlPlayground;
    private $nestingSeparator;
    private $collection;
    private $_usedProperties = [];

    /**
     * @default false
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
     * @default 'graphiql'
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function defaultIde($value): self
    {
        $this->_usedProperties['defaultIde'] = true;
        $this->defaultIde = $value;

        return $this;
    }

    /**
     * @return \Symfony\Config\ApiPlatform\Graphql\GraphiqlConfig|$this
     */
    public function graphiql($value = [])
    {
        if (!\is_array($value)) {
            $this->_usedProperties['graphiql'] = true;
            $this->graphiql = $value;

            return $this;
        }

        if (!$this->graphiql instanceof \Symfony\Config\ApiPlatform\Graphql\GraphiqlConfig) {
            $this->_usedProperties['graphiql'] = true;
            $this->graphiql = new \Symfony\Config\ApiPlatform\Graphql\GraphiqlConfig($value);
        } elseif (0 < \func_num_args()) {
            throw new InvalidConfigurationException('The node created by "graphiql()" has already been initialized. You cannot pass values the second time you call graphiql().');
        }

        return $this->graphiql;
    }

    /**
     * @return \Symfony\Config\ApiPlatform\Graphql\GraphqlPlaygroundConfig|$this
     */
    public function graphqlPlayground($value = [])
    {
        if (!\is_array($value)) {
            $this->_usedProperties['graphqlPlayground'] = true;
            $this->graphqlPlayground = $value;

            return $this;
        }

        if (!$this->graphqlPlayground instanceof \Symfony\Config\ApiPlatform\Graphql\GraphqlPlaygroundConfig) {
            $this->_usedProperties['graphqlPlayground'] = true;
            $this->graphqlPlayground = new \Symfony\Config\ApiPlatform\Graphql\GraphqlPlaygroundConfig($value);
        } elseif (0 < \func_num_args()) {
            throw new InvalidConfigurationException('The node created by "graphqlPlayground()" has already been initialized. You cannot pass values the second time you call graphqlPlayground().');
        }

        return $this->graphqlPlayground;
    }

    /**
     * The separator to use to filter nested fields.
     * @default '_'
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function nestingSeparator($value): self
    {
        $this->_usedProperties['nestingSeparator'] = true;
        $this->nestingSeparator = $value;

        return $this;
    }

    public function collection(array $value = []): \Symfony\Config\ApiPlatform\Graphql\CollectionConfig
    {
        if (null === $this->collection) {
            $this->_usedProperties['collection'] = true;
            $this->collection = new \Symfony\Config\ApiPlatform\Graphql\CollectionConfig($value);
        } elseif (0 < \func_num_args()) {
            throw new InvalidConfigurationException('The node created by "collection()" has already been initialized. You cannot pass values the second time you call collection().');
        }

        return $this->collection;
    }

    public function __construct(array $value = [])
    {
        if (array_key_exists('enabled', $value)) {
            $this->_usedProperties['enabled'] = true;
            $this->enabled = $value['enabled'];
            unset($value['enabled']);
        }

        if (array_key_exists('default_ide', $value)) {
            $this->_usedProperties['defaultIde'] = true;
            $this->defaultIde = $value['default_ide'];
            unset($value['default_ide']);
        }

        if (array_key_exists('graphiql', $value)) {
            $this->_usedProperties['graphiql'] = true;
            $this->graphiql = \is_array($value['graphiql']) ? new \Symfony\Config\ApiPlatform\Graphql\GraphiqlConfig($value['graphiql']) : $value['graphiql'];
            unset($value['graphiql']);
        }

        if (array_key_exists('graphql_playground', $value)) {
            $this->_usedProperties['graphqlPlayground'] = true;
            $this->graphqlPlayground = \is_array($value['graphql_playground']) ? new \Symfony\Config\ApiPlatform\Graphql\GraphqlPlaygroundConfig($value['graphql_playground']) : $value['graphql_playground'];
            unset($value['graphql_playground']);
        }

        if (array_key_exists('nesting_separator', $value)) {
            $this->_usedProperties['nestingSeparator'] = true;
            $this->nestingSeparator = $value['nesting_separator'];
            unset($value['nesting_separator']);
        }

        if (array_key_exists('collection', $value)) {
            $this->_usedProperties['collection'] = true;
            $this->collection = new \Symfony\Config\ApiPlatform\Graphql\CollectionConfig($value['collection']);
            unset($value['collection']);
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
        if (isset($this->_usedProperties['defaultIde'])) {
            $output['default_ide'] = $this->defaultIde;
        }
        if (isset($this->_usedProperties['graphiql'])) {
            $output['graphiql'] = $this->graphiql instanceof \Symfony\Config\ApiPlatform\Graphql\GraphiqlConfig ? $this->graphiql->toArray() : $this->graphiql;
        }
        if (isset($this->_usedProperties['graphqlPlayground'])) {
            $output['graphql_playground'] = $this->graphqlPlayground instanceof \Symfony\Config\ApiPlatform\Graphql\GraphqlPlaygroundConfig ? $this->graphqlPlayground->toArray() : $this->graphqlPlayground;
        }
        if (isset($this->_usedProperties['nestingSeparator'])) {
            $output['nesting_separator'] = $this->nestingSeparator;
        }
        if (isset($this->_usedProperties['collection'])) {
            $output['collection'] = $this->collection->toArray();
        }

        return $output;
    }

}
