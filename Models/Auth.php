<?php
class Auth
{
    public function __construct()
    {
        session_start();
    }

    function CheckAuth($username, $password){
        $user = new User();
        $user = $user->getUserByUsername($username);
        if($user->password == hash('sha256', $password)){
            $_SESSION["user"] = $username;
            return true;
        }
        return false;
    }

    function IsLoggedIn(){
        if(isset($_SESSION["user"]) && $_SESSION["user"] != ""){
            return true;
        }
        return false;
    }

    function Logout(){
        session_destroy();
    }
}