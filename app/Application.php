<?php
/**
 * Created by PhpStorm.
 * User: pmoskovets
 * Date: 26/11/2018
 * Time: 21:06
 */

namespace App;

use App\Core\Config;
use App\Core\Loader;
use App\Core\Session;

class Application
{
    protected static $instance;

    public static function i()
    {
        if (self::$instance === null) {
            self::$instance = new static();
            set_exception_handler([self::$instance, 'handleException']);
        }
        return self::$instance;
    }

    public function run()
    {
        $this->prepareToRoute();

        new Config();

        $this->runRoute();
    }

    public function prepareToRoute()
    {
        $this->getSession()->start();
    }

    public function runRoute()
    {
        /**
         * @var $route Loader
         */
        $route = Loader::i()->getRoute();
        if (!$route->error) {
            $this->runController($route->controller, $route->action);
        } else {
            $this->set404('404 Ошибка');
        }
    }

    public function getSession()
    {
        return Session::i();
    }

    public function handleException($exception)
    {
        restore_exception_handler();

        $errorController = '\\App\\Controllers\\Error';
        $this->runController($errorController, 'index', $exception);

        return true;
    }

    /**
     * @param string $message
     * @throws \Exception
     */
    public function set404($message = '')
    {
        throw new \Exception($message, 404);
    }

    protected function runController($controller, $action, $param = null)
    {
        $controller = new $controller;
        if ($param) {
            $controller->$action($param);
        } else {
            $controller->$action();
        }
    }
}