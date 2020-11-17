-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 17-11-2020 a las 20:56:37
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

--
-- Volcado de datos para la tabla `vd_direcciones`
--

INSERT INTO `vd_direcciones` (`id`, `id_provincia`, `id_ciudad`, `calle`, `numero`, `piso`, `depto`, `descripcion`) VALUES
(1, 18, 67, 'Avenida ejemplo', 190, 2, 'C', 'Edificio verde en la esquina con la calle \"ejemplo\"'),
(2, 18, 66, 'Calle ejemplo', 74, 0, '', 'Entre el edificio \"ejemplo\" y la casa \"ejemplo\".'),
(3, 18, 67, 'Calle Ejemplo', 25, 0, '', ''),
(4, 18, 67, 'Avenida Ejemplo', 341, 0, '', ''),
(5, 18, 67, 'Calle Ejemplo', 23, 0, '', ''),
(6, 18, 67, 'Calle Ejemplo 340', 230, 0, '', ''),
(7, 18, 65, 'Calle Ejemplo', 12, 0, '', ''),
(8, 18, 66, 'Calle Ejemplo', 90, 0, '', ''),
(9, 18, 65, 'Calle Ejemplo', 85, 0, '', ''),
(10, 2, 10, 'Avenida Ejemplo', 99, 0, '', ''),
(11, 18, 66, 'Calle Ejemplo', 90, 0, '', ''),
(12, 1, 4, 'Calle Ejemplo', 1309, 0, '', ''),
(13, 23, 79, 'Calle Ejemplo', 10, 0, '', ''),
(14, 8, 52, 'Calle Ejemplo', 20, 0, '', ''),
(15, 23, 79, 'Calle Ejemplo', 13, 0, '', ''),
(16, 6, 30, 'Calle Ejemplo', 1920, 0, '', ''),
(17, 8, 53, 'Calle Ejemplo', 90, 0, '', ''),
(18, 23, 79, 'Calle Ejemplo', 1405, 0, '', ''),
(19, 8, 52, 'Calle Ejemplo', 160, 0, '', ''),
(20, 3, 74, 'Calle Ejemplo', 900, 0, '', ''),
(21, 4, 49, 'Calle Ejemplo', 12, 0, '', ''),
(22, 18, 68, 'Calle Ejemplo', 670, 0, '', ''),
(23, 20, 46, 'Avenida Ejemplo', 890, 0, '', ''),
(24, 1, 3, 'Calle Ejemplo', 1458, 7, 'E', ''),
(25, 5, 82, 'Calle Ejemplo', 97, 0, '', ''),
(26, 5, 81, 'Calle Ejemplo', 134, 0, '', ''),
(27, 14, 57, 'Avenida ejemplo', 905, 0, '', ''),
(28, 17, 22, 'Calle Ejemplo', 1920, 0, '', ''),
(29, 14, 57, 'Calle Ejemplo', 120, 0, '', ''),
(30, 15, 55, 'Calle Ejemplo', 1280, 0, '', '');

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

--
-- Volcado de datos para la tabla `vd_envios`
--

INSERT INTO `vd_envios` (`id`, `id_postulacion`, `confirmacion_solicitante`, `confirmacion_responsable`, `calificacion_solicitante`, `calificacion_responsable`, `comentario_solicitante`, `comentario_responsable`, `fecha`, `hora`) VALUES
(1, 4, 1, 1, 5, 4, '¡Llego a horario y en condiciones!', 'Entregado.', '2020-11-17', '0000-00-00 00:00:00'),
(2, 5, 1, 1, 5, 4, 'Muy bueno.', 'Entregado.', '2020-11-17', '0000-00-00 00:00:00'),
(3, 6, 1, 1, 5, 2, '¡EXCELENTE!', 'Las indicaciones no eran claras.', '2020-11-17', '0000-00-00 00:00:00'),
(4, 7, 1, 1, 4, 1, 'Muy bueno!', 'Indicaciones insuficientes', '2020-11-17', '2007-01-03 00:00:00'),
(5, 8, 1, 1, 4, 4, 'Buenísimo. Llego a horario.', 'Entregado.', '2020-11-17', '2007-03-22 00:00:00'),
(6, 12, 1, 1, 4, 4, 'Bien', 'Entregado.', '2020-11-17', '2007-10-10 00:00:00'),
(7, 14, 0, 0, 0, 0, '', '', NULL, NULL),
(8, 15, 0, 0, 0, 0, '', '', NULL, NULL);

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

--
-- Volcado de datos para la tabla `vd_publicaciones`
--

INSERT INTO `vd_publicaciones` (`id`, `id_usuario`, `id_direccion_origen`, `id_direccion_destino`, `tipo_vehiculo`, `titulo`, `fecha_salida`, `hora_salida`, `peso`, `medida_alto`, `medida_largo`, `medida_ancho`, `descripcion`, `fecha`, `estado`) VALUES
(1, 1, 1, 2, 'auto', 'Pedido ejemplo de MANUEL 1 (cerrada por vencimiento)', '2020-11-18', '20:00:00', 15, 20, 30, 20, 'Caja de tamaño medio, bastante pesada. Hace falta un auto con baúl para llevarla. Es frágil, si la caja llega con algún golpe doy mala calificación.', '2020-11-07', 0),
(2, 1, 3, 4, 'moto', 'Pedido ejemplo de MANUEL 2', '2020-11-25', '16:00:00', 1, 15, 15, 0, 'Papeles. No pesan nada ni ocupan nada. Pueden llevarse en moto, lo único importante es que no lleguen arrugados.', '2020-11-07', 1),
(3, 1, 5, 6, 'auto', 'Pedido ejemplo de MANUEL 3', '2020-11-20', '17:00:00', 10, 20, 30, 20, 'Caja de tamaño medio. Necesito que el envío sea rápido, si se sale a las 17 tiene que llegar antes de las 17:30.', '2020-11-07', 1),
(4, 2, 7, 8, 'auto', 'Pedido ejemplo de DOLORES 1', '2020-11-18', '18:40:00', 20, 15, 20, 30, '', '2020-11-17', 0),
(5, 2, 9, 10, 'camioneta', 'Pedido ejemplo de DOLORES 2', '2020-11-23', '16:40:00', 110, 130, 90, 90, 'Caja de 110 Kg muy pesada y bastante grande. Hace falta una camioneta con mucho espacio!', '2020-11-17', 0),
(6, 2, 11, 12, 'auto', 'Pedido ejemplo de DOLORES 3', '2020-11-26', '15:00:00', 10, 15, 15, 15, 'Caja pequeña de 10kg, puede llevarse en auto sin necesidad de baúl.', '2020-11-17', 1),
(7, 5, 13, 14, 'auto', 'Pedido ejemplo de DAVID 1', '2020-11-18', '18:50:00', 20, 20, 20, 20, '', '2020-11-17', 1),
(8, 5, 15, 16, 'camioneta', 'Pedido ejemplo de DAVID 2', '2020-11-19', '18:50:00', 35, 20, 20, 20, '', '2020-11-17', 1),
(9, 5, 17, 18, 'auto', 'Pedido ejemplo de DAVID 3', '2020-11-23', '17:50:00', 90, 100, 100, 50, '', '2020-11-17', 1),
(10, 1, 19, 20, 'auto', 'Pedido ejemplo de MANUEL 4', '2020-11-26', '17:00:00', 20, 20, 20, 20, 'Ejemplo de descripcion', '2020-11-17', 1),
(11, 1, 21, 22, 'auto', 'Pedido ejemplo de MANUEL 5', '2020-11-22', '17:00:00', 15, 15, 15, 15, '', '2020-11-17', 0),
(12, 1, 23, 24, 'auto', 'Pedido ejemplo de MANUEL 6', '2020-11-30', '14:00:00', 90, 90, 90, 90, 'Viaje largo', '2020-11-17', 0),
(13, 4, 25, 26, 'auto', 'Pedido ejemplo de MARIA 1', '2020-11-18', '18:00:00', 50, 10, 10, 10, '', '2020-11-17', 1),
(14, 6, 27, 28, 'auto', 'Pedido ejemplo de TERESA 1', '2020-11-19', '17:00:00', 25, 25, 25, 25, '', '2020-11-17', 0),
(15, 6, 29, 30, 'auto', 'Pedido ejemplo de TERESA 2', '2020-11-29', '19:14:00', 90, 80, 80, 20, '', '2020-11-17', 0);

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

--
-- Volcado de datos para la tabla `vd_publicaciones_comentarios`
--

INSERT INTO `vd_publicaciones_comentarios` (`id`, `id_publicacion`, `id_usuario`, `id_usuario_respuesta`, `texto`, `fecha`, `hora`) VALUES
(1, 1, 1, NULL, '¿Por qué no se postula nadie? Ya casi es 18-11 y no hay ningún candidato!', '2020-11-17', '14:00:17'),
(2, 1, 2, 1, 'Lo siento Manuel, pero mañana no voy a estar disponible', '2020-11-17', '14:03:05'),
(3, 3, 2, NULL, 'Ya me postulé', '2020-11-17', '14:03:49'),
(4, 6, 3, NULL, 'Hola Dolores, ya me postulé. Pero tengo una pregunta', '2020-11-17', '14:41:56'),
(5, 6, 2, 3, 'Si, Fracinsco.', '2020-11-17', '14:42:23'),
(6, 5, 6, NULL, 'Hola! Ya me postulé!', '2020-11-17', '15:04:55');

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

--
-- Volcado de datos para la tabla `vd_publicaciones_postulaciones`
--

INSERT INTO `vd_publicaciones_postulaciones` (`id`, `id_usuario`, `id_publicacion`, `id_vehiculo`, `precio`, `fecha`, `estado`) VALUES
(1, 2, 3, 1, 2500, '2020-11-17', 0),
(2, 4, 6, 4, 2300, '2020-11-17', 2),
(3, 3, 6, 2, 2100, '2020-11-17', 0),
(4, 6, 7, 5, 5000, '2020-11-17', 1),
(5, 6, 8, 6, 2000, '2020-11-17', 1),
(6, 6, 2, 5, 1500, '2020-11-17', 1),
(7, 6, 10, 6, 4500, '2020-11-17', 1),
(8, 6, 13, 6, 2000, '2020-11-17', 1),
(9, 6, 5, 5, 4000, '2020-11-17', 0),
(10, 1, 5, 7, 5500, '2020-11-17', 0),
(11, 6, 6, 6, 2000, '2020-11-17', 0),
(12, 6, 3, 5, 2500, '2020-11-17', 1),
(13, 6, 9, 5, 3200, '2020-11-17', 0),
(14, 4, 9, 4, 4500, '2020-11-17', 1),
(15, 4, 6, 4, 12000, '2020-11-17', 1);

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

--
-- Volcado de datos para la tabla `vd_usuarios`
--

INSERT INTO `vd_usuarios` (`id`, `nombre`, `apellido`, `email`, `dni`, `contraseña`, `avatar`, `fecha_registro`, `admin`, `estado`) VALUES
(1, 'Manuel', 'Fernandez', 'manuel@ejemplo.com', 11111111, '6b86b273ff34fce19d6b804eff5a3f5747ada4eaa22f1d49c01e52ddb7875b4b', 'av (34)', '2020-11-17', 0, 0),
(2, 'Dolores', 'Álvarez', 'dolores@ejemplo.com', 22222222, '6b86b273ff34fce19d6b804eff5a3f5747ada4eaa22f1d49c01e52ddb7875b4b', 'av (41)', '2020-11-17', 0, 0),
(3, 'Francisco', 'Torres', 'francisco@ejemplo.com', 33333333, '6b86b273ff34fce19d6b804eff5a3f5747ada4eaa22f1d49c01e52ddb7875b4b', 'av (15)', '2020-11-17', 0, 0),
(4, 'María', 'Ortega', 'maria@ejemplo.com', 44444444, '6b86b273ff34fce19d6b804eff5a3f5747ada4eaa22f1d49c01e52ddb7875b4b', 'av (35)', '2020-11-17', 0, 0),
(5, 'David', 'Gutiérrez', 'david@ejemplo.com', 55555555, '6b86b273ff34fce19d6b804eff5a3f5747ada4eaa22f1d49c01e52ddb7875b4b', 'av (12)', '2020-11-17', 0, 0),
(6, 'Teresa', 'Muñoz', 'teresa@ejemplo.com', 66666666, '6b86b273ff34fce19d6b804eff5a3f5747ada4eaa22f1d49c01e52ddb7875b4b', 'av (5)', '2020-11-17', 0, 0);

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
-- Volcado de datos para la tabla `vd_usuarios_vehiculos`
--

INSERT INTO `vd_usuarios_vehiculos` (`id`, `id_usuario`, `tipo`, `patente`, `marca`, `modelo`) VALUES
(1, 2, 'auto', 'RTU-240', 'Renault', 'Megane 2011'),
(2, 3, 'auto', 'ADD-890', 'Peugeot', '207'),
(3, 3, 'camioneta', 'IOT-229', 'Ford', 'Eco-Sport'),
(4, 4, 'auto', 'TRP-233', 'Citroen', 'C3'),
(5, 6, 'auto', 'ERT-244', 'Ford', 'Fiesta'),
(6, 6, 'camioneta', 'APP-928', 'Volkswagen', 'Amarok'),
(7, 1, 'auto', 'UIT-737', 'Chevrolet', 'Astra');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `vd_publicaciones`
--
ALTER TABLE `vd_publicaciones`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de la tabla `vd_publicaciones_comentarios`
--
ALTER TABLE `vd_publicaciones_comentarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `vd_publicaciones_postulaciones`
--
ALTER TABLE `vd_publicaciones_postulaciones`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de la tabla `vd_usuarios`
--
ALTER TABLE `vd_usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `vd_usuarios_vehiculos`
--
ALTER TABLE `vd_usuarios_vehiculos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

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
CREATE DEFINER=`root`@`localhost` EVENT `cerrar_publicaciones_vencidas` ON SCHEDULE EVERY 1 DAY STARTS '2020-11-18 00:00:00' ON COMPLETION NOT PRESERVE ENABLE DO UPDATE vd_publicaciones 
 SET estado = 1 
WHERE fecha_salida < CURDATE() 
 AND estado = 0$$

DELIMITER ;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
