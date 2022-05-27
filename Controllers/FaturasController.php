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

    public function emitirprimeirafaseAction()
    {
        $this->loginFilter($this->auth, [2, 3]);
        $clientes = User::all(array('conditions' => 'role_id LIKE 1'));
        $this->view('faturas/search-cliente.php', [
            'clientes' => $clientes
        ]);
    }

    public function emitirsegundafaseAction($id)
    {
        $this->loginFilter($this->auth, [2, 3]);

//        $dataAtual = Carbon::now();
        $currUser = User::first(array('conditions' => 'username LIKE "'.$_SESSION['user'].'"'));

        $ultimaFatura = Fatura::find('last', array('conditions' => array('funcionario_id LIKE ? AND cliente_id LIKE ? AND valorTotal LIKE 0.00 AND ivaTotal LIKE 0 AND estado LIKE "Em lançamento"', $currUser->id, $id)));
        if ($ultimaFatura == null){
            $fatura = new Fatura();
            $fatura->funcionario_id = $currUser->id;
            $fatura->cliente_id = $id;
            $fatura->data = '2022-05-27';
            $fatura->valortotal = 0;
            $fatura->ivatotal = 0;
            $fatura->estado = 'Em lançamento';
            $fatura->save();
        }
        $ultimaFatura = Fatura::last(array('conditions' => array('funcionario_id LIKE ? AND cliente_id LIKE ? AND estado LIKE "Em lançamento"', $currUser->id, $id)));
        $linhasFatura = Linhasfatura::all(array('conditions' => 'fatura_id LIKE '.$ultimaFatura->id));

        $this->view('faturas/linhas-fatura.php', [
            'fatura' => $ultimaFatura,
            'linhasFatura' => $linhasFatura
        ]);
    }
}