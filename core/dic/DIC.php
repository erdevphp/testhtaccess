<?php
namespace Core\DIC;

use ReflectionClass;

class DIC
{
    private $registry = [];
    private $factories = [];
    private $instances = [];
    private static $_instance;

    /**
     * @return DIC
     */
    public static function getInstance(): DIC
    {
        if (self::$_instance === null) {
            self::$_instance = new DIC();
        }
        return self::$_instance;
    }

    /**
     * @param string $key
     * @param callable $resolver
     */
    public function set(string $key, Callable $resolver): void
    {
        $this->registry[$key] = $resolver;
    }

    /**
     * @param string $key
     * @param callable $resolver
     */
    public function setFactory(string $key, Callable $resolver): void
    {
        $this->factories[$key] = $resolver;
    }

    /**
     * @param $instance
     */
    public function setInstance($instance): void
    {
        $reflexion = new ReflectionClass($instance);
        $this->instances[$reflexion->getName()] = $instance;
    }

    /**
     * @param $key
     * @param array $classConstructor
     * @return mixed
     * @throws \Exception
     */
    public function get($key, $classConstructor = []) {
        if ( isset($this->factories[$key])) {
            return $this->factories[$key]();
        }
        if ( !isset($this->instances[$key]) ) {
            if (isset($this->registry[$key])) {
                $this->instances[$key] = $this->registry[$key]();
            } else {
                $reflected_class = new ReflectionClass($key);
                if ($reflected_class->isInstantiable()) {
                    $constructor = $reflected_class->getConstructor();
                    if ($constructor) {
                        $parameters = $constructor->getParameters();
                        $constructor_parameters = [];
                        foreach ($parameters as $parameter) {
                            if ($parameter->getClass()) {
                                try {
                                    $constructor_parameters[] = $this->get($parameter->getClass()->getName());
                                } catch (\Exception $e) {
                                    die('Something went wrong.' . $e);
                                }
                            } else {
                                $constructor_parameters[] = $parameter->getDefaultValue();
                            }
                        }
                        $constructor_parameters = !empty($classConstructor) ? $classConstructor : $constructor_parameters;
                        $this->instances[$key] = $reflected_class->newInstanceArgs($constructor_parameters);
                    } else {
                        $this->instances[$key] = $reflected_class->newInstance();
                    }

                } else {
                    throw new \Exception($key . " is'nt a instantiable class");
                }
            }
        }
        return $this->instances[$key];
    }
}