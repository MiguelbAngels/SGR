-- SQL Dump Limpio para SGR (Schema Only + Demo Data)
-- Servidor: MySQL / MariaDB

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

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `imagenes_reporte`
--

CREATE TABLE `imagenes_reporte` (
  `id` int(11) NOT NULL,
  `urlPhoto` varchar(255) NOT NULL,
  `id_reporte` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE `roles` (
  `id` int(2) NOT NULL,
  `rol` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Datos iniciales del sistema para la tabla `roles`
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
-- Datos de prueba genéricos para la tabla `usuarios`
-- (Contraseña por defecto para ambos usuarios: 12345)
--

INSERT INTO `usuarios` (`id`, `nombre`, `username`, `password`, `id_rol`) VALUES
(1, 'Admin Demo', 'admin@demo.com', '827ccb0eea8a706c4c34a16891f84e7b', 1),
(2, 'Professor Demo', 'teacher@demo.com', '827ccb0eea8a706c4c34a16891f84e7b', 2);

--
-- Índices para tablas volcadas
--

ALTER TABLE `acciones`
  ADD PRIMARY KEY (`id_accion`);

ALTER TABLE `alertas`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `alertas_individuales`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `areas`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `imagenes_reporte`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `metas`
  ADD PRIMARY KEY (`id_meta`);

ALTER TABLE `recomendaciones`
  ADD PRIMARY KEY (`id_recomendacion`);

ALTER TABLE `reportes_acciones`
  ADD PRIMARY KEY (`id_reporte_accion`);

ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tipo_usuario` (`id_rol`);

--
-- AUTO_INCREMENT de las tablas
--

ALTER TABLE `acciones`
  MODIFY `id_accion` int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE `alertas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE `alertas_individuales`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE `areas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE `imagenes_reporte`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE `metas`
  MODIFY `id_meta` int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE `recomendaciones`
  MODIFY `id_recomendacion` int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE `reportes_acciones`
  MODIFY `id_reporte_accion` int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE `roles`
  MODIFY `id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Restricciones / Relaciones
--

ALTER TABLE `usuarios`
  ADD CONSTRAINT `usuarios_roles` FOREIGN KEY (`id_rol`) REFERENCES `roles` (`id`);

COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;