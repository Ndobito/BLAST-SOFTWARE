-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 12-05-2023 a las 18:07:45
-- Versión del servidor: 10.4.27-MariaDB
-- Versión de PHP: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `veterinaria`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cirugia`
--

CREATE TABLE `cirugia` (
  `idcir` int(11) NOT NULL COMMENT 'Numero identificador de la tabla',
  `nomcir` varchar(50) NOT NULL COMMENT 'Nombre del procedimiento',
  `espcir` varchar(50) NOT NULL COMMENT 'Especie que involucra el procedimiento',
  `doccir` varchar(255) NOT NULL COMMENT 'Documento resultante de la cirugia'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cliente`
--

CREATE TABLE `cliente` (
  `idcli` int(11) NOT NULL COMMENT 'Numero Identificador del cliente',
  `nomcli` varchar(50) NOT NULL COMMENT 'Nombre propietario de la mascota',
  `corcli` varchar(100) NOT NULL COMMENT 'Correo electronico del cliente',
  `dircli` varchar(100) NOT NULL COMMENT 'Direccion de cliente',
  `telcli` varchar(50) NOT NULL COMMENT 'Numero telefonico del cliente'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `colaborador`
--

CREATE TABLE `colaborador` (
  `idcol` int(11) NOT NULL COMMENT 'Numero identificador del colaborador',
  `nomcol` varchar(50) NOT NULL COMMENT 'Nombre completo del colaborador',
  `doccol` varchar(50) NOT NULL COMMENT 'documento de identificación del personal',
  `dircol` varchar(50) NOT NULL COMMENT 'dirección de la residencia del empleado',
  `telcol` varchar(50) NOT NULL COMMENT 'numero de telefono del personal',
  `rolcol` varchar(20) NOT NULL COMMENT 'Rol de colaborador en el sistema'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
