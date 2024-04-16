-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : mar. 16 avr. 2024 à 15:38
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

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `piste`
--
ALTER TABLE `piste`
  ADD PRIMARY KEY (`ppiste`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `piste`
--
ALTER TABLE `piste`
  MODIFY `ppiste` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
