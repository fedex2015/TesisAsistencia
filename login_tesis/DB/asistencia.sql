-- phpMyAdmin SQL Dump
-- version 3.4.9
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 24-09-2015 a las 22:47:28
-- Versión del servidor: 5.5.28
-- Versión de PHP: 5.3.9

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `asistencia`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `alumnos`
--

CREATE TABLE IF NOT EXISTS `alumnos` (
  `Id_alumno` int(6) NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(50) DEFAULT NULL,
  `Apellido` varchar(50) DEFAULT NULL,
  `Telefono` varchar(14) DEFAULT NULL,
  `Email` varchar(100) DEFAULT NULL,
  `Matricula` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`Id_alumno`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `asignados`
--

CREATE TABLE IF NOT EXISTS `asignados` (
  `Id_asig` int(4) NOT NULL AUTO_INCREMENT,
  `DictadosId_curso` int(4) NOT NULL,
  `DocentesId_docente` int(4) NOT NULL,
  `Desc_Cargo` varchar(25) DEFAULT NULL,
  PRIMARY KEY (`Id_asig`),
  KEY `FKAsignados563748` (`DictadosId_curso`),
  KEY `FKAsignados563749` (`DocentesId_docente`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `asistentes`
--

CREATE TABLE IF NOT EXISTS `asistentes` (
  `Id_asist` int(3) NOT NULL AUTO_INCREMENT,
  `AlumnosId_alumno` int(6) NOT NULL,
  `DictadosId_curso` int(4) NOT NULL,
  `Fecha_clase` date DEFAULT NULL,
  `Cod_asist` varchar(1) DEFAULT NULL,
  PRIMARY KEY (`Id_asist`),
  KEY `FKAsistentes563755` (`AlumnosId_alumno`),
  KEY `FKAsistentes563777` (`DictadosId_curso`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `carreras`
--

CREATE TABLE IF NOT EXISTS `carreras` (
  `Id_carrera` int(3) NOT NULL AUTO_INCREMENT,
  `Desc_Carr` varchar(100) DEFAULT NULL,
  `Plan` varchar(4) DEFAULT NULL,
  PRIMARY KEY (`Id_carrera`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `dictados`
--

CREATE TABLE IF NOT EXISTS `dictados` (
  `Id_curso` int(4) NOT NULL AUTO_INCREMENT,
  `Cuat` smallint(5) NOT NULL,
  `Año` varchar(4) DEFAULT NULL,
  `Diacursada` varbinary(7) DEFAULT NULL,
  `Alt_hor` varchar(2) DEFAULT NULL,
  `Cant_insc_act` smallint(5) DEFAULT NULL,
  `Cant_clases` smallint(5) DEFAULT NULL,
  `Cant_faltas_max` smallint(5) DEFAULT NULL,
  `Finicio` date DEFAULT NULL,
  `Ffin` date DEFAULT NULL,
  PRIMARY KEY (`Id_curso`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `docentes`
--

CREATE TABLE IF NOT EXISTS `docentes` (
  `Id_docente` int(4) NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(50) DEFAULT NULL,
  `Apellido` varchar(50) DEFAULT NULL,
  `Telefono` varchar(14) DEFAULT NULL,
  `Email` varchar(100) DEFAULT NULL,
  `Password` varchar(100) DEFAULT NULL,
  `Codbaja` char(1) DEFAULT NULL,
  PRIMARY KEY (`Id_docente`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `inscriptos`
--

CREATE TABLE IF NOT EXISTS `inscriptos` (
  `Id_insc` int(4) NOT NULL AUTO_INCREMENT,
  `AlumnosId_alumno` int(6) NOT NULL,
  `DictadosId_curso` int(4) NOT NULL,
  `Cant_faltas_act` smallint(5) DEFAULT NULL,
  `Cant_medfaltas_act` smallint(5) DEFAULT NULL,
  PRIMARY KEY (`Id_insc`),
  KEY `FKInscriptos563746` (`AlumnosId_alumno`),
  KEY `FKInscriptos563747` (`DictadosId_curso`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `materias`
--

CREATE TABLE IF NOT EXISTS `materias` (
  `Id_materia` int(4) NOT NULL AUTO_INCREMENT,
  `CarrerasId_carrera` int(3) NOT NULL,
  `Desc_Mat` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`Id_materia`),
  KEY `FKMateria12125` (`CarrerasId_carrera`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE IF NOT EXISTS `usuarios` (
  `Id_usu` int(4) NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(100) DEFAULT NULL,
  `Email` varchar(100) DEFAULT NULL,
  `Password` varchar(100) DEFAULT NULL,
  `Funcion` tinyint(4) DEFAULT NULL,
  `Codbaja` char(1) DEFAULT NULL,
  PRIMARY KEY (`Id_usu`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `asignados`
--
ALTER TABLE `asignados`
  ADD CONSTRAINT `FKAsignados563749` FOREIGN KEY (`DocentesId_docente`) REFERENCES `docentes` (`Id_docente`),
  ADD CONSTRAINT `FKAsignados563748` FOREIGN KEY (`DictadosId_curso`) REFERENCES `dictados` (`Id_curso`);

--
-- Filtros para la tabla `asistentes`
--
ALTER TABLE `asistentes`
  ADD CONSTRAINT `FKAsistentes563777` FOREIGN KEY (`DictadosId_curso`) REFERENCES `dictados` (`Id_curso`),
  ADD CONSTRAINT `FKAsistentes563755` FOREIGN KEY (`AlumnosId_alumno`) REFERENCES `alumnos` (`Id_alumno`);

--
-- Filtros para la tabla `inscriptos`
--
ALTER TABLE `inscriptos`
  ADD CONSTRAINT `FKInscriptos563747` FOREIGN KEY (`DictadosId_curso`) REFERENCES `dictados` (`Id_curso`),
  ADD CONSTRAINT `FKInscriptos563746` FOREIGN KEY (`AlumnosId_alumno`) REFERENCES `alumnos` (`Id_alumno`);

--
-- Filtros para la tabla `materias`
--
ALTER TABLE `materias`
  ADD CONSTRAINT `FKMateria12125` FOREIGN KEY (`CarrerasId_carrera`) REFERENCES `carreras` (`Id_carrera`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
