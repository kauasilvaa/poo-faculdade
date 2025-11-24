<?php
namespace App;

class FeiraCultural extends Evento
{
    private string $tema;
    private int $numeroExpositores;

    public function __construct(string $nome, string $data, string $local, string $tema, int $numeroExpositores)
    {
        parent::__construct($nome, $data, $local);
        $this->tema = $tema;
        $this->numeroExpositores = $numeroExpositores;
    }

    // Getters necessários para edição
    public function getTema(): string
    {
        return $this->tema;
    }

    public function getExpositores(): int
    {
        return $this->numeroExpositores;
    }

    // Setters caso queira permitir edição
    public function setTema(string $t): void
    {
        $this->tema = $t;
    }

    public function setExpositores(int $n): void
    {
        $this->numeroExpositores = $n;
    }

    public function exibirDetalhes(): string
    {
        return "Feira Cultural: {$this->nome}\n"
             . "Data: {$this->data}\n"
             . "Local: {$this->local}\n"
             . "Tema: {$this->tema}\n"
             . "Expositores: {$this->numeroExpositores}\n"
             . "Status: {$this->status}\n";
    }
}
