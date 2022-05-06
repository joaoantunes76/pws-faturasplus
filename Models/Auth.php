<?php
class Auth
{
    public function __construct()
    {
        session_start();
    }

    public function CheckAuth($username, $password): bool
    {
        if($username == "admin" && $password == "admin123"){
            $_SESSION["user"] = $username;
            return true;
        }
        return false;
    }

    public function IsLoggedIn(): bool
    {
        if(isset($_SESSION["user"]) && $_SESSION["user"] !== ""){
            return true;
        }
        return false;
    }

    public function Logout(): void{
        session_destroy();
    }
}