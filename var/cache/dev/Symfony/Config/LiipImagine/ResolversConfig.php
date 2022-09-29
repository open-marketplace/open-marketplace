<?php

namespace Symfony\Config\LiipImagine;

require_once __DIR__.\DIRECTORY_SEPARATOR.'ResolversConfig'.\DIRECTORY_SEPARATOR.'WebPathConfig.php';
require_once __DIR__.\DIRECTORY_SEPARATOR.'ResolversConfig'.\DIRECTORY_SEPARATOR.'AwsS3Config.php';
require_once __DIR__.\DIRECTORY_SEPARATOR.'ResolversConfig'.\DIRECTORY_SEPARATOR.'FlysystemConfig.php';

use Symfony\Component\Config\Definition\Exception\InvalidConfigurationException;

/**
 * This class is automatically generated to help in creating a config.
 */
class ResolversConfig 
{
    private $webPath;
    private $awsS3;
    private $flysystem;
    private $_usedProperties = [];

    public function webPath(array $value = []): \Symfony\Config\LiipImagine\ResolversConfig\WebPathConfig
    {
        if (null === $this->webPath) {
            $this->_usedProperties['webPath'] = true;
            $this->webPath = new \Symfony\Config\LiipImagine\ResolversConfig\WebPathConfig($value);
        } elseif (0 < \func_num_args()) {
            throw new InvalidConfigurationException('The node created by "webPath()" has already been initialized. You cannot pass values the second time you call webPath().');
        }

        return $this->webPath;
    }

    public function awsS3(array $value = []): \Symfony\Config\LiipImagine\ResolversConfig\AwsS3Config
    {
        if (null === $this->awsS3) {
            $this->_usedProperties['awsS3'] = true;
            $this->awsS3 = new \Symfony\Config\LiipImagine\ResolversConfig\AwsS3Config($value);
        } elseif (0 < \func_num_args()) {
            throw new InvalidConfigurationException('The node created by "awsS3()" has already been initialized. You cannot pass values the second time you call awsS3().');
        }

        return $this->awsS3;
    }

    public function flysystem(array $value = []): \Symfony\Config\LiipImagine\ResolversConfig\FlysystemConfig
    {
        if (null === $this->flysystem) {
            $this->_usedProperties['flysystem'] = true;
            $this->flysystem = new \Symfony\Config\LiipImagine\ResolversConfig\FlysystemConfig($value);
        } elseif (0 < \func_num_args()) {
            throw new InvalidConfigurationException('The node created by "flysystem()" has already been initialized. You cannot pass values the second time you call flysystem().');
        }

        return $this->flysystem;
    }

    public function __construct(array $value = [])
    {
        if (array_key_exists('web_path', $value)) {
            $this->_usedProperties['webPath'] = true;
            $this->webPath = new \Symfony\Config\LiipImagine\ResolversConfig\WebPathConfig($value['web_path']);
            unset($value['web_path']);
        }

        if (array_key_exists('aws_s3', $value)) {
            $this->_usedProperties['awsS3'] = true;
            $this->awsS3 = new \Symfony\Config\LiipImagine\ResolversConfig\AwsS3Config($value['aws_s3']);
            unset($value['aws_s3']);
        }

        if (array_key_exists('flysystem', $value)) {
            $this->_usedProperties['flysystem'] = true;
            $this->flysystem = new \Symfony\Config\LiipImagine\ResolversConfig\FlysystemConfig($value['flysystem']);
            unset($value['flysystem']);
        }

        if ([] !== $value) {
            throw new InvalidConfigurationException(sprintf('The following keys are not supported by "%s": ', __CLASS__).implode(', ', array_keys($value)));
        }
    }

    public function toArray(): array
    {
        $output = [];
        if (isset($this->_usedProperties['webPath'])) {
            $output['web_path'] = $this->webPath->toArray();
        }
        if (isset($this->_usedProperties['awsS3'])) {
            $output['aws_s3'] = $this->awsS3->toArray();
        }
        if (isset($this->_usedProperties['flysystem'])) {
            $output['flysystem'] = $this->flysystem->toArray();
        }

        return $output;
    }

}
