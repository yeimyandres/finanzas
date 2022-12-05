-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 05-12-2022 a las 22:08:48
-- Versión del servidor: 10.4.24-MariaDB
-- Versión de PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `finanzas`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cuentas`
--

CREATE TABLE `cuentas` (
  `id` int(11) NOT NULL,
  `nombre` varchar(75) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tipomovimiento` varchar(1) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `cuentas`
--

INSERT INTO `cuentas` (`id`, `nombre`, `tipomovimiento`) VALUES
(1, 'Laborales', 'I'),
(3, 'Otros Ingresos', 'I'),
(4, 'Comida', 'E'),
(5, 'Compartir', 'E'),
(6, 'Créditos', 'E'),
(7, 'Educación', 'E'),
(8, 'Impuestos', 'E'),
(9, 'Mascotas', 'E'),
(10, 'Recreación', 'E'),
(11, 'Salud y Seguridad Social', 'E'),
(12, 'Servicios Públicos', 'E'),
(13, 'Tecnología', 'E'),
(14, 'Transporte', 'E'),
(15, 'Cuidado Personal', 'E'),
(16, 'Inversiones', 'E'),
(17, 'Reservas futuras', 'E'),
(18, 'Hogar', 'E'),
(19, 'Costos Bancarios', 'E'),
(20, 'Excedentes', 'I');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ejecutados`
--

CREATE TABLE `ejecutados` (
  `id` int(11) NOT NULL,
  `idprogramado` int(11) NOT NULL,
  `idfuente` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `detalle` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL,
  `valor` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `fuentes`
--

CREATE TABLE `fuentes` (
  `id` int(11) NOT NULL,
  `nombre` varchar(75) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tipofuente` varchar(1) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `fuentes`
--

INSERT INTO `fuentes` (`id`, `nombre`, `tipofuente`) VALUES
(1, 'Cuenta Bancaria Yeimy', 'B'),
(2, 'Efectivo Yeimy', 'E');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `programados`
--

CREATE TABLE `programados` (
  `id` int(11) NOT NULL,
  `idrubro` int(11) NOT NULL,
  `fechalimite` date NOT NULL,
  `detalle` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL,
  `valor` int(11) NOT NULL,
  `estado` varchar(1) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'P'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `programados`
--

INSERT INTO `programados` (`id`, `idrubro`, `fechalimite`, `detalle`, `valor`, `estado`) VALUES
(2, 2, '2022-11-25', 'Salario mensual', 6145000, 'P'),
(3, 3, '2022-11-25', 'Saldo en banco noviembre 2022', 67000, 'P'),
(4, 5, '2022-12-01', 'Devolución suscripción Netflix y Amazon Prime Video', 38125, 'P'),
(5, 6, '2022-12-24', 'Prima de navidad 2022', 7900000, 'P'),
(7, 7, '2022-11-26', 'Factura Segundo Piso', 14802, 'P'),
(8, 7, '2022-11-26', 'Factura Primer Piso', 20829, 'P'),
(9, 8, '2022-11-27', 'Aporte a mamá Stella', 100000, 'P'),
(10, 9, '2022-11-30', 'Aporte mensual', 800000, 'P'),
(11, 10, '2022-12-01', 'Pago mensual Netflix y Prime Video', 56800, 'P'),
(12, 11, '2022-12-01', 'Pago mensual', 298000, 'P');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rubros`
--

CREATE TABLE `rubros` (
  `id` int(11) NOT NULL,
  `idcuenta` int(11) NOT NULL,
  `nombre` varchar(75) COLLATE utf8mb4_unicode_ci NOT NULL,
  `descripcion` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `rubros`
--

INSERT INTO `rubros` (`id`, `idcuenta`, `nombre`, `descripcion`) VALUES
(1, 4, 'Mercado', 'Adquisición de alimentos, insumos y víveres para preparar en casa'),
(2, 1, 'Salario CGR', 'Sueldo percibido mensualmente por trabajar en CGR'),
(3, 20, 'Saldo Banco', 'Saldo disponible en Banco mes anterior'),
(4, 20, 'Saldo Efectivo', 'Saldo disponible en Efectivo mes anterior'),
(5, 3, 'Suscripción TV Streaming', 'Pago mensual suscripción a servicio de TV por streaming'),
(6, 1, 'Prima Navidad', 'Pago por prima de navidad recibida en Diciembre'),
(7, 12, 'Gases de Occidente', 'Pagos mensuales facturas del servicio de gas'),
(8, 5, 'Aportes a Familia', 'Aportes económicos realizados a miembros de la familia'),
(9, 7, 'Ahorro Andrés Daniel', 'Aportes a Fondo gastos educativos Andrés Daniel'),
(10, 13, 'TV Streaming', 'Pago mensual servicio de TV por Streaming'),
(11, 11, 'PROEXA', 'Pago mensual aporte salud y pensiones');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `cuentas`
--
ALTER TABLE `cuentas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `ejecutados`
--
ALTER TABLE `ejecutados`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `fuentes`
--
ALTER TABLE `fuentes`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `programados`
--
ALTER TABLE `programados`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `rubros`
--
ALTER TABLE `rubros`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `cuentas`
--
ALTER TABLE `cuentas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT de la tabla `ejecutados`
--
ALTER TABLE `ejecutados`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `fuentes`
--
ALTER TABLE `fuentes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `programados`
--
ALTER TABLE `programados`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `rubros`
--
ALTER TABLE `rubros`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
