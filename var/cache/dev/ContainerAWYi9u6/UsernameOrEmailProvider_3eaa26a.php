<?php

namespace ContainerAWYi9u6;
include_once \dirname(__DIR__, 4).'/vendor/symfony/security-core/User/UserProviderInterface.php';
include_once \dirname(__DIR__, 4).'/vendor/sylius/sylius/src/Sylius/Bundle/UserBundle/Provider/UserProviderInterface.php';
include_once \dirname(__DIR__, 4).'/vendor/sylius/sylius/src/Sylius/Bundle/UserBundle/Provider/AbstractUserProvider.php';
include_once \dirname(__DIR__, 4).'/vendor/sylius/sylius/src/Sylius/Bundle/UserBundle/Provider/UsernameOrEmailProvider.php';

class UsernameOrEmailProvider_3eaa26a extends \Sylius\Bundle\UserBundle\Provider\UsernameOrEmailProvider implements \ProxyManager\Proxy\VirtualProxyInterface
{
    /**
     * @var \Sylius\Bundle\UserBundle\Provider\UsernameOrEmailProvider|null wrapped object, if the proxy is initialized
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

    public function loadUserByUsername($username) : \Symfony\Component\Security\Core\User\UserInterface
    {
        $this->initializer1e0f3 && ($this->initializer1e0f3->__invoke($valueHolderacfd2, $this, 'loadUserByUsername', array('username' => $username), $this->initializer1e0f3) || 1) && $this->valueHolderacfd2 = $valueHolderacfd2;

        return $this->valueHolderacfd2->loadUserByUsername($username);
    }

    public function refreshUser(\Symfony\Component\Security\Core\User\UserInterface $user) : \Symfony\Component\Security\Core\User\UserInterface
    {
        $this->initializer1e0f3 && ($this->initializer1e0f3->__invoke($valueHolderacfd2, $this, 'refreshUser', array('user' => $user), $this->initializer1e0f3) || 1) && $this->valueHolderacfd2 = $valueHolderacfd2;

        return $this->valueHolderacfd2->refreshUser($user);
    }

    public function supportsClass($class) : bool
    {
        $this->initializer1e0f3 && ($this->initializer1e0f3->__invoke($valueHolderacfd2, $this, 'supportsClass', array('class' => $class), $this->initializer1e0f3) || 1) && $this->valueHolderacfd2 = $valueHolderacfd2;

        return $this->valueHolderacfd2->supportsClass($class);
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

        unset($instance->supportedUserClass, $instance->userRepository, $instance->canonicalizer);

        $instance->initializer1e0f3 = $initializer;

        return $instance;
    }

    public function __construct(protected string $supportedUserClass, protected \Sylius\Component\User\Repository\UserRepositoryInterface $userRepository, protected \Sylius\Component\User\Canonicalizer\CanonicalizerInterface $canonicalizer)
    {
        static $reflection;

        if (! $this->valueHolderacfd2) {
            $reflection = $reflection ?? new \ReflectionClass('Sylius\\Bundle\\UserBundle\\Provider\\UsernameOrEmailProvider');
            $this->valueHolderacfd2 = $reflection->newInstanceWithoutConstructor();
        unset($this->supportedUserClass, $this->userRepository, $this->canonicalizer);

        }

        $this->valueHolderacfd2->__construct($supportedUserClass, $userRepository, $canonicalizer);
    }

    public function & __get($name)
    {
        $this->initializer1e0f3 && ($this->initializer1e0f3->__invoke($valueHolderacfd2, $this, '__get', ['name' => $name], $this->initializer1e0f3) || 1) && $this->valueHolderacfd2 = $valueHolderacfd2;

        if (isset(self::$publicPropertiesf4327[$name])) {
            return $this->valueHolderacfd2->$name;
        }

        $realInstanceReflection = new \ReflectionClass('Sylius\\Bundle\\UserBundle\\Provider\\UsernameOrEmailProvider');

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

        $realInstanceReflection = new \ReflectionClass('Sylius\\Bundle\\UserBundle\\Provider\\UsernameOrEmailProvider');

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

        $realInstanceReflection = new \ReflectionClass('Sylius\\Bundle\\UserBundle\\Provider\\UsernameOrEmailProvider');

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

        $realInstanceReflection = new \ReflectionClass('Sylius\\Bundle\\UserBundle\\Provider\\UsernameOrEmailProvider');

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
        unset($this->supportedUserClass, $this->userRepository, $this->canonicalizer);
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

if (!\class_exists('UsernameOrEmailProvider_3eaa26a', false)) {
    \class_alias(__NAMESPACE__.'\\UsernameOrEmailProvider_3eaa26a', 'UsernameOrEmailProvider_3eaa26a', false);
}
