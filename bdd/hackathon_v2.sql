-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : dim. 18 déc. 2022 à 17:00
-- Version du serveur : 5.7.36
-- Version de PHP : 8.1.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `hackathon_v2`
--

-- --------------------------------------------------------

--
-- Structure de la table `categorie`
--

DROP TABLE IF EXISTS `categorie`;
CREATE TABLE IF NOT EXISTS `categorie` (
  `numCateg` smallint(6) NOT NULL AUTO_INCREMENT,
  `libelle` varchar(128) DEFAULT NULL,
  `icone` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`numCateg`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `categorie`
--

INSERT INTO `categorie` (`numCateg`, `libelle`, `icone`) VALUES
(1, '1NSI', '1NSI.png'),
(2, '2NSI', '2NSI.png'),
(3, 'TNSI', 'TNSI.png'),
(4, 'SIO1', 'SIO1.png');

-- --------------------------------------------------------

--
-- Structure de la table `concerner`
--

DROP TABLE IF EXISTS `concerner`;
CREATE TABLE IF NOT EXISTS `concerner` (
  `noEnigme` smallint(6) NOT NULL,
  `noSession` smallint(6) NOT NULL,
  PRIMARY KEY (`noEnigme`,`noSession`),
  KEY `FK_Concerner_Session` (`noSession`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `concerner`
--

INSERT INTO `concerner` (`noEnigme`, `noSession`) VALUES
(1, 1),
(6, 1);

-- --------------------------------------------------------

--
-- Structure de la table `eleve`
--

DROP TABLE IF EXISTS `eleve`;
CREATE TABLE IF NOT EXISTS `eleve` (
  `eleveID` smallint(6) NOT NULL AUTO_INCREMENT,
  `nom` varchar(128) DEFAULT NULL,
  `prenom` varchar(128) DEFAULT NULL,
  `sexe` char(1) DEFAULT NULL,
  `classe` varchar(128) DEFAULT NULL,
  `idEquipe` smallint(6) NOT NULL,
  PRIMARY KEY (`eleveID`),
  KEY `FK_Eleve` (`idEquipe`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `enigme`
--

DROP TABLE IF EXISTS `enigme`;
CREATE TABLE IF NOT EXISTS `enigme` (
  `numEnigme` smallint(6) NOT NULL AUTO_INCREMENT,
  `libelle` varchar(128) DEFAULT NULL,
  `url` varchar(255) DEFAULT NULL,
  `flag` varchar(255) DEFAULT NULL,
  `difficulte` smallint(1) DEFAULT NULL,
  `nbPoints` bigint(4) DEFAULT NULL,
  `niveau` varchar(128) DEFAULT NULL,
  `thematique` varchar(128) DEFAULT NULL,
  `contenu` varchar(255) DEFAULT NULL,
  `auteur` varchar(128) DEFAULT NULL,
  `mailAuteur` varchar(128) DEFAULT NULL,
  `noCategorie` smallint(6) NOT NULL,
  PRIMARY KEY (`numEnigme`),
  KEY `FK_Enigme` (`noCategorie`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `enigme`
--

INSERT INTO `enigme` (`numEnigme`, `libelle`, `url`, `flag`, `difficulte`, `nbPoints`, `niveau`, `thematique`, `contenu`, `auteur`, `mailAuteur`, `noCategorie`) VALUES
(1, 'Enigme 1', 'http://challenge1.com', 'flag1', 1, 10, 'TNSI', 'Thematique 1', 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. \n', 'Auteur 1', 'auteur1@mail.com', 1),
(2, 'Enigme 2', 'http://challenge2.com', 'flag2', 2, 20, 'SIO', 'Thematique 2', 'Contenu 2', 'Auteur 2', 'auteur2@mail.com', 2),
(3, 'Enigme 3', 'http://challenge3.com', 'flag3', 1, 30, '1NSI', 'Thematique 3', 'Contenu 3', 'Auteur 3', 'auteur3.mail.com', 3),
(4, 'Enigme 4', 'http://challenge4.com', 'flag4', 2, 40, 'SIO', 'Thematique 4', 'Contenu 4', 'Auteur 4', 'auteur4.mail.com', 3),
(5, 'Enigme 5', 'http://challenge5.com', 'flag5', 1, 10, 'TNSI', 'Thematique 5', 'Contenu 5', 'Auteur 5', 'auteur5.mail.com', 1),
(6, 'Enigme 6', 'http://challenge6.com', '$2y$10$q1eGYPzkkhTvOrp7nmSRW.fLivTLuDYRNQPoGDoExWH2EfuRIIuUq', 2, 20, 'SIO', 'Thematique 6', 'Contenu 6', 'Auteur 6', 'auteur6.mail.com', 3),
(7, 'Enigme 7', 'http://challenge7.com', '$2y$10$Ts.YrxPc3ohmy4IbtimUfeStw6eEbjvn2tsDlLxq3VGsC6cA1Xuty', 1, 30, '1NSI', 'Thematique 7', 'Contenu 7', 'Auteur 7', 'auteur7.mail.com', 2),
(8, 'Enigme 8', 'http://challenge8.com', 'flag8', 2, 40, 'SIO', 'Thematique 8', 'Contenu 8', 'Auteur 8', 'auteur8.mail.com', 2),
(9, 'Enigme 9', 'http://challenge9.com', 'flag9', 1, 10, 'TNSI', 'Thematique 9', 'Contenu 9', 'Auteur 9', 'auteur9.mail.com', 4),
(10, 'Enigme 10', 'http://challenge10.com', 'flag10', 2, 20, 'SIO', 'Thematique 10', 'Contenu 10', 'Auteur 10', 'auteur10.mail.com', 1),
(11, 'Enigme 11', 'http://challenge11.com', 'flag11', 1, 30, '1NSI', 'Thematique 11', 'Contenu 11', 'Auteur 11', 'auteur11.mail.com', 4),
(12, 'Enigme 12', 'http://challenge12.com', 'flag12', 2, 40, 'TNSI', 'Thematique 12', 'Contenu 12', 'Auteur 12', 'auteur12.mail.com', 3),
(13, 'Enigme 13', 'http://challenge13.com', 'flag13', 1, 10, 'SIO', 'Thematique 13', 'Contenu 13', 'Auteur 13', 'auteur13.mail.com', 4),
(14, 'Enigme 14', 'http://challenge14.com', 'flag14', 2, 20, '1NSI', 'Thematique 14', 'Contenu 14', 'Auteur 14', 'auteur14.mail.com', 3),
(15, 'Enigme 15', 'http://challenge15.com', 'flag15', 1, 30, 'SIO', 'Thematique 15', 'Contenu 15', 'Auteur 15', 'auteur15.mail.com', 4),
(16, 'Enigme 16', 'http://challenge16.com', 'flag16', 2, 40, 'TNSI', 'Thematique 16', 'Contenu 16', 'Auteur 16', 'auteur16.mail.com', 2);

-- --------------------------------------------------------

--
-- Structure de la table `equipe`
--

DROP TABLE IF EXISTS `equipe`;
CREATE TABLE IF NOT EXISTS `equipe` (
  `equipeID` smallint(6) NOT NULL AUTO_INCREMENT,
  `libelle` varchar(128) DEFAULT NULL,
  `login` varchar(128) DEFAULT NULL,
  `motDePasse` varchar(128) DEFAULT NULL,
  `scoreTotal` int(4) DEFAULT NULL,
  `visiteur` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`equipeID`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `equipe`
--

INSERT INTO `equipe` (`equipeID`, `libelle`, `login`, `motDePasse`, `scoreTotal`, `visiteur`) VALUES
(1, 'Team 974', 'team974', '4f21c5e9b6b324780cbc13fdcc07dbde038361dc38540a7435e80bc0c15d6a08e944655dbc3a9033ec001d1ee5ee2e92e7ecae87246b36812c737ecf9e25b9b2', 40, 0),
(2, 'Team Tryhard', 'teamTH', 'ba3253876aed6bc22d4a6ff53d8406c6ad864195ed144ab5c87621b6c233b548baeae6956df346ec8c17f5ea10f35ee3cbc514797ed7ddd3145464e2a0bab413', 60, 1),
(3, 'Team Forest', 'teamforest', 'df6b9fb15cfdbb7527be5a8a6e39f39e572c8ddb943fbc79a943438e9d3d85ebfc2ccf9e0eccd9346026c0b6876e0e01556fe56f135582c05fbdbb505d46755a', 0, 0),
(4, 'Team 42', 'team42', '39ca7ce9ecc69f696bf7d20bb23dd1521b641f806cc7a6b724aaa6cdbffb3a023ff98ae73225156b2c6c9ceddbfc16f5453e8fa49fc10e5d96a3885546a46ef4', 0, 1);



-- --------------------------------------------------------

--
-- Structure de la table `parametres`
--

DROP TABLE IF EXISTS `parametres`;
CREATE TABLE IF NOT EXISTS `parametres` (
  `paramID` smallint(6) NOT NULL AUTO_INCREMENT,
  `nomEvenement` varchar(128) DEFAULT NULL,
  `nomEtablissement` varchar(128) DEFAULT NULL,
  PRIMARY KEY (`paramID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `session`
--

DROP TABLE IF EXISTS `session`;
CREATE TABLE IF NOT EXISTS `session` (
  `numSession` smallint(6) NOT NULL,
  `dateDebut` datetime DEFAULT NULL,
  `dateFin` datetime DEFAULT NULL,
  `idEquipe` smallint(6) NOT NULL,
  PRIMARY KEY (`numSession`,`idEquipe`) USING BTREE,
  KEY `FK_Session` (`idEquipe`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `session`
--

INSERT INTO `session` (`numSession`, `dateDebut`, `dateFin`, `idEquipe`) VALUES
(1, '2022-12-18 15:43:16', '2022-12-18 23:00:00', 1),
(1, '2022-12-18 15:43:16', '2022-12-18 23:00:00', 2);

-- --------------------------------------------------------

--
-- Structure de la table `validation`
--

DROP TABLE IF EXISTS `validation`;
CREATE TABLE IF NOT EXISTS `validation` (
  `idEquipe` smallint(6) NOT NULL,
  `noEnigme` smallint(6) NOT NULL,
  PRIMARY KEY (`idEquipe`,`noEnigme`),
  KEY `FK_Validation_Enigme` (`noEnigme`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `validation`
--

INSERT INTO `validation` (`idEquipe`, `noEnigme`) VALUES
(1, 6);

-- --------------------------------------------------------

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `concerner`
--
ALTER TABLE `concerner`
  ADD CONSTRAINT `FK_Concerner_Enigme` FOREIGN KEY (`noEnigme`) REFERENCES `enigme` (`numEnigme`),
  ADD CONSTRAINT `FK_Concerner_Session` FOREIGN KEY (`noSession`) REFERENCES `session` (`numSession`);

--
-- Contraintes pour la table `eleve`
--
ALTER TABLE `eleve`
  ADD CONSTRAINT `FK_Eleve` FOREIGN KEY (`idEquipe`) REFERENCES `equipe` (`equipeID`);

--
-- Contraintes pour la table `enigme`
--
ALTER TABLE `enigme`
  ADD CONSTRAINT `FK_Enigme` FOREIGN KEY (`noCategorie`) REFERENCES `categorie` (`numCateg`);

--
-- Contraintes pour la table `session`
--
ALTER TABLE `session`
  ADD CONSTRAINT `FK_Session` FOREIGN KEY (`idEquipe`) REFERENCES `equipe` (`equipeID`);

--
-- Contraintes pour la table `validation`
--
ALTER TABLE `validation`
  ADD CONSTRAINT `FK_Validation_Enigme` FOREIGN KEY (`noEnigme`) REFERENCES `enigme` (`numEnigme`),
  ADD CONSTRAINT `FK_Validation_Equipe` FOREIGN KEY (`idEquipe`) REFERENCES `equipe` (`equipeID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
