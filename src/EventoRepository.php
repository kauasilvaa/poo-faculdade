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

    // Novo método para gerar relatório
    public function gerarRelatorio(): string
    {
        if (empty($this->eventos)) {
            return "Nenhum evento cadastrado.\n";
        }

        $relatorio = "--- Relatório de Eventos ---\n";
        foreach ($this->eventos as $i => $evento) {
            $relatorio .= "Evento " . ($i + 1) . ":\n";
            $relatorio .= $evento->exibirDetalhes() . "\n";
            $relatorio .= "-------------------------\n";
        }

        return $relatorio;
    }
}
