-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 21, 2024 at 01:16 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `universite`
--

-- --------------------------------------------------------

--
-- Table structure for table `absences`
--

CREATE TABLE `absences` (
  `id_absence` int(11) NOT NULL,
  `id_etudiant` int(11) DEFAULT NULL,
  `date_absence` date DEFAULT NULL,
  `raison` varchar(255) DEFAULT NULL,
  `id_matiere` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `absences`
--

INSERT INTO `absences` (`id_absence`, `id_etudiant`, `date_absence`, `raison`, `id_matiere`) VALUES
(14, 31, '2024-05-20', 'Fatigue', 26),
(15, 33, '2024-05-21', 'malade', 26),
(16, 35, '2024-05-24', 'grippe', 26),
(17, 31, '2024-05-23', 'Fatigue', 37);

-- --------------------------------------------------------

--
-- Table structure for table `administrateur`
--

CREATE TABLE `administrateur` (
  `id_admin` int(11) NOT NULL,
  `departement` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `classe`
--

CREATE TABLE `classe` (
  `id_classe` int(11) NOT NULL,
  `nom_classe` varchar(25) NOT NULL,
  `id_filiere` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `classe`
--

INSERT INTO `classe` (`id_classe`, `nom_classe`, `id_filiere`) VALUES
(1, '1GI', 1),
(2, '2GI', 1),
(3, '3GI', 1),
(4, '4GI', 1),
(5, '5GI', 1),
(6, '1SIM', 2),
(7, '2SIM', 2),
(8, '3SIM', 2),
(9, '4SIM', 2),
(10, '5SIM', 2);

-- --------------------------------------------------------

--
-- Table structure for table `enseignant`
--

CREATE TABLE `enseignant` (
  `id_enseignant` int(11) NOT NULL,
  `nom` varchar(25) NOT NULL,
  `prenom` varchar(25) NOT NULL,
  `date_naissance` date NOT NULL,
  `lieu_naissance` varchar(50) NOT NULL,
  `adresse` varchar(50) NOT NULL,
  `telephone` int(11) NOT NULL,
  `genre` varchar(25) NOT NULL,
  `cne` varchar(25) NOT NULL,
  `diplome` varchar(50) NOT NULL,
  `specialite` varchar(50) NOT NULL,
  `date_obtention` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `enseignant`
--

INSERT INTO `enseignant` (`id_enseignant`, `nom`, `prenom`, `date_naissance`, `lieu_naissance`, `adresse`, `telephone`, `genre`, `cne`, `diplome`, `specialite`, `date_obtention`) VALUES
(1, 'Moctar gg', 'Diagne', '2024-05-17', 'Dakar', 'HLM grand Médine', 777481282, 'Homme', '84555', 'genie informatique', 'informatique', '2024-05-01');

-- --------------------------------------------------------

--
-- Table structure for table `etudiant`
--

CREATE TABLE `etudiant` (
  `id_etudiant` int(11) NOT NULL,
  `nom` varchar(25) NOT NULL,
  `prenom` varchar(25) NOT NULL,
  `genre` varchar(25) NOT NULL,
  `date_naissance` date NOT NULL,
  `lieu_naissance` varchar(50) NOT NULL,
  `cne` varchar(25) NOT NULL,
  `adresse` varchar(25) NOT NULL,
  `id_niveau` int(11) NOT NULL,
  `id_classe` int(11) NOT NULL,
  `id_filiere` int(11) NOT NULL,
  `montant_paiement` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `etudiant`
--

INSERT INTO `etudiant` (`id_etudiant`, `nom`, `prenom`, `genre`, `date_naissance`, `lieu_naissance`, `cne`, `adresse`, `id_niveau`, `id_classe`, `id_filiere`, `montant_paiement`) VALUES
(31, 'Gueye', 'Idrissa', 'Masculin', '2024-05-15', 'Dakar', '8561fds2543', 'HLM grand Médine', 1, 1, 1, 38000.00),
(32, 'Astaire', 'Mbo', 'Masculin', '2001-06-21', 'Dakar', 'fdsa', 'HLM grand Médine', 1, 1, 1, 38000.00),
(33, 'Junior', 'Semega', 'Masculin', '1999-06-24', 'Dakar', '84555', 'HLM grand Médine', 1, 1, 1, 38000.00),
(34, 'Ayimane', 'Barro', 'Masculin', '2000-10-27', 'Dakar', '84555', '3 Rue des Asphodeles', 1, 1, 1, 38000.00),
(35, 'Oumou', 'Kone', 'feminin', '2006-02-23', 'Dakar', '84555', 'Casablanca', 1, 1, 1, 38000.00),
(36, 'Nassima', 'Joulal', 'feminin', '2003-07-23', 'Dakar', '8561fds2543', 'Casablanca', 1, 1, 1, 38000.00);

-- --------------------------------------------------------

--
-- Table structure for table `filiere`
--

CREATE TABLE `filiere` (
  `id_filiere` int(11) NOT NULL,
  `nom_filiere` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `filiere`
--

INSERT INTO `filiere` (`id_filiere`, `nom_filiere`) VALUES
(1, 'Ingenierie'),
(2, 'Management');

-- --------------------------------------------------------

--
-- Table structure for table `matiere`
--

CREATE TABLE `matiere` (
  `id_matiere` int(11) NOT NULL,
  `nom_matiere` text NOT NULL,
  `id_niveau` int(11) NOT NULL,
  `id_classe` int(11) NOT NULL,
  `id_filiere` int(11) NOT NULL,
  `id_enseignant` int(11) NOT NULL,
  `id_semestre` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `matiere`
--

INSERT INTO `matiere` (`id_matiere`, `nom_matiere`, `id_niveau`, `id_classe`, `id_filiere`, `id_enseignant`, `id_semestre`) VALUES
(26, 'Math2', 1, 1, 1, 1, 10),
(29, 'gfdsgf', 1, 1, 1, 1, 11),
(30, 'Math', 2, 1, 1, 1, 12),
(31, 'Science', 6, 6, 2, 2, 10),
(32, 'Science', 4, 1, 1, 1, 16),
(35, 'Science', 1, 1, 1, 1, 11),
(37, 'Informatique', 1, 1, 1, 1, 10);

-- --------------------------------------------------------

--
-- Table structure for table `niveau`
--

CREATE TABLE `niveau` (
  `id_niveau` int(11) NOT NULL,
  `nom_niveau` varchar(25) NOT NULL,
  `id_filiere` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `niveau`
--

INSERT INTO `niveau` (`id_niveau`, `nom_niveau`, `id_filiere`) VALUES
(1, 'I-1re annee', 1),
(2, 'I-2eme annee', 1),
(3, 'I-3eme annee', 1),
(4, 'I-4eme annee', 1),
(5, 'I-5eme annee ', 1),
(6, 'M-1re annee', 2),
(7, 'M-2eme annee', 2),
(8, 'M-3eme annee', 2),
(9, 'M-4eme annee', 2),
(10, 'M-5eme annee', 2);

-- --------------------------------------------------------

--
-- Table structure for table `note`
--

CREATE TABLE `note` (
  `id_note` int(11) NOT NULL,
  `id_etudiant` int(11) NOT NULL,
  `id_matiere` int(11) NOT NULL,
  `note` decimal(10,0) NOT NULL,
  `id_semestre` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `note`
--

INSERT INTO `note` (`id_note`, `id_etudiant`, `id_matiere`, `note`, `id_semestre`) VALUES
(18, 31, 26, 5, 10),
(19, 32, 26, 17, 10),
(20, 33, 26, 2, 10),
(21, 34, 26, 12, 10),
(22, 35, 26, 20, 10),
(23, 36, 26, 19, 10);

-- --------------------------------------------------------

--
-- Table structure for table `paiement`
--

CREATE TABLE `paiement` (
  `id_paiement` int(11) NOT NULL,
  `id_etudiant` int(11) DEFAULT NULL,
  `montant_paye` decimal(10,2) NOT NULL,
  `date_paiement` date NOT NULL,
  `description_paiement` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `paiement`
--

INSERT INTO `paiement` (`id_paiement`, `id_etudiant`, `montant_paye`, `date_paiement`, `description_paiement`) VALUES
(24, 31, 12000.00, '2024-05-20', 'frais');

-- --------------------------------------------------------

--
-- Table structure for table `retards`
--

CREATE TABLE `retards` (
  `id_retard` int(11) NOT NULL,
  `id_etudiant` int(11) DEFAULT NULL,
  `date_retard` date DEFAULT NULL,
  `heure_retard` time DEFAULT NULL,
  `raison` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `id_role` int(11) NOT NULL,
  `nom_role` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`id_role`, `nom_role`) VALUES
(1, 'enseignant'),
(2, 'etudiant');

-- --------------------------------------------------------

--
-- Table structure for table `semestre`
--

CREATE TABLE `semestre` (
  `id_semestre` int(11) NOT NULL,
  `nom_semestre` varchar(25) NOT NULL,
  `id_niveau` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `semestre`
--

INSERT INTO `semestre` (`id_semestre`, `nom_semestre`, `id_niveau`) VALUES
(10, 'semestre-1', 1),
(11, 'semestre-2', 1),
(12, 'semestre-3', 2),
(13, 'semestre-4', 2),
(14, 'semestre-5', 3),
(15, 'semestre-6', 3),
(16, 'semestre-7', 4),
(17, 'semestre-8', 4),
(18, 'semestre-9', 5),
(19, 'semestre-1', 6),
(20, 'semestre-2', 6),
(21, 'semestre-3', 7),
(22, 'semestre-4', 7),
(23, 'semestre-5', 8),
(24, 'semestre-6', 8),
(25, 'semestre-7', 9),
(26, 'semestre-8', 9),
(27, 'semestre-9', 10);

-- --------------------------------------------------------

--
-- Table structure for table `utilisateur`
--

CREATE TABLE `utilisateur` (
  `id_utilisateur` int(11) NOT NULL,
  `nom` varchar(25) NOT NULL,
  `prenom` varchar(25) NOT NULL,
  `login` varchar(25) NOT NULL,
  `passwd` varchar(25) NOT NULL,
  `id_role` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `utilisateur`
--

INSERT INTO `utilisateur` (`id_utilisateur`, `nom`, `prenom`, `login`, `passwd`, `id_role`) VALUES
(47, 'Gueye', 'Idrissa', 'idy', 'idy', 2),
(49, 'Astaire', 'Mbo', 'Astaire', 'Astaire', 2),
(50, 'Astaire', 'Mbo', 'Astaire', 'Astaire', 2),
(51, 'Junior', 'Semega', 'semega', 'semega', 2),
(52, 'Junior', 'Semega', 'semega', 'semega', 2),
(53, 'Ayimane', 'Barro', 'ayimane', 'ayimane', 2),
(54, 'Ayimane', 'Barro', 'ayimane', 'ayimane', 2),
(55, 'Oumou', 'Kone', 'oumou', 'oumou', 2),
(56, 'Oumou', 'Kone', 'oumou', 'oumou', 2),
(57, 'Nassima', 'Joulal', 'nassima', 'nassima', 2),
(58, 'Nassima', 'Joulal', 'nassima', 'nassima', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `absences`
--
ALTER TABLE `absences`
  ADD PRIMARY KEY (`id_absence`),
  ADD KEY `id_etudiant` (`id_etudiant`),
  ADD KEY `id_matiere` (`id_matiere`);

--
-- Indexes for table `administrateur`
--
ALTER TABLE `administrateur`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `classe`
--
ALTER TABLE `classe`
  ADD PRIMARY KEY (`id_classe`),
  ADD KEY `id_filiere` (`id_filiere`);

--
-- Indexes for table `enseignant`
--
ALTER TABLE `enseignant`
  ADD PRIMARY KEY (`id_enseignant`);

--
-- Indexes for table `etudiant`
--
ALTER TABLE `etudiant`
  ADD PRIMARY KEY (`id_etudiant`),
  ADD KEY `id_niveau` (`id_niveau`),
  ADD KEY `id_classe` (`id_classe`),
  ADD KEY `id_filiere` (`id_filiere`);

--
-- Indexes for table `filiere`
--
ALTER TABLE `filiere`
  ADD PRIMARY KEY (`id_filiere`);

--
-- Indexes for table `matiere`
--
ALTER TABLE `matiere`
  ADD PRIMARY KEY (`id_matiere`),
  ADD KEY `id_classe` (`id_classe`),
  ADD KEY `id_filiere` (`id_filiere`),
  ADD KEY `id_niveau` (`id_niveau`),
  ADD KEY `id_enseigant` (`id_enseignant`),
  ADD KEY `id_ semestre` (`id_semestre`);

--
-- Indexes for table `niveau`
--
ALTER TABLE `niveau`
  ADD PRIMARY KEY (`id_niveau`),
  ADD KEY `id_filiere` (`id_filiere`);

--
-- Indexes for table `note`
--
ALTER TABLE `note`
  ADD PRIMARY KEY (`id_note`),
  ADD KEY `id_etudiant` (`id_etudiant`),
  ADD KEY `id_matiere` (`id_matiere`),
  ADD KEY `id_semestre` (`id_semestre`);

--
-- Indexes for table `paiement`
--
ALTER TABLE `paiement`
  ADD PRIMARY KEY (`id_paiement`),
  ADD KEY `id_etudiant` (`id_etudiant`);

--
-- Indexes for table `retards`
--
ALTER TABLE `retards`
  ADD PRIMARY KEY (`id_retard`),
  ADD KEY `id_etudiant` (`id_etudiant`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id_role`);

--
-- Indexes for table `semestre`
--
ALTER TABLE `semestre`
  ADD PRIMARY KEY (`id_semestre`),
  ADD KEY `id_niveau` (`id_niveau`);

--
-- Indexes for table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD PRIMARY KEY (`id_utilisateur`),
  ADD KEY `id_role` (`id_role`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `absences`
--
ALTER TABLE `absences`
  MODIFY `id_absence` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `administrateur`
--
ALTER TABLE `administrateur`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `classe`
--
ALTER TABLE `classe`
  MODIFY `id_classe` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `enseignant`
--
ALTER TABLE `enseignant`
  MODIFY `id_enseignant` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `etudiant`
--
ALTER TABLE `etudiant`
  MODIFY `id_etudiant` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `filiere`
--
ALTER TABLE `filiere`
  MODIFY `id_filiere` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `matiere`
--
ALTER TABLE `matiere`
  MODIFY `id_matiere` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `niveau`
--
ALTER TABLE `niveau`
  MODIFY `id_niveau` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `note`
--
ALTER TABLE `note`
  MODIFY `id_note` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `paiement`
--
ALTER TABLE `paiement`
  MODIFY `id_paiement` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `retards`
--
ALTER TABLE `retards`
  MODIFY `id_retard` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `id_role` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `semestre`
--
ALTER TABLE `semestre`
  MODIFY `id_semestre` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `utilisateur`
--
ALTER TABLE `utilisateur`
  MODIFY `id_utilisateur` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `absences`
--
ALTER TABLE `absences`
  ADD CONSTRAINT `absences_ibfk_1` FOREIGN KEY (`id_etudiant`) REFERENCES `etudiant` (`id_etudiant`),
  ADD CONSTRAINT `absences_ibfk_2` FOREIGN KEY (`id_matiere`) REFERENCES `matiere` (`id_matiere`);

--
-- Constraints for table `classe`
--
ALTER TABLE `classe`
  ADD CONSTRAINT `classe_ibfk_1` FOREIGN KEY (`id_filiere`) REFERENCES `filiere` (`id_filiere`);

--
-- Constraints for table `etudiant`
--
ALTER TABLE `etudiant`
  ADD CONSTRAINT `etudiant_ibfk_1` FOREIGN KEY (`id_niveau`) REFERENCES `niveau` (`id_niveau`),
  ADD CONSTRAINT `etudiant_ibfk_2` FOREIGN KEY (`id_classe`) REFERENCES `classe` (`id_classe`),
  ADD CONSTRAINT `etudiant_ibfk_3` FOREIGN KEY (`id_filiere`) REFERENCES `filiere` (`id_filiere`);

--
-- Constraints for table `matiere`
--
ALTER TABLE `matiere`
  ADD CONSTRAINT `matiere_ibfk_1` FOREIGN KEY (`id_semestre`) REFERENCES `semestre` (`id_semestre`);

--
-- Constraints for table `niveau`
--
ALTER TABLE `niveau`
  ADD CONSTRAINT `niveau_ibfk_1` FOREIGN KEY (`id_filiere`) REFERENCES `filiere` (`id_filiere`);

--
-- Constraints for table `note`
--
ALTER TABLE `note`
  ADD CONSTRAINT `note_ibfk_1` FOREIGN KEY (`id_etudiant`) REFERENCES `etudiant` (`id_etudiant`),
  ADD CONSTRAINT `note_ibfk_2` FOREIGN KEY (`id_matiere`) REFERENCES `matiere` (`id_matiere`),
  ADD CONSTRAINT `note_ibfk_3` FOREIGN KEY (`id_semestre`) REFERENCES `semestre` (`id_semestre`);

--
-- Constraints for table `paiement`
--
ALTER TABLE `paiement`
  ADD CONSTRAINT `paiement_ibfk_1` FOREIGN KEY (`id_etudiant`) REFERENCES `etudiant` (`id_etudiant`);

--
-- Constraints for table `retards`
--
ALTER TABLE `retards`
  ADD CONSTRAINT `retards_ibfk_1` FOREIGN KEY (`id_etudiant`) REFERENCES `etudiant` (`id_etudiant`);

--
-- Constraints for table `semestre`
--
ALTER TABLE `semestre`
  ADD CONSTRAINT `semestre_ibfk_1` FOREIGN KEY (`id_niveau`) REFERENCES `niveau` (`id_niveau`);

--
-- Constraints for table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD CONSTRAINT `utilisateur_ibfk_1` FOREIGN KEY (`id_role`) REFERENCES `role` (`id_role`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
