<?php
class Auth
{
    public function __construct()
    {
        session_start();
    }

    function CheckAuth($username, $password){
        if($username == "admin" && $password == "admin123"){
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