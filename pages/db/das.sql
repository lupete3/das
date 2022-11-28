-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 28, 2022 at 04:49 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `das`
--
CREATE DATABASE IF NOT EXISTS `das` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `das`;

-- --------------------------------------------------------

--
-- Table structure for table `beneficiaire`
--

CREATE TABLE `beneficiaire` (
  `id` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `postnom` varchar(255) NOT NULL,
  `sexe` varchar(15) NOT NULL,
  `dateNaissance` date NOT NULL,
  `residence` varchar(255) NOT NULL,
  `telephone` varchar(25) NOT NULL,
  `nb_enfants` int(11) NOT NULL,
  `login` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `beneficiaire`
--

INSERT INTO `beneficiaire` (`id`, `nom`, `postnom`, `sexe`, `dateNaissance`, `residence`, `telephone`, `nb_enfants`, `login`, `password`) VALUES
(1, 'Matata', 'Pola', 'Masculin', '2022-09-02', 'Quartier / Bagira', '0999999999', 2, 'matata', '1234'),
(2, 'Marie', 'Ngama', 'Féminin', '2000-10-02', 'Kitutu', '0989812390', 3, 'marie', '1234'),
(4, 'Maestro', 'Gola', 'Masculin', '2022-11-04', 'Village Bushu', '099999999', 4, 'maestro', '1234'),
(5, 'Neema', 'Mbul', 'Féminin', '2022-08-12', 'Village Songo', '0888888888', 2, 'neema', '1234');

-- --------------------------------------------------------

--
-- Table structure for table `demande`
--

CREATE TABLE `demande` (
  `id` int(11) NOT NULL,
  `date_demande` date NOT NULL DEFAULT current_timestamp(),
  `motif` text NOT NULL,
  `categorie` varchar(255) NOT NULL,
  `etat_demande` int(11) NOT NULL,
  `reponse` text NOT NULL,
  `fichier` varchar(255) NOT NULL,
  `id_beneficiaire` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `demande`
--

INSERT INTO `demande` (`id`, `date_demande`, `motif`, `categorie`, `etat_demande`, `reponse`, `fichier`, `id_beneficiaire`) VALUES
(2, '2022-11-22', 'Demande aux sinistrés', 'Sinistré', 2, 'Votre demande est accepté. Vous allez passer à notre bureau au plus tard le 20 Décembre pour plus d\'informations', '1084913198.pdf', 1),
(3, '2022-11-23', 'Demande aux noffragés', 'Nauffragé', 3, 'Vous n\'êtes pas éligible à bénéficier de cette aide pour le moment ', '1811424992.pdf', 1),
(4, '2022-11-28', 'Demande de soutien', 'Enfant de rue', 1, '', '2083419835.pdf', 1),
(5, '2022-11-28', 'Support', 'Orphelin', 1, '', '1109318094.pdf', 5),
(6, '2022-11-28', 'Demande de secours', 'Sinistré', 0, '', '2104592306.pdf', 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `login` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `nom`, `type`, `login`, `password`) VALUES
(1, 'admin', 'admin', 'admin', 'admin'),
(2, 'secretaire', 'secretaire', 'secretaire', '1234'),
(3, 'Musombwa Banza', 'secretaire', 'muso', '1234');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `beneficiaire`
--
ALTER TABLE `beneficiaire`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `demande`
--
ALTER TABLE `demande`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_beneficiaire` (`id_beneficiaire`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `beneficiaire`
--
ALTER TABLE `beneficiaire`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `demande`
--
ALTER TABLE `demande`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
