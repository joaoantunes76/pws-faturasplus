<?php

class RolesController extends BaseAuthController
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

        $roles = Role::all();
        $this->view('roles/index.php', [
            'roles' => $roles
        ]);
    }
}