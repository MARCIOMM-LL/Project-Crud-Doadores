# Project-Crud-Doadores
Crud Project


### 1° - run the following DUMP commands to create the database in the **postgreSql** sgbd

### 1.1 - CREATE TYPE INTERVALO_DOACAO AS ENUM ('unico', 'bimestral', 'semestral', 'anual');
### 1.2 - CREATE TYPE FORMA_PAGAMENTO AS ENUM ('debito', 'credito');

### 1.2 - CREATE TABLE doadores 

    CREATE DATABASE db_doadores;

    CREATE TYPE INTERVALO_DOACAO AS ENUM
    (
	'unico',
	'bimestral',
	'semestral',
	'anual'
    );

    CREATE TYPE FORMA_PAGAMENTO AS ENUM
    (
	'debito',
	'credito'
    );
	
    CREATE TABLE tb_doadores
    (
	doador_id SERIAL PRIMARY KEY,
	nome VARCHAR(255),
	email VARCHAR(255),
	cpf CHAR(11),
	telefone VARCHAR(55),
	data_nascimento DATE,
	data_cadastro DATE,
	intervalo_doacao INTERVALO_DOACAO,
	forma_pagamento FORMA_PAGAMENTO,
	preco_doacao NUMERIC(19,2),
	cep VARCHAR(55),
	endereco VARCHAR(255),
	numero INTEGER,
	bairro VARCHAR(55),
	cidade VARCHAR(55),
	uf VARCHAR(55)
     );
	
SELECT * FROM tb_doadores;	

### 2° - Download and execute **composer install**

### 3° - Execute the command **php -S localhost:8080 -t public** (Choose your **port** if you want)

