-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : jeu. 16 mars 2023 à 09:44
-- Version du serveur : 10.4.24-MariaDB
-- Version de PHP : 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `gestionfrais`
--
CREATE DATABASE IF NOT EXISTS `gestionfrais` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `gestionfrais`;

-- --------------------------------------------------------

--
-- Structure de la table `etat`
--

CREATE TABLE `etat` (
  `id` int(4) NOT NULL,
  `libelle` char(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `fichefrais`
--

CREATE TABLE `fichefrais` (
  `mois` int(2) NOT NULL,
  `idVisiteur` int(4) NOT NULL,
  `nbJustificatifs` int(4) DEFAULT NULL,
  `montantValide` int(4) DEFAULT NULL,
  `dateModif` int(6) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `fraisforfait`
--

CREATE TABLE `fraisforfait` (
  `id` int(4) NOT NULL,
  `libelle` char(25) DEFAULT NULL,
  `montant` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `lignefraisforfait`
--

CREATE TABLE `lignefraisforfait` (
  `idVisiteur` int(4) NOT NULL,
  `mois` int(2) NOT NULL,
  `idFraisForfait` int(4) NOT NULL,
  `quantite` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `lignefraishorsforfait`
--

CREATE TABLE `lignefraishorsforfait` (
  `id` int(4) NOT NULL,
  `date` int(6) DEFAULT NULL,
  `montant` int(10) DEFAULT NULL,
  `libelle` char(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `visiteur`
--

CREATE TABLE `visiteur` (
  `id` int(4) NOT NULL,
  `nom` char(25) DEFAULT NULL,
  `prenom` char(25) DEFAULT NULL,
  `adresse` char(25) DEFAULT NULL,
  `ville` char(25) DEFAULT NULL,
  `cp` int(5) DEFAULT NULL,
  `dateEmbauche` int(6) DEFAULT NULL,
  `login` char(25) DEFAULT NULL,
  `mdp` char(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `etat`
--
ALTER TABLE `etat`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `fichefrais`
--
ALTER TABLE `fichefrais`
  ADD PRIMARY KEY (`mois`),
  ADD UNIQUE KEY `idVisiteur` (`idVisiteur`);

--
-- Index pour la table `fraisforfait`
--
ALTER TABLE `fraisforfait`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `lignefraisforfait`
--
ALTER TABLE `lignefraisforfait`
  ADD PRIMARY KEY (`idVisiteur`),
  ADD UNIQUE KEY `idFraisForfait` (`idFraisForfait`),
  ADD UNIQUE KEY `mois` (`mois`);

--
-- Index pour la table `lignefraishorsforfait`
--
ALTER TABLE `lignefraishorsforfait`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `visiteur`
--
ALTER TABLE `visiteur`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `etat`
--
ALTER TABLE `etat`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `fichefrais`
--
ALTER TABLE `fichefrais`
  MODIFY `mois` int(2) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `fraisforfait`
--
ALTER TABLE `fraisforfait`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `lignefraisforfait`
--
ALTER TABLE `lignefraisforfait`
  MODIFY `idVisiteur` int(4) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `lignefraishorsforfait`
--
ALTER TABLE `lignefraishorsforfait`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `visiteur`
--
ALTER TABLE `visiteur`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `etat`
--
ALTER TABLE `etat`
  ADD CONSTRAINT `etat_ibfk_1` FOREIGN KEY (`id`) REFERENCES `fichefrais` (`idVisiteur`);

--
-- Contraintes pour la table `fichefrais`
--
ALTER TABLE `fichefrais`
  ADD CONSTRAINT `fichefrais_ibfk_1` FOREIGN KEY (`idVisiteur`) REFERENCES `visiteur` (`id`);

--
-- Contraintes pour la table `lignefraisforfait`
--
ALTER TABLE `lignefraisforfait`
  ADD CONSTRAINT `lignefraisforfait_ibfk_1` FOREIGN KEY (`idFraisForfait`) REFERENCES `fraisforfait` (`id`),
  ADD CONSTRAINT `lignefraisforfait_ibfk_2` FOREIGN KEY (`idVisiteur`) REFERENCES `fichefrais` (`idVisiteur`),
  ADD CONSTRAINT `lignefraisforfait_ibfk_3` FOREIGN KEY (`mois`) REFERENCES `fichefrais` (`mois`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
