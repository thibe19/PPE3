-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le :  jeu. 20 déc. 2018 à 16:38
-- Version du serveur :  10.1.26-MariaDB
-- Version de PHP :  7.1.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `viabahuet`
--
CREATE DATABASE IF NOT EXISTS `viabahuet` DEFAULT CHARACTER SET latin1 COLLATE latin1_bin;
USE `viabahuet`;

-- --------------------------------------------------------

--
-- Structure de la table `ajoute_amis`
--

CREATE TABLE `ajoute_amis` (
  `id_user` int(11) NOT NULL,
  `id_user_Eleve` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_bin;

--
-- Déchargement des données de la table `ajoute_amis`
--

INSERT INTO `ajoute_amis` (`id_user`, `id_user_Eleve`) VALUES
(40, 42),
(40, 48),
(42, 40);

-- --------------------------------------------------------

--
-- Structure de la table `categorie`
--

CREATE TABLE `categorie` (
  `id_cat` int(11) NOT NULL,
  `lib_cat` varchar(255) COLLATE latin1_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_bin;

--
-- Déchargement des données de la table `categorie`
--

INSERT INTO `categorie` (`id_cat`, `lib_cat`) VALUES
(3, 'Mode'),
(4, 'Droits'),
(5, 'Divers'),
(6, 'Économie, Finance'),
(15, 'Enseignement'),
(16, 'Médecine, Santé'),
(31, 'Musique'),
(33, 'Art'),
(34, 'Sports'),
(37, 'Informatique'),
(44, 'Sécurité'),
(45, 'Animaux'),
(50, 'Voyages');

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
-- Structure de la table `demande`
--

CREATE TABLE `demande` (
  `id_demande` int(11) NOT NULL,
  `id_user_eleve` int(11) NOT NULL,
  `id_user_entreprise` int(11) NOT NULL,
  `id_offre` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_bin;

--
-- Déchargement des données de la table `demande`
--

INSERT INTO `demande` (`id_demande`, `id_user_eleve`, `id_user_entreprise`, `id_offre`) VALUES
(21, 48, 41, 16),
(22, 48, 41, 17),
(26, 42, 41, 16),
(32, 40, 41, 16),
(33, 40, 41, 25);

-- --------------------------------------------------------

--
-- Structure de la table `diplome`
--

CREATE TABLE `diplome` (
  `id_diplome` int(11) NOT NULL,
  `lib_dip` varchar(255) COLLATE latin1_bin NOT NULL,
  `desc_dip` varchar(255) COLLATE latin1_bin NOT NULL,
  `photo_prom` varchar(255) COLLATE latin1_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_bin;

-- --------------------------------------------------------

--
-- Structure de la table `eleve`
--

CREATE TABLE `eleve` (
  `id_user` int(11) NOT NULL,
  `prenom_eleve` varchar(30) COLLATE latin1_bin NOT NULL,
  `date_naiss` date NOT NULL,
  `choix_position` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_bin;

--
-- Déchargement des données de la table `eleve`
--

INSERT INTO `eleve` (`id_user`, `prenom_eleve`, `date_naiss`, `choix_position`) VALUES
(40, 'Yanndfgh', '2018-12-23', 0),
(42, 'Eleve2', '1998-06-02', 2),
(47, 'Yann', '2018-12-06', 0),
(48, 'Yann', '2018-12-07', 0);

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
(1, 40),
(1, 42),
(2, 40),
(2, 42),
(3, 40),
(6, 40),
(6, 48),
(8, 40),
(10, 47),
(11, 40),
(16, 40),
(17, 40);

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
-- Structure de la table `entreprise`
--

CREATE TABLE `entreprise` (
  `id_user` int(11) NOT NULL,
  `nom_resp` varchar(30) COLLATE latin1_bin NOT NULL,
  `code_APE` varchar(5) COLLATE latin1_bin NOT NULL,
  `site_web` varchar(255) COLLATE latin1_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_bin;

--
-- Déchargement des données de la table `entreprise`
--

INSERT INTO `entreprise` (`id_user`, `nom_resp`, `code_APE`, `site_web`) VALUES
(41, 'roge', '2910X', 'google.fr'),
(44, 'rogerfb', '8299Z', 'https://fr-fr.facebook.com/'),
(45, '', '', ''),
(46, '', '', '');

-- --------------------------------------------------------

--
-- Structure de la table `evenement`
--

CREATE TABLE `evenement` (
  `id_event` int(11) NOT NULL,
  `date_even` date NOT NULL,
  `desc_event` longtext COLLATE latin1_bin NOT NULL,
  `id_type_event` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_bin;

-- --------------------------------------------------------

--
-- Structure de la table `oemploi`
--

CREATE TABLE `oemploi` (
  `id_offre` int(11) NOT NULL,
  `salaire_emp` double NOT NULL,
  `type_emp` longtext COLLATE latin1_bin NOT NULL,
  `id_user` int(11) DEFAULT NULL,
  `id_user_Eleve` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_bin;

--
-- Déchargement des données de la table `oemploi`
--

INSERT INTO `oemploi` (`id_offre`, `salaire_emp`, `type_emp`, `id_user`, `id_user_Eleve`) VALUES
(25, 0, '', 40, 0),
(26, 0, '', 40, 0);

-- --------------------------------------------------------

--
-- Structure de la table `offre`
--

CREATE TABLE `offre` (
  `id_offre` int(11) NOT NULL,
  `lib_offre` varchar(255) COLLATE latin1_bin NOT NULL,
  `niveau_req` varchar(255) COLLATE latin1_bin NOT NULL,
  `date_debut_offre` date NOT NULL,
  `date_post_offre` date NOT NULL,
  `desc_offre` varchar(255) COLLATE latin1_bin NOT NULL,
  `id_user` int(11) DEFAULT NULL,
  `id_cat` int(11) NOT NULL,
  `id_ent` int(11) NOT NULL,
  `id_user_Eleve` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_bin;

--
-- Déchargement des données de la table `offre`
--

INSERT INTO `offre` (`id_offre`, `lib_offre`, `niveau_req`, `date_debut_offre`, `date_post_offre`, `desc_offre`, `id_user`, `id_cat`, `id_ent`, `id_user_Eleve`) VALUES
(16, 'test+fin', 'B+19', '2018-12-21', '2018-12-12', '', 40, 37, 41, 0),
(17, 'j%27aime+les+patat', 'bac +5', '2018-12-23', '2018-12-12', '', 40, 33, 44, 0),
(18, 'titre', 'bac+5', '2018-12-15', '2018-12-19', 'desc', 40, 45, 41, 0),
(19, 'Titre de lannonce', 'bac+5', '2018-12-08', '2018-12-20', '1ssss', 40, 45, 41, 0),
(20, 'titre', '', '2018-12-01', '2018-12-20', '', 40, 3, 41, 0),
(21, 'titre', '', '2018-12-01', '2018-12-20', '', 40, 3, 41, 0),
(22, 'titre', '', '2018-12-01', '2018-12-20', '', 40, 3, 41, 0),
(24, 'titre', '', '2018-12-01', '2018-12-20', '', 40, 3, 41, 40),
(25, 'titre', '', '2018-12-22', '2018-12-20', 'desc', 40, 3, 41, 0),
(26, 'titre', '', '2018-12-14', '2018-12-20', 'desc', 40, 3, 41, 40);

-- --------------------------------------------------------

--
-- Structure de la table `ostage`
--

CREATE TABLE `ostage` (
  `id_offre` int(11) NOT NULL,
  `date_fin_stage` date NOT NULL,
  `note_user_stage` int(11) NOT NULL,
  `desc_user_stage` longtext COLLATE latin1_bin NOT NULL,
  `id_user` int(11) DEFAULT NULL,
  `id_user_Eleve` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_bin;

--
-- Déchargement des données de la table `ostage`
--

INSERT INTO `ostage` (`id_offre`, `date_fin_stage`, `note_user_stage`, `desc_user_stage`, `id_user`, `id_user_Eleve`) VALUES
(16, '2019-01-12', 2, 'dfgfbjhj', 40, 0),
(17, '2019-03-02', 2, 'ssssaaaer', 40, 0),
(18, '2018-12-20', 0, '', 40, 0),
(19, '0000-00-00', 0, '1', 40, 0),
(20, '2018-12-31', 40, '1', 40, 0),
(21, '0000-00-00', 2018, '1', 40, 0),
(22, '0000-00-00', 2018, '1', 40, 0),
(24, '2018-12-31', 1, 'desc', 40, 0);

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
-- Structure de la table `photo`
--

CREATE TABLE `photo` (
  `id_photo` int(2) NOT NULL,
  `lib_banner` varchar(255) COLLATE latin1_bin NOT NULL,
  `id_user` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_bin;

--
-- Déchargement des données de la table `photo`
--

INSERT INTO `photo` (`id_photo`, `lib_banner`, `id_user`) VALUES
(1, 'test.jpg', 40);

-- --------------------------------------------------------

--
-- Structure de la table `post`
--

CREATE TABLE `post` (
  `id_post` int(11) NOT NULL,
  `titre_post` varchar(255) COLLATE latin1_bin NOT NULL,
  `contenu_post` longtext COLLATE latin1_bin NOT NULL,
  `photo_post` longtext COLLATE latin1_bin NOT NULL,
  `date_post` date NOT NULL,
  `heure_post` time NOT NULL,
  `id_cat` int(11) NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_bin;

--
-- Déchargement des données de la table `post`
--

INSERT INTO `post` (`id_post`, `titre_post`, `contenu_post`, `photo_post`, `date_post`, `heure_post`, `id_cat`, `id_user`) VALUES
(10, 'titre', 'desc', 'test.jpg', '2018-12-19', '08:37:05', 3, 41);

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
-- Structure de la table `preferences`
--

CREATE TABLE `preferences` (
  `id_pref` int(11) NOT NULL,
  `lib_pref` varchar(255) COLLATE latin1_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_bin;

--
-- Déchargement des données de la table `preferences`
--

INSERT INTO `preferences` (`id_pref`, `lib_pref`) VALUES
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
-- Structure de la table `utilisateur`
--

CREATE TABLE `utilisateur` (
  `id_user` int(11) NOT NULL,
  `nom_user` varchar(30) COLLATE latin1_bin NOT NULL,
  `login_user` varchar(30) COLLATE latin1_bin NOT NULL,
  `mdp_user` varchar(255) COLLATE latin1_bin NOT NULL,
  `email_user` varchar(30) COLLATE latin1_bin NOT NULL,
  `tel_user` int(11) NOT NULL,
  `num_addr_user` varchar(6) COLLATE latin1_bin NOT NULL,
  `rue_addr_user` varchar(100) COLLATE latin1_bin NOT NULL,
  `CP_addr_user` int(11) NOT NULL,
  `ville_addr_user` varchar(40) COLLATE latin1_bin NOT NULL,
  `photo_user` longtext COLLATE latin1_bin,
  `desc_user` longtext COLLATE latin1_bin,
  `dom_acti` varchar(255) COLLATE latin1_bin NOT NULL,
  `mail_check` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_bin;

--
-- Déchargement des données de la table `utilisateur`
--

INSERT INTO `utilisateur` (`id_user`, `nom_user`, `login_user`, `mdp_user`, `email_user`, `tel_user`, `num_addr_user`, `rue_addr_user`, `CP_addr_user`, `ville_addr_user`, `photo_user`, `desc_user`, `dom_acti`, `mail_check`) VALUES
(40, 'Therd', 'test', '$2y$10$Z4N8VvCJrYmf3uJZ8aCGzOvR5VIdSSwwMhMbzj.fW1I1rwD.bjjzK', 'yannther99@gmail.com', 553508473, '25', 'rue du test', 19100, 'villetest', 'test.jpg', 'testd', 'pierre', 0),
(41, 'google', 'testent', '$2y$10$a8ohmxBWTxLz4TEQpnLH.OF1o4fbUPe7EJmWkHXad47JnZcO6hCEa', 'testent@ent.fr', 494839494, '25', 'rue du test ent', 19100, 'villetestent', '', '', '', 0),
(42, 'Eleve2s', 'eleve2', '$2y$10$ALU/TTKHvOtbqionaWMLXujkO3luHteNHTe6lrLes41CxzaYt9CLy', 'eleve2@eleve2.fr', 0, '18 bis', 'rue blanche selva', 19100, 'BRIVE LA GAILLARDE', 'eleve2.jpg', 'test', 'pierre1', 0),
(44, 'Facebook', 'fb', '$2y$10$rVgjCUFuz6H0dUve.LGS5Os6evFXCYi0DAgtriCaKWeOEnCzvhAFi', 'fb@gmail.com', 0, '19', 'rue du test entfb', 19100, 'villetestent', '', '', '', 0),
(45, '098', '19', '$2y$10$BE.BCQVASqepMnzmdg7MwuZwNUKfdIUtOm.XypYU4mH307yEY/dCC', '', 0, '', '', 0, '', '', '', '', 0),
(46, 'moi', '', '$2y$10$DVdwlpdo0sGfgMROFx8qbOkeyINE3UNpPSUERugDmDUoAUgiCqFMW', '', 0, '19', 'des tulip', 19100, 'brive', '', '', '', 0),
(47, 'THER', 'yannlog', '$2y$10$HTVYJClGp.NLeyOQ8nuCgORbRC8NqLTrB/BPs/F4l6gxlzxyzoYXK', 'yannlog@gmail.com', 558789641, '21', 'route des abeuils', 24570, 'le lardin st lazare', 'yannlog.jpg', '', '', 0),
(48, 'Verlou', 'log1', '$2y$10$ajC707v9UJv/CkAulY7bqe4qn5l0.KiGqqPV7eR3AR3pINyQ/M7ba', 'log1@gmail.com', 558789641, '21', 'route des abeuils', 24570, 'le lardin st lazare', 'log1.jpg', 'test', 'ingenieur', 0);

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
-- Index pour la table `categorie`
--
ALTER TABLE `categorie`
  ADD PRIMARY KEY (`id_cat`);

--
-- Index pour la table `cree_event`
--
ALTER TABLE `cree_event`
  ADD PRIMARY KEY (`id_user`,`id_event`),
  ADD KEY `cree_event_Evenement0_FK` (`id_event`);

--
-- Index pour la table `demande`
--
ALTER TABLE `demande`
  ADD PRIMARY KEY (`id_demande`);

--
-- Index pour la table `diplome`
--
ALTER TABLE `diplome`
  ADD PRIMARY KEY (`id_diplome`);

--
-- Index pour la table `eleve`
--
ALTER TABLE `eleve`
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
-- Index pour la table `ent_offre`
--
ALTER TABLE `ent_offre`
  ADD PRIMARY KEY (`id_offre`,`id_user`),
  ADD KEY `ent_offre_Entreprise0_FK` (`id_user`);

--
-- Index pour la table `entreprise`
--
ALTER TABLE `entreprise`
  ADD PRIMARY KEY (`id_user`);

--
-- Index pour la table `evenement`
--
ALTER TABLE `evenement`
  ADD PRIMARY KEY (`id_event`),
  ADD KEY `Evenement_type_event_FK` (`id_type_event`);

--
-- Index pour la table `oemploi`
--
ALTER TABLE `oemploi`
  ADD PRIMARY KEY (`id_offre`);

--
-- Index pour la table `offre`
--
ALTER TABLE `offre`
  ADD PRIMARY KEY (`id_offre`),
  ADD KEY `id_cat` (`id_cat`),
  ADD KEY `id_ent` (`id_ent`);

--
-- Index pour la table `ostage`
--
ALTER TABLE `ostage`
  ADD PRIMARY KEY (`id_offre`);

--
-- Index pour la table `participe_event`
--
ALTER TABLE `participe_event`
  ADD PRIMARY KEY (`id_event`,`id_user`),
  ADD KEY `participe_event_Utilisateur0_FK` (`id_user`);

--
-- Index pour la table `photo`
--
ALTER TABLE `photo`
  ADD PRIMARY KEY (`id_photo`);

--
-- Index pour la table `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`id_post`),
  ADD KEY `Post_Categorie_FK` (`id_cat`),
  ADD KEY `Post_Utilisateur0_FK` (`id_user`);

--
-- Index pour la table `pref_offre`
--
ALTER TABLE `pref_offre`
  ADD PRIMARY KEY (`id_offre`,`id_pref`),
  ADD KEY `pref_offre_Preferences0_FK` (`id_pref`);

--
-- Index pour la table `preferences`
--
ALTER TABLE `preferences`
  ADD PRIMARY KEY (`id_pref`);

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
-- Index pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `categorie`
--
ALTER TABLE `categorie`
  MODIFY `id_cat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;
--
-- AUTO_INCREMENT pour la table `demande`
--
ALTER TABLE `demande`
  MODIFY `id_demande` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;
--
-- AUTO_INCREMENT pour la table `diplome`
--
ALTER TABLE `diplome`
  MODIFY `id_diplome` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `evenement`
--
ALTER TABLE `evenement`
  MODIFY `id_event` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `offre`
--
ALTER TABLE `offre`
  MODIFY `id_offre` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
--
-- AUTO_INCREMENT pour la table `photo`
--
ALTER TABLE `photo`
  MODIFY `id_photo` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT pour la table `post`
--
ALTER TABLE `post`
  MODIFY `id_post` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT pour la table `preferences`
--
ALTER TABLE `preferences`
  MODIFY `id_pref` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT pour la table `type_event`
--
ALTER TABLE `type_event`
  MODIFY `id_type_event` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;
--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `ajoute_amis`
--
ALTER TABLE `ajoute_amis`
  ADD CONSTRAINT `ajoute_amis_Eleve0_FK` FOREIGN KEY (`id_user_Eleve`) REFERENCES `utilisateur` (`id_user`),
  ADD CONSTRAINT `ajoute_amis_Eleve_FK` FOREIGN KEY (`id_user`) REFERENCES `utilisateur` (`id_user`),
  ADD CONSTRAINT `id_user_Eleve` FOREIGN KEY (`id_user_Eleve`) REFERENCES `utilisateur` (`id_user`);

--
-- Contraintes pour la table `cree_event`
--
ALTER TABLE `cree_event`
  ADD CONSTRAINT `cree_event_Evenement0_FK` FOREIGN KEY (`id_event`) REFERENCES `evenement` (`id_event`),
  ADD CONSTRAINT `cree_event_Utilisateur_FK` FOREIGN KEY (`id_user`) REFERENCES `utilisateur` (`id_user`);

--
-- Contraintes pour la table `eleve`
--
ALTER TABLE `eleve`
  ADD CONSTRAINT `Eleve_Utilisateur_FK` FOREIGN KEY (`id_user`) REFERENCES `utilisateur` (`id_user`);

--
-- Contraintes pour la table `eleve_diplome`
--
ALTER TABLE `eleve_diplome`
  ADD CONSTRAINT `eleve_diplome_Diplome_FK` FOREIGN KEY (`id_diplome`) REFERENCES `diplome` (`id_diplome`),
  ADD CONSTRAINT `eleve_diplome_Eleve0_FK` FOREIGN KEY (`id_user`) REFERENCES `eleve` (`id_user`);

--
-- Contraintes pour la table `eleve_pref`
--
ALTER TABLE `eleve_pref`
  ADD CONSTRAINT `eleve_pref_Eleve0_FK` FOREIGN KEY (`id_user`) REFERENCES `eleve` (`id_user`),
  ADD CONSTRAINT `eleve_pref_Preferences_FK` FOREIGN KEY (`id_pref`) REFERENCES `preferences` (`id_pref`);

--
-- Contraintes pour la table `ent_offre`
--
ALTER TABLE `ent_offre`
  ADD CONSTRAINT `ent_offre_Entreprise0_FK` FOREIGN KEY (`id_user`) REFERENCES `entreprise` (`id_user`),
  ADD CONSTRAINT `ent_offre_Offre_FK` FOREIGN KEY (`id_offre`) REFERENCES `offre` (`id_offre`);

--
-- Contraintes pour la table `entreprise`
--
ALTER TABLE `entreprise`
  ADD CONSTRAINT `Entreprise_Utilisateur_FK` FOREIGN KEY (`id_user`) REFERENCES `utilisateur` (`id_user`);

--
-- Contraintes pour la table `evenement`
--
ALTER TABLE `evenement`
  ADD CONSTRAINT `Evenement_type_event_FK` FOREIGN KEY (`id_type_event`) REFERENCES `type_event` (`id_type_event`);

--
-- Contraintes pour la table `oemploi`
--
ALTER TABLE `oemploi`
  ADD CONSTRAINT `OEmploi_Offre_FK` FOREIGN KEY (`id_offre`) REFERENCES `offre` (`id_offre`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
