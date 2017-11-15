-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 15-11-2017 a las 00:07:29
-- Versión del servidor: 5.1.53
-- Versión de PHP: 5.3.4

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `comercio_db`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comprador`
--

CREATE TABLE IF NOT EXISTS `comprador` (
  `apellido` varchar(255) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `dni` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `domicilio` varchar(255) NOT NULL,
  PRIMARY KEY (`dni`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcar la base de datos para la tabla `comprador`
--

INSERT INTO `comprador` (`apellido`, `nombre`, `dni`, `email`, `domicilio`) VALUES
('ste', 'a', 123, 'ste@asd.com', 'asd 14');
