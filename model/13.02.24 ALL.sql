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

-- Listage des données de la table registros.comites : ~5 rows (environ)
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

-- Listage des données de la table registros.comites_contains_users : ~1 rows (environ)
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
  PRIMARY KEY (`id`),
  UNIQUE KEY `unique` (`date`)
) ENGINE=InnoDB AUTO_INCREMENT=52 DEFAULT CHARSET=utf8mb3;

-- Listage des données de la table registros.culte : ~13 rows (environ)
DELETE FROM `culte`;
INSERT INTO `culte` (`id`, `date`, `adultos`, `ninos`) VALUES
	(38, '2024-01-23', 0, 0),
	(39, '2024-02-09', 45, 2),
	(40, '2024-02-08', 0, 0),
	(41, '2024-02-07', 0, 0),
	(42, '2024-02-15', 0, 0),
	(43, '2024-02-11', 0, 0),
	(44, '2024-02-12', 202, 200),
	(45, '2024-02-19', 0, 0),
	(46, '2024-02-10', 0, 0),
	(47, '2024-02-28', 0, 0),
	(48, '2024-02-26', 0, 0),
	(49, '2024-03-04', 0, 0),
	(51, '2024-02-13', 0, 0);

-- Listage de la structure de la table registros. events
DROP TABLE IF EXISTS `events`;
CREATE TABLE IF NOT EXISTS `events` (
  `id_event` int NOT NULL AUTO_INCREMENT,
  `name_event` varchar(45) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `date` date NOT NULL,
  `time_init` time DEFAULT NULL,
  `time_end` time DEFAULT NULL,
  `place` varchar(45) DEFAULT NULL,
  `details` varchar(45) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  `comite_id` int NOT NULL,
  `siblings` varchar(45) DEFAULT NULL,
  `friends` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id_event`),
  UNIQUE KEY `UNIQUE` (`name_event`,`date`) USING BTREE,
  KEY `fk_events_comites1_idx` (`comite_id`),
  CONSTRAINT `fk_events_comites1` FOREIGN KEY (`comite_id`) REFERENCES `comites` (`id_comite`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb3;

-- Listage des données de la table registros.events : ~6 rows (environ)
DELETE FROM `events`;
INSERT INTO `events` (`id_event`, `name_event`, `date`, `time_init`, `time_end`, `place`, `details`, `comite_id`, `siblings`, `friends`) VALUES
	(1, 'TESTE EVENT234234', '2024-02-13', '09:30:00', '23:15:48', 'iglesia', 'nose aun', 3, '123', '1243'),
	(2, 'culto alabanzas', '2024-02-13', '11:00:00', NULL, 'lago', 'asdfds', 5, '666', '777'),
	(3, 'testmodif', '2024-02-13', '12:00:00', '23:19:25', 'bussigny', NULL, 5, '666', '777'),
	(4, 'ayuno intercession', '2024-02-14', '13:00:00', NULL, 'ch. de tour 2', NULL, 1, NULL, NULL),
	(11, 'test2', '2024-02-14', '12:03:03', NULL, NULL, NULL, 1, '324', '234'),
	(18, 'testmodif', '2024-02-20', '12:12:00', NULL, NULL, NULL, 5, '123', '123'),
	(20, 'TESTE EVENT', '2024-02-29', '12:34:00', NULL, NULL, NULL, 4, '234', '41141');

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
  `id` int NOT NULL AUTO_INCREMENT,
  `event_id` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_users_has_services_services1_idx` (`services_id`),
  KEY `fk_users_has_services_users_idx` (`users_id`),
  KEY `fk_users_has_services_events1_idx` (`event_id`),
  CONSTRAINT `fk_users_has_services_events1` FOREIGN KEY (`event_id`) REFERENCES `events` (`id_event`),
  CONSTRAINT `fk_users_has_services_services1` FOREIGN KEY (`services_id`) REFERENCES `services` (`id`),
  CONSTRAINT `fk_users_has_services_users` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=275 DEFAULT CHARSET=utf8mb3;

-- Listage des données de la table registros.users_has_services : ~0 rows (environ)
DELETE FROM `users_has_services`;
INSERT INTO `users_has_services` (`users_id`, `services_id`, `id`, `event_id`) VALUES
	(11, 18, 224, 1),
	(11, 16, 229, 2),
	(11, 16, 237, 11),
	(10, 7, 238, 2),
	(6, 16, 264, 3),
	(7, 18, 265, 3),
	(8, 6, 266, 3),
	(11, 7, 267, 3),
	(10, 5, 268, 3),
	(9, 6, 273, 1),
	(9, 5, 274, 1);

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
