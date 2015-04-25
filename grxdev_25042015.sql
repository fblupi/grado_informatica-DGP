-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 25-04-2015 a las 20:05:44
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

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `caracteristicas`
--

CREATE TABLE IF NOT EXISTS `caracteristicas` (
`ID_Caracteristicas` int(10) NOT NULL,
  `Descripcion` varchar(255) NOT NULL,
  `Tipo` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `caracteristicasalojamiento`
--

CREATE TABLE IF NOT EXISTS `caracteristicasalojamiento` (
  `ID_Caracteristicas` int(10) NOT NULL,
  `ID_Alojamiento` int(10) NOT NULL,
  `Cantidad` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `caracteristicashabitacion`
--

CREATE TABLE IF NOT EXISTS `caracteristicashabitacion` (
  `ID_Caracteristica` int(10) NOT NULL,
  `ID_Habitacion` int(10) NOT NULL,
  `Cantidad` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `habitacion`
--

CREATE TABLE IF NOT EXISTS `habitacion` (
`ID` int(10) NOT NULL,
  `ID_Alojamiento` int(10) NOT NULL,
  `Precio` int(10) NOT NULL,
  `Habilitado` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reserva_alojamiento`
--

CREATE TABLE IF NOT EXISTS `reserva_alojamiento` (
`ID_Alojamiento` int(10) NOT NULL,
  `ID_Usuario` int(10) NOT NULL,
  `Fecha_entrada` int(10) NOT NULL,
  `Fecha_Salida` int(10) NOT NULL,
  `Hora_entrada` int(10) NOT NULL,
  `Hora_salida` int(10) NOT NULL,
  `NumeroTarjeta` int(10) NOT NULL,
  `TipoTarjeta` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reserva_habitacion`
--

CREATE TABLE IF NOT EXISTS `reserva_habitacion` (
`ID_Habitacion` int(10) NOT NULL,
  `ID_Usuario` int(10) NOT NULL,
  `Fecha_entrada` int(10) NOT NULL,
  `Fecha_salida` int(10) NOT NULL,
  `Hora_entrada` int(10) NOT NULL,
  `Hora_salida` int(10) NOT NULL,
  `NumeroTarjeta` int(10) NOT NULL,
  `TipoTarjeta` int(10) NOT NULL,
  `Column` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
  `Descripcion` int(10) NOT NULL,
  `Tipo` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
(1, 'GRXDev1', 'grxdev1@grxdev.com', '1234', 0, 'antonio2', 'prueba', 'Hombre', '12', 'Granada2', '', 6),
(6, 'Pablo126', 'pablo12614@gmail.com', '1234', 1, 'Juan Pablo', 'GonzÃ¡lez Casado', 'Hombre', '26/01/1990', 'Granada', '', 6),
(9, 'Pepepato2', 'd2', '1234', 5, 'Pepa23', '', 'Hombre', '', '', '12356745', 6),
(15, 'GRXDev123', 'pablo1234', '1234', 5, 'Pablo', '', 'Hombre', '', '', '1234567', 0);

--
-- Índices para tablas volcadas
--

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
-- Indices de la tabla `habitacion`
--
ALTER TABLE `habitacion`
 ADD PRIMARY KEY (`ID`);

--
-- Indices de la tabla `reserva_alojamiento`
--
ALTER TABLE `reserva_alojamiento`
 ADD PRIMARY KEY (`ID_Alojamiento`,`Fecha_entrada`,`Fecha_Salida`,`Hora_entrada`,`Hora_salida`);

--
-- Indices de la tabla `reserva_habitacion`
--
ALTER TABLE `reserva_habitacion`
 ADD PRIMARY KEY (`ID_Habitacion`,`Fecha_entrada`,`Fecha_salida`,`Hora_entrada`,`Hora_salida`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
 ADD PRIMARY KEY (`ID_Usuario`), ADD UNIQUE KEY `Nombre_usuario` (`Nombre_usuario`), ADD UNIQUE KEY `Direccion_correo` (`Direccion_correo`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `caracteristicas`
--
ALTER TABLE `caracteristicas`
MODIFY `ID_Caracteristicas` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `habitacion`
--
ALTER TABLE `habitacion`
MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `reserva_alojamiento`
--
ALTER TABLE `reserva_alojamiento`
MODIFY `ID_Alojamiento` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `reserva_habitacion`
--
ALTER TABLE `reserva_habitacion`
MODIFY `ID_Habitacion` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
MODIFY `ID_Usuario` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=16;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;