-- phpMyAdmin SQL Dump
-- version 3.4.5
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 11-09-2012 a las 12:43:58
-- Versión del servidor: 5.5.16
-- Versión de PHP: 5.3.8

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `mydatabase`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `photos`
--

CREATE TABLE IF NOT EXISTS `photos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `location` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `location_mini` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `title` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `description` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `publicar` tinyint(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=29 ;

--
-- Volcado de datos para la tabla `photos`
--

INSERT INTO `photos` (`id`, `location`, `location_mini`, `title`, `description`, `publicar`) VALUES
(2, 'photos/griego.jpg', 'photos/griego_mini.jpg', 'Restaurant El Greco', 'Cocina griega en Madrid', 0),
(3, 'photos/galapagos.jpg', 'photos/galapagos_mini.jpg', 'Galápagos', 'Puedes verlos en la estación de Atocha', 0),
(4, 'photos/restaurante.jpg', 'photos/restaurante_mini.jpg', 'Casa Paco', 'Comida casera al mejor precio', 1),
(5, 'photos/museo.jpg', 'photos/museo_mini.jpg', 'Desde el Reina SofÃ­a', 'Disfruta de las vistas', 0);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
