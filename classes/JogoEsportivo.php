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

    public function exibirDetalhes(): string
    {
        return "Jogo Esportivo: {$this->nome}\nEquipes: {$this->equipeCasa} vs {$this->equipeVisitante}\nData: {$this->data}\nLocal: {$this->local}";
    }
}