-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 24-10-2017 a las 22:04:39
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
-- Estructura de tabla para la tabla `categoria`
--

CREATE TABLE IF NOT EXISTS `categoria` (
  `idCategoria` int(11) NOT NULL,
  `nombreCategoria` varchar(30) NOT NULL,
  PRIMARY KEY (`idCategoria`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcar la base de datos para la tabla `categoria`
--


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comprador`
--

CREATE TABLE IF NOT EXISTS `comprador` (
  `dniComprador` int(11) NOT NULL,
  `apellido` varchar(30) NOT NULL,
  `nombre` varchar(30) NOT NULL,
  PRIMARY KEY (`dniComprador`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcar la base de datos para la tabla `comprador`
--


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle`
--

CREATE TABLE IF NOT EXISTS `detalle` (
  `codigoVenta` int(11) NOT NULL,
  `idProducto` int(11) NOT NULL,
  `dniComprador` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL,
  PRIMARY KEY (`codigoVenta`),
  KEY `idProducto` (`idProducto`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcar la base de datos para la tabla `detalle`
--


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE IF NOT EXISTS `productos` (
  `idProducto` int(11) NOT NULL,
  `nombre` varchar(30) NOT NULL,
  `precio` double NOT NULL,
  `descripcion` varchar(30) NOT NULL,
  `idCategoria` int(11) NOT NULL,
  PRIMARY KEY (`idProducto`),
  KEY `idCategoria` (`idCategoria`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcar la base de datos para la tabla `productos`
--


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `venta`
--

CREATE TABLE IF NOT EXISTS `venta` (
  `codigoVenta` int(11) NOT NULL,
  `dniComprador` int(11) NOT NULL,
  `idProducto` int(11) NOT NULL,
  `nombre` varchar(30) NOT NULL,
  `apellido` varchar(30) NOT NULL,
  PRIMARY KEY (`codigoVenta`),
  KEY `idProducto` (`idProducto`),
  KEY `dniComprador` (`dniComprador`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcar la base de datos para la tabla `venta`
--


--
-- Filtros para las tablas descargadas (dump)
--

--
-- Filtros para la tabla `detalle`
--
ALTER TABLE `detalle`
  ADD CONSTRAINT `detalle_ibfk_1` FOREIGN KEY (`idProducto`) REFERENCES `productos` (`idProducto`);

--
-- Filtros para la tabla `productos`
--
ALTER TABLE `productos`
  ADD CONSTRAINT `productos_ibfk_1` FOREIGN KEY (`idCategoria`) REFERENCES `categoria` (`idCategoria`);

--
-- Filtros para la tabla `venta`
--
ALTER TABLE `venta`
  ADD CONSTRAINT `venta_ibfk_2` FOREIGN KEY (`dniComprador`) REFERENCES `comprador` (`dniComprador`),
  ADD CONSTRAINT `venta_ibfk_1` FOREIGN KEY (`idProducto`) REFERENCES `productos` (`idProducto`);
