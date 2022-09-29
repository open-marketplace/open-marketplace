<?php

namespace Symfony\Config\SyliusPromotion;

require_once __DIR__.\DIRECTORY_SEPARATOR.'Resources'.\DIRECTORY_SEPARATOR.'PromotionSubjectConfig.php';
require_once __DIR__.\DIRECTORY_SEPARATOR.'Resources'.\DIRECTORY_SEPARATOR.'PromotionConfig.php';
require_once __DIR__.\DIRECTORY_SEPARATOR.'Resources'.\DIRECTORY_SEPARATOR.'CatalogPromotionConfig.php';
require_once __DIR__.\DIRECTORY_SEPARATOR.'Resources'.\DIRECTORY_SEPARATOR.'CatalogPromotionScopeConfig.php';
require_once __DIR__.\DIRECTORY_SEPARATOR.'Resources'.\DIRECTORY_SEPARATOR.'CatalogPromotionActionConfig.php';
require_once __DIR__.\DIRECTORY_SEPARATOR.'Resources'.\DIRECTORY_SEPARATOR.'PromotionRuleConfig.php';
require_once __DIR__.\DIRECTORY_SEPARATOR.'Resources'.\DIRECTORY_SEPARATOR.'PromotionActionConfig.php';
require_once __DIR__.\DIRECTORY_SEPARATOR.'Resources'.\DIRECTORY_SEPARATOR.'PromotionCouponConfig.php';

use Symfony\Component\Config\Definition\Exception\InvalidConfigurationException;

/**
 * This class is automatically generated to help in creating a config.
 */
class ResourcesConfig 
{
    private $promotionSubject;
    private $promotion;
    private $catalogPromotion;
    private $catalogPromotionScope;
    private $catalogPromotionAction;
    private $promotionRule;
    private $promotionAction;
    private $promotionCoupon;
    private $_usedProperties = [];

    public function promotionSubject(array $value = []): \Symfony\Config\SyliusPromotion\Resources\PromotionSubjectConfig
    {
        if (null === $this->promotionSubject) {
            $this->_usedProperties['promotionSubject'] = true;
            $this->promotionSubject = new \Symfony\Config\SyliusPromotion\Resources\PromotionSubjectConfig($value);
        } elseif (0 < \func_num_args()) {
            throw new InvalidConfigurationException('The node created by "promotionSubject()" has already been initialized. You cannot pass values the second time you call promotionSubject().');
        }

        return $this->promotionSubject;
    }

    public function promotion(array $value = []): \Symfony\Config\SyliusPromotion\Resources\PromotionConfig
    {
        if (null === $this->promotion) {
            $this->_usedProperties['promotion'] = true;
            $this->promotion = new \Symfony\Config\SyliusPromotion\Resources\PromotionConfig($value);
        } elseif (0 < \func_num_args()) {
            throw new InvalidConfigurationException('The node created by "promotion()" has already been initialized. You cannot pass values the second time you call promotion().');
        }

        return $this->promotion;
    }

    public function catalogPromotion(array $value = []): \Symfony\Config\SyliusPromotion\Resources\CatalogPromotionConfig
    {
        if (null === $this->catalogPromotion) {
            $this->_usedProperties['catalogPromotion'] = true;
            $this->catalogPromotion = new \Symfony\Config\SyliusPromotion\Resources\CatalogPromotionConfig($value);
        } elseif (0 < \func_num_args()) {
            throw new InvalidConfigurationException('The node created by "catalogPromotion()" has already been initialized. You cannot pass values the second time you call catalogPromotion().');
        }

        return $this->catalogPromotion;
    }

    public function catalogPromotionScope(array $value = []): \Symfony\Config\SyliusPromotion\Resources\CatalogPromotionScopeConfig
    {
        if (null === $this->catalogPromotionScope) {
            $this->_usedProperties['catalogPromotionScope'] = true;
            $this->catalogPromotionScope = new \Symfony\Config\SyliusPromotion\Resources\CatalogPromotionScopeConfig($value);
        } elseif (0 < \func_num_args()) {
            throw new InvalidConfigurationException('The node created by "catalogPromotionScope()" has already been initialized. You cannot pass values the second time you call catalogPromotionScope().');
        }

        return $this->catalogPromotionScope;
    }

    public function catalogPromotionAction(array $value = []): \Symfony\Config\SyliusPromotion\Resources\CatalogPromotionActionConfig
    {
        if (null === $this->catalogPromotionAction) {
            $this->_usedProperties['catalogPromotionAction'] = true;
            $this->catalogPromotionAction = new \Symfony\Config\SyliusPromotion\Resources\CatalogPromotionActionConfig($value);
        } elseif (0 < \func_num_args()) {
            throw new InvalidConfigurationException('The node created by "catalogPromotionAction()" has already been initialized. You cannot pass values the second time you call catalogPromotionAction().');
        }

        return $this->catalogPromotionAction;
    }

    public function promotionRule(array $value = []): \Symfony\Config\SyliusPromotion\Resources\PromotionRuleConfig
    {
        if (null === $this->promotionRule) {
            $this->_usedProperties['promotionRule'] = true;
            $this->promotionRule = new \Symfony\Config\SyliusPromotion\Resources\PromotionRuleConfig($value);
        } elseif (0 < \func_num_args()) {
            throw new InvalidConfigurationException('The node created by "promotionRule()" has already been initialized. You cannot pass values the second time you call promotionRule().');
        }

        return $this->promotionRule;
    }

    public function promotionAction(array $value = []): \Symfony\Config\SyliusPromotion\Resources\PromotionActionConfig
    {
        if (null === $this->promotionAction) {
            $this->_usedProperties['promotionAction'] = true;
            $this->promotionAction = new \Symfony\Config\SyliusPromotion\Resources\PromotionActionConfig($value);
        } elseif (0 < \func_num_args()) {
            throw new InvalidConfigurationException('The node created by "promotionAction()" has already been initialized. You cannot pass values the second time you call promotionAction().');
        }

        return $this->promotionAction;
    }

    public function promotionCoupon(array $value = []): \Symfony\Config\SyliusPromotion\Resources\PromotionCouponConfig
    {
        if (null === $this->promotionCoupon) {
            $this->_usedProperties['promotionCoupon'] = true;
            $this->promotionCoupon = new \Symfony\Config\SyliusPromotion\Resources\PromotionCouponConfig($value);
        } elseif (0 < \func_num_args()) {
            throw new InvalidConfigurationException('The node created by "promotionCoupon()" has already been initialized. You cannot pass values the second time you call promotionCoupon().');
        }

        return $this->promotionCoupon;
    }

    public function __construct(array $value = [])
    {
        if (array_key_exists('promotion_subject', $value)) {
            $this->_usedProperties['promotionSubject'] = true;
            $this->promotionSubject = new \Symfony\Config\SyliusPromotion\Resources\PromotionSubjectConfig($value['promotion_subject']);
            unset($value['promotion_subject']);
        }

        if (array_key_exists('promotion', $value)) {
            $this->_usedProperties['promotion'] = true;
            $this->promotion = new \Symfony\Config\SyliusPromotion\Resources\PromotionConfig($value['promotion']);
            unset($value['promotion']);
        }

        if (array_key_exists('catalog_promotion', $value)) {
            $this->_usedProperties['catalogPromotion'] = true;
            $this->catalogPromotion = new \Symfony\Config\SyliusPromotion\Resources\CatalogPromotionConfig($value['catalog_promotion']);
            unset($value['catalog_promotion']);
        }

        if (array_key_exists('catalog_promotion_scope', $value)) {
            $this->_usedProperties['catalogPromotionScope'] = true;
            $this->catalogPromotionScope = new \Symfony\Config\SyliusPromotion\Resources\CatalogPromotionScopeConfig($value['catalog_promotion_scope']);
            unset($value['catalog_promotion_scope']);
        }

        if (array_key_exists('catalog_promotion_action', $value)) {
            $this->_usedProperties['catalogPromotionAction'] = true;
            $this->catalogPromotionAction = new \Symfony\Config\SyliusPromotion\Resources\CatalogPromotionActionConfig($value['catalog_promotion_action']);
            unset($value['catalog_promotion_action']);
        }

        if (array_key_exists('promotion_rule', $value)) {
            $this->_usedProperties['promotionRule'] = true;
            $this->promotionRule = new \Symfony\Config\SyliusPromotion\Resources\PromotionRuleConfig($value['promotion_rule']);
            unset($value['promotion_rule']);
        }

        if (array_key_exists('promotion_action', $value)) {
            $this->_usedProperties['promotionAction'] = true;
            $this->promotionAction = new \Symfony\Config\SyliusPromotion\Resources\PromotionActionConfig($value['promotion_action']);
            unset($value['promotion_action']);
        }

        if (array_key_exists('promotion_coupon', $value)) {
            $this->_usedProperties['promotionCoupon'] = true;
            $this->promotionCoupon = new \Symfony\Config\SyliusPromotion\Resources\PromotionCouponConfig($value['promotion_coupon']);
            unset($value['promotion_coupon']);
        }

        if ([] !== $value) {
            throw new InvalidConfigurationException(sprintf('The following keys are not supported by "%s": ', __CLASS__).implode(', ', array_keys($value)));
        }
    }

    public function toArray(): array
    {
        $output = [];
        if (isset($this->_usedProperties['promotionSubject'])) {
            $output['promotion_subject'] = $this->promotionSubject->toArray();
        }
        if (isset($this->_usedProperties['promotion'])) {
            $output['promotion'] = $this->promotion->toArray();
        }
        if (isset($this->_usedProperties['catalogPromotion'])) {
            $output['catalog_promotion'] = $this->catalogPromotion->toArray();
        }
        if (isset($this->_usedProperties['catalogPromotionScope'])) {
            $output['catalog_promotion_scope'] = $this->catalogPromotionScope->toArray();
        }
        if (isset($this->_usedProperties['catalogPromotionAction'])) {
            $output['catalog_promotion_action'] = $this->catalogPromotionAction->toArray();
        }
        if (isset($this->_usedProperties['promotionRule'])) {
            $output['promotion_rule'] = $this->promotionRule->toArray();
        }
        if (isset($this->_usedProperties['promotionAction'])) {
            $output['promotion_action'] = $this->promotionAction->toArray();
        }
        if (isset($this->_usedProperties['promotionCoupon'])) {
            $output['promotion_coupon'] = $this->promotionCoupon->toArray();
        }

        return $output;
    }

}
