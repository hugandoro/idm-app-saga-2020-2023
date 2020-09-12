-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 12-09-2020 a las 21:22:44
-- Versión del servidor: 5.7.26
-- Versión de PHP: 5.6.40

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `idm_saga_radicador`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `area`
--

DROP TABLE IF EXISTS `area`;
CREATE TABLE IF NOT EXISTS `area` (
  `areacodigo` int(11) NOT NULL,
  `areanombre` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`areacodigo`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `documentacion`
--

DROP TABLE IF EXISTS `documentacion`;
CREATE TABLE IF NOT EXISTS `documentacion` (
  `documentacioncodigo` int(11) NOT NULL,
  `documentacionnombre` varchar(200) NOT NULL,
  `documentacionlimite` varchar(10) NOT NULL,
  PRIMARY KEY (`documentacioncodigo`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `funcionarios`
--

DROP TABLE IF EXISTS `funcionarios`;
CREATE TABLE IF NOT EXISTS `funcionarios` (
  `funcionarioscodigo` int(11) NOT NULL,
  `funcionariosnombre` varchar(100) DEFAULT NULL,
  `funcionariosemail` varchar(45) DEFAULT NULL,
  `funcionarioestado` varchar(50) NOT NULL DEFAULT '1',
  PRIMARY KEY (`funcionarioscodigo`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `radicador`
--

DROP TABLE IF EXISTS `radicador`;
CREATE TABLE IF NOT EXISTS `radicador` (
  `radicadorcodigo` bigint(20) NOT NULL AUTO_INCREMENT,
  `radicadorfecharadicado` date NOT NULL,
  `radicadormedioradicado` varchar(300) DEFAULT NULL,
  `radicadorsn` varchar(100) NOT NULL,
  `radicadorpeticionario` varchar(100) NOT NULL,
  `radicadoridentificacion` bigint(20) NOT NULL,
  `radicadortelefono` varchar(45) DEFAULT NULL,
  `radicadorcelular` varchar(45) DEFAULT NULL,
  `radicadoremail` varchar(45) DEFAULT NULL,
  `radicadordireccion` varchar(300) DEFAULT NULL,
  `radicadorciudad` varchar(45) DEFAULT NULL,
  `radicadorobjeto` longtext NOT NULL,
  `radicadorfecharespuesta` date NOT NULL DEFAULT '0000-00-00',
  `radicadormediorespuesta` varchar(300) DEFAULT NULL,
  `radicadorrespuesta` varchar(200) DEFAULT NULL,
  `documentacion_documentacioncodigo` int(11) NOT NULL,
  `area_areacodigo` int(11) NOT NULL,
  `funcionarios_funcionarioscodigo` int(11) NOT NULL,
  `radicadordiasvencimiento` date NOT NULL,
  `radicadoroficiorespuesta` varchar(300) DEFAULT NULL,
  PRIMARY KEY (`radicadorcodigo`),
  KEY `fk_radicador_documentacion_idx` (`documentacion_documentacioncodigo`),
  KEY `fk_radicador_area1_idx` (`area_areacodigo`),
  KEY `fk_radicador_funcionarios1_idx` (`funcionarios_funcionarioscodigo`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `radicador`
--
ALTER TABLE `radicador`
  ADD CONSTRAINT `fk_radicador_area1` FOREIGN KEY (`area_areacodigo`) REFERENCES `area` (`areacodigo`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_radicador_documentacion` FOREIGN KEY (`documentacion_documentacioncodigo`) REFERENCES `documentacion` (`documentacioncodigo`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_radicador_funcionarios1` FOREIGN KEY (`funcionarios_funcionarioscodigo`) REFERENCES `funcionarios` (`funcionarioscodigo`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
