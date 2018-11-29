<?php

namespace App\Core;

class Session {

    /**
     * @var Session
     */
    protected static $instance;

    /**
     * @return static
     */
    public static function i() {
        if (self::$instance === null) {
            self::$instance = new static();
        }

        return self::$instance;
    }

    public function start()
    {
        @session_start();
    }

    public function destroy()
    {
        if ($this->getSessionId()) {
            $this->clear();
            @session_destroy();
        }
    }

    /**
     * @return string
     */
    public function getSessionId()
    {
        return session_id();
    }

    /**
     * @param string|array $key
     * @param mixed        $value
     */
    public function set($key, $value)
    {
        $_SESSION[$key] = $value;
    }

    /**
     * @param string $key
     */
    public function remove($key)
    {
        if (isset($_SESSION[$key])) {
            unset($_SESSION[$key]);
        }
    }

    /**
     * @param string|array $key
     * @param mixed        $defaultValue
     * @return mixed
     */
    public function get($key, $defaultValue = null)
    {
        return isset($_SESSION[$key]) ? $_SESSION[$key] : $defaultValue;
    }

    public function clear()
    {
        foreach (array_keys($_SESSION) as $key) {
            unset($_SESSION[$key]);
        }
    }


}