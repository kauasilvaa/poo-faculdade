<?php
namespace App;

class ExposicaoArte extends Evento
{
    private string $artistaOuColetiva;
    private string $curador;

    public function __construct(string $nome, string $data, string $local, string $artistaOuColetiva, string $curador)
    {
        parent::__construct($nome, $data, $local);
        $this->artistaOuColetiva = $artistaOuColetiva;
        $this->curador = $curador;
    }

    // Getters obrigatórios para edição
    public function getArtista(): string
    {
        return $this->artistaOuColetiva;
    }

    public function getCurador(): string
    {
        return $this->curador;
    }

    // Setters (caso queira editar esses campos)
    public function setArtista(string $a): void
    {
        $this->artistaOuColetiva = $a;
    }

    public function setCurador(string $c): void
    {
        $this->curador = $c;
    }

    public function exibirDetalhes(): string
    {
        return "Exposição de Arte: {$this->nome}\n"
             . "Data: {$this->data}\n"
             . "Local: {$this->local}\n"
             . "Artista/Coletiva: {$this->artistaOuColetiva}\n"
             . "Curadoria: {$this->curador}\n"
             . "Status: {$this->status}\n";
    }
}
