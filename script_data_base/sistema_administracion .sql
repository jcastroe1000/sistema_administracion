-- phpMyAdmin SQL Dump
-- version 4.4.14
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 02-02-2016 a las 02:47:42
-- Versión del servidor: 5.6.26
-- Versión de PHP: 5.6.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `sistema_administracion`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `contenido`
--

CREATE TABLE IF NOT EXISTS `contenido` (
  `id_contenido` int(11) NOT NULL,
  `id_tipo` int(11) NOT NULL,
  `titulo` varchar(45) NOT NULL,
  `ruta` text,
  `url` varchar(45) DEFAULT NULL,
  `descripcion_corta` varchar(45) DEFAULT NULL,
  `descripcion_larga` text NOT NULL,
  `visualizacion` varchar(5) NOT NULL,
  `creacion` date NOT NULL,
  `modificacion` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `contenido_galeria`
--

CREATE TABLE IF NOT EXISTS `contenido_galeria` (
  `id_galeria` int(11) NOT NULL,
  `id_contenido` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `galeria`
--

CREATE TABLE IF NOT EXISTS `galeria` (
  `id_galeria` int(11) NOT NULL,
  `titulo_galeria` varchar(45) NOT NULL,
  `descripcion_corta` varchar(45) DEFAULT NULL,
  `descripcion_larga` text,
  `estatus` varchar(10) NOT NULL,
  `fecha_creacion` date DEFAULT NULL,
  `fecha_modificacion` date DEFAULT NULL,
  `seccion_pertenece` varchar(45) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `galeria`
--

INSERT INTO `galeria` (`id_galeria`, `titulo_galeria`, `descripcion_corta`, `descripcion_larga`, `estatus`, `fecha_creacion`, `fecha_modificacion`, `seccion_pertenece`) VALUES
(2, 'Muebles', 'muebles de madera para casa u oficina', 'todo tipo de muebles. para casa , oficina, etc etc etc', 'activo', NULL, NULL, 'muebles'),
(4, 'sillas', 'sillas de todo tipo', 'sillas de metal, madera, plastico, entre otras', 'activo', NULL, NULL, 'sillas'),
(5, 'sillas', 'sillas de todo tipo', 'sillas de metal, madera, plastico, entre otras', 'activo', NULL, NULL, 'sillas'),
(6, 'laptop', 'laptop hp', 'laptop hp', 'inactivo', NULL, NULL, 'maquinas'),
(9, 'carros', 'carros pequeÃ±os', 'carros pequeÃ±os carros ', 'activo', '2016-02-02', '2016-02-02', 'carros pequeÃ±os'),
(10, 'carros', 'carros pequeÃ±os', 'carros pequeÃ±os carros pequeÃ±oscarros pequeÃ±oscarros pequeÃ±oscarros pequeÃ±oscarros pequeÃ±oscarros pequeÃ±os', 'activo', '2016-02-02', NULL, 'carros pequeÃ±os'),
(11, 'carros', 'carros pequeÃ±os', 'solo carros desde el 2010 hasta el 2015', 'activo', '2016-02-02', NULL, 'carros pequeÃ±os');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo`
--

CREATE TABLE IF NOT EXISTS `tipo` (
  `id_tipo` int(11) NOT NULL,
  `descripcion` varchar(45) NOT NULL,
  `mime_type` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Usuarios`
--

CREATE TABLE IF NOT EXISTS `Usuarios` (
  `id` int(11) NOT NULL,
  `nombre` varchar(45) NOT NULL,
  `user` varchar(45) NOT NULL,
  `password` varchar(45) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `Usuarios`
--

INSERT INTO `Usuarios` (`id`, `nombre`, `user`, `password`) VALUES
(1, 'Castro Esparza Jose Antonio', 'tonoescom@gmail.com', '2011301308');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `contenido`
--
ALTER TABLE `contenido`
  ADD PRIMARY KEY (`id_contenido`),
  ADD KEY `id_tipo` (`id_tipo`);

--
-- Indices de la tabla `contenido_galeria`
--
ALTER TABLE `contenido_galeria`
  ADD KEY `id_contenido` (`id_contenido`),
  ADD KEY `id_galeria` (`id_galeria`);

--
-- Indices de la tabla `galeria`
--
ALTER TABLE `galeria`
  ADD PRIMARY KEY (`id_galeria`);

--
-- Indices de la tabla `tipo`
--
ALTER TABLE `tipo`
  ADD PRIMARY KEY (`id_tipo`);

--
-- Indices de la tabla `Usuarios`
--
ALTER TABLE `Usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `contenido`
--
ALTER TABLE `contenido`
  MODIFY `id_contenido` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `galeria`
--
ALTER TABLE `galeria`
  MODIFY `id_galeria` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT de la tabla `tipo`
--
ALTER TABLE `tipo`
  MODIFY `id_tipo` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `Usuarios`
--
ALTER TABLE `Usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `contenido`
--
ALTER TABLE `contenido`
  ADD CONSTRAINT `contenido_ibfk_1` FOREIGN KEY (`id_tipo`) REFERENCES `tipo` (`id_tipo`);

--
-- Filtros para la tabla `contenido_galeria`
--
ALTER TABLE `contenido_galeria`
  ADD CONSTRAINT `contenido_galeria_ibfk_1` FOREIGN KEY (`id_contenido`) REFERENCES `contenido` (`id_contenido`),
  ADD CONSTRAINT `contenido_galeria_ibfk_2` FOREIGN KEY (`id_galeria`) REFERENCES `galeria` (`id_galeria`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
