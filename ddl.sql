-- Data definition language
-- CREATE, ALTER, DROP

create database loja_produtos;

create table categoria (
id int primary key auto_increment,
nome varchar(300),
descricao varchar(255)
);

create table produtos (
id int primary key auto_increment,
nome varchar(25),
descricao text,
id_categoria integer not null,
preco decimal(10,2),
FOREIGN KEY (id_categoria) REFERENCES categoria(id)
);

create table usuarios (
id int primary key auto_increment,
nome varchar(50),
email varchar(100) not null unique,
data_nascimento date,
cpf varchar(14) unique,
telefone varchar (14) unique
);
