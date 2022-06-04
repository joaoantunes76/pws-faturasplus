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
}