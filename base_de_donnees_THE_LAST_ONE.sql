-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  ven. 22 mars 2019 à 20:20
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
) ENGINE=MyISAM AUTO_INCREMENT=106 DEFAULT CHARSET=utf8mb4;

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
(11, 5, 'Serpent', 'serpent', 'serpent.jpg'),
(105, 1, 'Quelles brosses choisir pour son chien ?', 'aaa', 'aaa'),
(104, 1, 'Pourquoi couper les griffes de son chien ?', 'PARCE QUE', 'no_image_rip.png');

-- --------------------------------------------------------

--
-- Structure de la table `animal_photo`
--

DROP TABLE IF EXISTS `animal_photo`;
CREATE TABLE IF NOT EXISTS `animal_photo` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idAnimal` int(11) NOT NULL,
  `photo` text NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `animal_photo`
--

INSERT INTO `animal_photo` (`id`, `idAnimal`, `photo`, `date`) VALUES
(1, 5, 'rongeurs.jpg', '2019-03-19 23:36:28'),
(2, 6, 'canides.jpg', '2019-03-19 23:36:28'),
(3, 6, 'equides.jpg', '2019-03-19 23:36:28'),
(4, 6, 'equides.jpg\r\n', '2019-03-19 23:36:28'),
(5, 5, 'dog-icon.png', '2019-03-20 16:03:05'),
(6, 5, 'animals-dog.png', '2019-03-20 16:03:15'),
(7, 5, 'animals-dog.png', '2019-03-20 16:04:05'),
(8, 5, 'bda445a353cff250815f7ccedae8ab1d.png', '2019-03-20 16:04:05'),
(9, 5, 'dog-icon.png', '2019-03-20 16:04:05'),
(10, 5, 'tree-576847_960_720.png', '2019-03-20 16:04:05'),
(11, 5, 'veterinaire-thetford_logo-patte.png', '2019-03-20 16:04:05'),
(12, 6, 'mironos_2.png', '2019-03-20 16:04:39');

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
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `categories`
--

INSERT INTO `categories` (`id`, `libelle`, `image`) VALUES
(1, 'Chiens', 'canides.jpg'),
(2, 'Chevaux', 'equides.jpg'),
(3, 'Chats', 'felins.jpg'),
(4, 'Lapins', 'leporides.jpg'),
(5, 'Poissons', 'poissons.jpg'),
(6, 'Hamsters', 'rongeurs.jpg'),
(14, 'Rats', 'rat.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `comments_photo`
--

DROP TABLE IF EXISTS `comments_photo`;
CREATE TABLE IF NOT EXISTS `comments_photo` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idPhoto` int(11) NOT NULL,
  `idUser` int(11) NOT NULL,
  `content` text NOT NULL,
  `dateCreated` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `comments_photo`
--

INSERT INTO `comments_photo` (`id`, `idPhoto`, `idUser`, `content`, `dateCreated`) VALUES
(1, 1, 28, 'super', '2019-03-20 23:25:27'),
(2, 1, 28, 'whoua', '2019-03-20 23:25:27'),
(3, 1, 28, 'test', '2019-03-21 12:16:14'),
(4, 1, 28, 'tetet', '2019-03-21 12:17:26'),
(5, 1, 28, 'ttrtrt', '2019-03-21 12:18:34'),
(6, 1, 28, 'erer', '2019-03-21 12:20:01'),
(7, 5, 28, 'fdf', '2019-03-21 12:20:48'),
(8, 1, 28, 'fdf', '2019-03-21 12:21:01'),
(9, 1, 28, 'ffff', '2019-03-21 12:21:58'),
(10, 1, 28, 'gfg', '2019-03-21 12:22:21'),
(11, 5, 28, 'fdf', '2019-03-21 12:22:40'),
(12, 5, 28, 'ffff', '2019-03-21 12:22:42'),
(13, 1, 28, 'fdfdfdfdfd', '2019-03-21 12:23:10'),
(14, 1, 28, 'bonjour van', '2019-03-21 12:23:17'),
(15, 1, 28, 'tu pues', '2019-03-21 12:23:20'),
(16, 1, 28, 'tg logan :)\nhiij', '2019-03-21 12:23:36');

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
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `events`
--

INSERT INTO `events` (`id`, `id_user`, `name`, `date_start`, `hour_start`, `date_end`, `hour_end`, `zip_code`, `name_city`, `street_address`, `description`, `limited_number_participant`, `date_created`, `picture`, `is_published`) VALUES
(1, 28, 'Anniv logoon', '2019-08-20', '20:00:00', '2019-08-20', '23:30:00', '44200', 'Nantes', '8, rue konrad adenauer', 'Anniv de Logoon\r\n\r\nPS : Je veux une switch', 20, '2019-02-04 23:39:22', 'hqdefault.jpg', 1),
(2, 28, 'Cache-cache des os de vos anciens animaux', '2019-08-20', '20:00:00', '2019-08-20', '23:30:00', '44200', 'Nantes', '8, rue konrad adenauer', 'Anniv de Logoon\r\n\r\nPS : Je veux une switch', 20, '2019-02-04 23:39:22', 'hqdefault.jpg', 1),
(3, 28, 'Boom dans le parc', '2019-08-20', '20:00:00', '2019-08-20', '23:30:00', '44200', 'Nantes', '8, rue konrad adenauer', 'Anniv de Logoon\r\n\r\nPS : Je veux une switch', 20, '2019-02-04 23:39:22', 'hqdefault.jpg', 1),
(4, 28, 'Chassons les oiseaux', '2019-08-20', '20:00:00', '2019-08-20', '23:30:00', '44200', 'Nantes', '8, rue konrad adenauer', 'Anniv de Logoon\r\n\r\nPS : Je veux une switch', 20, '2019-02-04 23:39:22', 'hqdefault.jpg', 1);

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
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `events_comments`
--

INSERT INTO `events_comments` (`id`, `id_event`, `id_user`, `body`, `date_created`) VALUES
(1, 1, 28, 'coucou sale tchoin', '2019-02-06 10:58:27'),
(2, 1, 28, 'cynthia n\'est pas une tchoin', '2019-02-06 10:58:35'),
(3, 1, 28, 'par contre camille ..', '2019-02-06 10:58:41'),
(4, 1, 28, 'oh hell yeah', '2019-03-20 15:15:35');

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
  `date_created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=30 DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `last_name`, `first_name`, `username`, `email`, `password`, `image_profil`, `date_created`) VALUES
(28, 'Le Saux', 'Logan', 'loganls', 'logan.lesaux@gmail.com', 'c66d115d72475c1427c745dcf1d8e86caa4f36a2', 'image_defaut_utilisateur_01.jpg', '2019-03-19 23:23:16'),
(29, 'Rajao', 'Cynthia', 'cynthia', 'cynnn@gmail.com', '45cdf1109c98a42c551e84977251764946dbb432', 'image_defaut_utilisateur_02.jpg', '2019-03-19 23:23:16');

-- --------------------------------------------------------

--
-- Structure de la table `user_aime_comments`
--

DROP TABLE IF EXISTS `user_aime_comments`;
CREATE TABLE IF NOT EXISTS `user_aime_comments` (
  `idUser` int(11) NOT NULL,
  `idComment` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `user_aime_comments`
--

INSERT INTO `user_aime_comments` (`idUser`, `idComment`) VALUES
(28, 2),
(28, 6),
(28, 7),
(28, 11),
(28, 10),
(28, 12);

-- --------------------------------------------------------

--
-- Structure de la table `user_aime_photo`
--

DROP TABLE IF EXISTS `user_aime_photo`;
CREATE TABLE IF NOT EXISTS `user_aime_photo` (
  `idPhoto` int(11) NOT NULL,
  `idUser` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `user_aime_photo`
--

INSERT INTO `user_aime_photo` (`idPhoto`, `idUser`) VALUES
(1, 28),
(12, 28);

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
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `user_comments`
--

INSERT INTO `user_comments` (`id`, `idUserAuthor`, `idUserReceiver`, `content`, `dateCreated`) VALUES
(1, 28, 28, 'coucou toi <3', '2019-03-15 00:00:00'),
(2, 29, 29, 'bonjour moi-même', '2019-03-13 00:00:00'),
(3, 28, 28, 'test', '2019-03-15 13:32:26'),
(4, 28, 28, 'test 2', '2019-03-15 13:32:38'),
(6, 28, 28, 'tu pues van, go kfc', '2019-03-19 12:57:48'),
(7, 28, 28, 'Van est une pizda hihihi', '2019-03-19 14:26:49'),
(8, 28, 28, 'test', '2019-03-19 23:38:01'),
(9, 28, 29, 'test2', '2019-03-19 23:38:09'),
(10, 28, 28, 'van t konn', '2019-03-20 15:37:44'),
(11, 28, 28, 'van tu pues', '2019-03-20 15:39:11'),
(12, 28, 28, 'test', '2019-03-20 16:06:10');

-- --------------------------------------------------------

--
-- Structure de la table `veterinaires`
--

DROP TABLE IF EXISTS `veterinaires`;
CREATE TABLE IF NOT EXISTS `veterinaires` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `prenom` varchar(100) NOT NULL,
  `nom` varchar(100) NOT NULL,
  `ville` varchar(100) NOT NULL,
  `specialite` varchar(100) NOT NULL,
  `telephone` varchar(20) NOT NULL,
  `rue` varchar(50) NOT NULL,
  `code_postal` varchar(5) NOT NULL,
  `mail` varchar(100) NOT NULL,
  `description` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `veterinaires`
--

INSERT INTO `veterinaires` (`id`, `prenom`, `nom`, `ville`, `specialite`, `telephone`, `rue`, `code_postal`, `mail`, `description`) VALUES
(1, 'Camille', 'Chen', 'Lille', 'Vétérinaire équidés', '0684721544', '16 rue des tchoins', 'jspo', 'c.chen@gmail.com', 'zahd jz dos hdoizasjzd shd sdhoas djspd \r\nzdsjdsq d\r\ndsjdpsd\r\ndds'),
(2, 'Logan', 'LE SAUX', 'Vannes', 'Vétérinaire breton', 'je donne pas', 'hors de chez moi', '56000', 'l.ls@gmail.com', 'dsihdsd skld sldsd\r\nsdsa\r\nd s\r\ndaz\r\ndsdsqd'),
(3, 'Sarodibydi', 'Rajaonarison', 'Nantes', 'Extraction de balles de ping pong', '00000000000', '16 rue des tchoins aussi', '44000', 'cynthia@gmail.com', 'dsihdsd skld sldsd\r\nsdsa\r\nd s\r\ndaz\r\ndsdsqd'),
(4, 'Mathieu', 'Hugo', 'Hugo', 'Hugo', 'Hugo', 'maison d\'hugo', 'hugo', 'hugo@gmail.com', 'dsihdsd skld sldsd\r\nsdsa\r\nd s\r\ndaz\r\ndsdsqd'),
(5, 'Van', 'Tchoin', 'SDF', 'voleuse profesionnelle', 'tchoin', 'sdf wesh', '00000', 'van.tchoin@tchoin.tchoin', 'dsihdsd skld sldsd\r\nsdsa\r\nd s\r\ndaz\r\ndsdsqd');

-- --------------------------------------------------------

--
-- Structure de la table `veterinaires_photos`
--

DROP TABLE IF EXISTS `veterinaires_photos`;
CREATE TABLE IF NOT EXISTS `veterinaires_photos` (
  `idVeterinaire` int(11) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `veterinaires_photos`
--

INSERT INTO `veterinaires_photos` (`idVeterinaire`, `image`) VALUES
(3, 'balles.jpg'),
(3, 'balle.jpg'),
(3, 'ping.jpeg'),
(3, 'balle2.jpg'),
(3, 'balle3.jpg'),
(3, 'mangeur_balle.jpg');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
