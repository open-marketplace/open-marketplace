<?php

namespace ContainerMbsOYIQ;
include_once \dirname(__DIR__, 4).'/vendor/sylius/sylius/src/Sylius/Bundle/CoreBundle/Templating/Helper/PriceHelper.php';

class PriceHelper_2012e62 extends \Sylius\Bundle\CoreBundle\Templating\Helper\PriceHelper implements \ProxyManager\Proxy\VirtualProxyInterface
{
    /**
     * @var \Sylius\Bundle\CoreBundle\Templating\Helper\PriceHelper|null wrapped object, if the proxy is initialized
     */
    private $valueHolderacfd2 = null;

    /**
     * @var \Closure|null initializer responsible for generating the wrapped object
     */
    private $initializer1e0f3 = null;

    /**
     * @var bool[] map of public properties of the parent class
     */
    private static $publicPropertiesf4327 = [
        
    ];

    public function getPrice(\Sylius\Component\Core\Model\ProductVariantInterface $productVariant, array $context) : int
    {
        $this->initializer1e0f3 && ($this->initializer1e0f3->__invoke($valueHolderacfd2, $this, 'getPrice', array('productVariant' => $productVariant, 'context' => $context), $this->initializer1e0f3) || 1) && $this->valueHolderacfd2 = $valueHolderacfd2;

        return $this->valueHolderacfd2->getPrice($productVariant, $context);
    }

    public function getOriginalPrice(\Sylius\Component\Core\Model\ProductVariantInterface $productVariant, array $context) : int
    {
        $this->initializer1e0f3 && ($this->initializer1e0f3->__invoke($valueHolderacfd2, $this, 'getOriginalPrice', array('productVariant' => $productVariant, 'context' => $context), $this->initializer1e0f3) || 1) && $this->valueHolderacfd2 = $valueHolderacfd2;

        return $this->valueHolderacfd2->getOriginalPrice($productVariant, $context);
    }

    public function hasDiscount(\Sylius\Component\Core\Model\ProductVariantInterface $productVariant, array $context) : bool
    {
        $this->initializer1e0f3 && ($this->initializer1e0f3->__invoke($valueHolderacfd2, $this, 'hasDiscount', array('productVariant' => $productVariant, 'context' => $context), $this->initializer1e0f3) || 1) && $this->valueHolderacfd2 = $valueHolderacfd2;

        return $this->valueHolderacfd2->hasDiscount($productVariant, $context);
    }

    public function getName() : string
    {
        $this->initializer1e0f3 && ($this->initializer1e0f3->__invoke($valueHolderacfd2, $this, 'getName', array(), $this->initializer1e0f3) || 1) && $this->valueHolderacfd2 = $valueHolderacfd2;

        return $this->valueHolderacfd2->getName();
    }

    public function setCharset(string $charset)
    {
        $this->initializer1e0f3 && ($this->initializer1e0f3->__invoke($valueHolderacfd2, $this, 'setCharset', array('charset' => $charset), $this->initializer1e0f3) || 1) && $this->valueHolderacfd2 = $valueHolderacfd2;

        return $this->valueHolderacfd2->setCharset($charset);
    }

    public function getCharset()
    {
        $this->initializer1e0f3 && ($this->initializer1e0f3->__invoke($valueHolderacfd2, $this, 'getCharset', array(), $this->initializer1e0f3) || 1) && $this->valueHolderacfd2 = $valueHolderacfd2;

        return $this->valueHolderacfd2->getCharset();
    }

    /**
     * Constructor for lazy initialization
     *
     * @param \Closure|null $initializer
     */
    public static function staticProxyConstructor($initializer)
    {
        static $reflection;

        $reflection = $reflection ?? new \ReflectionClass(__CLASS__);
        $instance   = $reflection->newInstanceWithoutConstructor();

        unset($instance->charset);

        \Closure::bind(function (\Sylius\Bundle\CoreBundle\Templating\Helper\PriceHelper $instance) {
            unset($instance->productVariantPriceCalculator);
        }, $instance, 'Sylius\\Bundle\\CoreBundle\\Templating\\Helper\\PriceHelper')->__invoke($instance);

        $instance->initializer1e0f3 = $initializer;

        return $instance;
    }

    public function __construct(private \Sylius\Component\Core\Calculator\ProductVariantPriceCalculatorInterface $productVariantPriceCalculator)
    {
        static $reflection;

        if (! $this->valueHolderacfd2) {
            $reflection = $reflection ?? new \ReflectionClass('Sylius\\Bundle\\CoreBundle\\Templating\\Helper\\PriceHelper');
            $this->valueHolderacfd2 = $reflection->newInstanceWithoutConstructor();
        unset($this->charset);

        \Closure::bind(function (\Sylius\Bundle\CoreBundle\Templating\Helper\PriceHelper $instance) {
            unset($instance->productVariantPriceCalculator);
        }, $this, 'Sylius\\Bundle\\CoreBundle\\Templating\\Helper\\PriceHelper')->__invoke($this);

        }

        $this->valueHolderacfd2->__construct($productVariantPriceCalculator);
    }

    public function & __get($name)
    {
        $this->initializer1e0f3 && ($this->initializer1e0f3->__invoke($valueHolderacfd2, $this, '__get', ['name' => $name], $this->initializer1e0f3) || 1) && $this->valueHolderacfd2 = $valueHolderacfd2;

        if (isset(self::$publicPropertiesf4327[$name])) {
            return $this->valueHolderacfd2->$name;
        }

        $realInstanceReflection = new \ReflectionClass('Sylius\\Bundle\\CoreBundle\\Templating\\Helper\\PriceHelper');

        if (! $realInstanceReflection->hasProperty($name)) {
            $targetObject = $this->valueHolderacfd2;

            $backtrace = debug_backtrace(false, 1);
            trigger_error(
                sprintf(
                    'Undefined property: %s::$%s in %s on line %s',
                    $realInstanceReflection->getName(),
                    $name,
                    $backtrace[0]['file'],
                    $backtrace[0]['line']
                ),
                \E_USER_NOTICE
            );
            return $targetObject->$name;
        }

        $targetObject = $this->valueHolderacfd2;
        $accessor = function & () use ($targetObject, $name) {
            return $targetObject->$name;
        };
        $backtrace = debug_backtrace(true, 2);
        $scopeObject = isset($backtrace[1]['object']) ? $backtrace[1]['object'] : new \ProxyManager\Stub\EmptyClassStub();
        $accessor = $accessor->bindTo($scopeObject, get_class($scopeObject));
        $returnValue = & $accessor();

        return $returnValue;
    }

    public function __set($name, $value)
    {
        $this->initializer1e0f3 && ($this->initializer1e0f3->__invoke($valueHolderacfd2, $this, '__set', array('name' => $name, 'value' => $value), $this->initializer1e0f3) || 1) && $this->valueHolderacfd2 = $valueHolderacfd2;

        $realInstanceReflection = new \ReflectionClass('Sylius\\Bundle\\CoreBundle\\Templating\\Helper\\PriceHelper');

        if (! $realInstanceReflection->hasProperty($name)) {
            $targetObject = $this->valueHolderacfd2;

            $targetObject->$name = $value;

            return $targetObject->$name;
        }

        $targetObject = $this->valueHolderacfd2;
        $accessor = function & () use ($targetObject, $name, $value) {
            $targetObject->$name = $value;

            return $targetObject->$name;
        };
        $backtrace = debug_backtrace(true, 2);
        $scopeObject = isset($backtrace[1]['object']) ? $backtrace[1]['object'] : new \ProxyManager\Stub\EmptyClassStub();
        $accessor = $accessor->bindTo($scopeObject, get_class($scopeObject));
        $returnValue = & $accessor();

        return $returnValue;
    }

    public function __isset($name)
    {
        $this->initializer1e0f3 && ($this->initializer1e0f3->__invoke($valueHolderacfd2, $this, '__isset', array('name' => $name), $this->initializer1e0f3) || 1) && $this->valueHolderacfd2 = $valueHolderacfd2;

        $realInstanceReflection = new \ReflectionClass('Sylius\\Bundle\\CoreBundle\\Templating\\Helper\\PriceHelper');

        if (! $realInstanceReflection->hasProperty($name)) {
            $targetObject = $this->valueHolderacfd2;

            return isset($targetObject->$name);
        }

        $targetObject = $this->valueHolderacfd2;
        $accessor = function () use ($targetObject, $name) {
            return isset($targetObject->$name);
        };
        $backtrace = debug_backtrace(true, 2);
        $scopeObject = isset($backtrace[1]['object']) ? $backtrace[1]['object'] : new \ProxyManager\Stub\EmptyClassStub();
        $accessor = $accessor->bindTo($scopeObject, get_class($scopeObject));
        $returnValue = $accessor();

        return $returnValue;
    }

    public function __unset($name)
    {
        $this->initializer1e0f3 && ($this->initializer1e0f3->__invoke($valueHolderacfd2, $this, '__unset', array('name' => $name), $this->initializer1e0f3) || 1) && $this->valueHolderacfd2 = $valueHolderacfd2;

        $realInstanceReflection = new \ReflectionClass('Sylius\\Bundle\\CoreBundle\\Templating\\Helper\\PriceHelper');

        if (! $realInstanceReflection->hasProperty($name)) {
            $targetObject = $this->valueHolderacfd2;

            unset($targetObject->$name);

            return;
        }

        $targetObject = $this->valueHolderacfd2;
        $accessor = function () use ($targetObject, $name) {
            unset($targetObject->$name);

            return;
        };
        $backtrace = debug_backtrace(true, 2);
        $scopeObject = isset($backtrace[1]['object']) ? $backtrace[1]['object'] : new \ProxyManager\Stub\EmptyClassStub();
        $accessor = $accessor->bindTo($scopeObject, get_class($scopeObject));
        $accessor();
    }

    public function __clone()
    {
        $this->initializer1e0f3 && ($this->initializer1e0f3->__invoke($valueHolderacfd2, $this, '__clone', array(), $this->initializer1e0f3) || 1) && $this->valueHolderacfd2 = $valueHolderacfd2;

        $this->valueHolderacfd2 = clone $this->valueHolderacfd2;
    }

    public function __sleep()
    {
        $this->initializer1e0f3 && ($this->initializer1e0f3->__invoke($valueHolderacfd2, $this, '__sleep', array(), $this->initializer1e0f3) || 1) && $this->valueHolderacfd2 = $valueHolderacfd2;

        return array('valueHolderacfd2');
    }

    public function __wakeup()
    {
        unset($this->charset);

        \Closure::bind(function (\Sylius\Bundle\CoreBundle\Templating\Helper\PriceHelper $instance) {
            unset($instance->productVariantPriceCalculator);
        }, $this, 'Sylius\\Bundle\\CoreBundle\\Templating\\Helper\\PriceHelper')->__invoke($this);
    }

    public function setProxyInitializer(\Closure $initializer = null) : void
    {
        $this->initializer1e0f3 = $initializer;
    }

    public function getProxyInitializer() : ?\Closure
    {
        return $this->initializer1e0f3;
    }

    public function initializeProxy() : bool
    {
        return $this->initializer1e0f3 && ($this->initializer1e0f3->__invoke($valueHolderacfd2, $this, 'initializeProxy', array(), $this->initializer1e0f3) || 1) && $this->valueHolderacfd2 = $valueHolderacfd2;
    }

    public function isProxyInitialized() : bool
    {
        return null !== $this->valueHolderacfd2;
    }

    public function getWrappedValueHolderValue()
    {
        return $this->valueHolderacfd2;
    }
}

if (!\class_exists('PriceHelper_2012e62', false)) {
    \class_alias(__NAMESPACE__.'\\PriceHelper_2012e62', 'PriceHelper_2012e62', false);
}
