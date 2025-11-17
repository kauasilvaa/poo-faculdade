<?php
// index.php

require __DIR__ . '/vendor/autoload.php';

use App\EventoRepository;
use App\Show;
use App\Palestra;
use App\JogoEsportivo;

$repo = new EventoRepository();

function exibirMenu(): void
{
    echo "\n--- Sistema de Gerenciamento de Eventos ---\n";
    echo "1. Cadastrar Show\n";
    echo "2. Cadastrar Palestra\n";
    echo "3. Cadastrar Jogo Esportivo\n";
    echo "4. Listar Eventos\n";
    echo "5. Remover Evento (por índice)\n";
    echo "6. Remover Evento (por nome)\n";
    echo "7. Editar Evento\n";
    echo "8. Buscar Eventos\n";
    echo "9. Alterar Status de Evento\n";
    echo "10. Sair\n";
}

while (true) {
    exibirMenu();
    $op = (int) readline("Escolha uma opção: ");

    switch ($op) {

        case 1:
            echo "\n--- Cadastro de Show ---\n";
            $nome = readline("Nome do show: ");
            $data = readline("Data (DD/MM/AAAA): ");
            $local = readline("Local: ");
            $artista = readline("Artista/Banda: ");

            $show = new Show($nome, $data, $local, $artista);
            $repo->adicionar($show);
            break;

        case 2:
            echo "\n--- Cadastro da Palestra ---\n";
            $nome = readline("Título da palestra: ");
            $data = readline("Data (DD/MM/AAAA): ");
            $local = readline("Local: ");
            $palestrante = readline("Palestrante: ");
            $tema = readline("Tema: ");

            $p = new Palestra($nome, $data, $local, $palestrante, $tema);
            $repo->adicionar($p);
            break;

        case 3:
            echo "\n--- Cadastro do Jogo Esportivo ---\n";
            $nome = readline("Nome do jogo: ");
            $data = readline("Data (DD/MM/AAAA): ");
            $local = readline("Local: ");
            $casa = readline("Equipe da casa: ");
            $visitante = readline("Equipe visitante: ");

            $j = new JogoEsportivo($nome, $data, $local, $casa, $visitante);
            $repo->adicionar($j);
            break;

        case 4:
            echo "\n--- Lista de Eventos ---\n";
            $lista = $repo->listarTodos();

            if (empty($lista)) {
                echo "Nenhum evento cadastrado.\n";
                break;
            }

            foreach ($lista as $i => $ev) {
                echo "[$i]\n" . $ev->exibirDetalhes() . "\n------------------------\n";
            }
            break;

        case 5:
            echo "\n--- Remover por índice ---\n";
            $idx = (int) readline("Índice: ");
            $repo->removerPorIndice($idx);
            break;

        case 6:
            echo "\n--- Remover por nome ---\n";
            $nome = readline("Nome exato do evento: ");
            $repo->removerPorNome($nome);
            break;

        case 7:
            echo "\n--- Editar Evento ---\n";

            $lista = $repo->listarTodos();

            if (empty($lista)) {
                echo "Nenhum evento cadastrado.\n";
                break;
            }

            foreach ($lista as $i => $ev) {
                echo "[$i] {$ev->getNome()} | {$ev->getStatus()} | {$ev->getData()}\n";
            }

            $idx = (int) readline("Índice: ");

            if (!isset($lista[$idx])) {
                echo "Índice inválido.\n";
                break;
            }

            $evento = $lista[$idx];
            $status = $evento->getStatus(); // preserva status original

            // Campos comuns
            $novoNome = readline("Novo nome ({$evento->getNome()}): ") ?: $evento->getNome();
            $novaData = readline("Nova data ({$evento->getData()}): ") ?: $evento->getData();
            $novoLocal = readline("Novo local ({$evento->getLocal()}): ") ?: $evento->getLocal();

            // Polimorfismo na edição
            if ($evento instanceof Show) {

                $novoArtista = readline("Novo artista ({$evento->getArtista()}): ") ?: $evento->getArtista();
                $novoEvento = new Show($novoNome, $novaData, $novoLocal, $novoArtista);
                $novoEvento->setStatus($status);

            } elseif ($evento instanceof Palestra) {

                $novoPalestrante = readline("Novo palestrante ({$evento->getPalestrante()}): ") ?: $evento->getPalestrante();
                $novoTema = readline("Novo tema ({$evento->getTema()}): ") ?: $evento->getTema();

                $novoEvento = new Palestra($novoNome, $novaData, $novoLocal, $novoPalestrante, $novoTema);
                $novoEvento->setStatus($status);

            } elseif ($evento instanceof JogoEsportivo) {

                $novaCasa = readline("Nova equipe da casa ({$evento->getEquipeCasa()}): ") ?: $evento->getEquipeCasa();
                $novaVisitante = readline("Nova equipe visitante ({$evento->getEquipeVisitante()}): ") ?: $evento->getEquipeVisitante();

                $novoEvento = new JogoEsportivo($novoNome, $novaData, $novoLocal, $novaCasa, $novaVisitante);
                $novoEvento->setStatus($status);
            }

            $repo->editar($idx, $novoEvento);
            break;

        case 8:
            echo "\n--- Buscar Eventos ---\n";
            $term = readline("Digite nome, data, local ou tipo: ");

            $resultado = $repo->buscar($term);

            if (empty($resultado)) {
                echo "Nenhum evento encontrado.\n";
            } else {
                foreach ($resultado as $ev) {
                    echo $ev->exibirDetalhes() . "\n------------------\n";
                }
            }
            break;

        case 9:
            echo "\n--- Alterar Status ---\n";

            $lista = $repo->listarTodos();

            foreach ($lista as $i => $ev) {
                echo "[$i] {$ev->getNome()} - Status: {$ev->getStatus()}\n";
            }

            $idx = (int) readline("Índice: ");

            echo "1. Ativo\n2. Cancelado\n3. Concluído\n";
            $s = (int) readline("Opção: ");

            $map = [
                1 => 'Ativo',
                2 => 'Cancelado',
                3 => 'Concluído'
            ];

            if (!isset($map[$s])) {
                echo "Opção inválida.\n";
                break;
            }

            $repo->atualizarStatus($idx, $map[$s]);
            break;

        case 10:
            echo "Saindo...\n";
            exit;

        default:
            echo "Opção inválida.\n";
    }
}
