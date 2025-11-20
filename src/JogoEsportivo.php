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

    public function getEquipeCasa(): string
    {
        return $this->equipeCasa;
    }

    public function getEquipeVisitante(): string
    {
        return $this->equipeVisitante;
    }

    public function exibirDetalhes(): string
    {
        return "Jogo Esportivo: {$this->nome}\nData: {$this->data}\nLocal: {$this->local}\nCasa: {$this->equipeCasa}\nVisitante: {$this->equipeVisitante}\nStatus: {$this->status}\n";
    }
}
