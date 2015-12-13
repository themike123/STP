-- phpMyAdmin SQL Dump
-- version 3.4.5
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 29-06-2015 a las 17:02:30
-- Versión del servidor: 5.5.16
-- Versión de PHP: 5.3.8

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `stp`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `adecuacionpresupuestal`
--

CREATE TABLE IF NOT EXISTS `adecuacionpresupuestal` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fecha` date NOT NULL,
  `importe` varchar(30) NOT NULL,
  `folio` varchar(10) NOT NULL,
  `tipoMovimiento` text NOT NULL,
  `numeroOficio` varchar(20) NOT NULL,
  `observaciones` text NOT NULL,
  `tipo` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Volcado de datos para la tabla `adecuacionpresupuestal`
--

INSERT INTO `adecuacionpresupuestal` (`id`, `fecha`, `importe`, `folio`, `tipoMovimiento`, `numeroOficio`, `observaciones`, `tipo`) VALUES
(3, '2015-05-26', '500', '1', 'gnghn', '10', 'ghnghn', 1),
(4, '2015-06-21', '1.23', '1', '1', '1', '1', 1),
(7, '2015-06-26', '7.89', '679', '', '89', '', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `anuncio`
--

CREATE TABLE IF NOT EXISTS `anuncio` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `contenido` varchar(10000) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Volcado de datos para la tabla `anuncio`
--

INSERT INTO `anuncio` (`id`, `contenido`) VALUES
(1, 'hola'),
(2, 'como estas'),
(3, 'alumnos'),
(4, 'rjregjergtgrtgrtgrtgtrgrtgtrgtr'),
(5, 'hgyuguyguyg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clc`
--

CREATE TABLE IF NOT EXISTS `clc` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fecha` date NOT NULL,
  `importe` varchar(30) NOT NULL,
  `folio` varchar(10) NOT NULL,
  `tipoMovimiento` text NOT NULL,
  `cere` varchar(20) NOT NULL,
  `observaciones` text NOT NULL,
  `tipo` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Volcado de datos para la tabla `clc`
--

INSERT INTO `clc` (`id`, `fecha`, `importe`, `folio`, `tipoMovimiento`, `cere`, `observaciones`, `tipo`) VALUES
(1, '2015-05-25', '12321.00', '01', 'Movimientos', '12', 'Ninguna', 1),
(4, '2015-05-25', '1.20', '6', 'iu', '8', 'iug', 1),
(5, '2015-06-11', '4.00', '76', '1', '89', '2', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `relacion_universidad_adecuacionpresupuestal`
--

CREATE TABLE IF NOT EXISTS `relacion_universidad_adecuacionpresupuestal` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_Universidad` int(11) NOT NULL,
  `id_AdecuacionPresupuestal` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_Universidad` (`id_Universidad`),
  KEY `id_AdecuacionPresupuestal` (`id_AdecuacionPresupuestal`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Volcado de datos para la tabla `relacion_universidad_adecuacionpresupuestal`
--

INSERT INTO `relacion_universidad_adecuacionpresupuestal` (`id`, `id_Universidad`, `id_AdecuacionPresupuestal`) VALUES
(3, 1, 3),
(4, 2, 4),
(7, 2, 7);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `relacion_universidad_clc`
--

CREATE TABLE IF NOT EXISTS `relacion_universidad_clc` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_Universidad` int(11) NOT NULL,
  `id_CLC` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_Universidad` (`id_Universidad`),
  KEY `id_CLC` (`id_CLC`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Volcado de datos para la tabla `relacion_universidad_clc`
--

INSERT INTO `relacion_universidad_clc` (`id`, `id_Universidad`, `id_CLC`) VALUES
(1, 1, 1),
(4, 1, 4),
(5, 2, 5);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `relacion_usuario_universidad`
--

CREATE TABLE IF NOT EXISTS `relacion_usuario_universidad` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_Usuario` int(11) NOT NULL,
  `id_Universidad` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_Usuario` (`id_Usuario`),
  KEY `id_Universidad` (`id_Universidad`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Volcado de datos para la tabla `relacion_usuario_universidad`
--

INSERT INTO `relacion_usuario_universidad` (`id`, `id_Usuario`, `id_Universidad`) VALUES
(1, 1, 1),
(2, 2, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `universidad`
--

CREATE TABLE IF NOT EXISTS `universidad` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `universidad`
--

INSERT INTO `universidad` (`id`, `nombre`) VALUES
(1, 'Nova Universitas'),
(2, 'Unsis');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE IF NOT EXISTS `usuario` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `telefono` varchar(15) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id`, `username`, `password`, `email`, `nombre`, `telefono`) VALUES
(1, 'miguel', 'x', 'm@mail.com', 'Miguel Ramirez', '1234567890'),
(2, 'ediel', 'e', 'e@hotmail.com', 'Ediel Mendez Vazquez', '0987654329'),
(4, 'u', '9', 'aaa@gmail.com', 'aaa', '1234567890');

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `vista_clase_usuario`
--
CREATE TABLE IF NOT EXISTS `vista_clase_usuario` (
`id` int(11)
,`id_Usuario` int(11)
,`id_Universidad` int(11)
,`username` varchar(20)
,`password` varchar(20)
,`email` varchar(50)
,`Usuario` varchar(100)
,`telefono` varchar(15)
,`Universidad` varchar(50)
);
-- --------------------------------------------------------

--
-- Estructura para la vista `vista_clase_usuario`
--
DROP TABLE IF EXISTS `vista_clase_usuario`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vista_clase_usuario` AS select `relacion_usuario_universidad`.`id` AS `id`,`relacion_usuario_universidad`.`id_Usuario` AS `id_Usuario`,`relacion_usuario_universidad`.`id_Universidad` AS `id_Universidad`,`usuario`.`username` AS `username`,`usuario`.`password` AS `password`,`usuario`.`email` AS `email`,`usuario`.`nombre` AS `Usuario`,`usuario`.`telefono` AS `telefono`,`universidad`.`nombre` AS `Universidad` from ((`relacion_usuario_universidad` join `usuario`) join `universidad`) where ((`relacion_usuario_universidad`.`id_Usuario` = `usuario`.`id`) and (`relacion_usuario_universidad`.`id_Universidad` = `universidad`.`id`));

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `relacion_universidad_adecuacionpresupuestal`
--
ALTER TABLE `relacion_universidad_adecuacionpresupuestal`
  ADD CONSTRAINT `relacion_universidad_adecuacionpresupuestal_ibfk_1` FOREIGN KEY (`id_Universidad`) REFERENCES `universidad` (`id`),
  ADD CONSTRAINT `relacion_universidad_adecuacionpresupuestal_ibfk_2` FOREIGN KEY (`id_AdecuacionPresupuestal`) REFERENCES `adecuacionpresupuestal` (`id`);

--
-- Filtros para la tabla `relacion_universidad_clc`
--
ALTER TABLE `relacion_universidad_clc`
  ADD CONSTRAINT `relacion_universidad_clc_ibfk_1` FOREIGN KEY (`id_Universidad`) REFERENCES `universidad` (`id`),
  ADD CONSTRAINT `relacion_universidad_clc_ibfk_2` FOREIGN KEY (`id_CLC`) REFERENCES `clc` (`id`);

--
-- Filtros para la tabla `relacion_usuario_universidad`
--
ALTER TABLE `relacion_usuario_universidad`
  ADD CONSTRAINT `relacion_usuario_universidad_ibfk_1` FOREIGN KEY (`id_Usuario`) REFERENCES `usuario` (`id`),
  ADD CONSTRAINT `relacion_usuario_universidad_ibfk_2` FOREIGN KEY (`id_Universidad`) REFERENCES `universidad` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
