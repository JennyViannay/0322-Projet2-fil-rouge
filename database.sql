-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:8889
-- Généré le : jeu. 21 avr. 2022 à 06:00
-- Version du serveur :  5.7.32
-- Version de PHP : 7.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Base de données : `database_name`
--

-- --------------------------------------------------------

--
-- Structure de la table `color`
--

CREATE TABLE `color` (
  `id` int(11) NOT NULL,
  `name` varchar(80) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `color`
--

INSERT INTO `color` (`id`, `name`) VALUES
(1, 'noir'),
(2, 'blanc');

-- --------------------------------------------------------

--
-- Structure de la table `model`
--

CREATE TABLE `model` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `price` int(11) NOT NULL,
  `illustration` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `model`
--

INSERT INTO `model` (`id`, `name`, `description`, `price`, `illustration`, `slug`) VALUES
(1, 'Paris Polo', 'Col rehaussé, boutonnière dissimulée et nouvelle matière petit piqué stretch pour l\'audacieux Polo Paris, qui réinvente la silhouette du polo avec style et élégance pour toutes les occasions.\r\nPiqué de coton stretch uni\r\nCol chemise avec patte de boutonnage dissimulée\r\nRegular fit : Coupe ajustée\r\nFinitions bord-côte col et manches\r\nCrocodile ton sur ton brodé poitrine\r\nMatière principale : Coton (94%), Élasthanne (6%) / Manchette bord côte : Coton (99%), Élasthanne (1%) / Col bord côte : Coton (100%)\r\nLe mannequin mesure 1m85 et porte la taille 4', 120, 'https://image1.lacoste.com/dw/image/v2/AAQM_PRD/on/demandware.static/Sites-FR-Site/Sites-master/fr/dwbc8d37f5/PH5522_031_21.jpg?imwidth=645&impolicy=product', 'paris-polo'),
(2, 'Coupe Classique', 'Modèle iconique du vestiaire Lacoste, ce polo L.12.12 en petit piqué de coton allie confort et élégance. Chic et intemporel, vous porterez cet essentiel en toutes occasions. Ce polo taille grand, si vous hésitez entre deux tailles, nous vous conseillons de prendre la taille en dessous.\r\nBord-côte sur le col et les manches\r\nCol à deux boutons nacrés\r\nCoupe droite\r\nPetit piqué de coton\r\nCrocodile vert brodé poitrine 2,5 cm\r\nCotton (100%)\r\n', 100, 'https://image1.lacoste.com/dw/image/v2/AAQM_PRD/on/demandware.static/Sites-FR-Site/Sites-master/fr/dw227771d5/L1212_PQS_21.jpg?imwidth=645&impolicy=product', 'coupe-classique');

-- --------------------------------------------------------

--
-- Structure de la table `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `model_id` int(200) NOT NULL,
  `color_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `size_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `product`
--

INSERT INTO `product` (`id`, `model_id`, `color_id`, `quantity`, `size_id`) VALUES
(9, 1, 1, 3, 1),
(10, 2, 1, 3, 1),
(11, 1, 2, 2, 2),
(12, 1, 2, 3, 3),
(13, 2, 2, 2, 3),
(14, 2, 2, 2, 4);

-- --------------------------------------------------------

--
-- Structure de la table `size`
--

CREATE TABLE `size` (
  `id` int(11) NOT NULL,
  `size` varchar(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `size`
--

INSERT INTO `size` (`id`, `size`) VALUES
(1, 'xs'),
(2, 's'),
(3, 'm'),
(4, 'l'),
(5, 'xl');

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `is_admin` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id`, `email`, `password`, `is_admin`) VALUES
(1, 'jade@gmail.com', '64a4e8faed1a1aa0bf8bf0fc84938d25', 0);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `color`
--
ALTER TABLE `color`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `model`
--
ALTER TABLE `model`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `size`
--
ALTER TABLE `size`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `color`
--
ALTER TABLE `color`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `model`
--
ALTER TABLE `model`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT pour la table `size`
--
ALTER TABLE `size`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
