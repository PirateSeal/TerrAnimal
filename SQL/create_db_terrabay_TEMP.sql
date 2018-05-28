-- MySQL Script generated by MySQL Workbench
-- Mon May 28 19:09:55 2018
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
-- Table `db_terrabay`.`users`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `db_terrabay`.`users` ;

CREATE TABLE IF NOT EXISTS `db_terrabay`.`users` (
  `id_user` INT NOT NULL AUTO_INCREMENT,
  `pseudo` VARCHAR(45) NOT NULL,
  `email` VARCHAR(45) NOT NULL,
  `firstname` VARCHAR(45) NOT NULL,
  `name` VARCHAR(45) NOT NULL,
  `note` DECIMAL(2,1) NOT NULL DEFAULT 2.5,
  `password` VARCHAR(45) NOT NULL,
  `balance` DECIMAL(65,2) NOT NULL DEFAULT 2500,
  PRIMARY KEY (`id_user`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `db_terrabay`.`species`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `db_terrabay`.`species` ;

CREATE TABLE IF NOT EXISTS `db_terrabay`.`species` (
  `id_specie` INT NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`id_specie`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `db_terrabay`.`orders`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `db_terrabay`.`orders` ;

CREATE TABLE IF NOT EXISTS `db_terrabay`.`orders` (
  `id_order` INT NOT NULL AUTO_INCREMENT,
  `id_buyer` INT NOT NULL,
  `id_seller` INT NOT NULL,
  PRIMARY KEY (`id_order`),
  INDEX `buyer_idx` (`id_buyer` ASC),
  INDEX `seller_idx` (`id_seller` ASC),
  FOREIGN KEY (`id_buyer`)
  REFERENCES `db_terrabay`.`users` (`id_user`),
  FOREIGN KEY (`id_seller`)
  REFERENCES `db_terrabay`.`users` (`id_user`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `db_terrabay`.`articles`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `db_terrabay`.`articles` ;

CREATE TABLE IF NOT EXISTS `db_terrabay`.`articles` (
  `id_article` INT NOT NULL AUTO_INCREMENT,
  `id_specie` INT NULL,
  `id_user` INT NOT NULL,
  `description` VARCHAR(45) NOT NULL,
  `unit_price` DECIMAL(65,2) NOT NULL,
  `stock` INT NOT NULL,
  `gender` ENUM('0', '1', '2') NULL,
  `diet` ENUM('vegie', 'carnivorous', 'omnivorous') NOT NULL,
  `weight` DECIMAL(7,2) NULL,
  `size` DECIMAL(5,2) NOT NULL,
  `color` VARCHAR(45) NOT NULL,
  `age` INT NULL,
  PRIMARY KEY (`id_article`),
  INDEX `specie_idx` (`id_specie` ASC),
  INDEX `user_idx` (`id_user` ASC),
  FOREIGN KEY (`id_specie`)
  REFERENCES `db_terrabay`.`species` (`id_specie`),
  FOREIGN KEY (`id_user`)
  REFERENCES `db_terrabay`.`users` (`id_user`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `db_terrabay`.`orders_lines`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `db_terrabay`.`orders_lines` ;

CREATE TABLE IF NOT EXISTS `db_terrabay`.`orders_lines` (
  `id_order_line` INT NOT NULL AUTO_INCREMENT,
  `id_order` INT NOT NULL,
  `id_article` INT NOT NULL,
  `quantity` INT NOT NULL,
  `total_price` DECIMAL(65,2) NOT NULL,
  PRIMARY KEY (`id_order_line`),
  INDEX `order_idx` (`id_order` ASC),
  INDEX `article_idx` (`id_article` ASC),
  FOREIGN KEY (`id_order`)
  REFERENCES `db_terrabay`.`orders` (`id_order`),
  FOREIGN KEY (`id_article`)
  REFERENCES `db_terrabay`.`articles` (`id_article`))
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
