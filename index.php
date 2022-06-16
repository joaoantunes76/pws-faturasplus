<?php

error_reporting(E_ERROR);
ini_set('display_errors', 'on');

require_once 'startup/boot.php';

$auth = new Auth();
$route = explode( '/' , $_SERVER['REQUEST_URI']);

if($_SERVER["SERVER_NAME"] == "localhost") {
    $controllerName = $route[2];
    $action = strtok($route[3], '?');
    $id = strtok($route[4], '?');
}
else{
    $controllerName = $route[1];
    $action = strtok($route[2], '?');
    $id = strtok($route[3], '?');
}

if ($controllerName == null) {
    $controllerName = DEFAULT_ROUTE[0];
}

$class = strtolower($controllerName) . 'Controller';



if (class_exists($class)) {
    $controller = new $class($auth);
    if (isset($controllerName)) {
        if ($action == "") {
            $action = "index";
        }
        $function = strtolower($action) . 'Action';

        if (method_exists($controller, $function)) {
            $controller->$function($id);
        } else {
            include_once 'Views/PageNotFound.php';
        }
    }
} else {
    include_once 'Views/PageNotFound.php';
}
