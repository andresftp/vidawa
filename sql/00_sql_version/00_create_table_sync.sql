-- phpMyAdmin SQL Dump
-- version 4.6.6
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generaci�n: 10-04-2018 a las 05:08:33
-- Versi�n del servidor: 5.7.17-log
-- Versi�n de PHP: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `innclod_appclod`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `crm_syncdb`
--

CREATE TABLE `syncdb` (
  `id_sync` int(11) NOT NULL,
  `fecha` datetime NOT NULL,
  `file` varchar(255) NOT NULL,
  `version` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- �ndices para tablas volcadas
--

--
-- Indices de la tabla `crm_syncdb`
--
ALTER TABLE `syncdb`
  ADD PRIMARY KEY (`id_sync`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `crm_syncdb`
--
ALTER TABLE `syncdb`
  MODIFY `id_sync` int(11) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;