-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 19-05-2015 a las 12:57:06
-- Versión del servidor: 5.6.21
-- Versión de PHP: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `grxdev`
--
CREATE DATABASE IF NOT EXISTS `grxdev` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `grxdev`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `alojamiento`
--

CREATE TABLE IF NOT EXISTS `alojamiento` (
`ID` int(10) NOT NULL,
  `Nombre` varchar(255) NOT NULL,
  `Direccion` varchar(255) NOT NULL,
  `Descripcion` varchar(255) NOT NULL,
  `Tipo_alojamiento` int(10) NOT NULL,
  `ID_Dueno` int(10) NOT NULL,
  `Fecha_alta` int(10) NOT NULL,
  `ID_Validador` int(10) NOT NULL,
  `Fecha_validacion` varchar(20) NOT NULL,
  `src_img` varchar(128) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `alojamiento`
--

INSERT INTO `alojamiento` (`ID`, `Nombre`, `Direccion`, `Descripcion`, `Tipo_alojamiento`, `ID_Dueno`, `Fecha_alta`, `ID_Validador`, `Fecha_validacion`, `src_img`) VALUES
(1, 'Hotel Prado', 'Calle de prueba n3', 'Esto es un hotel de prueba para comprobar el funcionamiento de la web', 1, 9, 26042015, 1, '29042015', ''),
(2, 'Hotel Nes', 'Avnd los pajaritos n453', 'Otro alojamiento de prueba para comprobar el correcto funcionamiento de todo', 1, 9, 26042015, 1, '29042015', ''),
(3, 'Pajaritos', 'Avd alondiga', 'Prueba de casa rural', 2, 9, 27042015, 1, '29042015', ''),
(4, 'Pajaritos2', 'Avd alondiga', 'Prueba de casa rural', 2, 9, 26042015, 2, '0', ''),
(5, 'Hotel de prueba', 'Calle falsa', 'ESto es una descripcion', 1, 6, 29042015, 1, '29042015', ''),
(6, 'Hotel Ana Maria', 'Calle juan', 'Este es el hotel Ana MarÃ­a un hotel.', 1, 6, 0, 6, '19052015', 'images/alojamientos/Cristo.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `caracteristicas`
--

CREATE TABLE IF NOT EXISTS `caracteristicas` (
`ID_Caracteristicas` int(10) NOT NULL,
  `Descripcion` varchar(255) NOT NULL,
  `Tipo` varchar(255) NOT NULL,
  `Tipo_check` int(10) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `caracteristicas`
--

INSERT INTO `caracteristicas` (`ID_Caracteristicas`, `Descripcion`, `Tipo`, `Tipo_check`) VALUES
(1, 'Piscina', '0', 1),
(2, 'Wi-Fi', '0', 1),
(3, 'Wi-Fi', '1', 1),
(4, 'Spa', '0', 1),
(5, 'Desayuno', '0', 1),
(6, 'Numero_de_camas', '1', 0),
(7, 'Numero_de_Habitaciones', '0', 0),
(8, 'Cafeteria', '0', 1),
(9, 'Aseo', '1', 1),
(10, 'Television', '1', 1),
(11, 'Caja_fuerte', '1', 1),
(12, 'Armario', '1', 1),
(13, 'Discoteca', '0', 1),
(14, 'Pista_Deportiva', '0', 1),
(15, 'Estrellas', '0', 0),
(16, 'Precio', '0', 0),
(17, 'Precio', '1', 0),
(18, 'Bañera', '1', 1),
(19, 'Ducha', '1', 1),
(20, 'Hidromasaje', '1', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `caracteristicasalojamiento`
--

CREATE TABLE IF NOT EXISTS `caracteristicasalojamiento` (
  `ID_Caracteristicas` int(10) NOT NULL,
  `ID_Alojamiento` int(10) NOT NULL,
  `Cantidad` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `caracteristicasalojamiento`
--

INSERT INTO `caracteristicasalojamiento` (`ID_Caracteristicas`, `ID_Alojamiento`, `Cantidad`) VALUES
(1, 1, 2),
(1, 3, 1),
(1, 6, 1),
(2, 3, 2),
(2, 4, 2),
(4, 3, 3),
(4, 6, 1),
(5, 1, 1),
(7, 4, 2),
(7, 6, 3),
(8, 4, 2),
(13, 3, 1),
(14, 3, 1),
(14, 6, 1),
(15, 1, 4),
(15, 2, 4),
(15, 6, 5),
(16, 6, 12);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `caracteristicashabitacion`
--

CREATE TABLE IF NOT EXISTS `caracteristicashabitacion` (
  `ID_Caracteristica` int(10) NOT NULL,
  `ID_Habitacion` int(10) NOT NULL,
  `Cantidad` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `caracteristicashabitacion`
--

INSERT INTO `caracteristicashabitacion` (`ID_Caracteristica`, `ID_Habitacion`, `Cantidad`) VALUES
(3, 1, 1),
(3, 5, 1),
(3, 6, 1),
(6, 1, 1),
(6, 3, 1),
(6, 4, 3),
(6, 5, 2),
(6, 6, 2),
(9, 1, 2),
(9, 2, 1),
(9, 4, 1),
(9, 5, 1),
(9, 6, 1),
(10, 2, 1),
(10, 5, 1),
(10, 6, 1),
(11, 2, 1),
(12, 2, 1),
(12, 5, 1),
(12, 6, 1),
(17, 5, 60),
(17, 6, 60);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comentarioalojamiento`
--

CREATE TABLE IF NOT EXISTS `comentarioalojamiento` (
`ID_Comentario` int(10) NOT NULL,
  `ID_Alojamiento` int(11) NOT NULL,
  `ID_Usuario` int(11) NOT NULL,
  `Comentario` varchar(200) NOT NULL,
  `Fecha` varchar(20) NOT NULL,
  `Hora` varchar(20) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `comentarioalojamiento`
--

INSERT INTO `comentarioalojamiento` (`ID_Comentario`, `ID_Alojamiento`, `ID_Usuario`, `Comentario`, `Fecha`, `Hora`) VALUES
(10, 1, 1, 'Y ya esta, ready todo', '17-05-2015', '11:02');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `habitacion`
--

CREATE TABLE IF NOT EXISTS `habitacion` (
`ID` int(10) NOT NULL,
  `ID_Alojamiento` int(10) NOT NULL,
  `Habilitado` int(10) NOT NULL,
  `img_src` varchar(128) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `habitacion`
--

INSERT INTO `habitacion` (`ID`, `ID_Alojamiento`, `Habilitado`, `img_src`) VALUES
(1, 1, 6, NULL),
(2, 1, 6, NULL),
(3, 2, 6, NULL),
(4, 2, 6, NULL),
(5, 1, 6, NULL),
(6, 1, 6, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reserva_alojamiento`
--

CREATE TABLE IF NOT EXISTS `reserva_alojamiento` (
  `ID_Alojamiento` int(10) NOT NULL,
  `ID_Usuario` int(10) NOT NULL,
  `Fecha_entrada` date NOT NULL,
  `Fecha_Salida` date NOT NULL,
  `NumeroTarjeta` int(10) NOT NULL,
  `TipoTarjeta` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `reserva_alojamiento`
--

INSERT INTO `reserva_alojamiento` (`ID_Alojamiento`, `ID_Usuario`, `Fecha_entrada`, `Fecha_Salida`, `NumeroTarjeta`, `TipoTarjeta`) VALUES
(3, 6, '2015-02-07', '2015-02-09', 1, 2),
(3, 6, '2015-08-07', '2015-08-08', 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reserva_habitacion`
--

CREATE TABLE IF NOT EXISTS `reserva_habitacion` (
  `ID_Habitacion` int(10) NOT NULL,
  `ID_Usuario` int(10) NOT NULL,
  `Fecha_entrada` date NOT NULL,
  `Fecha_salida` date NOT NULL,
  `NumeroTarjeta` int(10) NOT NULL,
  `TipoTarjeta` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `reserva_habitacion`
--

INSERT INTO `reserva_habitacion` (`ID_Habitacion`, `ID_Usuario`, `Fecha_entrada`, `Fecha_salida`, `NumeroTarjeta`, `TipoTarjeta`) VALUES
(0, 6, '1999-01-20', '1999-01-21', 12, 1),
(1, 6, '1970-01-01', '1970-01-01', 123313, 1),
(1, 6, '2015-01-15', '2015-01-17', 2, 555),
(1, 6, '2015-01-21', '2015-01-23', 44, 2),
(1, 6, '2015-01-26', '2015-01-28', 657, 55),
(5, 6, '2001-01-01', '2001-01-11', 555, 2),
(6, 6, '2001-01-01', '2001-01-11', 555, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipos_usuarios`
--

CREATE TABLE IF NOT EXISTS `tipos_usuarios` (
  `id_tipo` int(11) NOT NULL,
  `descripcion` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tipos_usuarios`
--

INSERT INTO `tipos_usuarios` (`id_tipo`, `descripcion`) VALUES
(0, 'Sin privilegios'),
(1, 'Administrador'),
(2, 'Validador'),
(5, 'Dueno');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_alojamiento`
--

CREATE TABLE IF NOT EXISTS `tipo_alojamiento` (
  `ID` int(10) NOT NULL,
  `Descripcion` varchar(25) NOT NULL,
  `Tipo` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tipo_alojamiento`
--

INSERT INTO `tipo_alojamiento` (`ID`, `Descripcion`, `Tipo`) VALUES
(1, 'Hotel', 1),
(2, 'rural', 0),
(3, 'Piso', 0),
(4, 'Piso', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE IF NOT EXISTS `usuarios` (
`ID_Usuario` int(11) NOT NULL,
  `Nombre_usuario` varchar(12) NOT NULL,
  `Direccion_correo` varchar(25) NOT NULL,
  `Contrasena` varchar(12) NOT NULL,
  `Tipo_usuario` tinyint(4) NOT NULL,
  `Nombre` varchar(15) NOT NULL,
  `Apellidos` varchar(22) NOT NULL,
  `Sexo` varchar(8) NOT NULL DEFAULT 'Hombre',
  `Fecha_nacimiento` varchar(10) NOT NULL,
  `Ubicacion` varchar(15) NOT NULL,
  `NIF` varchar(15) NOT NULL,
  `Validador` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`ID_Usuario`, `Nombre_usuario`, `Direccion_correo`, `Contrasena`, `Tipo_usuario`, `Nombre`, `Apellidos`, `Sexo`, `Fecha_nacimiento`, `Ubicacion`, `NIF`, `Validador`) VALUES
(1, 'GRXDev1', 'grxdev1@grxdev.com', '1234', 2, 'antonio2', 'prueba', 'Hombre', '12', 'Granada2', '', 6),
(6, 'Pablo126', 'pablo12614@gmail.com', '1234', 1, 'Juan Pablo', 'GonzÃ¡lez Casado', 'Hombre', '26/01/1990', 'Granada', '', 6),
(9, 'Pepepato2', 'd2', '1234', 5, 'Pepa23', '', 'Hombre', '', '', '12356745', 6),
(15, 'GRXDev123', 'pablo1234', '1234', 5, 'Pablo', '', 'Hombre', '', '', '1234567', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `valoracionalojamiento`
--

CREATE TABLE IF NOT EXISTS `valoracionalojamiento` (
  `ID_Alojamiento` int(11) NOT NULL,
  `ID_Usuario` int(11) NOT NULL,
  `Valoracion` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `valoracionalojamiento`
--

INSERT INTO `valoracionalojamiento` (`ID_Alojamiento`, `ID_Usuario`, `Valoracion`) VALUES
(1, 1, 5),
(3, 6, 4);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `alojamiento`
--
ALTER TABLE `alojamiento`
 ADD PRIMARY KEY (`ID`);

--
-- Indices de la tabla `caracteristicas`
--
ALTER TABLE `caracteristicas`
 ADD PRIMARY KEY (`ID_Caracteristicas`);

--
-- Indices de la tabla `caracteristicasalojamiento`
--
ALTER TABLE `caracteristicasalojamiento`
 ADD PRIMARY KEY (`ID_Caracteristicas`,`ID_Alojamiento`);

--
-- Indices de la tabla `caracteristicashabitacion`
--
ALTER TABLE `caracteristicashabitacion`
 ADD PRIMARY KEY (`ID_Caracteristica`,`ID_Habitacion`);

--
-- Indices de la tabla `comentarioalojamiento`
--
ALTER TABLE `comentarioalojamiento`
 ADD PRIMARY KEY (`ID_Comentario`);

--
-- Indices de la tabla `habitacion`
--
ALTER TABLE `habitacion`
 ADD PRIMARY KEY (`ID`);

--
-- Indices de la tabla `reserva_alojamiento`
--
ALTER TABLE `reserva_alojamiento`
 ADD PRIMARY KEY (`ID_Alojamiento`,`Fecha_entrada`,`Fecha_Salida`);

--
-- Indices de la tabla `reserva_habitacion`
--
ALTER TABLE `reserva_habitacion`
 ADD PRIMARY KEY (`ID_Habitacion`,`Fecha_entrada`,`Fecha_salida`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
 ADD PRIMARY KEY (`ID_Usuario`), ADD UNIQUE KEY `Nombre_usuario` (`Nombre_usuario`), ADD UNIQUE KEY `Direccion_correo` (`Direccion_correo`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `alojamiento`
--
ALTER TABLE `alojamiento`
MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT de la tabla `caracteristicas`
--
ALTER TABLE `caracteristicas`
MODIFY `ID_Caracteristicas` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT de la tabla `comentarioalojamiento`
--
ALTER TABLE `comentarioalojamiento`
MODIFY `ID_Comentario` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT de la tabla `habitacion`
--
ALTER TABLE `habitacion`
MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
MODIFY `ID_Usuario` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=16;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
