
INSERT INTO kandyness.tb_images(file_name)
VALUES ("Brownie.jpg");

SELECT * from kandyness.tb_images;

SELECT * FROM kandyness.tb_produtosImages;

select * from kandyness.tb_produtos where id = 17;
select * from kandyness.tb_produtos;


DELETE FROM kandyness.tb_produtosImages where id_produto = 15 and id_loja = 1;
DELETE FROM kandyness.tb_produtos where id = 15 AND id_loja = 1;


INSERT INTO kandyness.tb_usuario (matricula,nome,cpf)
VALUES ('40002629','Victor Portelinha','09163976960');
insert into TB_Usuario (matricula, nome, cpf) values (
	"40002627", "Fabio Souza", "12562984280"
);
insert into TB_Usuario (matricula, nome, cpf) values (
	"40002628", "Cleber Souza", "12262674987"
);
insert into TB_Usuario (matricula, nome, cpf) values (
	"50003629", "Deborah Ribeiro", "15362684387"
);
insert into TB_Usuario (matricula, nome, cpf) values (
	"50003630", "Joao siqueira", "15362684387"
);
insert into TB_Usuario (matricula, nome, cpf) values (
	"50003631", "Eduardo Silva", "15362684387"
);
insert into TB_Usuario (matricula, nome, cpf) values (
	"50003632", "Gabriel Portelinha", "15362684387"
);




SELECT file_name from kandyness.tb_images where id=2;



SELECT * FROM kandyness.tb_usuario;

DROP TABLE kandyness.tb_usuario;