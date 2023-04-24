# Informações do projeto.

## Tecnologias utilizadas
- Laravel 9.52.6
- Php 8
- Docker Desktop
- Composer
- Bootstrap
- Jquery
- EXTRA: Cypress

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

## Cypress

- Na pasta do cypress é necessário rodar os comandos para instalar, foram feitos testes automatizados SIMPLES devido ao prazo. Obviamente com certo tempo seria possível entregar todo o site testado e com valores dinâmicos.
- O teste para registrar só irá funcionar uma vez, a partir da primeira vez irá apresentar erro já que o e-mail já existirá na base de dados. É necessário adicionar '.skip' depois do it na linha 7 do desafio_fiesc.cy.js.
- É necessário ter a aplicação e o banco rodando para que o cypress funcione.

Entre na pasta do cypress e execute 

```bash
npx cypress open
```
caso não rode, use o node para instalar depedências possíveis.

```bash
npm i
```

Caso o npx cypress open rode normalmente, selecione e2e testing e o navegador. Depois disso é só executar o arquivo e os testes irão acontecer. A ideia de fazer o cypress é só para demonstrar conhecimento em testes automatizados, um fator bem importante para analistas de qualidade.

## Aprendizados

- Como otimizar o tempo utilizando o fluxo de geração de blades do php artisan como o comando php artisan ui:auth, que gera o fluxo de autenticação para a aplicação.
- Junção do laravel + Bootstrap permite um ganho de tempo absurdo em relação aos entregáveis.





