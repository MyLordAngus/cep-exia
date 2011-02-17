-- phpMyAdmin SQL Dump
-- version 3.2.0.1
-- http://www.phpmyadmin.net
--
-- Serveur: localhost
-- Généré le : Lun 07 Février 2011 à 23:30
-- Version du serveur: 5.1.36
-- Version de PHP: 5.3.0

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

--
-- Base de données: `cep`
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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Contenu de la table `competences`
--

INSERT INTO `competences` (`ID`, `Libelle`) VALUES
(1, 'C'),
(2, 'C++'),
(3, 'Java');

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
  `Email` varchar(50) NOT NULL DEFAULT 'bluck@gmail.com',
  `Siret` varchar(15) NOT NULL DEFAULT '068977788400000',
  `Telephone` varchar(10) NOT NULL DEFAULT '0689777884',
  PRIMARY KEY (`ID`),
  UNIQUE KEY `ID` (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Contenu de la table `comptes`
--

INSERT INTO `comptes` (`ID`, `Login`, `Password`, `Table`, `Actif`, `Email`, `Siret`, `Telephone`) VALUES
(1, 'aze', 'aze', 'entreprise', 1, 'bluck@gmail.com', '068977788400000', ''),
(2, 'Sb', 'aze', 'prestataire', 1, 'b.joyenconseil@gmail.comv', '068977788400000', '0689777884'),
(3, 'superben', 'superben', 'prestataire', 0, 'ben@yopmail.com', '068977788400000', '0689777884');

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
  `Description` text CHARACTER SET utf8 NOT NULL,
  `Etat` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Contenu de la table `devis`
--

INSERT INTO `devis` (`ID`, `Date`, `IDOffre`, `IDPrestataire`, `Montant`, `Duree`, `Description`, `Etat`) VALUES
(1, 1297118777, 11, 0, '782.00', 30, '<p>\n Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus vitae ante semper ipsum aliquet elementum at ac dolor. Aliquam interdum sollicitudin congue. Donec ultricies sollicitudin ullamcorper. Donec hendrerit quam eros, ac laoreet libero. Nunc ac libero erat.</p>\n<ol>\n <li>\n  Donec ut enim a leo pretium tincidunt. Nulla fermentum sagittis sem, semper semper sem aliquet vel. Integer dignissim aliquet volutpat.</li>\n <li>\n  Etiam ut tristique enim. Nullam risus dui, porttitor ac scelerisque rhoncus, consectetur in massa. Duis volutpat convallis arcu, ac semper elit tincidunt sit amet.</li>\n <li>\n  Cras sit amet nunc felis. Aliquam erat volutpat. Nulla libero mauris, dapibus et pharetra a, tincidunt at dui. Nulla diam lacus, pretium a mollis nec, pellentesque ut nisl.&nbsp;</li>\n</ol>\n<p>\n Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent sodales dictum sagittis.</p>\n', 0),
(2, 1297113628, 14, 2, '630.00', 27, '<p>\n Oui je peux le faire, oui oui je peux le faire</p>\n', 0),
(3, 1297007722, 14, 3, '368.00', 34, '<p>\r\n Bonjour Monsieur Michel,</p>\r\n<p>\r\n Je r&eacute;pond &agrave; cette offre car je crois que je suis capable de la r&eacute;aliser pour un moindre coup en un temps des plus rapide:</p>\r\n<p>\r\n Je vous pr&eacute;sente les diff&eacute;rentes &eacute;tapes du d&eacute;veloppement du projet ainsi que le nombre d&#39;heures correspondant :</p>\r\n<ol>\r\n <li>\r\n  Ananlyse =&gt; 14h</li>\r\n <li>\r\n  developpement =&gt; 10h</li>\r\n <li>\r\n  test et mise en place de la solution =&gt; 10h</li>\r\n</ol>\r\n<p>\r\n Voila, merci de me contacter pour plus d&#39;informations.</p>\r\n<p>\r\n &nbsp;</p>\r\n<p>\r\n Cordialement,</p>\r\n<p>\r\n Benjamin Joyen-Conseil, Exia.Cesi A3</p>\r\n', 0),
(4, 1297007944, 14, 3, '368.00', 485, '<p>\r\n Bonjour M.Michel,</p>\r\n<p>\r\n Je me permets de vous adresser ce devis qui r&eacute;pond le mieux &agrave; vos attentes. Le developpement du projet ce d&eacute;roulera en 3 &eacute;tapes:</p>\r\n<ol>\r\n <li>\r\n  Ananlyse =&gt; 10h</li>\r\n <li>\r\n  Charte graphique =&gt; 5h</li>\r\n <li>\r\n  developpement =&gt;10</li>\r\n <li>\r\n  test et mise en place de la solution =&gt; 10h</li>\r\n</ol>\r\n<p>\r\n Pour plus d&#39;information, merci de me contacter.</p>\r\n<p>\r\n &nbsp;</p>\r\n<p>\r\n Cordialement,</p>\r\n<p>\r\n Benjamin Joyen-Conseil, Exia.cesi A3</p>\r\n', 0);

-- --------------------------------------------------------

--
-- Structure de la table `droits`
--

CREATE TABLE IF NOT EXISTS `droits` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `type_compte` varchar(30) NOT NULL DEFAULT 'prestataire',
  `url` varchar(255) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Contenu de la table `droits`
--

INSERT INTO `droits` (`ID`, `type_compte`, `url`) VALUES
(1, 'prestataire', '/devis_controller/add');

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
  `description` text NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `entreprises`
--

INSERT INTO `entreprises` (`ID`, `RaisonSoc`, `Telephone`, `Siret`, `Adresse`, `CodePostal`, `Ville`, `Domaine`, `Email`, `description`) VALUES
(1, 'bluck Corporation', '0203020124', '21412', 'rue de l''Eglise', '76000', 'Rouen', 'www.site.com', 'mail@mail.com', '');

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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Contenu de la table `menu`
--

INSERT INTO `menu` (`ID`, `Libelle`, `Lien`, `Code`) VALUES
(1, 'Accueil', '', 0),
(2, 'Inscription', '/login_controller/sinscrire', 1),
(3, 'Login', '/login_controller', 1),
(4, 'Profil', '/prestataire_controller', 3),
(5, 'Profil', '/entreprise_controller', 2),
(6, 'Offres', '/offres_controller', 0),
(7, 'Nouvelle Offre', '/offres_controller/add', 2),
(8, 'Déconnexion', '/site_controller/deconnexion', 4);

-- --------------------------------------------------------

--
-- Structure de la table `offres`
--

CREATE TABLE IF NOT EXISTS `offres` (
  `IDEntreprise` int(11) NOT NULL,
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Date` bigint(20) NOT NULL,
  `Titre` varchar(45) NOT NULL,
  `IDCategorie` tinyint(2) NOT NULL DEFAULT '1',
  `Description` text NOT NULL,
  `IDStatut` tinyint(2) NOT NULL DEFAULT '1',
  `Montant` decimal(10,2) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=21 ;

--
-- Contenu de la table `offres`
--

INSERT INTO `offres` (`IDEntreprise`, `ID`, `Date`, `Titre`, `IDCategorie`, `Description`, `IDStatut`, `Montant`) VALUES
(1, 8, 1297023706, 'Java J2E', 1, '<p>\n Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum varius gravida nibh, quis condimentum felis placerat et. Nullam egestas congue tincidunt. Nulla facilisi. Praesent volutpat pretium nunc non fringilla. Aliquam velit risus, adipiscing a pulvinar ut, malesuada non quam. Mauris laoreet facilisis dolor sed tristique. Aenean non fermentum erat. Donec iaculis euismod tortor, ut faucibus metus suscipit id. Suspendisse potenti. Vivamus vel sem arcu. Proin nibh libero, tincidunt a elementum a, malesuada quis tortor. Donec a dolor mauris, vitae placerat odio. Nam sed tortor et augue tristique pellentesque</p>\n', 1, '350.00'),
(1, 9, 0, 'Une offre de site', 2, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus vitae ante semper ipsum aliquet elementum at ac dolor. Aliquam interdum sollicitudin congue. Donec ultricies sollicitudin ullamcorper. Donec hendrerit quam eros, ac laoreet libero. Nunc ac libero erat. Donec ut enim a leo pretium tincidunt. Nulla fermentum sagittis sem, semper semper sem aliquet vel. Integer dignissim aliquet volutpat. Etiam ut tristique enim. Nullam risus dui, porttitor ac scelerisque rhoncus, consectetur in massa. Duis volutpat convallis arcu, ac semper elit tincidunt sit amet. Cras sit amet nunc felis. Aliquam erat volutpat. Nulla libero mauris, dapibus et pharetra a, tincidunt at dui. Nulla diam lacus, pretium a mollis nec, pellentesque ut nisl. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent sodales dictum sagittis.', 1, '1250.00'),
(1, 10, 122001, 'Une offre de site', 2, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus vitae ante semper ipsum aliquet elementum at ac dolor. Aliquam interdum sollicitudin congue. Donec ultricies sollicitudin ullamcorper. Donec hendrerit quam eros, ac laoreet libero. Nunc ac libero erat. Donec ut enim a leo pretium tincidunt. Nulla fermentum sagittis sem, semper semper sem aliquet vel. Integer dignissim aliquet volutpat. Etiam ut tristique enim. Nullam risus dui, porttitor ac scelerisque rhoncus, consectetur in massa. Duis volutpat convallis arcu, ac semper elit tincidunt sit amet. Cras sit amet nunc felis. Aliquam erat volutpat. Nulla libero mauris, dapibus et pharetra a, tincidunt at dui. Nulla diam lacus, pretium a mollis nec, pellentesque ut nisl. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent sodales dictum sagittis.', 1, '1250.00'),
(1, 11, 0, 'Php service bluck', 2, 'ramanaianaiaia lorem ', 1, '0.00'),
(1, 12, 1297024274, 'Lorem ipsum3', 1, '<p>\n Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus vitae ante semper ipsum aliquet elementum at ac dolor. Aliquam interdum sollicitudin congue. Donec ultricies sollicitudin ullamcorper. Donec hendrerit quam eros, ac laoreet libero. Nunc ac libero erat. Donec ut enim a leo pretium tincidunt. Nulla fermentum sagittis sem, semper semper sem aliquet vel. Integer dignissim aliquet volutpat. Etiam ut tristique enim. Nullam risus dui, porttitor ac scelerisque rhoncus, consectetur in massa. Duis volutpat convallis arcu, ac semper elit tincidunt sit amet. Cras sit amet nunc felis. Aliquam erat volutpat. Nulla libero mauris, dapibus et pharetra a, tincidunt at dui. Nulla diam lacus, pretium a mollis nec, pellentesque ut nisl. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent sodales dictum sagittis.</p>\n', 1, '3500.00'),
(1, 14, 1297024288, 'Ptolémé² site web', 1, '<p>\n Voila je voudrais un site ou je puisse mettre des formations en &eacute;vidences et faire une description de l&#39;entreprise ptol&eacute;m&eacute;&sup2;. Un site bien r&eacute;f&eacute;renc&eacute; sur google pour les mots cl&eacute;s constructions HQE</p>\n', 1, '850.00'),
(1, 20, 1297030825, 'un titre', 2, '<ol>\n <li>\n  aadadzadz</li>\n</ol>\n<p>\n dzaadzadzadzdz</p>\n<ol>\n <li>\n  efzfezefz</li>\n <li>\n  ezfez</li>\n <li>\n  eezfezf</li>\n <li>\n  efzefzefzefz</li>\n</ol>\n<p>\n fezefzefzefz</p>\n', 1, '0.00');

-- --------------------------------------------------------

--
-- Structure de la table `prestataires`
--

CREATE TABLE IF NOT EXISTS `prestataires` (
  `ID` int(11) NOT NULL,
  `Nom` varchar(45) NOT NULL,
  `Prenom` varchar(45) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `prestataires`
--

INSERT INTO `prestataires` (`ID`, `Nom`, `Prenom`) VALUES
(2, 'Joyen-Conseil', 'Georgess'),
(3, 'Joyen-Conseil', 'Benjamin');

-- --------------------------------------------------------

--
-- Structure de la table `prestatairesCompetences`
--

CREATE TABLE IF NOT EXISTS `prestatairesCompetences` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `IDCompetence` int(11) NOT NULL,
  `IDPrestataire` int(11) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=112 ;

--
-- Contenu de la table `prestatairescompetences`
--

INSERT INTO `prestatairesCompetences` (`ID`, `IDCompetence`, `IDPrestataire`) VALUES
(88, 1, 0),
(89, 2, 0),
(109, 1, 2),
(110, 2, 2),
(111, 3, 2);

-- --------------------------------------------------------

--
-- Structure de la table `statuts`
--

CREATE TABLE IF NOT EXISTS `statuts` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Libelle` varchar(45) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Contenu de la table `statuts`
--

INSERT INTO `statuts` (`ID`, `Libelle`) VALUES
(1, 'Attente de propositions'),
(2, 'Validation');
