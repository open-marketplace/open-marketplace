<?php

namespace Symfony\Config\ApiPlatform;

use Symfony\Component\Config\Loader\ParamConfigurator;

/**
 * This class is automatically generated to help in creating a config.
 */
class DefaultsConfig 
{
    private $collectionOperations;
    private $description;
    private $graphql;
    private $iri;
    private $itemOperations;
    private $shortName;
    private $subresourceOperations;
    private $attributes;
    private $cacheHeaders;
    private $denormalizationContext;
    private $deprecationReason;
    private $elasticsearch;
    private $fetchPartial;
    private $forceEager;
    private $formats;
    private $filters;
    private $hydraContext;
    private $input;
    private $mercure;
    private $messenger;
    private $normalizationContext;
    private $openapiContext;
    private $order;
    private $output;
    private $paginationClientEnabled;
    private $paginationClientItemsPerPage;
    private $paginationClientPartial;
    private $paginationViaCursor;
    private $paginationEnabled;
    private $paginationFetchJoinCollection;
    private $paginationItemsPerPage;
    private $paginationMaximumItemsPerPage;
    private $paginationPartial;
    private $routePrefix;
    private $security;
    private $securityMessage;
    private $securityPostDenormalize;
    private $securityPostDenormalizeMessage;
    private $stateless;
    private $sunset;
    private $swaggerContext;
    private $validationGroups;
    private $urlGenerationStrategy;
    private $compositeIdentifier;
    private $_usedProperties = [];
    private $_extraKeys;

    /**
     * @default null
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function collectionOperations($value): self
    {
        $this->_usedProperties['collectionOperations'] = true;
        $this->collectionOperations = $value;

        return $this;
    }

    /**
     * @default null
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function description($value): self
    {
        $this->_usedProperties['description'] = true;
        $this->description = $value;

        return $this;
    }

    /**
     * @default null
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function graphql($value): self
    {
        $this->_usedProperties['graphql'] = true;
        $this->graphql = $value;

        return $this;
    }

    /**
     * @default null
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function iri($value): self
    {
        $this->_usedProperties['iri'] = true;
        $this->iri = $value;

        return $this;
    }

    /**
     * @default null
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function itemOperations($value): self
    {
        $this->_usedProperties['itemOperations'] = true;
        $this->itemOperations = $value;

        return $this;
    }

    /**
     * @default null
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function shortName($value): self
    {
        $this->_usedProperties['shortName'] = true;
        $this->shortName = $value;

        return $this;
    }

    /**
     * @default null
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function subresourceOperations($value): self
    {
        $this->_usedProperties['subresourceOperations'] = true;
        $this->subresourceOperations = $value;

        return $this;
    }

    /**
     * @default null
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function attributes($value): self
    {
        $this->_usedProperties['attributes'] = true;
        $this->attributes = $value;

        return $this;
    }

    /**
     * @default null
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function cacheHeaders($value): self
    {
        $this->_usedProperties['cacheHeaders'] = true;
        $this->cacheHeaders = $value;

        return $this;
    }

    /**
     * @default null
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function denormalizationContext($value): self
    {
        $this->_usedProperties['denormalizationContext'] = true;
        $this->denormalizationContext = $value;

        return $this;
    }

    /**
     * @default null
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function deprecationReason($value): self
    {
        $this->_usedProperties['deprecationReason'] = true;
        $this->deprecationReason = $value;

        return $this;
    }

    /**
     * @default null
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function elasticsearch($value): self
    {
        $this->_usedProperties['elasticsearch'] = true;
        $this->elasticsearch = $value;

        return $this;
    }

    /**
     * @default null
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function fetchPartial($value): self
    {
        $this->_usedProperties['fetchPartial'] = true;
        $this->fetchPartial = $value;

        return $this;
    }

    /**
     * @default null
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function forceEager($value): self
    {
        $this->_usedProperties['forceEager'] = true;
        $this->forceEager = $value;

        return $this;
    }

    /**
     * @default null
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function formats($value): self
    {
        $this->_usedProperties['formats'] = true;
        $this->formats = $value;

        return $this;
    }

    /**
     * @default null
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function filters($value): self
    {
        $this->_usedProperties['filters'] = true;
        $this->filters = $value;

        return $this;
    }

    /**
     * @default null
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function hydraContext($value): self
    {
        $this->_usedProperties['hydraContext'] = true;
        $this->hydraContext = $value;

        return $this;
    }

    /**
     * @default null
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function input($value): self
    {
        $this->_usedProperties['input'] = true;
        $this->input = $value;

        return $this;
    }

    /**
     * @default null
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function mercure($value): self
    {
        $this->_usedProperties['mercure'] = true;
        $this->mercure = $value;

        return $this;
    }

    /**
     * @default null
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function messenger($value): self
    {
        $this->_usedProperties['messenger'] = true;
        $this->messenger = $value;

        return $this;
    }

    /**
     * @default null
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function normalizationContext($value): self
    {
        $this->_usedProperties['normalizationContext'] = true;
        $this->normalizationContext = $value;

        return $this;
    }

    /**
     * @default null
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function openapiContext($value): self
    {
        $this->_usedProperties['openapiContext'] = true;
        $this->openapiContext = $value;

        return $this;
    }

    /**
     * @default null
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function order($value): self
    {
        $this->_usedProperties['order'] = true;
        $this->order = $value;

        return $this;
    }

    /**
     * @default null
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function output($value): self
    {
        $this->_usedProperties['output'] = true;
        $this->output = $value;

        return $this;
    }

    /**
     * @default null
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function paginationClientEnabled($value): self
    {
        $this->_usedProperties['paginationClientEnabled'] = true;
        $this->paginationClientEnabled = $value;

        return $this;
    }

    /**
     * @default null
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function paginationClientItemsPerPage($value): self
    {
        $this->_usedProperties['paginationClientItemsPerPage'] = true;
        $this->paginationClientItemsPerPage = $value;

        return $this;
    }

    /**
     * @default null
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function paginationClientPartial($value): self
    {
        $this->_usedProperties['paginationClientPartial'] = true;
        $this->paginationClientPartial = $value;

        return $this;
    }

    /**
     * @default null
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function paginationViaCursor($value): self
    {
        $this->_usedProperties['paginationViaCursor'] = true;
        $this->paginationViaCursor = $value;

        return $this;
    }

    /**
     * @default null
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function paginationEnabled($value): self
    {
        $this->_usedProperties['paginationEnabled'] = true;
        $this->paginationEnabled = $value;

        return $this;
    }

    /**
     * @default null
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function paginationFetchJoinCollection($value): self
    {
        $this->_usedProperties['paginationFetchJoinCollection'] = true;
        $this->paginationFetchJoinCollection = $value;

        return $this;
    }

    /**
     * @default null
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function paginationItemsPerPage($value): self
    {
        $this->_usedProperties['paginationItemsPerPage'] = true;
        $this->paginationItemsPerPage = $value;

        return $this;
    }

    /**
     * @default null
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function paginationMaximumItemsPerPage($value): self
    {
        $this->_usedProperties['paginationMaximumItemsPerPage'] = true;
        $this->paginationMaximumItemsPerPage = $value;

        return $this;
    }

    /**
     * @default null
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function paginationPartial($value): self
    {
        $this->_usedProperties['paginationPartial'] = true;
        $this->paginationPartial = $value;

        return $this;
    }

    /**
     * @default null
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function routePrefix($value): self
    {
        $this->_usedProperties['routePrefix'] = true;
        $this->routePrefix = $value;

        return $this;
    }

    /**
     * @default null
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function security($value): self
    {
        $this->_usedProperties['security'] = true;
        $this->security = $value;

        return $this;
    }

    /**
     * @default null
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function securityMessage($value): self
    {
        $this->_usedProperties['securityMessage'] = true;
        $this->securityMessage = $value;

        return $this;
    }

    /**
     * @default null
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function securityPostDenormalize($value): self
    {
        $this->_usedProperties['securityPostDenormalize'] = true;
        $this->securityPostDenormalize = $value;

        return $this;
    }

    /**
     * @default null
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function securityPostDenormalizeMessage($value): self
    {
        $this->_usedProperties['securityPostDenormalizeMessage'] = true;
        $this->securityPostDenormalizeMessage = $value;

        return $this;
    }

    /**
     * @default null
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function stateless($value): self
    {
        $this->_usedProperties['stateless'] = true;
        $this->stateless = $value;

        return $this;
    }

    /**
     * @default null
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function sunset($value): self
    {
        $this->_usedProperties['sunset'] = true;
        $this->sunset = $value;

        return $this;
    }

    /**
     * @default null
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function swaggerContext($value): self
    {
        $this->_usedProperties['swaggerContext'] = true;
        $this->swaggerContext = $value;

        return $this;
    }

    /**
     * @default null
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function validationGroups($value): self
    {
        $this->_usedProperties['validationGroups'] = true;
        $this->validationGroups = $value;

        return $this;
    }

    /**
     * @default null
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function urlGenerationStrategy($value): self
    {
        $this->_usedProperties['urlGenerationStrategy'] = true;
        $this->urlGenerationStrategy = $value;

        return $this;
    }

    /**
     * @default null
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function compositeIdentifier($value): self
    {
        $this->_usedProperties['compositeIdentifier'] = true;
        $this->compositeIdentifier = $value;

        return $this;
    }

    public function __construct(array $value = [])
    {
        if (array_key_exists('collection_operations', $value)) {
            $this->_usedProperties['collectionOperations'] = true;
            $this->collectionOperations = $value['collection_operations'];
            unset($value['collection_operations']);
        }

        if (array_key_exists('description', $value)) {
            $this->_usedProperties['description'] = true;
            $this->description = $value['description'];
            unset($value['description']);
        }

        if (array_key_exists('graphql', $value)) {
            $this->_usedProperties['graphql'] = true;
            $this->graphql = $value['graphql'];
            unset($value['graphql']);
        }

        if (array_key_exists('iri', $value)) {
            $this->_usedProperties['iri'] = true;
            $this->iri = $value['iri'];
            unset($value['iri']);
        }

        if (array_key_exists('item_operations', $value)) {
            $this->_usedProperties['itemOperations'] = true;
            $this->itemOperations = $value['item_operations'];
            unset($value['item_operations']);
        }

        if (array_key_exists('short_name', $value)) {
            $this->_usedProperties['shortName'] = true;
            $this->shortName = $value['short_name'];
            unset($value['short_name']);
        }

        if (array_key_exists('subresource_operations', $value)) {
            $this->_usedProperties['subresourceOperations'] = true;
            $this->subresourceOperations = $value['subresource_operations'];
            unset($value['subresource_operations']);
        }

        if (array_key_exists('attributes', $value)) {
            $this->_usedProperties['attributes'] = true;
            $this->attributes = $value['attributes'];
            unset($value['attributes']);
        }

        if (array_key_exists('cache_headers', $value)) {
            $this->_usedProperties['cacheHeaders'] = true;
            $this->cacheHeaders = $value['cache_headers'];
            unset($value['cache_headers']);
        }

        if (array_key_exists('denormalization_context', $value)) {
            $this->_usedProperties['denormalizationContext'] = true;
            $this->denormalizationContext = $value['denormalization_context'];
            unset($value['denormalization_context']);
        }

        if (array_key_exists('deprecation_reason', $value)) {
            $this->_usedProperties['deprecationReason'] = true;
            $this->deprecationReason = $value['deprecation_reason'];
            unset($value['deprecation_reason']);
        }

        if (array_key_exists('elasticsearch', $value)) {
            $this->_usedProperties['elasticsearch'] = true;
            $this->elasticsearch = $value['elasticsearch'];
            unset($value['elasticsearch']);
        }

        if (array_key_exists('fetch_partial', $value)) {
            $this->_usedProperties['fetchPartial'] = true;
            $this->fetchPartial = $value['fetch_partial'];
            unset($value['fetch_partial']);
        }

        if (array_key_exists('force_eager', $value)) {
            $this->_usedProperties['forceEager'] = true;
            $this->forceEager = $value['force_eager'];
            unset($value['force_eager']);
        }

        if (array_key_exists('formats', $value)) {
            $this->_usedProperties['formats'] = true;
            $this->formats = $value['formats'];
            unset($value['formats']);
        }

        if (array_key_exists('filters', $value)) {
            $this->_usedProperties['filters'] = true;
            $this->filters = $value['filters'];
            unset($value['filters']);
        }

        if (array_key_exists('hydra_context', $value)) {
            $this->_usedProperties['hydraContext'] = true;
            $this->hydraContext = $value['hydra_context'];
            unset($value['hydra_context']);
        }

        if (array_key_exists('input', $value)) {
            $this->_usedProperties['input'] = true;
            $this->input = $value['input'];
            unset($value['input']);
        }

        if (array_key_exists('mercure', $value)) {
            $this->_usedProperties['mercure'] = true;
            $this->mercure = $value['mercure'];
            unset($value['mercure']);
        }

        if (array_key_exists('messenger', $value)) {
            $this->_usedProperties['messenger'] = true;
            $this->messenger = $value['messenger'];
            unset($value['messenger']);
        }

        if (array_key_exists('normalization_context', $value)) {
            $this->_usedProperties['normalizationContext'] = true;
            $this->normalizationContext = $value['normalization_context'];
            unset($value['normalization_context']);
        }

        if (array_key_exists('openapi_context', $value)) {
            $this->_usedProperties['openapiContext'] = true;
            $this->openapiContext = $value['openapi_context'];
            unset($value['openapi_context']);
        }

        if (array_key_exists('order', $value)) {
            $this->_usedProperties['order'] = true;
            $this->order = $value['order'];
            unset($value['order']);
        }

        if (array_key_exists('output', $value)) {
            $this->_usedProperties['output'] = true;
            $this->output = $value['output'];
            unset($value['output']);
        }

        if (array_key_exists('pagination_client_enabled', $value)) {
            $this->_usedProperties['paginationClientEnabled'] = true;
            $this->paginationClientEnabled = $value['pagination_client_enabled'];
            unset($value['pagination_client_enabled']);
        }

        if (array_key_exists('pagination_client_items_per_page', $value)) {
            $this->_usedProperties['paginationClientItemsPerPage'] = true;
            $this->paginationClientItemsPerPage = $value['pagination_client_items_per_page'];
            unset($value['pagination_client_items_per_page']);
        }

        if (array_key_exists('pagination_client_partial', $value)) {
            $this->_usedProperties['paginationClientPartial'] = true;
            $this->paginationClientPartial = $value['pagination_client_partial'];
            unset($value['pagination_client_partial']);
        }

        if (array_key_exists('pagination_via_cursor', $value)) {
            $this->_usedProperties['paginationViaCursor'] = true;
            $this->paginationViaCursor = $value['pagination_via_cursor'];
            unset($value['pagination_via_cursor']);
        }

        if (array_key_exists('pagination_enabled', $value)) {
            $this->_usedProperties['paginationEnabled'] = true;
            $this->paginationEnabled = $value['pagination_enabled'];
            unset($value['pagination_enabled']);
        }

        if (array_key_exists('pagination_fetch_join_collection', $value)) {
            $this->_usedProperties['paginationFetchJoinCollection'] = true;
            $this->paginationFetchJoinCollection = $value['pagination_fetch_join_collection'];
            unset($value['pagination_fetch_join_collection']);
        }

        if (array_key_exists('pagination_items_per_page', $value)) {
            $this->_usedProperties['paginationItemsPerPage'] = true;
            $this->paginationItemsPerPage = $value['pagination_items_per_page'];
            unset($value['pagination_items_per_page']);
        }

        if (array_key_exists('pagination_maximum_items_per_page', $value)) {
            $this->_usedProperties['paginationMaximumItemsPerPage'] = true;
            $this->paginationMaximumItemsPerPage = $value['pagination_maximum_items_per_page'];
            unset($value['pagination_maximum_items_per_page']);
        }

        if (array_key_exists('pagination_partial', $value)) {
            $this->_usedProperties['paginationPartial'] = true;
            $this->paginationPartial = $value['pagination_partial'];
            unset($value['pagination_partial']);
        }

        if (array_key_exists('route_prefix', $value)) {
            $this->_usedProperties['routePrefix'] = true;
            $this->routePrefix = $value['route_prefix'];
            unset($value['route_prefix']);
        }

        if (array_key_exists('security', $value)) {
            $this->_usedProperties['security'] = true;
            $this->security = $value['security'];
            unset($value['security']);
        }

        if (array_key_exists('security_message', $value)) {
            $this->_usedProperties['securityMessage'] = true;
            $this->securityMessage = $value['security_message'];
            unset($value['security_message']);
        }

        if (array_key_exists('security_post_denormalize', $value)) {
            $this->_usedProperties['securityPostDenormalize'] = true;
            $this->securityPostDenormalize = $value['security_post_denormalize'];
            unset($value['security_post_denormalize']);
        }

        if (array_key_exists('security_post_denormalize_message', $value)) {
            $this->_usedProperties['securityPostDenormalizeMessage'] = true;
            $this->securityPostDenormalizeMessage = $value['security_post_denormalize_message'];
            unset($value['security_post_denormalize_message']);
        }

        if (array_key_exists('stateless', $value)) {
            $this->_usedProperties['stateless'] = true;
            $this->stateless = $value['stateless'];
            unset($value['stateless']);
        }

        if (array_key_exists('sunset', $value)) {
            $this->_usedProperties['sunset'] = true;
            $this->sunset = $value['sunset'];
            unset($value['sunset']);
        }

        if (array_key_exists('swagger_context', $value)) {
            $this->_usedProperties['swaggerContext'] = true;
            $this->swaggerContext = $value['swagger_context'];
            unset($value['swagger_context']);
        }

        if (array_key_exists('validation_groups', $value)) {
            $this->_usedProperties['validationGroups'] = true;
            $this->validationGroups = $value['validation_groups'];
            unset($value['validation_groups']);
        }

        if (array_key_exists('url_generation_strategy', $value)) {
            $this->_usedProperties['urlGenerationStrategy'] = true;
            $this->urlGenerationStrategy = $value['url_generation_strategy'];
            unset($value['url_generation_strategy']);
        }

        if (array_key_exists('composite_identifier', $value)) {
            $this->_usedProperties['compositeIdentifier'] = true;
            $this->compositeIdentifier = $value['composite_identifier'];
            unset($value['composite_identifier']);
        }

        $this->_extraKeys = $value;

    }

    public function toArray(): array
    {
        $output = [];
        if (isset($this->_usedProperties['collectionOperations'])) {
            $output['collection_operations'] = $this->collectionOperations;
        }
        if (isset($this->_usedProperties['description'])) {
            $output['description'] = $this->description;
        }
        if (isset($this->_usedProperties['graphql'])) {
            $output['graphql'] = $this->graphql;
        }
        if (isset($this->_usedProperties['iri'])) {
            $output['iri'] = $this->iri;
        }
        if (isset($this->_usedProperties['itemOperations'])) {
            $output['item_operations'] = $this->itemOperations;
        }
        if (isset($this->_usedProperties['shortName'])) {
            $output['short_name'] = $this->shortName;
        }
        if (isset($this->_usedProperties['subresourceOperations'])) {
            $output['subresource_operations'] = $this->subresourceOperations;
        }
        if (isset($this->_usedProperties['attributes'])) {
            $output['attributes'] = $this->attributes;
        }
        if (isset($this->_usedProperties['cacheHeaders'])) {
            $output['cache_headers'] = $this->cacheHeaders;
        }
        if (isset($this->_usedProperties['denormalizationContext'])) {
            $output['denormalization_context'] = $this->denormalizationContext;
        }
        if (isset($this->_usedProperties['deprecationReason'])) {
            $output['deprecation_reason'] = $this->deprecationReason;
        }
        if (isset($this->_usedProperties['elasticsearch'])) {
            $output['elasticsearch'] = $this->elasticsearch;
        }
        if (isset($this->_usedProperties['fetchPartial'])) {
            $output['fetch_partial'] = $this->fetchPartial;
        }
        if (isset($this->_usedProperties['forceEager'])) {
            $output['force_eager'] = $this->forceEager;
        }
        if (isset($this->_usedProperties['formats'])) {
            $output['formats'] = $this->formats;
        }
        if (isset($this->_usedProperties['filters'])) {
            $output['filters'] = $this->filters;
        }
        if (isset($this->_usedProperties['hydraContext'])) {
            $output['hydra_context'] = $this->hydraContext;
        }
        if (isset($this->_usedProperties['input'])) {
            $output['input'] = $this->input;
        }
        if (isset($this->_usedProperties['mercure'])) {
            $output['mercure'] = $this->mercure;
        }
        if (isset($this->_usedProperties['messenger'])) {
            $output['messenger'] = $this->messenger;
        }
        if (isset($this->_usedProperties['normalizationContext'])) {
            $output['normalization_context'] = $this->normalizationContext;
        }
        if (isset($this->_usedProperties['openapiContext'])) {
            $output['openapi_context'] = $this->openapiContext;
        }
        if (isset($this->_usedProperties['order'])) {
            $output['order'] = $this->order;
        }
        if (isset($this->_usedProperties['output'])) {
            $output['output'] = $this->output;
        }
        if (isset($this->_usedProperties['paginationClientEnabled'])) {
            $output['pagination_client_enabled'] = $this->paginationClientEnabled;
        }
        if (isset($this->_usedProperties['paginationClientItemsPerPage'])) {
            $output['pagination_client_items_per_page'] = $this->paginationClientItemsPerPage;
        }
        if (isset($this->_usedProperties['paginationClientPartial'])) {
            $output['pagination_client_partial'] = $this->paginationClientPartial;
        }
        if (isset($this->_usedProperties['paginationViaCursor'])) {
            $output['pagination_via_cursor'] = $this->paginationViaCursor;
        }
        if (isset($this->_usedProperties['paginationEnabled'])) {
            $output['pagination_enabled'] = $this->paginationEnabled;
        }
        if (isset($this->_usedProperties['paginationFetchJoinCollection'])) {
            $output['pagination_fetch_join_collection'] = $this->paginationFetchJoinCollection;
        }
        if (isset($this->_usedProperties['paginationItemsPerPage'])) {
            $output['pagination_items_per_page'] = $this->paginationItemsPerPage;
        }
        if (isset($this->_usedProperties['paginationMaximumItemsPerPage'])) {
            $output['pagination_maximum_items_per_page'] = $this->paginationMaximumItemsPerPage;
        }
        if (isset($this->_usedProperties['paginationPartial'])) {
            $output['pagination_partial'] = $this->paginationPartial;
        }
        if (isset($this->_usedProperties['routePrefix'])) {
            $output['route_prefix'] = $this->routePrefix;
        }
        if (isset($this->_usedProperties['security'])) {
            $output['security'] = $this->security;
        }
        if (isset($this->_usedProperties['securityMessage'])) {
            $output['security_message'] = $this->securityMessage;
        }
        if (isset($this->_usedProperties['securityPostDenormalize'])) {
            $output['security_post_denormalize'] = $this->securityPostDenormalize;
        }
        if (isset($this->_usedProperties['securityPostDenormalizeMessage'])) {
            $output['security_post_denormalize_message'] = $this->securityPostDenormalizeMessage;
        }
        if (isset($this->_usedProperties['stateless'])) {
            $output['stateless'] = $this->stateless;
        }
        if (isset($this->_usedProperties['sunset'])) {
            $output['sunset'] = $this->sunset;
        }
        if (isset($this->_usedProperties['swaggerContext'])) {
            $output['swagger_context'] = $this->swaggerContext;
        }
        if (isset($this->_usedProperties['validationGroups'])) {
            $output['validation_groups'] = $this->validationGroups;
        }
        if (isset($this->_usedProperties['urlGenerationStrategy'])) {
            $output['url_generation_strategy'] = $this->urlGenerationStrategy;
        }
        if (isset($this->_usedProperties['compositeIdentifier'])) {
            $output['composite_identifier'] = $this->compositeIdentifier;
        }

        return $output + $this->_extraKeys;
    }

    /**
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function set(string $key, $value): self
    {
        $this->_extraKeys[$key] = $value;

        return $this;
    }

}
