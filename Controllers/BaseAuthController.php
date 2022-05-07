<?php

class BaseAuthController extends BaseController
{
    /**
     * @throws \ActiveRecord\RecordNotFound
     */
    public function loginFilter(Auth $auth, array $allowedRoles){
        $role = $auth->getUserRole();
        if(!$auth->IsLoggedIn()){
            $this->redirect("Auth", "Login");
        }
        if(!in_array($role, $allowedRoles)){
            include_once 'Views/Forbidden.php';
            die();
        }
    }

}


