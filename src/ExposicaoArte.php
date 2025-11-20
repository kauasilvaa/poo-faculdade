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

    public function exibirDetalhes(): string
    {
        return "Exposição de Arte: {$this->nome}\nData: {$this->data}\nLocal: {$this->local}\nArtista/Coletiva: {$this->artistaOuColetiva}\nCuradoria: {$this->curador}\nStatus: {$this->status}\n";
    }
}
