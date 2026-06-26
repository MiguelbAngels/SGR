-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 11-12-2019 a las 22:33:01
-- Versión del servidor: 10.4.8-MariaDB
-- Versión de PHP: 7.3.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `sgr`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `acciones`
--

CREATE TABLE `acciones` (
  `id_accion` int(11) NOT NULL,
  `titulo` varchar(150) NOT NULL,
  `descripcion` text NOT NULL,
  `id_meta` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `acciones`
--

INSERT INTO `acciones` (`id_accion`, `titulo`, `descripcion`, `id_meta`) VALUES
(5, 'Hackapalooza', 'Una actividad donde ser reúnen los estudiantes y aspirantes de la carrera para encontrar motivación en proyectos ya elaborados por egresantes de la carrera y en pronto egreso', 9),
(6, 'Conferencia con graduados', 'Se desea inspirar a los alumnos con la conferencia y dar motivación sobre los resultados que se obtienen una vez egresados de la universidad', 9);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `alertas`
--

CREATE TABLE `alertas` (
  `id` int(11) NOT NULL,
  `titulo` varchar(150) NOT NULL,
  `descripcion` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `alertas`
--

INSERT INTO `alertas` (`id`, `titulo`, `descripcion`, `created_at`) VALUES
(4, 'Tiempo limite de entrega !!', 'El 15 de diciembre es el último día dado por el CERN para subir reportes, favor de presentarlos, gracias', '2019-12-05 09:12:45'),
(5, 'Fecha de finalización', 'Fecha de finalización 12 de diciembre !!', '2019-12-05 09:13:21');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `alertas_individuales`
--

CREATE TABLE `alertas_individuales` (
  `id` int(11) NOT NULL,
  `titulo` text NOT NULL,
  `descripcion` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `id_profesor` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `alertas_individuales`
--

INSERT INTO `alertas_individuales` (`id`, `titulo`, `descripcion`, `created_at`, `id_profesor`) VALUES
(6, 'Error en reporte - sobresalto -', 'Tienes un error dentro del reporte sobre alumnos, en la descripción se sobre salta de un tema a otro de repente', '2019-12-10 03:28:55', 2),
(7, 'Sin archivos - reporte', 'Te hizo falta adjuntar imágenes en el reporte sobre la comunidad', '2019-12-10 03:29:57', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `areas`
--

CREATE TABLE `areas` (
  `id` int(11) NOT NULL,
  `nombre` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `descripcion` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_profesor_asignado` int(11) NOT NULL,
  `created_at` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `areas`
--

INSERT INTO `areas` (`id`, `nombre`, `descripcion`, `id_profesor_asignado`, `created_at`) VALUES
(3, 'Alumnos', 'Se espera lograr fomentar las relaciones de colaboración entre los estudiantes', 2, '2019-11-27'),
(4, 'Profesores', 'Se realizará un control en la forma de evaluar de los profesores a los alumnos', 52, '2019-11-29'),
(5, 'Software', 'Contabilidad y presupuesto para nuevo equipo en las instalaciones\r\n', 52, '2019-11-29');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `imagenes_reporte`
--

CREATE TABLE `imagenes_reporte` (
  `id` int(11) NOT NULL,
  `urlPhoto` varchar(255) NOT NULL,
  `id_reporte` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `imagenes_reporte`
--

INSERT INTO `imagenes_reporte` (`id`, `urlPhoto`, `id_reporte`) VALUES
(19, '../../imagenes/índice.png', 5),
(20, '../../imagenes/749075.png', 5),
(21, '../../imagenes/índice.jpg', 6),
(22, '../../imagenes/hackapalooza_sm.png', 7);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `metas`
--

CREATE TABLE `metas` (
  `id_meta` int(11) NOT NULL,
  `titulo` varchar(150) NOT NULL,
  `descripcion` text NOT NULL,
  `id_recomendacion` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `metas`
--

INSERT INTO `metas` (`id_meta`, `titulo`, `descripcion`, `id_recomendacion`) VALUES
(9, 'Juntar una gran comunidad', 'Tenemos como meta principal juntar a una gran comunidad para así poder lograr forjar un mejor ambiente en la carrera', 2),
(10, 'Una nueva liga', 'Deseamos crear una nueva liga para toda la federación universitaria', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `recomendaciones`
--

CREATE TABLE `recomendaciones` (
  `id_recomendacion` int(11) NOT NULL,
  `titulo` varchar(150) NOT NULL,
  `descripcion` text NOT NULL,
  `id_area` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `recomendaciones`
--

INSERT INTO `recomendaciones` (`id_recomendacion`, `titulo`, `descripcion`, `id_area`) VALUES
(2, 'que tal dsada', 'amasoida', '3'),
(3, 'gestion de recursosv2', 'para los profesores...v2', '4'),
(6, 'quien sabe', 'jajja', '3'),
(7, 'hola mundo', 'calando link', '3');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reportes_acciones`
--

CREATE TABLE `reportes_acciones` (
  `id_reporte_accion` int(11) NOT NULL,
  `titulo` varchar(150) NOT NULL,
  `recomen_inv` text NOT NULL,
  `descripcion` text NOT NULL,
  `tiempo` varchar(100) NOT NULL,
  `urlPhoto` varchar(200) NOT NULL,
  `id_area` int(11) NOT NULL,
  `fecha_creacion` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `reportes_acciones`
--

INSERT INTO `reportes_acciones` (`id_reporte_accion`, `titulo`, `recomen_inv`, `descripcion`, `tiempo`, `urlPhoto`, `id_area`, `fecha_creacion`) VALUES
(5, 'Generalización del icono de la universidad', '- 1.4.5 Fecha distinta\r\n- 1.4.6 Fecha contraria\r\n- 1.4.7 Nueva fecha', 'A wonderful serenity has taken possession of my entire soul, like these sweet mornings of spring which I enjoy with my whole heart. I am alone, and feel the charm of existence in this spot, which was created for the bliss of souls like mine. I am so happy, my dear friend, so absorbed in the exquisite sense of mere tranquil existence, that I neglect my talents. I should be incapable of drawing a single stroke at the present moment; and yet I feel that I never was a greater artist than now. ', '12 semanas', '', 3, '2019-12-10'),
(6, 'Re-definición estructura académica', ' - 1.4.6 Esta recomendación', 'A wonderful serenity has taken possession of my entire soul, like these sweet mornings of spring which I enjoy with my whole heart. I am alone, and feel the charm of existence in this spot, which was created for the bliss of souls like mine. I am so happy, my dear friend, so absorbed in the exquisite sense of mere tranquil existence, that I neglect my talents. I should be incapable of drawing a single stroke at the present moment; and yet I feel that I never was a greater artist than now. ', '12 horas', '', 3, '2019-12-10'),
(7, 'Hackapalooza', '- 1.6.5 Señalamiento automático por sistema autómata\r\n- 1.6.4 Enunciado, predicado y locutor de términos en una maquina de Turing', 'A wonderful serenity has taken possession of my entire soul, like these sweet mornings of spring which I enjoy with my whole heart. I am alone, and feel the charm of existence in this spot, which was created for the bliss of souls like mine. I am so happy, my dear friend, so absorbed in the exquisite sense of mere tranquil existence, that I neglect my talents. I should be incapable of drawing a single stroke at the present moment; and yet I feel that I never was a greater artist than now. ', '12 semanas', '', 3, '2019-12-10');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE `roles` (
  `id` int(2) NOT NULL,
  `rol` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `roles`
--

INSERT INTO `roles` (`id`, `rol`) VALUES
(1, 'administrador'),
(2, 'profesor');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nombre` varchar(150) NOT NULL,
  `username` varchar(150) NOT NULL,
  `password` varchar(150) NOT NULL,
  `id_rol` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombre`, `username`, `password`, `id_rol`) VALUES
(1, 'Miguel Angel', 'administrador@gmail.com', '4c882dcb24bcb1bc225391a602feca7c', 1),
(2, 'Esteban', 'miguel15bs@gmail.com', '4c882dcb24bcb1bc225391a602feca7c', 2),
(52, 'Ricardo', 'Ricardo@gmail.com', '4c882dcb24bcb1bc225391a602feca7c', 2);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `acciones`
--
ALTER TABLE `acciones`
  ADD PRIMARY KEY (`id_accion`);

--
-- Indices de la tabla `alertas`
--
ALTER TABLE `alertas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `alertas_individuales`
--
ALTER TABLE `alertas_individuales`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `areas`
--
ALTER TABLE `areas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `imagenes_reporte`
--
ALTER TABLE `imagenes_reporte`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `metas`
--
ALTER TABLE `metas`
  ADD PRIMARY KEY (`id_meta`);

--
-- Indices de la tabla `recomendaciones`
--
ALTER TABLE `recomendaciones`
  ADD PRIMARY KEY (`id_recomendacion`);

--
-- Indices de la tabla `reportes_acciones`
--
ALTER TABLE `reportes_acciones`
  ADD PRIMARY KEY (`id_reporte_accion`);

--
-- Indices de la tabla `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tipo_usuario` (`id_rol`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `acciones`
--
ALTER TABLE `acciones`
  MODIFY `id_accion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `alertas`
--
ALTER TABLE `alertas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `alertas_individuales`
--
ALTER TABLE `alertas_individuales`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `areas`
--
ALTER TABLE `areas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `imagenes_reporte`
--
ALTER TABLE `imagenes_reporte`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT de la tabla `metas`
--
ALTER TABLE `metas`
  MODIFY `id_meta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `recomendaciones`
--
ALTER TABLE `recomendaciones`
  MODIFY `id_recomendacion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `reportes_acciones`
--
ALTER TABLE `reportes_acciones`
  MODIFY `id_reporte_accion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `usuarios_roles` FOREIGN KEY (`id_rol`) REFERENCES `roles` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
