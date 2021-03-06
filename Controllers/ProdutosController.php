<?php

class ProdutosController extends BaseAuthController
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

        $produtos = Produto::all();
        $this->view('produtos/index.php', [
            'produtos' => $produtos
        ]);
    }

    /**
     * @throws \ActiveRecord\RecordNotFound
     */
    public function showAction($id)
    {
        $this->loginFilter($this->auth, [2, 3]);

        $produto = Produto::find(['id' => $id]);
        if(is_null($produto)){
            echo '<h1>Erro:</h1><h3>Nenhum Produto foi encontrado.</h3>';
        }
        else{
            $this->view('produtos/show.php', [
                'produto' => $produto
            ]);
        }
    }

    public function createAction()
    {
        $this->loginFilter($this->auth, [2, 3]);

        $ivas = Iva::all(array('conditions' => 'vigor = 1'));
        if($_SERVER["REQUEST_METHOD"] == "POST"){

            $produto = new Produto();
            $produto->referencia = $_POST["referencia"];
            $produto->descricao = $_POST["descricao"];
            $produto->preco = $_POST["preco"];
            $produto->stock = $_POST["stock"];
            $produto->iva_id = $_POST["iva_id"];
            $produto->save();
            $this->redirect("Produtos", "Index");
        }
        else{
            $this->view('produtos/form.php',[
                'ivas' => $ivas
            ]);
        }
    }

    /**
     * @throws \ActiveRecord\RecordNotFound
     */
    public function updateAction($id)
    {
        $this->loginFilter($this->auth, [2, 3]);

        $produto = Produto::find(['id' => $id]);
        $ivas = Iva::all(array('conditions' => 'vigor = 1'));
        if($_SERVER["REQUEST_METHOD"] == "POST"){
            $produto->referencia = $_POST["referencia"];
            $produto->descricao = $_POST["descricao"];
            $produto->preco = $_POST["preco"];
            $produto->stock = $_POST["stock"];
            $produto->iva_id = $_POST["iva_id"];
            $produto->save();
            $this->redirect("Produtos", "Index");
        }
        else{
            if(is_null($produto)){
                echo '<h1>Erro:</h1><h3>Nenhum Produto foi encontrado.</h3>';
            }
            else{
                $this->view('produtos/form.php', [
                    'produto' => $produto,
                    'ivas' => $ivas
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

        $produto = Produto::find(['id' => $id]);
        if(is_null($produto)){
            echo '<h1>Erro:</h1><h3>Nenhum Produto foi encontrado.</h3>';
        }
        else{
            $linhaFatura = Linhasfatura::find(['produto_id' => $produto->id]);
            if($linhaFatura == null){
                $produto->delete();
            }
            else {
                $error = 'Existem Linhas de Fatura associadas a este Produto.';
                session_start();
                $_SESSION["error"] = $error;
            }

            $this->redirect("Produtos", "Index");
        }
    }
}