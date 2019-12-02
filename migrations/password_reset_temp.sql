CREATE TABLE IF NOT EXISTS `password_reset_temp` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `email` varchar(250)  NOT NULL,
  `token` varchar(250)  NOT NULL,
  `expDate` timestamp NOT NULL,
  PRIMARY KEY (`id`)
)ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;