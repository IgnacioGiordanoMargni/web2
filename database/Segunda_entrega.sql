-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 18-10-2023 a las 01:07:29
-- Versión del servidor: 10.4.28-MariaDB
-- Versión de PHP: 8.1.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `tpo_web2`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `Producto` varchar(45) NOT NULL,
  `Imagen` varchar(1500) NOT NULL,
  `Precio` int(45) NOT NULL,
  `id` int(11) NOT NULL,
  `Categoria` varchar(255) NOT NULL,
  `Descripcion` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`Producto`, `Imagen`, `Precio`, `id`, `Categoria`, `Descripcion`) VALUES
('Kunai', 'https://upload.wikimedia.org/wikipedia/commons/d/d1/Kunai05.jpg', 1000, 22, 'Naruto', 'Kunai afilado y versátil! Perfecto para lanzar, cortar y más. Herramienta esencial para entusiastas de la cultura ninja. ¡Obtén el tuyo ahora! (no nos hacemos responsables de como se utilizara luego de comprado)'),
('Katana Rorona Zoro', 'https://http2.mlstatic.com/D_NQ_NP_945179-MLA70287604775_072023-O.webp', 10000, 25, 'One Piece', 'Katana legendaria Enma, portada por el ex-cazarrecompensas Roronoa Zoro. Capaz de absorber Haki, esta espada logra ser extremadamente afilada (No nos hacemos cargo en caso de que zoro vuelva a buscarla)'),
('Set de Katanas| Demon slayer', 'https://ae01.alicdn.com/kf/Se917ad7447dd4e53a5b6c5419e83667d2/Katana-de-Demon-Slayer-para-ni-os-espada-Katana-de-80-CM-1-1-cuchillo-de.jpg_960x960.jpg', 10000, 26, 'Demon Slayer', 'Set vario de espadas Nichirin antiguamente usadas por Tanjiro y sus compañeros caza-demonios. Estas armas todavia siguen afiladas y listas para la accion!'),
('Caliz de fuego', 'https://http2.mlstatic.com/D_NQ_NP_908012-MLA51774703277_092022-O.webp', 400, 34, 'Harry Potter', 'El Cáliz de Fuego, reliquia mágica legendaria del Torneo de los Tres Magos. Potencia la magia, desvela misterios, y lanza hechizos asombrosos. Una oportunidad única para poseer un tesoro de la historia de Hogwarts'),
('Huevo de oro', 'https://elenanofriki.com/36788-large_default/replica-huevo-dorado-torneo-de-los-tres-magos-harry-potter.jpg', 10000, 35, 'Harry Potter', 'Huevo de oro especial utilizado en las pruebas de los Tres Magos, este objeto limitado y extremadamente raro fue adquirido por Cedric Diggory, solo esperamos no tener que volver a aquella laguna infestada de Selkies...');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `Mail` varchar(255) NOT NULL,
  `Nombre` varchar(255) NOT NULL,
  `Contraseña` varchar(255) NOT NULL,
  `Permisos` int(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`Mail`, `Nombre`, `Contraseña`, `Permisos`) VALUES
('hdgasfgadfsg', 'sdfdfasdf', '$2y$10$UrJyCcNM/QQxWf0DWzhDsO9sbkOHzARinAVAplkeNt1fCRFGlzZK6', 0),
('Icasas760@gmail.com', 'Nacho', '$2y$10$yZ3QrbNqx5pozXQ95kjn9OaWUDwbvKFo1ait0Jp0IB4cn2YUsd3sm', 0),
('ignaciocasas132@gmail.com', 'dfgdfgdfgd', '$2y$10$aA8lHiU9.LRkSIEGZ5Cp8.e2/Kay5o7YEoEpnwj63FwGk5XrlzOmC', 1),
('jorgemorcillo1966@gmail.com', 'matias', '$2y$10$AjevlZ/bOQ.4Kg638AJtLuZssBTD8AL6iWP9WUadMxBbz7wN.ku5e', 1),
('matias', 'a', '$2y$10$pzb6zG8SOj3ghF3avfTxUujZkVeFXrfjAznkocOqfROOiF64NZTIW', 0);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `Producto` (`Producto`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`Mail`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
