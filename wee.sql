-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  mer. 12 sep. 2018 à 13:37
-- Version du serveur :  5.7.21
-- Version de PHP :  5.6.35

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `wee`
--

-- --------------------------------------------------------

--
-- Structure de la table `categorie`
--

DROP TABLE IF EXISTS `categorie`;
CREATE TABLE IF NOT EXISTS `categorie` (
  `id_cat` int(11) NOT NULL AUTO_INCREMENT,
  `libeller` varchar(20) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`id_cat`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Déchargement des données de la table `categorie`
--

INSERT INTO `categorie` (`id_cat`, `libeller`) VALUES
(2, 'cinema'),
(3, 'sport'),
(4, 'culture'),
(5, 'loisir'),
(6, 'musique'),
(7, 'soiree'),
(8, 'autre');

-- --------------------------------------------------------

--
-- Structure de la table `com`
--

DROP TABLE IF EXISTS `com`;
CREATE TABLE IF NOT EXISTS `com` (
  `id_com` int(11) NOT NULL AUTO_INCREMENT,
  `description` varchar(250) COLLATE utf8_bin NOT NULL,
  `date_creation_com` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_com`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Structure de la table `compte`
--

DROP TABLE IF EXISTS `compte`;
CREATE TABLE IF NOT EXISTS `compte` (
  `id_co` int(11) NOT NULL AUTO_INCREMENT,
  `user_co` varchar(50) COLLATE utf8_bin NOT NULL,
  `mdp_co` varchar(50) COLLATE utf8_bin NOT NULL,
  `mail` varchar(50) COLLATE utf8_bin NOT NULL,
  `promo_co` varchar(10) COLLATE utf8_bin NOT NULL,
  `ecole` varchar(10) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`id_co`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Déchargement des données de la table `compte`
--

INSERT INTO `compte` (`id_co`, `user_co`, `mdp_co`, `mail`, `promo_co`, `ecole`) VALUES
(1, 'yohan', 'yohan', 'yohan@gmail.com', 'B2', 'epsi');

-- --------------------------------------------------------

--
-- Structure de la table `evcom`
--

DROP TABLE IF EXISTS `evcom`;
CREATE TABLE IF NOT EXISTS `evcom` (
  `id_co` int(11) NOT NULL,
  `id_e` int(11) NOT NULL,
  `id_com` int(11) NOT NULL,
  KEY `id_co` (`id_co`),
  KEY `id_com` (`id_com`),
  KEY `id_e` (`id_e`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Structure de la table `event`
--

DROP TABLE IF EXISTS `event`;
CREATE TABLE IF NOT EXISTS `event` (
  `id_e` int(11) NOT NULL AUTO_INCREMENT,
  `titre` varchar(50) COLLATE utf8_bin NOT NULL,
  `description` varchar(250) COLLATE utf8_bin NOT NULL,
  `date_creation` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `date_debut` date NOT NULL,
  `date_fin` date NOT NULL,
  `lieu` varchar(50) COLLATE utf8_bin NOT NULL,
  `id_co` int(11) NOT NULL,
  `id_cat` int(11) NOT NULL,
  PRIMARY KEY (`id_e`),
  KEY `id_co` (`id_co`) USING BTREE,
  KEY `id_cat` (`id_cat`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Structure de la table `participe`
--

DROP TABLE IF EXISTS `participe`;
CREATE TABLE IF NOT EXISTS `participe` (
  `id_co` int(11) NOT NULL,
  `id_e` int(11) NOT NULL,
  KEY `id_co` (`id_co`),
  KEY `id_e` (`id_e`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `event`
--
ALTER TABLE `event`
  ADD CONSTRAINT `event_ibfk_1` FOREIGN KEY (`id_co`) REFERENCES `compte` (`id_co`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
