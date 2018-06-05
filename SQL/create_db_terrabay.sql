-- MySQL Script generated by MySQL Workbench
-- Tue Jun  5 10:44:21 2018
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
CREATE SCHEMA IF NOT EXISTS `db_terrabay` DEFAULT CHARACTER SET utf8 ;
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
-- Table `db_terrabay`.`orders`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `db_terrabay`.`orders` ;

CREATE TABLE IF NOT EXISTS `db_terrabay`.`orders` (
  `id_order` INT(11) NOT NULL AUTO_INCREMENT,
  `id_buyer` INT(11) NOT NULL,
  `id_seller` INT(11) NOT NULL,
  `date` DATE NOT NULL,
  PRIMARY KEY (`id_order`),
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

CREATE INDEX `buyer_idx` ON `db_terrabay`.`orders` (`id_buyer` ASC);

CREATE INDEX `seller_idx` ON `db_terrabay`.`orders` (`id_seller` ASC);


-- -----------------------------------------------------
-- Table `db_terrabay`.`orders_lines`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `db_terrabay`.`orders_lines` ;

CREATE TABLE IF NOT EXISTS `db_terrabay`.`orders_lines` (
  `id_order_line` INT(11) NOT NULL AUTO_INCREMENT,
  `id_order` INT(11) NOT NULL,
  `id_article` INT(11) NOT NULL,
  `quantity` INT(11) NOT NULL,
  `total_price` DECIMAL(65,2) NOT NULL,
  PRIMARY KEY (`id_order_line`),
  CONSTRAINT `orders_lines_ibfk_1`
    FOREIGN KEY (`id_order`)
    REFERENCES `db_terrabay`.`orders` (`id_order`)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `orders_lines_ibfk_2`
    FOREIGN KEY (`id_article`)
    REFERENCES `db_terrabay`.`articles` (`id_article`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;

CREATE INDEX `order_idx` ON `db_terrabay`.`orders_lines` (`id_order` ASC);

CREATE INDEX `article_idx` ON `db_terrabay`.`orders_lines` (`id_article` ASC);


-- -----------------------------------------------------
-- Table `db_terrabay`.`discounts`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `db_terrabay`.`discounts` ;

CREATE TABLE IF NOT EXISTS `db_terrabay`.`discounts` (
  `id_discount` INT NOT NULL AUTO_INCREMENT,
  `id_article` INT NOT NULL,
  `date_start` DATETIME NOT NULL,
  `date_end` DATETIME NOT NULL,
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
