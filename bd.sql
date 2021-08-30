CREATE TABLE IF NOT EXISTS `posts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` text NOT NULL,
  `description` text NOT NULL,
  `text` text NOT NULL,
  `createdate` DATE NOT NULL DEFAULT (curdate()),
  PRIMARY KEY (`id`));
  

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `login` varchar(45) NOT NULL,
  `password` varchar(45) NOT NULL,
  `email` varchar(45) NOT NULL,
  `perm` int(11) NOT NULL DEFAULT 0,
  `vmoney` decimal(12,2) DEFAULT 0.00,
  `money` decimal(12,2) DEFAULT 0.00,
  `regdate` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`));

CREATE TABLE IF NOT EXISTS `servers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(45) NULL,
  `version` VARCHAR(45) NULL,
  `pvp` TINYINT NULL,
  `vipedate` DATE NULL,
  `size` VARCHAR(45) NULL,
  `mods` TEXT NULL,
  `description` TEXT NULL,
  `host` VARCHAR(45) NULL,
  `port` VARCHAR(45) NULL,
  `rcon_port` VARCHAR(45) NULL,
  `rcon_password` VARCHAR(45) NULL,
  `visibility` TINYINT NULL,
  PRIMARY KEY (`id`));  

CREATE TABLE IF NOT EXISTS `constants` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` text NOT NULL,
  `description` text NOT NULL,
  `text` text NOT NULL,
  `createdate` DATE NOT NULL DEFAULT (curdate()),
  PRIMARY KEY (`id`));