-- --------------------------------------------------------
-- Hôte:                         127.0.0.1
-- Version du serveur:           8.0.30 - MySQL Community Server - GPL
-- SE du serveur:                Win64
-- HeidiSQL Version:             12.1.0.6537
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Listage de la structure de la base pour app_ccf
CREATE DATABASE IF NOT EXISTS `app_ccf` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `app_ccf`;

-- Listage de la structure de table app_ccf. bts
CREATE TABLE IF NOT EXISTS `bts` (
  `Code_bts` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `Libelle` varchar(200) DEFAULT NULL,
  `Code_opt` varchar(10) DEFAULT NULL,
  `Libelle_opt` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  PRIMARY KEY (`Code_bts`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Listage des données de la table app_ccf.bts : ~10 rows (environ)
DELETE FROM `bts`;
INSERT INTO `bts` (`Code_bts`, `Libelle`, `Code_opt`, `Libelle_opt`) VALUES
	('CG', 'Comptabilité et Gestion', '', ''),
	('CI', 'Commerce international', '', ''),
	('COM', 'Communication', '', ''),
	('NDRC', 'Négociation Digitalisation de la relation client', '', ''),
	('PI', 'Professions immobilières', '', ''),
	('SAM', 'Support à l action managériale', '', ''),
	('SIO', 'Service informatique aux organisations', '', ''),
	('SIOR', 'Services informatiques aux organisations', 'SISR', 'Solutions d’infrastructure, systèmes et réseaux'),
	('SIOS', 'Services informatiques aux organisations', 'SLAM', 'Solutions logicielles et applications métiers '),
	('TOU', 'Tourisme', NULL, NULL);

-- Listage de la structure de table app_ccf. ccf
CREATE TABLE IF NOT EXISTS `ccf` (
  `ID_ccf` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL DEFAULT 'ID',
  `Libelle` varchar(100) DEFAULT NULL,
  `Fk_bts` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`ID_ccf`),
  KEY `Fk__bts` (`Fk_bts`),
  CONSTRAINT `Fk__bts` FOREIGN KEY (`Fk_bts`) REFERENCES `bts` (`Code_bts`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Listage des données de la table app_ccf.ccf : ~3 rows (environ)
DELETE FROM `ccf`;
INSERT INTO `ccf` (`ID_ccf`, `Libelle`, `Fk_bts`) VALUES
	('E4', 'Support et mise à disposition de services informatiques', 'SIO'),
	('E5SISR', 'Administration des systèmes et des réseaux', 'SIOR'),
	('E5SLAM', 'Conception et développement d’applications', 'SIOS');

-- Listage de la structure de table app_ccf. eleve_data
CREATE TABLE IF NOT EXISTS `eleve_data` (
  `Id` int NOT NULL AUTO_INCREMENT,
  `Nom` varchar(50) DEFAULT NULL,
  `Prenom` varchar(50) DEFAULT NULL,
  `Fk_Bts` varchar(50) DEFAULT NULL,
  `Fk_Option` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`Id`),
  KEY `Fk_Bts` (`Fk_Bts`),
  CONSTRAINT `Fk_Bts` FOREIGN KEY (`Fk_Bts`) REFERENCES `bts` (`Code_bts`)
) ENGINE=InnoDB AUTO_INCREMENT=45 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Listage des données de la table app_ccf.eleve_data : ~31 rows (environ)
DELETE FROM `eleve_data`;
INSERT INTO `eleve_data` (`Id`, `Nom`, `Prenom`, `Fk_Bts`, `Fk_Option`) VALUES
	(14, 'ABIRAM', 'Raveendran', 'SIOR', 'SISR'),
	(15, 'ANGLOMA', 'Wesley', 'SIOR', 'SISR'),
	(16, 'ANZALA', 'Emeric', 'SIOR', 'SISR'),
	(17, 'ASTASIE', 'Mounia', 'SIOS', 'SLAM'),
	(18, 'BAZES', 'Kévin', 'SIOR', 'SISR'),
	(19, 'CISSE', 'Adam Bacongo', 'SIOS', 'SLAM'),
	(20, 'DAVID', 'Tom', 'SIOR', 'SISR'),
	(21, 'DOS SANTOS', 'David', 'SIOR', 'SISR'),
	(22, 'DRAME', 'Mouhamadou', 'SIOS', 'SLAM'),
	(23, 'EL BANA', 'Ashraf', 'SIOR', 'SISR'),
	(24, 'EL HAFSI', 'Nizar', 'SIOR', 'SISR'),
	(25, 'GOUBIN', 'Sylvain', 'SIOS', 'SLAM'),
	(26, 'GUERIN', 'Nicolas', 'SIOR', 'SISR'),
	(27, 'HASNAOUI', 'Nassim', 'SIOR', 'SISR'),
	(28, 'HIAUMET', 'Mattéo', 'SIOR', 'SISR'),
	(29, 'INDRALINGAM', 'Inthusan', 'SIOR', 'SISR'),
	(30, 'LA SALA', 'Milan', 'SIOR', 'SISR'),
	(31, 'MANE', 'Malang', 'SIOS', 'SLAM'),
	(32, 'MARTINS', 'Guillaume', 'SIOS', 'SLAM'),
	(33, 'MATHIEU', 'Emma', 'SIOR', 'SISR'),
	(34, 'MENDES', 'Joaquim', 'SIOR', 'SISR'),
	(35, 'MESINA', 'Cristian', 'SIOS', 'SLAM'),
	(36, 'NADJI', 'Rayan', 'SIOS', 'SLAM'),
	(37, 'NAZIR', 'Toycan', 'SIOS', 'SLAM'),
	(38, 'RIHANE', 'Inès', 'SIOS', 'SLAM'),
	(39, 'SARMIENTO', 'Nijel', 'SIOS', 'SLAM'),
	(40, 'SAVOIE', 'Adrien', 'SIOS', 'SLAM'),
	(41, 'YAGOUBI', 'Nabil', 'SIOR', 'SISR'),
	(42, 'YANGUI', 'Amani', 'SIOS', 'SLAM'),
	(43, 'YE', 'Stéphane', 'SIOR', 'SISR'),
	(44, 'ZHANG', 'Christophe', 'SIOS', 'SLAM');

-- Listage de la structure de table app_ccf. note
CREATE TABLE IF NOT EXISTS `note` (
  `Id` int NOT NULL AUTO_INCREMENT,
  `Fk_Prof` char(13) DEFAULT NULL,
  `Fk_Eleve` int DEFAULT NULL,
  `Fk_Epreuve` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL DEFAULT 'ID',
  `Date` date DEFAULT NULL,
  `Heure_fin` time DEFAULT NULL,
  `Note` int DEFAULT NULL,
  `Commentaire` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`Id`),
  KEY `Fk_Prof` (`Fk_Prof`),
  KEY `Fk_Eleve` (`Fk_Eleve`),
  KEY `Fk_Epreuve` (`Fk_Epreuve`),
  CONSTRAINT `Fk_Eleve` FOREIGN KEY (`Fk_Eleve`) REFERENCES `eleve_data` (`Id`),
  CONSTRAINT `Fk_Epreuve` FOREIGN KEY (`Fk_Epreuve`) REFERENCES `ccf` (`ID_ccf`),
  CONSTRAINT `Fk_Prof` FOREIGN KEY (`Fk_Prof`) REFERENCES `prof_data` (`Numen`)
) ENGINE=InnoDB AUTO_INCREMENT=106 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Listage des données de la table app_ccf.note : ~1 rows (environ)
DELETE FROM `note`;
INSERT INTO `note` (`Id`, `Fk_Prof`, `Fk_Eleve`, `Fk_Epreuve`, `Date`, `Heure_fin`, `Note`, `Commentaire`) VALUES
	(1, 'ABC123ABDTRDA', 19, 'E5SLAM', NULL, NULL, NULL, NULL);

-- Listage de la structure de table app_ccf. prof_data
CREATE TABLE IF NOT EXISTS `prof_data` (
  `Numen` char(13) NOT NULL,
  `Nom` varchar(50) DEFAULT NULL,
  `Prenom` varchar(50) DEFAULT NULL,
  `Email` varchar(255) DEFAULT NULL,
  `Verif_code` varchar(13) DEFAULT NULL,
  `Telephone` char(10) DEFAULT NULL,
  `Password` char(60) DEFAULT NULL,
  PRIMARY KEY (`Numen`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Listage des données de la table app_ccf.prof_data : ~6 rows (environ)
DELETE FROM `prof_data`;
INSERT INTO `prof_data` (`Numen`, `Nom`, `Prenom`, `Email`, `Verif_code`, `Telephone`, `Password`) VALUES
	('AAAAAAAAAAAAA', 'D amico', 'Grégory', NULL, NULL, NULL, NULL),
	('ABC123ABDTRDA', 'Robert', 'Timothée', NULL, 'activated', NULL, '$2y$10$SqSBelSzcCu2oHXNNhXbnuWfhW5vgF1AcjhVD3yNKl1nuclEn7Dzi'),
	('BBBBBBBBBBBBB', 'Roubeau', 'Dominique', NULL, NULL, NULL, NULL),
	('CCCCCCCCCCCCC', 'Vigny', 'Corinne', NULL, NULL, NULL, NULL),
	('DDDDDDDDDDDDD', 'Bauras', 'Roberte', NULL, NULL, NULL, NULL),
	('EEEEEEEEEEEEE', 'Carissant', 'Christian', NULL, NULL, NULL, NULL);

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
