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
    public function CheckAuth($username, $password): bool
    {
        $user = User::find(['username' => $username]);
        if($user->password == $password){
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

    /**
     * @throws \ActiveRecord\RecordNotFound
     */
    public function getUserRole(): int{
        if(isset($_SESSION["user"]) && $_SESSION["user"] !== ""){
            $user = User::find(['username' => 'admin']);
            return $user->role->id;
        }
        return -1;
    }

    public function Logout(): void{
        session_destroy();
    }
}