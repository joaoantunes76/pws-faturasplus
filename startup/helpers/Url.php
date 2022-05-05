<?php

class Url
{
    static public function toRoute($controller, $action, $id = null): string
    {
        $controller = strtolower($controller);
        $action = strtolower($action);
        $route = explode( '/' , $_SERVER['REQUEST_URI']);
        return "/$route[1]/$controller/$action".($id != null ? "/$id" : "");
    }

    static public function getBaseUrl() :string {
        $route = explode( '/' , $_SERVER['REQUEST_URI']);
        return "http://localhost/$route[1]";
    }
}