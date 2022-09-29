<?php

namespace Symfony\Config\LiipImagine\LoadersConfig;

use Symfony\Component\Config\Loader\ParamConfigurator;
use Symfony\Component\Config\Definition\Exception\InvalidConfigurationException;

/**
 * This class is automatically generated to help in creating a config.
 */
class FlysystemConfig 
{
    private $filesystemService;
    private $_usedProperties = [];

    /**
     * @default null
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function filesystemService($value): self
    {
        $this->_usedProperties['filesystemService'] = true;
        $this->filesystemService = $value;

        return $this;
    }

    public function __construct(array $value = [])
    {
        if (array_key_exists('filesystem_service', $value)) {
            $this->_usedProperties['filesystemService'] = true;
            $this->filesystemService = $value['filesystem_service'];
            unset($value['filesystem_service']);
        }

        if ([] !== $value) {
            throw new InvalidConfigurationException(sprintf('The following keys are not supported by "%s": ', __CLASS__).implode(', ', array_keys($value)));
        }
    }

    public function toArray(): array
    {
        $output = [];
        if (isset($this->_usedProperties['filesystemService'])) {
            $output['filesystem_service'] = $this->filesystemService;
        }

        return $output;
    }

}
