-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 04-01-2013 a las 22:26:34
-- Versión del servidor: 5.5.24-log
-- Versión de PHP: 5.4.3

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `futbolazo`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE IF NOT EXISTS `categorias` (
  `Categoria` char(1) NOT NULL,
  `Fixture` text NOT NULL,
  UNIQUE KEY `Categoria` (`Categoria`),
  UNIQUE KEY `Categoria_2` (`Categoria`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`Categoria`, `Fixture`) VALUES
('A', ''),
('B', ''),
('C', ''),
('D', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `equipo`
--

CREATE TABLE IF NOT EXISTS `equipo` (
  `Nombre` varchar(60) NOT NULL,
  `Categoria` char(1) NOT NULL,
  `Mail` text NOT NULL,
  `Partidos Ganados` int(11) NOT NULL DEFAULT '0',
  `Partidos Perdidos` int(11) NOT NULL DEFAULT '0',
  `Empates` int(11) NOT NULL DEFAULT '0',
  `Goles Metidos` int(11) NOT NULL DEFAULT '0',
  `Goles Recibidos` int(11) NOT NULL DEFAULT '0',
  `Faltas` int(11) NOT NULL DEFAULT '0',
  UNIQUE KEY `Nombre` (`Nombre`),
  UNIQUE KEY `Nombre_2` (`Nombre`),
  KEY `Categoria` (`Categoria`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `equipo`
--

INSERT INTO `equipo` (`Nombre`, `Categoria`, `Mail`, `Partidos Ganados`, `Partidos Perdidos`, `Empates`, `Goles Metidos`, `Goles Recibidos`, `Faltas`) VALUES
('Agachate y reseteala', 'C', 'aga@a.com', 0, 0, 0, 0, 0, 0),
('Bola de fuego empantanada', 'D', 'gino.scarpino@gmail.com', 0, 0, 0, 0, 0, 0),
('Chinga tu madre', 'A', 'cdsadas@lalal.com', 0, 0, 0, 0, 0, 0),
('Kurepí', 'A', 'k@a.com.ar', 0, 0, 0, 0, 0, 0),
('Paleoequipo', 'D', 'pala@pala.com.ar', 0, 0, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `goleadores`
--

CREATE TABLE IF NOT EXISTS `goleadores` (
  `Categoria` varchar(1) NOT NULL,
  `Nombre` text NOT NULL,
  `Cantidad` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `goleadores`
--

INSERT INTO `goleadores` (`Categoria`, `Nombre`, `Cantidad`) VALUES
('A', 'Ezequiel Castellano', 3),
('A', 'Gino Scarpino', 7),
('C', 'Bruno Renzo', 3),
('A', 'Ezequiel Castellano', 3),
('A', 'Gino Scarpino', 7),
('C', 'Bruno Renzo', 3),
('A', 'Ezequiel Castellano', 3),
('A', 'Gino Scarpino', 7),
('C', 'Bruno Renzo', 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `jugadores`
--

CREATE TABLE IF NOT EXISTS `jugadores` (
  `Nombre` text NOT NULL,
  `DNI` int(11) NOT NULL,
  `Equipo` varchar(60) NOT NULL,
  `Goles` int(11) NOT NULL DEFAULT '0',
  `Amarillas` int(11) NOT NULL DEFAULT '0',
  `Expulsiones1` int(11) NOT NULL DEFAULT '0',
  `Expulsiones2` int(11) NOT NULL DEFAULT '0',
  UNIQUE KEY `DNI` (`DNI`),
  KEY `Equipo` (`Equipo`),
  KEY `Equipo_2` (`Equipo`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `jugadores`
--

INSERT INTO `jugadores` (`Nombre`, `DNI`, `Equipo`, `Goles`, `Amarillas`, `Expulsiones1`, `Expulsiones2`) VALUES
('Gino Scarpino', 34229571, 'Bola de fuego empantanada', 0, 0, 0, 0),
('Matias Barbeito', 34229572, 'Bola de fuego empantanada', 0, 0, 0, 0),
('Bruno Scarpino', 38888888, 'Chinga tu madre', 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `noticias`
--

CREATE TABLE IF NOT EXISTS `noticias` (
  `Fecha` date NOT NULL,
  `Texto` text NOT NULL,
  `Autor` varchar(60) NOT NULL,
  KEY `Autor` (`Autor`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `noticias`
--

INSERT INTO `noticias` (`Fecha`, `Texto`, `Autor`) VALUES
('2012-12-06', 'se actualizo el fixture', 'eze'),
('2012-12-02', 'Velez campeon!', 'gino'),
('2012-12-06', 'se actualizo el fixture', 'eze'),
('2012-12-02', 'Velez campeon!', 'gino');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `partido`
--

CREATE TABLE IF NOT EXISTS `partido` (
  `Numero` int(11) NOT NULL,
  `Equipo1` text NOT NULL,
  `Equipo2` text NOT NULL,
  `GolesEq1` int(11) NOT NULL,
  `GolesEq2` int(11) NOT NULL,
  `Goleadores` text NOT NULL,
  `Amarillas` text NOT NULL,
  `Expulsiones1` text NOT NULL,
  `Expulsiones2` text NOT NULL,
  `Fecha` date NOT NULL,
  `Comentario` text NOT NULL,
  UNIQUE KEY `Fecha` (`Fecha`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `torneo`
--

CREATE TABLE IF NOT EXISTS `torneo` (
  `Fecha` date NOT NULL,
  `Estado` text NOT NULL,
  `Categorias` text NOT NULL,
  `Ganadores` text NOT NULL,
  UNIQUE KEY `Fecha` (`Fecha`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE IF NOT EXISTS `usuarios` (
  `Nombre` varchar(60) NOT NULL,
  `Password` text NOT NULL,
  `Mail` text NOT NULL,
  UNIQUE KEY `Nombre` (`Nombre`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`Nombre`, `Password`, `Mail`) VALUES
('eze', 'lala', 'ezequiel.castellano@gmail.com'),
('gino', '$6$rounds=5000$a1b2c3d4e5f6g7h8$CS0P4eusedVP6.JZXMHmZ15tbgwwxc4yu2ZqJyNjI.fbkZPtoNm95KpJac5/UrqB4rdjZVAtOhCsOxUK.N56v1', 'gino.scarpino@gmail.com'),
('negro', 'imperial', 'elfutbolazo@yahoo.com.ar');

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `equipo`
--
ALTER TABLE `equipo`
  ADD CONSTRAINT `equipo_ibfk_1` FOREIGN KEY (`Categoria`) REFERENCES `categorias` (`Categoria`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `jugadores`
--
ALTER TABLE `jugadores`
  ADD CONSTRAINT `jugadores_ibfk_1` FOREIGN KEY (`Equipo`) REFERENCES `equipo` (`Nombre`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `noticias`
--
ALTER TABLE `noticias`
  ADD CONSTRAINT `noticias_ibfk_1` FOREIGN KEY (`Autor`) REFERENCES `usuarios` (`Nombre`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
