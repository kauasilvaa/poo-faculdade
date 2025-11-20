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

    public function removerPorIndice(int $idx): bool
    {
        if (!isset($this->eventos[$idx])) {
            return false;
        }
        array_splice($this->eventos, $idx, 1);
        return true;
    }

    public function removerPorNome(string $nome): bool
    {
        foreach ($this->eventos as $i => $ev) {
            if (mb_strtolower($ev->getNome()) === mb_strtolower($nome)) {
                array_splice($this->eventos, $i, 1);
                return true;
            }
        }
        return false;
    }

    public function editar(int $idx, Evento $novoEvento): bool
    {
        if (!isset($this->eventos[$idx])) {
            return false;
        }
        $status = $this->eventos[$idx]->getStatus();
        $novoEvento->setStatus($status);
        $this->eventos[$idx] = $novoEvento;
        return true;
    }

    public function buscar(string $term): array
    {
        $term = mb_strtolower($term);
        $result = [];

        foreach ($this->eventos as $ev) {
            $tipo = (new \ReflectionClass($ev))->getShortName();

            if (
                mb_strpos(mb_strtolower($ev->getNome()), $term) !== false ||
                mb_strpos(mb_strtolower($ev->getData()), $term) !== false ||
                mb_strpos(mb_strtolower($ev->getLocal()), $term) !== false ||
                mb_strpos(mb_strtolower($tipo), $term) !== false
            ) {
                $result[] = $ev;
            }
        }

        return $result;
    }

    public function atualizarStatus(int $idx, string $status): bool
    {
        if (!isset($this->eventos[$idx])) {
            return false;
        }
        $this->eventos[$idx]->setStatus($status);
        return true;
    }

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

    // 🔥 NOVA FUNÇÃO — EXPORTAR PARA TXT
    public function exportarRelatorioTxt(): string
    {
        $conteudo = $this->gerarRelatorio();
        $arquivo = "relatorio_eventos.txt";

        file_put_contents($arquivo, $conteudo);

        return "Relatório exportado para '{$arquivo}' com sucesso!\n";
    }
}
