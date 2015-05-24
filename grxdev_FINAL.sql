-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 24-05-2015 a las 19:27:48
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
  `src_img` varchar(128) DEFAULT NULL,
  `src_audio` varchar(128) DEFAULT NULL,
  `src_video` varchar(128) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `alojamiento`
--

INSERT INTO `alojamiento` (`ID`, `Nombre`, `Direccion`, `Descripcion`, `Tipo_alojamiento`, `ID_Dueno`, `Fecha_alta`, `ID_Validador`, `Fecha_validacion`, `src_img`, `src_audio`, `src_video`) VALUES
(1, 'Hotel Prado', 'Calle Martinez Sorilla N3', 'El Prado se encuentra en un edificio restaurado del siglo XVII, en el centro de Granada y a 500 metros de la Alhambra. Ofrece aperitivos gratuitos por la tarde, conexion Wi-Fi gratuita y un patio tipico andaluz. ', 1, 9, 26042015, 1, '29042015', 'images/alojamientos/Hotel1.jpg', NULL, NULL),
(2, 'Hotel Nes', 'Av. Consititucion N10', 'El hotel Nes presenta una decoracion en tonos neutros con paredes de ladrillo a la vista y muebles de lujo. La mayoria de los dormitorios da al patio interior, mientras que algunos gozan de vistas a la Alhambra. ', 1, 9, 26042015, 1, '29042015', 'images/alojamientos/Hotel6.jpg', NULL, NULL),
(3, 'Casa rural Los pajaritos', 'Av. Alondiga', 'Los pajaritos es un establecimiento de gestion familiar situado junto al rio de Monachil, en Sierra Nevada. Esta rodeado de tierras de labranza y cada una de sus cabanas dispone de un patio con barbacoa.', 2, 9, 27042015, 1, '29042015', 'images/alojamientos/Casa1.jpg', NULL, NULL),
(4, 'Casa rural Jimena', 'Av. Reselles Torrosa N7', 'Casa rural Jimena es un establecimiento de gestion familiar situado junto al rio de Monachil, en Sierra Nevada. Esta rodeado de tierras de labranza y cada una de sus cabanas dispone de un patio con barbacoa.', 2, 9, 26042015, 2, '0', 'images/alojamientos/Casa2.jpg', NULL, NULL),
(5, 'Hotel MahorÃ­es', 'Calle Espartano de la Cruz', 'El Hotel MahorÃ­es es un Hotel familiar situado junto al rio de Monachil, en Sierra Nevada. Esta rodeado de tierras de labranza y cada una de sus cabanas dispone de un patio con barbacoa.', 1, 6, 29042015, 1, '29042015', 'images/alojamientos/Hotel5.jpg', NULL, NULL),
(6, 'Hotel Ana Maria', 'Calle Cuba', 'El Hotel Ana MarÃ­a presenta una decoracion en tonos neutros con paredes de ladrillo a la vista y muebles de lujo. La mayoria de los dormitorios da al patio interior, mientras que algunos gozan de vistas a la Alhambra', 1, 6, 0, 6, '19052015', 'images/alojamientos/Hotel2.jpg', NULL, NULL),
(7, 'Casa rural Colmena', 'Calle de la Colmena N11', 'La Colmena es un establecimiento de gestion familiar situado junto al rio de Monachil, en Sierra Nevada. Esta rodeado de tierras de labranza y cada una de sus cabanas dispone de un patio con barbacoa.', 1, 6, 0, 6, '19052015', 'images/alojamientos/Casa3.jpg', NULL, NULL),
(9, 'Hotel Accesible', 'Calle de la Accesibilidad N22', 'Este en un hotel accesible para todos.Dispone de una descripcion de sonido y de video en lengua de signos.', 1, 6, 0, 6, '20052015', 'images/alojamientos/Hotel3.jpg', 'audio/HotelBallena.mp3', 'video/HotelBallena.mp4'),
(10, 'Hotel Zapata', 'Calle de la Zapata', 'El Hotel Zapata presenta una decoracion en tonos neutros con paredes de ladrillo a la vista y muebles de lujo. La mayoria de los dormitorios da al patio interior, mientras que algunos gozan de vistas a la Alhambra', 1, 6, 0, 0, '', 'images/alojamientos/Hotel4.jpg', '', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `caracteristicas`
--

CREATE TABLE IF NOT EXISTS `caracteristicas` (
`ID_Caracteristicas` int(10) NOT NULL,
  `Descripcion` varchar(255) NOT NULL,
  `Tipo` varchar(255) NOT NULL,
  `Tipo_check` int(10) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `caracteristicas`
--

INSERT INTO `caracteristicas` (`ID_Caracteristicas`, `Descripcion`, `Tipo`, `Tipo_check`) VALUES
(1, 'Piscina', '0', 1),
(2, 'Wi-Fi', '0', 1),
(3, 'Wi-Fi', '1', 1),
(4, 'Spa', '0', 1),
(5, 'Desayuno', '0', 1),
(6, 'Numero de camas', '1', 0),
(7, 'Numero de Habitaciones', '0', 0),
(8, 'Cafeteria', '0', 1),
(9, 'Aseo', '1', 1),
(10, 'Television', '1', 1),
(11, 'Caja fuerte', '1', 1),
(12, 'Armario', '1', 1),
(14, 'Pista Deportiva', '0', 1),
(15, 'Estrellas', '0', 0),
(16, 'Precio', '0', 0),
(17, 'Precio', '1', 0),
(18, 'Bañera', '1', 1),
(19, 'Ducha', '1', 1),
(20, 'Hidromasaje', '1', 1),
(21, 'Aparcamiento', '0', 1),
(22, 'Lavanderia', '0', 1),
(23, 'Ascensor', '0', 1);

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
(1, 5, 1),
(1, 6, 1),
(1, 7, 1),
(1, 9, 1),
(1, 10, 1),
(2, 3, 2),
(2, 4, 2),
(2, 8, 1),
(4, 3, 3),
(4, 5, 1),
(4, 6, 1),
(4, 9, 1),
(4, 10, 1),
(5, 1, 1),
(5, 5, 1),
(5, 8, 1),
(5, 9, 1),
(7, 4, 2),
(7, 5, 0),
(7, 6, 3),
(7, 7, 6),
(7, 8, 0),
(7, 9, 0),
(7, 10, 0),
(8, 4, 2),
(13, 3, 1),
(13, 7, 1),
(13, 8, 1),
(13, 10, 1),
(14, 3, 1),
(14, 5, 1),
(14, 6, 1),
(15, 1, 4),
(15, 2, 4),
(15, 5, 3),
(15, 6, 5),
(15, 7, 0),
(15, 8, 2),
(15, 9, 3),
(15, 10, 3),
(16, 5, 40),
(16, 6, 12),
(16, 7, 80),
(16, 8, 40),
(16, 9, 40),
(16, 10, 50),
(21, 5, 1);

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
(3, 7, 1),
(3, 8, 1),
(3, 9, 1),
(3, 10, 1),
(6, 1, 1),
(6, 3, 1),
(6, 4, 3),
(6, 5, 2),
(6, 6, 2),
(6, 7, 2),
(6, 8, 3),
(6, 9, 3),
(6, 10, 3),
(9, 1, 2),
(9, 2, 1),
(9, 4, 1),
(9, 5, 1),
(9, 6, 1),
(10, 2, 1),
(10, 5, 1),
(10, 6, 1),
(11, 2, 1),
(11, 8, 1),
(11, 9, 1),
(11, 10, 1),
(12, 2, 1),
(12, 5, 1),
(12, 6, 1),
(17, 5, 60),
(17, 6, 60),
(17, 7, 10),
(17, 8, 50),
(17, 9, 50),
(17, 10, 50),
(18, 8, 1),
(18, 9, 1),
(18, 10, 1),
(20, 7, 1);

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
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `habitacion`
--

INSERT INTO `habitacion` (`ID`, `ID_Alojamiento`, `Habilitado`, `img_src`) VALUES
(1, 1, 6, NULL),
(2, 1, 6, NULL),
(3, 2, 6, NULL),
(4, 2, 6, NULL),
(5, 1, 6, NULL),
(6, 1, 6, NULL),
(7, 10, 6, NULL),
(8, 10, 6, NULL),
(9, 10, 6, NULL),
(10, 10, 6, NULL);

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
(2, 9, '2015-05-08', '2015-05-22', 1234, 1),
(5, 6, '2001-01-01', '2001-01-11', 555, 2),
(5, 6, '2015-04-10', '2015-04-20', 1234, 2),
(5, 9, '2015-05-20', '2015-05-22', 12, 2),
(6, 6, '2001-01-01', '2001-01-11', 555, 2),
(6, 6, '2015-04-10', '2015-04-20', 1234, 2);

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
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`ID_Usuario`, `Nombre_usuario`, `Direccion_correo`, `Contrasena`, `Tipo_usuario`, `Nombre`, `Apellidos`, `Sexo`, `Fecha_nacimiento`, `Ubicacion`, `NIF`, `Validador`) VALUES
(1, 'Pedro', 'pedro@validador.com', '1234', 2, 'Pedro', 'Sanchez', 'Hombre', '12/04/1990', 'Granada', '1234567R', 6),
(6, 'Admin', 'admin@admin.com', '1234', 1, 'Juan Pablo', 'GonzÃ¡lez Casado', 'Hombre', '26/01/1990', 'Granada', '7654321T', 6),
(9, 'Luis', 'luis@dueno.com', '1234', 5, 'Luis Manuel', 'Suarez Castillo', 'Hombre', '01/01/1992', 'Granada', '1122334X', 6),
(15, 'Pablo', 'pablo@dueno.com', '1234', 5, 'Pablo', 'Perez Rodriguez', 'Hombre', '02/10/1980', 'Granada', '1234567L', 0),
(16, 'Juan', 'juan@usuario.com', '1234', 0, 'Juan', 'Cuesta', 'Hombre', '01/02/2000', 'Granada', '6655889P', 0),
(17, 'Carlos', 'carlos@usuario.com', '1234', 0, 'Carlos', 'Perez', 'Hombre', '12/14/1990', 'Granada', '', 0),
(18, 'Sara', 'sara@usuario.com', '1234', 0, 'Sara', 'Fernandez Gomez', 'Mujer', '01/15/2015', 'Granada', '', 0);

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
(3, 6, 4),
(4, 18, 4),
(5, 18, 5),
(6, 17, 2),
(7, 17, 2);

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
MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT de la tabla `caracteristicas`
--
ALTER TABLE `caracteristicas`
MODIFY `ID_Caracteristicas` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=24;
--
-- AUTO_INCREMENT de la tabla `comentarioalojamiento`
--
ALTER TABLE `comentarioalojamiento`
MODIFY `ID_Comentario` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT de la tabla `habitacion`
--
ALTER TABLE `habitacion`
MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
MODIFY `ID_Usuario` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=19;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
