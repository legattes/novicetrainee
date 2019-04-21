<?php

session_start();

class Session
{

    public static function handle($type = null)
    {
        if (!isset($_SESSION['logged']) || $_SESSION['logged'] != 'true') {
            self::loggout();
        }

        if ($type != null) {
            if (!isset($_SESSION['type']) || $_SESSION['type'] != $type) {
                self::loggout();
            }
        }
    }

    public static function login($type, $model)
    {
        $_SESSION['logged'] = 'true';
        $_SESSION['type'] = $type;
        $_SESSION['model'] = $model;
    }

    public static function loggout()
    {
        unset($_SESSION['logged']);

        if(session_status() == PHP_SESSION_ACTIVE){
            session_destroy();
        }

        header('Location: ../../index.php');
        die();
    }

    public static function put($key, $value)
    {
        $_SESSION[$key] = $value;
    }

    public static function token($token)
    {
        $_SESSION['token'] = $token;
    }

    public static function get($key)
    {
        return $_SESSION[$key];
    }
}
