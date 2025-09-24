<?php

namespace App;

// Esta classe é responsável por armazenar e gerenciar a lista de eventos.
class EventoRepository
{
    // O array para armazenar os objetos.
    private array $eventos = [];

    // Adiciona um novo objeto 'Evento' ao array.
    public function adicionar(Evento $evento): void
    {
        $this->eventos[] = $evento;
        echo "\nEvento cadastrado com sucesso!\n";
    }

    // Retorna todos os eventos cadastrados.
    public function listarTodos(): array
    {
        return $this->eventos;
    }
}