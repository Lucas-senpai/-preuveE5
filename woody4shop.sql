-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : jeu. 16 mars 2023 à 09:38
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
-- Base de données : `woody4shop`
--
CREATE DATABASE IF NOT EXISTS `woody4shop` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE `woody4shop`;

-- --------------------------------------------------------

--
-- Structure de la table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`) VALUES
(1, 'john', 'f18bd055eec95965ee175fa9badd35ae6dbeb98f');

-- --------------------------------------------------------

--
-- Structure de la table `categories`
--

CREATE TABLE `categories` (
  `id` tinyint(4) NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `categories`
--

INSERT INTO `categories` (`id`, `name`) VALUES
(1, 'music'),
(2, 'vehicule'),
(3, 'steampunk');

-- --------------------------------------------------------

--
-- Structure de la table `customers`
--

CREATE TABLE `customers` (
  `id` int(11) NOT NULL,
  `forname` varchar(50) NOT NULL,
  `surname` varchar(50) NOT NULL,
  `add1` varchar(50) NOT NULL,
  `add2` varchar(50) NOT NULL,
  `add3` varchar(50) NOT NULL,
  `postcode` varchar(10) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `email` varchar(150) NOT NULL,
  `registered` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `customers`
--

INSERT INTO `customers` (`id`, `forname`, `surname`, `add1`, `add2`, `add3`, `postcode`, `phone`, `email`, `registered`) VALUES
(1, 'Sarah', 'Hamida', 'ligne add1', 'ligne add2', 'Meximieux', '01800', '0612345678', 's.hamida@gmail.com', 1),
(2, 'Jean-Benoît', 'Delaroche', 'ligne add1', 'ligne add2', 'Lyon', '69009', '0796321458', 'jb.delaroche@gmx.fr', 1);

-- --------------------------------------------------------

--
-- Structure de la table `delivery_addresses`
--

CREATE TABLE `delivery_addresses` (
  `id` int(11) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `add1` varchar(50) NOT NULL,
  `add2` varchar(50) NOT NULL,
  `city` varchar(50) NOT NULL,
  `postcode` varchar(10) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `email` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `delivery_addresses`
--

INSERT INTO `delivery_addresses` (`id`, `firstname`, `lastname`, `add1`, `add2`, `city`, `postcode`, `phone`, `email`) VALUES
(46, 'Christian', 'Hamida', '15 Rue de la paix', '', 'Saint Etienne', '42000', '0477213145', 'chr.hamida@gmail.com'),
(47, 'Sarah', 'Hamida', 'ligne add1', 'ligne add2', 'Meximieux', '01800', '0612345678', 's.hamida@gmail.com'),
(48, 'Jean-Benoît', 'Delaroche', 'ligne add1', 'ligne add2', 'Lyon', '69009', '0796321458', 'jb.delaroche@gmx.fr'),
(49, 'Louise', 'Delaroche', '12 avenue condorcet', 'étage 2', 'Saint Priest', '45097', '0526117898', 'louise.delaroche@yahoo.fr');

-- --------------------------------------------------------

--
-- Structure de la table `logins`
--

CREATE TABLE `logins` (
  `id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `logins`
--

INSERT INTO `logins` (`id`, `customer_id`, `username`, `password`) VALUES
(1, 1, 'Hamidou', 'd6ee53abcd3b045befa8af69f445fafc33f1f88b'),
(2, 2, 'Delaroche', '56a5d2bd85e6c9956d122f59f79540ee0f75e5ad');

-- --------------------------------------------------------

--
-- Structure de la table `orderitems`
--

CREATE TABLE `orderitems` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `orderitems`
--

INSERT INTO `orderitems` (`id`, `order_id`, `product_id`, `quantity`) VALUES
(235, 63, 14, 1),
(236, 63, 17, 2),
(237, 63, 19, 1),
(238, 63, 11, 3),
(239, 64, 10, 1),
(240, 64, 18, 1),
(241, 64, 20, 1),
(242, 65, 9, 1),
(243, 65, 15, 2),
(244, 65, 16, 1),
(245, 66, 23, 1),
(246, 66, 24, 1);

-- --------------------------------------------------------

--
-- Structure de la table `orders`
--

CREATE TABLE `orders` (
  `id` int(20) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `registered` int(11) NOT NULL,
  `delivery_add_id` int(11) DEFAULT NULL,
  `payment_type` varchar(6) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `status` tinyint(4) NOT NULL,
  `session` varchar(100) NOT NULL,
  `total` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `orders`
--

INSERT INTO `orders` (`id`, `customer_id`, `registered`, `delivery_add_id`, `payment_type`, `date`, `status`, `session`, `total`) VALUES
(63, 1, 1, 47, 'cheque', '2020-01-23', 10, 'da8bcdf51121d96c71673295b825a010', 86.2),
(64, 1, 1, 47, 'paypal', '2020-01-23', 3, 'da8bcdf51121d96c71673295b825a010', 87),
(65, 2, 1, 49, 'cheque', '2020-01-23', 10, 'da8bcdf51121d96c71673295b825a010', 51.2),
(66, 2, 1, 49, 'cheque', '2020-01-23', 2, 'da8bcdf51121d96c71673295b825a010', 42.3);

-- --------------------------------------------------------

--
-- Structure de la table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `cat_id` tinyint(4) NOT NULL,
  `name` varchar(150) NOT NULL,
  `description` text NOT NULL,
  `image` varchar(30) NOT NULL,
  `price` decimal(5,2) NOT NULL,
  `quantity` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `products`
--

INSERT INTO `products` (`id`, `cat_id`, `name`, `description`, `image`, `price`, `quantity`) VALUES
(4, 2, 'jeep', 'description du contenu de la boite', 'jeep.png', '12.90', 0),
(5, 2, 'carosse citrouille', 'description du contenu de la boite', 'pumpkinCar.png', '10.50', 3),
(6, 2, 'voiture de course', 'description du contenu de la boite', 'raceCar.png', '6.90', 2),
(7, 2, 'camion', 'description du contenu de la boite', 'truck.png', '7.90', 6),
(8, 1, 'accordeon', 'description du contenu de la boite', 'musicAccordeon', '15.50', 17),
(9, 1, 'batterie', 'description du contenu de la boite', 'musicDrum.png', '32.00', 6),
(10, 1, 'saxophone', 'description du contenu de la boite', 'musicSaxo.png', '25.00', 7),
(11, 1, 'guitare electrique', 'description du contenu de la boite', 'musicElectricGuitar.png', '8.30', 4),
(12, 1, 'violoncelle', 'description du contenu de la boite', 'notAvailable.png', '9.90', 10),
(13, 1, 'Produit à venir', 'description du contenu de la boite', 'notAvailable.png', '5.20', 3),
(14, 1, 'Produit à venir', 'description du contenu de la boite ', 'notAvailable.png', '3.20', 8),
(15, 1, 'Produit à venir', 'description du contenu de la boite', 'notAvailable.png', '7.30', 7),
(16, 1, 'Produit à venir', 'description du contenu de la boite', 'notAvailable.png', '4.60', 19),
(17, 1, 'Produit à venir', 'description du contenu de la boite', 'notAvailable.png', '15.00', 10),
(18, 1, 'Produit à venir', 'description du contenu de la boite', 'notAvailable.png', '45.00', 11),
(19, 1, 'Produit à venir', 'description du contenu de la boite', 'notAvailable.png', '28.10', 20),
(20, 1, 'Produit à venir', 'description du contenu de la boite', 'notAvailable.png', '10.50', 9),
(21, 1, 'Produit à venir', 'description du contenu de la boite', 'notAvailable.png', '8.90', 4),
(22, 1, 'Produit à venir', 'description du contenu de la boite', 'notAvailable.png', '13.90', 13),
(23, 1, 'Produit à venir', 'description du contenu de la boite', 'notAvailable.png', '15.30', 15),
(24, 3, 'horloge chouette', 'description du contenu de la boite', 'owlClock.png', '20.50', 18),
(25, 3, 'steampunkRabbit', 'description du contenu de la boite', 'steampunkRabbit.png', '10.80', 8),
(26, 3, 'steampunkSpaceShip', 'description du contenu de la boite', 'steampunkSpaceShip.png', '12.30', 10),
(27, 3, 'steampunkSubMarine', 'description du contenu de la boite', 'steampunkSubMarine.png', '13.50', 14),
(28, 3, 'Produit à venir', 'description du contenu de la boite', 'notAvailable.png', '25.30', 20);

-- --------------------------------------------------------

--
-- Structure de la table `reviews`
--

CREATE TABLE `reviews` (
  `id_product` int(11) NOT NULL,
  `name_user` varchar(50) NOT NULL,
  `photo_user` varchar(50) NOT NULL,
  `stars` int(1) NOT NULL,
  `title` varchar(50) NOT NULL,
  `description` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `delivery_addresses`
--
ALTER TABLE `delivery_addresses`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `logins`
--
ALTER TABLE `logins`
  ADD PRIMARY KEY (`id`),
  ADD KEY `customer_id` (`customer_id`);

--
-- Index pour la table `orderitems`
--
ALTER TABLE `orderitems`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_id` (`order_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Index pour la table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `customer_id` (`customer_id`),
  ADD KEY `delivery_add_id` (`delivery_add_id`);

--
-- Index pour la table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cat_id` (`cat_id`);

--
-- Index pour la table `reviews`
--
ALTER TABLE `reviews`
  ADD KEY `id_product` (`id_product`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` tinyint(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT pour la table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT pour la table `delivery_addresses`
--
ALTER TABLE `delivery_addresses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT pour la table `logins`
--
ALTER TABLE `logins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT pour la table `orderitems`
--
ALTER TABLE `orderitems`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=247;

--
-- AUTO_INCREMENT pour la table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;

--
-- AUTO_INCREMENT pour la table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `logins`
--
ALTER TABLE `logins`
  ADD CONSTRAINT `logins_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`);

--
-- Contraintes pour la table `orderitems`
--
ALTER TABLE `orderitems`
  ADD CONSTRAINT `orderitems_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`),
  ADD CONSTRAINT `orderitems_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`);

--
-- Contraintes pour la table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`),
  ADD CONSTRAINT `orders_ibfk_2` FOREIGN KEY (`delivery_add_id`) REFERENCES `delivery_addresses` (`id`);

--
-- Contraintes pour la table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`cat_id`) REFERENCES `categories` (`id`);

--
-- Contraintes pour la table `reviews`
--
ALTER TABLE `reviews`
  ADD CONSTRAINT `reviews_ibfk_1` FOREIGN KEY (`id_product`) REFERENCES `products` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
