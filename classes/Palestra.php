<?php

namespace App;

class Palestra extends Evento
{
    private string $palestrante;
    private string $tema;

    public function __construct(string $nome, string $data, string $local, string $palestrante, string $tema)
    {
        parent::__construct($nome, $data, $local);
        $this->palestrante = $palestrante;
        $this->tema = $tema;
    }

    public function exibirDetalhes(): string
    {
        return "Palestra: {$this->nome}\nPalestrante: {$this->palestrante}\nTema: {$this->tema}\nData: {$this->data}\nLocal: {$this->local}";
    }
}