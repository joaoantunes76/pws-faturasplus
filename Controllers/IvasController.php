<?php

class IvasController extends BaseAuthController
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

        $ivas = Iva::all();
        $this->view('ivas/index.php', [
            'ivas' => $ivas
        ]);
    }

    /**
     * @throws \ActiveRecord\RecordNotFound
     */
    public function showAction($id)
    {
        $this->loginFilter($this->auth, [2, 3]);

        $iva = Iva::find(['id' => $id]);
        if(is_null($iva)){
            echo '<h1>Error:</h1><h3>Nenhuma taxa de Iva foi encontrada</h3>';
        }
        else{
            $this->view('ivas/show.php', [
                'iva' => $iva
            ]);
        }
    }

    public function createAction()
    {
        $this->loginFilter($this->auth, [2, 3]);

        if($_SERVER["REQUEST_METHOD"] == "POST"){

            $iva = new Iva();
            $iva->percentagem = $_POST["percentagem"];
            $iva->descricao = $_POST["descricao"];
            if(isset($_POST["vigor"])) {
                $iva->vigor = 1;
            }
            else{
                $iva->vigor = 0;
            }
            $iva->save();
            $this->redirect("Ivas", "Index");
        }
        else{
            $this->view('ivas/form.php');
        }
    }

    /**
     * @throws \ActiveRecord\RecordNotFound
     */
    public function updateAction($id)
    {
        $this->loginFilter($this->auth, [2, 3]);

        $iva = Iva::find(['id' => $id]);
        if($_SERVER["REQUEST_METHOD"] == "POST"){
            $iva->percentagem = $_POST["percentagem"];
            $iva->descricao = $_POST["descricao"];
            if(isset($_POST["vigor"])) {
                $iva->vigor = 1;
            }
            else{
                $iva->vigor = 0;
            }
            $iva->save();
            $this->redirect("Ivas", "Index");
        }
        else{
            if(is_null($iva)){
                echo '<h1>Error:</h1><h3>Nenhuma taxa de Iva foi encontrada</h3>';
            }
            else{
                $this->view('ivas/form.php', [
                    'iva' => $iva
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

        $iva = Iva::find(['id' => $id]);
        if(is_null($iva)){
            echo '<h1>Error:</h1><h3>Nenhuma taxa de Iva foi encontrada</h3>';
        }
        else{
            $produto = Produto::find(['iva_id' => $iva->id]);
            //var_dump($produto);
            if($produto == null){
                $iva->delete();
            }
            else {
                $error = 'Existem produtos associados a este IVA.';
                session_start();
                $_SESSION["error"] = $error;
            }

            $this->redirect("Ivas", "Index");
        }
    }
}