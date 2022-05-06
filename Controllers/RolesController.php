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
        $this->loginFilter($this->auth);

        $roles = Role::all();
        $this->view('roles/index.php', [
            'roles' => $roles
        ]);
    }

    /**
     * @throws \ActiveRecord\RecordNotFound
     */
    public function showAction($id)
    {
        $this->loginFilter($this->auth);

        $role = Role::find(['id' => $id]);
        if(is_null($role)){
            echo '<h1>Error:</h1><h3>No book found by that id</h3>';
        }
        else{
            $this->view('roles/show.php', [
                'role' => $role
            ]);
        }
    }

    public function createAction()
    {
        $this->loginFilter($this->auth);

        if($_SERVER["REQUEST_METHOD"] == "POST"){
            $role = new Role();
            $role->name = $_POST["name"];
            $role->isbn = $_POST["isbn"];
            $role->save();
            $this->redirect("Roles", "Index");
        }
        else{
            $roles = Role::all();
            $this->view('roles/form.php');
        }
    }

    /**
     * @throws \ActiveRecord\RecordNotFound
     */
    public function updateAction($id)
    {
        $this->loginFilter($this->auth);

        $role = Role::find(['id' => $id]);
        if($_SERVER["REQUEST_METHOD"] == "POST"){
            $role->name = $_POST["name"];
            $role->isbn = $_POST["isbn"];
            $role->save();
            $this->redirect("Roles", "index");
        }
        else {
            if(is_null($role)){
                echo '<h1>Error:</h1><h3>No book found by that id</h3>';
            }
            else{
                $this->view('roles/form.php', [
                    'role' => $role
                ]);
            }
        }
    }

    /**
     * @throws \ActiveRecord\RecordNotFound
     * @throws \ActiveRecord\ActiveRecordException
     */
    public function deleteAction($id)
    {
        $this->loginFilter($this->auth);

        $role = Roles::find(['id' => $id]);
        if(is_null($role)){
            echo '<h1>Error:</h1><h3>No book found by that id</h3>';
        }
        else{
            $role->delete();
        }
        $this->redirect("Roles", "index");
    }
}