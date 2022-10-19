-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : mer. 19 oct. 2022 à 15:03
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
-- Base de données : `admin_elearning`
--

-- --------------------------------------------------------

--
-- Structure de la table `about_web`
--

CREATE TABLE `about_web` (
  `url1` varchar(250) NOT NULL,
  `url2` varchar(250) NOT NULL,
  `url3` varchar(250) NOT NULL,
  `url4` varchar(250) NOT NULL,
  `url5` varchar(250) NOT NULL,
  `about_us` text NOT NULL,
  `logo` varchar(250) NOT NULL,
  `cover` varchar(250) NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `about_web`
--

INSERT INTO `about_web` (`url1`, `url2`, `url3`, `url4`, `url5`, `about_us`, `logo`, `cover`, `id`) VALUES
('https://github.com', 'https://youtube.com', 'https://facebook.com', 'https://twitter.com', 'https://instagram.com', 'about us', '', '', 1);

-- --------------------------------------------------------

--
-- Structure de la table `cat`
--

CREATE TABLE `cat` (
  `cat_id` int(10) NOT NULL,
  `cat_name` text NOT NULL,
  `image` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `course`
--

CREATE TABLE `course` (
  `id_cours` int(11) NOT NULL,
  `title` text NOT NULL,
  `short_description` text NOT NULL,
  `description` text NOT NULL,
  `price` int(11) NOT NULL,
  `price_r` int(11) NOT NULL,
  `cover` varchar(250) NOT NULL,
  `video_intro` varchar(250) NOT NULL,
  `date_cours` date NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_cat` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `demande_enseignement`
--

CREATE TABLE `demande_enseignement` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `niveau_acad` varchar(250) NOT NULL,
  `niveau` int(11) NOT NULL,
  `lang` text NOT NULL,
  `file` varchar(250) NOT NULL,
  `resultat` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `sub_cat`
--

CREATE TABLE `sub_cat` (
  `sub_cat_id` int(10) NOT NULL,
  `sub_cat_name` text NOT NULL,
  `cat_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `tb_admin`
--

CREATE TABLE `tb_admin` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `image` varchar(250) NOT NULL,
  `email` varchar(250) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `tb_admin`
--

INSERT INTO `tb_admin` (`id`, `name`, `image`, `email`, `lastname`, `password`) VALUES
(3, 'admin', 'admin - 2022.10.19 - 02.19.07pm.png', 'admin@gmail.com', 'admin', '1234');

-- --------------------------------------------------------

--
-- Structure de la table `tb_blog`
--

CREATE TABLE `tb_blog` (
  `id_blog` int(11) NOT NULL,
  `id_admin` int(11) NOT NULL,
  `blog_title` varchar(250) NOT NULL,
  `blog_sub_title` varchar(250) NOT NULL,
  `blog_cont` text NOT NULL,
  `blog_image` varchar(250) NOT NULL,
  `blog_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `prenom` varchar(100) NOT NULL,
  `email` varchar(250) NOT NULL,
  `password` varchar(250) NOT NULL,
  `user_image` varchar(250) NOT NULL,
  `type` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `about_web`
--
ALTER TABLE `about_web`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `cat`
--
ALTER TABLE `cat`
  ADD PRIMARY KEY (`cat_id`);

--
-- Index pour la table `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`id_cours`);

--
-- Index pour la table `demande_enseignement`
--
ALTER TABLE `demande_enseignement`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `sub_cat`
--
ALTER TABLE `sub_cat`
  ADD PRIMARY KEY (`sub_cat_id`);

--
-- Index pour la table `tb_admin`
--
ALTER TABLE `tb_admin`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `tb_blog`
--
ALTER TABLE `tb_blog`
  ADD PRIMARY KEY (`id_blog`);

--
-- Index pour la table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `about_web`
--
ALTER TABLE `about_web`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `cat`
--
ALTER TABLE `cat`
  MODIFY `cat_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=75;

--
-- AUTO_INCREMENT pour la table `course`
--
ALTER TABLE `course`
  MODIFY `id_cours` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT pour la table `demande_enseignement`
--
ALTER TABLE `demande_enseignement`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=94;

--
-- AUTO_INCREMENT pour la table `sub_cat`
--
ALTER TABLE `sub_cat`
  MODIFY `sub_cat_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT pour la table `tb_admin`
--
ALTER TABLE `tb_admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `tb_blog`
--
ALTER TABLE `tb_blog`
  MODIFY `id_blog` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
