<?php

namespace Symfony\Config\ApiPlatform\Collection;

use Symfony\Component\Config\Loader\ParamConfigurator;
use Symfony\Component\Config\Definition\Exception\InvalidConfigurationException;

/**
 * This class is automatically generated to help in creating a config.
 */
class PaginationConfig 
{
    private $enabled;
    private $partial;
    private $clientEnabled;
    private $clientItemsPerPage;
    private $clientPartial;
    private $itemsPerPage;
    private $maximumItemsPerPage;
    private $pageParameterName;
    private $enabledParameterName;
    private $itemsPerPageParameterName;
    private $partialParameterName;
    private $_usedProperties = [];

    /**
     * To enable or disable pagination for all resource collections by default.
     * @default true
     * @param ParamConfigurator|bool $value
     * @deprecated The use of the `collection.pagination.enabled` has been deprecated in 2.6 and will be removed in 3.0. Use `defaults.pagination_enabled` instead.
     * @return $this
     */
    public function enabled($value): self
    {
        $this->_usedProperties['enabled'] = true;
        $this->enabled = $value;

        return $this;
    }

    /**
     * To enable or disable partial pagination for all resource collections by default when pagination is enabled.
     * @default false
     * @param ParamConfigurator|bool $value
     * @deprecated The use of the `collection.pagination.partial` has been deprecated in 2.6 and will be removed in 3.0. Use `defaults.pagination_partial` instead.
     * @return $this
     */
    public function partial($value): self
    {
        $this->_usedProperties['partial'] = true;
        $this->partial = $value;

        return $this;
    }

    /**
     * To allow the client to enable or disable the pagination.
     * @default false
     * @param ParamConfigurator|bool $value
     * @deprecated The use of the `collection.pagination.client_enabled` has been deprecated in 2.6 and will be removed in 3.0. Use `defaults.pagination_client_enabled` instead.
     * @return $this
     */
    public function clientEnabled($value): self
    {
        $this->_usedProperties['clientEnabled'] = true;
        $this->clientEnabled = $value;

        return $this;
    }

    /**
     * To allow the client to set the number of items per page.
     * @default false
     * @param ParamConfigurator|bool $value
     * @deprecated The use of the `collection.pagination.client_items_per_page` has been deprecated in 2.6 and will be removed in 3.0. Use `defaults.pagination_client_items_per_page` instead.
     * @return $this
     */
    public function clientItemsPerPage($value): self
    {
        $this->_usedProperties['clientItemsPerPage'] = true;
        $this->clientItemsPerPage = $value;

        return $this;
    }

    /**
     * To allow the client to enable or disable partial pagination.
     * @default false
     * @param ParamConfigurator|bool $value
     * @deprecated The use of the `collection.pagination.client_partial` has been deprecated in 2.6 and will be removed in 3.0. Use `defaults.pagination_client_partial` instead.
     * @return $this
     */
    public function clientPartial($value): self
    {
        $this->_usedProperties['clientPartial'] = true;
        $this->clientPartial = $value;

        return $this;
    }

    /**
     * The default number of items per page.
     * @default 30
     * @param ParamConfigurator|int $value
     * @deprecated The use of the `collection.pagination.items_per_page` has been deprecated in 2.6 and will be removed in 3.0. Use `defaults.pagination_items_per_page` instead.
     * @return $this
     */
    public function itemsPerPage($value): self
    {
        $this->_usedProperties['itemsPerPage'] = true;
        $this->itemsPerPage = $value;

        return $this;
    }

    /**
     * The maximum number of items per page.
     * @default null
     * @param ParamConfigurator|int $value
     * @deprecated The use of the `collection.pagination.maximum_items_per_page` has been deprecated in 2.6 and will be removed in 3.0. Use `defaults.pagination_maximum_items_per_page` instead.
     * @return $this
     */
    public function maximumItemsPerPage($value): self
    {
        $this->_usedProperties['maximumItemsPerPage'] = true;
        $this->maximumItemsPerPage = $value;

        return $this;
    }

    /**
     * The default name of the parameter handling the page number.
     * @default 'page'
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function pageParameterName($value): self
    {
        $this->_usedProperties['pageParameterName'] = true;
        $this->pageParameterName = $value;

        return $this;
    }

    /**
     * The name of the query parameter to enable or disable pagination.
     * @default 'pagination'
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function enabledParameterName($value): self
    {
        $this->_usedProperties['enabledParameterName'] = true;
        $this->enabledParameterName = $value;

        return $this;
    }

    /**
     * The name of the query parameter to set the number of items per page.
     * @default 'itemsPerPage'
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function itemsPerPageParameterName($value): self
    {
        $this->_usedProperties['itemsPerPageParameterName'] = true;
        $this->itemsPerPageParameterName = $value;

        return $this;
    }

    /**
     * The name of the query parameter to enable or disable partial pagination.
     * @default 'partial'
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function partialParameterName($value): self
    {
        $this->_usedProperties['partialParameterName'] = true;
        $this->partialParameterName = $value;

        return $this;
    }

    public function __construct(array $value = [])
    {
        if (array_key_exists('enabled', $value)) {
            $this->_usedProperties['enabled'] = true;
            $this->enabled = $value['enabled'];
            unset($value['enabled']);
        }

        if (array_key_exists('partial', $value)) {
            $this->_usedProperties['partial'] = true;
            $this->partial = $value['partial'];
            unset($value['partial']);
        }

        if (array_key_exists('client_enabled', $value)) {
            $this->_usedProperties['clientEnabled'] = true;
            $this->clientEnabled = $value['client_enabled'];
            unset($value['client_enabled']);
        }

        if (array_key_exists('client_items_per_page', $value)) {
            $this->_usedProperties['clientItemsPerPage'] = true;
            $this->clientItemsPerPage = $value['client_items_per_page'];
            unset($value['client_items_per_page']);
        }

        if (array_key_exists('client_partial', $value)) {
            $this->_usedProperties['clientPartial'] = true;
            $this->clientPartial = $value['client_partial'];
            unset($value['client_partial']);
        }

        if (array_key_exists('items_per_page', $value)) {
            $this->_usedProperties['itemsPerPage'] = true;
            $this->itemsPerPage = $value['items_per_page'];
            unset($value['items_per_page']);
        }

        if (array_key_exists('maximum_items_per_page', $value)) {
            $this->_usedProperties['maximumItemsPerPage'] = true;
            $this->maximumItemsPerPage = $value['maximum_items_per_page'];
            unset($value['maximum_items_per_page']);
        }

        if (array_key_exists('page_parameter_name', $value)) {
            $this->_usedProperties['pageParameterName'] = true;
            $this->pageParameterName = $value['page_parameter_name'];
            unset($value['page_parameter_name']);
        }

        if (array_key_exists('enabled_parameter_name', $value)) {
            $this->_usedProperties['enabledParameterName'] = true;
            $this->enabledParameterName = $value['enabled_parameter_name'];
            unset($value['enabled_parameter_name']);
        }

        if (array_key_exists('items_per_page_parameter_name', $value)) {
            $this->_usedProperties['itemsPerPageParameterName'] = true;
            $this->itemsPerPageParameterName = $value['items_per_page_parameter_name'];
            unset($value['items_per_page_parameter_name']);
        }

        if (array_key_exists('partial_parameter_name', $value)) {
            $this->_usedProperties['partialParameterName'] = true;
            $this->partialParameterName = $value['partial_parameter_name'];
            unset($value['partial_parameter_name']);
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
        if (isset($this->_usedProperties['partial'])) {
            $output['partial'] = $this->partial;
        }
        if (isset($this->_usedProperties['clientEnabled'])) {
            $output['client_enabled'] = $this->clientEnabled;
        }
        if (isset($this->_usedProperties['clientItemsPerPage'])) {
            $output['client_items_per_page'] = $this->clientItemsPerPage;
        }
        if (isset($this->_usedProperties['clientPartial'])) {
            $output['client_partial'] = $this->clientPartial;
        }
        if (isset($this->_usedProperties['itemsPerPage'])) {
            $output['items_per_page'] = $this->itemsPerPage;
        }
        if (isset($this->_usedProperties['maximumItemsPerPage'])) {
            $output['maximum_items_per_page'] = $this->maximumItemsPerPage;
        }
        if (isset($this->_usedProperties['pageParameterName'])) {
            $output['page_parameter_name'] = $this->pageParameterName;
        }
        if (isset($this->_usedProperties['enabledParameterName'])) {
            $output['enabled_parameter_name'] = $this->enabledParameterName;
        }
        if (isset($this->_usedProperties['itemsPerPageParameterName'])) {
            $output['items_per_page_parameter_name'] = $this->itemsPerPageParameterName;
        }
        if (isset($this->_usedProperties['partialParameterName'])) {
            $output['partial_parameter_name'] = $this->partialParameterName;
        }

        return $output;
    }

}
