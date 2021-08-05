CREATE TABLE `test`.`servers` (
  `id` INT NOT NULL AUTO_INCREMENT,
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
  PRIMARY KEY (`id`));

  