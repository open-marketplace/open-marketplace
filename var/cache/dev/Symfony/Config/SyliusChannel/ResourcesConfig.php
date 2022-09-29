<?php

namespace Symfony\Config\SyliusChannel;

require_once __DIR__.\DIRECTORY_SEPARATOR.'Resources'.\DIRECTORY_SEPARATOR.'ChannelConfig.php';

use Symfony\Component\Config\Definition\Exception\InvalidConfigurationException;

/**
 * This class is automatically generated to help in creating a config.
 */
class ResourcesConfig 
{
    private $channel;
    private $_usedProperties = [];

    public function channel(array $value = []): \Symfony\Config\SyliusChannel\Resources\ChannelConfig
    {
        if (null === $this->channel) {
            $this->_usedProperties['channel'] = true;
            $this->channel = new \Symfony\Config\SyliusChannel\Resources\ChannelConfig($value);
        } elseif (0 < \func_num_args()) {
            throw new InvalidConfigurationException('The node created by "channel()" has already been initialized. You cannot pass values the second time you call channel().');
        }

        return $this->channel;
    }

    public function __construct(array $value = [])
    {
        if (array_key_exists('channel', $value)) {
            $this->_usedProperties['channel'] = true;
            $this->channel = new \Symfony\Config\SyliusChannel\Resources\ChannelConfig($value['channel']);
            unset($value['channel']);
        }

        if ([] !== $value) {
            throw new InvalidConfigurationException(sprintf('The following keys are not supported by "%s": ', __CLASS__).implode(', ', array_keys($value)));
        }
    }

    public function toArray(): array
    {
        $output = [];
        if (isset($this->_usedProperties['channel'])) {
            $output['channel'] = $this->channel->toArray();
        }

        return $output;
    }

}
