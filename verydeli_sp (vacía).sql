-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 19-11-2020 a las 21:01:03
-- Versión del servidor: 10.4.11-MariaDB
-- Versión de PHP: 7.4.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `verydeli_sp`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `vd_direcciones`
--

CREATE TABLE `vd_direcciones` (
  `id` int(11) NOT NULL,
  `id_provincia` int(11) NOT NULL,
  `id_ciudad` int(11) NOT NULL,
  `calle` varchar(40) NOT NULL,
  `numero` int(11) NOT NULL,
  `piso` int(2) DEFAULT NULL,
  `depto` varchar(1) DEFAULT NULL,
  `descripcion` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `vd_direcciones_ciudades`
--

CREATE TABLE `vd_direcciones_ciudades` (
  `id` int(11) NOT NULL,
  `id_provincia` int(11) NOT NULL,
  `nombre` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `vd_direcciones_ciudades`
--

INSERT INTO `vd_direcciones_ciudades` (`id`, `id_provincia`, `nombre`) VALUES
(1, 1, 'Ciudad Autonoma de Buenos Aire'),
(2, 1, 'La Plata'),
(3, 1, 'Mar del Plata'),
(4, 1, 'Bahia Blanca'),
(5, 1, 'Olavarría'),
(6, 1, 'Junín'),
(7, 1, 'Pergamino'),
(8, 1, 'Tandil'),
(9, 2, 'Córdoba'),
(10, 2, 'Río Cuarto'),
(11, 2, 'Villa María'),
(12, 2, 'Villa Dolores'),
(13, 2, 'Miramar'),
(14, 19, 'San Fernando del Valle'),
(15, 19, 'Belén'),
(16, 19, 'Fiambala'),
(17, 19, 'Recreo'),
(18, 9, 'Sáenz Peña'),
(19, 9, 'Charata'),
(20, 9, 'Villa Angela'),
(21, 9, 'Juan José Castelli'),
(22, 17, 'Trelew'),
(23, 17, 'Comodoro Rivadavia'),
(24, 17, 'Puerto Madryn'),
(25, 17, 'Esquel'),
(26, 10, 'Corrientes'),
(27, 10, 'Chajari'),
(28, 10, 'Goya'),
(29, 10, 'Mercedes'),
(30, 6, 'Paraná'),
(31, 6, 'Concordia'),
(32, 6, 'Gualeguaychú'),
(33, 6, 'Colon'),
(36, 16, 'Formosa'),
(37, 13, 'San Salvador de Jujuy'),
(38, 13, 'Tilcara'),
(39, 13, 'San Pedro de Jujuy'),
(43, 21, 'Santa Rosa'),
(44, 21, 'Gral. Pico'),
(45, 21, 'Gral. Roca'),
(46, 20, 'La Rioja'),
(47, 20, 'Chilecito'),
(48, 4, 'Mendoza'),
(49, 4, 'San Rafael'),
(50, 4, 'Malargue'),
(51, 4, 'Tunuyán'),
(52, 8, 'Posadas'),
(53, 8, 'Oberá'),
(54, 15, 'Neuquén'),
(55, 15, 'Zapala'),
(56, 15, 'Villa Pehuenia'),
(57, 14, 'Viedma'),
(58, 14, 'Las Grutas'),
(59, 14, 'Bariloche'),
(60, 7, 'Salta'),
(61, 7, 'Metán'),
(62, 12, 'San Juan'),
(63, 12, 'Chucuma'),
(64, 12, 'Villa Corral'),
(65, 18, 'San Luis'),
(66, 18, 'Villa Mercedes'),
(67, 18, 'Merlo'),
(68, 18, 'La Toma'),
(69, 18, 'La Punta'),
(70, 22, 'Rio Gallegos'),
(71, 22, 'Puerto San Julian'),
(72, 22, 'Puerto Deseado'),
(73, 3, 'Santa Fé'),
(74, 3, 'Rosario'),
(75, 3, 'Rafaela'),
(76, 11, 'Santiago del Estero'),
(77, 11, 'Quimili'),
(78, 11, 'Añatuya'),
(79, 23, 'Ushuaia'),
(80, 23, 'Rio Grande'),
(81, 5, 'San Miguel de Tucumán'),
(82, 5, 'Concepción');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `vd_direcciones_provincias`
--

CREATE TABLE `vd_direcciones_provincias` (
  `id` int(11) NOT NULL,
  `nombre` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `vd_direcciones_provincias`
--

INSERT INTO `vd_direcciones_provincias` (`id`, `nombre`) VALUES
(1, 'Buenos Aires'),
(19, 'Catamarca'),
(9, 'Chaco'),
(17, 'Chubut'),
(2, 'Córdoba'),
(10, 'Corrientes'),
(6, 'Entre Ríos'),
(16, 'Formosa'),
(13, 'Jujuy'),
(21, 'La Pampa'),
(20, 'La Rioja'),
(4, 'Mendoza'),
(8, 'Misiones'),
(15, 'Neuquén'),
(14, 'Río Negro'),
(7, 'Salta'),
(12, 'San Juan'),
(18, 'San Luis'),
(22, 'Santa Cruz'),
(3, 'Santa Fé'),
(11, 'Santiago del Estero'),
(23, 'Tierra del Fuego'),
(5, 'Tucumán');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `vd_envios`
--

CREATE TABLE `vd_envios` (
  `id` int(11) NOT NULL,
  `id_postulacion` int(11) NOT NULL,
  `confirmacion_solicitante` tinyint(1) NOT NULL DEFAULT 0,
  `confirmacion_responsable` tinyint(1) NOT NULL DEFAULT 0,
  `calificacion_solicitante` tinyint(1) DEFAULT NULL,
  `calificacion_responsable` tinyint(1) DEFAULT NULL,
  `comentario_solicitante` varchar(50) DEFAULT '',
  `comentario_responsable` varchar(50) DEFAULT '',
  `fecha` date DEFAULT NULL,
  `hora` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `vd_publicaciones`
--

CREATE TABLE `vd_publicaciones` (
  `id` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `id_direccion_origen` int(11) NOT NULL,
  `id_direccion_destino` int(11) NOT NULL,
  `tipo_vehiculo` varchar(30) NOT NULL,
  `titulo` varchar(100) NOT NULL,
  `fecha_salida` date NOT NULL,
  `hora_salida` time NOT NULL,
  `peso` int(9) NOT NULL,
  `medida_alto` int(3) NOT NULL,
  `medida_largo` int(3) NOT NULL,
  `medida_ancho` int(3) NOT NULL,
  `descripcion` varchar(300) DEFAULT '',
  `fecha` date NOT NULL DEFAULT current_timestamp(),
  `estado` tinyint(4) NOT NULL DEFAULT 0 COMMENT '0normal-1cerrada-2bloqueada'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `vd_publicaciones_comentarios`
--

CREATE TABLE `vd_publicaciones_comentarios` (
  `id` int(11) NOT NULL,
  `id_publicacion` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `id_usuario_respuesta` int(11) DEFAULT NULL,
  `texto` varchar(200) NOT NULL,
  `fecha` date NOT NULL DEFAULT current_timestamp(),
  `hora` time NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `vd_publicaciones_postulaciones`
--

CREATE TABLE `vd_publicaciones_postulaciones` (
  `id` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `id_publicacion` int(11) NOT NULL,
  `id_vehiculo` int(11) NOT NULL,
  `precio` int(9) NOT NULL,
  `fecha` date NOT NULL DEFAULT current_timestamp(),
  `estado` tinyint(4) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `vd_usuarios`
--

CREATE TABLE `vd_usuarios` (
  `id` int(11) NOT NULL,
  `nombre` varchar(30) NOT NULL,
  `apellido` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `dni` int(8) NOT NULL,
  `contraseña` varchar(64) NOT NULL,
  `avatar` varchar(30) NOT NULL,
  `fecha_registro` date NOT NULL DEFAULT current_timestamp(),
  `admin` tinyint(1) NOT NULL DEFAULT 0,
  `estado` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `vd_usuarios_vehiculos`
--

CREATE TABLE `vd_usuarios_vehiculos` (
  `id` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `tipo` varchar(30) NOT NULL,
  `patente` varchar(30) NOT NULL,
  `marca` varchar(20) NOT NULL,
  `modelo` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `vd_direcciones`
--
ALTER TABLE `vd_direcciones`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_provincia` (`id_provincia`),
  ADD KEY `id_ciudad` (`id_ciudad`);

--
-- Indices de la tabla `vd_direcciones_ciudades`
--
ALTER TABLE `vd_direcciones_ciudades`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_provincia` (`id_provincia`);

--
-- Indices de la tabla `vd_direcciones_provincias`
--
ALTER TABLE `vd_direcciones_provincias`
  ADD PRIMARY KEY (`id`),
  ADD KEY `nombre` (`nombre`);

--
-- Indices de la tabla `vd_envios`
--
ALTER TABLE `vd_envios`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_postulacion` (`id_postulacion`);

--
-- Indices de la tabla `vd_publicaciones`
--
ALTER TABLE `vd_publicaciones`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_usuario` (`id_usuario`),
  ADD KEY `id_direccion_origen` (`id_direccion_origen`),
  ADD KEY `id_direccion_destino` (`id_direccion_destino`);

--
-- Indices de la tabla `vd_publicaciones_comentarios`
--
ALTER TABLE `vd_publicaciones_comentarios`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_publicacion` (`id_publicacion`),
  ADD KEY `id_usuario` (`id_usuario`),
  ADD KEY `id_usuario_respuesta` (`id_usuario_respuesta`);

--
-- Indices de la tabla `vd_publicaciones_postulaciones`
--
ALTER TABLE `vd_publicaciones_postulaciones`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_usuario` (`id_usuario`),
  ADD KEY `id_publicacion` (`id_publicacion`),
  ADD KEY `id_vehiculo` (`id_vehiculo`);

--
-- Indices de la tabla `vd_usuarios`
--
ALTER TABLE `vd_usuarios`
  ADD PRIMARY KEY (`id`),
  ADD KEY `dni` (`dni`),
  ADD KEY `email` (`email`);

--
-- Indices de la tabla `vd_usuarios_vehiculos`
--
ALTER TABLE `vd_usuarios_vehiculos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_usuario` (`id_usuario`),
  ADD KEY `patente` (`patente`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `vd_direcciones`
--
ALTER TABLE `vd_direcciones`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `vd_direcciones_ciudades`
--
ALTER TABLE `vd_direcciones_ciudades`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=83;

--
-- AUTO_INCREMENT de la tabla `vd_direcciones_provincias`
--
ALTER TABLE `vd_direcciones_provincias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT de la tabla `vd_envios`
--
ALTER TABLE `vd_envios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `vd_publicaciones`
--
ALTER TABLE `vd_publicaciones`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `vd_publicaciones_comentarios`
--
ALTER TABLE `vd_publicaciones_comentarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `vd_publicaciones_postulaciones`
--
ALTER TABLE `vd_publicaciones_postulaciones`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `vd_usuarios`
--
ALTER TABLE `vd_usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `vd_usuarios_vehiculos`
--
ALTER TABLE `vd_usuarios_vehiculos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `vd_direcciones`
--
ALTER TABLE `vd_direcciones`
  ADD CONSTRAINT `vd_direcciones_ibfk_1` FOREIGN KEY (`id_provincia`) REFERENCES `vd_direcciones_provincias` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `vd_direcciones_ibfk_2` FOREIGN KEY (`id_ciudad`) REFERENCES `vd_direcciones_ciudades` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Filtros para la tabla `vd_direcciones_ciudades`
--
ALTER TABLE `vd_direcciones_ciudades`
  ADD CONSTRAINT `vd_direcciones_ciudades_ibfk_1` FOREIGN KEY (`id_provincia`) REFERENCES `vd_direcciones_provincias` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Filtros para la tabla `vd_envios`
--
ALTER TABLE `vd_envios`
  ADD CONSTRAINT `vd_envios_ibfk_1` FOREIGN KEY (`id_postulacion`) REFERENCES `vd_publicaciones_postulaciones` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Filtros para la tabla `vd_publicaciones`
--
ALTER TABLE `vd_publicaciones`
  ADD CONSTRAINT `vd_publicaciones_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `vd_usuarios` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `vd_publicaciones_ibfk_2` FOREIGN KEY (`id_direccion_origen`) REFERENCES `vd_direcciones` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `vd_publicaciones_ibfk_3` FOREIGN KEY (`id_direccion_destino`) REFERENCES `vd_direcciones` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `vd_publicaciones_comentarios`
--
ALTER TABLE `vd_publicaciones_comentarios`
  ADD CONSTRAINT `vd_publicaciones_comentarios_ibfk_1` FOREIGN KEY (`id_publicacion`) REFERENCES `vd_publicaciones` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `vd_publicaciones_comentarios_ibfk_2` FOREIGN KEY (`id_usuario`) REFERENCES `vd_usuarios` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `vd_publicaciones_comentarios_ibfk_3` FOREIGN KEY (`id_usuario_respuesta`) REFERENCES `vd_usuarios` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Filtros para la tabla `vd_publicaciones_postulaciones`
--
ALTER TABLE `vd_publicaciones_postulaciones`
  ADD CONSTRAINT `vd_publicaciones_postulaciones_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `vd_usuarios` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `vd_publicaciones_postulaciones_ibfk_2` FOREIGN KEY (`id_publicacion`) REFERENCES `vd_publicaciones` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `vd_publicaciones_postulaciones_ibfk_3` FOREIGN KEY (`id_vehiculo`) REFERENCES `vd_usuarios_vehiculos` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Filtros para la tabla `vd_usuarios_vehiculos`
--
ALTER TABLE `vd_usuarios_vehiculos`
  ADD CONSTRAINT `vd_usuarios_vehiculos_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `vd_usuarios` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

DELIMITER $$
--
-- Eventos
--
CREATE DEFINER=`root`@`localhost` EVENT `cerrar_publicaciones_vencidas` ON SCHEDULE EVERY 1 DAY STARTS '2020-11-20 00:00:00' ON COMPLETION NOT PRESERVE ENABLE DO UPDATE vd_publicaciones 
SET estado = 1 
WHERE fecha_salida <= CURDATE() 
AND estado = 0$$

DELIMITER ;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
