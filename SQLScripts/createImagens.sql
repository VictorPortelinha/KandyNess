CREATE TABLE `tb_images` (
 `id` int NOT NULL AUTO_INCREMENT,
 `file_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Default.jpg',
 `uploaded_on` datetime NOT NULL DEFAULT NOW(),
 `status` enum('1','0') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
 PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=UTF8MB4 COLLATE=utf8mb4_unicode_ci;

DROP TABLE IMAGES;

SELECT * FROM kandyness.tb_images;