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

    public function getDataAtual(){
        //$dataAtual = Carbon::now()->format('Y-m-d');
        $dataAtual = date('Y-m-d');
        return $dataAtual;
    }

    //Lista de faturas para o cliente
    public function indexAction()
    {
        $this->loginFilter($this->auth, [1, 2, 3]);

        if (Auth::getUserRole() == 1){
            $currUser = User::first(array('conditions' => 'username LIKE "'.$_SESSION['user'].'"'));

            $faturas = Fatura::all(array('conditions' => array('cliente_id = ? AND estado LIKE "Emitida"', $currUser->id)));

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

    //vista da fatura individual para o cliente
    public function faturaindividualAction($faturaId)
    {
        $fatura = Fatura::find(["id" => $faturaId]);
        $cliente = User::find(["id" => $fatura->cliente_id]);
        $funcionario = User::find(["id" => $fatura->funcionario_id]);
        $empresa = Empresa::find(["id" => $fatura->funcionario->empresa->id]);
        $linhasFatura = Linhasfatura::all(array('conditions' => 'fatura_id = '.$fatura->id));
        $totalSemIva = $fatura->valortotal - $fatura->ivatotal;

        $this->view('faturas/fatura-individual.php', [
            'fatura' => $fatura,
            'cliente' => $cliente,
            'funcionario' => $funcionario,
            'empresa' => $empresa,
            'linhasFatura' => $linhasFatura,
            'totalSemIva' => $totalSemIva,
        ],
        'template-faturaindividual');
    }


    //Mostra a vista de clientes para o funcionário escolher
    public function emitirprimeirafaseAction()
    {
        //TODO: SEARCH BAR GET REQUEST
        //TODO: Session para o admin escolher a empresa numa nova vista
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

        $cliente = User::find(["id" => $id]);
        $currUser = User::first(array('conditions' => 'username LIKE "'.Auth::getUsername().'"'));
        $dataAtual = $this->getDataAtual();

        $ultimaFatura = Fatura::find('last', array('conditions' => array('funcionario_id LIKE ? AND cliente_id LIKE ? AND estado LIKE "Em lançamento"', $currUser->id, $id)));
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

        $fatura = Fatura::find(["id" => $id]);
        $cliente = User::find(["id" => $fatura->cliente_id]);

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

                $produto = Produto::find(["id" => $_POST["produtoId"]]);
                $produto->stock = $produto->stock - $_POST["quantidade"];
                $produto->save();

                $linhas = Linhasfatura::all(array('conditions' => 'fatura_id = '.$_POST["faturaId"]));
                $valorTotal = 0;
                $ivaTotal = 0;
                foreach ($linhas as $linha){
                    $valorTotal += $linha->quantidade * ($linha->valorunitario + $linha->valoriva);
                    $ivaTotal += $linha->quantidade * $linha->valoriva;
                }

                $fatura = Fatura::find(["id" => $_POST["faturaId"]]);
                $fatura->data = $this->getDataAtual();
                $fatura->valortotal = $valorTotal;
                $fatura->ivatotal = $ivaTotal;
                $fatura->save();

                $this->redirect('Faturas', 'EmitirSegundaFase', $_POST["clienteId"]);
            } else {
                $cliente = User::find(["id" => $_POST["clienteId"]]);
                $fatura = Fatura::find(["id" => $_POST["faturaId"]]);
                $produto = Produto::find(["id" => $_POST["produtoId"]]);
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

    //Apaga uma Linha de Fatura
    public function deletelinhafaturaAction($id)
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST"){
            $clienteId = $_POST["clienteId"];
            $produtoId = $_POST["produtoId"];

            $linhaFatura = Linhasfatura::find(["id" => $id]);
            $produto = Produto::find(["id" => $produtoId]);
            $fatura = Fatura::find(["id" => $linhaFatura->fatura_id]);

            $produto->stock = $produto->stock + $linhaFatura->quantidade;
            $produto->save();

            $fatura->valortotal = $fatura->valortotal - ($linhaFatura->quantidade * ($linhaFatura->valorunitario + $linhaFatura->valoriva));
            $fatura->ivatotal = $fatura->ivatotal - ($linhaFatura->quantidade * $linhaFatura->valoriva);
            $fatura->save();

            $linhaFatura->delete();

            $this->redirect('Faturas', 'EmitirSegundaFase', $clienteId);
        } else {
            $this->redirect('Faturas', 'index');
        }
    }

    //Pre-visualizar fatura
    public function previsualizarfaturaAction()
    {
        $this->loginFilter($this->auth, [2, 3]);
        if ($_SERVER["REQUEST_METHOD"] = "POST") {
            $cliente = User::find(["id" => $_POST["clienteId"]]);
            $fatura = Fatura::find(["id" => $_POST["faturaId"]]);

            if ($fatura->cliente_id == $cliente->id){
                $fatura->data = $this->getDataAtual();
                $fatura->save();

                $linhasFatura = Linhasfatura::all(array('conditions' => 'fatura_id LIKE '.$fatura->id));
                $funcionario = User::find(["id" => $fatura->funcionario_id]);
                $funcionarioPerfil = Funcionario::find(["user_id" => $funcionario->id]);
                $empresa = Empresa::find(["id" => $funcionarioPerfil->empresa_id]);

                $totalSemIva = $fatura->valortotal - $fatura->ivatotal;

                $this->view('faturas/previsualizar-fatura.php', [
                    'fatura' => $fatura,
                    'cliente' => $cliente,
                    'funcionario' => $funcionario,
                    'empresa' => $empresa,
                    'linhasFatura' => $linhasFatura,
                    'totalSemIva' => $totalSemIva,
                ]);
            }
        }
    }

    public function emitirfaturaAction(){

        $this->loginFilter($this->auth, [2, 3]);
        if ($_SERVER["REQUEST_METHOD"] = "POST") {
            $faturaId = $_POST["faturaId"];

            $fatura = Fatura::find(["id" => $faturaId]);
            $fatura->data = $this->getDataAtual();
            $fatura->estado = 'Emitida';
            $fatura->save();

            $this->redirect('Faturas', 'index');
        } else {
            $this->redirect('Faturas', 'index');
        }

    }

}