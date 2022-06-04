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
            echo '<h1>Error:</h1><h3>No book found by that id</h3>';
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
                echo '<h1>Error:</h1><h3>No Iva found by that id</h3>';
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
     */
    public function deleteAction($id)
    {
        $this->loginFilter($this->auth, [2, 3]);

        $iva = Iva::find(['id' => $id]);
        if(is_null($iva)){
            echo '<h1>Error:</h1><h3>No Iva found by that id</h3>';
        }
        else{
            $iva->delete();
            $this->redirect("Ivas", "Index");
        }
    }
}