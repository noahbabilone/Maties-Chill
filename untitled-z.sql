-- phpMyAdmin SQL Dump
-- version 4.4.10
-- http://www.phpmyadmin.net
--
-- Client :  localhost:8889
-- Généré le :  Sam 16 Juillet 2016 à 18:04
-- Version du serveur :  5.5.42
-- Version de PHP :  7.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Base de données :  `matieschill`
--

-- --------------------------------------------------------

--
-- Structure de la table `address`
--

CREATE TABLE `address` (
  `id` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `street` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `frontDoor` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `floor` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `building` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `postCode` int(11) NOT NULL,
  `town` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `other` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `disable` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `address`
--

  INSERT INTO `address` (`id`, `title`, `street`, `frontDoor`, `floor`, `building`, `address`, `phone`, `postCode`, `town`, `other`, `disable`) VALUES
  (1, 'Domicile', '11a ', '114', '1', 'B3', '1', '0636890022', 78180, 'Montigny', NULL, 0),
  (2, 'Chez Maman', '12', '123', '12', 'A2', 'Rue Charle DE GAULLE ', '0672893421', 75001, 'Paris', NULL, 0),
  (3, 'chez oim', '11', '512', '512', 'C2', 'Rue Haute', '0671893689', 88400, 'Gerardmer', '', 0),
  (4, 'Vosges', '11a', NULL, NULL, NULL, 'Jean Mace', '0329711868', 88400, 'Gerardmer', NULL, 0),
  (5, 'Gerardmer', '1', '8', NULL, NULL, 'rue haute', NULL, 884000, 'gerardmer', NULL, 0),
  (6, 'Gerardmer', '11a', '12', NULL, NULL, 'Jean Mace', NULL, 884000, 'Gerardmer', NULL, 0);

-- --------------------------------------------------------


-- --------------------------------------------------------

--
-- Structure de la table `comment`
--

CREATE TABLE `comment` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `seance_id` int(11) DEFAULT NULL,
  `date` datetime NOT NULL,
  `disable` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `film`
--

CREATE TABLE `film` (
  `id` int(11) NOT NULL,
  `ISAN` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `releaseDate` datetime DEFAULT NULL,
  `directors` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `actors` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `runtime` int(11) DEFAULT NULL,
  `ageLimit` int(11) DEFAULT NULL,
  `poster` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `synopsis` longtext COLLATE utf8_unicode_ci,
  `pressRating` double DEFAULT NULL,
  `userRating` double DEFAULT NULL,
  `link` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `nationality` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `trailer` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `synopsisShort` longtext COLLATE utf8_unicode_ci,
  `originalTitle` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `disable` tinyint(1) NOT NULL DEFAULT '0',
  `dateAdded` datetime DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `film`
--

INSERT INTO `film` (`id`, `ISAN`, `title`, `releaseDate`, `directors`, `actors`, `runtime`, `ageLimit`, `poster`, `synopsis`, `pressRating`, `userRating`, `link`, `nationality`, `trailer`, `synopsisShort`, `originalTitle`, `disable`, `dateAdded`) VALUES
(1, '115362', 'The Dark Knight, Le Chevalier Noir', '2008-08-13 00:00:00', 'Christopher Nolan', 'Christian Bale, Heath Ledger, Aaron Eckhart, Maggie Gyllenhaal, Michael Caine', 120, 12, 'http://fr.web.img2.acsta.net/medias/nmedia/18/63/97/89/18949761.jpg', 'Dans ce nouveau volet, Batman augmente les mises dans sa guerre contre le crime. Avec l''appui du lieutenant de police Jim Gordon et du procureur de Gotham, Harvey Dent, Batman vise à éradiquer le crime organisé qui pullule dans la ville. Leur association est très efficace mais elle sera bientôt bouleversée par le chaos déclenché par un criminel extraordinaire que les citoyens de Gotham connaissent sous le nom de Joker.', 4, 4.50989, 'http://www.allocine.fr/film/fichefilm_gen_cfilm=115362.html', 'USA', NULL, NULL, NULL, 0, '2016-07-18 00:00:00'),
(2, '132874', 'The Dark Knight Rises', '2012-07-25 00:00:00', 'Christopher Nolan', 'Christian Bale, Gary Oldman, Tom Hardy, Joseph Gordon-Levitt, Anne Hathaway', 120, 12, 'http://fr.web.img3.acsta.net/medias/nmedia/18/83/56/27/20158098.jpg', 'Il y a huit ans, Batman a disparu dans la nuit : lui qui était un héros est alors devenu un fugitif. S''accusant de la mort du procureur-adjoint Harvey Dent, le Chevalier Noir a tout sacrifié au nom de ce que le commissaire Gordon et lui-même considéraient être une noble cause. Et leurs actions conjointes se sont avérées efficaces pour un temps puisque la criminalité a été éradiquée à Gotham City grâce à l''arsenal de lois répressif initié par Dent. Mais c''est un chat – aux intentions obscures – aussi rusé que voleur qui va tout bouleverser. À moins que ce ne soit l''arrivée à Gotham de Bane, terroriste masqué, qui compte bien arracher Bruce à l''exil qu''il s''est imposé. Pourtant, même si ce dernier est prêt à endosser de nouveau la cape et le casque du Chevalier Noir, Batman n''est peut-être plus de taille à affronter Bane…', 3.57143, 4.35461, 'http://www.allocine.fr/film/fichefilm_gen_cfilm=132874.html', 'USA', NULL, NULL, NULL, 0, '2016-07-22 00:00:00'),
(3, '6122', 'Ghost', '1990-11-07 00:00:00', 'Jerry Zucker', 'Patrick Swayze, Demi Moore, Whoopi Goldberg, Tony Goldwyn, Vincent Schiavelli', 7560, 10, 'http://fr.web.img6.acsta.net/medias/nmedia/18/64/69/67/19106105.jpg', 'Sam Wheat, cadre dans une banque d''affaires new-yorkaise, et Molly Jensen, sculpteur, s''aiment. Mais tout bascule lorsque Sam Wheat est agressé dans la rue et abattu. A sa grande surprise, il devient un fantôme et réussit à communiquer avec une voyante hystérique. Il tente alors d''entrer en contact avec sa femme et découvre qui a voulu le tuer.', 2.2, 3.84932232, 'http://www.allocine.fr/film/fichefilm_gen_cfilm=6122.html', 'U.S.A.', '<div id=''ACEmbed''><iframe src=''http://www.allocine.fr/_video/iblogvision.aspx?cmedia=19377927&amp;isApp=true'' style=''width:480px; height:270px'' frameborder=''0'' allowfullscreen=''true''></iframe><br /><a href="http://www.allocine.fr/film/fichefilm_gen_cfilm=', 'Sam Wheat, cadre dans une banque d''affaires new-yorkaise, et Molly Jensen, sculpteur, s''aiment. Mais tout bascule lorsque Sam Wheat est agressé dans la rue et abattu. A sa grande surprise, il devient un fantôme...', NULL, 0, '2016-07-23 00:00:00'),
(4, '140603', 'Karaté Kid', '2010-08-18 00:00:00', 'Harald Zwart', 'Jaden Smith, Jackie Chan, Taraji P. Henson, Tess Liu, Wen Wen Han', 8340, 10, 'http://fr.web.img5.acsta.net/medias/nmedia/18/73/64/48/19458319.jpg', 'Lorsque la carrière de sa mère l''entraîne à Benjing en Chine, le jeune Dre Parker doit faire face à des changements radicaux. Au bout de quelques jours, il se retrouve mêlé à une altercation au sein de son école, impliquant Cheng, l''un des garçons les plus doués en Kung Fu et qui lui fait définitivement perdre le respect de ses camarades de classe.Témoin de cet affrontement, Mr Han, professeur de Karaté à la retraite, embauché par les Parker comme chauffeur et assistant, décide d''aider Dre à regagner le respect de son entourage.', 3.142857, 3.56342745, 'http://www.allocine.fr/film/fichefilm_gen_cfilm=140603.html', 'U.S.A.Chine', '<div id=''ACEmbed''><iframe src=''http://www.allocine.fr/_video/iblogvision.aspx?cmedia=18942684&amp;isApp=true'' style=''width:480px; height:270px'' frameborder=''0'' allowfullscreen=''true''></iframe><br /><a href="http://www.allocine.fr/film/fichefilm_gen_cfilm=', 'Un jeune garçon féru d''arts martiaux est pris en charge par un maître excentrique...', 'The Karate Kid', 0, '2016-09-30 00:00:00'),
(7, '54024', 'Street dancers', '2004-06-02 00:00:00', 'Christopher B. Stokes, Chris Stokes', 'Marques Houston, Omari Grandberry, Jarell Houston, Meagan Good, Jennifer Freeman', 5700, 10, 'http://fr.web.img6.acsta.net/medias/nmedia/18/35/24/05/18377424.jpg', 'Elgin et David sont deux très bons copains et font partie d''une petite troupe qui souhaite ouvrir son propre studio de hip-hop. Lorsqu''une autre formation les provoque dans un duel de break dancing, David, Elgin et les autres membres décident de créer et de perfectionner des mouvements hors du commun.La rumeur de ce duel se propage très vite dans la rue et les enchères montent. David et Elgin vont devoir se dépasser pour prouver qu''ils sont les meilleurs.', 2.555555, 2.95182371, 'http://www.allocine.fr/film/fichefilm_gen_cfilm=54024.html', 'U.S.A.', '<div id=''ACEmbed''><iframe src=''http://www.allocine.fr/_video/iblogvision.aspx?cmedia=18363115&amp;isApp=true'' style=''width:480px; height:270px'' frameborder=''0'' allowfullscreen=''true''></iframe><br /><a href="http://www.allocine.fr/film/fichefilm_gen_cfilm=', 'Elgin et David font partie d''une petite troupe qui souhaite ouvrir son propre studio de hip-hop. Lorsqu''une autre formation les provoque dans un duel de break dancing, ils décident de créer et de perfectionner des mouvements hors du commun...', 'You Got Served', 0, '2016-12-10 00:00:00'),
(8, '45915', 'Honey', '2004-06-16 00:00:00', 'Bille Woodruff', 'Jessica Alba, Mekhi Phifer, Joy Bryant, Romeo Miller, David Moscow', 5700, 10, 'http://fr.web.img4.acsta.net/medias/nmedia/18/35/24/19/18376916.jpg', 'Honey Daniels a longtemps attendu de révéler au monde ses talents de danseuse, et maintenant son désir le plus cher est sur le point de se réaliser...Durant des années, son ambition et sa détermination ont donné à la jeune danseuse / chorégraphe la force de persévérer dans un monde où seuls quelques-uns peuvent prétendre à la gloire. Alors même que ses parents lui garantissaient un avenir confortable et sans histoire, elle a préféré l''aventure et a choisi d''aller vivre au coeur de la ville, en prise directe avec la musique.Dans la journée, Honey donne des cours de hip-hop. La nuit, elle travaille comme barmaid avant de s''éclater sur la piste du club. C''est ainsi qu''un réalisateur vidéo la découvre et lui offre sa première chance : un job de choriste qui lui permettra de faire ses preuves et de gravir rapidement les échelons...', 2.4, 2.71158648, 'http://www.allocine.fr/film/fichefilm_gen_cfilm=45915.html', 'U.S.A.', '<div id=''ACEmbed''><iframe src=''http://www.allocine.fr/_video/iblogvision.aspx?cmedia=18362522&amp;isApp=true'' style=''width:480px; height:270px'' frameborder=''0'' allowfullscreen=''true''></iframe><br /><a href="http://www.allocine.fr/film/fichefilm_gen_cfilm=', 'Dans la journée, Honey donne des cours de hip-hop. La nuit, elle travaille comme barmaid avant de s''éclater sur la piste du club. C''est ainsi qu''un réalisateur vidéo la découvre et lui offre un job de choriste...', 'Honey', 0, '2016-08-16 00:00:00'),
(9, '46718', 'King Kong', '2005-12-14 00:00:00', 'Peter Jackson', 'Naomi Watts, Jack Black, Adrien Brody, Andy Serkis, Thomas Kretschmann', 10800, 10, 'http://fr.web.img5.acsta.net/medias/nmedia/18/35/51/58/18460428.jpg', 'New York, 1933. Ann Darrow est une artiste de music-hall dont la carrière a été brisée net par la Dépression. Se retrouvant sans emploi ni ressources, la jeune femme rencontre l''audacieux explorateur-réalisateur Carl Denham et se laisse entraîner par lui dans la plus périlleuse des aventures...Ce dernier a dérobé à ses producteurs le négatif de son film inachevé. Il n''a que quelques heures pour trouver une nouvelle star et l''embarquer pour Singapour avec son scénariste, Jack Driscoll, et une équipe réduite. Objectif avoué : achever sous ces cieux lointains son génial film d''action.Mais Denham nourrit en secret une autre ambition, bien plus folle : être le premier homme à explorer la mystérieuse Skull Island et à en ramener des images. Sur cette île de légende, Denham sait que "quelque chose" l''attend, qui changera à jamais le cours de sa vie...', 4, 3.79854465, 'http://www.allocine.fr/film/fichefilm_gen_cfilm=46718.html', 'U.S.A.Nouvelle-ZélandeAllemagne', '<div id=''ACEmbed''><iframe src=''http://www.allocine.fr/_video/iblogvision.aspx?cmedia=18394373&amp;isApp=true'' style=''width:480px; height:270px'' frameborder=''0'' allowfullscreen=''true''></iframe><br /><a href="http://www.allocine.fr/film/fichefilm_gen_cfilm=', 'Une aventure romantique entre le célèbre gorille, capturé dans la jungle, la belle Ann Darrow, jeune actrice de vaudeville au chômage, et Jack Driscoll, un scénariste new-yorkais dont les sentiments et le courage vont être mis à rude épreuve.', 'King Kong', 0, '2016-07-14 00:00:00'),
(10, '126678', 'Prince of Persia : les sables du temps', '2010-05-26 00:00:00', 'Mike Newell', 'Jake Gyllenhaal, Gemma Arterton, Ben Kingsley, Alfred Molina, Steve Toussaint', 7560, 10, 'http://fr.web.img1.acsta.net/medias/nmedia/18/67/06/10/19419606.jpg', 'Un prince rebelle est contraint d''unir ses forces avec une mystérieuse princesse pour affronter ensemble les forces du mal et protéger une dague antique capable de libérer les Sables du temps, un don de dieu qui peut inverser le cours du temps et permettre à son possesseur de régner en maître absolu sur le monde.', 2.590909, 3.37121, 'http://www.allocine.fr/film/fichefilm_gen_cfilm=126678.html', 'U.S.A.', '<div id=''ACEmbed''><iframe src=''http://www.allocine.fr/_video/iblogvision.aspx?cmedia=18964593&amp;isApp=true'' style=''width:480px; height:270px'' frameborder=''0'' allowfullscreen=''true''></iframe><br /><a href="http://www.allocine.fr/film/fichefilm_gen_cfilm=', 'Dastan, un jeune prince de la Perse du VIe siècle va devoir unir ses forces à celles de la belle et courageuse princesse Tamina pour empêcher un redoutable noble de s''emparer des Sables du Temps...', 'Prince of Persia: The Sands of Time', 0, '2016-07-15 00:00:00'),
(13, '47111', 'Bad Boys II', '2003-10-15 00:00:00', 'Michael Bay', 'Will Smith, Martin Lawrence, Jordi Mollà, Gabrielle Union, Peter Stormare', 8820, 10, 'http://fr.web.img1.acsta.net/medias/nmedia/18/35/14/95/18364304.jpg', 'Les policiers Marcus Burnett et Mike Lowrey enquêtent sur Tapia, un ambitieux baron de la drogue décidé à tout pour inonder Miami d''un nouveau poison et accroître son empire. Au cours de leurs investigations, ils se voient épaulés par Syd, la soeur de Marcus, également agent de la D.E.A. (Drug Enforcement Agency). Mike s''éprendra de la demoiselle, provoquant ainsi quelques tensions entre lui et son partenaire...', 2.3, 2.86088562, 'http://www.allocine.fr/film/fichefilm_gen_cfilm=47111.html', 'U.S.A.', '<div id=''ACEmbed''><iframe src=''http://www.allocine.fr/_video/iblogvision.aspx?cmedia=18350546&amp;isApp=true'' style=''width:480px; height:270px'' frameborder=''0'' allowfullscreen=''true''></iframe><br /><a href="http://www.allocine.fr/film/fichefilm_gen_cfilm=', 'Marcus Burnett et Mike Lowrey enquêtent sur Tapia, un baron de la drogue. Ils se voient épaulés par Syd, la soeur de Marcus, également agent de la D.E.A. Mike s''éprend de la demoiselle, provoquant ainsi quelques tensions entre lui et son partenaire.', 'Bad Boys II', 0, '2016-07-15 00:00:00'),
(14, '246291', 'Kiki, Love to Love', NULL, 'Paco León', 'Natalia de Molina, Alexandra Jiménez, Álex García, Ana Katz, Belén Cuesta', NULL, 10, 'http://fr.web.img2.acsta.net/pictures/16/03/31/15/26/024978.jpg', 'Cinq histoires d''amour et de sexe durant un été à Madrid.', NULL, NULL, 'http://www.allocine.fr/film/fichefilm_gen_cfilm=246291.html', 'Espagne', NULL, 'Cinq histoires d''amour et de sexe durant un été à Madrid.', 'Kiki, Love to Love', 0, '2016-08-18 00:00:00'),
(15, '146550', 'Rio', '2011-04-13 00:00:00', 'Carlos Saldanha', 'Laetitia Casta, Lorànt Deutsch, Mustapha El-Atrassi, Jamie Foxx, Nikos Aliagas', 5400, 10, 'http://fr.web.img1.acsta.net/medias/nmedia/18/78/25/22/19699752.jpg', 'Blu, un perroquet bleu d’une espèce très rare, quitte sa petite ville sous la neige et le confort de sa cage pour s’aventurer au cœur des merveilles exotiques de Rio de Janeiro. Sachant qu’il n’a jamais appris à voler, l’aventure grandiose qui l’attend au Brésil va lui faire perdre quelques plumes ! Heureusement, ses nouveaux amis hauts en couleurs sont prêts à tout pour réveiller le héros qui est en lui, et lui faire découvrir tout le sens de l’expression « prendre son envol ».', 3.421052, 3.97828674, 'http://www.allocine.fr/film/fichefilm_gen_cfilm=146550.html', 'U.S.A.', '<div id=''ACEmbed''><iframe src=''http://www.allocine.fr/_video/iblogvision.aspx?cmedia=19197926&amp;isApp=true'' style=''width:480px; height:270px'' frameborder=''0'' allowfullscreen=''true''></iframe><br /><a href="http://www.allocine.fr/film/fichefilm_gen_cfilm=', 'Blu, un perroquet bleu d’une espèce très rare, quitte sa petite ville sous la neige et le confort de sa cage pour s’aventurer au cœur des merveilles exotiques de Rio de Janeiro.', 'Rio', 0, '2016-08-17 00:00:00');

-- --------------------------------------------------------

--
-- Structure de la table `film_category`
--

CREATE TABLE `film_category` (
  `film_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `film_category`
--

INSERT INTO `film_category` (`film_id`, `category_id`) VALUES
(1, 1),
(1, 2),
(2, 1),
(2, 2);

-- --------------------------------------------------------

--
-- Structure de la table `film_genre`
--

CREATE TABLE `film_genre` (
  `film_id` int(11) NOT NULL,
  `genre_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `film_genre`
--

INSERT INTO `film_genre` (`film_id`, `genre_id`) VALUES
(3, 1),
(3, 2),
(3, 3),
(4, 2),
(4, 4),
(4, 5),
(4, 6),
(7, 7),
(7, 8),
(8, 2),
(8, 8),
(9, 1),
(9, 9),
(10, 5),
(10, 9),
(13, 5),
(13, 7),
(13, 10),
(14, 12),
(15, 6),
(15, 9),
(15, 13);

-- --------------------------------------------------------
********************

INSERT INTO `genre` (`id`, `title`, `disable`) VALUES
(1, 'Fantastique', 0),
(2, 'Drame', 0),
(3, 'Romance', 0),
(4, 'Arts Martiaux', 0),
(5, 'Action', 0),
(6, 'Famille', 0),
(7, 'Comédie', 0),
(8, 'Musical', 0),
(9, 'Aventure', 0),
(10, 'Policier', 0),
(11, 'Divers', 0),
(12, 'Erotique', 0),
(13, 'Animation', 0);

-- --------------------------------------------------------

--
-- Structure de la table `material`
--

CREATE TABLE `material` (
  `id` int(11) NOT NULL,
  `type_material_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `disable` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `material`
--

INSERT INTO `material` (`id`, `type_material_id`, `user_id`, `description`, `title`, `disable`) VALUES
(1, 1, 1, 'Canapé cuir', 'Canapé cuir', 0),
(2, 3, 1, '4K Samgsung', 'Télé 4K Samsung', 0),
(3, 4, 1, 'Sony Modèle MKZIJE', 'Tv Sony', 0);

-- --------------------------------------------------------

--
-- Structure de la table `message`
--

CREATE TABLE `message` (
  `id` int(11) NOT NULL,
  `seance_id` int(11) DEFAULT NULL,
  `sender_id` int(11) DEFAULT NULL,
  `receiver_id` int(11) DEFAULT NULL,
  `date` datetime NOT NULL,
  `readMessage` tinyint(1) NOT NULL,
  `disable` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `modality`
--

CREATE TABLE `modality` (
  `id` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `contribution` tinyint(1) NOT NULL,
  `disable` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `modality`
--


-- --------------------------------------------------------

--
-- Structure de la table `note`
--

CREATE TABLE `note` (
  `id` int(11) NOT NULL,
  `type_note_id` int(11) DEFAULT NULL,
  `seance_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `assign_id` int(11) DEFAULT NULL,
  `note` int(11) NOT NULL,
  `appreciation` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `participant`
--

CREATE TABLE `participant` (
  `state_participant_id` int(11) DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `seance_id` int(11) NOT NULL,
  `disable` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `participant`
--

INSERT INTO `participant` (`state_participant_id`, `user_id`, `seance_id`, `disable`) VALUES
(NULL, 1, 1, 0),
(NULL, 1, 3, 0),
(NULL, 1, 4, 0),
(NULL, 1, 6, 0),
(NULL, 1, 20, 0),
(NULL, 2, 1, 0),
(NULL, 2, 2, 0),
(NULL, 3, 1, 0),
(NULL, 4, 1, 0),
(NULL, 5, 1, 0);

-- --------------------------------------------------------

--
-- Structure de la table `seance`
--

CREATE TABLE `seance` (
  `id` int(11) NOT NULL,
  `address_id` int(11) NOT NULL,
  `modality_id` int(11) NOT NULL,
  `film_id` int(11) NOT NULL,
  `creator_id` int(11) NOT NULL,
  `date` datetime DEFAULT NULL,
  `typeView` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  `maxPlace` int(11) NOT NULL,
  `contribution` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `disable` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `seance`
--

INSERT INTO `seance` (`id`, `address_id`, `modality_id`, `film_id`, `creator_id`, `date`, `typeView`, `description`, `price`, `maxPlace`, `contribution`, `disable`) VALUES
(1, 1, 1, 2, 1, '2016-09-17 16:00:10', 'VF', 'Test Description', 10, 4, 'Bouteille, Chips', 0),
(2, 2, 3, 8, 3, '2016-10-19 16:02:15', 'VO', 'Test Description', 6, 10, 'Bouteille de cocoa', 0),
(3, 2, 3, 1, 1, '2016-08-18 00:00:00', 'VO', 'Test Description', 6, 10, 'Chips', 0),
(4, 1, 3, 2, 5, '2016-09-21 00:00:00', 'VF', 'Brochette à volonter ', 0, 5, 'Bouteille de coca ou tout ce que vous voulez apporter ', 0),
(5, 1, 3, 3, 4, '2016-08-11 00:00:00', 'VF', 'Ac ne quis a nobis hoc ita dici forte miretur, quod alia quaedam in hoc facultas sit ingeni, neque haec dicendi ratio aut disciplina, ne nos quidem huic uni studio penitus umquam dediti fuimus. Etenim omnes artes, quae ad humanitatem pertinent, habent quo', 6, 5, 'Bouteille de soda, coca ou tout ce que vous voulez apporter ', 0),
(6, 1, 4, 7, 1, '2016-09-11 00:00:00', 'VO', 'Lamec ne quis a nobis hoc ita dici forte miretur, quod alia quaedam in hoc facultas sit ingeni, neque haec dicendi ratio aut disciplina, ne nos quidem huic uni studio penitus umquam dediti fuimus. Etenim omnes artes, quae ad humanitatem pertinent, habent ', 6, 5, 'Chips, soda, coca ou tout ce que vous voulez apporter ', 0),
(7, 2, 4, 3, 1, '2016-09-21 00:00:00', 'VO', 'Ita dici forte miretur, quod alia quaedam in hoc facultas sit ingeni, neque haec dicendi ratio aut disciplina, ne nos quidem huic uni studio penitus umquam dediti fuimus. Etenim omnes artes, quae ad humanitatem pertinent, habent quoddam commune vinculum, ', 6, 5, 'Chips, soda, coca ou tout ce que vous voulez apporter ', 0),
(8, 2, 4, 4, 1, '2016-10-01 00:00:00', 'VO', 'Ita dici forte miretur, quod alia quaedam in hoc facultas sit ingeni, neque haec dicendi ratio aut disciplina, ne nos quidem huic uni studio penitus umquam dediti fuimus. Etenim omnes artes, quae ad humanitatem pertinent, habent quoddam commune vinculum, ', 6, 5, 'Chips, soda, coca ou tout ce que vous voulez apporter ', 0),
(9, 1, 2, 8, 1, '2016-09-15 00:00:00', 'VOSTFR', 'Le DKS dici forte miretur, quod alia quaedam in hoc facultas sit ingeni, neque haec dicendi ratio aut disciplina, ne nos quidem huic uni studio penitus umquam dediti fuimus. Etenim omnes artes, quae ad humanitatem pertinent, habent quoddam commune vinculu', 6, 5, 'Chips, soda, coca ou tout ce que vous voulez apporter ', 0),
(10, 1, 2, 2, 1, '2016-09-15 00:00:00', 'VOSTFR', 'Le DKS dici forte miretur, quod alia quaedam in hoc facultas sit ingeni, neque haec dicendi ratio aut disciplina, ne nos quidem huic uni studio penitus umquam dediti fuimus. Etenim omnes artes, quae ad humanitatem pertinent, habent quoddam commune vinculu', 6, 5, 'Chips, soda, coca ou tout ce que vous voulez apporter ', 0),
(11, 1, 2, 9, 1, '2016-10-25 00:00:00', 'VOSTFR', 'Le DKS dici forte miretur, quod alia quaedam in hoc facultas sit ingeni, neque haec dicendi ratio aut disciplina, ne nos quidem huic uni studio penitus umquam dediti fuimus. Etenim omnes artes, quae ad humanitatem pertinent, habent quoddam commune vinculu', 6, 5, 'Chips, soda, coca ou tout ce que vous voulez apporter ', 0),
(12, 1, 2, 10, 1, '2016-12-25 00:00:00', 'VOSTFR', 'Le DKS dici forte miretur, quod alia quaedam in hoc facultas sit ingeni, neque haec dicendi ratio aut disciplina, ne nos quidem huic uni studio penitus umquam dediti fuimus. Etenim omnes artes, quae ad humanitatem pertinent, habent quoddam commune vinculu', 6, 5, 'Chips, soda, coca ou tout ce que vous voulez apporter ', 0),
(14, 1, 2, 13, 1, '2016-10-25 00:00:00', 'VOSTFR', 'Le DKS dici forte miretur, quod alia quaedam in hoc facultas sit ingeni, neque haec dicendi ratio aut disciplina, ne nos quidem huic uni studio penitus umquam dediti fuimus. Etenim omnes artes, quae ad humanitatem pertinent, habent quoddam commune vinculu', 6, 5, 'Chips, soda, coca ou tout ce que vous voulez apporter ', 0),
(16, 1, 2, 8, 1, '2016-09-25 00:00:00', 'VOSTFR', 'Le DKS dici forte miretur, quod alia quaedam in hoc facultas sit ingeni, neque haec dicendi ratio aut disciplina, ne nos quidem huic uni studio penitus umquam dediti fuimus. Etenim omnes artes, quae ad humanitatem pertinent, habent quoddam commune vinculu', 6, 5, 'Chips, soda, coca ou tout ce que vous voulez apporter ', 0),
(17, 1, 2, 13, 1, '2016-09-25 00:00:00', 'VOSTFR', 'Le DKS dici forte miretur, quod alia quaedam in hoc facultas sit ingeni, neque haec dicendi ratio aut disciplina, ne nos quidem huic uni studio penitus umquam dediti fuimus. Etenim omnes artes, quae ad humanitatem pertinent, habent quoddam commune vinculu', 6, 5, 'Chips, soda, coca ou tout ce que vous voulez apporter ', 0),
(18, 1, 2, 2, 1, '2016-10-25 00:00:00', 'VOSTFR', 'Le DKS dici forte miretur, quod alia quaedam in hoc facultas sit ingeni, neque haec dicendi ratio aut disciplina, ne nos quidem huic uni studio penitus umquam dediti fuimus. Etenim omnes artes, quae ad humanitatem pertinent, habent quoddam commune vinculu', 6, 5, 'Chips, soda, coca ou tout ce que vous voulez apporter ', 0),
(19, 1, 2, 7, 1, '2016-11-25 00:00:00', 'VOSTFR', 'Le DKS dici forte miretur, quod alia quaedam in hoc facultas sit ingeni, neque haec dicendi ratio aut disciplina, ne nos quidem huic uni studio penitus umquam dediti fuimus. Etenim omnes artes, quae ad humanitatem pertinent, habent quoddam commune vinculu', 6, 5, 'Chips, soda, coca ou tout ce que vous voulez apporter ', 0),
(20, 2, 1, 14, 1, '2016-09-16 14:35:00', 'VO', NULL, 0, 121, NULL, 0),
(21, 1, 1, 15, 1, '2016-09-23 14:35:00', 'VF', 'test', 0, 12, NULL, 0);

-- --------------------------------------------------------

--
-- Structure de la table `seance_material`
--

CREATE TABLE `seance_material` (
  `seance_id` int(11) NOT NULL,
  `material_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `seance_material`
--

INSERT INTO `seance_material` (`seance_id`, `material_id`) VALUES
(1, 1),
(1, 2),
(1, 3),
(2, 1),
(2, 2),
(2, 3),
(3, 1),
(3, 2),
(3, 3),
(4, 1),
(4, 2),
(4, 3),
(5, 1),
(5, 2),
(5, 3),
(6, 1),
(6, 2),
(6, 3),
(7, 1),
(7, 2),
(7, 3),
(8, 1),
(8, 2),
(8, 3),
(9, 1),
(9, 2),
(9, 3),
(10, 1),
(10, 2),
(10, 3),
(11, 1),
(11, 2),
(11, 3),
(12, 1),
(12, 2),
(12, 3),
(14, 1),
(14, 2),
(14, 3),
(16, 1),
(16, 2),
(16, 3),
(17, 1),
(17, 2),
(17, 3),
(18, 1),
(18, 2),
(18, 3),
(19, 1),
(19, 2),
(19, 3),
(20, 1),
(20, 2),
(21, 1);

-- --------------------------------------------------------

--
-- Structure de la table `seance_participant`
--

CREATE TABLE `seance_participant` (
  `seance_id` int(11) NOT NULL,
  `participant_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `seance_participant`
--

INSERT INTO `seance_participant` (`seance_id`, `participant_id`) VALUES
(1, 1),
(1, 2),
(2, 1),
(4, 1);

-- --------------------------------------------------------

--
-- Structure de la table `seance_user`
--

CREATE TABLE `seance_user` (
  `seance_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `seance_user`
--

INSERT INTO `seance_user` (`seance_id`, `user_id`) VALUES
(1, 2),
(1, 3);

-- --------------------------------------------------------

--
-- Structure de la table `stateParticipant`
--

CREATE TABLE `stateParticipant` (
  `id` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `disable` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `typeMaterial`
--

CREATE TABLE `typeMaterial` (
  `id` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `typeMaterial`
--

INSERT INTO `typeMaterial` (`id`, `title`) VALUES
(1, 'Canapé'),
(2, 'Chaise'),
(3, 'Écran'),
(4, 'Home cinéma'),
(5, 'Lunette 3D'),
(6, 'Vidéo projecteur'),
(7, 'Lecteur');

-- --------------------------------------------------------

--
-- Structure de la table `typeNote`
--

CREATE TABLE `typeNote` (
  `id` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `username_canonical` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email_canonical` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `enabled` tinyint(1) NOT NULL,
  `salt` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `last_login` datetime DEFAULT NULL,
  `locked` tinyint(1) NOT NULL,
  `expired` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL,
  `confirmation_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password_requested_at` datetime DEFAULT NULL,
  `roles` longtext COLLATE utf8_unicode_ci NOT NULL COMMENT '(DC2Type:array)',
  `credentials_expired` tinyint(1) NOT NULL,
  `credentials_expire_at` datetime DEFAULT NULL,
  `birthday` datetime DEFAULT NULL,
  `avatar` datetime DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `user`
--
*********************
INSERT INTO `user` (`id`, `username`, `username_canonical`, `email`, `email_canonical`, `enabled`, `salt`, `password`, `last_login`, `locked`, `expired`, `expires_at`, `confirmation_token`, `password_requested_at`, `roles`, `credentials_expired`, `credentials_expire_at`, `birthday`, `avatar`) VALUES
(1, 'yannick', 'yannick', 'root@root.fr', 'root@root.fr', 1, '9qvdi96n3awwk0skcwscgokw0sog4ww', 'I2bILJBd9eUD/iHR/XA+PKo3exm/liufsclaDvbrm1vkpx9LqUloqrOH7oxMs2hfTlGLRs+kbjEBe3ABRAGdyA==', '2016-07-10 11:43:56', 0, 0, NULL, NULL, NULL, 'a:2:{i:0;s:16:"ROLE_SUPER_ADMIN";i:1;s:10:"ROLE_ADMIN";}', 0, NULL, '2016-03-14 00:00:00', NULL),
(2, 'jhon', 'jhon', 'jhon@gmail.com', 'jhon@gmail.com', 1, 'b575txdkntsgww48o0wc8kgckw448g0', 'h79l++HX0LDSHn0CoPSr+E9VQLMCl90/Mr+KH0SKFyMDjKHSHEbgSssyEpFjc0XMhihpZ1w7o/RRi2RwB4Dwlw==', NULL, 0, 0, NULL, NULL, NULL, 'a:0:{}', 0, NULL, '2012-12-08 00:00:00', NULL),
(3, 'djino', 'djino', 'djino@gmail.com', 'djino@gmail.com', 1, '3ipe758kgt2ckggkckk04g44oskg8og', 'Hyih24lTtOCe17agcGkGprK6vB5X8UrFN/LjGH7rnAb/lldDsEM8nTx2T/gy4IZYdH0AXOfHh5pskvj3rg09Ug==', '2016-03-17 15:47:14', 0, 0, NULL, NULL, NULL, 'a:0:{}', 0, NULL, '2012-12-08 00:00:00', NULL),
(4, 'marc', 'marc', 'marc@gmail.com', 'marc@gmail.com', 1, 'l86cs3vxe40ogkk4c4gk0c8ocwc0wgg', 'NN5kpDOC7kcZxB8t7rlgJ/CiN1tqHnYbEgWf2pwCDvQWbLt5tVMIwWi19l4iRd1VFSo/6ShnTep8lO4CcqySYw==', NULL, 0, 0, NULL, NULL, NULL, 'a:0:{}', 0, NULL, '2012-12-08 00:00:00', NULL),
(5, 'azerty', 'azerty', 'email@gamail.com', 'email@gamail.com', 1, 'lmsldf17srkkcw88wg44cwwk4k80sso', 'f8Hq7Z+6AZiEXRO/xudPpsoQl/mHogOvmbIU2g+YjEnI+NM/2kfmv+x2wkQAnnm0730pDAbW51pACevDf7mJ2w==', NULL, 0, 0, NULL, NULL, NULL, 'a:0:{}', 0, NULL, '1990-10-10 00:00:00', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `user_address`
--

CREATE TABLE `user_address` (
  `user_id` int(11) NOT NULL,
  `address_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `user_address`
--

INSERT INTO `user_address` (`user_id`, `address_id`) VALUES
(1, 1),
(1, 2),
(1, 6),
(2, 3),
(3, 3),
(4, 3),
(5, 1);

--
-- Index pour les tables exportées
--

--
-- Index pour la table `address`
--
ALTER TABLE `address`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_64C19C12B36786B` (`title`);

--
-- Index pour la table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_9474526CA76ED395` (`user_id`),
  ADD KEY `IDX_9474526C613FECDF` (`seance_id`);

--
-- Index pour la table `film`
--
ALTER TABLE `film`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_8244BE22D1A44A91` (`ISAN`);

--
-- Index pour la table `film_category`
--
ALTER TABLE `film_category`
  ADD PRIMARY KEY (`film_id`,`category_id`),
  ADD KEY `IDX_A4CBD6A8567F5183` (`film_id`),
  ADD KEY `IDX_A4CBD6A812469DE2` (`category_id`);

--
-- Index pour la table `film_genre`
--
ALTER TABLE `film_genre`
  ADD PRIMARY KEY (`film_id`,`genre_id`),
  ADD KEY `IDX_1A3CCDA8567F5183` (`film_id`),
  ADD KEY `IDX_1A3CCDA84296D31F` (`genre_id`);

--
-- Index pour la table `genre`
--
ALTER TABLE `genre`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_835033F82B36786B` (`title`);

--
-- Index pour la table `material`
--
ALTER TABLE `material`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_7CBE7595A8117BFE` (`type_material_id`),
  ADD KEY `IDX_7CBE7595A76ED395` (`user_id`);

--
-- Index pour la table `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_B6BD307F613FECDF` (`seance_id`),
  ADD KEY `IDX_B6BD307FF624B39D` (`sender_id`),
  ADD KEY `IDX_B6BD307FCD53EDB6` (`receiver_id`);

--
-- Index pour la table `modality`
--
ALTER TABLE `modality`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `note`
--
ALTER TABLE `note`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_CFBDFA14ECC67A0` (`type_note_id`),
  ADD KEY `IDX_CFBDFA14613FECDF` (`seance_id`),
  ADD KEY `IDX_CFBDFA14A76ED395` (`user_id`),
  ADD KEY `IDX_CFBDFA14145EB451` (`assign_id`);

--
-- Index pour la table `participant`
--
ALTER TABLE `participant`
  ADD PRIMARY KEY (`user_id`,`seance_id`),
  ADD KEY `IDX_D79F6B1134938846` (`state_participant_id`),
  ADD KEY `IDX_D79F6B11A76ED395` (`user_id`),
  ADD KEY `IDX_D79F6B11613FECDF` (`seance_id`);

--
-- Index pour la table `seance`
--
ALTER TABLE `seance`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_D044D5D4F5B7AF75` (`address_id`),
  ADD KEY `IDX_D044D5D42D6D889B` (`modality_id`),
  ADD KEY `IDX_D044D5D4567F5183` (`film_id`),
  ADD KEY `IDX_D044D5D461220EA6` (`creator_id`);

--
-- Index pour la table `seance_material`
--
ALTER TABLE `seance_material`
  ADD PRIMARY KEY (`seance_id`,`material_id`),
  ADD KEY `IDX_F71215FD613FECDF` (`seance_id`),
  ADD KEY `IDX_F71215FDE308AC6F` (`material_id`);

--
-- Index pour la table `seance_participant`
--
ALTER TABLE `seance_participant`
  ADD PRIMARY KEY (`seance_id`,`participant_id`),
  ADD KEY `IDX_2BC67566613FECDF` (`seance_id`),
  ADD KEY `IDX_2BC675669D1C3019` (`participant_id`);

--
-- Index pour la table `seance_user`
--
ALTER TABLE `seance_user`
  ADD PRIMARY KEY (`seance_id`,`user_id`),
  ADD KEY `IDX_4BE2D663613FECDF` (`seance_id`),
  ADD KEY `IDX_4BE2D663A76ED395` (`user_id`);

--
-- Index pour la table `stateParticipant`
--
ALTER TABLE `stateParticipant`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `typeMaterial`
--
ALTER TABLE `typeMaterial`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `typeNote`
--
ALTER TABLE `typeNote`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_8D93D64992FC23A8` (`username_canonical`),
  ADD UNIQUE KEY `UNIQ_8D93D649A0D96FBF` (`email_canonical`);

--
-- Index pour la table `user_address`
--
ALTER TABLE `user_address`
  ADD PRIMARY KEY (`user_id`,`address_id`),
  ADD KEY `IDX_5543718BA76ED395` (`user_id`),
  ADD KEY `IDX_5543718BF5B7AF75` (`address_id`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `address`
--
ALTER TABLE `address`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT pour la table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT pour la table `comment`
--
ALTER TABLE `comment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `film`
--
ALTER TABLE `film`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT pour la table `genre`
--
ALTER TABLE `genre`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT pour la table `material`
--
ALTER TABLE `material`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT pour la table `message`
--
ALTER TABLE `message`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `modality`
--
ALTER TABLE `modality`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT pour la table `note`
--
ALTER TABLE `note`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `seance`
--
ALTER TABLE `seance`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT pour la table `stateParticipant`
--
ALTER TABLE `stateParticipant`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `typeMaterial`
--
ALTER TABLE `typeMaterial`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT pour la table `typeNote`
--
ALTER TABLE `typeNote`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `comment`
--
ALTER TABLE `comment`
  ADD CONSTRAINT `FK_9474526C613FECDF` FOREIGN KEY (`seance_id`) REFERENCES `seance` (`id`),
  ADD CONSTRAINT `FK_9474526CA76ED395` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);

--
-- Contraintes pour la table `film_category`
--
ALTER TABLE `film_category`
  ADD CONSTRAINT `FK_A4CBD6A812469DE2` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_A4CBD6A8567F5183` FOREIGN KEY (`film_id`) REFERENCES `film` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `film_genre`
--
ALTER TABLE `film_genre`
  ADD CONSTRAINT `FK_1A3CCDA84296D31F` FOREIGN KEY (`genre_id`) REFERENCES `genre` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_1A3CCDA8567F5183` FOREIGN KEY (`film_id`) REFERENCES `film` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `material`
--
ALTER TABLE `material`
  ADD CONSTRAINT `FK_7CBE7595A76ED395` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `FK_7CBE7595A8117BFE` FOREIGN KEY (`type_material_id`) REFERENCES `typeMaterial` (`id`);

--
-- Contraintes pour la table `message`
--
ALTER TABLE `message`
  ADD CONSTRAINT `FK_B6BD307F613FECDF` FOREIGN KEY (`seance_id`) REFERENCES `seance` (`id`),
  ADD CONSTRAINT `FK_B6BD307FCD53EDB6` FOREIGN KEY (`receiver_id`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `FK_B6BD307FF624B39D` FOREIGN KEY (`sender_id`) REFERENCES `user` (`id`);

--
-- Contraintes pour la table `note`
--
ALTER TABLE `note`
  ADD CONSTRAINT `FK_CFBDFA14145EB451` FOREIGN KEY (`assign_id`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `FK_CFBDFA14613FECDF` FOREIGN KEY (`seance_id`) REFERENCES `seance` (`id`),
  ADD CONSTRAINT `FK_CFBDFA14A76ED395` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `FK_CFBDFA14ECC67A0` FOREIGN KEY (`type_note_id`) REFERENCES `typeNote` (`id`);

--
-- Contraintes pour la table `participant`
--
ALTER TABLE `participant`
  ADD CONSTRAINT `FK_D79F6B1134938846` FOREIGN KEY (`state_participant_id`) REFERENCES `stateParticipant` (`id`),
  ADD CONSTRAINT `FK_D79F6B11613FECDF` FOREIGN KEY (`seance_id`) REFERENCES `seance` (`id`),
  ADD CONSTRAINT `FK_D79F6B11A76ED395` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);

--
-- Contraintes pour la table `seance`
--
ALTER TABLE `seance`
  ADD CONSTRAINT `FK_D044D5D42D6D889B` FOREIGN KEY (`modality_id`) REFERENCES `modality` (`id`),
  ADD CONSTRAINT `FK_D044D5D4567F5183` FOREIGN KEY (`film_id`) REFERENCES `film` (`id`),
  ADD CONSTRAINT `FK_D044D5D461220EA6` FOREIGN KEY (`creator_id`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `FK_D044D5D4F5B7AF75` FOREIGN KEY (`address_id`) REFERENCES `address` (`id`);

--
-- Contraintes pour la table `seance_material`
--
ALTER TABLE `seance_material`
  ADD CONSTRAINT `FK_F71215FD613FECDF` FOREIGN KEY (`seance_id`) REFERENCES `seance` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_F71215FDE308AC6F` FOREIGN KEY (`material_id`) REFERENCES `material` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `seance_participant`
--
ALTER TABLE `seance_participant`
  ADD CONSTRAINT `FK_2BC67566613FECDF` FOREIGN KEY (`seance_id`) REFERENCES `seance` (`id`),
  ADD CONSTRAINT `FK_2BC675669D1C3019` FOREIGN KEY (`participant_id`) REFERENCES `user` (`id`);

--
-- Contraintes pour la table `seance_user`
--
ALTER TABLE `seance_user`
  ADD CONSTRAINT `FK_4BE2D663613FECDF` FOREIGN KEY (`seance_id`) REFERENCES `seance` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_4BE2D663A76ED395` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `user_address`
--
ALTER TABLE `user_address`
  ADD CONSTRAINT `FK_5543718BA76ED395` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_5543718BF5B7AF75` FOREIGN KEY (`address_id`) REFERENCES `address` (`id`) ON DELETE CASCADE;
