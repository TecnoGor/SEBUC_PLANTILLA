-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 18-11-2024 a las 14:54:25
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
-- Base de datos: `sebuc`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bancos`
--

CREATE TABLE `bancos` (
  `id_banco` int(11) NOT NULL,
  `cod_banco` int(11) NOT NULL,
  `nom_banco` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `bancos`
--

INSERT INTO `bancos` (`id_banco`, `cod_banco`, `nom_banco`) VALUES
(1, 102, 'Banco de Venezuela'),
(2, 156, '100% Banco'),
(3, 172, 'Bancamiga'),
(4, 114, 'Bancaribe'),
(5, 171, 'Banco Activo'),
(6, 166, 'Banco Agricola de Venezuela'),
(7, 175, 'Banco Bicentenario el Pueblo'),
(8, 176, 'Banco Caroní'),
(9, 163, 'Banco del Tesoro'),
(10, 115, 'Banco Exterior'),
(11, 151, 'Banco Fondo Comun'),
(12, 173, 'Banco Internacional de Desarrollo'),
(13, 105, 'Banco Mercantil'),
(14, 191, 'Banco Nacional de Credito'),
(15, 138, 'Banco Plaza'),
(16, 137, 'Banco Sofitasa'),
(17, 104, 'Banco Venezolano de Credito'),
(18, 168, 'Bancrecer'),
(19, 134, 'Banesco'),
(20, 177, 'Banfanb'),
(21, 146, 'Bangente'),
(22, 174, 'Banplus'),
(23, 108, 'BBVA Provincial'),
(24, 157, 'DelSur Banco Universal'),
(25, 169, 'Mi Banco'),
(26, 178, 'N58 Banco Digital Banco Microfinanciero SA'),
(27, 178, 'N58 Banco Digital Banco Microfinanciero SA');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comunidad`
--

CREATE TABLE `comunidad` (
  `id_comunidad` int(11) NOT NULL,
  `nombreComunidad` varchar(50) NOT NULL,
  `id_jefe` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `comunidad`
--

INSERT INTO `comunidad` (`id_comunidad`, `nombreComunidad`, `id_jefe`) VALUES
(1, 'Union La Cauchera', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `entrega_beneficio`
--

CREATE TABLE `entrega_beneficio` (
  `id` int(11) NOT NULL,
  `id_beneficio` int(11) NOT NULL,
  `id_jefe_familia` int(11) NOT NULL,
  `fecha_entrega` date NOT NULL DEFAULT current_timestamp(),
  `nro_pago` int(11) NOT NULL,
  `metodo` int(11) NOT NULL,
  `banco` int(11) DEFAULT NULL,
  `monto` float NOT NULL,
  `confirmacion` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `entrega_beneficio`
--

INSERT INTO `entrega_beneficio` (`id`, `id_beneficio`, `id_jefe_familia`, `fecha_entrega`, `nro_pago`, `metodo`, `banco`, `monto`, `confirmacion`) VALUES
(6, 1, 3, '2024-11-14', 324543, 1, NULL, 30, 0),
(7, 3, 2, '2024-11-14', 354656, 2, NULL, 90, 0),
(8, 2, 3, '2024-11-14', 347821, 2, NULL, 134, 0),
(9, 1, 1, '2024-11-17', 684612, 3, NULL, 60, 0),
(10, 2, 1, '2024-11-18', 418651, 3, 1, 60, 0);

--
-- Disparadores `entrega_beneficio`
--
DELIMITER $$
CREATE TRIGGER `before_insert_entregaBeneficio` BEFORE INSERT ON `entrega_beneficio` FOR EACH ROW BEGIN
    IF NEW.id_jefe_familia NOT IN (SELECT id_habitante FROM habitantes WHERE id_tipoHabitante = 1) THEN
        SIGNAL SQLSTATE '45000'
        SET MESSAGE_TEXT = 'El valor de id_habitante no corresponde a un habitante de tipo 1';
    END IF;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estado_civil`
--

CREATE TABLE `estado_civil` (
  `id` int(11) NOT NULL,
  `nombreEdoCivil` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `estado_civil`
--

INSERT INTO `estado_civil` (`id`, `nombreEdoCivil`) VALUES
(1, 'Soltero (a)'),
(2, 'Casado (a)'),
(3, 'Divorciado (a)'),
(4, 'Viudo (a)'),
(5, 'Concubino (a)');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estatus`
--

CREATE TABLE `estatus` (
  `id_estatus` int(11) NOT NULL,
  `nombre_estatus` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `estatus`
--

INSERT INTO `estatus` (`id_estatus`, `nombre_estatus`) VALUES
(1, 'Activo'),
(2, 'Inactivo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `habitantes`
--

CREATE TABLE `habitantes` (
  `id_habitante` int(11) NOT NULL,
  `nombres` varchar(50) NOT NULL,
  `apellidos` varchar(50) NOT NULL,
  `nacionalidad` varchar(10) NOT NULL,
  `genero` varchar(50) NOT NULL,
  `cedula` int(11) DEFAULT NULL,
  `id_edoCivil` int(11) NOT NULL,
  `fecha_nacimiento` date NOT NULL,
  `id_tipoHabitante` int(11) NOT NULL,
  `id_parentezco` int(11) DEFAULT NULL,
  `telefono` varchar(30) NOT NULL,
  `discapacidad` varchar(100) DEFAULT NULL,
  `pensionado` varchar(10) DEFAULT NULL,
  `id_poligonal` int(11) NOT NULL,
  `id_jefeFamilia` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `habitantes`
--

INSERT INTO `habitantes` (`id_habitante`, `nombres`, `apellidos`, `nacionalidad`, `genero`, `cedula`, `id_edoCivil`, `fecha_nacimiento`, `id_tipoHabitante`, `id_parentezco`, `telefono`, `discapacidad`, `pensionado`, `id_poligonal`, `id_jefeFamilia`) VALUES
(1, 'Ana Maria', 'Guadua Marquez', 'Venezolano', 'Femenino', 10105092, 3, '1967-05-03', 1, NULL, '04166048901', 'Ninguna', 'Si', 3, NULL),
(2, 'Victelia Bautista', 'Civila', 'Venezolano', 'Femenino', 5424518, 1, '1955-10-21', 1, NULL, '04241971654', 'Ninguna', 'Si', 2, NULL),
(3, 'Deivis Eduardo', 'Andrade', 'Venezolano', 'Masculino', 17140266, 1, '1979-04-07', 1, NULL, '04244249310', 'Ninguna', 'Si', 1, NULL),
(4, 'Tiodulfa', 'Zambrano', 'Venezolano', 'Femenino', 13977928, 1, '1977-10-12', 1, NULL, '04122063139', 'Ninguna', 'Si', 4, NULL),
(5, 'Sixto', 'Andrade', 'Venezolano', 'Masculino', 11188948, 1, '1968-03-28', 2, 9, '', 'Ninguna', 'Si', 4, 31),
(6, 'Dailin', 'Molina', 'Venezolano', 'Femenino', 27597710, 1, '2000-01-24', 2, 7, '', 'Ninguna', 'Si', 4, 31),
(7, 'Erika ', 'Ruiz', 'Venezolano', 'Femenino', 14384911, 1, '1979-10-13', 2, 9, '', 'Discapacidades sensoriales y de la comunicación', 'Si', 1, 30),
(8, 'Eliana ', 'Andrade', 'Venezolano', 'Femenino', 33390787, 1, '2006-07-07', 2, 7, '', 'Discapacidades sensoriales y de la comunicación', 'Si', 1, 30),
(9, 'Yolimar ', 'Sivila', 'Venezolano', 'Femenino', 15821760, 1, '1982-07-06', 2, 7, '', 'Ninguna', 'Si', 2, 29),
(10, 'Sara', 'Blanco', 'Venezolano', 'Femenino', 0, 1, '2017-10-06', 2, 8, '', 'Ninguna', 'Si', 2, 29),
(11, 'Jesus Alberto', 'Peña Guadua', 'Venezolano', 'Masculino', 6908826, 1, '1964-07-20', 2, 9, '', 'Discapacidades sensoriales y de la comunicación', 'Si', 3, 28),
(12, 'Jesus Alberto ', 'Peña Guadua', 'Venezolano', 'Masculino', 24195262, 1, '1993-06-16', 2, 7, '', 'Discapacidades sensoriales y de la comunicación', 'Si', 3, 28);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `jefes_calle`
--

CREATE TABLE `jefes_calle` (
  `id` int(11) NOT NULL,
  `id_habitante` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `metodos`
--

CREATE TABLE `metodos` (
  `id_metodo` int(11) NOT NULL,
  `method_nom` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `metodos`
--

INSERT INTO `metodos` (`id_metodo`, `method_nom`) VALUES
(1, 'Efectivo'),
(2, 'Transferencia'),
(3, 'Pago Movil'),
(4, 'BioPago');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `parentezco`
--

CREATE TABLE `parentezco` (
  `id_parentezco` int(11) NOT NULL,
  `nombre_parentezco` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `parentezco`
--

INSERT INTO `parentezco` (`id_parentezco`, `nombre_parentezco`) VALUES
(1, 'Abuelo(a)'),
(2, 'Madre'),
(3, 'Padre'),
(4, 'Hermano(a)'),
(5, 'Tio(a)'),
(6, 'Sobrino(a)'),
(7, 'Hijo(a)'),
(8, 'Nieto(a)'),
(9, 'Pareja');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `poligonal`
--

CREATE TABLE `poligonal` (
  `id` int(11) NOT NULL,
  `nombre` varchar(20) NOT NULL,
  `id_jefe` int(11) DEFAULT NULL,
  `id_comunidad` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `poligonal`
--

INSERT INTO `poligonal` (`id`, `nombre`, `id_jefe`, `id_comunidad`) VALUES
(1, 'Oriental', NULL, 1),
(2, 'Carabobo', NULL, 1),
(3, 'Francisco Javier', NULL, 1),
(4, 'Principal', NULL, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rol`
--

CREATE TABLE `rol` (
  `id_rol` int(11) NOT NULL,
  `nombre_rol` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `rol`
--

INSERT INTO `rol` (`id_rol`, `nombre_rol`) VALUES
(1, 'Jefe de comunidad'),
(2, 'Jefe de calle');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_beneficio`
--

CREATE TABLE `tipo_beneficio` (
  `id` int(11) NOT NULL,
  `nombre_beneficio` varchar(20) NOT NULL,
  `estatus` int(11) NOT NULL,
  `especial` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tipo_beneficio`
--

INSERT INTO `tipo_beneficio` (`id`, `nombre_beneficio`, `estatus`, `especial`) VALUES
(1, 'Bolsa', 1, 2),
(2, 'Proteina', 1, 2),
(3, 'Cilindro de Gas', 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_habitante`
--

CREATE TABLE `tipo_habitante` (
  `id` int(11) NOT NULL,
  `nombreTipo` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tipo_habitante`
--

INSERT INTO `tipo_habitante` (`id`, `nombreTipo`) VALUES
(1, 'Jefe de Familia'),
(2, 'Integrante de Familia');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `user` varchar(15) NOT NULL,
  `nombres` varchar(100) NOT NULL,
  `password` varchar(32) NOT NULL,
  `rol` int(11) NOT NULL,
  `activo` int(11) NOT NULL,
  `fecha_creacion` datetime NOT NULL DEFAULT current_timestamp(),
  `imagen` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `user`, `nombres`, `password`, `rol`, `activo`, `fecha_creacion`, `imagen`) VALUES
(1, 'lenniQ', 'Lenni Quintero', 'e10adc3949ba59abbe56e057f20f883e', 1, 1, '2024-09-30 00:05:38', 'Lenni.png');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `bancos`
--
ALTER TABLE `bancos`
  ADD PRIMARY KEY (`id_banco`);

--
-- Indices de la tabla `comunidad`
--
ALTER TABLE `comunidad`
  ADD PRIMARY KEY (`id_comunidad`);

--
-- Indices de la tabla `entrega_beneficio`
--
ALTER TABLE `entrega_beneficio`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_method` (`metodo`),
  ADD KEY `fk_jefe_entrega` (`id_jefe_familia`),
  ADD KEY `fk_bancos` (`banco`);

--
-- Indices de la tabla `estado_civil`
--
ALTER TABLE `estado_civil`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `estatus`
--
ALTER TABLE `estatus`
  ADD PRIMARY KEY (`id_estatus`);

--
-- Indices de la tabla `habitantes`
--
ALTER TABLE `habitantes`
  ADD PRIMARY KEY (`id_habitante`),
  ADD KEY `fk_habitanteJefeFamilia` (`id_jefeFamilia`),
  ADD KEY `fk_edoCivil` (`id_edoCivil`),
  ADD KEY `fk_tipoHabitante` (`id_tipoHabitante`),
  ADD KEY `fk_poligonal` (`id_poligonal`),
  ADD KEY `fk_parentezco` (`id_parentezco`);

--
-- Indices de la tabla `jefes_calle`
--
ALTER TABLE `jefes_calle`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_habitanteJefe` (`id_habitante`);

--
-- Indices de la tabla `metodos`
--
ALTER TABLE `metodos`
  ADD PRIMARY KEY (`id_metodo`);

--
-- Indices de la tabla `parentezco`
--
ALTER TABLE `parentezco`
  ADD PRIMARY KEY (`id_parentezco`);

--
-- Indices de la tabla `poligonal`
--
ALTER TABLE `poligonal`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_Jefe` (`id_jefe`),
  ADD KEY `fk_comunidad` (`id_comunidad`);

--
-- Indices de la tabla `rol`
--
ALTER TABLE `rol`
  ADD PRIMARY KEY (`id_rol`);

--
-- Indices de la tabla `tipo_beneficio`
--
ALTER TABLE `tipo_beneficio`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tipo_habitante`
--
ALTER TABLE `tipo_habitante`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_roles` (`rol`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `bancos`
--
ALTER TABLE `bancos`
  MODIFY `id_banco` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT de la tabla `comunidad`
--
ALTER TABLE `comunidad`
  MODIFY `id_comunidad` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `entrega_beneficio`
--
ALTER TABLE `entrega_beneficio`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `estado_civil`
--
ALTER TABLE `estado_civil`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `estatus`
--
ALTER TABLE `estatus`
  MODIFY `id_estatus` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `habitantes`
--
ALTER TABLE `habitantes`
  MODIFY `id_habitante` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `jefes_calle`
--
ALTER TABLE `jefes_calle`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `metodos`
--
ALTER TABLE `metodos`
  MODIFY `id_metodo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `parentezco`
--
ALTER TABLE `parentezco`
  MODIFY `id_parentezco` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `poligonal`
--
ALTER TABLE `poligonal`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `rol`
--
ALTER TABLE `rol`
  MODIFY `id_rol` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `tipo_beneficio`
--
ALTER TABLE `tipo_beneficio`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `tipo_habitante`
--
ALTER TABLE `tipo_habitante`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `entrega_beneficio`
--
ALTER TABLE `entrega_beneficio`
  ADD CONSTRAINT `fk_bancos` FOREIGN KEY (`banco`) REFERENCES `bancos` (`id_banco`),
  ADD CONSTRAINT `fk_jefe_entrega` FOREIGN KEY (`id_jefe_familia`) REFERENCES `habitantes` (`id_habitante`),
  ADD CONSTRAINT `fk_method` FOREIGN KEY (`metodo`) REFERENCES `metodos` (`id_metodo`);

--
-- Filtros para la tabla `jefes_calle`
--
ALTER TABLE `jefes_calle`
  ADD CONSTRAINT `fk_habitanteJefe` FOREIGN KEY (`id_habitante`) REFERENCES `habitantes` (`id_habitante`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
