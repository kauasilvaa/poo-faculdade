<?php
namespace App;

class EventoRepository
{
    private array $eventos = [];

    public function adicionar(Evento $evento): void
    {
        $this->eventos[] = $evento;
    }

    public function listarTodos(): array
    {
        return $this->eventos;
    }
}
