-- phpMyAdmin SQL Dump
-- version 4.8.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 03-04-2019 a las 23:47:37
-- Versión del servidor: 10.1.33-MariaDB
-- Versión de PHP: 7.2.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `bd_meteo10`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mediciones_diarias`
--

CREATE TABLE `mediciones_diarias` (
  `id` int(11) UNSIGNED NOT NULL,
  `fecha` date NOT NULL,
  `temperatura_max` decimal(6,4) NOT NULL,
  `temperatura_min` decimal(6,4) NOT NULL,
  `prevision_precipita` int(30) DEFAULT NULL,
  `observaciones` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `mediciones_diarias`
--

INSERT INTO `mediciones_diarias` (`id`, `fecha`, `temperatura_max`, `temperatura_min`, `prevision_precipita`, `observaciones`) VALUES
(1, '2019-03-26', '1.1000', '11.1000', 2, 'DIA TRANQUILO'),
(2, '2019-03-27', '1.1000', '2.2000', 11, 'Soleado');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `mediciones_diarias`
--
ALTER TABLE `mediciones_diarias`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `mediciones_diarias`
--
ALTER TABLE `mediciones_diarias`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
