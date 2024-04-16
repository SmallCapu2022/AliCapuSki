-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : mar. 16 avr. 2024 à 17:44
-- Version du serveur : 10.4.32-MariaDB
-- Version de PHP : 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `ski`
--

-- --------------------------------------------------------

--
-- Structure de la table `piste`
--

CREATE TABLE `piste` (
  `ppiste` int(11) NOT NULL,
  `nom` text NOT NULL,
  `couleur` text NOT NULL,
  `etat` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `piste`
--

INSERT INTO `piste` (`ppiste`, `nom`, `couleur`, `etat`) VALUES
(1, 'La Monthery', 'Verte', 'ouvert'),
(2, 'Le Forest', 'Verte', 'ouvert'),
(3, 'Bouticari Vert', 'Verte', 'ouvert'),
(4, 'Jonction Basse', 'Verte', 'ouvert'),
(5, 'Les Casses', 'Bleue', 'ouvert'),
(6, 'Les Neiges', 'Bleue', 'ouvert'),
(7, 'Les Atodos', 'Bleue', 'ouvert'),
(8, 'Les Jockeys', 'Rouge', 'ouvert'),
(9, 'Le Chamois', 'Rouge', 'ouvert'),
(10, 'L’Écureuil', 'Rouge', 'ouvert'),
(11, 'Le Tétras', 'Noire', 'ouvert'),
(12, 'Le Lièvre', 'Noire', 'ouvert'),
(13, 'As du Chamois', 'Bleue', 'ouvert'),
(14, 'Les Lampions', 'Bleue', 'ouvert'),
(15, 'Le Gourq', 'Bleue', 'ouvert'),
(16, 'Les Douzeaux', 'Bleue', 'ouvert'),
(17, 'L’Arbre', 'Bleue', 'ouvert'),
(18, 'Bouticari Bleu', 'Bleue', 'ouvert'),
(19, 'L’Inglin', 'Bleue', 'ouvert'),
(20, 'Le Grand Serre', 'Bleue', 'ouvert'),
(21, 'La Gérabio', 'Bleue', 'ouvert'),
(22, 'La Mandarine', 'Rouge', 'ouvert'),
(23, 'Pré Méan', 'Rouge', 'ouvert'),
(24, 'L’Ousselat', 'Rouge', 'ouvert'),
(25, 'Barrigart', 'Rouge', 'ouvert'),
(37, 'La Rouge Bouticari', 'Rouge', 'ouvert'),
(38, 'Les Sagnières', 'Rouge', 'ouvert'),
(39, 'La Draye', 'Rouge', 'ouvert'),
(51, 'Le Gourq', 'Bleue', 'ouvert'),
(52, 'Les Douzeaux', 'Bleue', 'ouvert'),
(53, 'L’Arbre', 'Bleue', 'ouvert'),
(54, 'Bouticari Bleu', 'Bleue', 'ouvert'),
(55, 'L’Inglin', 'Bleue', 'ouvert'),
(56, 'Le Grand Serre', 'Bleue', 'ouvert'),
(57, 'La Gérabio', 'Bleue', 'ouvert'),
(58, 'Les Jockeys', 'Rouge', 'ouvert'),
(59, 'Le Chamois', 'Rouge', 'ouvert'),
(60, 'L’Écureuil', 'Rouge', 'ouvert'),
(61, 'La Mandarine', 'Rouge', 'ouvert'),
(62, 'Pré Méan', 'Rouge', 'ouvert'),
(63, 'L’Ousselat', 'Rouge', 'ouvert'),
(64, 'Barrigart', 'Rouge', 'ouvert'),
(65, 'La Rouge Bouticari', 'Rouge', 'ouvert'),
(66, 'Les Sagnières', 'Rouge', 'ouvert'),
(67, 'La Draye', 'Rouge', 'ouvert'),
(68, 'Le Tétras', 'Noire', 'ouvert'),
(69, 'Le Lièvre', 'Noire', 'ouvert');

-- --------------------------------------------------------

--
-- Structure de la table `remontee`
--

CREATE TABLE `remontee` (
  `premontee` int(11) NOT NULL,
  `nom` varchar(255) DEFAULT NULL,
  `etat` varchar(50) DEFAULT NULL,
  `piste_ppiste` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `remontee`
--

INSERT INTO `remontee` (`premontee`, `nom`, `etat`, `piste_ppiste`) VALUES
(1, 'La Troïka', 'ouvert', NULL),
(2, 'Les Torres', 'ouvert', NULL),
(3, 'Les Amoureux', 'ouvert', NULL),
(4, 'La Burge', 'ouvert', NULL),
(5, 'Le Moulin', 'ouvert', NULL),
(6, 'Le Beauregard', 'ouvert', NULL),
(7, 'Ste Marie Madeleine', 'ouvert', NULL),
(8, 'Les Cassettes', 'ouvert', NULL),
(9, 'Le Grand Serre', 'ouvert', NULL),
(10, 'Bouticari', 'ouvert', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

CREATE TABLE `utilisateur` (
  `id` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `identifiant` varchar(50) NOT NULL,
  `motdepasse` varchar(255) NOT NULL,
  `commentaire` text NOT NULL,
  `piste_id` int(11) DEFAULT NULL,
  `remontee_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `utilisateur`
--

INSERT INTO `utilisateur` (`id`, `nom`, `identifiant`, `motdepasse`, `commentaire`, `piste_id`, `remontee_id`) VALUES
(1, '', '', '', '', NULL, NULL),
(4, 'Capu', 'TinyCapu', 'piloupilou', '', NULL, NULL);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `piste`
--
ALTER TABLE `piste`
  ADD PRIMARY KEY (`ppiste`);

--
-- Index pour la table `remontee`
--
ALTER TABLE `remontee`
  ADD PRIMARY KEY (`premontee`),
  ADD KEY `piste_ppiste` (`piste_ppiste`);

--
-- Index pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `identifiant` (`identifiant`),
  ADD KEY `piste_id` (`piste_id`),
  ADD KEY `remontee_id` (`remontee_id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `piste`
--
ALTER TABLE `piste`
  MODIFY `ppiste` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;

--
-- AUTO_INCREMENT pour la table `remontee`
--
ALTER TABLE `remontee`
  MODIFY `premontee` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `remontee`
--
ALTER TABLE `remontee`
  ADD CONSTRAINT `remontee_ibfk_1` FOREIGN KEY (`piste_ppiste`) REFERENCES `piste` (`ppiste`);

--
-- Contraintes pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD CONSTRAINT `utilisateur_ibfk_1` FOREIGN KEY (`piste_id`) REFERENCES `piste` (`ppiste`),
  ADD CONSTRAINT `utilisateur_ibfk_2` FOREIGN KEY (`remontee_id`) REFERENCES `remontee` (`premontee`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
