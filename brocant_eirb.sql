-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Ven 01 Mai 2015 à 21:41
-- Version du serveur :  5.6.17
-- Version de PHP :  5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `brocant'eirb`
--

-- --------------------------------------------------------

--
-- Structure de la table `brocante`
--

CREATE TABLE IF NOT EXISTS `brocante` (
  `ID_Brocante` int(4) NOT NULL AUTO_INCREMENT,
  `nom_brocante` varchar(50) NOT NULL,
  `ID_utilisateur` int(4) NOT NULL,
  `description` varchar(500) NOT NULL,
  `lieu` varchar(50) NOT NULL,
  `photo1` text NOT NULL,
  `photo2` text NOT NULL,
  PRIMARY KEY (`ID_Brocante`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=29 ;

--
-- Contenu de la table `brocante`
--

INSERT INTO `brocante` (`ID_Brocante`, `nom_brocante`, `ID_utilisateur`, `description`, `lieu`, `photo1`, `photo2`) VALUES
(26, 'Brocante du 52', 8, 'C''est la brocante du 52 !', '52', 'images/brocantes/broc1.jpg', 'images/brocantes/broc2.jpg'),
(27, 'Brocante du 21', 9, 'C''est la brocante du 21', '21', 'images/brocantes/broc3.jpg', 'images/brocantes/broc4.jpg'),
(28, 'Brocante 1', 8, 'C''est la brocante 1 !', '33', 'images/brocantes/broc4.jpg', 'images/brocantes/broc4.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

CREATE TABLE IF NOT EXISTS `utilisateur` (
  `nom_utilisateur` varchar(50) NOT NULL,
  `mail_utilisateur` varchar(50) NOT NULL,
  `mdp_utilisateur` varchar(50) NOT NULL,
  `prenom_utilisateur` varchar(50) NOT NULL,
  `pseudo_utilisateur` varchar(50) NOT NULL,
  `departement` int(2) NOT NULL,
  `ville` varchar(50) NOT NULL,
  `date_inscription` date NOT NULL,
  `ID_utilisateur` int(4) NOT NULL AUTO_INCREMENT,
  `photo_profil` text NOT NULL,
  PRIMARY KEY (`ID_utilisateur`),
  FULLTEXT KEY `nom_utilisateur` (`nom_utilisateur`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=10 ;

--
-- Contenu de la table `utilisateur`
--

INSERT INTO `utilisateur` (`nom_utilisateur`, `mail_utilisateur`, `mdp_utilisateur`, `prenom_utilisateur`, `pseudo_utilisateur`, `departement`, `ville`, `date_inscription`, `ID_utilisateur`, `photo_profil`) VALUES
('BONNOTTE', 'benjamin.bonnotte@hotmail.fr', 'c4ca4238a0b923820dcc509a6f75849b', 'Benjamin', 'Benji', 33, 'Talence', '2015-04-27', 8, 'images/profil/FullSizeRender.jpg'),
('DUPONT', 'test@test.fr', 'c81e728d9d4c2f636f067f89cc14862c', 'Dupont', 'Dupont', 44, 'Dupontland', '2015-04-29', 9, 'images/profil/Sans titre-1.png');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
