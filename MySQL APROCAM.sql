-- --------------------------------------------------------
-- Host:                         192.168.1.102
-- Versión del servidor:         5.5.27 - MySQL Community Server (GPL)
-- SO del servidor:              Win32
-- HeidiSQL Versión:             8.3.0.4765
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Volcando estructura de base de datos para aprocam
CREATE DATABASE IF NOT EXISTS `aprocam` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `aprocam`;


-- Volcando estructura para tabla aprocam.actividades
CREATE TABLE IF NOT EXISTS `actividades` (
  `id` int(11) NOT NULL,
  `detalle` varchar(180) NOT NULL,
  `incluye` varchar(500) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Nomenclador de actividades de la AFIP';

-- La exportación de datos fue deseleccionada.


-- Volcando estructura para tabla aprocam.control
CREATE TABLE IF NOT EXISTS `control` (
  `expediente` decimal(10,0) unsigned NOT NULL,
  `nombre` varchar(80) NOT NULL,
  `cuit` decimal(12,0) unsigned NOT NULL,
  `dominio` varchar(6) NOT NULL,
  `tipo` varchar(20) NOT NULL,
  `fecha` date NOT NULL,
  `lote` decimal(10,0) NOT NULL,
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `certificado` date NOT NULL,
  `entregado` char(10) NOT NULL,
  `rechazo` text NOT NULL,
  `envio` date NOT NULL,
  `obs` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- La exportación de datos fue deseleccionada.


-- Volcando estructura para tabla aprocam.empresas
CREATE TABLE IF NOT EXISTS `empresas` (
  `socio` decimal(8,0) unsigned NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `cuit` decimal(12,0) unsigned NOT NULL,
  `fecha` date NOT NULL,
  `calle` varchar(50) DEFAULT NULL,
  `numero` varchar(8) DEFAULT NULL,
  `piso` varchar(3) DEFAULT NULL,
  `depto` varchar(3) DEFAULT NULL,
  `provincia` varchar(50) DEFAULT NULL,
  `localidad` varchar(50) DEFAULT NULL,
  `telefono` varchar(30) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`cuit`),
  UNIQUE KEY `socio` (`socio`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- La exportación de datos fue deseleccionada.


-- Volcando estructura para tabla aprocam.liquidacion
CREATE TABLE IF NOT EXISTS `liquidacion` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `liquidacion` decimal(10,0) unsigned NOT NULL,
  `alta` decimal(12,0) unsigned NOT NULL,
  `revalida` decimal(12,0) unsigned NOT NULL,
  `fecha` date NOT NULL,
  `obs` varchar(500) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- La exportación de datos fue deseleccionada.


-- Volcando estructura para tabla aprocam.lista_expdientes
CREATE TABLE IF NOT EXISTS `lista_expdientes` (
  `expediente` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `cuit` decimal(12,0) unsigned NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `cerrado` char(2) NOT NULL,
  `formularios` varchar(50) NOT NULL,
  `lote` int(11) NOT NULL,
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `empresa` decimal(10,0) unsigned NOT NULL DEFAULT '0',
  `alta` decimal(10,0) unsigned NOT NULL DEFAULT '0',
  `baja` decimal(10,0) unsigned NOT NULL DEFAULT '0',
  `modif` decimal(10,0) unsigned NOT NULL DEFAULT '0',
  `reimpre` decimal(10,0) unsigned NOT NULL DEFAULT '0',
  `revalida` decimal(10,0) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- La exportación de datos fue deseleccionada.


-- Volcando estructura para tabla aprocam.rechazos
CREATE TABLE IF NOT EXISTS `rechazos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `estado` char(15) NOT NULL,
  `centro` int(11) NOT NULL,
  `expediente` int(11) NOT NULL,
  `tipo` char(5) NOT NULL,
  `procesado` date NOT NULL,
  `obs` varchar(250) NOT NULL,
  `cuit` decimal(12,0) unsigned NOT NULL,
  `razon` char(80) NOT NULL,
  `fecha` date NOT NULL,
  `usuario` char(10) NOT NULL,
  `devuelto` date NOT NULL,
  `lote` char(10) NOT NULL,
  `planilla` date NOT NULL,
  `envio` date NOT NULL,
  `info` varchar(500) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- La exportación de datos fue deseleccionada.


-- Volcando estructura para tabla aprocam.ruta
CREATE TABLE IF NOT EXISTS `ruta` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `centro` int(5) unsigned NOT NULL,
  `expediente` int(10) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `cuit` decimal(12,0) unsigned NOT NULL,
  `dominio` varchar(6) NOT NULL,
  `fecha` date NOT NULL,
  `tarj` varchar(3) NOT NULL,
  `lote` int(10) NOT NULL,
  `entrega` varchar(3) NOT NULL,
  `fecha_entr` date NOT NULL,
  `nrotarjeta` char(16) NOT NULL,
  `tipo` char(1) NOT NULL,
  `recibo` int(11) NOT NULL,
  `nro_recibo` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- La exportación de datos fue deseleccionada.


-- Volcando estructura para tabla aprocam.sin_sistema
CREATE TABLE IF NOT EXISTS `sin_sistema` (
  `expediente` int(10) unsigned NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `cuit` decimal(12,0) unsigned NOT NULL,
  `dominio` varchar(6) NOT NULL,
  `tipo` varchar(20) NOT NULL,
  `fecha` date NOT NULL,
  `lote` int(10) NOT NULL,
  `rechazo` text NOT NULL,
  `certificado` date NOT NULL,
  `entregado` varchar(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- La exportación de datos fue deseleccionada.


-- Volcando estructura para tabla aprocam.temporal
CREATE TABLE IF NOT EXISTS `temporal` (
  `expediente` decimal(10,0) unsigned NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `cuit` decimal(12,0) unsigned NOT NULL,
  `dominio` varchar(6) NOT NULL,
  `tipo` varchar(20) NOT NULL,
  `fecha` date NOT NULL,
  `lote` decimal(10,0) NOT NULL,
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `certificado` date NOT NULL,
  `entregado` char(10) NOT NULL,
  `rechazo` text NOT NULL,
  `envio` date NOT NULL,
  `obs` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- La exportación de datos fue deseleccionada.


-- Volcando estructura para tabla aprocam.tipo_tramite
CREATE TABLE IF NOT EXISTS `tipo_tramite` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tipo` char(10) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- La exportación de datos fue deseleccionada.


-- Volcando estructura para tabla aprocam.turnos
CREATE TABLE IF NOT EXISTS `turnos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `razon` varchar(50) NOT NULL,
  `fecha` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- La exportación de datos fue deseleccionada.


-- Volcando estructura para tabla aprocam.unidades
CREATE TABLE IF NOT EXISTS `unidades` (
  `cuit` decimal(12,0) unsigned NOT NULL,
  `dominio` char(6) NOT NULL,
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fecha` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- La exportación de datos fue deseleccionada.
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
