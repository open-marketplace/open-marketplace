<?php

namespace Symfony\Config;

require_once __DIR__.\DIRECTORY_SEPARATOR.'SyliusAdmin'.\DIRECTORY_SEPARATOR.'NotificationsConfig.php';

use Symfony\Component\Config\Definition\Exception\InvalidConfigurationException;

/**
 * This class is automatically generated to help in creating a config.
 */
class SyliusAdminConfig implements \Symfony\Component\Config\Builder\ConfigBuilderInterface
{
    private $notifications;
    private $_usedProperties = [];

    public function notifications(array $value = []): \Symfony\Config\SyliusAdmin\NotificationsConfig
    {
        if (null === $this->notifications) {
            $this->_usedProperties['notifications'] = true;
            $this->notifications = new \Symfony\Config\SyliusAdmin\NotificationsConfig($value);
        } elseif (0 < \func_num_args()) {
            throw new InvalidConfigurationException('The node created by "notifications()" has already been initialized. You cannot pass values the second time you call notifications().');
        }

        return $this->notifications;
    }

    public function getExtensionAlias(): string
    {
        return 'sylius_admin';
    }

    public function __construct(array $value = [])
    {
        if (array_key_exists('notifications', $value)) {
            $this->_usedProperties['notifications'] = true;
            $this->notifications = new \Symfony\Config\SyliusAdmin\NotificationsConfig($value['notifications']);
            unset($value['notifications']);
        }

        if ([] !== $value) {
            throw new InvalidConfigurationException(sprintf('The following keys are not supported by "%s": ', __CLASS__).implode(', ', array_keys($value)));
        }
    }

    public function toArray(): array
    {
        $output = [];
        if (isset($this->_usedProperties['notifications'])) {
            $output['notifications'] = $this->notifications->toArray();
        }

        return $output;
    }

}
