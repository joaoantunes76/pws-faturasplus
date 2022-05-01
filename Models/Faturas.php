<?php

use Carbon\Carbon;
class Faturas
{
    protected ?int $id;
    protected ?int $funcionarioId;
    protected ?Carbon $data;
    protected ?float $valorTotal;
    protected ?int $ivaTotal;
    protected ?string $estado;
    protected ?int $clienteId;

    public function __construct(int $id = NULL, int $funcionarioId = NULL, Carbon $data = NULL, float $valorTotal = NULL, int $ivaTotal = NULL, string $estado = NULL, int $clienteId = NULL)
    {
        $this->id = $id;
        $this->funcionarioId = $funcionarioId;
        $this->data = $data;
        $this->valorTotal = $valorTotal;
        $this->ivaTotal = $ivaTotal;
        $this->estado = $estado;
        $this->clienteId = $clienteId;
    }

    public function getFaturas(){
        $sql = "SELECT * FROM faturas";
        return $this->getFaturasBySQL($sql);
    }

    public function getFaturasByCliente(int $clienteId){
        $sql = "SELECT * FROM faturas WHERE clienteId = '$clienteId'";
        return $this->getFaturasBySQL($sql);
    }

    public function getFaturaById(int $id){
        $mysqli = new mysqli("localhost","root","","faturas");
        if(!$mysqli->connect_error){
            $result = $mysqli->query("SELECT * FROM faturas WHERE id = '$id'");
            if($result->num_rows > 0){
                $row = $result->fetch_assoc();
                return new Faturas($row['id'], $row['funcionarioId'], $row['data'], $row['valorTotal'], $row['ivaTotal'], $row['estado'], $row['clienteId']);
            }
            else{
                return "Não foi encontrada nenhuma Fatura.";
            }
        }
    }

    public function saveFatura(){

    }

    private function getFaturasBySQL($sql){
        $mysqli = new mysqli("localhost","root","","faturas");
        if (!$mysqli->connect_error){
            $result = $mysqli->query($sql);
            if ($result->num_rows > 0){
                $faturas = array();
                while($row = $result->fetch_assoc()) {
                    $fatura = new Faturas($row['id'], $row['funcionarioId'], $row['data'], $row['valorTotal'], $row['ivaTotal'], $row['estado'], $row['clienteId']);
                    $faturas[] = $fatura;
                }
                return $faturas;
            }
            else {
                return 'Não foram encontradas Faturas.';
            }
        }
    }
}