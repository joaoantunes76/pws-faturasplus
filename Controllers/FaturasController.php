<?php

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

    //Vista Faturas emitidas
    public function indexAction()
    {
        $this->loginFilter($this->auth, [2, 3]);

        $faturas = Fatura::all();
        $this->view('faturas/index.php', [
            'faturas' => $faturas
        ]);
    }
}