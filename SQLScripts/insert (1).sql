use KandyNess;

insert into TB_FAQ (pergunta, resposta)  values (
	"posso criar uma loja sem ser aluno?", "não"
);
insert into TB_FAQ (pergunta, resposta)  values (
	"posso criar mais de uma loja?", "sim"
);
insert into TB_FAQ (pergunta, resposta)  values (
	"posso revender produtos de outras lojas?", "não"
);


insert into TB_Categoria (nome) values (
	"doce"
);
insert into TB_Categoria (nome) values (
	"azedo"
);
insert into TB_Categoria (nome) values (
	"bolo"
);
insert into TB_Categoria (nome) values (
	"salgado"
);
insert into TB_Categoria (nome) values (
	"morango"
);
insert into TB_Categoria (nome) values (
	"chocolate"
);
insert into TB_Categoria (nome) values (
	"uva"
);
insert into TB_Categoria (nome) values (
	"creme"
);

insert into TB_Usuario (matricula, nome, cpf) values (
	"40002627", "Fabio Souza", "12562984280"
);
insert into TB_Usuario (matricula, nome, cpf) values (
	"40002628", "Cleber Souza", "12262674987"
);
insert into TB_Usuario (matricula, nome, cpf) values (
	"50003629", "Deborah Ribeiro", "15362684387"
);

insert into TB_Blocos (nome) values ( "azul" );
insert into TB_Blocos (nome) values ( "verde" );
insert into TB_Blocos (nome) values ( "vermelho" );
insert into TB_Blocos (nome) values ( "amarelo" );


insert into TB_Salas (nome) values (
	"GRACE HOPPER"
);
insert into TB_Salas (nome) values (
	"TIM BENNERS-LEE"
);
insert into TB_Salas (numero, nome) values (
	"001",
	"JACARANDA"
);
insert into TB_Salas (numero, nome) values (
	"002",
	"JACARANDA"
);


insert into TB_Locais (cod_bloco, cod_sala, andar) values (
	1, 1, 1
);
insert into TB_Locais (cod_bloco, cod_sala, andar) values (
	1, 2, 1
);
insert into TB_Locais (cod_bloco, cod_sala, andar) values (
	1, 3, 0
);
insert into TB_Locais (cod_bloco, cod_sala, andar) values (
	1, 4, 0
);

insert into TB_Chat (remetente, destinatario, data_msg, mensagem) values (
	"40002628", "40002628", '2023-10-02 16:20:01', "Olá"
);
insert into TB_Chat (remetente, destinatario, data_msg, mensagem) values (
	"40002627", "40002628", '2023-10-02 16:20:05', "Olá, Como posso ajudar?"
);
insert into TB_Chat (remetente, destinatario, data_msg, mensagem) values (
	"40002628", "40002628", '2023-10-02 16:22:32', "Você cobrou um valor extra no meu pedido, só percebi agora, como faço pra receber?"
);
insert into TB_Chat (remetente, destinatario, data_msg, mensagem) values (
	"40002627", "40002628", '2023-10-02 16:23:05', "O valor está correto, não é possivel fazer devolução."
);
insert into TB_Chat (remetente, destinatario, data_msg, mensagem) values (
	"40002628", "40002628", '2023-10-02 16:24:02', "Não"
);
insert into TB_Chat (remetente, destinatario, data_msg, mensagem) values (
	"40002628", "40002628", '2023-10-02 16:24:10', "Não está, você foram dois brownies de morango de R$2,00, você coboru R$5"
);
insert into TB_Chat (remetente, destinatario, data_msg, mensagem) values (
	"40002628", "40002628", '2023-10-03 10:20:03', "Ola?"
);
insert into TB_Chat (remetente, destinatario, data_msg, mensagem) values (
	"40002628", "40002628", '2023-10-04 12:40:23', "Estou abrindo uma denuncia!"
);


insert into TB_Lojas (nome, dono, descricao) values (
	"Bricks Brownies",
    "40002627",
    "Os bronies mais crocantes estão aqui"
);

insert into TB_LojaFisica (dia_da_semana, lugar, abertura, loja, fechamento) values (
	"terça",
    1,
	TIME '10:40',
	"Bricks Brownies",
    TIME '10:50'
);
insert into TB_LojaFisica (dia_da_semana, lugar, abertura, loja, fechamento) values (
	"quinta",
    3,
	TIME '10:40',
	"Bricks Brownies",
    TIME '10:50'
);

insert into TB_Produtos (loja, nome, valor) values (
	"Bricks Brownies",
    "Brownie de Morango",
    2.0
);

insert into TB_Produtos (loja, nome, valor) values (
	"Bricks Brownies",
    "Brownie de Chocolate",
    2.0
);

insert into TB_Produtos (loja, nome, valor) values (
	"Bricks Brownies",
    "Brownie de Caramelo Crocante",
    2.5
);

insert into TBR_CategoriaProduto(cod, categoria, loja, produto) values (
	1, "doce",
	"Bricks Brownies", "Brownie de Morango"
);
insert into TBR_CategoriaProduto(cod, categoria, loja, produto) values (
	1, "doce",
	"Bricks Brownies", "Brownie de Chocolate"
);
insert into TBR_CategoriaProduto(cod, categoria, loja, produto) values (
	1, "doce",
	"Bricks Brownies", "Brownie de Caramelo Crocante"
);
insert into TBR_CategoriaProduto(cod, categoria, loja, produto) values (
	5, "morango",
	"Bricks Brownies", "Brownie de Morango"
);
insert into TBR_CategoriaProduto(cod, categoria, loja, produto) values (
	6, "chocolate",
	"Bricks Brownies", "Brownie de Chocolate"
);


insert into TB_Venda (NF, data_compra, valor, loja, cliente, lugar) values (
	"000000000",
    DATE '2023-10-02',
    5.3,
	"Bricks Brownies",
    "40002628",
    1
);

insert into TB_ProdutoNaVenda (loja, nome, venda, qtd) values (
	"Bricks Brownies", "Brownie de Morango",
    "000000000",
    2
);

insert into TB_Denuncia (abertura, loja, criador, motivo) values (
	DATE '20-10-04',
    "Bricks Brownies",
	"40002628",
    "Vendedor cobrou mais caro do que devia"
);

insert into TB_Moderacao ( moderador, abertura, loja, criador) values (
	"50003629",
	DATE '20-10-04', "Bricks Brownies", "40002628"
);

insert into TB_Avaliacao (usuario, loja, data_av, comentario, estrelas) values (
	"40002628",
	"Bricks Brownies",
    DATE '20-10-04',
    "Não consegui o extornar o valor cobrado acima do devido, o vendedor parou de me responder",
    "2.4"
);