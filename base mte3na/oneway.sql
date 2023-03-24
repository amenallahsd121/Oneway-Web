-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : ven. 24 mars 2023 à 14:30
-- Version du serveur : 10.4.27-MariaDB
-- Version de PHP : 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `oneway`
--

-- --------------------------------------------------------

--
-- Structure de la table `affectationopcolis`
--

CREATE TABLE `affectationopcolis` (
  `id_aff` int(11) NOT NULL,
  `id_opp` int(11) NOT NULL,
  `id_colis` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `categorie`
--

CREATE TABLE `categorie` (
  `id_categorie` int(11) NOT NULL,
  `type` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `categorie`
--

INSERT INTO `categorie` (`id_categorie`, `type`) VALUES
(97, 'MOTOO'),
(98, 'SUV'),
(99, 'AZE');

-- --------------------------------------------------------

--
-- Structure de la table `categorieoffre`
--

CREATE TABLE `categorieoffre` (
  `IdCatOffre` int(11) NOT NULL,
  `poidsOffre` float NOT NULL,
  `nbreColisOffre` int(11) NOT NULL,
  `TypeOffre` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `categorieoffre`
--

INSERT INTO `categorieoffre` (`IdCatOffre`, `poidsOffre`, `nbreColisOffre`, `TypeOffre`) VALUES
(0, 4, 1, 'M'),
(109, 3, 3, 'L');

-- --------------------------------------------------------

--
-- Structure de la table `colis`
--

CREATE TABLE `colis` (
  `id_colis` int(11) NOT NULL,
  `id_client` int(11) NOT NULL,
  `poids` float NOT NULL,
  `prix` float NOT NULL,
  `type_colis` varchar(50) NOT NULL,
  `lieu_depart` varchar(50) NOT NULL,
  `lieu_arrive` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `colis`
--

INSERT INTO `colis` (`id_colis`, `id_client`, `poids`, `prix`, `type_colis`, `lieu_depart`, `lieu_arrive`) VALUES
(55, 69, 12, 36, 'Matériel Electronique', 'Sousse', 'Tozeur');

-- --------------------------------------------------------

--
-- Structure de la table `demande`
--

CREATE TABLE `demande` (
  `IdDemande` int(11) NOT NULL,
  `DescriptionDemande` varchar(255) NOT NULL,
  `IdOffre` int(11) NOT NULL,
  `IdColis` int(11) NOT NULL,
  `IdPersonne` int(11) NOT NULL DEFAULT 1,
  `prix` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `evenement`
--

CREATE TABLE `evenement` (
  `id_event` int(11) NOT NULL,
  `nom` varchar(50) NOT NULL,
  `description` varchar(255) NOT NULL,
  `date_debut_event` varchar(20) NOT NULL,
  `date_fin_event` varchar(20) NOT NULL,
  `awards` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `evenement`
--

INSERT INTO `evenement` (`id_event`, `nom`, `description`, `date_debut_event`, `date_fin_event`, `awards`) VALUES
(43, 'sssss', 'sssssssss', '03-04-2023', '03-04-2023', 'ssss');

-- --------------------------------------------------------

--
-- Structure de la table `livraison`
--

CREATE TABLE `livraison` (
  `id_livraison` int(11) NOT NULL,
  `etat` varchar(50) NOT NULL,
  `id_colis` int(11) NOT NULL,
  `id_livreur` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `livraison`
--

INSERT INTO `livraison` (`id_livraison`, `etat`, `id_colis`, `id_livreur`) VALUES
(22, 'En Cours', 55, 7);

-- --------------------------------------------------------

--
-- Structure de la table `livreur`
--

CREATE TABLE `livreur` (
  `id_livreur` int(11) NOT NULL,
  `cin_livreur` varchar(50) NOT NULL,
  `nom` varchar(50) NOT NULL,
  `prenom` varchar(50) NOT NULL,
  `vehicule` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `livreur`
--

INSERT INTO `livreur` (`id_livreur`, `cin_livreur`, `nom`, `prenom`, `vehicule`) VALUES
(7, '16531133', 'Meddeb', 'Sofien', 'Porche'),
(8, '64843650', 'Moalla', 'Rahma', 'classeG');

-- --------------------------------------------------------

--
-- Structure de la table `location`
--

CREATE TABLE `location` (
  `id` int(11) NOT NULL,
  `adresse` varchar(20) NOT NULL,
  `Xaxe` double NOT NULL,
  `Yaxe` double NOT NULL,
  `id_relai` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `location`
--

INSERT INTO `location` (`id`, `adresse`, `Xaxe`, `Yaxe`, `id_relai`) VALUES
(2, 'kjnljn', 12, 32, 3),
(3, 'dsdfds', 50, 50, 3),
(5, 'ygu', 77, 55, 4);

-- --------------------------------------------------------

--
-- Structure de la table `maintenance`
--

CREATE TABLE `maintenance` (
  `id_maintenance` int(11) NOT NULL,
  `etat` varchar(255) NOT NULL,
  `nom_sos_rep` varchar(255) NOT NULL,
  `id_vehicule` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `maintenance`
--

INSERT INTO `maintenance` (`id_maintenance`, `etat`, `nom_sos_rep`, `id_vehicule`) VALUES
(94, 'BONNE', 'EZZINE AUTO', 100),
(95, 'ACCIDENTE', 'MOALLA AUTO', 102);

-- --------------------------------------------------------

--
-- Structure de la table `offre`
--

CREATE TABLE `offre` (
  `IdOffre` int(11) NOT NULL,
  `IdCatColis` int(11) NOT NULL,
  `CatOffreId` varchar(255) NOT NULL,
  `IdTrajetOffre` varchar(255) NOT NULL,
  `DescriptionOffre` varchar(255) NOT NULL,
  `MaxRetard` varchar(255) NOT NULL,
  `prixOffre` float NOT NULL,
  `DateOffre` varchar(255) DEFAULT NULL,
  `DateSortieOffre` varchar(255) DEFAULT NULL,
  `Etat` varchar(255) NOT NULL,
  `nbreDemande` int(11) NOT NULL,
  `IdUser` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `offre`
--

INSERT INTO `offre` (`IdOffre`, `IdCatColis`, `CatOffreId`, `IdTrajetOffre`, `DescriptionOffre`, `MaxRetard`, `prixOffre`, `DateOffre`, `DateSortieOffre`, `Etat`, `nbreDemande`, `IdUser`) VALUES
(1, 4, 'M', 'zarzisTunis', '', '4jours', 20, '1 mars 2023', '2-3-2021', 'EnCours', 0, 1),
(239, 5, 'M', 'zarzisTunis', '', '4jours', 20, '6 mars 2023', '2-3-2021', 'EnCours', 0, 1),
(240, 5, 'M', 'zarzisTunis', '', '4jours', 20, 'Mar 6, 2023', '2-3-2021', 'EnCours', 0, 1);

-- --------------------------------------------------------

--
-- Structure de la table `opportinute`
--

CREATE TABLE `opportinute` (
  `id_opp` int(11) NOT NULL,
  `date` date NOT NULL,
  `depart` varchar(50) NOT NULL,
  `heur_depart` float NOT NULL,
  `arrivee` varchar(255) NOT NULL,
  `heur_arrivee` float NOT NULL,
  `description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `opportinute`
--

INSERT INTO `opportinute` (`id_opp`, `date`, `depart`, `heur_depart`, `arrivee`, `heur_arrivee`, `description`) VALUES
(7, '2023-03-09', 'zza', 12, 'ee', 32, 'dddddd');

-- --------------------------------------------------------

--
-- Structure de la table `participation`
--

CREATE TABLE `participation` (
  `id_participation` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_event` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `reclamation`
--

CREATE TABLE `reclamation` (
  `id_reclamation` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `text_rec` varchar(255) NOT NULL,
  `sujet` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `reclamation`
--

INSERT INTO `reclamation` (`id_reclamation`, `id_user`, `text_rec`, `sujet`) VALUES
(100, 68, 'tyurtytyuf', 'Livreur'),
(101, 69, 'hhhhhhhhhhh', 'Autres');

-- --------------------------------------------------------

--
-- Structure de la table `relais`
--

CREATE TABLE `relais` (
  `id` int(11) NOT NULL,
  `name` varchar(20) NOT NULL,
  `lastname` varchar(20) NOT NULL,
  `email` varchar(20) NOT NULL,
  `adresse` varchar(20) NOT NULL,
  `city` varchar(20) NOT NULL,
  `number` int(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `relais`
--

INSERT INTO `relais` (`id`, `name`, `lastname`, `email`, `adresse`, `city`, `number`) VALUES
(4, 'fefefioj', 'fvvvv', 'yuguygyu', 'fgdfgc', 'gfcfgc', 98898);

-- --------------------------------------------------------

--
-- Structure de la table `reponse`
--

CREATE TABLE `reponse` (
  `id_reponse` int(11) NOT NULL,
  `id_reclamation` int(11) NOT NULL,
  `text_rep` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `reponse`
--

INSERT INTO `reponse` (`id_reponse`, `id_reclamation`, `text_rep`) VALUES
(69, 101, 'OKK');

-- --------------------------------------------------------

--
-- Structure de la table `trajetoffre`
--

CREATE TABLE `trajetoffre` (
  `IdTrajetOffre` bigint(11) NOT NULL,
  `LimiteKmOffre` int(11) NOT NULL,
  `AddArriveOffre` varchar(255) DEFAULT NULL,
  `AddDepartOffre` varchar(255) DEFAULT NULL,
  `NbreEscaleOffre` int(11) DEFAULT NULL,
  `nbreOffre` int(11) NOT NULL DEFAULT 0,
  `description` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `trajetoffre`
--

INSERT INTO `trajetoffre` (`IdTrajetOffre`, `LimiteKmOffre`, `AddArriveOffre`, `AddDepartOffre`, `NbreEscaleOffre`, `nbreOffre`, `description`) VALUES
(0, 15, 'zarzis', 'Tunis', 6, 0, 'zarzisTunis'),
(62, 150, 'm', 'Tunis', 5, 0, 'Tunism');

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

CREATE TABLE `utilisateur` (
  `id` int(11) NOT NULL,
  `name` varchar(20) NOT NULL,
  `lastname` varchar(20) NOT NULL,
  `email` varchar(30) NOT NULL,
  `adresse` varchar(30) NOT NULL,
  `type` varchar(30) NOT NULL,
  `birthdate` date NOT NULL,
  `password` varchar(20) NOT NULL,
  `nb_point` int(11) NOT NULL,
  `code` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `utilisateur`
--

INSERT INTO `utilisateur` (`id`, `name`, `lastname`, `email`, `adresse`, `type`, `birthdate`, `password`, `nb_point`, `code`) VALUES
(68, 'feres', 'vv', 'oussama.felhi@esprit.tn', 'iojoijoij', 'admin', '2023-03-09', 'fffffffff', 0, 3331),
(69, 'fsed', 'llllllllll', 'oijoijoij', 'huhuhuh', 'Client', '2023-03-03', '123654', 12, NULL),
(74, 'iuhuihui', 'uihuih', 'iuhuih', 'iuhuih', 'admin', '2023-03-03', '00998', 0, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `vehicule`
--

CREATE TABLE `vehicule` (
  `id_vehicule` int(11) NOT NULL,
  `matricule` varchar(50) NOT NULL,
  `marque` varchar(50) NOT NULL,
  `id_categorie` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `vehicule`
--

INSERT INTO `vehicule` (`id_vehicule`, `matricule`, `marque`, `id_categorie`) VALUES
(100, '165TUNIS6548', 'BENZ', 97),
(101, '165TUNIS1234', 'FORD', 97),
(102, '228TUNIS4116', 'HUNDAI', 98),
(103, '123TUNIS1234', 'KIA', 98),
(104, '123TUNIS1234', 'KIA', 97);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `affectationopcolis`
--
ALTER TABLE `affectationopcolis`
  ADD PRIMARY KEY (`id_aff`),
  ADD UNIQUE KEY `UK_colis` (`id_colis`),
  ADD KEY `fk_affOpp` (`id_opp`);

--
-- Index pour la table `categorie`
--
ALTER TABLE `categorie`
  ADD PRIMARY KEY (`id_categorie`);

--
-- Index pour la table `categorieoffre`
--
ALTER TABLE `categorieoffre`
  ADD PRIMARY KEY (`IdCatOffre`),
  ADD UNIQUE KEY `TypeOffre` (`TypeOffre`);

--
-- Index pour la table `colis`
--
ALTER TABLE `colis`
  ADD PRIMARY KEY (`id_colis`),
  ADD KEY `id_client` (`id_client`);

--
-- Index pour la table `demande`
--
ALTER TABLE `demande`
  ADD PRIMARY KEY (`IdDemande`),
  ADD KEY `IdColis` (`IdColis`),
  ADD KEY `IdOffre` (`IdOffre`),
  ADD KEY `demande_ibfk_3` (`IdPersonne`);

--
-- Index pour la table `evenement`
--
ALTER TABLE `evenement`
  ADD PRIMARY KEY (`id_event`);

--
-- Index pour la table `livraison`
--
ALTER TABLE `livraison`
  ADD PRIMARY KEY (`id_livraison`),
  ADD KEY `livraison_ibfk_1` (`id_colis`),
  ADD KEY `livraison_ibfk_2` (`id_livreur`);

--
-- Index pour la table `livreur`
--
ALTER TABLE `livreur`
  ADD PRIMARY KEY (`id_livreur`);

--
-- Index pour la table `location`
--
ALTER TABLE `location`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_relai` (`id_relai`);

--
-- Index pour la table `maintenance`
--
ALTER TABLE `maintenance`
  ADD PRIMARY KEY (`id_maintenance`),
  ADD KEY `FK_maintenanceVehi` (`id_vehicule`);

--
-- Index pour la table `offre`
--
ALTER TABLE `offre`
  ADD PRIMARY KEY (`IdOffre`),
  ADD KEY `categorieOffre` (`CatOffreId`),
  ADD KEY `trajetOffre` (`IdTrajetOffre`);

--
-- Index pour la table `opportinute`
--
ALTER TABLE `opportinute`
  ADD PRIMARY KEY (`id_opp`);

--
-- Index pour la table `participation`
--
ALTER TABLE `participation`
  ADD PRIMARY KEY (`id_participation`),
  ADD KEY `fk_participEvent` (`id_event`),
  ADD KEY `id_user` (`id_user`);

--
-- Index pour la table `reclamation`
--
ALTER TABLE `reclamation`
  ADD PRIMARY KEY (`id_reclamation`),
  ADD KEY `id_user` (`id_user`);

--
-- Index pour la table `relais`
--
ALTER TABLE `relais`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `reponse`
--
ALTER TABLE `reponse`
  ADD PRIMARY KEY (`id_reponse`),
  ADD KEY `reponse_ibfk_1` (`id_reclamation`);

--
-- Index pour la table `trajetoffre`
--
ALTER TABLE `trajetoffre`
  ADD PRIMARY KEY (`IdTrajetOffre`),
  ADD UNIQUE KEY `AddOffre` (`AddArriveOffre`,`AddDepartOffre`) USING BTREE,
  ADD UNIQUE KEY `description` (`description`) USING BTREE;

--
-- Index pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `vehicule`
--
ALTER TABLE `vehicule`
  ADD PRIMARY KEY (`id_vehicule`),
  ADD KEY `FK_vehiculeCategorie` (`id_categorie`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `affectationopcolis`
--
ALTER TABLE `affectationopcolis`
  MODIFY `id_aff` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT pour la table `categorie`
--
ALTER TABLE `categorie`
  MODIFY `id_categorie` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=100;

--
-- AUTO_INCREMENT pour la table `categorieoffre`
--
ALTER TABLE `categorieoffre`
  MODIFY `IdCatOffre` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=110;

--
-- AUTO_INCREMENT pour la table `colis`
--
ALTER TABLE `colis`
  MODIFY `id_colis` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT pour la table `demande`
--
ALTER TABLE `demande`
  MODIFY `IdDemande` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT pour la table `evenement`
--
ALTER TABLE `evenement`
  MODIFY `id_event` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT pour la table `livraison`
--
ALTER TABLE `livraison`
  MODIFY `id_livraison` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT pour la table `livreur`
--
ALTER TABLE `livreur`
  MODIFY `id_livreur` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT pour la table `location`
--
ALTER TABLE `location`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `maintenance`
--
ALTER TABLE `maintenance`
  MODIFY `id_maintenance` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=96;

--
-- AUTO_INCREMENT pour la table `offre`
--
ALTER TABLE `offre`
  MODIFY `IdOffre` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=241;

--
-- AUTO_INCREMENT pour la table `opportinute`
--
ALTER TABLE `opportinute`
  MODIFY `id_opp` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT pour la table `participation`
--
ALTER TABLE `participation`
  MODIFY `id_participation` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `reclamation`
--
ALTER TABLE `reclamation`
  MODIFY `id_reclamation` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=102;

--
-- AUTO_INCREMENT pour la table `relais`
--
ALTER TABLE `relais`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `reponse`
--
ALTER TABLE `reponse`
  MODIFY `id_reponse` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;

--
-- AUTO_INCREMENT pour la table `trajetoffre`
--
ALTER TABLE `trajetoffre`
  MODIFY `IdTrajetOffre` bigint(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- AUTO_INCREMENT pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=75;

--
-- AUTO_INCREMENT pour la table `vehicule`
--
ALTER TABLE `vehicule`
  MODIFY `id_vehicule` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=105;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `affectationopcolis`
--
ALTER TABLE `affectationopcolis`
  ADD CONSTRAINT `fk_colisaff` FOREIGN KEY (`id_colis`) REFERENCES `colis` (`id_colis`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_oppaff` FOREIGN KEY (`id_opp`) REFERENCES `opportinute` (`id_opp`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `colis`
--
ALTER TABLE `colis`
  ADD CONSTRAINT `colis_ibfk_1` FOREIGN KEY (`id_client`) REFERENCES `utilisateur` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `demande`
--
ALTER TABLE `demande`
  ADD CONSTRAINT `demande_ibfk_1` FOREIGN KEY (`IdColis`) REFERENCES `colis` (`id_colis`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `demande_ibfk_2` FOREIGN KEY (`IdOffre`) REFERENCES `offre` (`IdOffre`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `livraison`
--
ALTER TABLE `livraison`
  ADD CONSTRAINT `livraison_ibfk_1` FOREIGN KEY (`id_colis`) REFERENCES `colis` (`id_colis`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `livraison_ibfk_2` FOREIGN KEY (`id_livreur`) REFERENCES `livreur` (`id_livreur`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `maintenance`
--
ALTER TABLE `maintenance`
  ADD CONSTRAINT `FK_maintenanceVehi` FOREIGN KEY (`id_vehicule`) REFERENCES `vehicule` (`id_vehicule`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `participation`
--
ALTER TABLE `participation`
  ADD CONSTRAINT `fk_eventpart` FOREIGN KEY (`id_event`) REFERENCES `evenement` (`id_event`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `participation_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `utilisateur` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `reclamation`
--
ALTER TABLE `reclamation`
  ADD CONSTRAINT `reclamation_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `utilisateur` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `reponse`
--
ALTER TABLE `reponse`
  ADD CONSTRAINT `reponse_ibfk_1` FOREIGN KEY (`id_reclamation`) REFERENCES `reclamation` (`id_reclamation`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `vehicule`
--
ALTER TABLE `vehicule`
  ADD CONSTRAINT `FK_vehiculeCategorie` FOREIGN KEY (`id_categorie`) REFERENCES `categorie` (`id_categorie`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
