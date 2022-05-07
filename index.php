<?php

error_reporting(E_ERROR);
ini_set('display_errors', 'on');

require_once 'startup/boot.php';

$auth = new Auth();
$route = explode( '/' , $_SERVER['REQUEST_URI']);
if($route[2] == null){
    $route[2] = DEFAULT_ROUTE[0];
}
$class = strtolower($route[2]).'Controller';

if(class_exists($class)){
    $controller = new $class($auth);
    if (isset($route[2])) {
        if($route[3] == ""){
            $route[3] = "index";
        }
        $function = strtolower($route[3]).'Action';

        if (method_exists($controller, $function)){
            $controller->$function($route[4]);
        }
        else{
            include_once 'Views/PageNotFound.php';
        }
    }
}
else{;
    include_once 'Views/PageNotFound.php';
}
