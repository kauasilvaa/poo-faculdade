<?php
namespace App;

abstract class Evento
{
    protected string $nome;
    protected string $data;
    protected string $local;

    public function __construct(string $nome, string $data, string $local)
    {
        $this->nome = $nome;
        $this->data = $data;
        $this->local = $local;
    }

    abstract public function exibirDetalhes(): string;
}
