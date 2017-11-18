-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 17-11-2017 a las 22:30:25
-- Versión del servidor: 5.5.24-log
-- Versión de PHP: 5.4.3

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


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
-- Volcado de datos para la tabla `comprador`
--

INSERT INTO `comprador` (`apellido`, `nombre`, `dni`, `email`, `domicilio`) VALUES
('', '', 0, '', ''),
('lopez', 'carlos', 1, 's@nose.com', 'lopez 120'),
('a', 'sa', 4, 'asd@g.cm', 'ads 24'),
('asd', 'adsads', 8, 'asddas@asd.com', 'sad123'),
('a', 'a', 10, 'sada@dsa.com', 'saddas 23'),
('sad', 'asd', 100, 'aas@fds.com', 'asd 223'),
('a', 'a', 200, 'asddas@asd.com', 'asddas13s'),
('a', 'a', 300, 'sdsa@fm.com', 'asd 32'),
('s', 'asd', 232141, 'adssa@dsa.com', 'asdds 434'),
('s', 'a', 213213213, 'adssa@dsa.com', 'asda 123');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `compras`
--

CREATE TABLE IF NOT EXISTS `compras` (
  `numeroCompra` int(11) NOT NULL AUTO_INCREMENT,
  `fecha` date NOT NULL,
  `codigo` int(11) NOT NULL,
  `dni` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `domicilioCompra` int(11) NOT NULL,
  PRIMARY KEY (`numeroCompra`),
  KEY `FK_codigo` (`codigo`),
  KEY `FK_dni` (`dni`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=34 ;

--
-- Volcado de datos para la tabla `compras`
--

INSERT INTO `compras` (`numeroCompra`, `fecha`, `codigo`, `dni`, `cantidad`, `domicilioCompra`) VALUES
(10, '2017-11-17', 1, 1, 1, 0),
(11, '2017-11-17', 1, 1, 1, 0),
(12, '2017-11-17', 1, 1, 1, 0),
(13, '2017-11-17', 1, 1, 1, 0),
(14, '2017-11-17', 1, 1, 1, 0),
(15, '2017-11-17', 1, 1, 1, 0),
(16, '2017-11-17', 1, 1, 1, 0),
(21, '2017-11-17', 2, 1, 2, 0),
(22, '2017-11-17', 2, 1, 2, 0),
(24, '2017-11-17', 3, 232141, 4, 0),
(25, '2017-11-17', 1, 4, 5, 0),
(26, '2017-11-17', 1, 1, 1, 0),
(27, '2017-11-17', 2, 8, 4, 0),
(28, '2017-11-17', 2, 0, 4, 0),
(29, '2017-11-17', 1, 10, 1, 0),
(30, '2017-11-17', 1, 100, 4, 0),
(31, '2017-11-17', 2, 200, 3, 0),
(32, '2017-11-17', 2, 200, 1, 0),
(33, '2017-11-17', 1, 300, 7, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE IF NOT EXISTS `productos` (
  `codigo` int(11) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `precio` double NOT NULL,
  `descripcion` varchar(255) NOT NULL,
  `categoria` varchar(255) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `imagen` varchar(255) NOT NULL,
  PRIMARY KEY (`codigo`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`codigo`, `nombre`, `precio`, `descripcion`, `categoria`, `cantidad`, `imagen`) VALUES
(1, 'bolsa', 15, '10 unidades', 'descartables', 895, 'bolsaResiduos'),
(2, 'Bolsa de tela', 15, '1 unidad', 'reusables', -5, 'https://http2.mlstatic.com/D_Q_NP_271515-MLA25257749957_012017-X.jpg'),
(3, 'Servilletas', 60, '80 unidades x 3', 'descartables', -25, 'servilletas');

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `compras`
--
ALTER TABLE `compras`
  ADD CONSTRAINT `FK_codigo` FOREIGN KEY (`codigo`) REFERENCES `productos` (`codigo`),
  ADD CONSTRAINT `FK_dni` FOREIGN KEY (`dni`) REFERENCES `comprador` (`dni`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
