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

-- Volcando estructura para tabla altasalida_db.categorias
CREATE TABLE IF NOT EXISTS `categorias` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `slug` varchar(50) NOT NULL DEFAULT '0',
  `descripcion` varchar(50) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla altasalida_db.categorias: ~5 rows (aproximadamente)
DELETE FROM `categorias`;
/*!40000 ALTER TABLE `categorias` DISABLE KEYS */;
INSERT INTO `categorias` (`id`, `slug`, `descripcion`) VALUES
	(1, 'restobar', 'Restobar'),
	(2, 'restaurant', 'Restaurant'),
	(3, 'cafe', 'Café'),
	(4, 'vinotecas', 'Vinotecas'),
	(5, 'heladerias', 'Heladerías');
/*!40000 ALTER TABLE `categorias` ENABLE KEYS */;


-- Volcando estructura para tabla altasalida_db.categorias_lugares
CREATE TABLE IF NOT EXISTS `categorias_lugares` (
  `id_categoria` int(10) unsigned NOT NULL,
  `id_lugar` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id_categoria`,`id_lugar`),
  KEY `FK_relacion_tipo_lugar_lugares` (`id_lugar`),
  CONSTRAINT `FK_relacion_tipo_lugar_lugares` FOREIGN KEY (`id_lugar`) REFERENCES `lugares` (`id`),
  CONSTRAINT `FK_relacion_tipo_lugar_tipo_lugares` FOREIGN KEY (`id_categoria`) REFERENCES `categorias` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla altasalida_db.categorias_lugares: ~93 rows (aproximadamente)
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
	(2, 21),
	(1, 22),
	(2, 22),
	(1, 23),
	(1, 24),
	(2, 24),
	(1, 25),
	(2, 25),
	(3, 25),
	(4, 25),
	(1, 26),
	(1, 27),
	(1, 28),
	(1, 29),
	(2, 29),
	(1, 30),
	(2, 30),
	(1, 31),
	(2, 31),
	(1, 32),
	(1, 33),
	(1, 34),
	(2, 34),
	(1, 35),
	(3, 35),
	(1, 36),
	(2, 37),
	(1, 38),
	(3, 38),
	(3, 39),
	(1, 40),
	(3, 40),
	(3, 41),
	(1, 42),
	(3, 42),
	(3, 43),
	(5, 43),
	(1, 44),
	(3, 44),
	(5, 44),
	(3, 45),
	(5, 45),
	(1, 46),
	(1, 47),
	(5, 48),
	(5, 49),
	(1, 50),
	(2, 50),
	(2, 51),
	(1, 52),
	(2, 52),
	(3, 53),
	(1, 54),
	(1, 55),
	(1, 56),
	(2, 56),
	(1, 57),
	(2, 57),
	(3, 58),
	(2, 59),
	(2, 60),
	(1, 61),
	(3, 61),
	(2, 62),
	(1, 63),
	(1, 64),
	(1, 65),
	(1, 66),
	(1, 67),
	(1, 68),
	(2, 68),
	(3, 68),
	(3, 69),
	(2, 70);
/*!40000 ALTER TABLE `categorias_lugares` ENABLE KEYS */;


-- Volcando estructura para tabla altasalida_db.ciudades
CREATE TABLE IF NOT EXISTS `ciudades` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(50) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla altasalida_db.ciudades: ~2 rows (aproximadamente)
DELETE FROM `ciudades`;
/*!40000 ALTER TABLE `ciudades` DISABLE KEYS */;
INSERT INTO `ciudades` (`id`, `descripcion`) VALUES
	(1, 'Santa Fe'),
	(2, 'Rosario');
/*!40000 ALTER TABLE `ciudades` ENABLE KEYS */;


-- Volcando estructura para tabla altasalida_db.comentarios
CREATE TABLE IF NOT EXISTS `comentarios` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) unsigned NOT NULL DEFAULT '0',
  `lugar_id` int(11) unsigned NOT NULL DEFAULT '0',
  `comment` varchar(50) NOT NULL DEFAULT '0',
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `user_fk` (`user_id`),
  KEY `lugar_fk` (`lugar_id`),
  CONSTRAINT `lugar_fk` FOREIGN KEY (`lugar_id`) REFERENCES `lugares` (`id`),
  CONSTRAINT `user_fk` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=40 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla altasalida_db.comentarios: ~8 rows (aproximadamente)
DELETE FROM `comentarios`;
/*!40000 ALTER TABLE `comentarios` DISABLE KEYS */;
INSERT INTO `comentarios` (`id`, `user_id`, `lugar_id`, `comment`, `created_at`, `updated_at`) VALUES
	(35, 10, 22, 'Primer comentario', '2014-06-08 00:52:06', '2014-06-08 00:52:06'),
	(36, 10, 22, 'Nuevo comentario', '2014-06-08 02:19:04', '2014-06-08 02:19:04'),
	(37, 10, 22, 'Tercer comentario', '2014-06-08 02:19:55', '2014-06-08 02:19:55'),
	(38, 10, 22, 'CUarto comentario', '2014-06-08 02:53:29', '2014-06-08 02:53:29'),
	(39, 10, 22, 'comenta ttatat', '2014-06-08 02:53:51', '2014-06-08 02:53:51');
/*!40000 ALTER TABLE `comentarios` ENABLE KEYS */;


-- Volcando estructura para tabla altasalida_db.etiquetas
CREATE TABLE IF NOT EXISTS `etiquetas` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `slug` varchar(50) NOT NULL,
  `descripcion` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla altasalida_db.etiquetas: ~14 rows (aproximadamente)
DELETE FROM `etiquetas`;
/*!40000 ALTER TABLE `etiquetas` DISABLE KEYS */;
INSERT INTO `etiquetas` (`id`, `slug`, `descripcion`) VALUES
	(1, 'restobar', 'Restobar'),
	(3, 'cafes', 'Cafés'),
	(4, 'vinotecas', 'Vinotecas'),
	(5, 'restaurantes', 'Restaurantes'),
	(6, 'bares', 'Bares'),
	(7, 'cafeterias', 'Cafeterías'),
	(8, 'tostaderos', 'Tostaderos'),
	(9, 'helados', 'Helados'),
	(10, 'heladerias', 'Heladerías'),
	(11, 'vinos', 'Vinos'),
	(12, 'tragos', 'Tragos'),
	(13, 'brunch', 'Brunch'),
	(15, 'delis', 'Delis'),
	(16, 'pasteleria', 'Pastelería');
/*!40000 ALTER TABLE `etiquetas` ENABLE KEYS */;


-- Volcando estructura para tabla altasalida_db.etiquetas_lugares
CREATE TABLE IF NOT EXISTS `etiquetas_lugares` (
  `id_etiqueta` int(11) unsigned NOT NULL,
  `id_lugar` int(11) unsigned NOT NULL,
  KEY `FK_etiqueta` (`id_etiqueta`),
  KEY `FK_lugar` (`id_lugar`),
  CONSTRAINT `FK_etiqueta` FOREIGN KEY (`id_etiqueta`) REFERENCES `etiquetas` (`id`),
  CONSTRAINT `FK_lugar` FOREIGN KEY (`id_lugar`) REFERENCES `lugares` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla altasalida_db.etiquetas_lugares: ~213 rows (aproximadamente)
DELETE FROM `etiquetas_lugares`;
/*!40000 ALTER TABLE `etiquetas_lugares` DISABLE KEYS */;
INSERT INTO `etiquetas_lugares` (`id_etiqueta`, `id_lugar`) VALUES
	(6, 23),
	(1, 23),
	(6, 42),
	(13, 42),
	(3, 42),
	(7, 42),
	(1, 42),
	(6, 54),
	(1, 54),
	(12, 54),
	(6, 46),
	(1, 46),
	(5, 13),
	(6, 4),
	(1, 4),
	(1, 36),
	(5, 2),
	(3, 48),
	(7, 48),
	(15, 48),
	(10, 48),
	(9, 48),
	(3, 49),
	(7, 49),
	(15, 49),
	(10, 49),
	(9, 49),
	(6, 40),
	(3, 40),
	(7, 40),
	(1, 40),
	(6, 28),
	(1, 28),
	(12, 28),
	(6, 29),
	(5, 29),
	(1, 29),
	(6, 37),
	(5, 37),
	(11, 37),
	(6, 19),
	(1, 19),
	(12, 19),
	(6, 27),
	(3, 27),
	(7, 27),
	(1, 27),
	(11, 27),
	(4, 27),
	(6, 26),
	(1, 26),
	(12, 26),
	(6, 47),
	(5, 47),
	(1, 47),
	(12, 47),
	(11, 47),
	(1, 7),
	(6, 44),
	(3, 44),
	(7, 44),
	(15, 44),
	(10, 44),
	(9, 44),
	(16, 44),
	(1, 44),
	(5, 20),
	(5, 16),
	(5, 8),
	(5, 17),
	(5, 9),
	(5, 11),
	(6, 12),
	(5, 12),
	(1, 12),
	(5, 14),
	(5, 60),
	(6, 61),
	(3, 61),
	(7, 61),
	(1, 61),
	(5, 62),
	(1, 62),
	(11, 62),
	(6, 22),
	(3, 22),
	(5, 22),
	(1, 22),
	(12, 22),
	(6, 38),
	(3, 38),
	(7, 38),
	(15, 38),
	(16, 38),
	(1, 38),
	(6, 55),
	(1, 55),
	(12, 55),
	(6, 56),
	(3, 56),
	(7, 56),
	(5, 56),
	(1, 56),
	(3, 43),
	(7, 43),
	(15, 43),
	(10, 43),
	(9, 43),
	(16, 43),
	(13, 59),
	(5, 59),
	(11, 59),
	(6, 32),
	(1, 32),
	(11, 32),
	(4, 32),
	(6, 33),
	(3, 33),
	(1, 33),
	(6, 31),
	(7, 31),
	(5, 31),
	(1, 31),
	(3, 41),
	(7, 41),
	(15, 41),
	(16, 41),
	(6, 30),
	(5, 30),
	(1, 30),
	(6, 45),
	(3, 45),
	(7, 45),
	(15, 45),
	(10, 45),
	(9, 45),
	(6, 64),
	(1, 64),
	(6, 50),
	(3, 50),
	(7, 50),
	(5, 50),
	(1, 50),
	(6, 25),
	(3, 25),
	(7, 25),
	(5, 25),
	(1, 25),
	(11, 25),
	(4, 25),
	(6, 1),
	(1, 1),
	(12, 1),
	(5, 51),
	(1, 51),
	(11, 51),
	(6, 24),
	(5, 24),
	(1, 24),
	(6, 57),
	(5, 57),
	(1, 57),
	(3, 53),
	(7, 53),
	(15, 53),
	(16, 53),
	(3, 39),
	(7, 39),
	(13, 58),
	(3, 58),
	(7, 58),
	(1, 58),
	(8, 58),
	(6, 66),
	(1, 66),
	(12, 66),
	(6, 67),
	(1, 67),
	(6, 68),
	(3, 68),
	(7, 68),
	(5, 68),
	(1, 68),
	(3, 69),
	(7, 69),
	(15, 69),
	(16, 69),
	(6, 65),
	(3, 65),
	(1, 65),
	(12, 65),
	(11, 65),
	(6, 52),
	(1, 52),
	(12, 52),
	(6, 63),
	(1, 63),
	(12, 63),
	(6, 35),
	(3, 35),
	(7, 35),
	(1, 35),
	(6, 3),
	(3, 3),
	(1, 3),
	(5, 21),
	(11, 15),
	(4, 15),
	(5, 10),
	(6, 34),
	(7, 34),
	(1, 34),
	(5, 18),
	(5, 70);
/*!40000 ALTER TABLE `etiquetas_lugares` ENABLE KEYS */;


-- Volcando estructura para tabla altasalida_db.fotos
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
) ENGINE=InnoDB AUTO_INCREMENT=74 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla altasalida_db.fotos: ~56 rows (aproximadamente)
DELETE FROM `fotos`;
/*!40000 ALTER TABLE `fotos` DISABLE KEYS */;
INSERT INTO `fotos` (`id`, `url`, `tipo`, `id_lugar`, `estado`) VALUES
	(1, 'http://localhost/epikureos/images/liverpool/thumb.png', 1, 1, 1),
	(2, 'http://localhost/epikureos/images/cabañas-recreo/thumb.png', 1, 21, 1),
	(4, 'http://localhost/epikureos/images/liverpool-thumb.png', 1, 20, 1),
	(5, 'http://localhost/epikureos/images/liverpool-thumb.png', 1, 15, 1),
	(6, 'http://localhost/epikureos/images/liverpool-thumb.png', 1, 16, 1),
	(7, 'http://localhost/epikureos/images/liverpool-thumb.png', 1, 10, 1),
	(8, 'http://localhost/epikureos/images/liverpool-thumb.png', 1, 8, 1),
	(10, 'http://localhost/epikureos/images/el-vagon/thumb.png', 1, 13, 1),
	(11, 'http://localhost/epikureos/images/liverpool-thumb.png', 1, 17, 1),
	(12, 'http://localhost/epikureos/images/huaw/thumb.png', 1, 4, 1),
	(13, 'http://localhost/epikureos/images/liverpool-thumb.png', 1, 9, 1),
	(15, 'http://localhost/epikureos/images/la-brava/thumb.png', 1, 2, 1),
	(16, 'http://localhost/epikureos/images/la-romeria/thumb.png', 1, 3, 1),
	(17, 'http://localhost/epikureos/images/liverpool-thumb.png', 1, 18, 1),
	(18, 'http://localhost/epikureos/images/liverpool-thumb.png', 1, 11, 1),
	(20, 'http://localhost/epikureos/images/oh-resto/thumb.png', 1, 19, 1),
	(21, 'http://localhost/epikureos/images/liverpool-thumb.png', 1, 12, 1),
	(23, 'http://localhost/epikureos/images/liverpool-thumb.png', 1, 14, 1),
	(24, 'http://localhost/epikureos/images/winsock/thumb.png', 1, 7, 1),
	(25, 'http://localhost/epikureos/images/1980-boulevard/thumb.png', 1, 22, 1),
	(26, 'http://localhost/epikureos/images/belgrano-bar/thumb.png', 1, 23, 1),
	(27, 'http://localhost/epikureos/images/brewpub-estacion-saer/thumb.png', 1, 24, 1),
	(28, 'http://localhost/epikureos/images/liverpool-thumb.png', 1, 25, 1),
	(29, 'http://localhost/epikureos/images/san-patricio/thumb.png', 1, 26, 1),
	(30, 'http://localhost/epikureos/images/paladar-negro/thumb.png', 1, 27, 1),
	(31, 'http://localhost/epikureos/images/loxs-bar/thumb.png', 1, 28, 1),
	(32, 'http://localhost/epikureos/images/monte-libano/thumb.png', 1, 29, 1),
	(33, 'http://localhost/epikureos/images/santa-carmela/thumb.png', 1, 30, 1),
	(34, 'http://localhost/epikureos/images/laguna-picada/thumb.png', 1, 31, 1),
	(35, 'http://localhost/epikureos/images/la-camorra/thumb.png', 1, 32, 1),
	(36, 'http://localhost/epikureos/images/la-citi-sport/thumb.png', 1, 33, 1),
	(37, 'http://localhost/epikureos/images/la-citi-recoleta/thumb.png', 1, 34, 1),
	(38, 'http://localhost/epikureos/images/bar-casa-espana/thumb.png', 1, 35, 1),
	(39, 'http://localhost/epikureos/images/la-bastilla/thumb.png', 1, 36, 1),
	(40, 'http://localhost/epikureos/images/ohashi/thumb.png', 1, 37, 1),
	(41, 'http://localhost/epikureos/images/balcarce/thumb.png', 1, 38, 1),
	(42, 'http://localhost/epikureos/images/tostadero-iris/thumb.png', 1, 39, 1),
	(43, 'http://localhost/epikureos/images/la-tasca-bar/thumb.png', 1, 40, 1),
	(44, 'http://localhost/epikureos/images/planta-alta-bv/thumb.png', 1, 41, 1),
	(45, 'http://localhost/epikureos/images/cafe-zita/thumb.png', 1, 42, 1),
	(46, 'http://localhost/epikureos/images/dai-sladky/thumb.png', 1, 43, 1),
	(47, 'http://localhost/epikureos/images/procope/thumb.png', 1, 44, 1),
	(48, 'http://localhost/epikureos/images/santa-catalina-boulevard/thumb.png', 1, 45, 1),
	(49, 'http://localhost/epikureos/images/comillas-bar/thumb.png', 1, 46, 1),
	(50, 'http://localhost/epikureos/images/san-telmo-bar/thumb.png', 1, 47, 1),
	(51, 'http://localhost/epikureos/images/freddo-bv/thumb.png', 1, 48, 1),
	(52, 'http://localhost/epikureos/images/freddo-la-ribera/thumb.png', 1, 49, 1),
	(53, 'http://localhost/epikureos/images/triferto-peatonal/thumb.png', 1, 50, 1),
	(54, 'http://localhost/epikureos/images/agora/thumb.png', 1, 51, 1),
	(55, 'http://localhost/epikureos/images/falucho-bar/thumb.png', 1, 52, 1),
	(56, 'http://localhost/epikureos/images/la-pasteleria/thumb.png', 1, 53, 1),
	(57, 'http://localhost/epikureos/images/barrio-latino/thumb.png', 1, 54, 1),
	(58, 'http://localhost/epikureos/images/bowie/thumb.png', 1, 55, 1),
	(59, 'http://localhost/epikureos/images/choperia-santa-fe/thumb.png', 1, 56, 1),
	(60, 'http://localhost/epikureos/images/cerveceria-santa-fe/thumb.png', 1, 57, 1),
	(61, 'http://localhost/epikureos/images/tostadero-iris-sur/thumb.png', 1, 58, 1),
	(62, 'http://localhost/epikureos/images/la-boutique-del-cocinero/thumb.png', 1, 59, 1),
	(63, 'http://localhost/epikureos/images/manifiesto-umami/thumb.png', 1, 60, 1),
	(64, 'http://localhost/epikureos/images/japo-bar/thumb.png', 1, 61, 1),
	(65, 'http://localhost/epikureos/images/el-aljibe/thumb.png', 1, 62, 1),
	(66, 'http://localhost/epikureos/images/kusturica/thumb.png', 1, 63, 1),
	(67, 'http://localhost/epikureos/images/stanley-rock-bar/thumb.png', 1, 64, 1),
	(68, 'http://localhost/epikureos/images/christoff-bistro/thumb.png', 1, 65, 1),
	(69, 'http://localhost/epikureos/images/papalote-arte-bar/thumb.png', 1, 66, 1),
	(70, 'http://localhost/epikureos/images/olmedo-resto/thumb.png', 1, 67, 1),
	(71, 'http://localhost/epikureos/images/triferto-recoleta/thumb.png', 1, 68, 1),
	(72, 'http://localhost/epikureos/images/havanna-peatonal/thumb.png', 1, 69, 1),
	(73, 'http://localhost/epikureos/images/liverpool-thumb.png', 1, 70, 1);
/*!40000 ALTER TABLE `fotos` ENABLE KEYS */;


-- Volcando estructura para tabla altasalida_db.lugares
CREATE TABLE IF NOT EXISTS `lugares` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) NOT NULL DEFAULT '0',
  `rating_count` int(11) unsigned NOT NULL DEFAULT '0',
  `rating_cache` float(2,1) unsigned NOT NULL DEFAULT '3.0',
  `slug` varchar(50) DEFAULT NULL,
  `descripcion` varchar(500) NOT NULL DEFAULT '0',
  `longitud` varchar(20) NOT NULL DEFAULT '0',
  `latitud` varchar(20) NOT NULL DEFAULT '0',
  `direccion` varchar(50) NOT NULL DEFAULT '0',
  `telefono` varchar(50) NOT NULL DEFAULT '0',
  `web` varchar(50) NOT NULL DEFAULT '0',
  `twitter` varchar(50) NOT NULL DEFAULT '0',
  `facebook` varchar(100) NOT NULL DEFAULT '0',
  `estado` tinyint(1) unsigned NOT NULL,
  `zona` int(11) unsigned DEFAULT NULL,
  `ciudad` int(11) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `lugar_zona` (`zona`),
  KEY `lugar_ciudad` (`ciudad`),
  CONSTRAINT `lugar_ciudad` FOREIGN KEY (`ciudad`) REFERENCES `ciudades` (`id`),
  CONSTRAINT `lugar_zona` FOREIGN KEY (`zona`) REFERENCES `zonas` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=71 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla altasalida_db.lugares: ~68 rows (aproximadamente)
DELETE FROM `lugares`;
/*!40000 ALTER TABLE `lugares` DISABLE KEYS */;
INSERT INTO `lugares` (`id`, `nombre`, `rating_count`, `rating_cache`, `slug`, `descripcion`, `longitud`, `latitud`, `direccion`, `telefono`, `web`, `twitter`, `facebook`, `estado`, `zona`, `ciudad`) VALUES
	(1, 'Liverpool', 0, 3.0, 'liverpool', 'Nuestra carta esta compuesta por una delicada conjunción de sabores, fundamentada en la combinación de una cocina clásica y contemporánea. Productos cuidadosamente seleccionados aseguran la calidad de nuestra propuesta. Así se conforma un maridaje perfecto entre nuestros platos y bebidas. Cervezas y vinos de las bodegas mas representativas de nuestro país junto a los boutique que enarbolan a nuestras tradiciones, componen una invitación irrechazable a una velada única.', '-60.700542960739085', '-31.633366607649023', 'Pedro Vittori y Mariano Comas', '342-4027118', '', '', 'https://www.facebook.com/barliverpool', 1, 4, 1),
	(2, 'La Brava', 0, 3.0, 'la-brava', 'Con una excelente carta de platos de cocina y una bodega seleccionada, la Brava Restaurant es un lugar ideal para compartir momentos únicos, su arquitectura de estilo y la ubicación en el corazón de Barrio Candioti Sur conjugan un ambiente perfecto.', '-60.68793125000002', '-31.64091690978526', 'Ituzaingó 1117', '342 155954555', '', '', 'https://www.facebook.com/labravasantafe', 1, 1, 1),
	(3, 'La Romería', 0, 3.0, 'la-romeria', 'La Romería fue pensado como una alternativa original a tanto clásico ya conocido. Parte de una concepción simplista: lugar cálido y armonioso para compartir, comidas exquisitas para recordar y una excelente atención a nuestros clientes.', '-60.69891087260248', '-31.63645026593951', 'Bv. Gálvez y Belgrano', '0342 - 155927927', '', '', 'https://www.facebook.com/pages/La-Romería-Santa-Fe/141535209364802', 1, 1, 1),
	(4, 'Huaw!', 0, 3.0, 'huaw', '', '-60.70140679999997', '-31.63639400978352', 'Rivadavia 3475', '', '', '', 'https://www.facebook.com/huaw.bowlingrestobar', 1, 4, 1),
	(7, 'WinSock Sport & Music', 0, 3.0, 'winsock', '', '-60.69357676133326', '-31.6375929007033', 'Bv. Galvez y Sarmiento', '342-155453037', '', '', 'https://www.facebook.com/winsockbar', 1, 1, 1),
	(8, 'Don Marcos', 0, 3.0, 'don-marcos', '', '-60.69316479999998', '-31.60771330977256', 'Hernandárias 2430', '0342 - 4608190', '', '', '', 0, 1, 1),
	(9, 'Il Nono', 0, 3.0, 'il-nono', '', '-60.693577793447275', '-31.633880394327537', 'Necochea 3885', '', '', '', '', 0, 1, 1),
	(10, 'Don Aldao', 0, 3.0, 'don-aldao', '', '-60.68080624999999', '-31.61327540977468', 'Gral. Paz 6300', '', '', '', 'https://www.facebook.com/don.aldao.5', 0, 1, 1),
	(11, 'Metente Criollo', 0, 3.0, 'metente-criollo', '', '-60.70131065000004', '-31.63133440978161', 'Arist. del Valle 3978', '', '', '', '', 0, 1, 1),
	(12, 'Pericles', 0, 3.0, 'pericles', '', '-60.703470599999946', '-31.635660359783245', 'San Martín 3498', '0342 - 4560010', '', '', '', 0, 1, 1),
	(13, 'El Vagón', 0, 3.0, 'el-vagon', '', '-60.701168451520516', '-31.635836793836805', 'Pedro Víttori 3500', '', 'http://elvagonsantafe.com.ar', '', 'https://www.facebook.com/pages/El-Vag%C3%B3n-Santa-Fe/128953133800088', 1, 1, 1),
	(14, 'Restaurant España', 0, 3.0, 'restaurant-españa', '', '-60.70635875000005', '-31.645134459786885', 'San Martín 2644', '', '', '', '', 0, 1, 1),
	(15, 'Castelar Restaurante', 0, 3.0, 'castelar-restaurant', '', '-60.706504337102494', '-31.64874341789353', '25º de Mayo 2349', '342-4560999', '', '', 'https://www.facebook.com/RestaurantesDelCastelar', 0, 1, 1),
	(16, 'Círculo Italiano', 0, 3.0, 'circulo-italiano', '', '-60.704098309455055', '-31.642547518806378', 'Hipólito Irigoyen 2451', '0342 - 4563555', '', '', '', 0, 1, 1),
	(17, 'Giulio Ristorante', 0, 3.0, 'giulio-ristorante', '', '-60.70740277638936', '-31.643315825662118', 'San Jerónimo 2779', '0342-4101200', '', '', '', 0, 1, 1),
	(18, 'Marco Polo', 0, 3.0, 'marco-polo', '', '-60.70194271779097', '-31.641953746357945', 'San Luis 3000', '0342 - 4810520', '', '', 'https://www.facebook.com/pages/Marco-Polo-Caf%C3%A9-Bar-Rest%C3%B3/125851674138720', 0, 1, 1),
	(19, 'Oh! Restó', 0, 3.0, 'oh-resto', '', '-60.68793125000002', '-31.64091690978526', 'Lavalle 3200', '0342 - 155332233', '', '', 'https://www.facebook.com/oh.resto', 1, 3, 1),
	(20, 'Castelar del puerto', 0, 3.0, 'castelar-del-puerto', '', '-60.701310072517344', '-31.64956798250401', 'Puerto de Santa Fe, Dique 1', '0342 4572110', '', '', '', 0, 3, 1),
	(21, 'Cabañas Recreo', 0, 3.0, 'cabañas-recreo', '', '-60.71131030181765', '-31.63376670978254', 'Bv. Pellegrini 3200', '0342 - 4556556', 'http://cabanasrecreo.com', '', 'https://www.facebook.com/cabanasrecreo.sf', 0, 1, 1),
	(22, '1980 Boulevard', 1, 4.0, '1980-boulevard', 'De lo clásico a lo sofisticado, 1980 Boulevard Resto, Café, Bar cuenta con distintos cocineros (Chef) especialistas en comidas gourmet…Un detalle que primero, deleita los paladares más exigentes, y segundo, ofrece una gran variedad de los mejores platos elaborados. 1980 BV cuenta con una capacidad para 600 comensales, además de un subsuelo donde se realizaran eventos y fiestas temáticas, conferencias de prensa, etc.', '-60.70127922711367', '-31.636138966965554', 'Bv. Gálvez 2300', '342-4520309', '', '', 'http://www.facebook.com/1980boulevard', 1, 2, 1),
	(23, 'Belgrano Bar', 0, 3.0, 'belgrano-bar', '', '-60.69842044999996', '-31.63498520978297', 'Belgrano 3660', '', '', '', 'https://www.facebook.com/belgrano.bar.5', 1, 1, 1),
	(24, 'BrewPub Estación Saer', 0, 3.0, 'brewpub-estacion-saer', 'Cerveza Artesanal es innovación, independencia, curiosidad, colaboración, personalidad y familia.', '-60.68615739038387', '-31.63898608038253', 'Bv. Gálvez 1150', '', '', '', 'https://www.facebook.com/brewpub.saer', 1, 1, 1),
	(25, 'Costa Litoral', 0, 3.0, 'costa-litoral', 'Costa Cafe restó bar, un lugar exclusivo para disfrutar un desayuno, un almuerzo o cena con la mejor vista del puerto. Las mejores picadas, platos elaborados, pescados y el mejor liso santafesino. Internet wifi y estacionamiento sin cargo. A solo dos cuadras del centro de la ciudad. SOMOS LA TERMINAL DE EMBARQUE DEL CATAMARÁN COSTA LITORAL', '-60.70193682601848', '-31.647873528595202', 'Cabecera del Dique 1, Puerto de Santa Fe', '0342-4564381', '', '', 'https://www.facebook.com/costa.litoral', 0, 1, 1),
	(26, 'San Patricio', 0, 3.0, 'san-patricio', '', '-60.705247350000036', '-31.63527780978307', 'Bv. Pellegrini 2727', '', '', '', 'https://www.facebook.com/sanpatricio.bar.9', 1, 1, 1),
	(27, 'Paladar Negro', 0, 3.0, 'paladar-negro', '', '-60.69385619999997', '-31.638663909784395', 'Balcarce 1700', '342-4562868', '', '', 'https://www.facebook.com/restopn', 1, 5, 1),
	(28, 'Loxs Bar', 0, 3.0, 'loxs-bar', '', '-60.69706561110672', '-31.63796690877629', 'Balcarce y Alvear', '342-155054550', '', '', 'http://facebook.com/bar.loxs', 1, 5, 1),
	(29, 'Monte Libano', 0, 3.0, 'monte-libano', '', '-60.70452984552729', '-31.641355487611733', '25 de Mayo y Crespo', '342-155239227', '', '', 'https://www.facebook.com/montelibano.bar', 1, 2, 1),
	(30, 'Santa Carmela', 0, 3.0, 'santa-carmela', 'Somos bar, patio, terraza y un ambiente sin igual en Paseo El Carmen, El Salvador. Somos amantes de la buena música indie alternativa y estamos convencidos que nuestra parrilla al carbon es espectacular. No importa si buscas solo un par de cervezas bien frías o una larga noche de fiesta con tus amigos. Este es el lugar.', '-60.709062792323735', '-31.63568815107154', '4 de Enero y Obispo Gelabert', '342-4028844', '', '', 'https://www.facebook.com/santacarmelabar', 1, 3, 1),
	(31, 'Laguna Picada', 0, 3.0, 'laguna-picada', 'Laguna Picada es un bar pensado para vos... Podes deleitarte con nuestras pizzas y picadas y, a la vez, disfrutar del hermoso paisaje que nos brinda la costa santafesina... Te invitamos junto a tus amigos o familiares, te invitamos a divertirte y disfrutar a tu manera, te invitamos a Laguna Picada...', '-60.67348430000004', '-31.615709709775594', 'Echagüe 6209', '342-4600423', '', '', 'https://www.facebook.com/lagunapicadasfe', 1, 1, 1),
	(32, 'La Camorra', 0, 3.0, 'la-camorra', 'La Camorra. cambia sus dueños y trae una nueva forma de salir a picar algo por las noches que ya es furor en Europa. El Tapeo.', '-60.699057599999946', '-31.638496059784337', 'Ituzaingó 2164', '342-4541436', '', '', 'https://www.facebook.com/LaCamorraBarDeTapas', 1, 5, 1),
	(33, 'La Citi Sport', 0, 3.0, 'la-citi-sport', 'Acercar permanentemente lo mas novedoso en servicios gastronómicos, encomendados en una permanente renovación para nunca dejar nuestro estilo de atención privilegiando la comodidad y el gusto de nuestros clientes y amigos.', '-60.7066147238994', '-31.6456791636859', 'San Martín y La Rioja', '342-4554764', '', '', 'https://www.facebook.com/LaCitiSpor', 1, 2, 1),
	(34, 'La Citi Recoleta', 0, 3.0, 'la-citi-recoleta', '', '-60.70351409027818', '-31.6380409155941', 'Santiago del Estero 2519', '342-4531425', '', '', 'https://www.facebook.com/citirecoleta', 1, 4, 1),
	(35, 'Bar Casa España', 0, 3.0, 'bar-casa-espana', '', '-60.703467909669826', '-31.643067287625417', 'Rivadavia 2871', '342-4120481', '', '', 'https://www.facebook.com/pages/Bar-Casa-España/215555651846749', 1, 2, 1),
	(36, 'La Bastilla', 0, 3.0, 'la-bastilla', '', '-60.69800671925941', '-31.63734183637432', 'Las Heras 3459', '', '', '', 'https://www.facebook.com/labastilla.restobar', 1, 5, 1),
	(37, 'Ohashi', 0, 3.0, 'ohashi', '', '-60.70281524905647', '-31.63699640636742', 'Obispo Gelabert 2488', '342-4541458', '', '', 'https://www.facebook.com/pages/OHASHI/89030724578', 1, 4, 1),
	(38, 'Balcarce', 0, 3.0, 'balcarce', '', '-60.691413391804645', '-31.638047552467135', 'Mitre 3517', '342-4555787', 'http://www.balcarcesantafe.com.ar', '', 'https://www.facebook.com/balcarce.santafe', 1, 5, 1),
	(39, 'Tostadero Iris', 0, 3.0, 'tostadero-iris', 'En el Tostadero Iris elaboramos artesanalmente 32 variedades que se clasifican en: Puros de Origen, Tostados Naturales y Blends. Cuenta con muchas alternativas para degustar, frías batidos helados de fruta y opciones calientes, café me México, de Panamá, Costa Rica y mucho mas. Excelente opción para visitar!', '-60.6988274185635', '-31.6366847487473', 'Belgrano 3498', '', 'http://www.tostaderoiris.com.ar', '', 'https://www.facebook.com/tostaderoiris', 1, 5, 1),
	(40, 'La Tasca Bar', 0, 3.0, 'la-tasca-bar', '', '-60.70565235000004', '-31.642819909786006', 'San Martín 2846', '342-4567266', '', '', 'https://www.facebook.com/latasca.bar.9', 1, 2, 1),
	(41, 'Planta Alta Bv', 0, 3.0, 'planta-alta-bv', '', '-60.68874129999995', '-31.638809409784436', 'Bv. Pellegrini 1243', '342-4534010', '', '', 'https://www.facebook.com/PlantAltaBv', 1, 5, 1),
	(42, 'Café Zita', 0, 3.0, 'cafe-zita', '', '-60.705874308852344', '-31.641107762154682', 'Gdor. Crespo 2649', '342-154677211', '', '', 'https://www.facebook.com/ZitaCafe', 1, 2, 1),
	(43, 'Dai Sladky', 0, 3.0, 'dai-sladky', 'Pastelería artesanal y salón de té desde 1994. Nuestros clientes saben de nuestro compromiso, nuestra atención personalizada y el cumplimiento en tiempo y forma de nuestro trabajo.', '-60.70542130000001', '-31.637595809783978', 'Santiago del Estero 2687', '342-4523504', '', '', 'https://www.facebook.com/daisladky.pasteleria', 1, 5, 1),
	(44, 'Procope', 0, 3.0, 'procope', '', '-60.69252455581547', '-31.637803925530985', 'Bv. Pellegrini y Alberdi', '', '', '', 'https://www.facebook.com/heladeria.procope', 1, 5, 1),
	(45, 'Santa Catalina Boulevard', 0, 3.0, 'santa-catalina-boulevard', 'Pasá a probar nuestras elaboraciones en pastelería, acompañadas del mejor café. Compartí junto a amigos nuestros pizzas y lisos. Disfrutá el más cremoso helado y licuados. ', '-60.704846799999984', '-31.635120859783008', 'San Jerónimo 3504', '342-4027118', '', '', 'https://www.facebook.com/pages/Santa-Catalina/455102174554451', 1, 4, 1),
	(46, 'Comillas Bar', 0, 3.0, 'comillas-bar', '', '-60.69248941531578', '-31.633989461147213', 'Luciano Molinas y Sarmiento', '342-154214455', '', '', 'https://www.facebook.com/comillas.bar', 1, 5, 1),
	(47, 'San Telmo Bar', 0, 3.0, 'san-telmo-bar', '', '-60.68851975347867', '-31.635738391008253', 'Güemes y Chacabuco', '342-6100244', '', '', 'https://www.facebook.com/santelmo.bar.7', 1, 5, 1),
	(48, 'Freddo', 0, 3.0, 'freddo-bv', '', '-60.69370034999997', '-31.637746209784016', 'Bv. Pellegrini 1711', '', '', '', 'https://www.facebook.com/freddosantafeoficial', 1, 5, 1),
	(49, 'Freddo', 0, 3.0, 'freddo-la-ribera', '', '-60.700947678758205', '-31.648984756583726', 'Shopping La Ribera', '', '', '', 'https://www.facebook.com/freddosantafeoficial', 1, 1, 1),
	(50, 'Triferto Peatonal', 0, 3.0, 'triferto-peatonal', 'En la esquina dónde se unen la peatonal San Martín y la Cortada Falucho se encuentra el lugar ideal para las reuniones y almuerzos de la semana, las rondas de café y las tardes de té. Las mesas sobre la peatonal , un amplio salón climatizado y la atención especial del personal hacen de Triferto Peatonal el punto de encuentro de los santafesinos y los turistas que nos visitan.', '-60.70736084051281', '-31.648570811038475', 'San Martín y Cortada Falucho', '0800-555-7070', '', '', 'https://www.facebook.com/triferto.bien.santafesino', 1, 2, 1),
	(51, 'Ágora', 1, 0.0, 'agora', 'El lugar ofrece un ambiente cálido y una carta muy variada, que va desde las tablas tradicionales y otras de pescado o mexicana. Además se ofrece pizzas a platos gourmet, incluyendo también buena variedad de postres.', '-60.71074035000004', '-31.636410109783505', 'Santiago del Estero 3102', '342-4551295', '', '', 'https://www.facebook.com/agorarestobar', 1, 3, 1),
	(52, 'Falucho Bar', 0, 3.0, 'falucho-bar', '', '-60.70744391512072', '-31.648569348319455', 'San Martín 2365 Local 23', '342-4120032 | 342-155475920', '', '', 'https://www.facebook.com/FaluchoBar', 1, 2, 1),
	(53, 'La Pastelería', 0, 3.0, 'la-pasteleria', 'Casa de tortas y té, pastelería 100% artesanal, de calidad y realizada con mucho amor y dedicación. Hacemos tortas por pedidos o para llevar en el momento, vendemos variedad de pastelería. Scons, cuadrados dulces, croissant, muffins, etc. y hacemos servicios de Mesas Dulces.', '-60.70389254999998', '-31.637050959783764', 'San Martín 3376', '342-4553591', '', '', 'https://www.facebook.com/lapasteleria.santafe', 1, 4, 1),
	(54, 'Barrio Latino', 0, 3.0, 'barrio-latino', '', '-60.688038012512955', '-31.637765501903075', 'Castellanos y Avellaneda', '', '', '', 'https://www.facebook.com/barrio.latino.1', 1, 5, 1),
	(55, 'Bowie', 0, 3.0, 'bowie', 'Tragos únicos, buena música, buenos amigos.', '-60.69497822833899', '-31.63845617210768', 'Balcarce y Necochea', '', '', 'http://twitter.com/bowiebar', 'https://www.facebook.com/Bowiebar', 1, 5, 1),
	(56, 'Chopería Santa Fe', 0, 3.0, 'choperia-santa-fe', 'La cerveza, símbolo de la ciudad, vuelve a ser protagonista. Y rindiendo homenaje a las viejas choperias de Santa Fe como fueron La cuevita, ubicada en San Luis y Santiago del Estero, El Pilsen sobre calle San Martín, La Alemana en la esquina de la Rioja y 25 de Mayo o la Modelo en calle Mendoza entre otras, queremos rememorar la historia de la ciudad y sus costumbres.', '-60.70490776611212', '-31.635387008977148', 'Bv. Pellegrini y San Jerónimo', '342-155478384', 'http://www.choperiasantafe.com.ar', '', 'https://www.facebook.com/choperiasantafe', 1, 1, 1),
	(57, 'Patio Cerveceria Santa Fe', 0, 3.0, 'cerveceria-santa-fe', '', '-60.691731900000036', '-31.64297275978603', 'Calchines 1401', '', 'http://www.cervezasantafe.com.ar', '', 'https://www.facebook.com/patiodelacerveceria', 1, 5, 1),
	(58, 'Tostadero Iris', 0, 3.0, 'tostadero-iris-sur', 'En el Tostadero Iris elaboramos artesanalmente 32 variedades que se clasifican en: Puros de Origen, Tostados Naturales y Blends. Cuenta con muchas alternativas para degustar, frías batidos helados de fruta y opciones calientes, café me México, de Panamá, Costa Rica y mucho mas. Excelente opción para visitar!', '-60.70957335000003', '-31.655750109790944', 'San Martín 1707', '', 'http://www.tostaderoiris.com.ar', '', 'https://www.facebook.com/tostaderoiris', 1, 3, 1),
	(59, 'La Boutique del Cocinero', 0, 3.0, 'la-boutique-del-cocinero', 'La Boutique del Cocinero es un lugar para ir a cocinar y comer.', '-60.703987649726514', '-31.64258082785952', 'Hipólito Irigoyen 2443', '342-4563864', '', '', 'https://www.facebook.com/laboutiquedelcocinero', 1, 2, 1),
	(60, 'Manifiesto Umami', 0, 3.0, 'manifiesto-umami', '', '-60.68901195000001', '-31.63760910978397', 'Güemes 3600', '', '', '', 'https://www.facebook.com/manifiesto.umami', 1, 5, 1),
	(61, 'Japo Bar', 0, 3.0, 'japo-bar', '', '-60.70210844999997', '-31.64071430978519', 'Suipacha 2345', '342-4522500', '', '', 'https://www.facebook.com/japo.bar', 1, 4, 1),
	(62, 'El Aljibe', 0, 3.0, 'el-aljibe', '', '-60.711290650000024', '-31.64568895978708', 'Tucumán 2950', '342-4562162', '', '', 'https://www.facebook.com/el.aljibe.54', 1, 3, 1),
	(63, 'Kusturica', 0, 3.0, 'kusturica', 'Un bar inspirado en el séptimo arte. El primer bar temático de cine, inaugurado el 20 de junio de 2003. El nombre hace referencia al cineasta, músico y compositor serbio Emir Kusturica, quien visitara el bar el viernes 13 de abril de 2012 junto a los integrantes de la Non Smoking Orchestra. Con salones espaciosos, ideales para festejos y reuniones y un patio natural envuelto en vegetación de la zona, perfecto para noches de verano.', '-60.70243389999996', '-31.63470590978284', '25º de mayo 3575', '342-4559412', '', '', 'https://www.facebook.com/pages/Kusturica-Bar/135037903314430', 1, 4, 1),
	(64, 'Stanley Rock Bar', 0, 3.0, 'stanley-rock-bar', 'Estamos en el centro de la Recoleta Santafesina, los mejores shows de las mejores bandas de la región pasan por nuestro escenario. Un ambiente cálido y público maravilloso es la caracteristica principal de Stanley.', '-60.70346230000001', '-31.638006909784124', '25º mayo 3301', '342-154874799', '', '', 'https://www.facebook.com/StanleyRockBar', 1, 4, 1),
	(65, 'Christoff Bistró', 0, 3.0, 'christoff-bistro', 'Bar de vinos - Bar de tapas y restaurante - Restaurante de comida rápida', '-60.70308301267619', '-31.636935662569535', '25 de Mayo y Obispo Gelabert', '342-155286777 | 342-154097063', 'http://www.christoffbistro.com.ar', '', 'https://www.facebook.com/espaciochristoff', 1, 4, 1),
	(66, 'Papalote Arte Bar', 0, 3.0, 'papalote-arte-bar', '', '-60.69151844999999', '-31.64230535978579', 'Lavalle 3174', '342-155042318', '', '', 'https://www.facebook.com/Papalote.Bar', 1, 5, 1),
	(67, 'Olmedo Resto', 0, 3.0, 'olmedo-resto', '', '-60.686205950000044', '-31.64032115978501', 'Vélez Sársfield 3398', '342-4121857', '', '', 'https://www.facebook.com/olmedo.resto', 1, 5, 1),
	(68, 'Triferto Recoleta', 0, 3.0, 'triferto-recoleta', '', '-60.70417675039984', '-31.637790985159413', 'San Martín y Santiago del Estero', '0800-555-7070', '', '', 'https://www.facebook.com/triferto.bien.santafesino', 1, 4, 1),
	(69, 'Havanna Peatonal', 0, 3.0, 'havanna-peatonal', '', '-60.7071138', '-31.64755235978781', 'San Martín 2433', '342-4564825', '', 'http://www.twitter.com/Havanna_Arg', 'https://www.facebook.com/havannaargentina', 1, 2, 1),
	(70, 'Pacu Resto', 0, 3.0, 'pacu-resto', '', '-60.701310072517344', '-31.64956798250401', 'Shopping La Ribera', '342-4811414', 'http://www.pacuresto.com.ar', '', 'https://www.facebook.com/pacuresto.santafe', 0, 1, 1);
/*!40000 ALTER TABLE `lugares` ENABLE KEYS */;


-- Volcando estructura para tabla altasalida_db.ocasion
CREATE TABLE IF NOT EXISTS `ocasion` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(50) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla altasalida_db.ocasion: ~7 rows (aproximadamente)
DELETE FROM `ocasion`;
/*!40000 ALTER TABLE `ocasion` DISABLE KEYS */;
INSERT INTO `ocasion` (`id`, `descripcion`) VALUES
	(1, 'Ir con amigos'),
	(2, 'Ir en pareja'),
	(3, 'Ir en familia'),
	(4, 'Reuniones de negocio'),
	(5, 'Tomar buenos tragos'),
	(6, 'After office'),
	(7, 'Tomar el mejor café'),
	(8, 'Noche romántica');
/*!40000 ALTER TABLE `ocasion` ENABLE KEYS */;


-- Volcando estructura para tabla altasalida_db.profiles
CREATE TABLE IF NOT EXISTS `profiles` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) unsigned NOT NULL DEFAULT '0',
  `username` varchar(50) NOT NULL DEFAULT '0',
  `uid` bigint(20) NOT NULL DEFAULT '0',
  `access_token` varchar(50) NOT NULL DEFAULT '0',
  `access_token_secret` varchar(50) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `profile_user` (`user_id`),
  CONSTRAINT `profile_user` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla altasalida_db.profiles: ~0 rows (aproximadamente)
DELETE FROM `profiles`;
/*!40000 ALTER TABLE `profiles` DISABLE KEYS */;
INSERT INTO `profiles` (`id`, `user_id`, `username`, `uid`, `access_token`, `access_token_secret`) VALUES
	(13, 10, 'arielmbenz', 100001785373137, 'CAAEBg3ZB4d0QBAGFHVffjcyjloXK3La7GgZBg5AmWRLOSrK06', '0'),
	(14, 11, 'ariel.matias.3154', 100007766564249, 'CAAEBg3ZB4d0QBAP0JM9K4m6j3xYgf3WAZA7LGt28yxq3h4Qfw', '0');
/*!40000 ALTER TABLE `profiles` ENABLE KEYS */;


-- Volcando estructura para tabla altasalida_db.reviews
CREATE TABLE IF NOT EXISTS `reviews` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) unsigned NOT NULL,
  `lugar_id` int(11) unsigned NOT NULL,
  `rating` int(11) unsigned NOT NULL,
  `approved` tinyint(3) unsigned NOT NULL DEFAULT '1',
  `spam` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `review_user` (`user_id`),
  KEY `review_lugar` (`lugar_id`),
  CONSTRAINT `review_lugar` FOREIGN KEY (`lugar_id`) REFERENCES `lugares` (`id`),
  CONSTRAINT `review_user` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla altasalida_db.reviews: ~4 rows (aproximadamente)
DELETE FROM `reviews`;
/*!40000 ALTER TABLE `reviews` DISABLE KEYS */;
INSERT INTO `reviews` (`id`, `user_id`, `lugar_id`, `rating`, `approved`, `spam`, `created_at`, `updated_at`) VALUES
	(10, 10, 22, 4, 1, 0, '2014-06-08 00:52:06', '2014-06-08 02:53:51');
/*!40000 ALTER TABLE `reviews` ENABLE KEYS */;


-- Volcando estructura para tabla altasalida_db.reviews_ocasion
CREATE TABLE IF NOT EXISTS `reviews_ocasion` (
  `review_id` int(11) unsigned NOT NULL DEFAULT '0',
  `ocasion_id` int(11) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`review_id`,`ocasion_id`),
  KEY `id_ocasion` (`ocasion_id`),
  CONSTRAINT `id_ocasion` FOREIGN KEY (`ocasion_id`) REFERENCES `ocasion` (`id`),
  CONSTRAINT `id_review` FOREIGN KEY (`review_id`) REFERENCES `reviews` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla altasalida_db.reviews_ocasion: ~8 rows (aproximadamente)
DELETE FROM `reviews_ocasion`;
/*!40000 ALTER TABLE `reviews_ocasion` DISABLE KEYS */;
INSERT INTO `reviews_ocasion` (`review_id`, `ocasion_id`) VALUES
	(10, 1),
	(10, 2),
	(10, 5),
	(10, 8);
/*!40000 ALTER TABLE `reviews_ocasion` ENABLE KEYS */;


-- Volcando estructura para tabla altasalida_db.tipos_fotos
CREATE TABLE IF NOT EXISTS `tipos_fotos` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(50) NOT NULL DEFAULT '0',
  `size` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla altasalida_db.tipos_fotos: ~0 rows (aproximadamente)
DELETE FROM `tipos_fotos`;
/*!40000 ALTER TABLE `tipos_fotos` DISABLE KEYS */;
INSERT INTO `tipos_fotos` (`id`, `descripcion`, `size`) VALUES
	(1, 'thumb', '200x125');
/*!40000 ALTER TABLE `tipos_fotos` ENABLE KEYS */;


-- Volcando estructura para tabla altasalida_db.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `email` varchar(50) NOT NULL DEFAULT '0',
  `photo` varchar(100) DEFAULT NULL,
  `name` varchar(50) DEFAULT NULL,
  `password` varchar(100) NOT NULL,
  `type` tinyint(1) unsigned NOT NULL,
  `username` varchar(20) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla altasalida_db.users: ~2 rows (aproximadamente)
DELETE FROM `users`;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`id`, `email`, `photo`, `name`, `password`, `type`, `username`) VALUES
	(2, 'altasalida@gmail.com', NULL, NULL, '$2y$08$0bhU3iUblV6xmrQsPDooxOC6FhiyL1F.7COc1OcL6yNn4Jt98vKGm', 2, 'altodash'),
	(10, 'arielmbenz@gmail.com', 'https://graph.facebook.com/arielmbenz/picture?type', 'Ariel Benz', '', 0, ''),
	(11, 'arielbenz@outlook.com', 'https://graph.facebook.com/ariel.matias.3154/picture?type', 'Ariel Matias', '', 0, '');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;


-- Volcando estructura para tabla altasalida_db.zonas
CREATE TABLE IF NOT EXISTS `zonas` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla altasalida_db.zonas: ~5 rows (aproximadamente)
DELETE FROM `zonas`;
/*!40000 ALTER TABLE `zonas` DISABLE KEYS */;
INSERT INTO `zonas` (`id`, `descripcion`) VALUES
	(1, 'Norte'),
	(2, 'Centro'),
	(3, 'Sur'),
	(4, 'Recoleta'),
	(5, 'Candioti'),
	(6, 'Costanera');
/*!40000 ALTER TABLE `zonas` ENABLE KEYS */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
