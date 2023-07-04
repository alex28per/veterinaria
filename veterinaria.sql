-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 04-07-2023 a las 06:44:04
-- Versión del servidor: 10.4.22-MariaDB
-- Versión de PHP: 8.1.2

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
-- Estructura de tabla para la tabla `alergia`
--

CREATE TABLE `alergia` (
  `IdAlergia` char(3) NOT NULL,
  `NomAlergia` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `alergia`
--

INSERT INTO `alergia` (`IdAlergia`, `NomAlergia`) VALUES
('001', 'Alimentos'),
('002', 'Medicamentos'),
('003', 'Insectos'),
('004', 'Parasitos'),
('005', 'Pulgas');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `historial`
--

CREATE TABLE `historial` (
  `IdHistorial` char(4) NOT NULL,
  `Tipo` varchar(40) NOT NULL,
  `Comentarios` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `historial`
--

INSERT INTO `historial` (`IdHistorial`, `Tipo`, `Comentarios`) VALUES
('0001', 'Distemper', 'Cada 2 años'),
('0002', 'Parvovirus', 'Anualmente'),
('0003', 'Rabia', 'Anualmente'),
('0004', 'Leptospirosis', 'Cada 2 años'),
('0005', 'Hepatitis canina', 'Anualmente');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `internamiento`
--

CREATE TABLE `internamiento` (
  `IdInternamiento` char(4) NOT NULL,
  `Motivo` varchar(50) NOT NULL,
  `FechIngreso` date NOT NULL,
  `FechSalida` date NOT NULL,
  `Peso` double NOT NULL,
  `Temperatura` double NOT NULL,
  `Diagnostico` varchar(70) NOT NULL,
  `Comentarios` varchar(80) DEFAULT NULL,
  `IdMascota` char(4) NOT NULL,
  `TotalPago` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `internamiento`
--

INSERT INTO `internamiento` (`IdInternamiento`, `Motivo`, `FechIngreso`, `FechSalida`, `Peso`, `Temperatura`, `Diagnostico`, `Comentarios`, `IdMascota`, `TotalPago`) VALUES
('0001', 'Dolor de oido', '2023-04-06', '2023-04-12', 54, 27, 'Otitis aguda', 'Se requiere lavado de oido', '0002', '120.00'),
('0002', 'Dolores de estomago', '2023-05-24', '2023-05-30', 67, 30, 'Irritacion estomacal', 'Se requiere ayuno y comida ligera', '0003', '150.00'),
('0003', 'Atropello', '2023-06-02', '2023-06-06', 30, 28, 'Fractura de pata', 'Se requiere descanso', '0004', '165.00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mascota`
--

CREATE TABLE `mascota` (
  `IdMascota` char(4) NOT NULL,
  `Nombre` varchar(20) NOT NULL,
  `IdSexo` varchar(16) NOT NULL,
  `FechNac` date NOT NULL,
  `Edad` int(2) NOT NULL,
  `Peso` double NOT NULL,
  `IdRaza` varchar(40) NOT NULL,
  `IdTamaño` varchar(26) NOT NULL,
  `Foto` varchar(50) DEFAULT NULL,
  `IdAlergia` char(3) NOT NULL,
  `IdPropietario` char(4) NOT NULL,
  `IdHistorial` char(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `mascota`
--

INSERT INTO `mascota` (`IdMascota`, `Nombre`, `IdSexo`, `FechNac`, `Edad`, `Peso`, `IdRaza`, `IdTamaño`, `Foto`, `IdAlergia`, `IdPropietario`, `IdHistorial`) VALUES
('0001', 'Wang', 'Macho', '2017-04-28', 6, 56, 'Perro Pitbull', 'Grande', 'imgmascota/0001.jpg', '003', '0002', '0002'),
('0002', 'Alex', 'Macho', '2012-05-28', 11, 56, 'Perro Labrador', 'Mediano', 'imgmascota/0002.jpg', '005', '0002', '0002'),
('0003', 'Lucia', 'Hembra', '2015-12-05', 7, 20, 'Perro Chihuahua', 'Pequeño', 'imgmascota/0003.jpg', '001', '0001', '0001'),
('0004', 'Sabino', 'Macho', '2010-02-06', 13, 65, 'Perro Rottweiler', 'Grande', 'imgmascota/0004.jpg', '004', '0003', '0004'),
('0005', 'Pluto', 'Macho', '2015-04-23', 8, 10, 'Gato Siames', 'Pequeño', 'imgmascota/0005.jpg', '001', '0004', '0001');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `propietario`
--

CREATE TABLE `propietario` (
  `IdPropietario` char(4) NOT NULL,
  `TipDoc` varchar(20) NOT NULL,
  `ApellProp` varchar(40) NOT NULL,
  `NomProp` varchar(40) NOT NULL,
  `TelProp` int(9) NOT NULL,
  `CorrProp` varchar(25) NOT NULL,
  `DireccProp` varchar(60) NOT NULL,
  `Referencia` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `propietario`
--

INSERT INTO `propietario` (`IdPropietario`, `TipDoc`, `ApellProp`, `NomProp`, `TelProp`, `CorrProp`, `DireccProp`, `Referencia`) VALUES
('0001', 'DNI', 'Ramos Valenzuela', 'Jorge', 980342956, 'jorger@gmail.com', 'Jr. Minas 218', 'Real Plaza de Centro Civico'),
('0002', 'Pasaporte', 'Solis Saavedra', 'Cesar', 985340593, 'cesars@gmail.com', 'Av. Naranjal 2156', '2 cuadras de Plaza Vitarte'),
('0003', 'Cedula', 'Palomares Alva', 'Silvia', 975032469, 'silvanapa@gmail.com', 'Av. Separadora Industrial 1450', '1 cdra del Grifo Repsol'),
('0004', 'DNI', 'Perez Alcantara', 'Alexis', 987326167, 'alexisprz46@gmail.com', 'Av. Calca 226', '2 cdras del ovalo Santa Anita');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `IdUsuario` char(4) NOT NULL,
  `Usuario` varchar(50) NOT NULL,
  `Passwd` char(16) NOT NULL,
  `DNI` char(8) NOT NULL,
  `TipoUsu` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`IdUsuario`, `Usuario`, `Passwd`, `DNI`, `TipoUsu`) VALUES
('0001', 'Alexis Perez', 'alexis6', '60072927', 'ADM');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `alergia`
--
ALTER TABLE `alergia`
  ADD PRIMARY KEY (`IdAlergia`);

--
-- Indices de la tabla `historial`
--
ALTER TABLE `historial`
  ADD PRIMARY KEY (`IdHistorial`);

--
-- Indices de la tabla `internamiento`
--
ALTER TABLE `internamiento`
  ADD PRIMARY KEY (`IdInternamiento`),
  ADD KEY `IdMascota` (`IdMascota`);

--
-- Indices de la tabla `mascota`
--
ALTER TABLE `mascota`
  ADD PRIMARY KEY (`IdMascota`),
  ADD KEY `IdAlergia` (`IdAlergia`),
  ADD KEY `IdPropietario` (`IdPropietario`),
  ADD KEY `IdHistorial` (`IdHistorial`);

--
-- Indices de la tabla `propietario`
--
ALTER TABLE `propietario`
  ADD PRIMARY KEY (`IdPropietario`);

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `internamiento`
--
ALTER TABLE `internamiento`
  ADD CONSTRAINT `internamiento_ibfk_1` FOREIGN KEY (`IdMascota`) REFERENCES `mascota` (`IdMascota`);

--
-- Filtros para la tabla `mascota`
--
ALTER TABLE `mascota`
  ADD CONSTRAINT `mascota_ibfk_1` FOREIGN KEY (`IdAlergia`) REFERENCES `alergia` (`IdAlergia`),
  ADD CONSTRAINT `mascota_ibfk_2` FOREIGN KEY (`IdPropietario`) REFERENCES `propietario` (`IdPropietario`),
  ADD CONSTRAINT `mascota_ibfk_3` FOREIGN KEY (`IdHistorial`) REFERENCES `historial` (`IdHistorial`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
