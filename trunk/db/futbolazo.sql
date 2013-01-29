-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 29-01-2013 a las 06:19:45
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
  UNIQUE KEY `Categoria` (`Categoria`),
  UNIQUE KEY `Categoria_2` (`Categoria`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`Categoria`) VALUES
('0'),
('A'),
('B'),
('C'),
('D');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `equipo`
--

CREATE TABLE IF NOT EXISTS `equipo` (
  `Nombre` varchar(60) NOT NULL,
  `Categoria` char(1) NOT NULL,
  `Mail` text NOT NULL,
  `PartidosGanadosActuales` int(11) NOT NULL DEFAULT '0',
  `PartidosPerdidosActuales` int(11) NOT NULL DEFAULT '0',
  `EmpatesActuales` int(11) NOT NULL DEFAULT '0',
  `GolesConvertidosActuales` int(11) NOT NULL DEFAULT '0',
  `GolesRecibidosActuales` int(11) NOT NULL DEFAULT '0',
  `AmarillasActuales` int(11) NOT NULL DEFAULT '0',
  `Expulsiones1Actuales` int(11) NOT NULL DEFAULT '0',
  `Expulsiones2Actuales` int(11) NOT NULL DEFAULT '0',
  `PartidosGanados` int(11) NOT NULL DEFAULT '0',
  `PartidosPerdidos` int(11) NOT NULL DEFAULT '0',
  `Empates` int(11) NOT NULL DEFAULT '0',
  `GolesConvertidos` int(11) NOT NULL DEFAULT '0',
  `GolesRecibidos` int(11) NOT NULL DEFAULT '0',
  `Amarillas` int(11) NOT NULL DEFAULT '0',
  `Expulsiones1` int(11) NOT NULL DEFAULT '0',
  `Expulsiones2` int(11) NOT NULL DEFAULT '0',
  `Historial` text NOT NULL,
  `Creacion` date NOT NULL,
  `Estado` varchar(10) NOT NULL DEFAULT 'Inactivo',
  UNIQUE KEY `Nombre` (`Nombre`),
  UNIQUE KEY `Nombre_2` (`Nombre`),
  KEY `Categoria` (`Categoria`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `equipo`
--

INSERT INTO `equipo` (`Nombre`, `Categoria`, `Mail`, `PartidosGanadosActuales`, `PartidosPerdidosActuales`, `EmpatesActuales`, `GolesConvertidosActuales`, `GolesRecibidosActuales`, `AmarillasActuales`, `Expulsiones1Actuales`, `Expulsiones2Actuales`, `PartidosGanados`, `PartidosPerdidos`, `Empates`, `GolesConvertidos`, `GolesRecibidos`, `Amarillas`, `Expulsiones1`, `Expulsiones2`, `Historial`, `Creacion`, `Estado`) VALUES
('Agachate y reseteala', 'C', 'aga@a.com', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '0000-00-00', 'Inactivo'),
('Bola de fuego empantanada', 'D', 'gino.scarpino@gmail.com', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '2010-07-01', 'Inactivo'),
('Chinga tu madre', 'A', 'cdsadas@lalal.com', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '0000-00-00', 'Inactivo'),
('Kurepí', 'A', 'k@a.com.ar', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '0000-00-00', 'Inactivo'),
('Las Cortaduras de BB King', 'D', 'aga@a.com', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '0000-00-00', 'Inactivo'),
('Los Amigos de Ramachandran', 'D', 'las@amigas.com', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '0000-00-00', 'Inactivo'),
('Paleoequipo', 'D', 'pala@pala.com.ar', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '0000-00-00', 'Inactivo'),
('[SIN EQUIPO]', '0', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '0000-00-00', 'Inactivo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estadopartido`
--

CREATE TABLE IF NOT EXISTS `estadopartido` (
  `Estado` varchar(60) NOT NULL,
  UNIQUE KEY `Estado` (`Estado`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `estadopartido`
--

INSERT INTO `estadopartido` (`Estado`) VALUES
('Cancelado'),
('Finalizado'),
('Programado'),
('Suspendido');

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
  `GolesActuales` int(11) NOT NULL DEFAULT '0',
  `AmarillasActuales` int(11) NOT NULL DEFAULT '0',
  `Expulsiones1Actuales` int(11) NOT NULL DEFAULT '0',
  `Expulsiones2Actuales` int(11) NOT NULL DEFAULT '0',
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

INSERT INTO `jugadores` (`Nombre`, `DNI`, `Equipo`, `GolesActuales`, `AmarillasActuales`, `Expulsiones1Actuales`, `Expulsiones2Actuales`, `Goles`, `Amarillas`, `Expulsiones1`, `Expulsiones2`) VALUES
('Felipe Bonet', 111, '[SIN EQUIPO]', 0, 0, 0, 0, 0, 0, 0, 0),
('Leando Iannotti', 2322, 'Bola de fuego empantanada', 0, 0, 0, 0, 8, 4, 0, 0),
('Marcelo Ferranti', 72727, 'Bola de fuego empantanada', 0, 0, 0, 0, 0, 0, 0, 0),
('Gino Scarpino', 34229571, 'Bola de fuego empantanada', 0, 0, 0, 0, 1, 1, 1, 1),
('Ezequiel Castellano', 34229572, '[SIN EQUIPO]', 0, 0, 0, 0, 0, 0, 8, 5);

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
  `Numero` int(11) NOT NULL AUTO_INCREMENT,
  `Equipo1` text NOT NULL,
  `Equipo2` text NOT NULL,
  `GolesEq1` int(11) NOT NULL,
  `GolesEq2` int(11) NOT NULL,
  `Goleadores` text NOT NULL,
  `Amarillas` text NOT NULL,
  `Expulsiones1` text NOT NULL,
  `Expulsiones2` text NOT NULL,
  `Fecha` date NOT NULL,
  `Hora` time NOT NULL,
  `Comentario` text NOT NULL,
  `Estado` varchar(60) NOT NULL,
  UNIQUE KEY `Fecha` (`Fecha`),
  UNIQUE KEY `Numero` (`Numero`),
  KEY `Estado` (`Estado`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `partido`
--

INSERT INTO `partido` (`Numero`, `Equipo1`, `Equipo2`, `GolesEq1`, `GolesEq2`, `Goleadores`, `Amarillas`, `Expulsiones1`, `Expulsiones2`, `Fecha`, `Hora`, `Comentario`, `Estado`) VALUES
(1, 'Chinga tu madre', 'Kurepí', 0, 0, '', '', '', '', '2013-01-19', '00:00:00', '', 'Programado');

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
('eze', '$6$rounds=5000$a1b2c3d4e5f6g7h8$bU3Nd6PUS3yoYnXtI.3dT1rrCO1yPcqT.zCm24xG7cmW53.9NetxC2lTw7DyT35xEyTn265Qen7MBTe4ufSsq0', 'ezequiel.castellano@gmail.com'),
('gino', '$6$rounds=5000$a1b2c3d4e5f6g7h8$CS0P4eusedVP6.JZXMHmZ15tbgwwxc4yu2ZqJyNjI.fbkZPtoNm95KpJac5/UrqB4rdjZVAtOhCsOxUK.N56v1', 'gino.scarpino@gmail.com'),
('negro', '$6$rounds=5000$a1b2c3d4e5f6g7h8$7mnwE7fpct9BVfDbkhZscZ1CDdSWcHQQ.JpCmeCxYCemBORo4wNShb3E0ghUnK7QTW6ZRrB9s0c48oH5Mpky9.', 'elfutbolazo@yahoo.com.ar');

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

--
-- Filtros para la tabla `partido`
--
ALTER TABLE `partido`
  ADD CONSTRAINT `partido_ibfk_1` FOREIGN KEY (`Estado`) REFERENCES `estadopartido` (`Estado`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
