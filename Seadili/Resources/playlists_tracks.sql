-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Client :  localhost
-- Généré le :  Sam 03 Janvier 2015 à 15:06
-- Version du serveur :  5.6.21
-- Version de PHP :  5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `seadili-db`
--

-- --------------------------------------------------------

--
-- Structure de la table `playlists_tracks`
--

CREATE TABLE IF NOT EXISTS `playlists_tracks` (
  `playlist_id` int(11) NOT NULL,
  `position` int(11) NOT NULL,
  `track_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `playlists_tracks`
--

INSERT INTO `playlists_tracks` (`playlist_id`, `position`, `track_id`) VALUES
(8, 1, 2),
(8, 3, 6),
(8, 2, 15),
(2, 1, 16),
(9, 3, 17),
(9, 1, 22),
(9, 2, 22),
(3, 1, 26),
(1, 8, 34),
(4, 1, 61),
(4, 3, 83),
(9, 4, 83),
(2, 2, 89),
(2, 3, 93),
(1, 6, 109),
(3, 3, 111),
(1, 2, 115),
(1, 7, 136),
(1, 5, 138),
(4, 2, 151),
(9, 5, 151),
(1, 1, 166),
(1, 3, 168),
(1, 4, 187),
(3, 2, 190);

--
-- Index pour les tables exportées
--

--
-- Index pour la table `playlists_tracks`
--
ALTER TABLE `playlists_tracks`
 ADD PRIMARY KEY (`playlist_id`,`position`), ADD KEY `playlist_id` (`playlist_id`), ADD KEY `track_id` (`track_id`);

--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `playlists_tracks`
--
ALTER TABLE `playlists_tracks`
ADD CONSTRAINT `playlists_tracks_ibfk_1` FOREIGN KEY (`playlist_id`) REFERENCES `playlists` (`playlist_id`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `playlists_tracks_ibfk_2` FOREIGN KEY (`track_id`) REFERENCES `tracks` (`track_id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
