-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Apr 13, 2023 at 11:52 AM
-- Server version: 10.5.12-MariaDB-0+deb11u1
-- PHP Version: 7.4.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `zfl2-zle_meuam_1`
--

-- --------------------------------------------------------

--
-- Table structure for table `t_activite_act`
--

CREATE TABLE `t_activite_act` (
  `act_id` int(11) NOT NULL,
  `act_intitule` char(50) DEFAULT NULL,
  `act_date` date DEFAULT NULL,
  `act_code` char(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL,
  `act_description` varchar(1000) DEFAULT NULL,
  `act_fichier` varchar(300) DEFAULT NULL,
  `act_etat` char(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `t_activite_act`
--

INSERT INTO `t_activite_act` (`act_id`, `act_intitule`, `act_date`, `act_code`, `act_description`, `act_fichier`, `act_etat`) VALUES
(5, 'Soirée Farm Kulve Taroth', '2022-11-09', 'TFFACTN00000001', 'Venez nous rejoindre Mardi prochain au lieu habituel pour une soirée coop pour farmer les armes de la Kulve Taroth (pizza et chips et boissons fournies :P)', 'https://static1.millenium.org/articles/7/29/46/67/@/400075-kulve6-article_m-1.jpg', 'P'),
(6, 'Découverte de la nouvelle mise à jour MHR', '2023-01-26', 'TFFACTN00000002', 'La Nouvelle Free Title Update est sortie, et le Velkhana a rejoint le jeu ! Rejoignez nous sur discord pour qu on la découvre tous ensemble!', 'https://static1.millenium.org/articles/8/37/29/48/@/1426155-velkhana01-article_m-1.jpg', 'P'),
(7, 'Préparation Convention', '2023-02-14', 'TFFACTN00000003', 'Nous avons été invités dans une convention par leurs organisateurs, voici comment va se dérouler son organisation', 'fichier01.jpg', 'P'),
(8, 'Aide débutant campagne histoire', '2023-01-05', 'TFFACTN00000004', 'Ils y a de nouveaux joeurs adhérents qui arrivent en nombre depuis le début de cette année alors nous vous proposons de former plusieurs petits groupe afin de sentraider à avancer et finir la campagne solo (fatalis inclut) de World:iceborne', 'https://staticdelivery.nexusmods.com/images/2531/15997654-1589058210.jpg', 'P');

-- --------------------------------------------------------

--
-- Table structure for table `t_anime_ani`
--

CREATE TABLE `t_anime_ani` (
  `cpt_pseudo` varchar(100) NOT NULL,
  `act_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `t_anime_ani`
--

INSERT INTO `t_anime_ani` (`cpt_pseudo`, `act_id`) VALUES
('amelien.lemeur@etudiants.univ-brest.fr', 6),
('amelien.lemeur@etudiants.univ-brest.fr', 8),
('francois.bulldozer@gmail.com', 6),
('michel.vitesse@gmail.com', 5);

-- --------------------------------------------------------

--
-- Table structure for table `t_atelier_atl`
--

CREATE TABLE `t_atelier_atl` (
  `atl_id` int(11) NOT NULL,
  `atl_intitule` char(50) DEFAULT NULL,
  `atl_date` date DEFAULT NULL,
  `atl_texte` varchar(1000) DEFAULT NULL,
  `atl_etat` char(1) DEFAULT NULL,
  `act_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `t_atelier_atl`
--

INSERT INTO `t_atelier_atl` (`atl_id`, `atl_intitule`, `atl_date`, `atl_texte`, `atl_etat`, `act_id`) VALUES
(1, 'Decouverte des secrets du Velkhana', '2023-02-02', 'Vous trouverez ici les bases des connaissances sur le velkhana: une description de son gameplay avec ses attaques et ses phases mais aussi sa fiche de faiblesse, sortie de Iceborne et son armure/ses armes. Bon jeu ! Retrouvez nous sur discord.gg/hsbjhbdsbrvh', 'P', 6),
(3, 'Risen Valstrax, tout ce quil faut savoir', '2023-02-02', 'Vous trouverez ici les bases des connaissances sur le valstrax: une description de son gameplay avec ses attaques et ses phases mais aussi sa fiche de faiblesse et son armure/ses armes. Bon jeu ! Retrouvez nous sur discord.gg/hsbjhbdsbrvh', 'P', 6),
(4, 'Meilleurs Builds damure META', '2023-02-02', 'Avec la nouvelle mise à jour, il faut sattendre à ce que le velkhana et son stuff se retrouvent au centre de la META. Voila donc quelques sets qui peuvent se montrer intéréssant et/ou important . Bon jeu ! Retrouvez nous sur discord.gg/hsbjhbdsbrvh', 'P', 6),
(7, 'Les Meilleurs sets pour progresser dans le jeu', '2023-01-05', 'Pendant la progression dans la campagne de MHWI, il est parfois compliqué de trouver LE meilleur set pour mêler défense, skillset attaque. Voici donc en pièce jointe un court guide et quelques idées !. Bon jeu ! Retrouvez nous sur discord.gg/hsbjhbdsbrvh', 'P', 8),
(8, 'Les Dragons ancien, kécécé?', '2023-01-05', 'Les dragons anciens sont les monstres les plus mysterieux du jeu. Découvrez cette vidéo présentant leur lore et comment les battre.Bon jeu! Retrouvez nous sur discord.gg/hsbjhbdsbrvh', 'P', 8),
(9, 'Patron craft de la Long Sword', '2023-02-14', 'En préparation de la convention, nous vous avons préparé quelques patrons pour vous fabirquer des éléments de cosplay à customiser. Ici, le premier: une long sword. Bon courage ! Retrouvez nous sur discord.gg/hsbjhbdsbrvh', 'P', 7),
(10, 'Patron craft du casque legiana', '2023-02-14', 'En préparation de la convention, nous vous avons préparé quelques patrons pour vous fabirquer des éléments de cosplay à customiser. Ici, le deuxieme: le casque legiana. Bon courage ! Retrouvez nous sur discord.gg/hsbjhbdsbrvh', 'P', 7),
(11, 'Craft en verre/plastique de la potion', '2023-02-14', 'En préparation de la convention, nous vous avons préparé quelques patrons pour vous fabirquer des éléments de cosplay à customiser. Ici, le troisième, plus compliqué: la potion. Bon courage ! Retrouvez nous sur discord.gg/hsbjhbdsbrvh', 'P', 7),
(33, 'Les Bases du gameplay', NULL, 'Voici quelques tutos pour apprendre le gameplay de Monster Hunter', 'P', 8);

-- --------------------------------------------------------

--
-- Table structure for table `t_compte_cpt`
--

CREATE TABLE `t_compte_cpt` (
  `cpt_pseudo` varchar(100) NOT NULL,
  `cpt_mdp` varchar(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `t_compte_cpt`
--

INSERT INTO `t_compte_cpt` (`cpt_pseudo`, `cpt_mdp`) VALUES
('amelien.lemeur@etudiants.univ-brest.fr', '173a316eb78bc7e49a214c183d430724'),
('contact.responsable@thefirstfleet.fr', 'c42e7b6fab5710120033b28db3ce0fac'),
('ellio.chopol@gmail.com', 'b3bc7ff6bff32ec5e319f21f6ea17912'),
('francois.bulldozer@gmail.com', '6d3b42c226e251336f86292b6823620c'),
('izuku.midoriya@gmail.com', 'fa9fb326e1a1e446a10913c25ec879d3'),
('jacqueline.grincement@gmail.com', '0509950dda653a888cc3c0aa65830738'),
('mewenn.lebuan@gmail.com', 'e67d9ce959dde40baf92cbfda6ddf0e0'),
('michel.vitesse@gmail.com', '04e959fb4b65bd908085d1b558ae96ae'),
('philippe.mdya@gmail.com', '022694cb3db79b46e3f07ea31018f291'),
('vm555', '94e24a6a4b98dfde311a915c4dab8af7');

-- --------------------------------------------------------

--
-- Table structure for table `t_configuration_cnf`
--

CREATE TABLE `t_configuration_cnf` (
  `cnf_nom` char(25) NOT NULL,
  `cnf_desc` varchar(3000) DEFAULT NULL,
  `cnf_motdupresident` varchar(3000) DEFAULT NULL,
  `cnf_adressepostale` char(50) DEFAULT NULL,
  `cnf_adressemail` char(50) DEFAULT NULL,
  `cnf_numerotelephone` char(12) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `t_configuration_cnf`
--

INSERT INTO `t_configuration_cnf` (`cnf_nom`, `cnf_desc`, `cnf_motdupresident`, `cnf_adressepostale`, `cnf_adressemail`, `cnf_numerotelephone`) VALUES
('The First Fleet', 'The First Fleet est une association de fans du jeu Monster Hunter World:Iceborne', 'Faire cette association est pour moi un reve devenu réalité, merci à tous', '142ter Rue Auguste Kervern, 29200 Brest', 'thefirstfleetassociation@gmail.com', '0762000068');

-- --------------------------------------------------------

--
-- Table structure for table `t_news_new`
--

CREATE TABLE `t_news_new` (
  `new_id` int(11) NOT NULL,
  `new_titre` varchar(150) DEFAULT NULL,
  `new_texte` varchar(1000) DEFAULT NULL,
  `new_date` date DEFAULT NULL,
  `new_etat` char(1) DEFAULT NULL,
  `cpt_pseudo` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `t_news_new`
--

INSERT INTO `t_news_new` (`new_id`, `new_titre`, `new_texte`, `new_date`, `new_etat`, `cpt_pseudo`) VALUES
(1, 'Nouvelle Title Update sunbreak: Velkhana et Risen Valstrax', 'Cette nuit capcom nous a annoncé l arrivée de deux dragons anciens, le velkhana, faisant son retour après nous avoir été présenté dans MHWI puis le valstrax, qui obtient une version encore plus puissante', '2023-02-01', 'P', 'amelien.lemeur@etudiants.univ-brest.fr'),
(3, 'François Bulldozer nous rejoint !', 'François Bulldozer, que vous connaissez tous en tant qu adhérent nous rejoint en ant quanimateur,souhaitez lui la bienvenue !', '2022-08-27', 'P', 'michel.vitesse@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `t_profil_pfl`
--

CREATE TABLE `t_profil_pfl` (
  `pfl_prenom` varchar(80) DEFAULT NULL,
  `pfl_nom` varchar(80) DEFAULT NULL,
  `pfl_validite` char(1) DEFAULT NULL,
  `pfl_role` char(1) DEFAULT NULL,
  `pfl_date` date DEFAULT NULL,
  `cpt_pseudo` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `t_profil_pfl`
--

INSERT INTO `t_profil_pfl` (`pfl_prenom`, `pfl_nom`, `pfl_validite`, `pfl_role`, `pfl_date`, `cpt_pseudo`) VALUES
('Amélien', 'Le Meur', 'A', 'R', '2022-12-29', 'amelien.lemeur@etudiants.univ-brest.fr'),
('contact', 'responsable', 'A', 'R', '2023-01-26', 'contact.responsable@thefirstfleet.fr'),
('Ellio', 'Chopol', 'A', 'A', '2023-01-26', 'ellio.chopol@gmail.com'),
('François', 'Bulldozer', 'A', 'A', '2023-01-26', 'francois.bulldozer@gmail.com'),
('Izuku', 'Midoriya', 'A', 'A', '2023-01-26', 'izuku.midoriya@gmail.com'),
('Jacqueline', 'Grincement', 'A', 'A', '2023-01-26', 'jacqueline.grincement@gmail.com'),
('Mewenn', 'Le Buan', 'A', 'A', '2023-01-26', 'mewenn.lebuan@gmail.com'),
('Michel', 'Vitesse', 'A', 'R', '2023-01-26', 'michel.vitesse@gmail.com'),
('Philippe', 'Le Meur', 'D', 'A', '2023-04-05', 'philippe.mdya@gmail.com'),
('vm555', 'o\'tool', 'A', 'A', '2023-04-13', 'vm555');

-- --------------------------------------------------------

--
-- Table structure for table `t_ressource_rsc`
--

CREATE TABLE `t_ressource_rsc` (
  `rsc_id` int(11) NOT NULL,
  `rsc_titre` varchar(50) DEFAULT NULL,
  `rsc_desc` varchar(100) DEFAULT NULL,
  `rsc_type` tinyint(4) DEFAULT NULL,
  `rsc_chemin` varchar(300) DEFAULT NULL,
  `atl_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `t_ressource_rsc`
--

INSERT INTO `t_ressource_rsc` (`rsc_id`, `rsc_titre`, `rsc_desc`, `rsc_type`, `rsc_chemin`, `atl_id`) VALUES
(1, 'Dragons anciens', 'Video decrivant les dragons anciens', 2, 'https://www.youtube.com/watch?v=EWGKv173x0U', 8),
(2, 'Fatalis', 'image du fatalis', 1, '../media/Fatalis.webp', 8),
(3, 'Gogmazios', 'image du gogmazios', 1, '../media/gogmazios.jpg_large', 8),
(4, 'Velkhana', 'image de la velkhana', 1, 'https://static1.millenium.org/articles/8/37/29/48/@/1426155-velkhana01-article_m-1.jpg', 1),
(5, 'Velkhana Weaknesses', 'faiblesses velkhana', 1, 'https://img.gamewith.net/img/original_c82dbf34964426465d9a94265b180d92.jpg', 1),
(6, 'Gameplay', 'Boss fight velkhana', 2, 'https://www.youtube.com/watch?v=QExRmPLdqNg', 1),
(10, 'valstrax', 'image du valstrax', 1, 'siteweb/media/valstrax.jpg', 3),
(12, 'valstraxarmure', 'image de larmure valstrax', 2, 'https://preview.redd.it/pc6dj0el8p171.jpg?auto=webp&s=57ef60c1e9c3667d9e871ee342637f006e447508', 3),
(13, 'valstraxfaiblesses', 'faiblesses du valstrax', 2, 'https://static1.millenium.org/articles/0/37/96/50/@/1498240-capture-05292021-143603-article_m-1.jpg', 3),
(14, 'armuresmeta', 'pdf présentant la meta', 3, 'siteweb/autres/meta.pdf', 4),
(15, 'armures', 'images avec plusieurs sets', 1, 'siteweb/media/sets', 4),
(16, 'skills', 'images avec des exemples de talents équipables', 1, 'siteweb/media/skills', 4),
(17, 'armuresdebutants', 'pdf présentant la meta pour lhistoire', 3, 'siteweb/autres/metadeb.pdf', 7),
(18, 'armuresdeb', 'images avec plusieurs sets', 1, 'siteweb/media/sets', 7),
(19, 'skillsdeb', 'images avec des exemples de talents équipables', 1, '../media/skills', 7),
(20, 'patroncraftlongsword', 'pdf patron à découper pour faire une longsword en carton', 3, 'siteweb/media/patronls', 9),
(21, 'tutorielcraftlongsword', 'pdf tutoriel à suivre pour faire une longsword en carton', 3, 'siteweb/media/tutols', 9),
(22, 'inspirationcraftlongsword', 'modèle de la longsword en carton', 3, 'https://static.wikia.nocookie.net/monsterhunter/images/9/90/MHO-Long_Sword_Render_019.png/revision/latest?cb=20200812070412', 9),
(23, 'patroncraftcasque', 'pdf patron à découper pour faire un casque en carton', 3, 'siteweb/media/patroncasque', 10),
(24, 'tutorielcraftcasque', 'pdf tutoriel à suivre pour faire un casque  en carton', 3, '../media/tof.jpg', 10),
(25, 'inspirationcraftcasque', 'modèle du casque en carton', 3, 'https://external-preview.redd.it/Wtl3yZk9UJ1qGedpWWszpzqxBoWa9Jr-KTC72zorjT4.jpg?width=640&crop=smart&auto=webp&s=455ffd83443be3b85b35cbb245e37568e676ac35', 10),
(27, 'recettepotion', 'pdf listant les ingrédients et la recette à suivre pour faire le liquide de la potion ', 3, 'siteweb/media/recettepotion', 11),
(28, 'tutorielcraftpotion', 'pdf tutoriel à suivre pour faire la potion et décorer lobjet', 3, 'siteweb/media/tutopotion', 11),
(29, 'inspirationcraftpotion', 'modèle de la potion', 3, 'https://m.media-amazon.com/images/I/413CgtC4OKL.jpg', 11),
(34, 'Insect-Glaive Tuto', 'Tuto insect glaive', 4, '../media/Monster Hunter World  Insect Glaive Tutorial.mp4', 33),
(35, 'Long Sword Tuto', 'Tuto Long Sword', 4, '../media/Monster Hunter World  Long Sword Tutorial.mp4', 33),
(36, 'Switch Axe Tuto', 'Tuto Switch Axe', 4, '../media/Monster Hunter World  Switch Axe Tutorial.mp4', 33);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `t_activite_act`
--
ALTER TABLE `t_activite_act`
  ADD PRIMARY KEY (`act_id`);

--
-- Indexes for table `t_anime_ani`
--
ALTER TABLE `t_anime_ani`
  ADD PRIMARY KEY (`cpt_pseudo`,`act_id`),
  ADD KEY `fk_anime_activite` (`act_id`);

--
-- Indexes for table `t_atelier_atl`
--
ALTER TABLE `t_atelier_atl`
  ADD PRIMARY KEY (`atl_id`),
  ADD KEY `fk_atelier` (`act_id`);

--
-- Indexes for table `t_compte_cpt`
--
ALTER TABLE `t_compte_cpt`
  ADD PRIMARY KEY (`cpt_pseudo`);

--
-- Indexes for table `t_configuration_cnf`
--
ALTER TABLE `t_configuration_cnf`
  ADD PRIMARY KEY (`cnf_nom`);

--
-- Indexes for table `t_news_new`
--
ALTER TABLE `t_news_new`
  ADD PRIMARY KEY (`new_id`),
  ADD KEY `fk_profile` (`cpt_pseudo`);

--
-- Indexes for table `t_profil_pfl`
--
ALTER TABLE `t_profil_pfl`
  ADD PRIMARY KEY (`cpt_pseudo`);

--
-- Indexes for table `t_ressource_rsc`
--
ALTER TABLE `t_ressource_rsc`
  ADD PRIMARY KEY (`rsc_id`),
  ADD KEY `fk_ressource` (`atl_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `t_activite_act`
--
ALTER TABLE `t_activite_act`
  MODIFY `act_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `t_atelier_atl`
--
ALTER TABLE `t_atelier_atl`
  MODIFY `atl_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `t_news_new`
--
ALTER TABLE `t_news_new`
  MODIFY `new_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `t_ressource_rsc`
--
ALTER TABLE `t_ressource_rsc`
  MODIFY `rsc_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `t_anime_ani`
--
ALTER TABLE `t_anime_ani`
  ADD CONSTRAINT `fk_anime_activite` FOREIGN KEY (`act_id`) REFERENCES `t_activite_act` (`act_id`),
  ADD CONSTRAINT `fk_anime_pseudo` FOREIGN KEY (`cpt_pseudo`) REFERENCES `t_compte_cpt` (`cpt_pseudo`);

--
-- Constraints for table `t_atelier_atl`
--
ALTER TABLE `t_atelier_atl`
  ADD CONSTRAINT `fk_atelier` FOREIGN KEY (`act_id`) REFERENCES `t_activite_act` (`act_id`);

--
-- Constraints for table `t_news_new`
--
ALTER TABLE `t_news_new`
  ADD CONSTRAINT `fk_profile` FOREIGN KEY (`cpt_pseudo`) REFERENCES `t_compte_cpt` (`cpt_pseudo`);

--
-- Constraints for table `t_profil_pfl`
--
ALTER TABLE `t_profil_pfl`
  ADD CONSTRAINT `fk_profil` FOREIGN KEY (`cpt_pseudo`) REFERENCES `t_compte_cpt` (`cpt_pseudo`);

--
-- Constraints for table `t_ressource_rsc`
--
ALTER TABLE `t_ressource_rsc`
  ADD CONSTRAINT `fk_ressource` FOREIGN KEY (`atl_id`) REFERENCES `t_atelier_atl` (`atl_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
