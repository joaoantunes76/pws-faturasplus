<?php

abstract class BaseController
{
    public function redirect($controller, $action, $id = null){
        $url = strtolower("$controller/$action".($id != null ? "/$id" : ""));
        header("Location: ".Url::getBaseUrl()."/".$url);
        die();
    }

    public function view($view, $params = []){
        extract($params);
        include_once "Views/layouts/header.php";
        include_once "Views/".$view;
        include_once "Views/layouts/footer.php";
    }

}