<?php
namespace App\Core;

class Loader
{
    protected $routes;
    public $controller = 'main';
    public $action = 'index';
    public $error = false;

    protected static $instance;


    public static function i()
    {
        if (self::$instance === null) {
            self::$instance = new static();
        }

        return self::$instance;
    }

    public function getRoute()
    {
        $this->routes = explode('/', $_SERVER['REQUEST_URI']);

        if (!empty($this->routes[1])) {
            $this->controller = $this->routes[1];
        }

        if (!empty($this->routes[2])) {
            $this->action = $this->routes[2];
        }

        $className = '\\App\\Controllers\\'.ucfirst($this->controller);

        if (class_exists($className)) {
            $this->controller = $className;
        } else {
            $this->error = true;
            return $this;
        }

        $methods = get_class_methods($this->controller);
        $method_names = [];
        foreach ($methods as $method) {
            $method_names[$method] = mb_strtolower($method);
        }
        $key = array_search(mb_strtolower($this->action), $method_names);

        if ($key === false || is_null($key)) {
            $this->error = true;
        } else {
            $this->action = $key;
        }

        return $this;
    }

}
