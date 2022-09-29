<?php

namespace Symfony\Config;

use Symfony\Component\Config\Definition\Exception\InvalidConfigurationException;

/**
 * This class is automatically generated to help in creating a config.
 */
class SyliusCalendarConfig implements \Symfony\Component\Config\Builder\ConfigBuilderInterface
{

    public function getExtensionAlias(): string
    {
        return 'sylius_calendar';
    }

    public function __construct(array $value = [])
    {
        if ([] !== $value) {
            throw new InvalidConfigurationException(sprintf('The following keys are not supported by "%s": ', __CLASS__).implode(', ', array_keys($value)));
        }
    }

    public function toArray(): array
    {
        $output = [];

        return $output;
    }

}
