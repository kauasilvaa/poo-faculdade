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

    // Getters obrigatórios para edição
    public function getTema(): string
    {
        return $this->tema;
    }

    public function getParticipantes(): string
    {
        return $this->participantes;
    }

    // Setters usados para edição
    public function setTema(string $t): void
    {
        $this->tema = $t;
    }

    public function setParticipantes(string $p): void
    {
        $this->participantes = $p;
    }

    public function exibirDetalhes(): string
    {
        return "Hackathon: {$this->nome}\n"
             . "Data: {$this->data}\n"
             . "Local: {$this->local}\n"
             . "Tema: {$this->tema}\n"
             . "Participantes: {$this->participantes}\n"
             . "Status: {$this->status}\n";
    }
}
