<?php

class DebugController extends BaseController
{

    public function index(){
        $this->redirect()
        $user = new User();
        $roles = new Role();
        $permissions = new Permission();
        echo '<pre>';
        print_r($user->getUserById(1));
        print_r($roles->getRoleById(1));
        print_r($permissions->getPermissions());
    }

    public function logout(){
        
    }
}