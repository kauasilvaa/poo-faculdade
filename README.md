# Sistema de Gerenciamento de Eventos

## 👥 Integrantes do Grupo

| Integrante                          | RA      |
| ----------------------------------- | ------- |
| Carlos Heinrich Ribeiro de Oliveira | 2025953 |
| Kauã Aparecido da Silva             | 2033230 |
| Kaique Geraldo                      | 2088626 |
| Mateus Oliveira Algusto             | 2037913 |

---

## 🔍 Visão Geral

Este projeto é um **Sistema de Gerenciamento de Eventos** desenvolvido como atividade acadêmica para praticar conceitos de **Programação Orientada a Objetos (POO)** com PHP. O sistema funciona totalmente via **linha de comando** e permite cadastrar e listar vários tipos de eventos.

Ele demonstra, de forma prática, os seguintes conceitos:

* **Classes e Objetos**
* **Herança** (cada tipo de evento possui sua própria classe)
* **Polimorfismo** (eventos diferentes possuem comportamentos próprios)
* **Autoload com Composer** (organização modular)

---

## 🧱 Arquitetura do Código

### **1. Entrada do Sistema**

O arquivo principal é o `index.php`, responsável por:

* Mostrar o menu
* Ler a opção do usuário
* Chamar os cadastros específicos de cada tipo de evento
* Listar todos os eventos

### **2. Hierarquia de Classes**

O sistema possui uma estrutura orientada a objetos, onde:

* `Evento` → **classe base** que contém atributos comuns
* **Subclasses** → especializações com atributos próprios:

  * `Show`
  * `Palestra`
  * `JogoEsportivo`
  * `Hackathon`
  * `Workshop`
  * `FeiraCultural`
  * `ExposicaoArte`

Cada subclasse implementa os **campos extras** específicos para aquele tipo de evento.

### **3. Armazenamento dos Eventos**

Os eventos são guardados em um **array na memória** enquanto o programa está rodando. Não há salvamento em arquivo ou banco de dados.

### **4. Autoload**

O `composer.json` está configurado para fazer autoload das classes automaticamente, permitindo organização limpa e modular.

---

## 🚀 Como Executar o Projeto

### **1. Clonar o repositório**

```bash
git clone https://github.com/kauasilvaa/poo-faculdade.git
cd poo-faculdade
```

### **2. Atualizar autoload**

```bash
composer dump-autoload -o
```

### **3. Rodar o sistema**

```bash
php index.php
```

---

## 📚 Funcionalidades do Sistema

O usuário pode cadastrar e listar os seguintes tipos de eventos:

| Tipo de Evento        | Campos Específicos    |
| --------------------- | --------------------- |
| **Show**              | Artista/Banda         |
| **Palestra**          | Palestrante           |
| **Jogo Esportivo**    | Times/Competidores    |
| **Hackathon**         | Tema e Participantes  |
| **Workshop**          | Instrutor e Materiais |
| **Feira Cultural**    | Expositores           |
| **Exposição de Arte** | Artista(s) e Obras    |

### 📌 Fluxo Básico de Uso

1. O menu aparece na tela.
2. O usuário escolhe um tipo de evento.
3. O sistema pede as informações necessárias.
4. O evento é criado como um objeto da classe correspondente.
5. O evento é adicionado à lista interna.
6. A lista pode ser exibida a qualquer momento pela opção "Listar Eventos".

---

## 📌 Exemplo de Execução

```
--- Sistema de Gerenciamento de Eventos ---
1. Cadastrar Show
2. Cadastrar Palestra
3. Cadastrar Jogo Esportivo
4. Cadastrar Hackathon
5. Cadastrar Workshop
6. Cadastrar Feira Cultural
7. Cadastrar Exposição de Arte
8. Listar Eventos
9. Sair

Escolha uma opção: 1

--- Cadastro de Show ---
Nome do show: Rock in Rio
Data (DD/MM/AAAA): 10/09/2025
Local: Rio de Janeiro
Artista/Banda: Iron Maiden

✔️ Show cadastrado!
```

---

## ⚠️ Limitações do Projeto

* Os eventos **não são salvos** fora do programa.
* Não há validação de dados complexa.
* Funciona apenas via **linha de comando**.

---

## 🎯 Objetivo do Projeto

O objetivo principal é reforçar práticas de POO em PHP:

* Organização modular de classes
* Uso de herança e polimorfismo
* Estrutura com autoload via Composer
* Construção de menus interativos em CLI

---

## 🚀 Possíveis Melhorias Futuras

* Persistência com JSON, CSV ou banco de dados
* Interface gráfica ou web
* Exportação de relatórios

---
