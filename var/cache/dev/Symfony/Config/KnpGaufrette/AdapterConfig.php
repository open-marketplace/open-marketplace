<?php

namespace Symfony\Config\KnpGaufrette;

require_once __DIR__.\DIRECTORY_SEPARATOR.'AdapterConfig'.\DIRECTORY_SEPARATOR.'InMemoryConfig.php';
require_once __DIR__.\DIRECTORY_SEPARATOR.'AdapterConfig'.\DIRECTORY_SEPARATOR.'ServiceConfig.php';
require_once __DIR__.\DIRECTORY_SEPARATOR.'AdapterConfig'.\DIRECTORY_SEPARATOR.'LocalConfig.php';
require_once __DIR__.\DIRECTORY_SEPARATOR.'AdapterConfig'.\DIRECTORY_SEPARATOR.'SafeLocalConfig.php';
require_once __DIR__.\DIRECTORY_SEPARATOR.'AdapterConfig'.\DIRECTORY_SEPARATOR.'AmazonS3Config.php';
require_once __DIR__.\DIRECTORY_SEPARATOR.'AdapterConfig'.\DIRECTORY_SEPARATOR.'AwsS3Config.php';
require_once __DIR__.\DIRECTORY_SEPARATOR.'AdapterConfig'.\DIRECTORY_SEPARATOR.'AclAwareAmazonS3Config.php';
require_once __DIR__.\DIRECTORY_SEPARATOR.'AdapterConfig'.\DIRECTORY_SEPARATOR.'DoctrineDbalConfig.php';
require_once __DIR__.\DIRECTORY_SEPARATOR.'AdapterConfig'.\DIRECTORY_SEPARATOR.'OpencloudConfig.php';
require_once __DIR__.\DIRECTORY_SEPARATOR.'AdapterConfig'.\DIRECTORY_SEPARATOR.'AzureBlobStorageConfig.php';
require_once __DIR__.\DIRECTORY_SEPARATOR.'AdapterConfig'.\DIRECTORY_SEPARATOR.'GoogleCloudStorageConfig.php';
require_once __DIR__.\DIRECTORY_SEPARATOR.'AdapterConfig'.\DIRECTORY_SEPARATOR.'GridfsConfig.php';
require_once __DIR__.\DIRECTORY_SEPARATOR.'AdapterConfig'.\DIRECTORY_SEPARATOR.'MogilefsConfig.php';
require_once __DIR__.\DIRECTORY_SEPARATOR.'AdapterConfig'.\DIRECTORY_SEPARATOR.'FtpConfig.php';
require_once __DIR__.\DIRECTORY_SEPARATOR.'AdapterConfig'.\DIRECTORY_SEPARATOR.'SftpConfig.php';
require_once __DIR__.\DIRECTORY_SEPARATOR.'AdapterConfig'.\DIRECTORY_SEPARATOR.'PhpseclibSftpConfig.php';
require_once __DIR__.\DIRECTORY_SEPARATOR.'AdapterConfig'.\DIRECTORY_SEPARATOR.'ApcConfig.php';
require_once __DIR__.\DIRECTORY_SEPARATOR.'AdapterConfig'.\DIRECTORY_SEPARATOR.'CacheConfig.php';
require_once __DIR__.\DIRECTORY_SEPARATOR.'AdapterConfig'.\DIRECTORY_SEPARATOR.'DropboxConfig.php';

use Symfony\Component\Config\Definition\Exception\InvalidConfigurationException;

/**
 * This class is automatically generated to help in creating a config.
 */
class AdapterConfig 
{
    private $inMemory;
    private $service;
    private $local;
    private $safeLocal;
    private $amazonS3;
    private $awsS3;
    private $aclAwareAmazonS3;
    private $doctrineDbal;
    private $opencloud;
    private $azureBlobStorage;
    private $googleCloudStorage;
    private $gridfs;
    private $mogilefs;
    private $ftp;
    private $sftp;
    private $phpseclibSftp;
    private $apc;
    private $cache;
    private $dropbox;
    private $_usedProperties = [];

    public function inMemory(array $value = []): \Symfony\Config\KnpGaufrette\AdapterConfig\InMemoryConfig
    {
        if (null === $this->inMemory) {
            $this->_usedProperties['inMemory'] = true;
            $this->inMemory = new \Symfony\Config\KnpGaufrette\AdapterConfig\InMemoryConfig($value);
        } elseif (0 < \func_num_args()) {
            throw new InvalidConfigurationException('The node created by "inMemory()" has already been initialized. You cannot pass values the second time you call inMemory().');
        }

        return $this->inMemory;
    }

    public function service(array $value = []): \Symfony\Config\KnpGaufrette\AdapterConfig\ServiceConfig
    {
        if (null === $this->service) {
            $this->_usedProperties['service'] = true;
            $this->service = new \Symfony\Config\KnpGaufrette\AdapterConfig\ServiceConfig($value);
        } elseif (0 < \func_num_args()) {
            throw new InvalidConfigurationException('The node created by "service()" has already been initialized. You cannot pass values the second time you call service().');
        }

        return $this->service;
    }

    public function local(array $value = []): \Symfony\Config\KnpGaufrette\AdapterConfig\LocalConfig
    {
        if (null === $this->local) {
            $this->_usedProperties['local'] = true;
            $this->local = new \Symfony\Config\KnpGaufrette\AdapterConfig\LocalConfig($value);
        } elseif (0 < \func_num_args()) {
            throw new InvalidConfigurationException('The node created by "local()" has already been initialized. You cannot pass values the second time you call local().');
        }

        return $this->local;
    }

    public function safeLocal(array $value = []): \Symfony\Config\KnpGaufrette\AdapterConfig\SafeLocalConfig
    {
        if (null === $this->safeLocal) {
            $this->_usedProperties['safeLocal'] = true;
            $this->safeLocal = new \Symfony\Config\KnpGaufrette\AdapterConfig\SafeLocalConfig($value);
        } elseif (0 < \func_num_args()) {
            throw new InvalidConfigurationException('The node created by "safeLocal()" has already been initialized. You cannot pass values the second time you call safeLocal().');
        }

        return $this->safeLocal;
    }

    public function amazonS3(array $value = []): \Symfony\Config\KnpGaufrette\AdapterConfig\AmazonS3Config
    {
        if (null === $this->amazonS3) {
            $this->_usedProperties['amazonS3'] = true;
            $this->amazonS3 = new \Symfony\Config\KnpGaufrette\AdapterConfig\AmazonS3Config($value);
        } elseif (0 < \func_num_args()) {
            throw new InvalidConfigurationException('The node created by "amazonS3()" has already been initialized. You cannot pass values the second time you call amazonS3().');
        }

        return $this->amazonS3;
    }

    public function awsS3(array $value = []): \Symfony\Config\KnpGaufrette\AdapterConfig\AwsS3Config
    {
        if (null === $this->awsS3) {
            $this->_usedProperties['awsS3'] = true;
            $this->awsS3 = new \Symfony\Config\KnpGaufrette\AdapterConfig\AwsS3Config($value);
        } elseif (0 < \func_num_args()) {
            throw new InvalidConfigurationException('The node created by "awsS3()" has already been initialized. You cannot pass values the second time you call awsS3().');
        }

        return $this->awsS3;
    }

    public function aclAwareAmazonS3(array $value = []): \Symfony\Config\KnpGaufrette\AdapterConfig\AclAwareAmazonS3Config
    {
        if (null === $this->aclAwareAmazonS3) {
            $this->_usedProperties['aclAwareAmazonS3'] = true;
            $this->aclAwareAmazonS3 = new \Symfony\Config\KnpGaufrette\AdapterConfig\AclAwareAmazonS3Config($value);
        } elseif (0 < \func_num_args()) {
            throw new InvalidConfigurationException('The node created by "aclAwareAmazonS3()" has already been initialized. You cannot pass values the second time you call aclAwareAmazonS3().');
        }

        return $this->aclAwareAmazonS3;
    }

    public function doctrineDbal(array $value = []): \Symfony\Config\KnpGaufrette\AdapterConfig\DoctrineDbalConfig
    {
        if (null === $this->doctrineDbal) {
            $this->_usedProperties['doctrineDbal'] = true;
            $this->doctrineDbal = new \Symfony\Config\KnpGaufrette\AdapterConfig\DoctrineDbalConfig($value);
        } elseif (0 < \func_num_args()) {
            throw new InvalidConfigurationException('The node created by "doctrineDbal()" has already been initialized. You cannot pass values the second time you call doctrineDbal().');
        }

        return $this->doctrineDbal;
    }

    public function opencloud(array $value = []): \Symfony\Config\KnpGaufrette\AdapterConfig\OpencloudConfig
    {
        if (null === $this->opencloud) {
            $this->_usedProperties['opencloud'] = true;
            $this->opencloud = new \Symfony\Config\KnpGaufrette\AdapterConfig\OpencloudConfig($value);
        } elseif (0 < \func_num_args()) {
            throw new InvalidConfigurationException('The node created by "opencloud()" has already been initialized. You cannot pass values the second time you call opencloud().');
        }

        return $this->opencloud;
    }

    public function azureBlobStorage(array $value = []): \Symfony\Config\KnpGaufrette\AdapterConfig\AzureBlobStorageConfig
    {
        if (null === $this->azureBlobStorage) {
            $this->_usedProperties['azureBlobStorage'] = true;
            $this->azureBlobStorage = new \Symfony\Config\KnpGaufrette\AdapterConfig\AzureBlobStorageConfig($value);
        } elseif (0 < \func_num_args()) {
            throw new InvalidConfigurationException('The node created by "azureBlobStorage()" has already been initialized. You cannot pass values the second time you call azureBlobStorage().');
        }

        return $this->azureBlobStorage;
    }

    public function googleCloudStorage(array $value = []): \Symfony\Config\KnpGaufrette\AdapterConfig\GoogleCloudStorageConfig
    {
        if (null === $this->googleCloudStorage) {
            $this->_usedProperties['googleCloudStorage'] = true;
            $this->googleCloudStorage = new \Symfony\Config\KnpGaufrette\AdapterConfig\GoogleCloudStorageConfig($value);
        } elseif (0 < \func_num_args()) {
            throw new InvalidConfigurationException('The node created by "googleCloudStorage()" has already been initialized. You cannot pass values the second time you call googleCloudStorage().');
        }

        return $this->googleCloudStorage;
    }

    public function gridfs(array $value = []): \Symfony\Config\KnpGaufrette\AdapterConfig\GridfsConfig
    {
        if (null === $this->gridfs) {
            $this->_usedProperties['gridfs'] = true;
            $this->gridfs = new \Symfony\Config\KnpGaufrette\AdapterConfig\GridfsConfig($value);
        } elseif (0 < \func_num_args()) {
            throw new InvalidConfigurationException('The node created by "gridfs()" has already been initialized. You cannot pass values the second time you call gridfs().');
        }

        return $this->gridfs;
    }

    public function mogilefs(array $value = []): \Symfony\Config\KnpGaufrette\AdapterConfig\MogilefsConfig
    {
        if (null === $this->mogilefs) {
            $this->_usedProperties['mogilefs'] = true;
            $this->mogilefs = new \Symfony\Config\KnpGaufrette\AdapterConfig\MogilefsConfig($value);
        } elseif (0 < \func_num_args()) {
            throw new InvalidConfigurationException('The node created by "mogilefs()" has already been initialized. You cannot pass values the second time you call mogilefs().');
        }

        return $this->mogilefs;
    }

    public function ftp(array $value = []): \Symfony\Config\KnpGaufrette\AdapterConfig\FtpConfig
    {
        if (null === $this->ftp) {
            $this->_usedProperties['ftp'] = true;
            $this->ftp = new \Symfony\Config\KnpGaufrette\AdapterConfig\FtpConfig($value);
        } elseif (0 < \func_num_args()) {
            throw new InvalidConfigurationException('The node created by "ftp()" has already been initialized. You cannot pass values the second time you call ftp().');
        }

        return $this->ftp;
    }

    public function sftp(array $value = []): \Symfony\Config\KnpGaufrette\AdapterConfig\SftpConfig
    {
        if (null === $this->sftp) {
            $this->_usedProperties['sftp'] = true;
            $this->sftp = new \Symfony\Config\KnpGaufrette\AdapterConfig\SftpConfig($value);
        } elseif (0 < \func_num_args()) {
            throw new InvalidConfigurationException('The node created by "sftp()" has already been initialized. You cannot pass values the second time you call sftp().');
        }

        return $this->sftp;
    }

    public function phpseclibSftp(array $value = []): \Symfony\Config\KnpGaufrette\AdapterConfig\PhpseclibSftpConfig
    {
        if (null === $this->phpseclibSftp) {
            $this->_usedProperties['phpseclibSftp'] = true;
            $this->phpseclibSftp = new \Symfony\Config\KnpGaufrette\AdapterConfig\PhpseclibSftpConfig($value);
        } elseif (0 < \func_num_args()) {
            throw new InvalidConfigurationException('The node created by "phpseclibSftp()" has already been initialized. You cannot pass values the second time you call phpseclibSftp().');
        }

        return $this->phpseclibSftp;
    }

    public function apc(array $value = []): \Symfony\Config\KnpGaufrette\AdapterConfig\ApcConfig
    {
        if (null === $this->apc) {
            $this->_usedProperties['apc'] = true;
            $this->apc = new \Symfony\Config\KnpGaufrette\AdapterConfig\ApcConfig($value);
        } elseif (0 < \func_num_args()) {
            throw new InvalidConfigurationException('The node created by "apc()" has already been initialized. You cannot pass values the second time you call apc().');
        }

        return $this->apc;
    }

    public function cache(array $value = []): \Symfony\Config\KnpGaufrette\AdapterConfig\CacheConfig
    {
        if (null === $this->cache) {
            $this->_usedProperties['cache'] = true;
            $this->cache = new \Symfony\Config\KnpGaufrette\AdapterConfig\CacheConfig($value);
        } elseif (0 < \func_num_args()) {
            throw new InvalidConfigurationException('The node created by "cache()" has already been initialized. You cannot pass values the second time you call cache().');
        }

        return $this->cache;
    }

    public function dropbox(array $value = []): \Symfony\Config\KnpGaufrette\AdapterConfig\DropboxConfig
    {
        if (null === $this->dropbox) {
            $this->_usedProperties['dropbox'] = true;
            $this->dropbox = new \Symfony\Config\KnpGaufrette\AdapterConfig\DropboxConfig($value);
        } elseif (0 < \func_num_args()) {
            throw new InvalidConfigurationException('The node created by "dropbox()" has already been initialized. You cannot pass values the second time you call dropbox().');
        }

        return $this->dropbox;
    }

    public function __construct(array $value = [])
    {
        if (array_key_exists('in_memory', $value)) {
            $this->_usedProperties['inMemory'] = true;
            $this->inMemory = new \Symfony\Config\KnpGaufrette\AdapterConfig\InMemoryConfig($value['in_memory']);
            unset($value['in_memory']);
        }

        if (array_key_exists('service', $value)) {
            $this->_usedProperties['service'] = true;
            $this->service = new \Symfony\Config\KnpGaufrette\AdapterConfig\ServiceConfig($value['service']);
            unset($value['service']);
        }

        if (array_key_exists('local', $value)) {
            $this->_usedProperties['local'] = true;
            $this->local = new \Symfony\Config\KnpGaufrette\AdapterConfig\LocalConfig($value['local']);
            unset($value['local']);
        }

        if (array_key_exists('safe_local', $value)) {
            $this->_usedProperties['safeLocal'] = true;
            $this->safeLocal = new \Symfony\Config\KnpGaufrette\AdapterConfig\SafeLocalConfig($value['safe_local']);
            unset($value['safe_local']);
        }

        if (array_key_exists('amazon_s3', $value)) {
            $this->_usedProperties['amazonS3'] = true;
            $this->amazonS3 = new \Symfony\Config\KnpGaufrette\AdapterConfig\AmazonS3Config($value['amazon_s3']);
            unset($value['amazon_s3']);
        }

        if (array_key_exists('aws_s3', $value)) {
            $this->_usedProperties['awsS3'] = true;
            $this->awsS3 = new \Symfony\Config\KnpGaufrette\AdapterConfig\AwsS3Config($value['aws_s3']);
            unset($value['aws_s3']);
        }

        if (array_key_exists('acl_aware_amazon_s3', $value)) {
            $this->_usedProperties['aclAwareAmazonS3'] = true;
            $this->aclAwareAmazonS3 = new \Symfony\Config\KnpGaufrette\AdapterConfig\AclAwareAmazonS3Config($value['acl_aware_amazon_s3']);
            unset($value['acl_aware_amazon_s3']);
        }

        if (array_key_exists('doctrine_dbal', $value)) {
            $this->_usedProperties['doctrineDbal'] = true;
            $this->doctrineDbal = new \Symfony\Config\KnpGaufrette\AdapterConfig\DoctrineDbalConfig($value['doctrine_dbal']);
            unset($value['doctrine_dbal']);
        }

        if (array_key_exists('opencloud', $value)) {
            $this->_usedProperties['opencloud'] = true;
            $this->opencloud = new \Symfony\Config\KnpGaufrette\AdapterConfig\OpencloudConfig($value['opencloud']);
            unset($value['opencloud']);
        }

        if (array_key_exists('azure_blob_storage', $value)) {
            $this->_usedProperties['azureBlobStorage'] = true;
            $this->azureBlobStorage = new \Symfony\Config\KnpGaufrette\AdapterConfig\AzureBlobStorageConfig($value['azure_blob_storage']);
            unset($value['azure_blob_storage']);
        }

        if (array_key_exists('google_cloud_storage', $value)) {
            $this->_usedProperties['googleCloudStorage'] = true;
            $this->googleCloudStorage = new \Symfony\Config\KnpGaufrette\AdapterConfig\GoogleCloudStorageConfig($value['google_cloud_storage']);
            unset($value['google_cloud_storage']);
        }

        if (array_key_exists('gridfs', $value)) {
            $this->_usedProperties['gridfs'] = true;
            $this->gridfs = new \Symfony\Config\KnpGaufrette\AdapterConfig\GridfsConfig($value['gridfs']);
            unset($value['gridfs']);
        }

        if (array_key_exists('mogilefs', $value)) {
            $this->_usedProperties['mogilefs'] = true;
            $this->mogilefs = new \Symfony\Config\KnpGaufrette\AdapterConfig\MogilefsConfig($value['mogilefs']);
            unset($value['mogilefs']);
        }

        if (array_key_exists('ftp', $value)) {
            $this->_usedProperties['ftp'] = true;
            $this->ftp = new \Symfony\Config\KnpGaufrette\AdapterConfig\FtpConfig($value['ftp']);
            unset($value['ftp']);
        }

        if (array_key_exists('sftp', $value)) {
            $this->_usedProperties['sftp'] = true;
            $this->sftp = new \Symfony\Config\KnpGaufrette\AdapterConfig\SftpConfig($value['sftp']);
            unset($value['sftp']);
        }

        if (array_key_exists('phpseclib_sftp', $value)) {
            $this->_usedProperties['phpseclibSftp'] = true;
            $this->phpseclibSftp = new \Symfony\Config\KnpGaufrette\AdapterConfig\PhpseclibSftpConfig($value['phpseclib_sftp']);
            unset($value['phpseclib_sftp']);
        }

        if (array_key_exists('apc', $value)) {
            $this->_usedProperties['apc'] = true;
            $this->apc = new \Symfony\Config\KnpGaufrette\AdapterConfig\ApcConfig($value['apc']);
            unset($value['apc']);
        }

        if (array_key_exists('cache', $value)) {
            $this->_usedProperties['cache'] = true;
            $this->cache = new \Symfony\Config\KnpGaufrette\AdapterConfig\CacheConfig($value['cache']);
            unset($value['cache']);
        }

        if (array_key_exists('dropbox', $value)) {
            $this->_usedProperties['dropbox'] = true;
            $this->dropbox = new \Symfony\Config\KnpGaufrette\AdapterConfig\DropboxConfig($value['dropbox']);
            unset($value['dropbox']);
        }

        if ([] !== $value) {
            throw new InvalidConfigurationException(sprintf('The following keys are not supported by "%s": ', __CLASS__).implode(', ', array_keys($value)));
        }
    }

    public function toArray(): array
    {
        $output = [];
        if (isset($this->_usedProperties['inMemory'])) {
            $output['in_memory'] = $this->inMemory->toArray();
        }
        if (isset($this->_usedProperties['service'])) {
            $output['service'] = $this->service->toArray();
        }
        if (isset($this->_usedProperties['local'])) {
            $output['local'] = $this->local->toArray();
        }
        if (isset($this->_usedProperties['safeLocal'])) {
            $output['safe_local'] = $this->safeLocal->toArray();
        }
        if (isset($this->_usedProperties['amazonS3'])) {
            $output['amazon_s3'] = $this->amazonS3->toArray();
        }
        if (isset($this->_usedProperties['awsS3'])) {
            $output['aws_s3'] = $this->awsS3->toArray();
        }
        if (isset($this->_usedProperties['aclAwareAmazonS3'])) {
            $output['acl_aware_amazon_s3'] = $this->aclAwareAmazonS3->toArray();
        }
        if (isset($this->_usedProperties['doctrineDbal'])) {
            $output['doctrine_dbal'] = $this->doctrineDbal->toArray();
        }
        if (isset($this->_usedProperties['opencloud'])) {
            $output['opencloud'] = $this->opencloud->toArray();
        }
        if (isset($this->_usedProperties['azureBlobStorage'])) {
            $output['azure_blob_storage'] = $this->azureBlobStorage->toArray();
        }
        if (isset($this->_usedProperties['googleCloudStorage'])) {
            $output['google_cloud_storage'] = $this->googleCloudStorage->toArray();
        }
        if (isset($this->_usedProperties['gridfs'])) {
            $output['gridfs'] = $this->gridfs->toArray();
        }
        if (isset($this->_usedProperties['mogilefs'])) {
            $output['mogilefs'] = $this->mogilefs->toArray();
        }
        if (isset($this->_usedProperties['ftp'])) {
            $output['ftp'] = $this->ftp->toArray();
        }
        if (isset($this->_usedProperties['sftp'])) {
            $output['sftp'] = $this->sftp->toArray();
        }
        if (isset($this->_usedProperties['phpseclibSftp'])) {
            $output['phpseclib_sftp'] = $this->phpseclibSftp->toArray();
        }
        if (isset($this->_usedProperties['apc'])) {
            $output['apc'] = $this->apc->toArray();
        }
        if (isset($this->_usedProperties['cache'])) {
            $output['cache'] = $this->cache->toArray();
        }
        if (isset($this->_usedProperties['dropbox'])) {
            $output['dropbox'] = $this->dropbox->toArray();
        }

        return $output;
    }

}
