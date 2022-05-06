<?php

class RolesController extends BaseAuthController
{
    public function indexAction()
    {
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
        $role = Role::find(['id' => $id]);
        if(is_null($role)){
            echo '<h1>Error:</h1><h3>No book found by that id</h3>';
        }
        else{
            $this->view('roles/show.php', [
                'book' => $role
            ]);
        }
    }

    public function createAction()
    {
        if($_SERVER["REQUEST_METHOD"] == "POST"){
            $role = new Role();
            $role->name = $_POST["name"];
            $role->isbn = $_POST["isbn"];
            $role->save();
            $this->redirect("Roles", "Index");
        }
        else{
            $roles = Roles::all();
            $this->view('roles/form.php');
        }
    }

    /**
     * @throws \ActiveRecord\RecordNotFound
     */
    public function updateAction($id)
    {
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
                    'book' => $role
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