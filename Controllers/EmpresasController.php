<?php



class EmpresasController extends BaseAuthController
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

        if($this->auth::getUserRole() == 2){
            $user = User::find(['username' => $this->auth::getUsername()]);
            $funcionario = Funcionario::find(["user_id" => $user->id]);
            $empresa = $funcionario->empresa;
            $this->redirect('Empresas', 'Show', $empresa->id);
        }

        $empresas = Empresa::all();
        $this->view('empresas/index.php', [
            'empresas' => $empresas
        ]);
    }

    /**
     * @throws \ActiveRecord\RecordNotFound
     */
    public function showAction($id)
    {
        $this->loginFilter($this->auth, [2, 3]);

        $empresa = Empresa::find(['id' => $id]);
        if(is_null($empresa)){
            echo '<h1>Error:</h1><h3>Nenhuma Empresa foi encontrada</h3>';
        }
        else{
            $this->view('empresas/show.php', [
                'empresa' => $empresa,
                'role' => Role::find(['id' => $this->auth::getUserRole()]),
            ]);
        }
    }

    public function createAction()
    {
        $this->loginFilter($this->auth, [2, 3]);

        if($_SERVER["REQUEST_METHOD"] == "POST"){
            $empresa = new Empresa();
            $empresa->designacaosocial = $_POST["designacaosocial"];
            $empresa->email = $_POST["email"];
            $empresa->telefone = $_POST["telefone"];
            $empresa->nif = $_POST["nif"];
            $empresa->morada = $_POST["morada"];
            $empresa->codigopostal = $_POST["codigopostal"];
            $empresa->localidade = $_POST["localidade"];
            $empresa->capitalsocial = $_POST["capitalsocial"];
            $empresa->save();
            $this->redirect("Empresas", "Index");
        }
        else{
            $this->view('empresas/form.php');
        }
    }

    /**
     * @throws \ActiveRecord\RecordNotFound
     */
    public function updateAction($id)
    {
        $this->loginFilter($this->auth, [2, 3]);

        $empresa = Empresa::find(['id' => $id]);
        if($_SERVER["REQUEST_METHOD"] == "POST"){
            $empresa->designacaosocial = $_POST["designacaosocial"];
            $empresa->email = $_POST["email"];
            $empresa->telefone = $_POST["telefone"];
            $empresa->nif = $_POST["nif"];
            $empresa->morada = $_POST["morada"];
            $empresa->codigopostal = $_POST["codigopostal"];
            $empresa->localidade = $_POST["localidade"];
            $empresa->capitalsocial = $_POST["capitalsocial"];
            if($empresa->save()) {
                $this->redirect("Empresas", "index");
            }
            else{
                $this->view('empresas/form.php', [
                    'empresa' => $empresa
                ]);
            }
        }
        else {
            if(is_null($empresa)){
                echo '<h1>Error:</h1><h3>Nenhuma Empresa foi encontrada</h3>';
            }
            else{
                $this->view('empresas/form.php', [
                    'empresa' => $empresa
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

        $empresa = Empresa::find(['id' => $id]);
        if(is_null($empresa)){
            echo '<h1>Error:</h1><h3>Nenhuma Empresa foi encontrada</h3>';
        }
        else{
            $funcionarios = Funcionario::find(['empresa_id' => $empresa->id]);
            if($funcionarios == null){
                $empresa->delete();
            }
            else {
                $error = 'Existem Funcion??rios associados a esta Empresa.';
                session_start();
                $_SESSION["error"] = $error;
            }

            $this->redirect("Empresas", "index");
        }
    }

    /**
     * @throws \ActiveRecord\RecordNotFound
     */
    public function funcionariosAction($id)
    {
        $this->loginFilter($this->auth, [2, 3]);
        $empresa = Empresa::find(['id' => $id]);
        if ($empresa == null){
            echo '<h1>Error:</h1><h3>Nenhuma Empresa foi encontrada</h3>';
        } else {
            $funcionarios = Funcionario::all(["empresa_id" => $id]);
            $empresa = Empresa::find(["id" => $id]);

            $this->view('empresas/funcionarios.php', [
                'funcionarios' => $funcionarios,
                'empresa' => $empresa,
            ]);
        }
    }

    public function createfuncionarioAction($id)
    {
        $this->loginFilter($this->auth, [2, 3]);
        $empresa = Empresa::find(['id' => $id]);
        if ($empresa == null){
            echo '<h1>Error:</h1><h3>Nenhuma Empresa foi encontrada</h3>';
        } else {
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $user = new User();
                $user->role_id = 2;
                $user->username = $_POST["username"];
                $user->password = hash('sha256', $_POST["password"]);
                $user->email = $_POST["email"];
                $user->telefone = $_POST["telefone"];
                $user->nif = $_POST["nif"];
                $user->morada = $_POST["morada"];
                $user->codigopostal = $_POST["codigopostal"];
                $user->localidade = $_POST["localidade"];
                if ($user->save()) {
                    $novoFuncionario = new Funcionario();
                    $novoFuncionario->user_id = $user->id;
                    $novoFuncionario->empresa_id = number_format($id);
                    $novoFuncionario->save();
                    $this->redirect("Empresas", "Index");
                } else {
                    print_r($user->errors);
                }
            } else {
                $this->view('empresas/form-funcionario.php');
            }
        }
    }
}