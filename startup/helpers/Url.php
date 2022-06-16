<?php

class Url
{
    static public function toRoute($controller, $action, $id = null): string
    {
        $controller = strtolower($controller);
        $action = strtolower($action);
        $route = explode( '/' , $_SERVER['REQUEST_URI']);
        $server = $_SERVER['SERVER_NAME'];
        if($server == "localhost") {
            return "/$route[1]/$controller/$action".($id != null ? "/$id" : "");
        }
        else{
            return "/$controller/$action".($id != null ? "/$id" : "");
        }
    }

    static public function getBaseUrl() :string {
        $route = explode( '/' , $_SERVER['REQUEST_URI']);
        $server = $_SERVER['SERVER_NAME'];
        $port = $_SERVER['SERVER_PORT'];
        if($server == "localhost") {
            return "http://$server:$port/$route[1]";
        }
        else{
            return "http://$server:$port";
        }
    }
}