<?php

namespace App;

// A classe abstrata 'Evento' define a estrutura básica para qualquer tipo de evento.
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

    // O método 'exibirDetalhes' é abstrato.
    // Todas as classes que herdarem de 'Evento' devem implementá-lo.
    abstract public function exibirDetalhes(): string;

    public function getNome(): string
    {
        return $this->nome;
    }

    public function getData(): string
    {
        return $this->data;
    }

    public function getLocal(): string
    {
        return $this->local;
    }
}