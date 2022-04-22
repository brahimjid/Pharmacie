-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 22, 2022 at 07:23 PM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.4.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mpha`
--

-- --------------------------------------------------------

--
-- Table structure for table `commande`
--

CREATE TABLE `commande` (
  `id` int(11) NOT NULL,
  `date` datetime NOT NULL,
  `montant` double NOT NULL,
  `idFournisseur` int(11) DEFAULT NULL,
  `typecommande` int(11) NOT NULL,
  `idDepot` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `commande`
--

INSERT INTO `commande` (`id`, `date`, `montant`, `idFournisseur`, `typecommande`, `idDepot`) VALUES
(1, '2021-01-01 13:12:41', 2700, 41, 1, 1),
(14, '2021-05-08 13:13:27', 24, 1, 1, 1),
(24, '2022-04-22 10:11:31', 60059.94, 1, 1, 1),
(34, '2022-04-22 15:43:19', 1400, 41, 1, NULL),
(35, '2022-04-22 16:38:28', 3600, 41, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `dateslots`
--

CREATE TABLE `dateslots` (
  `id` int(11) NOT NULL,
  `dateperemption` date DEFAULT NULL,
  `numlot` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `quantite` int(11) NOT NULL,
  `idElements` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `depot`
--

CREATE TABLE `depot` (
  `id` int(11) NOT NULL,
  `nom` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` int(11) NOT NULL,
  `pourcentage` int(11) NOT NULL,
  `etat` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `depot`
--

INSERT INTO `depot` (`id`, `nom`, `type`, `pourcentage`, `etat`) VALUES
(1, 'Pharmacie Centrale', 0, 0, 0),
(11, 'Magasin', 0, 0, 0),
(21, 'Pharmacie Urgence', 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `elementscommande`
--

CREATE TABLE `elementscommande` (
  `id` int(11) NOT NULL,
  `prix` double NOT NULL,
  `idMedicament` int(11) NOT NULL,
  `idCommande` int(11) DEFAULT NULL,
  `quantite` int(11) NOT NULL,
  `prixtotal` double NOT NULL,
  `stockactuel` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `elementscommande`
--

INSERT INTO `elementscommande` (`id`, `prix`, `idMedicament`, `idCommande`, `quantite`, `prixtotal`, `stockactuel`) VALUES
(1, 2700, 91, 1, 1, 2700, 2),
(11, 12, 91, 11, 8, 96, 2),
(14, 12, 91, 14, 2, 24, 2),
(24, 12, 91, 24, 5, 60, 2),
(34, 9999.99, 81, 24, 6, 59999.94, 2),
(44, 10, 95, 34, 20, 200, 2),
(45, 1200, 94, 34, 1, 1200, 2),
(46, 1200, 94, 35, 3, 3600, 2);

-- --------------------------------------------------------

--
-- Table structure for table `elementsfacture`
--

CREATE TABLE `elementsfacture` (
  `id` int(11) NOT NULL,
  `prix` double NOT NULL,
  `remise` double NOT NULL,
  `idMedicament` int(11) NOT NULL,
  `idFactrue` int(11) DEFAULT NULL,
  `quantite` int(11) NOT NULL,
  `prixtotal` double NOT NULL,
  `dateperemption` date DEFAULT NULL,
  `numlot` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `elementsfacture`
--

INSERT INTO `elementsfacture` (`id`, `prix`, `remise`, `idMedicament`, `idFactrue`, `quantite`, `prixtotal`, `dateperemption`, `numlot`) VALUES
(1, 2700, 0, 91, 1, 3, 8100, '2021-01-02', NULL),
(11, 2700, 0, 91, 31, 1, 2700, NULL, NULL),
(21, 9999.99, 0, 51, 41, 8, 79999.92, '2021-02-06', NULL),
(31, 2511.38, 0, 61, 41, 2, 5022.76, '2021-01-15', NULL),
(41, 9999.99, 0, 81, 41, 4, 39999.96, '2021-02-06', NULL),
(51, 1200, 0, 71, 41, 5, 6000, '2021-01-01', NULL),
(61, 2700, 0, 91, 41, 3, 8100, '2021-01-02', NULL),
(71, 12, 0, 91, 51, 3, 8100, '2021-02-07', NULL),
(74, 1200, 0, 94, 54, 1, 1200, '2021-05-15', NULL),
(84, 1200, 0, 94, 64, 1, 1200, NULL, NULL),
(94, 15.6, 0, 91, 74, 3, 46.8, NULL, NULL),
(104, 9999.99, 0, 81, 84, 3, 29999.97, NULL, NULL),
(114, 1200, 0, 71, 94, 2, 2400, NULL, NULL),
(124, 2511.38, 0, 61, 104, 1, 2511.38, NULL, NULL),
(134, 9999.99, 0, 51, 114, 1, 9999.99, NULL, NULL),
(144, 9999.99, 0, 51, 124, 1, 9999.99, NULL, NULL),
(154, 1200, 0, 94, 134, 3, 3600, '2022-04-23', NULL),
(164, 12, 0, 91, 134, 5, 60, '2022-05-06', NULL),
(174, 8072.77, 0, 11, 144, 20, 161455.40000000002, '2022-04-23', NULL),
(175, 12, 0, 91, 145, 7, 84, '2022-04-23', NULL),
(176, 9999.99, 0, 81, 145, 10, 99999.9, '2022-04-23', NULL),
(177, 1200, 0, 71, 145, 10, 12000, '2022-04-23', NULL),
(178, 1200, 0, 94, 146, 25, 30000, '2022-04-23', NULL),
(179, 10, 0, 95, 148, 2, 20, '2022-04-23', NULL),
(180, 10, 0, 95, 149, 10, 100, '2022-04-23', NULL),
(181, 1200, 0, 94, 150, 20, 24000, '2022-04-23', NULL),
(182, 1200, 0, 94, 151, 19, 22800, '2022-04-29', NULL),
(183, 1200, 0, 94, 152, 20, 24000, '2022-04-23', NULL),
(184, 1200, 0, 94, 154, 10, 12000, '2022-04-23', NULL),
(185, 1200, 0, 94, 155, 3, 3600, NULL, NULL),
(186, 1200, 0, 94, 156, 3, 3600, '2022-04-23', NULL),
(187, 1200, 0, 94, 157, 3, 3600, NULL, NULL),
(188, 1200, 0, 94, 158, 3, 3600, NULL, NULL),
(189, 10, 0, 95, 159, 1, 10, '2022-04-16', NULL),
(190, 10, 0, 95, 160, 1, 10, '2022-04-16', NULL),
(191, 1200, 0, 94, 161, 3, 3600, NULL, NULL),
(192, 1200, 0, 94, 162, 3, 3600, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `elementsrecu`
--

CREATE TABLE `elementsrecu` (
  `id` int(11) NOT NULL,
  `date` datetime NOT NULL,
  `idMedicament` int(11) NOT NULL,
  `idRecu` int(11) NOT NULL,
  `prix` double NOT NULL,
  `quantite` int(11) NOT NULL,
  `prixtotal` double NOT NULL,
  `pourcentage` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `elementsrecu`
--

INSERT INTO `elementsrecu` (`id`, `date`, `idMedicament`, `idRecu`, `prix`, `quantite`, `prixtotal`, `pourcentage`) VALUES
(1, '2021-01-01 00:00:00', 51, 1, 9999.99, 2, 19999.98, 30),
(11, '2021-02-07 00:00:00', 51, 11, 9999.99, 2, 19999.98, 30),
(21, '2021-02-07 00:00:00', 61, 11, 2511.38, 1, 2511.38, 30),
(31, '2021-02-07 00:00:00', 91, 11, 15.6, 1, 15.6, 30),
(41, '2021-02-07 00:00:00', 91, 21, 15.6, 2, 31.2, 30),
(51, '2021-02-07 00:00:00', 81, 21, 9999.99, 1, 9999.99, 30),
(61, '2021-02-07 00:00:00', 71, 21, 1200, 3, 3600, 10),
(64, '2022-03-25 00:00:00', 51, 24, 9999.99, 1, 9999.99, 30),
(74, '2022-03-25 00:00:00', 91, 24, 15.6, 2, 31.2, 30),
(84, '2022-04-22 00:00:00', 51, 34, 9999.99, 1, 9999.99, 30),
(94, '2022-04-22 00:00:00', 71, 44, 1200, 1, 1200, 10),
(95, '2022-04-22 00:00:00', 81, 44, 9999.99, 2, 19999.98, 30),
(96, '2022-04-22 00:00:00', 81, 45, 9999.99, 1, 9999.99, 30),
(97, '2022-04-22 00:00:00', 81, 46, 9999.99, 1, 9999.99, 30),
(98, '2022-04-22 00:00:00', 81, 47, 9999.99, 1, 9999.99, 30),
(99, '2022-04-22 00:00:00', 81, 48, 9999.99, 2, 19999.98, 30),
(100, '2022-04-22 00:00:00', 81, 49, 9999.99, 1, 9999.99, 30);

-- --------------------------------------------------------

--
-- Table structure for table `evacuation`
--

CREATE TABLE `evacuation` (
  `id` int(11) NOT NULL,
  `date` date NOT NULL,
  `nom` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `etat` int(11) NOT NULL DEFAULT 1,
  `prenom` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `montant` double NOT NULL,
  `idCaissier` int(11) NOT NULL,
  `idChauffeur` int(11) NOT NULL,
  `idInfermier` int(11) NOT NULL,
  `idSession` int(11) NOT NULL,
  `nature` int(11) NOT NULL,
  `matricule` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `facture`
--

CREATE TABLE `facture` (
  `id` int(11) NOT NULL,
  `date` datetime NOT NULL,
  `montant` double NOT NULL,
  `idTypeFacture` int(11) DEFAULT NULL,
  `idService` int(11) DEFAULT NULL,
  `idPatient` int(11) DEFAULT NULL,
  `idFournisseur` int(11) DEFAULT NULL,
  `idPersonnel` int(11) NOT NULL,
  `dateEcheancce` date DEFAULT NULL,
  `etatPaiement` tinyint(1) DEFAULT NULL,
  `numeroFactureAchat` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `datePaiement` date DEFAULT NULL,
  `numRecu` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lieuStock` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `numFacture` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `facture`
--

INSERT INTO `facture` (`id`, `date`, `montant`, `idTypeFacture`, `idService`, `idPatient`, `idFournisseur`, `idPersonnel`, `dateEcheancce`, `etatPaiement`, `numeroFactureAchat`, `datePaiement`, `numRecu`, `lieuStock`, `numFacture`) VALUES
(1, '2021-01-02 00:00:00', 8100, 2, 3, NULL, 41, 1, NULL, NULL, '78963', NULL, NULL, NULL, 'E/0001/21'),
(11, '2021-01-01 00:00:00', 2700, 1, 3, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, 'S/0001/21'),
(21, '2021-01-01 00:00:00', 2700, 1, 3, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, 'S/0001/21'),
(31, '2021-01-01 00:00:00', 2700, 1, 3, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, 'S/0001/21'),
(41, '2021-01-02 00:00:00', 139122.63999999998, 2, 3, NULL, 41, 1, NULL, NULL, '555', NULL, NULL, NULL, 'E/0001/21'),
(51, '2021-02-07 00:00:00', 8100, 2, 3, NULL, 1, 1, NULL, NULL, 'i12', NULL, NULL, NULL, 'E/0007/21'),
(54, '2021-05-08 00:00:00', 1200, 2, 3, NULL, 41, 1, NULL, NULL, '555', NULL, NULL, NULL, 'E/0008/21'),
(64, '2022-04-22 00:00:00', 1200, 1, 3, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, 'S/0022/22'),
(74, '2022-04-22 00:00:00', 46.8, 1, 3, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, 'S/0022/22'),
(84, '2022-04-22 00:00:00', 29999.97, 1, 3, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, 'S/0022/22'),
(94, '2022-04-22 00:00:00', 2400, 1, 3, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, 'S/0022/22'),
(104, '2022-04-22 00:00:00', 2511.38, 1, 3, NULL, NULL, 21, NULL, NULL, NULL, NULL, NULL, NULL, 'S/0022/22'),
(114, '2022-04-22 00:00:00', 9999.99, 1, 3, NULL, NULL, 21, NULL, NULL, NULL, NULL, NULL, NULL, 'S/0022/22'),
(124, '2022-04-22 00:00:00', 9999.99, 1, 3, NULL, NULL, 21, NULL, NULL, NULL, NULL, NULL, NULL, 'S/0022/22'),
(134, '2022-04-22 00:00:00', 3660, 2, 3, NULL, 1, 1, NULL, NULL, '4569', NULL, NULL, NULL, 'E/0022/22'),
(144, '2022-04-30 00:00:00', 161455.40000000002, 2, 3, NULL, 41, 21, NULL, NULL, '65', NULL, NULL, NULL, 'E/0022/22'),
(145, '2022-04-23 00:00:00', 112083.9, 2, 3, NULL, 31, 21, NULL, NULL, '4569', NULL, NULL, NULL, 'E/0022/22'),
(146, '2022-04-22 00:00:00', 30000, 2, 3, NULL, 41, 21, NULL, NULL, '12df', NULL, NULL, NULL, 'E/0022/22'),
(147, '2022-04-22 00:00:00', 2400, 1, 3, NULL, NULL, 21, NULL, NULL, NULL, NULL, NULL, NULL, 'S/0022/22'),
(148, '2022-04-23 00:00:00', 20, 2, 3, NULL, 21, 1, NULL, NULL, '534', NULL, NULL, NULL, 'E/0022/22'),
(149, '2022-04-23 00:00:00', 100, 2, 3, NULL, 41, 1, NULL, NULL, '12df', NULL, NULL, NULL, 'E/0022/22'),
(150, '2022-04-23 00:00:00', 24000, 2, 3, NULL, 41, 1, NULL, NULL, '65', NULL, NULL, NULL, 'E/0022/22'),
(151, '2022-04-23 00:00:00', 22800, 2, 3, NULL, 41, 1, NULL, NULL, '4569', NULL, NULL, NULL, 'E/0022/22'),
(152, '2022-04-23 00:00:00', 24000, 2, 3, NULL, 1, 21, NULL, NULL, '65', NULL, NULL, NULL, 'E/0022/22'),
(153, '2022-04-23 00:00:00', 6000, 2, 3, NULL, 41, 21, NULL, NULL, '65', NULL, NULL, NULL, 'E/0022/22'),
(154, '2022-04-23 00:00:00', 12000, 2, 3, NULL, 1, 21, NULL, NULL, '534', NULL, NULL, NULL, 'E/0022/22'),
(155, '2022-04-23 00:00:00', 3600, 2, 3, NULL, 41, 1, NULL, NULL, '12df', NULL, NULL, NULL, 'E/0022/22'),
(156, '2022-04-23 00:00:00', 3600, 2, 3, NULL, 41, 1, NULL, NULL, '4569', NULL, NULL, NULL, 'E/0022/22'),
(157, '2022-04-23 00:00:00', 3600, 2, 3, NULL, 41, 1, NULL, NULL, '4569', NULL, NULL, NULL, 'E/0022/22'),
(158, '2022-04-23 00:00:00', 3600, 2, 3, NULL, 41, 1, NULL, NULL, '658962', NULL, NULL, NULL, 'E/0022/22'),
(159, '2022-04-30 00:00:00', 10, 2, 3, NULL, 41, 1, NULL, NULL, '65klm', NULL, NULL, NULL, 'E/0022/22'),
(160, '2022-04-30 00:00:00', 10, 2, 3, NULL, 41, 1, NULL, NULL, '65klm', NULL, NULL, NULL, 'E/0022/22'),
(161, '2022-04-23 00:00:00', 3600, 2, 3, NULL, 41, 1, NULL, NULL, '6545632', NULL, NULL, NULL, 'E/0022/22'),
(162, '2022-04-23 00:00:00', 3600, 2, 3, NULL, 41, 1, NULL, NULL, '12df', NULL, NULL, NULL, 'E/0022/22');

-- --------------------------------------------------------

--
-- Table structure for table `fammilles`
--

CREATE TABLE `fammilles` (
  `id` int(11) NOT NULL,
  `nom` varchar(1000) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `fammilles`
--

INSERT INTO `fammilles` (`id`, `nom`) VALUES
(1, 'RADIOLOGIE'),
(11, 'STOMATOLOGIE'),
(21, 'SOLUTE '),
(31, 'AEROSOL'),
(41, 'COLLYRE'),
(51, 'ANTISEPTIQUE'),
(61, 'SIROP'),
(71, 'INJECTABLE'),
(81, 'COMPRIME'),
(91, 'CONSOMMABLE'),
(101, 'R. labo'),
(111, 'FILS DE SUTURE'),
(121, 'DIALYSE'),
(131, 'produits d\'anesthesie'),
(141, 'M.orthopedie'),
(151, 'sachet'),
(161, 'Roule'),
(171, 'FL'),
(181, 'SUPP'),
(191, 'Paire'),
(201, 'AMP'),
(211, 'Pomade'),
(221, 'Unite'),
(231, 'test'),
(241, 'akh'),
(251, 'hhh'),
(261, 'testi'),
(271, 'testi'),
(281, 'yay'),
(291, 'lmj'),
(301, 'tes'),
(311, 'Antibiotique');

-- --------------------------------------------------------

--
-- Table structure for table `fonction`
--

CREATE TABLE `fonction` (
  `id` int(11) NOT NULL,
  `nom` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `fonction`
--

INSERT INTO `fonction` (`id`, `nom`, `description`) VALUES
(1, 'Administrateur', 'Administrateur'),
(2, 'Gérant', 'Gérant pharmacie'),
(3, 'vendeur', 'vendeur');

-- --------------------------------------------------------

--
-- Table structure for table `fonctionnalite`
--

CREATE TABLE `fonctionnalite` (
  `id` int(11) NOT NULL,
  `nom` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(1000) COLLATE utf8mb4_unicode_ci NOT NULL,
  `etat` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `fonctionnalitegroupe`
--

CREATE TABLE `fonctionnalitegroupe` (
  `id` int(11) NOT NULL,
  `idFonctionnalite` int(11) NOT NULL,
  `idGroupe` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `forme`
--

CREATE TABLE `forme` (
  `id` int(11) NOT NULL,
  `nom` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `fournisseur`
--

CREATE TABLE `fournisseur` (
  `id` int(11) NOT NULL,
  `nom` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tel1` varchar(40) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tel2` varchar(40) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `adresse` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sigle` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `compte` int(11) NOT NULL,
  `email` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `etat` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `fournisseur`
--

INSERT INTO `fournisseur` (`id`, `nom`, `tel1`, `tel2`, `adresse`, `sigle`, `compte`, `email`, `etat`) VALUES
(1, 'Groupe Chinguitti pharma', '22954822', '', '', '', 21758568, '', 1),
(11, 'Somedib', '22379710', '', '', '', 4356475, '', 1),
(21, 'Pharmacie Babe Esselam', '', '', '', '', 743400, '', 0),
(31, 'Sociéte Elemel pharma', '', '', '', '', 30266060, '', 1),
(41, 'Camec', '2563985', '', '', '', 234876017, '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `groupe`
--

CREATE TABLE `groupe` (
  `id` int(11) NOT NULL,
  `nom` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `etat` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `historiquepaiement`
--

CREATE TABLE `historiquepaiement` (
  `id` int(11) NOT NULL,
  `montant` int(11) NOT NULL,
  `date` date NOT NULL,
  `numRecu` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `idFournisseur` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `historiquestock`
--

CREATE TABLE `historiquestock` (
  `id` int(11) NOT NULL,
  `idStock` int(11) DEFAULT 0,
  `quantite` double NOT NULL,
  `date` date NOT NULL,
  `idRecu` int(11) DEFAULT NULL,
  `idFacture` int(11) DEFAULT NULL,
  `typeOperation` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `numlot` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `datePeremption` date DEFAULT NULL,
  `depotorginal` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `depotReception` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `prixAchat` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `inventaire`
--

CREATE TABLE `inventaire` (
  `id` int(11) NOT NULL,
  `idMedicament` int(11) NOT NULL,
  `numlot` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `quantite` double NOT NULL,
  `datePeremption` date DEFAULT NULL,
  `prixAchat` double NOT NULL,
  `montantT` double NOT NULL,
  `idInventaireDepot` int(11) DEFAULT NULL,
  `quantiteinvente` int(11) NOT NULL,
  `prixVente` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `inventairedepot`
--

CREATE TABLE `inventairedepot` (
  `id` int(11) NOT NULL,
  `date` date NOT NULL,
  `idDepot` int(11) NOT NULL,
  `idpersonnel` int(11) NOT NULL,
  `etat` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `lov`
--

CREATE TABLE `lov` (
  `id` int(11) NOT NULL,
  `nom` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `idType` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `medicaments`
--

CREATE TABLE `medicaments` (
  `id` int(11) NOT NULL,
  `nom` varchar(1000) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prixAchat` double NOT NULL,
  `prixVente` double NOT NULL,
  `idfamille` int(11) DEFAULT NULL,
  `etat` int(11) NOT NULL DEFAULT 1,
  `pourcentage` int(11) NOT NULL,
  `seuil` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `medicaments`
--

INSERT INTO `medicaments` (`id`, `nom`, `prixAchat`, `prixVente`, `idfamille`, `etat`, `pourcentage`, `seuil`) VALUES
(11, 'FILM RADIO 18*24 B/100', 8072.77, 9999.99, 1, 1, 30, 0),
(21, 'FILM RADIO 30*40 B/100', 9999.99, 9999.99, 1, 1, 30, 0),
(31, 'FILM RADIO 35*35 B/100', 9999.99, 9999.99, 1, 1, 30, 0),
(41, 'FILM RADIO 35*43 B/100', 9999.99, 9999.99, 1, 1, 30, 0),
(51, 'FILM SCANNER B/100', 9999.99, 9999.99, 1, 1, 30, 0),
(61, 'FILMS ECHO ROULEAU', 2511.38, 3264.8, 1, 1, 30, 0),
(71, 'GEL ECHO B/5 L', 1200, 1200, 11, 1, 10, 0),
(81, 'REVELATEUR AUTO 2*20 L', 9999.99, 9999.99, 1, 1, 30, 0),
(91, 'AIGUILLE DENTAIRE B/100 COURTE', 12, 15.6, 1, 0, 30, 0),
(94, 'Cheikh Ahmed Aloueimin', 1200, 2000, 1, 4, 50, 3),
(95, 'Dolores consequatur', 10, 48, 1, 1, 82, 2);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(11, '2014_10_12_100000_create_password_resets_table', 1),
(21, '2019_08_22_144016_create_commande_table', 1),
(31, '2019_08_22_144016_create_dateslots_table', 1),
(41, '2019_08_22_144016_create_depot_table', 1),
(51, '2019_08_22_144016_create_elementscommande_table', 1),
(61, '2019_08_22_144016_create_elementsfacture_table', 1),
(71, '2019_08_22_144016_create_elementsrecu_table', 1),
(81, '2019_08_22_144016_create_evacuation_table', 1),
(91, '2019_08_22_144016_create_facture_table', 1),
(101, '2019_08_22_144016_create_fammille_table', 1),
(111, '2019_08_22_144016_create_fonction_table', 1),
(121, '2019_08_22_144016_create_fonctionnalite_table', 1),
(131, '2019_08_22_144016_create_fonctionnalitegroupe_table', 1),
(141, '2019_08_22_144016_create_forme_table', 1),
(151, '2019_08_22_144016_create_fournisseur_table', 1),
(161, '2019_08_22_144016_create_groupe_table', 1),
(171, '2019_08_22_144016_create_historiquepaiement_table', 1),
(181, '2019_08_22_144016_create_historiquestock_table', 1),
(191, '2019_08_22_144016_create_inventaire_table', 1),
(201, '2019_08_22_144016_create_inventairedepot_table', 1),
(211, '2019_08_22_144016_create_lov_table', 1),
(221, '2019_08_22_144016_create_medicament_table', 1),
(231, '2019_08_22_144016_create_modepaiement_table', 1),
(241, '2019_08_22_144016_create_patient_table', 1),
(251, '2019_08_22_144016_create_personnel_table', 1),
(261, '2019_08_22_144016_create_recu_table', 1),
(271, '2019_08_22_144016_create_service_table', 1),
(281, '2019_08_22_144016_create_session_table', 1),
(291, '2019_08_22_144016_create_sessionrecu_table', 1),
(301, '2019_08_22_144016_create_sortieexceptionnel_table', 1),
(311, '2019_08_22_144016_create_stock_table', 1),
(321, '2019_08_22_144016_create_typefacture_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `modepaiement`
--

CREATE TABLE `modepaiement` (
  `id` int(11) NOT NULL,
  `nom` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `etat` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Active',
  `alias` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `patient`
--

CREATE TABLE `patient` (
  `id` int(11) NOT NULL,
  `nom` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `prenom` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personnel`
--

CREATE TABLE `personnel` (
  `id` int(11) NOT NULL,
  `login` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nom` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prenom` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `idFonction` int(11) NOT NULL,
  `tel1` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tel2` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lieuNaissance` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dateNaissance` date DEFAULT NULL,
  `adresse` varchar(1000) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `idGoupe` int(11) NOT NULL,
  `etat` int(11) NOT NULL DEFAULT 1,
  `idDepot` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `recu`
--

CREATE TABLE `recu` (
  `id` int(11) NOT NULL,
  `montant` double NOT NULL,
  `date` datetime NOT NULL,
  `idSession` int(11) NOT NULL,
  `dateAnnullation` datetime DEFAULT NULL,
  `annulation` int(11) DEFAULT NULL,
  `nomPrenompatient` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `idAnnuller` int(11) DEFAULT NULL,
  `idModePaiement` int(11) NOT NULL,
  `numRecuApprouve` int(11) DEFAULT NULL,
  `nomautorisateur` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `numpatient` varchar(1000) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `etatPaye` int(11) NOT NULL,
  `idCaissierRecu` int(11) DEFAULT NULL,
  `datePaiement` datetime DEFAULT NULL,
  `idSessionRecu` int(11) DEFAULT NULL,
  `idDepot` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `recu`
--

INSERT INTO `recu` (`id`, `montant`, `date`, `idSession`, `dateAnnullation`, `annulation`, `nomPrenompatient`, `idAnnuller`, `idModePaiement`, `numRecuApprouve`, `nomautorisateur`, `numpatient`, `etatPaye`, `idCaissierRecu`, `datePaiement`, `idSessionRecu`, `idDepot`) VALUES
(1, 19999.98, '2021-01-01 18:14:03', 21, NULL, 0, 'nb v nb', NULL, 1, NULL, NULL, 'jkl', 0, NULL, '2021-01-01 18:14:03', NULL, NULL),
(11, 22526.96, '2021-02-07 19:00:13', 41, NULL, 0, 'moulay', NULL, 1, NULL, NULL, 'i16927', 0, NULL, '2021-02-07 19:00:13', NULL, NULL),
(21, 13631.19, '2021-02-07 19:06:41', 41, NULL, 0, 'fatimetou', NULL, 1, NULL, NULL, 'i134', 0, NULL, '2021-02-07 19:06:41', NULL, NULL),
(24, 10031.19, '2022-03-25 13:32:25', 44, NULL, 0, 'mamoumy', NULL, 1, NULL, NULL, '1235', 0, NULL, '2022-03-25 13:32:25', NULL, NULL),
(34, 9999.99, '2022-04-22 10:05:47', 54, NULL, 0, 'Ahmedou', NULL, 1, NULL, NULL, '25', 0, NULL, '2022-04-22 10:05:47', NULL, NULL),
(44, 21199.98, '2022-04-22 15:55:59', 64, NULL, 0, 'brahim', NULL, 1, NULL, NULL, '1235', 0, NULL, '2022-04-22 15:55:59', NULL, NULL),
(45, 9999.99, '2022-04-22 16:08:12', 65, NULL, 0, 'bgf', NULL, 1, NULL, NULL, 'hg', 0, NULL, '2022-04-22 16:08:12', NULL, NULL),
(46, 9999.99, '2022-04-22 16:12:24', 65, NULL, 0, 'v c', NULL, 1, NULL, NULL, 'bhgbfv', 0, NULL, '2022-04-22 16:12:24', NULL, NULL),
(47, 9999.99, '2022-04-22 16:12:42', 65, NULL, 0, 'bvc', NULL, 1, NULL, NULL, 'nhgnbv', 0, NULL, '2022-04-22 16:12:42', NULL, NULL),
(48, 19999.98, '2022-04-22 16:13:27', 65, NULL, 0, 'fgvcg', NULL, 1, NULL, NULL, 'gfbvfch', 0, NULL, '2022-04-22 16:13:27', NULL, NULL),
(49, 9999.99, '2022-04-22 16:21:45', 66, NULL, 0, 'vg', NULL, 1, NULL, NULL, 'hg', 0, NULL, '2022-04-22 16:21:45', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `service`
--

CREATE TABLE `service` (
  `id` int(11) NOT NULL,
  `nom` varchar(1000) COLLATE utf8mb4_unicode_ci NOT NULL,
  `etat` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `session`
--

CREATE TABLE `session` (
  `id` int(11) NOT NULL,
  `dateOuverture` datetime NOT NULL,
  `etat` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT 'Ouverte',
  `idCaissier` int(11) NOT NULL,
  `dateFermeture` datetime DEFAULT NULL,
  `valeursi` double NOT NULL,
  `verser` int(11) NOT NULL,
  `idPersonnel` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `session`
--

INSERT INTO `session` (`id`, `dateOuverture`, `etat`, `idCaissier`, `dateFermeture`, `valeursi`, `verser`, `idPersonnel`) VALUES
(1, '2021-01-01 12:55:12', 'Fermée', 1, '2021-01-01 12:55:36', 0, 0, 1),
(11, '2021-01-01 12:57:25', 'Fermée', 11, '2021-01-01 13:13:32', 0, 0, 11),
(21, '2021-01-01 18:13:30', 'Fermée', 11, '2021-02-07 13:06:22', 0, 0, 11),
(31, '2021-02-07 13:06:53', 'Fermée', 11, '2021-02-07 18:54:21', 0, 0, 11),
(41, '2021-02-07 18:58:47', 'Fermée', 11, '2021-02-27 13:57:45', 0, 0, 11),
(44, '2021-07-21 23:27:19', 'Fermée', 1, '2022-03-25 13:33:15', 0, 0, 1),
(54, '2022-04-22 10:05:05', 'Fermée', 11, '2022-04-22 10:06:52', 0, 0, 11),
(64, '2022-04-22 15:54:46', 'Fermée', 1, '2022-04-22 15:57:55', 0, 0, 1),
(65, '2022-04-22 16:08:00', 'Fermée', 1, '2022-04-22 16:13:49', 0, 0, 1),
(66, '2022-04-22 16:13:54', 'Fermée', 1, '2022-04-22 16:31:37', 0, 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `sessionrecu`
--

CREATE TABLE `sessionrecu` (
  `id` int(11) NOT NULL,
  `dateOuverture` datetime NOT NULL,
  `etat` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT 'Ouverte',
  `idCaissier` int(11) NOT NULL,
  `dateFermeture` datetime DEFAULT NULL,
  `valeursi` double NOT NULL,
  `verser` int(11) NOT NULL,
  `idPersonnel` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sortieexceptionnel`
--

CREATE TABLE `sortieexceptionnel` (
  `id` int(11) NOT NULL,
  `idMedicament` int(11) NOT NULL,
  `date` date NOT NULL,
  `quantite` double NOT NULL,
  `typeSortie` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `stock`
--

CREATE TABLE `stock` (
  `id` int(11) NOT NULL,
  `idMedicament` int(11) NOT NULL,
  `numlot` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date` date NOT NULL,
  `quantite` double NOT NULL,
  `datePeremption` date DEFAULT NULL,
  `prixAchat` double NOT NULL,
  `montantT` double NOT NULL,
  `idDepot` int(11) NOT NULL,
  `stockinitial` int(11) NOT NULL,
  `prixVente` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `stock`
--

INSERT INTO `stock` (`id`, `idMedicament`, `numlot`, `date`, `quantite`, `datePeremption`, `prixAchat`, `montantT`, `idDepot`, `stockinitial`, `prixVente`) VALUES
(1, 91, NULL, '2021-01-02', 12, '2022-04-22', 12, 144, 2, 0, 15.6),
(11, 91, NULL, '2021-01-01', 1, '2022-04-22', 2700, 2700, 11, 0, 2700),
(21, 51, NULL, '2021-01-02', 0, '2022-04-22', 9999.99, 79999.92, 2, 0, 9999.99),
(31, 61, NULL, '2021-01-02', 0, '2022-04-22', 2511.38, 5022.76, 2, 0, 2511.38),
(41, 81, NULL, '2021-01-02', 10, '2022-04-22', 9999.99, 99999.9, 2, 0, 9999.99),
(51, 71, NULL, '2021-01-02', 10, '2022-04-22', 1200, 12000, 2, 0, 1200),
(64, 94, NULL, '2022-04-22', 29, '2022-04-22', 1200, 34800, 1, 0, 1200),
(74, 91, NULL, '2022-04-22', 3, '2022-04-22', 15.6, 46.8, 21, 0, 15.6),
(84, 81, NULL, '2022-04-22', 2, '2022-04-22', 9999.99, 29999.97, 1, 0, 9999.99),
(94, 71, NULL, '2022-04-22', 2, '2022-04-22', 1200, 2400, 1, 0, 1200),
(104, 61, NULL, '2022-04-22', 1, '2022-04-22', 2511.38, 2511.38, 11, 0, 2511.38),
(114, 51, NULL, '2022-04-22', 1, '2022-04-22', 9999.99, 9999.99, 1, 0, 9999.99),
(124, 51, NULL, '2022-04-22', 1, '2022-04-22', 9999.99, 9999.99, 21, 0, 9999.99),
(134, 11, NULL, '2022-04-30', 20, '2022-04-22', 8072.77, 161455.40000000002, 2, 0, 8072.77),
(135, 95, NULL, '2022-04-23', 14, '2022-04-23', 10, 140, 2, 0, 10);

-- --------------------------------------------------------

--
-- Table structure for table `typefacture`
--

CREATE TABLE `typefacture` (
  `id` int(11) NOT NULL,
  `nom` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nom` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prenom` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `idFonction` int(11) NOT NULL,
  `tel1` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tel2` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lieuNaissance` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dateNaissance` date DEFAULT NULL,
  `adresse` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `idGroupe` int(11) NOT NULL,
  `etat` int(11) NOT NULL,
  `idDepot` int(11) NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `nom`, `prenom`, `username`, `email`, `idFonction`, `tel1`, `tel2`, `lieuNaissance`, `dateNaissance`, `adresse`, `idGroupe`, `etat`, `idDepot`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin', 'admin', 'admin@gmail.com', 1, '32008600', NULL, NULL, NULL, NULL, 0, 1, 1, '$2y$10$mBeiApbxr9zwQS4vzjtdue6XLbpkkthXeC0fyv7bgfXiA4i6Kqh5q', NULL, '2021-01-01 12:33:49', '2021-01-01 12:33:49'),
(11, 'cashier', 'cashier', 'cashier', 'cashier@gmail.com', 3, '33008600', NULL, NULL, NULL, NULL, 0, 1, 2, '$2y$10$Tglt3kAf/l2cb8GwmSDQQu.tby3J.Nfh3JTKIBu4R.vjUI7SeFydC', NULL, '2021-01-01 12:33:50', '2021-01-01 12:33:50'),
(21, 'manager', 'manager', 'manager', 'manager@gmail.com', 2, '42008600', NULL, NULL, NULL, NULL, 0, 1, 2, '$2y$10$fA23nNEI/P4rNdMigBDzVOMzLsGKTBJpLx/CRJQ9BnzPtHpVuw.Ni', NULL, '2021-01-01 12:33:50', '2021-01-01 12:33:50');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `commande`
--
ALTER TABLE `commande`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dateslots`
--
ALTER TABLE `dateslots`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `depot`
--
ALTER TABLE `depot`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `elementscommande`
--
ALTER TABLE `elementscommande`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `elementsfacture`
--
ALTER TABLE `elementsfacture`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `elementsrecu`
--
ALTER TABLE `elementsrecu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `evacuation`
--
ALTER TABLE `evacuation`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `facture`
--
ALTER TABLE `facture`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fammilles`
--
ALTER TABLE `fammilles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fonction`
--
ALTER TABLE `fonction`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fonctionnalite`
--
ALTER TABLE `fonctionnalite`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fonctionnalitegroupe`
--
ALTER TABLE `fonctionnalitegroupe`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `forme`
--
ALTER TABLE `forme`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fournisseur`
--
ALTER TABLE `fournisseur`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `groupe`
--
ALTER TABLE `groupe`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `historiquepaiement`
--
ALTER TABLE `historiquepaiement`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `historiquestock`
--
ALTER TABLE `historiquestock`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `inventaire`
--
ALTER TABLE `inventaire`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `inventairedepot`
--
ALTER TABLE `inventairedepot`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lov`
--
ALTER TABLE `lov`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idType` (`idType`);

--
-- Indexes for table `medicaments`
--
ALTER TABLE `medicaments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `modepaiement`
--
ALTER TABLE `modepaiement`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `patient`
--
ALTER TABLE `patient`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `personnel`
--
ALTER TABLE `personnel`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `recu`
--
ALTER TABLE `recu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `service`
--
ALTER TABLE `service`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `session`
--
ALTER TABLE `session`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sessionrecu`
--
ALTER TABLE `sessionrecu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sortieexceptionnel`
--
ALTER TABLE `sortieexceptionnel`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `stock`
--
ALTER TABLE `stock`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `typefacture`
--
ALTER TABLE `typefacture`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_username_unique` (`username`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `commande`
--
ALTER TABLE `commande`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `dateslots`
--
ALTER TABLE `dateslots`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `depot`
--
ALTER TABLE `depot`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `elementscommande`
--
ALTER TABLE `elementscommande`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `elementsfacture`
--
ALTER TABLE `elementsfacture`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=193;

--
-- AUTO_INCREMENT for table `elementsrecu`
--
ALTER TABLE `elementsrecu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101;

--
-- AUTO_INCREMENT for table `evacuation`
--
ALTER TABLE `evacuation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `facture`
--
ALTER TABLE `facture`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=163;

--
-- AUTO_INCREMENT for table `fammilles`
--
ALTER TABLE `fammilles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=312;

--
-- AUTO_INCREMENT for table `fonction`
--
ALTER TABLE `fonction`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `fonctionnalite`
--
ALTER TABLE `fonctionnalite`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `fonctionnalitegroupe`
--
ALTER TABLE `fonctionnalitegroupe`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `forme`
--
ALTER TABLE `forme`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `fournisseur`
--
ALTER TABLE `fournisseur`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `groupe`
--
ALTER TABLE `groupe`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `historiquepaiement`
--
ALTER TABLE `historiquepaiement`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `historiquestock`
--
ALTER TABLE `historiquestock`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `inventaire`
--
ALTER TABLE `inventaire`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `inventairedepot`
--
ALTER TABLE `inventairedepot`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `lov`
--
ALTER TABLE `lov`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `medicaments`
--
ALTER TABLE `medicaments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=96;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=322;

--
-- AUTO_INCREMENT for table `modepaiement`
--
ALTER TABLE `modepaiement`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `patient`
--
ALTER TABLE `patient`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `personnel`
--
ALTER TABLE `personnel`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `recu`
--
ALTER TABLE `recu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `service`
--
ALTER TABLE `service`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `session`
--
ALTER TABLE `session`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;

--
-- AUTO_INCREMENT for table `sessionrecu`
--
ALTER TABLE `sessionrecu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sortieexceptionnel`
--
ALTER TABLE `sortieexceptionnel`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `stock`
--
ALTER TABLE `stock`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=136;

--
-- AUTO_INCREMENT for table `typefacture`
--
ALTER TABLE `typefacture`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=74;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
