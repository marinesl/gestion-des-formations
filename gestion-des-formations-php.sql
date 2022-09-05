-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:8889
-- Généré le : lun. 05 sep. 2022 à 14:25
-- Version du serveur : 5.7.34
-- Version de PHP : 7.4.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `gestion-des-formations-php`
--

-- --------------------------------------------------------

--
-- Structure de la table `gdf_php_demande`
--

CREATE TABLE `gdf_php_demande` (
  `id_formation` int(11) NOT NULL,
  `id_prerequis` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `gdf_php_demande`
--

INSERT INTO `gdf_php_demande` (`id_formation`, `id_prerequis`) VALUES
(3, 1),
(3, 3);

-- --------------------------------------------------------

--
-- Structure de la table `gdf_php_formation`
--

CREATE TABLE `gdf_php_formation` (
  `id_formation` int(11) NOT NULL,
  `nom_formation` varchar(100) NOT NULL,
  `contenu_formation` varchar(500) NOT NULL,
  `date_debut_formation` date NOT NULL,
  `date_fin_formation` date NOT NULL,
  `lieu_formation` varchar(100) NOT NULL,
  `prestataire_formation` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `gdf_php_formation`
--

INSERT INTO `gdf_php_formation` (`id_formation`, `nom_formation`, `contenu_formation`, `date_debut_formation`, `date_fin_formation`, `lieu_formation`, `prestataire_formation`) VALUES
(3, 'Conception Web', 'Points abordés lors de la formation : HTML ; CSS ; PHP ; Nouvelles technologies informatiques.', '2015-06-01', '2015-06-22', 'Paris 08', 'Web & Co'),
(4, 'Comptabilité', 'Points abordés pendant la formation : Saisie et la vérification des pièces comptables ; Rapprochements bancaires ; Déclarations de TVA ; Reporting mensuel, trimestriel ; Suivi de la trésorerie et ajustements quotidiens ; Provisions mensuelles ; Clôtures mensuelles ; Participation aux travaux de bilan.', '2023-04-19', '2023-06-24', 'Paris 10', 'Membrado'),
(5, 'Assistance administrative / Ressources humaines', 'Points abordés lors de la formation : Gestion administrative du personnel ; Gestion administrative et comptable ; Formation ; Aide à la réalisation de déclarations et documents obligatoires', '2025-04-16', '2025-07-11', 'Strasbourg', 'Beetween'),
(6, 'Responsabilité E-commerce', 'Points abordés lors de la formation  : Mise en place des stratégies d\'acquisition ; Animation du merchandising ; Le cross selling et le cross marketing ; Animation de la base de clients de manière ciblée et pertinente', '2023-05-10', '2023-08-11', 'Marseille', 'SEA'),
(7, 'Développement web et mobile', 'Points abordés lors de la formation : Réalisation d’interface d’application mobile ; Liaison application Base de données (Windows/Linux) ; Création des templates HTML5 ; Création de feuille de style Responsive Design ; Proposition, préconisation et optimisation technique pertinente et innovante', '2025-04-05', '2025-05-10', 'Marseille', 'Ironova');

-- --------------------------------------------------------

--
-- Structure de la table `gdf_php_inscription`
--

CREATE TABLE `gdf_php_inscription` (
  `etat_inscription` varchar(10) NOT NULL,
  `id_utilisateur` int(11) NOT NULL,
  `id_formation` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `gdf_php_inscription`
--

INSERT INTO `gdf_php_inscription` (`etat_inscription`, `id_utilisateur`, `id_formation`) VALUES
('Terminée', 1, 3),
('Inscrit', 1, 4),
('Inscrit', 1, 5),
('Inscrit', 1, 7);

-- --------------------------------------------------------

--
-- Structure de la table `gdf_php_prerequis`
--

CREATE TABLE `gdf_php_prerequis` (
  `id_prerequis` int(11) NOT NULL,
  `libelle_prerequis` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `gdf_php_prerequis`
--

INSERT INTO `gdf_php_prerequis` (`id_prerequis`, `libelle_prerequis`) VALUES
(1, 'HTML'),
(2, 'JavaScript'),
(3, 'CSS');

-- --------------------------------------------------------

--
-- Structure de la table `gdf_php_utilisateur`
--

CREATE TABLE `gdf_php_utilisateur` (
  `id_utilisateur` int(11) NOT NULL,
  `nom_utilisateur` varchar(100) NOT NULL,
  `prenom_utilisateur` varchar(100) NOT NULL,
  `login_utilisateur` varchar(100) NOT NULL,
  `mdp_utilisateur` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `gdf_php_utilisateur`
--

INSERT INTO `gdf_php_utilisateur` (`id_utilisateur`, `nom_utilisateur`, `prenom_utilisateur`, `login_utilisateur`, `mdp_utilisateur`) VALUES
(1, 'admin', 'admin', 'admin', 'ab4f63f9ac65152575886860dde480a1');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `gdf_php_demande`
--
ALTER TABLE `gdf_php_demande`
  ADD PRIMARY KEY (`id_formation`,`id_prerequis`),
  ADD KEY `FK_demande_id_prerequis` (`id_prerequis`);

--
-- Index pour la table `gdf_php_formation`
--
ALTER TABLE `gdf_php_formation`
  ADD PRIMARY KEY (`id_formation`);

--
-- Index pour la table `gdf_php_inscription`
--
ALTER TABLE `gdf_php_inscription`
  ADD PRIMARY KEY (`id_utilisateur`,`id_formation`),
  ADD KEY `FK_Inscription_id_formation` (`id_formation`);

--
-- Index pour la table `gdf_php_prerequis`
--
ALTER TABLE `gdf_php_prerequis`
  ADD PRIMARY KEY (`id_prerequis`);

--
-- Index pour la table `gdf_php_utilisateur`
--
ALTER TABLE `gdf_php_utilisateur`
  ADD PRIMARY KEY (`id_utilisateur`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `gdf_php_formation`
--
ALTER TABLE `gdf_php_formation`
  MODIFY `id_formation` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT pour la table `gdf_php_prerequis`
--
ALTER TABLE `gdf_php_prerequis`
  MODIFY `id_prerequis` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `gdf_php_utilisateur`
--
ALTER TABLE `gdf_php_utilisateur`
  MODIFY `id_utilisateur` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `gdf_php_demande`
--
ALTER TABLE `gdf_php_demande`
  ADD CONSTRAINT `FK_demande_id_formation` FOREIGN KEY (`id_formation`) REFERENCES `gdf_php_formation` (`id_formation`),
  ADD CONSTRAINT `FK_demande_id_prerequis` FOREIGN KEY (`id_prerequis`) REFERENCES `gdf_php_prerequis` (`id_prerequis`);

--
-- Contraintes pour la table `gdf_php_inscription`
--
ALTER TABLE `gdf_php_inscription`
  ADD CONSTRAINT `FK_Inscription_id_formation` FOREIGN KEY (`id_formation`) REFERENCES `gdf_php_formation` (`id_formation`),
  ADD CONSTRAINT `FK_Inscription_id_utilisateur` FOREIGN KEY (`id_utilisateur`) REFERENCES `gdf_php_utilisateur` (`id_utilisateur`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
