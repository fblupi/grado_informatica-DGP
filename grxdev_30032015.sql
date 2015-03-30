-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 30-03-2015 a las 18:10:38
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
-- Estructura de tabla para la tabla `tipos_usuarios`
--

DROP TABLE IF EXISTS `tipos_usuarios`;
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
-- Estructura de tabla para la tabla `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
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
(1, 'GRXDev1', 'grxdev1@grxdev.com', '1234', 0, '', '', 'Hombre', '', '', '', 6),
(6, 'Pablo126', 'pablo12614@gmail.com', '1234', 1, 'Juan Pablo', 'GonzÃ¡lez Casado', 'Hombre', '26/01/1990', 'Granada', '', 6),
(9, 'Pepepato', 'd2', '1234', 5, 'Pepe', '', 'Hombre', '', '', '1235', 0),
(15, 'GRXDev123', 'pablo1234', '1234', 5, 'Pablo', '', 'Hombre', '', '', '1234567', 0);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
 ADD PRIMARY KEY (`ID_Usuario`), ADD UNIQUE KEY `Nombre_usuario` (`Nombre_usuario`), ADD UNIQUE KEY `Direccion_correo` (`Direccion_correo`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
MODIFY `ID_Usuario` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=16;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
