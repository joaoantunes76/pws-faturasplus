<?php
class Auth
{
    public function __construct()
    {
        session_start();
    }

    /**
     * @throws \ActiveRecord\RecordNotFound
     */
    static public function CheckAuth($username, $password): bool
    {
        $user = User::find(['username' => addslashes($username)]);
        if($user->password == $password){
            $_SESSION["user"] = addslashes($username);
            return true;
        }
        return false;
    }

    static public function IsLoggedIn(): bool
    {
        if(isset($_SESSION["user"]) && $_SESSION["user"] !== ""){
            return true;
        }
        return false;
    }

    /**
     * @throws \ActiveRecord\RecordNotFound
     */
    static public function getUserRole(): int{
        if(isset($_SESSION["user"]) && $_SESSION["user"] !== ""){
            $user = User::find(['username' => addslashes($_SESSION["user"])]);
            return $user->role->id;
        }
        return -1;
    }

    public function Logout(): void{
        session_destroy();
    }
}