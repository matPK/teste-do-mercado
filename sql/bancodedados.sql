CREATE DATABASE teste-de-mercado;
USE teste-de-mercado;
CREATE TABLE operacoes(
	cod_mer	INT NOT NULL,
	tipo_mer VARCHAR(30),
	nome VARCHAR(30),
	qnt INT(2),
	valor INT(4),
	tipo_neg INT(1)
	PRIMARY KEY (cod_mer)
);