<?php
namespace App;

class FeiraCultural extends Evento
{
    private string $tema;
    private int $numeroExpositores;

    public function __construct(string $nome, string $data, string $local, string $tema, int $numeroExpositores)
    {
        parent::__construct($nome, $data, $local);
        $this->tema = $tema;
        $this->numeroExpositores = $numeroExpositores;
    }

    public function exibirDetalhes(): string
    {
        return "Feira Cultural: {$this->nome}\nData: {$this->data}\nLocal: {$this->local}\nTema: {$this->tema}\nExpositores: {$this->numeroExpositores}\n";
    }
}
