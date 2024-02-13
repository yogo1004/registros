-- --------------------------------------------------------
-- Hôte:                         127.0.0.1
-- Version du serveur:           8.0.31 - MySQL Community Server - GPL
-- SE du serveur:                Win64
-- HeidiSQL Version:             12.4.0.6659
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Listage de la structure de la base pour registros
DROP DATABASE IF EXISTS `registros`;
CREATE DATABASE IF NOT EXISTS `registros` /*!40100 DEFAULT CHARACTER SET utf8mb3 */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `registros`;

-- Listage de la structure de la table registros. comites
DROP TABLE IF EXISTS `comites`;
CREATE TABLE IF NOT EXISTS `comites` (
  `id_comite` int NOT NULL AUTO_INCREMENT,
  `name_comite` varchar(45) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `year` varchar(45) NOT NULL,
  PRIMARY KEY (`id_comite`),
  UNIQUE KEY `UNIQUE` (`name_comite`,`year`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb3;

-- Listage des données de la table registros.comites : ~0 rows (environ)
DELETE FROM `comites`;
INSERT INTO `comites` (`id_comite`, `name_comite`, `year`) VALUES
	(5, 'alabanza', '2024'),
	(4, 'consejo de ancianos', '2024'),
	(3, 'familias', '2024'),
	(1, 'intercession', '2024'),
	(2, 'jovenes', '2024');

-- Listage de la structure de la table registros. comites_contains_users
DROP TABLE IF EXISTS `comites_contains_users`;
CREATE TABLE IF NOT EXISTS `comites_contains_users` (
  `id_comite_contain_user` int NOT NULL AUTO_INCREMENT,
  `user_id` int NOT NULL,
  `comite_id` int NOT NULL,
  PRIMARY KEY (`id_comite_contain_user`),
  UNIQUE KEY `UNIQUE` (`user_id`,`comite_id`),
  KEY `fk_users_has_comites_comites1_idx` (`comite_id`),
  KEY `fk_users_has_comites_users1_idx` (`user_id`),
  CONSTRAINT `fk_users_has_comites_comites1` FOREIGN KEY (`comite_id`) REFERENCES `comites` (`id_comite`),
  CONSTRAINT `fk_users_has_comites_users1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb3;

-- Listage des données de la table registros.comites_contains_users : ~0 rows (environ)
DELETE FROM `comites_contains_users`;
INSERT INTO `comites_contains_users` (`id_comite_contain_user`, `user_id`, `comite_id`) VALUES
	(1, 11, 3);

-- Listage de la structure de la table registros. culte
DROP TABLE IF EXISTS `culte`;
CREATE TABLE IF NOT EXISTS `culte` (
  `id` int NOT NULL AUTO_INCREMENT,
  `date` varchar(45) DEFAULT NULL,
  `adultos` int DEFAULT NULL,
  `ninos` int DEFAULT NULL,
  `comite_id` int DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `unique` (`date`),
  KEY `fk_culte_comites1_idx` (`comite_id`),
  CONSTRAINT `fk_culte_comites1` FOREIGN KEY (`comite_id`) REFERENCES `comites` (`id_comite`) ON DELETE SET NULL ON UPDATE SET NULL
) ENGINE=InnoDB AUTO_INCREMENT=52 DEFAULT CHARSET=utf8mb3;

-- Listage des données de la table registros.culte : ~0 rows (environ)
DELETE FROM `culte`;
INSERT INTO `culte` (`id`, `date`, `adultos`, `ninos`, `comite_id`) VALUES
	(38, '2024-01-23', 0, 0, 5),
	(39, '2024-02-09', 45, 2, 4),
	(40, '2024-02-08', 0, 0, 3),
	(41, '2024-02-07', 0, 0, 1),
	(42, '2024-02-15', 0, 0, 2),
	(43, '2024-02-11', 0, 0, 5),
	(44, '2024-02-12', 202, 200, 3),
	(45, '2024-02-19', 0, 0, 3),
	(46, '2024-02-10', 0, 0, 3),
	(47, '2024-02-28', 0, 0, 1),
	(48, '2024-02-26', 0, 0, 2),
	(49, '2024-03-04', 0, 0, 5),
	(51, '2024-02-13', 0, 0, 5);

-- Listage de la structure de la table registros. events
DROP TABLE IF EXISTS `events`;
CREATE TABLE IF NOT EXISTS `events` (
  `id_event` int NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  `date_event` date NOT NULL,
  `time_init` time DEFAULT NULL,
  `time_end` time DEFAULT NULL,
  `place` varchar(45) DEFAULT NULL,
  `details` varchar(45) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  `comite_id` int NOT NULL,
  `siblings` varchar(45) DEFAULT NULL,
  `friends` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id_event`),
  UNIQUE KEY `UNIQUE` (`name`,`date_event`,`time_init`),
  KEY `fk_events_comites1_idx` (`comite_id`),
  CONSTRAINT `fk_events_comites1` FOREIGN KEY (`comite_id`) REFERENCES `comites` (`id_comite`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb3;

-- Listage des données de la table registros.events : ~0 rows (environ)
DELETE FROM `events`;
INSERT INTO `events` (`id_event`, `name`, `date_event`, `time_init`, `time_end`, `place`, `details`, `comite_id`, `siblings`, `friends`) VALUES
	(1, 'culto familias', '2024-02-13', '09:30:00', '23:15:48', 'iglesia', NULL, 3, NULL, NULL),
	(2, 'culto alabanzas', '2024-02-14', '11:00:00', NULL, 'lago', NULL, 5, NULL, NULL),
	(3, 'culto ancianos', '2024-02-13', '12:00:00', '23:19:25', 'bussigny', NULL, 4, NULL, NULL),
	(4, 'ayuno intercession', '2024-02-14', '13:00:00', NULL, 'ch. de tour 2', NULL, 1, NULL, NULL);

-- Listage de la structure de la table registros. services
DROP TABLE IF EXISTS `services`;
CREATE TABLE IF NOT EXISTS `services` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(45) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb3;

-- Listage des données de la table registros.services : ~0 rows (environ)
DELETE FROM `services`;
INSERT INTO `services` (`id`, `name`) VALUES
	(4, 'Piano'),
	(5, 'Bateria'),
	(6, 'Dirección'),
	(7, 'Vocalización'),
	(8, 'Especial'),
	(9, 'Traducción'),
	(10, 'Transmisión'),
	(11, 'Proyección'),
	(12, 'Bajo'),
	(13, 'Ofrenda'),
	(14, 'Cocina'),
	(15, 'Guitarra'),
	(16, 'Recepción'),
	(17, 'Samuel Valiente'),
	(18, 'Anuncios');

-- Listage de la structure de la table registros. users
DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int NOT NULL AUTO_INCREMENT,
  `firstname` varchar(45) DEFAULT NULL,
  `lastname` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_UNIQUE` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb3;

-- Listage des données de la table registros.users : ~0 rows (environ)
DELETE FROM `users`;
INSERT INTO `users` (`id`, `firstname`, `lastname`) VALUES
	(6, 'ismael', 'vaca'),
	(7, 'kerly', 'vaca'),
	(8, 'patricia', 'jaramillo'),
	(9, 'Silvia', 'Cabeza'),
	(10, 'Francisco', 'Campoverde'),
	(11, 'Eveline', 'Guevara');

-- Listage de la structure de la table registros. users_has_services
DROP TABLE IF EXISTS `users_has_services`;
CREATE TABLE IF NOT EXISTS `users_has_services` (
  `users_id` int DEFAULT NULL,
  `services_id` int DEFAULT NULL,
  `culte_id` int NOT NULL,
  `id` int NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`),
  UNIQUE KEY `unique` (`users_id`,`services_id`,`culte_id`),
  KEY `fk_users_has_services_services1_idx` (`services_id`),
  KEY `fk_users_has_services_users_idx` (`users_id`),
  KEY `fk_users_has_services_culte1_idx` (`culte_id`),
  CONSTRAINT `fk_users_has_services_culte1` FOREIGN KEY (`culte_id`) REFERENCES `culte` (`id`),
  CONSTRAINT `fk_users_has_services_services1` FOREIGN KEY (`services_id`) REFERENCES `services` (`id`),
  CONSTRAINT `fk_users_has_services_users` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=222 DEFAULT CHARSET=utf8mb3;

-- Listage des données de la table registros.users_has_services : ~0 rows (environ)
DELETE FROM `users_has_services`;
INSERT INTO `users_has_services` (`users_id`, `services_id`, `culte_id`, `id`) VALUES
	(6, 4, 40, 158),
	(6, 4, 44, 218),
	(6, 5, 40, 156),
	(6, 5, 43, 196),
	(6, 6, 44, 210),
	(6, 7, 46, 193),
	(6, 8, 38, 149),
	(6, 10, 40, 163),
	(6, 11, 41, 169),
	(6, 11, 49, 206),
	(6, 12, 40, 160),
	(6, 12, 44, 187),
	(6, 15, 43, 178),
	(6, 15, 44, 217),
	(6, 16, 38, 148),
	(6, 16, 39, 150),
	(6, 16, 42, 174),
	(6, 17, 39, 181),
	(7, 4, 46, 189),
	(7, 4, 49, 205),
	(7, 6, 46, 192),
	(7, 7, 44, 211),
	(7, 13, 44, 216),
	(8, 4, 43, 195),
	(8, 4, 46, 194),
	(8, 5, 44, 212),
	(8, 6, 46, 191),
	(8, 11, 44, 186),
	(8, 11, 49, 204),
	(8, 13, 51, 220),
	(9, 6, 43, 197),
	(9, 7, 47, 201),
	(9, 8, 44, 219),
	(9, 9, 49, 207),
	(9, 14, 44, 188),
	(9, 15, 46, 184),
	(9, 16, 44, 208),
	(10, 4, 44, 213),
	(10, 8, 43, 198),
	(10, 8, 48, 202),
	(10, 9, 44, 214),
	(10, 9, 49, 203),
	(10, 10, 44, 215),
	(10, 11, 46, 199),
	(10, 14, 46, 190),
	(10, 16, 47, 200),
	(10, 18, 44, 209),
	(11, 8, 44, 185),
	(11, 18, 51, 221);

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
