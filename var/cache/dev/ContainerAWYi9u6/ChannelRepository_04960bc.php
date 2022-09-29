<?php

namespace ContainerAWYi9u6;
include_once \dirname(__DIR__, 4).'/vendor/sylius/sylius/src/Sylius/Component/Channel/Repository/ChannelRepositoryInterface.php';
include_once \dirname(__DIR__, 4).'/vendor/sylius/sylius/src/Sylius/Bundle/ChannelBundle/Doctrine/ORM/ChannelRepository.php';

class ChannelRepository_04960bc extends \Sylius\Bundle\ChannelBundle\Doctrine\ORM\ChannelRepository implements \ProxyManager\Proxy\VirtualProxyInterface
{
    /**
     * @var \Sylius\Bundle\ChannelBundle\Doctrine\ORM\ChannelRepository|null wrapped object, if the proxy is initialized
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

    public function findOneByHostname(string $hostname) : ?\Sylius\Component\Channel\Model\ChannelInterface
    {
        $this->initializer1e0f3 && ($this->initializer1e0f3->__invoke($valueHolderacfd2, $this, 'findOneByHostname', array('hostname' => $hostname), $this->initializer1e0f3) || 1) && $this->valueHolderacfd2 = $valueHolderacfd2;

        return $this->valueHolderacfd2->findOneByHostname($hostname);
    }

    public function findOneEnabledByHostname(string $hostname) : ?\Sylius\Component\Channel\Model\ChannelInterface
    {
        $this->initializer1e0f3 && ($this->initializer1e0f3->__invoke($valueHolderacfd2, $this, 'findOneEnabledByHostname', array('hostname' => $hostname), $this->initializer1e0f3) || 1) && $this->valueHolderacfd2 = $valueHolderacfd2;

        return $this->valueHolderacfd2->findOneEnabledByHostname($hostname);
    }

    public function findOneByCode(string $code) : ?\Sylius\Component\Channel\Model\ChannelInterface
    {
        $this->initializer1e0f3 && ($this->initializer1e0f3->__invoke($valueHolderacfd2, $this, 'findOneByCode', array('code' => $code), $this->initializer1e0f3) || 1) && $this->valueHolderacfd2 = $valueHolderacfd2;

        return $this->valueHolderacfd2->findOneByCode($code);
    }

    public function findByName(string $name) : iterable
    {
        $this->initializer1e0f3 && ($this->initializer1e0f3->__invoke($valueHolderacfd2, $this, 'findByName', array('name' => $name), $this->initializer1e0f3) || 1) && $this->valueHolderacfd2 = $valueHolderacfd2;

        return $this->valueHolderacfd2->findByName($name);
    }

    public function add(\Sylius\Component\Resource\Model\ResourceInterface $resource) : void
    {
        $this->initializer1e0f3 && ($this->initializer1e0f3->__invoke($valueHolderacfd2, $this, 'add', array('resource' => $resource), $this->initializer1e0f3) || 1) && $this->valueHolderacfd2 = $valueHolderacfd2;

        $this->valueHolderacfd2->add($resource);
return;
    }

    public function remove(\Sylius\Component\Resource\Model\ResourceInterface $resource) : void
    {
        $this->initializer1e0f3 && ($this->initializer1e0f3->__invoke($valueHolderacfd2, $this, 'remove', array('resource' => $resource), $this->initializer1e0f3) || 1) && $this->valueHolderacfd2 = $valueHolderacfd2;

        $this->valueHolderacfd2->remove($resource);
return;
    }

    public function createPaginator(array $criteria = [], array $sorting = []) : iterable
    {
        $this->initializer1e0f3 && ($this->initializer1e0f3->__invoke($valueHolderacfd2, $this, 'createPaginator', array('criteria' => $criteria, 'sorting' => $sorting), $this->initializer1e0f3) || 1) && $this->valueHolderacfd2 = $valueHolderacfd2;

        return $this->valueHolderacfd2->createPaginator($criteria, $sorting);
    }

    public function createQueryBuilder($alias, $indexBy = null)
    {
        $this->initializer1e0f3 && ($this->initializer1e0f3->__invoke($valueHolderacfd2, $this, 'createQueryBuilder', array('alias' => $alias, 'indexBy' => $indexBy), $this->initializer1e0f3) || 1) && $this->valueHolderacfd2 = $valueHolderacfd2;

        return $this->valueHolderacfd2->createQueryBuilder($alias, $indexBy);
    }

    public function createResultSetMappingBuilder($alias)
    {
        $this->initializer1e0f3 && ($this->initializer1e0f3->__invoke($valueHolderacfd2, $this, 'createResultSetMappingBuilder', array('alias' => $alias), $this->initializer1e0f3) || 1) && $this->valueHolderacfd2 = $valueHolderacfd2;

        return $this->valueHolderacfd2->createResultSetMappingBuilder($alias);
    }

    public function createNamedQuery($queryName)
    {
        $this->initializer1e0f3 && ($this->initializer1e0f3->__invoke($valueHolderacfd2, $this, 'createNamedQuery', array('queryName' => $queryName), $this->initializer1e0f3) || 1) && $this->valueHolderacfd2 = $valueHolderacfd2;

        return $this->valueHolderacfd2->createNamedQuery($queryName);
    }

    public function createNativeNamedQuery($queryName)
    {
        $this->initializer1e0f3 && ($this->initializer1e0f3->__invoke($valueHolderacfd2, $this, 'createNativeNamedQuery', array('queryName' => $queryName), $this->initializer1e0f3) || 1) && $this->valueHolderacfd2 = $valueHolderacfd2;

        return $this->valueHolderacfd2->createNativeNamedQuery($queryName);
    }

    public function clear()
    {
        $this->initializer1e0f3 && ($this->initializer1e0f3->__invoke($valueHolderacfd2, $this, 'clear', array(), $this->initializer1e0f3) || 1) && $this->valueHolderacfd2 = $valueHolderacfd2;

        return $this->valueHolderacfd2->clear();
    }

    public function find($id, $lockMode = null, $lockVersion = null)
    {
        $this->initializer1e0f3 && ($this->initializer1e0f3->__invoke($valueHolderacfd2, $this, 'find', array('id' => $id, 'lockMode' => $lockMode, 'lockVersion' => $lockVersion), $this->initializer1e0f3) || 1) && $this->valueHolderacfd2 = $valueHolderacfd2;

        return $this->valueHolderacfd2->find($id, $lockMode, $lockVersion);
    }

    public function findAll()
    {
        $this->initializer1e0f3 && ($this->initializer1e0f3->__invoke($valueHolderacfd2, $this, 'findAll', array(), $this->initializer1e0f3) || 1) && $this->valueHolderacfd2 = $valueHolderacfd2;

        return $this->valueHolderacfd2->findAll();
    }

    public function findBy(array $criteria, ?array $orderBy = null, $limit = null, $offset = null)
    {
        $this->initializer1e0f3 && ($this->initializer1e0f3->__invoke($valueHolderacfd2, $this, 'findBy', array('criteria' => $criteria, 'orderBy' => $orderBy, 'limit' => $limit, 'offset' => $offset), $this->initializer1e0f3) || 1) && $this->valueHolderacfd2 = $valueHolderacfd2;

        return $this->valueHolderacfd2->findBy($criteria, $orderBy, $limit, $offset);
    }

    public function findOneBy(array $criteria, ?array $orderBy = null)
    {
        $this->initializer1e0f3 && ($this->initializer1e0f3->__invoke($valueHolderacfd2, $this, 'findOneBy', array('criteria' => $criteria, 'orderBy' => $orderBy), $this->initializer1e0f3) || 1) && $this->valueHolderacfd2 = $valueHolderacfd2;

        return $this->valueHolderacfd2->findOneBy($criteria, $orderBy);
    }

    public function count(array $criteria)
    {
        $this->initializer1e0f3 && ($this->initializer1e0f3->__invoke($valueHolderacfd2, $this, 'count', array('criteria' => $criteria), $this->initializer1e0f3) || 1) && $this->valueHolderacfd2 = $valueHolderacfd2;

        return $this->valueHolderacfd2->count($criteria);
    }

    public function __call($method, $arguments)
    {
        $this->initializer1e0f3 && ($this->initializer1e0f3->__invoke($valueHolderacfd2, $this, '__call', array('method' => $method, 'arguments' => $arguments), $this->initializer1e0f3) || 1) && $this->valueHolderacfd2 = $valueHolderacfd2;

        return $this->valueHolderacfd2->__call($method, $arguments);
    }

    public function getClassName()
    {
        $this->initializer1e0f3 && ($this->initializer1e0f3->__invoke($valueHolderacfd2, $this, 'getClassName', array(), $this->initializer1e0f3) || 1) && $this->valueHolderacfd2 = $valueHolderacfd2;

        return $this->valueHolderacfd2->getClassName();
    }

    public function matching(\Doctrine\Common\Collections\Criteria $criteria)
    {
        $this->initializer1e0f3 && ($this->initializer1e0f3->__invoke($valueHolderacfd2, $this, 'matching', array('criteria' => $criteria), $this->initializer1e0f3) || 1) && $this->valueHolderacfd2 = $valueHolderacfd2;

        return $this->valueHolderacfd2->matching($criteria);
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

        unset($instance->_entityName, $instance->_em, $instance->_class);

        $instance->initializer1e0f3 = $initializer;

        return $instance;
    }

    public function __construct(\Doctrine\ORM\EntityManagerInterface $em, \Doctrine\ORM\Mapping\ClassMetadata $class)
    {
        static $reflection;

        if (! $this->valueHolderacfd2) {
            $reflection = $reflection ?? new \ReflectionClass('Sylius\\Bundle\\ChannelBundle\\Doctrine\\ORM\\ChannelRepository');
            $this->valueHolderacfd2 = $reflection->newInstanceWithoutConstructor();
        unset($this->_entityName, $this->_em, $this->_class);

        }

        $this->valueHolderacfd2->__construct($em, $class);
    }

    public function & __get($name)
    {
        $this->initializer1e0f3 && ($this->initializer1e0f3->__invoke($valueHolderacfd2, $this, '__get', ['name' => $name], $this->initializer1e0f3) || 1) && $this->valueHolderacfd2 = $valueHolderacfd2;

        if (isset(self::$publicPropertiesf4327[$name])) {
            return $this->valueHolderacfd2->$name;
        }

        $realInstanceReflection = new \ReflectionClass('Sylius\\Bundle\\ChannelBundle\\Doctrine\\ORM\\ChannelRepository');

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

        $realInstanceReflection = new \ReflectionClass('Sylius\\Bundle\\ChannelBundle\\Doctrine\\ORM\\ChannelRepository');

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

        $realInstanceReflection = new \ReflectionClass('Sylius\\Bundle\\ChannelBundle\\Doctrine\\ORM\\ChannelRepository');

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

        $realInstanceReflection = new \ReflectionClass('Sylius\\Bundle\\ChannelBundle\\Doctrine\\ORM\\ChannelRepository');

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
        unset($this->_entityName, $this->_em, $this->_class);
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

if (!\class_exists('ChannelRepository_04960bc', false)) {
    \class_alias(__NAMESPACE__.'\\ChannelRepository_04960bc', 'ChannelRepository_04960bc', false);
}
