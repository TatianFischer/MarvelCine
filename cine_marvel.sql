-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Client :  localhost
-- Généré le :  Mar 01 Août 2017 à 12:52
-- Version du serveur :  5.7.11
-- Version de PHP :  7.0.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `cine_marvel`
--

-- --------------------------------------------------------

--
-- Structure de la table `covers`
--

CREATE TABLE `covers` (
  `id` int(5) NOT NULL,
  `img` varchar(50) NOT NULL,
  `alt` text NOT NULL,
  `film_id` int(3) NOT NULL,
  `affiche` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

--
-- Contenu de la table `covers`
--

INSERT INTO `covers` (`id`, `img`, `alt`, `film_id`, `affiche`) VALUES
(2, 'ir_1_1.jpg', 'Affiche Iron Man', 1, 1),
(3, 'ir_1_2.jpg', 'Affiche Iron Man', 1, 0),
(4, 'ir_1_3.jpg', 'Iron Man dans son armure. Accroche : Ce n\'est pas l\'armure qui fait le héros. Mais l\'homme qui est à l\'intérieur.', 1, 0),
(5, 'ir_1_4.jpg', 'Affiche Iron Man. Slogan : Fully charged', 1, 0),
(6, 'ir_1_5.jpg', 'Affiche Iron Man. Accroche : Heroes aren\'t born. They\'re built', 1, 0),
(7, 'ihulk_1.jpg', 'Affiche Incroyable Hulk. Bruce Banner avec derrière le dos de Hulk.', 2, 1),
(8, 'ihulk_2.jpg', 'Affiche Incroyable Hulk. Bruce Banner avec en fond une ville de nuit et des hélicoptères l\'éclairant.', 2, 0),
(9, 'ihulk_3.jpg', 'Affiche Incroyable Hulk. Hulk et des hélicoptères en fond.\r\nAccroche : Notre seule espoir est ... incroyable.', 2, 0),
(10, 'ihulk_4.jpg', 'Affiche l\'Incroyable Hulk.\r\nHulk le poing devant près à frapper.', 2, 0),
(11, 'ihulk_5.jpg', 'Affiche l\'Incredible Hulk.\r\nHulk en ombre noire.', 2, 0),
(12, 'ir_2_1.jpg', 'Affiche du film Iron Man 2', 3, 1),
(13, 'ir_2_2.jpg', 'Affiche du film Iron Man 2', 3, 0),
(14, 'ir_2_3.jpg', 'Affiche Iron Man 2 :\r\nIron man et Whiplash (méchant du film)', 3, 0),
(15, 'ir_2_4.jpg', 'Affiche Iron Man 2\r\nWhiplash (méchant du film)', 3, 0),
(16, 'ir_2_5.jpg', 'Affiche Iron Man 2 :\r\nBlack Widow', 3, 0),
(17, 'ir_2_6.jpg', 'Affiche Iron Man 2 :\r\nJames Rhodes (War Machine)\r\n', 3, 0),
(18, 'ir_2_7.jpg', 'Affiche Iron Man 2 :\r\nPepper Potts', 3, 0),
(21, 'thor_1_1.jpg', 'Affiche Thor', 4, 1),
(22, 'thor_1_2.jpg', 'Affiche Thor :\r\nThor de trois quart avec sa cape et son marteau', 4, 0),
(23, 'thor_1_3.jpg', 'Affiche Thor :\r\nCiel nuageux avec une éclaircie illuminant Thor de coté avec son marteau.', 4, 0),
(24, 'thor_1_4.jpg', 'Affiche Thor : Thor au milieu puis dans le sens des aiguilles d\'une montre : Heimdall, Jane Foster, Odin et Loki', 4, 0),
(25, 'thor_1_5.jpg', 'Affiche Thor. Accroche : The God Of Thunder.', 4, 0),
(26, 'thor_1_6.jpg', 'Affiche Thor. Accroche : The God Of Mischief', 4, 0),
(27, 'thor_1_7.jpg', 'Affiche Thor. Accroche : The King Of Asgard', 4, 0),
(28, 'thor_1_8.jpg', 'Affiche Thor. Accroche : The Woman Of Science', 4, 0),
(29, 'cap_1_1.jpg', 'Affiche principale : Captaine America, Peggy Carter, Bucky Barnes, les Commandos Hurlants et Cranes Rouges.', 5, 1),
(30, 'cap_1_2.jpg', 'Affiche Captain America : Bouclier du Captain', 5, 0),
(31, 'cap_1_3.jpg', 'Affiche Captain America', 5, 0),
(32, 'cap_1_4.jpg', 'Affiche Captain America : Peggy Carter', 5, 0),
(33, 'cap_1_5.jpg', 'Affiche Captain America.', 5, 0),
(34, 'av_1_1.jpg', 'Affiche Avengers : Tous les avengers et Nick Fury', 6, 0),
(35, 'av_1_2.jpg', 'Affiche Avengers : Style dessin. Captain America et Thor à l\'avant puis les autres avengers.', 6, 1),
(36, 'av_1_3.jpg', 'Affiche Avengers : style dessin. Captain America en premier.', 6, 0),
(37, 'av_1_4.jpg', 'Affiche Avengers : logo des avengers.', 6, 0),
(38, 'ir_3_1.jpg', 'Affiche Iron Man 3 : Tony en armure Iron Man très abimé protégeant Pepper avec en arrière plan War Machine, le Mandarin et le docteur Aldrich Killian', 7, 1),
(39, 'ir_3_2.jpg', 'Affiche Iron Man 3 : Style dessin. Iron Man et ses autres armures montant vers le ciel sur fond noir', 7, 0),
(40, 'ir_3_3.jpg', 'Affiche Iron Man 3 : Iron Man en chute libre, son armure partant en morceaux', 7, 0),
(41, 'ir_3_4.jpg', 'Affiche Iron Man 3 : War Patriot de trois-quart dos', 7, 0),
(42, 'ir_3_5.jpg', 'Affiche Iron Man 3 : Pepper Potts avec le casque abimé d\'Iron Man dans les mains', 7, 0),
(43, 'ir_3_6.jpg', 'Affiche Iron Man 3 :  Le Mandarin assis sur son trône', 7, 0),
(44, 'ir_3_7.jpg', 'Affiche Iron Man 3 : Dr  Aldrich Killian de trois-quart face', 7, 0);

-- --------------------------------------------------------

--
-- Structure de la table `directors`
--

CREATE TABLE `directors` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

--
-- Contenu de la table `directors`
--

INSERT INTO `directors` (`id`, `name`) VALUES
(1, 'Jan Favreau'),
(2, 'Louis Leterrier'),
(3, 'Kenneth Branagh'),
(4, 'Joe Johnston'),
(5, 'Joss Whedon'),
(6, 'Shane Black'),
(7, 'Alan Taylor'),
(8, 'Anthony et Joe Russo'),
(9, 'James Gunn'),
(10, 'Peyton Reed'),
(11, 'Scott Derrickson'),
(12, 'Jon Watts'),
(13, 'Taika Waitit'),
(14, 'Ryan Coogler'),
(15, 'Anna Boden'),
(16, 'Ryan Fleck');

-- --------------------------------------------------------

--
-- Structure de la table `films`
--

CREATE TABLE `films` (
  `id` int(3) NOT NULL,
  `title` varchar(255) NOT NULL,
  `release_date` date NOT NULL,
  `synopsis` text NOT NULL,
  `duration` int(3) NOT NULL,
  `phase` int(1) NOT NULL,
  `director_id` int(3) NOT NULL,
  `trailer` varchar(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

--
-- Contenu de la table `films`
--

INSERT INTO `films` (`id`, `title`, `release_date`, `synopsis`, `duration`, `phase`, `director_id`, `trailer`) VALUES
(1, 'Iron Man', '2008-04-30', 'Tony Stark, inventeur de génie, vendeur d\'armes et playboy milliardaire, est kidnappé en Aghanistan. Forcé par ses ravisseurs de fabriquer une arme redoutable, il construit en secret une armure high-tech révolutionnaire qu\'il utilise pour s\'échapper. Comprenant la puissance de cette armure, il décide de l\'améliorer et de l\'utiliser pour faire régner la justice et protéger les innocents', 125, 1, 1, '18809687'),
(2, 'The Incredible Hulk', '2008-07-23', 'Le scientifique Bruce Banner cherche désespérément un antidote aux radiations gamma qui ont créé Hulk. Il vit dans l\'ombre, toujours amoureux de la belle Betty Ross et parcourt la planète à la recherche d\'un remède.\r\nLa force destructrice de Hulk attire le Général Thunderbolt Ross et son bras droit Blonsky qui rêvent de l\'utiliser à des fins militaires. Ils tentent de développer un sérum pour créer des soldats surpuissants.\r\nDe retour aux Etats-Unis, Bruce Banner se découvre un nouvel ennemi. Après avoir essayé le sérum expérimental, Blonsky est devenu L\'Abomination, un monstre incontrôlable dont la force pure est même supérieure à celle de Hulk. Devenu fou, il s\'est transformé en plein coeur de New York.\r\nPour sauver la ville de la destruction totale, Bruce Banner va devoir faire appel au monstre qui sommeille en lui...', 112, 1, 2, '18817835'),
(3, 'Iron Man 2', '2010-04-28', 'Le monde sait désormais que l\'inventeur milliardaire Tony Stark et le super-héros Iron Man ne font qu\'un. Malgré la pression du gouvernement, de la presse et du public pour qu\'il partage sa technologie avec l\'armée, Tony n\'est pas disposé à divulguer les secrets de son armure, redoutant que l\'information atterrisse dans de mauvaises mains. Avec Pepper Potts et James \"Rhodey\" Rhodes à ses côtés, Tony va forger de nouvelles alliances et affronter de nouvelles forces toutes-puissantes...', 124, 1, 1, '19108036'),
(4, 'Thor', '2011-04-27', 'Au royaume d’Asgard, Thor est un guerrier aussi puissant qu’arrogant dont les actes téméraires déclenchent une guerre ancestrale. Banni et envoyé sur Terre, par son père Odin, il est condamné à vivre parmi les humains. Mais lorsque les forces du mal de son royaume s’apprêtent à se déchaîner sur la Terre, Thor va apprendre à se comporter en véritable héros…', 114, 1, 3, '19203432'),
(5, 'Captain American : First Avenger', '2011-08-17', 'Captain America: First Avenger nous plonge dans les premières années de l’univers Marvel. Steve Rogers, frêle et timide, se porte volontaire pour participer à un programme expérimental qui va le transformer en un Super Soldat connu sous le nom de Captain America. Allié à Bucky Barnes et Peggy Carter, il sera confronté à la diabolique organisation HYDRA dirigée par le redoutable Red Skull.', 123, 1, 4, '19234124'),
(6, 'Avengers', '2012-04-25', 'Lorsque Nick Fury, le directeur du S.H.I.E.L.D., l\'organisation qui préserve la paix au plan mondial, cherche à former une équipe de choc pour empêcher la destruction du monde, Iron Man, Hulk, Thor, Captain America, Hawkeye et Black Widow répondent présents.\r\nLes Avengers ont beau constituer la plus fantastique des équipes, il leur reste encore à apprendre à travailler ensemble, et non les uns contre les autres, d\'autant que le redoutable Loki a réussi à accéder au Cube Cosmique et à son pouvoir illimité...', 143, 1, 5, '19314006'),
(7, 'Iron Man 3', '2014-04-24', 'Tony Stark, l’industriel flamboyant qui est aussi Iron Man, est confronté cette fois à un ennemi qui va attaquer sur tous les fronts. Lorsque son univers personnel est détruit, Stark se lance dans une quête acharnée pour retrouver les coupables. Plus que jamais, son courage va être mis à l’épreuve, à chaque instant. Dos au mur, il ne peut plus compter que sur ses inventions, son ingéniosité, et son instinct pour protéger ses proches. Alors qu’il se jette dans la bataille, Stark va enfin découvrir la réponse à la question qui le hante secrètement depuis si longtemps : est-ce l’homme qui fait le costume ou bien le costume qui fait l’homme ?', 131, 2, 6, '19484270'),
(8, 'Thor : The Dark World', '2013-10-30', 'Thor : Le Monde des ténèbres nous entraîne dans les nouvelles aventures de Thor, le puissant Avenger, qui lutte pour sauver la Terre et les neuf mondes d’un mystérieux ennemi qui convoite l’univers tout entier… Après les films Marvel Thor et Avengers, Thor se bat pour restaurer l’ordre dans le cosmos, mais une ancienne race, sous la conduite du terrible Malekith, un être assoiffé de vengeance, revient pour répandre les ténèbres. Confronté à un ennemi que même Odin et Asgard ne peuvent contrer, Thor doit s’engager dans son aventure la plus dangereuse et la plus personnelle, au cours de laquelle il va devoir s’allier au traître Loki pour sauver non seulement son peuple et ceux qui lui sont chers, mais aussi l’univers lui-même.', 112, 2, 7, '19536919'),
(9, 'Captain America : The Winter Soldier', '2014-03-26', 'Après les événements cataclysmiques de New York de The Avengers, Steve Rogers aka Captain America vit tranquillement à Washington, D.C. et essaye de s\'adapter au monde moderne. Mais quand un collègue du S.H.I.E.L.D. est attaqué, Steve se retrouve impliqué dans un réseau d\'intrigues qui met le monde en danger. S\'associant à Black Widow, Captain America lutte pour dénoncer une conspiration grandissante, tout en repoussant des tueurs professionnels envoyés pour le faire taire. Quand l\'étendue du plan maléfique est révélée, Captain America et Black Widow sollicite l\'aide d\'un nouvel allié, le Faucon. Cependant, ils se retrouvent bientôt face à un inattendu et redoutable ennemi - le Soldat de l\'Hiver.', 128, 2, 8, '19539268'),
(10, ' Guardians Of The Galaxy', '2014-08-13', 'Peter Quill est un aventurier traqué par tous les chasseurs de primes pour avoir volé un mystérieux globe convoité par le puissant Ronan, dont les agissements menacent l’univers tout entier. Lorsqu’il découvre le véritable pouvoir de ce globe et la menace qui pèse sur la galaxie, il conclut une alliance fragile avec quatre aliens disparates : Rocket, un raton laveur fin tireur, Groot, un humanoïde semblable à un arbre, l’énigmatique et mortelle Gamora, et Drax le Destructeur, qui ne rêve que de vengeance. En les ralliant à sa cause, il les convainc de livrer un ultime combat aussi désespéré soit-il pour sauver ce qui peut encore l’être …', 121, 2, 9, '19546177'),
(11, 'The Avengers : Age of Ultron', '2015-04-22', 'Alors que Tony Stark tente de relancer un programme de maintien de la paix jusque-là suspendu, les choses tournent mal et les super-héros Iron Man, Captain America, Thor, Hulk, Black Widow et Hawkeye vont devoir à nouveau unir leurs forces pour combattre le plus puissant de leurs adversaires : le terrible Ultron, un être technologique terrifiant qui s’est juré d’éradiquer l’espèce humaine.\r\nAfin d’empêcher celui-ci d’accomplir ses sombres desseins, des alliances inattendues se scellent, les entraînant dans une incroyable aventure et une haletante course contre le temps…', 141, 2, 5, '19548973'),
(12, 'Ant-Man', '2015-07-14', 'Scott Lang, cambrioleur de haut vol, va devoir apprendre à se comporter en héros et aider son mentor, le Dr Hank Pym, à protéger le secret de son spectaculaire costume d’Ant-Man, afin d’affronter une effroyable menace…', 117, 2, 10, '19552728'),
(13, 'Captain American : Civil War', '2016-04-18', 'Steve Rogers est désormais à la tête des Avengers, dont la mission est de protéger l\'humanité.. A la suite de l\'une de leurs interventions qui a causé d\'importants dégâts collatéraux, le gouvernement décide de mettre en place un organisme de commandement et de supervision.\r\nCette nouvelle donne provoque une scission au sein de l\'équipe : Steve Rogers reste attaché à sa liberté de s\'engager sans ingérence gouvernementale, tandis que d\'autres se rangent derrière Tony Stark, qui contre toute attente, décide de se soumettre au gouvernement...', 148, 3, 8, '19561381'),
(14, 'Doctor Strange', '2016-10-26', 'Doctor Strange suit l\'histoire du Docteur Stephen Strange, talentueux neurochirurgien qui, après un tragique accident de voiture, doit mettre son égo de côté et apprendre les secrets d\'un monde caché de mysticisme et de dimensions alternatives. Basé à New York, dans le quartier de Greenwich Village, Doctor Strange doit jouer les intermédiaires entre le monde réel et ce qui se trouve au-delà, en utlisant un vaste éventail d\'aptitudes métaphysiques et d\'artefacts pour protéger le Marvel Cinematic Universe.', 115, 3, 11, '19562026'),
(15, 'Guardians of the Galaxy Vol. 2', '2017-04-26', 'Alors qu\'une seconde mixtape offre sa musique, les Gardiens de la galaxie traversent le cosmos à la recherche de nouvelles aventures. Tandis que Groot est revenu en enfance, Peter Quill apprend l\'identité de son père, ce qui n\'est pas sans bouleverser l\'équipe. Alors que d\'anciens ennemis se joignent à eux, les gardiens sont confrontés à de nouveaux dangers...', 136, 3, 9, '19568905'),
(16, 'Spider-Man :  Homecoming', '2017-07-12', 'Après ses spectaculaires débuts dans Captain America : Civil War, le jeune Peter Parker découvre peu à peu sa nouvelle identité, celle de Spider-Man, le super-héros lanceur de toile. Galvanisé par son expérience avec les Avengers, Peter rentre chez lui auprès de sa tante May, sous l’œil attentif de son nouveau mentor, Tony Stark. Il s’efforce de reprendre sa vie d’avant, mais au fond de lui, Peter rêve de se prouver qu’il est plus que le sympathique super héros du quartier. L’apparition d’un nouvel ennemi, le Vautour, va mettre en danger tout ce qui compte pour lui...', 134, 3, 12, '19569522'),
(17, 'Thor 3: Ragnarok', '2017-10-25', 'Privé de son puissant marteau, Thor est retenu prisonnier sur une lointaine planète aux confins de l’univers. Pour sauver Asgard, il va devoir lutter contre le temps afin d’empêcher l’impitoyable Hela d’accomplir le Ragnarök – la destruction de son monde et la fin de la civilisation asgardienne. Mais pour y parvenir, il va d’abord devoir mener un combat titanesque de gladiateurs contre celui qui était autrefois son allié au sein des Avengers : l’incroyable Hulk…', 61, 3, 13, '19573071');

-- --------------------------------------------------------

--
-- Structure de la table `film_personnage`
--

CREATE TABLE `film_personnage` (
  `id` int(3) NOT NULL,
  `perso_id` int(3) NOT NULL,
  `film_id` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `film_personnage`
--

INSERT INTO `film_personnage` (`id`, `perso_id`, `film_id`) VALUES
(1, 1, 2),
(2, 2, 1),
(3, 3, 1),
(4, 4, 1),
(5, 5, 1),
(6, 2, 3),
(7, 3, 3),
(8, 6, 1),
(9, 7, 3),
(10, 8, 3),
(11, 5, 3),
(12, 9, 4),
(13, 10, 4),
(14, 11, 4),
(15, 12, 4),
(16, 13, 4),
(17, 14, 4),
(18, 15, 4),
(19, 5, 4),
(20, 4, 4),
(21, 16, 5),
(22, 17, 5),
(23, 18, 5),
(24, 19, 5),
(25, 5, 5),
(26, 2, 6),
(27, 16, 6),
(28, 20, 6),
(29, 9, 6),
(30, 8, 6),
(31, 15, 6),
(32, 12, 6),
(33, 5, 6),
(34, 4, 6),
(35, 3, 6),
(36, 21, 6),
(37, 2, 7),
(38, 3, 7),
(39, 6, 7),
(40, 9, 8),
(41, 10, 8),
(42, 12, 8),
(43, 13, 8),
(44, 14, 8),
(45, 11, 8),
(46, 16, 9),
(47, 8, 9),
(48, 22, 9),
(49, 5, 9),
(50, 21, 9),
(51, 17, 9),
(52, 19, 9),
(53, 18, 9),
(54, 23, 10),
(55, 24, 10),
(56, 25, 10),
(57, 26, 10),
(58, 27, 10),
(59, 28, 10),
(60, 29, 10),
(61, 30, 10),
(62, 31, 10),
(63, 2, 11),
(64, 16, 11),
(65, 15, 11),
(66, 20, 11),
(67, 9, 11),
(68, 5, 11),
(69, 8, 11),
(70, 32, 11),
(71, 33, 11),
(72, 21, 11),
(73, 6, 11),
(74, 17, 11),
(75, 34, 11),
(76, 13, 11),
(77, 22, 11),
(78, 35, 12),
(79, 36, 12),
(80, 37, 12),
(81, 19, 12),
(82, 17, 12),
(83, 16, 13),
(84, 2, 13),
(85, 8, 13),
(86, 18, 13),
(87, 22, 13),
(88, 6, 13),
(89, 15, 13),
(90, 38, 13),
(91, 34, 13),
(92, 33, 13),
(93, 35, 13),
(94, 39, 13),
(95, 40, 13),
(96, 41, 14),
(97, 23, 15),
(98, 24, 15),
(99, 29, 15),
(100, 30, 15),
(101, 25, 15),
(102, 28, 15),
(103, 27, 15),
(104, 31, 15);

-- --------------------------------------------------------

--
-- Structure de la table `personnages`
--

CREATE TABLE `personnages` (
  `id` int(3) NOT NULL,
  `identity` varchar(191) NOT NULL,
  `alias` varchar(191) DEFAULT NULL,
  `actor` varchar(191) NOT NULL,
  `img` varchar(50) DEFAULT NULL,
  `biography` text,
  `groupe` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `personnages`
--

INSERT INTO `personnages` (`id`, `identity`, `alias`, `actor`, `img`, `biography`, `groupe`) VALUES
(1, 'Bruce Banner', 'Hulk', 'Edward Norton', NULL, 'Scientifique malchanceux', NULL),
(2, 'Tony Stark', 'Iron Man', 'Robert Downey Jr.', 'iron-man.svg', 'Playboy, vantard', 'Avenger'),
(3, 'Pepper Potts', NULL, 'Gwyneth Paltrow', NULL, NULL, NULL),
(4, 'Phil Coulson', 'The Agent', 'Clark Gregg', NULL, NULL, 'Shields'),
(5, 'Nick Fury', NULL, 'Samuel L. Jackson', NULL, NULL, 'Shields'),
(6, 'James Rhodes', 'War Machine / Iron Patriot', 'Don Cheadle', NULL, NULL, NULL),
(7, 'James Rhodes', 'War Machine', 'Terrence Howard', NULL, NULL, NULL),
(8, 'Natasha Romanoff', 'Black Widow', 'Scarlett Johansson', 'black-widow.svg', NULL, 'Shields, Avenger'),
(9, 'Thor Odinson', NULL, 'Chris Hemsworth', 'thor-mjolnir.svg', NULL, 'Avenger'),
(10, 'Jane Foster', NULL, 'Natalie Portman', NULL, NULL, NULL),
(11, 'Odin Borson', NULL, 'Anthony Hopkins', NULL, NULL, NULL),
(12, 'Loki Laufeyson Odinson', NULL, 'Tom Hiddleston', 'loki.svg', NULL, NULL),
(13, 'Heimdall', NULL, 'Idris Elba', NULL, NULL, NULL),
(14, 'Sif', NULL, 'Jaimie Alexander', NULL, NULL, NULL),
(15, 'Clint Barton', 'Hawkeye', 'Jeremy Renner', 'hawkeye.svg', NULL, 'Shields, Avenger'),
(16, 'Steven Rogers', 'Captain American', 'Chris Evans', 'captain-america-adamantium-shield.svg', NULL, 'Avenger'),
(17, 'Peggy Carter', NULL, 'Hayley Atwell', NULL, NULL, NULL),
(18, 'James \"Bucky\" Barnes ', 'Winter Soldier', 'Sebastian Stan', NULL, NULL, NULL),
(19, 'Howard Stark', NULL, 'Dominic Cooper', NULL, NULL, NULL),
(20, 'Bruce Banner', 'Hulk', 'Mark Ruffalo', 'hulk.svg', NULL, 'Avenger'),
(21, 'Agent Maria Hill', NULL, 'Cobie Smulders', NULL, NULL, NULL),
(22, 'Sam Wilson', 'Falcon', 'Anthony Mackie', NULL, NULL, 'Avenger'),
(23, 'Peter Quill', 'Star-Lord', 'Chris Pratt', 'starlord.svg', NULL, 'Gardien de la Galaxie'),
(24, 'Gamora', NULL, 'Zoe Saldana', NULL, NULL, 'Gardien de la Galaxie'),
(25, 'Drax le Destructeur', NULL, 'Dave Bautista', NULL, NULL, 'Gardien de la Galaxie'),
(26, 'Ronan l\'Accusateur', NULL, 'Lee Pace', NULL, NULL, NULL),
(27, 'Nebulla', NULL, 'Karen Gillian', NULL, NULL, NULL),
(28, 'Yondu Udonta', NULL, 'Michael Rooker', NULL, NULL, NULL),
(29, 'Groot', NULL, 'Vin Diesel', NULL, NULL, 'Gardien de la Galaxie'),
(30, 'Rocket Raccoon', NULL, 'Bradley Cooper / Sean Gunn', NULL, NULL, 'Gardien de la Galaxie'),
(31, 'Kraglin', NULL, 'Sean Gunn', NULL, NULL, NULL),
(32, 'Pietro Maximoff', 'Quicksilver', 'Aaron Taylor-Johnson', NULL, NULL, 'Avenger'),
(33, 'Wanda Maximoff', 'Scarlet Witch', 'Elizabeth Olsen', NULL, NULL, 'Avenger'),
(34, 'The Vision', NULL, 'Paul Bettany', NULL, NULL, 'Avenger'),
(35, 'Scott Lang', 'Ant-Man', 'Paul Rudd', NULL, NULL, 'Avenger'),
(36, 'Hope Van Dyne', NULL, 'Evangeline Lilly', NULL, NULL, NULL),
(37, 'Dr Hank Pym', NULL, 'Michael Douglas', NULL, NULL, NULL),
(38, 'T\'Challa', 'The Black Panther', 'Chadwick Boseman', NULL, NULL, 'Avenger'),
(39, 'Sharon Carter', 'Agent 13', 'Emily VanCamp', NULL, NULL, ''),
(40, 'Peter Parker', 'Spiderman', 'Tom Holland', 'spiderman-web.svg', NULL, 'Avenger'),
(41, 'Stephen Strange', 'Doctor Strange', 'Benedict Cumberbatch', 'dr-strange.svg', NULL, '');

--
-- Index pour les tables exportées
--

--
-- Index pour la table `covers`
--
ALTER TABLE `covers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `covers_ibfk_1` (`film_id`);

--
-- Index pour la table `directors`
--
ALTER TABLE `directors`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `films`
--
ALTER TABLE `films`
  ADD PRIMARY KEY (`id`),
  ADD KEY `director_id` (`director_id`);

--
-- Index pour la table `film_personnage`
--
ALTER TABLE `film_personnage`
  ADD PRIMARY KEY (`id`),
  ADD KEY `film_id` (`film_id`),
  ADD KEY `perso_id` (`perso_id`);

--
-- Index pour la table `personnages`
--
ALTER TABLE `personnages`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `covers`
--
ALTER TABLE `covers`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;
--
-- AUTO_INCREMENT pour la table `directors`
--
ALTER TABLE `directors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT pour la table `films`
--
ALTER TABLE `films`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT pour la table `film_personnage`
--
ALTER TABLE `film_personnage`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=105;
--
-- AUTO_INCREMENT pour la table `personnages`
--
ALTER TABLE `personnages`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;
--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `covers`
--
ALTER TABLE `covers`
  ADD CONSTRAINT `covers_ibfk_1` FOREIGN KEY (`film_id`) REFERENCES `films` (`id`) ON UPDATE CASCADE;

--
-- Contraintes pour la table `films`
--
ALTER TABLE `films`
  ADD CONSTRAINT `films_ibfk_1` FOREIGN KEY (`director_id`) REFERENCES `directors` (`id`) ON UPDATE CASCADE;

--
-- Contraintes pour la table `film_personnage`
--
ALTER TABLE `film_personnage`
  ADD CONSTRAINT `film_personnage_ibfk_1` FOREIGN KEY (`film_id`) REFERENCES `films` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `film_personnage_ibfk_2` FOREIGN KEY (`perso_id`) REFERENCES `personnages` (`id`) ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
