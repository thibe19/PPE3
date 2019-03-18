-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le :  lun. 18 mars 2019 à 20:59
-- Version du serveur :  10.1.37-MariaDB
-- Version de PHP :  7.2.12

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
(55, 42),
(55, 52),
(55, 53),
(55, 56),
(56, 52),
(56, 53),
(56, 55);

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
(1, 55, 53, 18),
(2, 56, 52, 19);

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
(42, 'Eleve2', '1998-06-02', 2),
(55, 'JC', '1996-09-25', 1),
(56, 'Yann', '1999-11-29', 2);

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
(2, 55),
(4, 55),
(6, 55),
(6, 56),
(7, 55),
(9, 55),
(9, 56),
(11, 55),
(11, 56),
(15, 55);

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
(52, 'Jack Dorsey', '00000', 'https://twitter.com/'),
(53, 'Mark Zuckerberg', '00000', 'www.facebook.com');

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
(20, 3000, 'CDI', 52, 0);

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
(18, 'S%C3%A9curit%C3%A9+connection', 'bac +2', '2019-03-09', '2019-03-18', 's%C3%A9curit%C3%A9+des+comptes', 56, 44, 53, 0),
(19, 'Developpeur', 'Bac +5', '2019-03-17', '2019-03-18', 'd%C3%A9velopper+une+nouvelle+fonctionnalit%C3%A9', 55, 37, 52, 0),
(20, 'Int%C3%A9grateur+web', 'bac +4', '2019-03-09', '2019-03-18', 'azeazazee', 52, 6, 52, 0);

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
(18, '2019-03-31', 0, '', 56, 0);

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
(4, 'NASA', 'vol+commerciaux+vers+la+lune', 'walker180320192030.jpg', '2019-03-18', '20:30:45', 50, 55),
(5, 'Gmail', 'programmer+date+de+d%C3%A9part+des+mails', 'yann180320192037.jpg', '2019-03-18', '20:37:17', 37, 56);

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
(42, 'Eleve2', 'eleve2', '$2y$10$O15MwJOgUfoQLsiGo3ctA.9Zia8r4XJ64HTf9Jf0uK8M9H/VXMAUO', 'eleve2@eleve2.fr', 0, '18 bis', 'rue blanche selva', 19100, 'BRIVE LA GAILLARDE', '', 'Je fais des tests', '', 0),
(52, 'Twitter', 'tw', '$2y$10$xHuqpa2/ohhtVsCGdc0FHOSV68X1jTfs79LNz7Oo4fI0teyqUKVG.', 'insc-tiwtter@twitter.fr', 0, '43', 'avenue des oiseaux', 75000, 'Paris', 'test.png', '', '', 0),
(53, 'Facebook', 'fb', '$2y$10$8CKt/t6OXflPmc4fXQDqQ.guxUvRMuMwnDNlUxZ2d2tlb2cc3Wgkq', 'insc-facebook@facebook.fr', 0, '85', 'rue des données', 75000, 'Paris', 'test.png', '', '', 0),
(55, 'Tardieux', 'walker', '$2y$10$B/kvH./1M8S9CRWx4q2VDeGQecC.5PWauVkuGoqB7Mz48VBNyo5Ze', 'jc-tardieux@gmail.com', 0, '68', 'avenue de paris', 33000, 'BORDEAUX', 'test.png', '', '', 0),
(56, 'Ther', 'yann', '$2y$10$dh1LGX//AAIkxFjMQaH4v.gTPcFyTO0e3Vl9IutteeURysSJqCdRK', 'insc-yann@gmail.com', 0, '12', 'Rue du paradis', 75000, 'Paris', 'test.jpg', '', '', 0);

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
-- Index pour la table `entreprise`
--
ALTER TABLE `entreprise`
  ADD PRIMARY KEY (`id_user`);

--
-- Index pour la table `ent_offre`
--
ALTER TABLE `ent_offre`
  ADD PRIMARY KEY (`id_offre`,`id_user`),
  ADD KEY `ent_offre_Entreprise0_FK` (`id_user`);

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
-- Index pour la table `preferences`
--
ALTER TABLE `preferences`
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
  MODIFY `id_demande` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

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
  MODIFY `id_offre` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT pour la table `photo`
--
ALTER TABLE `photo`
  MODIFY `id_photo` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `post`
--
ALTER TABLE `post`
  MODIFY `id_post` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

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
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

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
-- Contraintes pour la table `entreprise`
--
ALTER TABLE `entreprise`
  ADD CONSTRAINT `Entreprise_Utilisateur_FK` FOREIGN KEY (`id_user`) REFERENCES `utilisateur` (`id_user`);

--
-- Contraintes pour la table `ent_offre`
--
ALTER TABLE `ent_offre`
  ADD CONSTRAINT `ent_offre_Entreprise0_FK` FOREIGN KEY (`id_user`) REFERENCES `entreprise` (`id_user`),
  ADD CONSTRAINT `ent_offre_Offre_FK` FOREIGN KEY (`id_offre`) REFERENCES `offre` (`id_offre`);

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
