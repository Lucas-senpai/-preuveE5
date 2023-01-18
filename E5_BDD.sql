--
-- Base de donnee :  `Gestion des frais`
--
CREATE DATABASE IF NOT EXISTS `GestionFrais`
  DEFAULT CHARACTER SET utf8
  COLLATE utf8_general_ci;
USE `GestionFrais`;



--
-- Structure de la table `Visiteur`
--
DROP TABLE IF EXISTS `visiteur`;
CREATE TABLE IF NOT EXISTS `visiteur` (
    `id` int(4) NOT NULL AUTO_INCREMENT,
    `nom` char(25) DEFAULT NULL,
    `prenom` char(25) DEFAULT NULL,
    `adresse` char(25) DEFAULT NULL,
    `ville` char(25) DEFAULT NULL,
    `cp` int(5) DEFAULT NULL,
    `dateEmbauche` int(6) DEFAULT NULL,
    `login` char(25) DEFAULT NULL,
    `mdp` char(25) DEFAULT NULL,
    PRIMARY KEY (`id`)
    ) ENGINE=InnoDB  DEFAULT CHARSET=utf8;



--
-- Structure de la table `FicheFrais`
--
DROP TABLE IF EXISTS `FicheFrais`;
CREATE TABLE IF NOT EXISTS `FicheFrais` (
    `mois` int(2) NOT NULL,
    `idVisiteur` char(4) NOT NULL,
    `adresse` char(25) DEFAULT NULL,
    `nbJustificatifs` int(4) DEFAULT NULL,
    `montantValide` int(4) DEFAULT NULL,
    `dateModif` int(6) DEFAULT NULL,
    PRIMARY KEY (`mois`)

    ) ENGINE=InnoDB  DEFAULT CHARSET=utf8;



--
-- Structure de la table `LigneFraisHorsForfait`
--
DROP TABLE IF EXISTS `LigneFraisHorsForfait`;
CREATE TABLE IF NOT EXISTS `LigneFraisHorsForfait` (
    `id` int(4) NOT NULL AUTO_INCREMENT,
    `date` int(6) DEFAULT NULL,
    `montant` int(10) DEFAULT NULL,
    `libelle` char(25) DEFAULT NULL,
    PRIMARY KEY (`id`)
    ) ENGINE=InnoDB  DEFAULT CHARSET=utf8;



--
-- Structure de la table `Etat`
--
DROP TABLE IF EXISTS `Etat`;
CREATE TABLE IF NOT EXISTS `Etat` (
    `id` int(4) NOT NULL,
    `libelle` char(25) NOT NULL,
    PRIMARY KEY (`id`)
    ) ENGINE=InnoDB  DEFAULT CHARSET=utf8;



--
-- Structure de la table `FraisForfait`
--
DROP TABLE IF EXISTS `FraisForfait`;
CREATE TABLE IF NOT EXISTS `FraisForfait` (
    `id` int(4) NOT NULL AUTO_INCREMENT,
    `libelle` char(25) DEFAULT NULL,
    `montant` int(10) DEFAULT NULL,
    PRIMARY KEY (`id`)
    ) ENGINE=InnoDB  DEFAULT CHARSET=utf8;



--
-- Structure de la table `LigneFraisForfait`
--
DROP TABLE IF EXISTS `LigneFraisForfait`;
CREATE TABLE IF NOT EXISTS `LigneFraisForfait` (
    `idVisiteur` int(4) NOT NULL,
    `mois` int(2) NOT NULL,
    `idFraisForfait` int(4) NOT NULL,
    `quantite` int(10) NOT NULL,
    PRIMARY KEY (`idVisiteur`)
    ) ENGINE=InnoDB  DEFAULT CHARSET=utf8;