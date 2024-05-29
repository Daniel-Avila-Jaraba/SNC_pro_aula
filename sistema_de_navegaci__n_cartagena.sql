-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 09-05-2024 a las 00:58:43
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `sistema_de_navegación_cartagena`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_dataprofiles`
--

CREATE TABLE `tb_dataprofiles` (
  `ID_Profile` int(11) NOT NULL,
  `Placa` varchar(6) NOT NULL,
  `Marca` varchar(20) NOT NULL,
  `Modelo` varchar(20) NOT NULL,
  `Tipo` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tb_dataprofiles`
--

INSERT INTO `tb_dataprofiles` (`ID_Profile`, `Placa`, `Marca`, `Modelo`, `Tipo`) VALUES
(1, 'EXP000', 'Test  ', 'EJ-2024', ''),
(2, 'ELP000', 'dummy', 'EJ-2024', 'bus');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_datauser`
--

CREATE TABLE `tb_datauser` (
  `ID_REG` int(11) NOT NULL,
  `Nombre` varchar(60) NOT NULL,
  `Pass` varchar(30) NOT NULL,
  `Email` varchar(80) NOT NULL,
  `Perfiles` varchar(256) NOT NULL,
  `ID_USER` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tb_datauser`
--

INSERT INTO `tb_datauser` (`ID_REG`, `Nombre`, `Pass`, `Email`, `Perfiles`, `ID_USER`) VALUES
(1, 'Jhon Doe', '1', 'JhonDoe@gmail.com', 'carros', 6),
(3, 'Admin guy', '2345', 'Adminguy@gmail.com', 'Admin', 1),
(5, 'Yuri Lowtheal', 'Persona', 'YuriLowtheal@gmail.com ', 'carros,motos,', 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_profiles`
--

CREATE TABLE `tb_profiles` (
  `ID_U` int(11) NOT NULL,
  `ID_P` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tb_profiles`
--

INSERT INTO `tb_profiles` (`ID_U`, `ID_P`) VALUES
(1, 1),
(1, 2);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `tb_dataprofiles`
--
ALTER TABLE `tb_dataprofiles`
  ADD PRIMARY KEY (`ID_Profile`),
  ADD KEY `ID_Profile` (`ID_Profile`);

--
-- Indices de la tabla `tb_datauser`
--
ALTER TABLE `tb_datauser`
  ADD PRIMARY KEY (`ID_REG`),
  ADD UNIQUE KEY `ID_REG_2` (`ID_REG`),
  ADD KEY `ID_REG` (`ID_REG`),
  ADD KEY `ID_REG_3` (`ID_REG`),
  ADD KEY `ID_REG_4` (`ID_REG`);

--
-- Indices de la tabla `tb_profiles`
--
ALTER TABLE `tb_profiles`
  ADD PRIMARY KEY (`ID_U`,`ID_P`),
  ADD KEY `ID_U` (`ID_U`) USING BTREE,
  ADD KEY `ID_U_2` (`ID_U`,`ID_P`) USING BTREE,
  ADD KEY `tb_profiles_ibfk_4` (`ID_P`) USING BTREE;

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `tb_dataprofiles`
--
ALTER TABLE `tb_dataprofiles`
  MODIFY `ID_Profile` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `tb_datauser`
--
ALTER TABLE `tb_datauser`
  MODIFY `ID_REG` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `tb_profiles`
--
ALTER TABLE `tb_profiles`
  ADD CONSTRAINT `tb_profiles_ibfk_2` FOREIGN KEY (`ID_P`) REFERENCES `tb_dataprofiles` (`ID_Profile`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `tb_profiles_ibfk_3` FOREIGN KEY (`ID_U`) REFERENCES `tb_datauser` (`ID_REG`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
