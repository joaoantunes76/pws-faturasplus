<?php

class UsersController extends BaseAuthController
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

        $users = User::all();
        $this->view('users/index.php', [
            'users' => $users
        ]);
    }

    /**
     * @throws \ActiveRecord\RecordNotFound
     */
    public function showAction($id)
    {
        $this->loginFilter($this->auth, [2, 3]);

        $user = User::find(['id' => $id]);
        if(is_null($user)){
            echo '<h1>Error:</h1><h3>No book found by that id</h3>';
        }
        else{
            $this->view('users/show.php', [
                'user' => $user
            ]);
        }
    }

    public function createAction()
    {
        $this->loginFilter($this->auth, [2, 3]);

        if($_SERVER["REQUEST_METHOD"] == "POST"){
            $user = new User();
            $user->name = $_POST["name"];
            $user->isbn = $_POST["isbn"];
            $user->save();
            $this->redirect("Users", "Index");
        }
        else{
            $user = User::all();
            $this->view('users/form.php');
        }
    }

    /**
     * @throws \ActiveRecord\RecordNotFound
     */
    public function updateAction($id)
    {
        $this->loginFilter($this->auth, [2, 3]);

        $user = User::find(['id' => $id]);
        if($_SERVER["REQUEST_METHOD"] == "POST"){
            $user->name = $_POST["name"];
            $user->isbn = $_POST["isbn"];
            $user->save();
            $this->redirect("Users", "index");
        }
        else {
            if(is_null($user)){
                echo '<h1>Error:</h1><h3>No book found by that id</h3>';
            }
            else{
                $this->view('users/form.php', [
                    'user' => $user
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
        $this->loginFilter($this->auth, [2, 3]);

        $user = Users::find(['id' => $id]);
        if(is_null($user)){
            echo '<h1>Error:</h1><h3>No book found by that id</h3>';
        }
        else{
            $user->delete();
        }
        $this->redirect("Users", "index");
    }
}