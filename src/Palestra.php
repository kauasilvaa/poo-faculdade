<?php
namespace App;

class Palestra extends Evento
{
    private string $palestrante;
    private string $tema;

    public function __construct(string $nome, string $data, string $local, string $palestrante, string $tema)
    {
        parent::__construct($nome, $data, $local);
        $this->palestrante = $palestrante;
        $this->tema = $tema;
    }

    // Getters obrigatórios para edição
    public function getPalestrante(): string
    {
        return $this->palestrante;
    }

    public function getTema(): string
    {
        return $this->tema;
    }

    // Setters para permitir edição
    public function setPalestrante(string $p): void
    {
        $this->palestrante = $p;
    }

    public function setTema(string $t): void
    {
        $this->tema = $t;
    }

    public function exibirDetalhes(): string
    {
        return "Palestra: {$this->nome}\n"
             . "Data: {$this->data}\n"
             . "Local: {$this->local}\n"
             . "Palestrante: {$this->palestrante}\n"
             . "Tema: {$this->tema}\n"
             . "Status: {$this->status}\n";
    }
}
