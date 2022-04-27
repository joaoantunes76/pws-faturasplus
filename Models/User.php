<?php

class User{
    protected $id;
    protected $username;
    protected $password;
    protected $email;
    protected $role;
    protected $telefone;
    protected $nif;
    protected $morada;
    protected $codigoPostal;
    protected $localidade;

    public function __construct($id = NULL, $username = NULL,  $password = NULL, $email = NULL, $role = NULL, $telefone = NULL, $nif = NULL, $morada = NULL, $codigoPostal = NULL, $localidade = NULL)
    {
        $this->id = $id;
        $this->username = $username;
        $this->password = $password;
        $this->email = $email;
        $this->role = $role;
        $this->telefone = $telefone;
        $this->nif = $nif;
        $this->morada = $morada;
        $this->codigoPostal = $codigoPostal;
        $this->localidade = $localidade;
    }

    public function getUsers(){
        $mysqli = new mysqli("localhost","root","","faturas");
        if(!$mysqli->connect_error){
            $sql = "SELECT * FROM users";
            $result = $mysqli->query($sql);

            if($result->num_rows > 0){
                $users = array();
                while($row = $result->fetch_assoc()) {
                    $user = new User($row["id"], $row["username"], $row["password"], $row["email"], $row["roleId"], $row["telefone"], $row["nif"], $row["morada"], $row["codigoPostal"], $row["localidade"]);
                    array_push($users, $user);
                }
                return $users;
            }
            else{
                return "No users found";
            }
        }
    }

    public function getUserById($id){
        $mysqli = new mysqli("localhost","root","","faturas");
        if(!$mysqli->connect_error){
            $sql = "SELECT * FROM users WHERE id = '$id'";
            $result = $mysqli->query($sql);

            if($result->num_rows > 0){
                $row = $result->fetch_assoc(); 
                $user = new User($row["id"], $row["username"], $row["password"], $row["email"], $row["roleId"], $row["telefone"], $row["nif"], $row["morada"], $row["codigoPostal"], $row["localidade"]);
                return $user;
            }
            else{
                return "No user found by that id";
            }
        }
    }

    public function getUserByUsername($username){
        $mysqli = new mysqli("localhost","root","","faturas");
        if(!$mysqli->connect_error){
            $sql = "SELECT * FROM users WHERE username LIKE '$username'";
            $result = $mysqli->query($sql);

            if($result->num_rows > 0){
                $row = $result->fetch_assoc(); 
                $user = new User($row["id"], $row["username"], $row["password"], $row["email"], $row["roleId"], $row["telefone"], $row["nif"], $row["morada"], $row["codigoPostal"], $row["localidade"]);
                return $user;
            }
            else{
                return "No user found by that username";
            }
        }
    }

    public function getUserByEmail($email){
        $mysqli = new mysqli("localhost","root","","faturas");
        if(!$mysqli->connect_error){
            $sql = "SELECT * FROM users WHERE email LIKE '$email'";
            $result = $mysqli->query($sql);

            if($result->num_rows > 0){
                $row = $result->fetch_assoc(); 
                $user = new User($row["id"], $row["username"], $row["password"], $row["email"], $row["roleId"], $row["telefone"], $row["nif"], $row["morada"], $row["codigoPostal"], $row["localidade"]);
                return $user;
            }
            else{
                return "No user found by that email";
            }
        }
    }

    public function saveUser(){

    }
}