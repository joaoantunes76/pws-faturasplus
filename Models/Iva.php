<?php

class Iva
{
    protected ?int $id;
    protected ?int $percentagem;
    protected ?string $descricao;
    protected ?bool $vigor;

    public function __construct(int $id = NULL, int $percentagem = NULL, string $descricao = NULL, bool $vigor = NULL)
    {
        $this->id = $id;
        $this->percentagem = $percentagem;
        $this->descricao = $descricao;
        $this->vigor = $vigor;
    }

    public function saveIva(){

    }
}