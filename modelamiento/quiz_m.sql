-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 21-05-2023 a las 23:48:41
-- Versión del servidor: 10.4.28-MariaDB
-- Versión de PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `quiz`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `formulario`
--

CREATE TABLE `formulario` (
  `id` int(11) NOT NULL,
  `nombre` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `formulario`
--

INSERT INTO `formulario` (`id`, `nombre`) VALUES
(1, 'Scrum');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `preguntas`
--

CREATE TABLE `preguntas` (
  `id` int(11) NOT NULL,
  `pregunta` varchar(255) NOT NULL,
  `respuesta` varchar(200) NOT NULL,
  `id_formulario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `preguntas`
--

INSERT INTO `preguntas` (`id`, `pregunta`, `respuesta`, `id_formulario`) VALUES
(1, '¿Verdadero  o falso? El Sprint Backlog es una lista ordenada de requerimientos del proyecto?', 'falso', 1),
(2, '¿Verdadero  o falso? El equipo Scrum no necesita documentar su trabajo?', 'falso', 1),
(3, '¿Verdadero  o falso? ¿La Reunión Diaria de Scrum es una oportunidad para que el equipo Scrum resuelva problemas?', 'verdadero', 1),
(4, '¿Verdadero  o falso? El Scrum Master es el jefe del equipo Scrum?', 'falso', 1),
(5, '¿Verdadero  o falso? ¿El Sprint Backlog se crea en la Reunión de Planificación del Sprint?', 'verdadero', 1),
(6, '¿Verdadero  o falso? ¿El objetivo de la Retrospectiva de Sprint es identificar los problemas que surgieron durante el Sprint?', 'verdadero', 1),
(7, '¿Verdadero  o falso? ¿El Product Owner es responsable de priorizar el trabajo en el Product Backlog?', 'verdadero', 1),
(8, '¿Verdadero  o falso? El Sprint Planning es una reunión que se lleva a cabo al final de cada Sprint?', 'falso', 1),
(9, '¿Verdadero  o falso? El objetivo de la Revisión de Sprint es evaluar el desempeño individual de cada miembro del equipo Scrum?', 'falso', 1),
(10, '¿Verdadero  o falso? ¿La Reunión de Revisión de Sprint es una oportunidad para que el equipo Scrum reflexione sobre su desempeño y busque formas de mejorar?', 'falso', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nombre` varchar(200) NOT NULL,
  `Email` varchar(200) NOT NULL,
  `contrasena` varchar(200) NOT NULL,
  `rol` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombre`, `Email`, `contrasena`, `rol`) VALUES
(1, 'Miguel Tobar', 'migueltobar@unicomfacauca.edu.co', '1234', 1),
(2, 'Luis vivas', 'luisvivas@unicomfacauca.edu.co', '456', 1),
(3, 'Rodrigo', 'RodrigoAndres@unicomfacauca.edu.co', '789', 2);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `formulario`
--
ALTER TABLE `formulario`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `preguntas`
--
ALTER TABLE `preguntas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_formulario` (`id_formulario`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `formulario`
--
ALTER TABLE `formulario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `preguntas`
--
ALTER TABLE `preguntas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `preguntas`
--
ALTER TABLE `preguntas`
  ADD CONSTRAINT `preguntas_ibfk_1` FOREIGN KEY (`id_formulario`) REFERENCES `formulario` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
