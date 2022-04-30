<?php

class Empresa
{
    protected ?int $id;
    protected ?string $designacaoSocial;
    protected ?string $email;
    protected ?string $telefone;
    protected ?string $nif;
    protected ?string $morada;
    protected ?string $codigoPostal;
    protected ?string $localidade;
    protected ?float $capitalSocial;

    public function __construct(int $id = NULL, string $designacaoSocial = NULL,  string $email = NULL, int $roleId = NULL, string $telefone = NULL, string $nif = NULL, string $morada = NULL, string $codigoPostal = NULL, string $localidade = NULL, float $capitalSocial = NULL)
    {
        $this->id = $id;
        $this->designacaoSocial = $designacaoSocial;
        $this->email = $email;
        $this->roleId = $roleId;
        $this->telefone = $telefone;
        $this->nif = $nif;
        $this->morada = $morada;
        $this->codigoPostal = $codigoPostal;
        $this->localidade = $localidade;
        $this->capitalSocial = $capitalSocial;
    }

    public function getEmpresas(){
        $mysqli = new mysqli("localhost","root","","faturas");
        if(!$mysqli->connect_error){
            $sql = "SELECT * FROM empresas";
            $result = $mysqli->query($sql);
            if($result->num_rows > 0){
                $empresas = array();
                while($row = $result->fetch_row()) {
                    $empresa = new Empresa($row["id"], $row["designacaoSocial"], $row["email"],$row["telefone"], $row["nif"], $row["morada"], $row["codigoPostal"], $row["localidade"], $row["capitalSocial"]);
                    $empresas[] = $empresa;
                }
                return $empresas;
            }
            else{
                return "Nenhuma empresa encontrada";
            }
        }
    }

    public function getEmpresaById($id){
        $sql = "SELECT * FROM empresas WHERE id = $id";
        return $this->genericGetEmpresa($sql);
    }

    public function getEmpresaByDesignacaoSocial($designacaoSocial){
        $sql = "SELECT * FROM empresas WHERE designacaoSocial = $designacaoSocial";
        return $this->genericGetEmpresa($sql);
    }

    public function getEmpresaByEmail($email){
        $sql = "SELECT * FROM empresas WHERE email = $email";
        return $this->genericGetEmpresa($sql);
    }

    private function genericGetEmpresa($sql){
        $mysqli = new mysqli("localhost","root","","faturas");
        if(!$mysqli->connect_error){
            $result = $mysqli->query($sql);
            if($result->num_rows > 0){
                $row = $result->fetch_assoc();
                return new Empresa($row["id"], $row["designacaoSocial"], $row["email"],$row["telefone"], $row["nif"], $row["morada"], $row["codigoPostal"], $row["localidade"], $row["capitalSocial"]);
            }
            else{
                return "Nenhuma empresa encontrada";
            }
        }
    }

    public function saveEmpresa(){

    }
}