<h2>README CONCRETUS</h2>

<h4>Setup Local</h4>

<b>Pré-requisitos:</b>
- Apache, MySql, Php / (WAMP)
- Arquivo de importação do banco de dados

Por se tratar de um sistema <b>legado</b> alguns passos são necessários antes de conseguir rodar o código localmente.

1. A pasta onde ficará localizado o projeto deve estar nomeada como "laudos".
2. É necessário importar o banco de dados.
3. Rode o comando "composer install" para instalar as dependências.
4. No arquivo config.php troque o boolean de produção para false e preencha com os dados corretos do banco.

Após todas as etapas prontas basta acessar localhost/laudos.

<h4>Tecnologias</h4>

- Backend/Server side - PHP (Vanilla)
- Frontend/Client side - JS (jQuery + html/css)
- DB - MySQL
