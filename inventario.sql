-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 05-08-2019 a las 19:57:57
-- Versión del servidor: 10.1.38-MariaDB
-- Versión de PHP: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `inventario`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `jefes`
--

CREATE TABLE `jefes` (
  `id_jefes` int(9) NOT NULL,
  `nombre` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `ap` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `am` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `institucion` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `bachillerato` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `edad` varchar(3) COLLATE utf8_spanish_ci NOT NULL,
  `sexo` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `correo_electronico` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `carrera` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `tipo_usuario` varchar(40) COLLATE utf8_spanish_ci NOT NULL,
  `correo` varchar(60) COLLATE utf8_spanish_ci NOT NULL,
  `password` varchar(30) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `jefes`
--

INSERT INTO `jefes` (`id_jefes`, `nombre`, `ap`, `am`, `institucion`, `bachillerato`, `edad`, `sexo`, `correo_electronico`, `carrera`, `tipo_usuario`, `correo`, `password`) VALUES
(1, '', '', '', '', '', '', '', '', '', 'administrador', 'admin@gmail.com', 'admin'),
(2, 'Cristiano', 'Ronaldo', 'Santos', 'Universidad de Lisboa ', 'Quimico', '34', 'Hombre', 'ronaldo@gmail.com', 'TecnologÃ­as de la InformaciÃ³n', '', '1', ''),
(3, 'Lionel', 'Messi', 'Perez', 'River Plate', 'Informatica', '32', 'Hombre', 'messi@gmail.com', 'Gastronomia', '', '79', ''),
(4, 'Raul Alonso', 'Jimenez', 'Moreno', 'Wolves', 'Desarrollo', '27', 'Hombre', 'jimenez@gmail.com', 'Desarrollo de Negocios', '', '45', ''),
(5, 'Marco Antonio', 'Nestor', 'Galeana', 'UTA', 'Mantenimiento', '19', 'Hombre', 'marco@gmail.com', 'TecnologÃ­as de la InformaciÃ³n', '', '21', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `puntos`
--

CREATE TABLE `puntos` (
  `id_jefes` int(9) NOT NULL,
  `tics` varchar(10) NOT NULL,
  `gastronomia` varchar(10) NOT NULL,
  `mantenimiento` varchar(10) NOT NULL,
  `desarrollo` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `puntos`
--

INSERT INTO `puntos` (`id_jefes`, `tics`, `gastronomia`, `mantenimiento`, `desarrollo`) VALUES
(2, '9', '7', '2', '6'),
(5, '12', '4', '5', '3');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `respuestas`
--

CREATE TABLE `respuestas` (
  `id_jefes` int(9) NOT NULL,
  `carrera` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `respuestas`
--

INSERT INTO `respuestas` (`id_jefes`, `carrera`) VALUES
(2, 'TecnologÃ­as de la InformaciÃ³n'),
(2, 'TecnologÃ­as de la InformaciÃ³n'),
(2, 'TecnologÃ­as de la InformaciÃ³n'),
(2, 'TecnologÃ­as de la informaciÃ³n'),
(2, 'GastronomÃ­a'),
(2, 'GastronomÃ­a'),
(2, 'TecnologÃ­as de la informaciÃ³n'),
(2, 'GastronomÃ­a'),
(2, 'Desarrollo de negocios'),
(2, 'TecnologÃ­as de la informaciÃ³n'),
(2, 'Desarrollo de negocios'),
(2, 'Desarrollo de negocios'),
(2, 'GastronomÃ­a'),
(2, 'TecnologÃ­as de la InformaciÃ³n'),
(2, 'TecnologÃ­as de la InformaciÃ³n'),
(2, 'GastronomÃ­a'),
(2, 'GastronomÃ­a'),
(2, 'GastronomÃ­a'),
(2, 'Mantenimiento Industrial'),
(2, 'Mantenimiento Industrial'),
(2, 'Desarrollo de negocios'),
(2, 'TecnologÃ­as de la informaciÃ³n'),
(2, 'Desarrollo de negocios'),
(2, 'Desarrollo de negocios'),
(5, 'TecnologÃ­as de la InformaciÃ³n'),
(5, 'TecnologÃ­as de la InformaciÃ³n'),
(5, 'TecnologÃ­as de la InformaciÃ³n'),
(5, 'TecnologÃ­as de la informaciÃ³n'),
(5, 'GastronomÃ­a'),
(5, 'Desarrollo de negocios'),
(5, 'TecnologÃ­as de la informaciÃ³n'),
(5, 'Mantenimiento Industrial'),
(5, 'Mantenimiento Industrial'),
(5, 'TecnologÃ­as de la informaciÃ³n'),
(5, 'Desarrollo de negocios'),
(5, 'Desarrollo de negocios'),
(5, 'TecnologÃ­as de la InformaciÃ³n'),
(5, 'TecnologÃ­as de la InformaciÃ³n'),
(5, 'TecnologÃ­as de la InformaciÃ³n'),
(5, 'TecnologÃ­as de la informaciÃ³n'),
(5, 'GastronomÃ­a'),
(5, 'GastronomÃ­a'),
(5, 'TecnologÃ­as de la informaciÃ³n'),
(5, 'Mantenimiento Industrial'),
(5, 'Mantenimiento Industrial'),
(5, 'TecnologÃ­as de la informaciÃ³n'),
(5, 'GastronomÃ­a'),
(5, 'Mantenimiento Industrial');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `jefes`
--
ALTER TABLE `jefes`
  ADD PRIMARY KEY (`id_jefes`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `jefes`
--
ALTER TABLE `jefes`
  MODIFY `id_jefes` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
