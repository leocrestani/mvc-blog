# MVC BLog

Projeto de criação de um blog simples usando a arquitetura MVC, sem frameworks.

Foi utilizado apenas o bootstrap para estilização da página.

Na base de dados foi criado alguns usuários e posts de exemplo. Todos possuem a senha 123456.

## Requisitos
  - Servidor HTTP com php (Utilizei o Apache 2.4 com XAMPP);
  - Banco de dados MySQL (Utilizei o Comunnity 8.0, não testei versões anteriores mas acredito que a partir da 5.7 funcione sem problemas);
  - PHP (Utilizei o 8.2, a partir da versão 7.4 deve executar sem problemas).

## Executando o projeto
 - Para rápida instalação e execução:
   - Instale o [XAMPP](https://www.apachefriends.org/);
   - Clone o repositório dentro da pasta htdocs encontrada no local de instalação do XAMMP;
   - Configure a base de dados utilizando o mvcblog.sql encontrado no root do projeto;
   - Verifique o arquivo app/config.php se o local da URL está correto;
   - Verifique o arquivo app/libraries/Database.php se as configurações da base de dados estão corretas;
   - Execute a URL do projeto base, no meu caso é http://localhost/mvc-blog/
 - Se possuir um servidor web local e um servidor de banco de dados local é possível executar sem a instalação do XAMPP, desde que atenda aos requisitos.
