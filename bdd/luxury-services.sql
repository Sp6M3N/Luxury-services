-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:3306
-- Généré le :  jeu. 18 juil. 2019 à 14:46
-- Version du serveur :  5.7.24
-- Version de PHP :  7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `luxury-services`
--

-- --------------------------------------------------------

--
-- Structure de la table `candidats`
--

CREATE TABLE `candidats` (
  `id` int(11) NOT NULL,
  `first_name` text CHARACTER SET utf8,
  `last_name` text CHARACTER SET utf8,
  `gender` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `address` text CHARACTER SET utf8,
  `country` text CHARACTER SET utf8,
  `nationality` text CHARACTER SET utf8,
  `has_a_passport` tinyint(1) DEFAULT NULL,
  `passport` text CHARACTER SET utf8,
  `curriculum_vitae` text CHARACTER SET utf8,
  `profil_picture` text CHARACTER SET utf8,
  `current_location` text CHARACTER SET utf8,
  `birth_date` timestamp NULL DEFAULT NULL,
  `place_of_birth` text CHARACTER SET utf8,
  `availability` tinyint(1) DEFAULT NULL,
  `experience` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `short_description` text CHARACTER SET utf8,
  `notes` text CHARACTER SET utf8,
  `created_date` timestamp NULL DEFAULT NULL,
  `uploaded_date` timestamp NULL DEFAULT NULL,
  `job_category_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `candidats`
--

INSERT INTO `candidats` (`id`, `first_name`, `last_name`, `gender`, `address`, `country`, `nationality`, `has_a_passport`, `passport`, `curriculum_vitae`, `profil_picture`, `current_location`, `birth_date`, `place_of_birth`, `availability`, `experience`, `short_description`, `notes`, `created_date`, `uploaded_date`, `job_category_id`, `user_id`) VALUES
(1, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, 6);

-- --------------------------------------------------------

--
-- Structure de la table `candidatures`
--

CREATE TABLE `candidatures` (
  `candidat_id` int(11) NOT NULL,
  `job_offer_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `clients`
--

CREATE TABLE `clients` (
  `id` int(11) NOT NULL,
  `company_name` text CHARACTER SET utf8 NOT NULL,
  `company_type` text CHARACTER SET utf8 NOT NULL,
  `contact_name` text CHARACTER SET utf8 NOT NULL,
  `contact_role` text CHARACTER SET utf8 NOT NULL,
  `contact_number` text CHARACTER SET utf8 NOT NULL,
  `contact_email` text CHARACTER SET utf8 NOT NULL,
  `notes` text CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `job_categories`
--

CREATE TABLE `job_categories` (
  `id` int(11) NOT NULL,
  `job_category` varchar(255) CHARACTER SET utf8 DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `job_categories`
--

INSERT INTO `job_categories` (`id`, `job_category`) VALUES
(2, 'Commercial'),
(3, 'Retail sales'),
(4, 'Creative'),
(5, 'Technology'),
(6, 'Marketing & PR'),
(7, 'Fashion & luxury'),
(8, 'Management & HR');

-- --------------------------------------------------------

--
-- Structure de la table `job_offers`
--

CREATE TABLE `job_offers` (
  `id` int(11) NOT NULL,
  `reference` text CHARACTER SET utf8 NOT NULL,
  `job_title` text CHARACTER SET utf8 NOT NULL,
  `description` text CHARACTER SET utf8 NOT NULL,
  `is_activated` tinyint(1) NOT NULL,
  `notes` text CHARACTER SET utf8 NOT NULL,
  `job_type` set('Full time','Part time','Temporary','Freelance','Seasonial') CHARACTER SET utf8 DEFAULT NULL,
  `Salary` int(11) NOT NULL,
  `created_time` timestamp NOT NULL,
  `updated_time` timestamp NOT NULL ON UPDATE CURRENT_TIMESTAMP,
  `client_id` int(11) DEFAULT NULL,
  `job_category_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `migration_versions`
--

CREATE TABLE `migration_versions` (
  `version` varchar(14) COLLATE utf8mb4_unicode_ci NOT NULL,
  `executed_at` datetime NOT NULL COMMENT '(DC2Type:datetime_immutable)'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `migration_versions`
--

INSERT INTO `migration_versions` (`version`, `executed_at`) VALUES
('20190709124740', '2019-07-09 12:49:17'),
('20190711114018', '2019-07-11 11:41:17');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `email` varchar(180) COLLATE utf8mb4_unicode_ci NOT NULL,
  `roles` json NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `email`, `roles`, `password`) VALUES
(1, 'test@test.com', '[]', '$argon2id$v=19$m=65536,t=6,p=1$Tm5yOUNpLmRYdlVhTnJMUA$qxx+/Aqk19mKtRE3TRLqWtzUOSpFNnVhWXNM6lnlEgk'),
(2, 'test1@test.com', '[]', '$argon2id$v=19$m=65536,t=6,p=1$VVVMSWIyR1VNajVKMWxYTQ$Iq+npo+DB352RM6fhii9uPnK6WQ45MdvBS09pp2jvXw'),
(3, 'test2@test.com', '[]', '$argon2id$v=19$m=65536,t=6,p=1$S2s2QnRhSDhKVzJFWkt1eg$JSmyPa4W1H8Tv3DQFpPT9jcVACpgdq4sAz5rsx4NKeM'),
(4, 'test3@test3.com', '[]', '$argon2id$v=19$m=65536,t=6,p=1$bFFJalE4cHZqNTloeHVtbg$MiY3SgFll3FC6W3dBWpFSwpd/D0SOEitU+B+8CuefJE'),
(6, 'test4@test4.com', '[]', '$argon2id$v=19$m=65536,t=6,p=1$WDhod1RxM3VkN1ZMR05naQ$L4BSjyUOtHyqbz6Z7RZtCyp4dbO51sKCSavYT3iWT2k');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `candidats`
--
ALTER TABLE `candidats`
  ADD PRIMARY KEY (`id`),
  ADD KEY `job_candidat_category_id` (`job_category_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Index pour la table `candidatures`
--
ALTER TABLE `candidatures`
  ADD PRIMARY KEY (`candidat_id`,`job_offer_id`),
  ADD KEY `IDX_DE57CF663481D195` (`job_offer_id`);

--
-- Index pour la table `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `job_categories`
--
ALTER TABLE `job_categories`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `job_offers`
--
ALTER TABLE `job_offers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `client_id` (`client_id`),
  ADD KEY `job_offer_category_id` (`job_category_id`);

--
-- Index pour la table `migration_versions`
--
ALTER TABLE `migration_versions`
  ADD PRIMARY KEY (`version`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_1483A5E9E7927C74` (`email`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `candidats`
--
ALTER TABLE `candidats`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `clients`
--
ALTER TABLE `clients`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `job_categories`
--
ALTER TABLE `job_categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT pour la table `job_offers`
--
ALTER TABLE `job_offers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `candidats`
--
ALTER TABLE `candidats`
  ADD CONSTRAINT `FK_3C663B15A76ED395` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `candidats_ibfk_1` FOREIGN KEY (`job_category_id`) REFERENCES `job_categories` (`id`);

--
-- Contraintes pour la table `candidatures`
--
ALTER TABLE `candidatures`
  ADD CONSTRAINT `candidatures_ibfk_1` FOREIGN KEY (`candidat_id`) REFERENCES `candidats` (`id`),
  ADD CONSTRAINT `candidatures_ibfk_2` FOREIGN KEY (`job_offer_id`) REFERENCES `job_offers` (`id`);

--
-- Contraintes pour la table `job_offers`
--
ALTER TABLE `job_offers`
  ADD CONSTRAINT `job_offers_ibfk_1` FOREIGN KEY (`client_id`) REFERENCES `clients` (`id`),
  ADD CONSTRAINT `job_offers_ibfk_2` FOREIGN KEY (`job_category_id`) REFERENCES `job_categories` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
