-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 18, 2022 at 06:57 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_tpe`
--
CREATE DATABASE IF NOT EXISTS `db_tpe` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `db_tpe`;

-- --------------------------------------------------------

--
-- Table structure for table `medico`
--

DROP TABLE IF EXISTS `medico`;
CREATE TABLE `medico` (
  `nro_medico` int(11) NOT NULL,
  `nombre` varchar(25) NOT NULL,
  `apellido` varchar(50) NOT NULL,
  `obra_social` varchar(200) DEFAULT NULL,
  `especialidad` varchar(30) DEFAULT NULL,
  `nro_secretaria` int(11) DEFAULT NULL,
  `nombre_usuario` varchar(60) NOT NULL,
  `contrasenia` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `secretaria`
--

DROP TABLE IF EXISTS `secretaria`;
CREATE TABLE `secretaria` (
  `nro_secretaria` int(11) NOT NULL,
  `nombre` varchar(25) NOT NULL,
  `apellido` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `turnos_venideros`
--

DROP TABLE IF EXISTS `turnos_venideros`;
CREATE TABLE `turnos_venideros` (
  `nro_turno` int(11) NOT NULL,
  `nro_medico` int(11) NOT NULL,
  `nombre_paciente` varchar(50) NOT NULL,
  `fecha_turno` date NOT NULL,
  `tiempo_turno` time NOT NULL,
  `detalles` varchar(400) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `medico`
--
ALTER TABLE `medico`
  ADD PRIMARY KEY (`nro_medico`),
  ADD KEY `fk_medico_nro_secretaria` (`nro_secretaria`) USING BTREE;

--
-- Indexes for table `secretaria`
--
ALTER TABLE `secretaria`
  ADD PRIMARY KEY (`nro_secretaria`);

--
-- Indexes for table `turnos_venideros`
--
ALTER TABLE `turnos_venideros`
  ADD PRIMARY KEY (`nro_turno`,`nro_medico`),
  ADD KEY `fk_turnos_venideros_nro_medico` (`nro_medico`) USING BTREE;

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `medico`
--
ALTER TABLE `medico`
  MODIFY `nro_medico` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `secretaria`
--
ALTER TABLE `secretaria`
  MODIFY `nro_secretaria` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `turnos_venideros`
--
ALTER TABLE `turnos_venideros`
  MODIFY `nro_turno` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `medico`
--
ALTER TABLE `medico`
  ADD CONSTRAINT `fk_medico_secretaria` FOREIGN KEY (`nro_secretaria`) REFERENCES `secretaria` (`nro_secretaria`) ON DELETE SET NULL;

--
-- Constraints for table `turnos_venideros`
--
ALTER TABLE `turnos_venideros`
  ADD CONSTRAINT `turnos_venideros_ibfk_1` FOREIGN KEY (`nro_medico`) REFERENCES `medico` (`nro_medico`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
