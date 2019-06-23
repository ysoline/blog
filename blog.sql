-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  Dim 23 juin 2019 à 15:05
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
-- Base de données :  `blog`
--

-- --------------------------------------------------------

--
-- Structure de la table `comments`
--

DROP TABLE IF EXISTS `comments`;
CREATE TABLE IF NOT EXISTS `comments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `comment` text NOT NULL,
  `id_author` varchar(255) NOT NULL,
  `comment_date` datetime NOT NULL,
  `post_id` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `posts`
--

DROP TABLE IF EXISTS `posts`;
CREATE TABLE IF NOT EXISTS `posts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `post` text NOT NULL,
  `postDate` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `posts`
--

INSERT INTO `posts` (`id`, `title`, `post`, `postDate`) VALUES
(1, 'Le départ', 'Lateen sail log gunwalls chase coffer square-rigged no prey, no pay strike colors splice the main brace matey. Long boat walk the plank ye aft belaying pin keelhaul Nelsons folly gally run a shot across the bow barkadeer. Bilge pressgang quarterdeck list deadlights mutiny Pieces of Eight bucko Admiral of the Black cable.\r\n\r\nLine gally ballast boom topgallant yo-ho-ho chase pink holystone Yellow Jack. Rum swab Admiral of the Black jib barkadeer reef bounty hang the jib chantey fluke. Wench ballast parrel bucko red ensign fire in the hole driver spanker lugsail nipper.\r\n\r\nAye square-rigged bring a spring upon her cable driver fire in the hole yawl sloop gaff parrel Barbary Coast. Boatswain belaying pin gangplank Gold Road swing the lead cog haul wind brigantine pinnace keelhaul. Yo-ho-ho port squiffy black spot cog line Pieces of Eight swab Yellow Jack cutlass.', '2019-06-20 00:00:00'),
(2, 'Les premiers jours de voyage.', 'Snow sheet run a shot across the bow transom wherry Blimey heave to Barbary Coast mizzenmast overhaul. Bounty gibbet wherry red ensign gunwalls boom marooned swab haul wind rutters. Bilged on her anchor spanker mizzenmast haul wind chantey gaff provost crimp galleon black spot.\r\n\r\nChain Shot measured fer yer chains gangplank Jack Ketch smartly take a caulk flogging jib boom Pieces of Eight. Hulk square-rigged bounty to go on account coxswain gally cog broadside red ensign bilge. Pinnace Shiver me timbers chase crack Jennys tea cup sloop overhaul blow the man down mizzen skysail smartly.\r\n\r\nCapstan Chain Shot flogging loot rum mizzen sloop draught driver holystone. Chandler crack Jennys tea cup lugsail fire ship stern sutler reef bucko clipper shrouds. Haul wind bounty flogging dead men tell no tales cackle fruit fathom Brethren of the Coast landlubber or just lubber topmast cog.', '2019-06-20 00:00:00');

-- --------------------------------------------------------

--
-- Structure de la table `rank`
--

DROP TABLE IF EXISTS `rank`;
CREATE TABLE IF NOT EXISTS `rank` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `administrator` int(11) NOT NULL,
  `moderator` int(11) NOT NULL,
  `normal` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL,
  `pseudo` varchar(255) NOT NULL,
  `pass` varchar(255) NOT NULL,
  `pass2` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email2` varchar(255) NOT NULL,
  `rank_id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
