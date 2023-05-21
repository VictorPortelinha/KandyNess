ALTER TABLE kandyness.tb_usuario
ADD FOREIGN KEY (user_nomeImagem) REFERENCES tb_images(file_name);

ALTER TABLE kandyness.tb_usuario
ADD COLUMN user_nomeImagem varchar(255) COLLATE utf8mb4_unicode_ci UNIQUE NOT NULL;

SELECT *  FROM kandyness.tb_usuario;