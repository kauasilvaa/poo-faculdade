O que dá pra cadastrar

Show 🎤

Palestra 🎓

Jogo Esportivo 🏆

Hackathon 💻

Workshop 📚

Feira Cultural 🎪

Exposição de Arte 🖼️

Cada um tem informações próprias (ex.: show tem artista, palestra tem palestrante, hackathon tem tema e participantes…).

Como usar

Abre o terminal na pasta do projeto.

Roda o comando:

composer dump-autoload -o
php index.php


Vai aparecer o menu com as opções. É só digitar o número e preencher os dados.

Se escolher “Listar Eventos”, ele mostra todos que você cadastrou.

Exemplo
--- Sistema de Gerenciamento de Eventos ---
1. Cadastrar Show
2. Cadastrar Palestra
3. Cadastrar Jogo Esportivo
4. Cadastrar Hackathon
...
Escolha uma opção: 1

--- Cadastro de Show ---
Nome do show: Rock in Rio
Data (DD/MM/AAAA): 10/09/2025
Local: Rio de Janeiro
Artista/Banda: Iron Maiden
✅ Show cadastrado!

Observações

Os eventos ficam só na memória enquanto o programa está aberto (não salva em arquivo ou banco).

É um projeto simples, mas serve pra praticar classes, herança, polimorfismo e autoload com Composer.

