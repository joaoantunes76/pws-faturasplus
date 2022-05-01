<?php

class Produtos
{
    protected ?int $id;
    protected ?string $referencia;
    protected ?string $descricao;
    protected ?float $preco;
    protected ?int $stock;
    protected ?int $ivaId;

    public function __construct(int $id = NULL, string $referencia = NULL, string $descricao = NULL, float $preco = NULL, int $stock = NULL, int $ivaId = NULL)
    {
        $this->id = $id;
        $this->referencia = $referencia;
        $this->descricao = $descricao;
        $this->preco = $preco;
        $this->stock = $stock;
        $this->ivaId = $ivaId;
    }

    public function saveProduto(){

    }
}