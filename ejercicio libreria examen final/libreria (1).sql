-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 09-04-2019 a las 12:17:46
-- Versión del servidor: 10.1.37-MariaDB
-- Versión de PHP: 7.3.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `libreria`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `autores`
--

CREATE TABLE `autores` (
  `codautor` int(11) NOT NULL,
  `nombre` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `lugar` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `nacimiento` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `autores`
--

INSERT INTO `autores` (`codautor`, `nombre`, `lugar`, `nacimiento`) VALUES
(1, 'Miguel Angel Aguilar', 'Madrid', 1943),
(2, 'Rafael Abella', 'Méjico', 1951),
(3, 'Bárbara Alpuente', 'Madrid', 1974),
(4, 'Teresa Álvarez', 'Asturias', 1945),
(5, 'Tomás Alcoberro', 'Barcelona', 1940);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `editoriales`
--

CREATE TABLE `editoriales` (
  `nif` varchar(10) COLLATE utf8_spanish_ci NOT NULL,
  `nombre` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `telefono` varchar(9) COLLATE utf8_spanish_ci NOT NULL,
  `direccion` varchar(25) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `editoriales`
--

INSERT INTO `editoriales` (`nif`, `nombre`, `telefono`, `direccion`) VALUES
('25668B', 'Planeta', '11111111', 'Aaaaaaaaaaaaaa'),
('3566B', 'Círculo Rojo', '2222222', 'bBBbnbnbnbbnb'),
('6767N', 'Alcalá Grupo', '3333333', 'Hgjgjgjhgjhjk'),
('9898J', 'Alfaguara', '4444444', 'Jhgjg jgjg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `libros`
--

CREATE TABLE `libros` (
  `isbn` varchar(10) COLLATE utf8_spanish_ci NOT NULL,
  `titulo` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `genero` varchar(15) COLLATE utf8_spanish_ci NOT NULL,
  `precio` int(11) NOT NULL,
  `paginas` int(11) NOT NULL,
  `codigoautor` int(11) NOT NULL,
  `nifeditorial` varchar(10) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `libros`
--

INSERT INTO `libros` (`isbn`, `titulo`, `genero`, `precio`, `paginas`, `codigoautor`, `nifeditorial`) VALUES
('13a', 'El Alquimista', 'aventuras', 12, 450, 1, '25668B'),
('a01', 'El enigma de Ana', 'Novela', 6, 352, 4, '25668B'),
('a02', 'En silla de pista', 'Actualidad', 20, 416, 1, '3566B'),
('a03', 'Isabel II', 'Historia', 18, 240, 4, '6767N'),
('a04', 'El amor se me hace bola', 'Humor', 17, 208, 3, '9898J'),
('a05', 'Madre Sacramento', 'Historia', 18, 336, 4, '25668B'),
('a06', 'Los años del nodo', 'Historia', 9, 368, 2, '3566B'),
('a07', 'El decano', 'CC humanas', 21, 400, 5, '9898J'),
('a08', 'Los alcones del mar', 'Historia', 15, 272, 2, '25668B'),
('a09', 'Más allá de mi', 'Ficción', 6, 198, 3, '6767N'),
('a10', 'La historia desde mi balcón', 'CC humanas', 19, 296, 5, '6767N');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `autores`
--
ALTER TABLE `autores`
  ADD PRIMARY KEY (`codautor`);

--
-- Indices de la tabla `editoriales`
--
ALTER TABLE `editoriales`
  ADD PRIMARY KEY (`nif`);

--
-- Indices de la tabla `libros`
--
ALTER TABLE `libros`
  ADD PRIMARY KEY (`isbn`),
  ADD KEY `codigoautor_fk` (`codigoautor`),
  ADD KEY `nifeditorial_fk` (`nifeditorial`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `autores`
--
ALTER TABLE `autores`
  MODIFY `codautor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `libros`
--
ALTER TABLE `libros`
  ADD CONSTRAINT `libros_ibfk_1` FOREIGN KEY (`nifeditorial`) REFERENCES `editoriales` (`nif`) ON UPDATE CASCADE,
  ADD CONSTRAINT `libros_ibfk_2` FOREIGN KEY (`codigoautor`) REFERENCES `autores` (`codautor`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
