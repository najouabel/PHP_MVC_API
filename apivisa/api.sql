-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : dim. 02 avr. 2023 à 16:07
-- Version du serveur : 10.4.27-MariaDB
-- Version de PHP : 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `api`
--

-- --------------------------------------------------------

--
-- Structure de la table `rendezvous`
--

CREATE TABLE `rendezvous` (
  `id` int(11) NOT NULL,
  `horaire` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `typeVisa` varchar(255) NOT NULL,
  `typeDoc` varchar(30) NOT NULL,
  `depart` date DEFAULT NULL,
  `arrive` date DEFAULT NULL,
  `reference` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `rendezvous`
--

INSERT INTO `rendezvous` (`id`, `horaire`, `date`, `typeVisa`, `typeDoc`, `depart`, `arrive`, `reference`) VALUES
(38, '14:00-15-00', '2023-04-12', 'Visa de travail', 'passport', '2023-04-08', '2023-04-14', 'hin91050625475'),
(32, '15:00-16-00', '2023-04-12', 'Visa étudiant', 'passport', '2023-04-14', '2023-04-16', 'belhaj31175597818');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `reference` varchar(55) NOT NULL,
  `firstname` varchar(20) NOT NULL,
  `lastname` varchar(20) NOT NULL,
  `nationality` varchar(20) NOT NULL,
  `address` varchar(55) NOT NULL,
  `situation` varchar(55) NOT NULL,
  `naissance` date DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`reference`, `firstname`, `lastname`, `nationality`, `address`, `situation`, `naissance`) VALUES
('6546414631', '', '', '', '', '', '0000-00-00'),
('belhaj51433462734', 'nada', 'belhaj', 'marocaine', 'sdf@gmail.com', 'single', '2023-04-15'),
('42115179242', '', '', '', '', '', '0000-00-00'),
('2310966150', '', '', '', '', '', '0000-00-00'),
('belhaj31175597818', 'najoua', 'belhaj', 'marocaine', 'erer@gmail.com', 'single', '2023-10-23'),
('1974099125', '', '', '', '', '', '0000-00-00'),
('mar6378733975', 'mar', 'mar', 'marocaine', 'sdf@gmail.com', 'married', '2023-03-02'),
('belhaj71188457737', 'hind', 'belhaj', 'marocaine', 'uj@gmail.com', 'single', '2023-04-22'),
('8865837618', '', '', '', '', '', '0000-00-00'),
('hin91050625475', 'hind', 'hin', 'marocaine', 'uj@gmail.com', 'single', '2023-04-01');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `rendezvous`
--
ALTER TABLE `rendezvous`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`reference`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `rendezvous`
--
ALTER TABLE `rendezvous`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
