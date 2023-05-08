# Project-Crud-Doadores
Crud Project


### 1° - run the following DUMP commands to create the database in the **postgreSql** sgbd

### 1.1 - CREATE TYPE INTERVALO_DOACAO AS ENUM ('unico', 'bimestral', 'semestral', 'anual');
### 1.2 - CREATE TYPE FORMA_PAGAMENTO AS ENUM ('debito', 'credito');

### 1.2 - CREATE TABLE doadores (
	        id SERIAL PRIMARY KEY NOT NULL,
	        nome VARCHAR(255),
	        email VARCHAR(255),
	        cpf CHAR(11),
	        data_nascimento DATE,
	        intervalo_doacao INTERVALO_DOACAO,
	        preco_doacao NUMERIC(19,2),
	        forma_pagamento FORMA_PAGAMENTO,
	        cep VARCHAR(255),
	        endereco VARCHAR(255),
	        numero INTEGER,
	        bairro VARCHAR(255),
	        cidade VARCHAR(255),
	        uf VARCHAR(255)
          );

          SELECT * FROM doadores 

### 2° - Download and execute **composer install**

### 3° - Execute the command **php -S localhost:8080 -t public** (Choose your **port** if you want)

