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

    // Getter para edição
    public function getArtista(): string
    {
        return $this->artista;
    }

    // Setter para permitir editar o artista
    public function setArtista(string $a): void
    {
        $this->artista = $a;
    }

    public function exibirDetalhes(): string
    {
        return "Show: {$this->nome}\n"
             . "Data: {$this->data}\n"
             . "Local: {$this->local}\n"
             . "Artista: {$this->artista}\n"
             . "Status: {$this->status}\n";
    }
}
