<?php

namespace Symfony\Config\SyliusCore\Resources\AvatarImage;

use Symfony\Component\Config\Loader\ParamConfigurator;
use Symfony\Component\Config\Definition\Exception\InvalidConfigurationException;

/**
 * This class is automatically generated to help in creating a config.
 */
class ClassesConfig 
{
    private $model;
    private $interface;
    private $repository;
    private $factory;
    private $_usedProperties = [];

    /**
     * @default 'Sylius\\Component\\Core\\Model\\AvatarImage'
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function model($value): self
    {
        $this->_usedProperties['model'] = true;
        $this->model = $value;

        return $this;
    }

    /**
     * @default 'Sylius\\Component\\Core\\Model\\AvatarImageInterface'
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function interface($value): self
    {
        $this->_usedProperties['interface'] = true;
        $this->interface = $value;

        return $this;
    }

    /**
     * @default 'Sylius\\Bundle\\CoreBundle\\Doctrine\\ORM\\AvatarImageRepository'
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function repository($value): self
    {
        $this->_usedProperties['repository'] = true;
        $this->repository = $value;

        return $this;
    }

    /**
     * @default 'Sylius\\Component\\Resource\\Factory\\Factory'
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function factory($value): self
    {
        $this->_usedProperties['factory'] = true;
        $this->factory = $value;

        return $this;
    }

    public function __construct(array $value = [])
    {
        if (array_key_exists('model', $value)) {
            $this->_usedProperties['model'] = true;
            $this->model = $value['model'];
            unset($value['model']);
        }

        if (array_key_exists('interface', $value)) {
            $this->_usedProperties['interface'] = true;
            $this->interface = $value['interface'];
            unset($value['interface']);
        }

        if (array_key_exists('repository', $value)) {
            $this->_usedProperties['repository'] = true;
            $this->repository = $value['repository'];
            unset($value['repository']);
        }

        if (array_key_exists('factory', $value)) {
            $this->_usedProperties['factory'] = true;
            $this->factory = $value['factory'];
            unset($value['factory']);
        }

        if ([] !== $value) {
            throw new InvalidConfigurationException(sprintf('The following keys are not supported by "%s": ', __CLASS__).implode(', ', array_keys($value)));
        }
    }

    public function toArray(): array
    {
        $output = [];
        if (isset($this->_usedProperties['model'])) {
            $output['model'] = $this->model;
        }
        if (isset($this->_usedProperties['interface'])) {
            $output['interface'] = $this->interface;
        }
        if (isset($this->_usedProperties['repository'])) {
            $output['repository'] = $this->repository;
        }
        if (isset($this->_usedProperties['factory'])) {
            $output['factory'] = $this->factory;
        }

        return $output;
    }

}
