<?php

class SiteController extends BaseAuthController
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
        if($this->auth::getUserRole() == 1){
            $this->redirect("Faturas", "Index");
        }

        $faturasDesteMes = Fatura::all(array('conditions' => 'MONTH(data) = MONTH(CURRENT_DATE()) AND YEAR(data) = YEAR(CURRENT_DATE())'));
        $faturasMesPassado = Fatura::all(array('conditions' => 'MONTH(data) = MONTH(CURRENT_DATE() - INTERVAL 1 MONTH) AND YEAR(data) = YEAR(CURRENT_DATE() - INTERVAL 1 MONTH)'));

        $novasFaturas = array();
        $novasFaturas[0] = sizeof($faturasDesteMes);

        if(sizeof($faturasMesPassado) > 0) {
            $novasFaturas[1] = (sizeof($faturasDesteMes) * 100) / sizeof($faturasMesPassado);
        }

        $clientes = User::all(array('conditions' => 'role_id = 1'));
        $funcionarios = User::all(array('conditions' => 'role_id = 2'));
        $empresas = Empresa::all();

        $this->view('site/index.php', [
            'novasFaturas' => $novasFaturas,
            'clientes' => sizeof($clientes),
            'funcionarios' => sizeof($funcionarios),
            'empresas' => sizeof($empresas)
        ]);

    }
}