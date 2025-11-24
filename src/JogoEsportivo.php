<?php
namespace App;

class JogoEsportivo extends Evento
{
    private string $equipeCasa;
    private string $equipeVisitante;

    public function __construct(string $nome, string $data, string $local, string $equipeCasa, string $equipeVisitante)
    {
        parent::__construct($nome, $data, $local);
        $this->equipeCasa = $equipeCasa;
        $this->equipeVisitante = $equipeVisitante;
    }

    // Getters obrigatórios
    public function getEquipeCasa(): string
    {
        return $this->equipeCasa;
    }

    public function getEquipeVisitante(): string
    {
        return $this->equipeVisitante;
    }

    // Setters (para edição)
    public function setEquipeCasa(string $casa): void
    {
        $this->equipeCasa = $casa;
    }

    public function setEquipeVisitante(string $visitante): void
    {
        $this->equipeVisitante = $visitante;
    }

    public function exibirDetalhes(): string
    {
        return "Jogo Esportivo: {$this->nome}\n"
             . "Data: {$this->data}\n"
             . "Local: {$this->local}\n"
             . "Casa: {$this->equipeCasa}\n"
             . "Visitante: {$this->equipeVisitante}\n"
             . "Status: {$this->status}\n";
    }
}
