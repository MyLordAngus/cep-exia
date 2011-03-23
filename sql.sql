-- phpMyAdmin SQL Dump
-- version 3.2.0.1
-- http://www.phpmyadmin.net
--
-- Serveur: localhost
-- Généré le : Mar 22 Mars 2011 à 17:40
-- Version du serveur: 5.1.36
-- Version de PHP: 5.3.0

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

--
-- Base de données: `mysql2`
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
  `Type` varchar(45) NOT NULL,
  `Actif` int(11) NOT NULL DEFAULT '0',
  `Email` varchar(50) NOT NULL DEFAULT 'bluck@gmail.com',
  `Siret` varchar(15) NOT NULL DEFAULT '068977788400000',
  `Telephone` varchar(10) NOT NULL DEFAULT '0689777884',
  PRIMARY KEY (`ID`),
  UNIQUE KEY `ID` (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Contenu de la table `comptes`
--

INSERT INTO `comptes` (`ID`, `Login`, `Password`, `Type`, `Actif`, `Email`, `Siret`, `Telephone`) VALUES
(1, 'aze', 'aze', 'entreprise', 1, 'mail@mail.com', '21412214', '0203020126'),
(2, 'Sb', 'aze', 'prestataire', 1, 'b.joyenconseil@gmail.comv', '068977788400056', '0689777884'),
(3, 'superben', 'aze', 'prestataire', 1, 'ben@yopmail.com', '068977788400000', '0689777884');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Contenu de la table `devis`
--

INSERT INTO `devis` (`ID`, `Date`, `IDOffre`, `IDPrestataire`, `Montant`, `Duree`, `Description`, `Etat`) VALUES
(1, 1297345363, 11, 0, '782.00', 30, '<p>\n Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus vitae ante semper ipsum aliquet elementum at ac dolor. Aliquam interdum sollicitudin congue. Donec ultricies sollicitudin ullamcorper. Donec hendrerit quam eros, ac laoreet libero. Nunc ac libero erat.</p>\n<ol>\n <li>\n  Donec ut enim a leo pretium tincidunt. Nulla fermentum sagittis sem, semper semper sem aliquet vel. Integer dignissim aliquet volutpat.</li>\n <li>\n  Etiam ut tristique enim. Nullam risus dui, porttitor ac scelerisque rhoncus, consectetur in massa. Duis volutpat convallis arcu, ac semper elit tincidunt sit amet.</li>\n <li>\n  Cras sit amet nunc felis. Aliquam erat volutpat. Nulla libero mauris, dapibus et pharetra a, tincidunt at dui. Nulla diam lacus, pretium a mollis nec, pellentesque ut nisl.&nbsp;</li>\n</ol>\n<p>\n Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent sodales dictum sagittis.</p>\n', 1),
(2, 1297330158, 14, 2, '630.00', 27, '<p>\r\n\n Oui je peux le faire, oui oui je peux le faire....</p>\r\n\n', -1),
(3, 1297330158, 14, 3, '368.00', 34, '<p>\r\n Bonjour Monsieur Michel,</p>\r\n<p>\r\n Je r&eacute;pond &agrave; cette offre car je crois que je suis capable de la r&eacute;aliser pour un moindre coup en un temps des plus rapide:</p>\r\n<p>\r\n Je vous pr&eacute;sente les diff&eacute;rentes &eacute;tapes du d&eacute;veloppement du projet ainsi que le nombre d&#39;heures correspondant :</p>\r\n<ol>\r\n <li>\r\n  Ananlyse =&gt; 14h</li>\r\n <li>\r\n  developpement =&gt; 10h</li>\r\n <li>\r\n  test et mise en place de la solution =&gt; 10h</li>\r\n</ol>\r\n<p>\r\n Voila, merci de me contacter pour plus d&#39;informations.</p>\r\n<p>\r\n &nbsp;</p>\r\n<p>\r\n Cordialement,</p>\r\n<p>\r\n Benjamin Joyen-Conseil, Exia.Cesi A3</p>\r\n', -1),
(4, 1297330158, 14, 3, '368.00', 485, '<p>\r\n Bonjour M.Michel,</p>\r\n<p>\r\n Je me permets de vous adresser ce devis qui r&eacute;pond le mieux &agrave; vos attentes. Le developpement du projet ce d&eacute;roulera en 3 &eacute;tapes:</p>\r\n<ol>\r\n <li>\r\n  Ananlyse =&gt; 10h</li>\r\n <li>\r\n  Charte graphique =&gt; 5h</li>\r\n <li>\r\n  developpement =&gt;10</li>\r\n <li>\r\n  test et mise en place de la solution =&gt; 10h</li>\r\n</ol>\r\n<p>\r\n Pour plus d&#39;information, merci de me contacter.</p>\r\n<p>\r\n &nbsp;</p>\r\n<p>\r\n Cordialement,</p>\r\n<p>\r\n Benjamin Joyen-Conseil, Exia.cesi A3</p>\r\n', -1),
(5, 1298886822, 14, 2, '840.00', 17, '<p>\r\n\n Morbi mattis, tortor vel ultrices tincidunt, urna sapien consequat massa, ut luctus turpis dui nec nunc. Suspendisse egestas viverra augue ac tincidunt. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Duis urna augue, sollicitudin a blandit vel, sollicitudin non ipsum. Sed in leo felis. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Fusce dolor ipsum, mattis ac euismod eu, pharetra ut enim. Maecenas vulputate mattis elit sit amet laoreet. Nulla auctor rutrum euismod. Donec elementum quam id lorem euismod iaculis.</p>\r\n\n<ul>\r\n\n <li>\r\n\n  Lorem ipsum dolor sit amet, consectetur adipiscing elit.</li>\r\n\n <li>\r\n\n  Phasellus fermentum ligula vel metus semper vulputate.</li>\r\n\n <li>\r\n\n  Vivamus et neque vitae dolor pretium volutpat eget a justo.</li>\r\n\n <li>\r\n\n  Pellentesque molestie eleifend magna, sit amet dictum dolor malesuada ac.</li>\r\n\n <li>\r\n\n  Nam vel est nisl, nec sagittis leo.</li>\r\n\n</ul>\r\n\n', 1);

-- --------------------------------------------------------

--
-- Structure de la table `entreprises`
--

CREATE TABLE IF NOT EXISTS `entreprises` (
  `ID` int(11) NOT NULL,
  `RaisonSoc` varchar(45) NOT NULL,
  `Adresse` varchar(45) NOT NULL,
  `CodePostal` varchar(5) NOT NULL,
  `Ville` varchar(45) NOT NULL,
  `Domaine` varchar(45) NOT NULL,
  `Description` text NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `entreprises`
--

INSERT INTO `entreprises` (`ID`, `RaisonSoc`, `Adresse`, `CodePostal`, `Ville`, `Domaine`, `Description`) VALUES
(1, 'bluck Corporation & Inc', 'rue de l''Eglise', '76000', 'Rouen', 'www.site.fr', '<p>\r\n\n Leader historique des solutions Media Center en environnement Flash depuis 2003, SesamTV recrute des d&eacute;veloppeurs juniors et seniors pour des applicatifs innovants g&eacute;rant le multim&eacute;dia (TV, vid&eacute;o &agrave; la demande, audio, vid&eacute;o, photo,..) convergents sur plusieurs terminaux : T&eacute;l&eacute;vision int&eacute;ractive, D&eacute;codeurs TV num&eacute;riques, Mobiles, PC, ... afin d&#39;offrir les services de convergence de demain.!</p>\r\n\n');

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
(2, 'Inscription', '/login/sinscrire.html', 1),
(3, 'Login', '/login.html', 1),
(4, 'Profil', '/prestataire_controller', 3),
(5, 'Profil', '/entreprise_controller', 2),
(6, 'Offres', '/offres.html', 0),
(7, 'Nouvelle Offre', '/offres/add.html', 2),
(8, 'Déconnexion', '/site/deconnexion.html', 4);

-- --------------------------------------------------------

--
-- Structure de la table `messages`
--

CREATE TABLE IF NOT EXISTS `messages` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Message` text NOT NULL,
  `IDCompte` int(11) NOT NULL,
  `Date` bigint(20) NOT NULL,
  `IDRelation` int(11) NOT NULL,
  PRIMARY KEY (`ID`),
  KEY `IDCompte` (`IDCompte`),
  KEY `IDRelation` (`IDRelation`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Contenu de la table `messages`
--

INSERT INTO `messages` (`ID`, `Message`, `IDCompte`, `Date`, `IDRelation`) VALUES
(1, 'Salut lol', 2, 118845526562265, 1),
(2, 'Bonjour,\r\nLorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur eleifend interdum consectetur. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Aliquam pellentesque congue euismod. Nam egestas, elit sed posuere suscipit, dolor urna bibendum ante, sed facilisis ligula enim eu mi. Integer accumsan blandit tortor in semper. Vivamus auctor posuere tortor eget tempus. Sed ante risus, molestie ut placerat quis, vestibulum sed neque. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Curabitur suscipit, erat in fringilla adipiscing, turpis purus auctor quam, non vulputate enim dolor non mi. Aliquam adipiscing urna ac ligula fermentum malesuada. Ut pharetra fermentum diam non molestie. Etiam scelerisque iaculis urna cursus vestibulum. ', 1, 1200812142, 2),
(3, 'Bonjour,\r\nNous pouvons commencez notre projet via cette interface hyper conviviale', 3, 1300812142, 2),
(4, '<p>\r\n\n bluck</p>\r\n\n', 1, 1300815021, 2),
(5, '<p>\r\n\n zzrrzrzrz</p>\r\n\n', 1, 1300815399, 2),
(6, '<p>\r\n\n Praesent ac sapien eleifend velit ornare rutrum semper id massa. Quisque placerat dapibus sagittis. Aliquam erat volutpat. Vestibulum non volutpat mi. Morbi libero mi, venenatis a condimentum sed, sollicitudin a velit. Nulla facilisi. Aliquam a neque risus, nec auctor diam. In malesuada, tortor sed mattis adipiscing, nibh risus adipiscing sem, suscipit porta metus quam non quam. Quisque dignissim enim et eros ornare a suscipit nulla tincidunt. Donec erat metus, auctor eget fringilla sed, dignissim ac est. Morbi sodales justo in arcu iaculis rhoncus. Aliquam erat volutpat. Curabitur sed lectus ac felis pretium venenatis in ut dolor. Pellentesque et odio quis elit condimentum rhoncus.</p>\r\n\n<p>\r\n\n Donec eget eros leo, eu lacinia turpis. Fusce consequat tellus pellentesque lectus consec<strong>tetur a porta </strong>sapien interdum. Sed at enim id justo facilisis dictum. Morbi eu dui enim. Maecenas non odio turpis, ac vulputate diam. Ut eleifend semper fringilla. Aliquam consectetur orci a ipsum fermentum fringilla. In mauris neque, ullamcorper vel porta at, eleifend a purus. Curabitur aliquam nisi eget elit molestie a dictum urna bibendum. Cras vehicula nibh facilisis ipsum gravida quis rhoncus elit imperdiet. Vestibulum et mauris velit. Donec in tellus sed ante luctus pellentesque a a sapien. Phasellus venenatis iaculis urna, at faucibus lorem pharetra eu. Aenean tortor ligula, mattis in suscipit ut, laoreet interdum diam.</p>\r\n\n', 1, 1300815429, 2);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=22 ;

--
-- Contenu de la table `offres`
--

INSERT INTO `offres` (`IDEntreprise`, `ID`, `Date`, `Titre`, `IDCategorie`, `Description`, `IDStatut`, `Montant`) VALUES
(1, 8, 1297023706, 'Java J2E', 1, '<p>\n Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum varius gravida nibh, quis condimentum felis placerat et. Nullam egestas congue tincidunt. Nulla facilisi. Praesent volutpat pretium nunc non fringilla. Aliquam velit risus, adipiscing a pulvinar ut, malesuada non quam. Mauris laoreet facilisis dolor sed tristique. Aenean non fermentum erat. Donec iaculis euismod tortor, ut faucibus metus suscipit id. Suspendisse potenti. Vivamus vel sem arcu. Proin nibh libero, tincidunt a elementum a, malesuada quis tortor. Donec a dolor mauris, vitae placerat odio. Nam sed tortor et augue tristique pellentesque</p>\n', 1, '350.00'),
(1, 9, 0, 'Une offre de site', 2, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus vitae ante semper ipsum aliquet elementum at ac dolor. Aliquam interdum sollicitudin congue. Donec ultricies sollicitudin ullamcorper. Donec hendrerit quam eros, ac laoreet libero. Nunc ac libero erat. Donec ut enim a leo pretium tincidunt. Nulla fermentum sagittis sem, semper semper sem aliquet vel. Integer dignissim aliquet volutpat. Etiam ut tristique enim. Nullam risus dui, porttitor ac scelerisque rhoncus, consectetur in massa. Duis volutpat convallis arcu, ac semper elit tincidunt sit amet. Cras sit amet nunc felis. Aliquam erat volutpat. Nulla libero mauris, dapibus et pharetra a, tincidunt at dui. Nulla diam lacus, pretium a mollis nec, pellentesque ut nisl. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent sodales dictum sagittis.', 1, '1250.00'),
(1, 10, 122001, 'Une offre de site', 2, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus vitae ante semper ipsum aliquet elementum at ac dolor. Aliquam interdum sollicitudin congue. Donec ultricies sollicitudin ullamcorper. Donec hendrerit quam eros, ac laoreet libero. Nunc ac libero erat. Donec ut enim a leo pretium tincidunt. Nulla fermentum sagittis sem, semper semper sem aliquet vel. Integer dignissim aliquet volutpat. Etiam ut tristique enim. Nullam risus dui, porttitor ac scelerisque rhoncus, consectetur in massa. Duis volutpat convallis arcu, ac semper elit tincidunt sit amet. Cras sit amet nunc felis. Aliquam erat volutpat. Nulla libero mauris, dapibus et pharetra a, tincidunt at dui. Nulla diam lacus, pretium a mollis nec, pellentesque ut nisl. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent sodales dictum sagittis.', 1, '1250.00'),
(1, 11, 0, 'Php service bluck', 2, 'ramanaianaiaia lorem ', 1, '0.00'),
(1, 12, 1297024274, 'Lorem ipsum3', 1, '<p>\n Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus vitae ante semper ipsum aliquet elementum at ac dolor. Aliquam interdum sollicitudin congue. Donec ultricies sollicitudin ullamcorper. Donec hendrerit quam eros, ac laoreet libero. Nunc ac libero erat. Donec ut enim a leo pretium tincidunt. Nulla fermentum sagittis sem, semper semper sem aliquet vel. Integer dignissim aliquet volutpat. Etiam ut tristique enim. Nullam risus dui, porttitor ac scelerisque rhoncus, consectetur in massa. Duis volutpat convallis arcu, ac semper elit tincidunt sit amet. Cras sit amet nunc felis. Aliquam erat volutpat. Nulla libero mauris, dapibus et pharetra a, tincidunt at dui. Nulla diam lacus, pretium a mollis nec, pellentesque ut nisl. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent sodales dictum sagittis.</p>\n', 1, '3500.00'),
(1, 14, 1297024288, 'Ptolémé² site web', 1, '<p>\n Voila je voudrais un site ou je puisse mettre des formations en &eacute;vidences et faire une description de l&#39;entreprise ptol&eacute;m&eacute;&sup2;. Un site bien r&eacute;f&eacute;renc&eacute; sur google pour les mots cl&eacute;s constructions HQE</p>\n', 2, '850.00'),
(1, 20, 1297030825, 'un titre', 2, '<ol>\n <li>\n  aadadzadz</li>\n</ol>\n<p>\n dzaadzadzadzdz</p>\n<ol>\n <li>\n  efzfezefz</li>\n <li>\n  ezfez</li>\n <li>\n  eezfezf</li>\n <li>\n  efzefzefzefz</li>\n</ol>\n<p>\n fezefzefzefz</p>\n', 1, '0.00'),
(1, 21, 1298888804, 'Différence entre static:: et s', 1, '<p>\r\n\n En PHP 5.2 et PHP 5.3, le code ci-dessus va renvoyer 0. Pas normal me dites-vous, et vous avez bien raison. En effet, l&#39;analyse du mot-clef &#39;self&#39; se fait au moment de la compilation, donc son utilisation ignore toutes les classes &eacute;tendues.</p>\r\n\n<p>\r\n\n Et voici la magie de PHP 5.3. R&eacute;&eacute;crivez la fonction go comme suit dans test1&nbsp;:</p>\r\n\n', 1, '0.00');

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
(2, 'Joyen-Conseil', 'Georges'),
(3, 'Joyen-Conseil', 'Benjamin');

-- --------------------------------------------------------

--
-- Structure de la table `prestatairescompetences`
--

CREATE TABLE IF NOT EXISTS `prestatairescompetences` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `IDCompetence` int(11) NOT NULL,
  `IDPrestataire` int(11) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=118 ;

--
-- Contenu de la table `prestatairescompetences`
--

INSERT INTO `prestatairescompetences` (`ID`, `IDCompetence`, `IDPrestataire`) VALUES
(88, 1, 0),
(89, 2, 0),
(117, 3, 2);

-- --------------------------------------------------------

--
-- Structure de la table `relations`
--

CREATE TABLE IF NOT EXISTS `relations` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `IDPrestataire` int(11) NOT NULL,
  `IDEntreprise` int(11) NOT NULL,
  `Termine` int(11) NOT NULL,
  PRIMARY KEY (`ID`),
  KEY `IDPrestataire` (`IDPrestataire`),
  KEY `IDEntreprise` (`IDEntreprise`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Contenu de la table `relations`
--

INSERT INTO `relations` (`ID`, `IDPrestataire`, `IDEntreprise`, `Termine`) VALUES
(1, 2, 1, 0),
(2, 3, 1, 0);

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

--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `entreprises`
--
ALTER TABLE `entreprises`
  ADD CONSTRAINT `entreprises_ibfk_1` FOREIGN KEY (`ID`) REFERENCES `comptes` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `messages`
--
ALTER TABLE `messages`
  ADD CONSTRAINT `messages_ibfk_2` FOREIGN KEY (`IDRelation`) REFERENCES `relations` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `messages_ibfk_1` FOREIGN KEY (`IDCompte`) REFERENCES `comptes` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `prestataires`
--
ALTER TABLE `prestataires`
  ADD CONSTRAINT `prestataires_ibfk_1` FOREIGN KEY (`ID`) REFERENCES `comptes` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `relations`
--
ALTER TABLE `relations`
  ADD CONSTRAINT `relations_ibfk_2` FOREIGN KEY (`IDEntreprise`) REFERENCES `entreprises` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `relations_ibfk_1` FOREIGN KEY (`IDPrestataire`) REFERENCES `prestataires` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;
