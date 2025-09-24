<?php

// Inclui o autoloader do Composer.
require __DIR__ . '/vendor/autoload.php';

use App\Show;
use App\Palestra;
use App\JogoEsportivo;
use App\EventoRepository;

// Instancia o repositório para gerenciar os eventos.
$repository = new EventoRepository();

function exibirMenu(): void
{
    echo "\n--- Sistema de Gerenciamento de Eventos ---\n";
    echo "1. Cadastrar Show\n";
    echo "2. Cadastrar Palestra\n";
    echo "3. Cadastrar Jogo Esportivo\n";
    echo "4. Listar Eventos\n";
    echo "5. Sair\n";
}

// Loop principal da aplicação.
while (true) {
    exibirMenu();
    $opcao = (int) readline("Escolha uma opção: "); // type casting

    switch ($opcao) {
        case 1:
            echo "\n--- Cadastro de Show ---\n";
            $nome = readline("Nome do show: ");
            $data = readline("Data (DD/MM/AAAA): ");
            $local = readline("Local: ");
            $artista = readline("Artista/Banda: ");

            $show = new Show($nome, $data, $local, $artista);
            $repository->adicionar($show);
            break;

        case 2:
            echo "\n--- Cadastro de Palestra ---\n";
            $nome = readline("Título da palestra: ");
            $data = readline("Data (DD/MM/AAAA): ");
            $local = readline("Local: ");
            $palestrante = readline("Palestrante: ");
            $tema = readline("Tema: ");
            
            $palestra = new Palestra($nome, $data, $local, $palestrante, $tema);
            $repository->adicionar($palestra);
            break;

        case 3:
            echo "\n--- Cadastro de Jogo Esportivo ---\n";
            $nome = readline("Nome do jogo: ");
            $data = readline("Data (DD/MM/AAAA): ");
            $local = readline("Local: ");
            $equipeCasa = readline("Equipe da casa: ");
            $equipeVisitante = readline("Equipe visitante: ");
            
            $jogo = new JogoEsportivo($nome, $data, $local, $equipeCasa, $equipeVisitante);
            $repository->adicionar($jogo);
            break;

        case 4:
            echo "\n--- Lista de Eventos Cadastrados ---\n";
            $eventos = $repository->listarTodos();
            if (empty($eventos)) {
                echo "Nenhum evento cadastrado.\n";
            } else {
                foreach ($eventos as $evento) {
                    echo "---------------------------------\n";
                    echo $evento->exibirDetalhes() . "\n";
                }
                echo "---------------------------------\n";
            }
            break;

        case 5:
            echo "Saindo...\n";
            exit;

        default:
            echo "Opção inválida. Tente novamente.\n";
            break;
    }
}