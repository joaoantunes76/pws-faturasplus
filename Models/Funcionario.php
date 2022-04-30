<?php

class Funcionario
{
    protected ?User $user;
    protected ?Empresa $empresa;

    public function __construct(User $user = NULL, Empresa $empresa = NULL)
    {
        $this->user = $user;
        $this->empresa = $empresa;
    }

    public function getFuncionario($userId, $empresaId){
        $mysqli = new mysqli("localhost","root","","faturas");
        if(!$mysqli->connect_error){
            $result = $mysqli->query("SELECT * FROM funcionarios WHERE userId = $userId AND empresaId = $empresaId");
            if($result->num_rows > 0){
                $row = $result->fetch_assoc();
                $user = new User();
                $empresa = new Empresa();
                $user = $user->getUserById($row["userId"]);
                $empresa = $empresa->getEmpresaById($row["empresaId"]);
                return new Funcionario($user, $empresa);
            }
            else{
                return "Nenhum utilizador encontrado como funcionario na empresa";
            }
        }
    }

    public function getUser(){
        return $this->user;
    }

    public function getEmpresa(){
        return $this->empresa;
    }

    public function saveFuncionario(){

    }
}