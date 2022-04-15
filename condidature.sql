-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : ven. 15 avr. 2022 à 15:45
-- Version du serveur : 10.4.22-MariaDB
-- Version de PHP : 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `condidature`
--

-- --------------------------------------------------------

--
-- Structure de la table `files`
--

CREATE TABLE `files` (
  `id` int(125) NOT NULL,
  `cin` text NOT NULL,
  `name` text NOT NULL,
  `size` text NOT NULL,
  `downloads` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `files`
--

INSERT INTO `files` (`id`, `cin`, `name`, `size`, `downloads`) VALUES
(2, '', 'test.zip', '137', '0'),
(3, '', 'test.zip', '137', '0'),
(4, '', 'test.zip', '137', '0'),
(5, '', 'test.zip', '137', '0'),
(6, '', 'test.zip', '137', '0'),
(7, '', 'test.zip', '137', '0');

-- --------------------------------------------------------

--
-- Structure de la table `fonction`
--

CREATE TABLE `fonction` (
  `id` int(11) NOT NULL,
  `code` varchar(50) NOT NULL,
  `nom` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `fonction`
--

INSERT INTO `fonction` (`id`, `code`, `nom`) VALUES
(1, 'gc', 'genie_logiciel'),
(2, 'f12345', 'developpement_web'),
(3, 'ab11', 'management'),
(4, 'isic', 'reseau_informatique');

-- --------------------------------------------------------

--
-- Structure de la table `professeurs`
--

CREATE TABLE `professeurs` (
  `id` int(11) NOT NULL,
  `nom` varchar(50) NOT NULL,
  `prenom` varchar(50) NOT NULL,
  `photo` text NOT NULL,
  `cin` varchar(50) NOT NULL,
  `n_drp` varchar(50) NOT NULL,
  `date_naissance` date NOT NULL,
  `date_recrutement` date NOT NULL,
  `email` text NOT NULL,
  `telephone` text NOT NULL,
  `specialite` int(255) NOT NULL,
  `prof_a_ensa` varchar(6) NOT NULL,
  `structure` text NOT NULL,
  `directeur` text NOT NULL,
  `dossier_scientifique` text NOT NULL,
  `dossier_pedagogique` text NOT NULL,
  `dossier_administratif` text NOT NULL,
  `point` varchar(14) NOT NULL DEFAULT 'prof',
  `password` varchar(500) NOT NULL,
  `attente` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `professeurs`
--

INSERT INTO `professeurs` (`id`, `nom`, `prenom`, `photo`, `cin`, `n_drp`, `date_naissance`, `date_recrutement`, `email`, `telephone`, `specialite`, `prof_a_ensa`, `structure`, `directeur`, `dossier_scientifique`, `dossier_pedagogique`, `dossier_administratif`, `point`, `password`, `attente`) VALUES
(1, 'benkamoun', 'youssef', '83e7c2f0b5f397ac456ad7d72d2efd5f.jpg', 'bw20165', '11mm', '2022-04-11', '2022-04-11', 'youssefbenkamoun01@gmail.com', '0687709037', 1, 'true', 'jjjjjjjjjjj', 'jjjjjjjjjjjjjjjj', '', '', '', 'admin', '276b6c4692e78d4799c12ada515bc3e4', 'accepter'),
(2, 'xname', 'yPrenom', 'c81e728d9d4c2f636f067f89cc14862c.jpg', '2', '2', '1993-02-03', '2022-04-26', 'aaaae@gmail.com', '0687709044', 4, 'true', 'ssd', 'ana', 'test.zip', 'test.zip', 'test.zip', 'prof', 'd27ac55b60e6f1d7b3e0094d597cbdbb', 'refuser'),
(36, 'benkamoun', 'youssef', '83e7c2f0b5f397ac456ad7d72d2efd5f.jpg', 'bw20165', '11mm', '2022-04-11', '2022-04-11', 'bnhvh1v@kkk.com', '0687709037', 1, 'true', 'jjjjjjjjjjj', 'jjjjjjjjjjjjjjjj', 'ex5.zip', 'ex5.zip', 'ex5.zip', 'prof', 'c790f4785e910a6b833693857c65f7a1', 'en_attente'),
(69, 'xName', 'xPrenom', '403fa9032a616c7dd47590e548b7fe17.jpg', 'aa33', 'f1345', '2000-06-29', '2022-04-30', 'ysfbenkamoun@gmail.com', '065548210215', 3, 'true', 'laboratoire de technologie de l\'information', 'Mr Hassan Ouahmane', 'test.zip', 'test.zip', 'test.zip', 'prof', 'ef0917ea498b1665ad6c701057155abe', 'accepter');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `files`
--
ALTER TABLE `files`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `fonction`
--
ALTER TABLE `fonction`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `professeurs`
--
ALTER TABLE `professeurs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `specialite_ibfk_1` (`specialite`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `files`
--
ALTER TABLE `files`
  MODIFY `id` int(125) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT pour la table `fonction`
--
ALTER TABLE `fonction`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `professeurs`
--
ALTER TABLE `professeurs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `professeurs`
--
ALTER TABLE `professeurs`
  ADD CONSTRAINT `specialite_ibfk_1` FOREIGN KEY (`specialite`) REFERENCES `fonction` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
