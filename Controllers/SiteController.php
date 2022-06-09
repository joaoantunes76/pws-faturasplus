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
        $this->view('site/index.php');

    }
}