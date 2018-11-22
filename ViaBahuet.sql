-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le :  jeu. 22 nov. 2018 à 10:28
-- Version du serveur :  10.1.35-MariaDB
-- Version de PHP :  7.2.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `ViaBahuet`
--
CREATE DATABASE IF NOT EXISTS `ViaBahuet` DEFAULT CHARACTER SET latin1 COLLATE latin1_bin;
USE `ViaBahuet`;

-- --------------------------------------------------------

--
-- Structure de la table `ajoute_amis`
--

CREATE TABLE `ajoute_amis` (
  `id_user` int(11) NOT NULL,
  `id_user_Eleve` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_bin;

-- --------------------------------------------------------

--
-- Structure de la table `Categorie`
--

CREATE TABLE `Categorie` (
  `id_cat` int(11) NOT NULL,
  `lib_cat` varchar(255) COLLATE latin1_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_bin;

-- --------------------------------------------------------

--
-- Structure de la table `cree_event`
--

CREATE TABLE `cree_event` (
  `id_user` int(11) NOT NULL,
  `id_event` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_bin;

-- --------------------------------------------------------

--
-- Structure de la table `Diplome`
--

CREATE TABLE `Diplome` (
  `id_diplome` int(11) NOT NULL,
  `lib_dip` varchar(255) COLLATE latin1_bin NOT NULL,
  `desc_dip` varchar(255) COLLATE latin1_bin NOT NULL,
  `photo_prom` varchar(255) COLLATE latin1_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_bin;

-- --------------------------------------------------------

--
-- Structure de la table `Eleve`
--

CREATE TABLE `Eleve` (
  `id_user` int(11) NOT NULL,
  `prenom_eleve` varchar(30) COLLATE latin1_bin NOT NULL,
  `date_naiss` date NOT NULL,
  `choix_position` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_bin;

--
-- Déchargement des données de la table `Eleve`
--

INSERT INTO `Eleve` (`id_user`, `prenom_eleve`, `date_naiss`, `choix_position`) VALUES
(14, 'Thibault', '0000-00-00', 0),
(15, 'Yann', '0000-00-00', 1),
(31, 'test', '2018-11-22', 0),
(34, 'Thibault', '0000-00-00', 0),
(38, 'Eleve', '0000-00-00', 0);

-- --------------------------------------------------------

--
-- Structure de la table `eleve_diplome`
--

CREATE TABLE `eleve_diplome` (
  `id_diplome` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `date_debut_dipl` date NOT NULL,
  `date_opt_dipl` date NOT NULL,
  `desc_user_dipl` longtext COLLATE latin1_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_bin;

-- --------------------------------------------------------

--
-- Structure de la table `eleve_pref`
--

CREATE TABLE `eleve_pref` (
  `id_pref` int(11) NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_bin;

--
-- Déchargement des données de la table `eleve_pref`
--

INSERT INTO `eleve_pref` (`id_pref`, `id_user`) VALUES
(1, 38),
(3, 38),
(5, 38),
(6, 38);

-- --------------------------------------------------------

--
-- Structure de la table `Entreprise`
--

CREATE TABLE `Entreprise` (
  `id_user` int(11) NOT NULL,
  `nom_resp` varchar(30) COLLATE latin1_bin NOT NULL,
  `code_APE` varchar(5) COLLATE latin1_bin NOT NULL,
  `site_web` varchar(255) COLLATE latin1_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_bin;

--
-- Déchargement des données de la table `Entreprise`
--

INSERT INTO `Entreprise` (`id_user`, `nom_resp`, `code_APE`, `site_web`) VALUES
(32, 'DUPONDV2', '11009', 'google.fr'),
(39, 'Dupond', '11009', 'http://uxart.io/downloads/openlist-html/all-template/index.html');

-- --------------------------------------------------------

--
-- Structure de la table `ent_offre`
--

CREATE TABLE `ent_offre` (
  `id_offre` int(11) NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_bin;

-- --------------------------------------------------------

--
-- Structure de la table `Evenement`
--

CREATE TABLE `Evenement` (
  `id_event` int(11) NOT NULL,
  `date_even` date NOT NULL,
  `desc_event` longtext COLLATE latin1_bin NOT NULL,
  `id_type_event` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_bin;

-- --------------------------------------------------------

--
-- Structure de la table `OEmploi`
--

CREATE TABLE `OEmploi` (
  `id_offre` int(11) NOT NULL,
  `salaire_emp` double NOT NULL,
  `desc_emp` longtext COLLATE latin1_bin NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_user_Eleve` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_bin;

-- --------------------------------------------------------

--
-- Structure de la table `Offre`
--

CREATE TABLE `Offre` (
  `id_offre` int(11) NOT NULL,
  `lib_offre` varchar(255) COLLATE latin1_bin NOT NULL,
  `niveau_req` varchar(255) COLLATE latin1_bin NOT NULL,
  `date_debut_offre` date NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_user_Eleve` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_bin;

-- --------------------------------------------------------

--
-- Structure de la table `OStage`
--

CREATE TABLE `OStage` (
  `id_offre` int(11) NOT NULL,
  `date_fin_stage` date NOT NULL,
  `note_user_stage` int(11) NOT NULL,
  `desc_user_stage` longtext COLLATE latin1_bin NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_user_Eleve` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_bin;

-- --------------------------------------------------------

--
-- Structure de la table `participe_event`
--

CREATE TABLE `participe_event` (
  `id_event` int(11) NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_bin;

-- --------------------------------------------------------

--
-- Structure de la table `Post`
--

CREATE TABLE `Post` (
  `id_post` int(11) NOT NULL,
  `titre_post` varchar(255) COLLATE latin1_bin NOT NULL,
  `contenu_post` longtext COLLATE latin1_bin NOT NULL,
  `date_post` date NOT NULL,
  `heure_post` time NOT NULL,
  `id_cat` int(11) NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_bin;

-- --------------------------------------------------------

--
-- Structure de la table `Preferences`
--

CREATE TABLE `Preferences` (
  `id_pref` int(11) NOT NULL,
  `lib_pref` varchar(255) COLLATE latin1_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_bin;

--
-- Déchargement des données de la table `Preferences`
--

INSERT INTO `Preferences` (`id_pref`, `lib_pref`) VALUES
(1, 'Voyages'),
(2, 'Musique'),
(3, 'Entrepreneuriat'),
(4, 'Réseaux Sociaux'),
(5, 'Sport'),
(6, 'Informatique'),
(7, 'Graphisme'),
(8, 'Artisanat'),
(9, 'Cinéma'),
(10, 'Nourriture'),
(11, 'Séries TV'),
(12, 'Livre'),
(13, 'Mode'),
(14, 'Aide Social'),
(15, 'Jeux'),
(16, 'Jardinage'),
(17, 'Animaux');

-- --------------------------------------------------------

--
-- Structure de la table `pref_offre`
--

CREATE TABLE `pref_offre` (
  `id_offre` int(11) NOT NULL,
  `id_pref` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_bin;

-- --------------------------------------------------------

--
-- Structure de la table `repond_post`
--

CREATE TABLE `repond_post` (
  `id_user` int(11) NOT NULL,
  `id_post` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_bin;

-- --------------------------------------------------------

--
-- Structure de la table `type_event`
--

CREATE TABLE `type_event` (
  `id_type_event` int(11) NOT NULL,
  `lib_type_event` varchar(255) COLLATE latin1_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_bin;

-- --------------------------------------------------------

--
-- Structure de la table `Utilisateur`
--

CREATE TABLE `Utilisateur` (
  `id_user` int(11) NOT NULL,
  `nom_user` varchar(30) COLLATE latin1_bin NOT NULL,
  `login_user` varchar(30) COLLATE latin1_bin NOT NULL,
  `mdp_user` varchar(255) COLLATE latin1_bin NOT NULL,
  `email_user` varchar(30) COLLATE latin1_bin NOT NULL,
  `tel_ser` int(11) NOT NULL,
  `num_addr_user` varchar(6) COLLATE latin1_bin NOT NULL,
  `rue_addr_user` varchar(100) COLLATE latin1_bin NOT NULL,
  `CP_addr_user` int(11) NOT NULL,
  `ville_addr_user` varchar(40) COLLATE latin1_bin NOT NULL,
  `photo_user` longtext COLLATE latin1_bin,
  `desc_user` longtext COLLATE latin1_bin,
  `mail_check` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_bin;

--
-- Déchargement des données de la table `Utilisateur`
--

INSERT INTO `Utilisateur` (`id_user`, `nom_user`, `login_user`, `mdp_user`, `email_user`, `tel_ser`, `num_addr_user`, `rue_addr_user`, `CP_addr_user`, `ville_addr_user`, `photo_user`, `desc_user`, `mail_check`) VALUES
(14, 'Nesti', 'thibe19', '$2y$10$OXZY/NBZO1i0yCkZKg9wtOLHh/Ca2H2kSRkO0YdFBJrQw3aYDynUm', 'thibaultnesti@gmail.com', 2147483647, '18 Bis', 'rue Blanche Selva', 19100, 'Brive-La-Gaillarde', 'purple_color_burst-wallpaper-3840x2160.jpg', '', 0),
(15, 'Ther', 'Runcan', '$2y$10$.J6N64Bfg3znSElKGqhhFO9M92eCd7Xc/5QUsfUzuWQufCrzIpZkO', 'yannther99@gmail.com', 553558473, '21', 'Route des abeuils', 24570, 'Le lardin saint lazare', '', '', 0),
(31, 'test', 'test', 'test', 'test@test.fr', 0, 'Rue du', 'test', 75000, 'Paris', '123456', 'salut', 0),
(32, 'Nesti', 'ent2', '$2y$10$Jtr1vyYYQPRdunZ1E1Uh0.1dWbH.BPUHs6KbaSM0HWr6I.bBYWx66', 'ent_test2@ent.fr', 0, 'rue de', 'azeaze', 67000, 'Saint etienne', '', '', 0),
(34, 'CASINO', 'adminCasino', '$2y$10$MrxDDRvPfzzjQlNhysxIKe6fVmZZD7dmZqlwJV5YgGEOD8bf1iVtG', 'nestifamily@yahoo.fr', 0, 'avenue', 'azeaze', 33000, 'BORDEAUX', '', '', 0),
(38, 'eleve', 'eleve', '$2y$10$HfEEvkWkEeW2F5O/ovw5DO0CCu7ZfYzb7CbhcK3EpU/HpyAH1oztu', 'eleve@eleve.fr', 0, '123', 'rue des eleves', 0, 'eleve', '', '', 0),
(39, 'ent', 'ent', '$2y$10$tTraSuKc4kR7Ny44GXwtcebnavkqjmNe7pVnP3xGbouazLsgdx08W', 'ent@ent.fr', 0, '21', 'rue de la paix', 67000, 'Saint etienne', '', '', 0);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `ajoute_amis`
--
ALTER TABLE `ajoute_amis`
  ADD PRIMARY KEY (`id_user`,`id_user_Eleve`),
  ADD KEY `id_user_Eleve` (`id_user_Eleve`);

--
-- Index pour la table `Categorie`
--
ALTER TABLE `Categorie`
  ADD PRIMARY KEY (`id_cat`);

--
-- Index pour la table `cree_event`
--
ALTER TABLE `cree_event`
  ADD PRIMARY KEY (`id_user`,`id_event`),
  ADD KEY `cree_event_Evenement0_FK` (`id_event`);

--
-- Index pour la table `Diplome`
--
ALTER TABLE `Diplome`
  ADD PRIMARY KEY (`id_diplome`);

--
-- Index pour la table `Eleve`
--
ALTER TABLE `Eleve`
  ADD PRIMARY KEY (`id_user`);

--
-- Index pour la table `eleve_diplome`
--
ALTER TABLE `eleve_diplome`
  ADD PRIMARY KEY (`id_diplome`,`id_user`),
  ADD KEY `eleve_diplome_Eleve0_FK` (`id_user`);

--
-- Index pour la table `eleve_pref`
--
ALTER TABLE `eleve_pref`
  ADD PRIMARY KEY (`id_pref`,`id_user`),
  ADD KEY `eleve_pref_Eleve0_FK` (`id_user`);

--
-- Index pour la table `Entreprise`
--
ALTER TABLE `Entreprise`
  ADD PRIMARY KEY (`id_user`);

--
-- Index pour la table `ent_offre`
--
ALTER TABLE `ent_offre`
  ADD PRIMARY KEY (`id_offre`,`id_user`),
  ADD KEY `ent_offre_Entreprise0_FK` (`id_user`);

--
-- Index pour la table `Evenement`
--
ALTER TABLE `Evenement`
  ADD PRIMARY KEY (`id_event`),
  ADD KEY `Evenement_type_event_FK` (`id_type_event`);

--
-- Index pour la table `OEmploi`
--
ALTER TABLE `OEmploi`
  ADD PRIMARY KEY (`id_offre`),
  ADD KEY `OEmploi_Eleve0_FK` (`id_user`),
  ADD KEY `OEmploi_Eleve1_FK` (`id_user_Eleve`);

--
-- Index pour la table `Offre`
--
ALTER TABLE `Offre`
  ADD PRIMARY KEY (`id_offre`),
  ADD KEY `Offre_Eleve_FK` (`id_user`),
  ADD KEY `Offre_Eleve0_FK` (`id_user_Eleve`);

--
-- Index pour la table `OStage`
--
ALTER TABLE `OStage`
  ADD PRIMARY KEY (`id_offre`),
  ADD KEY `OStage_Eleve0_FK` (`id_user`),
  ADD KEY `OStage_Eleve1_FK` (`id_user_Eleve`);

--
-- Index pour la table `participe_event`
--
ALTER TABLE `participe_event`
  ADD PRIMARY KEY (`id_event`,`id_user`),
  ADD KEY `participe_event_Utilisateur0_FK` (`id_user`);

--
-- Index pour la table `Post`
--
ALTER TABLE `Post`
  ADD PRIMARY KEY (`id_post`),
  ADD KEY `Post_Categorie_FK` (`id_cat`),
  ADD KEY `Post_Utilisateur0_FK` (`id_user`);

--
-- Index pour la table `Preferences`
--
ALTER TABLE `Preferences`
  ADD PRIMARY KEY (`id_pref`);

--
-- Index pour la table `pref_offre`
--
ALTER TABLE `pref_offre`
  ADD PRIMARY KEY (`id_offre`,`id_pref`),
  ADD KEY `pref_offre_Preferences0_FK` (`id_pref`);

--
-- Index pour la table `repond_post`
--
ALTER TABLE `repond_post`
  ADD PRIMARY KEY (`id_user`,`id_post`),
  ADD KEY `repond_post_Post0_FK` (`id_post`);

--
-- Index pour la table `type_event`
--
ALTER TABLE `type_event`
  ADD PRIMARY KEY (`id_type_event`);

--
-- Index pour la table `Utilisateur`
--
ALTER TABLE `Utilisateur`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `Categorie`
--
ALTER TABLE `Categorie`
  MODIFY `id_cat` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `Diplome`
--
ALTER TABLE `Diplome`
  MODIFY `id_diplome` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `Evenement`
--
ALTER TABLE `Evenement`
  MODIFY `id_event` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `Offre`
--
ALTER TABLE `Offre`
  MODIFY `id_offre` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `Post`
--
ALTER TABLE `Post`
  MODIFY `id_post` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `Preferences`
--
ALTER TABLE `Preferences`
  MODIFY `id_pref` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT pour la table `type_event`
--
ALTER TABLE `type_event`
  MODIFY `id_type_event` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `Utilisateur`
--
ALTER TABLE `Utilisateur`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `ajoute_amis`
--
ALTER TABLE `ajoute_amis`
  ADD CONSTRAINT `ajoute_amis_Eleve0_FK` FOREIGN KEY (`id_user_Eleve`) REFERENCES `Eleve` (`id_user`),
  ADD CONSTRAINT `ajoute_amis_Eleve_FK` FOREIGN KEY (`id_user`) REFERENCES `Eleve` (`id_user`),
  ADD CONSTRAINT `id_user_Eleve` FOREIGN KEY (`id_user_Eleve`) REFERENCES `Eleve` (`id_user`);

--
-- Contraintes pour la table `cree_event`
--
ALTER TABLE `cree_event`
  ADD CONSTRAINT `cree_event_Evenement0_FK` FOREIGN KEY (`id_event`) REFERENCES `Evenement` (`id_event`),
  ADD CONSTRAINT `cree_event_Utilisateur_FK` FOREIGN KEY (`id_user`) REFERENCES `Utilisateur` (`id_user`);

--
-- Contraintes pour la table `Eleve`
--
ALTER TABLE `Eleve`
  ADD CONSTRAINT `Eleve_Utilisateur_FK` FOREIGN KEY (`id_user`) REFERENCES `Utilisateur` (`id_user`);

--
-- Contraintes pour la table `eleve_diplome`
--
ALTER TABLE `eleve_diplome`
  ADD CONSTRAINT `eleve_diplome_Diplome_FK` FOREIGN KEY (`id_diplome`) REFERENCES `Diplome` (`id_diplome`),
  ADD CONSTRAINT `eleve_diplome_Eleve0_FK` FOREIGN KEY (`id_user`) REFERENCES `Eleve` (`id_user`);

--
-- Contraintes pour la table `eleve_pref`
--
ALTER TABLE `eleve_pref`
  ADD CONSTRAINT `eleve_pref_Eleve0_FK` FOREIGN KEY (`id_user`) REFERENCES `Eleve` (`id_user`),
  ADD CONSTRAINT `eleve_pref_Preferences_FK` FOREIGN KEY (`id_pref`) REFERENCES `Preferences` (`id_pref`);

--
-- Contraintes pour la table `Entreprise`
--
ALTER TABLE `Entreprise`
  ADD CONSTRAINT `Entreprise_Utilisateur_FK` FOREIGN KEY (`id_user`) REFERENCES `Utilisateur` (`id_user`);

--
-- Contraintes pour la table `ent_offre`
--
ALTER TABLE `ent_offre`
  ADD CONSTRAINT `ent_offre_Entreprise0_FK` FOREIGN KEY (`id_user`) REFERENCES `Entreprise` (`id_user`),
  ADD CONSTRAINT `ent_offre_Offre_FK` FOREIGN KEY (`id_offre`) REFERENCES `Offre` (`id_offre`);

--
-- Contraintes pour la table `Evenement`
--
ALTER TABLE `Evenement`
  ADD CONSTRAINT `Evenement_type_event_FK` FOREIGN KEY (`id_type_event`) REFERENCES `type_event` (`id_type_event`);

--
-- Contraintes pour la table `OEmploi`
--
ALTER TABLE `OEmploi`
  ADD CONSTRAINT `OEmploi_Eleve0_FK` FOREIGN KEY (`id_user`) REFERENCES `Eleve` (`id_user`),
  ADD CONSTRAINT `OEmploi_Eleve1_FK` FOREIGN KEY (`id_user_Eleve`) REFERENCES `Eleve` (`id_user`),
  ADD CONSTRAINT `OEmploi_Offre_FK` FOREIGN KEY (`id_offre`) REFERENCES `Offre` (`id_offre`);

--
-- Contraintes pour la table `Offre`
--
ALTER TABLE `Offre`
  ADD CONSTRAINT `Offre_Eleve0_FK` FOREIGN KEY (`id_user_Eleve`) REFERENCES `Eleve` (`id_user`),
  ADD CONSTRAINT `Offre_Eleve_FK` FOREIGN KEY (`id_user`) REFERENCES `Eleve` (`id_user`);

--
-- Contraintes pour la table `OStage`
--
ALTER TABLE `OStage`
  ADD CONSTRAINT `OStage_Eleve0_FK` FOREIGN KEY (`id_user`) REFERENCES `Eleve` (`id_user`),
  ADD CONSTRAINT `OStage_Eleve1_FK` FOREIGN KEY (`id_user_Eleve`) REFERENCES `Eleve` (`id_user`),
  ADD CONSTRAINT `OStage_Offre_FK` FOREIGN KEY (`id_offre`) REFERENCES `Offre` (`id_offre`);

--
-- Contraintes pour la table `participe_event`
--
ALTER TABLE `participe_event`
  ADD CONSTRAINT `participe_event_Evenement_FK` FOREIGN KEY (`id_event`) REFERENCES `Evenement` (`id_event`),
  ADD CONSTRAINT `participe_event_Utilisateur0_FK` FOREIGN KEY (`id_user`) REFERENCES `Utilisateur` (`id_user`);

--
-- Contraintes pour la table `Post`
--
ALTER TABLE `Post`
  ADD CONSTRAINT `Post_Categorie_FK` FOREIGN KEY (`id_cat`) REFERENCES `Categorie` (`id_cat`),
  ADD CONSTRAINT `Post_Utilisateur0_FK` FOREIGN KEY (`id_user`) REFERENCES `Utilisateur` (`id_user`);

--
-- Contraintes pour la table `pref_offre`
--
ALTER TABLE `pref_offre`
  ADD CONSTRAINT `pref_offre_Offre_FK` FOREIGN KEY (`id_offre`) REFERENCES `Offre` (`id_offre`),
  ADD CONSTRAINT `pref_offre_Preferences0_FK` FOREIGN KEY (`id_pref`) REFERENCES `Preferences` (`id_pref`);

--
-- Contraintes pour la table `repond_post`
--
ALTER TABLE `repond_post`
  ADD CONSTRAINT `repond_post_Post0_FK` FOREIGN KEY (`id_post`) REFERENCES `Post` (`id_post`),
  ADD CONSTRAINT `repond_post_Utilisateur_FK` FOREIGN KEY (`id_user`) REFERENCES `Utilisateur` (`id_user`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
