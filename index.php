<?php
require __DIR__ . '/vendor/autoload.php';

use App\Show;
use App\Palestra;
use App\JogoEsportivo;
use App\Hackathon;
use App\Workshop;
use App\FeiraCultural;
use App\ExposicaoArte;
use App\EventoRepository;

function exibirMenu(): void
{
    echo "\n--- Sistema de Gerenciamento de Eventos ---\n";
    echo "1. Cadastrar Show\n";
    echo "2. Cadastrar Palestra\n";
    echo "3. Cadastrar Jogo Esportivo\n";
    echo "4. Cadastrar Hackathon\n";
    echo "5. Cadastrar Workshop\n";
    echo "6. Cadastrar Feira Cultural\n";
    echo "7. Cadastrar Exposição de Arte\n";
    echo "8. Listar Eventos\n";
    echo "9. Sair\n";
}

$repository = new EventoRepository();

while (true) {
    exibirMenu();
    $opcao = (int) readline("Escolha uma opção: ");

    switch ($opcao) {
        case 1:
            echo "\n--- Cadastro de Show ---\n";
            $nome = readline("Nome do show: ");
            $data = readline("Data (DD/MM/AAAA): ");
            $local = readline("Local: ");
            $artista = readline("Artista/Banda: ");

            $show = new Show($nome, $data, $local, $artista);
            $repository->adicionar($show);
            echo "✅ Show cadastrado!\n";
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
            echo "✅ Palestra cadastrada!\n";
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
            echo "✅ Jogo esportivo cadastrado!\n";
            break;

        case 4:
            echo "\n--- Cadastro de Hackathon ---\n";
            $nome = readline("Nome do evento: ");
            $data = readline("Data (DD/MM/AAAA): ");
            $local = readline("Local: ");
            $tema = readline("Tema/Desafio: ");
            $participantes = readline("Participantes: ");

            $hackathon = new Hackathon($nome, $data, $local, $tema, $participantes);
            $repository->adicionar($hackathon);
            echo "✅ Hackathon cadastrado!\n";
            break;

        case 5:
            echo "\n--- Cadastro de Workshop ---\n";
            $nome = readline("Nome do workshop: ");
            $data = readline("Data (DD/MM/AAAA): ");
            $local = readline("Local: ");
            $instrutor = readline("Instrutor: ");
            $carga = readline("Carga horária: ");

            $workshop = new Workshop($nome, $data, $local, $instrutor, $carga);
            $repository->adicionar($workshop);
            echo "✅ Workshop cadastrado!\n";
            break;

        case 6:
            echo "\n--- Cadastro de Feira Cultural ---\n";
            $nome = readline("Nome da feira: ");
            $data = readline("Data (DD/MM/AAAA): ");
            $local = readline("Local: ");
            $tema = readline("Tema da feira: ");
            $expositores = (int) readline("Número de expositores: ");

            $feira = new FeiraCultural($nome, $data, $local, $tema, $expositores);
            $repository->adicionar($feira);
            echo "✅ Feira Cultural cadastrada!\n";
            break;

        case 7:
            echo "\n--- Cadastro de Exposição de Arte ---\n";
            $nome = readline("Nome da exposição: ");
            $data = readline("Data (DD/MM/AAAA): ");
            $local = readline("Local: ");
            $artistaOuColetiva = readline("Artista ou 'Coletiva': ");
            $curador = readline("Curadoria: ");

            $expo = new ExposicaoArte($nome, $data, $local, $artistaOuColetiva, $curador);
            $repository->adicionar($expo);
            echo "✅ Exposição de Arte cadastrada!\n";
            break;

        case 8:
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

        case 9:
            echo "Saindo...\n";
            exit;

        default:
            echo "Opção inválida. Tente novamente.\n";
            break;
    }
}
