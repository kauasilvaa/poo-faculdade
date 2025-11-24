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

    // Getters obrigatórios para edição
    public function getInstrutor(): string
    {
        return $this->instrutor;
    }

    public function getCargaHoraria(): string
    {
        return $this->cargaHoraria;
    }

    // Setters para permitir edição
    public function setInstrutor(string $i): void
    {
        $this->instrutor = $i;
    }

    public function setCargaHoraria(string $c): void
    {
        $this->cargaHoraria = $c;
    }

    public function exibirDetalhes(): string
    {
        return "Workshop: {$this->nome}\n"
             . "Data: {$this->data}\n"
             . "Local: {$this->local}\n"
             . "Instrutor: {$this->instrutor}\n"
             . "Carga horária: {$this->cargaHoraria}\n"
             . "Status: {$this->status}\n";
    }
}
