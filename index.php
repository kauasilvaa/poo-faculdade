<?php

require __DIR__ . '/vendor/autoload.php';

use App\EventoRepository;
use App\Show;
use App\Palestra;
use App\JogoEsportivo;
use App\Workshop;
use App\ExposicaoArte;
use App\FeiraCultural;
use App\Hackathon;

$repo = new EventoRepository();

/*
 * -----------------------
 * Funções de validação
 * -----------------------
 */

// lê texto obrigatório (não aceita vazio)
function lerTexto(string $msg): string {
    while (true) {
        $txt = trim((string) readline($msg));
        if ($txt !== '') return $txt;
        echo "Entrada inválida — este campo não pode ficar vazio.\n";
    }
}

// lê texto opcional: retorna $default se usuário digitar vazio
function lerTextoOpcional(string $msg, string $default): string {
    $txt = trim((string) readline($msg));
    return $txt === '' ? $default : $txt;
}

// lê número inteiro obrigatório (não aceita vazio ou não-numérico)
function lerNumero(string $msg): int {
    while (true) {
        $val = trim(readline($msg));
        if ($val !== '' && is_numeric($val) && (int)$val >= 0) {
            return (int)$val;
        }
        echo "Entrada inválida — digite um número inteiro não-negativo.\n";
    }
}

// número opcional: se vazio, retorna $default
function lerNumeroOpcional(string $msg, int $default): int {
    $val = trim(readline($msg));
    if ($val === '') return $default;
    if (is_numeric($val) && (int)$val >= 0) return (int)$val;
    echo "Valor inválido — mantendo valor atual ({$default}).\n";
    return $default;
}

// lê data no formato DD/MM/AAAA e valida com checkdate
function lerData(string $msg): string {
    while (true) {
        $d = trim((string) readline($msg));
        if (preg_match('/^(\d{2})\/(\d{2})\/(\d{4})$/', $d, $m)) {
            $dia = (int)$m[1];
            $mes = (int)$m[2];
            $ano = (int)$m[3];
            if (checkdate($mes, $dia, $ano)) {
                return $d;
            }
        }
        echo "Data inválida. Use o formato DD/MM/AAAA e uma data válida.\n";
    }
}

// data opcional: retorna $default se vazio, valida se informado
function lerDataOpcional(string $msg, string $default): string {
    $input = trim((string) readline($msg));
    if ($input === '') return $default;
    if (preg_match('/^(\d{2})\/(\d{2})\/(\d{4})$/', $input, $m)) {
        $dia = (int)$m[1];
        $mes = (int)$m[2];
        $ano = (int)$m[3];
        if (checkdate($mes, $dia, $ano)) {
            return $input;
        }
    }
    echo "Formato de data inválido — mantendo valor atual ({$default}).\n";
    return $default;
}

/*
 * -----------------------
 * Menu e fluxo principal
 * -----------------------
 */

function exibirMenu(): void
{
    echo "\n--- Sistema de Gerenciamento de Eventos ---\n";
    echo "1.  Cadastrar Show\n";
    echo "2.  Cadastrar Palestra\n";
    echo "3.  Cadastrar Jogo Esportivo\n";
    echo "4.  Cadastrar Workshop\n";
    echo "5.  Cadastrar Exposição de Arte\n";
    echo "6.  Cadastrar Feira Cultural\n";
    echo "7.  Cadastrar Hackathon\n";
    echo "8.  Listar Eventos\n";
    echo "9.  Remover Evento (por índice)\n";
    echo "10. Remover Evento (por nome)\n";
    echo "11. Editar Evento\n";
    echo "12. Buscar Eventos\n";
    echo "13. Alterar Status de Evento\n";
    echo "14. Gerar Relatório\n";
    echo "15. Exportar Relatório .TXT\n";
    echo "16. Sair\n";
}

while (true) {

    exibirMenu();
    $op = (int) readline("Escolha uma opção: ");

    switch ($op) {

        // --------------------------------------------------
        // 1 - CADASTRAR SHOW
        // --------------------------------------------------
        case 1:
            echo "\n--- Cadastro de Show ---\n";
            $nome = lerTexto("Nome do show: ");
            $data = lerData("Data (DD/MM/AAAA): ");
            $local = lerTexto("Local: ");
            $artista = lerTexto("Artista/Banda: ");

            $show = new Show($nome, $data, $local, $artista);
            $repo->adicionar($show);
            echo "Show cadastrado com sucesso.\n";
            break;

        // --------------------------------------------------
        // 2 – CADASTRAR PALESTRA
        // --------------------------------------------------
        case 2:
            echo "\n--- Cadastro de Palestra ---\n";
            $nome = lerTexto("Título: ");
            $data = lerData("Data (DD/MM/AAAA): ");
            $local = lerTexto("Local: ");
            $palestrante = lerTexto("Palestrante: ");
            $tema = lerTexto("Tema: ");

            $p = new Palestra($nome, $data, $local, $palestrante, $tema);
            $repo->adicionar($p);
            echo "Palestra cadastrada.\n";
            break;

        // --------------------------------------------------
        // 3 – CADASTRAR JOGO ESPORTIVO
        // --------------------------------------------------
        case 3:
            echo "\n--- Cadastro de Jogo Esportivo ---\n";
            $nome = lerTexto("Nome do jogo: ");
            $data = lerData("Data (DD/MM/AAAA): ");
            $local = lerTexto("Local: ");
            $casa = lerTexto("Equipe da casa: ");
            $visitante = lerTexto("Equipe visitante: ");

            $j = new JogoEsportivo($nome, $data, $local, $casa, $visitante);
            $repo->adicionar($j);
            echo "Jogo cadastrado.\n";
            break;

        // --------------------------------------------------
        // 4 – CADASTRAR WORKSHOP
        // --------------------------------------------------
        case 4:
            echo "\n--- Cadastro de Workshop ---\n";
            $nome = lerTexto("Nome: ");
            $data = lerData("Data (DD/MM/AAAA): ");
            $local = lerTexto("Local: ");
            $instrutor = lerTexto("Instrutor: ");
            // carga horária: aceitaremos número ou texto curto (ex: "4h")
            $carga = lerTexto("Carga horária (ex: 4h ou 8): ");

            $w = new Workshop($nome, $data, $local, $instrutor, $carga);
            $repo->adicionar($w);
            echo "Workshop cadastrado.\n";
            break;

        // --------------------------------------------------
        // 5 – CADASTRAR EXPOSIÇÃO
        // --------------------------------------------------
        case 5:
            echo "\n--- Cadastro de Exposição de Arte ---\n";
            $nome = lerTexto("Nome: ");
            $data = lerData("Data (DD/MM/AAAA): ");
            $local = lerTexto("Local: ");
            $artista = lerTexto("Artista/Coletiva: ");
            $curador = lerTexto("Curador: ");

            $e = new ExposicaoArte($nome, $data, $local, $artista, $curador);
            $repo->adicionar($e);
            echo "Exposição cadastrada.\n";
            break;

        // --------------------------------------------------
        // 6 – CADASTRAR FEIRA CULTURAL
        // --------------------------------------------------
        case 6:
            echo "\n--- Cadastro de Feira Cultural ---\n";
            $nome = lerTexto("Nome: ");
            $data = lerData("Data (DD/MM/AAAA): ");
            $local = lerTexto("Local: ");
            $tema = lerTexto("Tema: ");
            $num = lerNumero("Número de expositores: ");

            $f = new FeiraCultural($nome, $data, $local, $tema, $num);
            $repo->adicionar($f);
            echo "Feira cadastrada.\n";
            break;

        // --------------------------------------------------
        // 7 – CADASTRAR HACKATHON
        // --------------------------------------------------
        case 7:
            echo "\n--- Cadastro de Hackathon ---\n";
            $nome = lerTexto("Nome: ");
            $data = lerData("Data (DD/MM/AAAA): ");
            $local = lerTexto("Local: ");
            $tema = lerTexto("Tema: ");
            // participantes aceitos como texto (ex: "30 equipes" ou "120 pessoas")
            $part = lerTexto("Participantes (descreva): ");

            $h = new Hackathon($nome, $data, $local, $tema, $part);
            $repo->adicionar($h);
            echo "Hackathon cadastrado.\n";
            break;

        // --------------------------------------------------
        // 8 – LISTAR
        // --------------------------------------------------
        case 8:
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

        // --------------------------------------------------
        // 9 – REMOVER POR ÍNDICE
        // --------------------------------------------------
        case 9:
            $idx = (int) lerNumero("Índice: ");
            echo $repo->removerPorIndice($idx)
                ? "Removido.\n"
                : "Índice inválido.\n";
            break;

        // --------------------------------------------------
        // 10 – REMOVER POR NOME
        // --------------------------------------------------
        case 10:
            $nome = lerTexto("Nome exato: ");
            echo $repo->removerPorNome($nome)
                ? "Removido.\n"
                : "Não encontrado.\n";
            break;

        // --------------------------------------------------
        // 11 – EDITAR EVENTO
        // --------------------------------------------------
        case 11:
            $lista = $repo->listarTodos();
            if (empty($lista)) {
                echo "Nenhum evento cadastrado.\n";
                break;
            }

            foreach ($lista as $i => $ev) {
                echo "[$i] {$ev->getNome()} | {$ev->getStatus()} | {$ev->getData()}\n";
            }

            $idx = (int) lerNumero("Índice: ");
            if (!isset($lista[$idx])) {
                echo "Índice inválido.\n";
                break;
            }

            $evento = $lista[$idx];

            // solicita valores opcionais — se deixar em branco, mantém o atual
            $novoNome = lerTextoOpcional("Novo nome ({$evento->getNome()}): ", $evento->getNome());
            $novaData = lerDataOpcional("Nova data ({$evento->getData()}): ", $evento->getData());
            $novoLocal = lerTextoOpcional("Novo local ({$evento->getLocal()}): ", $evento->getLocal());

            // cria novo objeto de acordo com o tipo, preservando integridade
            if ($evento instanceof Show) {
                $nArt = lerTextoOpcional("Novo artista ({$evento->getArtista()}): ", $evento->getArtista());
                $novo = new Show($novoNome, $novaData, $novoLocal, $nArt);

            } elseif ($evento instanceof Palestra) {
                $nPal = lerTextoOpcional("Novo palestrante ({$evento->getPalestrante()}): ", $evento->getPalestrante());
                $nTema = lerTextoOpcional("Novo tema ({$evento->getTema()}): ", $evento->getTema());
                $novo = new Palestra($novoNome, $novaData, $novoLocal, $nPal, $nTema);

            } elseif ($evento instanceof JogoEsportivo) {
                $casa = lerTextoOpcional("Nova equipe da casa ({$evento->getEquipeCasa()}): ", $evento->getEquipeCasa());
                $vis = lerTextoOpcional("Nova equipe visitante ({$evento->getEquipeVisitante()}): ", $evento->getEquipeVisitante());
                $novo = new JogoEsportivo($novoNome, $novaData, $novoLocal, $casa, $vis);

            } elseif ($evento instanceof Workshop) {
                $inst = lerTextoOpcional("Novo instrutor ({$evento->getInstrutor()}): ", $evento->getInstrutor());
                $carg = lerTextoOpcional("Nova carga horária ({$evento->getCargaHoraria()}): ", $evento->getCargaHoraria());
                $novo = new Workshop($novoNome, $novaData, $novoLocal, $inst, $carg);

            } elseif ($evento instanceof ExposicaoArte) {
                $a = lerTextoOpcional("Novo artista ({$evento->getArtista()}): ", $evento->getArtista());
                $c = lerTextoOpcional("Novo curador ({$evento->getCurador()}): ", $evento->getCurador());
                $novo = new ExposicaoArte($novoNome, $novaData, $novoLocal, $a, $c);

            } elseif ($evento instanceof FeiraCultural) {
                $t = lerTextoOpcional("Novo tema ({$evento->getTema()}): ", $evento->getTema());
                $n = lerNumeroOpcional("Novo número expositores ({$evento->getExpositores()}): ", $evento->getExpositores());
                $novo = new FeiraCultural($novoNome, $novaData, $novoLocal, $t, (int)$n);

            } elseif ($evento instanceof Hackathon) {
                $t = lerTextoOpcional("Novo tema ({$evento->getTema()}): ", $evento->getTema());
                $p = lerTextoOpcional("Novos participantes ({$evento->getParticipantes()}): ", $evento->getParticipantes());
                $novo = new Hackathon($novoNome, $novaData, $novoLocal, $t, $p);

            } else {
                echo "Tipo de evento não suportado para edição.\n";
                break;
            }

            if ($repo->editar($idx, $novo)) {
                echo "Evento editado.\n";
            } else {
                echo "Falha ao editar.\n";
            }
            break;

        // --------------------------------------------------
        // 12 – BUSCAR
        // --------------------------------------------------
        case 12:
            $term = lerTexto("Buscar (nome, data, local ou tipo): ");
            $res = $repo->buscar($term);

            if (empty($res)) {
                echo "Nada encontrado.\n";
            } else {
                foreach ($res as $ev) {
                    echo $ev->exibirDetalhes() . "\n------------------\n";
                }
            }
            break;

        // --------------------------------------------------
        // 13 – ALTERAR STATUS
        // --------------------------------------------------
        case 13:
            $lista = $repo->listarTodos();
            foreach ($lista as $i => $ev) {
                echo "[$i] {$ev->getNome()} - Status: {$ev->getStatus()}\n";
            }

            $idx = (int) lerNumero("Índice: ");

            echo "1. Ativo\n2. Cancelado\n3. Concluído\n";
            $opS = (int) lerNumero("Opção: ");

            $status = [
                1 => "Ativo",
                2 => "Cancelado",
                3 => "Concluído"
            ];

            if (!isset($status[$opS])) {
                echo "Opção inválida.\n";
                break;
            }

            if ($repo->atualizarStatus($idx, $status[$opS])) {
                echo "Status atualizado para {$status[$opS]}.\n";
            } else {
                echo "Índice inválido.\n";
            }
            break;

        // --------------------------------------------------
        // 14 – GERAR RELATÓRIO
        // --------------------------------------------------
        case 14:
            echo $repo->gerarRelatorio();
            break;

        // --------------------------------------------------
        // 15 – EXPORTAR .TXT
        // --------------------------------------------------
        case 15:
            echo $repo->exportarRelatorioTxt();
            break;

        // --------------------------------------------------
        // 16 – SAIR
        // --------------------------------------------------
        case 16:
            echo "Saindo...\n";
            exit;

        default:
            echo "Opção inválida.\n";
    }
}
