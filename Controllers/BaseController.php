<?php

abstract class BaseController
{
    public function redirect($controller, $action, $id = null){
        $url = strtolower("$controller/$action".($id != null ? "/$id" : ""));
        header("Location: ".Url::getBaseUrl()."/".$url);
        die();
    }

    public function view($view, $params = [], $template = "soft-ui"){
        extract($params);
        ob_start();
        include "Views/$view";
        $content = ob_get_clean();
        include_once "Views/layouts/$template.php";
    }

}