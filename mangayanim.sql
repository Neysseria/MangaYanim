-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : ven. 09 juil. 2021 à 07:14
-- Version du serveur :  5.7.31
-- Version de PHP : 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `mangayanim`
--

-- --------------------------------------------------------

--
-- Structure de la table `articles`
--

DROP TABLE IF EXISTS `articles`;
CREATE TABLE IF NOT EXISTS `articles` (
  `idArticle` int(11) NOT NULL AUTO_INCREMENT,
  `titreArticle` varchar(255) NOT NULL,
  `contenuArticle` text NOT NULL,
  `imageArticle` varchar(255) NOT NULL,
  PRIMARY KEY (`idArticle`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `articles`
--

INSERT INTO `articles` (`idArticle`, `titreArticle`, `contenuArticle`, `imageArticle`) VALUES
(1, 'DIGIMON ADVENTURE : LAST EVOLUTION KIZUNA', 'Dix ans se sont écoulés depuis l\"été où Taichi a rencontré Agumon et les autres Digimon, et où ils ont vécu d’incroyables aventures dans le monde digital.', 'digimon-adventure.jpg'),
(2, 'My hero Academia saison 4 ANNONCE !', 'Alors que la saison 4 approche à grand pas, vous avez choisi quel est le meilleur moment des 3 premières saisons de My Hero Academia ! C\"est parti pour le top 10 des meilleurs moments de My Hero Academia !', 'my hero3.jpg'),
(3, 'Haikyu!! saison 4', 'Le tournoi national est en marche et Hinata, Kageyama ainsi que tous les membres de l’équipe Karasuno sont plus bouillants que jamais pour en découdre !\r\nUn seul objectif en tête pour les corbeaux : remporter la compétition et redorer le blason de leur école.\r\nToutefois, de nombreux puissants adversaires les attendent ! Nos joueurs favoris réussiront-ils à devenir de véritables champions ?\r\n', 'haikyu3.jpg'),
(4, 'Pokemon saison 50 ANNONCE !', 'Sacha et ses amis découvrent la région d’Alola dans Pokémon, la série : Soleil et Lune. Rejoignez-les dans leurs nouvelles aventures au cours de cette saison passionnante. Visitez notre site pour plus d’infos.', 'pokemon1.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `categorie`
--

DROP TABLE IF EXISTS `categorie`;
CREATE TABLE IF NOT EXISTS `categorie` (
  `idCategorie` int(11) NOT NULL AUTO_INCREMENT,
  `nomCategorie` varchar(30) NOT NULL,
  PRIMARY KEY (`idCategorie`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `categorie`
--

INSERT INTO `categorie` (`idCategorie`, `nomCategorie`) VALUES
(1, 'shonen'),
(2, 'shojo'),
(3, 'sheinen'),
(4, 'OAV');

-- --------------------------------------------------------

--
-- Structure de la table `films`
--

DROP TABLE IF EXISTS `films`;
CREATE TABLE IF NOT EXISTS `films` (
  `idFilm` int(11) NOT NULL AUTO_INCREMENT,
  `nomFilm` varchar(35) NOT NULL,
  `resumeFilm` text NOT NULL,
  `dureeFilm` time NOT NULL,
  `imageFilm` varchar(255) NOT NULL,
  PRIMARY KEY (`idFilm`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `films`
--

INSERT INTO `films` (`idFilm`, `nomFilm`, `resumeFilm`, `dureeFilm`, `imageFilm`) VALUES
(2, 'Danmachi arrow of the orion', 'Orario est en effervescence pour la fête lunaire, célébrée depuis bien avant l\'ère des dieux. Bell Cranel, l\'aventurier qui a rendu la cité meilleure, et sa déesse Hestia sont au cœur des festivités. Le clair de lune dissipe les ténèbres nocturnes et enveloppe délicatement les stands et spectacles. Très haut dans le ciel qui domine l\'agitation de la cité, la lune attend simplement sans bouger la naissance d\'un héros et le début d\'une nouvelle quête. ', '01:25:00', 'DanMachi.jpg'),
(3, 'Fate/stay night: Heaven\'s Feel III', 'Il voulait la protéger. C’était son désir le plus profond. 10 ans après \"La Guerre du Saint Graal\" qui vit s\'affronter les maîtres et leurs Servants, une nouvelle guerre éclate aujourd’hui dans la ville de Fuyuki. ', '02:00:00', 'staynight.jpg'),
(4, 'Demon Slayer - Le train de l\'Infini', 'Le groupe de Tanjirô a terminé son entraînement de récupération au domaine des papillons et embarque à présent en vue de sa prochaine mission à bord du train de l\'infini, d\'où quarante personnes ont disparu en peu de temps.', '02:00:00', 'demonSlayerFilm.jpg'),
(5, 'Naruto : The last', 'Entouré de ses amis, Naruto s\'apprête à célébrer la fête de l\'hiver. Soudain, une météorite déchire la nuit et la lune se rapproche anormalement de la Terre. ', '02:00:00', 'NarutoTheLast.jpg'),
(6, 'Boruto : Naruto, le film', 'Boruto Uzumaki est le fils du 7e Hokage, Naruto, mais il rejette complètement son père, qui est respecté comme un héros. Derrière cela, il a la volonté de vouloir le surpasser. Il finit par rencontrer Sasuke, l\'ami de son père et lui demande s’il peut devenir son apprenti. ', '02:00:00', 'borutopng.png');

-- --------------------------------------------------------

--
-- Structure de la table `membres`
--

DROP TABLE IF EXISTS `membres`;
CREATE TABLE IF NOT EXISTS `membres` (
  `idmembres` int(11) NOT NULL AUTO_INCREMENT,
  `pseudoMembres` varchar(25) NOT NULL,
  `emailMembres` varchar(50) NOT NULL,
  `mpdMembres` text NOT NULL,
  `idRole` int(11) DEFAULT NULL,
  PRIMARY KEY (`idmembres`),
  KEY `fk_role_membre` (`idRole`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `membres`
--

INSERT INTO `membres` (`idmembres`, `pseudoMembres`, `emailMembres`, `mpdMembres`, `idRole`) VALUES
(15, 'cece', 'cel@gmail.com', '84a516841ba77a5b4648de2cd0dfcb30ea46dbb4', 1),
(16, 'admin', 'admin@gmail.com', 'd033e22ae348aeb5660fc2140aec35850c4da997', 2),
(19, 'caribou', 'caribou@gmail.com', '84a516841ba77a5b4648de2cd0dfcb30ea46dbb4', 2),
(20, 'abouuuu', 'abou@ab.ab', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 2);

-- --------------------------------------------------------

--
-- Structure de la table `recuperation`
--

DROP TABLE IF EXISTS `recuperation`;
CREATE TABLE IF NOT EXISTS `recuperation` (
  `id` int(11) NOT NULL,
  `mail` varchar(64) NOT NULL,
  `code` int(11) NOT NULL,
  `date_recover` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `role`
--

DROP TABLE IF EXISTS `role`;
CREATE TABLE IF NOT EXISTS `role` (
  `idRole` int(11) NOT NULL AUTO_INCREMENT,
  `nomRole` varchar(50) NOT NULL,
  PRIMARY KEY (`idRole`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `role`
--

INSERT INTO `role` (`idRole`, `nomRole`) VALUES
(1, 'user'),
(2, 'admin');

-- --------------------------------------------------------

--
-- Structure de la table `series`
--

DROP TABLE IF EXISTS `series`;
CREATE TABLE IF NOT EXISTS `series` (
  `idSeries` int(11) NOT NULL AUTO_INCREMENT,
  `nomSerie` varchar(50) NOT NULL,
  `resumeSerie` text NOT NULL,
  `dureeSerie` time NOT NULL,
  `imageSerie` text NOT NULL,
  `categorieSerie` int(11) NOT NULL,
  PRIMARY KEY (`idSeries`),
  KEY `FK_Categorie_Serie` (`categorieSerie`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `series`
--

INSERT INTO `series` (`idSeries`, `nomSerie`, `resumeSerie`, `dureeSerie`, `imageSerie`, `categorieSerie`) VALUES
(8, 'Dragon Ball Z', 'Dragon Ball Z se déroule cinq ans après le mariage de Son Goku et de Chichi, désormais parents de Son Gohan. Raditz, un mystérieux guerrier extraterrestre, qui s\'avère être le frère de Son Goku, arrive sur Terre pour retrouver ce dernier.', '00:19:00', 'dbz.jpg', 1),
(9, 're:zero', 'Subaru Natsuki fait la connaissance d\'une jeune fille aux longs cheveux d\'argent qui l\'entraîne dans une dimension peuplée de monstres et d\'ennemis en tous genres particulièrement hostiles. Le jeune homme a juré de la protéger, mais il ne résiste pas longtemps dans ce monde violent où il est tué rapidement.\r\n\r\n', '00:25:00', 'rezero.jpg', 1),
(10, 'My hero Academia', 'Le jeune Izuku Midoriya en est un fan absolu. Il n\'a qu\'un rêve : entrer à la Hero Academia pour suivre les traces de son idole. Le problème, c\'est qu\'il fait partie des 20 % qui n\'ont aucun pouvoir… Son destin est bouleversé le jour où sa route croise celle d\'All Might en personne !', '00:25:21', 'mha.jpg', 1),
(11, 'Naruto', 'Naruto est un garçon qui vit à Konoha. Il rêve de devenir Hokage. Mais il est détesté de tout le monde, car il a un démon à neuf queues enfermées en lui (Kuybi). Puis, petit à petit, il va se faire des amis, jusqu\'à devenir le héros de son village.', '00:25:00', 'naruto.jpg', 1),
(12, 'One Piece', 'Luffy, un jeune garçon, rêve de devenir le Roi des Pirates en trouvant le One Piece, le trésor ultime rassemblé par Gol D. Roger, le seul pirate à avoir jamais porté le titre de Roi des Pirates. ... Pour échapper à la noyade, il s\'enferme dans un tonneau et se fait repêcher par un jeune garçon du nom de Kobby.', '00:19:00', 'onepiece.jpg', 2),
(13, 'Demon Slayer', 'Tanjiro vit une vie sans histoire dans les montagnes. Jusqu’au jour tragique où, après une courte absence, il retrouve son village et sa famille massacrés par un ogre ! La seule survivante de cette tragédie est sa jeune sœur Nezuko. Hélas, au contact de la bête, celle-ci s’est à son tour métamorphosée en monstre..', '00:25:00', 'demonslayer.jpg', 1),
(14, 'Sailor Moon', 'Bunny, une collégienne très dissipée, découvre qu\'elle est la réincarnation de Sérénity, la princesse de la Lune et que sa mission est de protéger la Terre des forces maléfiques qui sévissent. Grâce à une broche magique, elle peut se transformer en Sailor Moon et alors bénéficier de pouvoirs magiques.', '00:25:00', 'sailormoon.png', 2),
(15, 'Kaguya Sama Love is War', 'L\'histoire suit le quotidien de Kaguya Shinomiya et de Miyuki Shirogane qui se cherchent mutuellement à faire avouer les sentiments de l\'un pour l\'autre. ', '00:25:00', 'kaguya.jpg', 2),
(16, 'Fruits basket', 'L\'histoireTohru Honda, jeune fille de 16 ans, devient orpheline suite à la mort de sa mère. Elle se retrouve donc toute seule et vit en secret dans une tente. Elle croise un jour par hasard la maison de la famille Sôma dont Yuki, un de ses camarades de classe, fait partie.', '00:25:00', 'fruitsbasket.jpg', 2),
(17, 'Clannad', 'Au début de l\'année scolaire, quand Tomoya rencontre par hasard Nagisa Furukawa, une jeune fille douce qui est plus âgée que lui d\'une année, mais qui redouble sa dernière année de lycée car elle a été très malade l\'année précédente.', '00:25:00', 'clannad.png', 2);

-- --------------------------------------------------------

--
-- Structure de la table `watchlist`
--

DROP TABLE IF EXISTS `watchlist`;
CREATE TABLE IF NOT EXISTS `watchlist` (
  `idMembre` int(11) NOT NULL,
  `idFilm` int(11) DEFAULT NULL,
  `idSerie` int(11) DEFAULT NULL,
  KEY `fk_idMembreWatch` (`idMembre`),
  KEY `fk_idFilm` (`idFilm`),
  KEY `fk_idSerie` (`idSerie`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `watchlist`
--

INSERT INTO `watchlist` (`idMembre`, `idFilm`, `idSerie`) VALUES
(19, NULL, 9),
(19, NULL, 9),
(16, NULL, 9),
(20, NULL, 12),
(20, NULL, 8);

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `membres`
--
ALTER TABLE `membres`
  ADD CONSTRAINT `fk_role_membre` FOREIGN KEY (`idRole`) REFERENCES `role` (`idRole`);

--
-- Contraintes pour la table `series`
--
ALTER TABLE `series`
  ADD CONSTRAINT `FK_Categorie_Serie` FOREIGN KEY (`categorieSerie`) REFERENCES `categorie` (`idCategorie`);

--
-- Contraintes pour la table `watchlist`
--
ALTER TABLE `watchlist`
  ADD CONSTRAINT `fk_idFilm` FOREIGN KEY (`idFilm`) REFERENCES `films` (`idFilm`),
  ADD CONSTRAINT `fk_idMembreWatch` FOREIGN KEY (`idMembre`) REFERENCES `membres` (`idmembres`),
  ADD CONSTRAINT `fk_idSerie` FOREIGN KEY (`idSerie`) REFERENCES `series` (`idSeries`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
