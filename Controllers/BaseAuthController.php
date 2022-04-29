<?php

class BaseAuthController extends BaseController
{
    public function loginFilter($auth){
        if(!$auth->IsLoggedIn()){
            $this->redirect(ROTA_LOGIN);
        }
    }

}