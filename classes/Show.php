<?php

namespace App;

class Show extends Evento
{
    private string $artista;

    public function __construct(string $nome, string $data, string $local, string $artista)
    {
        parent::__construct($nome, $data, $local);
        $this->artista = $artista;
    }

    public function exibirDetalhes(): string
    {
        return "Show: {$this->nome}\nArtista: {$this->artista}\nData: {$this->data}\nLocal: {$this->local}";
    }
}