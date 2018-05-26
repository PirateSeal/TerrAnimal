-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  mar. 22 mai 2018 à 11:29
-- Version du serveur :  5.7.19
-- Version de PHP :  5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `bdd_terrabay`
--

-- --------------------------------------------------------

--
-- Structure de la table `articles`
--

DROP TABLE IF EXISTS `articles`;
CREATE TABLE IF NOT EXISTS `articles` (
  `id_article` int(11) NOT NULL AUTO_INCREMENT,
  `id_specie` int(11) DEFAULT NULL,
  `id_user` int(11) NOT NULL,
  `description` varchar(45) NOT NULL,
  `unit_price` decimal(65,2) NOT NULL,
  `stock` int(11) NOT NULL,
  `gender` enum('0','1','2') DEFAULT NULL,
  `diet` enum('vegie','meat','omni'),
  `weight` decimal(7,2) DEFAULT NULL,
  `size` decimal(5,2) NOT NULL,
  `color` varchar(45) NOT NULL,
  `age` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_article`),
  KEY `specie_idx` (`id_specie`),
  KEY `user_idx` (`id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `orders`
--

DROP TABLE IF EXISTS `orders`;
CREATE TABLE IF NOT EXISTS `orders` (
  `id_order` int(11) NOT NULL AUTO_INCREMENT,
  `id_buyer` int(11) NOT NULL,
  `id_seller` int(11) NOT NULL,
  `date` date NOT NULL,
  PRIMARY KEY (`id_order`),
  KEY `buyer_idx` (`id_buyer`),
  KEY `seller_idx` (`id_seller`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `orders_lines`
--

DROP TABLE IF EXISTS `orders_lines`;
CREATE TABLE IF NOT EXISTS `orders_lines` (
  `id_order_line` int(11) NOT NULL AUTO_INCREMENT,
  `id_order` int(11) NOT NULL,
  `id_article` int(11) NOT NULL,
  `amount` int(11) NOT NULL,
  PRIMARY KEY (`id_order_line`),
  KEY `order_idx` (`id_order`),
  KEY `article_idx` (`id_article`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `species`
--

DROP TABLE IF EXISTS `species`;
CREATE TABLE IF NOT EXISTS `species` (
  `id_specie` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  PRIMARY KEY (`id_specie`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id_user` int(11) NOT NULL AUTO_INCREMENT,
  `pseudo` varchar(45) NOT NULL,
  `firstname` varchar(45) NOT NULL,
  `name` varchar(45) NOT NULL,
  `note` decimal(2,1) NOT NULL DEFAULT '2.5',
  `password` varchar(45) NOT NULL,
  `balance` decimal(65,2) NOT NULL DEFAULT '0.00',
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Contraintes pour la table `articles`
--
ALTER TABLE `articles`
  ADD CONSTRAINT `specie` FOREIGN KEY (`id_specie`) REFERENCES `species` (`id_specie`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `user` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `buyer` FOREIGN KEY (`id_buyer`) REFERENCES `users` (`id_user`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `seller` FOREIGN KEY (`id_seller`) REFERENCES `users` (`id_user`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `orders_lines`
--
ALTER TABLE `orders_lines`
  ADD CONSTRAINT `article` FOREIGN KEY (`id_article`) REFERENCES `articles` (`id_article`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `order` FOREIGN KEY (`id_order`) REFERENCES `orders` (`id_order`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
