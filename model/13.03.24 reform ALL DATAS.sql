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

-- Listage des données de la table registros.comites : ~0 rows (environ)
DELETE FROM `comites`;
INSERT INTO `comites` (`id_comite`, `name_comite`, `year`) VALUES
	(5, 'alabanza', '2024'),
	(4, 'consejo de ancianos', '2024'),
	(3, 'familias', '2024'),
	(1, 'intercession', '2024'),
	(2, 'jovenes', '2024');

-- Listage des données de la table registros.comites_contains_users : ~0 rows (environ)
DELETE FROM `comites_contains_users`;
INSERT INTO `comites_contains_users` (`id_comite_contain_user`, `user_id`, `comite_id`) VALUES
	(1, 11, 3);

-- Listage des données de la table registros.culte : ~0 rows (environ)
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

-- Listage des données de la table registros.events : ~0 rows (environ)
DELETE FROM `events`;
INSERT INTO `events` (`id_event`, `name`, `date`, `time_init`, `time_end`, `place`, `details`, `comite_id`, `siblings`, `friends`) VALUES
	(1, 'culto familias', '2024-02-13', '09:30:00', '23:15:48', 'iglesia', NULL, 3, NULL, NULL),
	(2, 'culto alabanzas', '2024-02-14', '11:00:00', NULL, 'lago', NULL, 5, NULL, NULL),
	(3, 'culto ancianos', '2024-02-13', '12:00:00', '23:19:25', 'bussigny', NULL, 4, NULL, NULL),
	(4, 'ayuno intercession', '2024-02-14', '13:00:00', NULL, 'ch. de tour 2', NULL, 1, NULL, NULL);

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

-- Listage des données de la table registros.users : ~6 rows (environ)
DELETE FROM `users`;
INSERT INTO `users` (`id`, `firstname`, `lastname`) VALUES
	(6, 'ismael', 'vaca'),
	(7, 'kerly', 'vaca'),
	(8, 'patricia', 'jaramillo'),
	(9, 'Silvia', 'Cabeza'),
	(10, 'Francisco', 'Campoverde'),
	(11, 'Eveline', 'Guevara');

-- Listage des données de la table registros.users_has_services : ~49 rows (environ)
DELETE FROM `users_has_services`;
INSERT INTO `users_has_services` (`users_id`, `services_id`, `id`) VALUES
	(6, 16, 148),
	(6, 8, 149),
	(6, 16, 150),
	(6, 5, 156),
	(6, 4, 158),
	(6, 12, 160),
	(6, 10, 163),
	(6, 11, 169),
	(6, 16, 174),
	(6, 15, 178),
	(6, 17, 181),
	(9, 15, 184),
	(11, 8, 185),
	(8, 11, 186),
	(6, 12, 187),
	(9, 14, 188),
	(7, 4, 189),
	(10, 14, 190),
	(8, 6, 191),
	(7, 6, 192),
	(6, 7, 193),
	(8, 4, 194),
	(8, 4, 195),
	(6, 5, 196),
	(9, 6, 197),
	(10, 8, 198),
	(10, 11, 199),
	(10, 16, 200),
	(9, 7, 201),
	(10, 8, 202),
	(10, 9, 203),
	(8, 11, 204),
	(7, 4, 205),
	(6, 11, 206),
	(9, 9, 207),
	(9, 16, 208),
	(10, 18, 209),
	(6, 6, 210),
	(7, 7, 211),
	(8, 5, 212),
	(10, 4, 213),
	(10, 9, 214),
	(10, 10, 215),
	(7, 13, 216),
	(6, 15, 217),
	(6, 4, 218),
	(9, 8, 219),
	(8, 13, 220),
	(11, 18, 221);

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
