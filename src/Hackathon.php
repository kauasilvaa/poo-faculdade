<?php
namespace App;

class Hackathon extends Evento
{
    private string $tema;
    private string $participantes;

    public function __construct(string $nome, string $data, string $local, string $tema, string $participantes)
    {
        parent::__construct($nome, $data, $local);
        $this->tema = $tema;
        $this->participantes = $participantes;
    }

    public function exibirDetalhes(): string
    {
        return "Hackathon: {$this->nome}\nData: {$this->data}\nLocal: {$this->local}\nTema: {$this->tema}\nParticipantes: {$this->participantes}\nStatus: {$this->status}\n";
    }
}
