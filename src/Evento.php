<?php
namespace App;

abstract class Evento
{
    protected string $nome;
    protected string $data;
    protected string $local;
    protected string $status = 'Ativo'; // padrão

    public function __construct(string $nome, string $data, string $local)
    {
        $this->nome = $nome;
        $this->data = $data;
        $this->local = $local;
    }

    // getters e setters comuns
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

    public function getStatus(): string
    {
        return $this->status;
    }

    public function setStatus(string $status): void
    {
        $this->status = $status;
    }

    // exibir detalhes específico para cada tipo
    abstract public function exibirDetalhes(): string;
}
