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

    public function loginAction(){
        if($_SERVER["REQUEST_METHOD"] === "POST"){
            if(isset($_POST["username"]) && isset($_POST["password"])){
                $username = addslashes($_POST["username"]);
                $password = addslashes($_POST["password"]);
                if($this->auth->CheckAuth($username, hash('sha256', $password))){
                    $this->redirect(DEFAULT_ROUTE[0], "Index");
                }
                else{
                    $error = true;
                    $this->view('auth/login.php', $params = [
                        'bodycss' => 'body-login',
                        'error' => $error
                    ],
                        'template-login');
                }
            }
        }
        else{
            $this->view('auth/login.php', $params = [
                'bodycss' => 'body-login',
            ],
            'template-login');
        }
    }

    public function alterarPasswordAction(){
        $newPassword = $_POST["password"];
        $hashedPassword = hash("sha256", $newPassword);
        $user = User::find(["username" => $this->auth::getUsername()]);
        $user->password = $hashedPassword;
        $user->save();
        $this->redirect('Site', 'Index');
    }

    public function logoutAction(){
        $this->auth->Logout();

        $this->redirect("Auth", "Login");
    }
}