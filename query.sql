-- phpMyAdmin SQL Dump
-- version 4.0.9
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 16-04-2014 a las 05:08:57
-- Versión del servidor: 5.5.34
-- Versión de PHP: 5.4.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `organizador`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `periodo_ptc`
--

CREATE TABLE IF NOT EXISTS `periodo_ptc` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idPeriodo` int(11) NOT NULL,
  `idPtc` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `idPeriodo_PeriodoRenovacion` (`idPeriodo`),
  KEY `idPtc_PeriodoRenovacion` (`idPtc`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `periodo_renovacion`
--

CREATE TABLE IF NOT EXISTS `periodo_renovacion` (
  `idPeriodo` int(11) NOT NULL AUTO_INCREMENT,
  `periodo` int(11) NOT NULL,
  `costo` decimal(10,4) NOT NULL,
  PRIMARY KEY (`idPeriodo`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `periodo_renovacion`
--

INSERT INTO `periodo_renovacion` (`idPeriodo`, `periodo`, `costo`) VALUES
(1, 30, '0.2000');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ptc`
--

CREATE TABLE IF NOT EXISTS `ptc` (
  `idPtc` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) COLLATE utf8_spanish2_ci NOT NULL,
  `pagoPorReferidoDirecto` decimal(5,3) NOT NULL,
  `pagoPorReferidoRentado` decimal(5,3) NOT NULL,
  `costoReciclaje` decimal(10,2) NOT NULL,
  `ganancias` decimal(10,3) NOT NULL DEFAULT '0.000',
  PRIMARY KEY (`idPtc`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `ptc`
--

INSERT INTO `ptc` (`idPtc`, `nombre`, `pagoPorReferidoDirecto`, `pagoPorReferidoRentado`, `costoReciclaje`, `ganancias`) VALUES
(1, 'Probux', '0.005', '0.005', '0.07', '0.000');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reciclaje`
--

CREATE TABLE IF NOT EXISTS `reciclaje` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idReferido` int(11) NOT NULL,
  `veces` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `idReferidoo_Referidos` (`idReferido`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `referidos`
--

CREATE TABLE IF NOT EXISTS `referidos` (
  `idReferido` int(11) NOT NULL AUTO_INCREMENT,
  `referido` varchar(50) COLLATE utf8_spanish2_ci NOT NULL,
  `idPtc` int(11) NOT NULL,
  `ganancias` decimal(10,3) NOT NULL DEFAULT '0.000',
  PRIMARY KEY (`idReferido`),
  KEY `idPtcc_Ptc` (`idPtc`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `referidos`
--

INSERT INTO `referidos` (`idReferido`, `referido`, `idPtc`, `ganancias`) VALUES
(1, 'R2041724529', 1, '0.000');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `renovaciones`
--

CREATE TABLE IF NOT EXISTS `renovaciones` (
  `id_renovacion` int(11) NOT NULL AUTO_INCREMENT,
  `clicsRenovacion` int(11) NOT NULL,
  `clicsActual` int(11) NOT NULL,
  `idPeriodo` int(11) NOT NULL,
  `fechaRenovacion` date DEFAULT NULL,
  `veces` int(11) NOT NULL,
  `idReferido` int(11) NOT NULL,
  PRIMARY KEY (`id_renovacion`),
  KEY `idReferido_referidos` (`idReferido`),
  KEY `idPeriodoo_PeriodoRenovacion` (`idPeriodo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE IF NOT EXISTS `usuarios` (
  `usuario` varchar(25) COLLATE utf8_spanish2_ci NOT NULL,
  `pass` varchar(200) COLLATE utf8_spanish2_ci NOT NULL,
  PRIMARY KEY (`usuario`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`usuario`, `pass`) VALUES
('sonyer10', 'c2242b55b12318ac8d508a805e325c16');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario_ptc`
--

CREATE TABLE IF NOT EXISTS `usuario_ptc` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idPtc` int(11) NOT NULL,
  `usuario` varchar(25) COLLATE utf8_spanish2_ci NOT NULL,
  `ganancias` decimal(10,4) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `usuario_usuarioUsuario` (`usuario`),
  KEY `IIdPtc_Ptc` (`idPtc`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci AUTO_INCREMENT=1 ;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `periodo_ptc`
--
ALTER TABLE `periodo_ptc`
  ADD CONSTRAINT `idPeriodo_PeriodoRenovacion` FOREIGN KEY (`idPeriodo`) REFERENCES `periodo_renovacion` (`idPeriodo`),
  ADD CONSTRAINT `idPtc_PeriodoRenovacion` FOREIGN KEY (`idPtc`) REFERENCES `ptc` (`idPtc`);

--
-- Filtros para la tabla `reciclaje`
--
ALTER TABLE `reciclaje`
  ADD CONSTRAINT `idReferidoo_Referidos` FOREIGN KEY (`idReferido`) REFERENCES `referidos` (`idReferido`);

--
-- Filtros para la tabla `referidos`
--
ALTER TABLE `referidos`
  ADD CONSTRAINT `idPtcc_Ptc` FOREIGN KEY (`idPtc`) REFERENCES `ptc` (`idPtc`),
  ADD CONSTRAINT `idPtc_Ptc` FOREIGN KEY (`idPtc`) REFERENCES `ptc` (`idPtc`);

--
-- Filtros para la tabla `renovaciones`
--
ALTER TABLE `renovaciones`
  ADD CONSTRAINT `idPeriodoo_PeriodoRenovacion` FOREIGN KEY (`idPeriodo`) REFERENCES `periodo_renovacion` (`idPeriodo`),
  ADD CONSTRAINT `idReferido_referidos` FOREIGN KEY (`idReferido`) REFERENCES `referidos` (`idReferido`);

--
-- Filtros para la tabla `usuario_ptc`
--
ALTER TABLE `usuario_ptc`
  ADD CONSTRAINT `IIdPtc_Ptc` FOREIGN KEY (`idPtc`) REFERENCES `ptc` (`idPtc`),
  ADD CONSTRAINT `usuario_usuarioUsuario` FOREIGN KEY (`usuario`) REFERENCES `usuarios` (`usuario`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
