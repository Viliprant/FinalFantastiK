-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : jeu. 13 jan. 2022 à 14:45
-- Version du serveur :  5.7.31
-- Version de PHP : 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `final_fantastik`
--

-- --------------------------------------------------------

--
-- Structure de la table `karacter`
--

DROP TABLE IF EXISTS `karacter`;
CREATE TABLE IF NOT EXISTS `karacter` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `class` varchar(256) NOT NULL,
  `label` varchar(256) NOT NULL,
  `id_karacter_kategory` int(11) NOT NULL,
  `life_point` int(11) NOT NULL,
  `armor` int(11) NOT NULL,
  `strength` int(11) NOT NULL,
  `speed` int(11) NOT NULL,
  `agility` int(11) NOT NULL,
  `faith` int(11) NOT NULL,
  `magic` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `karacter`
--

INSERT INTO `karacter` (`id`, `class`, `label`, `id_karacter_kategory`, `life_point`, `armor`, `strength`, `speed`, `agility`, `faith`, `magic`) VALUES
(1, 'Paladin', 'Paladin', 1, 25, 4, 6, 3, 0, 4, 0),
(2, 'Wizard', 'Sorcier', 1, 15, 1, 2, 5, 0, 0, 6),
(3, 'Thief', 'Voleur', 1, 20, 3, 3, 7, 7, 0, 0),
(4, 'Monster', 'Robot Danseur', 2, 12, 6, 4, 3, 0, 0, 0),
(5, 'Monster', 'OKlaf', 3, 45, 10, 8, 0, 0, 0, 2),
(6, 'Monster', 'Medusa', 2, 18, 5, 5, 5, 2, 0, 0);

-- --------------------------------------------------------

--
-- Structure de la table `karacter_kategory`
--

DROP TABLE IF EXISTS `karacter_kategory`;
CREATE TABLE IF NOT EXISTS `karacter_kategory` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `label` varchar(256) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `karacter_kategory`
--

INSERT INTO `karacter_kategory` (`id`, `label`) VALUES
(1, 'Player'),
(2, 'Monster'),
(3, 'Boss');

-- --------------------------------------------------------

--
-- Structure de la table `karacter_skill`
--

DROP TABLE IF EXISTS `karacter_skill`;
CREATE TABLE IF NOT EXISTS `karacter_skill` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_karacter` int(11) NOT NULL,
  `id_skill` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `karacter_skill`
--

INSERT INTO `karacter_skill` (`id`, `id_karacter`, `id_skill`) VALUES
(1, 1, 1),
(2, 1, 2),
(3, 1, 3),
(4, 2, 4),
(5, 2, 5),
(6, 2, 6),
(7, 3, 7),
(8, 3, 8),
(9, 3, 9),
(10, 4, 10),
(11, 4, 11),
(12, 4, 12),
(13, 5, 15),
(14, 5, 16),
(15, 5, 17),
(16, 6, 18),
(17, 6, 19),
(18, 6, 20);

-- --------------------------------------------------------

--
-- Structure de la table `skill`
--

DROP TABLE IF EXISTS `skill`;
CREATE TABLE IF NOT EXISTS `skill` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `label` varchar(256) NOT NULL,
  `is_multi_target` tinyint(1) NOT NULL DEFAULT '0',
  `cool_down` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `skill`
--

INSERT INTO `skill` (`id`, `label`, `is_multi_target`, `cool_down`) VALUES
(1, 'PurKatoire', 1, 3),
(2, 'Krâce', 0, 1),
(3, 'Poing saKré', 0, 0),
(4, 'SuffoKation de Kroup', 1, 4),
(5, 'Armée du Roi Koule', 1, 2),
(6, 'Brise-Koeur', 0, 1),
(7, 'TraK spectrale', 0, 3),
(8, 'Dague par riKochet', 1, 2),
(9, 'Kasse-Kouille', 0, 1),
(10, 'TwerK', 0, 1),
(11, 'DisKo', 0, 2),
(12, 'TiK-ToK', 1, 4),
(15, 'KarGlass', 0, 2),
(16, 'Karesse givrée', 0, 1),
(17, 'Pieux de stalaKtite', 1, 4),
(18, 'PutréfaKtion nocive', 0, 2),
(19, 'ReKard pétrifiant', 0, 1),
(20, 'Gangrene ChoKante', 0, 4);

-- --------------------------------------------------------

--
-- Structure de la table `skill_type`
--

DROP TABLE IF EXISTS `skill_type`;
CREATE TABLE IF NOT EXISTS `skill_type` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_skill` int(11) NOT NULL,
  `id_type` int(11) NOT NULL,
  `multiplier` float NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `skill_type`
--

INSERT INTO `skill_type` (`id`, `id_skill`, `id_type`, `multiplier`) VALUES
(1, 1, 1, 0.5),
(2, 1, 3, 1.3),
(3, 2, 3, 1.2),
(4, 3, 1, 1),
(5, 3, 3, 0.5),
(6, 4, 2, 2.2),
(7, 5, 1, 3),
(8, 6, 1, 1),
(9, 6, 2, 0.4),
(10, 7, 4, 3),
(11, 8, 1, 1),
(12, 8, 4, 0.8),
(13, 9, 1, 1.5),
(14, 10, 1, 1),
(15, 11, 1, 1.5),
(16, 12, 1, 1.8),
(17, 15, 2, 3),
(18, 16, 2, 1.3),
(19, 16, 1, 1.2),
(20, 17, 2, 5),
(21, 18, 4, 1),
(22, 18, 1, 0.5),
(23, 19, 1, 1.4),
(24, 20, 1, 1.5),
(25, 20, 4, 1.5);

-- --------------------------------------------------------

--
-- Structure de la table `type`
--

DROP TABLE IF EXISTS `type`;
CREATE TABLE IF NOT EXISTS `type` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `label` varchar(256) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `type`
--

INSERT INTO `type` (`id`, `label`) VALUES
(1, 'strength'),
(2, 'magic'),
(3, 'faith'),
(4, 'agility');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
