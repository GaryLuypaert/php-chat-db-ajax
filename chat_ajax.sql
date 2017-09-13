-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Client :  localhost:80
-- Généré le :  Mar 12 Septembre 2017 à 16:39
-- Version du serveur :  5.7.19-0ubuntu0.16.04.1
-- Version de PHP :  7.0.22-0ubuntu0.16.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `chat_ajax`
--

-- --------------------------------------------------------

--
-- Structure de la table `messages`
--

CREATE TABLE `messages` (
  `id` int(11) NOT NULL,
  `message` varchar(500) NOT NULL,
  `date_send` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `sender` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `messages`
--

INSERT INTO `messages` (`id`, `message`, `date_send`, `sender`) VALUES
(1, 'regzsrsreg', '2017-09-12 10:47:22', 1),
(2, 'ergresg', '2017-09-12 10:47:31', 5),
(3, 'ergresgdgd', '2017-09-12 10:49:43', 5),
(4, 'test', '2017-09-12 11:05:35', 1),
(5, 'test', '2017-09-12 11:20:29', 1),
(6, 'Salut!', '2017-09-12 11:23:30', 5),
(7, 'Salut', '2017-09-12 12:14:13', 1),
(8, 'Hello !', '2017-09-12 13:33:15', 5),
(9, 'Bonjour!', '2017-09-12 14:30:36', 5),
(10, 'Yo', '2017-09-12 15:07:15', 5),
(11, 'Adriaaaaaaaan', '2017-09-12 15:15:31', 5),
(12, 'Teeeeest', '2017-09-12 15:17:08', 5),
(13, 'aaaa', '2017-09-12 16:22:21', 1),
(14, 'aaaabbbb', '2017-09-12 16:22:27', 1),
(15, 'aaaabbbbccc', '2017-09-12 16:22:28', 1);

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`) VALUES
(1, 'admin', 'admin@me.com', 'pass'),
(2, '', 'kjpok', 'k,,'),
(3, 'j', 'kjpok', 'k,,'),
(4, 'joijoijoij', 'oijoijoijoijoi', 'oijoijoijoijoi'),
(5, 'test', 'test@gmail.com', 'test');

--
-- Index pour les tables exportées
--

--
-- Index pour la table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sender` (`sender`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `messages`
--
ALTER TABLE `messages`
  ADD CONSTRAINT `messages_ibfk_1` FOREIGN KEY (`sender`) REFERENCES `users` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
