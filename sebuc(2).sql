-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 05, 2024 at 01:24 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sebuc`
--

-- --------------------------------------------------------

--
-- Table structure for table `comunidad`
--

CREATE TABLE `comunidad` (
  `id` int(11) NOT NULL,
  `nombre` varchar(20) NOT NULL,
  `id_jefe` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `entrega_beneficio`
--

CREATE TABLE `entrega_beneficio` (
  `id` int(11) NOT NULL,
  `id_beneficio` int(11) NOT NULL,
  `id_jefe_familia` int(11) NOT NULL,
  `fecha_entrega` date NOT NULL,
  `nro_pago` int(11) NOT NULL,
  `confirmacion` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Triggers `entrega_beneficio`
--
DELIMITER $$
CREATE TRIGGER `before_insert_entregaBeneficio` BEFORE INSERT ON `entrega_beneficio` FOR EACH ROW BEGIN
    IF NEW.id_jefe_familia NOT IN (SELECT id FROM habitantes WHERE id_tipoHabitante = 1) THEN
        SIGNAL SQLSTATE '45000'
        SET MESSAGE_TEXT = 'El valor de id_habitante no corresponde a un habitante de tipo 1';
    END IF;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `estado_civil`
--

CREATE TABLE `estado_civil` (
  `id` int(11) NOT NULL,
  `nombre` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `estado_civil`
--

INSERT INTO `estado_civil` (`id`, `nombre`) VALUES
(1, 'Soltero (a)'),
(2, 'Casado (a)'),
(3, 'Divorciado (a)'),
(4, 'Viudo (a)'),
(5, 'Concubino (a)');

-- --------------------------------------------------------

--
-- Table structure for table `habitantes`
--

CREATE TABLE `habitantes` (
  `id` int(11) NOT NULL,
  `nombres` varchar(50) NOT NULL,
  `apellidos` varchar(50) NOT NULL,
  `nacionalidad` varchar(10) NOT NULL,
  `cedula` int(11) NOT NULL,
  `id_edoCivil` int(11) NOT NULL,
  `fecha_nacimiento` date NOT NULL,
  `id_tipoHabitante` int(11) NOT NULL,
  `telefono` varchar(30) NOT NULL,
  `discapacidad` varchar(100) DEFAULT NULL,
  `pensionado` varchar(10) DEFAULT NULL,
  `id_poligonal` int(11) NOT NULL,
  `id_jefeFamilia` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jefes_calle`
--

CREATE TABLE `jefes_calle` (
  `id` int(11) NOT NULL,
  `id_habitante` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `poligonal`
--

CREATE TABLE `poligonal` (
  `id` int(11) NOT NULL,
  `nombre` varchar(20) NOT NULL,
  `id_jefe` int(11) DEFAULT NULL,
  `id_comunidad` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `rol`
--

CREATE TABLE `rol` (
  `id` int(11) NOT NULL,
  `nombre_rol` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `rol`
--

INSERT INTO `rol` (`id`, `nombre_rol`) VALUES
(1, 'Jefe de comunidad'),
(2, 'Jefe de calle');

-- --------------------------------------------------------

--
-- Table structure for table `tipo_beneficio`
--

CREATE TABLE `tipo_beneficio` (
  `id` int(11) NOT NULL,
  `nombre_beneficio` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tipo_habitante`
--

CREATE TABLE `tipo_habitante` (
  `id` int(11) NOT NULL,
  `nombre` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tipo_habitante`
--

INSERT INTO `tipo_habitante` (`id`, `nombre`) VALUES
(1, 'Jefe de Familia'),
(2, 'Integrante de Famili');

-- --------------------------------------------------------

--
-- Table structure for table `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `user` varchar(15) NOT NULL,
  `nombres` varchar(100) NOT NULL,
  `password` varchar(32) NOT NULL,
  `rol` int(11) NOT NULL,
  `activo` int(11) NOT NULL,
  `fecha_creacion` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `usuarios`
--

INSERT INTO `usuarios` (`id`, `user`, `nombres`, `password`, `rol`, `activo`, `fecha_creacion`) VALUES
(1, 'admin', 'Lenni Quintero', 'e10adc3949ba59abbe56e057f20f883e', 1, 1, '2024-09-30 00:05:38');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comunidad`
--
ALTER TABLE `comunidad`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `entrega_beneficio`
--
ALTER TABLE `entrega_beneficio`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_entregaBeneficio` (`id_beneficio`),
  ADD KEY `fk_jefeFamilia` (`id_jefe_familia`);

--
-- Indexes for table `estado_civil`
--
ALTER TABLE `estado_civil`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `habitantes`
--
ALTER TABLE `habitantes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_habitanteJefeFamilia` (`id_jefeFamilia`),
  ADD KEY `fk_edoCivil` (`id_edoCivil`),
  ADD KEY `fk_tipoHabitante` (`id_tipoHabitante`),
  ADD KEY `fk_poligonal` (`id_poligonal`);

--
-- Indexes for table `jefes_calle`
--
ALTER TABLE `jefes_calle`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_habitanteJefe` (`id_habitante`);

--
-- Indexes for table `poligonal`
--
ALTER TABLE `poligonal`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_Jefe` (`id_jefe`),
  ADD KEY `fk_comunidad` (`id_comunidad`);

--
-- Indexes for table `rol`
--
ALTER TABLE `rol`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tipo_beneficio`
--
ALTER TABLE `tipo_beneficio`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tipo_habitante`
--
ALTER TABLE `tipo_habitante`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_roles` (`rol`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comunidad`
--
ALTER TABLE `comunidad`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `entrega_beneficio`
--
ALTER TABLE `entrega_beneficio`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `estado_civil`
--
ALTER TABLE `estado_civil`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `habitantes`
--
ALTER TABLE `habitantes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jefes_calle`
--
ALTER TABLE `jefes_calle`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `poligonal`
--
ALTER TABLE `poligonal`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `rol`
--
ALTER TABLE `rol`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tipo_beneficio`
--
ALTER TABLE `tipo_beneficio`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tipo_habitante`
--
ALTER TABLE `tipo_habitante`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `entrega_beneficio`
--
ALTER TABLE `entrega_beneficio`
  ADD CONSTRAINT `fk_entregaBeneficio` FOREIGN KEY (`id_beneficio`) REFERENCES `tipo_beneficio` (`id`),
  ADD CONSTRAINT `fk_jefeFamilia` FOREIGN KEY (`id_jefe_familia`) REFERENCES `habitantes` (`id`);

--
-- Constraints for table `habitantes`
--
ALTER TABLE `habitantes`
  ADD CONSTRAINT `fk_edoCivil` FOREIGN KEY (`id_edoCivil`) REFERENCES `estado_civil` (`id`),
  ADD CONSTRAINT `fk_habitanteJefeFamilia` FOREIGN KEY (`id_jefeFamilia`) REFERENCES `habitantes` (`id`),
  ADD CONSTRAINT `fk_poligonal` FOREIGN KEY (`id_poligonal`) REFERENCES `poligonal` (`id`),
  ADD CONSTRAINT `fk_tipoHabitante` FOREIGN KEY (`id_tipoHabitante`) REFERENCES `tipo_habitante` (`id`);

--
-- Constraints for table `jefes_calle`
--
ALTER TABLE `jefes_calle`
  ADD CONSTRAINT `fk_habitanteJefe` FOREIGN KEY (`id_habitante`) REFERENCES `habitantes` (`id`);

--
-- Constraints for table `poligonal`
--
ALTER TABLE `poligonal`
  ADD CONSTRAINT `fk_Jefe` FOREIGN KEY (`id_jefe`) REFERENCES `jefes_calle` (`id`),
  ADD CONSTRAINT `fk_comunidad` FOREIGN KEY (`id_comunidad`) REFERENCES `comunidad` (`id`);

--
-- Constraints for table `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `fk_roles` FOREIGN KEY (`rol`) REFERENCES `rol` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
