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

-- Listage des données de la table registros.culte : ~14 rows (environ)
DELETE FROM `culte`;
INSERT INTO `culte` (`id`, `date`, `adultos`, `ninos`) VALUES
	(38, '2024-01-23', 0, 0),
	(39, '2024-02-09', 45, 2),
	(40, '2024-02-08', 0, 0),
	(41, '2024-02-07', 0, 0),
	(42, '2024-02-15', 0, 0),
	(43, '2024-02-11', 0, 0),
	(44, '2024-02-12', 0, 0),
	(45, '2024-02-19', 0, 0),
	(46, '2024-02-10', 0, 0),
	(47, '2024-02-28', 0, 0),
	(48, '2024-02-26', 0, 0),
	(49, '2024-03-04', 0, 0),
	(50, '2024-02-29', 0, 0),
	(51, '2024-02-13', 0, 0);

-- Listage des données de la table registros.services : ~15 rows (environ)
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

-- Listage des données de la table registros.users : ~5 rows (environ)
DELETE FROM `users`;
INSERT INTO `users` (`id`, `firstname`, `lastname`) VALUES
	(6, 'ismael', 'vaca'),
	(7, 'kerly', 'vaca'),
	(8, 'patricia', 'jaramillo'),
	(9, 'Silvia', 'Cabeza'),
	(10, 'Francisco', 'Campoverde');

-- Listage des données de la table registros.users_has_services : ~42 rows (environ)
DELETE FROM `users_has_services`;
INSERT INTO `users_has_services` (`users_id`, `services_id`, `culte_id`, `id`) VALUES
	(6, 4, 40, 158),
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
	(6, 16, 38, 148),
	(6, 16, 39, 150),
	(6, 16, 42, 174),
	(6, 17, 39, 181),
	(7, 4, 46, 189),
	(7, 4, 49, 205),
	(7, 6, 46, 192),
	(7, 7, 44, 211),
	(8, 4, 43, 195),
	(8, 4, 46, 194),
	(8, 5, 44, 212),
	(8, 6, 46, 191),
	(8, 8, 44, 185),
	(8, 11, 44, 186),
	(8, 11, 49, 204),
	(9, 6, 43, 197),
	(9, 7, 47, 201),
	(9, 9, 49, 207),
	(9, 14, 44, 188),
	(9, 15, 46, 184),
	(9, 16, 44, 208),
	(10, 4, 44, 213),
	(10, 8, 43, 198),
	(10, 8, 48, 202),
	(10, 9, 44, 214),
	(10, 9, 49, 203),
	(10, 11, 46, 199),
	(10, 14, 46, 190),
	(10, 16, 47, 200),
	(10, 18, 44, 209);

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
