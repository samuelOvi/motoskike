-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 22-02-2023 a las 06:35:51
-- Versión del servidor: 10.4.27-MariaDB
-- Versión de PHP: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `proyecto`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE `clientes` (
  `cedula` varchar(30) NOT NULL,
  `nombre` varchar(20) NOT NULL,
  `apellido` varchar(60) NOT NULL,
  `telefono` varchar(20) NOT NULL,
  `estado` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`cedula`, `nombre`, `apellido`, `telefono`, `estado`) VALUES
('3055965910', 'pedro', 'jimenez', '04245955377', '1'),
('305596591514', 'samuel', 'oviedo', '04245955377', '1'),
('305596595151', 'jose', 'perez', '04245955377', '1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `compra`
--

CREATE TABLE `compra` (
  `numero_compra` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `moton_t` float NOT NULL,
  `id_dolar` int(11) NOT NULL,
  `codigo_provedores` varchar(50) NOT NULL,
  `estado` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `compra`
--

INSERT INTO `compra` (`numero_compra`, `fecha`, `moton_t`, `id_dolar`, `codigo_provedores`, `estado`) VALUES
(1, '2023-02-19', 17.4, 1, '32423', '0'),
(2, '2023-02-19', 58, 1, '32423', '0'),
(3, '2023-02-19', 34.8, 1, '32423', '0'),
(4, '2023-02-19', 58, 1, '32423', '0'),
(5, '2023-02-19', 58, 1, '32423', '0'),
(6, '2023-02-19', 58, 1, '32423', '1'),
(7, '2023-02-19', 174, 1, '32423', '1'),
(8, '2023-02-22', 324.8, 1, '32423', '1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `marca`
--

CREATE TABLE `marca` (
  `id_marca` int(11) NOT NULL,
  `nombre_marca` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `marca`
--

INSERT INTO `marca` (`id_marca`, `nombre_marca`) VALUES
(1, 'honda');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto`
--

CREATE TABLE `producto` (
  `codigo` varchar(20) NOT NULL,
  `nombre` varchar(150) NOT NULL,
  `precioD` float NOT NULL,
  `precioB` float NOT NULL,
  `cantidadMIn` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `descripcion` varchar(200) NOT NULL,
  `marca` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `producto`
--

INSERT INTO `producto` (`codigo`, `nombre`, `precioD`, `precioB`, `cantidadMIn`, `cantidad`, `descripcion`, `marca`) VALUES
('1010', 'amortiguador', 5, 100, 3, 40, 'mmmm', 1),
('213', 'caucho', 55, 1100, 1, 10, 'buena', 1),
('444', 'bujia', 3, 60, 2, 60, 'sdsd', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `provedores`
--

CREATE TABLE `provedores` (
  `codigoproveedores` varchar(50) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `correo` varchar(60) NOT NULL,
  `telefono` varchar(20) NOT NULL,
  `estado` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `provedores`
--

INSERT INTO `provedores` (`codigoproveedores`, `nombre`, `correo`, `telefono`, `estado`) VALUES
('32423', 'samuel', 'samueloviedo888@gmai', '04245955377', '1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tasa_dolar`
--

CREATE TABLE `tasa_dolar` (
  `id_dolar` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `precio_dolar` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tasa_dolar`
--

INSERT INTO `tasa_dolar` (`id_dolar`, `fecha`, `precio_dolar`) VALUES
(1, '2023-02-19', 20);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tblcompraproducto`
--

CREATE TABLE `tblcompraproducto` (
  `cod_producto` varchar(20) NOT NULL,
  `cod_compra` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `precio` float NOT NULL,
  `subtotal` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tblcompraproducto`
--

INSERT INTO `tblcompraproducto` (`cod_producto`, `cod_compra`, `cantidad`, `precio`, `subtotal`) VALUES
('444', 1, 5, 3, 15),
('1010', 2, 10, 5, 50),
('444', 3, 10, 3, 30),
('1010', 4, 10, 5, 50),
('1010', 5, 10, 5, 50),
('1010', 6, 10, 5, 50),
('444', 7, 50, 3, 150),
('444', 8, 60, 3, 180),
('1010', 8, 20, 5, 100);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tblproductoventa`
--

CREATE TABLE `tblproductoventa` (
  `precio` float NOT NULL,
  `cantidadDetalle` varchar(160) NOT NULL,
  `subtotal` float NOT NULL,
  `tblproducto` varchar(20) NOT NULL,
  `tblventa` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tblproductoventa`
--

INSERT INTO `tblproductoventa` (`precio`, `cantidadDetalle`, `subtotal`, `tblproducto`, `tblventa`) VALUES
(3, '60', 180, '444', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `correo` varchar(30) NOT NULL,
  `nombre` varchar(20) NOT NULL,
  `clave` varchar(60) NOT NULL,
  `rol` varchar(20) NOT NULL,
  `estado` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`correo`, `nombre`, `clave`, `rol`, `estado`) VALUES
('pedro@gmail.com', 'pedro', '12345678', 'cajero', '1'),
('samueloviedo888@gmail.com', 'samuel', '12345678', 'administrador', '1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ventas`
--

CREATE TABLE `ventas` (
  `numero_venta` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `moton_total` float NOT NULL,
  `cedula_cliente` varchar(30) NOT NULL,
  `id_dolar` int(11) NOT NULL,
  `estado` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `ventas`
--

INSERT INTO `ventas` (`numero_venta`, `fecha`, `moton_total`, `cedula_cliente`, `id_dolar`, `estado`) VALUES
(1, '2023-02-22', 208.8, '305596591514', 1, '1');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`cedula`);

--
-- Indices de la tabla `compra`
--
ALTER TABLE `compra`
  ADD PRIMARY KEY (`numero_compra`),
  ADD KEY `codigo_provedores` (`codigo_provedores`),
  ADD KEY `id_dolar` (`id_dolar`);

--
-- Indices de la tabla `marca`
--
ALTER TABLE `marca`
  ADD PRIMARY KEY (`id_marca`);

--
-- Indices de la tabla `producto`
--
ALTER TABLE `producto`
  ADD PRIMARY KEY (`codigo`),
  ADD KEY `marca` (`marca`);

--
-- Indices de la tabla `provedores`
--
ALTER TABLE `provedores`
  ADD PRIMARY KEY (`codigoproveedores`);

--
-- Indices de la tabla `tasa_dolar`
--
ALTER TABLE `tasa_dolar`
  ADD PRIMARY KEY (`id_dolar`);

--
-- Indices de la tabla `tblcompraproducto`
--
ALTER TABLE `tblcompraproducto`
  ADD KEY `cod_producto` (`cod_producto`),
  ADD KEY `cod_compra` (`cod_compra`);

--
-- Indices de la tabla `tblproductoventa`
--
ALTER TABLE `tblproductoventa`
  ADD KEY `tblproducto` (`tblproducto`),
  ADD KEY `tblventa` (`tblventa`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`correo`);

--
-- Indices de la tabla `ventas`
--
ALTER TABLE `ventas`
  ADD PRIMARY KEY (`numero_venta`),
  ADD KEY `cedula_cliente` (`cedula_cliente`),
  ADD KEY `id_dolar` (`id_dolar`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `compra`
--
ALTER TABLE `compra`
  MODIFY `numero_compra` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `marca`
--
ALTER TABLE `marca`
  MODIFY `id_marca` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `tasa_dolar`
--
ALTER TABLE `tasa_dolar`
  MODIFY `id_dolar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `ventas`
--
ALTER TABLE `ventas`
  MODIFY `numero_venta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `compra`
--
ALTER TABLE `compra`
  ADD CONSTRAINT `compra_ibfk_1` FOREIGN KEY (`codigo_provedores`) REFERENCES `provedores` (`codigoproveedores`),
  ADD CONSTRAINT `compra_ibfk_2` FOREIGN KEY (`id_dolar`) REFERENCES `tasa_dolar` (`id_dolar`);

--
-- Filtros para la tabla `producto`
--
ALTER TABLE `producto`
  ADD CONSTRAINT `producto_ibfk_1` FOREIGN KEY (`marca`) REFERENCES `marca` (`id_marca`);

--
-- Filtros para la tabla `tblcompraproducto`
--
ALTER TABLE `tblcompraproducto`
  ADD CONSTRAINT `tblcompraproducto_ibfk_1` FOREIGN KEY (`cod_producto`) REFERENCES `producto` (`codigo`),
  ADD CONSTRAINT `tblcompraproducto_ibfk_2` FOREIGN KEY (`cod_compra`) REFERENCES `compra` (`numero_compra`);

--
-- Filtros para la tabla `tblproductoventa`
--
ALTER TABLE `tblproductoventa`
  ADD CONSTRAINT `tblproductoventa_ibfk_1` FOREIGN KEY (`tblproducto`) REFERENCES `producto` (`codigo`),
  ADD CONSTRAINT `tblproductoventa_ibfk_2` FOREIGN KEY (`tblventa`) REFERENCES `ventas` (`numero_venta`);

--
-- Filtros para la tabla `ventas`
--
ALTER TABLE `ventas`
  ADD CONSTRAINT `ventas_ibfk_1` FOREIGN KEY (`cedula_cliente`) REFERENCES `clientes` (`cedula`),
  ADD CONSTRAINT `ventas_ibfk_2` FOREIGN KEY (`id_dolar`) REFERENCES `tasa_dolar` (`id_dolar`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
