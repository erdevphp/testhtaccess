<?php
namespace Core\Router;

use Core\DIC\DIC;

class Route
{
    /**
     * @var string
     */
    private $path;
    /**
     * @var string
     */
    private $action;
    private $matches = [];
    private $params = [];


    public function __construct(string $path, $action)
    {
        $this->path = trim($path, '/');
        $this->action = $action;
    }

    public function matches(string $url) {
        $path = preg_replace_callback('#:([\w]+)#', [$this, 'paramMatch'], $this->path);
        $pathToMatch = "#^$path$#i";
        if (!preg_match($pathToMatch, $url, $matches)) {
            return false;
        }
        array_shift($matches);
        $this->matches = $matches;
        return true;
    }

    private function paramMatch($match) {
        if (isset($this->params[$match[1]])) {
            return '(' . $this->params[$match[1]] . ')';
        } else {
            return '([^/]+)';
        }
    }

    public function execute(?string $namespaceController = 'App\\Controller\\', ?string $pattern = 'Controller') {
        if (is_string($this->action)) {
            $params = explode('@', $this->action);
            $controllerName = $namespaceController . $params[0] . $pattern;
            $router = $_SESSION['router'] ?? null;
            $controller = new $controllerName($router, DIC::getInstance());
            return call_user_func_array([$controller, $params[1]], $this->matches);
        } else {
            return call_user_func_array($this->action, $this->matches);
        }
    }

    public function with($params, $regex) {
        $this->params[$params] = str_replace('(','(?:', $regex);
        return $this;
    }

    public function getUrl($params) {
        $path = $this->path;
        foreach ($params as $k => $v) {
            $path = str_replace(":$k", $v, $path);
        }
        return dirname(ROOT_PATH) . $path;
    }
}