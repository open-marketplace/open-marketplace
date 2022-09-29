<?php

namespace Symfony\Config\KnpGaufrette\AdapterConfig;

require_once __DIR__.\DIRECTORY_SEPARATOR.'AclAwareAmazonS3'.\DIRECTORY_SEPARATOR.'UserConfig.php';
require_once __DIR__.\DIRECTORY_SEPARATOR.'AclAwareAmazonS3'.\DIRECTORY_SEPARATOR.'OptionsConfig.php';

use Symfony\Component\Config\Loader\ParamConfigurator;
use Symfony\Component\Config\Definition\Exception\InvalidConfigurationException;

/**
 * This class is automatically generated to help in creating a config.
 */
class AclAwareAmazonS3Config 
{
    private $amazonS3Id;
    private $bucketName;
    private $acl;
    private $users;
    private $create;
    private $options;
    private $_usedProperties = [];

    /**
     * @default null
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function amazonS3Id($value): self
    {
        $this->_usedProperties['amazonS3Id'] = true;
        $this->amazonS3Id = $value;

        return $this;
    }

    /**
     * @default null
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function bucketName($value): self
    {
        $this->_usedProperties['bucketName'] = true;
        $this->bucketName = $value;

        return $this;
    }

    /**
     * @default null
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function acl($value): self
    {
        $this->_usedProperties['acl'] = true;
        $this->acl = $value;

        return $this;
    }

    public function user(array $value = []): \Symfony\Config\KnpGaufrette\AdapterConfig\AclAwareAmazonS3\UserConfig
    {
        $this->_usedProperties['users'] = true;

        return $this->users[] = new \Symfony\Config\KnpGaufrette\AdapterConfig\AclAwareAmazonS3\UserConfig($value);
    }

    /**
     * @default false
     * @param ParamConfigurator|bool $value
     * @return $this
     */
    public function create($value): self
    {
        $this->_usedProperties['create'] = true;
        $this->create = $value;

        return $this;
    }

    public function options(array $value = []): \Symfony\Config\KnpGaufrette\AdapterConfig\AclAwareAmazonS3\OptionsConfig
    {
        if (null === $this->options) {
            $this->_usedProperties['options'] = true;
            $this->options = new \Symfony\Config\KnpGaufrette\AdapterConfig\AclAwareAmazonS3\OptionsConfig($value);
        } elseif (0 < \func_num_args()) {
            throw new InvalidConfigurationException('The node created by "options()" has already been initialized. You cannot pass values the second time you call options().');
        }

        return $this->options;
    }

    public function __construct(array $value = [])
    {
        if (array_key_exists('amazon_s3_id', $value)) {
            $this->_usedProperties['amazonS3Id'] = true;
            $this->amazonS3Id = $value['amazon_s3_id'];
            unset($value['amazon_s3_id']);
        }

        if (array_key_exists('bucket_name', $value)) {
            $this->_usedProperties['bucketName'] = true;
            $this->bucketName = $value['bucket_name'];
            unset($value['bucket_name']);
        }

        if (array_key_exists('acl', $value)) {
            $this->_usedProperties['acl'] = true;
            $this->acl = $value['acl'];
            unset($value['acl']);
        }

        if (array_key_exists('users', $value)) {
            $this->_usedProperties['users'] = true;
            $this->users = array_map(function ($v) { return new \Symfony\Config\KnpGaufrette\AdapterConfig\AclAwareAmazonS3\UserConfig($v); }, $value['users']);
            unset($value['users']);
        }

        if (array_key_exists('create', $value)) {
            $this->_usedProperties['create'] = true;
            $this->create = $value['create'];
            unset($value['create']);
        }

        if (array_key_exists('options', $value)) {
            $this->_usedProperties['options'] = true;
            $this->options = new \Symfony\Config\KnpGaufrette\AdapterConfig\AclAwareAmazonS3\OptionsConfig($value['options']);
            unset($value['options']);
        }

        if ([] !== $value) {
            throw new InvalidConfigurationException(sprintf('The following keys are not supported by "%s": ', __CLASS__).implode(', ', array_keys($value)));
        }
    }

    public function toArray(): array
    {
        $output = [];
        if (isset($this->_usedProperties['amazonS3Id'])) {
            $output['amazon_s3_id'] = $this->amazonS3Id;
        }
        if (isset($this->_usedProperties['bucketName'])) {
            $output['bucket_name'] = $this->bucketName;
        }
        if (isset($this->_usedProperties['acl'])) {
            $output['acl'] = $this->acl;
        }
        if (isset($this->_usedProperties['users'])) {
            $output['users'] = array_map(function ($v) { return $v->toArray(); }, $this->users);
        }
        if (isset($this->_usedProperties['create'])) {
            $output['create'] = $this->create;
        }
        if (isset($this->_usedProperties['options'])) {
            $output['options'] = $this->options->toArray();
        }

        return $output;
    }

}
