-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 12-02-2013 a las 08:08:09
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
('Asta la V', 'D', 'sin@email.com', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '2013-02-12', 'Inactivo'),
('Blues', 'B', 'sin@email.com', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '2013-02-12', 'Inactivo'),
('Bobofys AP', 'C', 'sin@email.com', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '2013-02-12', 'Inactivo'),
('Bola de Fuego Empantanada', 'D', 'gino.scarpino@gmail.com', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '2013-02-12', 'Inactivo'),
('Cabesaurio', 'D', 'sin@email.com', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '2013-02-12', 'Inactivo'),
('Cebollitas', 'B', 'sin@email.com', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '2013-02-12', 'Inactivo'),
('Cero Onda', 'D', 'sin@email.com', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '2013-02-12', 'Inactivo'),
('Chinga tu Madre', 'D', 'sin@email.com', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '2013-02-12', 'Inactivo'),
('Choripete', 'D', 'sin@email.com', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '2013-02-12', 'Inactivo'),
('Comando Antibostero', 'D', 'sin@email.com', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '2013-02-12', 'Inactivo'),
('Dale Chechu', 'C', 'sin@email.com', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '2013-02-12', 'Inactivo'),
('Dale Como Venga', 'D', 'sin@email.com', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '2013-02-12', 'Inactivo'),
('Demostrando en Bolas', 'D', 'sin@email.com', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '2013-02-12', 'Inactivo'),
('Descenso Efectivo', 'D', 'sin@email.com', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '2013-02-12', 'Inactivo'),
('El Glorioso', 'D', 'sin@email.com', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '2013-02-12', 'Inactivo'),
('El Niupi', 'C', 'sin@email.com', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '2013-02-12', 'Inactivo'),
('El Oreja', 'D', 'sin@email.com', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '2013-02-12', 'Inactivo'),
('Fondo de Tabla', 'A', 'sin@email.com', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '2013-02-12', 'Inactivo'),
('Fuerte al Medio', 'C', 'sin@email.com', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '2013-02-12', 'Inactivo'),
('Fulereno 60', 'B', 'sin@email.com', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '2013-02-12', 'Inactivo'),
('Funky Junky', 'C', 'sin@email.com', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '2013-02-12', 'Inactivo'),
('Godeltroskis', 'C', 'sin@email.com', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '2013-02-12', 'Inactivo'),
('Grupo de la Muerte', 'D', 'sin@email.com', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '2013-02-12', 'Inactivo'),
('Hay Equipo', 'A', 'sin@email.com', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '2013-02-12', 'Inactivo'),
('Jugamos por la Línea', 'B', 'sin@email.com', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '2013-02-12', 'Inactivo'),
('Keyzer Soze', 'D', 'sin@email.com', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '2013-02-12', 'Inactivo'),
('Kurepí', 'A', 'k@a.com.ar', 1, 1, 1, 7, 8, 0, 0, 0, 1, 1, 1, 7, 8, 0, 0, 0, '', '0000-00-00', 'Activo'),
('La Barra de Intendencia', 'D', 'sin@email.com', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '2013-02-12', 'Inactivo'),
('La Mafía de la Constante', 'B', 'sin@email.com', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '2013-02-12', 'Inactivo'),
('La Máquina', 'B', 'sin@email.com', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '2013-02-12', 'Inactivo'),
('La Pinchila de Rudolf', 'D', 'sin@email.com', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '2013-02-12', 'Inactivo'),
('La Resaca de Quique', 'C', 'sin@email.com', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '2013-02-12', 'Inactivo'),
('La Salvadora', 'C', 'sin@email.com', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '2013-02-12', 'Inactivo'),
('La Selección Natural', 'C', 'sin@email.com', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '2013-02-12', 'Inactivo'),
('La Tenemos Afuera', 'D', 'sin@email.com', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '2013-02-12', 'Inactivo'),
('Las Bolas de Riemann', 'B', 'sin@email.com', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '2013-02-12', 'Inactivo'),
('Las Cortaduras de BB King', 'D', 'sin@email.com', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '2013-02-12', 'Inactivo'),
('Lo Hacemos por Roberto', 'C', 'sin@email.com', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '2013-02-12', 'Inactivo'),
('Los Amigos de Ramachandran', 'D', 'sin@email.com', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '2013-02-12', 'Inactivo'),
('Los Amigos del Pino', 'D', 'sin@email.com', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '2013-02-12', 'Inactivo'),
('Los Borbotones', 'C', 'sin@email.com', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '2013-02-12', 'Inactivo'),
('Los Caballeros de la Materia Gris Gris', 'D', 'sin@email.com', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '2013-02-12', 'Inactivo'),
('Los Cueva FC', 'B', 'sin@email.com', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '2013-02-12', 'Inactivo'),
('Los Dueños del Pabellón', 'B', 'sin@email.com', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '2013-02-12', 'Inactivo'),
('Los Procariotas del Fútbol', 'A', 'sin@email.com', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '2013-02-12', 'Inactivo'),
('Molotov', 'C', 'sin@email.com', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '2013-02-12', 'Inactivo'),
('No Gala...Gala', 'A', 'sin@email.com', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '2013-02-12', 'Inactivo'),
('Objetivo tu Hermana', 'B', 'sin@email.com', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '2013-02-12', 'Inactivo'),
('Oruga', 'B', 'sin@email.com', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '2013-02-12', 'Inactivo'),
('Paleoequipo', 'D', 'sin@email.com', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '2013-02-12', 'Inactivo'),
('Pamela Chu', 'B', 'sin@email.com', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '2013-02-12', 'Inactivo'),
('Papirola FC', 'D', 'sin@email.com', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '2013-02-12', 'Inactivo'),
('Paso a Faso', 'A', 'sin@email.com', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '2013-02-12', 'Inactivo'),
('Pattern Matching', 'C', 'sin@email.com', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '2013-02-12', 'Inactivo'),
('Piedrazo al Angulo', 'D', 'sin@email.com', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '2013-02-12', 'Inactivo'),
('Pipis Team', 'A', 'sin@email.com', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '2013-02-12', 'Inactivo'),
('Que la Sigan Pipeteando', 'A', 'sin@email.com', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '2013-02-12', 'Inactivo'),
('Real Mandril', 'D', 'sin@email.com', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '2013-02-12', 'Inactivo'),
('Roto y Mal Parado', 'A', 'sin@email.com', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '2013-02-12', 'Inactivo'),
('Ruler of the Chain', 'D', 'sin@email.com', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '2013-02-12', 'Inactivo'),
('Sacala que Quema FC', 'B', 'sin@email.com', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '2013-02-12', 'Inactivo'),
('Si Pasa, Bajalo', 'B', 'sin@email.com', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '2013-02-12', 'Inactivo'),
('Sin Retorno', 'C', 'sin@email.com', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '2013-02-12', 'Inactivo'),
('Somos Gordos, Sabelo', 'A', 'sin@email.com', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '2013-02-12', 'Inactivo'),
('Sporting Adolfino Cañete', 'A', 'sin@email.com', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '2013-02-12', 'Inactivo'),
('Tecnoequipo', 'D', 'sin@email.com', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '2013-02-12', 'Inactivo'),
('testing', 'A', 'sin@email.com', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '2013-02-12', 'Inactivo'),
('Tío Cannabis', 'A', 'sin@email.com', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '2013-02-12', 'Inactivo'),
('Tirame la Bisectriz', 'D', 'sin@email.com', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '2013-02-12', 'Inactivo'),
('Tirate un Pase', 'D', 'sin@email.com', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '2013-02-12', 'Inactivo'),
('Tu Mama', 'D', 'sin@email.com', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '2013-02-12', 'Inactivo'),
('Unos y Ceros', 'A', 'sin@email.com', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '2013-02-12', 'Inactivo'),
('Viejo Tomba', 'D', 'sin@email.com', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '2013-02-12', 'Inactivo'),
('Wurzita', 'A', 'sin@email.com', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '2013-02-12', 'Inactivo'),
('Yo me Equivoque y Pague', 'D', 'sin@email.com', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '2013-02-12', 'Inactivo'),
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
('Gino Scarpino', 34229571, 'Bola de Fuego Empantanada', 0, 0, 0, 0, 0, 0, 0, 0),
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
  `Equipo1` varchar(60) NOT NULL,
  `Equipo2` varchar(60) NOT NULL,
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
  KEY `Estado` (`Estado`),
  KEY `Equipo1` (`Equipo1`,`Equipo2`),
  KEY `Equipo2` (`Equipo2`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=28 ;

--
-- Volcado de datos para la tabla `partido`
--

INSERT INTO `partido` (`Numero`, `Equipo1`, `Equipo2`, `GolesEq1`, `GolesEq2`, `Goleadores`, `Amarillas`, `Expulsiones1`, `Expulsiones2`, `Fecha`, `Hora`, `Comentario`, `Estado`) VALUES
(3, 'Chinga tu madre', 'Kurepí', 0, 0, '', '', '', '', '2011-01-17', '00:00:00', '', 'Cancelado'),
(27, 'Chinga tu madre', 'Kurepí', 0, 0, '', '', '', '', '2012-02-10', '00:00:00', '10-02-2013 - Partido programado.', 'Programado'),
(1, 'Chinga tu madre', 'Kurepí', 0, 0, '', '', '', '', '2013-01-19', '00:00:00', '', 'Cancelado'),
(11, 'Bola de fuego empantanada', 'Las Cortaduras de BB King', 3, 5, '2322(1),72727(2)', '', '', '', '2013-02-01', '00:00:00', '<br>Partido jugado: ', 'Finalizado'),
(12, 'Chinga tu madre', 'Kurepí', 4, 7, '', '', '', '', '2013-02-03', '00:00:00', '<br>Partido jugado: ', 'Finalizado'),
(6, 'Chinga tu madre', 'Kurepí', 0, 0, '', '', '', '', '2013-02-04', '00:00:00', '<br>04-02-2013 - Partido reanudado.<br>04-02-2013 - Partido suspendido: Granizo<br>04-02-2013 - Partido reanudado.<br>04-02-2013 - Partido suspendido: Incendio<br>04-02-2013 - Partido reanudado.<br>Partido jugado: testing', 'Finalizado'),
(10, 'Las Cortaduras de BB King', 'Bola de fuego empantanada', 0, 5, '72727(5)', '', '', '', '2013-02-05', '00:00:00', '<br>Partido jugado: dasdas', 'Finalizado'),
(18, 'Chinga tu madre', 'Kurepí', 0, 0, '', '', '', '', '2013-02-08', '00:00:00', '08-02-2013 - Partido programado.', 'Programado'),
(19, 'Chinga tu madre', 'Kurepí', 0, 0, '', '', '', '', '2013-02-09', '00:00:00', '08-02-2013 - Partido programado.', 'Programado'),
(8, 'Paleoequipo', 'Bola de fuego empantanada', 5, 5, '111(5),72727(2),34229571(3)', '111,34229571', '72727,34229571', '2322,34229571', '2013-02-10', '00:00:00', '<br>Partido jugado: segundo intento<br>Partido jugado: segundo intento<br>Partido jugado: segundo intento', 'Finalizado'),
(20, 'Chinga tu madre', 'Kurepí', 0, 0, '', '', '', '', '2013-02-22', '00:00:00', '08-02-2013 - Partido programado.', 'Programado'),
(26, 'Kurepí', 'Chinga tu madre', 0, 0, '', '', '', '', '2013-02-25', '00:00:00', '09-02-2013 - Partido programado.', 'Programado'),
(22, 'Chinga tu madre', 'Kurepí', 0, 0, '', '', '', '', '2013-03-01', '00:00:00', '09-02-2013 - Partido programado.', 'Programado'),
(17, 'Las Cortaduras de BB King', 'Los Amigos de Ramachandran', 0, 0, '', '', '', '', '2013-03-02', '00:00:00', '<br>05-02-2013 - Partido suspendido: Lluvia<br>05-02-2013 - Partido reanudado.<br>05-02-2013 - Partido suspendido: Corte de luz<br>05-02-2013 - Partido reanudado.', 'Programado'),
(14, 'Chinga tu madre', 'Kurepí', 4, 1, '', '', '', '', '2013-03-03', '00:00:00', '<br>Partido jugado: ', 'Finalizado'),
(15, 'Chinga tu madre', 'Kurepí', 0, 0, '', '', '', '', '2013-03-04', '00:00:00', '<br>Partido jugado: ', 'Finalizado'),
(16, 'Chinga tu madre', 'Kurepí', 0, 5, '', '', '', '', '2013-03-05', '00:00:00', '<br>Partido jugado: ', 'Finalizado'),
(21, 'Chinga tu madre', 'Kurepí', 0, 0, '', '', '', '', '2013-03-06', '00:00:00', '09-02-2013 - Partido programado.', 'Programado'),
(13, 'Chinga tu madre', 'Kurepí', 4, 1, '', '', '', '', '2013-03-07', '00:00:00', '<br>Partido jugado: ', 'Finalizado'),
(25, 'Chinga tu madre', 'Kurepí', 0, 0, '', '', '', '', '2013-03-10', '00:00:00', '09-02-2013 - Partido programado.', 'Programado'),
(23, 'Chinga tu madre', 'Kurepí', 0, 0, '', '', '', '', '2013-03-27', '00:00:00', '09-02-2013 - Partido programado.', 'Programado'),
(24, 'Chinga tu madre', 'Kurepí', 0, 0, '', '', '', '', '2013-04-25', '00:00:00', '09-02-2013 - Partido programado.', 'Programado');

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
  ADD CONSTRAINT `equipo_ibfk_2` FOREIGN KEY (`Categoria`) REFERENCES `categorias` (`Categoria`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `jugadores`
--
ALTER TABLE `jugadores`
  ADD CONSTRAINT `jugadores_ibfk_2` FOREIGN KEY (`Equipo`) REFERENCES `equipo` (`Nombre`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `noticias`
--
ALTER TABLE `noticias`
  ADD CONSTRAINT `noticias_ibfk_1` FOREIGN KEY (`Autor`) REFERENCES `usuarios` (`Nombre`);

--
-- Filtros para la tabla `partido`
--
ALTER TABLE `partido`
  ADD CONSTRAINT `partido_ibfk_4` FOREIGN KEY (`Equipo2`) REFERENCES `equipo` (`Nombre`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `partido_ibfk_2` FOREIGN KEY (`Equipo1`) REFERENCES `equipo` (`Nombre`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `partido_ibfk_3` FOREIGN KEY (`Estado`) REFERENCES `estadopartido` (`Estado`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
