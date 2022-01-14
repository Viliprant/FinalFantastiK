-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : db
-- Généré le : ven. 14 jan. 2022 à 16:44
-- Version du serveur : 8.0.27
-- Version de PHP : 7.4.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `finalfantastik`
--

-- --------------------------------------------------------

--
-- Structure de la table `karacter`
--

CREATE TABLE `karacter` (
  `id` int NOT NULL,
  `class` varchar(256) NOT NULL,
  `label` varchar(256) NOT NULL,
  `id_karacter_kategory` int NOT NULL,
  `life_point` int NOT NULL,
  `armor` int NOT NULL,
  `strength` int NOT NULL,
  `speed` int NOT NULL,
  `agility` int NOT NULL,
  `faith` int NOT NULL,
  `magic` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Déchargement des données de la table `karacter`
--

INSERT INTO `karacter` (`id`, `class`, `label`, `id_karacter_kategory`, `life_point`, `armor`, `strength`, `speed`, `agility`, `faith`, `magic`) VALUES
(1, 'Paladin', 'Paladin', 1, 30, 5, 6, 3, 0, 6, 0),
(2, 'Wizard', 'Sorcier', 1, 20, 3, 3, 6, 0, 0, 15),
(3, 'Thief', 'Voleur', 1, 20, 4, 5, 7, 15, 0, 0),
(4, 'Monster', 'Robot Danseur', 2, 12, 6, 4, 3, 0, 0, 0),
(5, 'Monster', 'OKlaf', 3, 45, 10, 8, 0, 0, 0, 2),
(6, 'Monster', 'Medusa', 2, 18, 5, 5, 5, 2, 0, 0),
(7, 'Monster', 'Kobelin', 2, 22, 2, 4, 2, 3, 0, 0),
(8, 'Monster', 'SKelette', 3, 50, 4, 6, 6, 0, 0, 8);

-- --------------------------------------------------------

--
-- Structure de la table `karacter_kategory`
--

CREATE TABLE `karacter_kategory` (
  `id` int NOT NULL,
  `label` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

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

CREATE TABLE `karacter_skill` (
  `id` int NOT NULL,
  `id_karacter` int NOT NULL,
  `id_skill` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

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
(18, 6, 20),
(19, 7, 21),
(20, 7, 22),
(21, 7, 23),
(22, 8, 24),
(23, 8, 25),
(24, 8, 26);

-- --------------------------------------------------------

--
-- Structure de la table `skill`
--

CREATE TABLE `skill` (
  `id` int NOT NULL,
  `label` varchar(256) NOT NULL,
  `is_multi_target` tinyint(1) NOT NULL DEFAULT '0',
  `cool_down` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

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
(20, 'Gangrene ChoKante', 0, 4),
(21, 'Korps à Korps', 0, 1),
(22, 'Kourdin assomant', 0, 2),
(23, 'Kreusement funeste', 1, 4),
(24, 'Kontrôle psychique', 0, 1),
(25, 'Konvocation des morts', 0, 2),
(26, 'KataKlysme foudroyant', 1, 5);

-- --------------------------------------------------------

--
-- Structure de la table `skill_type`
--

CREATE TABLE `skill_type` (
  `id` int NOT NULL,
  `id_skill` int NOT NULL,
  `id_type` int NOT NULL,
  `multiplier` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Déchargement des données de la table `skill_type`
--

INSERT INTO `skill_type` (`id`, `id_skill`, `id_type`, `multiplier`) VALUES
(1, 1, 1, 0.5),
(2, 1, 3, 1.5),
(3, 2, 3, 2),
(4, 3, 1, 1),
(5, 3, 3, 1),
(6, 4, 2, 2.2),
(7, 5, 1, 4),
(8, 6, 1, 0.5),
(9, 6, 2, 2),
(10, 7, 4, 3),
(11, 8, 1, 1),
(12, 8, 4, 0.8),
(13, 9, 4, 1.5),
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
(25, 20, 4, 1.5),
(26, 21, 1, 1.5),
(27, 22, 1, 1.5),
(28, 22, 4, 1.5),
(29, 23, 1, 2),
(30, 23, 4, 2.5),
(31, 24, 1, 1),
(32, 24, 2, 0.5),
(33, 25, 2, 1.5),
(34, 26, 2, 1.8);

-- --------------------------------------------------------

--
-- Structure de la table `type`
--

CREATE TABLE `type` (
  `id` int NOT NULL,
  `label` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Déchargement des données de la table `type`
--

INSERT INTO `type` (`id`, `label`) VALUES
(1, 'strength'),
(2, 'magic'),
(3, 'faith'),
(4, 'agility');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `karacter`
--
ALTER TABLE `karacter`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `karacter_kategory`
--
ALTER TABLE `karacter_kategory`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `karacter_skill`
--
ALTER TABLE `karacter_skill`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `skill`
--
ALTER TABLE `skill`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `skill_type`
--
ALTER TABLE `skill_type`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `type`
--
ALTER TABLE `type`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `karacter`
--
ALTER TABLE `karacter`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT pour la table `karacter_kategory`
--
ALTER TABLE `karacter_kategory`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `karacter_skill`
--
ALTER TABLE `karacter_skill`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT pour la table `skill`
--
ALTER TABLE `skill`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT pour la table `skill_type`
--
ALTER TABLE `skill_type`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT pour la table `type`
--
ALTER TABLE `type`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
