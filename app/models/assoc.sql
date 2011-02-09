-- phpMyAdmin SQL Dump
-- version 3.2.4
-- http://www.phpmyadmin.net
--
-- Serveur: localhost
-- Généré le : Mer 24 Novembre 2010 à 10:20
-- Version du serveur: 5.1.41
-- Version de PHP: 5.3.1

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données: `assoc`
--

-- --------------------------------------------------------

--
-- Structure de la table `categories`
--

CREATE TABLE IF NOT EXISTS `categories` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Libelle` varchar(45) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Contenu de la table `categories`
--

INSERT INTO `categories` (`ID`, `Libelle`) VALUES
(1, 'Developpement'),
(2, 'Reseau');

-- --------------------------------------------------------

--
-- Structure de la table `competences`
--

CREATE TABLE IF NOT EXISTS `competences` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Libelle` varchar(45) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Contenu de la table `competences`
--


-- --------------------------------------------------------

--
-- Structure de la table `comptes`
--

CREATE TABLE IF NOT EXISTS `comptes` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Login` varchar(45) NOT NULL,
  `Password` varchar(45) NOT NULL,
  `Table` varchar(45) NOT NULL,
  `Actif` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`ID`),
  UNIQUE KEY `ID` (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Contenu de la table `comptes`
--

INSERT INTO `comptes` (`ID`, `Login`, `Password`, `Table`, `Actif`) VALUES
(1, 'aze', 'aze', 'Entreprise', 1);

-- --------------------------------------------------------

--
-- Structure de la table `devis`
--

CREATE TABLE IF NOT EXISTS `devis` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Date` bigint(20) NOT NULL,
  `IDOffre` int(11) NOT NULL,
  `IDPrestataire` int(11) NOT NULL,
  `Montant` decimal(10,2) NOT NULL,
  `Duree` int(11) NOT NULL,
  `Description` varchar(300) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Contenu de la table `devis`
--


-- --------------------------------------------------------

--
-- Structure de la table `entreprises`
--

CREATE TABLE IF NOT EXISTS `entreprises` (
  `ID` int(11) NOT NULL,
  `RaisonSoc` varchar(45) NOT NULL,
  `Telephone` varchar(10) NOT NULL,
  `Siret` varchar(10) NOT NULL,
  `Adresse` varchar(45) NOT NULL,
  `CodePostal` varchar(5) NOT NULL,
  `Ville` varchar(45) NOT NULL,
  `Domaine` varchar(45) NOT NULL,
  `Email` varchar(45) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `entreprises`
--

INSERT INTO `entreprises` (`ID`, `RaisonSoc`, `Telephone`, `Siret`, `Adresse`, `CodePostal`, `Ville`, `Domaine`, `Email`) VALUES
(1, 'bluck Corporation', '0203020124', '21412', 'rue de l''Eglise', '76000', 'Rouen', 'www.site.com', 'mail@mail.com');

-- --------------------------------------------------------

--
-- Structure de la table `menu`
--

CREATE TABLE IF NOT EXISTS `menu` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Libelle` varchar(45) NOT NULL,
  `Lien` varchar(110) NOT NULL,
  `Code` int(11) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Contenu de la table `menu`
--


-- --------------------------------------------------------

--
-- Structure de la table `offres`
--

CREATE TABLE IF NOT EXISTS `offres` (
  `IDEntreprise` int(11) NOT NULL,
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Date` bigint(20) NOT NULL,
  `Titre` varchar(45) NOT NULL,
  `IDCategorie` int(11) NOT NULL,
  `Description` varchar(300) NOT NULL,
  `IDStatut` varchar(45) NOT NULL,
  `Montant` decimal(10,2) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Contenu de la table `offres`
--

INSERT INTO `offres` (`IDEntreprise`, `ID`, `Date`, `Titre`, `IDCategorie`, `Description`, `IDStatut`, `Montant`) VALUES
(0, 8, 0, 'titre', 2, 'descriptions', '', '0.00');

-- --------------------------------------------------------

--
-- Structure de la table `prestataires`
--

CREATE TABLE IF NOT EXISTS `prestataires` (
  `ID` int(11) NOT NULL,
  `Nom` varchar(45) NOT NULL,
  `Prenom` varchar(45) NOT NULL,
  `Telephone` varchar(10) NOT NULL,
  `Email` varchar(45) NOT NULL,
  `Siret` varchar(45) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `prestataires`
--


-- --------------------------------------------------------

--
-- Structure de la table `prestatairesCompetences`
--

CREATE TABLE IF NOT EXISTS `prestatairesCompetences` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `IDCompetence` int(11) NOT NULL,
  `IDPrestataire` int(11) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Contenu de la table `prestatairesCompetences`
--


-- --------------------------------------------------------

--
-- Structure de la table `statuts`
--

CREATE TABLE IF NOT EXISTS `statuts` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Libelle` varchar(45) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Contenu de la table `statuts`
--

