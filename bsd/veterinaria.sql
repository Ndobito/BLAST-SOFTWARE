-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 12-05-2023 a las 04:50:20
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
-- Estructura de tabla para la tabla `cita`
--

CREATE TABLE `cita` (
  `idcit` int(11) NOT NULL COMMENT 'id que tomara la cita',
  `fechacit` date NOT NULL COMMENT 'Fecha que se realizara la cita',
  `nidentificacioncit` int(11) NOT NULL COMMENT 'numero de identificacion de la cita',
  `lugarcit` varchar(25) NOT NULL COMMENT 'Lugar donde se realiza la cita',
  `tiposerviciocit` varchar(255) NOT NULL COMMENT 'Tipo de servicio que se realiazara',
  `asignarmedicocit` varchar(50) NOT NULL COMMENT 'Cual fue el medico asignado',
  `idcli` int(50) NOT NULL COMMENT 'fk identificador del cliente',
  `idper` int(11) NOT NULL COMMENT 'fk id que se le dara al personal'
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
-- Estructura de tabla para la tabla `diagnostico`
--

CREATE TABLE `diagnostico` (
  `iddia` int(11) NOT NULL COMMENT 'Numero identificador del diagnostico',
  `nombremascotadia` varchar(50) NOT NULL COMMENT 'NOMBRE DE LA MASCOTA',
  `tipodia` varchar(250) NOT NULL COMMENT ' EL DIAGNOSTICO QUE DA EL DOCTOR ',
  `fechadia` date NOT NULL COMMENT 'EL DIA QUE SE REALIZO EL DIAGNOSTICO',
  `lugardia` varchar(50) NOT NULL COMMENT 'LUGAR DONDE SE REALIZO EL DIAGNOSTICO',
  `areaevaluadadia` varchar(255) NOT NULL COMMENT 'SE ESPECIFICA QUE AREA FUE EVALUADA',
  `nhistorialclinico` int(11) NOT NULL COMMENT 'NUMERO DEL HISTORIAL CLINICO'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empresaveterinaria`
--

CREATE TABLE `empresaveterinaria` (
  `numcomercioemp` varchar(100) NOT NULL COMMENT 'numero del \r\n    registro de la camara de comercio brindado para su identificacion',
  `nombreemp` varchar(50) NOT NULL COMMENT 'Nombre empresa',
  `direccionemp` varchar(50) NOT NULL COMMENT 'direccion de la empresa',
  `horaservicioemp` varchar(50) NOT NULL COMMENT 'horario de atencion de la empresa',
  `telefonoemp` varchar(20) NOT NULL COMMENT ' numero del telefono celular de la empresa',
  `areaservicioemp` varchar(50) NOT NULL COMMENT 'Area donde se van a empeñar las labores veterinarias',
  `nitrupemp` int(15) NOT NULL COMMENT 'codigo unico de la empresa',
  `idpro` int(11) NOT NULL COMMENT 'FK Id que se le dara al producto',
  `idpersonal` int(11) NOT NULL COMMENT 'FK id que se le dara al personal',
  `idcli` int(50) NOT NULL COMMENT 'FK identificador del cliente'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `factura`
--

CREATE TABLE `factura` (
  `numfac` int(11) NOT NULL COMMENT 'Numero de factura',
  `formapagofac` varchar(50) NOT NULL COMMENT 'forma de pago en efectivo o tarjeta',
  `nombreclifac` varchar(50) NOT NULL COMMENT 'nombre y apellidos del cliente',
  `numeroNITfac` varchar(50) NOT NULL COMMENT 'identificador',
  `fechaexpedicionfac` varchar(50) NOT NULL COMMENT 'fecha del dia que se realizo la factura',
  `resolucionfac` varchar(50) NOT NULL COMMENT 'autorizacion',
  `descripcionfac` varchar(50) NOT NULL COMMENT 'nombre de el o los productos adquiridos',
  `codigocufefac` varchar(11) NOT NULL COMMENT 'codigo de validez de factura',
  `retenedorimpuestofac` varchar(15) NOT NULL COMMENT 'retencion en la fuente del impuesto sobre las ventas',
  `idpro` int(11) NOT NULL COMMENT 'fk ID que se le dara al producto',
  `idven` int(11) NOT NULL COMMENT 'FK NUMERO DEL PRODUCTO'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `historial`
--

CREATE TABLE `historial` (
  `numhis` int(11) NOT NULL COMMENT 'NUMERO DEL HISTORIAL CLINICO',
  `datospacientehis` varchar(255) NOT NULL COMMENT 'DATOS O HISTORIAL CLINICA DE LA MASCOTA',
  `datospropietariohis` varchar(255) NOT NULL COMMENT 'INFORMACION DEL DUEÑO DE LA MASCOTAS',
  `dnihis` varchar(50) NOT NULL COMMENT 'DNI DE EL HISTORIAL',
  `componenteshis` varchar(255) NOT NULL COMMENT 'FECHAS DE ACTUALIZACION DEL HISTORIAL',
  `diagnosticohis` varchar(255) NOT NULL COMMENT 'EL DIAGNOSTICO DEL DOCTOR',
  `numdia` int(11) DEFAULT NULL COMMENT 'fk NUMERO DE DIAGNOSTICO',
  `idcir` int(11) NOT NULL COMMENT 'fk id de la cirugia',
  `idcit` int(11) NOT NULL COMMENT 'fk id que tomara la cita',
  `idmas` int(11) NOT NULL COMMENT 'fk id de las mascota'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `inventario`
--

CREATE TABLE `inventario` (
  `idinv` int(11) NOT NULL COMMENT 'id Que se le dara al inventario',
  `stockinv` varchar(255) NOT NULL COMMENT 'es el stock que tendra el inventario',
  `registroinv` varchar(50) NOT NULL COMMENT 'registro que tendra el inventario ',
  `actualizacioninv` varchar(255) NOT NULL COMMENT 'la actualizacion que se le hara previamente',
  `idpro` int(11) NOT NULL COMMENT 'fk Id del producto',
  `idprov` int(11) NOT NULL COMMENT 'fk ID QUE SE LE IDENTIFICARA AL PROVEEDOR'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `login`
--

CREATE TABLE `login` (
  `idlog` int(11) NOT NULL COMMENT 'ID QUE SE LE DARA A LA PERSONA PARA SER IDENTIFICADA',
  `usuariolog` varchar(255) NOT NULL COMMENT 'NOMBRE DE QUIEN CREO LA CUENTA',
  `fechalog` date NOT NULL COMMENT 'FECHA DE CREACION DEL PERFIL',
  `fechaactuallog` date NOT NULL COMMENT 'FECHA ACTUAL DEL PERFIL',
  `actividadrealizadalog` varchar(255) NOT NULL COMMENT 'ACTIVIDAD QUE SE REALIZO EN EL PERFIL',
  `idcli` int(50) NOT NULL COMMENT 'fk identificador del cliente',
  `numcomercioemp` varchar(100) NOT NULL COMMENT 'fk numero del registro de la camara de comercio brindado para su identificacion'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mascota`
--

CREATE TABLE `mascota` (
  `idmas` int(11) NOT NULL COMMENT 'id de la mascota',
  `nombremas` varchar(50) NOT NULL COMMENT 'Nombre de la mascota',
  `edadmas` date NOT NULL COMMENT 'edad de la mascota',
  `especiemas` varchar(50) NOT NULL COMMENT 'especie de la mascota',
  `generomas` varchar(10) NOT NULL COMMENT 'sexo de la mascota',
  `vacunamas` varchar(255) NOT NULL COMMENT 'vacunas de las mascotas',
  `tiposangremas` varchar(5) NOT NULL COMMENT 'tipo de sangre de la mascota rul',
  `idcit` int(11) NOT NULL,
  `idcli` int(11) NOT NULL,
  `numdia` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `personal`
--

CREATE TABLE `colaborador` (
  `idcol` int(11) NOT NULL COMMENT 'Numero identificador del colaborador',
  `nomcol` varchar(50) NOT NULL COMMENT 'Nombre completo del colaborador',
  `doccol` varchar(50) NOT NULL COMMENT 'documento de identificación del personal',
  `dircol` varchar(50) NOT NULL COMMENT 'dirección de la residencia del empleado',
  `telcol` varchar(50) NOT NULL COMMENT 'numero de telefono del personal',
  `rolcol` varchar(20) NOT NULL COMMENT 'Rol de colaborador en el sistema'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto`
--

CREATE TABLE `producto` (
  `idpro` int(11) NOT NULL COMMENT 'Id del producto',
  `fechaelaboracionpro` date NOT NULL COMMENT 'Es la fecha en que fue creado el producto',
  `laboratoriopro` varchar(50) NOT NULL COMMENT 'Laboratorio donde fue creado el producto',
  `nomcomercialpro` varchar(50) NOT NULL COMMENT 'Nombre el cual tiene el producto a comercializar',
  `origenpro` varchar(255) NOT NULL COMMENT 'Origen de donde proviene',
  `fechavencimientopro` date NOT NULL COMMENT 'fecha en el cual expide el producto',
  `cantidadpro` int(50) NOT NULL COMMENT 'cantidad del producto',
  `categoriapro` varchar(50) NOT NULL COMMENT 'Origen de donde proviene',
  `idprov` int(11) NOT NULL COMMENT 'fk ID QUE SE LE IDENTIFICARA AL PROVEEDOR',
  `idven` int(11) NOT NULL COMMENT 'FK id de la venta',
  `idinv` int(11) NOT NULL COMMENT 'fk id Que se le dara al inventario'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proveedor`
--

CREATE TABLE `proveedor` (
  `idprov` int(11) NOT NULL COMMENT '',
  `dniprov` int(11) NOT NULL COMMENT 'DOCUMENTO DE IDENTIFICACION DEL PROVEEDOR',
  `nomprov` varchar(50) NOT NULL COMMENT 'NOMBRE DELPROVEEDOR',
  `apellidoprov` varchar(50) NOT NULL COMMENT 'APELLIDO DEL PROVEEDOR',
  `direccionprov` varchar(255) NOT NULL COMMENT 'DIRECCION DONDE ESTA UBICADO EL PROVEEDOR',
  `telefonoprov` varchar(20) NOT NULL COMMENT 'TELEFONO DEL PROVEEDOR'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ventas`
--

CREATE TABLE `ventas` (
  `idven` int(11) NOT NULL COMMENT 'id de la venta',
  `cantidadven` int(11) NOT NULL COMMENT 'NUMERO DE PRODUCTO QUE SE VAN A ADQUIRIR',
  `claseventa` varchar(255) NOT NULL COMMENT 'TIPO DE PRODUCTOS ADQUIRIDOS',
  `idpro` int(11) NOT NULL COMMENT 'fk Id del producto'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `cirugia`
--
ALTER TABLE `cirugia`
  ADD PRIMARY KEY (`idcir`) USING BTREE;

--
-- Indices de la tabla `cita`
--
ALTER TABLE `cita`
  ADD PRIMARY KEY (`idcit`),
  ADD KEY `idcli` (`idcli`),
  ADD KEY `idper` (`idper`);

--
-- Indices de la tabla `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`idcli`),
  ADD KEY `idmas` (`idmas`);

--
-- Indices de la tabla `diagnostico`
--
ALTER TABLE `diagnostico`
  ADD PRIMARY KEY (`numdia`),
  ADD KEY `nhistorialclinico` (`nhistorialclinico`);

--
-- Indices de la tabla `empresaveterinaria`
--
ALTER TABLE `empresaveterinaria`
  ADD PRIMARY KEY (`numcomercioemp`),
  ADD KEY `idpro` (`idpro`),
  ADD KEY `idpersonal` (`idpersonal`),
  ADD KEY `idcli` (`idcli`);

--
-- Indices de la tabla `factura`
--
ALTER TABLE `factura`
  ADD PRIMARY KEY (`numfac`),
  ADD KEY `idven` (`idven`),
  ADD KEY `idpro` (`idpro`);

--
-- Indices de la tabla `historial`
--
ALTER TABLE `historial`
  ADD PRIMARY KEY (`numhis`),
  ADD KEY `numdia` (`numdia`),
  ADD KEY `idcir` (`idcir`),
  ADD KEY `idcit` (`idcit`),
  ADD KEY `idmas` (`idmas`);

--
-- Indices de la tabla `inventario`
--
ALTER TABLE `inventario`
  ADD PRIMARY KEY (`idinv`),
  ADD KEY `idpro` (`idpro`),
  ADD KEY `idprov` (`idprov`);

--
-- Indices de la tabla `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`idlog`),
  ADD KEY `idcli` (`idcli`),
  ADD KEY `numcomercioemp` (`numcomercioemp`);

--
-- Indices de la tabla `mascota`
--
ALTER TABLE `mascota`
  ADD PRIMARY KEY (`idmas`),
  ADD KEY `idcit` (`idcit`,`idcli`,`numdia`),
  ADD KEY `idcli` (`idcli`),
  ADD KEY `numdia` (`numdia`);

--
-- Indices de la tabla `personal`
--
ALTER TABLE `personal`
  ADD PRIMARY KEY (`idper`);

--
-- Indices de la tabla `producto`
--
ALTER TABLE `producto`
  ADD PRIMARY KEY (`idpro`),
  ADD KEY `idprov` (`idprov`),
  ADD KEY `idven` (`idven`),
  ADD KEY `idinv` (`idinv`);

--
-- Indices de la tabla `proveedor`
--
ALTER TABLE `proveedor`
  ADD PRIMARY KEY (`idprov`);

--
-- Indices de la tabla `ventas`
--
ALTER TABLE `ventas`
  ADD PRIMARY KEY (`idven`),
  ADD KEY `idpro` (`idpro`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `cita`
--
ALTER TABLE `cita`
  MODIFY `idcit` int(11) NOT NULL AUTO_INCREMENT COMMENT 'id que tomara la cita';

--
-- AUTO_INCREMENT de la tabla `cliente`
--
ALTER TABLE `cliente`
  MODIFY `idcli` int(11) NOT NULL AUTO_INCREMENT COMMENT 'identificador del cliente';

--
-- AUTO_INCREMENT de la tabla `factura`
--
ALTER TABLE `factura`
  MODIFY `numfac` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Numero de factura';

--
-- AUTO_INCREMENT de la tabla `inventario`
--
ALTER TABLE `inventario`
  MODIFY `idinv` int(11) NOT NULL AUTO_INCREMENT COMMENT 'id Que se le dara al inventario';

--
-- AUTO_INCREMENT de la tabla `mascota`
--
ALTER TABLE `mascota`
  MODIFY `idmas` int(11) NOT NULL AUTO_INCREMENT COMMENT 'id de la mascota';

--
-- AUTO_INCREMENT de la tabla `personal`
--
ALTER TABLE `personal`
  MODIFY `idper` int(11) NOT NULL AUTO_INCREMENT COMMENT 'id que se le dara al personal';

--
-- AUTO_INCREMENT de la tabla `producto`
--
ALTER TABLE `producto`
  MODIFY `idpro` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Id del producto ';

--
-- AUTO_INCREMENT de la tabla `proveedor`
--
ALTER TABLE `proveedor`
  MODIFY `idprov` int(11) NOT NULL AUTO_INCREMENT COMMENT 'ID QUE SE LE IDENTIFICARA AL PROVEEDOR';

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `cita`
--
ALTER TABLE `cita`
  ADD CONSTRAINT `cita_ibfk_1` FOREIGN KEY (`idcli`) REFERENCES `cliente` (`idcli`),
  ADD CONSTRAINT `cita_ibfk_2` FOREIGN KEY (`idper`) REFERENCES `personal` (`idper`);

--
-- Filtros para la tabla `cliente`
--
ALTER TABLE `cliente`
  ADD CONSTRAINT `cliente_ibfk_1` FOREIGN KEY (`idmas`) REFERENCES `mascota` (`idmas`);

--
-- Filtros para la tabla `diagnostico`
--
ALTER TABLE `diagnostico`
  ADD CONSTRAINT `diagnostico_ibfk_1` FOREIGN KEY (`nhistorialclinico`) REFERENCES `historial` (`numhis`);

--
-- Filtros para la tabla `empresaveterinaria`
--
ALTER TABLE `empresaveterinaria`
  ADD CONSTRAINT `empresaveterinaria_ibfk_1` FOREIGN KEY (`idpro`) REFERENCES `producto` (`idpro`),
  ADD CONSTRAINT `empresaveterinaria_ibfk_10` FOREIGN KEY (`idpro`) REFERENCES `producto` (`idpro`),
  ADD CONSTRAINT `empresaveterinaria_ibfk_11` FOREIGN KEY (`idpersonal`) REFERENCES `personal` (`idper`),
  ADD CONSTRAINT `empresaveterinaria_ibfk_12` FOREIGN KEY (`idcli`) REFERENCES `cliente` (`idcli`),
  ADD CONSTRAINT `empresaveterinaria_ibfk_13` FOREIGN KEY (`idpro`) REFERENCES `producto` (`idpro`),
  ADD CONSTRAINT `empresaveterinaria_ibfk_14` FOREIGN KEY (`idpersonal`) REFERENCES `personal` (`idper`),
  ADD CONSTRAINT `empresaveterinaria_ibfk_15` FOREIGN KEY (`idcli`) REFERENCES `cliente` (`idcli`),
  ADD CONSTRAINT `empresaveterinaria_ibfk_16` FOREIGN KEY (`idpro`) REFERENCES `producto` (`idpro`),
  ADD CONSTRAINT `empresaveterinaria_ibfk_17` FOREIGN KEY (`idpersonal`) REFERENCES `personal` (`idper`),
  ADD CONSTRAINT `empresaveterinaria_ibfk_18` FOREIGN KEY (`idcli`) REFERENCES `cliente` (`idcli`),
  ADD CONSTRAINT `empresaveterinaria_ibfk_19` FOREIGN KEY (`idpro`) REFERENCES `producto` (`idpro`),
  ADD CONSTRAINT `empresaveterinaria_ibfk_2` FOREIGN KEY (`idpersonal`) REFERENCES `personal` (`idper`),
  ADD CONSTRAINT `empresaveterinaria_ibfk_20` FOREIGN KEY (`idpersonal`) REFERENCES `personal` (`idper`),
  ADD CONSTRAINT `empresaveterinaria_ibfk_21` FOREIGN KEY (`idcli`) REFERENCES `cliente` (`idcli`),
  ADD CONSTRAINT `empresaveterinaria_ibfk_22` FOREIGN KEY (`idpro`) REFERENCES `producto` (`idpro`),
  ADD CONSTRAINT `empresaveterinaria_ibfk_23` FOREIGN KEY (`idpersonal`) REFERENCES `personal` (`idper`),
  ADD CONSTRAINT `empresaveterinaria_ibfk_24` FOREIGN KEY (`idcli`) REFERENCES `cliente` (`idcli`),
  ADD CONSTRAINT `empresaveterinaria_ibfk_25` FOREIGN KEY (`idpro`) REFERENCES `producto` (`idpro`),
  ADD CONSTRAINT `empresaveterinaria_ibfk_26` FOREIGN KEY (`idpersonal`) REFERENCES `personal` (`idper`),
  ADD CONSTRAINT `empresaveterinaria_ibfk_27` FOREIGN KEY (`idcli`) REFERENCES `cliente` (`idcli`),
  ADD CONSTRAINT `empresaveterinaria_ibfk_3` FOREIGN KEY (`idcli`) REFERENCES `cliente` (`idcli`),
  ADD CONSTRAINT `empresaveterinaria_ibfk_4` FOREIGN KEY (`idpro`) REFERENCES `producto` (`idpro`),
  ADD CONSTRAINT `empresaveterinaria_ibfk_5` FOREIGN KEY (`idpersonal`) REFERENCES `personal` (`idper`),
  ADD CONSTRAINT `empresaveterinaria_ibfk_6` FOREIGN KEY (`idcli`) REFERENCES `cliente` (`idcli`),
  ADD CONSTRAINT `empresaveterinaria_ibfk_7` FOREIGN KEY (`idpro`) REFERENCES `producto` (`idpro`),
  ADD CONSTRAINT `empresaveterinaria_ibfk_8` FOREIGN KEY (`idpersonal`) REFERENCES `personal` (`idper`),
  ADD CONSTRAINT `empresaveterinaria_ibfk_9` FOREIGN KEY (`idcli`) REFERENCES `cliente` (`idcli`);

--
-- Filtros para la tabla `factura`
--
ALTER TABLE `factura`
  ADD CONSTRAINT `factura_ibfk_1` FOREIGN KEY (`idven`) REFERENCES `ventas` (`idven`),
  ADD CONSTRAINT `factura_ibfk_10` FOREIGN KEY (`idpro`) REFERENCES `producto` (`idpro`),
  ADD CONSTRAINT `factura_ibfk_11` FOREIGN KEY (`idven`) REFERENCES `ventas` (`idven`),
  ADD CONSTRAINT `factura_ibfk_12` FOREIGN KEY (`idpro`) REFERENCES `producto` (`idpro`),
  ADD CONSTRAINT `factura_ibfk_2` FOREIGN KEY (`idpro`) REFERENCES `producto` (`idpro`),
  ADD CONSTRAINT `factura_ibfk_3` FOREIGN KEY (`idven`) REFERENCES `ventas` (`idven`),
  ADD CONSTRAINT `factura_ibfk_4` FOREIGN KEY (`idpro`) REFERENCES `producto` (`idpro`),
  ADD CONSTRAINT `factura_ibfk_5` FOREIGN KEY (`idven`) REFERENCES `ventas` (`idven`),
  ADD CONSTRAINT `factura_ibfk_6` FOREIGN KEY (`idpro`) REFERENCES `producto` (`idpro`),
  ADD CONSTRAINT `factura_ibfk_7` FOREIGN KEY (`idven`) REFERENCES `ventas` (`idven`),
  ADD CONSTRAINT `factura_ibfk_8` FOREIGN KEY (`idpro`) REFERENCES `producto` (`idpro`),
  ADD CONSTRAINT `factura_ibfk_9` FOREIGN KEY (`idven`) REFERENCES `ventas` (`idven`);

--
-- Filtros para la tabla `historial`
--
ALTER TABLE `historial`
  ADD CONSTRAINT `historial_ibfk_1` FOREIGN KEY (`numdia`) REFERENCES `diagnostico` (`numdia`),
  ADD CONSTRAINT `historial_ibfk_10` FOREIGN KEY (`idcir`) REFERENCES `cirugia` (`idcir`),
  ADD CONSTRAINT `historial_ibfk_11` FOREIGN KEY (`idcit`) REFERENCES `cita` (`idcit`),
  ADD CONSTRAINT `historial_ibfk_12` FOREIGN KEY (`idmas`) REFERENCES `mascota` (`idmas`),
  ADD CONSTRAINT `historial_ibfk_13` FOREIGN KEY (`numdia`) REFERENCES `diagnostico` (`numdia`),
  ADD CONSTRAINT `historial_ibfk_14` FOREIGN KEY (`idcir`) REFERENCES `cirugia` (`idcir`),
  ADD CONSTRAINT `historial_ibfk_15` FOREIGN KEY (`idcit`) REFERENCES `cita` (`idcit`),
  ADD CONSTRAINT `historial_ibfk_16` FOREIGN KEY (`idmas`) REFERENCES `mascota` (`idmas`),
  ADD CONSTRAINT `historial_ibfk_17` FOREIGN KEY (`numdia`) REFERENCES `diagnostico` (`numdia`),
  ADD CONSTRAINT `historial_ibfk_18` FOREIGN KEY (`idcir`) REFERENCES `cirugia` (`idcir`),
  ADD CONSTRAINT `historial_ibfk_19` FOREIGN KEY (`idcit`) REFERENCES `cita` (`idcit`),
  ADD CONSTRAINT `historial_ibfk_2` FOREIGN KEY (`idcir`) REFERENCES `cirugia` (`idcir`),
  ADD CONSTRAINT `historial_ibfk_20` FOREIGN KEY (`idmas`) REFERENCES `mascota` (`idmas`),
  ADD CONSTRAINT `historial_ibfk_3` FOREIGN KEY (`idcit`) REFERENCES `cita` (`idcit`),
  ADD CONSTRAINT `historial_ibfk_4` FOREIGN KEY (`idmas`) REFERENCES `mascota` (`idmas`),
  ADD CONSTRAINT `historial_ibfk_5` FOREIGN KEY (`numdia`) REFERENCES `diagnostico` (`numdia`),
  ADD CONSTRAINT `historial_ibfk_6` FOREIGN KEY (`idcir`) REFERENCES `cirugia` (`idcir`),
  ADD CONSTRAINT `historial_ibfk_7` FOREIGN KEY (`idcit`) REFERENCES `cita` (`idcit`),
  ADD CONSTRAINT `historial_ibfk_8` FOREIGN KEY (`idmas`) REFERENCES `mascota` (`idmas`),
  ADD CONSTRAINT `historial_ibfk_9` FOREIGN KEY (`numdia`) REFERENCES `diagnostico` (`numdia`);

--
-- Filtros para la tabla `inventario`
--
ALTER TABLE `inventario`
  ADD CONSTRAINT `inventario_ibfk_1` FOREIGN KEY (`idpro`) REFERENCES `producto` (`idpro`),
  ADD CONSTRAINT `inventario_ibfk_2` FOREIGN KEY (`idprov`) REFERENCES `proveedor` (`idprov`),
  ADD CONSTRAINT `inventario_ibfk_3` FOREIGN KEY (`idpro`) REFERENCES `producto` (`idpro`),
  ADD CONSTRAINT `inventario_ibfk_4` FOREIGN KEY (`idprov`) REFERENCES `proveedor` (`idprov`),
  ADD CONSTRAINT `inventario_ibfk_5` FOREIGN KEY (`idpro`) REFERENCES `producto` (`idpro`),
  ADD CONSTRAINT `inventario_ibfk_6` FOREIGN KEY (`idprov`) REFERENCES `proveedor` (`idprov`);

--
-- Filtros para la tabla `login`
--
ALTER TABLE `login`
  ADD CONSTRAINT `login_ibfk_1` FOREIGN KEY (`idcli`) REFERENCES `cliente` (`idcli`),
  ADD CONSTRAINT `login_ibfk_2` FOREIGN KEY (`numcomercioemp`) REFERENCES `empresaveterinaria` (`numcomercioemp`),
  ADD CONSTRAINT `login_ibfk_3` FOREIGN KEY (`idcli`) REFERENCES `cliente` (`idcli`),
  ADD CONSTRAINT `login_ibfk_4` FOREIGN KEY (`numcomercioemp`) REFERENCES `empresaveterinaria` (`numcomercioemp`);

--
-- Filtros para la tabla `mascota`
--
ALTER TABLE `mascota`
  ADD CONSTRAINT `mascota_ibfk_1` FOREIGN KEY (`idcit`) REFERENCES `cita` (`idcit`) ON UPDATE CASCADE,
  ADD CONSTRAINT `mascota_ibfk_2` FOREIGN KEY (`idcli`) REFERENCES `cliente` (`idcli`) ON UPDATE CASCADE,
  ADD CONSTRAINT `mascota_ibfk_3` FOREIGN KEY (`numdia`) REFERENCES `diagnostico` (`numdia`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `producto`
--
ALTER TABLE `producto`
  ADD CONSTRAINT `producto_ibfk_1` FOREIGN KEY (`idprov`) REFERENCES `proveedor` (`idprov`),
  ADD CONSTRAINT `producto_ibfk_2` FOREIGN KEY (`idven`) REFERENCES `ventas` (`idven`),
  ADD CONSTRAINT `producto_ibfk_3` FOREIGN KEY (`idinv`) REFERENCES `inventario` (`idinv`);

--
-- Filtros para la tabla `ventas`
--
ALTER TABLE `ventas`
  ADD CONSTRAINT `ventas_ibfk_1` FOREIGN KEY (`idpro`) REFERENCES `producto` (`idpro`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;