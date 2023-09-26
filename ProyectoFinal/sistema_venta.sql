-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 26-09-2023 a las 02:38:09
-- Versión del servidor: 5.1.72-community
-- Versión de PHP: 8.2.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `sistema_venta`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria`
--

CREATE TABLE `categoria` (
  `ID` int(20) NOT NULL,
  `NOMBRE` varchar(20) NOT NULL,
  `DESCRIPCION` varchar(30) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `categoria`
--

INSERT INTO `categoria` (`ID`, `NOMBRE`, `DESCRIPCION`) VALUES
(4, 'SONY', 'Nuevo'),
(3, 'Motorola', 'z7');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cliente`
--

CREATE TABLE `cliente` (
  `RUT` int(20) NOT NULL,
  `NOMBRE` varchar(20) NOT NULL,
  `TELEFONO` int(20) NOT NULL,
  `DIRECCION` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `cliente`
--

INSERT INTO `cliente` (`RUT`, `NOMBRE`, `TELEFONO`, `DIRECCION`) VALUES
(4, 'Alexander', 74288198, 'Tarija'),
(6, 'Demilson', 74288198, 'Yacuiba'),
(7, 'Fausto', 71194675, 'San geronimo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_venta`
--

CREATE TABLE `detalle_venta` (
  `ID` int(11) NOT NULL,
  `IDvta` int(11) NOT NULL,
  `IDproducto` int(11) NOT NULL,
  `CANTIDAD` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto`
--

CREATE TABLE `producto` (
  `ID` int(20) NOT NULL,
  `NOMBRE` varchar(20) NOT NULL,
  `PRECIO` int(11) NOT NULL,
  `STOCK` int(50) NOT NULL,
  `IDCATEGORIA` int(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `producto`
--

INSERT INTO `producto` (`ID`, `NOMBRE`, `PRECIO`, `STOCK`, `IDCATEGORIA`) VALUES
(17, 'SAMSUNG', 2500, 5, 2),
(18, 'LG', 1500, 10, 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proveedor`
--

CREATE TABLE `proveedor` (
  `RUT` int(20) NOT NULL,
  `NOMBRE` varchar(50) NOT NULL,
  `TELEFONO` int(10) NOT NULL,
  `WEB` varchar(50) NOT NULL,
  `DIRECCION` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `proveedor`
--

INSERT INTO `proveedor` (`RUT`, `NOMBRE`, `TELEFONO`, `WEB`, `DIRECCION`) VALUES
(9, 'Fausto', 71194675, 'google.bo', 'Tarija');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `regsitro`
--

CREATE TABLE `regsitro` (
  `ID` int(11) NOT NULL,
  `NOMBRE` varchar(20) NOT NULL,
  `CONTRA` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `regsitro`
--

INSERT INTO `regsitro` (`ID`, `NOMBRE`, `CONTRA`) VALUES
(4, 'Demilson', '5887f5b24339e210e7e0fb7906c99bf5');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `venta`
--

CREATE TABLE `venta` (
  `ID` int(20) NOT NULL,
  `NIT` int(15) NOT NULL,
  `FECHA` varchar(20) NOT NULL,
  `MONTO_FINAL` int(20) NOT NULL,
  `DESCUENTO` int(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `venta`
--

INSERT INTO `venta` (`ID`, `NIT`, `FECHA`, `MONTO_FINAL`, `DESCUENTO`) VALUES
(38, 4, '2023-09-26', 0, 0);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`ID`);

--
-- Indices de la tabla `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`RUT`);

--
-- Indices de la tabla `detalle_venta`
--
ALTER TABLE `detalle_venta`
  ADD PRIMARY KEY (`ID`);

--
-- Indices de la tabla `producto`
--
ALTER TABLE `producto`
  ADD PRIMARY KEY (`ID`);

--
-- Indices de la tabla `proveedor`
--
ALTER TABLE `proveedor`
  ADD PRIMARY KEY (`RUT`);

--
-- Indices de la tabla `regsitro`
--
ALTER TABLE `regsitro`
  ADD PRIMARY KEY (`ID`);

--
-- Indices de la tabla `venta`
--
ALTER TABLE `venta`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categoria`
--
ALTER TABLE `categoria`
  MODIFY `ID` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `cliente`
--
ALTER TABLE `cliente`
  MODIFY `RUT` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `detalle_venta`
--
ALTER TABLE `detalle_venta`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=169;

--
-- AUTO_INCREMENT de la tabla `producto`
--
ALTER TABLE `producto`
  MODIFY `ID` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT de la tabla `proveedor`
--
ALTER TABLE `proveedor`
  MODIFY `RUT` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `regsitro`
--
ALTER TABLE `regsitro`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `venta`
--
ALTER TABLE `venta`
  MODIFY `ID` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
