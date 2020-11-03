# meuCrud
Crud simples completo de uma agenda de nomes, desenvolvido em php puro exclusivo para teste.

## Configuração para o banco de dados

Na pasta _app em config.php informe os seguintes dados:

define('HOST', 'localhost');
define('USER', 'root'); 
define('PASS', ''); 
define('DBSA', 'meuCrud'); 

## Tabela do banco
~~~
 CREATE TABLE agenda (
 id INTEGER NOT NULL AUTO_INCREMENT,
 name VARCHAR(200) NULL,
 email VARCHAR(200) NULL,
 telefone VARCHAR(11) NULL,
 PRIMARY KEY(id)
 );
~~~

## Tecnologias usadas
- PHP
- MySQL
- JQUERY
- CSS
- HTML5
- BOOTSTRAP 4.1
