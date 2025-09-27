<?php
namespace App;

class Workshop extends Evento
{
    private string $instrutor;
    private string $cargaHoraria;

    public function __construct(string $nome, string $data, string $local, string $instrutor, string $cargaHoraria)
    {
        parent::__construct($nome, $data, $local);
        $this->instrutor = $instrutor;
        $this->cargaHoraria = $cargaHoraria;
    }

    public function exibirDetalhes(): string
    {
        return "Workshop: {$this->nome}\nData: {$this->data}\nLocal: {$this->local}\nInstrutor: {$this->instrutor}\nCarga horária: {$this->cargaHoraria}\n";
    }
}
