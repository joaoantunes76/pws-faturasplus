<?php

class BooksController extends BaseAuthController
{
    public function indexAction()
    {
        $books = Book::all();
        $this->view('books/index.php', [
            'books' => $books
        ]);
    }

    /**
     * @throws \ActiveRecord\RecordNotFound
     */
    public function showAction($id)
    {
        $book = Book::find(['id' => $id]);
        if(is_null($book)){
            echo '<h1>Error:</h1><h3>No book found by that id</h3>';
        }
        else{
            $this->view('books/show.php', [
                'book' => $book
            ]);
        }
    }

    public function createAction()
    {
        if($_SERVER["REQUEST_METHOD"] == "POST"){
            $book = new Book();
            $book->name = $_POST["name"];
            $book->isbn = $_POST["isbn"];
            $book->save();
            $this->redirect("Books", "Index");
        }
        else{
            $books = Book::all();
            $this->view('books/form.php');
        }
    }

    /**
     * @throws \ActiveRecord\RecordNotFound
     */
    public function updateAction($id)
    {
        $book = Book::find(['id' => $id]);
        if($_SERVER["REQUEST_METHOD"] == "POST"){
            $book->name = $_POST["name"];
            $book->isbn = $_POST["isbn"];
            $book->save();
            $this->redirect("Books", "index");
        }
        else {
            if(is_null($book)){
                echo '<h1>Error:</h1><h3>No book found by that id</h3>';
            }
            else{
                $this->view('books/form.php', [
                    'book' => $book
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
        $book = Book::find(['id' => $id]);
        if(is_null($book)){
            echo '<h1>Error:</h1><h3>No book found by that id</h3>';
        }
        else{
            $book->delete();
        }
        $this->redirect("Books", "index");
    }
}