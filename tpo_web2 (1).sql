-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 05-10-2023 a las 17:40:31
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
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`Producto`, `Imagen`, `Precio`, `id`) VALUES
('Fruta del diablo', 'data:image/jpeg;base64,/9j/4AAQSkZJRgABAQAAAQABAAD/2wCEAAoHCBUVFBcUFBUYFxcZFxoZGhgaGhkaGhcaGRkZGiAZFxcaIiwkGh0pHhcXJTYkKS0vMzUzGSI4PjgyPSwyMy8BCwsLDw4PHRISHTQpIiIyMjIyMjIyMjIyMjIyMjIyMjIyMjIyMjIyMjIyMjIyMjIyMjIyMjIyMjIyMjIyMjIyMv/AABEIAK8BIQMBIgACEQEDEQH/xAAcAAACAgMBAQAAAAAAAAAAAAADBAIFAAEGBwj/xABGEAACAQIEAwYDBgMFBgUFAAABAhEAAwQSITFBUWEFEyIycYFCUpEGI2JyobEUM5IHFVOCwUOTorLR4RZjwtLxc4Oj4vD/xAAZAQEBAQEBAQAAAAAAAAAAAAAAAQIDBAX/xAAnEQEBAAICAgIBAwUBAAAAAAAAAQIRAyESMUFRYSIycQQUI6GxE//aAAwDAQACEQMRAD8A6RamBWlFEVK5bcdtBByonpWZawJTa7DM86iRRSlb7ups2gh1phDQslFQGmzaUVlGC6VS4nFC4MzT3UgKq+bENwVRxQxt8UEnwebOWcxm1xxtM/xZfS0Aw2NxiQg/LGtw+mmhGYGlu/Qkzea5zWypIB/+0GYe7UdcA9z+aPDwtDyAfj/xD08o000k21nBaARAjQcvaseGWfu6/Eb8sZ6ijPd/JiI5zf8A2DT+lRGLUMoS5nllBtMPvACQMwEBxEycwOg3FdIcJFCaxVx4rjdy1P8A038Fa1R2t1HLXXTIU1qajjcZatAG5cRAdBmIBY8lG7HoKpj9prbEi1bu3IJBYr3SAjhmuQx9lNamNvqC7JobCuYxHbuIJIVVUDzZF7wqd9HuMoJjgENLYzOy5rmJugDUnMqKejKiqCOldZwZVdOpuQN9PWkXvL8w+ormzaQpbPdobrgRmWcpiWJzagDlzgcaIMFatgsyKxMAsUBZuAAUDmdFAjWtf21+2l8HnjW81c9bwlotHcC2SCQcqKSAQDBQyPMK0mGK3ciXLoVkLEd4zZCGUCA8iDmb+jSpf6bL4o6EPUs9UOIxNy0oY3FcZlX7xQpMkDzpAECT5eFTTt5RGa3cI+e0rXU/qVZ/SuWXDnj7jOqvJrTJQ8Fi7d2e7uKxG6g+JfzIdV9xTgt1hNEHt0KCKtDYqLYWhoot2pTRTha01iKaA5rAaw26kimpqtSwVFplGigItFyVFF76t0v3dZWgZHFMrdFcinaRmNWbfKqszEc8igkj2p1cVcyybV3/AHVz9omsXOT25at9R0Zug1rOK5xO11BCsSjHZXVkJ9FcAmmB2h1ptnelw1yK2t3nVKe0QONQPaB+YVNnkv0uCiZhXMpjzMzWjjyeNalPJdYu53hFpToRNw8kmMvQuZHor8YoXZ91Xc3jsJSyOCoDBuAc3I0PyhYiTKCMwwzOCe8vsFUzqA5yKyzytg3I5zTuDw+UBQsKAABwAGgAr', 6000, 20),
('Varita de sauco', 'https://files.cults3d.com/uploaders/13983445/illustration-file/1c1ab992-d5d5-4b4b-8012-8aa30344175e/varita%20de%20sauco.jpg', 5000, 21),
('Kunai', 'https://upload.wikimedia.org/wikipedia/commons/d/d1/Kunai05.jpg', 1000, 22),
('Katana Rorona Zoro', 'https://http2.mlstatic.com/D_NQ_NP_945179-MLA70287604775_072023-O.webp', 10000, 25),
('Set de Katanas| Demon slayer', 'https://ae01.alicdn.com/kf/Se917ad7447dd4e53a5b6c5419e83667d2/Katana-de-Demon-Slayer-para-ni-os-espada-Katana-de-80-CM-1-1-cuchillo-de.jpg_960x960.jpg', 10000, 26),
('Espada de Gryffindor', 'https://static.wikia.nocookie.net/esharrypotter/images/7/7f/GryffindorsSword_PM.jpg/revision/latest?cb=20210924175106', 10000, 33),
('Caliz de fuego', 'https://http2.mlstatic.com/D_NQ_NP_908012-MLA51774703277_092022-O.webp', 400, 34),
('Huevo de oro', 'https://elenanofriki.com/36788-large_default/replica-huevo-dorado-torneo-de-los-tres-magos-harry-potter.jpg', 10000, 35),
('Giratiempo', 'https://static.wikia.nocookie.net/esharrypotter/images/1/1b/Giratiempo.jpg/revision/latest?cb=20110809234156', 10000, 36),
('Nimbus 2000| Replica', 'https://files.cults3d.com/uploaders/14399726/illustration-file/ec9e7b03-fd34-4cd3-8b8c-c2c96ced9139/untitled.62.jpg', 100000, 39),
('Remera sekiro', 'https://goodsrepublic.com/media/binary/005/721/178/5721178.jpg', 5000, 40),
('Saeta de fuego | Replica', 'data:image/jpeg;base64,/9j/4AAQSkZJRgABAQAAAQABAAD/2wCEAAoHCBUUEhcUEhUYFxcaGxceGxobGx0aFxsYGBgaGBogHBcbIC4kGx0pIB4YJTYmKS4wMzQ0GyI5PjkxPSwyMzABCwsLEA4QHhISHTQpJCkyOzg1MjQwMjUyND00MjIyMjIyMjQyMjIyMjIyNDIyMjIyMjIyMjIyMjsyMjIyMjIyMv/AABEIAMwA9wMBIgACEQEDEQH/xAAcAAEAAgMBAQEAAAAAAAAAAAAABQYBBAcDAgj/xABDEAACAQIEAwYCBgcHAwUAAAABAgMAEQQFEiEGMUETIlFhcYEykUJScqGx8AcUIzNiksEWgqKywtHxFSQ0Q1Oj0uH/xAAZAQEAAwEBAAAAAAAAAAAAAAAAAQIDBAX/xAAuEQACAgEDAwIFAwUBAAAAAAAAAQIRAxIhMRNBUQQiMkJhcYFSkbFiocHh8BT/2gAMAwEAAhEDEQA/AOy1WuL8bDGqHEDUl2JQWLMAttluCbE39qlM4zNcNEZHuQOQHMmxNUHCYdMwWTEzapXuQkakppAtY3Nttx5c+dc2ea+Fcm2KHzPg3MrwUS4mLEYZm0SD4GJ1Ajcncnu6T+NdATcCq9k2RCIhju9rE9B1IUdB09qsYFhVsMHFO+5GWWpn1SlK3MhSlKAUpSgFKUoBSlKAUpSgFKUoBSlKAUpSgFKUoBSlKAUpSgFKUoBSlKAq/FeNiVo45VLhtZZRuQoW2o+AuQPUioTgjDoZJZI31oSFQndlVS1l8rC1xWzxLHF+su8k5gdUQK+q3dNyRp67hTt4CtHgZWjnNyW7TtHLE317qQ1/PUfnXDd5U35OtKsTp9josaWFq+6wKzXccgpSlAKUpQClKUApSlAKUpQClKUApSlAKUpQClKUApSlAKUpQClKUApSlAKUpQHOv0iZWO2ixARnB7rABWGtTeMsjbEXNj4io3h7OVixbxF7gkNsoCxtcK690ABST0679a6RmWE7V', 10000, 45);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto_usuario`
--

CREATE TABLE `producto_usuario` (
  `Nombre` varchar(255) NOT NULL,
  `Producto` varchar(255) NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `producto_usuario`
--

INSERT INTO `producto_usuario` (`Nombre`, `Producto`, `id`) VALUES
('', '', 2),
('', '', 3),
('dfgdfgdfgd', 'Nimbus 2000| Replica', 6),
('dfgdfgdfgd', 'Remera sekiro', 7),
('dfgdfgdfgd', 'Saeta de fuego | Replica', 8),
('dfgdfgdfgd', 'Saeta de fuego | Replica', 9),
('dfgdfgdfgd', 'Saeta de fuego | Replica', 10);

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
('ignaciocasas132@gmail.com', 'dfgdfgdfgd', '$2y$10$aA8lHiU9.LRkSIEGZ5Cp8.e2/Kay5o7YEoEpnwj63FwGk5XrlzOmC', 1);

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
-- Indices de la tabla `producto_usuario`
--
ALTER TABLE `producto_usuario`
  ADD PRIMARY KEY (`id`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT de la tabla `producto_usuario`
--
ALTER TABLE `producto_usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
