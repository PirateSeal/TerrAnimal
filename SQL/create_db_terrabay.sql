-- MySQL Script generated by MySQL Workbench
-- Fri Jun 15 12:05:58 2018
-- Model: New Model    Version: 1.0
-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema db_terrabay
-- -----------------------------------------------------
DROP SCHEMA IF EXISTS `db_terrabay` ;

-- -----------------------------------------------------
-- Schema db_terrabay
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `db_terrabay` DEFAULT CHARACTER SET latin1 ;
USE `db_terrabay` ;

-- -----------------------------------------------------
-- Table `db_terrabay`.`species`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `db_terrabay`.`species` ;

CREATE TABLE IF NOT EXISTS `db_terrabay`.`species` (
  `id_specie` INT(11) NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`id_specie`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `db_terrabay`.`users`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `db_terrabay`.`users` ;

CREATE TABLE IF NOT EXISTS `db_terrabay`.`users` (
  `id_user` INT(11) NOT NULL AUTO_INCREMENT,
  `pseudo` VARCHAR(45) NOT NULL,
  `email` VARCHAR(45) NOT NULL,
  `firstname` VARCHAR(45) NOT NULL,
  `name` VARCHAR(45) NOT NULL,
  `note` DECIMAL(2,1) NOT NULL DEFAULT '2.5',
  `password` VARCHAR(45) NOT NULL,
  `balance` DECIMAL(65,2) NOT NULL DEFAULT '2500.00',
  `status` ENUM('user', 'admin') NOT NULL DEFAULT 'user',
  `photo_path` VARCHAR(100) NULL,
  PRIMARY KEY (`id_user`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
KEY_BLOCK_SIZE = 1;


-- -----------------------------------------------------
-- Table `db_terrabay`.`articles`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `db_terrabay`.`articles` ;

CREATE TABLE IF NOT EXISTS `db_terrabay`.`articles` (
  `id_article` INT(11) NOT NULL AUTO_INCREMENT,
  `id_specie` INT(11) NULL DEFAULT NULL,
  `id_user` INT(11) NOT NULL,
  `description` VARCHAR(45) NOT NULL,
  `unit_price` DECIMAL(65,2) NOT NULL,
  `stock` INT(11) NOT NULL,
  `gender` ENUM('0', '1', '2') NULL DEFAULT NULL,
  `diet` ENUM('vegie', 'carnivorous', 'omnivorous') NOT NULL,
  `weight` DECIMAL(7,2) NULL DEFAULT NULL,
  `size` DECIMAL(5,2) NOT NULL,
  `color` VARCHAR(45) NOT NULL,
  `age` INT(11) NULL DEFAULT NULL,
  `status` ENUM('available', 'unavailable') NOT NULL,
  `photo_path` VARCHAR(100) NULL,
  PRIMARY KEY (`id_article`),
  CONSTRAINT `articles_ibfk_1`
    FOREIGN KEY (`id_specie`)
    REFERENCES `db_terrabay`.`species` (`id_specie`)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `articles_ibfk_2`
    FOREIGN KEY (`id_user`)
    REFERENCES `db_terrabay`.`users` (`id_user`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;

CREATE INDEX `specie_idx` ON `db_terrabay`.`articles` (`id_specie` ASC);

CREATE INDEX `user_idx` ON `db_terrabay`.`articles` (`id_user` ASC);


-- -----------------------------------------------------
-- Table `db_terrabay`.`transactions`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `db_terrabay`.`transactions` ;

CREATE TABLE IF NOT EXISTS `db_terrabay`.`transactions` (
  `id_transaction` INT(11) NOT NULL AUTO_INCREMENT,
  `id_buyer` INT(11) NOT NULL,
  `id_seller` INT(11) NOT NULL,
  `date` DATE NOT NULL,
  PRIMARY KEY (`id_transaction`),
  CONSTRAINT `orders_ibfk_1`
    FOREIGN KEY (`id_buyer`)
    REFERENCES `db_terrabay`.`users` (`id_user`)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `orders_ibfk_2`
    FOREIGN KEY (`id_seller`)
    REFERENCES `db_terrabay`.`users` (`id_user`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;

CREATE INDEX `buyer_idx` ON `db_terrabay`.`transactions` (`id_buyer` ASC);

CREATE INDEX `seller_idx` ON `db_terrabay`.`transactions` (`id_seller` ASC);


-- -----------------------------------------------------
-- Table `db_terrabay`.`transactions_lines`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `db_terrabay`.`transactions_lines` ;

CREATE TABLE IF NOT EXISTS `db_terrabay`.`transactions_lines` (
  `id_transaction_line` INT(11) NOT NULL AUTO_INCREMENT,
  `id_transaction` INT(11) NOT NULL,
  `id_article` INT(11) NOT NULL,
  `quantity` INT(11) NOT NULL,
  PRIMARY KEY (`id_transaction_line`),
  CONSTRAINT `orders_lines_ibfk_1`
    FOREIGN KEY (`id_transaction`)
    REFERENCES `db_terrabay`.`transactions` (`id_transaction`)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `orders_lines_ibfk_2`
    FOREIGN KEY (`id_article`)
    REFERENCES `db_terrabay`.`articles` (`id_article`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;

CREATE INDEX `order_idx` ON `db_terrabay`.`transactions_lines` (`id_transaction` ASC);

CREATE INDEX `article_idx` ON `db_terrabay`.`transactions_lines` (`id_article` ASC);


-- -----------------------------------------------------
-- Table `db_terrabay`.`discounts`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `db_terrabay`.`discounts` ;

CREATE TABLE IF NOT EXISTS `db_terrabay`.`discounts` (
  `id_discount` INT NOT NULL AUTO_INCREMENT,
  `id_article` INT NOT NULL,
  `status` ENUM('0', '1') NOT NULL,
  `date_start` DATETIME NOT NULL,
  `date_end` DATETIME NOT NULL,
  `init_price` DECIMAL(65,2) NOT NULL,
  `disc_price` DECIMAL(65,2) NOT NULL,
  PRIMARY KEY (`id_discount`),
  CONSTRAINT `id_article`
    FOREIGN KEY (`id_article`)
    REFERENCES `db_terrabay`.`articles` (`id_article`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;

CREATE INDEX `id_article_idx` ON `db_terrabay`.`discounts` (`id_article` ASC);


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;

-- -----------------------------------------------------
-- Data for table `db_terrabay`.`species`
-- -----------------------------------------------------
START TRANSACTION;
USE `db_terrabay`;
INSERT INTO `db_terrabay`.`species` (`id_specie`, `name`) VALUES (1, 'Felines');
INSERT INTO `db_terrabay`.`species` (`id_specie`, `name`) VALUES (2, 'Canides');
INSERT INTO `db_terrabay`.`species` (`id_specie`, `name`) VALUES (3, 'Ursides');

COMMIT;


-- -----------------------------------------------------
-- Data for table `db_terrabay`.`users`
-- -----------------------------------------------------
START TRANSACTION;
USE `db_terrabay`;
INSERT INTO `db_terrabay`.`users` (`id_user`, `pseudo`, `email`, `firstname`, `name`, `note`, `password`, `balance`, `status`, `photo_path`) VALUES (1, 'Feral', 'oui.non@gmail.com', 'Thomas', 'Cousin', DEFAULT, 'YlhE', 500000, 'admin', NULL);
INSERT INTO `db_terrabay`.`users` (`id_user`, `pseudo`, `email`, `firstname`, `name`, `note`, `password`, `balance`, `status`, `photo_path`) VALUES (2, 'aze', 'aze@aze.fr', 'aze', 'aze', DEFAULT, 'TFdI', DEFAULT, DEFAULT, NULL);

COMMIT;


-- -----------------------------------------------------
-- Data for table `db_terrabay`.`articles`
-- -----------------------------------------------------
START TRANSACTION;
USE `db_terrabay`;
INSERT INTO `db_terrabay`.`articles` (`id_article`, `id_specie`, `id_user`, `description`, `unit_price`, `stock`, `gender`, `diet`, `weight`, `size`, `color`, `age`, `status`, `photo_path`) VALUES (1, 1, 1, 'Chat', 25, 1, '0', 'carnivorous', 2, 0.5, 'Dark brown', 2, 'available', '../model/resources/cat1.jpg');
INSERT INTO `db_terrabay`.`articles` (`id_article`, `id_specie`, `id_user`, `description`, `unit_price`, `stock`, `gender`, `diet`, `weight`, `size`, `color`, `age`, `status`, `photo_path`) VALUES (2, 2, 1, 'Boxer', 50, 2, '1', 'carnivorous', 5, 0.7, 'Light brown', 2, 'available', '../model/resources/dog1.jpg');
INSERT INTO `db_terrabay`.`articles` (`id_article`, `id_specie`, `id_user`, `description`, `unit_price`, `stock`, `gender`, `diet`, `weight`, `size`, `color`, `age`, `status`, `photo_path`) VALUES (3, 3, 2, 'Brown bear', 1500, 1, '1', 'omnivorous', 600, 1.5, 'Brown', 5, 'available', '../model/resources/bear.jpg');
INSERT INTO `db_terrabay`.`articles` (`id_article`, `id_specie`, `id_user`, `description`, `unit_price`, `stock`, `gender`, `diet`, `weight`, `size`, `color`, `age`, `status`, `photo_path`) VALUES (4, 2, 2, 'Fox', 1000, 1, '0', 'carnivorous', 3, 0.5, 'Red', 3, 'available', '..:model/resources/fox1.jpg');

COMMIT;


-- -----------------------------------------------------
-- Data for table `db_terrabay`.`discounts`
-- -----------------------------------------------------
START TRANSACTION;
USE `db_terrabay`;
INSERT INTO `db_terrabay`.`discounts` (`id_discount`, `id_article`, `status`, `date_start`, `date_end`, `init_price`, `disc_price`) VALUES (1, 2, '0', current_time, current_time + interval 1 hour, 150.00, 200.00);

COMMIT;

