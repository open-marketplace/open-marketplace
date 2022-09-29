<?php

namespace Symfony\Config\SyliusReview;

require_once __DIR__.\DIRECTORY_SEPARATOR.'ResourcesConfig'.\DIRECTORY_SEPARATOR.'ReviewConfig.php';
require_once __DIR__.\DIRECTORY_SEPARATOR.'ResourcesConfig'.\DIRECTORY_SEPARATOR.'ReviewerConfig.php';

use Symfony\Component\Config\Loader\ParamConfigurator;
use Symfony\Component\Config\Definition\Exception\InvalidConfigurationException;

/**
 * This class is automatically generated to help in creating a config.
 */
class ResourcesConfig 
{
    private $subject;
    private $review;
    private $reviewer;
    private $_usedProperties = [];

    /**
     * @default null
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function subject($value): self
    {
        $this->_usedProperties['subject'] = true;
        $this->subject = $value;

        return $this;
    }

    public function review(array $value = []): \Symfony\Config\SyliusReview\ResourcesConfig\ReviewConfig
    {
        if (null === $this->review) {
            $this->_usedProperties['review'] = true;
            $this->review = new \Symfony\Config\SyliusReview\ResourcesConfig\ReviewConfig($value);
        } elseif (0 < \func_num_args()) {
            throw new InvalidConfigurationException('The node created by "review()" has already been initialized. You cannot pass values the second time you call review().');
        }

        return $this->review;
    }

    public function reviewer(array $value = []): \Symfony\Config\SyliusReview\ResourcesConfig\ReviewerConfig
    {
        if (null === $this->reviewer) {
            $this->_usedProperties['reviewer'] = true;
            $this->reviewer = new \Symfony\Config\SyliusReview\ResourcesConfig\ReviewerConfig($value);
        } elseif (0 < \func_num_args()) {
            throw new InvalidConfigurationException('The node created by "reviewer()" has already been initialized. You cannot pass values the second time you call reviewer().');
        }

        return $this->reviewer;
    }

    public function __construct(array $value = [])
    {
        if (array_key_exists('subject', $value)) {
            $this->_usedProperties['subject'] = true;
            $this->subject = $value['subject'];
            unset($value['subject']);
        }

        if (array_key_exists('review', $value)) {
            $this->_usedProperties['review'] = true;
            $this->review = new \Symfony\Config\SyliusReview\ResourcesConfig\ReviewConfig($value['review']);
            unset($value['review']);
        }

        if (array_key_exists('reviewer', $value)) {
            $this->_usedProperties['reviewer'] = true;
            $this->reviewer = new \Symfony\Config\SyliusReview\ResourcesConfig\ReviewerConfig($value['reviewer']);
            unset($value['reviewer']);
        }

        if ([] !== $value) {
            throw new InvalidConfigurationException(sprintf('The following keys are not supported by "%s": ', __CLASS__).implode(', ', array_keys($value)));
        }
    }

    public function toArray(): array
    {
        $output = [];
        if (isset($this->_usedProperties['subject'])) {
            $output['subject'] = $this->subject;
        }
        if (isset($this->_usedProperties['review'])) {
            $output['review'] = $this->review->toArray();
        }
        if (isset($this->_usedProperties['reviewer'])) {
            $output['reviewer'] = $this->reviewer->toArray();
        }

        return $output;
    }

}
