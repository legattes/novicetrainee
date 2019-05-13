<?php
require_once 'controller\Estudante.php';
require_once 'controller\Empresa.php';
//require_once 'Empresa.php';

/**
 * author legates (Lucas)
 * email lucas.arantes55@gmail.com
 */

class Route
{
    public static function handle()
    {
        $url = explode("/", $_SERVER['REQUEST_URI']);
        $method = $_SERVER["REQUEST_METHOD"];
        $args = [];
        unset($url[0]);


        $controller = array_shift($url);

        if (count($url) > 0) {
            foreach ($url as $argument) {
                array_push($args, $argument);
            }
        }

        $object = null;

        if (class_exists($controller)) {
            $path = $controller;
            $object = new $path;
        }

        if (self::isPageRedirect($controller, $method, $args)) {
            self::redirect($controller, $args);
        } else {
            if (is_object($object) && method_exists($object, $args[0] . $method)) {
                $function = $args[0] . $method;
                $object->$function($args);
            } else {
                include("../php/view/error.php");
            }
        }
    }

    protected static function isPageRedirect($controller, $method, $args)
    {
        if ($method != 'GET') {
            return false;
        }

        if ($controller = '' || file_exists('..php/view/' . $controller . '.php')) {
            return true;
        }

        if (!isset($args) || empty($args)) {
            return true;
        }

        return false;
    }

    protected static function redirect($controller, $args)
    {
        $pages = scandir('../php/view');

        if ($controller == '' || in_array($controller . '.php', $pages)) {
            include('../php/view/'. ($controller != '' ? $controller :  'index') .'.php');
            die();
        }

        if (!is_object($controller) && class_exists($controller)) {
            $controller = new $controller();
        } else {
            include("../php/view/error.php");
            die();
        }

        $controller->contentGET();
    }
}
