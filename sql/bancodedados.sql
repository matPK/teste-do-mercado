CREATE DATABASE teste_de_mercado;
USE teste_de_mercado;
CREATE TABLE operacoes(
	cod_mer	 INT NOT NULL,
	tipo_mer VARCHAR(30),
	nome_mer VARCHAR(30),
	qnt INT(2),
	valor INT(4),
	tipo_neg INT(1),
	PRIMARY KEY (cod_mer)
);
