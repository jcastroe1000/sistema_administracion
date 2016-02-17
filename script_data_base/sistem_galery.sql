-- phpMyAdmin SQL Dump
-- version 4.4.14
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 17-02-2016 a las 15:16:30
-- Versión del servidor: 5.6.26
-- Versión de PHP: 5.6.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `sistem_galery`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `content`
--

CREATE TABLE IF NOT EXISTS `content` (
  `id_content` int(11) NOT NULL,
  `title` varchar(45) NOT NULL,
  `route` text,
  `url` varchar(45) DEFAULT NULL,
  `short_description` varchar(45) DEFAULT NULL,
  `long_description` text,
  `status` varchar(10) NOT NULL,
  `creation_date` date NOT NULL,
  `modification_date` date DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `content`
--

INSERT INTO `content` (`id_content`, `title`, `route`, `url`, `short_description`, `long_description`, `status`, `creation_date`, `modification_date`) VALUES
(23, 'paisaje', 'descarga.jpg', NULL, 'paisaje', 'paisaje de algo', 'activo', '2016-02-17', '2016-02-17');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `content_galery`
--

CREATE TABLE IF NOT EXISTS `content_galery` (
  `id` int(11) NOT NULL,
  `id_content` int(11) NOT NULL,
  `id_galery` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `content_galery`
--

INSERT INTO `content_galery` (`id`, `id_content`, `id_galery`) VALUES
(1, 1, 10),
(2, 1, 9),
(3, 1, 10),
(4, 1, 15);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `galery`
--

CREATE TABLE IF NOT EXISTS `galery` (
  `id_galery` int(11) NOT NULL,
  `title_galery` varchar(45) NOT NULL,
  `short_description` varchar(45) DEFAULT NULL,
  `long_description` text,
  `status` varchar(10) NOT NULL,
  `creation_date` date DEFAULT NULL,
  `modification_date` date DEFAULT NULL,
  `section` varchar(45) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `galery`
--

INSERT INTO `galery` (`id_galery`, `title_galery`, `short_description`, `long_description`, `status`, `creation_date`, `modification_date`, `section`) VALUES
(15, 'Prueba', 'Prueba', 'Prueba de modificacion', 'Activo', '2016-02-17', '2016-02-17', 'Home'),
(16, 'platos', 'platos para toda ocacion', 'platos de todos colores', 'activo', '2016-02-17', NULL, 'home');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Users`
--

CREATE TABLE IF NOT EXISTS `Users` (
  `id` int(11) NOT NULL,
  `nombre` varchar(45) NOT NULL,
  `user` varchar(45) NOT NULL,
  `password` varchar(45) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `Users`
--

INSERT INTO `Users` (`id`, `nombre`, `user`, `password`) VALUES
(1, 'Castro Esparza Jose Antonio', 'tonoescom@gmail.com', '2011301308');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `content`
--
ALTER TABLE `content`
  ADD PRIMARY KEY (`id_content`);

--
-- Indices de la tabla `content_galery`
--
ALTER TABLE `content_galery`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `galery`
--
ALTER TABLE `galery`
  ADD PRIMARY KEY (`id_galery`);

--
-- Indices de la tabla `Users`
--
ALTER TABLE `Users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `content`
--
ALTER TABLE `content`
  MODIFY `id_content` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=24;
--
-- AUTO_INCREMENT de la tabla `content_galery`
--
ALTER TABLE `content_galery`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `galery`
--
ALTER TABLE `galery`
  MODIFY `id_galery` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT de la tabla `Users`
--
ALTER TABLE `Users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
