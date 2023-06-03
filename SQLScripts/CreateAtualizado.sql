create database KandyNess;
use KandyNess;
-- drop database kandyness


CREATE TABLE TB_Usuario (
    matricula CHAR(8),
    nome VARCHAR(150),
    cpf CHAR(11),
    vendedor TINYINT(1),
    senha CHAR(16),
    PRIMARY KEY (matricula)
) 




-- drop table kandyness.tb_lojaImages

/*CREATE TABLE tb_userImages (
    id INT NOT NULL AUTO_INCREMENT,
    file_name VARCHAR(255) NOT NULL DEFAULT 'Default.jpg',
    uploaded_on DATETIME NOT NULL DEFAULT NOW(),
    status ENUM('1', '0')  NOT NULL DEFAULT '1',
    matricula_imagem CHAR(8),
    PRIMARY KEY (id),
    FOREIGN KEY (matricula_imagem) REFERENCES TB_Usuario (matricula)
) ;

/*create table TB_FAQ(
	cod int NOT NULL AUTO_INCREMENT,
	pergunta varchar(200),
	resposta varchar(200),
	primary key (cod)
);*/



-- drop table kandyness.tb_images

/*create table TB_Categoria(
	cod int NOT NULL AUTO_INCREMENT,
	nome varchar(50),
	primary key (cod, nome)
);


/*create table TB_Blocos(
	cod int NOT NULL AUTO_INCREMENT,
    nome varchar(100),
    primary key (cod)
);*/

/*create table TB_Salas(
	cod int NOT NULL AUTO_INCREMENT,
    numero varchar(10),
    nome varchar(100),
    primary key (cod)
);*/
    

/*create table TB_Locais(
	cod int NOT NULL AUTO_INCREMENT,
	cod_bloco int,
    cod_sala int,
    andar int,
    primary key (cod),
    foreign key (cod_bloco) references TB_Blocos(cod),
    foreign key (cod_sala) references TB_Salas(cod)
);*/
        
/*create table TB_Chat(
	remetente char(8),
    destinatario char(8),
    data_msg DATETIME,
    mensagem char(200),
    primary key (remetente, destinatario, data_msg),
    foreign key (remetente) references TB_Usuario(matricula),
    foreign key (destinatario) references TB_Usuario(matricula)
);*/

create table TB_Lojas(
	id int primary key auto_increment,
	nome varchar(200),
    descricao varchar(500),
    matricula char(8),
    foreign key (matricula) references TB_Usuario(matricula)
);

/*CREATE TABLE tb_lojaImages (
    id INT NOT NULL AUTO_INCREMENT,
    file_name VARCHAR(255) NOT NULL,
    uploaded_on DATETIME NOT NULL DEFAULT NOW(),
    status ENUM('1', '0')  NOT NULL DEFAULT '1',
    imagem_loja int,
    PRIMARY KEY (id),
    foreign key (imagem_loja) references TB_Lojas(id)
) ;*/
-- SELECT MAX(id) FROM tb_produtos;

create table TB_Produtos (
	id int primary key auto_increment,
	id_loja int ,
    nome varchar(100) ,
    valor float,
    categoria varchar(30),
    descricao varchar(60),
    estoque int,
    foreign key (id_loja) references TB_Lojas(id)
    
);
-- drop table kandyness.tb_produtos


/*CREATE TABLE tb_produtosImages (
    id INT NOT NULL AUTO_INCREMENT,
    file_name VARCHAR(255) NOT NULL DEFAULT 'Default.jpg',
    uploaded_on DATETIME NOT NULL DEFAULT NOW(),
    status ENUM('1', '0')  NOT NULL DEFAULT '1',
    id_loja int,
    id_produto int,
    PRIMARY KEY (id),
    foreign key (id_loja) references TB_Produtos(id_loja),
    foreign key (id_produto) references TB_Produtos(id)   
) ; */

-- drop table kandyness.tb_produtosImages;


/*create table TB_LojaFisica(
	dia_da_semana varchar(8),
	lugar int,
    abertura time,
	id_loja int  auto_increment,
    cod_local int,
    fechamento time,
    primary key (dia_da_semana, cod_local, abertura, id_loja),
    foreign key (cod_local) references TB_Locais(cod),
    foreign key (id_loja) references TB_Lojas(id)
);*/

/*create table TB_Venda(
	NF char(9),
    data_compra date,
    valor float,
    id_loja int  auto_increment,
    matricula char(8),
    cod_local int,
    primary key (NF),
    foreign key (cod_local) references TB_Locais(cod),
    foreign key (id_loja) references TB_Lojas(id),
    foreign key (matricula) references TB_Usuario(matricula)
);*/

/*create table TB_ProdutoNaVenda(
    id_loja int auto_increment,
    nome_produto varchar(100),
    notafiscal char(9),
    qtd float NOT NULL,
    primary key (id_loja, nome_produto, notafiscal),
    foreign key (id_loja, nome_produto) references TB_Produtos(id_loja, nome),
    foreign key (notafiscal) references TB_Venda(NF)
);*/

-- drop table kandyness.tb_produtonavenda

/*create table TBR_CategoriaProduto(
	cod_categoria int,
	nome_categoria varchar(50),
	id_loja int auto_increment,
    nome_produto varchar(100),
    primary key (cod_categoria, nome_categoria, id_loja, nome_produto),
    foreign key (id_loja, nome_produto) references TB_Produtos(id_loja, nome),
    foreign key (cod_categoria, nome_categoria) references TB_Categoria(cod, nome)
);*/
-- drop table kandyness.tb
/*create table TB_Denuncia(
	abertura date,
	id_loja int auto_increment,
    matricula char(8),
    motivo varchar(200),
    primary key (abertura, id_loja, matricula),
    foreign key (id_loja) references TB_Lojas(id),
    foreign key (matricula) references TB_Usuario(matricula)
);*/

/*create table TB_Moderacao(
	id int auto_increment,
	nome_moderador char(8),
    matricula char(8),
	primary key (id,nome_moderador, matricula),
    foreign key (nome_moderador) references TB_Usuario(matricula)
);*/

/*create table TB_Avaliacao(
	matricula char(8),
	id_loja int  auto_increment,
    data_av date,
    comentario varchar(300),
    estrelas float,
    primary key (matricula, id_loja, data_av),
    foreign key (matricula) references TB_Usuario(matricula),
    foreign key (id_loja) references TB_Lojas(id)
);*/




   -- drop database kandyness;

-- atributo, op, valor (mono valoradas) (!=);
-- entre conjuntos (multi valorada)		(not in (seletct ..));
    