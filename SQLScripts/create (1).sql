create database KandyNess;
use KandyNess;

create table TB_FAQ(
	cod int NOT NULL AUTO_INCREMENT,
	pergunta varchar(200),
	resposta varchar(200),
	primary key (cod)
);

create table TB_Categoria(
	cod int NOT NULL AUTO_INCREMENT,
	nome varchar(50),
	primary key (cod, nome)
);

create table TB_Usuario(
	matricula char(8),
	nome varchar(150),
	cpf char(11),
	primary key(matricula)
);

create table TB_Blocos(
	cod int NOT NULL AUTO_INCREMENT,
    nome varchar(100),
    primary key (cod)
);

create table TB_Salas(
	cod int NOT NULL AUTO_INCREMENT,
    numero varchar(10),
    nome varchar(100),
    primary key (cod)
);
    

create table TB_Locais(
	cod int NOT NULL AUTO_INCREMENT,
	cod_bloco int,
    cod_sala int,
    andar int,
    primary key (cod),
    foreign key (cod_bloco) references TB_Blocos(cod),
    foreign key (cod_sala) references TB_Salas(cod)
);
        
create table TB_Chat(
	remetente char(8),
    destinatario char(8),
    data_msg DATETIME,
    mensagem char(200),
    primary key (remetente, destinatario, data_msg),
    foreign key (remetente) references TB_Usuario(matricula),
    foreign key (destinatario) references TB_Usuario(matricula)
);

create table TB_Lojas(
	nome varchar(200),
    descricao varchar(500),
    dono char(8),
    primary key (nome),
    foreign key (dono) references TB_Usuario(matricula)
);

create table TB_Produtos (
	loja varchar(200),
    nome varchar(100),
    valor float,
    primary key (loja, nome),
    foreign key (loja) references TB_Lojas(nome)
);

create table TB_LojaFisica(
	dia_da_semana varchar(8),
	lugar int,
    abertura time,
	loja varchar(200),
    fechamento time,
    primary key (dia_da_semana, lugar, abertura, loja),
    foreign key (lugar) references TB_Locais(cod),
    foreign key (loja) references TB_Lojas(nome)
);

create table TB_Venda(
	NF char(9),
    data_compra date,
    valor float,
    loja varchar(100),
    cliente char(8),
    lugar int,
    primary key (NF),
    foreign key (lugar) references TB_Locais(cod),
    foreign key (loja) references TB_Lojas(nome),
    foreign key (cliente) references TB_Usuario(matricula)
);

create table TB_ProdutoNaVenda(
    loja varchar(100),
    nome varchar(100),
    venda char(9),
    qtd float NOT NULL,
    primary key (loja, nome, venda),
    foreign key (loja, nome) references TB_Produtos(loja, nome),
    foreign key (venda) references TB_Venda(NF)
);

create table TBR_CategoriaProduto(
	cod int,
	categoria varchar(50),
	loja varchar(200),
    produto varchar(100),
    primary key (cod, categoria, loja, produto),
    foreign key (loja, produto) references TB_Produtos(loja, nome),
    foreign key (cod, categoria) references TB_Categoria(cod, nome)
);

create table TB_Denuncia(
	abertura date,
	loja varchar(200),
    criador char(8),
    motivo varchar(200),
    primary key (abertura, loja, criador),
    foreign key (loja) references TB_Lojas(nome),
    foreign key (criador) references TB_Usuario(matricula)
);

create table TB_Moderacao(
	moderador char(8),
	abertura date,
	loja varchar(200),
    criador char(8),
	primary key (moderador, abertura, loja, criador),
	foreign key (abertura, loja, criador) references TB_Denuncia(abertura, loja, criador),
    foreign key (moderador) references TB_Usuario(matricula)
);

create table TB_Avaliacao(
	usuario char(8),
	loja varchar(200),
    data_av date,
    comentario varchar(300),
    estrelas float,
    primary key (usuario, loja, data_av),
    foreign key (usuario) references TB_Usuario(matricula),
    foreign key (loja) references TB_Lojas(nome)
);


-- drop database kandyness;

-- atributo, op, valor (mono valoradas) (!=);
-- entre conjuntos (multi valorada)		(not in (seletct ..));
    