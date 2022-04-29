<?php

class DebugController extends BaseController
{

    public function index(){
        $user = new User();
        $role = new Role();
        $permissions = new Permission();
        echo '<pre>';
        $user = $user->getUserById(1);
        print_r($user);
    }
}