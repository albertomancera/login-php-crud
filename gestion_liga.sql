-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 15-01-2026 a las 15:33:56
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `gestion_liga`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `equipos`
--

CREATE TABLE `equipos` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `ciudad` varchar(100) NOT NULL,
  `capacidad_estadio` int(11) NOT NULL,
  `fecha_fundacion` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `equipos`
--

INSERT INTO `equipos` (`id`, `nombre`, `ciudad`, `capacidad_estadio`, `fecha_fundacion`) VALUES
(1, 'Albacete Balompié', 'Albacete', 17524, '1940-08-01'),
(2, 'UD Almería', 'Almería', 18331, '1989-07-26'),
(3, 'FC Andorra', 'Andorra la Vieja', 5108, '1942-10-15'),
(4, 'Burgos CF', 'Burgos', 12194, '1985-08-13'),
(5, 'Cádiz CF', 'Cádiz', 20724, '1910-09-10'),
(6, 'CD Castellón', 'Castellón', 15500, '1922-07-20'),
(7, 'AD Ceuta FC', 'Ceuta', 6500, '1956-01-01'),
(8, 'Córdoba CF', 'Córdoba', 20000, '1954-08-06'),
(9, 'Cultural Leonesa', 'León', 13346, '1923-08-05'),
(10, 'RC Deportivo', 'La Coruña', 32490, '1906-03-02'),
(11, 'SD Eibar', 'Éibar', 8164, '1940-11-30'),
(12, 'Granada CF', 'Granada', 19336, '1931-04-06'),
(13, 'SD Huesca', 'Huesca', 9100, '1960-03-29'),
(14, 'UD Las Palmas', 'Las Palmas', 32400, '1949-08-22'),
(15, 'CD Leganés', 'Leganés', 12450, '1928-06-23'),
(16, 'Málaga CF', 'Málaga', 30044, '1994-06-29'),
(17, 'CD Mirandés', 'Miranda de Ebro', 5759, '1927-05-03'),
(18, 'Racing de Santander', 'Santander', 22222, '1913-02-23'),
(19, 'Real Sociedad B', 'San Sebastián', 2500, '1951-01-01'),
(20, 'Sporting de Gijón', 'Gijón', 29371, '1905-07-01'),
(21, 'Real Valladolid', 'Valladolid', 27618, '1928-06-20'),
(22, 'Real Zaragoza', 'Zaragoza', 33608, '1932-03-18'),
(24, 'Real Madrid', 'Madrid', 90000, '2000-02-01');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `username` varchar(200) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `username`, `password`) VALUES
(1, 'alberto', '$2y$10$se50CKRVY7tCWHyON94hNe6pKSK3JcJdPeEwhBbPtdBET1IIyvN/G');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `equipos`
--
ALTER TABLE `equipos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `equipos`
--
ALTER TABLE `equipos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
