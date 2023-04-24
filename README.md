# Processo seletivo - QA

Bem vindo, candidato. 

Estamos felizes que você esteja participando do processo seletivo para a vaga de QA do Senai - Soluções Digitais.

A prova deverá utilizar as seguintes tecnologias: 
- Linguagem de programação orientada a objeto para web
- Banco de dados relacional
- GIT

Fica à sua escolha quais frameworks e servidor serão utilizados, desde que seja uma aplicação web. 

Na etapa da entrevista deverá ser apresentado a aplicação em funcionamento.

## Instruções para a execução da prova

A prova deve ser uma aplicação web. Você pode escolher a tecnologia que achar conveniente (PHP, JAVA, etc...).

O Banco utilizado na prova deve ser PostgrSQL.

Esse repositório possui apenas esse Readme com as instruções da prova. No entanto, **todo desenvolvimento deve ser commitado nesse repositório** até a data citada no email, enviado por nossa equipe.

Commite nesse repositório o script utilizado na criação do banco de dados (se aplicável).

Por fim, altere esse arquivo com as instruções de como poderemos testar o seu código (quais libs usar, qual servidor, etc) abaixo.

## Será avaliado
- Qualidade do código quanto a:
  - Facilidade no entedimento
  - Complexidade ciclomática
  - Divisão de resposabilidade das classes
  - Reutilização de código
- Qualidade quanto a interface:
  - Fácil usabilidade
  - Acessibilidade
  - Feedback ao usuário
- Qualidade quanto aos requisitos:
  - Desenvolvimento e funcionamento dos requisitos propostos.

## Informações extras

- Descreva ao final deste documento (Readme.md) o detalhamento de funcionalidades implementadas, sejam elas já descritas na modelagem e / ou extras.
- Detalhar também as funcionalidades que não conseguiu implementar e o motivo.
- Caso tenha adicionado novas libs ou frameworks, descreva quais foram e porque dessa agregação.

# Informações do projeto.

## Tecnologias utilizadas
- Laravel 9.52.6
- Php 8
- Docker Desktop
- Composer
- Bootstrap
- Jquery

É necessário ter o composer, docker e php instalados para rodar o projeto.

# Como rodar o projeto

Clone o projeto

```bash
git clone https://github.com/SENAI-SD/QA-JR-00723-2023-047.447.615-42.git
```
Entre na pasta do projeto

```bash
cd .\QA-JR-00723-2023-047.447.615-42\
```

Baixe as dependencias do projeto (é necessário rodar os dois devido ao Vite render do laravel)

```bash
npm install
```
```bash
composer install
```

Comando para iniciar o banco de dados

```bash
docker compose up -d
```

Comando para gerar as migrations para o banco de dados

```bash
php artisan migrate
```

Comando para gerar as seeds

```bash
php artisan db:seed
```
O comando acima vai gerar uma seed de usuário com as seguintes caracteristicas, com uma task atrelada a ela. Pode fazer login por essa caso deseje.
'email' => 'user@example.com'
'password' => '123456'

Comando para iniciar o projeto (Cada um deve rodar em um terminal para que o projeto funcione, os dois devem rodar ao mesmo tempo)

```bash
npm run dev
```
```bash
php artisan serve
```

[link para acessar o projeto](http://127.0.0.1:8000)

## Features do aplicativo

- Geral
    - O aplicativo é um monolito, tendo o backend e o frontend operando no mesmo lugar.
    - Todas as telas foram feitas utilizando o bootstrap e o generate ui do artisan, otimizando o tempo e tornando o layout refinado.
    - Todas as telas foram feitas para atenderem requisitos mínimos de acessibilidade e responsividade.
    - O layout exemplo não foi seguido a risca, preferi priorizar as funcionalidades e organizações que eram pedidas no que diz respeito ao fluxo de funcionalidades.
- Telas
    - Telas de Login e Cadastro.
    - Tela home para fazer a organização do fluxo.
    - Tela com todas as tarefas EM ANDAMENTO que existem criadas na base de dados.
    - Tela com os detalhes individuais de cada tarefa.
    - Tela que permite a criação de novas tarefas.
    - Tela que permite a edição da tarefa.
    - Controle do fluxo de telas utilizando o route e session, para reduzir loadings.
- Fluxos e Funcionalidades
    - Botão para ver individualmente as tarefas.
    - Fluxo de Criação de observações e Finalização de tarefas através de modais.
    - Fluxo de Login, Cadastro e Logout.
    - Comunicação em tempo real pelo backend, para evitar loadings.
    - Assumir tarefas e fluxos de bloqueio caso você não tenha o direito de executar tal ação.
    - Sistema de paginação de tarefas A PARTIR de 7 tarefas.

## Aprendizados

- Como otimizar o tempo utilizando o fluxo de geração de blades do php artisan como o comando php artisan ui:auth, que gera o fluxo de autenticação para a aplicação.
- Junção do laravel + Bootstrap permite um ganho de tempo absurdo em relação aos entregáveis.





