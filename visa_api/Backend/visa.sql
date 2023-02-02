-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : jeu. 02 fév. 2023 à 03:49
-- Version du serveur : 10.4.22-MariaDB
-- Version de PHP : 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `visa_api`
--

-- --------------------------------------------------------

--
-- Structure de la table `visa`
--

CREATE TABLE `visa` (
  `id` int(11) NOT NULL,
  `nom` varchar(30) NOT NULL,
  `prenom` varchar(30) NOT NULL,
  `date_ns` date NOT NULL,
  `nationalite` varchar(30) NOT NULL,
  `situation` varchar(30) NOT NULL,
  `adresse` varchar(30) NOT NULL,
  `type_visa` varchar(30) NOT NULL,
  `date_depart` date NOT NULL,
  `date_arriver` date NOT NULL,
  `num_document` int(11) NOT NULL,
  `type_document` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `visa`
--

INSERT INTO `visa` (`id`, `nom`, `prenom`, `date_ns`, `nationalite`, `situation`, `adresse`, `type_visa`, `date_depart`, `date_arriver`, `num_document`, `type_document`) VALUES
(5, 'belhaj', 'najoua', '2001-10-23', 'marocaine', 'celibataire', 'safi', 'stage', '2023-05-05', '2023-07-05', 987654321, 'visa'),
(6, 'loyam', 'hind', '1992-04-13', 'marocaine', 'mariée', 'rabat', 'voyage', '2023-01-01', '2023-11-15', 54321, 'visa1');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `visa`
--
ALTER TABLE `visa`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `visa`
--
ALTER TABLE `visa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
