<?php

class User{
    protected ?int $id;
    protected ?string $username;
    public ?string $password;
    protected ?string $email;
    protected ?int $roleId;
    protected ?string $telefone;
    protected ?string $nif;
    protected ?string $morada;
    protected ?string $codigoPostal;
    protected ?string $localidade;
    public ?Role $role = null;

    public function __construct(int $id = NULL, string $username = NULL,  string $password = NULL, string $email = NULL, int $roleId = NULL, string $telefone = NULL, string $nif = NULL, string $morada = NULL, string $codigoPostal = NULL, string $localidade = NULL, Role $role = NULL)
    {
        $this->id = $id;
        $this->username = $username;
        $this->password = $password;
        $this->email = $email;
        $this->roleId = $roleId;
        $this->telefone = $telefone;
        $this->nif = $nif;
        $this->morada = $morada;
        $this->codigoPostal = $codigoPostal;
        $this->localidade = $localidade;
        $this->role = $role;
    }

    public function getUsers(){
        $sql = "SELECT * FROM users";
        return $this->getUsersBySQL($sql);
    }

    public function getUserById($id){
        $sql = "SELECT * FROM users WHERE id = '$id'";
        return $this->getUserBySQL($sql);
    }

    public function getUserByUsername($username){
        $sql = "SELECT * FROM users WHERE username LIKE '$username'";
        return $this->getUserBySQL($sql);
    }

    public function getUserByEmail($email){
        $sql = "SELECT * FROM users WHERE email LIKE '$email'";
        return $this->getUserBySQL($sql);
    }

    public function saveUser(){

    }

    private function getUserBySQL($sql){
        $mysqli = new mysqli("localhost","root","","faturas");
        if(!$mysqli->connect_error){
            $result = $mysqli->query($sql);
            if($result->num_rows > 0){
                $row = $result->fetch_assoc();
                $role = new Role();
                return new User($row["id"], $row["username"], $row["password"], $row["email"], $row["roleId"], $row["telefone"], $row["nif"], $row["morada"], $row["codigoPostal"], $row["localidade"], $role->getRoleById($row["roleId"]));
            }
            else{
                return "No user found by that email";
            }
        }
    }

    private function getUsersBySQL($sql){
        $mysqli = new mysqli("localhost","root","","faturas");
        if(!$mysqli->connect_error){
            $result = $mysqli->query($sql);
            if($result->num_rows > 0){
                $users = array();
                while($row = $result->fetch_assoc()) {
                    $role = new Role();
                    $user = new User($row["id"], $row["username"], $row["password"], $row["email"], $row["roleId"], $row["telefone"], $row["nif"], $row["morada"], $row["codigoPostal"], $row["localidade"], $role->getRoleById($row["roleId"]));
                    $users[] = $user;
                }
                return $users;
            }
            else{
                return "No users found";
            }
        }
    }
}