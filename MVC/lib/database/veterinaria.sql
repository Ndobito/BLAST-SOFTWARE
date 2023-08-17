-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 11-08-2023 a las 17:59:42
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
-- Base de datos: `veterinaria`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cita`
--

CREATE TABLE `cita` (
  `idcit` int(11) NOT NULL COMMENT 'Numero identificador de cada cita',
  `feccit` date NOT NULL COMMENT 'Fecha en que se agenda la cita',
  `nomclicit` varchar(255) NOT NULL COMMENT 'Nombre del dueño de la mascota',
  `telcit` varchar(255) NOT NULL COMMENT 'Numero de telefono del dueño de la mascota',
  `emacit` varchar(255) NOT NULL COMMENT 'Correo electronico del cuidador de la mascota',
  `nommascit` varchar(255) NOT NULL COMMENT 'Nombre de la mascota',
  `espmascit` varchar(255) NOT NULL COMMENT 'Especie de la mascota',
  `edadmascit` varchar(255) NOT NULL COMMENT 'Edad de la mascota',
  `genmascit` varchar(255) NOT NULL COMMENT 'Genero de la mascota',
  `motcit` varchar(255) NOT NULL COMMENT 'Motivo de la cita',
  `observcit` varchar(255) DEFAULT NULL COMMENT 'Observaciones',
  `idmas` int(11) NOT NULL COMMENT 'FK de mascota(idmas)',
  `idcli` int(11) NOT NULL COMMENT 'FK de cliente(idcli)',
  `idcol` int(11) NOT NULL COMMENT 'FK de colaborador(idcol)'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `diagnostico`
--

CREATE TABLE `diagnostico` (
  `iddiag` int(11) NOT NULL COMMENT 'Numero identificador del diagnostico',
  `docdiag` varchar(255) NOT NULL COMMENT 'Documento que contiene el diagnostico',
  `idcit` int(11) NOT NULL COMMENT 'FK de cita(idcit)'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `login`
--

CREATE TABLE `login` (
  `idlog` int(11) NOT NULL COMMENT 'Numero identificador del login',
  `feciniciolog` date NOT NULL COMMENT 'Fecha en la que se realizo el inicio de sesion',
  `fecfinlog` date NOT NULL COMMENT 'Fecha en la que se finalizo dicha sesion',
  `idcli` int(11) NOT NULL COMMENT 'FK de cliente(idcli)',
  `idcol` int(11) NOT NULL COMMENT 'FK de colaborador(idcol)'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mascota`
--

CREATE TABLE `mascota` (
  `idmas` int(11) NOT NULL COMMENT 'Numero identificador de la mascota',
  `nommas` varchar(255) NOT NULL COMMENT 'Nombre de la mascota',
  `edadmas` varchar(255) NOT NULL COMMENT 'Edad de la mascota',
  `genmas` varchar(255) NOT NULL COMMENT 'Genero de la mascota',
  `espmas` varchar(255) NOT NULL COMMENT 'Especie de la mascota',
  `idcli` int(11) NOT NULL COMMENT 'FK de cliente(idcli)'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto`
--

CREATE TABLE `producto` (
  `idprod` int(11) NOT NULL COMMENT 'Numero identificador del producto',
  `nomprod` varchar(255) NOT NULL COMMENT 'Nombre del prodcuto',
  `desprod` varchar(255) NOT NULL COMMENT 'Descripcion del producto',
  `imgprod` varchar(255) NOT NULL COMMENT 'Ruta de la imagen del producto',
  `precprod` int(11) NOT NULL COMMENT 'Costo de adquision del producto',
  `precvenprod` int(11) NOT NULL COMMENT 'Precio de venta al publico',
  `stockprod` int(11) NOT NULL COMMENT 'Numero de productos existentes',
  `catprod` varchar(255) NOT NULL COMMENT 'Categoria del producto',
  `idprov` int(11) NOT NULL COMMENT 'FK de proveedor(idprov)'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `producto`
--

INSERT INTO `producto` (`idprod`, `nomprod`, `desprod`, `imgprod`, `precprod`, `precvenprod`, `stockprod`, `catprod`, `idprov`) VALUES
(4, 'afasdfasdf', '', '', 0, 0, 0, '', 1),
(5, 'harina', 'azucar alto', 'kasbdifbeb//kas kj', 2000, 2500, 23, 'harinas', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proveedor`
--

CREATE TABLE `proveedor` (
  `idprov` int(11) NOT NULL COMMENT 'Numero Identificador del Proveedor',
  `nomprov` varchar(255) NOT NULL,
  `dirprov` varchar(255) NOT NULL COMMENT 'Direccion del Proveedor',
  `emaprov` varchar(255) NOT NULL COMMENT 'Correo electronico del proveedor',
  `telprov` varchar(255) NOT NULL COMMENT 'Numero de telefono del proveedor'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `proveedor`
--

INSERT INTO `proveedor` (`idprov`, `nomprov`, `dirprov`, `emaprov`, `telprov`) VALUES
(1, 'Carni la Victoria', 'Calle 12 # 12-02', 'carnicos@gmail.com', '3154659856'),
(2, 'alejandro', 'calle 8', 'jcuellarmenza@gmail.com', '3133215141'),
(3, 'Autoservicio el Centro ', 'Calle 6 ', 'elcentro2023@gmail.com', '3133215141');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `registroxservicios`
--

CREATE TABLE `registroxservicios` (
  `idreg` int(11) NOT NULL,
  `fecexpreg` date NOT NULL,
  `rsocempreg` varchar(255) NOT NULL,
  `nitempreg` varchar(255) NOT NULL,
  `dirempreg` varchar(255) NOT NULL,
  `nommasreg` varchar(255) NOT NULL,
  `nomclireg` varchar(255) NOT NULL,
  `descreg` varchar(255) NOT NULL,
  `recreg` varchar(255) NOT NULL,
  `valorreg` int(11) NOT NULL,
  `idcli` int(11) NOT NULL,
  `idmas` int(11) NOT NULL,
  `iddiag` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `dniuser` int(11) NOT NULL,
  `nameuser` varchar(255) NOT NULL,
  `surnameuser` varchar(255) NOT NULL,
  `nickuser` varchar(255) NOT NULL,
  `passuser` varchar(255) NOT NULL,
  `emailuser` varchar(255) NOT NULL,
  `diruser` varchar(255) NOT NULL,
  `zoneuser` varchar(255) DEFAULT NULL,
  `phoneuser` varchar(255) NOT NULL,
  `phonealtuser` varchar(255) DEFAULT NULL,
  `privileges` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`dniuser`, `nameuser`, `surnameuser`, `nickuser`, `passuser`, `emailuser`, `diruser`, `zoneuser`, `phoneuser`, `phonealtuser`, `privileges`) VALUES
(321987456, 'Karol Juliana', 'Navia Torres', 'Kn1232', '0273832d1b31e0e306a76afa2da0948d', 'karoljuli12@gmail.com', 'Calle 3 # 12-34', 'urbana', '3128569856', '', 4),
(1029981035, 'Jose Alejandro', 'Cuellar Menza', 'Asalejo1', 'd00cb1987c6c69dc665e046a11dccc6b', 'jcuellarmenza@gmail.com', 'calle 8 # 6-87', 'rural', '3133215141', '3224091130', 10),
(1080041730, 'Julian ', 'Muñoz', 'Guanki', 'a0967dfb810d9c4fad5035cc452a3581', 'jm065726@gmail.com', 'La plata', 'urbana', '3117813045', '', 1),
(1234567890, 'Ronaldo Stiven ', 'Rosero ', 'Ronald07', 'fff48e1309cc9939c07a1e44fd537543', 'ronalxd07@gmail.com', 'La plata', 'urbana', '3125469874', '', 6);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `venta`
--

CREATE TABLE `venta` (
  `idven` int(11) NOT NULL COMMENT 'Numero identificador de la venta',
  `fecexpven` date NOT NULL COMMENT 'Fecha de expedicion de la venta',
  `nitven` varchar(255) NOT NULL COMMENT 'NIT de la empresa ',
  `rsocven` varchar(255) NOT NULL COMMENT 'Nombre de la empresa',
  `dirven` varchar(255) NOT NULL COMMENT 'Direccion de la empresa',
  `prodven` varchar(255) NOT NULL COMMENT 'Productos vendidos',
  `valorven` int(11) NOT NULL COMMENT 'Preci total de la venta',
  `ivaven` varchar(255) NOT NULL COMMENT 'Porcentaje de IVA para mne ',
  `metpagoven` varchar(255) NOT NULL COMMENT 'Metodo de pago de la compra',
  `idcli` int(11) NOT NULL COMMENT 'FK de cliente(idcli)',
  `idprod` int(11) NOT NULL COMMENT 'FK de producto(idprod)'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `cita`
--
ALTER TABLE `cita`
  ADD PRIMARY KEY (`idcit`),
  ADD KEY `idmas` (`idmas`),
  ADD KEY `idcol` (`idcol`);

--
-- Indices de la tabla `diagnostico`
--
ALTER TABLE `diagnostico`
  ADD PRIMARY KEY (`iddiag`),
  ADD KEY `idcit` (`idcit`);

--
-- Indices de la tabla `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`idlog`);

--
-- Indices de la tabla `mascota`
--
ALTER TABLE `mascota`
  ADD PRIMARY KEY (`idmas`),
  ADD KEY `idcli` (`idcli`);

--
-- Indices de la tabla `producto`
--
ALTER TABLE `producto`
  ADD PRIMARY KEY (`idprod`),
  ADD KEY `idprov` (`idprov`);

--
-- Indices de la tabla `proveedor`
--
ALTER TABLE `proveedor`
  ADD PRIMARY KEY (`idprov`);

--
-- Indices de la tabla `registroxservicios`
--
ALTER TABLE `registroxservicios`
  ADD PRIMARY KEY (`idreg`),
  ADD KEY `idmas` (`idmas`),
  ADD KEY `idcli` (`idcli`),
  ADD KEY `iddiag` (`iddiag`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`dniuser`);

--
-- Indices de la tabla `venta`
--
ALTER TABLE `venta`
  ADD PRIMARY KEY (`idven`),
  ADD KEY `idprod` (`idprod`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `cita`
--
ALTER TABLE `cita`
  MODIFY `idcit` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Numero identificador de cada cita';

--
-- AUTO_INCREMENT de la tabla `diagnostico`
--
ALTER TABLE `diagnostico`
  MODIFY `iddiag` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Numero identificador del diagnostico';

--
-- AUTO_INCREMENT de la tabla `login`
--
ALTER TABLE `login`
  MODIFY `idlog` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Numero identificador del login';

--
-- AUTO_INCREMENT de la tabla `mascota`
--
ALTER TABLE `mascota`
  MODIFY `idmas` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Numero identificador de la mascota', AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `producto`
--
ALTER TABLE `producto`
  MODIFY `idprod` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Numero identificador del producto', AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `proveedor`
--
ALTER TABLE `proveedor`
  MODIFY `idprov` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Numero Identificador del Proveedor', AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `registroxservicios`
--
ALTER TABLE `registroxservicios`
  MODIFY `idreg` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `venta`
--
ALTER TABLE `venta`
  MODIFY `idven` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Numero identificador de la venta';

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `cita`
--
ALTER TABLE `cita`
  ADD CONSTRAINT `cita_ibfk_1` FOREIGN KEY (`idmas`) REFERENCES `mascota` (`idmas`);

--
-- Filtros para la tabla `diagnostico`
--
ALTER TABLE `diagnostico`
  ADD CONSTRAINT `diagnostico_ibfk_1` FOREIGN KEY (`idcit`) REFERENCES `cita` (`idcit`);

--
-- Filtros para la tabla `producto`
--
ALTER TABLE `producto`
  ADD CONSTRAINT `producto_ibfk_1` FOREIGN KEY (`idprov`) REFERENCES `proveedor` (`idprov`);

--
-- Filtros para la tabla `registroxservicios`
--
ALTER TABLE `registroxservicios`
  ADD CONSTRAINT `registroxservicios_ibfk_1` FOREIGN KEY (`idmas`) REFERENCES `mascota` (`idmas`),
  ADD CONSTRAINT `registroxservicios_ibfk_3` FOREIGN KEY (`iddiag`) REFERENCES `diagnostico` (`iddiag`);

--
-- Filtros para la tabla `venta`
--
ALTER TABLE `venta`
  ADD CONSTRAINT `venta_ibfk_1` FOREIGN KEY (`idprod`) REFERENCES `producto` (`idprod`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
