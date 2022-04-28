<?php

abstract class BaseController
{
    public function redirect($r){
        header("Location: http://localhost/Ficha7/index.php?r=".$r);
        die();
    }

    public function view($view, $params = []){
        extract($params);
        include_once "Views/layouts/header.php";
        include_once "Views/".$view;
        include_once "Views/layouts/footer.php";
    }

    public function loginFilter($auth){
        if(!$auth->IsLoggedIn()){
            $this->redirect(ROTA_LOGIN);
        }
    }

}