<?php

namespace Core\Router;

class Router {

    /**
     * @var string
     */
    private $url;
    private $routes = [];
    public $namedRoute = [];

    public function __construct(?string $url)
    {
        $this->url = trim($url, '/');
    }

    public function __toString()
    {
        return "Coucou, ca marche";
    }

    public function get(string $path, $action, $name = null)
    {
        return $this->add($path, $action, $name, 'GET');
    }

    public function post(string $path, $action, $name = null)
    {
        return $this->add($path, $action, $name, 'POST');
    }

    private function add(string $path, $action, $name, $method) {
        $route = new Route($path, $action);
        $this->routes[$method][] = $route;
        if (is_string($action) && $name === null) {
            $name = strtolower(str_replace('@', '_', $action));
        }
        if ($name) {
            $this->namedRoute[$name] = $route;
        }
        return $route;
    }

    /**
     * @return mixed
     * @throws \Exception
     */
    public function run()
    {
        foreach ($this->routes[$_SERVER['REQUEST_METHOD']] as $route) {
            if ($route->matches($this->url)) {
                return $route->execute();
            }
        }
        throw new \Exception("Route not found");
    }

    public function url($name, $params = []) {
        if (isset($this->namedRoute[$name])) {
            return $this->namedRoute[$name]->getUrl($params);
        }
    }

}