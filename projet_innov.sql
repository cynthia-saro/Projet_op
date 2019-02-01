-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  ven. 01 fév. 2019 à 09:15
-- Version du serveur :  5.7.23
-- Version de PHP :  7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `projet_innov`
--

-- --------------------------------------------------------

--
-- Structure de la table `animals`
--

DROP TABLE IF EXISTS `animals`;
CREATE TABLE IF NOT EXISTS `animals` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idCategorie` int(11) NOT NULL,
  `libelle` varchar(200) NOT NULL,
  `description` text NOT NULL,
  `image` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `animals`
--

INSERT INTO `animals` (`id`, `idCategorie`, `libelle`, `description`, `image`) VALUES
(1, 3, 'Tigre blanc', 'UN ENORME TIGRE BLANC', 'tigre_blanc.jpg'),
(2, 3, 'Lion', 'UN ENORME LION', 'lion.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `categories`
--

DROP TABLE IF EXISTS `categories`;
CREATE TABLE IF NOT EXISTS `categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `libelle` varchar(200) NOT NULL,
  `image` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `categories`
--

INSERT INTO `categories` (`id`, `libelle`, `image`) VALUES
(1, 'Canidés', 'canides.jpg'),
(2, 'Équidés', 'equides.jpg'),
(3, 'Félins', 'felins.jpg'),
(4, 'Léporidés', 'leporides.jpg'),
(5, 'Reptiles', 'reptiles.jpg'),
(6, 'Rongeurs', 'rongeurs.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `forum_messages`
--

DROP TABLE IF EXISTS `forum_messages`;
CREATE TABLE IF NOT EXISTS `forum_messages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idTopic` int(11) NOT NULL,
  `idUser` int(11) NOT NULL,
  `message` text NOT NULL,
  `dateCreated` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `forum_messages`
--

INSERT INTO `forum_messages` (`id`, `idTopic`, `idUser`, `message`, `dateCreated`) VALUES
(18, 9, 28, 'Je suis pas d\'accord sur ce point\r\nPourquoi devrais-tu sans cesse parler de brosse à wc aux poils d\'hamster dans tes topics ? C\'est stupide !\r\nTu devrais la prochaine fois nous parler de la recette de raviolis avec de la viande à lapin !', '2019-01-29 22:56:57'),
(17, 9, 28, 'aab', '2019-01-29 22:39:06');

-- --------------------------------------------------------

--
-- Structure de la table `forum_sections`
--

DROP TABLE IF EXISTS `forum_sections`;
CREATE TABLE IF NOT EXISTS `forum_sections` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(50) NOT NULL,
  `description` text NOT NULL,
  `estPossibleCreerTopic` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `forum_sections`
--

INSERT INTO `forum_sections` (`id`, `title`, `description`, `estPossibleCreerTopic`) VALUES
(1, 'Section 1', 'Description aaa yeah', 0),
(2, 'Section 2', 'Description trop bien', 1);

-- --------------------------------------------------------

--
-- Structure de la table `forum_topics`
--

DROP TABLE IF EXISTS `forum_topics`;
CREATE TABLE IF NOT EXISTS `forum_topics` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idSection` int(11) NOT NULL,
  `idUser` int(11) NOT NULL,
  `title` varchar(50) NOT NULL,
  `estClos` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `forum_topics`
--

INSERT INTO `forum_topics` (`id`, `idSection`, `idUser`, `title`, `estClos`) VALUES
(1, 1, 0, 'Topic 1', 0),
(2, 1, 0, 'Topic 2', 0),
(3, 2, 0, 'Topic 1', 0),
(4, 2, 0, 'Topic 2', 0),
(5, 2, 0, 'Topic 3', 0),
(6, 2, 1, 'Topic cool', 0),
(7, 2, 1, 'Topic coola', 0),
(8, 2, 1, 'Topic coolaa', 0),
(9, 2, 1, 'aaa', 0),
(10, 2, 1, 'abc', 1);

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `last_name` varchar(50) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `date_birthday` date NOT NULL,
  `password` varchar(255) NOT NULL,
  `image_profil` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=29 DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `last_name`, `first_name`, `username`, `email`, `date_birthday`, `password`, `image_profil`) VALUES
(28, 'Le Saux', 'Logan', 'loganls', 'logan.lesaux@gmail.com', '1998-08-20', 'c66d115d72475c1427c745dcf1d8e86caa4f36a2', 'image_defaut_utilisateur_01.jpg'),
(27, 'aaaaaa', 'aaaaaa', 'aaaaaa', 'az@gmail.com', '1000-10-10', 'f7a9e24777ec23212c54d7a350bc5bea5477fdbb', 'image_defaut_utilisateur_02.jpg'),
(26, 'aaaaaa', 'aaaaaa', 'aaaaaa', 'az@gmail.com', '1000-10-10', 'f7a9e24777ec23212c54d7a350bc5bea5477fdbb', 'image_defaut_utilisateur_02.jpg'),
(25, 'aaaaaa', 'aaaaaa', 'aaaaaa', 'az@gmail.com', '9542-10-10', 'f7a9e24777ec23212c54d7a350bc5bea5477fdbb', 'image_defaut_utilisateur_02.jpg'),
(24, 'aaaaaa', 'aaaaaa', 'aaaaaa', 'az@gmail.com', '1998-10-10', 'f7a9e24777ec23212c54d7a350bc5bea5477fdbb', 'image_defaut_utilisateur_02.jpg'),
(22, 'Le Saux', 'Logan', 'loganls', 'logan.lesaux@gmail.com', '1998-08-20', 'c66d115d72475c1427c745dcf1d8e86caa4f36a2', '0 image_defaut_utilisateur_01.jpg'),
(23, 'aaaa', 'bfbbf', 'aaaaa', 'az@gmail.com', '1752-04-15', 'f7a9e24777ec23212c54d7a350bc5bea5477fdbb', '0 image_defaut_utilisateur_03.jpg');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
