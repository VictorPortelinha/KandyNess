create database KandyNess;
use KandyNess;

create table TB_FAQ(
	cod int NOT NULL AUTO_INCREMENT,
	pergunta varchar(200),
	resposta varchar(200),
	primary key (cod)
);

CREATE TABLE `tb_images` (
 `id` int NOT NULL AUTO_INCREMENT,
 `file_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Default.jpg',
 `uploaded_on` datetime NOT NULL DEFAULT NOW(),
 `status` enum('1','0') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
 PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=UTF8MB4 COLLATE=utf8mb4_unicode_ci;

create table TB_Categoria(
	cod int NOT NULL AUTO_INCREMENT,
	nome varchar(50),
	primary key (cod, nome)
);

create table TB_Usuario(
	matricula char(8),
	nome varchar(150),
	cpf char(11),
    id_imagem int NOT NULL AUTO_INCREMENT,
	primary key(matricula),
	FOREIGN KEY (id_imagem) REFERENCES tb_images(id)
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
    matricula char(8),
    primary key (nome),
    foreign key (matricula) references TB_Usuario(matricula)
);

create table TB_Produtos (
	nome_loja varchar(200),
    nome varchar(100),
    valor float,
    descricao varchar(60),
    primary key (nome_loja, nome),
    foreign key (nome_loja) references TB_Lojas(nome)
);

create table TB_LojaFisica(
	dia_da_semana varchar(8),
	lugar int,
    abertura time,
	nome_loja varchar(200),
    cod_local int,
    fechamento time,
    primary key (dia_da_semana, cod_local, abertura, nome_loja),
    foreign key (cod_local) references TB_Locais(cod),
    foreign key (nome_loja) references TB_Lojas(nome)
);

create table TB_Venda(
	NF char(9),
    data_compra date,
    valor float,
    nome_loja varchar(100),
    matricula char(8),
    cod_local int,
    primary key (NF),
    foreign key (cod_local) references TB_Locais(cod),
    foreign key (nome_loja) references TB_Lojas(nome),
    foreign key (matricula) references TB_Usuario(matricula)
);

create table TB_ProdutoNaVenda(
    nome_loja varchar(100),
    nome_produto varchar(100),
    notafiscal char(9),
    qtd float NOT NULL,
    primary key (nome_loja, nome_produto, notafiscal),
    foreign key (nome_loja, nome_produto) references TB_Produtos(nome_loja, nome),
    foreign key (notafiscal) references TB_Venda(NF)
);

create table TBR_CategoriaProduto(
	cod_categoria int,
	nome_categoria varchar(50),
	nome_loja varchar(200),
    nome_produto varchar(100),
    primary key (cod_categoria, nome_categoria, nome_loja, nome_produto),
    foreign key (nome_loja, nome_produto) references TB_Produtos(nome_loja, nome),
    foreign key (cod_categoria, nome_categoria) references TB_Categoria(cod, nome)
);

create table TB_Denuncia(
	abertura date,
	nome_loja varchar(200),
    matricula char(8),
    motivo varchar(200),
    primary key (abertura, nome_loja, matricula),
    foreign key (nome_loja) references TB_Lojas(nome),
    foreign key (matricula) references TB_Usuario(matricula)
);

create table TB_Moderacao(
	nome_moderador char(8),
	abertura date,
	nome_loja varchar(200),
    matricula char(8),
	primary key (nome_moderador, abertura, nome_loja, matricula),
	foreign key (abertura, nome_loja, matricula) references TB_Denuncia(abertura, nome_loja, matricula),
    foreign key (nome_moderador) references TB_Usuario(matricula)
);

create table TB_Avaliacao(
	matricula char(8),
	nome_loja varchar(200),
    data_av date,
    comentario varchar(300),
    estrelas float,
    primary key (matricula, nome_loja, data_av),
    foreign key (matricula) references TB_Usuario(matricula),
    foreign key (nome_loja) references TB_Lojas(nome)
);




drop database kandyness;

-- atributo, op, valor (mono valoradas) (!=);
-- entre conjuntos (multi valorada)		(not in (seletct ..));
    