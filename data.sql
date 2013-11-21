-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Versión del servidor:         5.6.12-log - MySQL Community Server (GPL)
-- SO del servidor:              Win64
-- HeidiSQL Versión:             8.1.0.4545
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Volcando estructura de base de datos para epikureos_db
CREATE DATABASE IF NOT EXISTS `epikureos_db` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `epikureos_db`;


-- Volcando estructura para tabla epikureos_db.categorias
CREATE TABLE IF NOT EXISTS `categorias` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `slug` varchar(50) NOT NULL DEFAULT '0',
  `descripcion` varchar(50) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla epikureos_db.categorias: ~5 rows (aproximadamente)
DELETE FROM `categorias`;
/*!40000 ALTER TABLE `categorias` DISABLE KEYS */;
INSERT INTO `categorias` (`id`, `slug`, `descripcion`) VALUES
	(1, 'restobar', 'Restobar'),
	(2, 'restaurant', 'Restaurant'),
	(3, 'cafe', 'Café'),
	(4, 'vinotecas', 'Vinotecas'),
	(5, 'heladerias', 'Heladerías');
/*!40000 ALTER TABLE `categorias` ENABLE KEYS */;


-- Volcando estructura para tabla epikureos_db.categorias_lugares
CREATE TABLE IF NOT EXISTS `categorias_lugares` (
  `id_categoria` int(10) unsigned NOT NULL,
  `id_lugar` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id_categoria`,`id_lugar`),
  KEY `FK_relacion_tipo_lugar_lugares` (`id_lugar`),
  CONSTRAINT `FK_relacion_tipo_lugar_lugares` FOREIGN KEY (`id_lugar`) REFERENCES `lugares` (`id`),
  CONSTRAINT `FK_relacion_tipo_lugar_tipo_lugares` FOREIGN KEY (`id_categoria`) REFERENCES `categorias` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla epikureos_db.categorias_lugares: ~22 rows (aproximadamente)
DELETE FROM `categorias_lugares`;
/*!40000 ALTER TABLE `categorias_lugares` DISABLE KEYS */;
INSERT INTO `categorias_lugares` (`id_categoria`, `id_lugar`) VALUES
	(1, 1),
	(2, 2),
	(1, 3),
	(1, 4),
	(2, 4),
	(1, 7),
	(2, 7),
	(2, 8),
	(2, 9),
	(2, 10),
	(2, 11),
	(2, 12),
	(2, 13),
	(2, 14),
	(2, 15),
	(2, 16),
	(2, 17),
	(2, 18),
	(1, 19),
	(2, 19),
	(2, 20),
	(2, 21);
/*!40000 ALTER TABLE `categorias_lugares` ENABLE KEYS */;


-- Volcando estructura para tabla epikureos_db.ciudades
CREATE TABLE IF NOT EXISTS `ciudades` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(50) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla epikureos_db.ciudades: ~2 rows (aproximadamente)
DELETE FROM `ciudades`;
/*!40000 ALTER TABLE `ciudades` DISABLE KEYS */;
INSERT INTO `ciudades` (`id`, `descripcion`) VALUES
	(1, 'Santa Fe'),
	(2, 'Rosario');
/*!40000 ALTER TABLE `ciudades` ENABLE KEYS */;


-- Volcando estructura para tabla epikureos_db.fotos
CREATE TABLE IF NOT EXISTS `fotos` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `url` varchar(100) DEFAULT NULL,
  `tipo` int(11) unsigned NOT NULL,
  `id_lugar` int(11) unsigned NOT NULL,
  `estado` tinyint(3) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `tipo_id_lugar_estado` (`tipo`,`id_lugar`,`estado`),
  KEY `lugar_foto` (`id_lugar`),
  CONSTRAINT `lugar_foto` FOREIGN KEY (`id_lugar`) REFERENCES `lugares` (`id`),
  CONSTRAINT `tipo_foto` FOREIGN KEY (`tipo`) REFERENCES `tipos_fotos` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla epikureos_db.fotos: ~19 rows (aproximadamente)
DELETE FROM `fotos`;
/*!40000 ALTER TABLE `fotos` DISABLE KEYS */;
INSERT INTO `fotos` (`id`, `url`, `tipo`, `id_lugar`, `estado`) VALUES
	(1, 'http://localhost/epikureos/images/liverpool-thumb.png', 1, 1, 1),
	(2, 'http://localhost/epikureos/images/liverpool-thumb.png', 1, 21, 1),
	(4, 'http://localhost/epikureos/images/liverpool-thumb.png', 1, 20, 1),
	(5, 'http://localhost/epikureos/images/liverpool-thumb.png', 1, 15, 1),
	(6, 'http://localhost/epikureos/images/liverpool-thumb.png', 1, 16, 1),
	(7, 'http://localhost/epikureos/images/liverpool-thumb.png', 1, 10, 1),
	(8, 'http://localhost/epikureos/images/liverpool-thumb.png', 1, 8, 1),
	(10, 'http://localhost/epikureos/images/liverpool-thumb.png', 1, 13, 1),
	(11, 'http://localhost/epikureos/images/liverpool-thumb.png', 1, 17, 1),
	(12, 'http://localhost/epikureos/images/liverpool-thumb.png', 1, 4, 1),
	(13, 'http://localhost/epikureos/images/liverpool-thumb.png', 1, 9, 1),
	(15, 'http://localhost/epikureos/images/liverpool-thumb.png', 1, 2, 1),
	(16, 'http://localhost/epikureos/images/liverpool-thumb.png', 1, 3, 1),
	(17, 'http://localhost/epikureos/images/liverpool-thumb.png', 1, 18, 1),
	(18, 'http://localhost/epikureos/images/liverpool-thumb.png', 1, 11, 1),
	(20, 'http://localhost/epikureos/images/liverpool-thumb.png', 1, 19, 1),
	(21, 'http://localhost/epikureos/images/liverpool-thumb.png', 1, 12, 1),
	(23, 'http://localhost/epikureos/images/liverpool-thumb.png', 1, 14, 1),
	(24, 'http://localhost/epikureos/images/liverpool-thumb.png', 1, 7, 1);
/*!40000 ALTER TABLE `fotos` ENABLE KEYS */;


-- Volcando estructura para tabla epikureos_db.lugares
CREATE TABLE IF NOT EXISTS `lugares` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) NOT NULL DEFAULT '0',
  `descripcion` varchar(200) NOT NULL DEFAULT '0',
  `longitud` varchar(20) NOT NULL DEFAULT '0',
  `latitud` varchar(20) NOT NULL DEFAULT '0',
  `direccion` varchar(50) NOT NULL DEFAULT '0',
  `telefono` varchar(20) NOT NULL DEFAULT '0',
  `web` varchar(20) NOT NULL DEFAULT '0',
  `twitter` varchar(20) NOT NULL DEFAULT '0',
  `facebook` varchar(50) NOT NULL DEFAULT '0',
  `estado` tinyint(1) unsigned NOT NULL,
  `zona` int(11) unsigned DEFAULT NULL,
  `ciudad` int(11) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `lugar_zona` (`zona`),
  KEY `lugar_ciudad` (`ciudad`),
  CONSTRAINT `lugar_ciudad` FOREIGN KEY (`ciudad`) REFERENCES `ciudades` (`id`),
  CONSTRAINT `lugar_zona` FOREIGN KEY (`zona`) REFERENCES `zonas` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla epikureos_db.lugares: ~19 rows (aproximadamente)
DELETE FROM `lugares`;
/*!40000 ALTER TABLE `lugares` DISABLE KEYS */;
INSERT INTO `lugares` (`id`, `nombre`, `descripcion`, `longitud`, `latitud`, `direccion`, `telefono`, `web`, `twitter`, `facebook`, `estado`, `zona`, `ciudad`) VALUES
	(1, 'Liverpool', '', '-60.700542960739085', '-31.633366607649023', 'Pedro Vittori y Mariano Comas', '0342 4027118', '', '', '', 1, 1, 1),
	(2, 'La Brava', '', '-60.68793125000002', '-31.64091690978526', 'Ituzaingó 1117', '342 155954555', '', '', '', 1, NULL, NULL),
	(3, 'La Romería', '', '-60.69891087260248', '-31.63645026593951', 'Bv. Gálvez y Belgrano', '0342 - 155927927', '', '', '', 1, NULL, NULL),
	(4, 'Huaw!', '', '-60.70140679999997', '-31.63639400978352', 'Rivadavia 3475', '', '', '', '', 0, NULL, NULL),
	(7, 'Winsock', '', '-60.69357676133326', '-31.6375929007033', 'Bv. Galvez y Sarmiento', '0342 155453037', '', '', '', 0, NULL, NULL),
	(8, 'Don Marcos', '', '-60.69316479999998', '-31.60771330977256', 'Hernandárias 2430', '0342 - 4608190', '', '', '', 0, NULL, NULL),
	(9, 'Il Nono', '', '-60.693577793447275', '-31.633880394327537', 'Necochea 3885', '', '', '', '', 0, NULL, NULL),
	(10, 'Don Aldao', '', '-60.68080624999999', '-31.61327540977468', 'Gral. Paz 6300', '', '', '', '', 0, NULL, NULL),
	(11, 'Metente Criollo', '', '-60.70131065000004', '-31.63133440978161', 'Arist. del Valle 3978', '', '', '', '', 0, NULL, NULL),
	(12, 'Pericles', '', '-60.703470599999946', '-31.635660359783245', 'San Martín 3498', '0342 - 4560010', '', '', '', 0, NULL, NULL),
	(13, 'El Vagón', '', '-60.701168451520516', '-31.635836793836805', 'Pedro Víttori 3500', '', '', '', '', 0, NULL, NULL),
	(14, 'Restaurant España', '', '-60.70635875000005', '-31.645134459786885', 'San Martín 2644', '', '', '', '', 0, NULL, NULL),
	(15, 'Castelar Restaurante', '', '-60.706504337102494', '-31.64874341789353', '25º de Mayo 2349', '0342 - 4560999 (int.', '', '', '', 0, NULL, NULL),
	(16, 'Círculo Italiano', '', '-60.704098309455055', '-31.642547518806378', 'Hipólito Irigoyen 2451', '0342 - 4563555', '', '', '', 0, NULL, NULL),
	(17, 'Giulio Ristorante (Holiday Inn)', '', '-60.70740277638936', '-31.643315825662118', 'San Jerónimo 2779', '0342-4101200', '', '', '', 0, NULL, NULL),
	(18, 'Marco Polo', '', '-60.70194271779097', '-31.641953746357945', 'San Luis 3000', '0342 - 4810520', '', '', '', 0, NULL, NULL),
	(19, 'Oh! Restó', '', '-60.68793125000002', '-31.64091690978526', 'Lavalle 3200', '0342 - 155332233', '', '', '', 0, 3, 1),
	(20, 'Castelar del puerto', '', '-60.701310072517344', '-31.64956798250401', 'Puerto de Santa Fe, Dique 1', '0342 4572110', '', '', '', 0, 3, 1),
	(21, 'Cabañas Recreo', '', '-60.71131030181765', '-31.63376670978254', 'Bv. Pellegrini 3200', '0342 - 4556556', '', '', '', 0, NULL, NULL);
/*!40000 ALTER TABLE `lugares` ENABLE KEYS */;


-- Volcando estructura para tabla epikureos_db.tipos_fotos
CREATE TABLE IF NOT EXISTS `tipos_fotos` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(50) NOT NULL DEFAULT '0',
  `size` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla epikureos_db.tipos_fotos: ~1 rows (aproximadamente)
DELETE FROM `tipos_fotos`;
/*!40000 ALTER TABLE `tipos_fotos` DISABLE KEYS */;
INSERT INTO `tipos_fotos` (`id`, `descripcion`, `size`) VALUES
	(1, 'thumb', '200x125');
/*!40000 ALTER TABLE `tipos_fotos` ENABLE KEYS */;


-- Volcando estructura para tabla epikureos_db.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `email` varchar(50) NOT NULL DEFAULT '0',
  `type` tinyint(1) unsigned NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla epikureos_db.users: ~1 rows (aproximadamente)
DELETE FROM `users`;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`id`, `email`, `type`, `username`, `password`) VALUES
	(1, 'arielmbenz@gmail.com', 2, 'admin', '$2y$08$uxS5yERzdhs74ibTXUNlduiK95lJMpnbu2GgaEsA/yfljEdVW8mSq');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;


-- Volcando estructura para tabla epikureos_db.zonas
CREATE TABLE IF NOT EXISTS `zonas` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla epikureos_db.zonas: ~3 rows (aproximadamente)
DELETE FROM `zonas`;
/*!40000 ALTER TABLE `zonas` DISABLE KEYS */;
INSERT INTO `zonas` (`id`, `descripcion`) VALUES
	(1, 'Norte'),
	(2, 'Centro'),
	(3, 'Sur');
/*!40000 ALTER TABLE `zonas` ENABLE KEYS */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
