<?php

class LinhasFatura
{
    protected ?int $id;
    protected ?int $quantidade;
    protected ?float $valorUnitario;
    protected ?int $valorIva;
    protected ?int $faturaId;
    protected ?int $produtoId;

    public function __construct(int $id = NULL, int $quantidade = NULL, float $valorUnitario = NULL, int $valorIva = NULL, int $faturaId = NULL, int $produtoId = NULL)
    {
        $this->id = $id;
        $this->quantidade = $quantidade;
        $this->valorUnitario = $valorUnitario;
        $this->valorIva = $valorIva;
        $this->faturaId = $faturaId;
        $this->produtoId = $produtoId;
    }

    public function saveLinhaFatura(){

    }
}