<?php

class UsersController extends BaseAuthController
{
    private Auth $auth;

    /**
     * @param Auth $auth
     */
    public function __construct(Auth $auth)
    {
        $this->auth = $auth;
    }


    public function indexAction()
    {
        $this->loginFilter($this->auth, [2, 3]);

        if(isset($_GET["limpar"])){
            $this->redirect("Users", "Index");
        }

        if($this->auth::getUserRole() == 2) {
            $users = User::find("all",['role_id' => 1]);
        }
        else {

            if(isset($_GET["pesquisa"])){
                $pesquisa = addslashes($_GET["pesquisa"]);
                $users = User::find("all",  array('conditions' => "username LIKE '%".$pesquisa."%' OR email LIKE '%".$pesquisa."%' OR telefone LIKE '%".$pesquisa."%' OR nif LIKE '%".$pesquisa."%' OR morada LIKE '%".$pesquisa."%' OR codigoPostal LIKE '%".$pesquisa."%' OR localidade LIKE '%".$pesquisa."%'"));
            }
            else{
                $users = User::all();
            }

        }
        $this->view('users/index.php', [
            'users' => $users
        ]);
    }

    /**
     * @throws \ActiveRecord\RecordNotFound
     */
    public function showAction($id)
    {
        $this->loginFilter($this->auth, [2, 3]);

        $user = User::find(['id' => $id]);
        if(is_null($user)){
            echo '<h1>Error:</h1><h3>No book found by that id</h3>';
        }
        else{
            $this->view('users/show.php', [
                'user' => $user
            ]);
        }
    }

    public function createAction()
    {
        $this->loginFilter($this->auth, [2, 3]);

        if($_SERVER["REQUEST_METHOD"] == "POST"){
            $user = new User();
            $user->role_id = 1;
            if(isset($_POST["role_id"])) {
                $user->role_id = $_POST["role_id"];
            }
            $user->username = $_POST["username"];
            $user->password = hash('sha256', $_POST["password"]);
            $user->email = $_POST["email"];
            $user->telefone = $_POST["telefone"];
            $user->nif = $_POST["nif"];
            $user->morada = $_POST["morada"];
            $user->codigopostal = $_POST["codigopostal"];
            $user->localidade = $_POST["localidade"];
            $user->save();
            $this->redirect("Users", "Index");
        }
        else{
            $user = User::all();
            $this->view('users/form.php', [
                'roles' => Role::all()
            ]);
        }
    }

    /**
     * @throws \ActiveRecord\RecordNotFound
     */
    public function updateAction($id)
    {
        $this->loginFilter($this->auth, [2, 3]);

        $user = User::find(['id' => $id]);
        if($_SERVER["REQUEST_METHOD"] == "POST"){
            $user->role_id = 1;
            if(isset($_POST["role_id"])) {
                $user->role_id = $_POST["role_id"];
            }
            $user->username = $_POST["username"];
            $user->password = hash('sha256', $_POST["password"]);
            $user->email = $_POST["email"];
            $user->telefone = $_POST["telefone"];
            $user->nif = $_POST["nif"];
            $user->morada = $_POST["morada"];
            $user->codigopostal = $_POST["codigopostal"];
            $user->localidade = $_POST["localidade"];
            $user->save();
            $this->redirect("Users", "index");
        }
        else {
            if(is_null($user)){
                echo '<h1>Error:</h1><h3>No book found by that id</h3>';
            }
            else{
                $this->view('users/form.php', [
                    'roles' => Role::all(),
                    'user' => $user
                ]);
            }
        }
    }

    /**
     * @throws \ActiveRecord\RecordNotFound
     * @throws \ActiveRecord\ActiveRecordException
     */
    public function deleteAction($id)
    {
        $this->loginFilter($this->auth, [2, 3]);

        $user = User::find(['id' => $id]);
        if(is_null($user)){
            echo '<h1>Error:</h1><h3>No book found by that id</h3>';
        }
        else{

            if ($user->role_id == 2){
                $funcionario = Funcionario::find(['user_id' => $user->id]);

                $fatura = Fatura::find(['funcionario_id' => $user->id]);
                if($fatura == null){
                    $funcionario->delete();
                    $user->delete();
                }
                else {
                    $error = 'Existem Faturas associadas a este Utilizador.';
                    session_start();
                    $_SESSION["error"] = $error;
                }
            }

            if ($user->role_id == 1){
                $fatura = Fatura::find(['cliente_id' => $user->id]);
                if ($fatura == null){
                    $user->delete();
                }
                else {
                    $error = 'Existem Faturas associadas a este Utilizador.';
                    session_start();
                    $_SESSION["error"] = $error;
                }
            }

        }
        $this->redirect("Users", "index");
    }
}