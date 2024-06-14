-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:8889
-- Généré le : ven. 14 juin 2024 à 13:22
-- Version du serveur : 5.7.39
-- Version de PHP : 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `bloc3`
--

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `type` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id`, `username`, `email`, `type`, `password`) VALUES
(1, 'cesi', 'cesi@cesi.fr', 'admin', '110812f67fa1e1f0117f6f3d70241c1a42a7b07711a93c2477cc516d9042f9db'),
(3, 'mathis', 'mathis@cesi.fr', 'user', '5e6081a2793de9ab45c5f60b4da75aabebfc7cab830afc72a7d0394ab3062234'),
(4, 'ewenn', 'ewenn@cesi.fr', 'user', '5e6081a2793de9ab45c5f60b4da75aabebfc7cab830afc72a7d0394ab3062234'),
(5, 'noe', 'noe@cesi.fr', 'user', '5e6081a2793de9ab45c5f60b4da75aabebfc7cab830afc72a7d0394ab3062234'),
(6, 'manu', 'manu@cesi.fr', 'user', '5e6081a2793de9ab45c5f60b4da75aabebfc7cab830afc72a7d0394ab3062234'),
(7, 'vincent', 'vincent@cesi.fr', 'user', '5e6081a2793de9ab45c5f60b4da75aabebfc7cab830afc72a7d0394ab3062234'),
(8, 'bathelemy', 'barthelemy@cesi.fr', 'user', '5e6081a2793de9ab45c5f60b4da75aabebfc7cab830afc72a7d0394ab3062234'),
(10, 'terry', 'terry@cesi.fr', 'user', '5e6081a2793de9ab45c5f60b4da75aabebfc7cab830afc72a7d0394ab3062234'),
(11, 'alexandre', 'alexandre@cesi.fr', 'user', '5e6081a2793de9ab45c5f60b4da75aabebfc7cab830afc72a7d0394ab3062234'),
(12, 'charly', 'charly@cesi.fr', 'user', '5e6081a2793de9ab45c5f60b4da75aabebfc7cab830afc72a7d0394ab3062234');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
