<?php

namespace Symfony\Config\StofDoctrineExtensions;

use Symfony\Component\Config\Loader\ParamConfigurator;
use Symfony\Component\Config\Definition\Exception\InvalidConfigurationException;

/**
 * This class is automatically generated to help in creating a config.
 */
class UploadableConfig 
{
    private $defaultFilePath;
    private $mimeTypeGuesserClass;
    private $defaultFileInfoClass;
    private $validateWritableDirectory;
    private $_usedProperties = [];

    /**
     * @default null
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function defaultFilePath($value): self
    {
        $this->_usedProperties['defaultFilePath'] = true;
        $this->defaultFilePath = $value;

        return $this;
    }

    /**
     * @default 'Stof\\DoctrineExtensionsBundle\\Uploadable\\MimeTypeGuesserAdapter'
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function mimeTypeGuesserClass($value): self
    {
        $this->_usedProperties['mimeTypeGuesserClass'] = true;
        $this->mimeTypeGuesserClass = $value;

        return $this;
    }

    /**
     * @default 'Stof\\DoctrineExtensionsBundle\\Uploadable\\UploadedFileInfo'
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function defaultFileInfoClass($value): self
    {
        $this->_usedProperties['defaultFileInfoClass'] = true;
        $this->defaultFileInfoClass = $value;

        return $this;
    }

    /**
     * @default true
     * @param ParamConfigurator|bool $value
     * @return $this
     */
    public function validateWritableDirectory($value): self
    {
        $this->_usedProperties['validateWritableDirectory'] = true;
        $this->validateWritableDirectory = $value;

        return $this;
    }

    public function __construct(array $value = [])
    {
        if (array_key_exists('default_file_path', $value)) {
            $this->_usedProperties['defaultFilePath'] = true;
            $this->defaultFilePath = $value['default_file_path'];
            unset($value['default_file_path']);
        }

        if (array_key_exists('mime_type_guesser_class', $value)) {
            $this->_usedProperties['mimeTypeGuesserClass'] = true;
            $this->mimeTypeGuesserClass = $value['mime_type_guesser_class'];
            unset($value['mime_type_guesser_class']);
        }

        if (array_key_exists('default_file_info_class', $value)) {
            $this->_usedProperties['defaultFileInfoClass'] = true;
            $this->defaultFileInfoClass = $value['default_file_info_class'];
            unset($value['default_file_info_class']);
        }

        if (array_key_exists('validate_writable_directory', $value)) {
            $this->_usedProperties['validateWritableDirectory'] = true;
            $this->validateWritableDirectory = $value['validate_writable_directory'];
            unset($value['validate_writable_directory']);
        }

        if ([] !== $value) {
            throw new InvalidConfigurationException(sprintf('The following keys are not supported by "%s": ', __CLASS__).implode(', ', array_keys($value)));
        }
    }

    public function toArray(): array
    {
        $output = [];
        if (isset($this->_usedProperties['defaultFilePath'])) {
            $output['default_file_path'] = $this->defaultFilePath;
        }
        if (isset($this->_usedProperties['mimeTypeGuesserClass'])) {
            $output['mime_type_guesser_class'] = $this->mimeTypeGuesserClass;
        }
        if (isset($this->_usedProperties['defaultFileInfoClass'])) {
            $output['default_file_info_class'] = $this->defaultFileInfoClass;
        }
        if (isset($this->_usedProperties['validateWritableDirectory'])) {
            $output['validate_writable_directory'] = $this->validateWritableDirectory;
        }

        return $output;
    }

}
