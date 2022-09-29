<?php

namespace ContainerAWYi9u6;
include_once \dirname(__DIR__, 4).'/vendor/sylius/grid-bundle/src/Bundle/Templating/Helper/BulkActionGridHelper.php';

class BulkActionGridHelper_d18a6a1 extends \Sylius\Bundle\GridBundle\Templating\Helper\BulkActionGridHelper implements \ProxyManager\Proxy\VirtualProxyInterface
{
    /**
     * @var \Sylius\Bundle\GridBundle\Templating\Helper\BulkActionGridHelper|null wrapped object, if the proxy is initialized
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

    public function renderBulkAction(\Sylius\Component\Grid\View\GridView $gridView, \Sylius\Component\Grid\Definition\Action $bulkAction, $data = null) : string
    {
        $this->initializer1e0f3 && ($this->initializer1e0f3->__invoke($valueHolderacfd2, $this, 'renderBulkAction', array('gridView' => $gridView, 'bulkAction' => $bulkAction, 'data' => $data), $this->initializer1e0f3) || 1) && $this->valueHolderacfd2 = $valueHolderacfd2;

        return $this->valueHolderacfd2->renderBulkAction($gridView, $bulkAction, $data);
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

        \Closure::bind(function (\Sylius\Bundle\GridBundle\Templating\Helper\BulkActionGridHelper $instance) {
            unset($instance->bulkActionGridRenderer);
        }, $instance, 'Sylius\\Bundle\\GridBundle\\Templating\\Helper\\BulkActionGridHelper')->__invoke($instance);

        $instance->initializer1e0f3 = $initializer;

        return $instance;
    }

    public function __construct(\Sylius\Component\Grid\Renderer\BulkActionGridRendererInterface $bulkActionGridRenderer)
    {
        static $reflection;

        if (! $this->valueHolderacfd2) {
            $reflection = $reflection ?? new \ReflectionClass('Sylius\\Bundle\\GridBundle\\Templating\\Helper\\BulkActionGridHelper');
            $this->valueHolderacfd2 = $reflection->newInstanceWithoutConstructor();
        \Closure::bind(function (\Sylius\Bundle\GridBundle\Templating\Helper\BulkActionGridHelper $instance) {
            unset($instance->bulkActionGridRenderer);
        }, $this, 'Sylius\\Bundle\\GridBundle\\Templating\\Helper\\BulkActionGridHelper')->__invoke($this);

        }

        $this->valueHolderacfd2->__construct($bulkActionGridRenderer);
    }

    public function & __get($name)
    {
        $this->initializer1e0f3 && ($this->initializer1e0f3->__invoke($valueHolderacfd2, $this, '__get', ['name' => $name], $this->initializer1e0f3) || 1) && $this->valueHolderacfd2 = $valueHolderacfd2;

        if (isset(self::$publicPropertiesf4327[$name])) {
            return $this->valueHolderacfd2->$name;
        }

        $realInstanceReflection = new \ReflectionClass('Sylius\\Bundle\\GridBundle\\Templating\\Helper\\BulkActionGridHelper');

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

        $realInstanceReflection = new \ReflectionClass('Sylius\\Bundle\\GridBundle\\Templating\\Helper\\BulkActionGridHelper');

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

        $realInstanceReflection = new \ReflectionClass('Sylius\\Bundle\\GridBundle\\Templating\\Helper\\BulkActionGridHelper');

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

        $realInstanceReflection = new \ReflectionClass('Sylius\\Bundle\\GridBundle\\Templating\\Helper\\BulkActionGridHelper');

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
        \Closure::bind(function (\Sylius\Bundle\GridBundle\Templating\Helper\BulkActionGridHelper $instance) {
            unset($instance->bulkActionGridRenderer);
        }, $this, 'Sylius\\Bundle\\GridBundle\\Templating\\Helper\\BulkActionGridHelper')->__invoke($this);
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

if (!\class_exists('BulkActionGridHelper_d18a6a1', false)) {
    \class_alias(__NAMESPACE__.'\\BulkActionGridHelper_d18a6a1', 'BulkActionGridHelper_d18a6a1', false);
}
