-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  sam. 16 mars 2019 à 17:18
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
-- Structure de la table `admins`
--

DROP TABLE IF EXISTS `admins`;
CREATE TABLE IF NOT EXISTS `admins` (
  `id` int(11) NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(250) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `admins`
--

INSERT INTO `admins` (`id`, `first_name`, `last_name`, `username`, `email`, `password`) VALUES
(1, 'Logan', 'LE SAUX', 'logoon', 'logan.lesaux@gmail.com', 'c66d115d72475c1427c745dcf1d8e86caa4f36a2');

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
) ENGINE=MyISAM AUTO_INCREMENT=99 DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `animals`
--

INSERT INTO `animals` (`id`, `idCategorie`, `libelle`, `description`, `image`) VALUES
(1, 3, 'Tigre blanc', 'UN ENORME TIGRE BLANC', 'tigre_blanc.jpg'),
(2, 3, 'Lion', 'UN ENORME LION', 'lion.jpg'),
(3, 6, 'Rat', 'RAT', 'rat.jpg'),
(4, 6, 'Hamster', 'HA', 'hamster.jpg'),
(5, 4, 'Lapin', 'lapin', 'lapin.jpg'),
(6, 4, 'Lièvre', 'lievre', 'lievre.jpg'),
(7, 2, 'Cheval', 'cheval', 'cheval.jpg'),
(8, 2, 'Âne', 'âne', 'ane.jpg'),
(9, 5, 'Tortue', 'tortue', 'tortue.jpg'),
(10, 5, 'Caméléon', 'cameleon', 'cameleon.jpg'),
(11, 5, 'Serpent', 'serpent', 'serpent.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `animal_photo`
--

DROP TABLE IF EXISTS `animal_photo`;
CREATE TABLE IF NOT EXISTS `animal_photo` (
  `idAnimal` int(11) NOT NULL,
  `photo` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `animal_photo`
--

INSERT INTO `animal_photo` (`idAnimal`, `photo`) VALUES
(5, 'rongeurs.jpg'),
(6, 'canides.jpg'),
(6, 'equides.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `animal_proprietaire`
--

DROP TABLE IF EXISTS `animal_proprietaire`;
CREATE TABLE IF NOT EXISTS `animal_proprietaire` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idProprietaire` int(11) NOT NULL,
  `nom` varchar(50) NOT NULL,
  `description` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `animal_proprietaire`
--

INSERT INTO `animal_proprietaire` (`id`, `idProprietaire`, `nom`, `description`) VALUES
(6, 28, 'Hamtaro2', 'Le fake hamtaro'),
(5, 28, 'Hamtaro', 'Un magnifique hamster');

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
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4;

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
-- Structure de la table `events`
--

DROP TABLE IF EXISTS `events`;
CREATE TABLE IF NOT EXISTS `events` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `date_start` date NOT NULL,
  `hour_start` time NOT NULL,
  `date_end` date NOT NULL,
  `hour_end` time NOT NULL,
  `zip_code` varchar(50) NOT NULL,
  `name_city` varchar(50) NOT NULL,
  `street_address` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `limited_number_participant` int(11) NOT NULL,
  `date_created` datetime NOT NULL,
  `picture` varchar(50) NOT NULL,
  `is_published` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `events`
--

INSERT INTO `events` (`id`, `id_user`, `name`, `date_start`, `hour_start`, `date_end`, `hour_end`, `zip_code`, `name_city`, `street_address`, `description`, `limited_number_participant`, `date_created`, `picture`, `is_published`) VALUES
(1, 28, 'Anniv logoon', '2019-08-20', '20:00:00', '2019-08-20', '23:30:00', '44200', 'Nantes', '8, rue konrad adenauer', 'Anniv de Logoon\r\n\r\nPS : Je veux une switch', 20, '2019-02-04 23:39:22', 'hqdefault.jpg', 1);

-- --------------------------------------------------------

--
-- Structure de la table `events_comments`
--

DROP TABLE IF EXISTS `events_comments`;
CREATE TABLE IF NOT EXISTS `events_comments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_event` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `body` text NOT NULL,
  `date_created` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `events_comments`
--

INSERT INTO `events_comments` (`id`, `id_event`, `id_user`, `body`, `date_created`) VALUES
(1, 1, 28, 'coucou sale tchoin', '2019-02-06 10:58:27'),
(2, 1, 28, 'cynthia n\'est pas une tchoin', '2019-02-06 10:58:35'),
(3, 1, 28, 'par contre camille ..', '2019-02-06 10:58:41');

-- --------------------------------------------------------

--
-- Structure de la table `events_participants`
--

DROP TABLE IF EXISTS `events_participants`;
CREATE TABLE IF NOT EXISTS `events_participants` (
  `id_event` int(11) NOT NULL,
  `id_users` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `events_participants`
--

INSERT INTO `events_participants` (`id_event`, `id_users`) VALUES
(1, 28);

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
  `password` varchar(255) NOT NULL,
  `image_profil` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=30 DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `last_name`, `first_name`, `username`, `email`, `password`, `image_profil`) VALUES
(28, 'Le Saux', 'Logan', 'loganls', 'logan.lesaux@gmail.com', 'c66d115d72475c1427c745dcf1d8e86caa4f36a2', 'image_defaut_utilisateur_01.jpg'),
(29, 'Rajao', 'Cynthia', 'cynthia', 'cynnn@gmail.com', '45cdf1109c98a42c551e84977251764946dbb432', 'image_defaut_utilisateur_02.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `user_comments`
--

DROP TABLE IF EXISTS `user_comments`;
CREATE TABLE IF NOT EXISTS `user_comments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idUserAuthor` int(11) NOT NULL,
  `idUserReceiver` int(11) NOT NULL,
  `content` text NOT NULL,
  `dateCreated` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `user_comments`
--

INSERT INTO `user_comments` (`id`, `idUserAuthor`, `idUserReceiver`, `content`, `dateCreated`) VALUES
(1, 28, 28, 'coucou toi <3', '2019-03-15 00:00:00'),
(2, 29, 29, 'bonjour moi-même', '2019-03-13 00:00:00'),
(3, 28, 28, 'test', '2019-03-15 13:32:26'),
(4, 28, 28, 'test 2', '2019-03-15 13:32:38');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
