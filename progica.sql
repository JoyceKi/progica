-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : jeu. 07 déc. 2023 à 16:59
-- Version du serveur : 10.4.28-MariaDB
-- Version de PHP : 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `progica`
--

--
-- Déchargement des données de la table `adresse`
--

INSERT INTO `adresse` (`id`, `latitude`, `longitude`, `voie`, `code_postal`, `ville`, `region`, `departement`) VALUES
(21, 48.133, -1.2, 'Rue du Pays', '35500', 'Vitré', 'Bretagne', 'Ille et Vilaine'),
(22, 48.133, -1.2, 'Rue du Loire', '83000', 'Toulon', 'Var', 'Provence'),
(23, 48.133, -1.2, 'Chemin du Bonheur', '49420', 'La Cormeraie', 'Maine et Loire', 'Loire Atlantique'),
(24, 48.133, -1.2, 'Rue du Pays', '89290', 'Auxerre', 'Yonne', 'Bourgogne Franche Comté'),
(25, 48.133, -1.2, 'Rue du Soleil', '26000', 'Valence', 'Drôme', 'Auvergne-Rhône-Alpes'),
(26, 48.133, -1.2, 'Rue du Paté', '3900', 'Machin', 'Jura', 'Saône et Loire'),
(27, 48.133, -1.2, 'Rue du Pays', '35500', 'Vichy', 'l\'Allier', 'Auvergne-Rhône-Alpes'),
(28, 48.133, -1.2, 'Rue du Canton', '35500', 'Vitré', 'Bretagne', 'Ille et Vilaine'),
(29, 48.133, -1.2, 'Rue du Trot', '23000', 'Guéret', 'Creuse', 'Nouvelle Aquitaine'),
(30, 48.133, -1.2, 'Rue de l\'Oseille', '24400', 'Périgueux', 'Périgord', 'Nouvelle Aquitaine'),
(31, 457, 5.4, '5 rue des Loups', '83250', 'Toulon', 'Var', 'Provence');

--
-- Déchargement des données de la table `disponibilites`
--

INSERT INTO `disponibilites` (`id`, `jours`, `heure_debut`, `heure_fin`) VALUES
(11, 'Du lundi au vendredi', '09:00:00', '18:00:00'),
(13, 'Du mardi au samedi', '10:00:00', '19:00:00'),
(15, 'Du lundi au vendredi', '09:00:00', '18:00:00'),
(17, 'Du lundi au vendredi', '09:30:00', '17:30:00'),
(19, 'Du lundi au vendredi', '09:00:00', '17:00:00');

--
-- Déchargement des données de la table `equipement`
--

INSERT INTO `equipement` (`id`, `equipements`, `description`, `tarif`) VALUES
(22, 'Lave-linge', '7 kg', 0),
(23, 'Lave-vaisselle', '8 couverts', 0),
(24, 'Climatisation', 'Chaud/froid', 0),
(25, 'Télévision', 'Avec Freebox TV', 7),
(26, 'Terrasse', 'Avec meubles de jardin', 0),
(27, 'Barbecue', 'bois/charbon', 10),
(28, 'piscine', 'Privée', 20.5),
(29, 'Terrain de tennis', 'Béton peint, grillage 3m de haut', 15),
(30, 'Table de ping-pong', 'raquettes et balles fournies ', 10.5),
(31, 'Lave-linge', '7 kg', 0);

--
-- Déchargement des données de la table `gite`
--

INSERT INTO `gite` (`id`, `proprietaire_id`, `adresse_id`, `nom`, `surface_hab`, `chambre`, `couchage`, `animauxacceptes`, `tarif_animaux`) VALUES
(21, 26, 21, 'Sagoa', 90, 2, 4, 0, 0),
(22, 26, 22, 'Nuage', 70, 2, 4, 0, 0),
(23, 27, 23, 'Colibri', 80, 2, 5, 0, 0),
(24, 27, 24, 'Le clos joli', 110, 3, 6, 1, 25.3),
(25, 28, 25, 'Solstice', 95, 3, 5, 0, 0),
(26, 28, 26, 'Pacific', 120, 4, 7, 1, 30),
(27, 29, 27, 'Le Pré', 65, 2, 4, 1, 15),
(28, 29, 28, 'Prodige', 100, 3, 5, 0, 0),
(29, 30, 29, 'La Brise légère', 130, 3, 6, 1, 25),
(30, 30, 31, 'Arc en ciel', 90, 2, 4, 0, 0);

--
-- Déchargement des données de la table `gite_equipement`
--

INSERT INTO `gite_equipement` (`gite_id`, `equipement_id`) VALUES
(21, 22),
(21, 27),
(22, 23),
(23, 24),
(24, 25),
(25, 25),
(25, 26),
(26, 27),
(27, 26),
(27, 28),
(27, 29),
(28, 29),
(29, 30),
(30, 23),
(30, 25),
(30, 31);

--
-- Déchargement des données de la table `gite_service`
--

INSERT INTO `gite_service` (`gite_id`, `service_id`) VALUES
(21, 22),
(22, 23),
(23, 24),
(24, 22),
(24, 24),
(25, 24),
(26, 23),
(26, 24),
(27, 23),
(28, 22),
(29, 24),
(30, 22),
(30, 24);

--
-- Déchargement des données de la table `proprietaire`
--

INSERT INTO `proprietaire` (`id`, `nom`, `prenom`, `telephone`, `email`) VALUES
(26, 'Danton', 'Frédéric', 126456789, 'example@example.com'),
(27, 'Clapton', 'Éric', 126456789, 'e.clapton@example.com'),
(28, 'Guate', 'Anna', 126456789, 'q.guate@example.com'),
(29, 'Dupont', 'Marguerite', 126456789, 'm.dupont@example.com'),
(30, 'Reeves', 'Christopher', 126456789, 'c.reeves@example.com');

--
-- Déchargement des données de la table `proprietaire_disponibilites`
--

INSERT INTO `proprietaire_disponibilites` (`proprietaire_id`, `disponibilites_id`) VALUES
(26, 11),
(27, 13),
(28, 15),
(29, 17),
(30, 19);

--
-- Déchargement des données de la table `service`
--

INSERT INTO `service` (`id`, `services`, `description`, `tarif`) VALUES
(22, 'Ménage de fin de séjour', 'Poussière, aspirateur, sanitaires, poubelles', 35),
(23, 'Location de linge', 'Draps de bain, serviettes, draps, taies d\'oreillers', 35),
(24, 'Accès internet', 'Code wifi ', 35);

--
-- Déchargement des données de la table `tarif_periode`
--

INSERT INTO `tarif_periode` (`id`, `nom`, `dates`, `tarif`) VALUES
(1, 'Haute saison', 'Du 15-06 au 30-09', 850.4),
(2, 'Basse saison', 'Du 01-10 au 14-06', 550.7),
(3, 'Noël', 'Du 23-12 au 30-12', 948.5),
(4, 'Nouvel an', 'Du 30-12 au 06-01', 1020.3);

--
-- Déchargement des données de la table `tarif_periode_gite`
--

INSERT INTO `tarif_periode_gite` (`tarif_periode_id`, `gite_id`) VALUES
(1, 21),
(1, 22),
(1, 23),
(1, 24),
(1, 25),
(1, 26),
(1, 27),
(1, 28),
(1, 29),
(1, 30),
(2, 21),
(2, 22),
(2, 23),
(2, 24),
(2, 25),
(2, 26),
(2, 27),
(2, 28),
(2, 29),
(2, 30),
(3, 21),
(3, 22),
(3, 23),
(3, 24),
(3, 25),
(3, 26),
(3, 27),
(3, 28),
(3, 29),
(3, 30),
(4, 21),
(4, 22),
(4, 23),
(4, 24),
(4, 25),
(4, 26),
(4, 27),
(4, 28),
(4, 29),
(4, 30);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
