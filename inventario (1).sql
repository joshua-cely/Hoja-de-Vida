-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 27-05-2025 a las 14:42:31
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
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
-- Estructura de tabla para la tabla `computadores`
--

CREATE TABLE `computadores` (
  `id` int(11) NOT NULL,
  `tipo_equipo` enum('Torre','Todo en uno') NOT NULL,
  `marca` varchar(100) NOT NULL,
  `modelo` varchar(100) NOT NULL,
  `numero_serie` varchar(100) NOT NULL,
  `procesador` varchar(150) NOT NULL,
  `ram_gb` int(11) NOT NULL,
  `tipo_ram` varchar(50) DEFAULT NULL,
  `almacenamiento_gb` int(11) NOT NULL,
  `tipo_almacenamiento` enum('HDD','SSD','Híbrido') NOT NULL,
  `sistema_operativo` varchar(100) DEFAULT NULL,
  `licencia_so` tinyint(1) DEFAULT 0,
  `antivirus_instalado` varchar(100) DEFAULT NULL,
  `ubicacion` varchar(100) DEFAULT NULL,
  `estado_equipo` enum('Operativo','En reparación','Dañado','Obsoleto') DEFAULT 'Operativo',
  `fecha_ingreso` date NOT NULL,
  `observaciones` text DEFAULT NULL,
  `imagen` blob DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `computadores`
--

INSERT INTO `computadores` (`id`, `tipo_equipo`, `marca`, `modelo`, `numero_serie`, `procesador`, `ram_gb`, `tipo_ram`, `almacenamiento_gb`, `tipo_almacenamiento`, `sistema_operativo`, `licencia_so`, `antivirus_instalado`, `ubicacion`, `estado_equipo`, `fecha_ingreso`, `observaciones`, `imagen`) VALUES
(1, 'Torre', 'HP', 'PRODESK', 'TO0226', 'Intel I5 8 gen', 8, 'DDR4', 500, 'HDD', 'windows 10', 0, 'Windows Defender', 'Teatro', 'Operativo', '0000-00-00', 'N/A', ''),
(3, 'Torre', 'HP', 'EliteDesk 800 G5', 'SN123456789', 'Intel Core i5-9500', 16, 'DDR4', 512, 'SSD', 'Windows 10 Pro', 1, 'McAfee', 'Oficina A1', 'Operativo', '0000-00-00', 'Equipo recién adquirido.', ''),
(4, 'Todo en uno', 'Lenovo', 'IdeaCentre AIO 3', 'SN987654321', 'AMD Ryzen 5 5500U', 8, 'DDR4', 256, 'SSD', 'Windows 11 Home', 1, 'Avast', 'Recepción', 'Operativo', '2025-05-11', NULL, NULL),
(5, 'Torre', 'Dell', 'OptiPlex 3080', 'SN2468101214', 'Intel Core i7-10700', 32, 'DDR4', 1024, 'Híbrido', 'Ubuntu 22.04', 0, '', 'Sala de servidores', 'Operativo', '0000-00-00', 'Usado para virtualización.', NULL),
(6, 'Torre', 'Acer', 'Veriton M4660G', 'SNACER123456', 'Intel Core i3-9100', 8, 'DDR4', 500, 'HDD', 'Windows 10 Home', 1, 'AVG', 'Laboratorio 1', 'Operativo', '2025-05-01', 'Uso general para prácticas.', NULL),
(7, 'Todo en uno', 'HP', 'Pavilion AIO 24', 'SNHP789123', 'Intel Core i7-1165G7', 16, 'DDR4', 512, 'SSD', 'Windows 11 Pro', 1, 'Norton', 'Dirección', 'Operativo', '2025-04-28', 'Asignado a dirección general.', NULL),
(8, 'Torre', 'Dell', 'Inspiron 3880', 'SNDL246801', 'Intel Core i5-10400', 12, 'DDR4', 256, 'SSD', 'Windows 10 Pro', 0, NULL, 'Contabilidad', 'En reparación', '2025-04-30', 'Disco dañado, en revisión.', NULL),
(9, 'Todo en uno', 'Asus', 'Vivo AIO V241EAT', 'SNAIO999555', 'Intel Pentium Gold 7505', 4, 'DDR4', 128, 'SSD', 'Windows 10 Home', 1, 'Avira', 'Biblioteca', 'Operativo', '2025-03-15', 'Equipo ligero para consultas rápidas.', NULL),
(10, 'Torre', 'Lenovo', 'ThinkCentre M70t', 'SNLEN112233', 'Intel Core i7-11700', 16, 'DDR4', 1000, 'Híbrido', 'Ubuntu 20.04', 0, NULL, 'Desarrollo', 'Operativo', '2025-03-18', 'Usado por el equipo de desarrollo.', NULL),
(11, 'Todo en uno', 'Dell', 'Inspiron 5400 AIO', 'SNDELL888222', 'Intel Core i3-1115G4', 8, 'DDR4', 256, 'SSD', 'Windows 11 Home', 1, 'Kaspersky', 'Atención al cliente', 'Operativo', '2025-04-02', 'Instalado con software de atención.', NULL),
(12, 'Torre', 'HP', 'ProDesk 400 G6', 'SNHP112358', 'Intel Core i5-10500', 8, 'DDR4', 512, 'SSD', 'Windows 10 Pro', 1, 'Windows Defender', 'Secretaría', 'Operativo', '2025-05-03', NULL, NULL),
(13, 'Torre', 'Lenovo', 'ThinkStation P340', 'SNLEN800813', 'Intel Xeon W-1250', 32, 'DDR4', 2048, 'SSD', 'Windows 10 Pro', 1, 'Bitdefender', 'Diseño gráfico', 'Operativo', '2025-04-27', 'Estación para diseño CAD y render.', NULL),
(14, 'Todo en uno', 'MSI', 'Modern AM271P', 'SNMSI333777', 'Intel Core i5-1135G7', 16, 'DDR4', 512, 'SSD', 'Windows 11 Pro', 1, 'McAfee', 'Sala de reuniones', 'Operativo', '2025-04-25', NULL, NULL),
(16, 'Todo en uno', 'Lenovo', 'ThinkCentre', 'B1024', 'I5', 8, '0', 500, '', 'Windows 10', 0, 'Windows Defender', 'Teatro', 'Operativo', '2025-05-30', 'N/A', ''),
(17, 'Todo en uno', 'HP', 'PRODESK', 'TO3025', 'Intel I5', 16, '0', 500, '', 'Windows 10', 0, 'Windows Defender', 'Teatro', 'Operativo', '2025-05-30', 'N/A', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `entradas`
--

CREATE TABLE `entradas` (
  `id` int(11) NOT NULL,
  `computador_id` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `fecha_entrada` timestamp NOT NULL DEFAULT current_timestamp(),
  `responsable` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `entradas`
--

INSERT INTO `entradas` (`id`, `computador_id`, `cantidad`, `fecha_entrada`, `responsable`) VALUES
(1, 1, 11, '2025-05-26 21:45:41', NULL),
(2, 1, 1, '2025-05-27 12:30:11', 'Joshua'),
(3, 1, 1, '2025-05-27 12:35:34', 'Joshua C'),
(4, 1, 0, '2025-05-27 12:39:51', 'Joshua C');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `salidas`
--

CREATE TABLE `salidas` (
  `id` int(11) NOT NULL,
  `computador_id` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `fecha_salida` timestamp NOT NULL DEFAULT current_timestamp(),
  `responsable` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `usuario` varchar(50) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `rol` enum('admin','usuario','invitado') NOT NULL DEFAULT 'usuario',
  `contrasena` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `usuario`, `nombre`, `rol`, `contrasena`) VALUES
(1, 'admin', 'Administrador', 'admin', 'admin123'),
(5, 'josh', 'joshua', 'admin', 'josh12345'),
(6, 'nic', 'nicolas', 'usuario', 'nic12345'),
(7, 'pepito', 'pepito', 'invitado', 'pepito12345'),
(8, 'kev', 'kevin', 'invitado', '12345');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `computadores`
--
ALTER TABLE `computadores`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `entradas`
--
ALTER TABLE `entradas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `computador_id` (`computador_id`);

--
-- Indices de la tabla `salidas`
--
ALTER TABLE `salidas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `computador_id` (`computador_id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `usuario` (`usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `computadores`
--
ALTER TABLE `computadores`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT de la tabla `entradas`
--
ALTER TABLE `entradas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `salidas`
--
ALTER TABLE `salidas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `entradas`
--
ALTER TABLE `entradas`
  ADD CONSTRAINT `entradas_ibfk_1` FOREIGN KEY (`computador_id`) REFERENCES `computadores` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `salidas`
--
ALTER TABLE `salidas`
  ADD CONSTRAINT `salidas_ibfk_1` FOREIGN KEY (`computador_id`) REFERENCES `computadores` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
