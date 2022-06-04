<?php

use Carbon\Carbon;

class FaturasController extends BaseAuthController
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
        $this->loginFilter($this->auth, [1, 2, 3]);

        if (Auth::getUserRole() == 1){
            $currUser = User::first(array('conditions' => 'username LIKE "'.$_SESSION['user'].'"'));

            $faturas = Fatura::all(array('conditions' => array('cliente_id LIKE ? AND estado LIKE ?', $currUser->id, '"Emitida"')));
            $this->view('faturas/index.php', [
                'faturas' => $faturas
            ]);
        }
        elseif (Auth::getUserRole() == 2 || Auth::getUserRole() == 3) {
            $faturas = Fatura::all(array('conditions' => 'estado LIKE "Emitida"'));
            $this->view('faturas/index-funcionario.php', [
                'faturas' => $faturas
            ]);
        }
    }

    //Mostra a vista de clientes para o funcionário escolher
    public function emitirprimeirafaseAction()
    {
        $this->loginFilter($this->auth, [2, 3]);
        $clientes = User::all(array('conditions' => 'role_id LIKE 1'));
        $this->view('faturas/search-cliente.php', [
            'clientes' => $clientes
        ]);
    }

    //Mostra a vista das Linhas Fatura
    public function emitirsegundafaseAction($id)
    {
        $this->loginFilter($this->auth, [2, 3]);

        $cliente = User::find($id);
        $currUser = User::first(array('conditions' => 'username LIKE "'.$_SESSION['user'].'"'));
        $dataAtual = Carbon::now()->format('Y-m-d');

        $ultimaFatura = Fatura::find('last', array('conditions' => array('funcionario_id LIKE ? AND cliente_id LIKE ? AND valorTotal LIKE 0.00 AND ivaTotal LIKE 0 AND estado LIKE "Em lançamento"', $currUser->id, $id)));
        if ($ultimaFatura == null){
            $fatura = new Fatura();
            $fatura->funcionario_id = $currUser->id;
            $fatura->cliente_id = $id;
            $fatura->data = $dataAtual;
            $fatura->valortotal = 0;
            $fatura->ivatotal = 0;
            $fatura->estado = 'Em lançamento';
            $fatura->save();
        }
        $ultimaFatura = Fatura::last(array('conditions' => array('funcionario_id LIKE ? AND cliente_id LIKE ? AND estado LIKE "Em lançamento"', $currUser->id, $id)));
        $linhasFatura = Linhasfatura::all(array('conditions' => 'fatura_id LIKE '.$ultimaFatura->id));

        $this->view('faturas/linhas-fatura.php', [
            'cliente' => $cliente,
            'fatura' => $ultimaFatura,
            'linhasFatura' => $linhasFatura
        ]);
    }

    //Mostra uma vista para o funcionário escolher o produto
    public function emitirterceirafaseAction($id)
    {
        $this->loginFilter($this->auth, [2, 3]);

        $fatura = Fatura::find($id);
        $cliente = User::find($fatura->cliente_id);
        $produtos = Produto::all(array('conditions' => 'stock > 0'));

        $this->view('faturas/search-produto.php', [
            'cliente' => $cliente,
            'fatura' => $fatura,
            'produtos' => $produtos,
        ]);
    }

    //Cria a Linha Fatura
    public function emitirquartafaseAction()
    {
        $this->loginFilter($this->auth, [2, 3]);

        if ($_SERVER["REQUEST_METHOD"] == "POST"){
            if (isset($_POST["quantidade"]) && isset($_POST["valorUnitario"]) && isset($_POST["valorIva"])){
                $linhaFatura = new Linhasfatura();
                $linhaFatura->quantidade = $_POST["quantidade"];
                $linhaFatura->valorunitario = $_POST["valorUnitario"];
                $linhaFatura->valoriva = $_POST["valorIva"];
                $linhaFatura->fatura_id = $_POST["faturaId"];
                $linhaFatura->produto_id = $_POST["produtoId"];
                $linhaFatura->save();
                $this->redirect('Faturas', 'EmitirSegundaFase', $_POST["clienteId"]);
            } else {
                $cliente = User::find($_POST["clienteId"]);
                $fatura = Fatura::find($_POST["faturaId"]);
                $produto = Produto::find($_POST["produtoId"]);
                $iva = $produto->iva->percentagem;
                $valorIva = ($iva / 100) * $produto->preco;

                $this->view('faturas/linhafatura-form.php', [
                    'cliente' => $cliente,
                    'fatura' => $fatura,
                    'produto' => $produto,
                    'valorIva' => $valorIva,
                ]);
            }
        }
    }

}