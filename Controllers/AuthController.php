<?php

class AuthController extends BaseController
{
    private $auth;

    /**
     * @param $auth
     */
    public function __construct($auth)
    {
        $this->auth = $auth;
    }

    public function login(){
        if($_SERVER["REQUEST_METHOD"] === "POST"){
            if(isset($_POST["username"]) && isset($_POST["password"])){
                $username = $_POST["username"];
                $password = $_POST["password"];
                if($this->auth->CheckAuth($username, $password)){
                    $this->redirect(ROTA_HOME);
                }
                else{
                    $error = true;
                    $this->view('auth/login.php');
                }
            }
        }
        else{
            $this->view('auth/login.php', $params = [
                'bodycss' => 'body-login',
            ]);
        }
    }

    public function logout(){
        $this->auth->Logout();

        $this->redirect(ROTA_LOGIN);
    }
}