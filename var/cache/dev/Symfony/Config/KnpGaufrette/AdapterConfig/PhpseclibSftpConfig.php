<?php

namespace Symfony\Config\KnpGaufrette\AdapterConfig;

use Symfony\Component\Config\Loader\ParamConfigurator;
use Symfony\Component\Config\Definition\Exception\InvalidConfigurationException;

/**
 * This class is automatically generated to help in creating a config.
 */
class PhpseclibSftpConfig 
{
    private $phpseclibSftpId;
    private $directory;
    private $create;
    private $_usedProperties = [];

    /**
     * @default null
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function phpseclibSftpId($value): self
    {
        $this->_usedProperties['phpseclibSftpId'] = true;
        $this->phpseclibSftpId = $value;

        return $this;
    }

    /**
     * @default null
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function directory($value): self
    {
        $this->_usedProperties['directory'] = true;
        $this->directory = $value;

        return $this;
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

    public function __construct(array $value = [])
    {
        if (array_key_exists('phpseclib_sftp_id', $value)) {
            $this->_usedProperties['phpseclibSftpId'] = true;
            $this->phpseclibSftpId = $value['phpseclib_sftp_id'];
            unset($value['phpseclib_sftp_id']);
        }

        if (array_key_exists('directory', $value)) {
            $this->_usedProperties['directory'] = true;
            $this->directory = $value['directory'];
            unset($value['directory']);
        }

        if (array_key_exists('create', $value)) {
            $this->_usedProperties['create'] = true;
            $this->create = $value['create'];
            unset($value['create']);
        }

        if ([] !== $value) {
            throw new InvalidConfigurationException(sprintf('The following keys are not supported by "%s": ', __CLASS__).implode(', ', array_keys($value)));
        }
    }

    public function toArray(): array
    {
        $output = [];
        if (isset($this->_usedProperties['phpseclibSftpId'])) {
            $output['phpseclib_sftp_id'] = $this->phpseclibSftpId;
        }
        if (isset($this->_usedProperties['directory'])) {
            $output['directory'] = $this->directory;
        }
        if (isset($this->_usedProperties['create'])) {
            $output['create'] = $this->create;
        }

        return $output;
    }

}
