<?php

namespace Symfony\Config\SyliusResource;

use Symfony\Component\Config\Loader\ParamConfigurator;
use Symfony\Component\Config\Definition\Exception\InvalidConfigurationException;

/**
 * This class is automatically generated to help in creating a config.
 */
class SettingsConfig 
{
    private $paginate;
    private $limit;
    private $allowedPaginate;
    private $defaultPageSize;
    private $sortable;
    private $sorting;
    private $filterable;
    private $criteria;
    private $_usedProperties = [];

    /**
     * @default null
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function paginate($value = NULL): self
    {
        $this->_usedProperties['paginate'] = true;
        $this->paginate = $value;

        return $this;
    }

    /**
     * @default null
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function limit($value = NULL): self
    {
        $this->_usedProperties['limit'] = true;
        $this->limit = $value;

        return $this;
    }

    /**
     * @param ParamConfigurator|list<int|ParamConfigurator> $value
     * @return $this
     */
    public function allowedPaginate($value): self
    {
        $this->_usedProperties['allowedPaginate'] = true;
        $this->allowedPaginate = $value;

        return $this;
    }

    /**
     * @default 10
     * @param ParamConfigurator|int $value
     * @return $this
     */
    public function defaultPageSize($value): self
    {
        $this->_usedProperties['defaultPageSize'] = true;
        $this->defaultPageSize = $value;

        return $this;
    }

    /**
     * @default false
     * @param ParamConfigurator|bool $value
     * @return $this
     */
    public function sortable($value): self
    {
        $this->_usedProperties['sortable'] = true;
        $this->sortable = $value;

        return $this;
    }

    /**
     * @default null
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function sorting($value = NULL): self
    {
        $this->_usedProperties['sorting'] = true;
        $this->sorting = $value;

        return $this;
    }

    /**
     * @default false
     * @param ParamConfigurator|bool $value
     * @return $this
     */
    public function filterable($value): self
    {
        $this->_usedProperties['filterable'] = true;
        $this->filterable = $value;

        return $this;
    }

    /**
     * @default null
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function criteria($value = NULL): self
    {
        $this->_usedProperties['criteria'] = true;
        $this->criteria = $value;

        return $this;
    }

    public function __construct(array $value = [])
    {
        if (array_key_exists('paginate', $value)) {
            $this->_usedProperties['paginate'] = true;
            $this->paginate = $value['paginate'];
            unset($value['paginate']);
        }

        if (array_key_exists('limit', $value)) {
            $this->_usedProperties['limit'] = true;
            $this->limit = $value['limit'];
            unset($value['limit']);
        }

        if (array_key_exists('allowed_paginate', $value)) {
            $this->_usedProperties['allowedPaginate'] = true;
            $this->allowedPaginate = $value['allowed_paginate'];
            unset($value['allowed_paginate']);
        }

        if (array_key_exists('default_page_size', $value)) {
            $this->_usedProperties['defaultPageSize'] = true;
            $this->defaultPageSize = $value['default_page_size'];
            unset($value['default_page_size']);
        }

        if (array_key_exists('sortable', $value)) {
            $this->_usedProperties['sortable'] = true;
            $this->sortable = $value['sortable'];
            unset($value['sortable']);
        }

        if (array_key_exists('sorting', $value)) {
            $this->_usedProperties['sorting'] = true;
            $this->sorting = $value['sorting'];
            unset($value['sorting']);
        }

        if (array_key_exists('filterable', $value)) {
            $this->_usedProperties['filterable'] = true;
            $this->filterable = $value['filterable'];
            unset($value['filterable']);
        }

        if (array_key_exists('criteria', $value)) {
            $this->_usedProperties['criteria'] = true;
            $this->criteria = $value['criteria'];
            unset($value['criteria']);
        }

        if ([] !== $value) {
            throw new InvalidConfigurationException(sprintf('The following keys are not supported by "%s": ', __CLASS__).implode(', ', array_keys($value)));
        }
    }

    public function toArray(): array
    {
        $output = [];
        if (isset($this->_usedProperties['paginate'])) {
            $output['paginate'] = $this->paginate;
        }
        if (isset($this->_usedProperties['limit'])) {
            $output['limit'] = $this->limit;
        }
        if (isset($this->_usedProperties['allowedPaginate'])) {
            $output['allowed_paginate'] = $this->allowedPaginate;
        }
        if (isset($this->_usedProperties['defaultPageSize'])) {
            $output['default_page_size'] = $this->defaultPageSize;
        }
        if (isset($this->_usedProperties['sortable'])) {
            $output['sortable'] = $this->sortable;
        }
        if (isset($this->_usedProperties['sorting'])) {
            $output['sorting'] = $this->sorting;
        }
        if (isset($this->_usedProperties['filterable'])) {
            $output['filterable'] = $this->filterable;
        }
        if (isset($this->_usedProperties['criteria'])) {
            $output['criteria'] = $this->criteria;
        }

        return $output;
    }

}
